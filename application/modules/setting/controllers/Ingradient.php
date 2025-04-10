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

	public function create($id = null)
	{
		$this->permission->method('setting', ($id ? 'update' : 'create'))->redirect();

		$data['title'] = $id ? display('update_ingredient') : display('add_ingredient');

		$this->form_validation->set_rules('ingredient_name', display('ingredient_name'), 'required|max_length[50]');
		$this->form_validation->set_rules('unitid', 'Purchase Unit', 'required');
		$this->form_validation->set_rules('consumption_unit', 'Consumption Unit', 'required');
		$this->form_validation->set_rules('is_active', display('is_active'), 'required');

		$postData = [
			'id'                => $this->input->post('id'),
			'ingredient_name'   => $this->input->post('ingredient_name', true),
			'purchase_price'    => $this->input->post('purchase_price', true),
			'cost_perunit'      => $this->input->post('cost_perunit', true),
			'min_stock'         => $this->input->post('min_stock', true),
			'uom_id'     		=> $this->input->post('unitid', true),
			'consumption_unit'  => $this->input->post('consumption_unit', true),
			'convt_ratio'       => $this->input->post('convt_ratio', true),
			'is_active'         => $this->input->post('is_active', true),
			'brand_id'        => $this->input->post('brand_id', true),
			'pack_unit'         => $this->input->post('pack_unit', true),
			'pack_size'			=> $this->input->post('pack_size', true),
		];

		$data['intinfo'] = "";
		$data['units'] = (object) $postData;


		if ($this->form_validation->run()) {
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
					//Check if opening balance and opening date is in post
					$opening_balance = $this->input->post('opening_balance', true);
					$opening_date = $this->input->post('opening_date', true);

					if (!empty($opening_balance) && !empty($opening_date)) {
						$openstockData = array(
							'ingredient_name'    => $this->input->post('ingredient_name', true),
							'ingredient_id'       => $ingredient_id,
							'purchase_price'     => $this->input->post('purchase_price', true),
							'opening_balance'    => $this->input->post('opening_balance', true),
							'opening_date'       => date('Y-m-d', strtotime($this->input->post('opening_date', true))), // fixed typo & brackets
							'is_active'          => 1
						);
						
						$this->ingradient_model->ingredient_opening_stock($openstockData);

						//Update also stock in ingredients table as opening balance
						/**
						 * Formula: pack_size * convt_ratio = opening balance
						 */
						$opening_balance = round(($this->input->post('pack_size', true) * $this->input->post('convt_ratio', true)), 2);
						//Update stock in ingredients table
						$this->ingradient_model->update_ingredient(array(
							'id' => $ingredient_id,
							'stock_qty' => $this->input->post('opening_balance', true),
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
		} else {
			if (!empty($id)) {
				$data['intinfo'] = $this->ingradient_model->findById($id);
			}
					//Add brands list
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

 
}
