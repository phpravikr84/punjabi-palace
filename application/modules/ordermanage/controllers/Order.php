<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->library('lsoft_setting');
		$this->load->model(array(
			'order_model',
			'logs_model'
		));
		$this->load->library('cart');
	}

	public function possetting()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('pos_setting');
		$saveid = $this->session->userdata('id');
		$data['possetting'] = $this->db->select('*')->from('tbl_posetting')->where('possettingid', 1)->get()->row();
		$data['quickorder'] = $this->db->select('*')->from('tbl_quickordersetting')->where('quickordid', 1)->get()->row();
		$data['module'] = "ordermanage";
		$data['page']   = "possetting";
		echo Modules::run('template/layout', $data);
	}
	public function settingenable()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$menuid = $this->input->post('menuid');
		$status = $this->input->post('status', true);
		$updatetready = array(
			$menuid           => $status
		);
		$this->db->where('possettingid', 1);
		$this->db->update('tbl_posetting', $updatetready);
	}
	public function quicksetting()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$menuid = $this->input->post('menuid');
		$status = $this->input->post('status', true);
		$updatetready = array(
			$menuid           => $status
		);
		$this->db->where('quickordid', 1);
		$this->db->update('tbl_quickordersetting', $updatetready);
	}

	public function insert_customer()
	{
		$this->permission->method('ordermanage', 'create')->redirect();
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|max_length[100]');
		$this->form_validation->set_rules('email', display('email'), 'required');
		$this->form_validation->set_rules('mobile', display('mobile'), 'required');
		$savedid = $this->session->userdata('id');

		$coa = $this->order_model->headcode();
		if ($coa->HeadCode != NULL) {
			$headcode = $coa->HeadCode + 1;
		} else {
			$headcode = "102030101";
		}
		$lastid = $this->db->select("*")->from('customer_info')
			->order_by('cuntomer_no', 'desc')
			->get()
			->row();
		$sl = $lastid->cuntomer_no;
		if (empty($sl)) {
			$sl = "cus-0001";
		} else {
			$sl = $sl;
		}
		$supno = explode('-', $sl);
		$nextno = $supno[1] + 1;
		$si_length = strlen((int)$nextno);

		$str = '0000';
		$cutstr = substr($str, $si_length);
		$sino = $supno[0] . "-" . $cutstr . $nextno;


		if ($this->form_validation->run()) {
			$this->permission->method('ordermanage', 'create')->redirect();
			$scan = scandir('application/modules/');
			$pointsys = "";
			foreach ($scan as $file) {
				if ($file == "loyalty") {
					if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
						$pointsys = 1;
					}
				}
			}
			$data['customer']   = (object) $postData = array(
				'cuntomer_no'     	=> $sino,
				'membership_type'	=> $pointsys,
				'customer_name'     	=> $this->input->post('customer_name', true),
				'customer_email'     => $this->input->post('email', true),
				'customer_phone'     => $this->input->post('mobile', true),
				'customer_address'   => $this->input->post('address', true),
				'favorite_delivery_address'     => $this->input->post('favaddress', true),
				'is_active'        => 1,
			);
			$logData = array(
				'action_page'         => "Add Customer",
				'action_done'     	 => "Insert Data",
				'remarks'             => "Customer is Created",
				'user_name'           => $this->session->userdata('fullname'),
				'entry_date'          => date('Y-m-d H:i:s'),
			);

			$c_name = $this->input->post('customer_name', true);
			$c_acc = $sino . '-' . $c_name;
			$createdate = date('Y-m-d H:i:s');
			$data['aco']  = (object) $postData1 = array(
				'HeadCode'         => $headcode,
				'HeadName'         => $c_acc,
				'PHeadName'        => 'Customer Receivable',
				'HeadLevel'        => '4',
				'IsActive'         => '1',
				'IsTransaction'    => '1',
				'IsGL'             => '0',
				'HeadType'         => 'A',
				'IsBudget'         => '0',
				'IsDepreciation'   => '0',
				'DepreciationRate' => '0',
				'CreateBy'         => $savedid,
				'CreateDate'       => $createdate,
			);
			$this->order_model->create_coa($postData1);
			if ($this->order_model->insert_customer($postData)) {
				$customerid = $this->db->select("*")->from('customer_info')->where('cuntomer_no', $sino)->get()->row();
				if (!empty($pointsys)) {
					$pointstable = array(
						'customerid'   => $customerid,
						'amount'       => 0,
						'points'       => 10
					);
					$this->db->insert('tbl_customerpoint', $pointstable);
				}
				$this->logs_model->log_recorded($logData);
				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('ordermanage/order/pos_invoice');
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("ordermanage/order/pos_invoice");
		} else {
			redirect("ordermanage/order/pos_invoice");
		}
	}
	public function insert_customerord()
	{
		$this->permission->method('ordermanage', 'create')->redirect();
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|max_length[100]');
		$this->form_validation->set_rules('email', display('email'), 'required');
		$this->form_validation->set_rules('mobile', display('mobile'), 'required');
		$savedid = $this->session->userdata('id');

		$coa = $this->order_model->headcode();
		if ($coa->HeadCode != NULL) {
			$headcode = $coa->HeadCode + 1;
		} else {
			$headcode = "102030101";
		}
		$lastid = $this->db->select("*")->from('customer_info')
			->order_by('cuntomer_no', 'desc')
			->get()
			->row();
		$sl = $lastid->cuntomer_no;
		if (empty($sl)) {
			$sl = "cus-0001";
		} else {
			$sl = $sl;
		}
		$supno = explode('-', $sl);
		$nextno = $supno[1] + 1;
		$si_length = strlen((int)$nextno);

		$str = '0000';
		$cutstr = substr($str, $si_length);
		$sino = $supno[0] . "-" . $cutstr . $nextno;

		if ($this->form_validation->run()) {

			$this->permission->method('ordermanage', 'create')->redirect();
			$data['customer']   = (object) $postData = array(
				'cuntomer_no'     	=> $sino,
				'customer_name'     	=> $this->input->post('customer_name', true),
				'customer_email'     => $this->input->post('email', true),
				'customer_phone'     => $this->input->post('mobile', true),
				'customer_address'   => $this->input->post('address', true),
				'favorite_delivery_address'     => $this->input->post('favaddress', true),
				'is_active'        => 1,
			);
			$logData = array(
				'action_page'         => "Add Customer",
				'action_done'     	 => "Insert Data",
				'remarks'             => "Customer is Created",
				'user_name'           => $this->session->userdata('fullname'),
				'entry_date'          => date('Y-m-d H:i:s'),
			);
			$c_name = $this->input->post('customer_name', true);
			$c_acc = $sino . '-' . $c_name;
			$createdate = date('Y-m-d H:i:s');
			$data['aco']  = (object) $postData1 = array(
				'HeadCode'         => $headcode,
				'HeadName'         => $c_acc,
				'PHeadName'        => 'Customer Receivable',
				'HeadLevel'        => '4',
				'IsActive'         => '1',
				'IsTransaction'    => '1',
				'IsGL'             => '0',
				'HeadType'         => 'A',
				'IsBudget'         => '0',
				'IsDepreciation'   => '0',
				'DepreciationRate' => '0',
				'CreateBy'         => $savedid,
				'CreateDate'       => $createdate,
			);
			$this->order_model->create_coa($postData1);
			if ($this->order_model->insert_customer($postData)) {
				$this->logs_model->log_recorded($logData);
				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('ordermanage/order/neworder');
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("ordermanage/order/neworder");
		} else {
			redirect("ordermanage/order/neworder");
		}
	}
	public function getcustomerdiscount($cid)
	{
		$settinginfo = $this->order_model->settinginfo();
		$customerinfo = $this->order_model->read('*', 'customer_info', array('customer_id' => 1));
		$mtype = $this->order_model->read('*', 'membership', array('id' => $customerinfo->membership_type));
		if ($settinginfo->discount_type == 0) {
		}
	}
	public function neworder($id = null)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('add_order');
		$saveid = $this->session->userdata('id');
		$data['intinfo'] = "";

		$data['categorylist']   = $this->order_model->category_dropdown();
		$data['curtomertype']   = $this->order_model->ctype_dropdown();
		$data['waiterlist']     = $this->order_model->waiter_dropdown();
		$data['tablelist']     = $this->order_model->table_dropdown();
		$data['customerlist']   = $this->order_model->customer_dropdown();
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "addorder";
		echo Modules::run('template/layout', $data);
	}
	public function pos_invoice($ctype = null)
	{
		if ($this->permission->method('ordermanage', 'create')->access() == FALSE) {
			redirect('dashboard/home');
		}
		// echo "<script>alert('ctype = " . $ctype . "');</script>";
		$data['title'] = "posinvoiceloading";
		$saveid = $this->session->userdata('id');
		$data['categorylist']  = $this->order_model->category_dropdown();
		$data['allcategorylist']  = $this->order_model->allcat_dropdown();
		$data['customerlist']  = $this->order_model->customer_dropdown();
		$data['paymentmethod'] = $this->order_model->pmethod_dropdown();
		$data['curtomertype']  = $this->order_model->ctype_dropdown();
		$data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$data['waiterlist']    = $this->order_model->waiter_dropdown();
		$data['tablelist']     = $this->order_model->table_dropdown();
		$data['itemlist']      =  $this->order_model->allfood2($ctype);
		$data['ongoingorder']  = $this->order_model->get_ongoingorder();
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		$data['possetting2'] = $this->order_model->read('*', 'tbl_quickordersetting', array('quickordid' => 1));
		$data['soundsetting'] = $this->order_model->read('*', 'tbl_soundsetting', array('soundid' => 1));
		$settinginfo = $this->order_model->settinginfo();
		$data['cashinfo'] = $this->db->select('*')->from('tbl_cashregister')->where('userid', $saveid)->where('status', 0)->order_by('id', 'DESC')->get()->row();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posorder";
		if (empty($ctype)) {
			$ctype = 1; // Default to 1 if ctype is not set
		}
		$data['ctype']   = $ctype;
		echo Modules::run('template/layout', $data);
	}
	public function getongoingorder($id = null, $table = null)
	{
		if ($id == null) {
			$data['ongoingorder']  = $this->order_model->get_ongoingorder();
		} else {
			if (empty($table)) {
				$data['ongoingorder']  = $this->order_model->get_unique_ongoingorder_id($id);
			} else {
				$data['ongoingorder']  = $this->order_model->get_unique_ongoingtable_id($id);
			}
		}
		$this->load->view('ongoingorder_ajax', $data);
	}
	public function kitchenstatus()
	{
		$data['kitchenorder']  = $this->order_model->get_orderlist();
		$this->load->view('kitchen_ajax', $data);
	}
	public function itemlist()
	{
		$orderid = $this->input->post('orderid');
		$data['itemlist']  = $this->order_model->get_itemlist($orderid);
		$data['allcancelitem'] = $this->order_model->get_cancelitemlist($orderid);
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.order_id',$orderid);
		$q1=$this->db->get();
		$orderedMods=$q1->result();
		$data['orderedMods']=$orderedMods;
		$this->load->view('item_ajax', $data);
	}
	public function showtodayorder()
	{
		$this->load->view('todayorder');
	}
	public function showonlineorder()
	{
		$this->load->view('onlineordertable');
	}
	public function showqrorder()
	{
		$this->load->view('qrordertable');
	}
	public function ongoingtable_name()
	{
		$name = $this->input->get('q');
		$tablewiseorderdetails  = $this->order_model->get_unique_ongoingorder($name);

		echo json_encode($tablewiseorderdetails);
	}
	public function ongoingtablesearch()
	{
		$name = $this->input->get('q');
		$tablewiseorderdetails  = $this->order_model->get_unique_ongoingtable($name);
		echo json_encode($tablewiseorderdetails);
	}
	public function getitemlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		$prod = $this->input->post('product_name', true);
		$isuptade = $this->input->post('isuptade', true);
		$catid = $this->input->post('category_id');
		$getproduct = $this->order_model->searchprod($catid, $prod);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		if (!empty($getproduct)) {
			$data['itemlist'] = $getproduct;
			$data['module'] = "ordermanage";
			if ($isuptade == 1) {
				$data['page']   = "getfoodlistup";
				$this->load->view('ordermanage/getfoodlistup', $data);
			} else {
				$data['page']   = "getfoodlist";
				$this->load->view('ordermanage/getfoodlist', $data);
			}
		} else {
			echo 420;
		}
	}
	public function getsubitemlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		$prod = $this->input->post('product_name', true);
		$isuptade = $this->input->post('isuptade', true);
		$catid = $this->input->post('category_id');
		$getproduct = $this->order_model->searchsubprod($catid, $prod);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		if (!empty($getproduct)) {
			$data['itemlist'] = $getproduct;
			$data['module'] = "ordermanage";
			if ($isuptade == 1) {
				$data['page']   = "getfoodlistup";
				$this->load->view('ordermanage/getfoodlistup', $data);
			} else {
				$data['page']   = "getfoodlist";
				$this->load->view('ordermanage/getfoodlist', $data);
			}
		} else {
			echo 420;
		}
	}
	public function getBanqitemlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		// $prod=$this->input->post('product_name',true);
		$isuptade = $this->input->post('isuptade', true);
		// $catid=$this->input->post('category_id');
		$getproduct = $this->order_model->allfoodBanq();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		if (!empty($getproduct)) {
			$data['itemlist'] = $getproduct;
			$data['module'] = "ordermanage";
			if ($isuptade == 1) {
				$data['page']   = "getfoodlistup";
				$this->load->view('ordermanage/getfoodlistup', $data);
			} else {
				$data['page']   = "getfoodlist";
				$this->load->view('ordermanage/getfoodlist', $data);
			}
		} else {
			echo 420;
		}
	}
	public function getPromoDealsItemlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		// $prod=$this->input->post('product_name',true);
		$isuptade = $this->input->post('isuptade', true);
		// $catid=$this->input->post('category_id');
		$getproduct = $this->order_model->allfoodPromo();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		if (!empty($getproduct)) {
			$data['itemlist'] = $getproduct;
			$data['module'] = "ordermanage";
			if ($isuptade == 1) {
				$data['page']   = "getfoodlistup";
				$this->load->view('ordermanage/getfoodlistup', $data);
			} else {
				$data['page']   = "getfoodlist";
				$this->load->view('ordermanage/getfoodlist', $data);
			}
		} else {
			echo 420;
		}
	}
	public function getitemlistdroup()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$prod = $this->input->get('q');
		$getproduct = $this->order_model->searchdropdown($prod);
		echo json_encode($getproduct);
	}
	public function getitemdata()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		$prod = $this->input->post('product_id');
		$getproduct  = $this->order_model->productinfo($prod);
		return json_encode($getproduct);
	}
	public function itemlistselect()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('supplier_edit');
		$id = $this->input->post('id');
		$data['itemlist']   = $this->order_model->findById($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "foodlist";
		$this->load->view('ordermanage/foodlist', $data);
	}
	public function addtocart()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$isgroup = $this->input->post('isgroup');
		$myid = $catid . $pid . $sizeid;
		$itemname = $this->input->post('itemname', true);
		$size = $this->input->post('varientname', true);
		$qty = $this->input->post('qty', true);
		$price = $this->input->post('price', true);
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice', true);
		$adonsunitprice = $this->input->post('adonsunitprice', true);
		$adonsqty = $this->input->post('adonsqty', true);
		$adonsname = $this->input->post('adonsname', true);
		if (empty($isgroup)) {
			$isgroup1 = 0;
		} else {
			$isgroup1 = $this->input->post('isgroup', true);
		}

		if (!empty($addonsid)) {
			$aids = $addonsid;
			$aqty = $adonsqty;
			$aname = $adonsname;
			$aprice = $adonsunitprice;
			$atprice = $allprice;
			$grandtotal = $price;
		} else {
			$grandtotal = $price;
			$aids = '';
			$aqty = '';
			$aname = '';
			$aprice = '';
			$atprice = '0';
		}

		$data_items = array(
			'id'      	=> $myid,
			'pid'     	=> $pid,
			'name'    	=> $itemname,
			'sizeid'    	=> $sizeid,
			'isgroup'    => $isgroup1,
			'size'    	=> $size,
			'qty'     	=> $qty,
			'price'   	=> $grandtotal,
			'addonsid'   => $aids,
			'addonname'  => $aname,
			'addonupr'   => $aprice,
			'addontpr'   => $atprice,
			'addonsqty'  => $aqty,
			'itemnote'	=> ""
		);

		$this->cart->insert($data_items);

		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "cartlist";
		$this->load->view('ordermanage/cartlist', $data);
	}
	public function srcposaddcart($pid = null)
	{
		$insert_new = TRUE;
		$bag = $this->cart->contents();
		$getproduct = $this->order_model->getuniqeproduct($pid);
		$this->db->select('*');
		$this->db->from('menu_add_on');
		$this->db->where('menu_id', $pid);
		$query = $this->db->get();

		$getadons = "";
		if ($query->num_rows() > 0 || $getproduct->is_customqty == 1) {
			$getadons = 1;
		} else {
			$getadons =  0;
		}
		foreach ($bag as $item) {

			// check product id in session, if exist update the quantity
			if ($item['pid'] == $pid) { // Set value to your variable
				if ($getadons == 0) {

					echo 'adons';
					exit;

					// set $insert_new value to False
					$insert_new = FALSE;
				} else {
					echo 'adons';
					exit;
				}
				break;
			}
		}
		if ($insert_new) {
			$this->permission->method('ordermanage', 'read')->redirect();
			$pid = $getproduct->ProductsID;
			$catid = $getproduct->CategoryID;
			$sizeid = $getproduct->variantid;;
			$myid = $catid . $pid . $sizeid;
			$itemname = $getproduct->ProductName . '-' . $getproduct->itemnotes;
			$size = $getproduct->variantName;
			$qty = 1;
			$price = isset($getproduct->price) ? $getproduct->price : 0;



			if ($getadons == 0) {
				$grandtotal = $price;
				$aids = '';
				$aqty = '';
				$aname = '';
				$aprice = '';
				$atprice = '0';
			} else {

				echo 'adons';
				exit;
			}

			$data_items = array(
				'id'      	=> $myid,
				'pid'     	=> $pid,
				'name'    	=> $itemname,
				'sizeid'    	=> $sizeid,
				'size'    	=> $size,
				'qty'     	=> $qty,
				'price'   	=> $grandtotal,
				'addonsid'   => $aids,
				'addonname'  => $aname,
				'addonupr'   => $aprice,
				'addontpr'   => $atprice,
				'addonsqty'  => $aqty,
				'itemnote'	=> ""
			);
			//print_r($data_items);

			//$this->cart->insert($data_items);
		}
		$this->permission->method('ordermanage', 'read')->redirect();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "cartlist";
		$this->load->view('ordermanage/poscartlist', $data);
	}
	/*show adons product*/
	public function adonsproductadd($id = null)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$getproduct = $this->order_model->getuniqeproduct($id);
		$data['item']         = $this->order_model->findid($getproduct->ProductsID, $getproduct->variantid);
		$data['addonslist']   = $this->order_model->findaddons($getproduct->ProductsID);
		$data['varientlist']   = $this->order_model->findByvmenuId($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posaddonsfood";
		$this->load->view('ordermanage/posaddonsfood', $data);
	}
	public function additemnote()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$foodnote = $this->input->post('foodnote', true);
		$rowid = $this->input->post('rowid', true);
		$qty = $this->input->post('qty', true);
		$data = array(
			'rowid'    => $rowid,
			'qty'      => $qty,
			'itemnote' => $foodnote
		);
		$this->cart->update($data);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['module'] = "ordermanage";
		$data['page']   = "poscartlist";
		$this->load->view('ordermanage/poscartlist', $data);
	}
	public function addnotetoupdate()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$foodnote = $this->input->post('foodnote', true);
		$rowid = $this->input->post('rowid', true);
		$orderid = $this->input->post('orderid', true);
		$group = $this->input->post('group', true);
		$data = array('notes' => $foodnote);
		if ($group > 0) {
			$this->db->where('order_id', $orderid);
			$this->db->where('groupmid', $group);
			$this->db->update('order_menu', $data);
		} else {
			$this->db->where('row_id', $rowid);
			$this->db->update('order_menu', $data);
		}
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['iteminfo']       = $this->order_model->customerorder($orderid);
		$data['billinfo']	   = $this->order_model->billinfo($orderid);
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";
		$this->load->view('ordermanage/updateorderlist', $data);
	}
	// public function posaddtocart()
	// {
	// 	$this->permission->method('ordermanage', 'read')->redirect();
	// 	$catid = $this->input->post('catid');
	// 	$pid = $this->input->post('pid');
	// 	$sizeid = $this->input->post('sizeid');
	// 	$isgroup = $this->input->post('isgroup', true);
	// 	$myid = $catid . $pid . $sizeid;
	// 	$itemname = $this->input->post('itemname', true);
	// 	$size = $this->input->post('varientname', true);
	// 	$qty = $this->input->post('qty', true);
	// 	$price = $this->input->post('price', true);
	// 	$addonsid = $this->input->post('addonsid', true);
	// 	$allprice = $this->input->post('allprice', true);
	// 	$adonsunitprice = $this->input->post('adonsunitprice', true);
	// 	$adonsqty = $this->input->post('adonsqty', true);
	// 	$adonsname = $this->input->post('adonsname', true);
	// 	$cart = $this->cart->contents();
	// 	$n = 0;
	// 	if (empty($isgroup)) {
	// 		$isgroup1 = 0;
	// 	} else {
	// 		$isgroup1 = $this->input->post('isgroup', true);
	// 	}
	// 	$new_str = str_replace(',', '0', $addonsid);
	// 	$new_str2 = str_replace(',', '0', $adonsqty);
	// 	$uaid = $pid . $new_str . $sizeid;
	// 	if (!empty($addonsid)) {
	// 		$joinid = trim($addonsid, ',');
	// 		//$uaid=(int)$joinid.mt_rand(1, time());
	// 		$cartexist = $this->cart->contents();
	// 		if (!empty($cartexist)) {
	// 			$adonsarray = explode(',', $addonsid);
	// 			$adonsqtyarray = explode(',', $adonsqty);
	// 			$adonspricearray = explode(',', $adonsunitprice);

	// 			$adqty = array();
	// 			$adprice = array();
	// 			foreach ($cartexist as $cartinfo) {
	// 				if (($cartinfo['id'] == $myid . $uaid) && (strpos($cartinfo['size'], 'Free Item') === false)) {
	// 					$adqty = explode(',', $cartinfo['addonsqty']);
	// 					$adprice = explode(',', $cartinfo['addonupr']);
	// 				}
	// 			}
	// 			$x = 0;
	// 			$finaladdonsqty = '';
	// 			$finaladdonspr = 0;
	// 			foreach ($adonsarray as $singleaddons) {
	// 				$singleaddons;
	// 				$totalaqty = $adonsqtyarray[$x] + $adqty[$x];
	// 				$finaladdonsqty .= $totalaqty . ',';
	// 				$totalaprice = $totalaqty * $adonspricearray[$x];
	// 				$finaladdonspr = $totalaprice + $finaladdonspr;
	// 				$x++;
	// 			}

	// 			if (!empty($adonsarray)) {
	// 				$aids = $addonsid;
	// 				$aqty = trim($finaladdonsqty, ',');
	// 				$aname = $adonsname;
	// 				$aprice = $adonsunitprice;
	// 				$atprice = $finaladdonspr;
	// 				$grandtotal = $price;
	// 			} else {
	// 				$aids = $addonsid;
	// 				$aqty = $adonsqty;
	// 				$aname = $adonsname;
	// 				$aprice = $adonsunitprice;
	// 				$atprice = $allprice;
	// 				$grandtotal = $price;
	// 			}
	// 		} else {
	// 			$aids = $addonsid;
	// 			$aqty = $adonsqty;
	// 			$aname = $adonsname;
	// 			$aprice = $adonsunitprice;
	// 			$atprice = $allprice;
	// 			$grandtotal = $price;
	// 		}
	// 	} else {
	// 		$grandtotal = $price;
	// 		$aids = '';
	// 		$aqty = '';
	// 		$aname = '';
	// 		$aprice = '';
	// 		$atprice = '0';
	// 	}
	// 	$myid = $catid . $pid . $sizeid . $uaid;
	// 	$data_items = array(
	// 		'id'      	=> $myid,
	// 		'pid'     	=> $pid,
	// 		'name'    	=> $itemname,
	// 		'sizeid'    	=> $sizeid,
	// 		'isgroup'    => $isgroup1,
	// 		'size'    	=> $size,
	// 		'qty'     	=> $qty,
	// 		'price'   	=> $grandtotal,
	// 		'addonsuid'  => $uaid,
	// 		'addonsid'   => $aids,
	// 		'addonname'  => $aname,
	// 		'addonupr'   => $aprice,
	// 		'addontpr'   => $atprice,
	// 		'addonsqty'  => $aqty,
	// 		'itemnote'	=> ""
	// 	);


	// 	$this->cart->insert($data_items);
	// 	$settinginfo = $this->order_model->settinginfo();

	// 	//Fetching modifier groups information from the database
	// 	$this->db->select('modifier_groups.*,menu_add_on.*');
	// 	$this->db->from('modifier_groups');
	// 	$this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
	// 	$this->db->where('menu_add_on.menu_id', $pid);
	// 	$this->db->where('menu_add_on.is_active', 1);
	// 	$query = $this->db->get();
	// 	$modifiers = $query->result();


	// 	$data['settinginfo'] = $settinginfo;
	// 	$data['modifiers'] = $modifiers;
	// 	$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
	// 	$data['taxinfos'] = $this->taxchecking();
	// 	$data['module'] = "ordermanage";
	// 	$data['page']   = "poscartlist";
	// 	$this->load->view('ordermanage/poscartlist', $data);
	// }

	public function posaddtocart()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$isgroup = $this->input->post('isgroup', true);
		$myid = $catid . $pid . $sizeid;
		$itemname = $this->input->post('itemname', true);
		$size = $this->input->post('varientname', true);
		$qty = $this->input->post('qty', true);
		$price = $this->input->post('price', true);
		$addonsid = $this->input->post('addonsid', true);
		$allprice = $this->input->post('allprice', true);
		$adonsunitprice = $this->input->post('adonsunitprice', true);
		$adonsqty = $this->input->post('adonsqty', true);
		$adonsname = $this->input->post('adonsname', true);

		$cart = $this->cart->contents();
		if (empty($isgroup)) {
			$isgroup1 = 0;
		} else {
			$isgroup1 = $this->input->post('isgroup', true);
		}

		$new_str = str_replace(',', '0', $addonsid);
		$uaid = $pid . $new_str . $sizeid;

		$finaladdonsqty = '';
		$finaladdonspr = 0;

		if (!empty($addonsid)) {
			$joinid = trim($addonsid, ',');
			$cartexist = $this->cart->contents();

			if (!empty($cartexist)) {
				$adonsarray = explode(',', $addonsid);
				$adonsqtyarray = explode(',', $adonsqty);
				$adonspricearray = explode(',', $adonsunitprice);

				$adqty = array_fill(0, count($adonsarray), 0);
				$adprice = array_fill(0, count($adonsarray), 0);

				foreach ($cartexist as $cartinfo) {
					// Only merge if not a Free Item
					if (($cartinfo['id'] == $myid . $uaid) && strpos($cartinfo['size'], 'Free Item') === false) {
						$adqty = explode(',', $cartinfo['addonsqty']);
						$adprice = explode(',', $cartinfo['addonupr']);
						$qty += $cartinfo['qty']; // Merge quantity
						break;
					}
				}

				for ($x = 0; $x < count($adonsarray); $x++) {
					$totalaqty = $adonsqtyarray[$x] + (isset($adqty[$x]) ? $adqty[$x] : 0);
					$finaladdonsqty .= $totalaqty . ',';
					$totalaprice = $totalaqty * $adonspricearray[$x];
					$finaladdonspr += $totalaprice;
				}

				$aids = $addonsid;
				$aqty = trim($finaladdonsqty, ',');
				$aname = $adonsname;
				$aprice = $adonsunitprice;
				$atprice = $finaladdonspr;
				$grandtotal = $price;
			} else {
				$aids = $addonsid;
				$aqty = $adonsqty;
				$aname = $adonsname;
				$aprice = $adonsunitprice;
				$atprice = $allprice;
				$grandtotal = $price;
			}
		} else {
			$grandtotal = $price;
			$aids = '';
			$aqty = '';
			$aname = '';
			$aprice = '';
			$atprice = '0';
		}

		// Force separate cart item if "Free Item"
		if (strpos($size, 'Free Item') !== false) {
			$myid .= '_' . uniqid(); // ensures cart row ID is always unique
		}

		$data_items = array(
			'id'         => $myid,
			'pid'        => $pid,
			'name'       => $itemname,
			'sizeid'     => $sizeid,
			'isgroup'    => $isgroup1,
			'size'       => $size,
			'qty'        => $qty,
			'price'      => $grandtotal,
			'addonsuid'  => $uaid,
			'addonsid'   => $aids,
			'addonname'  => $aname,
			'addonupr'   => $aprice,
			'addontpr'   => $atprice,
			'addonsqty'  => $aqty,
			'itemnote'   => ""
		);

		$this->cart->insert($data_items);

		$settinginfo = $this->order_model->settinginfo();

		$this->db->select('modifier_groups.*,menu_add_on.*');
		$this->db->from('modifier_groups');
		$this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
		$this->db->where('menu_add_on.menu_id', $pid);
		$this->db->where('menu_add_on.is_active', 1);
		$query = $this->db->get();
		$modifiers = $query->result();

		$data['settinginfo'] = $settinginfo;
		$data['modifiers'] = $modifiers;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "poscartlist";
		$this->load->view('ordermanage/poscartlist', $data);
	}


	public function cartupdate()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$cartID = $this->input->post('CartID');
		$productqty = $this->input->post('qty', true);
		$Udstatus = $this->input->post('Udstatus', true);
		if (($Udstatus == "del") && ($productqty > 0)) {
			$data = array(
				'rowid' => $cartID,
				'qty' => $productqty - 1
			);
			$this->cart->update($data);
		}
		if ($Udstatus == "add") {
			$data = array(
				'rowid' => $cartID,
				'qty' => $productqty + 1
			);
			$this->cart->update($data);
		}
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "cartlist";
		$this->load->view('ordermanage/cartlist', $data);
	}
	public function poscartupdate()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$cartID = $this->input->post('CartID');
		$pid = $this->input->post('pid');
		$productqty = $this->input->post('qty', true);
		$Udstatus = $this->input->post('Udstatus', true);
		if (($Udstatus == "del") && ($productqty > 0)) {
			$data = array(
				'rowid' => $cartID,
				'qty' => $productqty - 1
			);
			$this->cart->update($data);
		}
		if ($Udstatus == "add") {
			$data = array(
				'rowid' => $cartID,
				'qty' => $productqty + 1
			);
			$this->cart->update($data);
		}
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		//Fetching modifier groups information from the database
		$this->db->select('modifier_groups.*,menu_add_on.*');
		$this->db->from('modifier_groups');
		$this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
		$this->db->where('menu_add_on.menu_id', $pid);
		$this->db->where('menu_add_on.is_active', 1);
		$query = $this->db->get();
		$modifiers = $query->result();
		$data['modifiers'] = $modifiers;
		$data['module'] = "ordermanage";
		$data['page']   = "poscartlist";
		$this->load->view('ordermanage/poscartlist', $data);
	}
	public function addonsmenu()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$data['item']   	  = $this->order_model->findid($id, $sid);
		$data['addonslist']   = $this->order_model->findaddons($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "addonsfood";
		$this->load->view('ordermanage/addonsfood', $data);
	}
	public function posaddonsmenu()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$ctype = $this->input->post('ctype');
		$data['totalvarient'] = $this->input->post('totalvarient', true);
		$data['customqty'] = $this->input->post('customqty', true);
		$data['item']   	  = $this->order_model->findid($id, $sid, $ctype);
		$data['addonslist']   = $this->order_model->findaddons($id);
		$data['varientlist']   = $this->order_model->findByvmenuId($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['pid'] = $id;
		//Fetching modifier groups information from the database
		$this->db->select('modifier_groups.*,menu_add_on.*');
		$this->db->from('modifier_groups');
		$this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
		$this->db->where('menu_add_on.menu_id', $id);
		$this->db->where('menu_add_on.is_active', 1);
		$query = $this->db->get();
		$modifiers = $query->result();
		$modQty = $query->num_rows();
		$data['modifiers'] = $modifiers;
		$data['modQty'] = $modQty;
		$data['page'] = "posaddonsfood";
		$data['ctype'] = $ctype;
		$this->load->view('ordermanage/posaddonsfood', $data);
	}
	public function GetPromoFoodsForCart()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$data['totalvarient'] = $this->input->post('totalvarient', true);
		$data['customqty'] = $this->input->post('customqty', true);
		// old item list
		// $data['item']   	  = $this->order_model->findPromoById($id);
		$data['item']   	  = $this->order_model->findid($id, $sid);
		$data['mainFoodsList']   = $this->order_model->findMainFoodsPromo($id);
		$data['mainCats']   = $this->order_model->findMainCats($id);
		$data['varientlist']   = $this->order_model->findByvmenuId($id);

		// echo "sid: ".$sid."<br />";
		// echo "id: ".$id."<br />";
		// echo "<pre>";
		// print_r($data['item']);
		// echo "</pre>";
		// exit();
		//have to write different food list for promo food
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['pid'] = $id;
		//Fetching modifier groups information from the database
		$this->db->select('mg.*,mao.*');
		$this->db->from('modifier_groups AS mg');
		$this->db->join('menu_add_on AS mao', 'mg.id=mao.modifier_groupid', 'INNER');
		$this->db->where('mao.menu_id', $id);
		$this->db->where('mao.is_active', 1);
		$query = $this->db->get();
		$modifiers = $query->result();
		// echo "<pre>";
		// print_r($modifiers);
		// echo "</pre>";
		// echo "<br />";
		// echo $this->db->last_query();
		// exit();
		// $modifiers = [];

		$modQty = $query->num_rows();
		// $modQty = 0;
		$data['modifiers'] = $modifiers;
		$data['modQty'] = $modQty;

		// old view
		$data['page'] = "posaddpromofood";
		// have to write different view for promo food

		$this->load->view('ordermanage/posaddpromofood', $data);
	}
	public function posaddmodifier()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$tr_row_id = $this->input->post('tr_row_id');
		$data['totalvarient'] = $this->input->post('totalvarient', true);
		$data['customqty'] = $this->input->post('customqty', true);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posaddmodifier";
		$data['item']   = $this->order_model->findid($id, $sid);
		//Fetching modifier groups information from the database
		$this->db->select('modifier_groups.*,menu_add_on.*');
		$this->db->from('modifier_groups');
		$this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
		$this->db->where('menu_add_on.menu_id', $id);
		$this->db->where('menu_add_on.is_active', 1);
		$query = $this->db->get();
		$modifiers = $query->result();
		$data['modifiers']   = $modifiers;
		//Fetching selected modifiers information from the database
		$this->db->select('cart_selected_modifiers.*');
		$this->db->from('cart_selected_modifiers');
		$this->db->where('cart_selected_modifiers.menu_id',$id);
		$this->db->where('cart_selected_modifiers.is_active',1);
		$q2 = $this->db->get();
		$selectedMods = $q2->result();
		$data['pid']   = $id;
		$data['tr_row_id']   = $tr_row_id;
		$data['selectedMods']   = $selectedMods;

		$data['mainFoodsList']   = $this->order_model->findMainFoodsPromo($id);
		$data['mainCats']   = $this->order_model->findMainCats($id);
		$data['varientlist']   = $this->order_model->findByvmenuId($id);
		$this->load->view('ordermanage/posaddmodifier', $data);
	}

	public function cartmodifiersave()
	{
		$pid = $this->input->post('pid');
		$tr_row_id = $this->input->post('tr_row_id');
		$mods = json_decode($_POST['mods'], true);
		$modTotalPrice=0.00;
		$trid="";
		if ($cart = $this->cart->contents()){
			foreach ($cart as $ck => $cv) {
				$trid = $ck;
			}
		}
		if (count($mods)>0) {
			// $this-> db-> where('menu_id', $mods[0]['pid']);
    		// $this-> db-> delete('cart_selected_modifiers');
			foreach ($mods as $mi => $mv) {
				//checking modifier stock [start]
				$this->db->select('add_ons.modifier_id, add_ons.is_food_item, add_ons.add_on_name');
				$this->db->from('add_ons');
				$this->db->where('add_ons.add_on_id', $mv['mid']);
		
				$query = $this->db->get();
				$modIngrdId = $query->row();
				if ($modIngrdId->modifier_id == 0 && $modIngrdId->is_food_item == 1) {
					// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have any ingredients!!!');
					// redirect("ordermanage/order/pos_invoice");
					// exit;
					// uncomment below lines if you want to return error code
					// $msg = 'The modifier doesn\'t have any ingredients!!!';
					// echo 420;
					// exit;
				} else {
					if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 2){
						//ingredients
						$this->db->select('stock_qty');
						$this->db->from('ingredients');
						$this->db->where('id', $modIngrdId->modifier_id);

						$q1 = $this->db->get();
						$ingredQty = $q1->row();
						if ($ingredQty->stock_qty < 0 || $ingredQty->stock_qty == 0) {
							// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have sufficient ingredients!!!');
							// redirect("ordermanage/order/pos_invoice");
							// exit;
							// uncomment below lines if you want to return error code
							// $msg = 'The modifier doesn\'t have sufficient ingredients!!!';
							// echo 421;
							// exit;
						}
					} 
					if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 1){
						$this->db->select('ing.stock_qty, adding.modifier_ingr_adj_qty');
						$this->db->from('ingredients ing');
						$this->db->join('add_on_ingr_dtls adding', 'ing.id=adding.modifier_ingr_id', 'INNER');
						$this->db->where('adding.modifier_foodid', $modIngrdId->modifier_id);

						$q2 = $this->db->get();
						$ingredStockQty = $q2->result();
						if (count($ingredStockQty)>0) {
							foreach ($ingredStockQty as $igsk => $igsv) {
								if ($igsv->stock_qty < $igsv->modifier_ingr_adj_qty) {
									// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have sufficient stock!!!');
									// redirect("ordermanage/order/pos_invoice");
									// exit;
									// uncomment below lines if you want to return error code
									// $msg = 'The modifier doesn\'t have sufficient stock!!!';
									// echo 422;
									// exit;
								}
							}
						} else {
							// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' can\'t be added!!!');
							// redirect("ordermanage/order/pos_invoice");
							// exit;
							// uncomment below lines if you want to return error code
							// $msg = 'The modifier can\'t be added!!!';
							// echo 423;
							// exit;
						}
					}
				}
				//checking modifier stock [end]
				if ($mi==0) {
					$this-> db-> where('menu_id', $mods[0]['pid']);
    				$this-> db-> delete('cart_selected_modifiers');
				}
				$data = [
					'menu_id' => $mv['pid'],
					'add_on_id' => $mv['mid'],
					'modifier_groupid' => $mv['mgid'],
					'tr_row_id' => $trid,
					'is_active' => 1,
					'created_at' => date("Y-m-d H:i:s")
				];
				$this->db->insert('cart_selected_modifiers',$data);
				//Fetching add-on prices
				$this->db->select('SUM(add_ons.price) AS mod_total_price');
				$this->db->from('add_ons');
				$this->db->where('add_ons.add_on_id',$mv['mid']);
				$q = $this->db->get();
				$modTotalPriceRes = $q->row();
				$modTotalPrice+= $modTotalPriceRes->mod_total_price;
			}
		} else {
			$this-> db-> where('menu_id', $pid);
			$this-> db-> where('tr_row_id', $trid);
			$this-> db-> delete('cart_selected_modifiers');
		}
		$d['pid'] = $pid;
		$d['mods'] = $mods;
		$d['modTotalPrice'] = $modTotalPrice;
		$settinginfo = $this->order_model->settinginfo();
		$d['settinginfo'] = $settinginfo;
		$d['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$d['taxinfos'] = $this->taxchecking();
		$d['module'] = "ordermanage";
		$d['page']   = "posmodifiersave";
		$d['ctype']   = $this->input->post('ctype', true);
		$this->load->view('ordermanage/posmodifiersave', $d);
	}
	public function cartPromoFoodModifierSave()
	{
		$pid = $this->input->post('pid');
		$tr_row_id = $this->input->post('tr_row_id');
		$mods = json_decode($_POST['mods'], true);
		$foods = json_decode($_POST['foods'], true);
		$modTotalPrice=0.00;
		$trid="";
		if ($cart = $this->cart->contents()){
			foreach ($cart as $ck => $cv) {
				$trid = $ck;
			}
		}
		if (count($foods)>0) {
			foreach ($foods as $fi => $fv) {
				if ($fi==0) {
					$this-> db-> where('menu_id', $mods[0]['pid']);
					$this-> db-> where('foods_or_mods', 1);
    				$this-> db-> delete('cart_selected_modifiers');
				}
				$data = [
					'menu_id' => $fv['pid'],
					'variant_id' => $fv['vid'],
					'add_on_id' => $fv['mid'],
					'modifier_groupid' => $fv['mgid'],
					'tr_row_id' => $trid,
					'foods_or_mods' => 1,
					'is_active' => 1,
					'created_at' => date("Y-m-d H:i:s")
				];
				$this->db->insert('cart_selected_modifiers',$data);
			}
		} else {
			$this-> db-> where('menu_id', $pid);
			$this-> db-> where('tr_row_id', $trid);
			$this-> db-> where('foods_or_mods', 1);
			$this-> db-> delete('cart_selected_modifiers');
		}
		if (count($mods)>0) {
			// $this-> db-> where('menu_id', $mods[0]['pid']);
    		// $this-> db-> delete('cart_selected_modifiers');
			foreach ($mods as $mi => $mv) {
				//checking modifier stock [start]
				$this->db->select('add_ons.modifier_id, add_ons.is_food_item, add_ons.add_on_name');
				$this->db->from('add_ons');
				$this->db->where('add_ons.add_on_id', $mv['mid']);
		
				$query = $this->db->get();
				$modIngrdId = $query->row();
				if ($modIngrdId->modifier_id == 0 && $modIngrdId->is_food_item == 1) {
					// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have any ingredients!!!');
					// redirect("ordermanage/order/pos_invoice");
					// exit;
					// $msg = 'The modifier doesn\'t have any ingredients!!!';
					// echo 420;
					// exit;
				} else {
					if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 2){
						//ingredients
						$this->db->select('stock_qty');
						$this->db->from('ingredients');
						$this->db->where('id', $modIngrdId->modifier_id);

						$q1 = $this->db->get();
						$ingredQty = $q1->row();
						if ($ingredQty->stock_qty < 0 || $ingredQty->stock_qty == 0) {
							// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have sufficient ingredients!!!');
							// redirect("ordermanage/order/pos_invoice");
							// exit;
							// $msg = 'The modifier doesn\'t have sufficient ingredients!!!';
							// echo 421;
							// exit;
						}
					} 
					if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 1){
						$this->db->select('ing.stock_qty, adding.modifier_ingr_adj_qty');
						$this->db->from('ingredients ing');
						$this->db->join('add_on_ingr_dtls adding', 'ing.id=adding.modifier_ingr_id', 'INNER');
						$this->db->where('adding.modifier_foodid', $modIngrdId->modifier_id);

						$q2 = $this->db->get();
						$ingredStockQty = $q2->result();
						if (count($ingredStockQty)>0) {
							foreach ($ingredStockQty as $igsk => $igsv) {
								if ($igsv->stock_qty < $igsv->modifier_ingr_adj_qty) {
									// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have sufficient stock!!!');
									// redirect("ordermanage/order/pos_invoice");
									// exit;
									// $msg = 'The modifier doesn\'t have sufficient stock!!!';
									// echo 422;
									// exit;
								}
							}
						} else {
							// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' can\'t be added!!!');
							// redirect("ordermanage/order/pos_invoice");
							// exit;
							// $msg = 'The modifier can\'t be added!!!';
							// echo 423;
							// exit;
						}
					}
				}
				//checking modifier stock [end]
				if ($mi==0) {
					$this-> db-> where('menu_id', $mods[0]['pid']);
					$this-> db-> where('foods_or_mods', 2);
    				$this-> db-> delete('cart_selected_modifiers');
				}
				$data = [
					'menu_id' => $mv['pid'],
					'add_on_id' => $mv['mid'],
					'modifier_groupid' => $mv['mgid'],
					'tr_row_id' => $trid,
					'foods_or_mods' => 2,
					'is_active' => 1,
					'created_at' => date("Y-m-d H:i:s")
				];
				$this->db->insert('cart_selected_modifiers',$data);
				//Fetching add-on prices
				$this->db->select('SUM(add_ons.price) AS mod_total_price');
				$this->db->from('add_ons');
				$this->db->where('add_ons.add_on_id',$mv['mid']);
				$q = $this->db->get();
				$modTotalPriceRes = $q->row();
				$modTotalPrice+= $modTotalPriceRes->mod_total_price;
			}
		} else {
			$this-> db-> where('menu_id', $pid);
			$this-> db-> where('tr_row_id', $trid);
			$this-> db-> where('foods_or_mods', 2);
			$this-> db-> delete('cart_selected_modifiers');
		}
		$d['pid'] = $pid;
		$d['mods'] = $mods;
		$d['modTotalPrice'] = $modTotalPrice;
		$settinginfo = $this->order_model->settinginfo();
		$d['settinginfo'] = $settinginfo;
		$d['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$d['taxinfos'] = $this->taxchecking();
		$d['module'] = "ordermanage";
		$d['page']   = "posmodifiersave";
		$this->load->view('ordermanage/posmodifiersave', $d);
	}

	public function getItemDetails()
	{
		// fetch the actual itemname, varientid, and varientname from the database table item_foods join with varient table with the given pid
		$pid = $this->input->post('pid');
		$this->db->select('item_foods.*, variant.variantid, variant.variantName');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID = variant.menuid', 'left');
		$this->db->where('item_foods.ProductsID', $pid);
		$query = $this->db->get();
		$itemDetails = $query->row_array();
		if ($itemDetails) {
			// Return the item details as a JSON response
			echo json_encode($itemDetails);
		} else {
			// If no item found, return an empty array
			echo json_encode([]);
		}
	}

	public function cartclear()
	{
		$this->cart->destroy();
		redirect('ordermanage/order/neworder');
	}
	public function posclear()
	{
		$this->cart->destroy();
		redirect('ordermanage/order/pos_invoice');
	}

	public function removetocart()
	{
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
		$this->cart->update($data);
		$this-> db-> where('tr_row_id', $rowid);
		$this-> db-> where('DATE(created_at)', date("Y-m-d"));
		$this-> db-> delete('cart_selected_modifiers');
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "poscartlist";
		$this->load->view('ordermanage/poscartlist', $data);
	}
	public function placeoreder()
	{
		$this->form_validation->set_rules('ctypeid', display('customer_type'), 'required');
		$this->form_validation->set_rules('waiter', 'Select Waiter', 'required');
		$this->form_validation->set_rules('tableid', 'Select Table', 'required');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		$this->form_validation->set_rules('order_date', display('ordate'), 'required');
		$saveid = $this->session->userdata('id');
		$customerid = $this->input->post('customer_name', true);
		$paymentsatus = $this->input->post('card_type', true);
		if ($this->form_validation->run()) {
			if ($cart = $this->cart->contents()) {
				$this->permission->method('ordermanage', 'create')->redirect();
				$logData = array(
					'action_page'         => display('add_new_order'),
					'action_done'     	  => "Insert Data",
					'remarks'             => "Item New Order Created",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				/* add New Order*/
				$purchase_date = str_replace('/', '-', $this->input->post('order_date'));
				$newdate = date('Y-m-d', strtotime($purchase_date));
				$lastid = $this->db->select("*")->from('customer_order')
					->order_by('order_id', 'desc')
					->get()
					->row();
				$sl = $lastid->order_id;
				if (empty($sl)) {
					$sl = 1;
				} else {
					$sl = $sl + 1;
				}

				$si_length = strlen((int)$sl);

				$str = '0000';
				$str2 = '0000';
				$cutstr = substr($str, $si_length);
				$sino = $cutstr . $sl;
				$settinginfo = $this->db->select("*")->from('setting')->get()->row();
				if ($settinginfo->isvatinclusive == 1) {
					$vat = $this->input->post('vat');
					$billtotal = $this->input->post('grandtotal', true);
					$gtotal = $billtotal - $vat;
				} else {
					$gtotal = $this->input->post('grandtotal', true);
				}

				$data2 = array(
					'customer_id'			=>	$this->input->post('customer_name', true),
					'saleinvoice'			=>	$sino,
					'cutomertype'		    =>	$this->input->post('ctypeid', true),
					'waiter_id'	        	=>	$this->input->post('waiter', true),
					'order_date'	        =>	$newdate,
					'order_time'	        =>	date('H:i:s'),
					'totalamount'		 	=>  $gtotal,
					'table_no'		    	=>	$this->input->post('tableid', true),
					'customer_note'		    =>	$this->input->post('customernote', true),
					'order_status'		    =>	1
				);
				$this->db->insert('customer_order', $data2);
				$orderid = $this->db->insert_id();

				if ($this->order_model->orderitem($orderid)) {
					$this->logs_model->log_recorded($logData);
					$this->session->set_flashdata('message', display('save_successfully'));
					$customer = $this->order_model->customerinfo($customerid);

					//Inserting Modifiers from the cart
					// if ($cart = $this->cart->contents()) {
					// 	if (count($cart)>0) {
					// 		foreach ($cart as $ck => $cv) {
					// 			$this->db->select('cart_selected_modifiers.*');
					// 			$this->db->from('cart_selected_modifiers');
					// 			$this->db->where('cart_selected_modifiers.tr_row_id',$cv['rowid']);
					// 			$q=$this->db->get();
					// 			$res1=$q->result();
					// 			if (count($res1)>0) {
					// 				foreach ($res1 as $cmk => $cmv) {
					// 					$d1=[
					// 						'menu_id' => $cmv['menu_id'],
					// 						'add_on_id' => $cmv['add_on_id'],
					// 						'modifier_groupid' => $cmv['modifier_groupid'],
					// 						'order_id' => $orderid,
					// 						'is_active' => 1,
					// 						'created_at' => date('Y-m-d H:i:s')
					// 					];
					// 					$this->db->insert('ordered_menu_item_modifiers',$d1);
					// 				}
					// 			}
					// 			$this-> db-> where('tr_row_id', $cv['rowid']);
					// 			$this-> db-> delete('cart_selected_modifiers');
					// 		}
					// 	}
					// }
					$this->cart->destroy();

					if ($paymentsatus == 5) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else if ($paymentsatus == 3) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else if ($paymentsatus == 2) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else {
						redirect('ordermanage/order/neworder');
					}
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("ordermanage/order/neworder");
			} else {
				$this->session->set_flashdata('exception',  'Please add Some food!!');
				redirect("ordermanage/order/neworder");
			}
		} else {
			$this->permission->method('ordermanage', 'read')->redirect();
			$data['categorylist']   = $this->order_model->category_dropdown();
			$data['curtomertype']   = $this->order_model->ctype_dropdown();
			$data['waiterlist']     = $this->order_model->waiter_dropdown();
			$data['tablelist']     = $this->order_model->table_dropdown();
			$data['customerlist']   = $this->order_model->customer_dropdown();
			$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
			$data['module'] = "ordermanage";
			$data['page']   = "addorder";
			echo Modules::run('template/layout', $data);
		}
	}
	public function pos_order($value = null)
	{
		$this->form_validation->set_rules('ctypeid', display('customer_type'), 'required');

		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		// $this->db->trans_begin();
		$saveid = $this->session->userdata('id');
		$paymentsatus = $this->input->post('card_type', true);
		$isonline = $this->input->post('isonline', true);
		if ($this->form_validation->run()) {
			if ($cart = $this->cart->contents()) {
				$this->permission->method('ordermanage', 'create')->redirect();
				$logData = array(
					'action_page'         => display('add_new_order'),
					'action_done'     	 => "Insert Data",
					'remarks'             => "Item New Order Created",
					'user_name'           => $this->session->userdata('fullname'),
					'entry_date'          => date('Y-m-d H:i:s'),
				);
				/* add New Order*/
				$purchase_date = str_replace('/', '-', $this->input->post('order_date'));
				$newdate = date('Y-m-d', strtotime($purchase_date));
				$lastid = $this->db->select("*")->from('customer_order')->order_by('order_id', 'desc')->get()->row();
				$sl = $lastid->order_id;
				if (empty($sl)) {
					$sl = 1;
				} else {
					$sl = $sl + 1;
				}

				$si_length = strlen((int)$sl);

				$str = '0000';
				$str2 = '0000';
				$cutstr = substr($str, $si_length);
				$sino = $cutstr . $sl;
				$todaydate = date('Y-m-d');
				$todaystoken = $this->db->select("*")->from('customer_order')->where('order_date', $todaydate)->order_by('order_id', 'desc')->get()->row();
				if (empty($todaystoken)) {
					$mytoken = 1;
				} else {
					$mytoken = $todaystoken->tokenno + 1;
				}
				$token_length = strlen((int)$mytoken);
				$tokenstr = '00';
				$newtoken = substr($tokenstr, $token_length);
				$tokenno = $newtoken . $mytoken;
				$cookedtime = $this->input->post('cookedtime');
				$customerid2 = $this->input->post('customer_name', true);
				if (empty($cookedtime)) {
					$cookedtime = "00:15:00";
				}
				$customerinfo = $this->order_model->read('*', 'customer_info', array('customer_id' => $this->input->post('customer_name', true)));
				$mtype = $this->order_model->read('*', 'membership', array('id' => $customerinfo->membership_type));
				$ordergrandt = $this->input->post('grandtotal', true);
				$scan = scandir('application/modules/');
				$getdiscount = 0;
				foreach ($scan as $file) {
					if ($file == "loyalty") {
						if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
							$getdiscount = $mtype->discount * $this->input->post('subtotal') / 100;
						}
					}
				}
				$vat = $this->input->post('vat');
				$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
				if ($isvatinclusive->isvatinclusive == 1) {
					$ordergrandt = $ordergrandt - $vat;
				}
				$data2 = array(
					'customer_id'			=>	$this->input->post('customer_name', true),
					'saleinvoice'			=>	$sino,
					'cutomertype'		    =>	$this->input->post('ctypeid'),
					'waiter_id'	        	=>	$this->input->post('waiter', true),
					'isthirdparty'	        =>	$this->input->post('delivercom', true),
					'thirdpartyinvoiceid'	=>	$this->input->post('thirdpartyinvoiceid'),
					'order_date'	        =>	$newdate,
					'order_time'	        =>	date('H:i:s'),
					'totalamount'		 	=>  $ordergrandt - $getdiscount,
					'table_no'		    	=>	$this->input->post('tableid', true),
					'customer_note'		    =>	$this->input->post('customernote', true),
					'tokenno'		        =>	$tokenno,
					'cookedtime'		    =>	$cookedtime,
					'order_status'		    =>	1
				);

				$this->db->insert('customer_order', $data2);
				$orderid = $this->db->insert_id();
				$taxinfos = $this->taxchecking();
				if (!empty($taxinfos)) {
					$multitaxvalue = $this->input->post('multiplletaxvalue', true);
					$multitaxvaluedata = unserialize($multitaxvalue);
					$inserttaxarray = array(
						'customer_id' => $this->input->post('customer_name', true),
						'relation_id' => $orderid,
						'date' => $newdate
					);
					$inserttaxdata = array_merge($inserttaxarray, $multitaxvaluedata);
					$this->db->insert('tax_collection', $inserttaxdata);
				}
				/*for 02/11*/
				if ($this->input->post('ctypeid') == 1) {
					if ($this->input->post('table_member_multi') == 0) {
						$addtable_member = array(
							'table_id' 		=> $this->input->post('tableid'),
							'customer_id'	=> $this->input->post('customer_name', true),
							'order_id' 		=> $orderid,
							'time_enter' 	=> date('H:i:s'),
							'created_at'	=> $newdate,
							'total_people' 	=> $this->input->post('tablemember', true),
						);
						$this->db->insert('table_details', $addtable_member);
					} else {
						$multipay_inserts = explode(',', $this->input->post('table_member_multi'));
						$table_member_multi_person = explode(',', $this->input->post('table_member_multi_person', true));
						$z = 0;
						foreach ($multipay_inserts as $multipay_insert) {
							$addtable_member = array(
								'table_id' 		=> $multipay_insert,
								'customer_id'	=> $this->input->post('customer_name', true),
								'order_id' 		=> $orderid,
								'time_enter' 	=> date('H:i:s'),
								'created_at'	=> $newdate,
								'total_people' 	=> $table_member_multi_person[$z],
							);
							$this->db->insert('table_details', $addtable_member);
							$z++;
						}
					}
				}
				/*enc 02/11*/
				if ($this->input->post('delivercom', true) > 0) {
					/*Push Notification*/
					$this->db->select('*');
					$this->db->from('user');
					$this->db->where('id', $this->input->post('waiter', true));
					$query = $this->db->get();
					$allemployee = $query->row();
					$senderid = array();
					$senderid[] = $allemployee->waiter_kitchenToken;
					define('API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
					$registrationIds = $senderid;
					$msg = array(
						'message' 					=> "Orderid:" . $orderid . ", Amount:" . $this->input->post('grandtotal', true),
						'title'						=> "New Order Placed",
						'subtitle'					=> "admin",
						'tickerText'				=> "10",
						'vibrate'					=> 1,
						'sound'						=> 1,
						'largeIcon'					=> "TSET",
						'smallIcon'					=> "TSET"
					);
					$fields2 = array(
						'registration_ids' 	=> $registrationIds,
						'data'			=> $msg
					);

					$headers2 = array(
						'Authorization: key=' . API_ACCESS_KEY,
						'Content-Type: application/json'
					);

					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
					curl_setopt($ch2, CURLOPT_POST, true);
					curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($fields2));
					$result2 = curl_exec($ch2);
					curl_close($ch2);
					/*End Notification*/
					/*Push Notification*/
					$condition = "user.waiter_kitchenToken!='' AND employee_history.pos_id=1";
					$this->db->select('user.*,employee_history.emp_id,employee_history.employee_no,employee_history.pos_id ');
					$this->db->from('user');
					$this->db->join('employee_history', 'employee_history.emp_id = user.id', 'left');
					$this->db->where($condition);
					$query = $this->db->get();
					$allkitchen = $query->result();
					$senderid5 = array();
					foreach ($allkitchen as $mytoken) {
						$senderid5[] = $mytoken->waiter_kitchenToken;
					}

					define('API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
					$registrationIds5 = $senderid5;
					$msg5 = array(
						'message' 					=> "Orderid:" . $orderid . ", Amount:" . $this->input->post('grandtotal', true),
						'title'						=> "New Order Placed",
						'subtitle'					=> "TSET",
						'tickerText'				=> "onno",
						'vibrate'					=> 1,
						'sound'						=> 1,
						'largeIcon'					=> "TSET",
						'smallIcon'					=> "TSET"
					);
					$fields5 = array(
						'registration_ids' 	=> $registrationIds5,
						'data'			=> $msg5
					);

					$headers5 = array(
						'Authorization: key=' . API_ACCESS_KEY,
						'Content-Type: application/json'
					);

					$ch5 = curl_init();
					curl_setopt($ch5, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
					curl_setopt($ch5, CURLOPT_POST, true);
					curl_setopt($ch5, CURLOPT_HTTPHEADER, $headers5);
					curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch5, CURLOPT_POSTFIELDS, json_encode($fields5));
					$result5 = curl_exec($ch5);
					curl_close($ch5);
				} else {
					/*Push Notification*/
					$this->db->select('*');
					$this->db->from('user');
					$this->db->where('id', $this->input->post('waiter', true));
					$query = $this->db->get();
					$allemployee = $query->row();
					$senderid = array();
					$senderid[] = $allemployee->waiter_kitchenToken;
					define('API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
					$registrationIds = $senderid;
					$msg = array(
						'message' 					=> "Orderid:" . $orderid . ", Amount:" . ($ordergrandt - $getdiscount),
						'title'						=> "New Order Placed",
						'subtitle'					=> "admin",
						'tickerText'				=> "10",
						'vibrate'					=> 1,
						'sound'						=> 1,
						'largeIcon'					=> "TSET",
						'smallIcon'					=> "TSET"
					);
					$fields2 = array(
						'registration_ids' 	=> $registrationIds,
						'data'			=> $msg
					);

					$headers2 = array(
						'Authorization: key=' . API_ACCESS_KEY,
						'Content-Type: application/json'
					);

					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
					curl_setopt($ch2, CURLOPT_POST, true);
					curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($fields2));
					$result2 = curl_exec($ch2);
					curl_close($ch2);
					/*End Notification*/
					/*Push Notification*/
					$condition = "user.waiter_kitchenToken!='' AND employee_history.pos_id=1";
					$this->db->select('user.*,employee_history.emp_id,employee_history.employee_no,employee_history.pos_id ');
					$this->db->from('user');
					$this->db->join('employee_history', 'employee_history.emp_id = user.id', 'left');
					$this->db->where($condition);
					$query = $this->db->get();
					$allkitchen = $query->result();
					$senderid5 = array();
					foreach ($allkitchen as $mytoken) {
						$senderid5[] = $mytoken->waiter_kitchenToken;
					}
					define('API_ACCESS_KEY2', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
					$registrationIds5 = $senderid5;
					$msg5 = array(
						'message' 					=> "Orderid:" . $orderid . ", Amount:" . ($ordergrandt - $getdiscount),
						'title'						=> "New Order Placed",
						'subtitle'					=> "TSET",
						'tickerText'				=> "onno",
						'vibrate'					=> 1,
						'sound'						=> 1,
						'largeIcon'					=> "TSET",
						'smallIcon'					=> "TSET"
					);
					$fields5 = array(
						'registration_ids' 	=> $registrationIds5,
						'data'			=> $msg5
					);

					$headers5 = array(
						'Authorization: key=' . API_ACCESS_KEY2,
						'Content-Type: application/json'
					);

					$ch5 = curl_init();
					curl_setopt($ch5, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
					curl_setopt($ch5, CURLOPT_POST, true);
					curl_setopt($ch5, CURLOPT_HTTPHEADER, $headers5);
					curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch5, CURLOPT_POSTFIELDS, json_encode($fields5));
					$result5 = curl_exec($ch5);
					curl_close($ch5);
				}
				if ($this->order_model->orderitem($orderid)) {
					$this->logs_model->log_recorded($logData);

					$customer = $this->order_model->customerinfo($customerid);
					$scan = scandir('application/modules/');
					$getcus = "";
					foreach ($scan as $file) {
						if ($file == "loyalty") {
							if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
								$getcus = $customerid2;
							}
						}
					}
					if (!empty($getcus)) {
						$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid2)->get()->row();
						if (empty($isexitscusp)) {
							$pointstable2 = array(
								'customerid'   => $customerid2,
								'amount'       => "",
								'points'       => 10
							);
							$this->order_model->insert_data('tbl_customerpoint', $pointstable2);
						}
					}
					//Modifiers records are being added [start]
					// echo "<pre>";
					// print_r($this->cart->contents());
					// echo "</pre>";
					// exit();
					$cart = $this->cart->contents();
					if (count($cart)>0) {
						if (count($cart)>0) {
							foreach ($cart as $ck => $cv) {
								$this->db->select('cart_selected_modifiers.*');
								$this->db->from('cart_selected_modifiers');
								$this->db->where('cart_selected_modifiers.tr_row_id',$cv['rowid']);
								$q=$this->db->get();
								$res1=$q->result();
								// echo "<pre>";
								// print_r($res1);
								// echo "</pre>";
								// return $res1;
								// exit();
								if (count($res1)>0) {
								// if ($q->num_rows() > 0) {
									foreach ($res1 as $cmk => $cmv) {
										$prodId = $cmv->add_on_id;
										$varId = $cmv->variant_id;
										//stock checking and stock deducting function for food items [start] 9th May 2025
										if ($cmv->foods_or_mods==1) {
											// echo "<pre>";
											// print_r($cmv);
											// echo "</pre>";
											// echo "<br> foods_or_mods: ".$cmv->foods_or_mods;
											// echo "<br> prodId: ".$prodId;
											// echo "<br> varId: ".$varId;
											// return $cmv;
											// exit();
											$foodqty = 1;
											//Food item's stock checking [start]
											$this->db->select("a.*,SUM(a.itemquantity) as totalqty, b.ProductsID, b.ProductName");
											$this->db->from('production a');
											$this->db->join('item_foods b','b.ProductsID = a.itemid','left');
											$this->db->where('b.ProductsID', $prodId);
											$this->db->group_by('a.itemid');
											$this->db->order_by('a.saveddate','desc');
											$query = $this->db->get();
											$producreport=$query->result();
											$result=$producreport[0];
											$dateRange2 = "a.menu_id='$result->itemid' AND b.order_status!=5";
											$this->db->select("SUM(a.menuqty) as totalsaleqty,b.order_date");
											$this->db->from('order_menu a');
											$this->db->join('customer_order b', 'b.order_id = a.order_id', 'left');
											$this->db->where($dateRange2, NULL, FALSE);
											$this->db->order_by('b.order_date', 'desc');
											$query = $this->db->get();
											$salereport = $query->row();
											if (empty($salereport->totalsaleqty)) {
												$tout = 0;
											} else {
												$tout = $salereport->totalsaleqty;
											}
											$productName = $result->ProductName;
											$in_Qnty = $result->totalqty;
											$out_Qnty = $tout;
											$stock = $result->totalqty - $salereport->totalsaleqty;

											$checksetitem = $this->db->select('ProductsID,isgroup', 'is_bom')->from('item_foods')->where('ProductsID', $prodId)->where('isgroup', 1)->get()->row();
											$isavailable = true;
											if (!empty($checksetitem) && (2+2) != 4) {
												if ($checksetitem->is_bom == 1) {
													$groupitemlist = $this->db->select('items,varientid,item_qty')->from('tbl_groupitems')->where('gitemid', $checksetitem->ProductsID)->get()->result();
													foreach ($groupitemlist as $groupitem) { 
														$this->db->select('*');
														$this->db->from('production_details');
														$this->db->where('foodid', $groupitem->items);
														$this->db->where('pvarientid', $groupitem->varientid);
														$productiondetails = $this->db->get()->result();
														if (empty($productiondetails)) {
															$isavailable = false;
															// return 'Please set Ingredients!!first!!!' . $groupitem->items;
															return '201';
															break;
															exit();
														} else {
															foreach ($productiondetails as $productiondetail) {
																$r_stock = $productiondetail->qty * ($foodqty * $groupitem->item_qty);
																/*add stock in ingredients*/
																$this->db->select('*');
																$this->db->from('ingredients');
																$this->db->where('id', $productiondetail->ingredientid);
																$this->db->where('stock_qty >=', $r_stock);
																$stockcheck = $this->db->get()->num_rows();

																if ($stockcheck == 0) {
																	// return 'Please check Ingredients!!Some Ingredients are not Available!!!' . $groupitem->items;
																	return '202';
																	break;
																	exit();
																}
																/*end add ingredients*/
															}
														}
													}
												}
												// return 1;
											} else {
												$this->db->select('*');
												$this->db->from('production_details');
												$this->db->where('foodid', $prodId);
												$this->db->where('pvarientid', $varId);
												$productiondetails = $this->db->get()->result();
												// echo "<pre>";
												// print_r($productiondetails);
												// echo "</pre>";
												// return $productiondetails;
												// exit();
											}


											if (!empty($productiondetails)) {

												foreach ($productiondetails as $productiondetail) {
													$r_stock = $productiondetail->qty * $foodqty;
													/*add stock in ingredients*/
													$this->db->select('*');
													$this->db->from('ingredients');
													$this->db->where('id', $productiondetail->ingredientid);
													$this->db->where('stock_qty >=', $r_stock);
													$stockcheck = $this->db->get()->num_rows();

													if ($stockcheck == 0) {
														// return 'Please check Ingredients!!Some Ingredients are not Available!!!';
														return '202';
														break;
														exit();
													}


													/*end add ingredients*/
												}
											} else {
												if ($checksetitem->is_bom == 1) {
													// return 'Please set Ingredients!!first!!!';
													return '201';
													break;
													exit();
												} else {
													// return 1;
												}
											}
											// return 1;
											//Food item's stock checking [end]

											$d1=[
												'menu_id' => $cmv->menu_id,
												'variant_id' => $cmv->variant_id,
												'add_on_id' => $cmv->add_on_id,
												'modifier_groupid' => $cmv->modifier_groupid,
												'order_id' => $orderid,
												'foods_or_mods' => 1,
												'is_active' => 1,
												'created_at' => date('Y-m-d H:i:s')
											];
											$this->db->insert('ordered_menu_item_modifiers',$d1);
											$menuId = $prodId;
											$menuQty = 1;
											$menuVarientId = $varId;
											// Fetch production details for the given menu_id
											$this->db->select('pro_detailsid, foodid, pvarientid, ingredientid, qty');
											$this->db->where('foodid', $menuId);
											$this->db->where('pvarientid', $menuVarientId);

											$productionDetails = $this->db->get('production_details')->result_array();
											// echo "<pre>";
											// print_r($productionDetails);
											// echo "</pre>";
											// $this->db->trans_rollback();
											// exit();
											foreach ($productionDetails as $production) {
												// echo "<pre>";
												// print_r($production);
												// echo "</pre>";
												$ingredientId = $production['ingredientid'];
												$usedQty = $production['qty'] * ($menuQty);
												//fetch the percentage of the ingredient to deduct from promotion_main_modifiers table
												$this->db->select('category_max_qty, category_weight_percent, total_weight_percent, total_no_of_item');
												$this->db->from('promotion_main_modifiers');
												$this->db->where('category_id', $cmv->modifier_groupid);
												$percentage = $this->db->get()->row();
												if (!empty($percentage)) {
													$percent = ($percentage->category_weight_percent == 0) ? $percentage->total_weight_percent : $percentage->category_weight_percent;
													$usedQty = $usedQty * ($percent / 100);
												}


												// Fetch sales price for the ingredient from `purchase_details`
												$this->db->select('price, uom_id');
												$this->db->from('purchase_details');
												$this->db->join('ingredients', 'purchase_details.indredientid = ingredients.id', 'left');
												$this->db->join('unit_of_measurement', 'ingredients.uom_id = unit_of_measurement.id', 'left');
												$this->db->where('purchase_details.indredientid', $ingredientId);
												$purchaseDetail = $this->db->get()->row_array();


												// Print the SQL query
												// echo $this->db->last_query();
												// exit;

												$unitPrice = $purchaseDetail['price'] ?? 0;
												$usedSalesPrice = $usedQty * $unitPrice;

												// Fetch unit details
												$this->db->select('id, uom_name');
												$this->db->where('id', $purchaseDetail['uom_id']);
												$unit = $this->db->get('unit_of_measurement')->row_array();

												$unitId = $unit['id'] ?? null;

												// Prepare data for insertion into `itxn`
												// $itxnData = [
												// 	'order_id' => $orderId,
												// 	'food_id' => $menuId,
												// 	'pvarient_id' => $production['pvarientid'],
												// 	'ingredient_id' => $ingredientId,
												// 	'used_qty' => $usedQty,
												// 	'used_sales_price' => $usedSalesPrice,
												// 	'unit_id' => $unitId,
												// 	'created_at' => date('Y-m-d')
												// ];
												// Insert record into `itxn` table
												// $this->db->insert('itxn', $itxnData);
												// echo "<pre>";
												// print_r($purchaseDetail);
												// echo "</pre>";
												// echo "<br> ingredientId: " . $ingredientId;
												// echo "<br> usedQty: " . $usedQty;
												// $this->db->trans_rollback();
												// Step 5: Deduct used quantity from ingredients stock_qty
												$this->db->set('stock_qty', "GREATEST(stock_qty - {$usedQty}, 0)", false);
												$this->db->where('id', $ingredientId);
												$this->db->update('ingredients');
											}
											//stock checking and stock deducting function for food items [end] 9th May 2025
										} else {
											$d1=[
												'menu_id' => $cmv->menu_id,
												'variant_id' => $cmv->variant_id,
												'add_on_id' => $cmv->add_on_id,
												'modifier_groupid' => $cmv->modifier_groupid,
												'order_id' => $orderid,
												'foods_or_mods' => 2,
												'is_active' => 1,
												'created_at' => date('Y-m-d H:i:s')
											];
											$this->db->insert('ordered_menu_item_modifiers',$d1);
	
											//Modifiers stock adjustment [start]
											$this->db->select('add_ons.modifier_id, add_ons.is_food_item, add_ons.add_on_name');
											$this->db->from('add_ons');
											$this->db->where('add_ons.add_on_id', $cmv->add_on_id);
									
											$query = $this->db->get();
											$modIngrdId = $query->row();
											if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 2){
												// Ingredients
												
												// $this->db->select('stock_qty');
												// $this->db->from('ingredients');
												// $this->db->where('id', $modIngrdId->modifier_id);
												$this->db->select('ing.stock_qty, adding.modifier_ingr_adj_qty');
												$this->db->from('ingredients ing');
												$this->db->join('add_on_ingr_dtls adding', 'ing.id=adding.modifier_ingr_id', 'LEFT');
												$this->db->where('adding.modifier_ingr_id', $modIngrdId->modifier_id);
												$this->db->where('adding.add_on_id', $cmv->add_on_id);
												$this->db->where('adding.modifier_set_id', $cmv->modifier_groupid);
	
												$q1 = $this->db->get();
												$ingredQty = $q1->row();
												// echo "<pre>";
												// print_r($ingredQty);
												// echo "</pre>";
												// echo "<br> ingredientId: " . $modIngrdId->modifier_id;
												// echo "<br> add_on_id: " . $cmv->add_on_id;

												$prev_qty = $ingredQty->stock_qty;
												// $deduc_qty = $prev_qty * 0.6;
												$updated_qty = ($prev_qty - $ingredQty->modifier_ingr_adj_qty);
												// $updated_qty = ($prev_qty - $deduc_qty);
												$upData = [
													'stock_qty' => $updated_qty
												];
												$this->db->where('id',$modIngrdId->modifier_id)
													->update('ingredients',$upData);
											} else {
												if($modIngrdId->modifier_id != 0 && $modIngrdId->is_food_item == 1){
													//Food Item
													$this->db->select('ing.id, ing.stock_qty, adding.modifier_ingr_adj_qty');
													$this->db->from('ingredients ing');
													$this->db->join('add_on_ingr_dtls adding', 'ing.id=adding.modifier_ingr_id', 'INNER');
													$this->db->where('adding.modifier_foodid', $modIngrdId->modifier_id);
													$this->db->where('adding.add_on_id', $cmv->add_on_id);
													$this->db->where('adding.modifier_set_id', $cmv->modifier_groupid);
	
													$q2 = $this->db->get();
													$ingredStockQty = $q2->result();
													
													if (count($ingredStockQty)>0) {
														foreach ($ingredStockQty as $igsk => $igsv) {
															if ($igsv->stock_qty < $igsv->modifier_ingr_adj_qty) {
																// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' doesn\'t have sufficient stock!!!');
																// redirect("ordermanage/order/pos_invoice");
																// echo "error";
																// exit;
															}
															$prev_qty = $igsv->stock_qty;
															$updated_qty = ($prev_qty - $igsv->modifier_ingr_adj_qty);
															$upData = [
																'stock_qty' => $updated_qty
															];
															$this->db->where('id',$igsv->id)
																->update('ingredients',$upData);
														}
													} 
													else {
														// $this->session->set_flashdata('exception', 'The modifier '.$modIngrdId->add_on_name.' can\'t be added!!!');
														// redirect("ordermanage/order/pos_invoice");
														// echo "error";
														// exit;
													}
												}
											}
											//Modifiers stock adjustment [end]
										}
									}
								}
								$this-> db-> where('tr_row_id', $cv['rowid']);
								$this-> db-> delete('cart_selected_modifiers');
							}
						}
					}
					//Modifiers records are being added [end]
					$this->cart->destroy();
					$this->db->where('reserveid', $this->input->post('reserveid', true));
					$this->db->update('tblreservation', array('status' => 3));
					if ($paymentsatus == 5) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else if ($paymentsatus == 3) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else if ($paymentsatus == 2) {
						redirect('ordermanage/order/paymentgateway/' . $orderid . '/' . $paymentsatus);
					} else {
						if ($isonline == 1) {
							$this->session->set_flashdata('message', display('order_successfully'));
							redirect('ordermanage/order/pos_invoice');
						} else {
							if ($value == 1) {
								echo $orderid;
								exit;
							} else {
								$view = $this->postokengenerate($orderid, 0);
								echo $view; //work
								exit;
							}
						}
					}
				} else {
					if ($isonline == 1) {
						$this->session->set_flashdata('exception',  display('please_try_again'));
						redirect("ordermanage/order/pos_invoice");
					} else {
						echo "error";
					}
				}
			} else {
				if ($isonline == 1) {
					$this->session->set_flashdata('exception',  'Please add Some food!!');
					redirect("ordermanage/order/pos_invoice");
				} else {
					echo "error";
				}
			}
		} else {
			$this->permission->method('ordermanage', 'read')->redirect();
			if ($isonline == 1) {
				$data['categorylist']   = $this->order_model->category_dropdown();
				$data['curtomertype']   = $this->order_model->ctype_dropdown();
				$data['waiterlist']     = $this->order_model->waiter_dropdown();
				$data['tablelist']      = $this->order_model->table_dropdown();
				$data['customerlist']   = $this->order_model->customer_dropdown();
				$settinginfo = $this->order_model->settinginfo();
				$data['settinginfo'] = $settinginfo;
				$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

				$data['module'] = "ordermanage";
				$data['page']   = "posorder";
				echo Modules::run('template/layout', $data);
			} else {
				echo "error";
			}
		}
		
		// $this->db->trans_rollback();
	}
	public function orderlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('order_list');
		$saveid = $this->session->userdata('id');
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('ordermanage/order/orderlist');
		$config["total_rows"]  = $this->order_model->count_order();
		$config["per_page"]    = 25;
		$config["uri_segment"] = 4;
		$config["last_link"] = display('sLast');
		$config["first_link"] = display('sFirst');
		$config['next_link'] = display('sNext');
		$config['prev_link'] = display('sPrevious');
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
		$data["iteminfo"] = $this->order_model->orderlist($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		$settinginfo = $this->order_model->settinginfo();
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "orderlist";
		echo Modules::run('template/layout', $data);
	}
	public function allorderlist()
	{

		$list = $this->order_model->get_allorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			$no++;
			$row = array();
			if ($rowdata->order_status == 1) {
				$status = display('pending');
			}
			if ($rowdata->order_status == 2) {
				$status = display('processing');
			}
			if ($rowdata->order_status == 3) {
				$status = "Ready";
			}
			if ($rowdata->order_status == 4) {
				$status = display('served');
			}
			if ($rowdata->order_status == 5) {
				$status = display('cancel');
			}
			$newDate = date("d-M-Y", strtotime($rowdata->order_date));
			$update = '';
			$posprint = '';
			$details = '';
			$paymentbtn = '';
			$cancelbtn = '';
			$acptreject = '';
			$margeord = '';
			$printmarge = '';
			$split = '';
			$ptype = $this->db->select("bill_status")->from('bill')->where('order_id', $rowdata->order_id)->get()->row();


			if ($this->permission->method('ordermanage', 'read')->access()):
				$details = '<a href="' . base_url() . 'ordermanage/order/orderdetails/' . $rowdata->order_id . '" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Details"><i class="fa fa-eye"></i></a>&nbsp;';
			endif;
			if ($rowdata->splitpay_status == 1):
				$split = '<a href="javascript:;" onclick="showsplit(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Update" id="table-split-' . $rowdata->order_id . '">' . display('split') . '</a>&nbsp;&nbsp;';
			endif;
			if ($this->permission->method('ordermanage', 'read')->access()):
				if (($rowdata->order_status != 5 && $rowdata->orderacceptreject != 1) && ($rowdata->cutomertype == 2 || $rowdata->cutomertype == 99)) {
					$acptreject = '&nbsp;<a href="javascript:;" id="accepticon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" data-type="' . $ptype->bill_status . '" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-info-circle"></i></a>&nbsp;';
				}
				if ($rowdata->order_status == 1 || $rowdata->order_status == 2 || $rowdata->order_status == 3) {
					$cancelbtn = '&nbsp;<a href="javascript:;" id="cancelicon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" data-type="' . $ptype->bill_status . '" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-trash-o"></i></a>&nbsp;';
					$update = '<a href="' . base_url() . 'ordermanage/order/otherupdateorder/' . $rowdata->order_id . '" class="btn btn-xs btn-info btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;';
				}
				$posprint = '<a href="javascript:;" onclick="printPosinvoice(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="' . display('pos_invoice') . '"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>&nbsp;';
				if (!empty($rowdata->marge_order_id)) {
					$printmarge = '<a href="javascript:;" onclick="printmergeinvoice(\'' . base64_encode($rowdata->marge_order_id) . '\')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Merge Invoice"><i class="fa fa-meetup" aria-hidden="true"></i></a>';
				}
			endif;
			if ($this->permission->method('ordermanage', 'read')->access()) {
				if ($ptype->bill_status == 0  && $rowdata->orderacceptreject != 0) {
					$margeord = '<a href="javascript:;" onclick="createMargeorder(' . $rowdata->order_id . ',1)" id="hidecombtn_' . $rowdata->order_id . '" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Make Payment"><i class="fa fa-window-restore" aria-hidden="true"></i></a>&nbsp;';
				}
			}

			$row[] = $no;
			$row[] = $rowdata->order_id;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->fullname;
			$row[] = $rowdata->tablename;
			$row[] = $status;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] = $acptreject . $cancelbtn . $update . $details . $margeord . $posprint . $printmarge . $split;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->order_model->count_allorder(),
			"recordsFiltered" => $this->order_model->count_filterallorder(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function todayallorder()
	{

		$list = $this->order_model->get_completeorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			$no++;
			$row = array();
			$update = '';
			$details = '';
			$print = '';
			$posprint = '';
			$split = '';
			$kot = '';
			if ($this->permission->method('ordermanage', 'update')->access()):
				$update = '<a href="javascript:;" onclick="editposorder(' . $rowdata->order_id . ',2)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Update" id="table-today-' . $rowdata->order_id . '"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
			endif;
			if ($rowdata->splitpay_status == 1):
				$split = '<a href="javascript:;" onclick="showsplit(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Update" id="table-split-' . $rowdata->order_id . '">' . display('split') . '</a>&nbsp;&nbsp;';
			endif;
			if ($this->permission->method('ordermanage', 'read')->access()):
				$details = '&nbsp;<a href="javascript:;" onclick="detailspop(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Details"><i class="fa fa-eye"></i></a>&nbsp;';
				$print = '<a href="javascript:;" onclick="pos_order_invoice(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Invoice"><i class="fa fa-window-restore"></i></a>&nbsp;';
				$posprint = '<a href="javascript:;" onclick="pospageprint(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="' . display('pos_invoice') . '"><i class="fa fa-window-maximize"></i></a>';
				$kot = '<a href="javascript:;" onclick="postokenprint(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="KOT"><i class="fa fa-print"></i></a>';
			endif;

			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->customer_type;
			$row[] = $rowdata->first_name . $rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] = $update . $print . $posprint . $details . $split . $kot;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->order_model->count_alltodayorder(),
			"recordsFiltered" => $this->order_model->count_filtertorder(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function notification()
	{
		$tdata = date('Y-m-d');
		$notify = $this->db->select("*")->from('customer_order')->where('cutomertype', 2)->where('order_date', $tdata)->where('nofification', 0)->get()->num_rows();

		$data = array(
			'unseen_notification'  => $notify
		);
		echo json_encode($data);
	}
	public function notificationqr()
	{
		$tdata = date('Y-m-d');
		$notify = $this->db->select("*")->from('customer_order')->where('cutomertype', 99)->where('order_date', $tdata)->where('nofification', 0)->get()->num_rows();

		$data = array(
			'unseen_notificationqr'  => $notify
		);
		echo json_encode($data);
	}
	public function acceptnotify()
	{
		$status = $this->input->post('status');
		$orderid = $this->input->post('orderid');
		$acceptreject = $this->input->post('acceptreject', true);
		$reason = $this->input->post('reason', true);
		$onprocesstab = $this->input->post('onprocesstab', true);
		$orderinfo = $this->db->select("*")->from('customer_order')->where('order_id', $orderid)->get()->row();
		$customerinfo = $this->db->select("*")->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		if ($acceptreject == 1) {
			$mymsg = "You Order is Accepted";
			$bodymsg = display('ordid') . $orderid . " Order amount:" . $orderinfo->totalamount;
			$orderstatus = $this->db->select('order_status,cutomertype,saleinvoice,order_date,customer_id')->from('customer_order')->where('order_id', $orderid)->get()->row();
			if ($orderstatus->order_status == 4) {
				$this->removeformstock($orderid);
				if ($orderstatus->cutomertype == 2) {
					$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
					$finalill = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
					$headn = $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name;
					$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
					$customer_headcode = $coainfo->HeadCode;
					if ($finalill->payment_method_id == 4) {
						$headcode = 1020101;
					} else {
						$paytype = $this->db->select('payment_method')->from('payment_method')->where('payment_method_id', $finalill->payment_method_id)->get()->row();
						$coacode = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $paytype->payment_method)->get()->row();
						$headcode = $coacode->HeadCode;
					}
					$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
					if ($isvatinclusive->isvatinclusive == 1) {
						$isvatin = 1;
						$finalbillamnt = $finalill->bill_amount - $finalill->VAT;
					} else {
						$finalbillamnt = $finalill->bill_amount;
						$isvatin = 0;
					}

					$invoice_no = $orderinfo->saleinvoice;
					$saveid = $this->session->userdata('id');
					//Customer debit for Product Value
					$cosdr = array(
						'VNo'            =>  $invoice_no,
						'Vtype'          =>  'CIV',
						'VDate'          =>  $orderinfo->order_date,
						'COAID'          =>  $customer_headcode,
						'Narration'      =>  'Customer debit for Product Invoice#' . $invoice_no,
						'Debit'          =>  $finalbillamnt,
						'Credit'         =>  0,
						'StoreID'        =>  0,
						'IsPosted'       => 1,
						'CreateBy'       => $saveid,
						'CreateDate'     => $orderinfo->order_date,
						'IsAppove'       => 1
					);
					$this->db->insert('acc_transaction', $cosdr);
					//Store credit for Product Value
					$sc = array(
						'VNo'            =>  $invoice_no,
						'Vtype'          =>  'CIV',
						'VDate'          =>  $orderinfo->order_date,
						'COAID'          =>  10107,
						'Narration'      =>  'Inventory Credit for Product Invoice#' . $invoice_no,
						'Debit'          =>  0,
						'Credit'         =>  $finalbillamnt,
						'StoreID'        =>  0,
						'IsPosted'       => 1,
						'CreateBy'       => $saveid,
						'CreateDate'     => $orderinfo->order_date,
						'IsAppove'       => 1
					);
					$this->db->insert('acc_transaction', $sc);

					// Customer Credit for paid amount.
					$cc = array(
						'VNo'            =>  $invoice_no,
						'Vtype'          =>  'CIV',
						'VDate'          =>  $orderinfo->order_date,
						'COAID'          =>  $customer_headcode,
						'Narration'      =>  'Customer Credit for Product Invoice#' . $invoice_no,
						'Debit'          =>  0,
						'Credit'         =>  $finalbillamnt,
						'StoreID'        =>  0,
						'IsPosted'       => 1,
						'CreateBy'       => $saveid,
						'CreateDate'     => $orderinfo->order_date,
						'IsAppove'       => 1
					);
					$this->db->insert('acc_transaction', $cc);

					//Cash In hand Debit for paid value
					$cdv = array(
						'VNo'            =>  $invoice_no,
						'Vtype'          =>  'CIV',
						'VDate'          =>  $orderinfo->order_date,
						'COAID'          =>  $headcode,
						'Narration'      =>  'Cash in hand Debit For Invoice#' . $invoice_no,
						'Debit'          =>  $finalbillamnt,
						'Credit'         =>  0,
						'StoreID'        =>  0,
						'IsPosted'       =>  1,
						'CreateBy'       => $saveid,
						'CreateDate'     => $orderinfo->order_date,
						'IsAppove'       => 1
					);
					$this->db->insert('acc_transaction', $cdv);
					// Income for company							 
					$income = array(
						'VNo'            => "Sale" . $orderinfo->saleinvoice,
						'Vtype'          => 'Sales Products',
						'VDate'          =>  $orderinfo->order_date,
						'COAID'          => 303,
						'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
						'Debit'          => 0,
						'Credit'         => $finalill->bill_amount - $finalill->VAT, //purchase price asbe
						'IsPosted'       => 1,
						'CreateBy'       => $saveid,
						'CreateDate'     => $orderinfo->order_date,
						'IsAppove'       => 1
					);
					$this->db->insert('acc_transaction', $income);

					// Tax Pay for company	
					if ($isvatin != 1) {
						$income = array(
							'VNo'            => "Sale" . $orderinfo->saleinvoice,
							'Vtype'          => 'Sales Products Vat',
							'VDate'          =>  $orderinfo->order_date,
							'COAID'          => 502030101,
							'Narration'      => 'Sale TAX For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
							'Debit'          => $finalill->VAT,
							'Credit'         => 0,
							'IsPosted'       => 1,
							'CreateBy'       => $saveid,
							'CreateDate'     => $orderinfo->order_date,
							'IsAppove'       => 1
						);
						$this->db->insert('acc_transaction', $income);
					}
					$updatetDatakitchen = array('order_status' => 1);
					$this->db->where('order_id', $orderid);
					$this->db->update('customer_order', $updatetDatakitchen);
				}
			}
		} else {
			$mymsg = "You Order is Rejected";
			$bodymsg = display('ordid') . $orderid . " Rejeceted with due Reason:" . $orderinfo->anyreason;
			if (!empty($orderinfo->marge_order_id)) {
				$margecancel = array('marge_order_id' => NULL);
				$this->db->where('order_id', $orderid);
				$this->db->update('customer_order', $margecancel);
			}
		}
		if ($acceptreject == 1) {
			$onlinebill = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
			if ($onlinebill->payment_method_id == 1 && $onlinebill->payment_method_id == 4) {
				$updatetData = array('anyreason' => $reason, 'nofification' => $status, 'orderacceptreject' => $acceptreject, 'order_status' => 2);
			} else {
				$updatetData = array('anyreason' => $reason, 'nofification' => $status, 'orderacceptreject' => $acceptreject);
			}
		} else {
			$updatetData = array('anyreason' => $reason, 'order_status' => 5, 'nofification' => $status, 'orderacceptreject' => 0);
			$taxinfos = $this->taxchecking();
			if (!empty($taxinfos)) {
				$this->db->where('relation_id', $orderid);
				$this->db->delete('tax_collection');
			}
		}
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData);
		/*PUSH Notification For Customer*/
		$icon = base_url('assets/img/applogo.png');
		$content = array(
			"en" => $bodymsg,
		);
		$title = array(
			"en" => $mymsg,
		);
		$fields = array(
			'app_id' => "208455d9-baca-4ed2-b6be-12b466a2efbd",
			'include_player_ids' => array($customerinfo->customer_token),
			'data' => array(
				'type' => "order place",
				'logo' => $icon
			),
			'contents' => $content,
			'headings' => $title,
		);

		$fields = json_encode($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);
		curl_close($ch);
		if ($onprocesstab == 1) {
			$data['ongoingorder']  = $this->order_model->get_ongoingorder();
			$data['module'] = "ordermanage";
			$data['page']   = "updateorderlist";
			$this->load->view('ordermanage/ongoingorder', $data);
		}
	}
	public function cancelitem()
	{
		$taxinfos = $this->taxchecking();
		$orderid = $this->input->post('orderid');
		$itemid = $this->input->post('item', true);
		$varient = $this->input->post('varient', true);
		$kid = $this->input->post('kid', true);
		$reason = $this->input->post('reason', true);
		$orderinfo = $this->db->select("*")->from('customer_order')->where('order_id', $orderid)->get()->row();
		$setting = $this->db->select("*")->from('setting')->where('id', 2)->get()->row();
		if (!empty($taxinfos)) {
			$taxcolec = $this->db->select("*")->from('tax_collection')->where('relation_id', $orderid)->get()->row();
		}

		$itemids = explode(',', $itemid);
		$varientids = explode(',', $varient);
		$allfoods = "";
		$i = 0;
		foreach ($itemids as $sitem) {
			$vaids = $varientids[$i];
			$olditm = $this->db->select("*")->from('order_menu')->where('order_id', $orderid)->where('menu_id', $sitem)->where('varientid', $vaids)->get()->row();
			$foodname = $this->db->select("item_foods.*,variant.variantName,variant.price")->from('variant')->join('item_foods', 'item_foods.ProductsID=variant.menuid', 'left')->where('variant.variantid', $vaids)->get()->row();
			$iteminfo = $this->order_model->getiteminfo($sitem);

			if ($olditm->price > 0) {
				$foodprice = $olditm->price;
			} else {
				$foodprice = $foodname->price;
			}
			if ($foodname->OffersRate > 0) {
				$discount = $foodprice * $foodname->OffersRate / 100;
				$fprice = $foodprice - $discount;
			} else {
				$discount = 0;
				$fprice = $foodprice;
			}
			$pvat = 0;
			if (!empty($taxinfos)) {
				$tx = 0;
				$multiplletax = array();
				foreach ($taxinfos as $taxinfo) {
					$fildname = 'tax' . $tx;
					if (!empty($iteminfo->$fildname)) {
						$vatcalc = $fprice * $iteminfo->$fildname / 100;
					} else {
						$vatcalc = $fprice * $taxinfo['default_value'] / 100;
					}
					$updatetax = array($fildname => $taxcolec->$fildname - $vatcalc);
					$this->db->where('relation_id', $orderid);
					$this->db->update('tax_collection', $updatetax);
					$pvat = $pvat + $vatcalc;
					$vatcalc = 0;
					$tx++;
				}
			} else {
				$vatcalc = $fprice * $iteminfo->productvat / 100;
				$pvat = $pvat + $vatcalc;
			}
			$anonsfprm = 0;
			$adtvat = 0;
			if (!empty($olditm->add_on_id)) {
				if (!empty($taxinfos)) {
					$addonsarray = explode(',', $olditm->add_on_id);
					$addonsqtyarray = explode(',', $olditm->addonsqty);
					$getaddonsdatas = $this->db->select('*')->from('add_ons')->where_in('add_on_id', $addonsarray)->get()->result_array();
					$addn = 0;
					foreach ($getaddonsdatas as $getaddonsdata) {
						$tax1 = 0;
						foreach ($taxinfos as $taxainfo) {
							$fildaname = 'tax' . $tax1;
							if (!empty($getaddonsdata[$fildaname])) {
								$avatcalc = ($getaddonsdata['price'] * $addonsqtyarray[$addn]) * $getaddonsdata[$fildaname] / 100;
								$avtax = $taxcolec->$fildname - $avatcalc;
								$addonsupdatetax = array($fildname => $avtax);
								$this->db->where('relation_id', $orderid);
								$this->db->update('tax_collection', $addonsupdatetax);
							} else {
								$avatcalc = ($getaddonsdata['price'] * $addonsqtyarray[$addn]) * $taxainfo['default_value'] / 100;
								$avtax = $taxcolec->$fildname - $avatcalc;
								$addonsupdatetax = array($fildname => $avtax);
								$this->db->where('relation_id', $orderid);
								$this->db->update('tax_collection', $addonsupdatetax);
							}


							$adtvat =  $adtvat + $avatcalc;
							$tax1++;
						}
						$addonsprm = $getaddonsdata['price'] * $addonsqtyarray[$addn];
						$anonsfprm = $addonsprm + $anonsfprm;
						$addn++;
					}
				}
			}

			$allfoods .= $foodname->ProductName . ' Varient: ' . $foodname->variantName . ",";
			$this->db->where('order_id', $orderid)->where('menu_id', $sitem)->where('varientid', $vaids)->delete('order_menu');

			$finalbillinfo = $this->db->select("*")->from('bill')->where('order_id', $orderid)->get()->row();


			if ($setting->service_chargeType == 1) {
				//$subtotal = $finalbillinfo->total_amount - ($fprice + $anonsfprm);
				$subtotal = $finalbillinfo->total_amount - $anonsfprm;
				$fsd = $subtotal * $setting->servicecharge / 100;
			} else {
				//$subtotal = $finalbillinfo->total_amount - ($fprice + $anonsfprm);
				$subtotal = $finalbillinfo->total_amount - $anonsfprm;
				$fsd = $setting->servicecharge;
			}

			if (empty($taxinfos)) {
				if ($settinginfo->vat > 0) {
					$calvat = $itemtotal * $settinginfo->vat / 100;
				} else {
					$calvat = $pvat;
				}
			} else {
				$calvat = $pvat;
			}
			$fvat = $finalbillinfo->VAT - ($calvat + $adtvat);
			$grdiscount = $finalbillinfo->discount - $discount;
			//$fbillamount = $subtotal + $fvat + $fsd - $grdiscount;
			$fbillamount = $subtotal; // Only Food Item Price show in cancel item
			$updatebill = array('total_amount' => $subtotal, 'discount' => $grdiscount, 'service_charge' => $fsd, 'VAT' => $fvat, 'bill_amount' => $fbillamount);

			$this->db->where('order_id', $orderid);
			$this->db->update('bill', $updatebill);

			$updateorderinfo = array('totalamount' => $fbillamount);
			$this->db->where('order_id', $orderid);
			$this->db->update('customer_order', $updateorderinfo);

			$i++;
		}
		$allfoods = trim($allfoods, ',');
		$customerinfo = $this->db->select("*")->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		$mymsg = "You Item is Rejected";
		$bodymsg = display('ordid') . $orderid . " Item Name: " . $allfoods . " Rejeceted with due Reason:" . $reason;
		/*PUSH Notification For Customer*/
		$icon = base_url('assets/img/applogo.png');
		$content = array(
			"en" => $bodymsg,
		);
		$title = array(
			"en" => $mymsg,
		);
		$fields = array(
			'app_id' => "208455d9-baca-4ed2-b6be-12b466a2efbd",
			'include_player_ids' => array($customerinfo->customer_token),
			'data' => array(
				'type' => "order place",
				'logo' => $icon
			),
			'contents' => $content,
			'headings' => $title,
		);

		$fields = json_encode($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);
		curl_close($ch);

		$afterorderinfo = $this->db->select("*")->from('order_menu')->where('order_id', $orderid)->get()->row();
		if (empty($afterorderinfo)) {
			$updatetData = array('anyreason' => "All item no available", 'order_status' => 5, 'nofification' => 1, 'orderacceptreject' => 0);
			$this->db->where('order_id', $orderid);
			$this->db->update('customer_order', $updatetData);
		}
		$alliteminfo = $this->order_model->customerorderkitchen($orderid, $kid);
		$singleorderinfo = $this->order_model->kitchen_ajaxorderinfoall($orderid);

		$data['orderinfo'] = $singleorderinfo;
		$data['kitchenid'] = $kid;
		$data['iteminfo'] = $alliteminfo;
		$data['module'] = "ordermanage";
		$data['page']   = "kitchen_view";
		$this->load->view('kitchen_view', $data);
	}

	public function printtoken()
	{

		$orderid = $this->input->post('orderid');
		$kid = $this->input->post('kid', true);
		$itemid = $this->input->post('itemid', true);
		$varient = $this->input->post('varient', true);
		$itemids = explode(',', $itemid);
		$varientids = explode(',', $varient);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$alliteminfo = $this->order_model->customerorderkitchen($orderid, $kid);
		$singleorderinfo = $this->order_model->kitchen_ajaxorderinfoall($orderid);
		$slitem = array_filter($itemids);
		if (!empty($slitem)) {
			$data['printitem'] = $this->order_model->customerprintkitchen($orderid, $kid, $itemids, $varientids);
		} else {
			$data['printitem'] = '';
		}
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $singleorderinfo->customer_id));
		if (!empty($singleorderinfo->table_no)) {
			$data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $singleorderinfo->table_no));
		} else {
			$data['tableinfo'] = '';
		}
		$data['orderinfo'] = $singleorderinfo;
		$data['kitchenid'] = $kid;
		$data['iteminfo'] = $alliteminfo;
		$data['allcancelitem'] = $this->order_model->customercancelkitchen($orderid, $kid);
		$data['module'] = "ordermanage";
		$data['page']   = "postoken3";
		$this->load->view('postoken3', $data);
	}

	public function onlinellorder()
	{
		$list = $this->order_model->get_completeonlineorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			if ($rowdata->bill_status == 1) {
				$paymentyst = display("paid");
			} else {
				$paymentyst = display("unpaid");
			}
			$no++;
			$row = array();
			$update = '';
			$print = '';
			$details = '';
			$paymentbtn = '';
			$cancelbtn = '';
			$rejectbtn = '';
			$posprint = '';
			$shipinfo == '';
			if (!empty($rowdata->shipping_type)) {
				$shipinfo = $this->order_model->read('*', 'shipping_method', array('ship_id' => $rowdata->shipping_type));
			}
			$shippingname = '';
			$shippingdate = '';
			if (!empty($shipinfo)) {
				$shippingname = $shipinfo->shipping_method;
				$shippingdate = $rowdata->shipping_date;
			}
			if ($this->permission->method('ordermanage', 'update')->access()):
				if ($rowdata->order_status != 5) {
					$update = '<a href="javascript:;" onclick="editposorder(' . $rowdata->order_id . ',3)" class="btn btn-xs btn-success btn-sm mr-1" id="table-today-online-' . $rowdata->order_id . '" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
				}
			endif;
			if ($this->permission->method('ordermanage', 'read')->access()):
				$details = '&nbsp;<a href="javascript:;" onclick="detailspop(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left"  title="" data-original-title="Details"><i class="fa fa-eye"></i></a>&nbsp;';
				$posprint = '<a href="javascript:;" onclick="pospageprint(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip"  data-placement="left" title="" data-original-title="' . display('pos_invoice') . '"><i class="fa fa-window-maximize"></i></a>';
			endif;
			if ($this->permission->method('ordermanage', 'delete')->access()):
				if ($rowdata->order_status != 5) {
					$rejectbtn = '<a href="javascript:;" id="cancelicon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" data-type="' . $rowdata->bill_status . '"  class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="' . display('cancel') . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;';
				}
				if ($rowdata->orderacceptreject == '') {
					$cancelbtn = '<a href="javascript:;" id="accepticon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" data-type="' . $rowdata->bill_status . '"  class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;';
				}
				if ($rowdata->bill_status == 0 && $rowdata->orderacceptreject != 0) {
					$paymentbtn = '<a href="javascript:;" onclick="createMargeorder(' . $rowdata->order_id . ',1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" id="table-today-online-accept-' . $rowdata->order_id . '" data-placement="left" title="" data-original-title="Make Payments"><i class="fa fa-window-restore"></i></a>&nbsp;';
				}
			endif;


			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $shippingname;
			$row[] = $shippingdate;
			$row[] = $rowdata->first_name . $rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $paymentyst;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] = $cancelbtn . $rejectbtn . $paymentbtn . $update . $posprint . $details;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->order_model->count_allonlineorder(),
			"recordsFiltered" => $this->order_model->count_filtertonlineorder(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function allqrorder()
	{
		$list = $this->order_model->get_qronlineorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			if ($rowdata->bill_status == 1) {
				$paymentyst = display("paid");
			} else {
				$paymentyst = display("unpaid");
			}
			$no++;
			$row = array();
			$update = '';
			$print = '';
			$details = '';
			$paymentbtn = '';
			$cancelbtn = '';
			$rejectbtn = '';
			$posprint = '';
			if ($this->permission->method('ordermanage', 'update')->access()):
				$update = '<a href="javascript:;" onclick="editposorder(' . $rowdata->order_id . ',4)" class="btn btn-xs btn-success btn-sm mr-1" id="table-today-online-' . $rowdata->order_id . '" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
			endif;
			if ($this->permission->method('ordermanage', 'read')->access()):
				$details = '&nbsp;<a onclick="detailspop(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-placement="left" title="" data-original-title="Details" data-toggle="modal" data-target="#orderdetailsp" data-dismiss="modal"><i class="fa fa-eye"></i></a>&nbsp;';
				$posprint = '<a href="javascript:;" onclick="pospageprint(' . $rowdata->order_id . ')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip"  data-placement="left" title="" data-original-title="' . display('pos_invoice') . '"><i class="fa fa-window-maximize"></i></a>';
			endif;
			if ($this->permission->method('ordermanage', 'delete')->access()):
				if ($rowdata->order_status != 5) {
					$rejectbtn = '<a href="javascript:;" id="cancelicon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="' . display('cancel') . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;';
				}
				if ($rowdata->orderacceptreject == '') {
					$cancelbtn = '<a href="javascript:;" id="accepticon_' . $rowdata->order_id . '" data-id="' . $rowdata->order_id . '" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;';
				}
				if ($rowdata->bill_status == 0 && $rowdata->orderacceptreject != 0) {
					$paymentbtn = '<a href="javascript:;" onclick="createMargeorder(' . $rowdata->order_id . ',1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" id="table-today-online-accept-' . $rowdata->order_id . '" data-placement="left" title="" data-original-title="Make Payments"><i class="fa fa-window-restore"></i></a>&nbsp;';
				}
			endif;


			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = "QR Customer";
			$row[] = $rowdata->first_name . $rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $paymentyst;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] = $cancelbtn . $rejectbtn . $paymentbtn . $update . $posprint . $details;
			$row[] = $rowdata->isupdate;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->order_model->count_allqrorder(),
			"recordsFiltered" => $this->order_model->count_filtertqrorder(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function pendingorder()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('pending_order');
		$saveid = $this->session->userdata('id');

		$status = 1;
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('ordermanage/order/orderlist');
		$config["total_rows"]  = $this->order_model->count_canorder($status);
		$config["per_page"]    = 25;
		$config["uri_segment"] = 4;
		$config["last_link"] = display('sLast');
		$config["first_link"] = display('sFirst');
		$config['next_link'] = display('sNext');
		$config['prev_link'] = display('sPrevious');
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
		$data["iteminfo"] = $this->order_model->pendingorder($config["per_page"], $page, $status);
		$data["links"] = $this->pagination->create_links();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data["links"] = '';
		$data['pagenum'] = 0;
		$data['module'] = "ordermanage";
		$data['page']   = "pendingorder";
		echo Modules::run('template/layout', $data);
	}
	public function processing()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('processing_order');
		$saveid = $this->session->userdata('id');
		$status = 2;
		$data['iteminfo']      = $this->order_model->pendingorder($status);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = display('processing');
		echo Modules::run('template/layout', $data);
	}
	public function completelist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('complete_order');
		$saveid = $this->session->userdata('id');
		$status = 1;
		$config["base_url"] = base_url('ordermanage/order/completelist');
		$config["total_rows"]  = $this->order_model->count_comorder($status);
		$config["per_page"]    = 25;
		$config["uri_segment"] = 4;
		$config["last_link"] = display('sLast');
		$config["first_link"] = display('sFirst');
		$config['next_link'] = display('sNext');
		$config['prev_link'] = display('sPrevious');
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
		$data["iteminfo"] = $this->order_model->completeorder($config["per_page"], $page, $status);
		$data["links"] = $this->pagination->create_links();
		$data['taxinfos'] = $this->taxchecking();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['module'] = "ordermanage";
		$data['page']   = "pendingorder";
		echo Modules::run('template/layout', $data);
	}
	public function cancellist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('cancel_order');
		$saveid = $this->session->userdata('id');

		$status = 5;
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('ordermanage/order/orderlist');
		$config["total_rows"]  = $this->order_model->count_canorder($status);
		$config["per_page"]    = 25;
		$config["uri_segment"] = 4;
		$config["last_link"] = display('sLast');
		$config["first_link"] = display('sFirst');
		$config['next_link'] = display('sNext');
		$config['prev_link'] = display('sPrevious');
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
		$data["cancel_flag"] = $status;
		$data["iteminfo"] = $this->order_model->pendingorder($config["per_page"], $page, $status);
		$data["links"] = $this->pagination->create_links();
		$data['pagenum'] = $page;
		#
		#pagination ends
		# 
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "pendingorder";
		echo Modules::run('template/layout', $data);
	}
	public function updateorder($id)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');

		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		//fetch `ordered_menu_item_modifiers` table data based on order id `$id`
		$this->db->select('ordered_menu_item_modifiers.*');
		$this->db->from('ordered_menu_item_modifiers');
		$this->db->where('order_id', $id);
		$this->db->where('is_active', 1);
		$this->db->where('DATE(created_at)', date('Y-m-d'));
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data['ordered_menu_item_modifiers'] = $query->result();
		} else {
			$data['ordered_menu_item_modifiers'] = [];
		}

		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$data['categorylist']   = $this->order_model->category_dropdown();
		$data['allcategorylist']  = $this->order_model->allcat_dropdown();
		$data['customerlist']  = $this->order_model->customer_dropdown();
		$data['curtomertype']   = $this->order_model->ctype_dropdown();
		$data['waiterlist']     = $this->order_model->waiter_dropdown();
		$data['tablelist']      = $this->order_model->table_dropdown();
		$data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['itemlist']      =  $this->order_model->allfood2();
		$settinginfo 			= $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$this->load->view('updateorder', $data);
	}

	public function otherupdateorder($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');

		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		//fetch `ordered_menu_item_modifiers` table data based on order id `$id`
		$this->db->select('ordered_menu_item_modifiers.*');
		$this->db->from('ordered_menu_item_modifiers');
		$this->db->where('order_id', $id);
		$this->db->where('is_active', 1);
		// $this->db->where('DATE(created_at)', date('Y-m-d'));
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data['ordered_menu_item_modifiers'] = $query->result();
		} else {
			$data['ordered_menu_item_modifiers'] = [];
		}

		// echo "<pre>";
		// print_r($data['ordered_menu_item_modifiers']);
		// echo "</pre>";
		// exit;

		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$data['categorylist']   = $this->order_model->category_dropdown();
		$data['allcategorylist']  = $this->order_model->allcat_dropdown();
		$data['customerlist']  = $this->order_model->customer_dropdown();
		$data['curtomertype']   = $this->order_model->ctype_dropdown();
		$data['waiterlist']     = $this->order_model->waiter_dropdown();
		$data['tablelist']      = $this->order_model->table_dropdown();
		$data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['itemlist']      =  $this->order_model->allfood2();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		$data['taxinfos'] = $this->taxchecking();
		$mtype = $this->order_model->read('*', 'membership', array('id' =>  $data['customerinfo']->membership_type));
		$data['title'] = "posinvoiceloading2";
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderother";
		echo Modules::run('template/layout', $data);
	}
	public function modifyoreder()
	{
		$orderid                 = $this->input->post('updateid');
		$dataup['cutomertype']   = $this->input->post('ctypeid');
		$dataup['waiter_id']     = $this->input->post('waiter', true);
		$dataup['isthirdparty']  = $this->input->post('delivercom', true);
		$dataup['table_no']      = $this->input->post('tableid', true);
		$dataup['order_status']  = $this->input->post('orderstatus', true);
		$dataup['totalamount']   = $this->input->post('orginattotal', true);
		$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
		if ($isvatinclusive->isvatinclusive == 1) {
			$dataup['totalamount'] = $this->input->post('orginattotal') - $this->input->post('vat');
		} else {
			$dataup['totalamount'] = $this->input->post('orginattotal');
		}

		$updared = $this->order_model->update_info('customer_order', $dataup, 'order_id', $orderid);
		$taxinfos = $this->taxchecking();
		if (!empty($taxinfos)) {
			$multiplletaxvalue = $this->input->post('multiplletaxvalue', true);
			$multiplletaxdata = unserialize($multiplletaxvalue);

			$updared = $this->order_model->update_info('tax_collection', $multiplletaxdata, 'relation_id', $orderid);
		}
		$this->order_model->payment_info($orderid);

		$logData = array(
			'action_page'         => display('pending_order'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Pending Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		$this->logs_model->log_recorded($logData);

		$this->session->set_flashdata('message', display('update_successfully'));

		$successfull =  array('success' => 'success', 'msg' => display('update_successfully'), 'orderid' => $orderid, 'tokenmsg' => display('do_print_token'));
		echo json_encode($successfull);
		exit;

		redirect("ordermanage/order/pos_invoice/" . $orderid);
	}
	public function ajaxupdateoreder()
	{
		$orderid                 = $this->input->post('orderid');
		$status                 = $this->input->post('status', true);

		$this->order_model->payment_info($orderid);

		$logData = array(
			'action_page'         => display('order_list'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		$this->logs_model->log_recorded($logData);
		$this->session->set_flashdata('message', display('update_successfully'));
		redirect("ordermanage/order/updateorder/" . $orderid);
	}


	public function changestatus()
	{
		$orderid                 = $this->input->post('orderid');
		$status                 = $this->input->post('status', true);
		$paytype                 = $this->input->post('paytype', true);
		$cterminal                 = $this->input->post('cterminal', true);
		$mybank                  = $this->input->post('mybank', true);
		$mydigit                 = $this->input->post('mydigit', true);
		$paidamount              = $this->input->post('paid', true);

		$orderinfo = $this->order_model->uniqe_order_id($orderid);

		$duevalue = (round($orderinfo->totalamount) - $orderinfo->customerpaid);
		if ($paidamount == $duevalue || $duevalue <  $paidamount) {
			$paidamount  = $paidamount + $orderinfo->customerpaid;
			$status = 4;
		} else {
			$paidamount  = $paidamount + $orderinfo->customerpaid;

			$status = 3;
		}

		$updatetData = array(
			'order_status'     => $status,
		);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData);
		//Update Bill Table
		$updatetbill = array(
			'bill_status'           => 1,
			'payment_method_id'     => $paytype,
		);
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetbill);
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
		if (!empty($billinfo)) {
			$billid = $billinfo->bill_id;
			if ($paidamount >= 0) {
				$paidData = array(
					'customerpaid'     => $paidamount
				);
				$this->db->where('order_id', $orderid);
				$this->db->update('customer_order', $paidData);
			} else {
				$paidData = array(
					'customerpaid'     => $billinfo->bill_amount
				);
				$this->db->where('order_id', $orderid);
				$this->db->update('customer_order', $paidData);
			}
			if ($paytype == 1) {
				$billpayment = $this->db->select('*')->from('bill_card_payment')->where('bill_id', $billid)->get()->row();
				if (!empty($billpayment)) {
					$updatetcardinfo = array(
						'card_no'           => $mydigit,
						'terminal_name'     => $cterminal,
						'bank_name'         => $mybank
					);

					$this->db->where('bill_id', $billid);
					$this->db->update('bill_card_payment', $updatetcardinfo);
				} else {
					$cardinfo = array(
						'bill_id'			    =>	$billid,
						'card_no'		        =>	$mydigit,
						'terminal_name'		    =>	$cterminal,
						'bank_name'	            =>	$mybank,
					);

					$this->db->insert('bill_card_payment', $cardinfo);
				}
			}
		}
		if ($status == 4) {
			$customerinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $billinfo->customer_id)->get()->row();
		}
		$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $orderid)->get()->row();
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();

		$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
		if ($isvatinclusive->isvatinclusive == 1) {
			$isvatin = 1;
			$finalbillamnt = $billinfo->bill_amount - $billinfo->VAT;
		} else {
			$finalbillamnt = $billinfo->bill_amount;
			$isvatin = 0;
		}
		// Income for company
		$saveid = $this->session->userdata('id');
		$income = array(
			'VNo'            => $orderinfo->saleinvoice,
			'Vtype'          => 'Sales Products',
			'VDate'          =>  $orderinfo->order_date,
			'COAID'          => 303,
			'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
			'Debit'          => 0,
			'Credit'         => $finalbillamnt, //purchase price asbe
			'IsPosted'       => 1,
			'CreateBy'       => $saveid,
			'CreateDate'     => $orderinfo->order_date,
			'IsAppove'       => 1
		);
		$this->db->insert('acc_transaction', $income);
		$logData = array(
			'action_page'         => display('order_list'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		$this->logs_model->log_recorded($logData);
		$data['ongoingorder']  = $this->order_model->get_ongoingorder();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";
		$view = $this->posprintdirect($orderid);

		echo $view;
		exit;
		$this->load->view('ordermanage/ongoingorder', $data); //work
	}
	public function posprintview($id)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $data['billinfo']->create_by));
		$settinginfo = $this->order_model->settinginfo();
		if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
			$updatetData = array('invoiceprint' => 2);
			$this->db->where('order_id', $id);
			$this->db->update('customer_order', $updatetData);
		}
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		$data['selectedFoodsForCart']=$selectedFoodsForCart;
		$data['orderedMods']=$orderedMods;
		$this->load->view('posinvoiceview', $data);
	}
	public function onprocessajax()
	{
		$data['ongoingorder']  = $this->order_model->get_ongoingorder();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";
		$this->load->view('ordermanage/ongoingorder', $data);
	}

	public function deletetocart()
	{
		$rowid = $this->input->post('mid');
		$orderid = $this->input->post('orderid');
		$pid = $this->input->post('pid', true);
		$vid = $this->input->post('vid', true);
		$qty = $this->input->post('qty', true);
		$this->order_model->cartitem_delete($rowid, $orderid);
		$checkcancelitem = $this->order_model->check_cancelitem($orderid, $pid, $vid);
		if (empty($checkcancelitem)) {
			$datacancel = array(
				'orderid'			    =>	$orderid,
				'foodid'		        =>	$pid,
				'quantity'	        	=>	$qty,
				'varientid'		    	=>	$vid,
			);
			$this->db->insert('tbl_cancelitem', $datacancel);
		} else {
			$udatacancel = array(
				'quantity'       => $checkcancelitem->quantity + $qty,
			);
			$this->db->where('orderid', $orderid);
			$this->db->where('foodid', $pid);
			$this->db->where('varientid', $vid);
			$this->db->update('tbl_cancelitem', $udatacancel);
		}
		$iteminfo = $this->order_model->customerorder($orderid);
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['billinfo']	   = $this->order_model->billinfo($orderid);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$i = 0;
		$totalamount = 0;
		$subtotal = 0;
		foreach ($iteminfo as $item) {
			$adonsprice = 0;
			$discount = 0;
			$itemprice = $item->price * $item->menuqty;
			if (!empty($item->add_on_id)) {
				$addons = explode(",", $item->add_on_id);
				$addonsqty = explode(",", $item->addonsqty);
				$x = 0;
				foreach ($addons as $addonsid) {
					$adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
					$adonsprice = $adonsprice + $adonsinfo->price * $addonsqty[$x];
					$x++;
				}
				$nittotal = $adonsprice;
				$itemprice = $itemprice + $adonsprice;
			} else {
				$nittotal = 0;
			}
			$totalamount = $totalamount + $nittotal;
			$subtotal = $subtotal + $item->price * $item->menuqty;
		}
		$itemtotal = $totalamount + $subtotal;
		$calvat = $itemtotal * $settinginfo->vat / 100;
		$updatedprice = $calvat + $itemtotal - $discount;
		$postData = array(
			'order_id'        => $orderid,
			'totalamount'     => $updatedprice,
		);
		$this->order_model->update_order($postData);
		$data['orderinfo'] = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['iteminfo']  = $this->order_model->customerorder($orderid);
		$data['currency']  = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos']  = $this->taxchecking();
		$data['module']    = "ordermanage";
		$data['page']      = "updateorderlist";
		$data['orderid']   = $orderid;
		$this->load->view('ordermanage/updateorderlist', $data);
	}
	public function modifierCheck()
	{
		$group_id = $this->input->post('group_id', true);
		$addon_id = $this->input->post('addon_id', true);
		$pid = $this->input->post('pid', true);
		$menu_id = 0;
		$settinginfo = $this->order_model->settinginfo();
		$currency = $this->order_model->currencysetting($settinginfo->currency);
		//query to the add_ons table join with menu_add_on table on add_ons.modifier_id = menu_add_on.menu_id, where add_ons.food_or_mods = 1 and add_ons.add_on_id = $addon_id, join with modifier_groups on menu_add_on.modifier_groupid = modifier_groups.id, where modifier_groups.group_id = $group_id and add_ons.add_on_id = $addon_id, join with add_ons on add_ons.modifier_set_id = modifier_groups.id, and get all add ons data
		
		$this->db->select('a.modifier_id, a.is_food_item');
		$this->db->from('add_ons a');
		$this->db->where('a.is_food_item', 1);
		$this->db->where('a.add_on_id', $addon_id);
		$this->db->where('a.modifier_set_id', $group_id);
		$this->db->where('a.is_active', 1);

		$q1 = $this->db->get();
		if ($q1->num_rows() > 0) {
			$addons = $q1->row();
			$menu_id = $addons->modifier_id;
			// echo json_encode($addons);
			// exit;
		}

		if ($menu_id == 0) {
			// If no menu_id found, return empty response
			echo '0';
			exit;
		}

		//query to the add_ons table and get add_ons.*, join with modifier_groups on add_ons.modifier_set_id = modifier_groups.id, and get all add ons data, join menu_add_on table with modifier_groups on (menu_add_on.modifier_groupid = modifier_groups.id), where menu_add_on.menu_id = $menu_id.	
		$this->db->select('a.*, mg.name');
		$this->db->from('add_ons a');
		$this->db->join('modifier_groups mg', 'a.modifier_set_id = mg.id');
		$this->db->join('menu_add_on ma', 'ma.modifier_groupid = mg.id');
		// $this->db->where('a.is_food_item', 1);
		$this->db->where('ma.menu_id', $menu_id);
		$this->db->where('a.is_active', 1);
		$q2 = $this->db->get();
		$addons2 = $q2->result();

		// echo $this->db->last_query();
		// echo "<br />";
		// echo "<pre>";
		// print_r($addons2);
		// echo "</pre>";
		// exit;
		// return json_encode($addons2);
		$data = '';
		if ($q2->num_rows() > 0) {
			$data='
			<div class="panel-body">
                    <div class="mt-3">
                        <table class="table table-bordered">
                            <tbody>';
			foreach ($addons2 as $miv) {
			$data.= '<tr>
						<td style="width: 85%;">
							<label for="promo_sub_modifiers'.$miv->add_on_id.'" class="form-label">'.$miv->add_on_name.'</label>
						</td>
						<td style="width: 10%;text-align: end;">
							<label for="promo_sub_modifiers'.$miv->add_on_id.'" class="form-label">'.(($currency->position == 1) ? $currency->curr_icon : '').$miv->price.'</label>
						</td>
						<td style="width: 5%;" class="text-center">
							<div class="form-check">
								<input class="form-check-input modifier-checkbox" type="checkbox" name="promo_sub_modifiers[]" value="'.$miv->add_on_id.'" id="promo_sub_modifiers_'.$miv->add_on_id.'" data-group-id="'.$miv->modifier_set_id.'" data-pid="'.$pid.'" autocomplete="off">
							</div>
						</td>
					</tr>';
			}
			$data.= '</tbody>
                        </table>
                    </div>
					<div class="mt-3 text-right">
						<button class="btn btn-sm btn-success" onclick="selectMealDealSubMods('.$menu_id.');">Select</button>
						<button class="btn btn-sm btn-danger" onclick="$(\'#mealDealSubModListModal\').modal(\'hide\');">Cancel</button>
					</div>
                </div>
			';
		} else {
			echo '0';
			exit;
		}
		echo $data;
		exit;
	}
	public function addtocartupdate()
	{
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$totalvarient = $this->input->post('totalvarient', true);
		$customqty = $this->input->post('customqty', true);
		$isgroup = $this->input->post('isgroup', true);
		$itemname = $this->input->post('itemname', true);
		$size = $this->input->post('varientname', true);
		$qty = $this->input->post('qty', true);
		$price = $this->input->post('price', true);
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice', true);
		$adonsunitprice = $this->input->post('adonsunitprice', true);
		$adonsqty = $this->input->post('adonsqty', true);
		$adonsname = $this->input->post('adonsname', true);
		$orderid = $this->input->post('orderid');
		$data['paymentmethod'] = $this->order_model->pmethod_dropdown();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;


		$new_str = str_replace(',', '0', $addonsid);
		$new_str2 = str_replace(',', '0', $adonsqty);
		$uaid = $pid . $new_str . $sizeid;
		if (!empty($addonsid)) {
			$joinid = trim($addonsid, ',');

			$aids = $addonsid;
			$aqty = $adonsqty;
			$aname = $adonsname;
			$aprice = $adonsunitprice;
			$atprice = $allprice;
			$grandtotal = $price;
		} else {
			$grandtotal = $price;
			$aids = '';
			$aqty = '';
			$aname = '';
			$aprice = '';
		}
		if ($isgroup == 1) {
			$orderchecked = $this->order_model->check_ordergroup($orderid, $pid, $sizeid, $uaid);
			if (empty($orderchecked)) {
				$groupinfo = $this->db->select('*')->from('tbl_groupitems')->where('gitemid', $pid)->get()->result();
				foreach ($groupinfo as $grouprow) {
					$data3 = array(
						'order_id'				=>	$orderid,
						'menu_id'		        =>	$grouprow->items,
						'groupmid'		        =>	$pid,
						'menuqty'	        	=>	$grouprow->item_qty * $qty,
						'price'	       			=>  $price,
						'addonsuid'	        	=>	$uaid,
						'add_on_id'	        	=>	$aids,
						'addonsqty'	        	=>	$aqty,
						'varientid'		    	=>	$grouprow->varientid,
						'groupvarient'		    =>	$sizeid,
						'qroupqty'		    	=>	$qty,
						'isgroup'		    	=>	1,
						'isupdate'     			=> 1,
					);
					$this->order_model->new_entry($data3);
				}
			} else {
				$groupinfo = $this->db->select('*')->from('tbl_groupitems')->where('gitemid', $pid)->get()->result();
				foreach ($groupinfo as $grouprow) {
					$udata2 = array(
						'qroupqty'      => $qty,
						'add_on_id'     => $aids,
						'addonsqty'     => $aqty,
						'menuqty'       => $grouprow->item_qty * $qty,
					);
					$this->db->where('order_id', $orderid);
					$this->db->where('menu_id', $grouprow->items);
					$this->db->where('groupmid', $pid);
					$this->db->where('groupvarient', $sizeid);
					$this->db->where('varientid', $grouprow->varientid);
					$this->db->where('addonsuid', $uaid);
					$this->db->update('order_menu', $udata2);
				}
				$checkcancelitem = $this->order_model->check_cancelitem($orderid, $pid, $sizeid);

				$reqqty = $qty - $orderchecked->qroupqty;
				if ($reqqty > 0) {
					$data4 = array(
						'ordid'				  	=>	$orderid,
						'menuid'		        =>	$pid,
						'qty'	        	    =>	$qty - $orderchecked->qroupqty,
						'addonsid'	        	=>	$aids,
						'addonsuid'     		=>  $uaid,
						'adonsqty'	        	=>	$aqty,
						'varientid'		    	=>	$sizeid,
						'insertdate'		    =>	date('Y-m-d'),
					);
					$this->db->insert('tbl_updateitems', $data4);
					if (empty($checkcancelitem)) {
						$datacancel = array(
							'orderid'			    =>	$orderid,
							'foodid'		        =>	$pid,
							'quantity'	        	=>	$qty - $orderchecked->qroupqty,
							'varientid'		    	=>	$sizeid,
						);
						$this->db->insert('tbl_cancelitem', $datacancel);
					} else {
						$nqty = $qty - $orderchecked->qroupqty;
						$udatacancel = array(
							'quantity'       => $checkcancelitem->quantity + $nqty,
						);
						$this->db->where('orderid', $orderid);
						$this->db->where('foodid', $pid);
						$this->db->where('varientid', $sizeid);
						$this->db->update('tbl_cancelitem', $udatacancel);
					}
				}
			}
		} else {
			$orderchecked = $this->order_model->check_order($orderid, $pid, $sizeid, $uaid);
			if (empty($orderchecked)) {
				$postInfo = array(
					'order_id'      => $orderid,
					'menu_id'       => $pid,
					'menuqty'       => $qty,
					'price'	       => $price,
					'addonsuid'     => $uaid,
					'add_on_id'     => $aids,
					'addonsqty'     => $aqty,
					'varientid'     => $sizeid,
					'isupdate'     => 1,
				);
				$this->order_model->new_entry($postInfo);
			} else {
				$checkcancelitem = $this->order_model->check_cancelitem($orderid, $pid, $sizeid);
				$adonsarray = explode(',', $addonsid);
				$adonsqtyarray = explode(',', $adonsqty);
				$adqty = explode(',', $orderchecked->addonsqty);
				$x = 0;
				$finaladdonsqty = '';
				foreach ($adonsarray as $singleaddons) {
					$totalaqty = $adonsqtyarray[$x] + $adqty[$x];
					$finaladdonsqty .= $totalaqty . ',';
					$x++;
				}
				if (!empty($adonsarray)) {
					$aqty = trim($finaladdonsqty, ',');
				}

				$adqty = array();
				$adprice = array();
				if ((empty($addonsid)) && ($customqty == 0) && ($totalvarient == 1)) {
					$udata = array(
						'menuqty'       => $qty,
						'add_on_id'     => $aids,
						'addonsqty'     => $aqty,
					);
				} else {
					$udata = array(
						'menuqty'       => $orderchecked->menuqty + $qty,
						'add_on_id'     => $aids,
						'addonsqty'     => $aqty,
					);
				}

				$this->db->where('order_id', $orderid);
				$this->db->where('menu_id', $pid);
				$this->db->where('varientid', $sizeid);
				$this->db->where('addonsuid', $uaid);
				$this->db->update('order_menu', $udata);

				if ((empty($addonsid)) && ($customqty == 0) && ($totalvarient == 1)) {
					$reqqty = $qty - $orderchecked->menuqty;
				} else {
					$reqqty = $qty;
				}
				if ($reqqty > 0) {
					if ((empty($addonsid)) && ($customqty == 0) && ($totalvarient == 1)) {
						$data4 = array(
							'ordid'				  	=>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	$qty - $orderchecked->menuqty,
							'addonsid'	        	=>	$aids,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$aqty,
							'varientid'		    	=>	$sizeid,
							'insertdate'		    =>	date('Y-m-d'),
						);
						if (empty($checkcancelitem)) {
							$datacancel = array(
								'orderid'			    =>	$orderid,
								'foodid'		        =>	$pid,
								'quantity'	        	=>	$qty - $orderchecked->menuqty,
								'varientid'		    	=>	$sizeid,
							);
							$this->db->insert('tbl_cancelitem', $datacancel);
						} else {
							$nqty = $qty - $orderchecked->menuqty;
							$udatacancel = array(
								'quantity'       => $checkcancelitem->quantity + $nqty,
							);
							$this->db->where('orderid', $orderid);
							$this->db->where('foodid', $pid);
							$this->db->where('varientid', $sizeid);
							$this->db->update('tbl_cancelitem', $udatacancel);
						}
					} else {
						$data4 = array(
							'ordid'				  	=>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	$qty,
							'addonsid'	        	=>	$aids,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$aqty,
							'varientid'		    	=>	$sizeid,
							'insertdate'		    =>	date('Y-m-d'),
						);
						if (empty($checkcancelitem)) {
							$datacancel = array(
								'orderid'			    =>	$orderid,
								'foodid'		        =>	$pid,
								'quantity'	        	=>	$qty,
								'varientid'		    	=>	$sizeid,
							);
							$this->db->insert('tbl_cancelitem', $datacancel);
						} else {
							$udatacancel = array(
								'quantity'       => $checkcancelitem->quantity + $qty,
							);
							$this->db->where('orderid', $orderid);
							$this->db->where('foodid', $pid);
							$this->db->where('varientid', $sizeid);
							$this->db->update('tbl_cancelitem', $udatacancel);
						}
					}
					$this->db->insert('tbl_updateitems', $data4);
				}
			}
		}

		$existingitem = $this->order_model->customerorder($orderid);

		$i = 0;
		$totalamount = 0;
		$subtotal = 0;
		foreach ($existingitem as $item) {
			$adonsprice = 0;
			$discount = 0;
			$itemprice = $item->price * $item->menuqty;
			if (!empty($item->add_on_id)) {
				$addons = explode(",", $item->add_on_id);
				$addonsqty = explode(",", $item->addonsqty);
				$x = 0;
				foreach ($addons as $addonsid) {
					$adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
					$adonsprice = $adonsprice + $adonsinfo->price * $addonsqty[$x];
					$x++;
				}
				$nittotal = $adonsprice;
				$itemprice = $itemprice + $adonsprice;
			} else {
				$nittotal = 0;
			}
			$totalamount = $totalamount + $nittotal;
			$subtotal = $subtotal + $item->price * $item->menuqty;
		}


		$itemtotal = $totalamount + $subtotal;
		$calvat = $itemtotal * $settinginfo->vat / 100;
		$updatedprice = $calvat + $itemtotal - $discount;
		$postData = array(
			'order_id'        => $orderid,
			'totalamount'     => $updatedprice,
		);
		$this->order_model->update_order($postData);


		$data['orderinfo']= $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['iteminfo'] = $this->order_model->customerorder($orderid);
		$data['billinfo'] = $this->order_model->billinfo($orderid);
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['orderid'] = $orderid;
		$data['page']   = "updateorderlist";

		$this->load->view('ordermanage/updateorderlist', $data);
	}
	public function itemqtyupdate()
	{
		$pid = $this->input->post('itemid');
		$sizeid = $this->input->post('varientid');
		$qty = $this->input->post('existqty', true);
		$status = $this->input->post('status', true);
		$uaid = $this->input->post('auid', true);
		$isgroup = $this->input->post('isgroup', true);
		$status = preg_replace('/\s+/', '', $status);
		$orderid = $this->input->post('orderid');
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		if ($status == "add") {
			$acqty =	$qty + 1;
		}
		if ($status == "del") {
			$acqty =	$qty - 1;
		}
		if ($isgroup == 1) {
			$orderchecked = $this->order_model->check_ordergroup($orderid, $pid, $sizeid, $uaid);
			$checkcancelitem = $this->order_model->check_cancelitem($orderid, $pid, $sizeid);
			$groupinfo = $this->db->select('*')->from('tbl_groupitems')->where('gitemid', $pid)->get()->result();
			foreach ($groupinfo as $grouprow) {
				$udata2 = array(
					'qroupqty'      => $acqty,
					'menuqty'       => $grouprow->item_qty * $acqty,
				);
				$this->db->where('order_id', $orderid);
				$this->db->where('menu_id', $grouprow->items);
				$this->db->where('groupmid', $pid);
				$this->db->where('groupvarient', $sizeid);
				$this->db->where('varientid', $grouprow->varientid);
				$this->db->where('addonsuid', $uaid);
				$this->db->update('order_menu', $udata2);
			}
			if ($status == "del" && $acqty == 0) {
				$this->db->where('order_id', $orderid)->where('groupmid', $pid)->where('groupvarient', $sizeid)->where('addonsuid', $uaid)->delete('order_menu');
				if (empty($checkcancelitem)) {
					$datacancel = array(
						'orderid'			    =>	$orderid,
						'foodid'		        =>	$pid,
						'quantity'	        	=>	1,
						'varientid'		    	=>	$sizeid,
					);
					$this->db->insert('tbl_cancelitem', $datacancel);
				} else {
					$udatacancel = array(
						'quantity'       => $checkcancelitem->quantity + 1,
					);
					$this->db->where('orderid', $orderid);
					$this->db->where('foodid', $pid);
					$this->db->where('varientid', $sizeid);
					$this->db->update('tbl_cancelitem', $udatacancel);
				}
			} else {
				if ($acqty > $orderchecked->qroupqty) {
					$reqqty = $acqty - $orderchecked->qroupqty;
				} else {
					$reqqty = $orderchecked->qroupqty - $acqty;
				}

				if ($reqqty > 0) {
					if ($status == "del") {
						$data4 = array(
							'ordid'				  =>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	1,
							'addonsid'	        	=>	$orderchecked->add_on_id,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$orderchecked->addonsqty,
							'varientid'		    	=>	$sizeid,
							'isupdate'				=>  "-",
							'insertdate'		    =>	date('Y-m-d'),
						);
						if (empty($checkcancelitem)) {
							$datacancel = array(
								'orderid'			    =>	$orderid,
								'foodid'		        =>	$pid,
								'quantity'	        	=>	1,
								'varientid'		    	=>	$sizeid,
							);
							$this->db->insert('tbl_cancelitem', $datacancel);
						} else {
							$udatacancel = array(
								'quantity'       => $checkcancelitem->quantity + 1,
							);
							$this->db->where('orderid', $orderid);
							$this->db->where('foodid', $pid);
							$this->db->where('varientid', $sizeid);
							$this->db->update('tbl_cancelitem', $udatacancel);
						}
					} else {
						$data4 = array(
							'ordid'				  =>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	$acqty - $orderchecked->menuqty,
							'addonsid'	        	=>	$orderchecked->add_on_id,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$orderchecked->addonsqty,
							'varientid'		    	=>	$sizeid,
							'insertdate'		    =>	date('Y-m-d'),
						);
					}

					$this->db->insert('tbl_updateitems', $data4);
				}
				$existingitem = $this->order_model->customerorder($orderid);

				$i = 0;
				$totalamount = 0;
				$subtotal = 0;
				foreach ($existingitem as $item) {
					$adonsprice = 0;
					$discount = 0;
					$itemprice = $item->price * $item->menuqty;
					if (!empty($item->add_on_id)) {
						$addons = explode(",", $item->add_on_id);
						$addonsqty = explode(",", $item->addonsqty);
						$x = 0;
						foreach ($addons as $addonsid) {
							$adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
							$adonsprice = $adonsprice + $adonsinfo->price * $addonsqty[$x];
							$x++;
						}
						$nittotal = $adonsprice;
						$itemprice = $itemprice + $adonsprice;
					} else {
						$nittotal = 0;
					}
					$totalamount = $totalamount + $nittotal;
					$subtotal = $subtotal + $item->price * $item->menuqty;
				}


				$itemtotal = $totalamount + $subtotal;
				$calvat = $itemtotal * $settinginfo->vat / 100;
				$updatedprice = $calvat + $itemtotal - $discount;
				$postData = array(
					'order_id'        => $orderid,
					'totalamount'     => $updatedprice,
				);
				$this->order_model->update_order($postData);
			}
		} else {
			$orderchecked = $this->order_model->check_order($orderid, $pid, $sizeid, $uaid);
			$checkcancelitem = $this->order_model->check_cancelitem($orderid, $pid, $sizeid);
			$udata = array(
				'menuqty'       => $acqty
			);

			$this->db->where('order_id', $orderid);
			$this->db->where('menu_id', $pid);
			$this->db->where('varientid', $sizeid);
			$this->db->where('addonsuid', $uaid);
			$this->db->update('order_menu', $udata);

			if ($status == "del" && $acqty == 0) {
				$this->db->where('order_id', $orderid)->where('menu_id', $pid)->where('varientid', $sizeid)->where('addonsuid', $uaid)->delete('order_menu');
				if (empty($checkcancelitem)) {
					$datacancel = array(
						'orderid'			    =>	$orderid,
						'foodid'		        =>	$pid,
						'quantity'	        	=>	1,
						'varientid'		    	=>	$sizeid,
					);
					$this->db->insert('tbl_cancelitem', $datacancel);
				} else {
					$udatacancel = array(
						'quantity'       => $checkcancelitem->quantity + 1,
					);
					$this->db->where('orderid', $orderid);
					$this->db->where('foodid', $pid);
					$this->db->where('varientid', $sizeid);
					$this->db->update('tbl_cancelitem', $udatacancel);
				}
			} else {
				if ($acqty > $orderchecked->menuqty) {
					$reqqty = $acqty - $orderchecked->menuqty;
				} else {
					$reqqty = $orderchecked->menuqty - $acqty;
				}

				if ($reqqty > 0) {
					if ($status == "del") {
						$data4 = array(
							'ordid'				  =>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	1,
							'addonsid'	        	=>	$orderchecked->add_on_id,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$orderchecked->addonsqty,
							'varientid'		    	=>	$sizeid,
							'isupdate'				=>  "-",
							'insertdate'		    =>	date('Y-m-d'),
						);
						if (empty($checkcancelitem)) {
							$datacancel = array(
								'orderid'			    =>	$orderid,
								'foodid'		        =>	$pid,
								'quantity'	        	=>	1,
								'varientid'		    	=>	$sizeid,
							);
							$this->db->insert('tbl_cancelitem', $datacancel);
						} else {
							$udatacancel = array(
								'quantity'       => $checkcancelitem->quantity + 1,
							);
							$this->db->where('orderid', $orderid);
							$this->db->where('foodid', $pid);
							$this->db->where('varientid', $sizeid);
							$this->db->update('tbl_cancelitem', $udatacancel);
						}
					} else {
						$data4 = array(
							'ordid'				  =>	$orderid,
							'menuid'		        =>	$pid,
							'qty'	        	    =>	$acqty - $orderchecked->menuqty,
							'addonsid'	        	=>	$orderchecked->add_on_id,
							'addonsuid'     		=>  $uaid,
							'adonsqty'	        	=>	$orderchecked->addonsqty,
							'varientid'		    	=>	$sizeid,
							'insertdate'		    =>	date('Y-m-d'),
						);
					}

					$this->db->insert('tbl_updateitems', $data4);
				}
				$existingitem = $this->order_model->customerorder($orderid);

				$i = 0;
				$totalamount = 0;
				$subtotal = 0;
				foreach ($existingitem as $item) {
					$adonsprice = 0;
					$discount = 0;
					$itemprice = $item->price * $item->menuqty;
					if (!empty($item->add_on_id)) {
						$addons = explode(",", $item->add_on_id);
						$addonsqty = explode(",", $item->addonsqty);
						$x = 0;
						foreach ($addons as $addonsid) {
							$adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
							$adonsprice = $adonsprice + $adonsinfo->price * $addonsqty[$x];
							$x++;
						}
						$nittotal = $adonsprice;
						$itemprice = $itemprice + $adonsprice;
					} else {
						$nittotal = 0;
					}
					$totalamount = $totalamount + $nittotal;
					$subtotal = $subtotal + $item->price * $item->menuqty;
				}


				$itemtotal = $totalamount + $subtotal;
				$calvat = $itemtotal * $settinginfo->vat / 100;
				$updatedprice = $calvat + $itemtotal - $discount;
				$postData = array(
					'order_id'        => $orderid,
					'totalamount'     => $updatedprice,
				);
				$this->order_model->update_order($postData);
			}
		}

		$data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['iteminfo']       = $this->order_model->customerorder($orderid);
		$data['billinfo']	   = $this->order_model->billinfo($orderid);
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";

		$this->load->view('ordermanage/updateorderlist', $data);
	}
	/*update uniqe*/
	public function addtocartupdate_uniqe($pid, $oid)
	{
		$getproduct = $this->order_model->getuniqeproduct($pid);
		$this->db->select('*');
		$this->db->from('menu_add_on');
		$this->db->where('menu_id', $pid);
		$query = $this->db->get();

		$getadons = "";
		if ($query->num_rows() > 0 || $getproduct->is_customqty == 1) {
			$getadons = 1;
		} else {
			$getadons =  0;
		}

		$catid = $getproduct->CategoryID;
		$sizeid = $getproduct->variantid;
		$itemname = $getproduct->ProductName . '-' . $getproduct->itemnotes;
		$size = $getproduct->variantName;
		$qty = 1;
		$price = isset($getproduct->price) ? $getproduct->price : 0;
		$orderid = $oid;
		if ($price == 0) {
			$sizeid = 0;
		}
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;

		if ($getadons == 1) {
			echo 'adons';
			exit;
		} else {
			$grandtotal = $price;
			$aids = '';
			$aqty = '';
			$aname = '';
			$aprice = '';
			$atprice = '0';
			echo 'adons';
			exit;
		}
		$uaid =	$pid . $sizeid;
		$orderchecked = $this->order_model->check_order($orderid, $pid, $sizeid, $uaid);

		if (empty($orderchecked)) {
			$postInfo = array(
				'order_id'      => $orderid,
				'menu_id'       => $pid,
				'menuqty'       => $qty,
				'add_on_id'     => $aids,
				'addonsuid'	   => $uaid,
				'addonsqty'     => $aqty,
				'varientid'     => $sizeid,
				'isupdate'      => 1,
			);
			$this->order_model->new_entry($postInfo);
		} else {
			$qty = $orderchecked->menuqty + 1;

			$udata = array(
				'menuqty'       => $qty,
				'add_on_id'     => $aids,
				'addonsqty'     => $aqty,
			);

			$this->db->where('order_id', $orderid);
			$this->db->where('menu_id', $pid);
			$this->db->where('varientid', $sizeid);
			$this->db->update('order_menu', $udata);
			$reqqty = $qty - $orderchecked->menuqty;
			if ($reqqty > 0) {
				$data4 = array(
					'ordid'				  =>	$orderid,
					'menuid'		        =>	$pid,
					'qty'	        	    =>	$qty - $orderchecked->menuqty,
					'addonsid'	        	=>	$aids,
					'adonsqty'	        	=>	$aqty,
					'varientid'		    	=>	$sizeid,
					'insertdate'		    =>	date('Y-m-d'),
				);
				$this->db->insert('tbl_updateitems', $data4);
			}
		}
		$existingitem = $this->order_model->customerorder($orderid);

		$i = 0;
		$totalamount = 0;
		$subtotal = 0;
		foreach ($existingitem as $item) {
			$adonsprice = 0;
			$discount = 0;
			$itemprice = $item->price * $item->menuqty;
			if (!empty($item->add_on_id)) {
				$addons = explode(",", $item->add_on_id);
				$addonsqty = explode(",", $item->addonsqty);
				$x = 0;
				foreach ($addons as $addonsid) {
					$adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
					$adonsprice = $adonsprice + $adonsinfo->price * $addonsqty[$x];
					$x++;
				}
				$nittotal = $adonsprice;
				$itemprice = $itemprice + $adonsprice;
			} else {
				$nittotal = 0;
			}
			$totalamount = $totalamount + $nittotal;
			$subtotal = $subtotal + $item->price * $item->menuqty;
		}


		$itemtotal = $totalamount + $subtotal;
		$calvat = $itemtotal * $settinginfo->vat / 100;
		$updatedprice = $calvat + $itemtotal - $discount;
		$postData = array(
			'order_id'        => $orderid,
			'totalamount'     => $updatedprice,
		);
		$this->order_model->update_order($postData);


		$data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['iteminfo']       = $this->order_model->customerorder($orderid);
		$data['billinfo']	   = $this->order_model->billinfo($orderid);
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";

		$this->load->view('ordermanage/updateorderlist', $data);
	}

	public function orderinvoice($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "invoice";

		echo Modules::run('template/layout', $data);
	}
	/*order invoice for post*/
	public function pos_order_invoice($id)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		$data['selectedFoodsForCart']=$selectedFoodsForCart;

		$data['orderedMods']=$orderedMods;
		$this->load->view('ordermanage/invoice_pos', $data);
	}

	public function orderdetails($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		//Fetching modifiers info on 23042025
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.order_id',$orderid);
		$q1=$this->db->get();
		$orderedMods=$q1->result();
		$data['orderedMods']=$orderedMods;

		$data['module'] = "ordermanage";
		$data['page']   = "details";
		echo Modules::run('template/layout', $data);
	}
	public function orderdetailspop($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);
		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['shipinfo']	   = $this->order_model->shipinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "details";
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		$data['selectedFoodsForCart']=$selectedFoodsForCart;
		$data['orderedMods']=$orderedMods;
		$this->load->view('ordermanage/details', $data);
	}
	/*details page for pos*/
	public function orderdetails_post($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('ordermanage/details', $data);
	}
	public function posorderinvoice($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));

		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $data['billinfo']->create_by));
		$data['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		$settinginfo = $this->order_model->settinginfo();
		if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
			$updatetData = array('invoiceprint' => 2);
			$this->db->where('order_id', $id);
			$this->db->update('customer_order', $updatetData);
		}
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		$view = $this->load->view('posinvoice', $data, true);
		echo $view;
		exit;
	}
	public function posprintdirect($id = null)
	{

		$this->permission->method('ordermanage', 'read')->redirect();
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$updatetData = array('nofification' => 1);
		$this->db->where('order_id', $id);
		$this->db->update('customer_order', $updatetData);

		//Fetching ordered_menu_item_modifiers

		$this->db->select('*');
		$this->db->from('ordered_menu_item_modifiers');
		$this->db->where('order_id', $id);
		$this->db->where('foods_or_mods', 2);
		$this->db->where('is_active', 1);
		$q1 = $this->db->get();
		$orderedModifiers = $q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		$data['selectedFoodsForCart']=$selectedFoodsForCart;

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $data['billinfo']->create_by));
		$settinginfo = $this->order_model->settinginfo();
		$data['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['orderedModifiers'] = $orderedModifiers;
		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();
		$data['orderedMods']=$orderedMods;

		$view = $this->load->view('posinvoicedirectprint', $data, true);
		echo $view;
		exit;
	}
	public function dueinvoice($id)
	{

		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		$data['iteminfo']       = $this->order_model->customerorder($id);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$data['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $data['billinfo']->create_by));
		$data['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();
		$data['orderedMods']=$orderedMods;

		$view = $this->load->view('dueinvoicedirectprint', $data, true);
		echo $view;
		exit;
	}
	public function fwrite_stream($fp, $string)
	{
		for ($written = 0; $written < strlen($string); $written += $fwrite) {
			$fwrite = fwrite($fp, substr($string, $written));
			if ($fwrite === false) {
				return $written;
			}
		}
		return $written;
	}
	public function postokengenerate($id, $ordstatus)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));

		if (!empty($customerorder->waiter_id)) {
			$data['waiterinfo']      = $this->order_model->read('first_name,last_name', 'employee_history', array('emp_id' => $customerorder->waiter_id));
		} else {
			$data['waiterinfo'] = '';
		}
		if (!empty($customerorder->table_no)) {
			$data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		} else {
			$data['tableinfo'] = '';
		}
		$data['iteminfo']       = $this->order_model->customerorder($id, $ordstatus);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";

		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		//Get Order time
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$q3 = $this->db->get();
		$order_timings = $q3->row_array(); // Returns an array of arrays

		$data['selectedFoodsForCart']=$selectedFoodsForCart;
		$data['orderedMods']=$orderedMods;
		$data['orderTiming'] = $order_timings;
		
		echo $view = $this->load->view('postoken', $data, true);
		//return $view;


	}
	public function paidtoken($id)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		if (!empty($customerorder->table_no)) {
			$data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		} else {
			$data['tableinfo'] = '';
		}
		if (!empty($customerorder->waiter_id)) {
			$data['waiterinfo']      = $this->order_model->read('first_name,last_name', 'employee_history', array('emp_id' => $customerorder->waiter_id));
		} else {
			$data['waiterinfo'] = '';
		}
		$data['iteminfo']       = $this->order_model->customerorder($id, $ordstatus = null);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('ordered_menu_item_modifiers.menu_id, item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$id);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		//Get Order time
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$q3 = $this->db->get();
		$order_timings = $q3->row_array(); // Returns an array of arrays
		$data['orderTiming'] = $order_timings;

		$data['selectedFoodsForCart']=$selectedFoodsForCart;
		$data['orderedMods']=$orderedMods;
		echo $view = $this->load->view('postoken', $data, true);
		// $this->load->view('postoken', $data, true);
		return $view;
	}
	public function postokengenerateupdate($id, $ordstatus)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));

		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		if (!empty($customerorder->table_no)) {
			$data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		} else {
			$data['tableinfo'] = '';
		}
		if (!empty($customerorder->waiter_id)) {
			$data['waiterinfo']      = $this->order_model->read('first_name,last_name', 'employee_history', array('emp_id' => $customerorder->waiter_id));
		} else {
			$data['waiterinfo'] = '';
		}
		$data['exitsitem']      = $this->order_model->customerorder($id);
		$data['iteminfo']       = $this->order_model->customerorder($id, $ordstatus);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";

		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.order_id',$id);
		$q1=$this->db->get();
		$orderedMods=$q1->result();
		$data['orderedMods']=$orderedMods;

		//Get Order time
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$q3 = $this->db->get();
		$order_timings = $q3->row_array(); // Returns an array of arrays
		$data['orderTiming'] = $order_timings;

		$view = $this->load->view('postoken', $data);
		echo $view;
		$this->db->where('ordid', $id)->delete('tbl_updateitems');
		$updatetData = array(
			'isupdate' => NULL,
		);
		$this->db->where('order_id', $id);
		$this->db->update('order_menu', $updatetData);
	}
	public function tokenupdate($id)
	{
		$this->db->where('ordid', $id)->delete('tbl_updateitems');
		$updatetData = array(
			'isupdate' => NULL,
		);
		$this->db->where('order_id', $id);
		$this->db->update('order_menu', $updatetData);
	}
	public function postokengeneratesame($id, $ordstatus)
	{
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');
		$customerorder = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		$data['orderinfo']  	   = $customerorder;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		if (!empty($customerorder->table_no)) {
			$data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		} else {
			$data['tableinfo'] = '';
		}
		if (!empty($customerorder->waiter_id)) {
			$data['waiterinfo']      = $this->order_model->read('first_name,last_name', 'employee_history', array('emp_id' => $customerorder->waiter_id));
		} else {
			$data['waiterinfo'] = '';
		}
		$data['iteminfo']       = $this->order_model->customerorder($id, $ordstatus);
		$data['billinfo']	   = $this->order_model->billinfo($id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";
		$this->load->view('postoken2', $data);
	}
	public function paymentgateway($orderid, $paymentid)
	{
		$data['orderinfo']  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->order_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$paymentinfo = $this->order_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$data['customerinfo']  	   = $this->order_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$customer = $this->order_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	   = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	   = $this->order_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->order_model->customerorder($orderid);
		$data['mybill']	   = $this->order_model->billinfo($orderid);
		$settinginfo = $this->order_model->settinginfo();
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);


		$data['module'] = "ordermanage";

		if ($paymentid == 5) {


			$full_name = $customer->customer_name;
			$email = $customer->customer_email;
			$phone = $customer->customer_phone;
			$amount =  $bill->bill_amount;
			$transactionid = $orderid;
			$address = $customer->customer_address;

			$post_data = array();
			$post_data['store_id'] = SSLCZ_STORE_ID;
			$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
			$post_data['total_amount'] =  $bill->bill_amount;
			$post_data['currency'] = $paymentinfo->currency;
			$post_data['tran_id'] = $orderid;
			$post_data['success_url'] =  base_url() . "ordermanage/order/successful/" . $orderid;
			$post_data['fail_url'] = base_url() . "ordermanage/order/fail/" . $orderid;
			$post_data['cancel_url'] = base_url() . "ordermanage/order/cancilorder/" . $orderid;


			# CUSTOMER INFORMATION
			$post_data['cus_name'] = $customer->customer_name;
			$post_data['cus_email'] = $customer->customer_email;
			$post_data['cus_add1'] = $customer->customer_address;
			$post_data['cus_add2'] = "";
			$post_data['cus_city'] = "";
			$post_data['cus_state'] = "";
			$post_data['cus_postcode'] = "";
			$post_data['cus_country'] = "";
			$post_data['cus_phone'] = $customer->customer_phone;
			$post_data['cus_fax'] = "";

			# SHIPMENT INFORMATION
			$post_data['ship_name'] = "";
			$post_data['ship_add1 '] = "";
			$post_data['ship_add2'] = "";
			$post_data['ship_city'] = "";
			$post_data['ship_state'] = "";
			$post_data['ship_postcode'] = "";
			$post_data['ship_country'] = "";

			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "";
			$post_data['value_b '] = "";
			$post_data['value_c'] = "";
			$post_data['value_d'] = "";

			$this->load->library('session');
			$session = array(
				'tran_id' => $post_data['tran_id'],
				'amount' => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set_userdata('tarndata', $session);
			$this->load->library('sslcommerz');
			echo "<h3>Wait...SSLCOMMERZ Payment Processing....</h3>";

			if ($this->sslcommerz->RequestToSSLC($post_data, false)) {

				redirect('ordermanage/order/fail/' . $orderid);
			}
			$data['page']   = "checkout";
		} else if ($paymentid == 3) {
			$data['page']   = "paypal";
			$this->load->view('ordermanage/paypal', $data);
		} else if ($paymentid == 2) {
			$data['page']   = "2checkout";
			echo Modules::run('template/layout', $data);
		}
	}
	public function successful($orderid)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$billinfo = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;
		$updatetData = array('bill_status'     => 1);
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetData);

		$updatetDataord = array('order_status' => 4);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetDataord);
		$this->session->set_flashdata('message', display('order_successfully'));

		redirect('ordermanage/order/pos_invoice/' . $orderid);
	}
	public function successful2()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$orderid = $this->input->post('li_0_name', true);

		$billinfo = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;
		$updatetData = array('bill_status'     => 1);
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetData);

		$updatetDataord = array('order_status'     => 4);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetDataord);
		$this->session->set_flashdata('message', display('order_successfully'));

		if (empty($this->session->userdata('id'))) {
			redirect('frontend/orderdelevered/001');
		} else {
			redirect('ordermanage/order/pos_invoice/' . $orderid);
		}
	}
	public function fail($orderid)
	{
		$this->session->set_flashdata('message', display('order_fail'));
		redirect('ordermanage/order/pos_invoice');
	}
	public function cancilorder($orderid)
	{
		$this->session->set_flashdata('message', display('order_fail'));
		redirect('ordermanage/order/pos_invoice');
	}
	public function allkitchen()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$uid = $this->session->userdata('id');
		$assignketchen = $this->db->select('user.id,tbl_assign_kitchen.kitchen_id,tbl_assign_kitchen.userid,tbl_kitchen.kitchen_name')->from('tbl_assign_kitchen')->join('user', 'user.id=tbl_assign_kitchen.userid', 'left')->join('tbl_kitchen', 'tbl_kitchen.kitchenid=tbl_assign_kitchen.kitchen_id')->where('tbl_assign_kitchen.userid', $uid)->get()->result();
		if (!empty($assignketchen)) {
			$data['kitchenlist'] = $assignketchen;
			foreach ($assignketchen as $kitchen) {
				$data['kitcheninfo'][$i]['kitchenid'] = $kitchen->kitchen_id;
				$orderinfo = $this->order_model->kitchen_ongoingorder($kitchen->kitchen_id);

				if (!empty($orderinfo)) {
					$m = 0;
					foreach ($orderinfo as $orderlist) {
						$billtotal = round($orderlist->totalamount);
						if (($onprocess->orderacceptreject == 0 || empty($orderlist->orderacceptreject)) && ($orderlist->cutomertype == 2)) {
						} else {
							$data['kitcheninfo'][$i]['orderlist'][$m] = $orderlist;
							$data['kitcheninfo'][$i]['iteminfo'][$m] = $this->order_model->customerorderkitchen($orderlist->order_id, $kitchen->kitchen_id);
							$m++;
						}
					}
				}
				$i++;
			}
		} else {
			$kitchenlist = $this->db->select('kitchenid as kitchen_id,kitchen_name')->from('tbl_kitchen')->order_by('kitchen_name', 'Asc')->get()->result();
			$output = array();
			$i = 0;
			foreach ($kitchenlist as $kitchen) {
				$data['kitcheninfo'][$i]['kitchenid'] = $kitchen->kitchen_id;
				$orderinfo = $this->order_model->kitchen_ongoingorder($kitchen->kitchen_id);

				if (!empty($orderinfo)) {
					$m = 0;
					foreach ($orderinfo as $orderlist) {
						$billtotal = round($orderlist->totalamount);
						if (($orderlist->orderacceptreject == 0 || empty($orderlist->orderacceptreject)) && ($orderlist->cutomertype == 2)) {
						} else {
							$data['kitcheninfo'][$i]['orderlist'][$m] = $orderlist;
							$data['kitcheninfo'][$i]['iteminfo'][$m] = $this->order_model->customerorderkitchen($orderlist->order_id, $kitchen->kitchen_id);
							$m++;
						}
					}
				}
				$i++;
			}
			$data['kitchenlist'] = $kitchenlist;
		}

		$user_id = $this->session->userdata('id');
		$data['user_is_waiter'] = $this->order_model->is_user_waiter($user_id);
		// echo '<pre>';
		// print_r($data['kitcheninfo']);
		// echo '</pre>';
		// exit;
		$data['title'] = "Counter Dashboard";
		$data['module'] = "ordermanage";
		$data['page']   = "allkitchen";
		echo Modules::run('template/layout', $data);
	}
	public function kitchen($kitchenid = null)
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}

		$data['title'] = "Kitchen Dashboard";
		$data['ongoingorder']  = $this->order_model->kitchen_ongoingorder($kitchenid);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['kitchenid'] = $kitchenid;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";
		$data['page']   = "kitchen";
		echo Modules::run('template/layout', $data);
	}
	public function checkorder()
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$orderid = $this->input->post('orderid');
		$kid = $this->input->post('kid');
		$data['title'] = "Kitchen Dashboard";
		$data['kitchenid'] = $kid;
		$data['orderinfo'] = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['itemlist'] = $this->order_model->customerorderkitchen($orderid, $kid);
		$data['module'] = "ordermanage";
		$data['page']   = "kitchen_view";
		$this->load->view('ordermanage/kitchen_view', $data);
	}
	// public function itemacepted()
	// {
	// 	if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
	// 		redirect('dashboard/auth/logout');
	// 	}
	// 	$orderid = $this->input->post('orderid');
	// 	$kitid = $this->input->post('kitid');
	// 	$itemid = $this->input->post('itemid');
	// 	$varient = $this->input->post('varient', true);

	// 	$itemids = explode(',', $itemid);
	// 	$varientids = explode(',', $varient);
	// 	$itemidsv = array_values(trim($itemids, ','));
	// 	$varientidsv = array_values(trim($varientids, ','));
	// 	$i = 0;
	// 	foreach ($itemids as $sitem) {
	// 		$vaids = $varientids[$i];
	// 		$isexit = $this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid', $orderid)->where('kitchenid', $kitid)->where('itemid', $sitem)->where('varient', $vaids)->get()->num_rows();
	// 		echo $this->db->last_query();

	// 		if ($isexit > 0) {
	// 		} else {
	// 			$kitchenorder = array(
	// 				'kitchenid' => $kitid,
	// 				'orderid'     => $orderid,
	// 				'itemid'     => $sitem,
	// 				'varient'     => $vaids
	// 			);
	// 			$this->db->insert('tbl_kitchen_order', $kitchenorder);
	// 			$itemaccepted = array(
	// 				'accepttime' => date('Y-m-d H:i:s'),
	// 				'orderid'     => $orderid,
	// 				'menuid'     => $sitem,
	// 				'varient'     => $vaids
	// 			);
	// 			$this->db->insert('tbl_itemaccepted', $itemaccepted);
	// 		}
	// 		$i++;
	// 	}
	// 	$alliteminfo = $this->order_model->customerorderkitchen($orderid, $kitid);
	// 	$allchecked = "";
	// 	foreach ($alliteminfo as $single) {
	// 		$allisexit = $this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid', $orderid)->where('kitchenid', $kitid)->where('itemid', $single->menu_id)->where('varient', $single->variantid)->get()->num_rows();

	// 		if ($allisexit > 0) {
	// 			$allchecked .= "1,";
	// 		} else {
	// 			$allchecked .= "0,";
	// 		}
	// 	}
	// 	if (strpos($allchecked, '0') !== false) {
	// 		echo 0;
	// 	} else {
	// 		echo 1;
	// 	}
	// 	$totalnumkitord = $this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid', $orderid)->where('itemid>0')->get()->num_rows();
	// 	$totalmenuord = $this->db->select('order_menu.*')->from('order_menu')->where('order_id', $orderid)->get()->num_rows();
	// 	if ($totalmenuord == $totalnumkitord) {
	// 		$updatetData2 = array('order_status'  => 2);
	// 		$this->db->where('order_id', $orderid);
	// 		$this->db->update('customer_order', $updatetData2);
	// 	}
	// }

	public function itemacepted()
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}

		$orderid = $this->input->post('orderid');
		$kitid = $this->input->post('kitid');
		$itemid = rtrim($this->input->post('itemid'), ',');
		$varient = rtrim($this->input->post('varient'), ',');

		$itemids = explode(',', $itemid);
		$varientids = explode(',', $varient);

		$i = 0;
		foreach ($itemids as $sitem) {
			if (!isset($varientids[$i])) {
				$i++;
				continue; // Skip if varient is missing for item
			}

			$vaids = $varientids[$i];

			$isexit = $this->db->select('tbl_kitchen_order.*')
				->from('tbl_kitchen_order')
				->where('orderid', $orderid)
				->where('kitchenid', $kitid)
				->where('itemid', $sitem)
				->where('varient', $vaids)
				->get()
				->num_rows();

			// Debug: Remove in production
			log_message('debug', 'SQL: ' . $this->db->last_query());

			if ($isexit == 0) {
				$kitchenorder = array(
					'kitchenid' => $kitid,
					'orderid'   => $orderid,
					'itemid'    => $sitem,
					'varient'   => $vaids
				);
				$this->db->insert('tbl_kitchen_order', $kitchenorder);

				$itemaccepted = array(
					'accepttime' => date('Y-m-d H:i:s'),
					'orderid'    => $orderid,
					'menuid'     => $sitem,
					'varient'    => $vaids
				);
				$this->db->insert('tbl_itemaccepted', $itemaccepted);
			}
			$i++;
		}

		$alliteminfo = $this->order_model->customerorderkitchen($orderid, $kitid);
		$allchecked = "";

		foreach ($alliteminfo as $single) {
			$allisexit = $this->db->select('tbl_kitchen_order.*')
				->from('tbl_kitchen_order')
				->where('orderid', $orderid)
				->where('kitchenid', $kitid)
				->where('itemid', $single->menu_id)
				->where('varient', $single->variantid)
				->get()
				->num_rows();

			$allchecked .= ($allisexit > 0) ? "1," : "0,";
		}

		if (strpos($allchecked, '0') !== false) {
			echo 0;
		} else {
			echo 1;
		}

		$totalnumkitord = $this->db->select('tbl_kitchen_order.*')
			->from('tbl_kitchen_order')
			->where('orderid', $orderid)
			->where('itemid >', 0)
			->get()
			->num_rows();

		$totalmenuord = $this->db->select('order_menu.*')
			->from('order_menu')
			->where('order_id', $orderid)
			->get()
			->num_rows();

		if ($totalmenuord == $totalnumkitord) {
			$updatetData2 = array('order_status'  => 3);
			$this->db->where('order_id', $orderid);
			$this->db->update('customer_order', $updatetData2);
		}
	}
	public function itemisready()
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$orderid = $this->input->post('orderid');
		$menuid = $this->input->post('menuid');
		$varient = $this->input->post('varient', true);
		$status = $this->input->post('status', true);
		$updatetData = array('food_status'     => $status);
		$this->db->where('order_id', $orderid);
		$this->db->where('menu_id', $menuid);
		$this->db->where('varientid', $varient);
		$this->db->update('order_menu', $updatetData);

		$updatetData2 = array('order_status'  => 2);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData2);
		$orderinformation = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		$allemployee = $this->db->select('*')->from('user')->where('id', $orderinformation->waiter_id)->get()->row();
		$item = $this->order_model->read('*', 'item_foods', array('ProductsID' => $menuid));
		$isexit = $this->db->select('*')->from('tbl_orderprepare')->where('orderid', $orderid)->where('menuid', $menuid)->where('varient', $varient)->get()->row();
		if ($status == 1) {
			$ready = "Food Is Ready";
			if (empty($isexit)) {
				$ready = array(
					'preparetime' => date('Y-m-d H:i:s'),
					'orderid'     => $orderid,
					'menuid'     => $menuid,
					'varient'     => $varient
				);
				$this->db->insert('tbl_orderprepare', $ready);
			}
			//push 
			$senderid[] = $allemployee->waiter_kitchenToken;
			define('API_ACCESS_KEY', 'AAAAvWuiU2I:APA91bGGr8XSrxX1A_XkpbFkKu8KjT-UU0wgCjar1mHKVkT575rgq5cVUcqj2-2p-eEzHV-GtEH04d75yAccgoyZ3DM5YZPfp6OxYSMs-c_9nTVQLNOMksM9rWRv5zmBUpDqnPgLFj-E');
			$registrationIds = $senderid;
			$msg = array(
				'message' 					=> "Orderid: " . $orderid . ", Item Name: " . $item->ProductName . " Amount:" . $orderinformation->totalamount,
				'title'						=> "Food Is Ready.",
				'subtitle'					=> $orderid,
				'tickerText'				=> "TSET",
				'vibrate'					=> 1,
				'sound'						=> 1,
				'largeIcon'					=> "TSET",
				'smallIcon'					=> "TSET"
			);
			$fields2 = array(
				'registration_ids' 	=> $registrationIds,
				'data'			=> $msg
			);

			$headers2 = array(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

			$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch2, CURLOPT_POST, true);
			curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($fields2));
			$result2 = curl_exec($ch2);
			curl_close($ch2);
		} else {
			$ready = "Food Is Cooking";
			$this->db->where('orderid', $orderid)->where('menuid', $menuid)->where('varient', $varient)->delete('tbl_orderprepare');
			//push 
			$senderid[] = $allemployee->waiter_kitchenToken;
			define('API_ACCESS_KEY', 'AAAAvWuiU2I:APA91bGGr8XSrxX1A_XkpbFkKu8KjT-UU0wgCjar1mHKVkT575rgq5cVUcqj2-2p-eEzHV-GtEH04d75yAccgoyZ3DM5YZPfp6OxYSMs-c_9nTVQLNOMksM9rWRv5zmBUpDqnPgLFj-E');
			$registrationIds = $senderid;
			$msg = array(
				'message' 					=> "Orderid: " . $orderid . ", Item Name: " . $item->ProductName . " Amount:" . $orderinformation->totalamount,
				'title'						=> display('processing'),
				'subtitle'					=> $orderid,
				'tickerText'				=> "TSET",
				'vibrate'					=> 1,
				'sound'						=> 1,
				'largeIcon'					=> "TSET",
				'smallIcon'					=> "TSET"
			);
			$fields2 = array(
				'registration_ids' 	=> $registrationIds,
				'data'			=> $msg
			);

			$headers2 = array(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

			$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch2, CURLOPT_POST, true);
			curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($fields2));
			$result2 = curl_exec($ch2);
			curl_close($ch2);
			/*End Notification*/
		}
		echo $status;
	}
	public function orderisready()
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$orderid = $this->input->post('orderid');
		$allfood = $this->input->post('itemid');
		$kid = $this->input->post('kid', true);
		$allfood_id = explode(",", $allfood);
		foreach ($allfood_id as $foodid) {
			$updatetready = array(
				'allfoodready'           => 1
			);
			$this->db->where('order_id', $orderid);
			$this->db->where('menu_id', $foodid);
			$this->db->update('order_menu', $updatetready);
		}
		$data['ongoingorder']  = $this->order_model->kitchen_ongoingorder($kid);
		$data['page']   = "kitchen_load";
		$this->load->view('ordermanage/kitchen_load', $data);
	}
	public function markasdone()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$orderid = $this->input->post('orderid');
		$itemid = $this->input->post('item', true);
		$varient = $this->input->post('varient', true);
		$kid = $this->input->post('kid', true);
		$itemids = explode(',', $itemid);
		$varientids = explode(',', $varient);
		$i = 0;
		foreach ($itemids as $sitem) {
			$vaids = $varientids[$i];
			$updatetready = array(
				'food_status'           => 1,
				'allfoodready'           => 1
			);
			$this->db->where('order_id', $orderid);
			$this->db->where('menu_id', $sitem);
			$this->db->where('varientid', $vaids);
			$this->db->update('order_menu', $updatetready);
			$isexit = $this->db->select('*')->from('tbl_orderprepare')->where('orderid', $orderid)->where('menuid', $sitem)->where('varient', $vaids)->get()->row();
			if (empty($isexit)) {
				$ready = array(
					'preparetime' => date('Y-m-d H:i:s'),
					'orderid'     => $orderid,
					'menuid'     => $menuid,
					'varient'     => $varient
				);
				$this->db->insert('tbl_orderprepare', $ready);
			}
			$i++;
		}
		$updatetData = array('order_status'     => 3);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData);
		$alliteminfo = $this->order_model->customerorderkitchen($orderid, $kid);
		$singleorderinfo = $this->order_model->kitchen_ajaxorderinfoall($orderid);

		$data['orderinfo'] = $singleorderinfo;
		$data['kitchenid'] = $kid;
		$data['iteminfo'] = $alliteminfo;
		$data['module'] = "ordermanage";
		$data['page']   = "kitchen_view";
		$this->load->view('kitchen_view', $data);
	}
	public function counterboard()
	{
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$data['title'] = "Counter Dashboard";
		$data['counterorder']  = $this->order_model->counter_ongoingorder();
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['module'] = "ordermanage";
		$data['page']   = "counter";
		echo Modules::run('template/layout', $data);
	}

	/*22-09*/
	public function showpaymentmodal($id, $type = null)
	{

		$array_id  = array('order_id' => $id);
		$order_info = $this->order_model->read('*', 'customer_order', $array_id);
		$customer_info = $this->order_model->read('*', 'customer_info', array('customer_id' => $order_info->customer_id));
		$data['membership'] = $customer_info->membership_type;
		$data['customerid'] = $customer_info->customer_id;
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['order_info'] = $order_info;
		$data['ismerge'] = 0;
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		if ($type == null) {
			$this->load->view('ordermanage/paymodal', $data);
		} else {
			$this->load->view('ordermanage/newpaymentveiw', $data);
		}
	}

	public function mergemodal()
	{
		$orderids = $this->input->post('orderid');
		$allorder = trim($orderids, ',');
		$data['order_info'] = $this->order_model->selectmerge($allorder);
		$customer_info = $this->order_model->read('*', 'customer_info', array('customer_id' => $data['order_info'][0]->customer_id));
		$data['membership'] = $customer_info->membership_type;
		$data['customerid'] = $customer_info->customer_id;
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		//print_r($data['order_info']);
		$data['ismerge'] = 1;
		$data['duemerge'] = 0;
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$this->load->view('ordermanage/paymodal', $data);
	}
	public function duemergemodal()
	{
		$orderid = $this->input->post('orderid');
		$allorder = $this->input->post('allorderid');
		$mergeid = $this->input->post('mergeid');
		$data['order_info'] = $this->order_model->selectmerge($allorder);
		$customer_info = $this->order_model->read('*', 'customer_info', array('customer_id' => $orderid->customer_id));
		$data['membership'] = $customer_info->membership_type;
		$data['customerid'] = $customer_info->customer_id;
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);

		$data['ismerge'] = 1;
		$data['duemerge'] = 1;
		$data['paymentmethod'] = $this->order_model->pmethod_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$this->load->view('ordermanage/paymodal', $data);
	}

	public function paymultiple()
	{
		$this->db->where('order_id', $this->input->post('orderid'))->delete('table_details');
		$postdata				 = $this->input->post();
		$discount                = $this->input->post('granddiscount', true);
		$grandtotal              = $this->input->post('grandtotal', true);
		$orderid                 = $this->input->post('orderid', true);
		$paytype                 = $this->input->post('paytype', true);
		$cterminal               = $this->input->post('card_terminal', true);
		$mybank                  = $this->input->post('bank', true);
		$mydigit                 = $this->input->post('last4digit', true);
		$payamonts               = $this->input->post('paidamount', true);
		$paidamount = 0;
		$updatetordfordiscount = array(
			'totalamount'           => $this->input->post('grandtotal', true),
			'customerpaid'           => $this->input->post('grandtotal', true)
		);

		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetordfordiscount);
		$settinginfo = $this->order_model->settinginfo();
		if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
			$updatetDatap = array('invoiceprint' => 2);
			$this->db->where('order_id', $orderid);
			$this->db->update('customer_order', $updatetDatap);
		}
		$prebillinfo = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
		$customerid = $prebillinfo->customer_id;
		$finalgrandtotal = $this->input->post('grandtotal', true);
		/***********Add pointing***********/
		$scan = scandir('application/modules/');
		$getcus = "";
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$getcus = $customerid;
				}
			}
		}

		if (!empty($getcus)) {
			$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
			$totalgrtotal = round($finalgrandtotal);
			$checkpointcondition = "$totalgrtotal BETWEEN amountrangestpoint AND amountrangeedpoint";
			$getpoint = $this->db->select("*")->from('tbl_pointsetting')->get()->row();
			$calcpoint = $getpoint->earnpoint / $getpoint->amountrangestpoint;
			$thisordpoint = $calcpoint * $totalgrtotal;
			if (empty($isexitscusp)) {
				$updateum = array('membership_type' => 1);
				$this->db->where('customer_id', $customerid);
				$this->db->update('customer_info', $updateum);
				$pointstable2 = array(
					'customerid'   => $customerid,
					'amount'       => $totalgrtotal,
					'points'       => $thisordpoint + 10
				);
				$this->order_model->insert_data('tbl_customerpoint', $pointstable2);
			} else {
				$pamnt = $isexitscusp->amount + $totalgrtotal;
				$tpoints = $isexitscusp->points + $thisordpoint;
				$updatecpoint = array('amount' => $pamnt, 'points' => $tpoints);
				$this->db->where('customerid', $customerid);
				$this->db->update('tbl_customerpoint', $updatecpoint);
			}
			$updatemember = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
			$lastupoint = $updatemember->points;
			$updatecond = "'" . $lastupoint . "' BETWEEN startpoint AND endpoint";
			$checkmembership = $this->db->select("*")->from('membership')->where($updatecond)->get()->row();
			if (!empty($checkmembership)) {
				$updatememsp = array('membership_type' => $checkmembership->id);
				$this->db->where('customer_id', $customerid);
				$this->db->update('customer_info', $updatememsp);
			}
			$isredeem = $this->input->post('isredeempoint', true);
			if (!empty($isredeem)) {
				$updateredeem = array('amount' => 0, 'points' => 0);
				$this->db->where('customerid', $isredeem);
				$this->db->update('tbl_customerpoint', $updateredeem);
			}
		}

		/*******end Point**************/

		if ($discount > 0) {
			$finaldis = $discount + $prebillinfo->discount;
		} else {
			$finaldis = $prebillinfo->discount;
		}
		$updatetprebill = array(
			'discount'              => $finaldis,
			'bill_amount'           => $this->input->post('grandtotal', true)
		);

		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetprebill);
		$i = 0;
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
		foreach ($payamonts  as $payamont) {
			$paidamount = $paidamount + $payamont;
			$data_pay = array(
				'paytype' => $paytype[$i],
				'cterminal' => $cterminal[$i],
				'mybank' => $mybank[$i],
				'mydigit' => $mydigit[$i],
				'payamont' => $payamont
			);
			$this->add_multipay($orderid, $billinfo->bill_id, $data_pay);
			$i++;
		}
		$cpaidamount =	$paidamount;
		$orderinfo = $this->order_model->uniqe_order_id($orderid);
		$duevalue = ($orderinfo->totalamount - $orderinfo->customerpaid);
		if ($paidamount == $duevalue || $duevalue <  $paidamount) {
			$paidamount  = $paidamount + $orderinfo->customerpaid;
			$status = 4;
		} else {
			$paidamount  = $paidamount + $orderinfo->customerpaid;

			$status = 3;
		}

		$saveid = $this->session->userdata('id');
		$updatetData = array(
			'order_status'     => $status,
			'customerpaid'     => $cpaidamount,
		);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData);
		//Update Bill Table
		if ($status == 4) {
			$updatetbill = array(
				'bill_status'           => 1,
				'payment_method_id'     => $paytype[0],
				'create_by'     		   => $saveid,
				'create_at'     		   => date('Y-m-d H:i:s')
			);
			$this->db->where('order_id', $orderid);
			$this->db->update('bill', $updatetbill);
		}
		if ($status == 4) {
			$this->removeformstock($orderid);
			$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $orderid)->get()->row();
			$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
			$finalill = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
			$headn = $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name;
			$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
			$customer_headcode = $coainfo->HeadCode;

			$invoice_no = $orderinfo->saleinvoice;
			$saveid = $this->session->userdata('id');
			$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
			if ($isvatinclusive->isvatinclusive == 1) {
				$isvatin = 1;
				$finalbillamnt = $finalill->bill_amount - $finalill->VAT;
			} else {
				$finalbillamnt = $finalill->bill_amount;
				$isvatin = 0;
			}
			//Customer debit for Product Value
			$cosdr = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  $customer_headcode,
				'Narration'      =>  'Customer debit for Product Invoice#' . $invoice_no,
				'Debit'          =>  $finalbillamnt,
				'Credit'         =>  0,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $cosdr);
			//Store credit for Product Value
			$sc = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  10107,
				'Narration'      =>  'Inventory Credit for Product Invoice#' . $invoice_no,
				'Debit'          =>  0,
				'Credit'         =>  $finalbillamnt,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $sc);

			// Customer Credit for paid amount.
			$cc = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  $customer_headcode,
				'Narration'      =>  'Customer Credit for Product Invoice#' . $invoice_no,
				'Debit'          =>  0,
				'Credit'         =>  $finalbillamnt,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $cc);


			// Income for company							 
			$income = array(
				'VNo'            => "Sale" . $orderinfo->saleinvoice,
				'Vtype'          => 'Sales Products',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          => 303,
				'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
				'Debit'          => 0,
				'Credit'         => $finalill->bill_amount - $finalill->VAT, //purchase price asbe
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $income);

			// Tax Pay for company		
			if ($isvatin != 1) {
				$income = array(
					'VNo'            => "Sale" . $orderinfo->saleinvoice,
					'Vtype'          => 'Sales Products Vat',
					'VDate'          =>  $orderinfo->order_date,
					'COAID'          => 502030101,
					'Narration'      => 'Sale TAX For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
					'Debit'          => $finalill->VAT,
					'Credit'         => 0,
					'IsPosted'       => 1,
					'CreateBy'       => $saveid,
					'CreateDate'     => $orderinfo->order_date,
					'IsAppove'       => 1
				);
				$this->db->insert('acc_transaction', $income);
			}
		}
		$logData = array(
			'action_page'         => display('order_list'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		$this->logs_model->log_recorded($logData);
		$this->savekitchenitem($orderid);
		$data['ongoingorder']  = $this->order_model->get_ongoingorder();
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";
		//  echo $orderid;
		//  die();
		//Fetching modifiers info
		$this->db->select('a.add_on_name, a.price, om.menu_id, om.foods_or_mods');
		$this->db->from('add_ons a');
		$this->db->join('ordered_menu_item_modifiers om', 'a.add_on_id=om.add_on_id');
		$this->db->where('om.foods_or_mods',2);
		$this->db->where('om.order_id',$orderid);
		$q1=$this->db->get();
		$orderedMods=$q1->result();

		$this->db->select('item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, ordered_menu_item_modifiers.variant_id, ordered_menu_item_modifiers.modifier_groupid');
		$this->db->from('item_foods');
		$this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
		$this->db->where('ordered_menu_item_modifiers.order_id',$orderid);
		$this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
		$this->db->where('ordered_menu_item_modifiers.is_active', 1);
		$q2 = $this->db->get();
		$selectedFoodsForCart = $q2->result();

		$data['selectedFoodsForCart']=$selectedFoodsForCart;
		$data['orderedMods']=$orderedMods;
		$view = $this->posprintdirect($orderid);
		echo $view;
		exit;
	}
	public function savekitchenitem($orderid)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$this->db->select('order_menu.*,item_foods.kitchenid');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'Left');
		$this->db->where('order_menu.order_id', $orderid);
		$query = $this->db->get();
		$result = $query->result();

		foreach ($result as $single) {
			$isexist = $this->db->select('*')->from('tbl_kitchen_order')->where('kitchenid', $single->kitchenid)->where('orderid', $single->order_id)->where('itemid', $single->menu_id)->where('varient', $single->varientid)->get()->row();
			if (empty($isexist)) {
				$inserekit = array(
					'kitchenid'			=>	$single->kitchenid,
					'orderid'			=>	$single->order_id,
					'itemid'		    =>	$single->menu_id,
					'varient'		    =>	$single->varientid,
				);
				$this->db->insert('tbl_kitchen_order', $inserekit);
			}
			$updatetmenu = array(
				'food_status'           => 1,
				'allfoodready'     	   => 1
			);
			$this->db->where('order_id', $orderid);
			$this->db->update('order_menu', $updatetmenu);
		}
	}
	public function add_multipay($orderid, $billid, $array_post)
	{
		$multipay = array(
			'order_id'			=>	$orderid,
			'payment_type_id'	=>	$array_post['paytype'],
			'amount'		    =>	$array_post['payamont'],
		);

		$this->db->insert('multipay_bill', $multipay);
		$multipay_id = $this->db->insert_id();
		$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $orderid)->get()->row();
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		if ($array_post['paytype'] != 1) {
			if ($array_post['paytype'] == 4) {
				$headcode = 1020101;
			} else {
				$paytype = $this->db->select('payment_method')->from('payment_method')->where('payment_method_id', $array_post['paytype'])->get()->row();
				$coainfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $paytype->payment_method)->get()->row();
				$headcode = $coainfo->HeadCode;
			}
			$saveid = $this->session->userdata('id');

			//Income for company
			$income3 = array(
				'VNo'            => "Sale" . $orderinfo->saleinvoice,
				'Vtype'          => 'Sales Products',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          => $headcode,
				'Narration'      => 'Sale Income For Online payment' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
				'Debit'          => $array_post['payamont'],
				'Credit'         => 0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $income3);
		}

		if ($array_post['paytype'] == 1) {
			$cardinfo = array(
				'bill_id'			    =>	$billid,
				'multipay_id'			=>	$multipay_id,
				'card_no'		        =>	$array_post['mydigit'],
				'terminal_name'		    =>	$array_post['cterminal'],
				'bank_name'	            =>	$array_post['mybank'],
			);

			$this->db->insert('bill_card_payment', $cardinfo);
			$bankinfo = $this->db->select('bank_name')->from('tbl_bank')->where('bankid', $array_post['mybank'])->get()->row();
			$coainfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankinfo->bank_name)->get()->row();

			$saveid = $this->session->userdata('id');
			$income2 = array(
				'VNo'            => "Sale" . $orderinfo->saleinvoice,
				'Vtype'          => 'Sales Products',
				'VDate'          => $orderinfo->order_date,
				'COAID'          => $coainfo->HeadCode,
				'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
				'Debit'          => $array_post['payamont'],
				'Credit'         => 0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $income2);
		}
	}

	public function changeMargeorder()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['orderamount'] = $this->input->post('paidamount', true);
		$discount                = $this->input->post('granddiscount', true);
		$singlediscount          = $this->input->post('discount', true);
		$grandtotal              = $this->input->post('grandtotal', true);
		$data['rendom_number'] = generateRandomStr();
		$data['multipay'] = $this->input->post('paytype', true);
		$data['allcard'] = $this->input->post('card_terminal', true);
		$data['allbank'] = $this->input->post('bank', true);
		$data['alldigity'] = $this->input->post('last4digit', true);
		$i = 0;
		$countord = count($this->input->post('order', true));
		$countpay = count($this->input->post('paytype', true));



		foreach ($this->input->post('order', true) as $order_id) {
			$this->removeformstock($order_id);
			$this->db->where('order_id', $order_id)->delete('table_details');
			$paytype = $this->input->post('paytype', true);
			$myterminal = $this->input->post('card_terminal', true);
			$mibank = $this->input->post('bank', true);
			$midigit = $this->input->post('last4digit', true);
			$orderinfo = $this->order_model->uniqe_order_id($order_id);
			$prebill = $this->db->select('*')->from('bill')->where('order_id', $order_id)->get()->row();
			$disamount = $discount / $countord;
			$updatetord = array(
				'totalamount'            => $orderinfo->totalamount - $disamount,
				'customerpaid'           => $orderinfo->totalamount - $disamount
			);
			$this->db->where('order_id', $order_id);
			$this->db->update('customer_order', $updatetord);

			$settinginfo = $this->order_model->settinginfo();
			if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
				$updatetDatap = array('invoiceprint' => 2);
				$this->db->where('order_id', $orderid);
				$this->db->update('customer_order', $updatetDatap);
			}

			if ($disamount > 0) {
				$finaldis = $disamount + $prebill->discount;
			} else {
				$finaldis = $prebill->discount;
			}
			$updatetprebill = array(
				'discount'              => $finaldis,
				'bill_amount'           => $orderinfo->totalamount - $disamount
			);
			$this->db->where('order_id', $order_id);
			$this->db->update('bill', $updatetprebill);


			$data['orderid'] = $order_id;
			$data['status'] = 4;
			$data['paytype'] = $paytype[$i];
			$data['cterminal'] = $myterminal[$i];
			$data['mybank'] = $mibank[$i];
			$data['mydigit'] = $midigit[$i];
			$data['customer_id'] = $orderinfo->customer_id;
			$data['paid'] = $orderinfo->totalamount;
			$this->changestatusOrder($data);

			$i++;
		}
		$ordarray = $this->input->post('order', true);
		$checkismargeid = $this->db->select('*')->from('customer_order')->where('order_id', $ordarray[0])->get()->row();
		if (empty($checkismargeid)) {
			$marge_order_id = date('Y-m-d') . _ . $data['rendom_number'];
		} else {
			$marge_order_id = $checkismargeid->marge_order_id;
		}

		$mydata['margeid'] = $marge_order_id;
		$allorderinfo = $this->order_model->margeview($marge_order_id);
		$allorderid = '';
		$totalamount = 0;
		$m = 0;
		foreach ($allorderinfo as $ordersingle) {
			$mydata['billorder'][$m] = $ordersingle->order_id;
			$allorderid .= $ordersingle->order_id . ',';
			$totalamount = $totalamount + $ordersingle->totalamount;

			$m++;
		}
		$mydata['billinfo'] = $this->order_model->margebill($marge_order_id);
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $mydata['billinfo'][0]->order_id)->get()->row();
		$mydata['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $billinfo->create_by));
		$mydata['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $mydata['billinfo'][0]->customer_id));
		$mydata['billdate'] = $billinfo->bill_date;
		$mydata['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $mydata['billinfo'][0]->table_no));
		$mydata['iteminfo'] = $allorderinfo;
		$mydata['grandtotalamount'] = $totalamount;
		$settinginfo = $this->order_model->settinginfo();
		$mydata['settinginfo'] = $settinginfo;
		$mydata['taxinfos'] = $this->taxchecking();
		$mydata['storeinfo']      = $settinginfo;
		$mydata['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$mpayinfo = $this->db->select('order_id')->from('customer_order')->where('marge_order_id', $marge_order_id)->get()->result();
		foreach ($mpayinfo as $nmpay) {
			$billpaymethod = $this->db->select('payment_method_id')->from('bill')->where('order_id', $nmpay->order_id)->get()->row();
			if (empty($billpaymethod->payment_method_id)) {
				$this->db->where('order_id', $nmpay->order_id);
				$this->db->update('bill', array('payment_method_id' => $billinfo->payment_method_id));
			}
		}
		echo $viewprint = $this->load->view('posmargeprint', $mydata, true);
	}
	public function changeMargedue()
	{
		$data['rendom_number'] = generateRandomStr();
		$i = 0;
		$countord = count($this->input->post('order', true));
		$marge_order_id = date('Y-m-d') . _ . $data['rendom_number'];
		foreach ($this->input->post('order', true) as $order_id) {
			$updatetprebill = array(
				'marge_order_id'              => $marge_order_id,
			);
			$this->db->where('order_id', $order_id);
			$this->db->update('customer_order', $updatetprebill);
		}
		$this->checkprintdue($marge_order_id);
	}
	public function checkprintdue($marge_order_id)
	{
		$mydata['margeid'] = $marge_order_id;
		$allorderinfo = $this->order_model->margeview($marge_order_id);
		$allorderid = '';
		$totalamount = 0;
		$m = 0;
		foreach ($allorderinfo as $ordersingle) {
			$mydata['billorder'][$m] = $ordersingle->order_id;
			$allorderid .= $ordersingle->order_id . ',';
			$totalamount = $totalamount + $ordersingle->totalamount;

			$m++;
		}
		$mydata['billinfo'] = $this->order_model->margebill($marge_order_id);
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $mydata['billinfo'][0]->order_id)->get()->row();
		$mydata['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $billinfo->create_by));

		$mydata['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $mydata['billinfo'][0]->customer_id));
		$mydata['billdate'] = $billinfo->bill_date;
		$mydata['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $mydata['billinfo'][0]->table_no));
		$mydata['iteminfo'] = $allorderinfo;
		$mydata['grandtotalamount'] = $totalamount;
		$settinginfo = $this->order_model->settinginfo();
		$mydata['settinginfo'] = $settinginfo;
		$mydata['taxinfos'] = $this->taxchecking();
		$mydata['storeinfo']      = $settinginfo;
		$mydata['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		echo $viewprint = $this->load->view('posmargeprintdue', $mydata, true);
	}
	public function checkprint($marge_order_id)
	{
		$mydata['margeid'] = $marge_order_id;
		$allorderinfo = $this->order_model->margeview($marge_order_id);
		$allorderid = '';
		$totalamount = 0;
		$m = 0;
		foreach ($allorderinfo as $ordersingle) {
			$mydata['billorder'][$m] = $ordersingle->order_id;
			$allorderid .= $ordersingle->order_id . ',';
			$totalamount = $totalamount + $ordersingle->totalamount;

			$m++;
		}
		$mydata['billinfo'] = $this->order_model->margebill($marge_order_id);
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $mydata['billinfo'][0]->order_id)->get()->row();
		$mydata['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $billinfo->create_by));

		$mydata['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $mydata['billinfo'][0]->customer_id));
		$mydata['billdate'] = $billinfo->bill_date;
		$mydata['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $mydata['billinfo'][0]->table_no));
		$mydata['iteminfo'] = $allorderinfo;
		$mydata['grandtotalamount'] = $totalamount;
		$settinginfo = $this->order_model->settinginfo();
		if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
			$updatetData = array('invoiceprint' => 2);
			$this->db->where('marge_order_id', $marge_order_id);
			$this->db->update('customer_order', $updatetData);
		}
		$mydata['settinginfo'] = $settinginfo;
		$mydata['taxinfos'] = $this->taxchecking();
		$mydata['storeinfo']      = $settinginfo;
		$mydata['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		echo $viewprint = $this->load->view('posmargeprint', $mydata, true);
	}
	public function changestatusOrder($value)
	{
		$saveid = $this->session->userdata('id');
		$orderid                 = $value['orderid'];
		$status                 = $value['status'];
		$paytype                 = $value['paytype'];
		$cterminal                 = $value['cterminal'];
		$mybank                  = $value['mybank'];
		$mydigit                 = $value['mydigit'];
		$paidamount              = $value['paid'];
		$multipayment               = $value['multipay'];
		$multipayid               = $value['rendom_number'];
		$orderamount			= $value['orderamount'];
		$allcard				= $value['allcard'];
		$allbank				= $value['allbank'];
		$alldigity			= $value['alldigity'];

		$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $orderid)->get()->row();
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		/***********Add pointing***********/
		$customerid = $orderinfo->customer_id;
		$scan = scandir('application/modules/');
		$getcus = "";
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$getcus = $customerid;
				}
			}
		}
		if (!empty($getcus)) {
			$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
			$totalgrtotal = round($finalgrandtotal);
			$checkpointcondition = "$totalgrtotal BETWEEN amountrangestpoint AND amountrangeedpoint";
			$getpoint = $this->db->select("*")->from('tbl_pointsetting')->get()->row();
			$calcpoint = $getpoint->earnpoint / $getpoint->amountrangestpoint;
			$thisordpoint = $calcpoint * $totalgrtotal;
			if (empty($isexitscusp)) {
				$updateum = array('membership_type' => 1);
				$this->db->where('customer_id', $customerid);
				$this->db->update('customer_info', $updateum);
				$pointstable2 = array(
					'customerid'   => $customerid,
					'amount'       => $totalgrtotal,
					'points'       => $thisordpoint + 10
				);
				$this->order_model->insert_data('tbl_customerpoint', $pointstable2);
			} else {
				$pamnt = $isexitscusp->amount + $totalgrtotal;
				$tpoints = $isexitscusp->points + $thisordpoint;
				$updatecpoint = array('amount' => $pamnt, 'points' => $tpoints);
				$this->db->where('customerid', $customerid);
				$this->db->update('tbl_customerpoint', $updatecpoint);
			}
			$updatemember = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
			$lastupoint = $updatemember->points;
			$updatecond = "'" . $lastupoint . "' BETWEEN startpoint AND endpoint";
			$checkmembership = $this->db->select("*")->from('membership')->where($updatecond)->get()->row();
			if (!empty($checkmembership)) {
				$updatememsp = array('membership_type' => $checkmembership->id);
				$this->db->where('customer_id', $customerid);
				$this->db->update('customer_info', $updatememsp);
			}
			$isredeem = $this->input->post('isredeempoint', true);
			if (!empty($isredeem)) {
				$updateredeem = array('amount' => 0, 'points' => 0);
				$this->db->where('customerid', $isredeem);
				$this->db->update('tbl_customerpoint', $updateredeem);
			}
		}

		/*******end Point**************/
		$marge_order_id = date('Y-m-d') . _ . $value['rendom_number'];
		$updatetData = array(
			'marge_order_id' => $marge_order_id,
			'order_status'     => $status,
		);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData);
		//Update Bill Table
		$updatetbill = array(
			'bill_status'           => 1,
			'payment_method_id'     => $paytype,
			'create_by'			   => $saveid,
			'create_at'     		   => date('Y-m-d H:i:s')
		);
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetbill);
		$billinfo = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
		if (!empty($billinfo)) {
			$billid = $billinfo->bill_id;
			$checkmultipay = $this->db->select('*')->from('multipay_bill')->where('multipayid', $marge_order_id)->get()->row();
			$payid = '';
			if (empty($checkmultipay)) {
				$k = 0;
				foreach ($multipayment as $ptype) {
					$multipay = array(
						'order_id'			=>	$orderid,
						'payment_type_id'	=>	$ptype,
						'multipayid'		=>	$marge_order_id,
						'amount'		    =>	$orderamount[$k],
					);
					$this->db->insert('multipay_bill', $multipay);
					$multipay_id = $this->db->insert_id();

					if ($ptype != 1) {
						if ($ptype == 4) {
							$headcode = 1020101;
						} else {
							$paytype = $this->db->select('payment_method')->from('payment_method')->where('payment_method_id', $ptype)->get()->row();
							$coainfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $paytype->payment_method)->get()->row();
							$headcode = $coainfo->HeadCode;
						}
						// Income for company
						$income3 = array(
							'VNo'            => "Sale" . $orderinfo->saleinvoice,
							'Vtype'          => 'Sales Products',
							'VDate'          =>  $orderinfo->order_date,
							'COAID'          => $headcode,
							'Narration'      => 'Sale Income For Online payment' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
							'Debit'          => $orderamount[$k],
							'Credit'         => 0,
							'IsPosted'       => 1,
							'CreateBy'       => $saveid,
							'CreateDate'     => $orderinfo->order_date,
							'IsAppove'       => 1
						);
						$this->db->insert('acc_transaction', $income3);
					}

					if ($ptype == 1) {
						$cardinfo = array(
							'bill_id'			    =>	$billid,
							'card_no'		        =>	$alldigity[$k],
							'terminal_name'		    =>	$allcard[$k],
							'multipay_id'	   		=>	$multipay_id,
							'bank_name'	            =>	$allbank[$k],
						);
						$this->db->insert('bill_card_payment', $cardinfo);

						$bankinfo = $this->db->select('bank_name')->from('tbl_bank')->where('bankid', $allbank[$k])->get()->row();
						$coainfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankinfo->bank_name)->get()->row();

						$saveid = $this->session->userdata('id');
						$income2 = array(
							'VNo'            => "Sale" . $orderinfo->saleinvoice,
							'Vtype'          => 'Sales Products',
							'VDate'          =>  $orderinfo->order_date,
							'COAID'          => $coainfo->HeadCode,
							'Narration'      => 'Sale Income For Bank debit' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
							'Debit'          => $orderamount[$k],
							'Credit'         => 0,
							'IsPosted'       => 1,
							'CreateBy'       => $saveid,
							'CreateDate'     => $orderinfo->order_date,
							'IsAppove'       => 1
						);
						$this->db->insert('acc_transaction', $income2);
					}
					$k++;
				}
			}
		}
		if ($status == 4) {
			$customerinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $billinfo->customer_id)->get()->row();
		}
		$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $orderid)->get()->row();
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		$this->savekitchenitem($orderid);
		$finalill = $this->db->select('*')->from('bill')->where('order_id', $orderid)->get()->row();
		$headn = $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name;
		$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
		$customer_headcode = $coainfo->HeadCode;

		$invoice_no = $orderinfo->saleinvoice;
		$saveid = $this->session->userdata('id');
		$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
		if ($isvatinclusive->isvatinclusive == 1) {
			$isvatin = 1;
			$finalbillamnt = $finalill->bill_amount - $finalill->VAT;
		} else {
			$finalbillamnt = $finalill->bill_amount;
			$isvatin = 0;
		}
		//Customer debit for Product Value
		$cosdr = array(
			'VNo'            =>  $invoice_no,
			'Vtype'          =>  'CIV',
			'VDate'          =>  $orderinfo->order_date,
			'COAID'          =>  $customer_headcode,
			'Narration'      =>  'Customer debit for Product Invoice#' . $invoice_no,
			'Debit'          =>  $finalbillamnt,
			'Credit'         =>  0,
			'StoreID'        =>  0,
			'IsPosted'       => 1,
			'CreateBy'       => $saveid,
			'CreateDate'     => $orderinfo->order_date,
			'IsAppove'       => 1
		);
		$this->db->insert('acc_transaction', $cosdr);
		//Store credit for Product Value
		$sc = array(
			'VNo'            =>  $invoice_no,
			'Vtype'          =>  'CIV',
			'VDate'          =>  $orderinfo->order_date,
			'COAID'          =>  10107,
			'Narration'      =>  'Inventory Credit for Product Invoice#' . $invoice_no,
			'Debit'          =>  0,
			'Credit'         =>  $finalbillamnt,
			'StoreID'        =>  0,
			'IsPosted'       => 1,
			'CreateBy'       => $saveid,
			'CreateDate'     => $orderinfo->order_date,
			'IsAppove'       => 1
		);
		$this->db->insert('acc_transaction', $sc);

		// Customer Credit for paid amount.
		$cc = array(
			'VNo'            =>  $invoice_no,
			'Vtype'          =>  'CIV',
			'VDate'          =>  $orderinfo->order_date,
			'COAID'          =>  $customer_headcode,
			'Narration'      =>  'Customer Credit for Product Invoice#' . $invoice_no,
			'Debit'          =>  0,
			'Credit'         =>  $finalbillamnt,
			'StoreID'        =>  0,
			'IsPosted'       => 1,
			'CreateBy'       => $saveid,
			'CreateDate'     => $orderinfo->order_date,
			'IsAppove'       => 1
		);
		$this->db->insert('acc_transaction', $cc);
		// Income for company							 
		$income = array(
			'VNo'            => "Sale" . $orderinfo->saleinvoice,
			'Vtype'          => 'Sales Products',
			'VDate'          =>  $orderinfo->order_date,
			'COAID'          => 303,
			'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
			'Debit'          => 0,
			'Credit'         => $finalill->bill_amount - $finalill->VAT, //purchase price asbe
			'IsPosted'       => 1,
			'CreateBy'       => $saveid,
			'CreateDate'     => $orderinfo->order_date,
			'IsAppove'       => 1
		);
		$this->db->insert('acc_transaction', $income);

		if ($isvatin != 1) {
			// Tax Pay for company							 
			$income = array(
				'VNo'            => "Sale" . $orderinfo->saleinvoice,
				'Vtype'          => 'Sales Products Vat',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          => 502030101,
				'Narration'      => 'Sale TAX For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
				'Debit'          => $finalill->VAT,
				'Credit'         => 0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $income);
		}

		$logData = array(
			'action_page'         => display('order_list'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);
		$this->logs_model->log_recorded($logData);
	}

	public function showljslang()
	{
		$settinginfo = $this->order_model->settinginfo();
		$data['language'] = $this->order_model->settinginfolanguge($settinginfo->language);

		header('Content-Type: text/javascript');
		echo ('window.lang = ' . json_encode($data['language']) . ';');
		exit();
	}

	public function checktablecap($id=0)
	{
		$value = $this->order_model->read('person_capicity', 'rest_table', array('tableid' => $id));
		// print_r($value);
		// exit;
		$total_sum = $this->order_model->get_table_total_customer($id);
		$present_free = $value->person_capicity - $total_sum->total;
		echo $present_free;
		exit;
	}

	public function showtablemodal()
	{
		$data['tablefloor'] = $this->order_model->tablefloor();
		$this->load->view('tablemodal', $data);
	}

	public function showtablemodalpopup()
	{
		$data['tablefloor'] = $this->order_model->tablefloor();
		$data['soundsetting'] = $this->order_model->read('*', 'tbl_soundsetting', array('soundid' => 1));
		$data['tableinfo'] =  $this->order_model->get_all_table_total();
		$data['reservations'] = $this->order_model->get_reservation();
		
		$this->load->view('tablemodalNew', $data);
	}

	public function showtablemodalnew($tableid = null)
	{
		$data['tableinfo'] = $this->order_model->get_table_total_bytableid($tableid);
		$this->load->view('tablebookviewmodal', $data);
	}

	public function fllorwisetable()
	{
		$floorid = $this->input->post('floorid');
		$data['tableinfo'] = $this->order_model->get_table_total($floorid);
		$this->load->view('tableview', $data);
	}
	public function delete_table_details($id)
	{
		$this->db->where('id', $id)->delete('table_details');
		echo '1';
	}
	public function delete_table_details_all($id)
	{
		$this->db->where('table_id', $id)->delete('table_details');
		echo '1';
	}
	public function checkstock()
	{

		$orderid = $this->input->post('orderid');
		$iteminfos       = $this->order_model->customerorder($orderid);
		$available = 1;
		foreach ($iteminfos as $iteminfo) {
			$foodid = $iteminfo->menu_id;
			$qty = $iteminfo->menuqty;
			$vid = $iteminfo->varientid;
			$available = $this->order_model->checkingredientstockOrder($foodid, $vid, $qty);
			if ($available != 1) {
				break;
			}
		}
		echo $available;
	}

	public function removeformstock($orderid)
	{
		$possetting = $this->db->select('*')->from('tbl_posetting')->where('possettingid', 1)->get()->row();
		if ($possetting->productionsetting == 1) {
			$items = $this->order_model->customerorder($orderid);
			foreach ($items as $item) {

				$this->order_model->insert_product($item->menu_id, $item->varientid, $item->menuqty);
			}
		}
		return $possetting->productionsetting;
	}

	/*start split order methods*/
	public function showsplitorder($orderid)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$array_id  = array('order_id' => $orderid);
		$order_info = $this->order_model->read('*', 'customer_order', $array_id);
		$settinginfo = $this->order_model->settinginfo();
		$data['settinginfo'] = $settinginfo;
		$data['taxinfos'] = $this->taxchecking();
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['order_info'] = $order_info;
		$data['iteminfo']       = $this->order_model->customerorder($orderid);
		$data['module'] = "ordermanage";
		$data['suborder_info'] = $this->order_model->read_all('*', 'sub_order', $array_id);
		$i = 0;
		if (!empty($data['suborder_info'])) {
			foreach ($data['suborder_info'] as $suborderitem) {
				if (!empty($suborderitem->order_menu_id)) {
					$presentsub = unserialize($suborderitem->order_menu_id);
					$menuarray = array_keys($presentsub);
					$data['suborder_info'][$i]->suborderitem = $this->order_model->updateSuborderDatalist($menuarray);
				} else {
					$data['suborder_info'][$i]->suborderitem = '';
				}
				$i++;
			}
		}
		$array_bill = array('order_id' => $orderid);
		$data['service'] = $this->order_model->read('service_charge', 'bill', $array_bill);
		$data['customerlist']   = $this->order_model->customer_dropdown();
		$this->load->view('ordermanage/splitorder', $data);
	}
	public function showsuborder($num)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$orderid = $this->input->post('orderid');
		$array_biil_id = array('order_id' => $orderid);
		$billinfo = $this->order_model->read('*', 'bill', $array_biil_id);
		$data['num'] = $num;
		$data['service_chrg_data'] = $billinfo->service_charge / $num;
		$data['orderid'] = $orderid;
		$data['customerlist']   = $this->order_model->customer_dropdown();
		$insertid = array();
		$this->db->where('order_id', $orderid)->delete('sub_order');
		for ($i = 0; $i < $num; $i++) {
			$sub_order = array(
				'order_id' => $orderid,

			);
			$this->db->insert('sub_order', $sub_order);
			$insertid[$i] = $this->db->insert_id();
		}
		$data['suborderid'] = $insertid;
		$this->load->view('ordermanage/showsuborder', $data);
	}



	public function showsuborderdetails()
	{
		$orderid = $this->input->post('orderid');
		$array_id  = array('order_id' => $orderid);
		$menuid = $this->input->post('menuid');
		$suborderid = $this->input->post('suborderid');
		$service_chrg_data = $this->input->post('service_chrg', true);
		$sdtotal = $this->order_model->read('service_charge', 'bill', $array_bill);
		$data['suborder_info'] = $this->order_model->read_all('*', 'sub_order', $array_id);
		//print_r($data['suborder_info']);
		$order_menu = $this->order_model->updateSuborderData($menuid);
		$presentsub = array();
		$array_id = array('sub_id' => $suborderid);
		$addonsidarray = '';
		$addonsqty = '';
		$order_sub = $this->order_model->read('*', 'sub_order', $array_id);
		$check_id = array('order_menuid' => $menuid);
		$check_info = $this->order_model->read('*', 'check_addones', $check_id);
		if (!empty($order_menu->add_on_id) && empty($check_info)) {

			$addonsidarray = $order_menu->add_on_id;
			$addonsqty = $order_menu->addonsqty;

			$is_addons = array(
				'order_menuid' => $menuid,
				'sub_order_id' => $suborderid,
				'status' => 1

			);
			$this->db->insert('check_addones', $is_addons);
		}
		if (!empty($order_sub->order_menu_id)) {
			$presentsub = unserialize($order_sub->order_menu_id);
			if (array_key_exists($menuid, $presentsub)) {
				$presentsub[$menuid] = $presentsub[$menuid] + 1;
			} else {
				$presentsub[$menuid] = 1;
			}
		} else {
			$presentsub = array($menuid => 1);
		}
		$order_menu_id = serialize($presentsub);

		if (empty($addonsidarray)) {
			$updatetready = array(
				'order_menu_id'           => $order_menu_id,

			);
		} else {
			$updatetready = array(
				'order_menu_id'           => $order_menu_id,
				'adons_id'				  => $addonsidarray,
				'adons_qty'				  => $addonsqty
			);
		}
		$this->db->where('sub_id', $suborderid);
		$this->db->update('sub_order', $updatetready);
		$menuarray = array_keys($presentsub);
		$data['iteminfo'] = $this->order_model->updateSuborderDatalist($menuarray);
		$data['taxinfos'] = $this->taxchecking();
		$data['presenttab'] = $presentsub;
		$data['settinginfo'] = $this->order_model->settinginfo();
		$data['suborderid'] = $suborderid;
		$data['service_chrg_data'] = $service_chrg_data;
		$data['SDtotal'] = $sdtotal;

		$this->load->view('ordermanage/showsuborderdetails', $data);
	}

	public function paysuborder()
	{
		$service = $this->input->post('service', true);
		$sub_id = $this->input->post('sub_id');
		$vat = $this->input->post('vat', true);
		$total = $this->input->post('total', true);
		$customerid = $this->input->post('customerid');
		$gtotal = $service + $vat + $total;
		$updatetordfordiscount = array(
			'vat'           => $vat,
			's_charge'      => $service,
			'total_price'   => $total,
			'customer_id'   => $customerid,

		);

		$this->db->where('sub_id', $sub_id);
		$this->db->update('sub_order', $updatetordfordiscount);
		$data['settinginfo'] = $this->order_model->settinginfo();

		$data['totaldue'] = $gtotal;
		$data['sub_id'] = $sub_id;
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();

		$this->load->view('ordermanage/suborderpay', $data);
	}

	public function paymultiplsub()
	{

		$postdata				 = $this->input->post();
		$discount                = $this->input->post('granddiscount', true);
		$grandtotal              = $this->input->post('grandtotal', true);
		$orderid                 = $this->input->post('orderid', true);
		$paytype                 = $this->input->post('paytype', true);
		$cterminal               = $this->input->post('card_terminal', true);
		$mybank                  = $this->input->post('bank', true);
		$mydigit                 = $this->input->post('last4digit', true);
		$payamonts               = $this->input->post('paidamount', true);
		$paidamount = 0;
		$updatetordfordiscount = array(
			'status'           => 1,
			'discount'     		 => $discount

		);

		$this->db->where('sub_id', $orderid);
		$this->db->update('sub_order', $updatetordfordiscount);
		$settinginfo = $this->order_model->settinginfo();
		if ($settinginfo->printtype == 1 || $settinginfo->printtype == 3) {
			$updatetData = array('invoiceprint' => 2);
			$this->db->where('sub_id', $orderid);
			$this->db->update('sub_order', $updatetData);
		}
		$array_id = array('sub_id' => $orderid);
		$order_sub = $this->order_model->read('*', 'sub_order', $array_id);
		$order_id = $order_sub->order_id;
		$array_biil_id = array('order_id' => $order_id);
		$billinfo = $this->order_model->read('*', 'bill', $array_biil_id);
		$i = 0;

		foreach ($payamonts  as $payamont) {
			$paidamount = $paidamount + $payamont;
			$data_pay = array('paytype' => $paytype[$i], 'cterminal' => $cterminal[$i], 'mybank' => $mybank[$i], 'mydigit' => $mydigit[$i], 'payamont' => $payamont);
			$this->add_multipay($order_id, $billinfo->bill_id, $data_pay);
			$i++;
		}


		$logData = array(
			'action_page'         => display('order_list'),
			'action_done'     	 => "Insert Data",
			'remarks'             => "Order is Update",
			'user_name'           => $this->session->userdata('fullname'),
			'entry_date'          => date('Y-m-d H:i:s'),
		);

		$this->logs_model->log_recorded($logData);
		$where_array = array('status' => 0, 'order_id' => $order_id);
		$orderData = array(
			'splitpay_status'     => 1,
			'invoiceprint'     => 2,
		);
		$this->db->where('order_id', $order_id);

		$this->db->update('customer_order', $orderData);
		$totalorder = $this->db->select('*')->from('sub_order')->where('status', 0)->where('order_id', $order_id)->get()->num_rows();
		if ($totalorder == 0) {
			$totandiscount = $this->db->select('SUM(discount) as totaldiscount')->from('sub_order')->where('order_id', $order_id)->get()->row();
			$billinfo = $this->db->select('bill_amount')->from('bill')->where('order_id', $order_id)->get()->row();
			$saveid = $this->session->userdata('id');
			$this->savekitchenitem($order_id);
			$this->removeformstock($order_id);
			$orderData = array(
				'order_status'     => 4,
			);
			$this->db->where('order_id', $order_id);
			$this->db->update('customer_order', $orderData);

			$updatetbill = array(
				'bill_status'           => 1,
				'discount'			   => $totandiscount->totaldiscount,
				'bill_amount'		   => $billinfo->bill_amount - $totandiscount->totaldiscount,
				'payment_method_id'     => $paytype[0],
				'create_by'     		   => $saveid,
				'create_at'     		   => date('Y-m-d H:i:s')
			);
			$this->db->where('order_id', $order_id);
			$this->db->update('bill', $updatetbill);
			$this->savekitchenitem($orderid);
			$this->db->where('order_id', $order_id)->delete('table_details');

			$orderinfo = $this->db->select('*')->from('customer_order')->where('order_id', $order_id)->get()->row();
			$finalill = $this->db->select('*')->from('bill')->where('order_id', $order_id)->get()->row();
			$headn = $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name;
			$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
			$customer_headcode = $coainfo->HeadCode;

			$invoice_no = $orderinfo->saleinvoice;
			$saveid = $this->session->userdata('id');
			$isvatinclusive = $this->db->select("*")->from('setting')->get()->row();
			if ($isvatinclusive->isvatinclusive == 1) {
				$isvatin = 1;
				$finalbillamnt = $finalill->bill_amount - $finalill->VAT;
			} else {
				$finalbillamnt = $finalill->bill_amount;
				$isvatin = 0;
			}
			//Customer debit for Product Value
			$cosdr = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  $customer_headcode,
				'Narration'      =>  'Customer debit for Product Invoice#' . $invoice_no,
				'Debit'          =>  $finalbillamnt,
				'Credit'         =>  0,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $cosdr);
			//Store credit for Product Value
			$sc = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  10107,
				'Narration'      =>  'Inventory Credit for Product Invoice#' . $invoice_no,
				'Debit'          =>  0,
				'Credit'         =>  $finalbillamnt,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $sc);

			// Customer Credit for paid amount.
			$cc = array(
				'VNo'            =>  $invoice_no,
				'Vtype'          =>  'CIV',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          =>  $customer_headcode,
				'Narration'      =>  'Customer Credit for Product Invoice#' . $invoice_no,
				'Debit'          =>  0,
				'Credit'         =>  $finalbillamnt,
				'StoreID'        =>  0,
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $cc);

			// Income for company							 
			$income = array(
				'VNo'            => "Sale" . $orderinfo->saleinvoice,
				'Vtype'          => 'Sales Products',
				'VDate'          =>  $orderinfo->order_date,
				'COAID'          => 303,
				'Narration'      => 'Sale Income For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
				'Debit'          => 0,
				'Credit'         => $finalill->bill_amount - $finalill->VAT, //purchase price asbe
				'IsPosted'       => 1,
				'CreateBy'       => $saveid,
				'CreateDate'     => $orderinfo->order_date,
				'IsAppove'       => 1
			);
			$this->db->insert('acc_transaction', $income);

			if ($isvatin != 1) {
				// Tax Pay for company							 
				$income = array(
					'VNo'            => "Sale" . $orderinfo->saleinvoice,
					'Vtype'          => 'Sales Products Vat',
					'VDate'          =>  $orderinfo->order_date,
					'COAID'          => 502030101,
					'Narration'      => 'Sale TAX For ' . $cusinfo->cuntomer_no . '-' . $cusinfo->customer_name,
					'Debit'          => $finalill->VAT,
					'Credit'         => 0,
					'IsPosted'       => 1,
					'CreateBy'       => $saveid,
					'CreateDate'     => $orderinfo->order_date,
					'IsAppove'       => 1
				);
				$this->db->insert('acc_transaction', $income);
			}
		}
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "updateorderlist";
		$view = $this->posprintdirectsub($orderid);

		echo $view;
		exit;
	}

	public function posprintdirectsub($id)
	{
		$array_id =  array('sub_id' => $id);
		$order_sub = $this->order_model->read('*', 'sub_order', $array_id);
		$presentsub = unserialize($order_sub->order_menu_id);
		$menuarray = array_keys($presentsub);
		$data['iteminfo'] = $this->order_model->updateSuborderDatalist($menuarray);
		$saveid = $this->session->userdata('id');
		$isadmin = $this->session->userdata('user_type');


		$data['orderinfo']  	   = $order_sub;
		$data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $order_sub->customer_id));

		$data['billinfo']	   = $this->order_model->billinfo($order_sub->order_id);
		$data['cashierinfo']   = $this->order_model->read('*', 'user', array('id' => $data['billinfo']->create_by));
		$data['mainorderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $order_sub->order_id));
		$data['tableinfo'] = $this->order_model->read('*', 'rest_table', array('tableid' => $data['mainorderinfo']->table_no));
		$settinginfo = $this->order_model->settinginfo();

		$data['settinginfo'] = $settinginfo;
		$data['storeinfo']      = $settinginfo;
		$data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
		$data['taxinfos'] = $this->taxchecking();
		$data['module'] = "ordermanage";
		$data['page']   = "posinvoice";

		$view = $this->load->view('posprintsuborder', $data, true);
		echo $view;
		exit;
	}
	public function showsplitorderlist($order)
	{


		$data['suborder_info'] = $this->order_model->showsplitorderlist($order);

		$this->load->view('showsuborderlist', $data);
	}

	/*end split order methods*/
	/**Item information for kitchen*/
	public function counterlist()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('counter_list');
		$data['module'] 	= "ordermanage";
		$data['counterlist'] = $this->db->select('*')->from('tbl_cashcounter')->get()->result();
		$data['page']   = "cashcounter";
		echo Modules::run('template/layout', $data);
	}
	public function createcounter()
	{
		$data['title'] = display('counter_list');
		$this->form_validation->set_rules('counter', display('counter'), 'required');
		$postData = array(
			'ccid' 	        	=> $id,
			'counterno' 	        => $this->input->post('counter', true),
		);

		if ($this->form_validation->run() === true) {
			if ($this->order_model->createcounter($postData)) {
				#set success message
				$this->session->set_flashdata('message', display('save_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			redirect('ordermanage/order/counterlist');
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
			redirect('ordermanage/order/counterlist');
		}
	}
	public function editcounter($id)
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('counter_list');
		$this->form_validation->set_rules('counter', display('counter'), 'required');
		$postData = array(
			'ccid' 	        		=> $id,
			'counterno' 	        => $this->input->post('counter', true),
		);
		if ($this->form_validation->run() === true) {
			if ($this->order_model->updatecounter($postData)) {
				#set success message
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			redirect('ordermanage/order/counterlist');
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
			redirect('ordermanage/order/counterlist');
		}
	}
	public function deletecounter($menuid = null)
	{
		$this->permission->method('ordermanage', 'delete')->redirect();
		if ($this->order_model->deletecounter($menuid)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('ordermanage/order/counterlist');
	}
	public function cashregister()
	{
		$saveid = $this->session->userdata('id');
		$checkuser = $this->db->select('*')->from('tbl_cashregister')->where('userid', $saveid)->where('status', 0)->order_by('id', 'DESC')->get()->row();
		$openamount = $this->db->select('closing_balance')->from('tbl_cashregister')->where('userid', $saveid)->where('closing_balance>', '0.000')->order_by('id', 'DESC')->get()->row();

		$counterlist = $this->db->select('*')->from('tbl_cashcounter')->get()->result();
		$list[''] = 'Select Counter No';
		if (!empty($counterlist)) {
			foreach ($counterlist as $value)
				$list[$value->counterno] = $value->counterno;
		}
		$data['allcounter'] = $list;
		if (empty($checkuser)) {
			if ($openamount->closing_balance > '0.000') {
				$data['openingbalance'] = $openamount->closing_balance;
			} else {
				$data['openingbalance'] = "0.000";
			}
			$this->load->view('cashregister', $data);
		} else {
			echo 1;
			exit;
		}
	}
	public function addcashregister()
	{
		$this->form_validation->set_rules('counter', display('counter'), 'required');
		$this->form_validation->set_rules('totalamount', display('amount'), 'required');
		$saveid = $this->session->userdata('id');
		$counter = $this->input->post('counter', true);
		$openingamount = $this->input->post('totalamount', true);
		$checkuser = $this->db->select('*')->from('tbl_cashregister')->where('counter_no', $counter)->where('status', 0)->order_by('id', 'DESC')->get()->row();


		if ($this->form_validation->run() === true) {
			$postData = array(
				'userid' 	        => $saveid,
				'counter_no' 	    => $this->input->post('counter', true),
				'opening_balance' 	=> $this->input->post('totalamount', true),
				'closing_balance' 	=> '0.000',
				'openclosedate' 	=> date('Y-m-d'),
				'opendate' 	        => date('Y-m-d H:i:s'),
				'closedate' 	    => "1970-01-01 00:00:00",
				'status' 	        => 0,
				'openingnote' 	    => $this->input->post('OpeningNote', true),
				'closing_note' 	    => "",
			);
			if (empty($checkuser)) {
				if ($this->order_model->addopeningcash($postData)) {
					echo 1;
				} else {
					echo 0;
				}
			} else {
				echo 0;
			}
		} else {
			echo 0;
		}
	}
	public function cashregisterclose()
	{
		$saveid = $this->session->userdata('id');
		$checkuser = $this->db->select('*')->from('tbl_cashregister')->where('userid', $saveid)->where('status', 0)->order_by('id', 'DESC')->get()->row();
		$data['userinfo'] = $this->db->select('*')->from('user')->where('id', $saveid)->get()->row();
		$data['registerinfo'] = $checkuser;
		$data['totalamount'] = $this->order_model->collectcash($saveid, $checkuser->opendate);
		if (!empty($checkuser)) {
			$this->load->view('cashregisterclose', $data);
		} else {
			echo 1;
			exit;
		}
	}
	public function closecashregister()
	{
		$this->form_validation->set_rules('totalamount', display('amount'), 'required');
		$saveid = $this->session->userdata('id');
		$counter = $this->input->post('counter');
		$openingamount = $this->input->post('totalamount');
		$cashclose = $this->input->post('registerid');
		if ($this->form_validation->run() === true) {
			$postData = array(
				'id' 				=> $cashclose,
				'closing_balance' 	=> $this->input->post('totalamount', true),
				'closedate' 	    => date('Y-m-d H:i:s'),
				'status' 	        => 1,
				'closing_note' 	    => $this->input->post('closingnote', true),
			);
			if ($this->order_model->closeresister($postData)) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}
	public function closecashregisterprint()
	{
		$this->form_validation->set_rules('totalamount', display('amount'), 'required');
		$saveid = $this->session->userdata('id');
		$counter = $this->input->post('counter');
		$openingamount = $this->input->post('totalamount');
		$cashclose = $this->input->post('registerid');
		if ($this->form_validation->run() === true) {
			$postData = array(
				'id' 				=> $cashclose,
				'closing_balance' 	=> $this->input->post('totalamount', true),
				'closedate' 	    => date('Y-m-d H:i:s'),
				'status' 	        => 1,
				'closing_note' 	    => $this->input->post('closingnote', true),
			);
			if ($this->order_model->closeresister($postData)) {
				$checkuser = $this->db->select('*')->from('tbl_cashregister')->where('userid', $saveid)->where('status', 1)->order_by('id', 'DESC')->get()->row();
				$iteminfo = $this->order_model->summeryiteminfo($saveid, $checkuser->opendate, $checkuser->closedate);

				$i = 0;
				$order_ids = array('');
				foreach ($iteminfo as $orderid) {
					$order_ids[$i] = $orderid->order_id;
					$i++;
				}
				$addonsitem  = $this->order_model->closingaddons($order_ids);
				$k = 0;
				$test = array();
				foreach ($addonsitem as $addonsall) {
					$addons = explode(",", $addonsall->add_on_id);
					$addonsqty = explode(",", $addonsall->addonsqty);
					$x = 0;
					foreach ($addons as $addonsid) {
						$test[$k][$addonsid] = $addonsqty[$x];
						$x++;
					}
					$k++;
				}

				$final = array();
				array_walk_recursive($test, function ($item, $key) use (&$final) {
					$final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
				});
				$totalprice = 0;
				foreach ($final as $key => $item) {
					$addonsinfo = $this->db->select("*")->from('add_ons')->where('add_on_id', $key)->get()->row();
					$totalprice = $totalprice + ($addonsinfo->price * $item);
				}
				$data['addonsprice'] = $totalprice;
				$data['registerinfo'] = $checkuser;
				//$data['invsetting'] =$this->db->select('*')->from('tbl_invoicesetting')->where('invstid',1)->get()->row();
				$data['billinfo'] = $this->order_model->billsummery($saveid, $checkuser->opendate, $checkuser->closedate);
				$data['totalamount'] = $this->order_model->collectcashsummery($saveid, $checkuser->opendate, $checkuser->closedate);
				$data['totalchange'] = $this->order_model->changecashsummery($saveid, $checkuser->opendate, $checkuser->closedate);
				$data['itemsummery'] = $this->order_model->closingiteminfo($order_ids);
				echo $viewprint = $this->load->view('cashclosingsummery', $data, true);
			} else {
				echo 0;
			}
		}
	}

	public function closecashregisterprinttest()
	{
		$saveid = $this->session->userdata('id');
		//$data['invsetting'] =$this->db->select('*')->from('tbl_invoicesetting')->where('invstid',1)->get()->row();
		$checkuser = $this->db->select('*')->from('tbl_cashregister')->where('userid', $saveid)->where('status', 1)->order_by('id', 'DESC')->get()->row();
		$iteminfo = $this->order_model->summeryiteminfo($saveid, $checkuser->opendate, $checkuser->closedate);
		$i = 0;
		$order_ids = array('');
		foreach ($iteminfo as $orderid) {
			$order_ids[$i] = $orderid->order_id;
			$i++;
		}
		$addonsitem  = $this->order_model->closingaddons($order_ids);
		$k = 0;
		$test = array();
		foreach ($addonsitem as $addonsall) {
			$addons = explode(",", $addonsall->add_on_id);
			$addonsqty = explode(",", $addonsall->addonsqty);
			$x = 0;
			foreach ($addons as $addonsid) {
				$test[$k][$addonsid] = $addonsqty[$x];
				$x++;
			}
			$k++;
		}

		$final = array();
		array_walk_recursive($test, function ($item, $key) use (&$final) {
			$final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
		});
		$totalprice = 0;
		foreach ($final as $key => $item) {
			$addonsinfo = $this->db->select("*")->from('add_ons')->where('add_on_id', $key)->get()->row();
			$totalprice = $totalprice + ($addonsinfo->price * $item);
		}
		$data['addonsprice'] = $totalprice;
		$data['registerinfo'] = $checkuser;
		$data['billinfo'] = $this->order_model->billsummery($saveid, $checkuser->opendate, $checkuser->closedate);
		$data['totalamount'] = $this->order_model->collectcashsummery($saveid, $checkuser->opendate, $checkuser->closedate);
		$data['totalchange'] = $this->order_model->changecashsummery($saveid, $checkuser->opendate, $checkuser->closedate);
		$data['itemsummery'] = $this->order_model->closingiteminfo($order_ids);
		$this->load->view('cashclosingsummery', $data);
	}
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
	public function soundsetting()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		$data['title'] = display('sound_setting');
		$data['soundsetting'] = $this->order_model->read('*', 'tbl_soundsetting', array('soundid' => 1));
		$data['module'] = "ordermanage";
		$data['page']   = "soundsetting";
		echo Modules::run('template/layout', $data);
	}
	public function addsound()
	{
		$soundfile = $this->fileupload->do_upload(
			'assets/',
			'notifysound'
		);
		if ($soundfile === false) {
			$this->session->set_flashdata('exception', "Invalid Sound format.Only .mp3 supported");
			redirect('ordermanage/order/soundsetting');
		}
		$data['soundsetting'] = (object)$postData = array(
			'soundid'          => $this->input->post('id'),
			'nofitysound' 	   => (!empty($soundfile) ? $soundfile : $this->input->post('old_notifysound', true))
		);
		if ($this->order_model->soundcreate($postData)) {
			#set success message
			$this->session->set_flashdata('message', display('save_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('ordermanage/order/soundsetting');
	}

	public function possettingjs()
	{
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		header('Content-Type: text/javascript');
		echo ('window.possetting = ' . json_encode($data['possetting']) . ';');
		exit();
	}
	public function quickorderjs()
	{
		$data['quickordersetting'] = $this->order_model->read('*', 'tbl_quickordersetting', array('quickordid' => 1));
		header('Content-Type: text/javascript');
		echo ('window.quickordersetting = ' . json_encode($data['quickordersetting']) . ';');
		exit();
	}
	public function basicjs()
	{
		$soundinfo = $this->order_model->read('*', 'tbl_soundsetting', array('soundid' => 1));
		$possetting = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		$settinginfo = $this->order_model->settinginfo();
		$openingtimerv = strtotime($settinginfo->reservation_open);
		$closetimerv = strtotime($settinginfo->reservation_close);
		$compareretime = strtotime(date("H:i:s A"));
		if (($compareretime >= $openingtimerv) && ($compareretime < $closetimerv)) {
			$reservationopen = 1;
		} else {
			$reservationopen = 0;
		}

		$currency = $this->order_model->currencysetting($settinginfo->currency);
		$allbasicinfo = array(
			'segment1' => $this->uri->segment(1),
			'segment2' => $this->uri->segment(2),
			'segment3' => $this->uri->segment(3),
			'segment4' => $this->uri->segment(4),
			'segment5' => $this->uri->segment(5),
			'baseurl' => base_url(),
			'curr_icon' => $currency->curr_icon,
			'position' => $currency->position,
			'discount_type' => $settinginfo->discount_type,
			'discountrate' => $settinginfo->discountrate,
			'service_chargeType' => $settinginfo->service_chargeType,
			'servicecharge' => $settinginfo->servicecharge,
			'vat' => $settinginfo->vat,
			'opentime' => $settinginfo->opentime,
			'closetime' => $settinginfo->closetime,
			'reservationopen' => $reservationopen,
			'storename' => $settinginfo->storename,
			'title' => $settinginfo->title,
			'address' => $settinginfo->address,
			'email' => $settinginfo->email,
			'phone' => $settinginfo->phone,
			'isvatnumshow' => $settinginfo->isvatnumshow,
			'vattinno' => $settinginfo->vattinno,
			'isvatinclusive' => $settinginfo->isvatinclusive,
			'logo' => $settinginfo->logo,
			'timezone' => $settinginfo->timezone,
			'printtype' => $settinginfo->printtype,
			'kitchenrefreshtime' => $settinginfo->kitchenrefreshtime,
			'nofitysound' => $soundinfo->nofitysound,
			'addtocartsound' => $soundinfo->addtocartsound,
			'csrftokeng' => $this->security->get_csrf_hash(),
		);
		$data['basicinfo'] = $allbasicinfo;
		header('Content-Type: text/javascript');
		echo ('window.basicinfo = ' . json_encode($data['basicinfo']) . ';');
		exit();
	}
	public function updateorderjs($id)
	{
		$data['customerorder'] = $this->order_model->read('*', 'customer_order', array('order_id' => $id));
		echo ('window.orderinfo = ' . json_encode($data['customerorder']) . ';');
	}

	/**
	 *  All Tables
	 */
	public function alltables()
	{
		$this->permission->method('ordermanage', 'read')->redirect();
		if ($this->permission->method('ordermanage', 'read')->access() == FALSE) {
			redirect('dashboard/auth/logout');
		}
		$data['tablefloor'] = $this->order_model->tablefloor();
		//$this->load->view('tablemodal', $data);
		//$floorid=$this->input->post('floorid');
		//$data['tableinfo'] = $this->order_model->get_table_total($floorid);
		$data['possetting'] = $this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		//$data['possetting2']=$this->order_model->read('*', 'tbl_quickordersetting', array('quickordid' => 1));
		$data['soundsetting'] = $this->order_model->read('*', 'tbl_soundsetting', array('soundid' => 1));
		$data['tableinfo'] =  $this->order_model->get_all_table_total();
		//Get Reservation details
		$data['reservations'] = $this->order_model->get_reservation();
		$data['title'] = "Counter Dashboard";
		$data['module'] = "ordermanage";
		$data['page']   = "alltables";
		echo Modules::run('template/layout', $data);
	}

	// Get Reservation Details
	public function get_reservation()
	{
		$data['reservations'] = $this->order_model->get_reservation();
		header('Content-Type: application/json');
		echo json_encode($data['reservations']);
		exit();
	}

	public function showreservationmodalnew($table = null)
	{
		$data['reservations'] = $this->order_model->get_reservationbytable($table);
		$this->load->view('tablereservationviewmodal', $data);
	}

	// API 1: Check and update reservation if order exists
	public function check_order_or_expire()
	{
		// Check if order exists
		$orderResult = $this->order_model->check_order_exists();

		if ($orderResult) {
			// If order exists
			$response = ['status' => true, 'message' => $orderResult];
		} else {
			// If no order found, check for expired reservations
			$expireResult = $this->order_model->update_expired_reservations();
			//  echo '<pre>';
			//  print_r($expireResult);
			//  exit();
			if ($expireResult) {
				$response = ['status' => true, 'message' => $expireResult];
			} else {
				$response = ['status' => false, 'message' => 'No order or expired reservations or any reservation found'];
			}
		}

		echo json_encode($response);
	}

	public function cronongoingorderconfirmbyKitchen()
	{
		// Get the logged-in waiter's ID from session
		$waiter_id = $this->session->userdata('id'); // Consistent with confirm_order_notification
		if (!$waiter_id) {
			echo json_encode(['status' => 'error', 'message' => 'Waiter not logged in']);
			return;
		}

		// Fetch orders with order_status = 3 and nofification = 0 for this waiter
		$orders = $this->order_model->get_unseen_kitchen_orders($waiter_id);

		if (!empty($orders)) {
			// Return the first order for the popup (one at a time)
			$order = $orders[0];
			$order_details = $this->order_model->get_order_details($order->order_id);

			// Prepare data for the view
			$data = [
				'order' => $order,
				'order_details' => $order_details
			];

			// Load the modal view and return as JSON
			$modal_content = $this->load->view('kitchen_order_popup', $data, TRUE);
			echo json_encode([
				'status' => 'success',
				'order_id' => $order->order_id,
				'unseen_count' => count($orders), // Number of unseen orders
				'modal_content' => $modal_content,
				'csrf_hash' => $this->security->get_csrf_hash()
			]);
		} else {
			echo json_encode([
				'status' => 'no_orders',
				'unseen_count' => 0,
				'csrf_hash' => $this->security->get_csrf_hash()
			]);
		}
	}

	// AJAX method to confirm order notification
	public function confirm_order_notification()
	{
		$order_id = $this->input->post('order_id');
		$waiter_id = $this->session->userdata('id');

		if (!$order_id || !$waiter_id) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
			return;
		}

		// Update notification status
		$update_data = ['nofification' => 1];
		$this->db->where('order_id', $order_id)
				->where('waiter_id', $waiter_id)
				->where('order_status', 3)
				->where('nofification', 0)
				->update('customer_order', $update_data);

		if ($this->db->affected_rows() > 0) {
			echo json_encode([
				'status' => 'success',
				'message' => 'Order confirmed',
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'Failed to confirm order',
			]);
		}
	}

	/**
	 * Split by Amount new code update 
	 */
   // Show split bill by amount modal
    public function showsplitbyamount($orderid)
    {
        $this->permission->method('ordermanage', 'read')->redirect();
        $array_id = array('order_id' => $orderid);
        $order_info = $this->order_model->read('*', 'customer_order', $array_id);
        $settinginfo = $this->order_model->settinginfo();
        $data['settinginfo'] = $settinginfo;
        $data['currency'] = $this->order_model->currencysetting($settinginfo->currency);
        $data['order_info'] = $order_info;
        $data['taxinfos'] = $this->taxchecking();
        $data['bill_info'] = $this->order_model->read('*', 'bill', $array_id);
        $data['iteminfo'] = $this->order_model->customerorder($orderid);
        $data['customerlist'] = $this->order_model->customer_dropdown();
        $data['module'] = "ordermanage";
        $this->load->view('ordermanage/split_bill_by_amount', $data);
    }

    // Create sub-orders based on number of people
    public function create_split_by_amount($num)
    {
        $this->permission->method('ordermanage', 'read')->redirect();
        $orderid = $this->input->post('orderid');
        $array_bill = array('order_id' => $orderid);
        $billinfo = $this->order_model->read('*', 'bill', $array_bill);
        
        $data['num'] = $num;
        $data['orderid'] = $orderid;
        $data['total_amount'] = $billinfo->bill_amount / $num;
        $data['service_charge'] = $billinfo->service_charge / $num;
        $data['vat'] = $billinfo->VAT / $num;
        $data['customerlist'] = $this->order_model->customer_dropdown();
        
        $insertid = array();
        $this->db->where('order_id', $orderid)->delete('sub_order');
        for ($i = 0; $i < $num; $i++) {
            $sub_order = array(
                'order_id' => $orderid,
                'total_price' => $data['total_amount'],
                's_charge' => $data['service_charge'],
                'vat' => $data['vat'],
            );
            $this->db->insert('sub_order', $sub_order);
            $insertid[$i] = $this->db->insert_id();
        }
        $data['suborderid'] = $insertid;
        $this->load->view('ordermanage/show_split_amounts', $data);
    }

    // Pay split bill by amount
    public function pay_split_by_amount()
    {
        $sub_id = $this->input->post('sub_id');
        $customerid = $this->input->post('customerid');
        $total = $this->input->post('total', true);
        $vat = $this->input->post('vat', true);
        $service = $this->input->post('service', true);
        
        $updatetordfordiscount = array(
            'vat' => $vat,
            's_charge' => $service,
            'total_price' => $total,
            'customer_id' => $customerid,
        );

        $this->db->where('sub_id', $sub_id);
        $this->db->update('sub_order', $updatetordfordiscount);
        
        $data['settinginfo'] = $this->order_model->settinginfo();
        $data['totaldue'] = $total + $vat + $service;
        $data['sub_id'] = $sub_id;
        $data['paymentmethod'] = $this->order_model->pmethod_dropdown();
        $data['banklist'] = $this->order_model->bank_dropdown();
        $data['terminalist'] = $this->order_model->allterminal_dropdown();
        
        $this->load->view('ordermanage/suborderpay', $data);
    }
	
}
