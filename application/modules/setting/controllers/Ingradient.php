<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingradient extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'ingradient_model',
			'unit_model',
			'logs_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('setting','read')->redirect();
        $data['title']    = display('ingradient_list'); 
        #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('setting/ingradient/index');
        $config["total_rows"]  = $this->ingradient_model->count_ingredient();
        $config["per_page"]    = 25;
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
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["ingredientlist"] = $this->ingradient_model->read_ingredient($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		if(!empty($id)) {
		$data['title'] = display('unit_update');
		$data['intinfo']   = $this->unit_model->findById($id);
	   }
	    $data['unitdropdown']   =  $this->unit_model->ingredient_dropdown();
        #
        #pagination ends
        #
		//Add brands list
		$data['brands'] = $this->ingradient_model->get_all_brands();

        $data['module'] = "setting";
        $data['page']   = "ingredientlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    // public function create($id = null)
    // {
	//   $this->permission->method('setting','create')->redirect();
	//   $data['title'] = display('add_ingredient');
	//   #-------------------------------#
	// 	$this->form_validation->set_rules('ingredientname',display('ingredient_name'),'required|max_length[50]');
	// 	$this->form_validation->set_rules('unitid',display('unit_name')  ,'required');
	// 	$this->form_validation->set_rules('status', display('status')  ,'required');
	   
	//   $data['intinfo']="";
	//   $data['units']   = (Object) $postData = [
	//    'id'     => $this->input->post('id'),
	//    'ingredient_name' 	 => $this->input->post('ingredientname',true),
	//    'uom_id' 	 		 => $this->input->post('unitid',true),
	//    'min_stock'       => $this->input->post('min_stock',true),
	//    'is_active' 	 	     => $this->input->post('status',true),
	//   ];
	//   if ($this->form_validation->run()) { 
	//    if (empty($this->input->post('id'))) {
	// 	$this->permission->method('setting','create')->redirect();
		
	//  $logData = [
	//    'action_page'         => "Ingredient List",
	//    'action_done'     	 => "Insert Data", 
	//    'remarks'             => "New Ingredient Created",
	//    'user_name'           => $this->session->userdata('fullname'),
	//    'entry_date'          => date('Y-m-d H:i:s'),
	//   ];
	// 	if ($this->ingradient_model->unit_ingredient($postData)) { 
	// 	 $this->logs_model->log_recorded($logData);
	// 	    $this->db->select('*');
	// 		$this->db->from('ingredients');
	// 		$this->db->where('is_active',1);
	// 		$query = $this->db->get();
	// 		foreach ($query->result() as $row) {
	// 			$json_product[] = array('label'=>$row->ingredient_name,'value'=>$row->id);
	// 		}
	// 		$cache_file = './assets/js/indredient.json';
	// 		$productList = json_encode($json_product);
	// 		file_put_contents($cache_file,$productList);
	// 	 $this->session->set_flashdata('message', display('save_successfully'));
	// 	 redirect('setting/ingradient/index');
	// 	} else {
	// 	 $this->session->set_flashdata('exception',  display('please_try_again'));
	// 	}
	// 	redirect("setting/ingradient/index"); 
	
	//    } else {
	// 	$this->permission->method('setting','update')->redirect();
	//   $logData = [
	//    'action_page'         => "Ingredient List",
	//    'action_done'     	 => "Update Data", 
	//    'remarks'             => "Ingredient Updated",
	//    'user_name'           => $this->session->userdata('fullname'),
	//    'entry_date'          => date('Y-m-d H:i:s'),
	//   ];

	// 	if ($this->ingradient_model->update_ingredient($postData)) { 
	// 	 $this->logs_model->log_recorded($logData);
	// 	 $this->db->select('*');
	// 		$this->db->from('ingredients');
	// 		$this->db->where('is_active',1);
	// 		$query = $this->db->get();
	// 		foreach ($query->result() as $row) {
	// 			$json_product[] = array('label'=>$row->ingredient_name,'value'=>$row->id);
	// 		}
	// 		$cache_file = './assets/js/indredient.json';
	// 		$productList = json_encode($json_product);
	// 		file_put_contents($cache_file,$productList);
	// 	 $this->session->set_flashdata('message', display('update_successfully'));
	// 	} else {
	// 	$this->session->set_flashdata('exception',  display('please_try_again'));
	// 	}
	// 	redirect("setting/ingradient/index");  
	//    }
	//   } else { 
	//    if(!empty($id)) {
	// 	$data['title'] = display('update_ingredient');
	// 	$data['intinfo']   = $this->ingradient_model->findById($id);
	//    }
	   
	//    $data['module'] = "setting";
	//    $data['page']   = "ingredientlist";   
	//    echo Modules::run('template/layout', $data); 
	//    }   
 
    // }

	// public function create($id = null)
	// {
	// 	$this->permission->method('setting', ($id ? 'update' : 'create'))->redirect();

	// 	$data['title'] = $id ? display('update_ingredient') : display('add_ingredient');

	// 	$this->form_validation->set_rules('ingredient_name', display('ingredient_name'), 'required|max_length[50]');
	// 	$this->form_validation->set_rules('pack_size', 'Pack Size', 'required');
	// 	$this->form_validation->set_rules('unitid', 'Purchase Unit', 'required');
	// 	$this->form_validation->set_rules('consumption_unit', 'Consumption Unit', 'required');
	// 	$this->form_validation->set_rules('pack_unit', 'Pack Unit', 'required');
	// 	$this->form_validation->set_rules('is_active', display('is_active'), 'required');

	// 	$postData = [
	// 		'id'                => $this->input->post('id'),
	// 		'ingredient_name'   => $this->input->post('ingredient_name', true),
	// 		'purchase_price'    => $this->input->post('purchase_price', true),
	// 		'cost_perunit'      => $this->input->post('cost_perunit', true),
	// 		'min_stock'         => $this->input->post('min_stock', true),
	// 		'uom_id'     		=> $this->input->post('unitid', true),
	// 		'consumption_unit'  => $this->input->post('consumption_unit', true),
	// 		'convt_ratio'       => $this->input->post('convt_ratio', true),
	// 		'is_active'         => $this->input->post('is_active', true),
	// 		'brand_id'        => $this->input->post('brand_id', true),
	// 		'pack_unit'         => $this->input->post('pack_unit', true),
	// 		'pack_size'			=> $this->input->post('pack_size', true),
	// 	];

	// 	$data['intinfo'] = "";
	// 	$data['units'] = (object) $postData;


	// 	if ($this->form_validation->run()) {
	// 		if (empty($postData['id'])) {
	// 			$logData = [
	// 				'action_page' => "Ingredient List",
	// 				'action_done' => "Insert Data",
	// 				'remarks'     => "New Ingredient Created",
	// 				'user_name'   => $this->session->userdata('fullname'),
	// 				'entry_date'  => date('Y-m-d H:i:s'),
	// 			];

	// 			if ($this->ingradient_model->unit_ingredient($postData)) {
	// 				$ingredient_id = $this->db->insert_id();
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->_update_cache();
	// 				//Check if opening balance and opening date is in post
	// 				$opening_balance = $this->input->post('opening_balance', true);
	// 				$opening_date = $this->input->post('opening_date', true);

	// 				if (!empty($opening_balance) && !empty($opening_date)) {
	// 					//Update also stock in ingredients table as opening balance
	// 					$opening_balance = get_quantity_consumption_unit($ingredient_id, $this->input->post('opening_balance', true));
	// 					$openstockData = array(
	// 						'ingredient_name'    => $this->input->post('ingredient_name', true),
	// 						'ingredient_id'       => $ingredient_id,
	// 						'purchase_price'     => $this->input->post('purchase_price', true),
	// 						//'opening_balance'    => $this->input->post('opening_balance', true),
	// 						'opening_balance'    => $opening_balance,
	// 						'opening_date'       => date('Y-m-d', strtotime($this->input->post('opening_date', true))), // fixed typo & brackets
	// 						'is_active'          => 1
	// 					);
						
	// 					$this->ingradient_model->ingredient_opening_stock($openstockData);

	// 					//Update stock in ingredients table
	// 					$this->ingradient_model->update_ingredient(array(
	// 						'id' => $ingredient_id,
	// 						'stock_qty' => $opening_balance,
	// 					));
						
	// 				}

					

	// 				$this->session->set_flashdata('message', display('save_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception', display('please_try_again'));
	// 			}
	// 		} else {
	// 			$logData = [
	// 				'action_page' => "Ingredient List",
	// 				'action_done' => "Update Data",
	// 				'remarks'     => "Ingredient Updated",
	// 				'user_name'   => $this->session->userdata('fullname'),
	// 				'entry_date'  => date('Y-m-d H:i:s'),
	// 			];

	// 			if ($this->ingradient_model->update_ingredient($postData)) {
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->_update_cache();
	// 				$this->session->set_flashdata('message', display('update_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception', display('please_try_again'));
	// 			}
	// 		}
	// 		redirect("setting/ingradient/index");
	// 	} else {
	// 		if (!empty($id)) {
	// 			$data['intinfo'] = $this->ingradient_model->findById($id);
	// 		}
	// 				//Add brands list
	// 		$data['brands'] = $this->ingradient_model->get_all_brands();

	// 		$data['module'] = "setting";
	// 		$data['page'] = "ingredientlist";
	// 		echo Modules::run('template/layout', $data);
	// 	}
	// }

	public function create($id = null)
    {
        $this->permission->method('setting', ($id ? 'update' : 'create'))->redirect();
        
        // Set JSON response header
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
        }

        $data['title'] = $id ? display('update_ingredient') : display('add_ingredient');

        $this->form_validation->set_rules('ingredient_name', display('ingredient_name'), 'required|max_length[50]');
        $this->form_validation->set_rules('pack_size', 'Pack Size', 'required');
        $this->form_validation->set_rules('unitid', 'Purchase Unit', 'required');
        $this->form_validation->set_rules('consumption_unit', 'Consumption Unit', 'required');
        $this->form_validation->set_rules('pack_unit', 'Pack Unit', 'required');
        $this->form_validation->set_rules('is_active', display('is_active'), 'required');

        $postData = [
            'id'                => $this->input->post('id'),
            'ingredient_name'   => $this->input->post('ingredient_name', true),
            'purchase_price'    => $this->input->post('purchase_price', true),
            'cost_perunit'      => $this->input->post('cost_perunit', true),
            'min_stock'         => $this->input->post('min_stock', true),
            'uom_id'            => $this->input->post('unitid', true),
            'consumption_unit'  => $this->input->post('consumption_unit', true),
            'convt_ratio'       => $this->input->post('convt_ratio', true),
            'is_active'         => $this->input->post('is_active', true),
            'brand_id'         => $this->input->post('brand_id', true),
            'pack_unit'         => $this->input->post('pack_unit', true),
            'pack_size'         => $this->input->post('pack_size', true),
        ];

        if ($this->form_validation->run()) {
            if ($this->input->is_ajax_request()) {
                if (empty($postData['id'])) {
                    $logData = [
                        'action_page' => "Ingredient List",
                        'action_done' => "Insert Data",
                        'remarks'     => "New Ingredient Created",
                        'user_name'   => $this->session->userdata('fullname'),
                        'entry_date'  => date('Y-m-d H:i:s'),
                    ];

                    if ($this->ingradient_model->unit_ingredient($postData)) {
                        $ingredient_id = $this->db->insert_id();
                        $this->logs_model->log_recorded($logData);
                        $this->_update_cache();
                        
                        $opening_balance = $this->input->post('opening_balance', true);
                        $opening_date = $this->input->post('opening_date', true);

                        if (!empty($opening_balance) && !empty($opening_date)) {
                            $opening_balance = get_quantity_consumption_unit($ingredient_id, $this->input->post('opening_balance', true));
                            $openstockData = array(
                                'ingredient_name'    => $this->input->post('ingredient_name', true),
                                'ingredient_id'      => $ingredient_id,
                                'purchase_price'     => $this->input->post('purchase_price', true),
                                'opening_balance'    => $opening_balance,
                                'opening_date'       => date('Y-m-d', strtotime($this->input->post('opening_date', true))),
                                'is_active'          => 1
                            );
                            
                            $this->ingradient_model->ingredient_opening_stock($openstockData);
                            $this->ingradient_model->update_ingredient(array(
                                'id' => $ingredient_id,
                                'stock_qty' => $opening_balance,
                            ));
                        }

                        echo json_encode([
                            'status' => 'success',
                            'message' => display('save_successfully')
                        ]);
                        return;
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => display('please_try_again')
                        ]);
                        return;
                    }
                } else {
                    $logData = [
                        'action_page' => "Ingredient List",
                        'action_done' => "Update Data",
                        'remarks'     => "Ingredient Updated",
                        'user_name'   => $this->session->userdata('fullname'),
                        'entry_date'  => date('Y-m-d H:i:s'),
                    ];

                    if ($this->ingradient_model->update_ingredient($postData)) {
                        $this->logs_model->log_recorded($logData);
                        $this->_update_cache();
                        echo json_encode([
                            'status' => 'success',
                            'message' => display('update_successfully')
                        ]);
                        return;
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => display('please_try_again')
                        ]);
                        return;
                    }
                }
            } else {
                // Handle non-AJAX request as before
                if (empty($postData['id'])) {
                    $logData = [
                        'action_page' => "Ingredient List",
                        'action_done' => "Insert Data",
                        'remarks'     => "New Ingredient Created",
                        'user_name'   => $this->session->userdata('fullname'),
                        'entry_date'  => date('Y-m-d H:i:s'),
                    ];

                    if ($this->ingradient_model->unit_ingredient($postData)) {
                        $ingredient_id = $this->db->insert_id();
                        $this->logs_model->log_recorded($logData);
                        $this->_update_cache();
                        $opening_balance = $this->input->post('opening_balance', true);
                        $opening_date = $this->input->post('opening_date', true);

                        if (!empty($opening_balance) && !empty($opening_date)) {
                            $opening_balance = get_quantity_consumption_unit($ingredient_id, $this->input->post('opening_balance', true));
                            $openstockData = array(
                                'ingredient_name'    => $this->input->post('ingredient_name', true),
                                'ingredient_id'      => $ingredient_id,
                                'purchase_price'     => $this->input->post('purchase_price', true),
                                'opening_balance'    => $opening_balance,
                                'opening_date'       => date('Y-m-d', strtotime($this->input->post('opening_date', true))),
                                'is_active'          => 1
                            );
                            
                            $this->ingradient_model->ingredient_opening_stock($openstockData);
                            $this->ingradient_model->update_ingredient(array(
                                'id' => $ingredient_id,
                              'stock_qty' => $opening_balance,
                            ));
                        }

                        $this->session->set_flashdata('message', display('save_successfully'));
                    } else {
                        $this->session->set_flashdata('exception', display('please_try_again'));
                    }
                } else {
                    $logData = [
                        'action_page' => "Ingredient List",
                        'action_done' => "Update Data",
                        'remarks'     => "Ingredient Updated",
                        'user_name'   => $this->session->userdata('fullname'),
                        'entry_date'  => date('Y-m-d H:i:s'),
                    ];

                    if ($this->ingradient_model->update_ingredient($postData)) {
                        $this->logs_model->log_recorded($logData);
                        $this->_update_cache();
                        $this->session->set_flashdata('message', display('update_successfully'));
                    } else {
                        $this->session->set_flashdata('exception', display('please_try_again'));
                    }
                }
                redirect("setting/ingradient/index");
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $errors = $this->form_validation->error_array();
                echo json_encode([
                    'status' => 'error',
                    'errors' => $errors
                ]);
                return;
            }

            if (!empty($id)) {
                $data['intinfo'] = $this->ingradient_model->findById($id);
            }
            $data['brands'] = $this->ingradient_model->get_all_brands();
            $data['module'] = "setting";
            $data['page'] = "ingredientlist";
            echo Modules::run('template/layout', $data);
        }
    }

	private function _update_cache()
	{
		$this->db->select('*')->from('ingredients')->where('is_active', 1);
		$query = $this->db->get();
		$json_product = [];
		foreach ($query->result() as $row) {
			$json_product[] = ['label' => $row->ingredient_name, 'value' => $row->id];
		}
		file_put_contents('./assets/js/indredient.json', json_encode($json_product));
	}

   public function updateintfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('update_ingredient');
		$data['intinfo']   = $this->ingradient_model->findById($id);
		$data['unitdropdown']   =  $this->unit_model->ingredient_dropdown();
		//Add brands list
		$data['brands'] = $this->ingradient_model->get_all_brands();
        $data['module'] = "setting";  
        $data['page']   = "ingredientedit";
		$this->load->view('setting/ingredientedit', $data);   
      
	   }
 
    public function delete($category = null)
    {
        $this->permission->module('setting','delete')->redirect();
		$logData = [
	   'action_page'         => "Ingredient List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Ingredient Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
		if ($this->ingradient_model->ingredient_delete($category)) {
			#Store data to log table.
			 $this->logs_model->log_recorded($logData);
			 $this->db->select('*');
			$this->db->from('ingredients');
			$this->db->where('is_active',1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->ingredient_name,'value'=>$row->id);
			}
			$cache_file = './assets/js/indredient.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('setting/ingradient/index');
    }

	/**
	 * Search Ingredient
	 */
	public function search_ingredient()
	{
		$term = $this->input->get('term', true);

		if (!$term) {
			echo json_encode([]);
			exit;
		}

		$data = $this->ingradient_model->get_ingredient_frm_purchase($term);

		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}

	// check_ingredient_exists
	public function check_ingredient_exist()
	{
		$term = $this->input->get('term', true);

		if (!$term) {
			echo json_encode([]);
			exit;
		}

		$data = $this->ingradient_model->check_ingredient_exists($term);

		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}

	// public function sheetupload()
	// {
	// 	header('Content-Type: application/json');

	// 	if (!isset($_FILES['ingredient_filename']) || $_FILES['ingredient_filename']['error'] !== 0) {
	// 		echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error.']);
	// 		return;
	// 	}

	// 	$file = $_FILES['ingredient_filename']['tmp_name'];
	// 	$ext = pathinfo($_FILES['ingredient_filename']['name'], PATHINFO_EXTENSION);
	// 	$allowed = ['csv', 'xls', 'xlsx'];

	// 	if (!in_array(strtolower($ext), $allowed)) {
	// 		echo json_encode(['status' => 'error', 'message' => 'Invalid file format.']);
	// 		return;
	// 	}

	// 	try {
	// 		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
	// 		$sheetData = $spreadsheet->getActiveSheet()->toArray();
	// 		$now = date('Y-m-d H:i:s');

	// 		foreach (array_slice($sheetData, 1) as $row) {
	// 			$data = [
	// 				'ingredient_name' => trim($row[1]),
	// 				'uom'             => trim($row[2]),
	// 				'price'           => floatval($row[3]),
	// 				'brand'           => trim($row[4]),
	// 				'opening_stock'   => floatval($row[5]),
	// 				'purchases'       => floatval($row[6]),
	// 				'closing_stock'   => floatval($row[7]),
	// 				'usage'           => floatval($row[8]),
	// 				'cost'            => floatval($row[9]),
	// 				'amount'          => floatval($row[10]),
	// 			];

	// 			$existing = $this->ingradient_model->get_temp_by_name($data['ingredient_name']);

	// 			if ($existing) {
	// 				$data['updated_at'] = $now;
	// 				$this->ingradient_model->update_temp($existing->id, $data);
	// 			} else {
	// 				$data['created_at'] = $now;
	// 				$data['updated_at'] = $now;
	// 				$this->ingradient_model->insert_temp($data);
	// 			}
	// 		}

	// 		echo json_encode(['status' => 'success', 'message' => 'Ingredient sheet uploaded successfully.']);
	// 	} catch (Exception $e) {
	// 		echo json_encode(['status' => 'error', 'message' => 'Error processing file: ' . $e->getMessage()]);
	// 	}
	// }


	// public function sheetupload()
	// {
	// 	$user_id = $this->session->userdata('user_id');
	// 	header('Content-Type: application/json');

	// 	if (!isset($_FILES['ingredient_filename']) || $_FILES['ingredient_filename']['error'] !== 0) {
	// 		echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error.']);
	// 		return;
	// 	}

	// 	$file = $_FILES['ingredient_filename']['tmp_name'];
	// 	$ext = pathinfo($_FILES['ingredient_filename']['name'], PATHINFO_EXTENSION);
	// 	$allowed = ['csv', 'xls', 'xlsx'];

	// 	if (!in_array(strtolower($ext), $allowed)) {
	// 		echo json_encode(['status' => 'error', 'message' => 'Invalid file format.']);
	// 		return;
	// 	}

	// 	try {
	// 		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
	// 		$sheetData = $spreadsheet->getActiveSheet()->toArray();
	// 		$now = date('Y-m-d H:i:s');
	// 		$inserted = 0;

	// 		foreach (array_slice($sheetData, 1) as $row) {
	// 			$ingredient_name = trim($row[1]);

	// 			if ($this->ingradient_model->get_temp_by_name($ingredient_name)) {
	// 				continue;
	// 			}

	// 			$pack_size = floatval($row[2]);
	// 			$pack_unit = trim($row[3]);
	// 			$price = floatval($row[4]);
	// 			$purchase_unit = trim($row[5]);
	// 			$brand_name = trim($row[6]);
	// 			$opening_stock = is_numeric($row[7]) ? floatval($row[7]) : null;
	// 			$opening_date = !empty($row[8]) ? date('Y-m-d', strtotime($row[8])) : null;
	// 			$consumption_unit = trim($row[9]);
	// 			$convt_ratio = floatval($row[10]);

	// 			$pack_unit_id = $this->ingradient_model->get_uom_id_by_short_code($pack_unit);
	// 			$purchase_unit_id = $this->ingradient_model->get_uom_id_by_short_code($purchase_unit);
	// 			$consumption_unit_id = $this->ingradient_model->get_uom_id_by_short_code($consumption_unit);
	// 			$brand_id = $this->ingradient_model->get_brand_id_by_name($brand_name);

	// 			$data = [
	// 				'ingredient_name' => $ingredient_name,
	// 				'pack_size' => $pack_size,
	// 				'pack_unit_id' => $pack_unit_id,
	// 				'purchase_price' => $price,
	// 				'purchase_unit_id' => $purchase_unit_id,
	// 				'brand_id' => $brand_id,
	// 				'opening_balance' => $opening_stock,
	// 				'opening_date' => $opening_date,
	// 				'consumption_unit_id' => $consumption_unit_id,
	// 				'convt_ratio' => $convt_ratio,
	// 				'saved_by' => $user_id,
	// 				'created_at' => $now,
	// 				'updated_at' => $now,
	// 			];

	// 			$this->ingradient_model->insert_temp($data);
	// 			$inserted++;
	// 		}

	// 		$syncResult = $this->sync_temp_to_main();

	// 		echo json_encode([
	// 			'status' => 'success',
	// 			'message' => 'File uploaded successfully.',
	// 			'total' => count($sheetData) - 1,
	// 			'inserted' => $inserted,
	// 			'sync_status' => $syncResult['status'],
	// 			'sync_message' => $syncResult['message']
	// 		]);
	// 	} catch (Exception $e) {
	// 		log_message('error', 'Upload failed: ' . $e->getMessage());
	// 		echo json_encode(['status' => 'error', 'message' => 'Error processing file: ' . $e->getMessage()]);
	// 	}
	// }

	// public function sheetupload()
	// {
	// 	$user_id = $this->session->userdata('user_id');
	// 	header('Content-Type: application/json');

	// 	if (!isset($_FILES['ingredient_filename']) || $_FILES['ingredient_filename']['error'] !== 0) {
	// 		echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error.']);
	// 		return;
	// 	}

	// 	$file = $_FILES['ingredient_filename']['tmp_name'];
	// 	$ext = pathinfo($_FILES['ingredient_filename']['name'], PATHINFO_EXTENSION);
	// 	$allowed = ['csv', 'xls', 'xlsx'];

	// 	if (!in_array(strtolower($ext), $allowed)) {
	// 		echo json_encode(['status' => 'error', 'message' => 'Invalid file format.']);
	// 		return;
	// 	}

	// 	try {
	// 		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
	// 		$sheetData = $spreadsheet->getActiveSheet()->toArray();
	// 		$now = date('Y-m-d H:i:s');
	// 		$inserted = 0;
	// 		$failed = 0;

	// 		foreach (array_slice($sheetData, 1) as $rowIndex => $row) {
	// 			$ingredient_name = trim($row[1]);
	// 			$pack_size = floatval($row[2]);
	// 			$pack_unit = trim($row[3]);
	// 			$price = floatval($row[4]);
	// 			$purchase_unit = trim($row[5]);
	// 			$brand_name = trim($row[6]);
	// 			$opening_stock = is_numeric($row[7]) ? floatval($row[7]) : null;
	// 			$opening_date = !empty($row[8]) ? date('Y-m-d', strtotime($row[8])) : null;
	// 			$consumption_unit = trim($row[9]);
	// 			$convt_ratio = floatval($row[10]);
	// 			$min_stock = is_numeric($row[11]) ? floatval($row[11]) : 1;

	// 			// Validate required fields
	// 			if (
	// 				empty($ingredient_name) || is_null($ingredient_name) ||
	// 				empty($pack_size) || $pack_size == 0 || is_null($pack_size) ||
	// 				empty($pack_unit) || $pack_unit == 0 || is_null($pack_unit) ||
	// 				empty($price) || $price == 0 || is_null($price) ||
	// 				empty($purchase_unit) || $purchase_unit == 0 || is_null($purchase_unit) ||
	// 				empty($consumption_unit) || $consumption_unit == 0 || is_null($consumption_unit) ||
	// 				empty($convt_ratio) || $convt_ratio == 0 || is_null($convt_ratio)
	// 			) {
	// 				$failed++;
	// 				continue;
	// 			}


	// 			// Skip if already exists in temp
	// 			if ($this->ingradient_model->get_temp_by_name($ingredient_name)) {
	// 				$failed++;
	// 				continue;
	// 			}

	// 			$pack_unit_id = $this->ingradient_model->get_uom_id_by_short_code($pack_unit);
	// 			$purchase_unit_id = $this->ingradient_model->get_uom_id_by_short_code($purchase_unit);
	// 			$consumption_unit_id = $this->ingradient_model->get_uom_id_by_short_code($consumption_unit);
	// 			$brand_id = $this->ingradient_model->get_brand_id_by_name($brand_name);

	// 			$data = [
	// 				'ingredient_name' => $ingredient_name,
	// 				'pack_size' => $pack_size,
	// 				'pack_unit_id' => $pack_unit_id,
	// 				'purchase_price' => $price,
	// 				'purchase_unit_id' => $purchase_unit_id,
	// 				'brand_id' => $brand_id,
	// 				'opening_balance' => $opening_stock,
	// 				'opening_date' => $opening_date,
	// 				'consumption_unit_id' => $consumption_unit_id,
	// 				'convt_ratio' => $convt_ratio,
	// 				'min_stock' => $min_stock,
	// 				'saved_by' => $user_id,
	// 				'created_at' => $now,
	// 				'updated_at' => $now,
	// 			];

	// 			$this->ingradient_model->insert_temp($data);
	// 			$inserted++;
	// 		}

	// 		$syncResult = $this->sync_temp_to_main();

	// 		echo json_encode([
	// 			'status' => 'success',
	// 			'message' => 'File uploaded successfully.',
	// 			'total' => count($sheetData) - 1,
	// 			'inserted' => $inserted,
	// 			'failed' => $failed,
	// 			'sync_status' => $syncResult['status'],
	// 			'sync_message' => $syncResult['message']
	// 		]);
	// 	} catch (Exception $e) {
	// 		log_message('error', 'Upload failed: ' . $e->getMessage());
	// 		echo json_encode(['status' => 'error', 'message' => 'Error processing file: ' . $e->getMessage()]);
	// 	}
	// }

	public function sheetupload()
	{
		$user_id = $this->session->userdata('user_id');
		header('Content-Type: application/json');

		if (!isset($_FILES['ingredient_filename']) || $_FILES['ingredient_filename']['error'] !== 0) {
			echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error.']);
			return;
		}

		$file = $_FILES['ingredient_filename']['tmp_name'];
		$ext = pathinfo($_FILES['ingredient_filename']['name'], PATHINFO_EXTENSION);
		$allowed = ['csv', 'xls', 'xlsx'];

		if (!in_array(strtolower($ext), $allowed)) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid file format.']);
			return;
		}

		try {
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			$now = date('Y-m-d H:i:s');
			$inserted = 0;
			$failed = 0;
			$failDetails = [];

			foreach (array_slice($sheetData, 1) as $rowIndex => $row) {
				$excelRowNum = $rowIndex + 2; // Excel row number (1-based including header)
				
				$ingredient_name = trim($row[1]);
				$pack_size = floatval($row[2]);
				$pack_unit = trim($row[3]);
				$price = floatval($row[4]);
				$purchase_unit = trim($row[5]);
				$brand_name = trim($row[6]);
				$opening_stock = is_numeric($row[7]) ? floatval($row[7]) : null;
				$opening_date = !empty($row[8]) ? date('Y-m-d', strtotime($row[8])) : null;
				$consumption_unit = trim($row[9]);
				$convt_ratio = floatval($row[10]);
				$min_stock = is_numeric($row[11]) ? floatval($row[11]) : 1;

				$reason = [];

				if (empty($ingredient_name)) $reason[] = "Ingredient Name missing";
				if (empty($pack_size) || $pack_size == 0) $reason[] = "Pack Size missing or zero";
				if (empty($pack_unit)) $reason[] = "Pack Unit missing";
				if (empty($price) || $price == 0) $reason[] = "Price missing or zero";
				if (empty($purchase_unit)) $reason[] = "Purchase Unit missing";
				if (empty($consumption_unit)) $reason[] = "Consumption Unit missing";
				if (empty($convt_ratio) || $convt_ratio == 0) $reason[] = "Conversion Ratio missing or zero";

				if (!empty($reason)) {
					$failed++;
					$failDetails[] = "Row $excelRowNum: " . implode(', ', $reason);
					continue;
				}

				// Check for duplicates
				if ($this->ingradient_model->get_temp_by_name($ingredient_name)) {
					$failed++;
					$failDetails[] = "Row $excelRowNum: Duplicate Ingredient Name";
					continue;
				}

				$pack_unit_id = $this->ingradient_model->get_uom_id_by_short_code($pack_unit);
				$purchase_unit_id = $this->ingradient_model->get_uom_id_by_short_code($purchase_unit);
				$consumption_unit_id = $this->ingradient_model->get_uom_id_by_short_code($consumption_unit);
				$brand_id = $this->ingradient_model->get_brand_id_by_name($brand_name);

				$data = [
					'ingredient_name' => $ingredient_name,
					'pack_size' => $pack_size,
					'pack_unit_id' => $pack_unit_id,
					'purchase_price' => $price,
					'purchase_unit_id' => $purchase_unit_id,
					'brand_id' => $brand_id,
					'opening_balance' => $opening_stock,
					'opening_date' => $opening_date,
					'consumption_unit_id' => $consumption_unit_id,
					'convt_ratio' => $convt_ratio,
					'min_stock' => $min_stock,
					'saved_by' => $user_id,
					'created_at' => $now,
					'updated_at' => $now,
				];

				$this->ingradient_model->insert_temp($data);
				$inserted++;
			}

			$syncResult = $this->sync_temp_to_main();

			echo json_encode([
				'status' => 'success',
				'message' => 'File uploaded successfully.',
				'total' => count($sheetData) - 1,
				'inserted' => $inserted,
				'failed' => $failed,
				'fail_details' => $failDetails,
				'sync_status' => $syncResult['status'],
				'sync_message' => $syncResult['message']
			]);
		} catch (Exception $e) {
			log_message('error', 'Upload failed: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'Error processing file: ' . $e->getMessage()]);
		}
	}




	public function sync_temp_to_main()
	{
		$tempRows = $this->ingradient_model->get_all_temp();
		if (empty($tempRows)) {
			return ['status' => 'error', 'message' => 'No ingredients found in temporary table.'];
		}

		foreach ($tempRows as $row) {
			if ($this->ingradient_model->get_by_name($row->ingredient_name)) continue;

			$totalPack = $row->pack_size * $row->convt_ratio;
			$costPerUnit = ($totalPack > 0) ? $row->purchase_price / $totalPack : 0;

			$ingredientData = [
				'ingredient_name'   => $row->ingredient_name,
				'purchase_price'    => $row->purchase_price,
				'cost_perunit'      => round($costPerUnit, 3),
				'min_stock'         => $row->min_stock,
				'uom_id'            => $row->purchase_unit_id,
				'consumption_unit'  => $row->consumption_unit_id,
				'convt_ratio'       => $row->convt_ratio,
				'is_active'         => 1,
				'brand_id'          => $row->brand_id,
				'pack_unit'         => $row->pack_unit_id,
				'pack_size'         => $row->pack_size
			];

			$ingredient_id = $this->ingradient_model->insert_ingredient($ingredientData);

			if (!empty($row->opening_balance) && !empty($row->opening_date)) {
				$opening_balance = get_quantity_consumption_unit($ingredient_id, $row->opening_balance);
				$openstockData = [
					'ingredient_name' => $row->ingredient_name,
					'ingredient_id'   => $ingredient_id,
					'purchase_price'  => $row->purchase_price,
					'opening_balance' => $opening_balance,
					'opening_date'    => $row->opening_date,
					'is_active'       => 1
				];

				$this->ingradient_model->ingredient_opening_stock($openstockData);
				$this->ingradient_model->update_ingredient([
					'id' => $ingredient_id,
					'stock_qty' => $opening_balance
				]);
			}
		}

		return ['status' => 'success', 'message' => 'Ingredients synced from temp table.'];
	}


	public function sample_csv() {
        $this->load->helper('download');

        $path = FCPATH . 'assets/ingredient_sample.xlsx'; // Points to the file in /assets

        if (file_exists($path)) {
            $data = file_get_contents($path);
            force_download('ingredient_sample.xlsx', $data);
        } else {
            show_error('File not found.');
        }
    }

	//Get Convertion Ratio ajax call
	public function get_conversion_ratio($pack_unit, $consumption_unit) {
        if ($pack_unit && $consumption_unit) {
            $ratio = $this->ingradient_model->get_conversion_ratio($pack_unit, $consumption_unit);
            echo $ratio !== null ? $ratio : '';
        } else {
            echo '';
        }
    }

 
}
