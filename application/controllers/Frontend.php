<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $allmenu = '';
	public $webinfo = '';
	public $widgetinfo = '';
	public $settinginfo = '';
	public $storecurrency = '';
	public $sociallink = '';
	public $themeinfo = '';
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'frontend_model'
		));
		$this->allmenu = $this->frontend_model->allmenu_dropdown(); 
		$this->themeinfo = $this->db->select('*')->from('themes')->where('status', 1)->get()->row();
		$this->webinfo = $this->db->select('*')->from('common_setting')->get()->row();
		$this->settinginfo = $this->db->select('*')->from('setting')->get()->row();
		$this->sociallink = $this->db->select('*')->from('tbl_sociallink')->where('status', 1)->get()->result();
		$this->storecurrency = $this->db->select('*')->from('currency')->where('currencyid', $this->settinginfo->currency)->get()->row();
		//$this->db->query('SET SESSION sql_mode = ""');
	}

	public function index()
	{
		$data['title'] = $this->settinginfo->title;
		$data['title2'] = "Welcome to frontend";
		$data['seoterm'] = "home";
		$data['slider_info'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '1');
		$data['banner_story'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '2');
		$data['foodhistory'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '5');
		$data['banner_menu'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '3');
		$data['reservation_sl'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '6');
		$data['gallery'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '7');
		$data['best_seller'] =  $this->frontend_model->bestseller();
		$data['food_list'] =  $this->frontend_model->FoodList();
		$data['special_menu'] =  $this->frontend_model->specialmenu();
		if ($this->themeinfo->themename == "modern") {
			$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '11'));
			$data["categorylist"] = $this->frontend_model->categories();
			$start = $this->input->post('start');
			$limit = $this->input->post('limit');
			$data["searchresult"] = $this->frontend_model->searchinfo($product = null, $category = null, $limit, $start);
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
			$data['delivarytime'] =  $this->frontend_model->read_all('*', 'tbl_delivaritime', '', '', '', '');
		}
		$data['todaymenu_menu'] =  $this->frontend_model->read_all('*', 'tbl_menutype', 'menutype', '', '', '');
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['ourteam'] =  $this->frontend_model->ourteam();
		$data['taxinfos'] = $this->taxchecking();
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/home', $data, TRUE);
		$data['todaymenu_menu'] =  $this->frontend_model->read_all('*', 'tbl_menutype', 'menutype', '', '', '');
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
        // echo $data['title2'];
		// exit;
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	public function getdelivarylocation()
	{
		$address = $this->input->post('q', true);
		$delinfo = $this->db->select("deladdress")->from('tbl_delivaryaddress')->like('deladdress', $address)->limit('15')->get()->result();
		$response = array();
		foreach ($delinfo as $address) {
			$response[] = array("value" => $address->deladdress);
		}
		echo json_encode($response);
	}
	public function checkdelivarytime()
	{
		$orderdate = $this->input->post('orddate', true);
		$delinfo = $this->db->select("*")->from('tbl_delivaritime')->get()->result();
		$option = '<option selected value="">Delivery Time</option>';
		$currenttime = date('H:i');
		$currentday = strtotime(date("Y-m-d"));
		$checkdate = strtotime($orderdate);
		foreach ($delinfo as $dtime) {
			$sptime = explode('-', $dtime->deltime);
			if ($checkdate > $currentday) {
				$option .= '<option value="' . $sptime['0'] . '">' . $dtime->deltime . '</option>';
			} else {
				if ($sptime['0'] >= $currenttime) {
					$option .= '<option value="' . $sptime['0'] . '">' . $dtime->deltime . '</option>';
				}
			}
		}
		echo $option;
	}
	public function showfoodonload()
	{
		$start = $this->input->post('start');
		$limit = $this->input->post('limit');
		$data["searchresult"] = $this->frontend_model->searchinfo($product = null, $category = null, $limit, $start);
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/loadfooditem', $data);
	}
	public function showfoodonload2()
	{
		$start = $this->input->post('start');
		$limit = $this->input->post('limit');
		$data["searchresult"] = $this->frontend_model->searchinfo($product = null, $category = null, $limit, $start);
		$this->load->view('themes/' . $this->themeinfo->themename . '/loadfooditem', $data);
	}
	public function searchitemforcat()
	{
		$itemorcat = $this->input->post('itemorcat');
		/*$allcat=$this->db->select("*")->from('item_category')->like('Name',$itemorcat)->get()->result();
		echo $this->db->last_query();
		$catid='';
		foreach($allcat as $cat){
			$catid.=$cat->CategoryID.',';
		}
		$catid=trim($catid,',');*/
		if (!empty($itemorcat)) {
			$data["searchresult"] = $this->frontend_model->searchitemcat($itemorcat);
		} else {
			$data["searchresult"] = $this->frontend_model->searchinfo($product = null, $category = null, $limit, $start);
		}
		$this->load->view('themes/' . $this->themeinfo->themename . '/loadfooditem', $data);
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
	public function mtypefood()
	{
		$mtypeid = $this->input->post('mtypeid');
		$start = $this->input->post('start');
		$limit = $this->input->post('limit');
		$data['mtype'] = $mtypeid;
		$data['todaymenu_food'] =  $this->frontend_model->todaymenu($mtypeid, $limit, $start);
		$data['taxinfos'] = $this->taxchecking();
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$this->load->view('themes/' . $this->themeinfo->themename . '/todayitems', $data);
	}
	// public function menu()
	// {
	// 	$data['title'] = "Menu";
	// 	$data['seoterm'] = "menu";
	// 	if (empty($this->session->userdata('categoryid'))) {
	// 		$categoryid = $this->input->post('category_id');
	// 	} else {
	// 		$categoryid = $this->session->userdata('categoryid');
	// 	}
	// 	$productid = $this->input->post('product_id');
	// 	$sessiondata = array('categoryid' => $categoryid, 'product_id' => $productid);
	// 	$this->session->set_userdata($sessiondata);
	// 	$product  = $this->session->userdata('product_id');
	// 	$category = $this->session->userdata('categoryid');
	// 	$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '8'));
	// 	#-------------------------------#       
	// 	#
	// 	#pagination starts
	// 	#
	// 	$config["base_url"] = base_url('menu');
	// 	$config["total_rows"]  = $this->frontend_model->count_totalitem($product, $category);
	// 	$config["per_page"]    = 20;
	// 	$config["uri_segment"] = 2;
	// 	$config["last_link"] = "Last";
	// 	$config["first_link"] = "First";
	// 	$config['next_link'] = 'Next';
	// 	$config['prev_link'] = 'Prev';
	// 	$config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
	// 	$config['full_tag_close'] = "</ul>";
	// 	$config['num_tag_open'] = "<li class='page-item'>";
	// 	$config['num_tag_close'] = '</li>';
	// 	$config['cur_tag_open'] = "<li class='disabled'><li class='page-item'><a class='page-link active' href='#'>";
	// 	$config['cur_tag_close'] = "</a></li>";
	// 	$config['next_tag_open'] = "<li>";
	// 	$config['next_tag_close'] = "</li>";
	// 	$config['prev_tag_open'] = "<li>";
	// 	$config['prev_tagl_close'] = "</li>";
	// 	$config['first_tag_open'] = "<li class='page-item'>";
	// 	$config['first_tagl_close'] = "</a></li>";
	// 	$config['last_tag_open'] = "<li class='page-item'>";
	// 	$config['last_tagl_close'] = "</a></li>";
	// 	$config['attributes'] = array('class' => 'page-link');
	// 	/* ends of bootstrap */
	// 	$this->pagination->initialize($config);
	// 	$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	// 	$data["searchresult"] = $this->frontend_model->searchinfo($product, $category, $config["per_page"], $page);
	// 	$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
	// 	$data['totalrows'] =  $this->frontend_model->count_totalitem($product, $category);
	// 	$countall = $data['totalrows'];
	// 	if ($page == 0) {
	// 		$initial = 1;
	// 		$pagenum = 1;
	// 		$numrecord = $config["per_page"];
	// 	} else {
	// 		$pageofset = $page / $config["per_page"];
	// 		$pagenum = $pageofset + 1;
	// 		$numrecord = $config["per_page"] * $pagenum;
	// 		if ($config['total_rows'] < $numrecord) {
	// 			$numrecord = $config['total_rows'];
	// 		}
	// 		$initial = $page + 1;
	// 	}
	// 	$data['showing'] = "Montrant  " . $initial . " - " . $numrecord . " sur " . $config['total_rows'];
	// 	$data["links"] = $this->pagination->create_links();
	// 	#
	// 	#pagination ends
	// 	#  
	// 	$data['ads'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => 4));
	// 	$data["categorylist"] = $this->frontend_model->categories();
	// 	$data["deals"] = $this->frontend_model->todaydeals();
	// 	$data['taxinfos'] = $this->taxchecking();
	// 	if ($this->webinfo->web_onoff == 0) {
	// 		redirect(base_url() . 'login');
	// 		exit;
	// 	}
	// 	if ($this->themeinfo->themename == "modern") {
	// 		redirect('');
	// 	}
		
	// 	$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/menu', $data, TRUE);
	// 	$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	// }
	public function menu()
	{
		$data['title'] = "Menu";
		$data['seoterm'] = "menu";
		if (empty($this->session->userdata('categoryid'))) {
			$categoryid = $this->input->post('category_id');
		} else {
			$categoryid = $this->session->userdata('categoryid');
		}
		$productid = $this->input->post('product_id');
		$sessiondata = array('categoryid' => $categoryid, 'product_id' => $productid);
		$this->session->set_userdata($sessiondata);
		$product  = $this->session->userdata('product_id');
		$category = $this->session->userdata('categoryid');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '8'));
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('menu');
		$config["total_rows"]  = $this->frontend_model->count_totalitem($product, $category);
		$config["per_page"]    = 20;
		$config["uri_segment"] = 2;
		$config["last_link"] = "Last";
		$config["first_link"] = "First";
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='page-item'><a class='page-link active' href='#'>";
		$config['cur_tag_close'] = "</a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page-item'>";
		$config['first_tagl_close'] = "</a></li>";
		$config['last_tag_open'] = "<li class='page-item'>";
		$config['last_tagl_close'] = "</a></li>";
		$config['attributes'] = array('class' => 'page-link');
		/* ends of bootstrap */
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		//$data["searchresult"] = $this->frontend_model->searchinfo($product, $category, $config["per_page"], $page);
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['totalrows'] =  $this->frontend_model->count_totalitem($product, $category);
		$countall = $data['totalrows'];
		if ($page == 0) {
			$initial = 1;
			$pagenum = 1;
			$numrecord = $config["per_page"];
		} else {
			$pageofset = $page / $config["per_page"];
			$pagenum = $pageofset + 1;
			$numrecord = $config["per_page"] * $pagenum;
			if ($config['total_rows'] < $numrecord) {
				$numrecord = $config['total_rows'];
			}
			$initial = $page + 1;
		}
		$data['showing'] = "Montrant  " . $initial . " - " . $numrecord . " sur " . $config['total_rows'];
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		#  
		$data['ads'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => 4));
		$data["categorylist"] = $this->frontend_model->categories();
		//$data["deals"] = $this->frontend_model->todaydeals();
		$data['taxinfos'] = $this->taxchecking();
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		if ($this->themeinfo->themename == "modern") {
			redirect('');
		}
		
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/menu', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	public function searchitem()
	{
		$data['title'] = "Menu";
		$data['seoterm'] = "menu";
		$categoryid = $this->input->post('catid');
		if ($categoryid == 'all') {
			$categoryid = '';
		}
		$productid = $this->input->post('product_id');
		$sessiondata = array('categoryid' => $categoryid, 'product_id' => $productid);
		$this->session->set_userdata($sessiondata);
		$product  = $this->session->userdata('product_id');
		$category = $this->session->userdata('categoryid');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '8'));
		#-------------------------------#       
		#
		#pagination starts
		#
		$config["base_url"] = base_url('menu');
		$config["total_rows"]  = $this->frontend_model->count_totalitem($product, $category);
		$config["per_page"]    = 20;
		$config["uri_segment"] = 2;
		$config["last_link"] = "Last";
		$config["first_link"] = "First";
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='page-item'><a class='page-link active' href='#'>";
		$config['cur_tag_close'] = "</a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page-item'>";
		$config['first_tagl_close'] = "</a></li>";
		$config['last_tag_open'] = "<li class='page-item'>";
		$config['last_tagl_close'] = "</a></li>";
		$config['attributes'] = array('class' => 'page-link');
		/* ends of bootstrap */
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["searchresult"] = $this->frontend_model->searchinfo($product, $category, $config["per_page"], $page);
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['totalrows'] =  $this->frontend_model->count_totalitem($product, $category);
		$data['taxinfos'] = $this->taxchecking();
		$countall = $data['totalrows'];
		if ($page == 0) {
			$initial = 1;
			$pagenum = 1;
			$numrecord = $config["per_page"];
		} else {
			$pageofset = $page / $config["per_page"];
			$pagenum = $pageofset + 1;
			$numrecord = $config["per_page"] * $pagenum;
			if ($config['total_rows'] < $numrecord) {
				$numrecord = $config['total_rows'];
			}
			$initial = $page + 1;
		}
		$data['showing'] = "Montrant  " . $initial . " - " . $numrecord . " sur " . $config['total_rows'];
		$data["links"] = $this->pagination->create_links();
		#
		#pagination ends
		#  
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}

		$this->load->view('themes/' . $this->themeinfo->themename . '/search', $data);
	}
	public function details($pid, $vid)
	{
		if (empty($vid)) {
			redirect('menu');
		}
		$data['title']     = "Détails de la nourriture";
		$data['seoterm'] = "food_details";
		$islogin = $this->session->userdata('CusUserID');
		$data['customerislogin'] = $islogin;
		$data['iteminfo']   	  = $this->frontend_model->detailsinfo($pid, $vid);
		$data['category'] =  $this->frontend_model->read('*', 'item_category', array('CategoryID' => $data['iteminfo']['CategoryID']));
		$data['related'] =  $this->frontend_model->relateditem($data['iteminfo']['CategoryID'], $data['iteminfo']['ProductsID']);
		$data['totalreview'] = $this->frontend_model->read_rating('tbl_rating', 'reviewtxt', 'proid', $data['iteminfo']['ProductsID']);
		$data['totalrating'] = $this->frontend_model->read_rating('tbl_rating', 'rating', 'proid', $data['iteminfo']['ProductsID']);
		$data['average'] = $this->frontend_model->read_average('tbl_rating', 'rating', 'proid', $data['iteminfo']['ProductsID']);
		$data['readreview'] = $this->frontend_model->read_review('tbl_rating', 'proid', $data['iteminfo']['ProductsID']);
		$data['varientlist']   = $this->frontend_model->findByvmenuId($pid);
		if (!empty($islogin)) {
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['isgivenreview']	         = 0;
			$allorderbycustomer = $this->frontend_model->read_all('*', 'customer_order', 'order_id', '', 'customer_id', $islogin);

			if (!empty($allorderbycustomer)) {
				foreach ($allorderbycustomer as $buyorder) {
					$existbuy = $this->db->select('*')->from('order_menu')->where('order_id', $buyorder->order_id)->where('menu_id', $data['iteminfo']['ProductsID'])->get()->row();
					if (!empty($existbuy)) {
						$data['isgivenreview']	         = 1;
					}
				}
			} else {
				$data['isgivenreview']	         = 0;
			}
		} else {
			$data['isgivenreview']	         = 0;
			$data['customerinfo'] = '';
		}

		$data['taxinfos'] = $this->taxchecking();
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/details', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function appdetails($pid, $vid)
	{
		$data['title']     = "Détails de la nourriture";
		$islogin = $this->session->userdata('CusUserID');
		$data['customerislogin'] = $islogin;
		$data['iteminfo']   	  = $this->frontend_model->detailsinfo($pid, $vid);
		$data['category'] =  $this->frontend_model->read('*', 'item_category', array('CategoryID' => $data['iteminfo']->CategoryID));
		$data['related'] =  $this->frontend_model->relateditem($data['iteminfo']->CategoryID, $data['iteminfo']->ProductsID, $data['iteminfo']->variantid);
		$data['totalreview'] = $this->frontend_model->read_rating('tbl_rating', 'reviewtxt', 'proid', $data['iteminfo']->ProductsID);
		$data['totalrating'] = $this->frontend_model->read_rating('tbl_rating', 'rating', 'proid', $data['iteminfo']->ProductsID);
		$data['average'] = $this->frontend_model->read_average('tbl_rating', 'rating', 'proid', $data['iteminfo']->ProductsID);
		$data['readreview'] = $this->frontend_model->read_review('tbl_rating', 'proid', $data['iteminfo']->ProductsID);
		if (!empty($islogin)) {
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['isgivenreview']	         = 0;
			$allorderbycustomer = $this->frontend_model->read_all('*', 'customer_order', 'order_id', '', 'customer_id', $islogin);

			if (!empty($allorderbycustomer)) {
				foreach ($allorderbycustomer as $buyorder) {
					$existbuy = $this->db->select('*')->from('order_menu')->where('order_id', $buyorder->order_id)->where('menu_id', $data['iteminfo']->ProductsID)->get()->row();
					if (!empty($existbuy)) {
						$data['isgivenreview']	         = 1;
					}
				}
			} else {
				$data['isgivenreview']	         = 0;
			}
		} else {
			$data['isgivenreview']	         = 0;
			$data['customerinfo'] = '';
		}



		$this->load->view('themes/' . $this->themeinfo->themename . '/appdetails', $data);
	}
	public function appdetailsedit($pid, $vid, $orderid)
	{
		$data['title']     = "Détails de la nourriture";
		$customerorder = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['orderinfo']  	   = $customerorder;
		$islogin = $this->session->userdata('CusUserID');
		$data['customerislogin'] = $islogin;
		$data['iteminfo']   	  = $this->frontend_model->detailsinfo($pid, $vid);
		$data['category'] =  $this->frontend_model->read('*', 'item_category', array('CategoryID' => $data['iteminfo']->CategoryID));
		$data['related'] =  $this->frontend_model->relateditem($data['iteminfo']->CategoryID, $data['iteminfo']->ProductsID, $data['iteminfo']->variantid);
		$data['totalreview'] = $this->frontend_model->read_rating('tbl_rating', 'reviewtxt', 'proid', $data['iteminfo']->ProductsID);
		$data['totalrating'] = $this->frontend_model->read_rating('tbl_rating', 'rating', 'proid', $data['iteminfo']->ProductsID);
		$data['average'] = $this->frontend_model->read_average('tbl_rating', 'rating', 'proid', $data['iteminfo']->ProductsID);
		$data['readreview'] = $this->frontend_model->read_review('tbl_rating', 'proid', $data['iteminfo']->ProductsID);
		if (!empty($islogin)) {
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['isgivenreview']	         = 0;
			$allorderbycustomer = $this->frontend_model->read_all('*', 'customer_order', 'order_id', '', 'customer_id', $islogin);

			if (!empty($allorderbycustomer)) {
				foreach ($allorderbycustomer as $buyorder) {
					$existbuy = $this->db->select('*')->from('order_menu')->where('order_id', $buyorder->order_id)->where('menu_id', $data['iteminfo']->ProductsID)->get()->row();
					if (!empty($existbuy)) {
						$data['isgivenreview']	         = 1;
					}
				}
			} else {
				$data['isgivenreview']	         = 0;
			}
		} else {
			$data['isgivenreview']	         = 0;
			$data['customerinfo'] = '';
		}


		$this->load->view('themes/' . $this->themeinfo->themename . '/appupdatedetails', $data);
	}
	public function scanmenu($table = null)
	{
		$mysesdata = array('tableid' => $table);
		$this->session->set_userdata($mysesdata);
		redirect("qr-menu");
	}
	public function savetoken()
	{
		$token = $this->input->post('token', TRUE);
		$mysesdata = array('token' => $token);
		$this->session->set_userdata($mysesdata);
	}
	public function qrmenu()
	{

		$data['title'] = "Menu QR";
		$data["categorylist"] = $this->frontend_model->categories();
		$this->load->view('themes/' . $this->themeinfo->themename . '/app', $data);
	}
	public function searchqrfood()
	{
		$item = $this->input->post('foodname', TRUE);
		$getitem = $this->frontend_model->getqritem($item);
		if ((!empty($getitem)) && (!empty($item))) {
			$data["itemlist"] = $getitem;
			$this->load->view('themes/' . $this->themeinfo->themename . '/searchapp', $data);
		} else {
			$data["categorylist"] = $this->frontend_model->categories();
			$this->load->view('themes/' . $this->themeinfo->themename . '/appqr', $data);
		}
	}
	public function addonsitemqr()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$data['type']   	  = $this->input->post('type');
		$data['item']   	  = $this->frontend_model->finditem($id, $sid);
		$data['addonslist']   = $this->frontend_model->findaddons($id);
		$this->load->view('themes/' . $this->themeinfo->themename . '/addonsitemqr', $data);
	}
	public function addonsitemqr2()
	{
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		echo $data['orderid'] = $this->input->post('orderid');
		$data['type']   	  = $this->input->post('type');
		$data['item']   	  = $this->frontend_model->finditem($id, $sid);
		$data['addonslist']   = $this->frontend_model->findaddons($id);
		$this->load->view('themes/' . $this->themeinfo->themename . '/addonsitemqr2', $data);
	}
	public function addtocartqr()
	{
		$data['title'] = "Article du panier";
		$Udstatus = $this->input->post('Udstatus');
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$itemname = $this->input->post('itemname');
		$size = $this->input->post('varientname');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice');
		$adonsunitprice = $this->input->post('adonsunitprice');
		$adonsqty = $this->input->post('adonsqty');
		$adonsname = $this->input->post('adonsname');

		$new_str = str_replace(',', '0', $addonsid);
		$new_str2 = str_replace(',', '0', $adonsqty);
		$uaid = $pid . $new_str . $new_str2 . $sizeid;
		$myid = $catid . $pid . $sizeid . $uaid;

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
		if (count($this->cart->contents()) > 0) {
			foreach ($this->cart->contents() as $item) {

				if ($item['id'] == $myid) {
					$data = array(
						'rowid' => $item['rowid'],
						'qty' => $item['qty'] + 1
					);
					$this->cart->update($data);
				}
			}
			if ($Udstatus == "insert") {
				$itemsinsert = array(
					'id'      	=> $myid,
					'pid'     	=> $pid,
					'name'    	=> $itemname,
					'sizeid'    	=> $sizeid,
					'size'    	=> $size,
					'qty'     	=> $qty,
					'price'   	=> $grandtotal,
					'itemnote'   => '',
					'addonsid'   => $aids,
					'addonsuid'  => $uaid,
					'addonname'  => $aname,
					'addonupr'   => $aprice,
					'addontpr'   => $atprice,
					'addonsqty'  => $aqty
				);
				$this->cart->insert($itemsinsert);
			}
		} else {
			$data_items = array(
				'id'      	=> $myid,
				'pid'     	=> $pid,
				'name'    	=> $itemname,
				'sizeid'    	=> $sizeid,
				'size'    	=> $size,
				'qty'     	=> $qty,
				'price'   	=> $grandtotal,
				'itemnote'   => '',
				'addonsid'   => $aids,
				'addonsuid'  => $uaid,
				'addonname'  => $aname,
				'addonupr'   => $aprice,
				'addontpr'   => $atprice,
				'addonsqty'  => $aqty
			);
			$this->cart->insert($data_items);
		}
		$totalqty = 0;
		$totalamount = 0;
		if ($this->cart->contents() > 0) {
			$totalqty = count($this->cart->contents());
			$itemprice = 0;
			foreach ($this->cart->contents() as $item) {
				if (!empty($item['addonsid'])) {
					$itemprice = $itemprice + $item['addontpr'];
				} else {
					$itemprice = $itemprice;
				}
			}
			$totalamount = $this->cart->total();
			echo $totalqty;
		}
	}
	public function deltocartqr()
	{
		$data['title'] = "Article du panier";
		$Udstatus = $this->input->post('Udstatus');
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$myid = $catid . $pid . $sizeid;
		$itemname = $this->input->post('itemname');
		$size = $this->input->post('varientname');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice');
		$adonsunitprice = $this->input->post('adonsunitprice');
		$adonsqty = $this->input->post('adonsqty');
		$adonsname = $this->input->post('adonsname');

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



		if (count($this->cart->contents()) > 0) {
			foreach ($this->cart->contents() as $item) {
				if ($item['id'] == $myid) {
					if ($Udstatus == "del") {

						$data = array(
							'rowid' => $item['rowid'],
							'qty' => $qty - 1
						);
						$this->cart->update($data);
					}
				}
			}
		}

		$totalqty = 0;
		$totalamount = 0;
		if ($this->cart->contents() > 0) {
			$totalqty = count($this->cart->contents());
			$itemprice = 0;
			foreach ($this->cart->contents() as $item) {
				if (!empty($item['addonsid'])) {
					$itemprice = $itemprice + $item['addontpr'];
				} else {
					$itemprice = $itemprice;
				}
			}
			$totalamount = $this->cart->total();
			echo $totalqty;
		}
	}
	public function addtocartqr2()
	{
		$data['title'] = "Article du panier";
		$Udstatus = $this->input->post('Udstatus');
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$itemname = $this->input->post('itemname');
		$size = $this->input->post('varientname');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice');
		$adonsunitprice = $this->input->post('adonsunitprice');
		$adonsqty = $this->input->post('adonsqty');
		$adonsname = $this->input->post('adonsname');

		$new_str = str_replace(',', '0', $addonsid);
		$new_str2 = str_replace(',', '0', $adonsqty);
		$uaid = $pid . $new_str . $new_str2 . $sizeid;
		$myid = $catid . $pid . $sizeid . $uaid;

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
			'size'    	=> $size,
			'qty'     	=> $qty,
			'price'   	=> $grandtotal,
			'itemnote'   => '',
			'addonsid'   => $aids,
			'addonsuid'  => $uaid,
			'addonname'  => $aname,
			'addonupr'   => $aprice,
			'addontpr'   => $atprice,
			'addonsqty'  => $aqty
		);
		$this->cart->insert($data_items);
		$totalqty = 0;
		$totalamount = 0;
		if ($this->cart->contents() > 0) {
			$totalqty = count($this->cart->contents());
			$itemprice = 0;
			foreach ($this->cart->contents() as $item) {
				if (!empty($item['addonsid'])) {
					$itemprice = $itemprice + $item['addontpr'];
				} else {
					$itemprice = $itemprice;
				}
			}
			$totalamount = $this->cart->total();
			echo $totalqty;
		}
	}
	public function removetocartqr()
	{
		$data['title'] = "Article du panier";
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
		$this->cart->update($data);
	}
	public function appcart()
	{
		if (!empty($this->cart->contents())) {
			$data['title'] = "Page du panier";
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'payment_method', 'payment_method_id', '', 'is_active', '1');
			$this->load->view('themes/' . $this->themeinfo->themename . '/appcart', $data);
		} else {
			redirect('qr-menu');
		}
	}
	public function cartupdateqr()
	{
		$cartID = $this->input->post('CartID');
		$productqty = $this->input->post('qty');
		$Udstatus = $this->input->post('Udstatus');
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
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartlistqr', $data);
	}
	public function removetocartdetailsqr()
	{
		$data['title'] = "Article du panier";
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
		$this->cart->update($data);
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartlistqr', $data);
	}

	public function reviewsubmit()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$productid = $this->input->post('productid', TRUE);
		$email = $this->input->post('email', TRUE);
		$varientid = $this->input->post('varientid', TRUE);
		$data['proid'] = $productid;
		$data['title'] = $this->input->post('title', TRUE);
		$data['name'] = $this->input->post('name', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['reviewtxt'] = $this->input->post('review', TRUE);
		$data['rating'] = $this->input->post('rating', TRUE);
		$data['status'] = 1;
		$data['ratetime'] = date('Y-m-d H:i:s');
		$ratinginfo = $this->db->select('*')->from('tbl_rating')->where('proid', $productid)->where('email', $email)->get()->row();
		if (!empty($ratinginfo)) {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		} else {
			$this->frontend_model->insert_data('tbl_rating', $data);
			$this->session->set_flashdata('message', display('save_successfully'));
		}
		redirect("details/" . $productid . '/' . $varientid . '#review');
	}
	public function addonsitem()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$id = $this->input->post('pid');
		$sid = $this->input->post('sid');
		$data['type']   	  = $this->input->post('type');
		$data['item']   	  = $this->frontend_model->finditem($id, $sid);
		$data['addonslist']   = $this->frontend_model->findaddons($id);
		$data['varientlist']   = $this->frontend_model->findByvmenuId($id);
		$this->load->view('themes/' . $this->themeinfo->themename . '/addonsitem', $data);
	}
	public function checkavailablity()
	{
		$numofpeople = $this->input->post('people');
		$newdate = $this->input->post('getdate');
		$gettable = $this->frontend_model->checkavailtable();
		$data['tableinfo'] = $this->frontend_model->checkfree($gettable, $numofpeople);
		$rseting = $this->frontend_model->read('*', 'setting', array('id' => 2));
		$openingtimerv = strtotime($rseting->reservation_open);
		$closetimerv = strtotime($rseting->reservation_close);
		$maxperson = $rseting->maxreserveperson;
		$gettotalreserverp = $this->frontend_model->bookedpeople();
		$offinformation = $this->frontend_model->read('*', 'reservationofday', array('offdaydate' => $newdate));

		$offdate = $offinformation->offdaydate;
		$offtime = explode("-", $offinformation->availtime);

		$deltime1 = strtotime($offtime[0]);
		$deltime2 = strtotime($offtime[1]);
		$curtime = strtotime(date("h:i:s A"));
		$taken = $numofpeople + $gettotalreserverp->totalperson;

		$data['newdate'] = $newdate;
		$data['gettime'] = $this->input->post('time');
		$data['nopeople'] = $numofpeople;
		$data['contactno'] = $this->input->post('contactno');
		if ($maxperson < $numofpeople) {
			echo 1;
			exit;
		} else if ($maxperson < $taken) {
			echo 1;
			exit;
		} else if (($curtime >= $deltime1) && ($curtime < $deltime2) && (strtotime($offdate) == strtotime($newdate))) {
			echo 2;
		} else {
			$this->load->view('themes/' . $this->themeinfo->themename . '/checkavail', $data);
		}
	}
	public function reservationform($id)
	{
		$id = $this->input->post('id');
		$cuslomer = $this->session->userdata('CusUserID');
		$startdate = $this->input->post('sltime');
		$endate = date("H:i:s", strtotime($startdate) + (60 * 30));
		$data['tableinfo'] = $this->frontend_model->read('*', 'rest_table', array('tableid' => $id));
		$data['tableno'] = $this->input->post('id');
		$data['newdate'] = $this->input->post('sdate');
		$data['gettime'] = $this->input->post('sltime');
		$data['endtime'] = $endate;
		$data['nopeople'] = $this->input->post('people');
		$data['contactno'] = $this->input->post('contactno');
		if (!empty($cuslomer)) {
			$data['customerinfo'] = $this->db->select('*')->from('customer_info')->where('customer_id', $cuslomer)->get()->row();
		} else {
			$data['customerinfo'] = '';
		}
		$data['formdtable'] = $this->frontend_model->checktable($id);

		$this->load->view('themes/' . $this->themeinfo->themename . '/reservationfrm', $data);
	}
	public function bookreservation()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$this->form_validation->set_rules('customer_name', "Customer Name", 'required');
		$this->form_validation->set_rules('tableid', "Table No", 'required');
		$this->form_validation->set_rules('tablicapacity', "No. of Person", 'required');
		$this->form_validation->set_rules('bookfromtime', display('s_time'), 'required');
		$this->form_validation->set_rules('bookendtime', display('e_time'), 'required');
		$this->form_validation->set_rules('bookdate', display('date'), 'required');
		$id = $this->input->post('reserveid');
		$newdate = $this->input->post('bookdate');
		$tableid = $this->input->post('tableid');
		$status = 1;
		$udata = array('status'       => 1);
		$scan = scandir('application/modules/');
		$pointsys = "";
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$pointsys = 1;
				}
			}
		}
		if ($this->form_validation->run()) {
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

			$customerData = array(
				'cuntomer_no'         => $sino,
				'membership_type'     => $pointsys,
				'customer_name'       => $this->input->post('customer_name', true),
				'customer_email'      => $this->input->post('email', true),
				'customer_address'    => "t",
				'customer_phone'      => $this->input->post('mobile', true),
				'crdate'      		 => date('Y-m-d'),
				'favorite_delivery_address'      => "t",
				'is_active'          => 1,
			);
			$mobile = $this->input->post('email', true);
			$rerturnid = $this->frontend_model->insertcustomer($customerData, $mobile);
			if (!empty($pointsys)) {
				$pointstable = array(
					'customerid'   => $rerturnid,
					'amount'       => 0,
					'points'       => 10
				);
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable);
			}

			$data['units']   = (object) $postData = array(
				'reserveid'     		 => $this->input->post('reserveid'),
				'cid' 	 			 => $rerturnid,
				'tableid' 	 		 => $this->input->post('tableid', true),
				'person_capicity' 	 => $this->input->post('tablicapacity', true),
				'formtime' 	 		 => $this->input->post('bookfromtime', true),
				'totime' 	 		 => $this->input->post('bookendtime', true),
				'reserveday' 	 	 => $newdate,
				'customer_notes'      => $this->input->post('message', true),
				'status' 	 	     => 1,
			);

			if ($this->frontend_model->bookedtable($postData)) {
				$insert_id = $this->db->insert_id();
				$this->db->where('tableid', $tableid);
				$this->db->update('rest_table', $udata);
				$send_email = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));

				$fullname = $this->input->post('customer_name', true);
				$email = $this->input->post('email', true);
				$text = "Book New Reservation.Please inform me if anything change.\r\n Thank You";
				$phone = $this->input->post('mobile', true);
				$evdate = $this->input->post('bookdate');
				$numofpeople = $this->input->post('tablicapacity', true);
				$subject = "Booking Information";
				$config = array(
					'protocol'  => $send_email->protocol,
					'smtp_host' => $send_email->smtp_host,
					'smtp_port' => $send_email->smtp_port,
					'smtp_user' => $send_email->sender,
					'smtp_pass' => $send_email->smtp_password,
					'mailtype'  => $send_email->mailtype,
					'charset'   => 'utf-8'
				);


				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$htmlContent = ReservationEmail($insert_id, $phone);
				$this->email->from($send_email->sender, 'Informations de réservation');
				$this->email->to($email);
				$this->email->cc($send_email->sender);
				$this->email->subject($subject);
				$this->email->message($htmlContent);
				$this->email->send();
				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('reservation');
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("reservation");
		} else {
			redirect("reservation");
		}
	}
	public function reservation()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "Réservation";
		$data['seoterm'] = "reservation";
		$data['banner_story'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '2');
		$data['foodhistory'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '5');
		$data['reservation_sl'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '6');
		$data['reservation_modern'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '14'));
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/reservation', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	public function addtocart()
	{
		$data['title'] = "Article du panier";
		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$itemname = $this->input->post('itemname');
		$size = $this->input->post('varientname');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice');
		$adonsunitprice = $this->input->post('adonsunitprice');
		$adonsqty = $this->input->post('adonsqty');
		$adonsname = $this->input->post('adonsname');
		$new_str = str_replace(',', '0', $addonsid);
		$new_str2 = str_replace(',', '0', $adonsqty);
		$uaid = $pid . $new_str . $new_str2 . $sizeid;
		$myid = $catid . $pid . $sizeid . $uaid;

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
			'size'    	=> $size,
			'qty'     	=> $qty,
			'price'   	=> $grandtotal,
			'addonsid'   => $aids,
			'addonsuid'  => $uaid,
			'addonname'  => $aname,
			'addonupr'   => $aprice,
			'addontpr'   => $atprice,
			'addonsqty'  => $aqty,
			'itemnote'	=> ""
		);


		$this->cart->insert($data_items);
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartitem', $data);
	}
	public function removetocart()
	{
		$data['title'] = "Article du panier";
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
		$this->cart->update($data);
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartitem', $data);
	}
	public function additemnote()
	{
		$foodnote = $this->input->post('foodnote');
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'    => $rowid,
			'itemnote' => $foodnote
		);
		$this->cart->update($data);
		$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartlist', $data);
	}
	public function cartupdate()
	{
		$cartID = $this->input->post('CartID');
		$productqty = $this->input->post('qty');
		$Udstatus = $this->input->post('Udstatus');
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
		$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartlist', $data);
	}
	public function cartupdatedesktop()
	{
		$cartID = $this->input->post('CartID');
		$productqty = $this->input->post('qty');
		$Udstatus = $this->input->post('Udstatus');
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
		$data['paymentinfo'] =  $this->frontend_model->read_all('*', 'payment_method', 'payment_method_id', '', 'is_active', '1');
		$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/desktopcheckoutitem', $data);
	}
	public function cartupdatemobile()
	{
		$cartID = $this->input->post('CartID');
		$productqty = $this->input->post('qty');
		$Udstatus = $this->input->post('Udstatus');
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
		$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/mobilecheckoutitem', $data);
	}
	public function cart()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		if ($this->themeinfo->themename == "modern") {
			redirect('');
		}
		if (!empty($this->cart->contents())) {
			$data['title'] = "Page du panier";
			$data['seoterm'] = "cart_page";
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
			$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
			$data['taxinfos'] = $this->taxchecking();
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/cart', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		} else {
			redirect('menu');
		}
	}
	
	public function services()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		// Dynamically get the slug from URL
    	$slug = $this->uri->segment(1);
		$data['title'] = "Banquet & Catering";
		$data['seoterm'] = "services";
		$data['pdf_materials'] = $this->frontend_model->get_pdfs_by_slug($slug);
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/services', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function our_menu()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		// Dynamically get the slug from URL
    	$slug = $this->uri->segment(1);
		$data['title'] = "Menu";
		$data['seoterm'] = "our_menu";
		$data['pdf_materials'] = $this->frontend_model->get_pdfs_by_slug($slug);
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/our-menu', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	
		public function delivery()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "Home Delivery";
		$data['seoterm'] = "delivery";
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/delivery', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	
	public function removetocartdetails()
	{
		$data['title'] = "Article du panier";
		$data['seoterm'] = "cart Item";
		$rowid = $this->input->post('rowid');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
		$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
		$this->cart->update($data);
		$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '9'));
		$data['taxinfos'] = $this->taxchecking();
		$this->load->view('themes/' . $this->themeinfo->themename . '/cartlist', $data);
	}
	public function setshipping()
	{
		$shippingcharge = $this->input->post('shippingcharge');
		$shipname = $this->input->post('shipname');
		$shipinfo = $this->frontend_model->read('*', 'shipping_method', array('shipping_method	' => $shipname));
		$sessiondata = array('shippingmethod' => $shipname, 'shippingid' => $shipinfo->ship_id, 'shiptype' => $shipinfo->shiptype, 'shippingrate' => $shippingcharge);
		$this->session->set_userdata($sessiondata);
	}
	public function checkshipping()
	{
		$shippingcharge = $this->input->post('shippingcharge');
		$shipname = $this->input->post('shipname');
		$shipaddress = $this->input->post('shipaddress');
		$shipinfo = $this->frontend_model->read('*', 'shipping_method', array('shipping_method	' => $shipname));
		$sessiondata = array('shippingmethod' => $shipname, 'shippingaddress' => $shipaddress, 'shippingid' => $shipinfo->ship_id, 'shiptype' => $shipinfo->shiptype, 'shippingrate' => $shippingcharge);
		$this->session->set_userdata($sessiondata);
	}
	public function checkopenclose()
	{
		$getdate = $this->input->post('getdate');
		$time = $this->input->post('time');
		$openingtime = $this->settinginfo->opentime;
		$closetime = $this->settinginfo->closetime;

		if (strpos($openingtime, 'AM') !== false || strpos($openingtime, 'am') !== false) {
			$starttime = strtotime($getdate . ' ' . $openingtime);
		} else {
			$starttime = strtotime($getdate . ' ' . $openingtime);
		}
		if (strpos($closetime, 'PM') !== false || strpos($closetime, 'pm') !== false) {
			$endtime = strtotime($getdate . ' ' . $closetime);
		} else {
			$endtime = strtotime($getdate . ' ' . $closetime);
		}
		$checktime = $getdate . ' ' . $time . ":00";
		$comparetime = strtotime($checktime);
		if (($comparetime >= $starttime) && ($comparetime < $endtime)) {
			$sessiondata = array('orderdate' => $getdate, 'ordertime' => $time);
			$this->session->set_userdata($sessiondata);
			$restaurantisopen = 1;
		} else {
			$restaurantisopen = 0;
		}
		$isopen = array('isopen' => $restaurantisopen);
		echo json_encode($isopen);
	}
	public function checkcoupon()
	{
		$couponcode = $this->input->post('couponcode');
		$couponinfo = $this->frontend_model->read('*', 'tbl_token', array('tokencode' => $couponcode));
		if (!empty($couponinfo)) {
			$startdate = strtotime($couponinfo->tokenstartdate);
			$enddate = strtotime($couponinfo->tokenendate);
			$today = date('Y-m-d');
			$date_timestamp = strtotime($today);
			if (($date_timestamp >= $startdate) && ($date_timestamp < $enddate)) {
				$sessiondata = array('couponcode' => $couponinfo->tokencode, 'couponprice' => $couponinfo->tokenrate);
				$this->session->set_userdata($sessiondata);
			}
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		if ($this->themeinfo->themename == "modern") {
			redirect('');
		} else {
			redirect('cart');
		}
	}
	public function checkcouponqr()
	{
		$couponcode = $this->input->post('couponcode');
		$couponinfo = $this->frontend_model->read('*', 'tbl_token', array('tokencode' => $couponcode));
		if (!empty($couponinfo)) {
			$startdate = strtotime($couponinfo->tokenstartdate);
			$enddate = strtotime($couponinfo->tokenendate);
			$today = date('Y-m-d');
			$date_timestamp = strtotime($today);
			if (($date_timestamp >= $startdate) && ($date_timestamp < $enddate)) {
				$sessiondata = array('couponcode' => $couponinfo->tokencode, 'couponprice' => $couponinfo->tokenrate);
				$this->session->set_userdata($sessiondata);
			}
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect('qr-app-cart');
	}
	public function checkout()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		if (!empty($this->cart->contents())) {
			$data['title'] = "Paiement";
			$data['seoterm'] = "checkout";
			$cuslomer = $this->session->userdata('CusUserID');

			if (!empty($cuslomer)) {
				$orderinfo = $this->db->select('*')->from('customer_order')->where('customer_id', $cuslomer)->order_by('order_id', 'DESC')->limit(1)->get()->row();
				$customedata = $this->db->select('*')->from('customer_info')->where('customer_id', $cuslomer)->get()->row();

				if (!empty($orderinfo)) {
					$billinginfo = $this->frontend_model->read('*', 'tbl_billingaddress', array('orderid' => $orderinfo->order_id));
					if (!empty($billinginfo)) {
						$data['billinginfo'] =  $this->frontend_model->read('*', 'tbl_billingaddress', array('orderid' => $orderinfo->order_id));
					} else {
						$data['billinginfo'] =  $this->frontend_model->read('*', 'tbl_billingaddress', array('email' => $customedata->customer_email));
					}

					$data['shippinginfo'] =  $this->frontend_model->read('*', 'tbl_shippingaddress', array('orderid' => $orderinfo->order_id));
				} else {
					$data['billinginfo'] = $this->frontend_model->read('*', 'tbl_billingaddress', array('email' => $customedata->customer_email));;
					$data['shippinginfo'] = '';
				}
				$data['customedata'] = $customedata;
			} else {
				$data['billinginfo'] = '';
				$data['shippinginfo'] = '';
				$data['customedata'] = '';
			}
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
			$data['paymentinfo'] =  $this->frontend_model->read_all('*', 'payment_method', 'payment_method_id', '', 'is_active', '1');
			$data['countryinfo'] =  $this->frontend_model->read_all('*', 'tbl_country', 'countryid', '', 'status', '1');
			$data['taxinfos'] = $this->taxchecking();
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/checkout', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		} else {
			if ($this->themeinfo->themename == "modern") {
				redirect('');
			} else {
				redirect('menu');
			}
		}
	}
	public function getstate($id)
	{
		echo '<option value="" data-stateid="">' . display('select_state') . '</option>';
		$allstate = $this->frontend_model->read_all('*', 'tbl_state', 'stateid', '', 'countryid', $id);
		if (!empty($allstate)) {
			foreach ($allstate as $state) {
				echo '<option value="' . $state->statename . '" data-stateid="' . $state->stateid . '">' . $state->statename . '</option>';
			}
		}
	}
	public function getcity($id)
	{
		echo '<option value="" data-city="">' . display('select_city') . '</option>';
		$allcity = $this->frontend_model->read_all('*', 'tbl_city', 'cityid', '', 'stateid', $id);
		if (!empty($allcity)) {
			foreach ($allcity as $city) {
				echo '<option value="' . $city->cityname . '" data-city="' . $city->cityid . '">' . $city->cityname . '</option>';
			}
		}
	}
	public function login()
	{
		$data['title'] = "Connexion";
		$data['seoterm'] = "login";
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		if ($this->session->userdata('CusUserID') == false) {
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/login', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		} else {
			redirect('menu');
		}
	}
	public function signup()
	{
		$data['title'] = "Inscription";
		$data['seoterm'] = "registration";
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/signup', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}
	public function submitregister()
	{
		$data['title'] = "Enregistrer un nouvel utilisateur";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Customer Name', 'required|max_length[100]');
		$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[customer_info.customer_email]');
		$this->form_validation->set_rules('phone', 'Mobile', 'required|is_unique[customer_info.customer_phone]');
		$this->form_validation->set_rules('u_pass', 'Password', 'required');
		$this->form_validation->set_message('is_unique', 'Désolé, cette adresse %s a déjà été utilisée !');

		$coa = $this->frontend_model->headcode();
		if ($coa->HeadCode != NULL) {
			$headcode = $coa->HeadCode + 1;
		} else {
			$headcode = "102030101";
		}
		$lastid = $this->db->select("*")->from('customer_info')->order_by('cuntomer_no', 'desc')->get()->row();
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

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			$this->session->set_flashdata('exception',   $errors);
			redirect('signup');
		} else {
			$URL = base_url('assets/img/user/');
			// File Uplaod
			if (!empty($_FILES['UserPicture'])) {
				$config['upload_path']      = 'assets/img/user/';
				$config['allowed_types']    = 'gif|jpg|png|jpeg';
				$config['max_size']         = '5120';
				$config['file_name']        =  mt_rand() . '_' . time();
				$config['remove_spaces']    = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('UserPicture')) {
				}

				$upload_data = $this->upload->data();

				//resize
				$config['source_image']     = $upload_data['full_path'];
				$config['maintain_ratio']   = TRUE;
				$config['width']            = 350;
				$config['height']           = 265;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$indata['customer_picture'] = 'assets/img/user/' . $upload_data['file_name'];

				$this->image_lib->clear();
			} else {
				$indata['customer_picture'] = '';
			}
			$scan = scandir('application/modules/');
			$pointsys = "";
			foreach ($scan as $file) {
				if ($file == "loyalty") {
					if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
						$pointsys = 1;
					}
				}
			}

			$indata['cuntomer_no']                = $sino;
			$indata['membership_type']    		  = $pointsys;
			$indata['customer_name']    		= $this->input->post('user_name', TRUE);
			$indata['customer_email']  			= $this->input->post('user_email', TRUE);
			$indata['password']            		= md5($this->input->post('u_pass', TRUE));
			$indata['customer_address']    		= $this->input->post('address', TRUE);
			$indata['customer_phone']      		= $this->input->post('phone', TRUE);
			$indata['crdate']     		        = date('Y-m-d');

			$insert_ID = $this->frontend_model->insert_data('customer_info', $indata);
			if (!empty($pointsys)) {
				$pointstable = array(
					'customerid'   => $insert_ID,
					'amount'       => 0,
					'points'       => 10
				);
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable);
			}
			if ($insert_ID) {
				$output = $this->frontend_model->read("*", 'customer_info', array('customer_id' => $insert_ID));
				$c_name = $this->input->post('user_name');
				$c_acc = $sino . '-' . $c_name;
				$createdate = date('Y-m-d H:i:s');
				$postData1 = array(
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
					'CreateBy'         => $insert_ID,
					'CreateDate'       => $createdate,
				);
				$this->frontend_model->insert_data('acc_coa', $postData1);
				// $this->session->set_flashdata('message', display('save_successfully'));
				redirect('mylogin');
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				redirect('signup');
			}
		}
	}
	public function userregister()
	{
		$data['title'] = "Enregistrer un nouvel utilisateur";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Customer Name', 'required|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer_info.customer_email]');
		$this->form_validation->set_rules('phone', 'Mobile', 'required|is_unique[customer_info.customer_phone]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('u_pass2', 'Password', 'required');
		$this->form_validation->set_message('is_unique', 'Désolé, cette adresse %s a déjà été utilisée !');

		$coa = $this->frontend_model->headcode();
		if ($coa->HeadCode != NULL) {
			$headcode = $coa->HeadCode + 1;
		} else {
			$headcode = "102030101";
		}
		$lastid = $this->db->select("*")->from('customer_info')->order_by('cuntomer_no', 'desc')->get()->row();
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

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			$this->session->set_flashdata('exception',   $errors);
			echo $errors;
		} else {
			$scan = scandir('application/modules/');
			$pointsys = "";
			foreach ($scan as $file) {
				if ($file == "loyalty") {
					if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
						$pointsys = 1;
					}
				}
			}

			$indata['cuntomer_no']              = $sino;
			$indata['membership_type']    		= $pointsys;
			$indata['customer_name']    		= $this->input->post('user_name', TRUE);
			$indata['customer_email']  			= $this->input->post('email', TRUE);
			$indata['password']            		= md5($this->input->post('u_pass2', TRUE));
			$indata['customer_address']    		= $this->input->post('address', TRUE);
			$indata['customer_phone']      		= $this->input->post('phone', TRUE);
			$indata['crdate']     		        = date('Y-m-d');

			$insert_ID = $this->frontend_model->insert_data('customer_info', $indata);
			if (!empty($pointsys)) {
				$pointstable = array(
					'customerid'   => $insert_ID,
					'amount'       => 0,
					'points'       => 10
				);
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable);
			}
			if ($insert_ID) {
				$output = $this->frontend_model->read("*", 'customer_info', array('customer_id' => $insert_ID));
				$c_name = $this->input->post('user_name');
				$c_acc = $sino . '-' . $c_name;
				$createdate = date('Y-m-d H:i:s');
				$postData1 = array(
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
					'CreateBy'         => $insert_ID,
					'CreateDate'       => $createdate,
				);
				$this->frontend_model->insert_data('acc_coa', $postData1);

				$sessiondata = array(
					'CusUserID' => $insert_ID,
					'cusfname' => $c_name,
					'customerno' => $sino,
					'CustomerEmail' => $this->input->post('email', TRUE),
				);

				$this->session->set_userdata($sessiondata);
				echo 200;
			} else {
				echo 404;
			}
		}
	}
	public function userlogin()
	{
		$username = $this->input->post('email');
		$password = md5($this->input->post('pass1'));

		$cek = $this->frontend_model->loginUser($username, $password);
		if ($cek <> 0) {
			$userinfo = $this->frontend_model->userinfo($cek);
			$registerdate = $userinfo->crdate;
			$duration = date('Y-m-d', strtotime($registerdate . ' + 365 days'));
			$scan = scandir('application/modules/');
			$getcus = "";
			foreach ($scan as $file) {
				if ($file == "loyalty") {
					if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
						$getcus = $cek;
					}
				}
			}
			if (!empty($getcus)) {
				$crdate = date('Y-m-d');
				$oneyearbefore = date('Y-m-d', strtotime('+365 days', strtotime($registerdate)));
				$dateTimestamp1 = strtotime($registerdate);
				$dateTimestamp2 = strtotime($oneyearbefore);
				if (($dateTimestamp2 < $currentdate) && ($dateTimestamp1 >= $currentdate)) {
					$updatepoint = array('amount' => '0.00', 'points' => 10);
					$this->db->where('customerid', $cek);
					$this->db->update('tbl_customerpoint', $updatepoint);

					$updatecus = array('membership_type' => 1);
					$this->db->where('customer_id', $cek);
					$this->db->update('customer_info', $updatecus);
				}
				$condition = "order_date BETWEEN '" . $registerdate . "' AND '" . $oneyearbefore . "' AND customer_id=$cek";
				$foundorder = $this->db->select("*")->from('customer_order')->where($condition)->get()->row();

				$myid = $this->session->userdata('CusUserID');
				echo  "success";
			} else {
				$myid = $this->session->userdata('CusUserID');
				echo  "Succès";
			}
		} else {
			echo "404";
		}
	}
	public function passwordrecovery()
	{
		$data['customer_email']   = $this->input->post('email', TRUE);
		$IsReg = $this->frontend_model->checkEmailOrPhoneIsRegistered('customer_info', $data);

		if (!$IsReg) {
			echo "404";
		} else {
			$this->_sendingForgotPassMail($IsReg);
			echo "Fait";
		}
	}
	public function _sendingForgotPassMail($data)
	{
		$Password = $this->generateNumericOTP(6);
		$updatetData2 = array('password'     => md5($Password));
		$this->db->where('customer_id', $data->customer_id);
		$this->db->update('customer_info', $updatetData2);

		$email_config = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));
		$config = array(
			'protocol'  => $email_config->protocol,
			'smtp_host' => $email_config->smtp_host,
			'smtp_port' => $email_config->smtp_port,
			'smtp_user' => $email_config->sender,
			'smtp_pass' => $email_config->smtp_password,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'wordwrap'  => TRUE,
			'newline'   => '\r\n',
			'crlf'      => '\r\n'
		);

		$subject    = 'Identifiant de connexion';
		$fromEmail  = $email_config->sender;
		$message    = "Suite à votre demande, nous vous avons envoyé vos identifiants de connexion -
		<br><br>
		Nom d'utilisateur : <strong>$data->customer_email</strong><br>
		Mot de passe : <strong>$Password</strong><br>
	  
		<br>
		Merci,<br>
		<br>";

		$this->load->library('email', $config);
		$this->email->to($data->customer_email);
		$this->email->from($email_config->sender, $data->customer_name);
		$this->email->subject($subject);

		$this->email->message($message);

		return $this->email->send();
	}
	public function generateNumericOTP($n)
	{
		$generator = "AZR1BRT3CDS5QWLK7PFJM9IXY2VU4GE6HN8";
		$result = "";
		for ($i = 1; $i <= $n; $i++) {
			$result .= substr($generator, (rand() % (strlen($generator))), 1);
		}
		return $result;
	}
	public function logout()
	{
		$myid = $this->session->userdata('CusUserID');
		$this->session->unset_userdata('CusUserID');
		$this->session->unset_userdata('cusfname');
		$this->session->unset_userdata('customerno');
		$this->session->unset_userdata('CustomerEmail');
		header("Location: " . $this->config->base_url());
	}
	public function checkemailisexits()
	{
		$memail = $this->input->post('email');
		$islogin = $this->session->userdata('CusUserID');
		if (!empty($islogin)) {
			echo "Succès";
		} else {
			$emailexists = $this->db->select("*")->from('customer_info')->where('customer_email', $memail)->get()->row();
			if (!empty($emailexists)) {
				echo "404";
			} else {
				echo "Succès";
			}
		}
	}
	public function placeorder()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit;
		$memail = $this->input->post('email', TRUE);
		$emailexists = $this->db->select("*")->from('customer_info')->where('customer_email', $memail)->get()->row();
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			if (!empty($emailexists)) {
				$this->session->set_flashdata('exception',  'Votre email existe déjà !!! Veuillez essayer de vous connecter ou utiliser une autre adresse e-mail !!!');
				redirect('checkout');
				exit;
			}
			$coa = $this->frontend_model->headcode();
			if ($coa->HeadCode != NULL) {
				$headcode = $coa->HeadCode + 1;
			} else {
				$headcode = "102030101";
			}
			$lastid = $this->db->select("*")->from('customer_info')->order_by('cuntomer_no', 'desc')->get()->row();
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
			$scan = scandir('application/modules/');
			$pointsys = "";
			foreach ($scan as $file) {
				if ($file == "loyalty") {
					if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
						$pointsys = 1;
					}
				}
			}
			//insert Customer
			$user['cuntomer_no'] = $sino;
			$user['membership_type'] = $pointsys;
			$user['password'] = md5($this->input->post('password'));
			$user['customer_name'] = $this->input->post('f_name') . " " . $this->input->post('l_name');
			$user['customer_email'] = $this->input->post('email');
			$user['customer_phone'] = $this->input->post('phone');
			$user['customer_address'] = $this->input->post('billing_address_1');
			$user['favorite_delivery_address'] = $this->input->post('billing_address_1');
			$user['crdate']    = date('Y-m-d');
			$user['is_active'] = 1;
			$customerid = $this->frontend_model->insert_data('customer_info', $user);
			if (!empty($pointsys)) {
				$pointstable = array(
					'customerid'   => $customerid,
					'amount'       => 0,
					'points'       => 10
				);
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable);
			}
			//insert Coa for Customer Receivable
			$c_name = $this->input->post('f_name') . " " . $this->input->post('l_name');
			$c_acc = $sino . '-' . $c_name;
			$createdate = date('Y-m-d H:i:s');
			$postData1['HeadCode']   	= $headcode;
			$postData1['HeadName']   	= $c_acc;
			$postData1['PHeadName']   	= 'Customer Receivable';
			$postData1['HeadLevel']   	= '4';
			$postData1['IsActive']  	= '1';
			$postData1['IsTransaction'] = '1';
			$postData1['IsGL']   		= '0';
			$postData1['HeadType']  	= 'A';
			$postData1['IsBudget'] 		= '0';
			$postData1['IsDepreciation'] = '0';
			$postData1['DepreciationRate'] = '0';
			$postData1['CreateBy'] 		= $customerid;
			$postData1['CreateDate'] 	= $createdate;
			$this->frontend_model->insert_data('acc_coa', $postData1);

			$mysesdata = array('CusUserID' => $customerid);
			$this->session->set_userdata($mysesdata);
		} else {
			$customerid = $islogin;
		}
		//Order insert
		$newdate = date('Y-m-d');
		$lastorderid = $this->db->select("*")->from('customer_order')->order_by('order_id', 'desc')->get()->row();
		$ordsl = $lastorderid->order_id;
		if (empty($ordsl)) {
			$ordsl = 1;
		} else {
			$ordsl = $ordsl + 1;
		}
		$ordsi_length = strlen((int)$ordsl);
		$ordstr = '0000';
		$cutordstr = substr($ordstr, $ordsi_length);
		$ordsino = $cutordstr . $ordsl;

		$todaydate = date('Y-m-d');
		$todaystoken = $this->db->select("*")->from('customer_order')->where('order_date', $todaydate)->order_by('order_id', 'desc')->get()->row();
		if (empty($todaystoken)) {
			$mytoken = 1;
		} else {
			$mytoken = $todaystoken->tokenno + 1;
		}
		$isvatinclusive=$this->db->select("*")->from('setting')->get()->row();
		if($isvatinclusive->isvatinclusive==1){
			$Grandtotal=$this->input->post('grandtotal')-$this->input->post('vat');
		}else{
			$Grandtotal=$this->input->post('grandtotal');
		}

		$token_length = strlen((int)$mytoken);
		$tokenstr = '00';
		$newtoken = substr($tokenstr, $token_length);
		$tokenno = $newtoken . $mytoken;
		$shippingdate = $this->session->userdata('orderdate') . ' ' . $this->session->userdata('ordertime') . ':00';
		$orderinfo['customer_id']   	= $customerid;
		$orderinfo['saleinvoice']   	= $ordsino;
		$orderinfo['cutomertype']   	= 2;
		$orderinfo['waiter_id']   		= '';
		$orderinfo['order_date']  		= $newdate;
		$orderinfo['order_time'] 		= date('H:i:s');
		$orderinfo['totalamount']   	= $Grandtotal;
		$orderinfo['shipping_date']   	= $shippingdate;
		$orderinfo['table_no']  		= 0;
		$orderinfo['tokenno']  			= $tokenno;
		$orderinfo['customer_note'] 	= $this->input->post('ordre_notes');
		$orderinfo['order_status'] 		= 1;
		$orderid = $this->frontend_model->insert_data('customer_order', $orderinfo);

		$taxinfos = $this->taxchecking();
		if (!empty($taxinfos)) {
			$multitaxvalue = $this->input->post('multiplletaxvalue');
			$multitaxvaluedata = unserialize($multitaxvalue);
			$inserttaxarray = array(
				'customer_id' => $customerid,
				'relation_id' => $orderid,
				'date' => $newdate
			);
			$inserttaxdata = array_merge($inserttaxarray, $multitaxvaluedata);
			$this->db->insert('tax_collection', $inserttaxdata);
		}
		//coupon record
		if (!empty($this->session->userdata('couponcode'))) {
			$coupon['orderid']   			= $orderid;
			$coupon['couponcode']   		= $this->session->userdata('couponcode');
			$coupon['couponrate']   	    = $this->session->userdata('couponprice');;
			$this->frontend_model->insert_data('usedcoupon', $coupon);
		}

		//insert bill for online customer
		$bill['orderid'] = $orderid;
		$bill['firstname'] = $this->input->post('f_name');
		$bill['lastname'] = $this->input->post('l_name');
		$bill['companyname'] = $this->input->post('c_name');
		$bill['country'] = $this->input->post('country');
		$bill['email'] = $this->input->post('email');
		$bill['address'] = $this->input->post('billing_address_1');
		$bill['city'] = $this->input->post('town');
		$bill['district'] = $this->input->post('district');
		$bill['zip'] = $this->input->post('postcode');
		$bill['phone'] = $this->input->post('phone');
		$bill['DateInserted'] = date('Y-m-d H:i:s');
		$this->frontend_model->insert_data('tbl_billingaddress', $bill);


		$isdiffship = $this->input->post('isdiffship');
		//insert ship for online customer
		$ship['orderid'] = $orderid;
		$ship['firstname'] = $this->input->post('f_name3');
		$ship['lastname'] = $this->input->post('l_name2');
		$ship['companyname'] = $this->input->post('c_name2');
		$ship['country'] = $this->input->post('country2');
		$ship['email'] = $this->input->post('email2');
		$ship['address'] = $this->input->post('billing_address_3');
		$ship['city'] = $this->input->post('town2');
		$ship['district'] = $this->input->post('district2');
		$ship['zip'] = $this->input->post('postcode2');
		$ship['phone'] = $this->input->post('phone2');
		$ship['DateInserted'] = date('Y-m-d H:i:s');
		if (!empty($isdiffship)) {
			$this->frontend_model->insert_data('tbl_shippingaddress', $ship);
		} else {
			$this->frontend_model->insert_data('tbl_shippingaddress', $bill);
		}


		//Order transaction
		$paymentsatus = $this->input->post('card_type');
		if ($this->frontend_model->orderitem($orderid, $customerid)) {
			$this->session->set_flashdata('message', display('order_successfully_placed'));
			$getseting = $this->db->select("storename,email")->from('setting')->get()->row();
			$ToEmail = $this->input->post('email', TRUE);
			$htmlContent = SendorderEmail($orderid, $customerid);
			$send_email = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));
			$config = array(
				'protocol'  => $send_email->protocol,
				'smtp_host' => $send_email->smtp_host,
				'smtp_port' => $send_email->smtp_port,
				'smtp_user' => $send_email->sender,
				'smtp_pass' => $send_email->smtp_password,
				'mailtype'  => $send_email->mailtype,
				'charset'   => 'utf-8'
			);

			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$this->email->from($send_email->sender, $getseting->storename);
			$this->email->to($ToEmail);
			$this->email->subject('Confirmation de commande');
			$this->email->message($htmlContent);
			$this->email->send();

			$this->cart->destroy();
			$this->session->unset_userdata('shippingmethod');
			$this->session->unset_userdata('shippingrate');
			$this->session->unset_userdata('couponcode');
			$this->session->unset_userdata('couponprice');
			/*Push Notification*/
			$condition = "user.waiter_kitchenToken!='' AND employee_history.pos_id=6";
			$this->db->select('user.*,employee_history.emp_id,employee_history.employee_no,employee_history.pos_id ');
			$this->db->from('user');
			$this->db->join('employee_history', 'employee_history.emp_id = user.id', 'left');
			$this->db->where($condition);
			$query = $this->db->get();
			$allemployee = $query->result();
			$senderid = array();
			foreach ($allemployee as $mytoken) {
				$senderid[] = $mytoken->waiter_kitchenToken;
			}
			$newmsg = array(
				'tag'						=> "incoming_request",
				'orderid'					=> "875765",
				'amount'					=> "200"
			);
			$message = json_encode($newmsg);
			define('API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
			$registrationIds = $senderid;
			$msg = array(
				'message' 					=> "New Order Placed",
				'title'						=> "TSET",
				'subtitle'					=> "TSET",
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

			// $ch2 = curl_init();
			// curl_setopt($ch2, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			// curl_setopt($ch2, CURLOPT_POST, true);
			// curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
			// curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
			// curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($fields2));
			// $result2 = curl_exec($ch2);
			// curl_close($ch2);
			/*End Notification*/
			if ($paymentsatus == 5) {
				redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else if ($paymentsatus == 8) {
				redirect('frontend/payments/' . $orderid . '/2');
			} else if ($paymentsatus == 9) {
				redirect('frontend/stripe/' . $orderid . '/2');
			} else if ($paymentsatus == 10) {
				$paymentinfo = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 10));
				$nittotal = $this->input->post('grandtotal') * 100;
				echo '<form>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()" id="paytrack" style="display:none;"> Payer </button> 
</form>
<script>
document.getElementById("paytrack").click();
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: "' . $paymentinfo->password . '",
      email: "' . $paymentinfo->email . '",
      amount: "' . round($nittotal) . '",
      currency: "NGN",
      ref: ""+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Numéro de téléphone",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
		  window.location.href="' . base_url() . 'frontend/successful/' . $orderid . '/2";
      },
      onClose: function(){
           window.location.href="' . base_url() . 'menu";
      }
    });
    handler.openIframe();
  }
</script>';
			} else if ($paymentsatus == 11) {
				redirect('frontend/paytm/' . $orderid . '/2');
			} else if ($paymentsatus == 12) {
				redirect('frontend/orange/' . $orderid . '/2');
			} else if ($paymentsatus == 6) {
				redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else if ($paymentsatus == 7) {
				redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else if ($paymentsatus == 3) {
				redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else if ($paymentsatus == 2) {
				redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else if ($paymentsatus == 13) {
				redirect('frontend/iyzico_paymentgateway/' . $orderid . '/' . $paymentsatus . '/2');
			} else {
				if ($paymentsatus != 4 && $paymentsatus != 1) {
					//dynamic payment moduls
					$modules_name = $this->db->select('*')->from('payment_method')->where('payment_method_id', $paymentsatus)->get()->row();
					$checkmodule = $this->db->select('*')->from('module')->where('directory', $modules_name->modulename)->where('status', 1)->get()->num_rows();
					if ($checkmodule == 1) {
						redirect($modules_name->modulename . '/' . $modules_name->modulename . '/payment_submit/' . $orderid . '/' . $paymentsatus . '/2');
					} else {
						$this->session->set_flashdata('exception',  display('please_try_again'));
						redirect('menu');
					}
				}
				$scan = scandir('application/modules/');
				$getcus = "";
				foreach ($scan as $file) {
					if ($file == "loyalty") {
						if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
							$getcus = $customerid;
						}
					}
				}

				$totalgrtotal = round($this->input->post('grandtotal'));
				if (!empty($getcus)) {
					$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
					if (empty($isexitscusp)) {
						$pointstable2 = array(
							'customerid'   => $customerid,
							'amount'       => "",
							'points'       => 10
						);
						$this->frontend_model->insert_data('tbl_customerpoint', $pointstable2);
					}
				}
				$WhatsApp = $this->db->where('directory', 'whatsapp')->where('status', 1)->get('module');
				$whatsapp_count = $WhatsApp->num_rows();
				if ($whatsapp_count  == 1) {
					$wtapp = $this->db->select('*')->from('whatsapp_settings')->get()->row();
					if ($wtapp->orderenable == 1) {
						redirect('orderdelevered/' . $orderid);
					} else {
						redirect('menu/');
					}
				} else {
					redirect('menu');
				}
			}
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			redirect('menu');
		}
	}

	public function placeorderqr()
	{
		$this->form_validation->set_rules('customerName', "Customer Name", 'required');
		$this->form_validation->set_rules('phone', "Phone Number", 'required');
		if ($this->form_validation->run()) {
			$this->session->unset_userdata('shippingid');
			$sessiondataqr = array('shippingid' => $this->input->post('shippingtype'));
			$this->session->set_userdata($sessiondataqr);

			$customerName = $this->input->post('customerName', TRUE);
			$phone = $this->input->post('phone', TRUE);
			$mytoken = $this->session->userdata('token');
			$emailexists = $this->db->select("*")->from('customer_info')->where('customer_name', $customerName)->where('customer_phone', $phone)->where('customer_token', $mytoken)->get()->row();
			if (empty($emailexists)) {
				$coa = $this->frontend_model->headcode();
				if ($coa->HeadCode != NULL) {
					$headcode = $coa->HeadCode + 1;
				} else {
					$headcode = "102030101";
				}
				$lastid = $this->db->select("*")->from('customer_info')->order_by('cuntomer_no', 'desc')->get()->row();
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
				//insert Customer
				$scan = scandir('application/modules/');
				$pointsys = "";
				foreach ($scan as $file) {
					if ($file == "loyalty") {
						if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
							$pointsys = 1;
						}
					}
				}


				$user['cuntomer_no'] = $sino;
				$user['membership_type'] 			= $pointsys;
				$user['password'] = md5(12345);
				$user['customer_name'] = $this->input->post('customerName', TRUE);
				$user['customer_email'] = $phone . "@gmail.com";
				$user['customer_phone'] = $this->input->post('phone', TRUE);
				$user['customer_token'] = $this->session->userdata('token');
				$user['customer_address'] = "Not Set";
				$user['favorite_delivery_address'] = "Not Set";
				$user['crdate']    = date('Y-m-d');
				$user['is_active'] = 1;
				$customerid = $this->frontend_model->insert_data('customer_info', $user);
				if (!empty($pointsys)) {
					$pointstable = array(
						'customerid'   => $customerid,
						'amount'       => 0,
						'points'       => 10
					);
					$this->frontend_model->insert_data('tbl_customerpoint', $pointstable);
				}
				//insert Coa for Customer Receivable
				$c_name = $this->input->post('customerName', TRUE);
				$c_acc = $sino . '-' . $c_name;
				$createdate = date('Y-m-d H:i:s');
				$postData1['HeadCode']   	= $headcode;
				$postData1['HeadName']   	= $c_acc;
				$postData1['PHeadName']   	= 'Customer Receivable';
				$postData1['HeadLevel']   	= '4';
				$postData1['IsActive']  	= '1';
				$postData1['IsTransaction'] = '1';
				$postData1['IsGL']   		= '0';
				$postData1['HeadType']  	= 'A';
				$postData1['IsBudget'] 		= '0';
				$postData1['IsDepreciation'] = '0';
				$postData1['DepreciationRate'] = '0';
				$postData1['CreateBy'] 		= $customerid;
				$postData1['CreateDate'] 	= $createdate;
				$this->frontend_model->insert_data('acc_coa', $postData1);
				$mysesdata = array('CusUserID' => $customerid);
				$this->session->set_userdata($mysesdata);
			} else {

				$customerid = $emailexists->customer_id;
				$mysesdata = array('CusUserID' => $customerid);
				$this->session->set_userdata($mysesdata);
				$updatetoken = array('customer_token' => $this->session->userdata('token'));
				$this->db->where('customer_id', $customerid);
				$this->db->update('customer_info', $updatetoken);
			}

			//Order insert
			$newdate = date('Y-m-d');
			$lastorderid = $this->db->select("*")->from('customer_order')->order_by('order_id', 'desc')->get()->row();
			$ordsl = $lastorderid->order_id;
			if (empty($ordsl)) {
				$ordsl = 1;
			} else {
				$ordsl = $ordsl + 1;
			}
			$isvatinclusive=$this->db->select("*")->from('setting')->get()->row();
			if($isvatinclusive->isvatinclusive==1){
				$Grandtotal=$this->input->post('grandtotal')-$this->input->post('vat');
			}else{
				$Grandtotal=$this->input->post('grandtotal');
			}
			$ordsi_length = strlen((int)$ordsl);
			$ordstr = '0000';
			$cutordstr = substr($ordstr, $ordsi_length);
			$ordsino = $cutordstr . $ordsl;
			$orderinfo['customer_id']   	= $customerid;
			$orderinfo['saleinvoice']   	= $ordsino;
			$orderinfo['cutomertype']   	= 99;
			$orderinfo['waiter_id']   		= '';
			$orderinfo['order_date']  		= $newdate;
			$orderinfo['order_time'] 		= date('H:i:s');
			$orderinfo['totalamount']   	= $Grandtotal;
			$orderinfo['table_no']  		= $this->session->userdata('tableid');
			$orderinfo['customer_note'] 	= $this->input->post('ordernote');
			$orderinfo['order_status'] 		= 1;
			$orderid = $this->frontend_model->insert_data('customer_order', $orderinfo);


			//coupon record
			if (!empty($this->session->userdata('couponcode'))) {
				$coupon['orderid']   			= $orderid;
				$coupon['couponcode']   		= $this->session->userdata('couponcode');
				$coupon['couponrate']   	    = $this->session->userdata('couponprice');;
				$this->frontend_model->insert_data('usedcoupon', $coupon);
			}
			//insert bill for online customer
			$bill['orderid'] = $orderid;
			$bill['firstname'] = $this->input->post('customerName', TRUE);
			$bill['lastname'] = $this->input->post('customerName', TRUE);
			$bill['companyname'] = "Not Set";
			$bill['country'] = "";
			$bill['email'] = "";
			$bill['address'] = "Not Set";
			$bill['city'] = "";
			$bill['district'] = "";
			$bill['zip'] = "";
			$bill['phone'] = $this->input->post('phone', TRUE);
			$bill['DateInserted'] = date('Y-m-d H:i:s');
			$this->frontend_model->insert_data('tbl_billingaddress', $bill);

			//insert ship for online customer
			$ship['orderid'] = $orderid;
			$ship['firstname'] = $this->input->post('customerName', TRUE);
			$ship['lastname'] = $this->input->post('customerName', TRUE);
			$ship['companyname'] = "Not Set";
			$ship['country'] = "";
			$ship['email'] = "";
			$ship['address'] = "Not Set";
			$ship['city'] = "";
			$ship['district'] = "";
			$ship['zip'] = "";
			$ship['phone'] = $this->input->post('phone', TRUE);
			$ship['DateInserted'] = date('Y-m-d H:i:s');
			$this->frontend_model->insert_data('tbl_shippingaddress', $ship);


			//Order transaction
			$paymentsatus = $this->input->post('card_type');
			if ($this->frontend_model->orderitem($orderid, $customerid)) {
				$this->session->set_flashdata('message', display('order_successfully_placed'));
				$getseting = $this->db->select("storename,email")->from('setting')->get()->row();
				$ToEmail = $this->input->post('email', TRUE);
				$htmlContent = SendorderEmail($orderid, $customerid);
				$send_email = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));
				$config = array(
					'protocol'  => $send_email->protocol,
					'smtp_host' => $send_email->smtp_host,
					'smtp_port' => $send_email->smtp_port,
					'smtp_user' => $send_email->sender,
					'smtp_pass' => $send_email->smtp_password,
					'mailtype'  => $send_email->mailtype,
					'charset'   => 'utf-8'
				);
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from($send_email->sender, $getseting->storename);
				$this->email->to($ToEmail);
				$this->email->subject('Confirmation de commande');
				$this->email->message($htmlContent);
				$this->email->send();



				$this->cart->destroy();
				$this->session->unset_userdata('shippingmethod');
				$this->session->unset_userdata('shippingrate');
				$this->session->unset_userdata('couponcode');
				$this->session->unset_userdata('couponprice');
				$this->session->unset_userdata('shippingid');
				/*Push Notification*/
				$condition = "user.waiter_kitchenToken!='' AND employee_history.pos_id=6";
				$this->db->select('user.*,employee_history.emp_id,employee_history.employee_no,employee_history.pos_id ');
				$this->db->from('user');
				$this->db->join('employee_history', 'employee_history.emp_id = user.id', 'left');
				$this->db->where($condition);
				$query = $this->db->get();
				$allemployee = $query->result();
				$senderid = array();
				foreach ($allemployee as $mytoken) {
					$senderid[] = $mytoken->waiter_kitchenToken;
				}
				$newmsg = array(
					'tag'						=> "incoming_request",
					'orderid'					=> "875765",
					'amount'					=> "200"
				);
				$message = json_encode($newmsg);
				define('API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
				$registrationIds = $senderid;
				$msg = array(
					'message' 					=> "New Order Placed",
					'title'						=> "TSET",
					'subtitle'					=> "TSET",
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

				if ($paymentsatus == 5) {
					redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/1');
				} else if ($paymentsatus == 8) {
					redirect('frontend/payments/' . $orderid . '/1');
				} else if ($paymentsatus == 9) {
					redirect('frontend/stripe/' . $orderid . '/1');
				} else if ($paymentsatus == 10) {
					$paymentinfo = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 10));
					$nittotal = $this->input->post('grandtotal') * 100;
					echo '<form>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()" id="paytrack" style="display:none;"> Payer </button> 
</form>
<script>
document.getElementById("paytrack").click();
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: "' . $paymentinfo->password . '",
      email: "' . $paymentinfo->email . '",
      amount: "' . round($nittotal) . '",
      currency: "NGN",
      ref: ""+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Numéro de téléphone",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
		  window.location.href="' . base_url() . 'frontend/successful/' . $orderid . '/1";
      },
      onClose: function(){
           window.location.href="' . base_url() . 'qr-menu";
      }
    });
    handler.openIframe();
  }
</script>';
				} else if ($paymentsatus == 11) {
					redirect('frontend/paytm/' . $orderid . '/1');
				} else if ($paymentsatus == 12) {
					redirect('frontend/orange/' . $orderid . '/1');
				} else if ($paymentsatus == 6) {
					redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/1');
				} else if ($paymentsatus == 7) {
					redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/1');
				} else if ($paymentsatus == 3) {
					redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/1');
				} else if ($paymentsatus == 2) {
					redirect('frontend/paymentgateway/' . $orderid . '/' . $paymentsatus . '/1');
				} else {
					$mysesdata = array('CusUserID' => $customerid);
					$this->session->set_userdata($mysesdata);
					if ($paymentsatus != 4 && $paymentsatus != 1) {
						//dynamic payment moduls
						$modules_name = $this->db->select('*')->from('payment_method')->where('payment_method_id', $paymentsatus)->get()->row();
						$checkmodule = $this->db->select('*')->from('module')->where('directory', $modules_name->modulename)->where('status', 1)->get()->num_rows();
						if ($checkmodule == 1) {
							redirect($modules_name->modulename . '/' . $modules_name->modulename . '/payment_submit/' . $orderid . '/' . $paymentsatus . '/1');
						} else {
							$this->session->set_flashdata('exception',  display('please_try_again'));
							redirect('qr-menu');
						}
					}
					$scan = scandir('application/modules/');
					$getcus = "";
					foreach ($scan as $file) {
						if ($file == "loyalty") {
							if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
								$getcus = $customerid;
							}
						}
					}

					$totalgrtotal = round($this->input->post('grandtotal'));
					if (!empty($getcus)) {
						$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
						if (empty($isexitscusp)) {
							$pointstable2 = array(
								'customerid'   => $customerid,
								'amount'       => "",
								'points'       => 10
							);
							$this->frontend_model->insert_data('tbl_customerpoint', $pointstable2);
						}
					}

					redirect('frontend/cashpayment/' . $orderid);
				}
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				redirect('qr-menu');
			}
		} else {
			redirect('qr-app-cart');
		}
	}
	public function cashpayment($orderid)
	{

		$orderinfor = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerinfo 	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $orderinfor->customer_id));
		$icon = base_url('assets/img/applogo.png');
		$fields3 = array(
			'to' => $customerinfo->customer_token,
			'data' => array(
				'title' => 'Commande passée avec succès !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Placé avec succès. Veuillez attendre servi',
				'image' => $icon,
				'media_type' => "image",
				'message' => "test",
				"action" => "1",
			),
			'notification' => array(
				'sound' => "default",
				'title' => 'Commande passée avec succès !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Placé avec succès. Veuillez attendre servi',
				'image' => $icon,
			)
		);
		$post_data3 = json_encode($fields3);
		$url = "https://fcm.googleapis.com/fcm/send";
		$ch3  = curl_init($url);
		curl_setopt($ch3, CURLOPT_FAILONERROR, TRUE);
		curl_setopt($ch3, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch3, CURLOPT_POSTFIELDS, $post_data3);
		curl_setopt(
			$ch3,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Key=AAAA4j0CZSQ:APA91bGhEmG9eS2IUjPam6jpDtfBEyvLXGccd_BWGeGolN2pXiVrJ9d06wNut4sXN698cGTgIimXhC6S1CXRnXxRaGmF7n_OvZBK0e3zwqJ1CA6zwRqMaajfxtekvcbaGNfUZmWuRjHZ',
				'Content-Type: application/json'
			)
		);
		$result3 = curl_exec($ch3);
		curl_close($ch3);

		$this->session->set_flashdata('message', display('order_successfully_placed'));
		redirect('qr-menu');
	}

	public function payments($orderid, $page = null)
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 8));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/square', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function payments_process()
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$orderid = $this->input->post('orderid', true);
		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 8));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $pageid;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/payment-process', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function paytm($orderid, $page = null)
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 11));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/paytm', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function pgRedirect()
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$orderid = $this->input->post('orderid', true);
		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 11));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$pageid = $this->input->post('pageid', true);
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/PaytmKit/pgRedirect', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function stripe($orderid, $page)
	{
		$data['title'] = "Informations de paiement Stripe";
		$data['seoterm'] = "stripe_payment_information";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 9));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/stripe_view', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function stripePost()
	{
		require_once('application/libraries/stripe-php/init.php');
		$orderid = $this->input->post('orderid', true);
		$amount = $this->input->post('amount', true);
		$currency = $this->input->post('currency', true);

		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$paymentinfo   	          = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 9));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);

		\Stripe\Stripe::setApiKey($paymentinfo->marchantid);

		\Stripe\Charge::create([
			"amount" => $amount,
			"currency" => $currency,
			"source" => $this->input->post('stripeToken'),
			"description" => "Teste de paiement depuis itsolutionstuff.com."
		]);

		$this->session->set_flashdata('success', 'Paiement effectué avec succès.');

		redirect('frontend/successful/' . $orderid . '/' . $pageid, 'refresh');
	}

	public function orange($orderid, $page = null)
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$paymentinfo  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 12));
		$this->lsoft_setting->payment_by_orange_money_lib($orderid, $orderinfo->customer_id, $paymentinfo->paymentid);
		echo '<p style="text-align:center">Veuillez patienter........</p>';
	}

	public function paymentgateway($orderid, $paymentid, $page = null)
	{
		$data['title'] = "Informations de paiement";
		$data['seoterm'] = "payment_information";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	   = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$customer  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
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
			$post_data['currency'] =  $data['paymentinfo']->currency;
			$post_data['tran_id'] = $orderid;
			$post_data['success_url'] =  base_url() . "frontend/successful/" . $orderid . '/' . $page;
			$post_data['fail_url'] = base_url() . "frontend/fail/" . $orderid . '/' . $page;
			$post_data['cancel_url'] = base_url() . "frontend/cancilorder/" . $orderid . '/' . $page;
			//$post_data['multi_card_name']="mastercard,visacard,amexcard,bkash";
			# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

			# EMI INFO
			# $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
			# $post_data['emi_max_inst_option'] = "9";
			# $post_data['emi_selected_inst'] = "9";

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
			echo "<h3>Attendez...Traitement des paiements SSLCOMMERZ....</h3>";

			if ($this->sslcommerz->RequestToSSLC($post_data, false)) {

				redirect('frontend/fail/' . $orderid . '/' . $page);
			}
		} else if ($paymentid == 6) {
			$data['page'] = $page;
			$this->load->view('themes/' . $this->themeinfo->themename . '/sips', $data);
		} else if ($paymentid == 7) {
			$data['page'] = $page;
			$this->load->view('themes/' . $this->themeinfo->themename . '/rma', $data);
		} else if ($paymentid == 3) {
			$data['page'] = $page;
			$this->load->view('themes/' . $this->themeinfo->themename . '/paypal', $data);
		} else if ($paymentid == 2) {
			$data['page'] = $page;
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/2checkout', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function iyzico_paymentgateway($orderid, $paymentid, $page = null)
	{
		$data['title'] = "Informations de paiement";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	   = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);


		$value =  $this->load->library('Iyzipaybootstrap');

		$config = new \Iyzipay\Options();
		$config->setApiKey($data['paymentinfo']->marchantid);
		$config->setSecretKey($data['paymentinfo']->password);
		if ($data['paymentinfo']->Islive == 1) {
			$config->setBaseUrl('https://api.iyzipay.com');
		} else {
			$config->setBaseUrl('https://sandbox-api.iyzipay.com');
		}

		$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
		$request->setLocale(\Iyzipay\Model\Locale::TR);
		$request->setConversationId($orderid);
		$request->setPrice($bill->total_amount);
		$request->setPaidPrice($bill->bill_amount);
		$request->setCurrency(\Iyzipay\Model\Currency::TL);
		$request->setBasketId($orderid);
		$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
		if ($page == 2) {
			$request->setCallbackUrl(base_url() . "frontend/successful/" . $orderid . '/2');
		} else {
			$request->setCallbackUrl(base_url() . "qr-menu");
		}

		/*set */
		$buyer = new \Iyzipay\Model\Buyer();
		$buyer->setId($data['customerinfo']->customer_id);
		$buyer->setName($data['customerinfo']->customer_name);
		$buyer->setSurname($data['customerinfo']->customer_name);
		$buyer->setGsmNumber($data['customerinfo']->customer_phone);
		$buyer->setEmail($data['customerinfo']->customer_email);
		$buyer->setIdentityNumber("12332432");
		$buyer->setLastLoginDate(date('Y-m-d H:i:s'));
		$buyer->setRegistrationDate(date('Y-m-d H:i:s'));
		$buyer->setRegistrationAddress($data['customerinfo']->customer_address);

		$buyer->setCity($data['customerinfo']->customer_address);
		$buyer->setCountry("Turkey");
		$buyer->setZipCode("23233");

		$request->setBuyer($buyer);
		$shippingAddress = new \Iyzipay\Model\Address();
		$shippingAddress->setContactName($data['customerinfo']->customer_name);
		$shippingAddress->setCity($data['customerinfo']->customer_address);
		$shippingAddress->setCountry("Turkey");
		$shippingAddress->setAddress($data['customerinfo']->customer_address);
		$shippingAddress->setZipCode("23233");
		$request->setShippingAddress($shippingAddress);

		$billingAddress = new \Iyzipay\Model\Address();
		$billingAddress->setContactName($data['customerinfo']->customer_name);
		$billingAddress->setCity($data['customerinfo']->customer_address);
		$billingAddress->setCountry("Turkey");
		$billingAddress->setAddress($data['customerinfo']->customer_address);
		$billingAddress->setZipCode("23233");
		$request->setBillingAddress($billingAddress);

		$basketItems = array();
		$i = 0;
		foreach ($data['iteminfo'] as $item_info) {
			$price = 0;
			if (empty($item_info->add_on_id)) {
				$secondBasketItem = new \Iyzipay\Model\BasketItem();
				$secondBasketItem->setId($orderid);
				$secondBasketItem->setName($item_info->ProductName);
				$secondBasketItem->setCategory1("food");
				$secondBasketItem->setCategory2("food");
				$secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
				$secondBasketItem->setPrice($item_info->price * $item_info->menuqty);

				$basketItems[$i] = $secondBasketItem;
			} else {
				$addonsid = explode(',', $item_info->add_on_id);
				$addonsqty = explode(',', $item_info->addonsqty);
				$u = 0;
				$price = $item_info->price * $item_info->menuqty;
				foreach ($addonsid as $value) {
					$add_ons = $this->frontend_model->read('*', 'add_ons', array('add_on_id' => $value));
					$price = $price + ($add_ons->price) * $addonsqty[$u];
					$u++;
				}
				$secondBasketItem = new \Iyzipay\Model\BasketItem();
				$secondBasketItem->setId($orderid);
				$secondBasketItem->setName($item_info->ProductName);
				$secondBasketItem->setCategory1("food");
				$secondBasketItem->setCategory2("food");
				$secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
				$secondBasketItem->setPrice($price);

				$basketItems[$i] = $secondBasketItem;
			}
			$i++;
		}





		$request->setBasketItems($basketItems);

		$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $config);


		$a = $checkoutFormInitialize->getPaymentPageUrl();
		echo $a;
		header("Location: $a");
	}

	public function successful($orderid, $page = null)
	{
		$billinfo = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;
		$scan = scandir('application/modules/');
		$getcus = "";
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$getcus = $customerid;
				}
			}
		}

		$totalgrtotal = round($orderinfo->totalamount);
		$checkpointcondition = "$totalgrtotal BETWEEN amountrangestpoint AND amountrangeedpoint";

		if (!empty($getcus)) {
			$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
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
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable2);
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
		}
		$updatetData = array('bill_status' => 1, 'create_at' => date('Y-m-d H:i:s'));
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetData);

		$updatetData2 = array('order_status'     => 4);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData2);
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();


		$this->session->set_flashdata('message', display('order_successfully'));

		if ($page == 1) {
			$registrationIds[] = $cusinfo->customer_token;
			$header = array(
				'Authorization: Key=AAAA4j0CZSQ:APA91bGhEmG9eS2IUjPam6jpDtfBEyvLXGccd_BWGeGolN2pXiVrJ9d06wNut4sXN698cGTgIimXhC6S1CXRnXxRaGmF7n_OvZBK0e3zwqJ1CA6zwRqMaajfxtekvcbaGNfUZmWuRjHZ',
				'Content-Type: Application/json'
			);

			$msg = array(
				'title' => 'Commande passée avec succès !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Placé avec succès. Veuillez attendre servi',
				'icon' => 'img/icon.png',
				'image' => 'img/d.png',
			);

			$payload = array(
				'registration_ids' 	=> $registrationIds,
				'data'				=> $msg
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			} else {
			}
			redirect('qr-menu');
		} else {

			$WhatsApp = $this->db->where('directory', 'whatsapp')->where('status', 1)->get('module');
			$whatsapp_count = $WhatsApp->num_rows();
			if ($whatsapp_count  == 1) {
				$wtapp = $this->db->select('*')->from('whatsapp_settings')->get()->row();
				if ($wtapp->orderenable == 1) {
					redirect('orderdelevered/' . $orderid);
				} else {
					redirect('menu/');
				}
			} else {
				redirect('menu');
			}
		}
	}

	public function successful2($page = null)
	{
		$orderid = $this->input->post('li_0_name');

		$billinfo = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;
		$scan = scandir('application/modules/');
		$getcus = "";
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$getcus = $customerid;
				}
			}
		}

		$totalgrtotal = round($orderinfo->totalamount);
		$checkpointcondition = "$totalgrtotal BETWEEN amountrangestpoint AND amountrangeedpoint";

		if (!empty($getcus)) {
			$isexitscusp = $this->db->select("*")->from('tbl_customerpoint')->where('customerid', $customerid)->get()->row();
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
				$this->frontend_model->insert_data('tbl_customerpoint', $pointstable2);
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
		}
		$updatetData = array('bill_status' => 1, 'create_at' => date('Y-m-d H:i:s'));
		$this->db->where('order_id', $orderid);
		$this->db->update('bill', $updatetData);

		$updatetData2 = array('order_status'     => 4);
		$this->db->where('order_id', $orderid);
		$this->db->update('customer_order', $updatetData2);

		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();

		$this->session->set_flashdata('message', display('order_successfully'));

		if ($page == 1) {
			$registrationIds[] = $cusinfo->customer_token;
			$header = [
				'Authorization: Key=AAAA4j0CZSQ:APA91bGhEmG9eS2IUjPam6jpDtfBEyvLXGccd_BWGeGolN2pXiVrJ9d06wNut4sXN698cGTgIimXhC6S1CXRnXxRaGmF7n_OvZBK0e3zwqJ1CA6zwRqMaajfxtekvcbaGNfUZmWuRjHZ',
				'Content-Type: Application/json'
			];

			$msg = [
				'title' => 'Commande passée avec succès !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Placé avec succès. Veuillez attendre servi',
				'icon' => 'img/icon.png',
				'image' => 'img/d.png',
			];

			$payload = [
				'registration_ids' 	=> $registrationIds,
				'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			} else {
			}
			redirect('qr-menu');
		} else {

			$WhatsApp = $this->db->where('directory', 'whatsapp')->where('status', 1)->get('module');
			$whatsapp_count = $WhatsApp->num_rows();
			if ($whatsapp_count  == 1) {
				$wtapp = $this->db->select('*')->from('whatsapp_settings')->get()->row();
				if ($wtapp->orderenable == 1) {
					redirect('orderdelevered/' . $orderid);
				} else {
					redirect('menu/');
				}
			} else {
				redirect('menu');
			}
		}
	}

	public function cancilorder($orderid, $page = null)
	{
		$this->session->set_flashdata('message', display('order_fail'));
		if ($page == 1) {
			redirect('qr-menu');
		} else {
			redirect('menu');
		}
	}

	public function orderdelevered($orderid)
	{
		$data['title'] = "Menu";
		$data['seoterm'] = "menu";
		if (empty($this->session->userdata('categoryid'))) {
			$categoryid = $this->input->post('category_id');
		} else {
			$categoryid = $this->session->userdata('categoryid');
		}
		$productid = $this->input->post('product_id');
		$sessiondata = array('categoryid' => $categoryid, 'product_id' => $productid);
		$this->session->set_userdata($sessiondata);
		$product  = $this->session->userdata('product_id');
		$category = $this->session->userdata('categoryid');
		if ($this->themeinfo->themename == "modern") {
			$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '11'));
			$data["categorylist"] = $this->frontend_model->categories();
			$start = $this->input->post('start');
			$limit = $this->input->post('limit');
			$data["searchresult"] = $this->frontend_model->searchinfo($product = null, $category = null, $limit, $start);
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'shipping_method', 'ship_id', '', 'is_active', '1');
			$data['delivarytime'] =  $this->frontend_model->read_all('*', 'tbl_delivaritime', '', '', '', '');
			$data['totalrows'] =  $this->frontend_model->count_totalitem($product, $category);
			$countall = $data['totalrows'];
			if ($page == 0) {
				$initial = 1;
				$pagenum = 1;
				$numrecord = $config["per_page"];
			} else {
				$pageofset = $page / $config["per_page"];
				$pagenum = $pageofset + 1;
				$numrecord = $config["per_page"] * $pagenum;
				if ($config['total_rows'] < $numrecord) {
					$numrecord = $config['total_rows'];
				}
				$initial = $page + 1;
			}
			$data['showing'] = "Montrant  " . $initial . " - " . $numrecord . " sur " . $config['total_rows'];
		} else {
			$data['offerimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '8'));
			$data["searchresult"] = $this->frontend_model->searchinfo($product, $category, '', '');
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['ads'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => 4));
			$data["categorylist"] = $this->frontend_model->categories();
			$data["deals"] = $this->frontend_model->todaydeals();
			$data['totalrows'] =  $this->frontend_model->count_totalitem($product, $category);
			$countall = $data['totalrows'];
			if ($page == 0) {
				$initial = 1;
				$pagenum = 1;
				$numrecord = $config["per_page"];
			} else {
				$pageofset = $page / $config["per_page"];
				$pagenum = $pageofset + 1;
				$numrecord = $config["per_page"] * $pagenum;
				if ($config['total_rows'] < $numrecord) {
					$numrecord = $config['total_rows'];
				}
				$initial = $page + 1;
			}
			$data['showing'] = "Montrant  " . $initial . " - " . $numrecord . " sur " . $config['total_rows'];
			$data["links"] = $this->pagination->create_links();
		}

		#
		#pagination ends
		#  

		$data['taxinfos'] = $this->taxchecking();
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}

		$data['orderid'] = $orderid;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/complete', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function about()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "À propos de nous";
		$data['seoterm'] = "about_us";
		$data['banner_story'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '2');
		$data['banner_menu'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '3');
		$data['foodhistory'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '5');
		$data['gallery'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '7');
		$data['banner_modern'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', '', 'delation_status', 'Sltypeid', '13');
		$data['banner_middle'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '15'));
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['ourteam'] =  $this->frontend_model->ourteam();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/about', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function contact()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "Contactez nous";
		$data['seoterm'] = "contact_us";
		$data['slider_info'] =  $this->frontend_model->read_all_slider('*', 'tbl_slider', 'slid', 'delation_status', 'Sltypeid', '1');
		$data['contactimg'] =  $this->frontend_model->read('*', 'tbl_slider', array('Sltypeid' => '10'));
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/contact', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function sendemail()
	{

		$send_email = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));
		$fullname = $this->input->post('firstname', TRUE) . ' ' . $this->input->post('lastname', TRUE);
		$email = $this->input->post('email', TRUE);
		$text = $this->input->post('comments', TRUE);
		$phone = $this->input->post('phone', TRUE);
		$subject = "Punjabi Palace Contact Request";
		$emailtext = '<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi ' . $fullname . ',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Phone:' . $phone . '</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">' . $text . '</p>';
		
		
		
		$config = array(
			'protocol'  => $send_email->protocol,
			'smtp_host' => $send_email->smtp_host,
			'smtp_port' => $send_email->smtp_port,
			'smtp_user' => $send_email->sender,
			'smtp_pass' => $send_email->smtp_password,
			'mailtype'  => $send_email->mailtype,
			'charset'   => 'utf-8'
		);

		// $fullname = $this->input->post('firstname', TRUE) . ' ' . $this->input->post('lastname', TRUE);
		// $email = $this->input->post('email', TRUE);
		// $text = $this->input->post('comments', TRUE);
		// $phone = $this->input->post('phone', TRUE);

		$to = 'bookings@punjabipalace.com.au'; // Replace with your recipient email
		$to1 = 'jsaha.adzguru@gmail.com'; // For Testing Purpose

		// Create HTML email content
		$message = '
		<html>
		<head>
		<title>' . $subject . '</title>
		</head>
		<body>
		<p style="font-family: sans-serif; font-size: 14px;">Someone Contacted Punjabi Palace. Here is the Details below: </p>
		<p style="font-family: sans-serif; font-size: 14px;">Name: ' . htmlspecialchars($fullname) . ',</p>
		<p style="font-family: sans-serif; font-size: 14px;">Phone: ' . htmlspecialchars($phone) . '</p>
		<p style="font-family: sans-serif; font-size: 14px;">Message: ' . nl2br(htmlspecialchars($text)) . '</p>
		</body>
		</html>
		';

		// Set headers
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: Punjabi Palace <' . $email . ">\r\n";
		$headers .= 'Reply-To: ' . $email . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();

		// Send the email
		mail($to, $subject, $message, $headers);
		mail($to1, $subject, $message, $headers); // For Testing

		$data = [
			'fullname' => $fullname,
			'email' => $email,
			'phone' => $phone,
			'text' => $text,
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('contact_data', $data);

		// $this->load->library('email');
		// $this->email->initialize($config);
		// $this->email->set_newline("\r\n");
		// $this->email->set_mailtype("html");
		// $this->email->from($email, 'Contact Info');
		// $this->email->to($send_email->sender);
		// $this->email->subject($subject);
		// $this->email->message($emailtext);
		// $this->email->send();
		$this->session->set_flashdata('message', display('contact_send'));
		redirect('contact/');
	}

	public function subscribe()
	{
		$fromemail = $this->input->post('email');
		$subject = "Souscription Client";
		$exitsemail = $this->frontend_model->read('*', 'subscribe_emaillist', array('email' => $fromemail));
		if (empty($exitsemail)) {
			$send_email = $this->frontend_model->read('*', 'email_config', array('email_config_id' => 1));
			$config = array(
				'protocol'  => $send_email->protocol,
				'smtp_host' => $send_email->smtp_host,
				'smtp_port' => $send_email->smtp_port,
				'smtp_user' => $send_email->sender,
				'smtp_pass' => $send_email->smtp_password,
				'mailtype'  => $send_email->mailtype,
				'charset'   => 'utf-8'
			);


			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$htmlContent = SubscribeEmail($fromemail);
			$this->email->from($send_email->sender, 'Manger affamé');
			$this->email->to($fromemail);
			$this->email->subject($subject);
			$this->email->message($htmlContent);
			$this->email->send();
			$subs['email'] 		        = $fromemail;
			$subs['dateinsert'] 		= date('Y-m-d H:i:s');
			$this->frontend_model->insert_data('subscribe_emaillist', $subs);
		}
	}

	public function privacy()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "Politique de confidentialité";
		$data['seoterm'] = "privacy_policy";
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/privacy', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function terms()
	{
		if ($this->webinfo->web_onoff == 0) {
			redirect(base_url() . 'login');
			exit;
		}
		$data['title'] = "Nos termes et conditions";
		$data['seoterm'] = "our_terms";
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/terms', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function termsqr()
	{
		$data['title'] = "Nos termes et conditions";
		$data['seoterm'] = "our_terms";
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$this->load->view('themes/' . $this->themeinfo->themename . '/termsqr', $data);
	}

	public function refundpolicyqr()
	{
		$data['title'] = "Politiques de remboursement";
		$data['seoterm'] = "refundpolity";
		$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
		$this->load->view('themes/' . $this->themeinfo->themename . '/returnpolicyqr', $data);
	}

	public function myprofile()
	{
		$data['title'] = "Mon profil";
		$data['seoterm'] = "my_profile";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('mylogin');
		} else {
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/profile', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function updateprofile()
	{
		$this->form_validation->set_rules('Customerid', 'Customer ID', 'required');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|max_length[100]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$Customerid = $this->input->post('Customerid');
		if ($this->form_validation->run()) {
			$custinfo = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $Customerid));

			if (!empty($custinfo)) {
				if ($this->input->post('password') == '') {
					$psaaword = $custinfo->password;
				} else {
					$psaaword = md5($this->input->post('password'));
				}
				$customernum = $custinfo->cuntomer_no;
				$headname = $custinfo->cuntomer_no . '-' . $custinfo->customer_name;
				$coa = $this->frontend_model->read('*', 'acc_coa', array('HeadName' => $headname));
				$coaheadid = $coa->HeadCode;

				//logo upload
				$logo = $this->fileupload->do_upload(
					'assets/img/icons/',
					'UserPicture'
				);
				// if logo is uploaded then resize the logo
				if ($logo !== false && $logo != null) {
					$this->fileupload->do_resize(
						$logo,
						210,
						210
					);
				}
				//if logo is not uploaded
				if ($logo === false) {
					$this->session->set_flashdata('exception', display('invalid_logo'));
				}

				$updatetData['customer_id']    			    = $Customerid;
				$updatetData['customer_name']    			= $this->input->post('customer_name', TRUE);
				$updatetData['password']            		= $psaaword;
				$updatetData['customer_address']    		= $this->input->post('address', TRUE);
				$updatetData['customer_phone']      		= $this->input->post('mobile', TRUE);
				$updatetData['customer_picture']      		= (!empty($logo) ? $logo : $this->input->post('oldimage'));
				$updatetData['favorite_delivery_address']  = $this->input->post('favouriteaddress', TRUE);
				$update = $this->frontend_model->update_info('customer_info', $updatetData, 'customer_id', $Customerid);


				if ($update) {
					$newhead = $customernum . '-' . $this->input->post('customer_name');
					$coa_update = array('HeadName'        => $newhead);
					$this->db->where('HeadCode', $coaheadid);
					$this->db->update('acc_coa', $coa_update);

					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('myprofile');
				} else {
					$this->session->set_flashdata('exception',  display('please_try_again'));
					redirect('myprofile');
				}
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				redirect('myprofile');
			}
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			redirect('myprofile');
		}
	}

	public function myorderlist()
	{
		$data['title'] = "Ma Liste de Commande";
		$data['seoterm'] = "my_order_list";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('mylogin');
		} else {
			$data['iteminfo'] = $this->frontend_model->myorderlist($islogin);
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/myorderlist', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function apporedrlist()
	{
		$data['title'] = "Ma Liste de Commande QR";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('qr-menu');
		} else {
			$data['iteminfo'] = $this->frontend_model->myorderlist($islogin);
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$this->load->view('themes/' . $this->themeinfo->themename . '/apporderlist', $data);
		}
	}

	public function vieworder($id)
	{
		$data['title'] = "Afficher la commande";
		$data['seoterm'] = "view_order";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('mylogin');
		} else {
			$customerorder = $this->frontend_model->read('*', 'customer_order', array('order_id' => $id));
			$data['orderinfo']  	   = $customerorder;
			$data['billinfo']	   = $this->frontend_model->billinfo($id);
			$data['iteminfo'] = $this->frontend_model->customerorder($id);
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/vieworder', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function appvieworder($id)
	{
		$data['title'] = "Afficher la commande";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('qr-menu');
		} else {
			$customerorder = $this->frontend_model->read('*', 'customer_order', array('order_id' => $id));
			$data['orderinfo']  	   = $customerorder;
			$data['billinfo']	   = $this->frontend_model->billinfo($id);
			$data['iteminfo'] = $this->frontend_model->customerorder($id);
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$this->load->view('themes/' . $this->themeinfo->themename . '/popupview', $data);
		}
	}

	public function updatemyorder($id)
	{

		$data['title'] = "Mettre à jour la commande";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('qr-menu');
		} else {
			$data["categorylist"] = $this->frontend_model->categories();
			$customerorder = $this->frontend_model->read('*', 'customer_order', array('order_id' => $id));
			$data['orderinfo']  	   = $customerorder;
			$data['billinfo']	   = $this->frontend_model->billinfo($id);
			$data['iteminfo'] = $this->frontend_model->customerorder($id);
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$this->load->view('themes/' . $this->themeinfo->themename . '/updateorder', $data);
		}
	}

	public function update_summery($id)
	{
		$data['title'] = "Page du panier";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('qr-menu');
		} else {
			$data["categorylist"] = $this->frontend_model->categories();
			$customerorder = $this->frontend_model->read('*', 'customer_order', array('order_id' => $id));
			$data['storesetting'] = $this->db->select('*')->from('setting')->where('id', 2)->get()->row();

			$data['orderinfo']  	   = $customerorder;
			$data['billinfo']	   = $this->frontend_model->billinfo($id);
			$data['iteminfo'] = $this->frontend_model->customerorder($id);
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['shippinginfo'] =  $this->frontend_model->read_all('*', 'payment_method', 'payment_method_id', '', 'is_active', '1');
			$this->load->view('themes/' . $this->themeinfo->themename . '/updatecart', $data);
		}
	}

	public function updateorder()
	{

		$catid = $this->input->post('catid');
		$pid = $this->input->post('pid');
		$sizeid = $this->input->post('sizeid');
		$itemname = $this->input->post('itemname');
		$size = $this->input->post('varientname');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$addonsid = $this->input->post('addonsid');
		$allprice = $this->input->post('allprice');
		$adonsunitprice = $this->input->post('adonsunitprice');
		$adonsqty = $this->input->post('adonsqty');
		$adonsname = $this->input->post('adonsname');
		$orderid = $this->input->post('orderid');
		$settinginfo = $this->settinginfo;
		$data['settinginfo'] = $settinginfo;

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

		$orderchecked = $this->frontend_model->check_order($orderid, $pid, $sizeid);
		if (empty($orderchecked)) {
			$postInfo = array(
				'order_id'      => $orderid,
				'menu_id'       => $pid,
				'menuqty'       => $qty,
				'add_on_id'     => $aids,
				'addonsqty'     => $aqty,
				'varientid'     => $sizeid,
				'isupdate'     => 1,
			);
			$this->frontend_model->new_entry($postInfo);
		} else {
			$udata = array(
				'menuqty'       => $qty,
				'add_on_id'     => $aids,
				'addonsqty'     => $aqty,
			);

			$this->db->where('order_id', $orderid);
			$this->db->where('menu_id', $pid);
			$this->db->where('varientid', $sizeid);
			$this->db->update('order_menu', $udata);
		}
		$existingitem = $this->frontend_model->customerorder($orderid);


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
					$adonsinfo = $this->frontend_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
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
		if ($settinginfo->discount_type == 1) {
			$discount = $subtotal * $discount / 100;
		}
		if ($settinginfo->service_chargeType == 1) {
			$scharge = $subtotal * $settinginfo->servicecharge / 100;
		} else {
			$scharge = $settinginfo->servicecharge;
		}
		$calvat = $itemtotal * $settinginfo->vat / 100;

		$updatedprice = $calvat + $itemtotal + $scharge - $discount;
		$postData = array(
			'order_id'        => $orderid,
			'totalamount'     => $updatedprice,
		);

		$this->frontend_model->update_order($postData);
		$this->frontend_model->payment_info($orderid, $calvat, $scharge, $discount, $subtotal, $updatedprice);
		echo '<h6 class="mb-0">' . $updatedprice . '</h6>';
	}

	public function updateqrorder()
	{
		$orderid = $this->input->post('orderid');
		$paymentsatus = $this->input->post('card_type');
		$cvat = $this->input->post('vat', TRUE);
		$cdiscount = $this->input->post('invoice_discount', TRUE);
		$ctotal = $this->input->post('orggrandTotal');
		$newtotal = $ctotal + $cvat - $cdiscount;
		$settinginfo = $this->settinginfo;
		$data['settinginfo'] = $settinginfo;
		$orderinfo = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$oldbillinfo = $this->frontend_model->billinfo($orderid);
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$total = $this->cart->total();

				$itemprice = $item['price'] * $item['qty'];
				if (!empty($item['addonsid'])) {
					$nittotal = $total + $item['addontpr'];
					$itemprice = $itemprice + $item['addontpr'];
				} else {
					$nittotal = $total;
				}
				$new_str = str_replace(',', '0', $item['addonsid']);
				$new_str2 = str_replace(',', '0', $item['addonsqty']);
				$uaid = $item['pid'] . $new_str . $new_str2 . $item['sizeid'];
				$orderchecked = $this->frontend_model->check_order($orderid, $item['pid'], $item['sizeid'], $uaid);
				if (empty($orderchecked)) {
					$data3 = array(
						'order_id'				=>	$orderid,
						'menu_id'		        =>	$item['pid'],
						'menuqty'	        	=>	$item['qty'],
						'add_on_id'	        	=>	$item['addonsid'],
						'addonsuid'	        	=>	$uaid,
						'addonsqty'	        	=>	$item['addonsqty'],
						'varientid'		    	=>	$item['sizeid'],
					);
					$this->db->insert('order_menu', $data3);
				} else {
					$udata = array(
						'menuqty'       => $orderchecked->menuqty + $item['qty'],
						'add_on_id'     => $item['addonsid'],
						'addonsqty'     => $item['addonsqty'],
					);
					$this->db->where('order_id', $orderid);
					$this->db->where('menu_id', $item['pid']);
					$this->db->where('varientid', $item['sizeid']);
					$this->db->where('addonsuid', $uaid);
					$this->db->update('order_menu', $udata);
					//insert to update Table
					$data4 = array(
						'ordid'				  =>	$orderid,
						'menuid'		        =>	$item['pid'],
						'qty'	        	    =>	$item['qty'],
						'addonsid'	        	=>	$item['addonsid'],
						'addonsuid'	        	=>	$uaid,
						'adonsqty'	        	=>	$item['addonsqty'],
						'varientid'		    	=>	$item['sizeid'],
						'insertdate'		    =>	date('Y-m-d'),
					);
					$this->db->insert('tbl_updateitems', $data4);
				}
			}
		}
		$existingitem = $this->frontend_model->customerorder($orderid);
		$i = 0;
		$totalamount = 0;
		$subtotal = 0;
		foreach ($existingitem as $item) {
			$adonsprice = 0;
			$itemprice = $item->price * $item->menuqty;
			if (!empty($item->add_on_id)) {
				$addons = explode(",", $item->add_on_id);
				$addonsqty = explode(",", $item->addonsqty);
				$x = 0;
				foreach ($addons as $addonsid) {
					$adonsinfo = $this->frontend_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
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

		$discount = $oldbillinfo->discount + $cdiscount;
		$itemtotal = $totalamount + $subtotal;
		if ($settinginfo->service_chargeType == 1) {
			$scharge = $subtotal * $settinginfo->servicecharge / 100;
		} else {
			$scharge = $settinginfo->servicecharge;
		}
		$calvat = $itemtotal * $settinginfo->vat / 100;
		$updatedprice = $calvat + $itemtotal + $scharge - $discount;
		$postData = array(
			'order_id'        => $orderid,
			'totalamount'     => $updatedprice,
			'isupdate'        => 1,
		);
		$this->frontend_model->update_order($postData);
		/*$updatetData['discount']    		=$oldbillinfo->discount+$cdiscount;
	    $this->frontend_model->update_info('bill',$updatetData,'bill_id',$oldbillinfo->bill_id);*/
		$billinfo = $this->frontend_model->billinfo($orderid);
		$this->frontend_model->payment_info($orderid, $calvat, $scharge, $discount, $subtotal, $updatedprice);
		$this->session->set_flashdata('message', display('ord_uodate_success'));
		$this->cart->destroy();
		if ($billinfo->payment_method_id == 4) {
			redirect('apporedrlist');
		} else {
			if ($paymentsatus == 4 || $paymentsatus == 1) {
				$postData2 = array(
					'order_id'        => $orderid,
					'customerpaid'     => $orderinfo->totalamount,
				);
				$this->frontend_model->update_order($postData2);
				redirect('apporedrlist');
			} else {
				if ($paymentsatus == 5) {
					redirect('frontend/paymentgatewayqr/' . $orderid . '/' . $paymentsatus . '/1/' . $newtotal);
				} else if ($paymentsatus == 8) {
					redirect('paymentsqr/' . $orderid . '/1/' . $newtotal);
				} else if ($paymentsatus == 9) {
					redirect('frontend/stripeqr/' . $orderid . '/1/' . $newtotal);
				} else if ($paymentsatus == 10) {
					$paymentinfo = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 10));
					echo '<form>
					<script src="https://js.paystack.co/v1/inline.js"></script>
					<button type="button" onclick="payWithPaystack()" id="paytrack" style="display:none;"> Payr </button> 
					</form>
					<script>
					document.getElementById("paytrack").click();
					function payWithPaystack(){
						var handler = PaystackPop.setup({
						key: "' . $paymentinfo->password . '",
						email: "' . $paymentinfo->email . '",
						amount: "' . round($newtotal) . '",
						currency: "NGN",
						ref: ""+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
						metadata: {
							custom_fields: [
								{
									display_name: "Numéro de téléphone",
									variable_name: "mobile_number",
									value: "+2348012345678"
								}
							]
						},
						callback: function(response){
							window.location.href="' . base_url() . 'frontend/successfulqr/' . $orderid . '/1";
						},
						onClose: function(){
							window.location.href="' . base_url() . 'apporedrlist";
						}
						});
						handler.openIframe();
					}
					</script>';
				} else if ($paymentsatus == 11) {
					redirect('frontend/paytmqr/' . $orderid . '/1/' . $newtotal);
				} else if ($paymentsatus == 12) {
					redirect('frontend/orangeqr/' . $orderid . '/1/' . $newtotal);
				} else if ($paymentsatus == 6) {
					redirect('frontend/paymentgatewayqr/' . $orderid . '/' . $paymentsatus . '/1/' . $newtotal);
				} else if ($paymentsatus == 7) {
					redirect('frontend/paymentgatewayqr/' . $orderid . '/' . $paymentsatus . '/1/' . $newtotal);
				} else if ($paymentsatus == 3) {
					redirect('frontend/paymentgatewayqr/' . $orderid . '/' . $paymentsatus . '/1/' . $newtotal);
				} else if ($paymentsatus == 2) {
					redirect('frontend/paymentgatewayqr/' . $orderid . '/' . $paymentsatus . '/1/' . $newtotal);
				}
			}
		}
	}

	public function paymentsqr($orderid, $page = null, $newtotal)
	{
		$data['title'] = "Informations de paiement";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 8));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['grandtotal'] = $newtotal;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/squareqr', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function payments_processqr()
	{
		$data['title'] = "Informations de paiement";
		$orderid = $this->input->post('orderid', true);
		$pageid = $this->input->post('pageid', true);
		$grandtotal = $this->input->post('amount', true);
		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 8));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $pageid;
		$data['grandtotal'] = $grandtotal;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/payment-processqr', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function paytmqr($orderid, $page = null, $newtotal)
	{
		$data['title'] = "Informations de paiement";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 11));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['grandtotal'] = $newtotal;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/paytmqr', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function pgRedirectqr()
	{
		$data['title'] = "Informations de paiement";
		$orderid = $this->input->post('orderid', true);
		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 11));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$pageid = $this->input->post('pageid', true);
		$grandtotal = $this->input->post('amount', true);
		$data['grandtotal'] = $grandtotal;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/PaytmKit/pgRedirectqr', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function stripeqr($orderid, $page, $newtotal)
	{
		$data['title'] = "Informations de paiement Stripe";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 9));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$data['page'] = $page;
		$data['grandtotal'] = $newtotal;
		$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/stripe_viewqr', $data, TRUE);
		$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
	}

	public function stripePostqr()
	{
		require_once('application/libraries/stripe-php/init.php');
		$orderid = $this->input->post('orderid', true);
		$amount = $this->input->post('amount', true);
		$currency = $this->input->post('currency', true);
		$pageid = $this->input->post('pageid', true);

		$data['orderid']             = $orderid;
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$paymentinfo   	          = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 9));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill  	                   = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	       = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);

		\Stripe\Stripe::setApiKey($paymentinfo->marchantid);

		\Stripe\Charge::create([
			"amount" => $amount,
			"currency" => $currency,
			"source" => $this->input->post('stripeToken'),
			"description" => "Tester le paiement depuis itsolutionstuff.com."
		]);

		$this->session->set_flashdata('success', 'Paiement effectué avec succès.');

		redirect('frontend/successfulqr/' . $orderid . '/' . $pageid, 'refresh');
	}

	public function orangeqr($orderid, $page = null, $newtotal)
	{
		$data['title'] = "Informations de paiement";
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$paymentinfo  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => 12));
		$this->lsoft_setting->payment_by_orange_money_libqr($orderid, $orderinfo->customer_id, $paymentinfo->paymentid, $page, $newtotal);
		echo '<p style="text-align:center">Veuillez patienter........</p>';
	}

	public function paymentgatewayqr($orderid, $paymentid, $page = null, $newtotal)
	{
		$data['title'] = "Informations de paiement";
		$data['orderinfo']  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$data['paymentinfo']  	   = $this->frontend_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$data['customerinfo']  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		$bill = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$data['billinfo']  	   = $this->frontend_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));

		$data['iteminfo']       = $this->frontend_model->customerorder($orderid);
		$data['mybill']	   = $this->frontend_model->billinfo($orderid);
		$customer  	   = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		if ($paymentid == 5) {

			$full_name = $customer->customer_name;
			$email = $customer->customer_email;
			$phone = $customer->customer_phone;
			$amount = $newtotal;
			$transactionid = $orderid;
			$address = $customer->customer_address;

			$post_data = array();
			$post_data['store_id'] = SSLCZ_STORE_ID;
			$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
			$post_data['total_amount'] =  $newtotal;
			$post_data['currency'] =  $data['paymentinfo']->currency;
			$post_data['tran_id'] = $orderid;
			$post_data['success_url'] =  base_url() . "frontend/successful/" . $orderid . '/' . $page;
			$post_data['fail_url'] = base_url() . "frontend/fail/" . $orderid . '/' . $page;
			$post_data['cancel_url'] = base_url() . "frontend/cancilorder/" . $orderid . '/' . $page;
			# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

			# EMI INFO
			# $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
			# $post_data['emi_max_inst_option'] = "9";
			# $post_data['emi_selected_inst'] = "9";

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
			echo "<h3>Attendez...Traitement des paiements SSLCOMMERZ....</h3>";

			if ($this->sslcommerz->RequestToSSLC($post_data, false)) {

				redirect('frontend/fail/' . $orderid . '/' . $page);
			}
		} else if ($paymentid == 6) {
			$data['page'] = $page;
			$data['grandtotal'] = $newtotal;
			$this->load->view('themes/' . $this->themeinfo->themename . '/sips', $data);
		} else if ($paymentid == 7) {
			$data['page'] = $page;
			$data['grandtotal'] = $newtotal;
			$this->load->view('themes/' . $this->themeinfo->themename . '/rma', $data);
		} else if ($paymentid == 3) {
			$data['page'] = $page;
			$data['grandtotal'] = $newtotal;
			$this->load->view('themes/' . $this->themeinfo->themename . '/paypalqr', $data);
		} else if ($paymentid == 2) {
			$data['page'] = $page;
			$data['grandtotal'] = $newtotal;
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/2checkoutqr', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function successfulqr($orderid, $page = null)
	{
		$billinfo = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;

		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();
		$mysesdata = array('CusUserID' => $orderinfo->customer_id, 'tableid' => $orderinfo->table_no);
		$this->session->set_userdata($mysesdata);

		$this->session->set_flashdata('message', display('order_successfully'));

		if ($page == 1) {
			$registrationIds[] = $cusinfo->customer_token;
			$header = [
				'Authorization: Key=AAAA4j0CZSQ:APA91bGhEmG9eS2IUjPam6jpDtfBEyvLXGccd_BWGeGolN2pXiVrJ9d06wNut4sXN698cGTgIimXhC6S1CXRnXxRaGmF7n_OvZBK0e3zwqJ1CA6zwRqMaajfxtekvcbaGNfUZmWuRjHZ',
				'Content-Type: Application/json'
			];

			$msg = [
				'title' => 'Mise à jour de la commande réussie !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Mise à jour réussie. Veuillez patienter',
				'icon' => 'img/icon.png',
				'image' => 'img/d.png',
			];

			$payload = [
				'registration_ids' 	=> $registrationIds,
				'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			} else {
			}
			redirect('apporedrlist');
		} else {
			redirect('qr-menu');
		}
	}

	public function successful2qr($page = null)
	{
		$orderid = $this->input->post('li_0_name');

		$billinfo = $this->frontend_model->read('*', 'bill', array('order_id' => $orderid));
		$orderinfo  	       = $this->frontend_model->read('*', 'customer_order', array('order_id' => $orderid));
		$customerid 	   = $orderinfo->customer_id;

		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id', $orderinfo->customer_id)->get()->row();

		$this->session->set_flashdata('message', display('order_successfully'));
		if ($page == 1) {
			$registrationIds[] = $cusinfo->customer_token;
			$header = [
				'Authorization: Key=AAAA4j0CZSQ:APA91bGhEmG9eS2IUjPam6jpDtfBEyvLXGccd_BWGeGolN2pXiVrJ9d06wNut4sXN698cGTgIimXhC6S1CXRnXxRaGmF7n_OvZBK0e3zwqJ1CA6zwRqMaajfxtekvcbaGNfUZmWuRjHZ',
				'Content-Type: Application/json'
			];

			$msg = [
				'title' => 'Mise à jour de la commande réussie !!',
				'body' => 'Votre identifiant de commande: ' . $orderid . ' Mise à jour réussie. Veuillez patienter',
				'icon' => 'img/icon.png',
				'image' => 'img/d.png',
			];

			$payload = [
				'registration_ids' 	=> $registrationIds,
				'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			} else {
			}
			redirect('apporedrlist');
		} else {
			redirect('qr-menu');
		}
	}

	public function myoreservationlist()
	{
		$data['title'] = "My Reservation List";
		$data['seoterm'] = "my_reservation";
		$islogin = $this->session->userdata('CusUserID');
		if (empty($islogin)) {
			redirect('mylogin');
		} else {
			$data['reserveinfo']  	   = $this->frontend_model->customerreservation($islogin);
			$data['customerinfo'] = $this->frontend_model->read('*', 'customer_info', array('customer_id' => $islogin));
			$data['openclosetime'] =  $this->frontend_model->read_allorderby('*', 'tbl_openclose', 'stid', 'ASC');
			$data['content'] = $this->load->view('themes/' . $this->themeinfo->themename . '/myreservation', $data, TRUE);
			$this->load->view('themes/' . $this->themeinfo->themename . '/index', $data);
		}
	}

	public function setlangue($lang)
	{
		$this->session->set_userdata('language', $lang);
		echo 1;
		exit;
	}
	public function fwritetxt()
	{
		/*$path=APPPATH."views\\themes\\".$this->themeinfo->themename."\\index2.php";				
		$database_file = file_get_contents($path);
		$replacetxt='<link href="clockpicker.min.css" rel="stylesheet"></head>';
		$new  = str_replace("</head>",$replacetxt,$database_file);
		 $handle = fopen($path,'w+');
		 @chmod($path,0777);
		 // Verify file permissions
            if (is_writable($path)) {
                // Write the file
                if (fwrite($handle,$new)) {
                    return true;
                } else {
                //file not write
                    return false;
                }
            } else {
                //file is not writeable
                return false;
            }*/
		/*$replace=  '$route["default_controller"] = "frontend";';
            //set a flag
            $flag     = '$route["default_controller"] = "frontend";';
			$config_file=APPPATH."config\\routes.php";
			$routes_data = file_get_contents($config_file);*/
		//$pattern = '/[^\n]*default_controller[^\n]*/';
		/*$matches = array();
            preg_match($pattern, $routes_data, $matches);
			
			if (!empty($matches[0])) {
                //check config data is not matche with flag data
                if ($matches[0]!=$flag) {
                    //set $matches[0] as $original data  
                    $original = $matches[0];

                    //set output file mode  
                    @chmod($config_file,0777);  

                    //Replace file with new string 
                    $new  = str_replace($original,$replace,$routes_data); 

                    // Write the new config.php file
                    $handle = fopen($config_file,'w+');

                    // Chmod the file, in case the user forgot
                    @chmod($config_file,0777);

                    //Verify file permission
                    if (is_writable($config_file)) {

                        //file write
                        if (fwrite($handle,$new)) {
                            return true;
                        } else {
                            //file is not write
                            return false;
                        } 
                    } else {
                        //file is not writeable
                        return false;
                    }
                } else {
                    //$config_data is match with $flag data
                    return true;
                }
            } else {
                //if $matches[0] is empty
                return false;
            }*/
	}
}
