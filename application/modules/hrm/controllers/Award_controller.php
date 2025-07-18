<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Award_controller extends MX_Controller {

public function __construct()
	{
		parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'Award_model'
		));		 
	}

public function award_view()
	{   
        $this->permission->method('hrm','read')->redirect();

		$data['title']    = display('award');  ;
		$data['mang']   = $this->Award_model->award_view();
		$data['module']   = "hrm";
		$data['page']     = "award_view";   
		echo Modules::run('template/layout', $data); 
	}





public function create_award()
    { 
         $this->permission->method('hrm','create')->redirect();
		 $this->form_validation->set_rules('award_name',display('award_name'));
		$this->form_validation->set_rules('aw_description',display('aw_description'));
		$this->form_validation->set_rules('awr_gift_item',display('awr_gift_item'),'max_length[50]');
		$this->form_validation->set_rules('date',display('date')  ,'max_length[50]');
		
        $this->form_validation->set_rules('employee_no',display('employee_no')  ,'max_length[50]');
        $this->form_validation->set_rules('awarded_by',display('awarded_by')  ,'max_length[50]');
      
        #-------------------------------#
        if ($this->form_validation->run() === true) {

           
           
				$postData = [
			'award_name' 	              => $this->input->post('award_name',true),
				'aw_description'             =>$this->input->post('aw_description',true),
			'awr_gift_item' 	                  => $this->input->post('awr_gift_item',true),
			'date' 	          => $this->input->post('date',true),
			
                'employee_no' => $this->input->post('employee_no',true),
                'awarded_by' => $this->input->post('awarded_by',true),
                
            ];   

            if ($this->Award_model->award_create($postData)) { 
                $this->session->set_flashdata('message', display('successfully_created'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/Award_controller/create_award");



        } else {
            $data['title']  = display('award');
            $data['module'] = "hrm";//
            $data['mang']   = $this->Award_model->award_view();
             $data['dropdown']   = $this->Award_model->dropdown();
            $data['page']   = "award_form";   
          echo Modules::run('template/layout', $data); 
        }   
    }


public function delete_award($id = null) 
	{ 
        $this->permission->method('hrm','delete')->redirect();

		if ($this->Award_model->award_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));

		}
		redirect("hrm/Award_controller/award_view");
	}

	public function update_award_form($id = null)
    { 
        $data['title'] = display('award');
		$this->permission->method('hrm','update')->redirect();
        #-------------------------------#
         $this->form_validation->set_rules('award_id',display('award_id'));
       $this->form_validation->set_rules('award_name',display('award_name'));
        $this->form_validation->set_rules('aw_description',display('aw_description'));
        $this->form_validation->set_rules('awr_gift_item',display('awr_gift_item'),'max_length[50]');
        $this->form_validation->set_rules('date',display('date')  ,'max_length[50]');
        
        $this->form_validation->set_rules('employee_no',display('employee_no')  ,'max_length[50]');
        $this->form_validation->set_rules('awarded_by',display('awarded_by')  ,'max_length[50]');
        
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            $Data = [    'award_id'  =>$this->input->post('award_id',true),
    
   'award_name'                   => $this->input->post('award_name',true),
                'aw_description'             =>$this->input->post('aw_description',true),
            'awr_gift_item'                       => $this->input->post('awr_gift_item',true),
            'date'            => $this->input->post('date',true),
            
                'employee_no' => $this->input->post('employee_no',true),
                'awarded_by' => $this->input->post('awarded_by',true),

       
            ];   

            if ($this->Award_model->update_award($Data)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/Award_controller/award_view");



        } else {
           $data['title']      = display('update');
            $data['data']      =$this->Award_model->award_updateForm($id);
            $data['dropdown']   = $this->Award_model->dropdown();
            $data['bb']        =$this->Award_model->get_id($id);
            $data['module']    = "hrm";    
            $data['page']      = "update_award_form";   
            echo Modules::run('template/layout', $data);  
        }   
    }

     

}
