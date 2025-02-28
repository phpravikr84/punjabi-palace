<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModifiersGroups extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'modifiers_model',
            'modifiergroups_model',
            'menumodifiergroups_model',
            'logs_model'
        ));
    }

    // Display the list of modifier groups and modifiers
    public function index()
    {
        $this->permission->method('itemmanage', 'read')->redirect();
        $data['title'] = display('modifiers_list');

        // Pagination settings
        $config["base_url"] = base_url('itemmanage/modifiers/index');
        $config["total_rows"] = $this->modifiers_model->count_modifier_groups();
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

        $data["modifier_groups"] = $this->modifiers_model->read_modifier_groups($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        $settinginfo = $this->modifiers_model->settinginfo();
        $data['currency'] = $this->modifiers_model->currencysetting($settinginfo->currency);

        $data['module'] = "itemmanage";
        $data['page'] = "modifiers_groups_list";   
        echo Modules::run('template/layout', $data); 
    }

    // Create a new modifier group
    public function create_modifier_group()
    {
        $this->form_validation->set_rules('name', 'Modifier Group Name', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'is_required' => $this->input->post('is_required') ? 1 : 0,
                'min_selection' => $this->input->post('min_selection'),
                'max_selection' => $this->input->post('max_selection'),
            );

            if ($this->modifiers_model->create_modifier_group($data)) {
                $this->session->set_flashdata('message', 'Modifier group created successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to create modifier group.');
            }
        }
        redirect('itemmanage/modifiers');
    }

    // Create a new modifier
    public function create_modifier()
    {
        $this->form_validation->set_rules('name', 'Modifier Name', 'required');
        $this->form_validation->set_rules('group_id', 'Modifier Group', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'group_id' => $this->input->post('group_id'),
                'name' => $this->input->post('name'),
                'cost_price' => $this->input->post('cost_price'),
                'sell_price' => $this->input->post('sell_price'),
                'is_default' => $this->input->post('is_default') ? 1 : 0,
            );

            if ($this->modifiers_model->create_modifier($data)) {
                $this->session->set_flashdata('message', 'Modifier created successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to create modifier.');
            }
        }
        redirect('itemmanage/modifiers');
    }

    // Delete a modifier group
    public function delete_modifier_group($id)
    {
        if ($this->modifiers_model->delete_modifier_group($id)) {
            $this->session->set_flashdata('message', 'Modifier group deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete modifier group.');
        }
        redirect('itemmanage/modifiers');
    }

    // Delete a modifier
    public function delete_modifier($id)
    {
        if ($this->modifiers_model->delete_modifier($id)) {
            $this->session->set_flashdata('message', 'Modifier deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete modifier.');
        }
        redirect('itemmanage/modifiers');
    }

    // Update a modifier group
    public function update_modifier_group()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'is_required' => $this->input->post('is_required') ? 1 : 0,
            'min_selection' => $this->input->post('min_selection'),
            'max_selection' => $this->input->post('max_selection'),
        );

        if ($this->modifiers_model->update_modifier_group($data)) {
            $this->session->set_flashdata('message', 'Modifier group updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update modifier group.');
        }
        redirect('itemmanage/modifiers');
    }

    // Update a modifier
    public function update_modifier()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'group_id' => $this->input->post('group_id'),
            'name' => $this->input->post('name'),
            'cost_price' => $this->input->post('cost_price'),
            'sell_price' => $this->input->post('sell_price'),
            'is_default' => $this->input->post('is_default') ? 1 : 0,
        );

        if ($this->modifiers_model->update_modifier($data)) {
            $this->session->set_flashdata('message', 'Modifier updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update modifier.');
        }
        redirect('itemmanage/modifiers');
    }
}
