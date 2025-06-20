<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waste extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'waste_model',
        ));

            $this->load->model([
            'itemmanage/category_model',
            'itemmanage/fooditem_model',
            'itemmanage/foodvarient_model',
            'itemmanage/foodavailable_model',
            'itemmanage/todaymenu_model',
            'itemmanage/waste_model',
            'dashboard/user_model',
            'setting/ingradient_model'
        ]);
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->permission->method('itemmanage', 'read')->redirect();

        $data['title'] = display('waste_list');

        // Correct pagination config
        $config["base_url"] = base_url('itemmanage/waste/index');
        $config["total_rows"] = $this->waste_model->count_all(); // Corrected model
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;

        // Pagination UI setup
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config["first_link"] = "First";
        $config["last_link"] = "Last";

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        // Ensure model method supports pagination
        $data["wastes"] = $this->waste_model->get_all_paginated($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "itemmanage";
        $data['page'] = "waste_list";
        echo Modules::run('template/layout', $data);
    }

    public function form($id = null)
    {
        $this->permission->method('itemmanage', 'create')->redirect();

        $data['title'] = $id ? display('edit_waste') : display('add_waste');
        $data['users'] = $this->user_model->get_all();
        $data['ingredients'] = $this->ingradient_model->get_purchased_ingredients();
        $data['foods'] = $this->fooditem_model->get_food_menus();

        if ($id) {
            $data['editdata'] = $this->waste_model->get_by_id($id);
            $data['waste_items'] = $this->waste_model->get_items($id);
        } else {
            $data['last_id'] = $this->waste_model->get_next_ref_id();
        }

        $data['module'] = "itemmanage";
        $data['page'] = "waste_form";
        echo Modules::run('template/layout', $data);
    }

    public function view($id = null)
    {
        $this->permission->method('itemmanage', 'read')->redirect();

        if (empty($id)) {
            show_404();
        }

        $data['title'] = "Waste Detail";

        $waste = $this->waste_model->get_detail_by_id($id);

        
        if (empty($waste)) {
            show_404();
        }

        $data['waste'] = $waste;

        $data['module'] = "itemmanage";
        $data['page'] = "waste_detail";

        echo Modules::run('template/layout', $data);
    }


    public function save($id = null)
    {
        // echo '<pre>';
        // print_r($this->input->post());
        // echo '</pre>';
        // exit;
        $this->permission->method('itemmanage', $id ? 'update' : 'create')->redirect();

        // Validation
        $this->form_validation->set_rules('reference_no', 'Reference No', 'required');
        $this->form_validation->set_rules('waste_date', 'Waste Date', 'required');
        $this->form_validation->set_rules('user_id', 'Responsible Person', 'required');
        $this->form_validation->set_rules('waste_type', 'Waste Type', 'required');

        $type = $this->input->post('waste_type');

        if ($type === 'ingredient') {
            if (empty($this->input->post('item_id'))) {
                $this->form_validation->set_rules('item_id[]', 'Ingredient', 'required');
            }
             if (empty($this->input->post('qty'))) {
                $this->form_validation->set_rules('qty[]', 'Quantity', 'required');
            }
        } else {
            $this->form_validation->set_rules('food_id', 'Food', 'required');
            $this->form_validation->set_rules('food_variant', 'Variant', 'required');
            $this->form_validation->set_rules('food_wastage', 'Food Wastage', 'required|numeric');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->form($id); // Show form with errors
            return;
        }

        $post = $this->input->post();
        $is_edit = !empty($id);

        if ($is_edit) {
            $this->waste_model->update($id, $post);
            $this->waste_model->delete_items($id);
        } else {
            $id = $this->waste_model->insert($post);
        }

        if ($type === 'ingredient') {
            $this->waste_model->insert_ingredients($id, $post);
        } else {
            $this->waste_model->insert_food($id, $post);
        }

        $msg = $is_edit ? display('update_successfully') : display('save_successfully');
        $this->session->set_flashdata('message', $msg);
        redirect('itemmanage/waste');
    }

    public function update($id = null)
    {
        $this->permission->method('itemmanage', 'update')->redirect();

        $post = $this->input->post();
        $this->waste_model->update($id, $post);
        $this->waste_model->delete_items($id);

        if ($post['waste_type'] === 'ingredient') {
            $this->waste_model->insert_ingredients($id, $post);
        } else {
            $this->waste_model->insert_food($id, $post);
        }

        $this->session->set_flashdata('message', display('update_successfully'));
        redirect('itemmanage/waste');
    }

    // public function get_food_ingredients()
    // {
    //     $food_id = $this->input->post('food_id');
    //     $variant_id = $this->input->post('variant_id');
    //     $ingredients = $this->waste_model->get_food_ingredients($food_id, $variant_id);
    //     echo json_encode($ingredients);
    // }

    public function get_food_ingredients($food_id)
    {
        $ingredients = $this->db->select('i.id, i.ingredient_name, i.stock_qty, pd.unitname as unit')
            ->from('production_details pd')
            ->join('ingredients i', 'i.id = pd.ingredientid')
            ->where('pd.foodid', $food_id)
            ->group_by('i.id')
            ->get()
            ->result();

        echo json_encode($ingredients);
    }


    public function get_food_variants($food_id)
    {
        $variants = $this->db->select('variantid, variantName')
            ->from('variant')
            ->where('menuid', $food_id)
            ->get()
            ->result();

        echo json_encode($variants);
    }

    public function get_food_variant_ingredients($food_id, $variant_id)
    {
        $ingredients = $this->db->select('i.id, i.ingredient_name, pd.qty, pd.unitname, i.cost_perunit, i.consumption_unit')
            ->from('production_details pd')
            ->join('ingredients i', 'i.id = pd.ingredientid')
            ->where('pd.foodid', $food_id)
            ->where('pd.pvarientid', $variant_id)
            ->get()
            ->result();

        echo json_encode($ingredients);
    }

    public function calculate_loss_amount($item_id, $unit_id, $qty, $ingredient_status = 0)
    {
        // echo 'calculate_loss_amount';
        // exit;
        // $item_id           = $this->input->get('item_id');
        // $unit_id           = $this->input->get('unit_id');
        // $qty               = $this->input->get('qty');
        // $ingredient_status = $this->input->get('ingredient_status');
        // echo 'item_id: '.$item_id;
        // exit;

        // Optional: Validate input
        // if (!$item_id || !$unit_id || !$qty) {
        //     echo json_encode(['success' => false, 'message' => 'Invalid input']);
        //     return;
        // }

        // echo 'item_id: '.$item_id.'<br>';
        // echo 'unit_id: '.$unit_id.'<br>';  
        // echo 'qty: '.$qty.'<br>';
        // echo 'ingredient_status: '.$ingredient_status.'<br>';
        // exit;

        // Get cost per unit
        if ($ingredient_status == 1) {
            $cost_per_unit = $this->waste_model->get_cost_per_unit($item_id, $unit_id, $ingredient_status);
        } else {
            $cost_per_unit = $this->waste_model->get_cost_per_unit($item_id, $unit_id);
        }

        if ($cost_per_unit !== null) {
            // echo 'cost_per_unit: '.$cost_per_unit.'<br>';
            // echo 'qty: '.$qty.'<br>';
            // exit;
            $loss_amount = $qty * $cost_per_unit;
            echo json_encode(['success' => true, 'loss_amount' => number_format($loss_amount, 5)]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No cost data found']);
        }
    }

    public function delete($id = null)
    {
        $this->permission->method('itemmanage', 'delete')->redirect();

        if (empty($id)) {
            $this->session->set_flashdata('exception', 'Invalid ID.');
            redirect('itemmanage/waste');
        }

        // First, delete related items
        $this->db->where('waste_id', $id)->delete('waste_management_items');

        // Then delete the waste record
        if ($this->db->where('id', $id)->delete('waste_management')) {
            $this->session->set_flashdata('message', 'Waste entry deleted successfully.');
        } else {
            $this->session->set_flashdata('exception', 'Failed to delete the record.');
        }

        redirect('itemmanage/waste');
    }

}
