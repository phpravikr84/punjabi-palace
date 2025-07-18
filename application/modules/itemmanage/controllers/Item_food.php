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
		// echo '<pre>';
		// print_r($data["fooditemslist"]);
		// echo '</pre>';
		// exit;
		$data['pagenum'] = $page;
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		#
		$data['sub_header'] = 'item';
		$data['module'] = "itemmanage";
		$data['page']   = "fooditemlist";
		echo Modules::run('template/layout', $data);
	}
	public function promo_index()
	{

		$this->permission->method('itemmanage', 'read')->redirect();
		// $data['title']    = display('food_list');
		$data['title']    = "Deals List";
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('itemmanage/item_food/index');
		$config["total_rows"]  = $this->fooditem_model->count_dealitem();
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
		$data["fooditemslist"] = $this->fooditem_model->read_promoitem($config["per_page"], $page);
		$data['pagenum'] = $page;
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		#
		$data['sub_header'] = 'meal_deals';
		$data['module'] = "itemmanage";
		$data['page']   = "promofooditemlist";
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

	public function addpromofood ($id = null)
	{
		$this->permission->method('itemmanage', 'addpromofood')->redirect();
		$data['title'] = "Add Promo Food";
		#-------------------------------#
		// $this->form_validation->set_rules('CategoryID', display('category_name'), 'required');
		if (!empty($this->input->post('ProductsID'))) {
			$this->form_validation->set_rules('promo_title', "Title", 'required|max_length[100]');
		} else {
			$this->form_validation->set_rules('promo_title', "Title", 'required|is_unique[promo_data.promo_title]|max_length[100]');
			$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
		}
		$this->form_validation->set_rules('status', display('status'), 'required');

		$savedid = $this->session->userdata('id');
		$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate', true));
		$offerendate = str_replace('/', '-', $this->input->post('offerendate', true));

		$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
		$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
		$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
		$convertenddate = date('Y-m-d', strtotime($offerendate));

		// $isoffer = $this->input->post('isoffer', true);
		// if ($isoffer == 1) {
		// 	$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
		// 	$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
		// 	$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
		// 	$convertenddate = date('Y-m-d', strtotime($offerendate));
		// 	$isoffer = $isoffer;
		// 	$OffersRate = $this->input->post('offerate', true);
		// } else {
		// 	$convertstartdate = "0000-00-00";
		// 	$convertenddate = "0000-00-00";
		// 	$isoffer = 0;
		// 	$OffersRate = 0;
		// }
		#-------------------------------#
		if ($this->form_validation->run()) {
			$promo_title= $this->input->post('promo_title');
			$offerstartdate= $this->input->post('offerstartdate');
			$offerendate= $this->input->post('offerendate');
			$status= $this->input->post('status');
			$promo_type= $this->input->post('promo_type');
			
			if (empty($this->input->post('ProductsID'))) {
				//add new item
				// echo "<pre>";
				// print_r($_POST);
				// echo "</pre>";
				$postData = array(
					'promo_title'     	=> $promo_title,
					'start_date'   		=> $convertstartdate,
					'end_date'   		=> $convertenddate,
					'status'       		=> $status,
					'promo_type'       	=> $promo_type,
					'created_at'      	=> date('Y-m-d H:i:s')
				);
				if ($promo_type == 1) {
					//discount item
					$discount_offerate = $this->input->post('discount_offerate');
					$discount_food = $this->input->post('discount_food');
					$postData['discount_rate'] = $discount_offerate;
					$postData['offer_food_id'] = $discount_food;

					//check if the food id is already exist in the table with the same offer period
					$this->db->select('ProductsID');
					$this->db->from('item_foods');
					$this->db->where('ProductsID', $discount_food);
					$this->db->where('offerIsavailable', 1);
					// $this->db->where('offerstartdate <=', $convertstartdate);
					$this->db->where('offerendate >=', $convertstartdate);
					$checkDiscountExistItemFoods = $this->db->get()->row();
					if ($checkDiscountExistItemFoods) {
						$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
						redirect('itemmanage/item_food/addpromofood');
					}
					$this->db->select('offer_food_id, id');
					$this->db->from('promo_data');
					$this->db->where('offer_food_id', $discount_food);
					$this->db->where('status', 1);
					$this->db->where('promo_type', 1);
					// $this->db->where('start_date <=', $convertstartdate);
					// $this->db->where('end_date >=', $convertenddate);
					$this->db->where('end_date >=', $convertstartdate);
					$checkDiscountExistPromoData = $this->db->get()->row();
					if ($checkDiscountExistPromoData) {
						$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
						redirect('itemmanage/item_food/addpromofood');
					}
					$this->db->where('ProductsID', $discount_food);
					$this->db->set('OffersRate', $discount_offerate);
					$this->db->set('offerIsavailable', 1);
					$this->db->set('offerstartdate', $convertstartdate);
					$this->db->set('offerendate', $convertenddate);
					$this->db->update('item_foods');
				}
				if ($promo_type == 2) {
					//combo item
					$free_item_buy_food = $this->input->post('free_item_buy_food');
					$free_item_buy_qty = $this->input->post('free_item_buy_qty');
					$free_item_get_food = $this->input->post('free_item_get_food');
					$free_item_get_qty = $this->input->post('free_item_get_qty');

					$postData['offer_food_id'] = $free_item_buy_food;
					$postData['buy_qty'] = $free_item_buy_qty;
					$postData['get_food_id'] = $free_item_get_food;
					$postData['get_qty'] = $free_item_get_qty;

					//check if the food id is already exist in the promo_data table with the same offer period
					$this->db->select('offer_food_id, id');
					$this->db->from('promo_data');
					$this->db->where('offer_food_id', $free_item_buy_food);
					$this->db->where('status', 1);
					$this->db->where('promo_type', 2);
					// $this->db->where('start_date <=', $convertstartdate);
					$this->db->where('end_date >=', $convertstartdate);
					$checkComboExistPromoData = $this->db->get()->row();
					// echo "Last Query: " . $this->db->last_query();
					// echo "<pre>";
					// print_r($checkComboExistPromoData);
					// echo "</pre>";
					// exit;
					if ($checkComboExistPromoData) {
						$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
						redirect('itemmanage/item_food/addpromofood');
					}
				}
				$logData = array(
					'action_page'         => "Add Promo Food",
					'action_done'     	  => "Insert Data",
					'remarks'             => "New Promo Food Added",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				if ($this->fooditem_model->promo_food_create($postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('itemmanage/item_food/promo_list');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
			} else {
				//update existing item
				$this->permission->method('itemmanage', 'update')->redirect();
				$data['promo_food_data_update']   = (object) $postData = array(
					'promo_title'     	=> $promo_title,
					'start_date'   		=> $convertstartdate,
					'end_date'   		=> $convertenddate,
					'status'       		=> $status,
					'promo_type'       	=> $promo_type,
					'updated_at'      	=> date('Y-m-d H:i:s')
				);
				$logData = array(
					'action_page'         => "Promo Food List",
					'action_done'     	 => "Update Data",
					'remarks'             => "Promo Food Updated",
					'user_name'           => $this->session->userdata('fullname', true),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				if ($promo_type == 1) {
					//discount item
					$discount_offerate = $this->input->post('discount_offerate');
					$discount_food = $this->input->post('discount_food');
					$postData['discount_rate'] = $discount_offerate;
					$postData['offer_food_id'] = $discount_food;

					//check if the food id is already exist in the table with the same offer period except current food item
					// $this->db->select('ProductsID');
					// $this->db->from('item_foods');
					// $this->db->where('ProductsID', $discount_food);
					// $this->db->where('offerIsavailable', 1);
					// // $this->db->where('offerstartdate <=', $convertstartdate);
					// $this->db->where('offerendate >=', $convertstartdate);
					// $checkDiscountExistItemFoods = $this->db->get()->row();
					// if ($checkDiscountExistItemFoods) {
					// 	$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
					// 	redirect('itemmanage/item_food/addpromofood');
					// }
					$this->db->select('offer_food_id, id');
					$this->db->from('promo_data');
					$this->db->where('offer_food_id', $discount_food);
					$this->db->where('status', 1);
					$this->db->where('promo_type', 1);
					// $this->db->where('start_date <=', $convertstartdate);
					// $this->db->where('end_date >=', $convertenddate);
					$this->db->where('end_date >=', $convertstartdate);
					$this->db->where('id !=', $this->input->post('ProductsID'));
					$checkDiscountExistPromoData = $this->db->get()->row();
					if ($checkDiscountExistPromoData) {
						$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
						redirect('itemmanage/item_food/addpromofood');
					}

					$this->db->where('ProductsID', $discount_food);
					$this->db->set('OffersRate', $discount_offerate);
					$this->db->set('offerIsavailable', 1);
					$this->db->set('offerstartdate', $convertstartdate);
					$this->db->set('offerendate', $convertenddate);
					$this->db->update('item_foods');
				}
				if ($promo_type == 2) {
					//combo item
					$free_item_buy_food = $this->input->post('free_item_buy_food');
					$free_item_buy_qty = $this->input->post('free_item_buy_qty');
					$free_item_get_food = $this->input->post('free_item_get_food');
					$free_item_get_qty = $this->input->post('free_item_get_qty');

					//check if the food id is already exist in the promo_data table with the same offer period
					$this->db->select('offer_food_id, id');
					$this->db->from('promo_data');
					$this->db->where('offer_food_id', $free_item_buy_food);
					$this->db->where('status', 1);
					$this->db->where('promo_type', 2);
					// $this->db->where('start_date <=', $convertstartdate);
					$this->db->where('end_date >=', $convertstartdate);
					$this->db->where('id !=', $this->input->post('ProductsID'));
					$checkComboExistPromoData = $this->db->get()->row();
					if ($checkComboExistPromoData) {
						$this->session->set_flashdata('exception', 'This food item already has an active offer during the selected period.');
						redirect('itemmanage/item_food/addpromofood');
					}

					$postData['offer_food_id'] = $free_item_buy_food;
					$postData['buy_qty'] = $free_item_buy_qty;
					$postData['get_food_id'] = $free_item_get_food;
					$postData['get_qty'] = $free_item_get_qty;
				}
				if ($this->fooditem_model->promo_food_update($this->input->post('ProductsID'),$postData)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('update_successfully'));
					redirect('itemmanage/item_food/promo_list');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("itemmanage/item_food/addpromofood/" . $postData['ProductsID']);
			}
		}  else {
			$data['taxitems'] = $this->taxchecking();
			// echo "<script>alert('Update ID: ".$id."')</script>";
			if (!empty($id)) {
				$data['title'] = "Update Promo Food";
				$data['productinfo'] = $this->fooditem_model->promoItemFindById($id);
			}
			// $data['categories']  =  $this->category_model->allcategory_dropdown();
			// $data['allkitchen']  =  $this->fooditem_model->allkitchen();
			$data['food_list']   =  $this->fooditem_model->read_fooditem();
			// $data['todaymenu']   =  $this->todaymenu_model->read_menulist();
			
			$data['sub_header'] = 'promos';
			$data['module'] = "itemmanage";
			$data['page']   = "addpromofood";
			echo Modules::run('template/layout', $data);
		}
	}
	public function promo_delete($id = null)
	{
		$this->permission->method('itemmanage', 'promo_delete')->redirect();
		if (empty($id)) {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			redirect('itemmanage/item_food/promo_list');
		}
		if ($this->fooditem_model->promo_delete($id)) {
			$this->session->set_flashdata('message', display('delete_successfully'));
			$logData = array(
				'action_page'         => "Promo Food List",
				'action_done'     	  => "Delete Data",
				'remarks'             => "Promo Food Deleted",
				'user_name'           => $this->session->userdata('fullname', true),
				'entry_date'          => date('Y-m-d H:i:s'),
			);
			$this->logs_model->log_recorded($logData);
			redirect('itemmanage/item_food/promo_list');
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			redirect('itemmanage/item_food/promo_list');
		}
	}
	public function promo_list ()
	{
		$this->permission->method('itemmanage', 'promo_list')->redirect();
		$data['title']    = 'Promo Food List';
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('itemmanage/item_food/promo_list');
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
		$data["promoitemslist"] = $this->fooditem_model->read_promoitems($config["per_page"], $page);
		$data['pagenum'] = $page;
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		# 
		$data['sub_header'] = 'promos';
		$data['module'] = "itemmanage";
		$data['page']   = "promo_list";
		echo Modules::run('template/layout', $data);
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
		$data['title'] = "Add/Edit Meal Deals";
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

							$mainModArr['promotion_id'] = $insertedFoodId;
							$mainModArr['category_id'] = $_POST['mainModID'][$i];
							$mainModArr['category_max_qty'] = isset($_POST['max_quantity'][$i]) && $_POST['max_quantity'][$i] !== "" ? $_POST['max_quantity'][$i] : 0;
							$mainModArr['category_weight_percent'] = isset($_POST['weight_percent'][$i]) && $_POST['weight_percent'][$i] !== "" ? $_POST['weight_percent'][$i] : 0;
							$mainModArr['total_weight_percent'] = isset($_POST['addhoc_weight_percent']) && $_POST['addhoc_weight_percent'] !== "" ? $_POST['addhoc_weight_percent'] : 0;
							$mainModArr['total_no_of_item'] = isset($_POST['addhoc_max_item']) && $_POST['addhoc_max_item'] !== "" ? $_POST['addhoc_max_item'] : 0;
							$mainModArr['created_at'] = date("Y-m-d H:i:s");
							$this->db->insert('promotion_main_modifiers', $mainModArr);
						}
					}
					//old code for other modifiers
					// if (isset($_POST['otherModID']) && count($_POST['otherModID'])>0) {
					// 	for ($i=0; $i < (count($_POST['otherModID'])); $i++) {
					// 		$otherModArr['promotion_id'] = $insertedFoodId;
					// 		$otherModArr['modifier_set_id'] = $_POST['otherModID'][$i];
					// 		$otherModArr['created_at'] = date("Y-m-d H:i:s");
					// 		$this->db->insert('promotion_other_modifiers', $otherModArr);
					// 	}
					// }
					
					// New code for inserting other modifiers
					// Check Modifier exist or not
					if ($this->input->post('modifiers', true) && is_array($this->input->post('modifiers', true))) {
						$modifiers = $this->input->post('modifiers', true);
						$minValues = $this->input->post('min', true) ?? [];
						$maxValues = $this->input->post('max', true) ?? [];
						$isReqValues = $this->input->post('isreq', true) ?? [];
						$sortValues = $this->input->post('sort', true) ?? [];
					
						foreach ($modifiers as $key => $modifier) {
							$minValue = isset($minValues[$key]) && $minValues[$key] !== '' ? (int)$minValues[$key] : 0;
							$maxValue = isset($maxValues[$key]) && $maxValues[$key] !== '' ? (int)$maxValues[$key] : 0;
					
							// Ensure min is not greater than max
							if ($minValue > $maxValue) {
								$maxValue = $minValue;
							}
					
							$modifierData = [
								'menu_id'   => $insertedFoodId,
								//'add_on_id' => (int)$modifier,
								'modifier_groupid' => (int)$modifier,
								'min'       => $minValue,
								'max'       => $maxValue,
								'isreq'     => isset($isReqValues[$key]) && $isReqValues[$key] === 'on' ? 1 : 0,
								'sortby'    => isset($sortValues[$key]) && $sortValues[$key] !== '' ? (int)$sortValues[$key] : 0,
							];
					
							// Insert Modifier
							$this->fooditem_model->create_modifiers($modifierData);
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
							$this->db->insert('promotion_main_modifiers', $mainModArr);
						}
					}
					// if (isset($_POST['otherModID']) && count($_POST['otherModID'])>0) {
					// 	for ($i=0; $i < (count($_POST['otherModID'])); $i++) {
					// 		$otherModArr['promotion_id'] = $_POST["ProductsID"];
					// 		$otherModArr['modifier_set_id'] = $_POST['otherModID'][$i];
					// 		$otherModArr['created_at'] = date("Y-m-d H:i:s");
					// 		$this->db->insert('promotion_other_modifiers', $otherModArr);
					// 	}
					// }
					// New code for updating other modifiers
					//Remove old modifiers
					$this->db->where('menu_id', $_POST["ProductsID"])->delete('menu_add_on');
					// Check Modifier exist or not
					if ($this->input->post('modifiers', true) && is_array($this->input->post('modifiers', true))) {
						$modifiers = $this->input->post('modifiers', true);
						$minValues = $this->input->post('min', true) ?? [];
						$maxValues = $this->input->post('max', true) ?? [];
						$isReqValues = $this->input->post('isreq', true) ?? [];
						$sortValues = $this->input->post('sort', true) ?? [];
					
						foreach ($modifiers as $key => $modifier) {
							$minValue = isset($minValues[$key]) && $minValues[$key] !== '' ? (int)$minValues[$key] : 0;
							$maxValue = isset($maxValues[$key]) && $maxValues[$key] !== '' ? (int)$maxValues[$key] : 0;
					
							// Ensure min is not greater than max
							if ($minValue > $maxValue) {
								$maxValue = $minValue;
							}
					
							$modifierData = [
								'menu_id'   => $_POST["ProductsID"],
								//'add_on_id' => (int)$modifier,
								'modifier_groupid' => (int)$modifier,
								'min'       => $minValue,
								'max'       => $maxValue,
								'isreq'     => isset($isReqValues[$key]) && $isReqValues[$key] === 'on' ? 1 : 0,
								'sortby'    => isset($sortValues[$key]) && $sortValues[$key] !== '' ? (int)$sortValues[$key] : 0,
							];
					
							// Insert Modifier
							$this->fooditem_model->create_modifiers($modifierData);
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
			$data['sub_header'] = 'meal_deals';
			$data['module'] = "itemmanage";
			$data['page']   = "addgroupitem";
			$data["addonslist"] = $this->fooditem_model->read_modified_groups_addons($config["per_page"], $page);
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

	// 	// Validation Rules
	// 	//$this->form_validation->set_rules('CategoryID[]', display('category_name'), 'required');

	// 	if (!empty($this->input->post('ProductsID'))) {
	// 		$this->form_validation->set_rules('foodname', display('item_name'), 'required|max_length[100]');
	// 		$this->form_validation->set_rules('weightage', 'Weightage', 'required');
	// 	} else {
	// 		$this->form_validation->set_rules('foodname', display('item_name'), 'required|is_unique[item_foods.ProductName]|max_length[100]');
	// 		$this->form_validation->set_message('is_unique', 'Sorry, this %s already used!');
		
	// 	}
		
	// 	$this->form_validation->set_rules('food_type', 'Food Type', 'required');
	// 	//$this->form_validation->set_rules('status', display('status'), 'required');

	// 	// Handle offer dates
	// 	$offerstartdate = str_replace('/', '-', $this->input->post('offerstartdate', true));
	// 	$offerenddate = str_replace('/', '-', $this->input->post('offerendate', true));

	// 	$isoffer = $this->input->post('isoffer', true) == 1 ? 1 : 0;
	// 	$special = $this->input->post('special', true) == 1 ? 1 : 0;
	// 	$myvat = $this->input->post('vat') ?: 0;

	// 	if ($isoffer) {
	// 		$this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
	// 		$this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
	// 		$convertstartdate = date('Y-m-d', strtotime($offerstartdate));
	// 		$convertenddate = date('Y-m-d', strtotime($offerenddate));
	// 		$OffersRate = $this->input->post('offerate', true);
	// 	} else {
	// 		$convertstartdate = "0000-00-00";
	// 		$convertenddate = "0000-00-00";
	// 		$OffersRate = 0;
	// 	}

	// 	if($this->input->post('cusine_type') == 3){
	// 		$is_bom = 0;
	// 	} else {
	// 		$is_bom = 1;
	// 	}

	// 	// Process selected menu types
	// 	$menutype = $this->input->post('menutype', true);
	// 	$alltmtype = "";
	// 	if (!empty($menutype)) {
	// 		foreach ($menutype as $types) {
	// 			$alltmtype .= $this->input->post('mytmenu_' . $types, true) . ",";
	// 		}
	// 		$alltmtype = trim($alltmtype, ',');
	// 	}
	// 	$uniqueStr = implode(',', array_unique(explode(',', $alltmtype)));

	// 	if ($this->form_validation->run()) {
	// 		// Image Upload
	// 		$img = $big = $medium = $small = '';

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
	// 			// new
	// 			$this->permission->method('itemmanage', 'create')->redirect();
				
	// 			$categoryIdsRaw = $this->input->post('CategoryID', true) ?? []; // Ensure it's an array

	// 			if (!is_array($categoryIdsRaw)) {
	// 				$categoryIdsRaw = [];
	// 			}

	// 			$categoryIds = [];

	// 			foreach ($categoryIdsRaw as $category) {
	// 				if (strpos($category, '_') !== false) {
	// 					// Parent and child category case
	// 					$parts = explode('_', $category);
	// 					foreach ($parts as $part) {
	// 						$cleanedPart = str_replace('parent_', '', $part); // Remove "parent_"
	// 						if (!empty($cleanedPart) && $cleanedPart !== 'parent') {
	// 							$categoryIds[] = $cleanedPart;
	// 						}
	// 					}
	// 				} else {
	// 					// Only parent category
	// 					$cleanedCategory = str_replace('parent_', '', $category);
	// 					if (!empty($cleanedCategory) && $cleanedCategory !== 'parent') {
	// 						$categoryIds[] = $cleanedCategory;
	// 					}
	// 				}
	// 			}

	// 			// Remove duplicates and store as a comma-separated string
	// 			$categoryIds = implode(',', array_unique($categoryIds));


	// 			$savedid = $this->session->userdata('id');

	// 			// Prepare data for insertion
	// 			$postData = [
	// 				'ProductsID' => $this->input->post('ProductsID'),
	// 				'CategoryID' => $categoryIds,
	// 				'ProductName' => $this->input->post('foodname', true),
	// 				'component' => $this->input->post('component', true),
	// 				'menutype'               => $uniqueStr,
	// 				'itemnotes' => $this->input->post('itemnotes', true),
	// 				'descrip' => $this->input->post('descrip', true),
	// 				'kitchenid' =>  $this->input->post('kitchen'),
	// 				'cookedtime' => $this->input->post('cookedtime', true),
	// 				'productvat'             => $myvat,
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				//'is_customqty'           => $this->input->post('customqty', true),
	// 				'ProductsIsActive'   	=> $this->input->post('status'),
	// 				'ProductImage'      	=> $img,
	// 				'bigthumb'      		=> $big,
	// 				'medium_thumb'      	=> $medium,
	// 				'small_thumb'      		=> $small,
	// 				'UserIDInserted'     	=> $savedid,
	// 				'UserIDUpdated'      	=> $savedid,
	// 				'UserIDLocked'       	=> $savedid,
	// 				'DateInserted'       	=> date('Y-m-d H:i:s'),
	// 				'DateUpdated'        	=> date('Y-m-d H:i:s'),
	// 				'DateLocked'         	=> date('Y-m-d H:i:s'),
	// 				'cusine_type'			=> $this->input->post('cusine_type'),
	// 				'is_bom'				=> $is_bom,
	// 				'food_type'				=> $this->input->post('food_type', true),
	// 				'weightage'				=> $this->input->post('weightage', true),
	// 				'uomid'					=> $this->input->post('uomid', true),
	// 			];

	// 			// echo '<pre>';
	// 			// print_r($this->input->post());
	// 			// echo '</pre>';
	// 			// exit;
	// 			if ($this->fooditem_model->fooditem_create($postData)) {
	// 				$insertedFoodId = $this->db->insert_id(); //item_foods table id
					
	// 				// Update JSON cache file
	// 				$query = $this->db->select('*')->from('item_foods')->where('ProductsIsActive', 1)->get();
	// 				$json_product = [];
	// 				foreach ($query->result() as $row) {
	// 					$json_product[] = ['label' => $row->ProductName, 'value' => $row->ProductsID];
	// 				}
	// 				file_put_contents('./assets/js/product.json', json_encode($json_product));
	// 				// Add Variants
	// 				//Check if variant exist and cusine Type Product
	// 				// Basic form inputs
	// 				if($this->input->post('cusine_type') == 3) {
	// 					$variantName = $this->input->post('variant_name', true);
	// 					$prices = $this->input->post('price', true);
	// 					$takeawayPrices = $this->input->post('takeaway_price', true);
	// 					$uberEatsPrices = $this->input->post('uber_eats_price', true);
	// 					$doordashPrices = $this->input->post('doordash_price', true);
	// 					$webOrderPrices = $this->input->post('weborder_price', true);

	// 					$index = 0;
	// 					$variantData = [
	// 						'menuid' => $insertedFoodId,
	// 						'variantName' => $variantName[$index],
	// 						'price' => $prices[$index],
	// 						'takeaway_price' => $takeawayPrices[$index],
	// 						'uber_eats_price' => $uberEatsPrices[$index],
	// 						'doordash_price' => $doordashPrices[$index],
	// 						'web_order_price' => $webOrderPrices[$index],
	// 					];

	// 					if ($this->foodvarient_model->create($variantData)) {
	// 						$insertedVariantId = $this->db->insert_id();

	// 						$productionData = [
	// 							'itemid' => $insertedFoodId,
	// 							'itemvid' => $insertedVariantId,
	// 							'itemquantity' => $this->input->post('unit', true),
	// 							'savedby' => $savedid,
	// 							'is_bom' => 0,
	// 							'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true))),
	// 							'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true))),
	// 						];
	// 						$this->fooditem_model->create_food_production($productionData);

	// 					}

	// 				} else {
	// 				// Check if variant exists & cusine Type Restaurant
	// 					if ($this->input->post('variant_name', true)) {
	// 						//varient insert [start]
	// 						$variantNames = $this->input->post('variant_name', true);
	// 						$prices = $this->input->post('price', true);
	// 						$takeawayPrices = $this->input->post('takeaway_price', true);
	// 						$uberEatsPrices = $this->input->post('uber_eats_price', true);
	// 						$doordashPrices = $this->input->post('doordash_price', true);
	// 						$webOrderPrices = $this->input->post('weborder_price', true);
	// 						$recipeFor = $this->input->post('recipe_for', true);

	// 						$index = 0;
	// 						foreach ($variantNames as $key => $variantName) {
	// 							$variantKey = strtolower($recipeFor[$key]); 
	// 							$existingVariant = $this->db->where([
	// 								'menuid' => $insertedFoodId,
	// 								'variantName' => $variantName,
	// 							])->get('variant')->row();

	// 							if (!$existingVariant) {
	// 								$variantData = [
	// 									'menuid' => $insertedFoodId,
	// 									'variantName' => $variantName,
	// 									'price' => $prices[$key],
	// 									'takeaway_price' => $takeawayPrices[$key],
	// 									'uber_eats_price' => $uberEatsPrices[$key],
	// 									'doordash_price' => $doordashPrices[$key],
	// 									'web_order_price' => $webOrderPrices[$key],
	// 									'recipe_cost' => $this->input->post('recipe_costprice_' . $variantKey, true)[$index],
	// 									'recipe_weightage' => $this->input->post('recipe_usedqty_' . $variantKey, true)[$index],
	// 								];

	// 								if ($this->foodvarient_model->create($variantData)) {
	// 									$insertedVariantId = $this->db->insert_id();

	// 									$productionData = [
	// 										'itemid' => $insertedFoodId,
	// 										'itemvid' => $insertedVariantId,
	// 										'itemquantity' => $this->input->post('unit', true),
	// 										'savedby' => $savedid,
	// 										'is_bom' => $is_bom,
	// 										'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true))),
	// 										'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true))),
	// 									];
	// 									$this->fooditem_model->create_food_production($productionData);

										
	// 									// Handle Ingredients Based on Variant
	// 									//if ($this->input->post('is_bom', true)) {
	// 									if ($is_bom == 1) {
	// 										$variantKey = strtolower($recipeFor[$key]); // Example: 'small', 'large', 'regular'
	// 										$ingredientKey = "product_id_{$variantKey}";
	// 										$quantityKey = "product_quantity_{$variantKey}";
	// 										$unitIdKey = "unitid_{$variantKey}";
	// 										$unitNameKey = "unitname_{$variantKey}";
	// 										$recipePriceKey = "product_price_{$variantKey}";

	// 										if ($this->input->post($ingredientKey, true)) {
	// 											$ingredients = $this->input->post($ingredientKey, true);
	// 											$quantities = $this->input->post($quantityKey, true);
	// 											$unitIds = $this->input->post($unitIdKey, true);
	// 											$unitNames = $this->input->post($unitNameKey, true);
	// 											$recipePrices = $this->input->post($recipePriceKey, true);

	// 											foreach ($ingredients as $i => $ingredientId) {
	// 												$ingredientData = [
	// 													'foodid' => $insertedFoodId,
	// 													'pvarientid' => $insertedVariantId,
	// 													'ingredientid' => $ingredientId,
	// 													'qty' => $quantities[$i],
	// 													'unitid' => $unitIds[$i],
	// 													'unitname' => $unitNames[$i],
	// 													'recipe_price' => $recipePrices[$i],
	// 													'createdby' => $this->session->userdata('id'),
	// 													'created_date' => date('Y-m-d'),
	// 												];
	// 												$this->db->insert('production_details', $ingredientData);
	// 											}
	// 										}
	// 									}
	// 								}
	// 							}
	// 						}
	// 					}
	// 				}
	// 				// END of Variant and its Production update
	// 				// Now insert Modifiers
	// 				// Check Modifier exist or not
	// 				if ($this->input->post('modifiers', true) && is_array($this->input->post('modifiers', true))) {
	// 					$modifiers = $this->input->post('modifiers', true);
	// 					$minValues = $this->input->post('min', true) ?? [];
	// 					$maxValues = $this->input->post('max', true) ?? [];
	// 					$isReqValues = $this->input->post('isreq', true) ?? [];
	// 					$sortValues = $this->input->post('sort', true) ?? [];
					
	// 					foreach ($modifiers as $key => $modifier) {
	// 						$minValue = isset($minValues[$key]) && $minValues[$key] !== '' ? (int)$minValues[$key] : 0;
	// 						$maxValue = isset($maxValues[$key]) && $maxValues[$key] !== '' ? (int)$maxValues[$key] : 0;
					
	// 						// Ensure min is not greater than max
	// 						if ($minValue > $maxValue) {
	// 							$maxValue = $minValue; 
	// 						}
					
	// 						$modifierData = [
	// 							'menu_id'   => $insertedFoodId,
	// 							//'add_on_id' => (int)$modifier,
	// 							'modifier_groupid' => (int)$modifier,
	// 							'min'       => $minValue,
	// 							'max'       => $maxValue,
	// 							'isreq'     => isset($isReqValues[$key]) && $isReqValues[$key] === 'on' ? 1 : 0,
	// 							'sortby'    => isset($sortValues[$key]) && $sortValues[$key] !== '' ? (int)$sortValues[$key] : 0,
	// 						];
					
	// 						// Insert Modifier
	// 						$this->fooditem_model->create_modifiers($modifierData);
	// 					}
	// 				}
					
	// 				// END of Modifier Insertion [Updated by Jsaha]


	// 				// Check if Product Exist
	// 				if ($this->input->post() && $this->input->post('cusine_type') == 3) {
						
	// 					// Build the post data array conditionally
	// 					$postData = [];

	// 					// Basic form inputs
	// 					$postData['ingredient_name']  = $this->input->post('foodname', true); // from form input name
	// 					$postData['pack_size']        = $this->input->post('pack_size', true);
	// 					$postData['pack_unit']        = $this->input->post('pack_unit', true);
	// 					$postData['uom_id']    = $this->input->post('purchase_unit', true);
	// 					$postData['purchase_price']   = $this->input->post('purchase_price', true);
	// 					$postData['stock_qty']  = $this->input->post('opening_stock', true);
	// 					$postData['min_stock']        = $this->input->post('minimum_stock', true);
	// 					$postData['is_active']        = 1;

	// 					// Insert into ingredients table
	// 					$this->fooditem_model->create_ingredient($postData);
	// 					$insert_id = $this->db->insert_id(); //ingradient  table id
	// 					// Update Food Item 
	// 					$this->fooditem_model->update_ingredient(
	// 						$insert_id,
	// 						[
	// 							'purchase_product' => $insertedFoodId,
	// 							'status' => '1'
	// 						]
	// 					);
											

	// 					// If inserted successfully and opening_balance is set
	// 					$opening_balance = $this->input->post('opening_stock', true);
	// 					if ($insert_id && $opening_balance !== null && $opening_balance !== '') {
	// 						$opening_stock_data = [
	// 							'ingredient_name'    => $this->input->post('foodname', true),
	// 							'ingredient_id'      => $insert_id,
	// 							'purchase_price'     => $this->input->post('purchase_price', true),
	// 							'opening_balance'    => $opening_balance,
	// 							'opening_date' => date('Y-m-d'),
	// 							'is_active'          => 1
	// 						];

	// 						// Insert into ingredients_opening_stock table
	// 						$this->fooditem_model->ingredient_opening_stock($opening_stock_data);
	// 					}

	// 					//Check Insert Production Details
	// 					$prodDtlUnitname = get_unit_detail($this->input->post('purchase_unit', true));
	// 					$unitName = $prodDtlUnitname['uom_short_code'];
	// 						$productionDtlsData = [
	// 							'foodid' => $insertedFoodId,
	// 							'pvarientid' => $insertedVariantId,
	// 							'ingredientid' => $insert_id,
	// 							'qty' => $this->input->post('pack_size', true),
	// 							'unitid' => $this->input->post('purchase_unit', true),
	// 							'unitname' => $unitName,
	// 							'recipe_price' => $this->input->post('purchase_price', true),
	// 							'createdby' => $this->session->userdata('id'),
	// 							'created_date' => date('Y-m-d'),
	// 						];
	// 						$this->db->insert('production_details', $productionDtlsData);


	// 				}
					

	// 				$this->session->set_flashdata('message', display('save_successfully'));
	// 				redirect('itemmanage/item_food/create_new');
	// 			}
	// 		} else {
	// 			//edit
	// 			$this->permission->method('itemmanage', 'update')->redirect();
	// 			if (empty($img)) {
	// 				$img = $this->input->post('old_image', true);
	// 				$big = $this->input->post('bigimage', true);
	// 				$medium = $this->input->post('mediumimage', true);
	// 				$small = $this->input->post('smallimage', true);
	// 			}
	// 			//Update Category
	// 			$categoryIdsRaw = $this->input->post('CategoryID', true) ?? []; // Ensure it's an array

	// 			if (!is_array($categoryIdsRaw)) {
	// 				$categoryIdsRaw = [];
	// 			}

	// 			$categoryIds = [];

	// 			foreach ($categoryIdsRaw as $category) {
	// 				if (strpos($category, '_') !== false) {
	// 					// Parent and child category case
	// 					$parts = explode('_', $category);
	// 					foreach ($parts as $part) {
	// 						$cleanedPart = str_replace('parent_', '', $part); // Remove "parent_"
	// 						if (!empty($cleanedPart) && $cleanedPart !== 'parent') {
	// 							$categoryIds[] = $cleanedPart;
	// 						}
	// 					}
	// 				} else {
	// 					// Only parent category
	// 					$cleanedCategory = str_replace('parent_', '', $category);
	// 					if (!empty($cleanedCategory) && $cleanedCategory !== 'parent') {
	// 						$categoryIds[] = $cleanedCategory;
	// 					}
	// 				}
	// 			}

	// 			// Remove duplicates and store as a comma-separated string
	// 			$categoryIds = implode(',', array_unique($categoryIds));

	// 			//Update Food Item Id
	// 			$updatedId = $this->input->post('ProductsID');
	// 			$savedid = $this->session->userdata('id');

	// 			$postData = [
	// 				'ProductsID' => $this->input->post('ProductsID'),
	// 				'CategoryID' => $categoryIds,
	// 				'ProductName' => $this->input->post('foodname', true),
	// 				'component' => $this->input->post('component', true),
	// 				'menutype'               => $uniqueStr,
	// 				'itemnotes' => $this->input->post('itemnotes', true),
	// 				'descrip' => $this->input->post('descrip', true),
	// 				'kitchenid' =>  $this->input->post('kitchen'),
	// 				'cookedtime' => $this->input->post('cookedtime', true),
	// 				'productvat'             => $myvat,
	// 				'OffersRate'             => $OffersRate,
	// 				'special'       			=> $special,
	// 				'offerIsavailable'       => $isoffer,
	// 				'offerstartdate'         => $convertstartdate,
	// 				'offerendate'            => $convertenddate,
	// 				//'is_customqty'           => $this->input->post('customqty', true),
	// 				'ProductsIsActive'   	=> $this->input->post('status'),
	// 				'ProductImage'      	=> $img,
	// 				'bigthumb'      		=> $big,
	// 				'medium_thumb'      	=> $medium,
	// 				'small_thumb'      		=> $small,
	// 				'UserIDInserted'     	=> $savedid,
	// 				'UserIDUpdated'      	=> $savedid,
	// 				'UserIDLocked'       	=> $savedid,
	// 				'DateInserted'       	=> date('Y-m-d H:i:s'),
	// 				'DateUpdated'        	=> date('Y-m-d H:i:s'),
	// 				'DateLocked'         	=> date('Y-m-d H:i:s'),
	// 				'cusine_type'			=> $this->input->post('cusine_type'),
	// 				'is_bom'				=> $is_bom,
	// 				'food_type'				=> $this->input->post('food_type', true),
	// 				'weightage'				=> $this->input->post('weightage', true),
	// 				'uomid'					=> $this->input->post('uomid', true),
	// 			];
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
					
    //                 $this->db->where('menuid', $updatedId);
    //                 $this->db->delete('variant');
    //                 $this->db->where('itemid', $updatedId);
    //                 $this->db->delete('production');
    //                 $this->db->where('foodid', $updatedId);
    //                 $this->db->delete('production_details');


	// 				// Build the post data array conditionally
	// 				$ingrData = [];
	// 				$openData = [];

	// 				// Basic form inputs
	// 				if($this->input->post('cusine_type') == 3) {
	// 					//$ingrData['ingredient_name']  = $this->input->post('foodname', true); // from form input name
	// 					$ingrData['pack_size']        = $this->input->post('pack_size', true);
	// 					$ingrData['pack_unit']        = $this->input->post('pack_unit', true);
	// 					$ingrData['uom_id']    = $this->input->post('purchase_unit', true);
	// 					$ingrData['purchase_price']   = $this->input->post('purchase_price', true);
	// 					$ingrData['stock_qty']  = $this->input->post('opening_stock', true);
	// 					$ingrData['min_stock']        = $this->input->post('minimum_stock', true);
	// 					$ingrid = $this->input->post('ingredient_id', true);

	// 					$openData['purchase_price']   = $this->input->post('purchase_price', true);
	// 					$openData['opening_balance']  = $this->input->post('opening_stock', true);


	// 					// Update Food Item 
	// 					$this->db->trans_start();
	// 					$this->fooditem_model->update_ingredient($ingrid, $ingrData);
	// 					$this->fooditem_model->update_ingredient_opening_stock($ingrid, $openData);
	// 					//Update Production Details
	// 					// Get post data
	// 					$ingredientId   = $ingrid;
	// 					$purchaseUnitId = $this->input->post('purchase_unit', true);
	// 					$openingStock   = $this->input->post('pack_size', true);
	// 					$purchasePrice  = $this->input->post('purchase_price', true);

	// 					// Get the unit short code
	// 					$unitDetail = get_unit_detail($purchaseUnitId);
	// 					$unitName   = $unitDetail ? $unitDetail['uom_short_code'] : '';

	// 					// Prepare common data
	// 					$data = [
	// 						'ingredientid'  => $ingredientId,
	// 						'qty'           => $openingStock,
	// 						'unitid'        => $purchaseUnitId,
	// 						'unitname'      => $unitName,
	// 						'recipe_price'  => $purchasePrice,
	// 					];

	// 					// Check if ingredient exists
	// 					$this->db->where('ingredientid', $ingredientId);
	// 					$query = $this->db->get('production_details');

	// 					if ($query->num_rows() > 0) {
	// 						// Exists → update
	// 						$this->db->where('ingredientid', $ingredientId);
	// 						$this->db->update('production_details', $data);
	// 					} 
	// 					else {
	// 						// Not exists → insert
	// 						$productionDtlsData = [
	// 							'foodid' => $this->input->post('ProductsID', true),
	// 							'ingredientid' => $ingredientId,
	// 							'qty' => $this->input->post('pack_size', true),
	// 							'unitid' => $this->input->post('purchase_unit', true),
	// 							'unitname' => $unitName,
	// 							'recipe_price' => $this->input->post('purchase_price', true),
	// 							'createdby' => $this->session->userdata('id'),
	// 							'created_date' => date('Y-m-d'),
	// 						];
	// 						$this->db->insert('production_details', $productionDtlsData);
	// 						$lastProDtlsInsertId = $this->db->insert_id();
	// 					}


	// 					$this->db->trans_complete();
	// 				}



				
					
    //                 //updating variants and production-details [start]
    //                 if ($this->input->post('variant_name', true)) {
	// 					//varient insert [start]
	// 					$variantNames = $this->input->post('variant_name', true);
	// 					$prices = $this->input->post('price', true);
	// 					$takeawayPrices = $this->input->post('takeaway_price', true);
	// 					$uberEatsPrices = $this->input->post('uber_eats_price', true);
	// 					$doordashPrices = $this->input->post('doordash_price', true);
	// 					$webOrderPrices = $this->input->post('weborder_price', true);
	// 					$recipeFor = $this->input->post('recipe_for', true);
						
	// 					$index = 0;
	// 					foreach ($variantNames as $key => $variantName) {
	// 						$variantKey = strtolower($recipeFor[$key]); 
	// 						$existingVariant = $this->db->where([
	// 							'menuid' => $updatedId,
	// 							'variantName' => $variantName,
	// 						])->get('variant')->row();

	// 						if (!$existingVariant) {
	// 							$variantData = [
	// 								'menuid' => $updatedId,
	// 								'variantName' => $variantName,
	// 								'price' => $prices[$key],
	// 								'takeaway_price' => $takeawayPrices[$key],
	// 								'uber_eats_price' => $uberEatsPrices[$key],
	// 								'doordash_price' => $doordashPrices[$key],
	// 								'web_order_price' => $webOrderPrices[$key],
	// 								'recipe_cost' => $this->input->post('recipe_costprice_' . $variantKey, true)[$index],
	// 								'recipe_weightage' => $this->input->post('recipe_usedqty_' . $variantKey, true)[$index],
	// 							];


	// 							if ($this->foodvarient_model->create($variantData)) {
	// 								$insertedVariantId = $this->db->insert_id();

	// 								//If cusine type is Product then update production details
	// 								if($this->input->post('cusine_type') == 3) {
										
	// 									$productionDtlsData = [
	// 										'pvarientid' => $insertedVariantId,
	// 									];
	// 									$this->db->where('pro_detailsid', $lastProDtlsInsertId);
	// 									$this->db->update('production_details', $productionDtlsData);
	// 								}

	// 								$productionData = [
	// 									'itemid' => $updatedId,
	// 									'itemvid' => $insertedVariantId,
	// 									'itemquantity' => $this->input->post('unit', true),
	// 									'savedby' => $savedid,
	// 									'is_bom' => $is_bom,
	// 									'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true))),
	// 									'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true))),
	// 								];
	// 								$this->fooditem_model->create_food_production($productionData);

	// 								// Handle Ingredients Based on Variant
	// 								//if ($this->input->post('is_bom', true)) {
	// 								if ($is_bom == 1){
	// 									$variantKey = strtolower($recipeFor[$key]); // Example: 'small', 'large', 'regular'
	// 									$ingredientKey = "product_id_{$variantKey}";
	// 									$quantityKey = "product_quantity_{$variantKey}";
	// 									$unitIdKey = "unitid_{$variantKey}";
	// 									$unitNameKey = "unitname_{$variantKey}";
	// 									$recipePriceKey = "product_price_{$variantKey}";

	// 									if ($this->input->post($ingredientKey, true)) {
	// 										$ingredients = $this->input->post($ingredientKey, true);
	// 										$quantities = $this->input->post($quantityKey, true);
	// 										$unitIds = $this->input->post($unitIdKey, true);
	// 										$unitNames = $this->input->post($unitNameKey, true);
	// 										$recipePrices = $this->input->post($recipePriceKey, true);

	// 										foreach ($ingredients as $i => $ingredientId) {
	// 											$ingredientData = [
	// 												'foodid' => $updatedId,
	// 												'pvarientid' => $insertedVariantId,
	// 												'ingredientid' => $ingredientId,
	// 												'qty' => $quantities[$i],
	// 												'unitid' => $unitIds[$i],
	// 												'unitname' => $unitNames[$i],
	// 												'recipe_price' => $recipePrices[$i],
	// 												'createdby' => $this->session->userdata('id'),
	// 												'created_date' => date('Y-m-d'),
	// 											];
	// 											$this->db->insert('production_details', $ingredientData);
	// 										}
	// 									}
	// 								}
	// 							}
	// 						}
	// 					}
	// 				}
    //                 //updating variants and production-details [end]
					
					
	// 				// Update Modifiers
	// 				// Fetch existing modifiers from the database
	// 				$existingModifiers = $this->fooditem_model->get_modifiers_by_menu_id($updatedId);
	// 				$existingModifierIds = array_column($existingModifiers, 'modifier_groupid'); // Extract group IDs

	// 				// Get submitted modifier data
	// 				if ($this->input->post('modifiers', true) && is_array($this->input->post('modifiers', true))) {
	// 					$modifiers = $this->input->post('modifiers', true);
	// 					$minValues = $this->input->post('min', true) ?? [];
	// 					$maxValues = $this->input->post('max', true) ?? [];
	// 					$isReqValues = $this->input->post('isreq', true) ?? [];
	// 					$sortValues = $this->input->post('sort', true) ?? [];

	// 					$submittedModifierIds = []; // Store modifier_groupid values that were submitted

	// 					foreach ($modifiers as $key => $modifier) {
	// 						$modifierGroupId = (int)$modifier;
	// 						$submittedModifierIds[] = $modifierGroupId; // Keep track of submitted modifier IDs

	// 						$minValue = isset($minValues[$key]) && $minValues[$key] !== '' ? (int)$minValues[$key] : 0;
	// 						$maxValue = isset($maxValues[$key]) && $maxValues[$key] !== '' ? (int)$maxValues[$key] : 0;

	// 						// Ensure min is not greater than max
	// 						if ($minValue > $maxValue) {
	// 							$maxValue = $minValue;
	// 						}

	// 						$modifierData = [
	// 							'menu_id'   => $updatedId,
	// 							'modifier_groupid' => $modifierGroupId,
	// 							'min'       => $minValue,
	// 							'max'       => $maxValue,
	// 							'isreq'     => isset($isReqValues[$key]) && $isReqValues[$key] === 'on' ? 1 : 0,
	// 							'sortby'    => isset($sortValues[$key]) && $sortValues[$key] !== '' ? (int)$sortValues[$key] : 0,
	// 							'is_active' => 1
	// 						];

	// 						// Check if modifier exists
	// 						$existingRowId = $this->fooditem_model->modifier_exists($updatedId, $modifierGroupId);

	// 						if ($existingRowId) {
	// 							// If exists, update the modifier
	// 							$this->fooditem_model->update_modifier_new($existingRowId, $modifierData);
	// 						} else {
	// 							// If not exists, insert a new modifier
	// 							$this->fooditem_model->insert_modifier_new($modifierData);
	// 						}
	// 					}

	// 					// Find modifiers that were removed (exist in DB but not in submitted data)
	// 					$modifiersToDelete = array_diff($existingModifierIds, $submittedModifierIds);

	// 					// Delete removed modifiers
	// 					if (!empty($modifiersToDelete)) {
	// 						foreach ($modifiersToDelete as $modifierId) {
	// 							$this->fooditem_model->delete_modifier($updatedId, $modifierId);
	// 						}
	// 					}
	// 				} else {
	// 					// If no modifiers were submitted, delete all existing modifiers for this menu
	// 					if (!empty($existingModifierIds)) {
	// 						foreach ($existingModifierIds as $modifierId) {
	// 							$this->fooditem_model->delete_modifier($updatedId, $modifierId);
	// 						}
	// 					}
	// 				}


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

	// 				//Show updated purchase price

	// 			$data['stockinfo'] = $this->db
	// 								->select('ingredients.*, ingredients_opening_stock.opening_balance, ingredients_opening_stock.purchase_price as opening_price, purchase_details.price as purchase_price')
	// 								->from('ingredients')
	// 								->join('ingredients_opening_stock', 'ingredients_opening_stock.ingredient_id = ingredients.id', 'left')
	// 								->join('purchase_details', 'ingredients.id = purchase_details.indredientid', 'left')
	// 								->where('ingredients.purchase_product', $id)
	// 								->get()
	// 								->row();

			
	// 			$data['title'] = display('update_fooditem');
	// 			//$data['productinfo']   = $this->fooditem_model->findById($id);
	// 			$data['productinfo']   = $this->fooditem_model->findByFoodId($id);
	// 		}

	// 		$data['categories']   =  $this->category_model->allcategory_dropdown();
	// 		$data['allkitchen']   =  $this->fooditem_model->allkitchen();
	// 		$data['todaymenu']   =  $this->todaymenu_model->read_menulist();
	// 		$data['item']   = $this->fooditem_model->item_dropdown();
	// 		$data['units'] = $this->fooditem_model->get_food_units();
	// 		$data['ingrdientslist']   = $this->fooditem_model->ingrediantlist();
	// 		$data["addonslist"] = $this->fooditem_model->read_modified_groups_addons($config["per_page"], $page);
	// 		$data['module'] = "itemmanage";
	// 		$data['page']   = "addfooditemnew";
	// 		echo Modules::run('template/layout', $data); 
	// 	}


	// }


    public function create_new($id = null)
    {
        $this->permission->method('itemmanage', $id ? 'update' : 'create')->redirect();
        $data['title'] = $id ? display('update_fooditem') : display('add_food');

        // Check if the request is a form submission (POST)
        if ($this->input->method() === 'post') {
			// echo '<pre>';
			// print_r($this->input->post());
			// echo '</pre>';
			// exit;
			  // Price Validation for Arrays
            $cusine_type = $this->input->post('cusine_type', true);
            $recipeMode = $this->input->post('recipeMode', true);

            // Validation Rules
            $this->form_validation->set_rules('foodname', display('item_name'), $id ? 'required|max_length[100]' : 'required|max_length[100]');
            $this->form_validation->set_rules('food_type', 'Food Type', 'required');
            $this->form_validation->set_rules('kitchen', 'Kitchen Name', 'required');
            $this->form_validation->set_rules('CategoryID[parent]', 'Category Group', 'required');
            //$this->form_validation->set_rules('recipeMode', 'Recipe Mode', 'required');

            // Offer Validation
            if ($this->input->post('isoffer', true)) {
                $this->form_validation->set_rules('offerstartdate', display('offerdate'), 'required');
                $this->form_validation->set_rules('offerendate', display('offerenddate'), 'required');
                $this->form_validation->set_rules('offerate', 'Offer Rate', 'required|numeric|greater_than[0]');
            }

			if($recipeMode == 0){
				$this->form_validation->set_rules('weightage', 'Weightage', 'required');
				$this->form_validation->set_rules('uomid', 'Unit', 'required');
			}

          
            if ($cusine_type == 3 || $recipeMode == 0) {
                $prices = $this->input->post('price', true);
                $takeaway_prices = $this->input->post('takeaway_price', true);
                $uber_eats_prices = $this->input->post('uber_eats_price', true);
                $doordash_prices = $this->input->post('doordash_price', true);
                $weborder_prices = $this->input->post('weborder_price', true);

                // foreach ($prices as $index => $price) {
                //     $this->form_validation->set_rules("price[$index]", "Dine-In Price (Variant " . ($index + 1) . ")", 'required|numeric|greater_than_equal_to[0]');
                //     $this->form_validation->set_rules("takeaway_price[$index]", "Takeaway Price (Variant " . ($index + 1) . ")", 'required|numeric|greater_than_equal_to[0]');
                //     $this->form_validation->set_rules("uber_eats_price[$index]", "Uber Eats Price (Variant " . ($index + 1) . ")", 'required|numeric|greater_than_equal_to[0]');
                //     $this->form_validation->set_rules("doordash_price[$index]", "DoorDash Price (Variant " . ($index + 1) . ")", 'required|numeric|greater_than_equal_to[0]');
                //     $this->form_validation->set_rules("weborder_price[$index]", "Web Order Price (Variant " . ($index + 1) . ")", 'required|numeric|greater_than_equal_to[0]');
                // }
            }

            // Recipe Validation for Non-Product Cuisine with Recipe Mode
            if ($cusine_type != 3 && $recipeMode == 1) {
                $variant_names = $this->input->post('variant_name', true);
                if (!empty($variant_names)) {
                    foreach ($variant_names as $index => $variant_name) {
                        if (!empty($variant_name)) {
                            $variant_key = strtolower(str_replace(' ', '_', $variant_name));
                            $ingredients = $this->input->post("product_id_$variant_key", true);
                            if (empty($ingredients) || count(array_filter($ingredients)) === 0) {
                                $this->form_validation->set_rules("product_id_$variant_key" . "[]", "Ingredients for $variant_name", 'required');
                            } else {
                                foreach ($ingredients as $i => $ingredient) {
                                    if (!empty($ingredient)) {
                                        $this->form_validation->set_rules("product_id_$variant_key" . "[$i]", "Ingredient (Variant $variant_name)", 'required');
                                        $this->form_validation->set_rules("product_quantity_$variant_key" . "[$i]", "Quantity (Variant $variant_name)", 'required|numeric|greater_than[0]');
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Custom Error Messages
            $this->form_validation->set_message('is_unique', 'The %s is already taken.');
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() === FALSE) {
                // Format validation errors for SweetAlert 1
                $errors = [];
                foreach ($this->form_validation->error_array() as $field => $error) {
                    $errors[] = ['field' => $field, 'message' => $error];
                }
                $response = [
                    'status' => 'error',
                    'errors' => $errors,
                    'message' => 'Please correct the following errors:'
                ];
                echo json_encode($response);
                return;
            }

            // Handle File Upload
            $img = $big = $medium = $small = '';
            if (!empty($_FILES['picture']['name'])) {
                $config = [
                    'upload_path' => 'application/modules/itemmanage/assets/images/',
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size' => 100000,
                    'file_ext_tolower' => true,
                ];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('picture')) {
                    $response = [
                        'status' => 'error',
                        'message' => strip_tags($this->upload->display_errors())
                    ];
                    echo json_encode($response);
                    return;
                }

                if ($id) {
                    $imageinfo = $this->db->select('ProductImage, bigthumb, medium_thumb, small_thumb')
                        ->from('item_foods')->where('ProductsID', $id)->get()->row();
                    foreach ([$imageinfo->ProductImage, $imageinfo->bigthumb, $imageinfo->medium_thumb, $imageinfo->small_thumb] as $old_img) {
                        if ($old_img && file_exists($old_img)) {
                            unlink($old_img);
                        }
                    }
                }

                $fdata = $this->upload->data();
                $image_sizes = [
                    'big' => [555, 370],
                    'medium' => [268, 223],
                    'small' => [116, 116],
                ];
                $this->load->library('image_lib');
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
                $img = 'application/modules/itemmanage/assets/images/' . $fdata['file_name'];
                $big = 'application/modules/itemmanage/assets/images/big/' . $fdata['file_name'];
                $medium = 'application/modules/itemmanage/assets/images/medium/' . $fdata['file_name'];
                $small = 'application/modules/itemmanage/assets/images/small/' . $fdata['file_name'];
            } elseif ($id) {
                $img = $this->input->post('old_image', true);
                $big = $this->input->post('bigimage', true);
                $medium = $this->input->post('mediumimage', true);
                $small = $this->input->post('smallimage', true);
            }

            // Process Offer Dates
            $isoffer = $this->input->post('isoffer', true) ? 1 : 0;
            $offerstartdate = $isoffer ? date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('offerstartdate', true)))) : '0000-00-00';
            $offerenddate = $isoffer ? date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('offerendate', true)))) : '0000-00-00';
            $OffersRate = $isoffer ? $this->input->post('offerate', true) : 0;

            // Set is_bom
            $is_bom = ($cusine_type == 3 || $recipeMode == 0) ? 0 : 1;

            // Process Menu Types
            $menutype = $this->input->post('menutype', true);
            $alltmtype = '';
            if (!empty($menutype)) {
                foreach ($menutype as $type) {
                    $alltmtype .= $this->input->post('mytmenu_' . $type, true) . ',';
                }
                $alltmtype = implode(',', array_unique(array_filter(explode(',', trim($alltmtype, ',')))));
            }

            // Process Categories
            $categoryIds = array_unique(array_filter(array_map(function($cat) {
                return str_replace('parent_', '', strpos($cat, '_') !== false ? explode('_', $cat)[1] : $cat);
            }, (array)$this->input->post('CategoryID', true))));
            $categoryIds = implode(',', $categoryIds);

			// echo $categoryIds;
			// exit;

			//Extract value from $categoryIds like (1,2,3) to array
			$groupId = $catId = $subCatId = null;
			if (!empty($categoryIds)) {
				$parts = explode(',', $categoryIds);

				$groupId = isset($parts[0]) ? (int)$parts[0] : null;
				$catId = isset($parts[1]) ? (int)$parts[1] : null;
				$subCatId = isset($parts[2]) ? (int)$parts[2] : null;
			}

            // Common Data
            $savedid = $this->session->userdata('id');
            $postData = [
                'ProductsID' => $this->input->post('ProductsID', true),
				'GroupID' => $groupId,
				'CategoryID' => $catId,
				'subCategoryID' => $subCatId,
                //'CategoryID' => $categoryIds,
                'ProductName' => $this->input->post('foodname', true),
                'component' => $this->input->post('component', true),
                'menutype' => $alltmtype,
                'itemnotes' => $this->input->post('itemnotes', true),
                'descrip' => $this->input->post('descrip', true),
                'kitchenid' => $this->input->post('kitchen', true),
                'cookedtime' => $this->input->post('cookedtime', true),
                'productvat' => $this->input->post('vat', true) ?: 0,
                'OffersRate' => $OffersRate,
                'special' => $this->input->post('special', true) ? 1 : 0,
                'offerIsavailable' => $isoffer,
                'offerstartdate' => $offerstartdate,
                'offerendate' => $offerenddate,
                'ProductsIsActive' => $this->input->post('status', true),
                'ProductImage' => $img,
                'bigthumb' => $big,
                'medium_thumb' => $medium,
                'small_thumb' => $small,
                'UserIDInserted' => $savedid,
                'UserIDUpdated' => $savedid,
                'UserIDLocked' => $savedid,
                'DateInserted' => date('Y-m-d H:i:s'),
                'DateUpdated' => date('Y-m-d H:i:s'),
                'DateLocked' => date('Y-m-d H:i:s'),
                'cusine_type' => $cusine_type,
                'is_bom' => $is_bom,
                'food_type' => $this->input->post('food_type', true),
                'weightage' => $this->input->post('weightage', true),
                'uomid' => $this->input->post('uomid', true),
            ];

            // Handle Tax Settings
            $taxsettings = $this->taxchecking();
            if (!empty($taxsettings)) {
                foreach ($taxsettings as $key => $taxitem) {
                    $postData['tax' . $key] = $this->input->post('tax' . $key, true) ?: 0;
                }
            }

            // Start Transaction
            $this->db->trans_start();

            try {
                if (!$this->input->post('ProductsID')) {
                    // Create New Food Item
                    if ($this->fooditem_model->fooditem_create($postData)) {
                        $insertedFoodId = $this->db->insert_id();

                        // Update JSON Cache
                        $this->update_product_json();

                        // Handle Variants
                        if ($cusine_type == 3) {
                            $variantNames = $this->input->post('variant_name', true);
                            $prices = $this->input->post('price', true);
                            $takeawayPrices = $this->input->post('takeaway_price', true);
                            $uberEatsPrices = $this->input->post('uber_eats_price', true);
                            $doordashPrices = $this->input->post('doordash_price', true);
                            $webOrderPrices = $this->input->post('weborder_price', true);

                            foreach ($variantNames as $key => $variantName) {
                                $variantData = [
                                    'menuid' => $insertedFoodId,
                                    'variantName' => $variantName ?: 'Regular',
                                    'price' => $prices[$key] ?? 0,
                                    'takeaway_price' => $takeawayPrices[$key] ?? 0,
                                    'uber_eats_price' => $uberEatsPrices[$key] ?? 0,
                                    'doordash_price' => $doordashPrices[$key] ?? 0,
                                    'web_order_price' => $webOrderPrices[$key] ?? 0,
                                ];
                                if ($this->foodvarient_model->create($variantData)) {
                                    $insertedVariantId = $this->db->insert_id();
                                    $productionData = [
                                        'itemid' => $insertedFoodId,
                                        'itemvid' => $insertedVariantId,
                                        'itemquantity' => $this->input->post('unit', true) ?: 1,
                                        'savedby' => $savedid,
                                        'is_bom' => 0,
                                        'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true) ?: date('Y-m-d'))),
                                        'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true) ?: date('Y-m-d'))),
                                    ];
                                    $this->fooditem_model->create_food_production($productionData);
                                }
                            }

                            // Handle Ingredient for cusine_type = 3
                            $ingredientData = [
                                'ingredient_name' => $this->input->post('foodname', true),
                                'pack_size' => $this->input->post('pack_size', true) ?: 0,
                                'pack_unit' => $this->input->post('pack_unit', true) ?: 0,
                                'uom_id' => $this->input->post('purchase_unit', true) ?: 0,
                                'purchase_price' => $this->input->post('purchase_price', true) ?: 0,
                                'stock_qty' => $this->input->post('opening_stock', true) ?: 0,
                                'min_stock' => $this->input->post('minimum_stock', true) ?: 0,
                                'is_active' => 1,
                            ];
                            $this->fooditem_model->create_ingredient($ingredientData);
                            $insert_id = $this->db->insert_id();
                            $this->fooditem_model->update_ingredient($insert_id, ['purchase_product' => $insertedFoodId, 'status' => '1']);

                            if ($insert_id && $this->input->post('opening_stock', true)) {
                                $opening_stock_data = [
                                    'ingredient_name' => $this->input->post('foodname', true),
                                    'ingredient_id' => $insert_id,
                                    'purchase_price' => $this->input->post('purchase_price', true) ?: 0,
                                    'opening_balance' => $this->input->post('opening_stock', true) ?: 0,
                                    'opening_date' => date('Y-m-d'),
                                    'is_active' => 1,
                                ];
                                $this->fooditem_model->ingredient_opening_stock($opening_stock_data);
                            }

                            foreach ($variantNames as $key => $variantName) {
                                $insertedVariantId = $this->db->select('variantid')->from('variant')
                                    ->where(['menuid' => $insertedFoodId, 'variantName' => $variantName])->get()->row()->variantid;
                                $unitDetail = get_unit_detail($this->input->post('purchase_unit', true));
                                $productionDtlsData = [
                                    'foodid' => $insertedFoodId,
                                    'pvarientid' => $insertedVariantId,
                                    'ingredientid' => $insert_id,
                                    'qty' => $this->input->post('pack_size', true) ?: 0,
                                    'unitid' => $this->input->post('purchase_unit', true) ?: 0,
                                    'unitname' => $unitDetail['uom_short_code'] ?? '',
                                    'recipe_price' => $this->input->post('purchase_price', true) ?: 0,
                                    'createdby' => $savedid,
                                    'created_date' => date('Y-m-d'),
                                ];
                                $this->db->insert('production_details', $productionDtlsData);
                            }
                        } else {
                            $this->save_variants($insertedFoodId, $savedid, $is_bom);
                        }

                        // Handle Modifiers
                        $this->save_modifiers($insertedFoodId);

                        $this->db->trans_complete();
                        $response = [
                            'status' => 'success',
                            'message' => display('save_successfully')
                        ];
                        echo json_encode($response);
                        return;
                    } else {
                        throw new Exception(display('please_try_again'));
                    }
                } else {
                    // Update Existing Food Item
                    if ($this->fooditem_model->update_fooditem($postData)) {
						// echo '<pre>';
						// print_r($_POST);
						// echo '</pre>';
						// exit;
						//Food Id
						$id = $this->input->post('ProductsID');
                        $this->db->where('menuid', $id)->delete('variant');
                        $this->db->where('itemid', $id)->delete('production');
                        $this->db->where('foodid', $id)->delete('production_details');

                        if ($cusine_type == 3) {
                            $ingrData = [
                                'pack_size' => $this->input->post('pack_size', true) ?: 0,
                                'pack_unit' => $this->input->post('pack_unit', true) ?: 0,
                                'uom_id' => $this->input->post('purchase_unit', true) ?: 0,
                                'purchase_price' => $this->input->post('purchase_price', true) ?: 0,
                                'stock_qty' => $this->input->post('opening_stock', true) ?: 0,
                                'min_stock' => $this->input->post('minimum_stock', true) ?: 0,
                            ];
                            $openData = [
                                'purchase_price' => $this->input->post('purchase_price', true) ?: 0,
                                'opening_balance' => $this->input->post('opening_stock', true) ?: 0,
                            ];
                            $ingrid = $this->input->post('ingredient_id', true);
                            $this->fooditem_model->update_ingredient($ingrid, $ingrData);
                            $this->fooditem_model->update_ingredient_opening_stock($ingrid, $openData);

                            $variantNames = $this->input->post('variant_name', true);
                            $prices = $this->input->post('price', true);
                            $takeawayPrices = $this->input->post('takeaway_price', true);
                            $uberEatsPrices = $this->input->post('uber_eats_price', true);
                            $doordashPrices = $this->input->post('doordash_price', true);
                            $webOrderPrices = $this->input->post('weborder_price', true);

                            foreach ($variantNames as $key => $variantName) {
                                $variantData = [
                                    'menuid' => $id,
                                    'variantName' => $variantName ?: 'Regular',
                                    'price' => $prices[$key] ?? 0,
                                    'takeaway_price' => $takeawayPrices[$key] ?? 0,
                                    'uber_eats_price' => $uberEatsPrices[$key] ?? 0,
                                    'doordash_price' => $doordashPrices[$key] ?? 0,
                                    'web_order_price' => $webOrderPrices[$key] ?? 0,
                                ];
                                $this->foodvarient_model->create($variantData);
                                $insertedVariantId = $this->db->insert_id();

                                $unitDetail = get_unit_detail($this->input->post('purchase_unit', true));
                                $productionDtlsData = [
                                    'foodid' => $id,
                                    'pvarientid' => $insertedVariantId,
                                    'ingredientid' => $ingrid,
                                    'qty' => $this->input->post('pack_size', true) ?: 0,
                                    'unitid' => $this->input->post('purchase_unit', true) ?: 0,
                                    'unitname' => $unitDetail['uom_short_code'] ?? '',
                                    'recipe_price' => $this->input->post('purchase_price', true) ?: 0,
                                    'createdby' => $savedid,
                                    'created_date' => date('Y-m-d'),
                                ];
                                $this->db->insert('production_details', $productionDtlsData);
                            }
                        } else {
                            $this->save_variants($id, $savedid, $is_bom);
                        }

                        $this->save_modifiers($id);

                        $this->logs_model->log_recorded([
                            'action_page' => 'Food List',
                            'action_done' => 'Update Data',
                            'remarks' => 'Food Updated',
                            'user_name' => $this->session->userdata('fullname', true),
                            'entry_date' => date('Y-m-d H:i:s'),
                        ]);

                        $this->update_product_json();

                        $this->db->trans_complete();
                        $response = [
                            'status' => 'success',
                            'message' => display('update_successfully')
                        ];
                        echo json_encode($response);
                        return;
                    } else {
                        throw new Exception(display('please_try_again'));
                    }
                }
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $response = [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ];
                echo json_encode($response);
                return;
            }
        }

        // Load form view for GET requests or non-AJAX requests
        $data['taxitems'] = $this->taxchecking();
        if ($id) {
            $data['stockinfo'] = $this->db
                ->select('ingredients.*, ingredients_opening_stock.opening_balance, ingredients_opening_stock.purchase_price as opening_price, purchase_details.price as purchase_price')
                ->from('ingredients')
                ->join('ingredients_opening_stock', 'ingredients_opening_stock.ingredient_id = ingredients.id', 'left')
                ->join('purchase_details', 'ingredients.id = purchase_details.indredientid', 'left')
                ->where('ingredients.purchase_product', $id)
                ->get()
                ->row();
            $data['productinfo'] = $this->fooditem_model->findByFoodId($id);
        }

        $data['categories'] = $this->category_model->allcategory_dropdown();
        $data['allkitchen'] = $this->fooditem_model->allkitchen();
        $data['todaymenu'] = $this->todaymenu_model->read_menulist();
        $data['item'] = $this->fooditem_model->item_dropdown();
        $data['units'] = $this->fooditem_model->get_food_units();
        $data['ingrdientslist'] = $this->fooditem_model->ingrediantlist();
        $data['addonslist'] = $this->fooditem_model->read_modified_groups_addons($config['per_page'], $page ?? 0);
        $data['module'] = 'itemmanage';
		$data['sub_header'] = 'item';
        $data['page'] = 'addfooditemnew';
        echo Modules::run('template/layout', $data);
    }

    /**
     * Helper method to save variants
     */
    private function save_variants($foodId, $savedId, $is_bom)
    {
        $variantNames = $this->input->post('variant_name', true);
        if (!$variantNames) return;

        $prices = $this->input->post('price', true);
        $takeawayPrices = $this->input->post('takeaway_price', true);
        $uberEatsPrices = $this->input->post('uber_eats_price', true);
        $doordashPrices = $this->input->post('doordash_price', true);
        $webOrderPrices = $this->input->post('weborder_price', true);
        $recipeFor = $this->input->post('recipe_for', true);

        foreach ($variantNames as $key => $variantName) {
            if (empty($variantName)) continue;
            $variantKey = strtolower(str_replace(' ', '_', $variantName));
            $variantData = [
                'menuid' => $foodId,
                'variantName' => $variantName,
                'price' => $prices[$key] ?? 0,
                'takeaway_price' => $takeawayPrices[$key] ?? 0,
                'uber_eats_price' => $uberEatsPrices[$key] ?? 0,
                'doordash_price' => $doordashPrices[$key] ?? 0,
                'web_order_price' => $webOrderPrices[$key] ?? 0,
                'recipe_cost' => $this->input->post('recipe_costprice_' . $variantKey, true)[0] ?? 0,
                'recipe_weightage' => $this->input->post('recipe_usedqty_' . $variantKey, true)[0] ?? 0,
            ];

            if (!$this->db->where(['menuid' => $foodId, 'variantName' => $variantName])->get('variant')->row()) {
                $this->foodvarient_model->create($variantData);
                $variantId = $this->db->insert_id();

                $productionData = [
                    'itemid' => $foodId,
                    'itemvid' => $variantId,
                    'itemquantity' => $this->input->post('unit', true) ?: 1,
                    'savedby' => $savedId,
                    'is_bom' => $is_bom,
                    'production_date' => date('Y-m-d', strtotime($this->input->post('production_date', true) ?: date('Y-m-d'))),
                    'expire_date' => date('Y-m-d', strtotime($this->input->post('expire_date', true) ?: date('Y-m-d'))),
                ];
                $this->fooditem_model->create_food_production($productionData);

                if ($is_bom && $this->input->post('cusine_type') != 3) {
                    $ingredientKey = "product_id_$variantKey";
                    $quantityKey = "product_quantity_$variantKey";
                    $unitIdKey = "unitid_$variantKey";
                    $unitNameKey = "unitname_$variantKey";
                    $recipePriceKey = "product_price_$variantKey";

                    $ingredients = $this->input->post($ingredientKey, true);
                    if ($ingredients) {
                        $quantities = $this->input->post($quantityKey, true);
                        $unitIds = $this->input->post($unitIdKey, true);
                        $unitNames = $this->input->post($unitNameKey, true);
                        $recipePrices = $this->input->post($recipePriceKey, true);

                        foreach ($ingredients as $i => $ingredientId) {
                            if (empty($ingredientId) || empty($quantities[$i])) continue;
                            $ingredientData = [
                                'foodid' => $foodId,
                                'pvarientid' => $variantId,
                                'ingredientid' => $ingredientId,
                                'qty' => $quantities[$i] ?? 0,
                                'unitid' => $unitIds[$i] ?? 0,
                                'unitname' => $unitNames[$i] ?? '',
                                'recipe_price' => $recipePrices[$i] ?? 0,
                                'createdby' => $savedId,
                                'created_date' => date('Y-m-d'),
                            ];
                            $this->db->insert('production_details', $ingredientData);
                        }
                    }
                }
            }
        }
    }

    /**
     * Helper method to save modifiers
     */
    private function save_modifiers($foodId)
    {
        $existingModifiers = $this->fooditem_model->get_modifiers_by_menu_id($foodId);
        $existingModifierIds = array_column($existingModifiers, 'modifier_groupid');
        $modifiers = $this->input->post('modifiers', true);
        $submittedModifierIds = [];

        if ($modifiers && is_array($modifiers)) {
            $minValues = $this->input->post('min', true) ?? [];
            $maxValues = $this->input->post('max', true) ?? [];
            $isReqValues = $this->input->post('isreq', true) ?? [];
            $sortValues = $this->input->post('sort', true) ?? [];

            foreach ($modifiers as $key => $modifier) {
                $modifierGroupId = (int)$modifier;
                $submittedModifierIds[] = $modifierGroupId;
                $minValue = isset($minValues[$key]) && $minValues[$key] !== '' ? (int)$minValues[$key] : 0;
                $maxValue = isset($maxValues[$key]) && $maxValues[$key] !== '' ? (int)$maxValues[$key] : $minValue;

                $modifierData = [
                    'menu_id' => $foodId,
                    'modifier_groupid' => $modifierGroupId,
                    'min' => $minValue,
                    'max' => $maxValue,
                    'isreq' => isset($isReqValues[$key]) && $isReqValues[$key] === 'on' ? 1 : 0,
                    'sortby' => isset($sortValues[$key]) && $sortValues[$key] !== '' ? (int)$sortValues[$key] : 0,
                    'is_active' => 1,
                ];

                $existingRowId = $this->fooditem_model->modifier_exists($foodId, $modifierGroupId);
                $existingRowId ? $this->fooditem_model->update_modifier_new($existingRowId, $modifierData) : $this->fooditem_model->insert_modifier_new($modifierData);
            }

            foreach (array_diff($existingModifierIds, $submittedModifierIds) as $modifierId) {
                $this->fooditem_model->delete_modifier($foodId, $modifierId);
            }
        } elseif ($existingModifierIds) {
            foreach ($existingModifierIds as $modifierId) {
                $this->fooditem_model->delete_modifier($foodId, $modifierId);
            }
        }
    }


	/**
	 * Helper method to update product JSON cache
	 */
	private function update_product_json()
	{
		$query = $this->db->select('ProductName, ProductsID')->from('item_foods')->where('ProductsIsActive', 1)->get();
		$json_product = array_map(function($row) {
			return ['label' => $row->ProductName, 'value' => $row->ProductsID];
		}, $query->result());
		file_put_contents('./assets/js/product.json', json_encode($json_product));
	}

	/**
	 *  NEW Food Item Create 
	 */

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

	
	// public function delete_variant()
	// {
	// 	$variantid = $this->input->post("variantid");
	// 	$menuid = $this->input->post("menuid");

	// 	if ($variantid && $menuid) {
	// 		$delete = $this->fooditem_model->delete_variant($variantid, $menuid);
	// 		if ($delete) {
	// 			echo json_encode(["status" => "success"]);
	// 		} else {
	// 			echo json_encode(["status" => "error"]);
	// 		}
	// 	} else {
	// 		echo json_encode(["status" => "invalid"]);
	// 	}
	// }

	public function delete_variant()
	{

		$variantid = $this->input->post("variantid");
		$menuid = $this->input->post("menuid");

		if ($variantid && $menuid) {
			// Delete variant and related records
			$delete = $this->fooditem_model->delete_variant_and_recipes($variantid, $menuid);
			
			if ($delete) {
				echo json_encode(["status" => "success"]);
			} else {
				echo json_encode(["status" => "error"]);
			}
		} else {
			echo json_encode(["status" => "invalid"]);
		}
	}

	public function delete_recipe_ingredient()
	{
		$ingredientid = $this->input->post("ingredientid");
		$foodid = $this->input->post("foodid");
		$variantid =  $this->input->post('variantid');

		if ($this->fooditem_model->delete_recipe_ingredient($ingredientid, $foodid, $variantid)) {
			echo json_encode(["success" => true]);
		} else {
			echo json_encode(["success" => false]);
		}
	}

	// Helper function to check if data has changed
	private function hasChanges($existingRecord, $newData) {
		return (
			$existingRecord->qty != $newData['qty'] ||
			$existingRecord->unitid != $newData['unitid'] ||
			$existingRecord->unitname != $newData['unitname'] ||
			$existingRecord->recipe_price != $newData['recipe_price']
		);
	}

	public function getingredientitem() {
		$csrf_token = $this->security->get_csrf_hash();
		$product_id = $this->input->post('product_id', true);
		$product_info = $this->fooditem_model->finditem($product_id);
	
		if ($product_info) {
			// Wrap in array for jQuery parsing
			echo json_encode([$product_info]); 
		} else {
			echo json_encode([]); // Return empty array if not found
		}
	
		exit; // Stop execution here
	}
	

	
	
	public function get_subcategories($parent_id) {
        // Get parent_id from POST request
        //$parent_id = $this->input->post('parent_id', TRUE);

        // Validate parent_id
        if (empty($parent_id) || !is_numeric($parent_id)) {
            echo '<option value="">Select Subcategory</option>';
            return;
        }

        // Fetch subcategories from the model
        $subcategories = $this->fooditem_model->get_subcategories_by_parent_id($parent_id);

        // Build HTML options for the select box
    	$options = '<option value="">Select Subcategory</option>';
        if (!empty($subcategories)) {
            foreach ($subcategories as $subcategory) {
                $options .= '<option value="' . $subcategory->CategoryID . '">' . htmlspecialchars($subcategory->Name) . '</option>';
            }
        }

        echo $options;
    }
	 /**
	  * ========================Food Item===========================
	  */


	public function get_food_menus() {
        $this->db->select('*')->from('menu'); // adjust table name if needed
        return $this->db->get()->result();
    }

	public function check_food_production($foodid) {
		
		
		if (!is_numeric($foodid)) {
			echo json_encode(['exists' => false]);
			return;
		}

		$exists = $this->fooditem_model->check_production_exists($foodid);
		echo json_encode(['exists' => $exists]);
	}

	/**
	 * Get Ajax call for change status
	 * @param string $table
	 * 
	 */
	public function toggle_status($table, $column, $pk_column, $id) {

		// Sanitize inputs
		$table = $this->db->escape_str($table);
		$column = $this->db->escape_str($column);
		$pk_column = $this->db->escape_str($pk_column);

		$row = $this->db->get_where($table, [$pk_column => $id])->row();

		if ($row && isset($row->$column)) {
			$currentStatus = $row->$column;
			$newStatus = ($currentStatus == 1) ? 0 : 1;

			$this->db->where($pk_column, $id)->update($table, [$column => $newStatus]);

			echo json_encode(['status' => 'success', 'new_value' => $newStatus]);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}
	
}
