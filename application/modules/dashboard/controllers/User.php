<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array(
 			'user_model'  
 		));
 		//$this->db->query('SET SESSION sql_mode = ""');
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 
	public function index()
	{ 
		$data['title']      = display('user_list');
		$data['module'] 	= "dashboard";  
		$data['page']   	= "user/list";   
		$data['user'] = $this->user_model->read();
		echo Modules::run('template/layout', $data); 
	}
 

    public function email_check($email, $id)
    { 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('id',$id) 
            ->get('user')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} is already registered.');
            return false;
        } else {
            return true;
        }
    } 

 
	// public function form($id = null)
	// { 
	// 	$data['title']    = display('add_user');
	// 	/*-----------------------------------*/
	// 	$this->form_validation->set_rules('firstname', display('firstname'),'required|max_length[50]');
	// 	$this->form_validation->set_rules('lastname', display('lastname'),'required|max_length[50]');
	// 	#------------------------#
	// 	if (!empty($id)) {   
    //    		$this->form_validation->set_rules('email', display('email'), "required|valid_email|max_length[100]");
       
	// 	} else {
	// 		$this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user.email]|max_length[100]');
	// 	}
	// 	#------------------------#
	// 	$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
	// 	//Add this line to check if the password matches the confirm_password field
	// 	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
	// 	$this->form_validation->set_rules('login_pin', 'Login PIN', 'trim|regex_match[/^\d{4}$/]|max_length[4]');
	// 	$this->form_validation->set_rules('pos_id', 'Position', 'required|integer');

	// 	$this->form_validation->set_rules('about', display('about'),'max_length[1000]');
	// 	$this->form_validation->set_rules('status', display('status'),'required|max_length[1]');
	// 	/*-----------------------------------*/
    //     $config['upload_path']          = './assets/img/user/';
    //     $config['allowed_types']        = 'gif|jpg|png'; 

    //     $this->load->library('upload', $config);
 
    //     if ($this->upload->do_upload('image')) {  
    //         $data = $this->upload->data();  
    //         $image = $config['upload_path'].$data['file_name']; 

	// 		$config['image_library']  = 'gd2';
	// 		$config['source_image']   = $image;
	// 		$config['create_thumb']   = false;
	// 		$config['maintain_ratio'] = TRUE;
	// 		$config['width']          = 115;
	// 		$config['height']         = 90;
	// 		$this->load->library('image_lib', $config);
	// 		$this->image_lib->resize();
	// 		$this->session->set_flashdata('message', display('image_upload_successfully'));
    //     }
	// 	/*-----------------------------------*/
	// 	$data['user'] = (object)$userLevelData = array(
	// 		'id' 		  => $this->input->post('id'),
	// 		'firstname'   => $this->input->post('firstname',true),
	// 		'lastname' 	  => $this->input->post('lastname',true),
	// 		'email' 	  => $this->input->post('email',true),
	// 		'password' 	  => md5($this->input->post('password')),
	// 		'login_pin'   => $this->input->post('login_pin', true), // New field for login PIN
	// 		'about' 	  => $this->input->post('about',true),
	// 		'image'   	  => (!empty($image)?$image:$this->input->post('old_image',true)),
	// 		'last_login'  => null,
	// 		'last_logout' => null,
	// 		'counter' => $this->input->post('ismonitor'),
	// 		'ip_address'  => null,
	// 		'status'      => $this->input->post('status',true),
	// 		'is_admin'    => 0
	// 	);

	// 	/*-----------------------------------*/
	// 	if ($this->form_validation->run()) {

	//         if (empty($userLevelData['image'])) {
	// 			$this->session->set_flashdata('exception', $this->upload->display_errors()); 
	//         }

	// 		if (empty($userLevelData['id'])) {
	// 			if ($this->user_model->create($userLevelData)) {
	// 				// Prepare employee_history data with available values
	// 				$employee_history = array(
	// 					'emp_id'		=> $this->db->insert_id(), // Get newly inserted user ID
	// 					'employee_no'   => generate_employee_no($this->db->insert_id()), // Get newly inserted user ID
	// 					'first_name'    => $this->input->post('firstname', true),
	// 					'last_name'     => $this->input->post('lastname', true),
	// 					'email'         => $this->input->post('email', true),
	// 					'picture'       => (!empty($image) ? $image : $this->input->post('old_image', true)),
	// 					'is_admin'      => 0,
	// 					'pos_id'        => $this->input->post('pos_id'), // Default or placeholder
	// 					'division_id'   => 0,
	// 					'state'         => '',
	// 					'city'          => '',
	// 					'zip'           => 0,
	// 					'citizenship'   => 0,
	// 					'duty_type'     => 0,
	// 					'hire_date'     => date('Y-m-d'),
	// 					'original_hire_date' => date('Y-m-d'),
	// 					'termination_date' => '0000-00-00',
	// 					'termination_reason' => '',
	// 					'voluntary_termination' => 0,
	// 					'rehire_date' => '0000-00-00',
	// 					'rate_type' => 0,
	// 					'rate' => 0,
	// 					'pay_frequency' => 0,
	// 					'pay_frequency_txt' => '',
	// 					'hourly_rate2' => 0,
	// 					'hourly_rate3' => 0,
	// 					'home_department' => '',
	// 					'department_text' => '',
	// 					'super_visor_id' => '0',
	// 					'supervisor_report' => '',
	// 					'dob' => date('Y-m-d'),
	// 					'gender' => 0,
	// 					'marital_status' => 0,
	// 					'ethnic_group' => '',
	// 					'eeo_class_gp' => '',
	// 					'work_in_state' => 0,
	// 					'live_in_state' => 0,
	// 					'home_email' => '',
	// 					'business_email' => '',
	// 					'home_phone' => '',
	// 					'business_phone' => '',
	// 					'cell_phone' => '',
	// 					'emerg_contct' => '',
	// 					'emrg_h_phone' => '',
	// 					'emrg_w_phone' => '',
	// 					'emgr_contct_relation' => '',
	// 					'alt_em_contct' => '',
	// 					'alt_emg_h_phone' => '',
	// 					'alt_emg_w_phone' => ''
	// 				);
					
	// 				// Load the model and insert history
	// 				$this->user_model->insert_employee_history($employee_history);
	// 				// Insert user access for the role
	// 				$this->db->insert('sec_user_access_tbl', array(
	// 					'fk_role_id' => $this->input->post('pos_id'), // Using pos_id as role
	// 					'fk_user_id' => $this->db->insert_id()
	// 				));

	// 				$this->session->set_flashdata('message', display('save_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception', display('please_try_again'));
	// 			}
	// 			redirect("dashboard/user/form/");

	// 		} else {
	// 			if ($this->user_model->update($userLevelData)) {
	// 				$this->session->set_flashdata('message', display('update_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception', display('please_try_again'));
	// 			}

	// 			redirect("dashboard/user/form/$id");
	// 		}


	// 	} else {
	// 		$data['module'] = "dashboard";  
	// 		$data['page']   = "user/form";
	// 		$data['positions'] = $this->user_model->get_all_positions();
	// 		if(!empty($id))
	// 		$data['user']   = $this->user_model->single($id);
	// 		echo Modules::run('template/layout', $data);
	// 	}
	// }

	public function form($id = null)
	{ 
		$data['title'] = display('add_user');

		$this->form_validation->set_rules('firstname', display('firstname'), 'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('lastname'), 'required|max_length[50]');
		
		if (!empty($id)) {   
			$this->form_validation->set_rules('email', display('email'), "required|valid_email|max_length[100]");
		} else {
			$this->form_validation->set_rules('email', display('email'), 'required|valid_email|is_unique[user.email]|max_length[100]');
		}

		//$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5');
		//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('login_pin', 'Login PIN', 'trim|regex_match[/^\d{4}$/]|max_length[4]');
		$this->form_validation->set_rules('pos_id', 'Position', 'required|integer');
		$this->form_validation->set_rules('role_id', 'Role', 'required|integer');
		$this->form_validation->set_rules('about', display('about'), 'max_length[1000]');
		$this->form_validation->set_rules('status', display('status'), 'required|max_length[1]');

		$config['upload_path'] = './assets/img/user/';
		$config['allowed_types'] = 'gif|jpg|png'; 

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {  
			$data = $this->upload->data();  
			$image = $config['upload_path'].$data['file_name']; 

			$config['image_library']  = 'gd2';
			$config['source_image']   = $image;
			$config['create_thumb']   = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 115;
			$config['height']         = 90;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->session->set_flashdata('message', display('image_upload_successfully'));
		}

		$data['user'] = (object)$userLevelData = array(
			'id'         => $this->input->post('id'),
			'firstname'  => $this->input->post('firstname', true),
			'lastname'   => $this->input->post('lastname', true),
			'email'      => $this->input->post('email', true),
			'password'   => md5($this->input->post('password')),
			'login_pin'  => $this->input->post('login_pin', true),
			'about'      => $this->input->post('about', true),
			'image'      => (!empty($image) ? $image : $this->input->post('old_image', true)),
			'last_login' => null,
			'last_logout'=> null,
			'counter'    => $this->input->post('ismonitor'),
			'ip_address' => null,
			'status'     => $this->input->post('status', true),
			'is_admin'   => 0
		);

		if ($this->form_validation->run()) {

			if (empty($userLevelData['image'])) {
				$this->session->set_flashdata('exception', $this->upload->display_errors()); 
			}

			$pos_id = $this->input->post('pos_id', true); // Position ID
			$role_id = $this->input->post('role_id', true); // Role ID

			if (empty($userLevelData['id'])) {
				// New user
				if ($this->user_model->create($userLevelData)) {
					$new_user_id = $this->db->insert_id();

					$employee_history = array(
						'emp_id'       => $new_user_id,
						'employee_no'  => generate_employee_no($new_user_id),
						'first_name'   => $userLevelData['firstname'],
						'last_name'    => $userLevelData['lastname'],
						'email'        => $userLevelData['email'],
						'picture'      => $userLevelData['image'],
						'is_admin'     => 0,
						'pos_id'       => $pos_id,
						'hire_date'    => date('Y-m-d'),
						'original_hire_date' => date('Y-m-d'),
						'termination_date' => '0000-00-00',
						'rehire_date' => '0000-00-00',
						'dob' => date('Y-m-d')
						// Add other defaults if needed
					);

					$this->user_model->insert_employee_history($employee_history);

					// Insert access role
					$this->db->insert('sec_user_access_tbl', [
						'fk_role_id' => $role_id,
						'fk_user_id' => $new_user_id
					]);

					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				redirect("dashboard/user/form/");

			} else {
				// Update user
				if ($this->user_model->update($userLevelData)) {

					// Update employee_history
					$employee_history_update = array(
						'first_name' => $userLevelData['firstname'],
						'last_name'  => $userLevelData['lastname'],
						'email'      => $userLevelData['email'],
						'picture'    => $userLevelData['image'],
						'pos_id'       => $pos_id,
					);
					$this->db->where('emp_id', $userLevelData['id'])->update('employee_history', $employee_history_update);

					// Update user access table
					$access_exists = $this->db->get_where('sec_user_access_tbl', ['fk_user_id' => $userLevelData['id']])->num_rows();
					if ($access_exists) {
						$this->db->where('fk_user_id', $userLevelData['id'])->update('sec_user_access_tbl', ['fk_role_id' => $role_id]);
					} else {
						$this->db->insert('sec_user_access_tbl', [
							'fk_role_id' => $role_id,
							'fk_user_id' => $userLevelData['id']
						]);
					}

					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				redirect("dashboard/user/form/$id");
			}

		} else {
			$data['module'] = "dashboard";  
			$data['page']   = "user/form";
			$data['positions'] = $this->user_model->get_all_positions();
			$data['roles'] = $this->user_model->get_all_roles();
			if (!empty($id)) {
				$data['user'] = $this->user_model->single($id);
			}
			echo Modules::run('template/layout', $data);
		}
	}

	public function delete($id = null)
	{ 
		if ($this->user_model->delete($id)) {
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
		}

		redirect("dashboard/user/index");
	}

	public function pin_list()
	{
		$is_admin = $this->session->userdata('isAdmin');
		$user_id = $this->session->userdata('id');
		$data['title'] = "User PIN List";
		$data['users'] = $this->user_model->get_users_for_pin_change($is_admin, $user_id);
		$data['module'] = "dashboard";
		$data['page']   = "user/pin_list"; // View file path
		echo Modules::run('template/layout', $data);
	}


	public function pin_management($id = null)
	{
		// Get session user info
		$current_user_id = $this->session->userdata('id');
		$is_admin = $this->session->userdata('isAdmin');

		if(empty($id)) {
			$id = $this->input->post('id'); // Default to current user if no ID is provided
		} else {
			$id = (int)$id; // Ensure ID is an integer
		}

		// Load required model
		$this->load->model('user_model');

		// Handle form submission
		if ($this->input->post()) {
			$this->form_validation->set_rules('user_id', 'User', 'required|integer');
			$this->form_validation->set_rules('login_pin', 'Login PIN', 'required|regex_match[/^\d{4}$/]|max_length[4]');

			if ($this->form_validation->run()) {
				$user_id = $this->input->post('user_id');
				$pin     = $this->input->post('login_pin');

				// Allow admin to change anyone's pin, non-admins only their own
				if ($is_admin || $user_id == $current_user_id) {
					if ($this->user_model->update_user_pin($user_id, $pin)) {
						$this->session->set_flashdata('message', 'PIN updated successfully.');
					} else {
						$this->session->set_flashdata('exception', 'Failed to update PIN.');
					}
				} else {
					$this->session->set_flashdata('exception', 'Permission denied.');
				}

				//redirect('dashboard/user/pin_management' . ($is_admin ? '' : '/' . $current_user_id));
				redirect('dashboard/user/pin_management' . '/' . $id);
				
			}
		}

		// Load data for form
		$data['users'] = $this->user_model->get_users_for_pin_change($is_admin, $current_user_id);
		$data['selected_user'] = null;

		// If user ID is passed for edit, fetch that user
		if ($id) {
			// Ensure non-admins can’t access others
			if (!$is_admin && $id != $current_user_id) {
				show_error('Access denied', 403);
			}

			$data['selected_user'] = $this->user_model->get_user_by_id($id);
		}

		$data['title'] = 'PIN Management';
		$data['module'] = 'dashboard';
		$data['page'] = 'user/pin_form'; // Make sure this view exists

		echo Modules::run('template/layout', $data);
	}

	/**
	 * Check if the login PIN is unique
	 * This method is used for AJAX validation to ensure the PIN is not already in use.
	 */
	public function check_login_pin_unique()
	{
		$pin = $this->input->get('login_pin'); // or use post() if POST

		$this->db->where('login_pin', $pin);
		$query = $this->db->get('user');

		if ($query->num_rows() > 0) {
			echo json_encode(['status' => false, 'message' => 'PIN already exists. Please use another.']);
		} else {
			echo json_encode(['status' => true]);
		}
	}




}
