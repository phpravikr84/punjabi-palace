<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_adjustment extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'stock_adjustment_model',
            'logs_model'
        ]);
    }

    public function index($id = null)
    {
        $this->permission->method('setting', 'read')->redirect();


        $data['title'] = display('stock_adjustment_list');
        
        // Pagination
        $config["base_url"] = base_url('setting/stock_adjustment/index');
        $config["total_rows"] = $this->stock_adjustment_model->count_all();
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;

        // Pagination UI settings
        $config = array_merge($config, $this->pagination_config());

        

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

      
        $data["adjustments"] = $this->stock_adjustment_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        

        if (!empty($id)) {
            $data['title'] = display('update_stock_adjustment');
            $data['info'] = $this->stock_adjustment_model->findById($id);
        }

       

        $data['module'] = "setting";
        $data['page'] = "stock_adjustmentlist";
        echo Modules::run('template/layout', $data);
    }

    public function create($id = null)
    {
        $this->permission->method('setting', $id ? 'update' : 'create')->redirect();

        $data['title'] = $id ? display('update_stock_adjustment') : display('add_stock_adjustment');

        // Form validation rules
        $this->form_validation->set_rules('ingredient_id', 'Ingredient', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
        $this->form_validation->set_rules('adjustment_date', 'Adjustment Date', 'required');
        $this->form_validation->set_rules('reason', 'Reason', 'required');
        $this->form_validation->set_rules('operation', 'Adjustment Type', 'required'); // Add validation for operation

        // Get posted values
        $quantity = (float)$this->input->post('quantity', true);
        $operation = $this->input->post('operation', true); // 'add' or 'subtract'
        $adjusted_qty = ($operation === 'subtract') ? -abs($quantity) : abs($quantity); // Fix quantity sign

        // Map form fields to DB columns
        $postData = [
            'id' => $this->input->post('id'),
            'ingredient_id' => $this->input->post('ingredient_id', true),
            'adjusted_qty' => $adjusted_qty,
            'adjustment_date' => date('Y-m-d', strtotime($this->input->post('adjustment_date', true))),
            'note' => $this->input->post('reason', true),
            'responsible_person' => $this->session->userdata('fullname'),
            'added_by' => $this->session->userdata('id'),
        ];

        $data['info'] = (object) $postData;

        if ($this->form_validation->run()) {
            if (empty($postData['id'])) {
                // Insert
                if ($this->stock_adjustment_model->create($postData)) {
                    $this->log_action('Insert', 'Stock Adjustment Created');

                    // Update ingredient stock
                    $this->db->set('stock_qty', "stock_qty + ({$adjusted_qty})", false)
                            ->where('id', $postData['ingredient_id'])
                            ->update('ingredients');

                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
            } else {
                // Update
                if ($this->stock_adjustment_model->update($postData)) {
                    $this->log_action('Update', 'Stock Adjustment Updated');
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
            }

            redirect("setting/stock_adjustment/create");
        } else {
            if (!empty($id)) {
                $data['info'] = $this->stock_adjustment_model->findById($id);
            }

            // Ingredient list
            $data['ingredients'] = $this->db->select('id, ingredient_name')
                ->from('ingredients')
                ->where('status', 0)
                ->where('is_active', 1)
                ->order_by('ingredient_name', 'asc')
                ->get()
                ->result();

            $data['module'] = "setting";
            $data['page'] = "stock_adjustmentcreate";
            echo Modules::run('template/layout', $data);
        }
    }


    public function updatefrm($id)
    {
        $this->permission->method('setting', 'update')->redirect();
        $data['title'] = display('update_stock_adjustment');
        $data['info'] = $this->stock_adjustment_model->findById($id);
        $data['module'] = "setting";
        $data['page'] = "stock_adjustmentedit";
        $this->load->view('setting/stock_adjustmentedit', $data);
    }

    public function delete($id = null)
    {
        $this->permission->method('setting', 'delete')->redirect();
        if ($this->stock_adjustment_model->delete($id)) {
            $this->log_action('Delete', 'Stock Adjustment Deleted');
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("setting/stock_adjustment/index");
    }

    private function pagination_config()
    {
        return [
            "last_link" => "Last",
            "first_link" => "First",
            'next_link' => 'Next',
            'prev_link' => 'Prev',
            'full_tag_open' => "<ul class='pagination col-xs pull-right'>",
            'full_tag_close' => "</ul>",
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='disabled'><li class='active'><a href='#'>",
            'cur_tag_close' => "<span class='sr-only'></span></a></li>",
            'next_tag_open' => "<li>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tagl_close' => "</li>",
            'first_tag_open' => "<li>",
            'first_tagl_close' => "</li>",
            'last_tag_open' => "<li>",
            'last_tagl_close' => "</li>"
        ];
    }

    private function log_action($action, $remarks)
    {
        $logData = [
            'action_page' => "Stock Adjustment",
            'action_done' => "{$action} Data",
            'remarks' => $remarks,
            'user_name' => $this->session->userdata('fullname'),
            'entry_date' => date('Y-m-d H:i:s'),
        ];
        $this->logs_model->log_recorded($logData);
    }

    // Get ingredient item for AJAX requests
    public function getIngredientItem()
    {
        $id = $this->input->get('id');
        $ingredient = $this->db->get_where('ingredients', ['id' => $id])->row();

        if ($ingredient) {
            $cspt = get_unit_detail($ingredient->consumption_unit);
            $purchase_units = get_unit_detail($ingredient->uom_id);
            echo json_encode([[
                'id' => $ingredient->id,
                'label' => $ingredient->ingredient_name,
                'purchase_price' => $ingredient->purchase_price,
                'uom_id' => $ingredient->uom_id,
                'pack_size' => $ingredient->pack_size,
                'convt_ratio' => $ingredient->convt_ratio,
                'stock_qty' => $ingredient->stock_qty,
                
                'purchase_qty' => round(get_quantity_purchase_unit($ingredient->id, $ingredient->stock_qty), 1),
                'purchase_unit_name' => $purchase_units['uom_short_code'],
                'consumption_unit_name' => $cspt['uom_short_code'],
            ]]);
        } else {
            echo json_encode([]);
        }
    }

}
