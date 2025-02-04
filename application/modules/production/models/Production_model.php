<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Production_model extends CI_Model
{

	private $table = 'production_details';

	public function create()
	{
		$saveid = $this->session->userdata('id');
		$p_id = $this->input->post('product_id');
		$purchase_date = str_replace('/', '-', $this->input->post('production_date', true));
		$newdate = date('Y-m-d', strtotime($purchase_date));
		$expire_date = str_replace('/', '-', $this->input->post('expire_date'));
		$exdate = date('Y-m-d', strtotime($expire_date));
		$foodid = $this->input->post('foodid');
		$fvid = $this->input->post('foodvarientid');
		$foodqty = $this->input->post('pro_qty');
		$data = array(
			'itemid'				  =>	$this->input->post('foodid'),
			'itemvid'				  =>	$this->input->post('foodvarientid'),
			'itemquantity'			  =>	$this->input->post('pro_qty', true),
			'savedby'	     		  =>	$saveid,
			'saveddate'	              =>	$newdate,
			'productionexpiredate'	  =>	$exdate
		);
		$this->checkproductiondetails($foodid, $fvid, $foodqty);
		$this->db->insert('production', $data);

		$returnid = $this->db->insert_id();
		return true;
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
					$this->db->set('stock_qty', 'stock_qty-' . $r_stock, FALSE);
					$this->db->where('id', $productiondetail->ingredientid);
					$this->db->update('ingredients');
					/*end add ingredients*/
					//Add in Itxn table
					$this->insert_itxn($productiondetail, $r_stock);
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
				$this->db->set('stock_qty', 'stock_qty-' . $r_stock, FALSE);
				$this->db->where('id', $productiondetail->ingredientid);
				$this->db->update('ingredients');
				/*end add ingredients*/
				//Add in Itxn table
				$this->insert_itxn($productiondetail, $r_stock);
			}
		}
	}

	public function delete($id = null)
	{
		$this->db->where('purID', $id)
			->delete($this->table);

		$this->db->where('purchaseid', $id)
			->delete('purchase_details');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteitem($id = null, $qid = null)
	{
		$this->db->select('menu_id');
		$this->db->from('order_menu');
		$this->db->where('menu_id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {

			$this->db->where('pro_detailsid', $qid)->delete($this->table);
			if ($this->db->affected_rows()) {
				return true;
			} else {
				return false;
			}
		}
	}


	/*change it*/
	public function update()
	{
		$saveid = $this->session->userdata('id');
		$updateid =  $this->input->post('itemid');
		$p_id = $this->input->post('product_id');
		$itemid = $this->input->post('foodid');
		$itemvarient = $this->input->post('foodvarientid');
		$quantity = $this->input->post('product_quantity', true);
		$newdate = date('Y-m-d');


		$this->db->where('foodid', $itemid)->where('pvarientid', $itemvarient)->delete('production_details');

		for ($i = 0, $n = count($p_id); $i < $n; $i++) {
			$product_quantity = $quantity[$i];
			$product_id = $p_id[$i];
			$data1 = array(
				'foodid'		    =>	$itemid,
				'pvarientid'		=>	$itemvarient,
				'ingredientid'		=>	$product_id,
				'qty'				=>	$product_quantity,
				'createdby'			=>	$saveid,
				'created_date'		=>	$newdate
			);

			if (!empty($quantity)) {
				$this->db->insert('production_details', $data1);
			}
		}
	}


	public function makeproduction()
	{
		$saveid = $this->session->userdata('id');
		$p_id = $this->input->post('product_id');
		$itemid = $this->input->post('foodid');
		$itemvarient = $this->input->post('foodvarientid');
		$quantity = $this->input->post('product_quantity', true);
		$unitid =  $this->input->post('unitid');
		$unitname =  $this->input->post('unitname');
		$newdate = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('production_details');
		$this->db->where('foodid', $itemid);
		$this->db->where('pvarientid', $itemvarient);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		} else {
			for ($i = 0, $n = count($p_id); $i < $n; $i++) {
				$product_quantity = $quantity[$i];
				$product_id = $p_id[$i];
				$ingredientUnit_id =  $unitid[$i];
				$ingredientUnit_name =  $unitname[$i];

				$data1 = array(
					'foodid'		    =>	$itemid,
					'pvarientid'		=>	$itemvarient,
					'ingredientid'		=>	$product_id,
					'qty'				=>	$product_quantity,
					'unitid'			=>	$ingredientUnit_id,
					'unitname'			=>	$ingredientUnit_name,
					'createdby'			=>	$saveid,
					'created_date'		=>	$newdate
				);

				if (!empty($quantity)) {
					$this->db->insert('production_details', $data1);
				}
			}
			if (empty($quantity)) {
				return false;
			}
			return true;
		}
	}
	/*work on older methods*/
	public function read($limit = null, $start = null)
	{
		$this->db->select('production_details.foodid,production_details.pvarientid,item_foods.ProductName,item_foods.cusine_type,item_foods.is_bom,variant.variantName,variant.variantid');
		$this->db->from('production_details');
		$this->db->join('item_foods', 'item_foods.ProductsID = production_details.foodid', 'left');
		$this->db->join('variant', 'variant.variantid = production_details.pvarientid', 'left');
		$this->db->group_by('production_details.pvarientid');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$data = $this->totalcal($query->result());
			return $data;
		}
		return false;
	}

	public function readset($id, $vid)
	{
		$this->db->select('production_details.foodid,item_foods.ProductName,item_foods.cusine_type,item_foods.is_bom,variant.variantName,variant.variantid');
		$this->db->from('production_details');
		$this->db->join('item_foods', 'item_foods.ProductsID = production_details.foodid', 'left');
		$this->db->join('variant', 'variant.variantid = production_details.pvarientid', 'left');
		$this->db->where('production_details.foodid', $id);
		$this->db->where('production_details.pvarientid', $vid);
		$this->db->group_by('production_details.pvarientid');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}

	public function findById($id = null, $vid = null)
	{
		return $this->db->select("*")->from('production_details')
			->where('foodid', $id)
			->where('pvarientid', $vid)
			->get()
			->row();
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
	/*new change*/
	public function finditem($product_name)
	{
		$this->db->select('ingredients.*,SUM(purchase_details.quantity) as uquantity,SUM(purchase_details.totalprice) as utotalprice');
		$this->db->from('ingredients');
		$this->db->join('purchase_details', 'purchase_details.indredientid = ingredients.id', 'inner');
		$this->db->where('ingredients.is_active', 1);
		$this->db->like('ingredients.ingredient_name', $product_name);
		$this->db->group_by('ingredients.id');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function foodvarientlist($id = null)
	{
		$this->db->select('*');
		$this->db->from('variant');
		$this->db->where('menuid', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = $query->result();
			return $data;
		}
		return false;
	}

	public function findByvId($id = null)
	{
		$data = $this->db->select("*")
			->from('variant')
			->where('menuid', $id)
			->get()
			->result();
		$list[''] = 'Select ' . display('varient_name');
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->variantid] = $value->variantName;
			return $list;
		} else {
			return false;
		}
	}
	public function get_total_product($product_id)
	{
		$this->db->select('SUM(quantity) as total_purchase');
		$this->db->from('purchase_details');
		$this->db->where('indredientid', $product_id);
		$total_purchase = $this->db->get()->row();

		$this->db->select('SUM(qty) as total_ingredient');
		$this->db->from('production_details');
		$this->db->where('ingredientid', $product_id);
		$used_ingredient = $this->db->get()->row();
		$available_quantity = ($total_purchase->total_purchase - $used_ingredient->total_ingredient);

		$data2 = array(
			'total_purchase'  => $available_quantity
		);


		return $data2;
	}
	#new metho for cal total
	public function totalcal($values)
	{
		$i = 0;
		$data = array();
		foreach ($values as $value) {
			# code...
			$toalvalue = 0;
			$totalvalucals = $this->iteminfo($value->foodid, $value->pvarientid);
			foreach ($totalvalucals as $totalvalucal) {
				# code...
				$toalvalue = $totalvalucal->uprice * $totalvalucal->qty + $toalvalue;
			}
			$values[$i]->totalcost = $toalvalue;
			$i++;
		}
		return $values;
	}
	public function ingrediantlist()
	{
		$data = $this->db->select("*")->from('ingredients')->where('is_active', 1)->get()->result();
		//echo $this->db->last_query();
		return $data;
	}
	//item Dropdown*/
	/*work on older methods*/
	public function iteminfo($id, $vid = null)
	{
		$this->db->select('production_details.*,ingredients.id,ingredients.ingredient_name,unit_of_measurement.uom_short_code');
		$this->db->from('production_details');
		$this->db->join('ingredients', 'production_details.ingredientid=ingredients.id', 'left');
		$this->db->join('unit_of_measurement', 'unit_of_measurement.id = ingredients.uom_id', 'inner');

		$this->db->where('foodid', $id);
		if (!empty($vid)) {
			$this->db->where('pvarientid', $vid);
		}
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$results = $query->result();

			$i = 0;
			foreach ($results as $result) {

				$this->db->select('SUM(purchase_details.totalprice)/SUM(purchase_details.quantity) as uprice');
				$this->db->from('purchase_details');
				$this->db->where('indredientid', $result->ingredientid);
				$value = $this->db->get()->row();
				$results[$i]->uprice = $value->uprice;
				$i++;
			}
			return $results;
		}
		return false;
	}
	public function item_dropdown()
	{
		$data = $this->db->select("*")
			->from('item_foods')
			->where('is_bom', 1)
			->get()
			->result();

		$list[''] = 'Select ' . display('item_name');
		if (!empty($data)) {
			foreach ($data as $value)
				//$list[$value->ProductsID] = $value->ProductName;
				$list[$value->ProductsID] = $value->ProductName . ' (' . getCusineTypeName($value->cusine_type) . ')';
			return $list;
		} else {
			return false;
		}
	}
	//ingredient Dropdown
	public function ingrediant_dropdown()
	{
		$data = $this->db->select("*")
			->from('ingredients')
			->where('is_active', 1)
			->get()
			->result();

		$list[''] = 'Select ' . display('item_name');
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->id] = $value->ingredient_name;
			return $list;
		} else {
			return false;
		}
	}
	//item Dropdown
	public function supplier_dropdown()
	{
		$data = $this->db->select("*")
			->from('supplier')
			->get()
			->result();

		$list[''] = 'Select ' . display('supplier_name');
		if (!empty($data)) {
			foreach ($data as $value)
				$list[$value->supid] = $value->supName;
			return $list;
		} else {
			return false;
		}
	}
	public function suplierinfo($id)
	{
		return $this->db->select("*")->from('supplier')
			->where('supid', $id)
			->get()
			->row();
	}
	public function countlist()
	{

		$this->db->select('production_details.foodid,item_foods.ProductName');
		$this->db->from('production_details');
		$this->db->join('item_foods', 'item_foods.ProductsID = production_details.foodid', 'Inner');
		$this->db->group_by('production_details.foodid');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}
		return false;
	}
	#check stock
	public function checkingredientstock($foodid, $vid, $foodqty)
	{
		$this->db->select("a.*,SUM(a.itemquantity) as totalqty, b.ProductsID, b.ProductName");
		$this->db->from('production a');
		$this->db->join('item_foods b','b.ProductsID = a.itemid','left');
		$this->db->where('b.ProductsID', $foodid);
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

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		// echo "<br />";
		// echo "productName: ".$productName."<br />";
		// echo "in_Qnty: ".$in_Qnty."<br />";
		// echo "out_Qnty: ".$out_Qnty."<br />";
		// echo "stock: ".$stock;
		// exit;

		// if ($stock <= 0) {
		// 	return 'Insufficient Stock !!!';
		// 	// break;
		// } else {

		// }

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
	public function checkingredientstockOrder($foodid, $vid, $foodqty)
	{
		$this->db->select("a.*,SUM(a.itemquantity) as totalqty, b.ProductsID, b.ProductName");
		$this->db->from('production a');
		$this->db->join('item_foods b','b.ProductsID = a.itemid','left');
		$this->db->where('b.ProductsID', $foodid);
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

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		// echo "<br />";
		// echo "productName: ".$productName."<br />";
		// echo "in_Qnty: ".$in_Qnty."<br />";
		// echo "out_Qnty: ".$out_Qnty."<br />";
		// echo "stock: ".$stock;
		// exit;

		if ($stock <= 0) {
			return 'Insufficient Stock !!!';
			// break;
		} else {
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
	}
	public function checkmeterials($foodid, $qty)
	{
		$this->db->select('SUM(itemquantity) as producequantity');
		$this->db->from('production');
		$this->db->where('itemid', $foodid);
		$query2 = $this->db->get();

		if ($query2->num_rows() > 0) {
			$proqty1 = $query2->row();
			$proqty = $proqty1->producequantity;
		} else {
			$proqty = 0;
		}
		$this->db->select('foodid,ingredientid,qty');
		$this->db->from('production_details');
		$this->db->where('foodid', $foodid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$alingredient = $query->result();
			$isavailable = '';
			foreach ($alingredient as $single) {
				$inqty = $single->qty;
				$ingredientid = $single->ingredientid;
				$nitqty = $inqty * $qty;
				$isavailable2 = $this->checkingredient($nitqty, $ingredientid, $foodid, $proqty);
				$isavailable .= $isavailable2 . ',';
			}
			if (strpos($isavailable, '0') !== false) {
				echo "0";
			} else {
				echo 1;
			}
		}
	}
	public function checkingredient($nitqty, $ingredientid, $foodid, $proqty)
	{
		$this->db->select('SUM(purchase_details.quantity) as totalquantity,ingredients.id,ingredients.ingredient_name');
		$this->db->from('purchase_details');
		$this->db->join('ingredients', 'purchase_details.indredientid=ingredients.id', 'left');
		$this->db->where('purchase_details.indredientid', $ingredientid);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$purchaseqty = $row->totalquantity;
			$foodwise = $this->db->select("production_details.foodid,production_details.ingredientid,production_details.qty,SUM(production.itemquantity*production_details.qty) as foodqty")->from('production_details')->join('production', 'production.itemid=production_details.foodid', 'Left')->where('production_details.ingredientid', $ingredientid)->group_by('production_details.foodid')->get()->result();
			$lastqty = 0;
			foreach ($foodwise as $gettotal) {
				$lastqty = $lastqty + $gettotal->foodqty;
			}
			$restqty = $purchaseqty - $lastqty;
			if ($restqty >= $nitqty) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	/**
	 *  New Code Added for handle enchance current features
	 */

	/**
	 * Insert transaction record into the `itxn` table and update ingredient stock.
	 * 
	 * @param array|object $prod_dtls Production details as an object or array.
	 * @param float $usedQty Quantity used in the transaction.
	 * @param float $usedSalesPrice Sales price associated with the used quantity.
	 */
	public function insert_itxn($prod_dtls, $usedQty)
	{
		// Ensure $prod_dtls is an array
		if (is_object($prod_dtls)) {
			$prod_dtls = (array) $prod_dtls;
		}

		if (!isset($prod_dtls['ingredientid']) || empty($usedQty)) {
			log_message('error', 'Invalid product details or used quantity.');
			return false;
		}

		$ingredientId = $prod_dtls['ingredientid'];
		$orderId = isset($prod_dtls['order_id']) ? $prod_dtls['order_id'] : null;

		// Prepare data for insertion into `itxn`
		$itxnData = [
			'food_id' => $prod_dtls['foodid'],
			'pvarient_id' => $prod_dtls['pvarientid'],
			'ingredient_id' => $ingredientId,
			'used_qty' => $usedQty,
			'unit_id' => $prod_dtls['unitid'],
			'production_dtl_id' => $prod_dtls['pro_detailsid'],
			'created_at' => date('Y-m-d H:i:s')
		];

		// Insert record into `itxn` table
		if (!$this->db->insert('itxn', $itxnData)) {
			log_message('error', 'Failed to insert transaction record into itxn table.');
			return false;
		}

		if ($this->db->affected_rows() == 0) {
			log_message('error', 'Failed to update ingredient stock quantity.');
		}

		return true;
	}
}
