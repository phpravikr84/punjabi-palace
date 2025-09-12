<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();

 		$this->load->model(array(
 			'auth_model' 
 		));
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->helper('captcha');
 	}
 

	public function index()
    {  
        if ($this->session->userdata('isLogIn'))
            redirect('dashboard/home');
        
        $data['title'] = display('login'); 
        
        #-------------------------------------#
        // Check if form was submitted
        $is_post = $this->input->server('REQUEST_METHOD') === 'POST';
        
        // Check login type to determine validation rules
        $login_type = $this->input->post('login_type', true);
        
        if ($is_post) {
            if ($login_type === 'pin') {
                // PIN Login Validation
                $this->form_validation->set_rules('login_pin', 'PIN', 'required|numeric|trim');
            } else {
                // Username Login Validation
                $this->form_validation->set_rules('email', display('email'), 'required|valid_email|max_length[100]|trim');
                $this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|trim');
                
                $this->form_validation->set_rules(
                    'captcha',
                    display('captcha'),
                    array(
                        'required',
                        array(
                            'captcha_check',
                            function ($captcha) {
                                $oldCaptcha = $this->session->userdata('captcha');
                                return ($captcha === $oldCaptcha);
                            }
                        )
                    )
                );
                
                //$this->form_validation->set_message('required', 'Captcha is required.');
                $this->form_validation->set_message('captcha_check', 'Invalid captcha, please try again.');
            }
        }

        #-------------------------------------#
        // Collect form data
        $data['user'] = (object)$userData = array(
            'email'     => $this->input->post('email', true),
            'password'  => $this->input->post('password', true),
            'login_pin' => $this->input->post('login_pin', true)
        );

        #-------------------------------------#
        if ($is_post && $this->form_validation->run())
        {
            
            $this->session->unset_userdata('captcha');

            if ($login_type === 'pin') {
                // PIN Login
                $pin = $this->input->post('login_pin', true);
                $user = $this->auth_model->checkPin($pin);

                if (!$user) {
                    $this->session->set_flashdata('form_submitted', TRUE);
                    //$this->session->set_flashdata('active_tab', 'pin');
                    //$this->session->set_flashdata('login_pin', $pin);
                    $this->session->set_flashdata('message', 'Incorrect Pin!');
                    redirect('login');
                }
                
                // Convert to object for consistency
                $user = (object)array(
                    'id' => $user->id, 
                    'email' => $user->email, 
                    'fullname' => $user->fullname, 
                    'is_admin' => $user->is_admin, 
                    'user_level' => $user->user_level, 
                    'image' => $user->image, 
                    'last_login' => $user->last_login, 
                    'last_logout' => $user->last_logout, 
                    'ip_address' => $user->ip_address, 
                    'counter' => $user->counter
                );
            } else {
                // Username Login - FIXED SECTION
                $user_result = $this->auth_model->checkUser($userData);

                // echo '<pre>'; print_r($user_result); echo '</pre>'; // Debugging line

                // // Username Login - DEBUG SECTION
                // echo "<h3>DEBUG INFORMATION:</h3>";
                // echo "Email: " . $userData['email'] . "<br>";
                // echo "Password: " . $userData['password'] . "<br>";
                // echo "MD5 Hash: " . md5($userData['password']) . "<br>";
                
                // $user_result = $this->auth_model->checkUser($userData);
                
                // echo "Number of rows found: " . $user_result->num_rows() . "<br>";
                
                // // Check what's actually in the database
                // $db_user = $this->db->where('email', $userData['email'])->get('user')->row();
                // if ($db_user) {
                //     echo "User found in DB. Password hash: " . $db_user->password . "<br>";
                //     echo "Password match: " . (md5($userData['password']) == $db_user->password ? 'YES' : 'NO') . "<br>";
                // } else {
                //     echo "No user found with email: " . $userData['email'] . "<br>";
                // }

                //exit; // Stop execution to check the output
                
                // Check if we got a result object and if it has any rows
                if ($user_result->num_rows() == 0) {
                    $this->session->set_flashdata('form_submitted', TRUE);
                    //$this->session->set_flashdata('active_tab', 'username');
                    //$this->session->set_flashdata('email', $userData['email']);
                    $this->session->set_flashdata('message', 'Incorrect Email or Password!');
                    redirect('login');
                }

                $user = $user_result->row();
            }

            // Common logic for successful login (username or PIN)
            $chef = $this->db->select('emp_id,employee_no,pos_id')->where('emp_id', $user->id)->get('employee_history')->row();
            $chefid = '';
            if (!empty($chef)) {
                $shiftcheck = true;
                $shiftmangment = $this->db->where('directory', 'shiftmangment')->where('status', 1)->get('module')->num_rows();
                
                if ($shiftmangment == 1) {
                    $shiftcheck = $this->checkshift($chef->employee_no);
                }

                if ($shiftcheck == true) {
                    if ($chef->pos_id == 1) {
                        $chefid = $chef->emp_id;
                    }
                } else {
                    $this->session->set_flashdata('form_submitted', TRUE);
                    $this->session->set_flashdata('active_tab', $login_type ?: 'username');
                    $this->session->set_flashdata('exception', display('not_your_working_time'));
                    redirect('login');
                }
            }

            $checkPermission = $this->auth_model->userPermission2($user->id);
            if ($checkPermission != NULL) {
                $permission = array();
                $permission1 = array();
                if (!empty($checkPermission)) {
                    foreach ($checkPermission as $value) {
                        $permission[$value->module] = array( 
                            'create' => $value->create,
                            'read'   => $value->read,
                            'update' => $value->update,
                            'delete' => $value->delete
                        );

                        $permission1[$value->menu_title] = array( 
                            'create' => $value->create,
                            'read'   => $value->read,
                            'update' => $value->update,
                            'delete' => $value->delete
                        );
                    }
                } 
            }

            if ($user->is_admin == 2) {
                $row = $this->db->select('client_id,client_email')->where('client_email', $user->email)->get('setup_client_tbl')->row();
            }

            $sData = array(
                'isLogIn'     => true,
                'isAdmin'     => ($user->is_admin == 1 ? true : false),
                'user_type'   => $user->is_admin,
                'id'          => $user->id,
                'client_id'   => @$row->client_id,
                'fullname'    => $user->fullname,
                'user_level'  => $user->user_level,
                'email'       => $user->email,
                'image'       => $user->image,
                'last_login'  => $user->last_login,
                'last_logout' => $user->last_logout,
                'ip_address'  => $user->ip_address,
                'permission'  => json_encode(@$permission), 
                'label_permission' => json_encode(@$permission1) 
            );  

            // Store data to session 
            $this->session->set_userdata($sData);
            // Update database status
            $this->auth_model->last_login();
            // Welcome message
            $this->session->set_flashdata('message', display('welcome_back') . ' ' . $user->fullname);
            
            // Check if user is Chef
            $chef_exist = $this->db->select('fk_user_id')
                ->from('sec_user_access_tbl')
                ->where('fk_user_id', $user->id)
                ->where('fk_role_id', 1)
                ->get();

            // Check if user is Waiter
            $waiter_exist = $this->db->select('fk_user_id')
                ->from('sec_user_access_tbl')
                ->where('fk_user_id', $user->id)
                ->where('fk_role_id', 3)
                ->get();

            if ($chef_exist->num_rows() > 0) {
                redirect('ordermanage/order/allkitchen');
            } elseif ($user->counter == 1) {
                redirect('ordermanage/order/counterboard');
            } elseif ($waiter_exist->num_rows() > 0) {
                redirect('ordermanage/order/alltables');
            } else {
                redirect('dashboard/home');
            }

        } else {
            // Generate captcha for both GET and failed POST requests
            $captcha = create_captcha(array(
                'img_path'      => './assets/img/captcha/',
                'img_url'       => base_url('assets/img/captcha/'),
                'font_path'     => './assets/fonts/themify.ttf',
                'img_width'     => '220',
                'img_height'    => 35,
                'expiration'    => 600, // 5 min
                'word_length'   => 4,
                'font_size'     => 20,
                'img_id'        => 'Imageid',
                'pool'          => '23456789abcdefghijkmnpqrstuvwxyz',
                'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border'     => array(228, 229, 231),
                    'text'       => array(49, 141, 1),
                    'grid'       => array(241, 243, 246)
                )
            ));
            
            $data['captcha_word'] = $captcha['word'];
            $data['captcha_image'] = $captcha['image'];
            $this->session->set_userdata('captcha', $captcha['word']);

            // Only set flashdata if it's a POST request (form submission)
            if ($is_post) {
                $this->session->set_flashdata('form_submitted', TRUE);
                $this->session->set_flashdata('active_tab', $login_type ?: 'press');
                $this->session->set_flashdata('email', $this->input->post('email', true));
                $this->session->set_flashdata('login_pin', $this->input->post('login_pin', true));
                
                // Only set exception if there are validation errors
                if (validation_errors()) {
                    $this->session->set_flashdata('exception', validation_errors());
                }
            }

            echo Modules::run('template/login', $data);
        }
    }
  
	public function logout()
	{ 
		//update database status
		$this->auth_model->last_logout();
		//destroy session
		$this->session->sess_destroy();
		redirect('login');
	}

	public function checkshift($id){
		 $this->db->select('shift.*');
        $this->db->from('shift_user as shiftuser');
        $this->db->join('shifts as shift','shiftuser.shift_id=shift.id','left');
        $this->db->where('shiftuser.emp_id',$id);
        $shift=$this->db->get()->row();
         $timezone = $this->db->select('timezone')->get('setting')->row();
         $tz_obj = new DateTimeZone($timezone->timezone);
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('H:i:s');

		
		if ( $today_formatted>=$shift->start_Time && $today_formatted <= $shift->end_Time ) 
		{
		
			return true;
		}
		else{
			
			return false;
		}

        
	}

}
