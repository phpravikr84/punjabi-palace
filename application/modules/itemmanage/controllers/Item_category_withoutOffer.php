<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_category extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'category_model',
			'logs_model'
		));	
    }
 
    public function index()
    {
        
		$this->permission->method('itemmanage','read')->redirect();
        $data['title']    = display('category_list'); 
        #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('itemmanage/item_category/index');
        $config["total_rows"]  = $this->category_model->count_category();
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
		$data["categories"] = $this->category_model->read_category($config["per_page"], $page);
        //$categories = $this->category_model->read_category($config["per_page"], $page);
		//$data["categories"] = $this->arrangeCategories($categories);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
        #
        #pagination ends
        #   
        $data['module'] = "itemmanage";
        $data['page']   = "home";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    // public function create($id = null)
    // {
	//   $this->permission->method('itemmanage','create')->redirect();
	//   $data['title'] = display('add_category');
	//   if(!empty($this->input->post('CategoryID'))) {
	//   $this->form_validation->set_rules('categoryname', display('category_name')  ,'required|max_length[100]');
	//   }
	//   else{
	// 	   $this->form_validation->set_rules('categoryname', display('category_name')  ,'required|is_unique[item_category.Name]|max_length[100]');
	// 	   $this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
	// 	  }
	//   $this->form_validation->set_rules('status', display('status')  ,'required');
	//   $this->load->library('fileupload');
	//   $img = $this->fileupload->do_upload(
	// 	'./application/modules/itemmanage/assets/images/','picture'
	
	//    );
	   
	//    $savedid=$this->session->userdata('id');
	//    $offerstartdate = str_replace('/','-',$this->input->post('offerstartdate',true));
	//    $offerendate = str_replace('/','-',$this->input->post('offerendate',true));
	  
	//    $isoffer = $this->input->post('isoffer');
	//    if($isoffer==1){
	// 	   $this->form_validation->set_rules('offerstartdate', display('offerdate')  ,'required');
	// 	   $this->form_validation->set_rules('offerendate', display('offerenddate')  ,'required');
	// 	    $convertstartdate= date('Y-m-d' , strtotime($offerstartdate));
	// 		$convertenddate= date('Y-m-d' , strtotime($offerendate));
	// 		$isoffer=$isoffer;
	// 	   }
	// 	else{
	// 		 $convertstartdate= "0000-00-00";
	// 		 $convertenddate= "0000-00-00";
	// 		 $isoffer=0;
	// 		}
	   
	//   #-------------------------------#
	   
	
	//   $data['categoryinfo']="";
	//   if ($this->form_validation->run()) { 
	//    if (empty($this->input->post('CategoryID'))) {
	// 	$this->permission->method('itemmanage','create')->redirect();
	// 	$data['category']   = (Object) $postData = array(
	//    'CategoryID'     => $this->input->post('CategoryID',true),
	//    'Name'     	=> $this->input->post('categoryname',true), 
	//    'parentid'           =>$this->input->post('Parentcategory',true),
	//    'CategoryIsActive'   => $this->input->post('status',true),
	//    'isoffer'     		=> $isoffer, 
	//    'offerstartdate'     => $convertstartdate, 
	//    'offerendate'        => $convertenddate,
	//    'CategoryImage'      => $img,
	//    'UserIDInserted'     => $savedid,
	//    'UserIDUpdated'      => $savedid,
	//    'UserIDLocked'       => $savedid,
	//    'DateInserted'       => date('Y-m-d H:i:s'),
	//    'DateUpdated'        => date('Y-m-d H:i:s'),
	//    'DateLocked'         => date('Y-m-d H:i:s'),
	//   );
	//  $logData = array(
	//    'action_page'         => "Add Category",
	//    'action_done'     	 => "Insert Data", 
	//    'remarks'             => "Category is Created",
	//    'user_name'           => $this->session->userdata('fullname',true),
	//    'entry_date'          => date('Y-m-d H:i:s'),
	//   );
	// 	if ($this->category_model->cat_create($postData)) { 
	// 	 $this->logs_model->log_recorded($logData);
	// 	 $this->db->select('*');
	// 		$this->db->from('item_category');
	// 		$this->db->where('CategoryIsActive',1);
	// 		$query = $this->db->get();
	// 		foreach ($query->result() as $row) {
	// 			$json_product[] = array('label'=>$row->Name,'value'=>$row->CategoryID);
	// 		}
	// 		$cache_file = './assets/js/category.json';
	// 		$categoryList = json_encode($json_product);
	// 		file_put_contents($cache_file,$categoryList);
	// 	 $this->session->set_flashdata('message', display('save_successfully'));
	// 	 redirect('itemmanage/item_category/create');
	// 	} else {
	// 	 $this->session->set_flashdata('exception',  display('please_try_again'));
	// 	}
	// 	redirect("itemmanage/item_category/create"); 
	
	//    } else {
	// 	$this->permission->method('itemmanage','update')->redirect();
	// 	if(empty($img)){
	// 		$img=$this->input->post('old_image');
	// 		}
	// 	$data['category']   = (Object) $postData = array(
	//    'CategoryID'     => $this->input->post('CategoryID',true),
	//    'Name'     	=> $this->input->post('categoryname',true), 
	//    'parentid'           =>$this->input->post('Parentcategory',true),
	//    'CategoryIsActive'   => $this->input->post('status',true),
	//    'isoffer'     		=> $isoffer, 
	//    'offerstartdate'     => $convertstartdate, 
	//    'offerendate'        => $convertenddate,
	//    'CategoryImage'      => $img,
	//    'UserIDUpdated'      => $savedid,
	//    'DateUpdated'        => date('Y-m-d H:i:s'),
	//   );
	//   $logData = array(
	//    'action_page'         => "Category List",
	//    'action_done'     	 => "Update Data", 
	//    'remarks'             => "Category Updated",
	//    'user_name'           => $this->session->userdata('fullname',true),
	//    'entry_date'          => date('Y-m-d H:i:s'),
	//   );
	 
	// 	if ($this->category_model->update_cat($postData)) { 
	// 	 $this->logs_model->log_recorded($logData);
	// 	 $this->db->select('*');
	// 		$this->db->from('item_category');
	// 		$this->db->where('CategoryIsActive',1);
	// 		$query = $this->db->get();
	// 		foreach ($query->result() as $row) {
	// 			$json_product[] = array('label'=>$row->Name,'value'=>$row->CategoryID);
	// 		}
	// 		$cache_file = './assets/js/category.json';
	// 		$categoryList = json_encode($json_product);
	// 		file_put_contents($cache_file,$categoryList);
	// 	 $this->session->set_flashdata('message', display('update_successfully'));
	// 	} else {
	// 	$this->session->set_flashdata('exception',  display('please_try_again'));
	// 	}
	// 	redirect("itemmanage/item_category/create/".$postData['CategoryID']);  
	//    }
	//   } else { 
	//    if(!empty($id)) {
	// 	$data['title'] = display('update_category');
	// 	$data['categoryinfo']   = $this->category_model->findById($id);
	//    }
	//    $data['categories']   =  $this->category_model->allcategory_dropdown();
	//    $data['module'] = "itemmanage";
	//    $data['page']   = "addcategory";   
	//    echo Modules::run('template/layout', $data); 
	//    }   
 
    // }

	public function create($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		//Get Update Category Id
	
		$data['title'] = !empty($id) ? display('update_category') : display('add_category');

		$this->load->library('form_validation');
		$this->load->library('fileupload');

		$savedid = $this->session->userdata('id');

	

		// Category input validation
		$categoryNames = $this->input->post('categoryname', true);
		$subcategoryIds = $this->input->post('subCategoryId', true) ?? [];
		
		if (!empty($categoryNames)) {
			foreach ($categoryNames as $key => $categoryName) {
				$this->form_validation->set_rules(
					"categoryname[$key]",
					display('category_name'),
					"required|max_length[100]"
				);
			}
		}

		$this->form_validation->set_rules('status[]', display('status'), 'required');

		if ($this->form_validation->run()) {
			$parentCategories = $this->input->post('Parentcategory', true) ?? [];
			$statuses = $this->input->post('status', true);
			$isOffers = $this->input->post('isoffer', true) ?? [];

			// Upload category image or use existing one
			$img = $this->fileupload->do_upload('./application/modules/itemmanage/assets/images/', 'picture');
			if (empty($img)) {
				$img = $this->input->post('old_image', true);
			}

			// Handle multiple categories
			$insertedCategories = [];

			//Combine arr
			foreach ($categoryNames as $index => $categoryName) {
				
				$parentId = !empty($parentCategories) ? implode(',', (array) $parentCategories) : 0;
				$isOffer = isset($isOffers[$index]) ? 1 : 0;
				$offerStartDate = $isOffer ? date('Y-m-d', strtotime($this->input->post("offerstartdate[$index]", true))) : "0000-00-00";
				$offerEndDate = $isOffer ? date('Y-m-d', strtotime($this->input->post("offerendate[$index]", true))) : "0000-00-00";

				
				
				if ($this->input->post('CategoryID', true)) {

					$postData = [
						'CategoryID' => !empty($subcategoryIds[$index]) ? $subcategoryIds[$index] : null,
						'Name' => $categoryName,
						'parentid' => $this->input->post('CategoryID', true) ?? 0,
						'CategoryIsActive' => $statuses[$index],
						'DateInserted' => date('Y-m-d H:i:s'),
						'DateUpdated' => date('Y-m-d H:i:s'),
						'DateLocked' => date('Y-m-d H:i:s'),
					];
	
					// Update existing category
					$parentCatId = $this->input->post('CategoryID', true);
					// echo '<pre>';
					// print_r($postData);
					// echo '</pre>';
					// exit;
					
					
					//$subcatId = !empty($subcategoryIds[$index]) ? $subcategoryIds[$index] : null;

					if ($this->category_model->update_cat($postData)) {
						$this->logCategoryAction("Update Data", "Category Updated");
						$this->update_category_cache();
						$this->session->set_flashdata('message', display('update_successfully'));
					} else {
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					
				} else {
					$postData = [
						'CategoryID' => $this->input->post('CategoryID', true) ?? null,
						'Name' => $categoryName,
						'parentid' => $parentId ?? 0,
						'CategoryIsActive' => $statuses[$index],
						'isoffer' => $isOffer,
						'offerstartdate' => $offerStartDate,
						'offerendate' => $offerEndDate,
						'CategoryImage' => $img,
						'UserIDInserted' => $savedid,
						'UserIDUpdated' => $savedid,
						'UserIDLocked' => $savedid,
						'DateInserted' => date('Y-m-d H:i:s'),
						'DateUpdated' => date('Y-m-d H:i:s'),
						'DateLocked' => date('Y-m-d H:i:s'),
					];	
					// Insert new category
					if ($this->category_model->cat_create($postData)) {
						$insertedCategories[] = $postData;
					}
				}
			}

			// Log and redirect for insert
			if (!empty($insertedCategories)) {
				$this->logCategoryAction("Insert Data", "Multiple categories created");
				$this->update_category_cache();
				$this->session->set_flashdata('message', display('save_successfully'));
			} else {
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			if ($this->input->post('CategoryID', true)) {
				redirect("itemmanage/item_category/create/$parentCatId");
			} else {
				redirect('itemmanage/item_category/create');
			}
			

		} else {
			if (!empty($id)) {
				$data['categoryinfo'] = $this->category_model->findByIdWithSubcat($id);
				//$data['categoryinfo'] = $this->category_model->findByIdWithSubcatRow($id);
			}
			$data['categories'] = $this->category_model->allcategory_dropdown();
			$data['module'] = "itemmanage";
			$data['page'] = "addcategory";
			echo Modules::run('template/layout', $data);
		}
	}

	/**
	 * Logs category actions
	 */
	private function logCategoryAction($action, $remarks)
	{
		$logData = [
			'action_page' => "Category List",
			'action_done' => $action,
			'remarks' => $remarks,
			'user_name' => $this->session->userdata('fullname', true),
			'entry_date' => date('Y-m-d H:i:s'),
		];
		$this->logs_model->log_recorded($logData);
	}

	/**
	 * Updates category cache file
	 */
	private function update_category_cache()
	{
		$this->db->select('*')->from('item_category')->where('CategoryIsActive', 1);
		$query = $this->db->get();
		$json_product = [];

		foreach ($query->result() as $row) {
			$json_product[] = ['label' => $row->Name, 'value' => $row->CategoryID];
		}

		$cache_file = './assets/js/category.json';
		file_put_contents($cache_file, json_encode($json_product));
	}

    public function delete($category = null)
    {
        $this->permission->module('itemmanage','delete')->redirect();
		$logData = array(
	   'action_page'         => "Category List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Category Deleted",
	   'user_name'           => $this->session->userdata('fullname',true),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->category_model->cat_delete($category)) {
			#Store data to log table.
			 $this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('itemmanage/item_category/index');
    }

	function arrangeCategories($categories) {
		$categoryTree = [];
		$lookup = [];
		
		// First, create an indexed array of categories
		foreach ($categories as $category) {
			$lookup[$category->CategoryID] = [
				'CategoryID' => $category->CategoryID,
				'parentName' => $category->Name,
				'parentid' => $category->parentid,
				'Position' => $category->Position,
				'ParentCategoryIsActive' => $category->CategoryIsActive,
				'offerstartdateparent' => $category->offerstartdate,
				'offerendateparent' => $category->offerendate,
				'isofferparent' => $category->isoffer,
				'children_menus' => [],
			];
		}
		
		// Now, associate children with their respective parents
		foreach ($categories as $category) {
			if ($category->parentid > 0 && isset($lookup[$category->parentid])) {
				$lookup[$category->parentid]['children_menus'][] = [
					'CategoryID' => $category->CategoryID,
					'Name' => $category->Name,
					'parentid' => $category->parentid,
					'CategoryIsActive' => $category->CategoryIsActive,
					'isoffer' => $category->isoffer,
					'offerstartdate' => $category->offerstartdate,
					'offerendate' => $category->offerendate,
				];
			}
		}
		
		// Extract only parents from lookup
		foreach ($lookup as $categoryID => $data) {
			if (!isset($lookup[$data['parentid']])) { // Top-level categories
				$categoryTree[$categoryID] = $data;
			}
		}
		
		return array_values($categoryTree);
	}

	public function delete_category()
	{
		$id = (int)$this->input->post('id'); // Get ID from AJAX request
		$csrf_token = $this->input->post('csrf_test_name'); // CSRF token
		// Validate ID
		if (empty($id) || !is_numeric($id)) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid Category ID']);
			return;
		}

		// Delete category
		$result = $this->category_model->cat_delete($id);

		if ($result) {
			echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to delete category']);
		}
	}

	
 
}
