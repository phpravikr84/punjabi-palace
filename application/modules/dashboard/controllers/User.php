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

 
	public function form($id = null)
	{ 
		$data['title']    = display('add_user');
		/*-----------------------------------*/
		$this->form_validation->set_rules('firstname', display('firstname'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('lastname'),'required|max_length[50]');
		#------------------------#
		if (!empty($id)) {   
       		$this->form_validation->set_rules('email', display('email'), "required|valid_email|max_length[100]");
       
		} else {
			$this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user.email]|max_length[100]');
		}
		#------------------------#
		$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
		$this->form_validation->set_rules('about', display('about'),'max_length[1000]');
		$this->form_validation->set_rules('status', display('status'),'required|max_length[1]');
		/*-----------------------------------*/
        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'gif|jpg|png'; 

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
		/*-----------------------------------*/
		$data['user'] = (object)$userLevelData = array(
			'id' 		  => $this->input->post('id'),
			'firstname'   => $this->input->post('firstname',true),
			'lastname' 	  => $this->input->post('lastname',true),
			'email' 	  => $this->input->post('email',true),
			'password' 	  => md5($this->input->post('password')),
			'about' 	  => $this->input->post('about',true),
			'image'   	  => (!empty($image)?$image:$this->input->post('old_image',true)),
			'last_login'  => null,
			'last_logout' => null,
			'counter' => $this->input->post('ismonitor'),
			'ip_address'  => null,
			'status'      => $this->input->post('status',true),
			'is_admin'    => 0
		);

		/*-----------------------------------*/
		if ($this->form_validation->run()) {

	        if (empty($userLevelData['image'])) {
				$this->session->set_flashdata('exception', $this->upload->display_errors()); 
	        }

			if (empty($userLevelData['id'])) {
				if ($this->user_model->create($userLevelData)) {
					// Prepare employee_history data with available values
					$employee_history = array(
						'emp_id'		=> $this->db->insert_id(), // Get newly inserted user ID
						'employee_no'   => generate_employee_no($this->db->insert_id()), // Get newly inserted user ID
						'first_name'    => $this->input->post('firstname', true),
						'last_name'     => $this->input->post('lastname', true),
						'email'         => $this->input->post('email', true),
						'picture'       => (!empty($image) ? $image : $this->input->post('old_image', true)),
						'is_admin'      => 0,
						'pos_id'        => '6', // Default or placeholder
						'division_id'   => 0,
						'state'         => '',
						'city'          => '',
						'zip'           => 0,
						'citizenship'   => 0,
						'duty_type'     => 0,
						'hire_date'     => date('Y-m-d'),
						'original_hire_date' => date('Y-m-d'),
						'termination_date' => '0000-00-00',
						'termination_reason' => '',
						'voluntary_termination' => 0,
						'rehire_date' => '0000-00-00',
						'rate_type' => 0,
						'rate' => 0,
						'pay_frequency' => 0,
						'pay_frequency_txt' => '',
						'hourly_rate2' => 0,
						'hourly_rate3' => 0,
						'home_department' => '',
						'department_text' => '',
						'super_visor_id' => '0',
						'supervisor_report' => '',
						'dob' => date('Y-m-d'),
						'gender' => 0,
						'marital_status' => 0,
						'ethnic_group' => '',
						'eeo_class_gp' => '',
						'work_in_state' => 0,
						'live_in_state' => 0,
						'home_email' => '',
						'business_email' => '',
						'home_phone' => '',
						'business_phone' => '',
						'cell_phone' => '',
						'emerg_contct' => '',
						'emrg_h_phone' => '',
						'emrg_w_phone' => '',
						'emgr_contct_relation' => '',
						'alt_em_contct' => '',
						'alt_emg_h_phone' => '',
						'alt_emg_w_phone' => ''
					);
					
					// Load the model and insert history
					$this->user_model->insert_employee_history($employee_history);
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect("dashboard/user/form/");

			} else {
				if ($this->user_model->update($userLevelData)) {
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				redirect("dashboard/user/form/$id");
			}


		} else {
			$data['module'] = "dashboard";  
			$data['page']   = "user/form"; 
			if(!empty($id))
			$data['user']   = $this->user_model->single($id);
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
}
