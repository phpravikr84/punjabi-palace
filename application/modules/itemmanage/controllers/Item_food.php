<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Item_food extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'fooditem_model',
			'category_model',
			'foodvarient_model',
			'foodavailable_model',
			'todaymenu_model',
			'logs_model'
		));
		//$this->load->library('excel');		
	}

	public function index()
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		$data['title']    = display('food_list');
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('itemmanage/item_food/index');
		$config["total_rows"]  = $this->fooditem_model->count_fooditem();
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
		$data["fooditemslist"] = $this->fooditem_model->read_fooditem($config["per_page"], $page);
		$data['pagenum'] = $page;
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		#   
		$data['module'] = "itemmanage";
		$data['page']   = "fooditemlist";
		echo Modules::run('template/layout', $data);
	}


	public function create($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('add_food');
		#-------------------------------#
		$this->form_validation->set_rules('CategoryID', display('category_name'), 'required');
		if (!empty($this->input->post('ProductsID'))) {
			$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
		} else {
			$this->form_validation->set_rules('foodname', display('item_name'), 'required|is_unique[item_foods.ProductName]|max_length[100]');
			$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
		}
		$this->form_validation->set_rules('status', display('status'), 'required');

		$savedid = $this->session->userdata('id');
		$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate', true));
		$offerendate = str_replace('/', '-', $this->input->post('offerendate', true));

		$isoffer = $this->input->post('isoffer', true);
		$special = $this->input->post('special', true);
		if ($isoffer == 1) {
			$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
			$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
			$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
			$convertenddate = date('Y-m-d', strtotime($offerendate));
			$isoffer = $isoffer;
			$OffersRate = $this->input->post('offerate', true);
		} else {
			$convertstartdate = "0000-00-00";
			$convertenddate = "0000-00-00";
			$isoffer = 0;
			$OffersRate = 0;
		}
		if ($special == 1) {
			$special = $this->input->post('special', true);
		} else {
			$special = 0;
		}
		$myvat = $this->input->post('vat');
		if (empty($myvat)) {
			$myvat = 0;
		}
		$menutype = $this->input->post('menutype', true);
		$alltmtype = "";
		$i = 0;
		if (!empty($menutype)) {
			foreach ($menutype as $types) {
				$i++;
				$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
			}

			$alltmtype = trim($alltmtype, ',');
		}
		$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));
		#-------------------------------#
		if ($this->form_validation->run()) {
			/****************image Upload*************/
			$config['upload_path']          = 'application/modules/itemmanage/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 100000;
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('picture')) {
				$error = array('error' => $this->upload->display_errors());
				$img = '';
				$big = '';
				$medium = '';
				$small = '';
			} else {
				if (!empty($id)) {
					$imageinfo = $this->db->select('*')->from('item_foods')->where('ProductsID', $id)->get()->row();
					unlink($imageinfo->ProductImage);
					unlink($imageinfo->bigthumb);
					unlink($imageinfo->medium_thumb);
					unlink($imageinfo->small_thumb);
				}

				$fdata = $this->upload->data();

				$image_sizes = array('big' => array(555, 370), 'medium' => array(268, 223), 'small' => array(116, 116));
				$this->load->library('image_lib');
				foreach ($image_sizes as $key => $resize) {
					$config1 = array(
						'source_image' => $fdata['full_path'],
						'new_image' => $fdata['file_path'] . $key . '/',
						'maintain_ratio' => FALSE,
						'width' => $resize[0],
						'height' => $resize[1],
						'quality' => 70,
					);
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();
				}
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
				$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
				$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
				$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
			}


			/****************end*********************/
			if (empty($this->input->post('ProductsID'))) {
				$this->permission->method('itemmanage', 'create')->redirect();
				$data['foodlist']   = (object) $postData = array(
					'ProductsID'     		=> $this->input->post('ProductsID'),
					'CategoryID'     		=> $this->input->post('CategoryID'),
					'ProductName'   			=> $this->input->post('foodname', true),
					'component'              => $this->input->post('component', true),
					'itemnotes'              => $this->input->post('itemnotes', true),
					'menutype'               => $uniqueStr,
					'descrip'                => $this->input->post('descrip', true),
					'kitchenid'              =>  $this->input->post('kitchen'),
					'cookedtime'             => $this->input->post('cookedtime', true),
					'productvat'             => $myvat,
					'OffersRate'             => $OffersRate,
					'special'       			=> $special,
					'offerIsavailable'       => $isoffer,
					'offerstartdate'         => $convertstartdate,
					'offerendate'            => $convertenddate,
					'is_customqty'           => $this->input->post('customqty', true),
					'ProductsIsActive'   	=> $this->input->post('status'),
					'ProductImage'      		=> $img,
					'bigthumb'      			=> $big,
					'medium_thumb'      		=> $medium,
					'small_thumb'      		=> $small,
					'UserIDInserted'     	=> $savedid,
					'UserIDUpdated'      	=> $savedid,
					'UserIDLocked'       	=> $savedid,
					'DateInserted'       	=> date('Y-m-d H:i:s'),
					'DateUpdated'        	=> date('Y-m-d H:i:s'),
					'DateLocked'         	=> date('Y-m-d H:i:s'),
					'cusine_type'			=> $this->input->post('cusine_type'),
					'is_bom'					=> $this->input->post('is_bom'),
				);
				$logData = array(
					'action_page'         => "Add Food",
					'action_done'     	 => "Insert Data",
					'remarks'             => "New Food Added",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}
				if ($this->fooditem_model->fooditem_create($postData)) {
					$insertedFoodId = $this->db->insert_id(); // Get last inserted food item ID
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
					// Varient add [start]
					$variantData = [
						'menuid'          => $insertedFoodId,
						'variantName'     => 'Regular',
						'price'           => $this->input->post('regPrice', true),
						'takeaway_price'  => $this->input->post('takeawayPrice', true),
						'uber_eats_price' => $this->input->post('uberEatsPrice', true),
						'web_order_price' => $this->input->post('webOrderPrice', true),
					];
					$variantLogData = [
						'action_page'         => "Varient List",
						'action_done'     	 => "Insert Data",
						'remarks'             => "New Varient Created",
						'user_name'           => $this->session->userdata('fullname'),
						'entry_date'          => date('Y-m-d H:i:s'),
					];

					$this->foodvarient_model->create($variantData);
					$this->logs_model->log_recorded($variantLogData);
					// Varient add [end]
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/create');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/create");
			} 
			else {
				$this->permission->method('itemmanage', 'update')->redirect();
				if (empty($img)) {
					$img = $this->input->post('old_image', true);
					$big = $this->input->post('bigimage', true);
					$medium = $this->input->post('mediumimage', true);
					$small = $this->input->post('smallimage', true);
				}
				$data['category']   = (object) $postData = array(
					'ProductsID'     		=> $this->input->post('ProductsID'),
					'CategoryID'     		=> $this->input->post('CategoryID'),
					'ProductName'   			=> $this->input->post('foodname', true),
					'component'              => $this->input->post('component', true),
					'itemnotes'              => $this->input->post('itemnotes', true),
					'menutype'              => $uniqueStr,
					'descrip'                => $this->input->post('descrip', true),
					'productvat'             => $this->input->post('vat', true),
					'kitchenid'             => $this->input->post('kitchen'),
					'cookedtime'             => $this->input->post('cookedtime', true),
					'OffersRate'             => $OffersRate,
					'special'       			=> $special,
					'is_customqty'           => $this->input->post('customqty', true),
					'offerIsavailable'       => $isoffer,
					'offerstartdate'         => $convertstartdate,
					'offerendate'            => $convertenddate,
					'ProductsIsActive'   	=> $this->input->post('status', true),
					'ProductImage'      		=> $img,
					'bigthumb'      			=> $big,
					'medium_thumb'      		=> $medium,
					'small_thumb'      		=> $small,

					'UserIDUpdated'      => $savedid,
					'DateUpdated'        => date('Y-m-d H:i:s'),
					'cusine_type'			=> $this->input->post('cusine_type'),
					'is_bom'					=> $this->input->post('is_bom'),
				);
				$logData = array(
					'action_page'         => "Food List",
					'action_done'     	 => "Update Data",
					'remarks'             => "Food Updated",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}

				if ($this->fooditem_model->update_fooditem($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/create/" . $postData['ProductsID']);
			}
		} else {
			$data['taxitems'] = $this->taxchecking();
			if (!empty($id)) {
				$data['title'] = display('update_fooditem');
				$data['productinfo']   = $this->fooditem_model->findById($id);
			}

			$data['categories']   =  $this->category_model->allcategory_dropdown();
			$data['allkitchen']   =  $this->fooditem_model->allkitchen();
			$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
			$data['module'] = "itemmanage";
			$data['page']   = "addfooditem";
			echo Modules::run('template/layout', $data);
		}
	}

	public function new_create_with_error($id = null)
	{
		$this->permission->method('itemmanage','create')->redirect();
		$data['title'] = display('add_food'); 
		$this->form_validation->set_rules('CategoryID', display('category_name')  ,'required');

		if (!empty($this->input->post('ProductsID'))) {
			$this->form_validation->set_rules('foodname', display('item_name')  ,'required|max_length[100]');
		} else {
			$this->form_validation->set_rules('foodname', display('item_name')  ,'required|is_unique[item_foods.ProductName]|max_length[100]');
			$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
		}
		
		$this->form_validation->set_rules('status', display('status') ,'required');

		$savedid = $this->session->userdata('id');
		$offerstartdate = str_replace('/','-',$this->input->post('offerstartdate',true));
		$offerendate = str_replace('/','-',$this->input->post('offerendate',true));

		$isoffer = $this->input->post('isoffer',true);
		$special = $this->input->post('special',true);

		if ($isoffer == 1) {
			$this->form_validation->set_rules('offerstartdate', display('offerdate') ,'required');
			$this->form_validation->set_rules('offerendate', display('offerenddate') ,'required');
			$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
			$convertenddate = date('Y-m-d', strtotime($offerendate));
			$OffersRate = $this->input->post('offerate', true);
		} else {
			$convertstartdate = "0000-00-00";
			$convertenddate = "0000-00-00";
			$isoffer = 0;
			$OffersRate = 0;
		}

		if ($special != 1) {
			$special = 0;
		}

		$myvat = $this->input->post('vat') ?: 0;
		$uniqueStr = implode(',', array_unique(explode(',', trim($this->input->post('menutype', true), ','))));
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit;
		if ($this->form_validation->run()) {
			$img = '';
			$big = '';
			$medium = '';
			$small = '';

			// Image upload logic...
			/****************image Upload [start]*************/
			$config['upload_path']          = 'application/modules/itemmanage/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 100000;
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('picture')) {
				$error = array('error' => $this->upload->display_errors());
				$img = '';
				$big = '';
				$medium = '';
				$small = '';
			} else {
				if (!empty($id)) {
					$imageinfo = $this->db->select('*')->from('item_foods')->where('ProductsID', $id)->get()->row();
					unlink($imageinfo->ProductImage);
					unlink($imageinfo->bigthumb);
					unlink($imageinfo->medium_thumb);
					unlink($imageinfo->small_thumb);
				}

				$fdata = $this->upload->data();

				$image_sizes = array('big' => array(555, 370), 'medium' => array(268, 223), 'small' => array(116, 116));
				$this->load->library('image_lib');
				foreach ($image_sizes as $key => $resize) {
					$config1 = array(
						'source_image' => $fdata['full_path'],
						'new_image' => $fdata['file_path'] . $key . '/',
						'maintain_ratio' => FALSE,
						'width' => $resize[0],
						'height' => $resize[1],
						'quality' => 70,
					);
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();
				}
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
				$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
				$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
				$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
			}
			/****************Image Upload [end]*********************/

			if (empty($this->input->post('ProductsID'))) {
				$this->permission->method('itemmanage', 'create')->redirect();
				$data['foodlist']   = (object) $postData = [
					'ProductsID'        => $this->input->post('ProductsID'),
					'CategoryID'        => $this->input->post('CategoryID'), 
					'ProductName'       => $this->input->post('foodname',true),
					'component'         => $this->input->post('component',true),
					'itemnotes'         => $this->input->post('itemnotes',true),
					'menutype'          => $uniqueStr,
					'descrip'           => $this->input->post('descrip',true),
					'kitchenid'         => $this->input->post('kitchen'),
					'cookedtime'        => $this->input->post('cookedtime',true),
					'productvat'        => $myvat,
					'OffersRate'        => $OffersRate,
					'special'           => $special,
					'offerIsavailable'  => $isoffer,
					'offerstartdate'    => $convertstartdate,
					'offerendate'       => $convertenddate,
					'is_customqty'      => $this->input->post('customqty',true),
					'ProductsIsActive'  => $this->input->post('status'),
					'ProductImage'      => $img,
					'bigthumb'          => $big,
					'medium_thumb'      => $medium,
					'small_thumb'       => $small,
					'UserIDInserted'    => $savedid,
					'UserIDUpdated'     => $savedid,
					'UserIDLocked'      => $savedid,
					'DateInserted'      => date('Y-m-d H:i:s'),
					'DateUpdated'       => date('Y-m-d H:i:s'),
					'DateLocked'        => date('Y-m-d H:i:s'),
					'cusine_type'       => $this->input->post('cusine_type'),
					'is_bom'            => $this->input->post('is_bom'),
				];
				
				$logData = array(
					'action_page'         => "Add Food",
					'action_done'     	 => "Insert Data",
					'remarks'             => "New Food Added",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}

				if ($this->fooditem_model->fooditem_create($postData)) {
					$insertedFoodId = $this->db->insert_id(); // Get last inserted food item ID
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
					// Varient add [start]
					$variantData = [
						'menuid'          => $insertedFoodId,
						'variantName'     => 'Regular',
						'price'           => $this->input->post('regPrice', true),
						'takeaway_price'  => $this->input->post('takeawayPrice', true),
						'uber_eats_price' => $this->input->post('uberEatsPrice', true),
						'web_order_price' => $this->input->post('webOrderPrice', true),
					];
					$variantLogData = [
						'action_page'         => "Varient List",
						'action_done'     	 => "Insert Data",
						'remarks'             => "New Varient Created",
						'user_name'           => $this->session->userdata('fullname'),
						'entry_date'          => date('Y-m-d H:i:s'),
					];

					$this->foodvarient_model->create($variantData);
					$this->logs_model->log_recorded($variantLogData);
					// Varient add [end]

					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/create');
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
			} 
			//Update Method
			else 
			{
				$this->permission->method('itemmanage', 'update')->redirect();
				if (empty($img)) {
					$img = $this->input->post('old_image', true);
					$big = $this->input->post('bigimage', true);
					$medium = $this->input->post('mediumimage', true);
					$small = $this->input->post('smallimage', true);
				}
				$data['category']   = (object) $postData = array(
					'ProductsID'     		=> $this->input->post('ProductsID'),
					'CategoryID'     		=> $this->input->post('CategoryID'),
					'ProductName'   			=> $this->input->post('foodname', true),
					'component'              => $this->input->post('component', true),
					'itemnotes'              => $this->input->post('itemnotes', true),
					'menutype'              => $uniqueStr,
					'descrip'                => $this->input->post('descrip', true),
					'productvat'             => $this->input->post('vat', true),
					'kitchenid'             => $this->input->post('kitchen'),
					'cookedtime'             => $this->input->post('cookedtime', true),
					'OffersRate'             => $OffersRate,
					'special'       			=> $special,
					'is_customqty'           => $this->input->post('customqty', true),
					'offerIsavailable'       => $isoffer,
					'offerstartdate'         => $convertstartdate,
					'offerendate'            => $convertenddate,
					'ProductsIsActive'   	=> $this->input->post('status', true),
					'ProductImage'      		=> $img,
					'bigthumb'      			=> $big,
					'medium_thumb'      		=> $medium,
					'small_thumb'      		=> $small,

					'UserIDUpdated'      => $savedid,
					'DateUpdated'        => date('Y-m-d H:i:s'),
					'cusine_type'			=> $this->input->post('cusine_type'),
					'is_bom'					=> $this->input->post('is_bom'),
				);
				$logData = array(
					'action_page'         => "Food List",
					'action_done'     	 => "Update Data",
					'remarks'             => "Food Updated",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}

				if ($this->fooditem_model->update_fooditem($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/create/" . $postData['ProductsID']);
			}
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
			$data['taxitems'] = $this->taxchecking();
			if (!empty($id)) {
				$data['title'] = display('update_fooditem');
				$data['productinfo']   = $this->fooditem_model->findById($id);
			}

			$data['categories']   =  $this->category_model->allcategory_dropdown();
			$data['allkitchen']   =  $this->fooditem_model->allkitchen();
			$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
			$data['module'] = "itemmanage";
			$data['page']   = "addfooditem";
			echo Modules::run('template/layout', $data);
		}
	}




	public function delete($category = null)
	{
		$this->permission->module('itemmanage', 'delete')->redirect();
		$logData = [
			'action_page'         => "Food List",
			'action_done'     	 => "Delete Data",
			'remarks'             => "Food Deleted",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		];
		if ($this->fooditem_model->fooditem_delete($category)) {
			$this->logs_model->log_recorded($logData);

			$this->db->select('*');
			$this->db->from('item_foods');
			$this->db->where('ProductsIsActive', 1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
			}
			$cache_file = './assets/js/product.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file, $productList);
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('itemmanage/item_food/index');
	}

	//Bulk Food Upload
	public function bulkfoodupload()
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		if (!empty($_FILES["userfile"]["name"])) {
			$_FILES["userfile"]["name"];
			$path = $_FILES["userfile"]["tmp_name"];
			$upload_file = $_FILES["userfile"]["name"];
			$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xls') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES["userfile"]["tmp_name"]);
			$sheetdata = $spreadsheet->getActiveSheet()->toArray();
			$datacount = count($sheetdata);

			if ($datacount > 1) {
				for ($i = 1; $i < $datacount; $i++) {

					$category = $sheetdata[$i][0];
					$parendcategory = $sheetdata[$i][1];
					$kitchen = $sheetdata[$i][2];
					$itemname = $sheetdata[$i][3];
					$description = $sheetdata[$i][4];
					$status = $sheetdata[$i][5];
					$varient = $sheetdata[$i][6];
					$price = $sheetdata[$i][7];
					$newstatus = strtolower($status);
					if ($newstatus == "active") {
						$acstatus = 1;
					} else {
						$acstatus = 0;
					}
					if (!empty($parendcategory)) {
						$parentcategoryinfo = $this->db->select('CategoryID,Name')->from("item_category")->where('Name', $parendcategory)->get()->row();
						if (!empty($parentcategoryinfo)) {
							$parentid = $parentcategoryinfo->CategoryID;
						} else {
							$parentid = 0;
						}
					} else {
						$parentid = 0;
					}

					$categoryinfo = $this->db->select('CategoryID,Name')->from("item_category")->where('Name', $category)->get()->row();
					if (empty($categoryinfo)) {
						(object) $catData = array(
							'Name'     				=> $category,
							'CategoryIsActive'     	=> 1,
							'parentid'     			=> $parentid
						);
						$this->db->insert('item_category', $catData);
						$categoryid = $this->db->insert_id();
					} else {
						$categoryid = $categoryinfo->CategoryID;
					}
					$kitcheninfo = $this->db->select('kitchenid,kitchen_name')->from("tbl_kitchen")->where('kitchen_name', $kitchen)->get()->row();
					if (empty($kitcheninfo)) {
						(object) $kitchenData = array(
							'kitchen_name'  => $kitchen,
							'status'     	=> 1
						);
						$this->db->insert('tbl_kitchen', $kitchenData);
						$kitchenid = $this->db->insert_id();
					} else {
						$kitchenid = $kitcheninfo->kitchenid;
					}

					$iteminfo = $this->db->select('ProductsID,ProductName')->from("item_foods")->where('ProductName', $itemname)->get()->row();
					if (empty($iteminfo)) {
						(object) $foodData = array(
							'CategoryID'     	=> $categoryid,
							'ProductName'     	=> $itemname,
							'descrip'     		=> $description,
							'ProductsIsActive'  => $acstatus,
							'kitchenid'        => $kitchenid,
						);
						$this->db->insert('item_foods', $foodData);
						$foodid = $this->db->insert_id();
					} else {
						$foodid = $iteminfo->ProductsID;
					}

					$varientinfo = $this->db->select('variantid,variantName')->from("variant")->where('menuid', $foodid)->where('variantName', $varient)->get()->row();
					if (empty($varientinfo)) {
						(object) $varientData = array(
							'menuid'     		=> $foodid,
							'variantName'     	=> $varient,
							'price'     		=> $price
						);
						$this->db->insert('variant', $varientData);
					}
				}
			}
			$this->session->set_flashdata('message', display('save_successfully'));
			echo '<script>window.location.href = "' . base_url() . 'itemmanage/item_food/create"</script>';
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			redirect("itemmanage/item_food/create");
		}
	}
	public function downloadformat()
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Category Name');
		$sheet->setCellValue('B1', 'Parent Category');
		$sheet->setCellValue('C1', 'Kitchen Name');
		$sheet->setCellValue('D1', 'Food Name');
		$sheet->setCellValue('E1', 'Description');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'Varient Name');
		$sheet->setCellValue('H1', 'Price');
		$rowCount   =   2;
		$arrayfood = array(array("category" => "Demo", "parent" => "", "kitchen" => "Italian", "item" => "Dosa", "description" => "food description", "status" => "Active", "varient" => "regular", "price" => 60), array("category" => "Demo1", "parent" => "Demo", "kitchen" => "Italian", "item" => "Dosa2", "description" => "food description", "status" => "Active", "varient" => "Small", "price" => 50));
		foreach ($arrayfood as $row) {
			$sheet->SetCellValue('A' . $rowCount, $row['category'], 'UTF-8');
			$sheet->SetCellValue('B' . $rowCount, $row['parent'], 'UTF-8');
			$sheet->SetCellValue('C' . $rowCount, $row['kitchen'], 'UTF-8');
			$sheet->SetCellValue('D' . $rowCount, $row['item'], 'UTF-8');
			$sheet->SetCellValue('E' . $rowCount, $row['description'], 'UTF-8');
			$sheet->SetCellValue('F' . $rowCount, $row['status'], 'UTF-8');
			$sheet->SetCellValue('G' . $rowCount, $row['varient'], 'UTF-8');
			$sheet->SetCellValue('H' . $rowCount, $row['price'], 'UTF-8');
			$rowCount++;
		}

		$writer = new Xlsx($spreadsheet);

		$filename = 'example.xlsx';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file 
	}
	public function supplieradd()
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('supplier_add');
		#-------------------------------#
		$this->form_validation->set_rules('suppliername', display('payment_name'), 'required|max_length[50]');
		$this->form_validation->set_rules('mobile', display('shippingrate'), 'required');
		$saveid = $this->session->userdata('supid');
		$data['supplier']   = (object) $postData = array(
			'supid'  			 => $this->input->post('supid'),
			'supName' 			 => $this->input->post('suppliername', true),
			'supEmail' 	         => $this->input->post('email', true),
			'supMobile' 	 	     => $this->input->post('mobile', true),
			'supAddress' 	     => $this->input->post('address', true),
		);
		$data['intinfo'] = "";
		if ($this->form_validation->run()) {
			$this->permission->method('itemmanage', 'create')->redirect();
			$logData = array(
				'action_page'         => display('supplier_list'),
				'action_done'     	 => "Insert Data",
				'remarks'             => "New Supplier Created",
				'user_name'           => $this->session->userdata('fullname'),
				'entry_date'          => date('Y-m-d H:i:s'),
			);
			if ($this->fooditem_model->addsupplier($postData)) {
				$this->logs_model->log_recorded($logData);
				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('itemmanage/item_food/bulkfoodupload');
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("itemmanage/item_food/bulkfoodupload");
		} else {
			redirect("itemmanage/item_food/bulkfoodupload");
		}
	}

	//Food Variant Section
	public function foodvarientlist($id = null)
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		$data['title']    = display('variant_list');
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('itemmanage/item_food/foodvarientlist');
		$config["total_rows"]  = $this->foodvarient_model->count_varient();
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
		$data["fooditemslist"] = $this->foodvarient_model->read_varient($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		if (!empty($id)) {
			$data['title'] = display('variant_edit');
			$data['intinfo']   = $this->foodvarient_model->findById($id);
		}
		$settinginfo = $this->fooditem_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->fooditem_model->currencysetting($settinginfo->currency);
		$data['itemdropdown']   =  $this->fooditem_model->fooditem_dropdown();
		$data['module'] = "itemmanage";
		$data['page']   = "varientlist";
		echo Modules::run('template/layout', $data);
	}
	public function varientcreate($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('add_varient');
		#-------------------------------#
		$this->form_validation->set_rules('varientname', display('varient_name'), 'required|max_length[50]');
		$this->form_validation->set_rules('foodid', display('item_name'), 'required');
		$this->form_validation->set_rules('price', display('price'), 'required');
		$this->form_validation->set_rules('takeawayPrice', "Takeaway Price", 'required');
		$this->form_validation->set_rules('uberEatsPrice', "Uber Eats / Doordash Price", 'required');
		$this->form_validation->set_rules('webOrderPrice', "Web Order Price", 'required');

		$data['intinfo'] = "";
		$data['varient']   = (object) $postData = [
			'variantid'          => $this->input->post('variantid'),
			'menuid' 	        => $this->input->post('foodid', true),
			'variantName' 	 	=> $this->input->post('varientname', true),
			'price' 	 	        => $this->input->post('price', true),
			'takeaway_price' 	 	        => $this->input->post('takeawayPrice', true),
			'uber_eats_price' 	 	        => $this->input->post('uberEatsPrice', true),
			'web_order_price' 	 	        => $this->input->post('webOrderPrice', true),
		];
		if ($this->form_validation->run()) {
			if (empty($this->input->post('variantid'))) {
				$this->permission->method('itemmanage', 'create')->redirect();

				$logData = [
					'action_page'         => "Varient List",
					'action_done'     	 => "Insert Data",
					'remarks'             => "New Varient Created",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				];
				if ($this->foodvarient_model->create($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/foodvarientlist');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/foodvarientlist");
			} else {
				$this->permission->method('itemmanage', 'update')->redirect();
				$logData = [
					'action_page'         => "Varient List",
					'action_done'     	 => "Update Data",
					'remarks'             => "Varient Updated",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				];

				if ($this->foodvarient_model->update_varient($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/foodvarientlist");
			}
		} else {
			if (!empty($id)) {
				$data['title'] = display('variant_edit');
				$data['intinfo']   = $this->foodvarient_model->findById($id);
			}
			$settinginfo = $this->fooditem_model->settinginfo();
			$data['storeinfo']      = $settinginfo;
			$data['currency'] = $this->fooditem_model->currencysetting($settinginfo->currency);
			$data['fooddropdown']   =  $this->fooditem_model->fooditem_dropdown();
			$data['module'] = "itemmanage";
			$data['page']   = "varientlist";
			echo Modules::run('template/layout', $data);
		}
	}
	public function updateintfrm($id)
	{

		$this->permission->method('itemmanage', 'update')->redirect();
		$data['title'] = display('variant_edit');
		$data['intinfo']   = $this->foodvarient_model->findById($id); 
		$data['itemdropdown']   =  $this->fooditem_model->fooditem_dropdown();
		$settinginfo = $this->fooditem_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->fooditem_model->currencysetting($settinginfo->currency);
		$data['module'] = "itemmanage";
		$data['page']   = "varientedit";
		$this->load->view('itemmanage/varientedit', $data);
	}

	public function deletevarient($category = null)
	{
		$this->permission->module('itemmanage', 'delete')->redirect();
		$logData = [
			'action_page'         => "Varient List",
			'action_done'     	 => "Delete Data",
			'remarks'             => "Varient Deleted",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		];
		if ($this->foodvarient_model->delete($category)) {
			#Store data to log table.
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('itemmanage/item_food/foodvarientlist');
	}

	//Fooda vailable Section
	public function availablelist($id = null)
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		$data['title']    = display('food_availablelist');
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('itemmanage/item_food/availablelist');
		$config["total_rows"]  = $this->foodavailable_model->count_avail();
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
		$data["foodavailist"] = $this->foodavailable_model->read($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		if (!empty($id)) {
			$data['title'] = display('variant_edit');
			$data['intinfo']   = $this->foodavailable_model->findById($id);
		}
		$data['itemdropdown']   =  $this->fooditem_model->fooditem_dropdown();
		$data['module'] = "itemmanage";
		$data['page']   = "availablelist";
		echo Modules::run('template/layout', $data);
	}
	public function availablecreate($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('add_availablity');
		#-------------------------------#
		$this->form_validation->set_rules('foodid', display('item_name'), 'required');
		$this->form_validation->set_rules('availday', display('available_day'), 'required');
		$this->form_validation->set_rules('fromtime', "From Date", 'required');
		$this->form_validation->set_rules('totime', "To Date", 'required');
		$this->form_validation->set_rules('status', display('status'), 'required');
		$avtime = $this->input->post('fromtime', true) . "-" . $this->input->post('totime', true);

		$data['intinfo'] = "";
		$data['available']   = (object) $postData = [
			'availableID'          => $this->input->post('availableID'),
			'foodid' 	          => $this->input->post('foodid', true),
			'availtime' 	 	      => $avtime,
			'availday' 	 	      => $this->input->post('availday', true),
			'is_active' 	 	      => $this->input->post('status', true),
		];
		if ($this->form_validation->run()) {
			if (empty($this->input->post('availableID'))) {
				$this->permission->method('itemmanage', 'create')->redirect();

				$logData = [
					'action_page'         => "Food Availablity",
					'action_done'     	 => "Insert Data",
					'remarks'             => "New Food Availablity Created",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				];
				if ($this->foodavailable_model->create($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/availablelist');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/availablelist");
			} else {
				$this->permission->method('itemmanage', 'update')->redirect();
				$logData = array(
					'action_page'         => "Food Availablity",
					'action_done'     	 => "Update Data",
					'remarks'             => "Food Availablity Updated",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				);

				if ($this->foodavailable_model->update($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/availablelist");
			}
		} else {
			if (!empty($id)) {
				$data['title'] = display('edit_availablity');
				$data['intinfo']   = $this->foodavailable_model->findById($id);
			}
			$data['fooddropdown']   =  $this->fooditem_model->fooditem_dropdown();
			$data['module'] = "itemmanage";
			$data['page']   = "availablelist";
			echo Modules::run('template/layout', $data);
		}
	}
	public function updateavailfrm($id)
	{
		$this->permission->method('itemmanage', 'update')->redirect();
		$data['title'] = display('edit_availablity');
		$data['intinfo']   = $this->foodavailable_model->findById($id);
		$data['itemdropdown']   =  $this->fooditem_model->fooditem_dropdown();
		$data['module'] = "itemmanage";
		$data['page']   = "availabledit";
		$this->load->view('itemmanage/availabledit', $data);
	}

	public function deleteavailable($category = null)
	{
		$this->permission->module('itemmanage', 'delete')->redirect();
		$logData = array(
			'action_page'         => "Food Availablity",
			'action_done'     	 => "Delete Data",
			'remarks'             => "Food Availablity Deleted",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		if ($this->foodavailable_model->delete($category)) {
			#Store data to log table.
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('itemmanage/item_food/availablelist');
	}

	//Food Variant Section
	public function todaymenutype($id = null)
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		$data['title']    = display('menu_type');
		$data["todaymenutypelist"] = $this->todaymenu_model->read_menulist();
		if (!empty($id)) {
			$data['title'] = display('menutype_edit');
			$data['intinfo']   = $this->todaymenu_model->findById($id);
		}
		$data['module'] = "itemmanage";
		$data['page']   = "menutypelist";
		echo Modules::run('template/layout', $data);
	}
	public function menutypecreate($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('add_menu_type');
		#-------------------------------#
		$this->form_validation->set_rules('menu_type_name', display('menu_type_name'), 'required|max_length[50]');
		$this->form_validation->set_rules('status', display('status'), 'required');
		$this->load->library('fileupload');
		$img = $this->fileupload->do_upload('./application/modules/itemmanage/assets/images/', 'picture');

		$data['intinfo'] = "";
		$data['mtype']   = (object) $postData = array(
			'menutypeid'          	=> $this->input->post('menutypeid'),
			'menutype' 	        	=> $this->input->post('menu_type_name', true),
			'menu_icon' 	 			=> (!empty($img) ? $img : $this->input->post('old_image')),
			'status' 	 	        => $this->input->post('status', true),
		);
		if ($this->form_validation->run()) {
			if (empty($this->input->post('menutypeid'))) {
				$this->permission->method('itemmanage', 'create')->redirect();
				$logData = array(
					'action_page'         => "Menu type List",
					'action_done'     	 => "Insert Data",
					'remarks'             => "New Menu type Created",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				if ($this->todaymenu_model->create($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/todaymenutype');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/todaymenutype");
			} else {
				$this->permission->method('itemmanage', 'update')->redirect();
				$logData = array(
					'action_page'         => "Menu type List",
					'action_done'     	 => "Update Data",
					'remarks'             => "Menu type Updated",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				);

				if ($this->todaymenu_model->update_menutype($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/todaymenutype");
			}
		} else {
			if (!empty($id)) {
				$data['title'] = display('menutype_edit');
				$data['intinfo']   = $this->todaymenu_model->findById($id);
			}
			$data['module'] = "itemmanage";
			$data['page']   = "menutypelist";
			echo Modules::run('template/layout', $data);
		}
	}
	public function updatemenufrm($id)
	{

		$this->permission->method('itemmanage', 'update')->redirect();
		$data['title'] = display('menutype_edit');
		$data['intinfo']   = $this->todaymenu_model->findById($id);
		$data['module'] = "itemmanage";
		$data['page']   = "mtypeedit";
		$this->load->view('itemmanage/mtypeedit', $data);
	}

	public function deletemenutype($category = null)
	{
		$this->permission->module('itemmanage', 'delete')->redirect();
		$logData = [
			'action_page'         => "Menu type List",
			'action_done'     	 => "Delete Data",
			'remarks'             => "Menu type Deleted",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		];
		if ($this->todaymenu_model->delete($category)) {
			#Store data to log table.
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('itemmanage/item_food/todaymenutype');
	}

	public function addgroupfood($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = "Add/Edit Promotions";
		#-------------------------------#
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit;
		// $this->form_validation->set_rules('CategoryID', display('category_name'), 'required');
		$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
		$this->form_validation->set_rules('status', display('status'), 'required');
		$savedid = $this->session->userdata('id');
		$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate'));
		$offerendate = str_replace('/', '-', $this->input->post('offerendate'));
		$groupietm = $this->input->post('allid', true);
		$totalitem = count(explode(',', $groupietm));
		$isoffer = $this->input->post('isoffer', true);
		$special = $this->input->post('special', true);
		if ($isoffer == 1) {
			$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
			$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
			$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
			$convertenddate = date('Y-m-d', strtotime($offerendate));
			$isoffer = $isoffer;
			$OffersRate = $this->input->post('offerate', true);
		} else {
			$convertstartdate = "0000-00-00";
			$convertenddate = "0000-00-00";
			$isoffer = 0;
			$OffersRate = 0;
		}
		if ($special == 1) {
			$special = $this->input->post('special', true);
		} else {
			$special = 0;
		}
		$myvat = $this->input->post('vat');
		if (empty($myvat)) {
			$myvat = 0;
		}
		$menutype = $this->input->post('menutype', true);
		$alltmtype = "";
		$i = 0;
		if (!empty($menutype)) {
			foreach ($menutype as $types) {
				$i++;
				$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
			}
			$alltmtype = trim($alltmtype, ',');
		}
		$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));
		#-------------------------------#
		if ($this->form_validation->run()) {
			if (count($_POST['mainModID']) < 1) {
				$this->session->set_flashdata('exception',  'Add More then 1 main modifiers for setting Promotion items');
				redirect("itemmanage/item_food/addgroupfood");
			}
			/****************image Upload*************/
			$config['upload_path']          = 'application/modules/itemmanage/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 100000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('picture')) {
				$error = array('error' => $this->upload->display_errors());
				$img = '';
				$big = '';
				$medium = '';
				$small = '';
			} else {
				if (!empty($id)) {
					$imageinfo = $this->db->select('*')->from('item_foods')->where('ProductsID', $id)->get()->row();
					unlink($imageinfo->ProductImage);
					unlink($imageinfo->bigthumb);
					unlink($imageinfo->medium_thumb);
					unlink($imageinfo->small_thumb);
				}

				$fdata = $this->upload->data();

				$image_sizes = array('big' => array(555, 370), 'medium' => array(268, 223), 'small' => array(116, 116));
				$this->load->library('image_lib');
				foreach ($image_sizes as $key => $resize) {
					$config1 = array(
						'source_image' => $fdata['full_path'],
						'new_image' => $fdata['file_path'] . $key . '/',
						'maintain_ratio' => FALSE,
						'width' => $resize[0],
						'height' => $resize[1],
						'quality' => 70,
					);
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();
				}
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
				$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
				$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
				$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
			}


			/****************end*********************/
			if (empty($this->input->post('ProductsID'))) {
				// New item insert to the database
				$this->permission->method('itemmanage', 'create')->redirect();
				$data['foodlist']   = (object) $postData = array(
					'ProductsID'     		=> 0,
					'CategoryID'     		=> 0,
					'ProductName'   		=> $this->input->post('foodname', true),
					'component'             => $this->input->post('component', true),
					'itemnotes'             => null,
					'menutype'              => $uniqueStr,
					'descrip'               => $this->input->post('descrip', true),
					'kitchenid'             =>  0,
					'isgroup'               =>  1,
					'cookedtime'            => $this->input->post('cookedtime', true),
					'productvat'            => $myvat,
					'OffersRate'            => $OffersRate,
					'special'       		=> $special,
					'offerIsavailable'      => $isoffer,
					'offerstartdate'        => $convertstartdate,
					'offerendate'           => $convertenddate,
					'ProductsIsActive'   	=> $this->input->post('status'),
					'ProductImage'      	=> $img,
					'bigthumb'      		=> $big,
					'medium_thumb'      	=> $medium,
					'small_thumb'      		=> $small,
					'UserIDInserted'     	=> $savedid,
					'UserIDUpdated'      	=> $savedid,
					'UserIDLocked'       	=> $savedid,
					'DateInserted'       	=> date('Y-m-d H:i:s'),
					'DateUpdated'        	=> date('Y-m-d H:i:s'),
					'DateLocked'         	=> date('Y-m-d H:i:s'),
				);
				$logData = array(
					'action_page'         => "Add Food",
					'action_done'     	  => "Insert Data",
					'remarks'             => "New Food Added",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}
				if ($this->fooditem_model->groupfood_create($postData)) {
					$insertedFoodId = $this->db->insert_id(); // Get last inserted food item ID
					$mainModArr=$otherModArr=[];
					if (isset($_POST['mainModID']) && count($_POST['mainModID'])>0) {
						for ($i=0; $i < (count($_POST['mainModID'])); $i++) {
							// $mainModArr['promotion_id'] = $insertedFoodId;
							// $mainModArr['category_id'] = $_POST['mainModID'][$i];
							// $mainModArr['category_max_qty'] = (isset($_POST['max_quantity'][$i])) ? ($_POST['max_quantity'][$i]==""?0:$_POST['max_quantity'][$i]) : 0;
							// $mainModArr['category_weight_percent'] = (isset($_POST['weight_percent'][$i])) ? ($_POST['weight_percent'][$i]==""?0:$_POST['weight_percent'][$i]) : 0;
							// $mainModArr['total_weight_percent'] = (($_POST['addhoc_weight_percent'] == "") ? 0 : $_POST['addhoc_weight_percent']);
							// $mainModArr['total_no_of_item'] = (($_POST['addhoc_max_item'] == "") ? 0 : $_POST['addhoc_max_item']);
							// $mainModArr['created_at'] = date("Y-m-d H:i:s");

							$mainModArr['promotion_id'] = $insertedFoodId;
							$mainModArr['category_id'] = $_POST['mainModID'][$i];
							$mainModArr['category_max_qty'] = isset($_POST['max_quantity'][$i]) && $_POST['max_quantity'][$i] !== "" ? $_POST['max_quantity'][$i] : 0;
							$mainModArr['category_weight_percent'] = isset($_POST['weight_percent'][$i]) && $_POST['weight_percent'][$i] !== "" ? $_POST['weight_percent'][$i] : 0;
							$mainModArr['total_weight_percent'] = isset($_POST['addhoc_weight_percent']) && $_POST['addhoc_weight_percent'] !== "" ? $_POST['addhoc_weight_percent'] : 0;
							$mainModArr['total_no_of_item'] = isset($_POST['addhoc_max_item']) && $_POST['addhoc_max_item'] !== "" ? $_POST['addhoc_max_item'] : 0;
							$mainModArr['created_at'] = date("Y-m-d H:i:s");
							$this->db->insert('promotion_main_modifiers', $mainModArr);
						}
						// echo "<pre>";
						// print_r($_POST);
						// echo "</pre>";
						// exit;
					}
					if (isset($_POST['otherModID']) && count($_POST['otherModID'])>0) {
						for ($i=0; $i < (count($_POST['otherModID'])); $i++) {
							$otherModArr['promotion_id'] = $insertedFoodId;
							$otherModArr['modifier_set_id'] = $_POST['otherModID'][$i];
							$otherModArr['created_at'] = date("Y-m-d H:i:s");
							$this->db->insert('promotion_other_modifiers', $otherModArr);
						}
					}
					$this->session->set_flashdata('message', display('save_successfully'));
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect('itemmanage/item_food/addgroupfood');
			} else {
				//update the existing item
				$this->permission->method('itemmanage', 'update')->redirect();
				if (empty($img)) {
					$img = $this->input->post('old_image', true);
					$big = $this->input->post('bigimage', true);
					$medium = $this->input->post('mediumimage', true);
					$small = $this->input->post('smallimage', true);
				}
				$data['category']   = (object) $postData = array(
					'ProductsID'     		=> $this->input->post('ProductsID'),
					'CategoryID'     		=> 0, //$this->input->post('CategoryID'),
					'ProductName'   		=> $this->input->post('foodname', true),
					'component'             => $this->input->post('component', true),
					'itemnotes'             => null, //$this->input->post('itemnotes', true),
					'menutype'              => $uniqueStr,
					'descrip'               => null, //$this->input->post('descrip', true),
					'productvat'            => $this->input->post('vat', true),
					'kitchenid'             => 0,
					'isgroup'               => 1,
					'cookedtime'            => $this->input->post('cookedtime', true),
					'OffersRate'            => $OffersRate,
					'special'       		=> $special,
					'offerIsavailable'      => $isoffer,
					'offerstartdate'        => $convertstartdate,
					'offerendate'           => $convertenddate,
					'ProductsIsActive'   	=> $this->input->post('status', true),
					'ProductImage'      	=> $img,
					'bigthumb'      		=> $big,
					'medium_thumb'      	=> $medium,
					'small_thumb'      		=> $small,

					'UserIDUpdated'      => $savedid,
					'DateUpdated'        => date('Y-m-d H:i:s'),
				);
				$logData = array(
					'action_page'         => "Food List",
					'action_done'     	  => "Update Data",
					'remarks'             => "Food Updated",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				$taxsettings = $this->taxchecking();
				if (!empty($taxsettings)) {
					$tx = 0;
					$taxitems = array();
					foreach ($taxsettings as $taxitem) {
						$filedtax = 'tax' . $tx;
						$taxitems[$filedtax] = $this->input->post($filedtax, true);
						$tx++;
					}
					$postData = array_merge($postData, $taxitems);
				}
				if ($this->fooditem_model->update_groupfooditem($postData)) {
					// echo "ProductsID: ".$_POST["ProductsID"]."<br><pre>";
					// print_r($_POST);
					// echo "</pre>";
					// exit;
					//start modifier update
					$this->db->where('promotion_id',$_POST["ProductsID"])->delete('promotion_main_modifiers');
					$this->db->where('promotion_id',$_POST["ProductsID"])->delete('promotion_other_modifiers');
					$mainModArr=$otherModArr=[];
					if (isset($_POST['mainModID']) && count($_POST['mainModID'])>0) {
						for ($i=0; $i < (count($_POST['mainModID'])); $i++) {
							$mainModArr['promotion_id'] = $_POST["ProductsID"];
							$mainModArr['category_id'] = $_POST['mainModID'][$i];
							$mainModArr['category_max_qty'] = (isset($_POST['max_quantity'][$i])) ? ($_POST['max_quantity'][$i]==""?0:$_POST['max_quantity'][$i]) : 0;
							$mainModArr['category_weight_percent'] = (isset($_POST['weight_percent'][$i])) ? ($_POST['weight_percent'][$i]==""?0:$_POST['weight_percent'][$i]) : 0;
							$mainModArr['total_weight_percent'] = (($_POST['addhoc_weight_percent'] == "") ? 0 : $_POST['addhoc_weight_percent']);
							$mainModArr['total_no_of_item'] = (($_POST['addhoc_max_item'] == "") ? 0 : $_POST['addhoc_max_item']);
							$mainModArr['created_at'] = date("Y-m-d H:i:s");
							// $mainModArr['promotion_id'] = $_POST["ProductsID"];
							// $mainModArr['category_id'] = $_POST['mainModID'][$i];
							// $mainModArr['category_max_qty'] = isset($_POST['max_quantity'][$i]) && $_POST['max_quantity'][$i] !== "" ? $_POST['max_quantity'][$i] : 0;
							// $mainModArr['category_weight_percent'] = isset($_POST['weight_percent'][$i]) && $_POST['weight_percent'][$i] !== "" ? $_POST['weight_percent'][$i] : 0;
							// $mainModArr['total_weight_percent'] = isset($_POST['addhoc_weight_percent']) && $_POST['addhoc_weight_percent'] !== "" ? $_POST['addhoc_weight_percent'] : 0;
							// $mainModArr['total_no_of_item'] = isset($_POST['addhoc_max_item']) && $_POST['addhoc_max_item'] !== "" ? $_POST['addhoc_max_item'] : 0;
							// $mainModArr['created_at'] = date("Y-m-d H:i:s");
							$this->db->insert('promotion_main_modifiers', $mainModArr);
						}
					}
					if (isset($_POST['otherModID']) && count($_POST['otherModID'])>0) {
						for ($i=0; $i < (count($_POST['otherModID'])); $i++) {
							$otherModArr['promotion_id'] = $_POST["ProductsID"];
							$otherModArr['modifier_set_id'] = $_POST['otherModID'][$i];
							$otherModArr['created_at'] = date("Y-m-d H:i:s");
							$this->db->insert('promotion_other_modifiers', $otherModArr);
						}
					}
					//end modifier update
					$this->logs_model->log_recorded($logData);
					$this->db->select('*');
					$this->db->from('item_foods');
					$this->db->where('ProductsIsActive', 1);
					$query = $this->db->get();
					foreach ($query->result() as $row) {
						$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
					}
					$cache_file = './assets/js/product.json';
					$productList = json_encode($json_product);
					file_put_contents($cache_file, $productList);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					// echo "ProductsID: ".$_POST["ProductsID"]."<br><pre>";
					// print_r($_POST);
					// echo "</pre>";
					// exit;
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/addgroupfood/" . $postData['ProductsID']);
			}
		} else {
			$data['taxitems'] = $this->taxchecking();
			if (!empty($id)) {
				// $data['title'] = display('update_group_item');
				$data['title'] = "Update Promotions";
				$data['productinfo']   = $this->fooditem_model->findBygroupId($id);
				$mainModResult = $this->db->select('*')->from('promotion_main_modifiers')->where('promotion_id',$id)->get()->result();
				$data['mainModinfo'] = $mainModResult;
				$otherModResult = $this->db->select('*')->from('promotion_other_modifiers')->where('promotion_id',$id)->get()->result();
				$data['otherModinfo'] = $otherModResult;
				// $data['mainModinfo']   = $this->fooditem_model->findMainModifiers($id);
				// $data['otherModinfo']  = $this->fooditem_model->findOtherModifiers($id);
				$data['groupsitem']    = $this->fooditem_model->allgroupitem($id);
			}
			$modifiers = $this->db->select('*')->from('modifier_groups')->get()->result();
			$data['modifiers']   =  $modifiers;
			$data['categories']   =  $this->category_model->allcategory_dropdown();
			$data['allkitchen']   =  $this->fooditem_model->allkitchen();
			$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
			$data['module'] = "itemmanage";
			$data['page']   = "addgroupitem";
			echo Modules::run('template/layout', $data);
		}
	}
	// public function addgroupfood($id = null)
	// {
	// 	$this->permission->method('itemmanage', 'create')->redirect();
	// 	$data['title'] = display('add_group_item');
	// 	#-------------------------------#
	// 	$this->form_validation->set_rules('CategoryID', display('category_name'), 'required');
	// 	$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
	// 	$this->form_validation->set_rules('status', display('status'), 'required');
	// 	$savedid = $this->session->userdata('id');
	// 	$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate'));
	// 	$offerendate = str_replace('/', '-', $this->input->post('offerendate'));
	// 	$groupietm = $this->input->post('allid', true);
	// 	$totalitem = count(explode(',', $groupietm));
	// 	$isoffer = $this->input->post('isoffer', true);
	// 	$special = $this->input->post('special', true);
	// 	if ($isoffer == 1) {
	// 		$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
	// 		$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
	// 		$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
	// 		$convertenddate = date('Y-m-d', strtotime($offerendate));
	// 		$isoffer = $isoffer;
	// 		$OffersRate = $this->input->post('offerate', true);
	// 	} else {
	// 		$convertstartdate = "0000-00-00";
	// 		$convertenddate = "0000-00-00";
	// 		$isoffer = 0;
	// 		$OffersRate = 0;
	// 	}
	// 	if ($special == 1) {
	// 		$special = $this->input->post('special', true);
	// 	} else {
	// 		$special = 0;
	// 	}
	// 	$myvat = $this->input->post('vat');
	// 	if (empty($myvat)) {
	// 		$myvat = 0;
	// 	}
	// 	$menutype = $this->input->post('menutype', true);
	// 	$alltmtype = "";
	// 	$i = 0;
	// 	if (!empty($menutype)) {
	// 		foreach ($menutype as $types) {
	// 			$i++;
	// 			$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
	// 		}
	// 		$alltmtype = trim($alltmtype, ',');
	// 	}
	// 	$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));
	// 	#-------------------------------#
	// 	if ($this->form_validation->run()) {
	// 		if ($totalitem < 2) {
	// 			$this->session->set_flashdata('exception',  'Add More then 1 Items for set menu/group items');
	// 			redirect("itemmanage/item_food/addgroupfood");
	// 		}
	// 		/****************image Upload*************/
	// 		$config['upload_path']          = 'application/modules/itemmanage/assets/images/';
	// 		$config['allowed_types']        = 'gif|jpg|jpeg|png';
	// 		$config['max_size']             = 100000;
	// 		$this->load->library('upload', $config);
	// 		if (!$this->upload->do_upload('picture')) {
	// 			$error = array('error' => $this->upload->display_errors());
	// 			$img = '';
	// 			$big = '';
	// 			$medium = '';
	// 			$small = '';
	// 		} else {
	// 			if (!empty($id)) {
	// 				$imageinfo = $this->db->select('*')->from('tem_foods')->where('ProductsID', $id)->get()->row();
	// 				unlink($imageinfo->ProductImage);
	// 				unlink($imageinfo->bigthumb);
	// 				unlink($imageinfo->medium_thumb);
	// 				unlink($imageinfo->small_thumb);
	// 			}

	// 			$fdata = $this->upload->data();

	// 			$image_sizes = array('big' => array(555, 370), 'medium' => array(268, 223), 'small' => array(116, 116));
	// 			$this->load->library('image_lib');
	// 			foreach ($image_sizes as $key => $resize) {
	// 				$config1 = array(
	// 					'source_image' => $fdata['full_path'],
	// 					'new_image' => $fdata['file_path'] . $key . '/',
	// 					'maintain_ratio' => FALSE,
	// 					'width' => $resize[0],
	// 					'height' => $resize[1],
	// 					'quality' => 70,
	// 				);
	// 				$this->image_lib->initialize($config1);
	// 				$this->image_lib->resize();
	// 				$this->image_lib->clear();
	// 			}
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();
	// 			$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
	// 			$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
	// 			$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
	// 			$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
	// 		}


	// 		/****************end*********************/
	// 		if (empty($this->input->post('ProductsID'))) {
	// 			$this->permission->method('itemmanage', 'create')->redirect();
	// 			$data['foodlist']   = (object) $postData = array(
	// 				'ProductsID'     		=> $this->input->post('ProductsID'),
	// 				'CategoryID'     		=> $this->input->post('CategoryID'),
	// 				'ProductName'   			=> $this->input->post('foodname', true),
	// 				'component'              => $this->input->post('component', true),
	// 				'itemnotes'              => $this->input->post('itemnotes', true),
	// 				'menutype'              => $uniqueStr,
	// 				'descrip'                => $this->input->post('descrip', true),
	// 				'kitchenid'             =>  0,
	// 				'isgroup'               =>  1,
	// 				'cookedtime'             => $this->input->post('cookedtime', true),
	// 				'productvat'             => $myvat,
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				'ProductsIsActive'   	=> $this->input->post('status'),
	// 				'ProductImage'      		=> $img,
	// 				'bigthumb'      			=> $big,
	// 				'medium_thumb'      		=> $medium,
	// 				'small_thumb'      		=> $small,
	// 				'UserIDInserted'     	=> $savedid,
	// 				'UserIDUpdated'      	=> $savedid,
	// 				'UserIDLocked'       	=> $savedid,
	// 				'DateInserted'       	=> date('Y-m-d H:i:s'),
	// 				'DateUpdated'        	=> date('Y-m-d H:i:s'),
	// 				'DateLocked'         	=> date('Y-m-d H:i:s'),
	// 			);
	// 			$logData = array(
	// 				'action_page'         => "Add Food",
	// 				'action_done'     	 => "Insert Data",
	// 				'remarks'             => "New Food Added",
	// 				'user_name'           => $this->session->userdata('fullname', true),
	// 				'entry_date'          => date('Y-m-d H:i:s'),
	// 			);
	// 			$taxsettings = $this->taxchecking();
	// 			if (!empty($taxsettings)) {
	// 				$tx = 0;
	// 				$taxitems = array();
	// 				foreach ($taxsettings as $taxitem) {
	// 					$filedtax = 'tax' . $tx;
	// 					$taxitems[$filedtax] = $this->input->post($filedtax, true);
	// 					$tx++;
	// 				}
	// 				$postData = array_merge($postData, $taxitems);
	// 			}
	// 			if ($this->fooditem_model->groupfood_create($postData)) {
	// 				$this->session->set_flashdata('message', display('save_successfully'));
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->db->select('*');
	// 				$this->db->from('item_foods');
	// 				$this->db->where('ProductsIsActive', 1);
	// 				$query = $this->db->get();
	// 				foreach ($query->result() as $row) {
	// 					$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
	// 				}
	// 				$cache_file = './assets/js/product.json';
	// 				$productList = json_encode($json_product);
	// 				file_put_contents($cache_file, $productList);
	// 			} else {
	// 				$this->session->set_flashdata('exception',  display('please_try_again'));
	// 			}
	// 			redirect('itemmanage/item_food/addgroupfood');
	// 		} else {
	// 			$this->permission->method('itemmanage', 'update')->redirect();
	// 			if (empty($img)) {
	// 				$img = $this->input->post('old_image', true);
	// 				$big = $this->input->post('bigimage', true);
	// 				$medium = $this->input->post('mediumimage', true);
	// 				$small = $this->input->post('smallimage', true);
	// 			}
	// 			$data['category']   = (object) $postData = array(
	// 				'ProductsID'     		=> $this->input->post('ProductsID'),
	// 				'CategoryID'     		=> $this->input->post('CategoryID'),
	// 				'ProductName'   			=> $this->input->post('foodname', true),
	// 				'component'              => $this->input->post('component', true),
	// 				'itemnotes'              => $this->input->post('itemnotes', true),
	// 				'menutype'               => $uniqueStr,
	// 				'descrip'                => $this->input->post('descrip', true),
	// 				'productvat'             => $this->input->post('vat', true),
	// 				'kitchenid'              => 0,
	// 				'isgroup'                =>  1,
	// 				'cookedtime'             => $this->input->post('cookedtime', true),
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				'ProductsIsActive'   	=> $this->input->post('status', true),
	// 				'ProductImage'      		=> $img,
	// 				'bigthumb'      			=> $big,
	// 				'medium_thumb'      		=> $medium,
	// 				'small_thumb'      		=> $small,

	// 				'UserIDUpdated'      => $savedid,
	// 				'DateUpdated'        => date('Y-m-d H:i:s'),
	// 			);
	// 			$logData = array(
	// 				'action_page'         => "Food List",
	// 				'action_done'     	 => "Update Data",
	// 				'remarks'             => "Food Updated",
	// 				'user_name'           => $this->session->userdata('fullname', true),
	// 				'entry_date'          => date('Y-m-d H:i:s'),
	// 			);
	// 			$taxsettings = $this->taxchecking();
	// 			if (!empty($taxsettings)) {
	// 				$tx = 0;
	// 				$taxitems = array();
	// 				foreach ($taxsettings as $taxitem) {
	// 					$filedtax = 'tax' . $tx;
	// 					$taxitems[$filedtax] = $this->input->post($filedtax, true);
	// 					$tx++;
	// 				}
	// 				$postData = array_merge($postData, $taxitems);
	// 			}


	// 			if ($this->fooditem_model->update_groupfooditem($postData)) {
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->db->select('*');
	// 				$this->db->from('item_foods');
	// 				$this->db->where('ProductsIsActive', 1);
	// 				$query = $this->db->get();
	// 				foreach ($query->result() as $row) {
	// 					$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
	// 				}
	// 				$cache_file = './assets/js/product.json';
	// 				$productList = json_encode($json_product);
	// 				file_put_contents($cache_file, $productList);
	// 				$this->session->set_flashdata('message', display('update_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception',  display('please_try_again'));
	// 			}
	// 			redirect("itemmanage/item_food/addgroupfood/" . $postData['ProductsID']);
	// 		}
	// 	} else {
	// 		$data['taxitems'] = $this->taxchecking();
	// 		if (!empty($id)) {
	// 			$data['title'] = display('update_group_item');
	// 			$data['productinfo']   = $this->fooditem_model->findBygroupId($id);
	// 			$data['groupsitem']   = $this->fooditem_model->allgroupitem($id);
	// 		}

	// 		$data['categories']   =  $this->category_model->allcategory_dropdown();
	// 		$data['allkitchen']   =  $this->fooditem_model->allkitchen();
	// 		$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
	// 		$data['module'] = "itemmanage";
	// 		$data['page']   = "addgroupitem";
	// 		echo Modules::run('template/layout', $data);
	// 	}
	// }
	private function taxchecking()
	{
		$taxinfos = '';
		if ($this->db->table_exists('tbl_tax')) {
			$taxsetting = $this->db->select('*')->from('tbl_tax')->get()->row();
		}
		if (!empty($taxsetting)) {
			if ($taxsetting->tax == 1) {
				$taxinfos = $this->db->select('*')->from('tax_settings')->get()->result_array();
			}
		}
		return $taxinfos;
	}
	public function checkfood()
	{
		$food = $this->input->post('q', true);
		$product_info 	= $this->fooditem_model->findfooditem($food);
		$list[''] = '';
		foreach ($product_info as $value) {
			$json_product[] = array('label' => $value['ProductName'] . '_' . $value['variantName'], 'value' => $value['ProductsID'], "varientid" => $value['variantid'], "variantName" => $value['variantName'], "ProductName" => $value['ProductName'], "price" => $value['price']);
		}
		echo json_encode($json_product);
	}

	/**
	 * ========================Food Item===========================
	 * ------------------------------------------------------------
	 * NEW FOOD ITEM
	 */
		
	// public function create_new($id = null)
	// {
		
	// 	$this->permission->method('itemmanage', 'create_new')->redirect();
	// 	$data['title'] = display('add_food');
	// 	#-------------------------------#
	// 	$this->form_validation->set_rules('CategoryID', display('category_name'), 'required');
	// 	if (!empty($this->input->post('ProductsID'))) {
	// 		$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
	// 	} else {
	// 		$this->form_validation->set_rules('foodname', display('item_name'), 'required|is_unique[item_foods.ProductName]|max_length[100]');
	// 		$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
	// 	}
	// 	$this->form_validation->set_rules('status', display('status'), 'required');

	// 	$savedid = $this->session->userdata('id');
	// 	$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate', true));
	// 	$offerendate = str_replace('/', '-', $this->input->post('offerendate', true));

	// 	$isoffer = $this->input->post('isoffer', true);
	// 	$special = $this->input->post('special', true);
	// 	if ($isoffer == 1) {
	// 		$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
	// 		$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
	// 		$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
	// 		$convertenddate = date('Y-m-d', strtotime($offerendate));
	// 		$isoffer = $isoffer;
	// 		$OffersRate = $this->input->post('offerate', true);
	// 	} else {
	// 		$convertstartdate = "0000-00-00";
	// 		$convertenddate = "0000-00-00";
	// 		$isoffer = 0;
	// 		$OffersRate = 0;
	// 	}
	// 	if ($special == 1) {
	// 		$special = $this->input->post('special', true);
	// 	} else {
	// 		$special = 0;
	// 	}
	// 	$myvat = $this->input->post('vat');
	// 	if (empty($myvat)) {
	// 		$myvat = 0;
	// 	}
	// 	$menutype = $this->input->post('menutype', true);
	// 	$alltmtype = "";
	// 	$i = 0;
	// 	if (!empty($menutype)) {
	// 		foreach ($menutype as $types) {
	// 			$i++;
	// 			$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
	// 		}

	// 		$alltmtype = trim($alltmtype, ',');
	// 	}
	// 	$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));
	// 	#-------------------------------#
	// 	if ($this->form_validation->run()) {
	// 		/****************image Upload*************/
	// 		$config['upload_path']          = 'application/modules/itemmanage/assets/images/';
	// 		$config['allowed_types']        = 'gif|jpg|jpeg|png';
	// 		$config['max_size']             = 100000;
	// 		$this->load->library('upload', $config);
	// 		if (! $this->upload->do_upload('picture')) {
	// 			$error = array('error' => $this->upload->display_errors());
	// 			$img = '';
	// 			$big = '';
	// 			$medium = '';
	// 			$small = '';
	// 		} else {
	// 			if (!empty($id)) {
	// 				$imageinfo = $this->db->select('*')->from('item_foods')->where('ProductsID', $id)->get()->row();
	// 				unlink($imageinfo->ProductImage);
	// 				unlink($imageinfo->bigthumb);
	// 				unlink($imageinfo->medium_thumb);
	// 				unlink($imageinfo->small_thumb);
	// 			}

	// 			$fdata = $this->upload->data();

	// 			$image_sizes = array('big' => array(555, 370), 'medium' => array(268, 223), 'small' => array(116, 116));
	// 			$this->load->library('image_lib');
	// 			foreach ($image_sizes as $key => $resize) {
	// 				$config1 = array(
	// 					'source_image' => $fdata['full_path'],
	// 					'new_image' => $fdata['file_path'] . $key . '/',
	// 					'maintain_ratio' => FALSE,
	// 					'width' => $resize[0],
	// 					'height' => $resize[1],
	// 					'quality' => 70,
	// 				);
	// 				$this->image_lib->initialize($config1);
	// 				$this->image_lib->resize();
	// 				$this->image_lib->clear();
	// 			}
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();
	// 			$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
	// 			$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
	// 			$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
	// 			$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
	// 		}


	// 		/****************end*********************/
	// 		if (empty($this->input->post('ProductsID'))) {
	// 			$this->permission->method('itemmanage', 'create')->redirect();
	// 			$data['foodlist']   = (object) $postData = array(
	// 				'ProductsID'     		=> $this->input->post('ProductsID'),
	// 				'CategoryID'     		=> $this->input->post('CategoryID'),
	// 				'ProductName'   			=> $this->input->post('foodname', true),
	// 				'component'              => $this->input->post('component', true),
	// 				'itemnotes'              => $this->input->post('itemnotes', true),
	// 				'menutype'               => $uniqueStr,
	// 				'descrip'                => $this->input->post('descrip', true),
	// 				'kitchenid'              =>  $this->input->post('kitchen'),
	// 				'cookedtime'             => $this->input->post('cookedtime', true),
	// 				'productvat'             => $myvat,
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				'is_customqty'           => $this->input->post('customqty', true),
	// 				'ProductsIsActive'   	=> $this->input->post('status'),
	// 				'ProductImage'      		=> $img,
	// 				'bigthumb'      			=> $big,
	// 				'medium_thumb'      		=> $medium,
	// 				'small_thumb'      		=> $small,
	// 				'UserIDInserted'     	=> $savedid,
	// 				'UserIDUpdated'      	=> $savedid,
	// 				'UserIDLocked'       	=> $savedid,
	// 				'DateInserted'       	=> date('Y-m-d H:i:s'),
	// 				'DateUpdated'        	=> date('Y-m-d H:i:s'),
	// 				'DateLocked'         	=> date('Y-m-d H:i:s'),
	// 				'cusine_type'			=> $this->input->post('cusine_type'),
	// 				'is_bom'					=> $this->input->post('is_bom'),
	// 			);
	// 			$logData = array(
	// 				'action_page'         => "Add Food",
	// 				'action_done'     	 => "Insert Data",
	// 				'remarks'             => "New Food Added",
	// 				'user_name'           => $this->session->userdata('fullname', true),
	// 				'entry_date'          => date('Y-m-d H:i:s'),
	// 			);
	// 			$taxsettings = $this->taxchecking();
	// 			if (!empty($taxsettings)) {
	// 				$tx = 0;
	// 				$taxitems = array();
	// 				foreach ($taxsettings as $taxitem) {
	// 					$filedtax = 'tax' . $tx;
	// 					$taxitems[$filedtax] = $this->input->post($filedtax, true);
	// 					$tx++;
	// 				}
	// 				$postData = array_merge($postData, $taxitems);
	// 			}
	// 			if ($this->fooditem_model->fooditem_create($postData)) {
	// 				$insertedFoodId = $this->db->insert_id(); // Get last inserted food item ID
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->db->select('*');
	// 				$this->db->from('item_foods');
	// 				$this->db->where('ProductsIsActive', 1);
	// 				$query = $this->db->get();
	// 				foreach ($query->result() as $row) {
	// 					$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
	// 				}
	// 				$cache_file = './assets/js/product.json';
	// 				$productList = json_encode($json_product);
	// 				file_put_contents($cache_file, $productList);
	// 				// Varient add [start]
	// 				$variantData = [
	// 					'menuid'          => $insertedFoodId,
	// 					'variantName'     => 'Regular',
	// 					'price'           => $this->input->post('regPrice', true),
	// 					'takeaway_price'  => $this->input->post('takeawayPrice', true),
	// 					'uber_eats_price' => $this->input->post('uberEatsPrice', true),
	// 					'web_order_price' => $this->input->post('webOrderPrice', true),
	// 				];
	// 				$variantLogData = [
	// 					'action_page'         => "Varient List",
	// 					'action_done'     	 => "Insert Data",
	// 					'remarks'             => "New Varient Created",
	// 					'user_name'           => $this->session->userdata('fullname'),
	// 					'entry_date'          => date('Y-m-d H:i:s'),
	// 				];

	// 				$this->foodvarient_model->create($variantData);
	// 				$this->logs_model->log_recorded($variantLogData);
	// 				// Varient add [end]
	// 				$this->session->set_flashdata('message', display('save_successfully'));
	// 				redirect('itemmanage/item_food/create_new');
	// 			} else {
	// 				$this->session->set_flashdata('exception',  display('please_try_again'));
	// 			}
	// 			redirect("itemmanage/item_food/create_new");
	// 		} 
	// 		else {
	// 			$this->permission->method('itemmanage', 'update')->redirect();
	// 			if (empty($img)) {
	// 				$img = $this->input->post('old_image', true);
	// 				$big = $this->input->post('bigimage', true);
	// 				$medium = $this->input->post('mediumimage', true);
	// 				$small = $this->input->post('smallimage', true);
	// 			}
	// 			$data['category']   = (object) $postData = array(
	// 				'ProductsID'     		=> $this->input->post('ProductsID'),
	// 				'CategoryID'     		=> $this->input->post('CategoryID'),
	// 				'ProductName'   			=> $this->input->post('foodname', true),
	// 				'component'              => $this->input->post('component', true),
	// 				'itemnotes'              => $this->input->post('itemnotes', true),
	// 				'menutype'              => $uniqueStr,
	// 				'descrip'                => $this->input->post('descrip', true),
	// 				'productvat'             => $this->input->post('vat', true),
	// 				'kitchenid'             => $this->input->post('kitchen'),
	// 				'cookedtime'             => $this->input->post('cookedtime', true),
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'is_customqty'           => $this->input->post('customqty', true),
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				'ProductsIsActive'   	=> $this->input->post('status', true),
	// 				'ProductImage'      		=> $img,
	// 				'bigthumb'      			=> $big,
	// 				'medium_thumb'      		=> $medium,
	// 				'small_thumb'      		=> $small,

	// 				'UserIDUpdated'      => $savedid,
	// 				'DateUpdated'        => date('Y-m-d H:i:s'),
	// 				'cusine_type'			=> $this->input->post('cusine_type'),
	// 				'is_bom'					=> $this->input->post('is_bom'),
	// 			);
	// 			$logData = array(
	// 				'action_page'         => "Food List",
	// 				'action_done'     	 => "Update Data",
	// 				'remarks'             => "Food Updated",
	// 				'user_name'           => $this->session->userdata('fullname', true),
	// 				'entry_date'          => date('Y-m-d H:i:s'),
	// 			);
	// 			$taxsettings = $this->taxchecking();
	// 			if (!empty($taxsettings)) {
	// 				$tx = 0;
	// 				$taxitems = array();
	// 				foreach ($taxsettings as $taxitem) {
	// 					$filedtax = 'tax' . $tx;
	// 					$taxitems[$filedtax] = $this->input->post($filedtax, true);
	// 					$tx++;
	// 				}
	// 				$postData = array_merge($postData, $taxitems);
	// 			}

	// 			if ($this->fooditem_model->update_fooditem($postData)) {
	// 				$this->logs_model->log_recorded($logData);
	// 				$this->db->select('*');
	// 				$this->db->from('item_foods');
	// 				$this->db->where('ProductsIsActive', 1);
	// 				$query = $this->db->get();
	// 				foreach ($query->result() as $row) {
	// 					$json_product[] = array('label' => $row->ProductName, 'value' => $row->ProductsID);
	// 				}
	// 				$cache_file = './assets/js/product.json';
	// 				$productList = json_encode($json_product);
	// 				file_put_contents($cache_file, $productList);
	// 				$this->session->set_flashdata('message', display('update_successfully'));
	// 			} else {
	// 				$this->session->set_flashdata('exception',  display('please_try_again'));
	// 			}
	// 			redirect("itemmanage/item_food/create_new/" . $postData['ProductsID']);
	// 		}
	// 	} else {
	// 		$data['taxitems'] = $this->taxchecking();
	// 		if (!empty($id)) {
	// 			$data['title'] = display('update_fooditem');
	// 			$data['productinfo']   = $this->fooditem_model->findById($id);
	// 		}

	// 		$data['categories']   =  $this->category_model->allcategory_dropdown();
	// 		$data['allkitchen']   =  $this->fooditem_model->allkitchen();
	// 		$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
	// 		$data['item']   = $this->fooditem_model->item_dropdown();
	// 		$data['ingrdientslist']   = $this->fooditem_model->ingrediantlist();
	// 		$data["addonslist"] = $this->fooditem_model->read_modified_groups_addons($config["per_page"], $page);
	// 		$data['module'] = "itemmanage";
	// 		$data['page']   = "addfooditemnew";
	// 		echo Modules::run('template/layout', $data);
	// 	}
	// }

	
	public function create_new($id = null)
	{
		$this->permission->method('itemmanage', 'create_new')->redirect();
		$data['title'] = display('add_food');

		// Validation Rules
		$this->form_validation->set_rules('CategoryID[]', display('category_name'), 'required');

		if (!empty($this->input->post('ProductsID'))) {
			$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
		} else {
			$this->form_validation->set_rules('foodname', display('item_name'), 'required|is_unique[item_foods.ProductName]|max_length[100]');
			$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
		}

		$this->form_validation->set_rules('status', display('status'), 'required');

		// Handle offer dates
		$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate', true));
		$offerenddate = str_replace('/', '-', $this->input->post('offerendate', true));

		$isoffer = $this->input->post('isoffer', true) == 1 ? 1 : 0;
		$special = $this->input->post('special', true) == 1 ? 1 : 0;
		$myvat = $this->input->post('vat') ?: 0;

		if ($isoffer) {
			$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
			$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
			$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
			$convertenddate = date('Y-m-d', strtotime($offerenddate));
			$OffersRate = $this->input->post('offerate', true);
		} else {
			$convertstartdate = "0000-00-00";
			$convertenddate = "0000-00-00";
			$OffersRate = 0;
		}

		// Process selected menu types
		$menutype = $this->input->post('menutype', true);
		$alltmtype = "";
		if (!empty($menutype)) {
			foreach ($menutype as $types) {
				$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
			}
			$alltmtype = trim($alltmtype, ',');
		}
		$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));

		if ($this->form_validation->run()) {
			// Image Upload
			$img = $big = $medium = $small = '';

			if (!empty($_FILES['picture']['name'])) {
				$config['upload_path'] = 'application/modules/itemmanage/assets/images/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = 100000;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('picture')) {
					$fdata = $this->upload->data();
					$img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
					$big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
					$medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
					$small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];

					// Resize images
					$this->load->library('image_lib');
					$image_sizes = [
						'big' => [555, 370], 
						'medium' => [268, 223], 
						'small' => [116, 116]
					];
					foreach ($image_sizes as $key => $resize) {
						$config1 = [
							'source_image' => $fdata['full_path'],
							'new_image' => $fdata['file_path'] . $key . '/',
							'maintain_ratio' => FALSE,
							'width' => $resize[0],
							'height' => $resize[1],
							'quality' => 70,
						];
						$this->image_lib->initialize($config1);
						$this->image_lib->resize();
						$this->image_lib->clear();
					}
				}
			}

			// Convert multi-select fields to JSON
			$categoryIdsRaw = $this->input->post('CategoryID', true);
			$categoryIdsCleaned = array_map(function($id) {
				return preg_replace('/[^0-9]/', '', $id); // Remove non-numeric characters
			}, $categoryIdsRaw);
			$categoryIds = json_encode($categoryIdsCleaned);
			$savedid = $this->session->userdata('id');

			// Prepare data for insertion
			$postData = [
				'ProductsID' => $this->input->post('ProductsID'),
				'CategoryID' => $categoryIds,
				'ProductName' => $this->input->post('foodname', true),
				'component' => $this->input->post('component', true),
				'menutype'               => $uniqueStr,
				'itemnotes' => $this->input->post('itemnotes', true),
				'descrip' => $this->input->post('descrip', true),
				'kitchenid' =>  $this->input->post('kitchen'),
				'cookedtime' => $this->input->post('cookedtime', true),
				'productvat'             => $myvat,
				'OffersRate'             => $OffersRate,
				'special'       			=> $special,
				'offerIsavailable'       => $isoffer,
				'offerstartdate'         => $convertstartdate,
				'offerendate'            => $convertenddate,
				//'is_customqty'           => $this->input->post('customqty', true),
				'ProductsIsActive'   	=> $this->input->post('status'),
				'ProductImage'      	=> $img,
				'bigthumb'      		=> $big,
				'medium_thumb'      	=> $medium,
				'small_thumb'      		=> $small,
				'UserIDInserted'     	=> $savedid,
				'UserIDUpdated'      	=> $savedid,
				'UserIDLocked'       	=> $savedid,
				'DateInserted'       	=> date('Y-m-d H:i:s'),
				'DateUpdated'        	=> date('Y-m-d H:i:s'),
				'DateLocked'         	=> date('Y-m-d H:i:s'),
				'cusine_type'			=> $this->input->post('cusine_type'),
				'is_bom'				=> $this->input->post('is_bom'),
			];

			// Insert or Update Logic
			if (empty($id)) {
				if ($this->fooditem_model->fooditem_create($postData)) {
					$insertedFoodId = $this->db->insert_id();
					
					// Update JSON cache file
					$query = $this->db->select('*')->from('item_foods')->where('ProductsIsActive', 1)->get();
					$json_product = [];
					foreach ($query->result() as $row) {
						$json_product[] = ['label' => $row->ProductName, 'value' => $row->ProductsID];
					}
					file_put_contents('./assets/js/product.json', json_encode($json_product));
					// Add Variants
					//Check Variant exist or not
					if($this->input->post('variant_name', true)){
						$variantNames =  $this->input->post('variant_name', true);
						$prices = 	$this->input->post('price', true);
						$takeawayPrices = $this->input->post('takeaway_price', true);
						$uberEatsPrices = $this->input->post('uber_eats_price', true);
						$doordashPrices = $this->input->post('doordash_price', true);
						$webOrderPrices = $this->input->post('weborder_price', true);
						foreach($variantNames as $key => $variantName){
							$variantData = [
								'menuid' => $insertedFoodId,
								'variantName' => $variantName,
								'price' => $prices[$key],
								'takeaway_price' => $takeawayPrices[$key],
								'uber_eats_price' => $uberEatsPrices[$key],
								'doordash_price' => $doordashPrices[$key],
								'web_order_price' => $webOrderPrices[$key],
							];
							// Insert Variant
							if($this->foodvarient_model->create($variantData)){
								// Inserted Variant Id
								$insertedVariantId = $this->db->insert_id();
								// Log Variant
								$variantLogData = [
									'action_page' => "Create New",
									'action_done' => "Insert Data",
									'remarks' => "New Varient Created",
									'user_name' => $this->session->userdata('fullname'),
									'entry_date' => date('Y-m-d H:i:s'),
								];
								$this->logs_model->log_recorded($variantLogData);

								// Insert in Product Details
								// Check is bom true
								if($this->input->post('is_bom', true)){
									// Check Food Ingredients array
									$foodIngredients = $this->input->post('product_id', true);
									if($foodIngredients){
										foreach($foodIngredients as $key => $foodIngredient){
											$ingredientData = [
												'foodid' => $insertedFoodId,
												'pvarientid' => $insertedVariantId,
												'ingredientid' => $foodIngredient,
												'qty' => $this->input->post('product_quantity', true)[$key],
												'unitid' => $this->input->post('unitid', true)[$key],
												'unit_name' => $this->input->post('unitname', true)[$key],
												'created_by' => $savedid,
											];
											// Insert Ingredient
											$this->fooditem_model->create_food_ingredient($ingredientData);
										}
									}

									// Insert Production
									$productionData = [
										'itemid' => $insertedFoodId,
										'itemvid' => $insertedVariantId,
										'itemquantity' => $this->input->post('unit', true),
										'savedby' => $savedid,
										'is_bom' => $this->input->post('is_bom', true),
										'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true)[$key])),
										'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true)[$key])),
									];
									// Insert Ingredient
									$this->fooditem_model->create_food_production($productionData);
								}

							}
						}
					}
					// END of Variant and its Production update
					// Now insert Modifiers
					// Check Modifier exist or not
					if($this->input->post('modifiers', true) && is_array($this->input->post('modifiers', true))){
						$modifiers = $this->input->post('modifiers', true);
						foreach($modifiers as $key => $modifier){
							$modifierArr = explode('-', $modifier);
							$modifierId =  $modifierArr[0];
							$modifierData = [
								'menu_id' => $insertedFoodId,
								'add_on_id' => $modifierId,
							];
							// Insert Modifier
							$this->fooditem_model->create_modifiers($modifierData);
						}
					}

					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/create_new');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/create_new");
			}
		} else {
			$data['categories']   =  $this->category_model->allcategory_dropdown();
				$data['allkitchen']   =  $this->fooditem_model->allkitchen();
				$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
				$data['item']   = $this->fooditem_model->item_dropdown();
				$data['ingrdientslist']   = $this->fooditem_model->ingrediantlist();
				$data["addonslist"] = $this->fooditem_model->read_modified_groups_addons($config["per_page"], $page);
				$data['module'] = "itemmanage";
				$data['page']   = "addfooditemnew";
				echo Modules::run('template/layout', $data);
		}
	}

	public function ingredientlistdropdowns()
	{
		$ingredients = $this->fooditem_model->ingrediantlist();
		
		if (!empty($ingredients)) {
			echo json_encode([
				"status" => "success",
				"data" => $ingredients
			]);
		} else {
			echo json_encode([
				"status" => "error",
				"message" => "No ingredients found."
			]);
		}
	}

	public function checkStockAvailability()
{
    $ingredientid = $this->input->post('product_id');
    $csrf = $this->input->post('csrf_test_name');

    // Validate CSRF Token
    if (!$this->security->check_csrf_token($csrf)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF Token']);
        return;
    }

    // Check stock
    $available = $this->checkingredient(1, $ingredientid);

    // Fetch unit price
    $uprice = $this->db->select('unit_price')
        ->from('ingredients')
        ->where('id', $ingredientid)
        ->get()
        ->row();

    echo json_encode([
        'stock_available' => $available,
        'uprice' => $uprice ? $uprice->unit_price : 0
    ]);
}




	 /**
	  * ========================Food Item===========================
	  */

	
}
