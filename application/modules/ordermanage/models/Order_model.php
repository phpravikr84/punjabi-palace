<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{

	private $table = 'purchaseitem';

	public function create()
	{
		$saveid = $this->session->userdata('id');
		$p_id = $this->input->post('product_id');
		$purchase_date = str_replace('/', '-', $this->input->post('purchase_date'));
		$newdate = date('Y-m-d', strtotime($purchase_date));
		$data = array(
			'invoiceid'				=>	$this->input->post('invoice_no'),
			'suplierID'			    =>	$this->input->post('suplierid'),
			'total_price'	        =>	$this->input->post('grand_total_price'),
			'details'	            =>	$this->input->post('purchase_details'),
			'purchasedate'		    =>	$newdate,
			'savedby'			    =>	$saveid
		);
		$this->db->insert($this->table, $data);
		$returnid = $this->db->insert_id();

		$rate = $this->input->post('product_rate');
		$quantity = $this->input->post('product_quantity');
		$t_price = $this->input->post('total_price');

		for ($i = 0, $n = count($p_id); $i < $n; $i++) {
			$product_quantity = $quantity[$i];
			$product_rate = $rate[$i];
			$product_id = $p_id[$i];
			$total_price = $t_price[$i];

			$data1 = array(
				'purchaseid'		=>	$returnid,
				'indredientid'		=>	$product_id,
				'quantity'			=>	$product_quantity,
				'price'				=>	$product_rate,
				'totalprice'		=>	$total_price,
				'purchaseby'		=>	$saveid,
				'purchasedate'		=>	$newdate
			);

			if (!empty($quantity)) {
				$this->db->insert('purchase_details', $data1);
			}
		}
		return true;
	}
	public function allfood()
	{
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('ProductsIsActive', 1);
		$query = $this->db->get();
		$itemlist = $query->result();
		return $itemlist;
	}
	// public function allfood2($ctype = null)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('item_foods');
	// 	$this->db->where('ProductsIsActive', 1);
	// 	$this->db->where('isgroup', null);
	// 	$this->db->where('cusine_type', 1);
	// 	$query = $this->db->get();
	// 	$itemlist = $query->result();
	// 	$output = array();
	// 	if (!empty($itemlist)) {
	// 		$k = 0;
	// 		foreach ($itemlist as $items) {
	// 			$productionInfo= $this->db->select("production.itemid")->from('production')->where('production.itemid', $items->ProductsID)->get()->row();
	// 			if (!empty($productionInfo)) {
	// 				$varientinfo = $this->db->select("variant.*,count(menuid) as totalvarient")->from('variant')->where('menuid', $items->ProductsID)->get()->row();
	// 				if (!empty($varientinfo)) {
	// 					$output[$k]['variantid'] = $varientinfo->variantid;
	// 					$output[$k]['totalvarient'] = $varientinfo->totalvarient;
	// 					$output[$k]['variantName'] = $varientinfo->variantName;
	// 					if (empty($ctype)) {
	// 						$ctype = 1; // Default to 1 if ctype is not set
	// 					}
	// 					switch ($ctype) {
	// 						case '1':
	// 							$output[$k]['price'] = $varientinfo->price;
	// 							break;
	// 						case '2':
	// 							$output[$k]['price'] = $varientinfo->uber_eats_price;
	// 							break;
	// 						case '4':
	// 							$output[$k]['price'] = $varientinfo->takeaway_price;
	// 							break;
	// 						default:
	// 							$output[$k]['price'] = $varientinfo->price;
	// 					}
	// 					// $output[$k]['price'] = $varientinfo->price;
	// 				} else {
	// 					$output[$k]['variantid'] = '';
	// 					$output[$k]['totalvarient'] = 0;
	// 					$output[$k]['variantName'] = '';
	// 					$output[$k]['price'] = '';
	// 				}
	// 				$output[$k]['ProductsID'] = $items->ProductsID;
	// 				$output[$k]['CategoryID'] = $items->CategoryID;
	// 				$output[$k]['ProductName'] = $items->ProductName;
	// 				$output[$k]['ProductImage'] = $items->ProductImage;
	// 				$output[$k]['bigthumb'] = $items->bigthumb;
	// 				$output[$k]['medium_thumb'] = $items->medium_thumb;
	// 				$output[$k]['small_thumb'] = $items->small_thumb;
	// 				$output[$k]['component'] = $items->component;
	// 				$output[$k]['descrip'] = $items->descrip;
	// 				$output[$k]['itemnotes'] = $items->itemnotes;
	// 				$output[$k]['menutype'] = $items->menutype;
	// 				$output[$k]['productvat'] = $items->productvat;
	// 				$output[$k]['special'] = $items->special;
	// 				$output[$k]['OffersRate'] = $items->OffersRate;
	// 				$output[$k]['offerIsavailable'] = $items->offerIsavailable;
	// 				$output[$k]['offerstartdate'] = $items->offerstartdate;
	// 				$output[$k]['offerendate'] = $items->offerendate;
	// 				$output[$k]['Position'] = $items->Position;
	// 				$output[$k]['kitchenid'] = $items->kitchenid;
	// 				$output[$k]['isgroup'] = $items->isgroup;
	// 				$output[$k]['is_customqty'] = $items->is_customqty;
	// 				$output[$k]['cookedtime'] = $items->cookedtime;
	// 				$output[$k]['ProductsIsActive'] = $items->ProductsIsActive;
	// 				$k++;
	// 			}
	// 		}
	// 	}
	// 	return $output;
	// }
	public function allfood2($ctype = null)
	{
		$this->db->select('*');
		$this->db->from('item_foods');
		$this->db->where('ProductsIsActive', 1);
		$this->db->where('isgroup', null);
		$this->db->where('cusine_type', 1);
		$query = $this->db->get();
		$itemlist = $query->result();
		$output = array();

		if (!empty($itemlist)) {
			foreach ($itemlist as $items) {
				$productionInfo = $this->db->select("production.itemid")
					->from('production')
					->where('production.itemid', $items->ProductsID)
					->get()
					->row();

				if (!empty($productionInfo)) {
					$varientinfo = $this->db->select("variant.*, COUNT(menuid) AS totalvarient")
						->from('variant')
						->where('menuid', $items->ProductsID)
						->get()
						->row();

					if (!empty($varientinfo)) {
						switch ($ctype) {
							case '2':
								$price = $varientinfo->uber_eats_price;
								break;
							case '4':
								$price = $varientinfo->takeaway_price;
								break;
							default:
								$price = $varientinfo->price;
						}

						// Skip if price is null, empty or 0
						if ($price === null || $price === '' || floatval($price) == 0) {
							continue;
						}

						$output[] = array(
							'variantid'        => $varientinfo->variantid,
							'totalvarient'     => $varientinfo->totalvarient,
							'variantName'      => $varientinfo->variantName,
							'price'            => $price,
							'ProductsID'       => $items->ProductsID,
							'CategoryID'       => $items->CategoryID,
							'ProductName'      => $items->ProductName,
							'ProductImage'     => $items->ProductImage,
							'bigthumb'         => $items->bigthumb,
							'medium_thumb'     => $items->medium_thumb,
							'small_thumb'      => $items->small_thumb,
							'component'        => $items->component,
							'descrip'          => $items->descrip,
							'itemnotes'        => $items->itemnotes,
							'menutype'         => $items->menutype,
							'productvat'       => $items->productvat,
							'special'          => $items->special,
							'OffersRate'       => $items->OffersRate,
							'offerIsavailable' => $items->offerIsavailable,
							'offerstartdate'   => $items->offerstartdate,
							'offerendate'      => $items->offerendate,
							'Position'         => $items->Position,
							'kitchenid'        => $items->kitchenid,
							'isgroup'          => $items->isgroup,
							'is_customqty'     => $items->is_customqty,
							'cookedtime'       => $items->cookedtime,
							'ProductsIsActive' => $items->ProductsIsActive
						);
					}
				}
			}
		}

		return $output;
	}

	public function allfoodBanq()
	{
		$this->db->select('*');
		$this->db->from('item_foods');
		$this->db->where('ProductsIsActive', 1);
		$this->db->where('cusine_type', 2);
		$query = $this->db->get();
		$itemlist = $query->result();
		$output = array();
		if (!empty($itemlist)) {
			$k = 0;
			foreach ($itemlist as $items) {
				$varientinfo = $this->db->select("variant.*,count(menuid) as totalvarient")->from('variant')->where('menuid', $items->ProductsID)->get()->row();
				if (!empty($varientinfo)) {
					$output[$k]['variantid'] = $varientinfo->variantid;
					$output[$k]['totalvarient'] = $varientinfo->totalvarient;
					$output[$k]['variantName'] = $varientinfo->variantName;
					$output[$k]['price'] = $varientinfo->price;
				} else {
					$output[$k]['variantid'] = '';
					$output[$k]['totalvarient'] = 0;
					$output[$k]['variantName'] = '';
					$output[$k]['price'] = '';
				}
				$output[$k]['ProductsID'] = $items->ProductsID;
				$output[$k]['CategoryID'] = $items->CategoryID;
				$output[$k]['ProductName'] = $items->ProductName;
				$output[$k]['ProductImage'] = $items->ProductImage;
				$output[$k]['bigthumb'] = $items->bigthumb;
				$output[$k]['medium_thumb'] = $items->medium_thumb;
				$output[$k]['small_thumb'] = $items->small_thumb;
				$output[$k]['component'] = $items->component;
				$output[$k]['descrip'] = $items->descrip;
				$output[$k]['itemnotes'] = $items->itemnotes;
				$output[$k]['menutype'] = $items->menutype;
				$output[$k]['productvat'] = $items->productvat;
				$output[$k]['special'] = $items->special;
				$output[$k]['OffersRate'] = $items->OffersRate;
				$output[$k]['offerIsavailable'] = $items->offerIsavailable;
				$output[$k]['offerstartdate'] = $items->offerstartdate;
				$output[$k]['offerendate'] = $items->offerendate;
				$output[$k]['Position'] = $items->Position;
				$output[$k]['kitchenid'] = $items->kitchenid;
				$output[$k]['isgroup'] = $items->isgroup;
				$output[$k]['is_customqty'] = $items->is_customqty;
				$output[$k]['cookedtime'] = $items->cookedtime;
				$output[$k]['ProductsIsActive'] = $items->ProductsIsActive;
				$k++;
			}
		}
		return $output;
	}
	public function allfoodPromo()
	{
		$this->db->select('*');
		$this->db->from('item_foods');
		$this->db->where('ProductsIsActive', 1);
		$this->db->where('isgroup', 1);
		$this->db->where('cusine_type', 1);
		$query = $this->db->get();
		$itemlist = $query->result();
		//last query
		// echo $this->db->last_query();
		$output = array();
		if (!empty($itemlist)) {
			$k = 0;
			foreach ($itemlist as $items) {
				$varientinfo = $this->db->select("variant.*,count(menuid) as totalvarient")->from('variant')->where('menuid', $items->ProductsID)->get()->row();
				$promoMainModsinfo = $this->db->select("category_id, category_max_qty AS main_cat_max_qty, category_weight_percent AS main_cat_weight, total_weight_percent AS main_total_weight, total_no_of_item AS main_total_item")->from('promotion_main_modifiers')->where('promotion_id', $items->ProductsID)->get()->result();
				$promoOtherModsinfo = $this->db->select("modifier_set_id AS other_mod_set_id, id")->from('promotion_other_modifiers')->where('promotion_id', $items->ProductsID)->get()->result();
				if (!empty($varientinfo)) {
					$output[$k]['variantid'] = $varientinfo->variantid;
					$output[$k]['totalvarient'] = $varientinfo->totalvarient;
					$output[$k]['variantName'] = $varientinfo->variantName;
					$output[$k]['price'] = $varientinfo->price;
				} else {
					$output[$k]['variantid'] = '';
					$output[$k]['totalvarient'] = 0;
					$output[$k]['variantName'] = '';
					$output[$k]['price'] = '';
				}
				$output[$k]['ProductsID'] = $items->ProductsID;
				$output[$k]['CategoryID'] = $items->CategoryID;
				$output[$k]['ProductName'] = $items->ProductName;
				$output[$k]['ProductImage'] = $items->ProductImage;
				$output[$k]['bigthumb'] = $items->bigthumb;
				$output[$k]['medium_thumb'] = $items->medium_thumb;
				$output[$k]['small_thumb'] = $items->small_thumb;
				$output[$k]['component'] = $items->component;
				$output[$k]['descrip'] = $items->descrip;
				$output[$k]['itemnotes'] = $items->itemnotes;
				$output[$k]['menutype'] = $items->menutype;
				$output[$k]['productvat'] = $items->productvat;
				$output[$k]['special'] = $items->special;
				$output[$k]['OffersRate'] = $items->OffersRate;
				$output[$k]['offerIsavailable'] = $items->offerIsavailable;
				$output[$k]['offerstartdate'] = $items->offerstartdate;
				$output[$k]['offerendate'] = $items->offerendate;
				$output[$k]['Position'] = $items->Position;
				$output[$k]['kitchenid'] = $items->kitchenid;
				$output[$k]['isgroup'] = $items->isgroup;
				$output[$k]['is_customqty'] = $items->is_customqty;
				$output[$k]['cookedtime'] = $items->cookedtime;
				$output[$k]['ProductsIsActive'] = $items->ProductsIsActive;
				$k++;
			}
		}
		return $output;
	}
	public function headcode()
	{
		$query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030%'");
		return $query->row();
	}
	public function insert_customer($data = array())
	{
		return $this->db->insert('customer_info', $data);
	}
	public function create_coa($data = array())
	{
		$this->db->insert('acc_coa', $data);
		return true;
	}
	public function soundcreate($data = array())
	{
		return $this->db->where('soundid', $data["soundid"])
			->update('tbl_soundsetting', $data);
	}

	public function orderitem($orderid)
	{

		$saveid = $this->session->userdata('id');

		$cid = $this->input->post('customer_name');
		$purchase_date = str_replace('/', '-', $this->input->post('order_date'));
		$newdate = date('Y-m-d', strtotime($purchase_date));

		$lastid = $this->db->select("*")->from('customer_order')->where('order_id', $orderid)->order_by('order_id', 'desc')->get()->row();
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
		$sino = $lastid->saleinvoice;
		$orderid = $orderid;
		$pdiscount = 0;
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$iteminfo = $this->getiteminfo($item['pid']);
				if ($iteminfo->OffersRate > 0) {
					$pdiscount = $pdiscount + ($iteminfo->OffersRate * $itemprice / 100);
				} else {
					$pdiscount = $pdiscount + 0;
				}
				$total = $this->cart->total();

				$itemprice = $item['price'] * $item['qty'];
				$discount = 0;
				if (!empty($item['addonsid'])) {
					$nittotal = $total + $item['addontpr'];
					$itemprice = $itemprice + $item['addontpr'];
				} else {
					$nittotal = $total;
				}
				if ($item['isgroup'] == 1) {
					$groupinfo = $this->db->select('*')->from('tbl_groupitems')->where('gitemid', $item['pid'])->get()->result();
					foreach ($groupinfo as $grouprow) {
						$data3 = array(
							'order_id'				=>	$orderid,
							'menu_id'		        =>	$grouprow->items,
							'notes'					=>  $item['itemnote'],
							'groupmid'		        =>	$item['pid'],
							'menuqty'	        	=>	$grouprow->item_qty * $item['qty'],
							'price'	        		=>	$item['price'],
							'addonsuid'	        	=>	$item['addonsuid'],
							'add_on_id'	        	=>	$item['addonsid'],
							'addonsqty'	        	=>	$item['addonsqty'],
							'varientid'		    	=>	$grouprow->varientid,
							'groupvarient'		    =>	$item['sizeid'],
							'qroupqty'		    	=>	$item['qty'],
							'isgroup'		    	=>	1,
						);
						$this->db->insert('order_menu', $data3);
						//Add Ingredient Transaction detail
						$this->insert_itxn($orderid);
					}
				} else {
					$data3 = array(
						'order_id'				=>	$orderid,
						'menu_id'		        =>	$item['pid'],
						'notes'					=>  $item['itemnote'],
						'menuqty'	        	=>	$item['qty'],
						'price'	        		=>	$item['price'],
						'addonsuid'	        	=>	$item['addonsuid'],
						'add_on_id'	        	=>	$item['addonsid'],
						'addonsqty'	        	=>	$item['addonsqty'],
						'varientid'		    	=>	$item['sizeid'],
					);
					$this->db->insert('order_menu', $data3);
					//Add Ingredient Transaction detail
					$this->insert_itxn($orderid);
				}
				/***food habit module section***/
				$scan = scandir('application/modules/');
				$habitsys = "";
				foreach ($scan as $file) {
					if ($file == "testhabit") {
						if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
							if (!empty($item['itemnote'])) {
								$habittest = array(
									'cusid'					=>	$cid,
									'itemid'		        =>	$item['pid'],
									'varient'		        =>	$item['sizeid'],
									'habit'	        		=>	$item['itemnote']
								);
								$this->db->insert('tbl_habittrack', $habittest);
							}
						}
					}
				}
			}
		}

		$customerinfo = $this->read('*', 'customer_info', array('customer_id' => $cid));
		$mtype = $this->read('*', 'membership', array('id' => $customerinfo->membership_type));
		$ordergrandt = $this->input->post('grandtotal');
		$scan = scandir('application/modules/');
		$getdiscount2 = 0;
		foreach ($scan as $file) {
			if ($file == "loyalty") {
				if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
					$getdiscount2 = $mtype->discount * $this->input->post('subtotal') / 100;
				}
			}
		}

		$settinginfo = $this->db->select("*")->from('setting')->get()->row();
		$vat = $this->input->post('vat');
		if ($vat == '') {
			$vat = 0;
		}

		$payment = $this->input->post('card_type');
		if (!empty($payment)) {

			$discount = $this->input->post('invoice_discount');

			$scharge = $this->input->post('service_charge');

			if ($discount == '') {
				$discount = 0;
			}
			if ($scharge == '') {
				$scharge = 0;
			}

			if ($settinginfo->service_chargeType == 1) {
				$subtotal = $this->input->post('subtotal');
				$scharge = ($subtotal - $discount) * $scharge / 100;
			}

			$billstatus = 0;
			if ($payment == 5) {
				$billstatus = 0;
			} else if ($payment == 3) {
				$billstatus = 0;
			} else if ($payment == 2) {
				$billstatus = 0;
			}
			$itemtotal = $this->input->post('subtotal');
			$grtotal = $vat + $scharge + $itemtotal;
			if ($settinginfo->isvatinclusive == 1) {
				$ordergrandt = $ordergrandt - $vat;
			}

			$billinfo = array(
				'customer_id'			=>	$cid,
				'order_id'		        =>	$orderid,
				'total_amount'	        =>	$this->input->post('subtotal'),
				'discount'	            =>	$discount + $getdiscount2,
				'service_charge'	    =>	$scharge,
				'VAT'		 	        =>  $this->input->post('vat'),
				'bill_amount'		    =>	$ordergrandt - $getdiscount2,
				'bill_date'		        =>	$newdate,
				'bill_time'		        =>	date('H:i:s'),
				'bill_status'		    =>	$billstatus,
				'payment_method_id'		=>	$this->input->post('card_type'),
				'create_by'		        =>	$saveid,
				'create_date'		    =>	date('Y-m-d')
			);

			$this->db->insert('bill', $billinfo);
			$billid = $this->db->insert_id();
		}

		return $orderid;
	}
	public function payment_info($id = null)
	{
		$this->db->select('*');
		$this->db->from('customer_order');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		$orderinfo = $query->row();

		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$query1 = $this->db->get();

		if ($query->num_rows() > 0) {
			$paymentinfo = $query1->row();
			$payment = $paymentinfo->payment_method_id;
			$discount = $this->input->post('invoice_discount');
			$scharge = $this->input->post('service_charge');
			$vat = $this->input->post('vat');
			if ($vat == '') {
				$vat = 0;
			}
			if ($discount == '') {
				$discount = 0;
			}
			if ($scharge == '') {
				$scharge = 0;
			}
			$billstatus = 0;
			if ($payment == 5) {
				$billstatus = 0;
			} else if ($payment == 3) {
				$billstatus = 0;
			} else if ($payment == 2) {
				$billstatus = 0;
			}
			$saveid = $this->session->userdata('id');
			$settinginfo = $this->db->select("*")->from('setting')->get()->row();
			if ($settinginfo->service_chargeType == 1) {
				$subtotal = $this->input->post('subtotal');
				$scharge = ($subtotal - $discount) * $scharge / 100;
			}
			$ordergrandt = $this->input->post('grandtotal');
			if ($settinginfo->isvatinclusive == 1) {
				$ordergrandt = $ordergrandt - $vat;
			}

			$billinfo = array(
				'total_amount'	        =>	$this->input->post('subtotal'),
				'discount'	            =>	$discount,
				'service_charge'	    =>	$scharge,
				'VAT'		 	        =>  $vat,
				'bill_amount'		    =>	$ordergrandt,
				'create_by'		        =>	$saveid
			);
			$this->db->where('order_id', $id);
			$this->db->update('bill', $billinfo);
			// Find the acc COAID for the Transaction
			$custmercode = $this->input->post('custmercode');
			$custmername = $this->input->post('custmername');
			$invoice_no = $this->input->post('saleinvoice');
			$headn = $custmercode . '-' . $custmername;
			$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
			$customer_headcode = $coainfo->HeadCode;
			$invoice_no = $invoice_no;
			$saveid = $this->session->userdata('id');
			$saveddate = date('Y-m-d H:i:s');
			//return false;	
		} else {
			$settinginfo = $this->db->select("*")->from('setting')->get()->row();
			$saveid = $this->session->userdata('id');
			$saveddate = date('Y-m-d H:i:s');
			if (!empty($payment)) {
				$discount = $this->input->post('invoice_discount');
				$scharge = $this->input->post('service_charge');
				$vat = $this->input->post('vat');
				if ($vat == '') {
					$vat = 0;
				}
				if ($discount == '') {
					$discount = 0;
				}
				if ($scharge == '') {
					$scharge = 0;
				}
				$ordergrandt = $this->input->post('grandtotal');
				if ($settinginfo->isvatinclusive == 1) {
					$ordergrandt = $ordergrandt - $vat;
				}
				$billinfo = array(
					'customer_id'			=>	$orderinfo->customer_id,
					'order_id'		        =>	$id,
					'total_amount'	        =>	$this->input->post('subtotal'),
					'discount'	            =>	$discount,
					'service_charge'	    =>	$scharge,
					'VAT'		 	        =>  $vat,
					'bill_amount'		    =>	$ordergrandt,
					'bill_date'		        =>	date('Y-m-d'),
					'bill_time'		        =>	date('H:i:s'),
					'bill_status'		    =>	$this->input->post('bill_info'),
					'payment_method_id'		=>	$this->input->post('card_type'),
					'create_by'		        =>	$saveid,
					'create_date'		    =>	date('Y-m-d')
				);
				$this->db->insert('bill', $billinfo);
			}
		}
	}
	public function payment_update($id = null)
	{
		$this->db->select('*');
		$this->db->from('customer_order');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		$orderinfo = $query->row();

		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return false;
		} else {
			$saveid = $this->session->userdata('id');
			$saveddate = date('Y-m-d H:i:s');
			$ordergrandt = $this->input->post('grandtotal');
			$vat = $this->input->post('tax');
			if ($vat == '') {
				$vat = 0;
			}
			if ($settinginfo->isvatinclusive == 1) {
				$ordergrandt = $ordergrandt - $vat;
			}

			$billinfo = array(
				'customer_id'			=>	$orderinfo->customer_id,
				'order_id'		        =>	$id,
				'total_amount'	        =>	$this->input->post('subtotal'),
				'discount'	            =>	$this->input->post('discount'),
				'service_charge'	    =>	$this->input->post('scharge'),
				'VAT'		 	        =>  $vat,
				'bill_amount'		    =>	$ordergrandt,
				'bill_date'		        =>	date('Y-m-d'),
				'bill_time'		        =>	date('H:i:s'),
				'bill_status'		    =>	1,
				'payment_method_id'		=>	$this->input->post('card_type'),
				'create_by'		        =>	$saveid,
				'create_date'		    =>	date('Y-m-d')
			);
			$this->db->insert('bill', $billinfo);
			$billid = $this->db->insert_id();
			$cardinfo = array(
				'bill_id'			    =>	$billid,
				'card_no'		        =>	$this->input->post('card_no'),
				'issuer_name'	        =>	$this->input->post('card_holdername')
			);
			$this->db->insert('bill_card_payment', $cardinfo);
			$updatetData = array(
				'order_status'     => 4,
			);
			$this->db->where('order_id', $id);
			$this->db->update('customer_order', $updatetData);
		}
	}
	public function billinfo($id = null)
	{
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		$billinfo = $query->row();
		return $billinfo;
	}
	public function shipinfo($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_shippingaddress');
		$this->db->where('orderid', $id);
		$query = $this->db->get();
		$billinfo = $query->row();
		return $billinfo;
	}
	public function customerinfo($id = null)
	{
		$this->db->select('*');
		$this->db->from('customer_info');
		$this->db->where('customer_id', $id);
		$query = $this->db->get();
		$customer = $query->row();
		return $customer;
	}
	public function findById($id = null)
	{
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('CategoryID', $id);
		$query = $this->db->get();
		$itemlist = $query->result();
		return $itemlist;
	}
	public function findByvmenuId($id = null)
	{
		$this->db->select('item_foods.CategoryID,variant.variantid,variant.variantName,variant.price');
		$this->db->from('variant');
		$this->db->join('item_foods', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('variant.menuid', $id);
		$query = $this->db->get();
		$itemlist = $query->result();
		return $itemlist;
	}

	public function getiteminfo($id = null)
	{
		$this->db->select('*');
		$this->db->from('item_foods');
		$this->db->where('ProductsID', $id);
		$query = $this->db->get();
		$itemlist = $query->row();
		return $itemlist;
	}

	public function searchprod($cid = null, $pname = null)
	{
		if (!empty($cid)) {
			$catinfo = $this->db->select("*")->from('item_category')->where('CategoryID', $cid)->get()->row();
			$catids = $cid;
			if ($catinfo->parentid > 0) {
				$catids = $cid . ',' . $catinfo->parentid;
			}
		} else {
			$catids = "";
		}
		$catcontition = "CategoryID IN($catids)";
		$this->db->select('*');
		$this->db->from('item_foods');
		if (!empty($cid)) {
			$this->db->where($catcontition);
		}
		if (!empty($pname)) {
			$this->db->like('ProductName', $pname);
		}
		$this->db->where('isgroup', null);
		$this->db->where('ProductsIsActive', 1);
		$query = $this->db->get();
		$itemlist = $query->result();
		// echo $this->db->last_query();
		$output = array();
		if (!empty($itemlist)) {
			$k = 0;
			foreach ($itemlist as $items) {
				$productionInfo= $this->db->select("production.itemid")->from('production')->where('production.itemid', $items->ProductsID)->get()->row();
				if (!empty($productionInfo)) {
					$varientinfo = $this->db->select("variant.*,count(menuid) as totalvarient")->from('variant')->where('menuid', $items->ProductsID)->get()->row();
					if (!empty($varientinfo)) {
						$output[$k]['variantid'] = $varientinfo->variantid;
						$output[$k]['totalvarient'] = $varientinfo->totalvarient;
						$output[$k]['variantName'] = $varientinfo->variantName;
						$output[$k]['price'] = $varientinfo->price;
					} else {
						$output[$k]['variantid'] = '';
						$output[$k]['totalvarient'] = 0;
						$output[$k]['variantName'] = '';
						$output[$k]['price'] = '';
					}
					$output[$k]['ProductsID'] = $items->ProductsID;
					$output[$k]['CategoryID'] = $items->CategoryID;
					$output[$k]['ProductName'] = $items->ProductName;
					$output[$k]['ProductImage'] = $items->ProductImage;
					$output[$k]['bigthumb'] = $items->bigthumb;
					$output[$k]['medium_thumb'] = $items->medium_thumb;
					$output[$k]['small_thumb'] = $items->small_thumb;
					$output[$k]['component'] = $items->component;
					$output[$k]['descrip'] = $items->descrip;
					$output[$k]['itemnotes'] = $items->itemnotes;
					$output[$k]['menutype'] = $items->menutype;
					$output[$k]['productvat'] = $items->productvat;
					$output[$k]['special'] = $items->special;
					$output[$k]['OffersRate'] = $items->OffersRate;
					$output[$k]['offerIsavailable'] = $items->offerIsavailable;
					$output[$k]['offerstartdate'] = $items->offerstartdate;
					$output[$k]['offerendate'] = $items->offerendate;
					$output[$k]['Position'] = $items->Position;
					$output[$k]['kitchenid'] = $items->kitchenid;
					$output[$k]['isgroup'] = $items->isgroup;
					$output[$k]['is_customqty'] = $items->is_customqty;
					$output[$k]['cookedtime'] = $items->cookedtime;
					$output[$k]['ProductsIsActive'] = $items->ProductsIsActive;
					$k++;
				}
			}
		}
		return $output;
	}
	public function searchsubprod($cid = null, $pname = null)
	{
		if (!empty($cid)) {
			$catinfo = $this->db->select("*")->from('item_category')->where('CategoryID', $cid)->get()->row();
			$catids = $cid;
			if ($catinfo->parentid > 0) {
				$catids = $cid . ',' . $catinfo->parentid;
			}
		} else {
			$catids = "";
		}
		$catcontition = "SubCategoryID IN($catids)";
		$this->db->select('*');
		$this->db->from('item_foods');
		if (!empty($cid)) {
			$this->db->where($catcontition);
		}
		if (!empty($pname)) {
			$this->db->like('ProductName', $pname);
		}
		$this->db->where('isgroup', null);
		$this->db->where('ProductsIsActive', 1);
		$query = $this->db->get();
		$itemlist = $query->result();
		// echo $this->db->last_query();
		$output = array();
		if (!empty($itemlist)) {
			$k = 0;
			foreach ($itemlist as $items) {
				$productionInfo= $this->db->select("production.itemid")->from('production')->where('production.itemid', $items->ProductsID)->get()->row();
				if (!empty($productionInfo)) {
					$varientinfo = $this->db->select("variant.*,count(menuid) as totalvarient")->from('variant')->where('menuid', $items->ProductsID)->get()->row();
					if (!empty($varientinfo)) {
						$output[$k]['variantid'] = $varientinfo->variantid;
						$output[$k]['totalvarient'] = $varientinfo->totalvarient;
						$output[$k]['variantName'] = $varientinfo->variantName;
						$output[$k]['price'] = $varientinfo->price;
					} else {
						$output[$k]['variantid'] = '';
						$output[$k]['totalvarient'] = 0;
						$output[$k]['variantName'] = '';
						$output[$k]['price'] = '';
					}
					$output[$k]['ProductsID'] = $items->ProductsID;
					$output[$k]['CategoryID'] = $items->CategoryID;
					$output[$k]['ProductName'] = $items->ProductName;
					$output[$k]['ProductImage'] = $items->ProductImage;
					$output[$k]['bigthumb'] = $items->bigthumb;
					$output[$k]['medium_thumb'] = $items->medium_thumb;
					$output[$k]['small_thumb'] = $items->small_thumb;
					$output[$k]['component'] = $items->component;
					$output[$k]['descrip'] = $items->descrip;
					$output[$k]['itemnotes'] = $items->itemnotes;
					$output[$k]['menutype'] = $items->menutype;
					$output[$k]['productvat'] = $items->productvat;
					$output[$k]['special'] = $items->special;
					$output[$k]['OffersRate'] = $items->OffersRate;
					$output[$k]['offerIsavailable'] = $items->offerIsavailable;
					$output[$k]['offerstartdate'] = $items->offerstartdate;
					$output[$k]['offerendate'] = $items->offerendate;
					$output[$k]['Position'] = $items->Position;
					$output[$k]['kitchenid'] = $items->kitchenid;
					$output[$k]['isgroup'] = $items->isgroup;
					$output[$k]['is_customqty'] = $items->is_customqty;
					$output[$k]['cookedtime'] = $items->cookedtime;
					$output[$k]['ProductsIsActive'] = $items->ProductsIsActive;
					$k++;
				}
			}
		}
		return $output;
	}
	public function getuniqeproduct($pid = null)
	{
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('ProductsID', $pid);
		$query = $this->db->get();
		$item = $query->row();

		return $item;
	}
	public function searchdropdown($pname = null)
	{

		$this->db->select('item_foods.ProductsID as id,item_foods.ProductName as text,variant.variantid,variant.variantName,variant.price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->like('item_foods.ProductName', $pname);
		$this->db->where('item_foods.ProductsIsActive', 1);
		$query = $this->db->get();
		$itemlist = $query->result();

		return $itemlist;
	}
	public function productinfo($id)
	{
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('ProductsID', $id);
		$query = $this->db->get();
		$itemlist = $query->row();
		return $itemlist;
	}
	public function findid($id = null, $sid = null, $ctype=null)
	{
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price, variant.takeaway_price, variant.uber_eats_price');
		$this->db->from('item_foods');
		$this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
		$this->db->where('menuid', $id);
		$this->db->where('variantid', $sid);
		$query = $this->db->get();
		$itemlist = $query->row();
		return $itemlist;
	}
	public function findPromoById($id = null)
	{
		$this->db->select('item_foods.*');
		$this->db->from('item_foods');
		$this->db->where('ProductsID', $id);
		$query = $this->db->get();
		$itemlist = $query->row();
		return $itemlist;
	}
	public function findMainFoodsPromo($id = null)
	{
		$this->db->select('f.*, c.Name AS category_name, pmm.category_id');
		$this->db->from('item_foods AS f');
		$this->db->join('item_category AS c', 'c.CategoryID=f.CategoryID', 'INNER');
		$this->db->join('promotion_main_modifiers AS pmm', 'c.CategoryID=pmm.category_id', 'INNER');
		$this->db->where('pmm.promotion_id', $id);
		$query = $this->db->get();
		$mainFoodlistPromo = $query->result();
		return $mainFoodlistPromo;
	}
	public function findMainCats($id = null)
	{
		$this->db->select('pmm.id, pmm.category_id, pmm.category_max_qty, pmm.category_weight_percent, pmm.total_weight_percent, pmm.total_no_of_item, ic.Name AS category_name');
		$this->db->from('promotion_main_modifiers AS pmm');
		$this->db->join('item_category AS ic', 'ic.CategoryID = pmm.category_id', 'INNER');
		$this->db->where('pmm.promotion_id', $id);
		$query = $this->db->get();
		$promoMainCats = $query->result();
		// echo "<pre>";
		// print_r($promoMainCats);
		// echo "</pre><br />";
		// echo "promoMainCats query: ".$this->db->last_query();
		// exit();
		return $promoMainCats;
	}



	public function findaddons($id = null)
	{
		$this->db->select('add_ons.*');
		$this->db->from('menu_add_on');
		$this->db->join('add_ons', 'menu_add_on.add_on_id = add_ons.add_on_id', 'left');
		$this->db->where('menu_id', $id);
		$query = $this->db->get();
		$addons = $query->result();
		return $addons;
	}

	public function finditem($product_name)
	{
		$this->db->select('*');
		$this->db->from('ingredients');
		$this->db->where('is_active', 1);
		$this->db->like('ingredient_name', $product_name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	//category Dropdown
	public function allcat_dropdown()
	{

		$this->db->select('*');
		$this->db->from('item_category');
		$this->db->where('parentid', 0);
		$this->db->where('CategoryIsActive', 1);
		$parent = $this->db->get();
		$menulist = $parent->result();
		$i = 0;
		foreach ($menulist as $sub_menu) {
			$menulist[$i]->sub = $this->sub_cat($sub_menu->CategoryID);
			$i++;
		}
		return $menulist;
	}

	public function sub_cat($id)
	{

		$this->db->select('*');
		$this->db->from('item_category');
		$this->db->where('parentid', $id);
		$this->db->where('CategoryIsActive', 1);
		$child = $this->db->get();
		$menulist = $child->result();
		$i = 0;
		foreach ($menulist as $sub_menu) {
			$menulist[$i]->sub = $this->sub_cat($sub_menu->CategoryID);
			$i++;
		}
		return $menulist;
	}
	public function category_dropdown()
	{
		$data = $this->db->select("*")
			->from('item_category')
			->get()
			->result();

		$list[''] = 'Select Food Category';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->CategoryID] = $value->Name;
			return $list;
		} else {
			return false;
		}
	}
	public function customer_dropdown()
	{
		$data = $this->db->select("*")
			->from('customer_info')
			->get()
			->result();

		$list[''] = 'Select Customer';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->customer_id] = $value->customer_name;
			return $list;
		} else {
			return false;
		}
	}

	public function ctype_dropdown()
	{
		$data = $this->db->select("*")
			->from('customer_type')
			->get()
			->result();

		$list[''] = 'Select ' . display('customer_type');
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->customer_type_id] = $value->customer_type;
			return $list;
		} else {
			return false;
		}
	}
	public function thirdparty_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_thirdparty_customer')
			->get()
			->result();

		$list[''] = 'Select Delivary Company';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->companyId] = $value->company_name;
			return $list;
		} else {
			return false;
		}
	}
	public function bank_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_bank')
			->get()
			->result();

		$list[''] = 'Select Bank';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->bankid] = $value->bank_name;
			return $list;
		} else {
			return false;
		}
	}
	public function allterminal_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_card_terminal')
			->get()
			->result();

		$list[''] = 'Select ' . display('crd_terminal');
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->card_terminalid] = $value->terminal_name;
			return $list;
		} else {
			return false;
		}
	}
	public function waiter_dropdown()
	{

		$shiftmangment = $this->db->where('directory', 'shiftmangment')->where('status', 1)->get('module')->num_rows();
		if ($shiftmangment == 1) {
			$data = $this->shiftwisecustomer();
		} else {
			$data = $this->waiterwithshift();
		}

		$list[''] = 'Select Waiter';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->emp_id] = $value->first_name . " " . $value->last_name;
			return $list;
		} else {
			return false;
		}
	}
	public function waiterwithshift()
	{
		$data = $this->db->select("emp_id,first_name,last_name")
			->from('employee_history')
			->where('pos_id', 6)
			->get()
			->result();
		return $data;
	}
	public function shiftwisecustomer()
	{
		$timezone = $this->db->select('timezone')->get('setting')->row();
		$tz_obj = new DateTimeZone($timezone->timezone);
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('H:i:s');
		$where = "'$today_formatted' BETWEEN start_Time and end_Time";
		$current_shift = $this->db->select('*')
			->from('shifts')
			->where($where)
			->get()
			->row();
		$data = array();
		if (!empty($current_shift)) {
			$this->db->select("emp.emp_id,emp.first_name,emp.last_name,emp.employee_no");
			$this->db->from('employee_history as emp');
			$this->db->join('shift_user as s', 'emp.employee_no=s.emp_id', 'left');
			$this->db->where('emp.pos_id', 6);
			$this->db->where('s.shift_id', $current_shift->id);
			$data = $this->db->get()->result();
		}
		return $data;
	}
	public function table_dropdown()
	{
		$data = $this->db->select("*")
			->from('rest_table')
			->get()
			->result();

		$list[''] = 'Select Table';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->tableid] = $value->tablename;
			return $list;
		} else {
			return false;
		}
	}
	public function pmethod_dropdown()
	{
		$data = $this->db->select("*")
			->from('payment_method')
			->where('is_active', 1)
			->get()
			->result();

		$list[''] = 'Select Method';
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->payment_method_id] = $value->payment_method;
			return $list;
		} else {
			return false;
		}
	}
	//Pending Order
	public function insert_data($table, $data)
	{
		$this->db->insert($table, $data);

		return $this->db->insert_id();
	}
	public function read($select_items, $table, $where_array)
	{
		$this->db->select($select_items);
		$this->db->from($table);
		foreach ($where_array as $field => $value) {
			$this->db->where($field, $value);
		}
		return $this->db->get()->row();
	}
	public function read_all($select_items, $table, $where_array, $order_by_name = NULL, $order_by = NULL)
	{
		$this->db->select($select_items);
		$this->db->from($table);
		foreach ($where_array as $field => $value) {
			$this->db->where($field, $value);
		}
		if ($order_by_name != NULL && $order_by != NULL) {
			$this->db->order_by($order_by_name, $order_by);
		}
		return $this->db->get()->result();
	}
	public function readupdate($select_items, $table, $where_array)
	{
		$this->db->select($select_items);
		$this->db->from($table);
		foreach ($where_array as $field => $value) {
			$this->db->where($field, $value);
		}
		$this->db->order_by('updateid', 'DESC');
		$this->db->limit(1);

		return $this->db->get()->row();
	}
	public function read_allgroup($select_items, $table, $where_array)
	{
		$this->db->select($select_items);
		$this->db->from($table);
		foreach ($where_array as $field => $value) {
			$this->db->where($field, $value);
		}
		$this->db->order_by('ordid', 'Asc');

		return $this->db->get()->result();
	}

	public function orderlist($limit = null, $start = null)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->order_by('customer_order.order_id', 'DESC');

		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function count_order()
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}
		return false;
	}
	public function pendingorder($limit = null, $start = null, $status = null)
	{
		$sql = "SELECT customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order LEFT JOIN customer_info ON customer_info.customer_id=customer_order.customer_id LEFT JOIN customer_type ON customer_type.customer_type_id=customer_order.cutomertype LEFT JOIN employee_history ON employee_history.emp_id=customer_order.waiter_id LEFT JOIN rest_table ON rest_table.tableid=customer_order.table_no WHERE customer_order.order_status = $status ORDER BY customer_order.order_id DESC";
		$query = $this->db->query($sql);
		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function count_canorder($status = null)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where('customer_order.order_status', $status);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}
		return false;
	}
	// public function completeorder($limit = null, $start = null, $status = null)
	// {
	// 	$sql = "SELECT customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order LEFT JOIN customer_info ON customer_order.customer_id=customer_info.customer_id LEFT JOIN customer_type ON customer_order.cutomertype=customer_type.customer_type_id LEFT JOIN employee_history ON customer_order.waiter_id=employee_history.emp_id LEFT JOIN rest_table ON customer_order.table_no=rest_table.tableid LEFT JOIN bill ON customer_order.order_id=bill.order_id WHERE bill.bill_status = $status";
	// 	$query = $this->db->query($sql);
	// 	$orderdetails = $query->result();
	// 	return $orderdetails;
	// }
	public function completeorder($limit = null, $start = null, $status = null)
	{
		// Ensure status is set
		if ($status === null) {
			return [];
		}

		$this->db->select('customer_order.*, customer_info.customer_name, customer_type.customer_type, employee_history.first_name, employee_history.last_name, rest_table.tablename, bill.bill_status');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id = customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype = customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id = employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no = rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id = bill.order_id', 'left');
		$this->db->where('bill.bill_status', $status);

		// Avoid duplicate customer orders by selecting latest order per customer
		$this->db->group_by('customer_order.order_id');

		// Add pagination if limit and offset are set
		if ($limit !== null && $start !== null) {
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();
		return $query->result();
	}

	public function count_comorder($status)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where('bill.bill_status', $status);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}
		return false;
	}
	public function customerorder($id, $nststus = null)
	{
		if (!empty($nststus)) {
			$where = "order_menu.order_id = '" . $id . "' AND order_menu.isupdate='" . $nststus . "' ";
		} else {
			$where = "order_menu.order_id = '" . $id . "' ";
		}
		//$sql = "SELECT order_menu.row_id,order_menu.order_id,order_menu.groupmid as menu_id,order_menu.notes,order_menu.add_on_id,order_menu.addonsqty,order_menu.groupvarient as varientid,order_menu.addonsuid,order_menu.qroupqty as menuqty,order_menu.price as price,order_menu.isgroup,order_menu.food_status,order_menu.allfoodready,order_menu.isupdate, item_foods.ProductName, variant.variantid, variant.variantName, variant.price as mprice FROM order_menu LEFT JOIN item_foods ON order_menu.groupmid=item_foods.ProductsID LEFT JOIN variant ON order_menu.groupvarient=variant.variantid WHERE {$where} AND order_menu.isgroup=1 Group BY order_menu.groupmid UNION SELECT order_menu.row_id,order_menu.order_id,order_menu.menu_id as menu_id,order_menu.notes,order_menu.add_on_id,order_menu.addonsqty,order_menu.varientid as varientid,order_menu.addonsuid,order_menu.menuqty as menuqty,order_menu.price as price,order_menu.isgroup,order_menu.food_status,order_menu.allfoodready,order_menu.isupdate, item_foods.ProductName, variant.variantid, variant.variantName, variant.price as mprice FROM order_menu LEFT JOIN item_foods ON order_menu.menu_id=item_foods.ProductsID LEFT JOIN variant ON order_menu.varientid=variant.variantid WHERE {$where} AND order_menu.isgroup=0";
		$sql = "SELECT order_menu.row_id,order_menu.order_id,order_menu.groupmid as menu_id,order_menu.notes,order_menu.add_on_id,order_menu.addonsqty,order_menu.groupvarient as varientid,order_menu.addonsuid,order_menu.qroupqty as menuqty,order_menu.price as price,order_menu.isgroup,order_menu.food_status,order_menu.allfoodready,order_menu.isupdate, item_foods.ProductName, variant.variantid, variant.variantName, variant.price as mprice, item_category.Name as CategoryName FROM order_menu LEFT JOIN item_foods ON order_menu.groupmid=item_foods.ProductsID LEFT JOIN variant ON order_menu.groupvarient=variant.variantid LEFT JOIN item_category ON item_foods.CategoryID = item_category.CategoryID WHERE {$where} AND order_menu.isgroup=1 Group BY order_menu.groupmid UNION SELECT order_menu.row_id,order_menu.order_id,order_menu.menu_id as menu_id,order_menu.notes,order_menu.add_on_id,order_menu.addonsqty,order_menu.varientid as varientid,order_menu.addonsuid,order_menu.menuqty as menuqty,order_menu.price as price,order_menu.isgroup,order_menu.food_status,order_menu.allfoodready,order_menu.isupdate, item_foods.ProductName, variant.variantid, variant.variantName, variant.price as mprice, item_category.Name as CategoryName FROM order_menu LEFT JOIN item_foods ON order_menu.menu_id=item_foods.ProductsID LEFT JOIN variant ON order_menu.varientid=variant.variantid LEFT JOIN item_category ON item_foods.CategoryID = item_category.CategoryID WHERE {$where} AND order_menu.isgroup=0";
		$query = $this->db->query($sql);

		return $query->result();
	}
	public function findgrouporderid($id, $menuid, $vid)
	{
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where('order_menu.order_id', $id);
		$this->db->where('order_menu.groupmid', $menuid);
		$this->db->where('order_menu.groupvarient', $vid);
		$query = $this->db->get();
		$orderinfo = $query->row();
		return $orderinfo;
	}
	public function customerorderkitchen($id, $kitchen)
	{
		$this->db->select('order_menu.*,item_foods.ProductName,item_foods.kitchenid,item_foods.cookedtime,item_category.CategoryID as category_id, item_category.Name as cat_name, variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('item_category', 'item_foods.CategoryID=item_category.CategoryID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where('order_menu.order_id', $id);
		$this->db->where('item_foods.kitchenid', $kitchen);
		$this->db->order_by('order_menu.order_id', 'desc');
		$query = $this->db->get();
		$orderinfo = $query->result();
		return $orderinfo;
	}
	public function customerprintkitchen($id, $kitchen, $itemids, $varientids)
	{
		$itemids = array_filter($itemids);
		$varientids = array_filter($varientids);
		$allitems = "'" . implode("','", $itemids) . "'";
		$allsize = "'" . implode("','", $varientids) . "'";
		$condi1 = "order_menu.menu_id IN($allitems) AND order_menu.varientid IN($allsize)";
		$this->db->select('order_menu.*,item_foods.ProductName,item_foods.kitchenid,item_foods.cookedtime,variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where('order_menu.order_id', $id);
		$this->db->where($condi1);
		$this->db->where('item_foods.kitchenid', $kitchen);
		$query = $this->db->get();
		$orderinfo = $query->result();

		return $orderinfo;
	}
	public function customercancelkitchen($id, $kitchen)
	{
		$this->db->select('tbl_cancelitem.*,item_foods.ProductName,item_foods.kitchenid,item_foods.cookedtime,variant.variantid,variant.variantName,variant.price');
		$this->db->from('tbl_cancelitem');
		$this->db->join('item_foods', 'tbl_cancelitem.foodid=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'tbl_cancelitem.varientid=variant.variantid', 'left');
		$this->db->where('tbl_cancelitem.orderid', $id);
		$this->db->where('item_foods.kitchenid', $kitchen);
		$query = $this->db->get();
		$orderinfo = $query->result();
		return $orderinfo;
	}
	public function kitchen_ajaxorderinfoall($id)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where('customer_order.order_id', $id);
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();

		$orderdetails = $query->row();
		return $orderdetails;
	}
	public function kitchen_ajaxorderinfo($id)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.memberid,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.memberid', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where('customer_order.order_id', $orderid);
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function update_order($data = array())
	{
		return $this->db->where('order_id', $data["order_id"])->update('customer_order', $data);
	}
	public function cartitem_delete($id = null, $orderid = null)
	{
		$this->db->where('row_id', $id)->delete('order_menu');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function show_marge_payment($id)
	{
		$customer_id = $this->db->select("customer_id")->from('customer_order')->where('order_id', $id)->get()->row();
		$where = "(order_status = 1 OR order_status = 2 OR order_status = 3)";
		$marge = $this->db->select("*")->from('customer_order')->where('customer_id', $customer_id->customer_id)->where($where)->get();
		$orderdetails = $marge->result();
		return $orderdetails;
	}
	public function uniqe_order_id($id)
	{
		$this->db->select('*');
		$this->db->from('customer_order');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}
	public function margeview($id)
	{
		$this->db->select('customer_order.*,order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('customer_order');
		$this->db->join('order_menu', 'customer_order.order_id=order_menu.order_id', 'left');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'Inner');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'Inner');
		$this->db->where('customer_order.marge_order_id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	public function margebill($id)
	{
		$this->db->select('customer_order.*,bill.total_amount,bill.bill_amount,bill.bill_status,bill.service_charge,bill.discount,bill.VAT');
		$this->db->from('customer_order');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where('customer_order.marge_order_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	public function customerorderMarge($id, $nststus = null)
	{
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where_in('order_menu.order_id', $id);
		if ($nststus == 1) {
			$this->db->where('order_menu.isupdate', $nststus);
		}
		$query = $this->db->get();
		$orderinfo = $query->result();
		return $orderinfo;
	}

	public function check_order($orderid, $pid, $vid, $auid)
	{
		$this->db->select('*');
		$this->db->from('order_menu');
		$this->db->where('order_id', $orderid);
		$this->db->where('menu_id', $pid);
		$this->db->where('varientid', $vid);
		$this->db->where('addonsuid', $auid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}
	public function check_ordergroup($orderid, $pid, $vid, $auid)
	{
		$this->db->select('*');
		$this->db->from('order_menu');
		$this->db->where('order_id', $orderid);
		$this->db->where('groupmid', $pid);
		$this->db->where('groupvarient', $vid);
		$this->db->where('addonsuid', $auid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}
	public function check_cancelitem($orderid, $pid, $vid)
	{
		$this->db->select('*');
		$this->db->from('tbl_cancelitem');
		$this->db->where('orderid', $orderid);
		$this->db->where('foodid', $pid);
		$this->db->where('varientid', $vid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}
	public function menucheck($orderid)
	{
		$this->db->select('*');
		$this->db->where('order_id', $orderid);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	public function new_entry($data = array())
	{
		return $this->db->insert('order_menu', $data);
	}
	public function update_info($table, $data, $field_name, $field_value)
	{
		$this->db->where($field_name, $field_value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	public function settinginfo()
	{
		return $this->db->select("*")->from('setting')
			->get()
			->row();
	}
	public function currencysetting($id = null)
	{
		return $this->db->select("*")->from('currency')
			->where('currencyid', $id)
			->get()
			->row();
	}
	public function get_ongoingorder()
	{
		$cdate = date("Y-m-d", strtotime("- 1 day"));
		$today = date("Y-m-d");

		$where = "customer_order.order_date Between '" . $cdate . "' AND '" . $today . "' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3) AND ((customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 3 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 4 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$sql = "SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NULL UNION SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NOT NULL GROUP BY customer_order.marge_order_id order by mid desc";

		$query = $this->db->query($sql);

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function get_unique_ongoingorder_id($id)
	{
		$where = "customer_order.order_id = '" . $id . "'";

		$sql = "SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NULL UNION SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NOT NULL GROUP BY customer_order.marge_order_id order by mid desc";
		$query = $this->db->query($sql);

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function get_unique_ongoingtable_id($id)
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.table_no = '" . $id . "' AND customer_order.order_date = '" . $cdate . "' AND customer_order.cutomertype !=2 AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";

		$sql = "SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NULL UNION SELECT customer_order.*,customer_order.order_id as mid,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename FROM customer_order Left JOIN customer_info ON customer_order.customer_id=customer_info.customer_id Left Join customer_type ON customer_order.cutomertype=customer_type.customer_type_id left join employee_history ON customer_order.waiter_id=employee_history.emp_id Left Join rest_table ON customer_order.table_no=rest_table.tableid Where {$where} AND customer_order.marge_order_id IS NOT NULL GROUP BY customer_order.marge_order_id order by mid desc";
		$query = $this->db->query($sql);

		$orderdetails = $query->result();
		return $orderdetails;
	}
	/****start All order **********/
	private function get_allorder_query()
	{
		$column_order = array(null, 'customer_order.saleinvoice', 'customer_info.customer_id', 'customer_type.customer_type', 'CONCAT_WS(" ", employee_history.first_name,employee_history.last_name)', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.saleinvoice', 'customer_info.customer_id', 'customer_type.customer_type', 'CONCAT_WS(" ", employee_history.first_name,employee_history.last_name)', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.customer_id,customer_type.customer_type,CONCAT_WS(" ", employee_history.first_name,employee_history.last_name) AS fullname,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->order_by('customer_order.order_id', 'DESC');
		$startdate = $this->input->post('startdate', true);
		$enddate = $this->input->post('enddate', true);
		if (!empty($startdate)) {
			$condition = "customer_order.order_date between '" . $startdate . "' AND '" . $enddate . "'";
			$this->db->where($condition);
		}

		$i = 0;
		foreach ($column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_allorder()
	{
		$this->get_allorder_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filterallorder()
	{
		$this->get_allorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allorder()
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.customer_id,customer_type.customer_type,CONCAT_WS(" ", employee_history.first_name,employee_history.last_name) AS fullname,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$startdate = $this->input->post('startdate', true);
		$enddate = $this->input->post('enddate', true);
		if (!empty($startdate)) {
			$condition = "customer_order.order_date between '" . $startdate . "' AND '" . $enddate . "'";
			$this->db->where($condition);
		}
		return $this->db->count_all_results();
	}
	/**********endalorder*********/
	public function get_unique_ongoingorder($name)
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND customer_order.cutomertype !=2 AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.order_id as id,CONCAT(rest_table.tablename, "(", customer_order.order_id,")") as text');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->like('customer_order.order_id', $name);
		$this->db->where($where);
		$query = $this->db->get();

		$tablewiseorderdetails = $query->result();
		return $tablewiseorderdetails;
	}
	public function get_unique_ongoingtable($name)
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND customer_order.cutomertype !=2 AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('rest_table.tableid as id,rest_table.tablename as text');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->like('rest_table.tablename', $name);
		$this->db->where($where);
		$this->db->group_by('rest_table.tablename');
		$query = $this->db->get();

		$tablewiseorderdetails = $query->result();
		return $tablewiseorderdetails;
	}

	public function kitchen_ongoingorder($id)
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND order_menu.allfoodready IS NULL AND ((customer_order.order_status = 1 OR customer_order.order_status = 2) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 3 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 4 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,item_foods.kitchenid,order_menu.menu_id,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('order_menu', 'order_menu.order_id=customer_order.order_id', 'left');
		$this->db->join('item_foods', 'item_foods.ProductsID=order_menu.menu_id', 'Inner');
		$this->db->where($where);
		$this->db->where('item_foods.kitchenid', $id);
		$this->db->order_by('customer_order.order_id', 'desc');
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function kitchen_ongoingorderall()
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 3 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 4 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where($where);
		$query = $this->db->get();
		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function counter_ongoingorder()
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where($where);
		$query = $this->db->get();

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function counter_ongoingorderlimit($limit = null, $start = null)
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where($where);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		$orderdetails = $query->result();
		return $orderdetails;
	}
	private function get_alltodayorder_query()
	{
		$column_order = array(null, 'customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');

		$cdate = date('Y-m-d');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where('customer_order.order_date', $cdate);
		$this->db->where('bill.bill_status', 1);
		$this->db->order_by('customer_order.order_id', 'desc');
		$i = 0;

		// Add group_by here
		$this->db->group_by('customer_order.order_id');

		foreach ($column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_completeorder()
	{
		$this->get_alltodayorder_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();

		return $query->result();
	}
	public function count_filtertorder()
	{
		$this->get_alltodayorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_alltodayorder()
	{
		$cdate = date('Y-m-d');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where('customer_order.order_date', $cdate);
		$this->db->where('bill.bill_status', 1);
		return $this->db->count_all_results();
	}

	private function get_completeonlineorder_query()
	{
		$column_order = array(null, 'customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');

		$cdate = date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate . ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '" . $previousday . "' AND '" . $cdate . "'";

		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status,bill.shipping_type');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype', 2);
		$this->db->order_by('customer_order.order_id', 'desc');
		$i = 0;

		foreach ($column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_completeonlineorder()
	{
		$this->get_completeonlineorder_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();

		return $query->result();
	}
	public function count_filtertonlineorder()
	{
		$this->get_completeonlineorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allonlineorder()
	{
		$cdate = date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate . ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '" . $previousday . "' AND '" . $cdate . "'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status,bill.shipping_type');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype', 2);
		$this->db->where('bill.bill_status', 1);
		return $this->db->count_all_results();
	}
	private function get_qronlineorder_query()
	{
		$column_order = array(null, 'customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.saleinvoice', 'customer_info.customer_name', 'customer_type.customer_type', 'employee_history.first_name', 'employee_history.last_name', 'rest_table.tablename', 'customer_order.order_date', 'customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');

		$cdate = date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate . ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '" . $previousday . "' AND '" . $cdate . "'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status,bill.shipping_type');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype', 99);
		$this->db->order_by('customer_order.order_id', 'desc');
		$i = 0;

		foreach ($column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_qronlineorder()
	{
		$this->get_qronlineorder_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();

		return $query->result();
	}
	public function count_filtertqrorder()
	{
		$this->get_qronlineorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allqrorder()
	{
		$cdate = date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate . ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '" . $previousday . "' AND '" . $cdate . "'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->join('bill', 'customer_order.order_id=bill.order_id', 'left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype', 99);
		$this->db->where('bill.bill_status', 1);
		return $this->db->count_all_results();
	}
	public function selectmerge($orders)
	{
		$cond = "order_id IN($orders)";
		$this->db->select('*');
		$this->db->from('customer_order');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result();
	}


	public function cleanString($String)
	{
		$String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
		$String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "a", $String);
		$String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "i", $String);
		$String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
		$String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
		$String = str_replace(array('É', 'È', 'Ê', 'Ë'), "e", $String);
		$String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
		$String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "o", $String);
		$String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
		$String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "u", $String);
		$String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
		$String = str_replace("ç", "c", $String);
		$String = str_replace("Ç", "C", $String);
		$String = str_replace("ñ", "n", $String);
		$String = str_replace("Ñ", "N", $String);
		$String = str_replace("Ý", "Y", $String);
		$String = str_replace("ý", "y", $String);
		$String = str_replace("&aacute;", "a", $String);
		$String = str_replace("&Aacute;", "a", $String);
		$String = str_replace("&eacute;", "e", $String);
		$String = str_replace("&Eacute;", "e", $String);
		$String = str_replace("&iacute;", "i", $String);
		$String = str_replace("&Iacute;", "i", $String);
		$String = str_replace("&oacute;", "o", $String);
		$String = str_replace("&Oacute;", "o", $String);
		$String = str_replace("&uacute;", "u", $String);
		$String = str_replace("&Uacute;", "u", $String);
		return $String;
	}
	public function settinginfolanguge($lang)
	{
		$values =  $this->db->select("phrase,$lang")->from('language')
			->get()->result();
		$strings = array();
		foreach ($values as $file) {

			$strings[$file->phrase] = $this->cleanString($file->$lang);
		}

		return $strings;
	}
	public function get_orderlist()
	{
		$cdate = date('Y-m-d');
		$where = "customer_order.order_date = '" . $cdate . "' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 3 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 4 || customer_order.orderacceptreject != 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id=customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype=customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id=employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no=rest_table.tableid', 'left');
		$this->db->where($where);
		$this->db->group_by('customer_order.order_id');
		$this->db->order_by('customer_order.order_status', 'desc');
		$query = $this->db->get();

		$orderdetails = $query->result();
		return $orderdetails;
	}
	public function get_itemlist($id)
	{
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where('order_menu.order_id', $id);
		$query = $this->db->get();
		$orderinfo = $query->result();

		return $orderinfo;
	}
	public function get_cancelitemlist($id)
	{
		$this->db->select('tbl_cancelitem.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('tbl_cancelitem');
		$this->db->join('item_foods', 'tbl_cancelitem.foodid=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'tbl_cancelitem.varientid=variant.variantid', 'left');
		$this->db->where('tbl_cancelitem.orderid', $id);
		$query = $this->db->get();
		$orderinfo = $query->result();

		return $orderinfo;
	}

	public function get_table_total_customer($id)
	{
		$where = "table_id = '" . $id . "' AND delete_at = 0 AND created_at= '" . date('Y-m-d') . "'";
		$this->db->select('SUM(total_people) as total');
		$this->db->from('table_details');
		$this->db->where($where);
		$query = $this->db->get();
		$tablesum = $query->row();
		return $tablesum;
	}

	public function get_table_order($id)
	{
		$where = "table_id = '" . $id . "' AND delete_at = 0 AND created_at= '" . date('Y-m-d') . "'";
		$this->db->select('*');
		$this->db->from('table_details');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function tablefloor()
	{
		$this->db->select('*');
		$this->db->from('tbl_tablefloor');
		$query = $this->db->get();
		$table = $query->result();
		return $table;
	}

	public function get_table_total($floorid)
	{
		$where = "table_details.delete_at = 0 AND table_details.created_at= '" . date('Y-m-d') . "'";
		$this->db->select('rest_table.*,tbl_tablefloor.*');
		$this->db->from('rest_table');
		$this->db->join('tbl_tablefloor', 'tbl_tablefloor.tbfloorid=rest_table.floor', 'left');
		$this->db->where('rest_table.floor', $floorid);
		$query = $this->db->get();
		$table = $query->result_array();
		$i = 0;
		foreach ($table as $value) {
			$table[$i]['table_details'] = $this->get_table_order($value['tableid']);
			$sum = $this->get_table_total_customer($value['tableid']);
			$table[$i]['sum'] =  $sum->total;
			$i++;
		}

		return $table;
	}

	public function get_all_table_total()
	{
		$where = "table_details.delete_at = 0 AND table_details.created_at= '" . date('Y-m-d') . "'";
		$this->db->select('rest_table.*,tbl_tablefloor.*');
		$this->db->from('rest_table');
		$this->db->join('tbl_tablefloor', 'tbl_tablefloor.tbfloorid=rest_table.floor', 'left');
		$query = $this->db->get();
		$table = $query->result_array();
		$i = 0;
		foreach ($table as $value) {
			$table[$i]['table_details'] = $this->get_table_order($value['tableid']);
			$sum = $this->get_table_total_customer($value['tableid']);
			$table[$i]['sum'] =  $sum->total;
			$i++;
		}

		return $table;
	}

	public function get_table_total_bytableid($tableid)
	{
		$where = "table_details.delete_at = 0 AND table_details.created_at= '" . date('Y-m-d') . "'";
		$this->db->select('rest_table.*,tbl_tablefloor.*');
		$this->db->from('rest_table');
		$this->db->join('tbl_tablefloor', 'tbl_tablefloor.tbfloorid=rest_table.floor', 'left');
		$this->db->where('rest_table.tableid', $tableid);
		$query = $this->db->get();
		// $str = $this->db->last_query();
		// echo $str;
		// exit;
		$table = $query->result_array();
		$i = 0;
		foreach ($table as $value) {
			$table[$i]['table_details'] = $this->get_table_order($tableid);
			$sum = $this->get_table_total_customer($tableid);
			$table[$i]['sum'] =  $sum->total;
			$i++;
		}
		return $table;
	}

	public function checkingredientstock($foodid, $vid, $foodqty)
	{
		$checksetitem = $this->db->select('ProductsID,isgroup', 'is_bom')->from('item_foods')->where('ProductsID', $foodid)->where('isgroup', 1)->get()->row();
		$isavailable = true;
		if (!empty($checksetitem)) {
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
						return 'Please set Ingredients!!first!!!' . $groupitem->items;
						break;
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
								return 'Please check Ingredients!!Some Ingredients are not Available!!!' . $groupitem->items;
							}
							/*end add ingredients*/
						}
					}
				}
			}
			return 1;
		} else {
			$this->db->select('*');
			$this->db->from('production_details');
			$this->db->where('foodid', $foodid);
			$this->db->where('pvarientid', $vid);
			$productiondetails = $this->db->get()->result();
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
					return 'Please check Ingredients!!Some Ingredients are not Available!!!';
				}


				/*end add ingredients*/
			}
		} else {
			if ($checksetitem->is_bom == 1) {
				return 'Please set Ingredients!!first!!!';
			} else {
				return 1;
			}
		}
		return 1;
	}

	#check productiondetails
	public function checkproductiondetails($foodid, $fvid, $foodqty)
	{
		$checksetitem = $this->db->select('ProductsID,isgroup')->from('item_foods')->where('ProductsID', $foodid)->where('isgroup', 1)->get()->row();
		if (!empty($checksetitem)) {
			$groupitemlist = $this->db->select('items,varientid,item_qty')->from('tbl_groupitems')->where('gitemid', $checksetitem->ProductsID)->get()->result();
			foreach ($groupitemlist as $groupitem) {
				$this->db->select('*');
				$this->db->from('production_details');
				$this->db->where('foodid', $groupitem->items);
				$this->db->where('pvarientid', $groupitem->varientid);
				$productiondetails = $this->db->get()->result();
				foreach ($productiondetails as $productiondetail) {
					$r_stock = $productiondetail->qty * ($foodqty * $groupitem->item_qty);
					/*add stock in ingredients*/
					// $this->db->set('stock_qty', 'stock_qty-' . $r_stock, FALSE);
					// $this->db->where('id', $productiondetail->ingredientid);
					// $this->db->update('ingredients');
					/*end add ingredients*/
				}
			}
		} else {
			$this->db->select('*');
			$this->db->from('production_details');
			$this->db->where('foodid', $foodid);
			$this->db->where('pvarientid', $fvid);
			$productiondetails = $this->db->get()->result();
			foreach ($productiondetails as $productiondetail) {
				$r_stock = $productiondetail->qty * $foodqty;
				/*add stock in ingredients*/
				// $this->db->set('stock_qty', 'stock_qty-' . $r_stock, FALSE);
				// $this->db->where('id', $productiondetail->ingredientid);
				// $this->db->update('ingredients');
				/*end add ingredients*/
			}
		}
	}
	#insert prodouction 
	public function insert_product($foodid, $vid, $foodqty)
	{
		$saveid = $this->session->userdata('id');
		$p_id = $foodid;
		$newdate = date('Y-m-d');
		$exdate = date('Y-m-d');
		$data = array(
			'itemid'				  =>	$foodid,
			'itemvid'				  =>	$vid,
			'itemquantity'			  =>	$foodqty,
			'savedby'	     		  =>	$saveid,
			'saveddate'	              =>	$newdate,
			'productionexpiredate'	  =>	$exdate
		);
		$this->checkproductiondetails($foodid, $vid, $foodqty);
		$this->db->insert('production', $data);

		$returnid = $this->db->insert_id();
		return true;
	}
	public function updateSuborderData($rowid)
	{
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where('order_menu.row_id', $rowid);

		$query = $this->db->get();
		$orderinfo = $query->row();
		return $orderinfo;
	}
	public function updateSuborderDatalist($rowidarray)
	{
		$this->db->select('order_menu.*,item_foods.*,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where_in('order_menu.row_id', $rowidarray);

		$query = $this->db->get();
		$orderinfo = $query->result();

		return $orderinfo;
	}
	public function showsplitorderlist($order)
	{
		$this->db->select('sub_order.*,customer_info.customer_name');
		$this->db->from('sub_order');
		$this->db->join('customer_info', 'sub_order.customer_id=customer_info.customer_id', 'left');

		$this->db->where('sub_order.order_id', $order);

		$query = $this->db->get();
		$orderinfo = $query->result();
		return $orderinfo;
	}
	public function createcounter($data = array())
	{
		return $this->db->insert('tbl_cashcounter', $data);
	}
	public function updatecounter($data = array())
	{
		return $this->db->where('ccid', $data["ccid"])->update('tbl_cashcounter', $data);
	}
	public function deletecounter($id = null)
	{
		$this->db->where('ccid', $id)
			->delete('tbl_cashcounter');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function addopeningcash($data = array())
	{
		return $this->db->insert('tbl_cashregister', $data);
	}
	public function closeresister($data = array())
	{
		return $this->db->where('id', $data["id"])->update('tbl_cashregister', $data);
	}
	public function collectcash($id, $tdate)
	{
		$crdate = date('Y-m-d H:i:s');
		$where = "bill.create_at Between '$tdate' AND '$crdate'";
		$this->db->select('bill.*,multipay_bill.payment_type_id,SUM(multipay_bill.amount) as totalamount,payment_method.payment_method');
		$this->db->from('multipay_bill');
		$this->db->join('bill', 'bill.order_id=multipay_bill.order_id', 'left');
		$this->db->join('payment_method', 'payment_method.payment_method_id=multipay_bill.payment_type_id', 'left');
		$this->db->where('bill.create_by', $id);
		$this->db->where($where);
		$this->db->where('bill.bill_status', 1);
		$this->db->group_by('multipay_bill.payment_type_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}

	public function changecash($id, $tdate)
	{
		$crdate = date('Y-m-d H:i:s');
		$where = "bill.create_at Between '$tdate' AND '$crdate'";
		$this->db->select('bill.*,SUM(customer_order.totalamount) as totalexchange');
		$this->db->from('customer_order');
		$this->db->join('bill', 'bill.order_id=customer_order.order_id', 'left');
		$this->db->where('bill.create_by', $id);
		$this->db->where($where);
		$this->db->where('bill.bill_status', 1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $changetotal = $query->row();
	}
	public function billsummery($id, $tdate, $crdate)
	{
		$where = "bill.create_at Between '$tdate' AND '$crdate'";
		$this->db->select('SUM(bill.total_amount) as nitamount, SUM(bill.discount) as discount, SUM(bill.service_charge) as service_charge, SUM(bill.VAT) as VAT,SUM(bill.bill_amount) as bill_amount');
		$this->db->from('bill');
		$this->db->where('bill.create_by', $id);
		$this->db->where($where);
		$this->db->where('bill.bill_status', 1);
		$query = $this->db->get();
		return $billinfo = $query->row();
	}
	public function collectcashsummery($id, $tdate, $crdate)
	{
		$where = "bill.create_at Between '$tdate' AND '$crdate'";
		$this->db->select('bill.*,multipay_bill.payment_type_id,SUM(multipay_bill.amount) as totalamount,payment_method.payment_method');
		$this->db->from('multipay_bill');
		$this->db->join('bill', 'bill.order_id=multipay_bill.order_id', 'left');
		$this->db->join('payment_method', 'payment_method.payment_method_id=multipay_bill.payment_type_id', 'left');
		$this->db->where('bill.create_by', $id);
		$this->db->where($where);
		$this->db->where('bill.bill_status', 1);
		$this->db->group_by('multipay_bill.payment_type_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}
	public function changecashsummery($id, $tdate, $crdate)
	{
		$where = "bill.create_at Between '$tdate' AND '$crdate'";
		$this->db->select('bill.*,SUM(customer_order.totalamount) as totalexchange');
		$this->db->from('customer_order');
		$this->db->join('bill', 'bill.order_id=customer_order.order_id', 'left');
		$this->db->where('bill.create_by', $id);
		$this->db->where($where);
		$this->db->where('bill.bill_status', 1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $changetotal = $query->row();
	}
	public function summeryiteminfo($id, $tdate)
	{
		$crdate = date('Y-m-d H:i:s');
		$where = "create_at Between '$tdate' AND '$crdate'";
		$this->db->select('bill.order_id');
		$this->db->from('bill');
		$this->db->where('create_by', $id);
		$this->db->where($where);
		$this->db->where('bill_status', 1);
		$query = $this->db->get();
		$changetotal = $query->result();
		return $changetotal;
	}
	public function closingiteminfo($order_ids)
	{
		$this->db->select('order_menu.*,SUM(order_menu.menuqty) as totalqty,SUM(order_menu.price*order_menu.menuqty) as fprice,item_foods.*,variant.variantName,variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id=item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid=variant.variantid', 'left');
		$this->db->where_in('order_menu.order_id', $order_ids);
		$this->db->group_by('order_menu.menu_id');
		$this->db->group_by('order_menu.varientid');
		$query = $this->db->get();
		$orderinfo = $query->result();
		//echo $this->db->last_query();
		return $orderinfo;
	}
	public function closingaddons($order_ids)
	{
		$newids = "'" . implode("','", $order_ids) . "'";
		$condition = "order_menu.order_id IN($newids) ";
		$sql = "SELECT * FROM order_menu WHERE {$condition} AND order_menu.add_on_id!=''";

		$query = $this->db->query($sql);
		$orderinfo = $query->result();
		return $orderinfo;
	}
	public function allpayments($orderid)
	{
		$this->db->select('bill.*,multipay_bill.payment_type_id,multipay_bill.amount as paidamount,payment_method.payment_method');
		$this->db->from('multipay_bill');
		$this->db->join('bill', 'bill.order_id=multipay_bill.order_id', 'left');
		$this->db->join('payment_method', 'payment_method.payment_method_id=multipay_bill.payment_type_id', 'left');
		$this->db->where('bill.order_id', $orderid);
		$this->db->where('bill.bill_status', 1);
		$this->db->group_by('multipay_bill.payment_type_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}
	public function allsubpayments($orderid, $subid)
	{
		$this->db->select('bill.*,multipay_bill.payment_type_id,multipay_bill.amount as paidamount,payment_method.payment_method');
		$this->db->from('multipay_bill');
		$this->db->join('bill', 'bill.order_id=multipay_bill.order_id', 'left');
		$this->db->join('payment_method', 'payment_method.payment_method_id=multipay_bill.payment_type_id', 'left');
		$this->db->where('multipay_bill.order_id', $orderid);
		$this->db->where('multipay_bill.suborderid', $subid);
		$this->db->group_by('multipay_bill.payment_type_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}
	public function allmergepayments($mergeorderid)
	{
		$this->db->select('bill.*,multipay_bill.payment_type_id,multipay_bill.amount as paidamount,payment_method.payment_method');
		$this->db->from('multipay_bill');
		$this->db->join('bill', 'bill.order_id=multipay_bill.order_id', 'left');
		$this->db->join('payment_method', 'payment_method.payment_method_id=multipay_bill.payment_type_id', 'left');
		$this->db->where('multipay_bill.multipayid', $mergeorderid);
		$this->db->where('bill.bill_status', 1);
		$this->db->group_by('multipay_bill.payment_type_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}
	public function allcardpayments($orderid, $payid)
	{
		$this->db->select('bill_card_payment.*,tbl_bank.*');
		$this->db->from('bill_card_payment');
		$this->db->join('tbl_bank', 'tbl_bank.bankid=bill_card_payment.bank_name', 'left');
		$this->db->where('bill_card_payment.bill_id', $orderid);
		$this->db->group_by('bill_card_payment.bank_name');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}

	public function allmpayments($orderid, $payid)
	{
		$this->db->select('tbl_mobiletransaction.*,tbl_mobilepmethod.mobilePaymentname');
		$this->db->from('tbl_mobiletransaction');
		$this->db->join('tbl_mobilepmethod', 'tbl_mobilepmethod.mpid=tbl_mobiletransaction.mobilemethod', 'left');
		$this->db->where('tbl_mobiletransaction.bill_id', $orderid);
		$this->db->group_by('tbl_mobiletransaction.mobilemethod');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $orderdetails = $query->result();
	}


	/**
	 *  New Code Added for handle enchance current features
	 */

	/**
	 * Insert transaction record into the `itxn` table.
	 * 
	 * @param int $orderId Order ID from `order_menu`
	 */
	public function insert_itxn($orderId)
	{

		// Fetch order menu records for the given order ID
		$this->db->select('row_id, order_id, menu_id, menuqty, varientid, addonsqty');
		$this->db->where('order_id', $orderId);
		$orderMenuRecords = $this->db->get('order_menu')->result_array();

		foreach ($orderMenuRecords as $orderMenu) {
			$menuId = $orderMenu['menu_id'];
			$menuQty = $orderMenu['menuqty'];
			$menuVarientId =  $orderMenu['varientid'];
			$addonsQty = isset($orderMenu['addonsqty']) ? $orderMenu['addonsqty'] : 0;

			// Fetch production details for the given menu_id
			$this->db->select('pro_detailsid, foodid, pvarientid, ingredientid, qty');
			$this->db->where('foodid', $menuId);
			$this->db->where('pvarientid', $menuVarientId);

			$productionDetails = $this->db->get('production_details')->result_array();


			foreach ($productionDetails as $production) {
				$ingredientId = $production['ingredientid'];
				$usedQty = $production['qty'] * ($menuQty);

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
				$itxnData = [
					'order_id' => $orderId,
					'food_id' => $menuId,
					'pvarient_id' => $production['pvarientid'],
					'ingredient_id' => $ingredientId,
					'used_qty' => $usedQty,
					'used_sales_price' => $usedSalesPrice,
					'unit_id' => $unitId,
					'created_at' => date('Y-m-d')
				];
				// Insert record into `itxn` table
				$this->db->insert('itxn', $itxnData);

				// Step 5: Deduct used quantity from ingredients stock_qty
				$this->db->set('stock_qty', "GREATEST(stock_qty - {$usedQty}, 0)", false);
				$this->db->where('id', $ingredientId);
				$this->db->update('ingredients');
			}
		}
	}
	/**
	 * Get Reservation Detail 
	 */
	public function get_reservation()
	{
		$this->db->where('tblreservation.reserveday', date('Y-m-d'));
		$this->db->where_in('tblreservation.status', [1, 2]); // Use where_in for cleaner syntax
		$this->db->select('tblreservation.*,customer_info.*,rest_table.tablename,rest_table.person_capicity as tablecapacity');
        $this->db->from('tblreservation');
		$this->db->join('customer_info','customer_info.customer_id = tblreservation.cid','left');
		$this->db->join('rest_table','rest_table.tableid = tblreservation.tableid','left');
        $this->db->order_by('reserveid', 'desc');
        $query = $this->db->get();
		// echo $this->db->last_query();
		// exit;
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}

	public function get_reservationbytable($tableid)
	{
	    $this->db->where('reserveday', date('Y-m-d'));
		$this->db->where('tblreservation.tableid', $tableid);
		$this->db->select('tblreservation.*,customer_info.*,rest_table.tablename,rest_table.person_capicity as tablecapacity');
        $this->db->from('tblreservation');
		$this->db->join('customer_info','customer_info.customer_id = tblreservation.cid','left');
		$this->db->join('rest_table','rest_table.tableid = tblreservation.tableid','left');
        $this->db->order_by('reserveid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findByReservationId($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('reserveid',$id) 
			->get()
			->row();
	}
	public function findByCusId($id = null)
	{ 
		return $this->db->select("*")->from('customer_info')
			->where('customer_id',$id) 
			->get()
			->row();
	}

	 // 1. Check if a customer order exists within reservation time range
	 public function check_order_exists() {
        $this->db->select('r.reserveid');
        $this->db->from('tblreservation r');
        $this->db->join('customer_order o', 'r.tableid = o.table_no AND r.reserveday = o.order_date');
        $this->db->where('o.order_time >= r.formtime');
        //$this->db->where('o.order_time <= r.totime');
		$this->db->where('r.reserveday', date('Y-m-d'));
		$this->db->where('r.status!=', 3);
        $query = $this->db->get();

		// Print the SQL query
		// echo $this->db->last_query();
		// exit;

        if ($query->num_rows() > 0) {
            // Order found, update status to 3 (complete)
            //$reserveIds = array_column($query->result_array(), 'reserveid');
            //$this->db->where_in('reserveid', $reserveIds);
			$reserveIds = array_column($query->result_array(), 'reserveid');
	
			if (count($reserveIds) === 1) {
				// Single value: Use where()
				$this->db->where('reserveid', $reserveIds[0]);
			} else {
				// Multiple values: Use where_in()
				$this->db->where_in('reserveid', $reserveIds);
			}
            $this->db->update('tblreservation', ['status' => 3]);
            return 'Order exists - Reservation status updated to complete (3)';
        }
        return false;
    }

    // 2. Check expired reservations based on current time
    public function update_expired_reservations() {
		$currentTime = date('H:i:s', strtotime('+10 minutes')); // Current time + 10 minutes
		$currentDate = date('Y-m-d');
	
		$this->db->select('reserveid');
		$this->db->from('tblreservation');
		$this->db->where('reserveday', $currentDate);
		$this->db->where('formtime <', $currentTime);
		$this->db->where('status !=', 3); // Exclude completed reservations
		$query = $this->db->get();

		// Print the SQL query
		// echo $this->db->last_query();
		// exit;
	
		if ($query->num_rows() > 0) {
			$reserveIds = array_column($query->result_array(), 'reserveid');
	
			if (count($reserveIds) === 1) {
				// Single value: Use where()
				$this->db->where('reserveid', $reserveIds[0]);
			} else {
				// Multiple values: Use where_in()
				$this->db->where_in('reserveid', $reserveIds);
			}
	
			$this->db->update('tblreservation', ['status' => 4]);
			return 'Expired reservations updated to status 4';
		}
	
		return false;
	}

	public function is_user_waiter($user_id)
	{
		return $this->db
					->where('fk_user_id', $user_id)
					->where('fk_role_id', 3)
					->get('sec_user_access_tbl')
					->num_rows() > 0;
	}

	public function get_unseen_kitchen_orders($waiter_id)
	{
		$cdate = date("Y-m-d", strtotime("-1 day"));
		$today = date("Y-m-d");

		$this->db->select('customer_order.*, customer_info.customer_name, customer_type.customer_type, employee_history.first_name, employee_history.last_name, rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info', 'customer_order.customer_id = customer_info.customer_id', 'left');
		$this->db->join('customer_type', 'customer_order.cutomertype = customer_type.customer_type_id', 'left');
		$this->db->join('employee_history', 'customer_order.waiter_id = employee_history.emp_id', 'left');
		$this->db->join('rest_table', 'customer_order.table_no = rest_table.tableid', 'left');
		//$this->db->where('customer_order.order_date BETWEEN', $cdate, $today);
		$this->db->where('customer_order.order_date', $today);
		$this->db->where('customer_order.order_status', 3);
		$this->db->where('customer_order.nofification', 0);
		$this->db->where('customer_order.waiter_id', $waiter_id);
		$this->db->order_by('customer_order.order_id', 'ASC');
		return $this->db->get()->result();
	}

	public function get_order_details($order_id)
	{
		$this->db->select('order_menu.*, item_foods.ProductName, variant.variantName, variant.price');
		$this->db->from('order_menu');
		$this->db->join('item_foods', 'order_menu.menu_id = item_foods.ProductsID', 'left');
		$this->db->join('variant', 'order_menu.varientid = variant.variantid', 'left');
		$this->db->where('order_menu.order_id', $order_id);
		return $this->db->get()->result();
	}

}
