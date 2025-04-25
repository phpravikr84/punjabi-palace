<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slots extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'slots_model',
            'logs_model'
        ));
    }
 
    public function index($id = null)
    {
        $this->permission->method('setting','read')->redirect();
        $data['title'] = display('slot_list');
        #-------------------------------#
        #pagination starts
        #
        $config["base_url"] = base_url('setting/slots/index');
        $config["total_rows"] = $this->slots_model->countlist();
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["slotlist"] = $this->slots_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['daylist'] = $this->slots_model->readdays();
        
        if(!empty($id)) {
            $data['title'] = display('slot_edit');
            $data['intinfo'] = $this->slots_model->findById($id);
        }
        #
        #pagination ends
        #   
        $data['module'] = "setting";
        $data['page'] = "slotlist";   
        echo Modules::run('template/layout', $data); 
    }
    
    public function create($id = null)
    {
        // Permissions
        $this->permission->method('setting', ($id ? 'update' : 'create'))->redirect();

        // Title
        $data['title'] = $id ? display('slot_edit') : display('add_new_slot');

        // Load necessary data
        $data['daylist'] = $this->slots_model->readdays();
        $data['intinfo'] = $id ? $this->slots_model->findById($id) : null;

        // Form validation
        $this->form_validation->set_rules('day_id', display('day'), 'required');
        $this->form_validation->set_rules('start_time', display('start_time'), 'required');
        $this->form_validation->set_rules('end_time', display('end_time'), 'required');
        $this->form_validation->set_rules('is_active', display('status'), 'required');


        if ($this->form_validation->run()) {
            $postData = [
                'slot_id'    => $this->input->post('slot_id'),
                'day_id'     => $this->input->post('day_id', true),
                'start_time' => $this->input->post('start_time', true),
                'end_time'   => $this->input->post('end_time', true),
                'is_active'  => $this->input->post('is_active', true),
            ];

            $logData = [
                'action_page' => "Slot List",
                'action_done' => ($id ? "Update Data" : "Insert Data"),
                'remarks'     => ($id ? "Slot Updated" : "New Slot Created"),
                'user_name'   => $this->session->userdata('fullname'),
                'entry_date'  => date('Y-m-d H:i:s'),
            ];
           
            $id = $this->input->post('slot_id');
            if (empty($id)) {
                if ($this->slots_model->create($postData)) {
                    $this->logs_model->log_recorded($logData);
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
            } else {
                if ($this->slots_model->update($postData)) {
                    $this->logs_model->log_recorded($logData);
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
            }

            redirect('setting/slots/index');
        } else {
            // Render view with form
            $data['module'] = "setting";
            $data['page']   = "slotedit";
            echo Modules::run('template/layout', $data);
        }
    }

    
    public function updateintfrm($id)
    {
        $this->permission->method('setting','update')->redirect();
        $data['title'] = display('slot_edit');
        $data['intinfo'] = $this->slots_model->findById($id);
        $data['daylist'] = $this->slots_model->readdays();
        $data['module'] = "setting";  
        $data['page'] = "slotedit";
        $this->load->view('setting/slotedit', $data);   
    }
 
    public function delete($id = null)
    {
        $this->permission->module('setting','delete')->redirect();
        $logData = [
            'action_page' => "Slot List",
            'action_done' => "Delete Data", 
            'remarks' => "Slot Deleted",
            'user_name' => $this->session->userdata('fullname'),
            'entry_date' => date('Y-m-d H:i:s'),
        ];
        
        if ($this->slots_model->delete($id)) {
            $this->logs_model->log_recorded($logData);
            $this->session->set_flashdata('message',display('delete_successfully'));
        } else {
            $this->session->set_flashdata('exception',display('please_try_again'));
        }
        redirect('setting/slots/index');
    }
}