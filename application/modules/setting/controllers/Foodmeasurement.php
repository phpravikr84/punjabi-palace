<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodUnitMeasurement extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('foodunit_model', 'logs_model'));
    }

    public function index()
    {
        echo 'hi';
        exit;
        $this->permission->method('setting', 'read')->redirect();

        $data['title'] = 'Food Unit List'; 

        // Pagination settings
        $config["base_url"] = base_url('setting/foodunitmeasurement/index');
        $config["total_rows"] = $this->foodunit_model->count_units();
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        // Fetch units where is_foodunit = 1
        $data["food_units"] = $this->foodunit_model->get_food_units($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $data['module'] = "setting";
        $data['page'] = "foodunitlist";   
        echo Modules::run('template/layout', $data); 
    }
    
    public function create($id = null)
    {
        $this->permission->method('setting', 'create')->redirect();
        
        $this->form_validation->set_rules('uomid', 'Unit', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
        $this->form_validation->set_rules('quantity_measure', 'Measure', 'required');

        $data['food_unit'] = (object) $postData = [
            'id' => $this->input->post('id'),
            'uomid' => $this->input->post('uomid'),
            'quantity' => $this->input->post('quantity'),
            'quantity_measure' => $this->input->post('quantity_measure')
        ];

        if ($this->form_validation->run()) {
            if (empty($this->input->post('id'))) {
                if ($this->foodunit_model->create_unit($postData)) {
                    $this->session->set_flashdata('message', 'Unit added successfully');
                } else {
                    $this->session->set_flashdata('exception', 'Please try again');
                }
                redirect('setting/foodunitmeasurement/index');
            } else {
                if ($this->foodunit_model->update_unit($postData)) {
                    $this->session->set_flashdata('message', 'Unit updated successfully');
                } else {
                    $this->session->set_flashdata('exception', 'Please try again');
                }
                redirect('setting/foodunitmeasurement/index');
            }
        } else {
            if (!empty($id)) {
                $data['food_unit'] = $this->foodunit_model->findById($id);
            }
            $data['unit_options'] = $this->foodunit_model->get_food_uom_options();
            $data['module'] = "setting";
            $data['page'] = "foodunitedit";   
            echo Modules::run('template/layout', $data); 
        }
    }

    public function delete($id = null)
    {
        $this->permission->method('setting', 'delete')->redirect();
        
        if ($this->foodunit_model->delete_unit($id)) {
            $this->session->set_flashdata('message', 'Unit deleted successfully');
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('setting/foodunitmeasurement/index');
    }
}
