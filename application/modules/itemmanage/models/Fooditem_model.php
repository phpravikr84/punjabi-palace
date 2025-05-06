<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fooditem_model extends CI_Model {
	private $table = 'item_foods';

	public function fooditem_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function groupfood_create($data = array())
	{
		$this->db->insert($this->table, $data);
		// $insert_id = $this->db->insert_id();
		// $item_id = $this->input->post('itemid',true);
		// $varientid = $this->input->post('varientid',true);
		// $qty = $this->input->post('qty',true);
		// $price = $this->input->post('price',true);
		// if(!empty($qty)){
		// 			$data2 = array(
		// 				'menuid'		=>	$insert_id,
		// 				'variantName'	=>	"Set",
		// 				'price'		    =>	$price,						
		// 				);
		// 			$this->db->select('menuid');
		// 			$this->db->from('variant');
		// 			$this->db->where('menuid',$insert_id);
		// 			$query = $this->db->get();
		// 			$getrow=$query->row();
		// 			if(empty($getrow)) {
        //     			$this->db->insert('variant', $data2);
        // 			}
		// 		}
		// for ($i=0, $n=count($item_id); $i < $n; $i++) {
		// 		$data1 = array(
		// 		'gitemid'		=>	$insert_id,
		// 		'items'			=>	$item_id[$i],
		// 		'item_qty'		=>	$qty[$i],
		// 		'varientid'		=>	$varientid[$i],
		// 		'status'		=>	1
		// 		);
		// 		if(!empty($qty)){
		// 			$this->db->insert('tbl_groupitems', $data1);
		// 		}
		// 	}
		// if(!empty($insert_id)){
		// 	return true;
		// }
		// else{
		// 	return false;
		// }
		// return $this->db->affected_rows() > 0;
		return true;
	}
	public function addsupplier($data = array())
	{
		return $this->db->insert('supplier', $data);
	}
   
	public function fooditem_delete($id = null)
	{
		$this->db->where('ProductsID',$id)->delete($this->table);

		if ($this->db->affected_rows()) {
			$this->db->where('menuid',$id)->delete('variant');
			$this->db->where('menu_id',$id)->delete('menu_add_on');
			return true;
		} else {
			return false;
		}
	} 

	public function update_fooditem($data = array())
	{
		return $this->db->where('ProductsID',$data["ProductsID"])
			->update($this->table, $data);
	}
	
	public function update_groupfooditem($data = array())
	{
		$this->db->where('ProductsID',$data["ProductsID"])->update($this->table, $data);
		// $item_id = $this->input->post('itemid',true);
		// $varientid = $this->input->post('varientid',true);
		// $qty = $this->input->post('qty',true);
		// $price = $this->input->post('price',true);
		// if(!empty($qty)){
		// 	$data2 = array(
		// 		'menuid'		=>	$data["ProductsID"],
		// 		'variantName'	=>	"Set",
		// 		'price'		    =>	$price,						
		// 		);
		// 	$data3 = array(
		// 	'price'		    =>	$price					
		// 	);
		// 	$this->db->select('menuid');
		// 	$this->db->from('variant');
		// 	$this->db->where('menuid',$data["ProductsID"]);
		// 	$query = $this->db->get();
		// 	$getrow=$query->row();
		// 	if(empty($getrow)) {
		// 		$this->db->insert('variant', $data2);
		// 	}else{
		// 		$this->db->where('menuid',$data["ProductsID"])->where('variantName','set')->update('variant', $data3);
		// 	}
		// }
		// $this->db->where('gitemid',$data["ProductsID"])->delete('tbl_groupitems');
		// for ($i=0, $n=count($item_id); $i < $n; $i++) {
		// 	$data1 = array(
		// 	'gitemid'		=>	$data["ProductsID"],
		// 	'items'			=>	$item_id[$i],
		// 	'item_qty'		=>	$qty[$i],
		// 	'varientid'		=>	$varientid[$i],
		// 	'status'		=>	1
		// 	);
		// 	if(!empty($qty)){
		// 			$this->db->insert('tbl_groupitems', $data1);
		// 		}
		// }
		// return $this->db->affected_rows() > 0;
		return true;
	}

    public function read_fooditem($limit = null, $start = null)
	{
	    $this->db->select('item_foods.*,item_category.Name');
        $this->db->from($this->table);
		$this->db->join('item_category','item_foods.CategoryID = item_category.CategoryID','left');
        $this->db->order_by('ProductsID', 'desc');
   
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('ProductsID',$id) 
			->get()
			->row();
	}
	public function findBygroupId($id = null)
	{ 
		$this->db->select('variant.*,item_foods.*');
        $this->db->from($this->table);
		$this->db->join('variant','variant.menuid = item_foods.ProductsID','left');
		$this->db->where('item_foods.ProductsID',$id);
        $query = $this->db->get();
		$foodItem = $query->row_array();
		// Fetch modifiers with left join to modifier_groups
		$modifiers = $this->db->select("menu_add_on.row_id, menu_add_on.menu_id, menu_add_on.add_on_id, menu_add_on.modifier_groupid, menu_add_on.min, menu_add_on.max, menu_add_on.isreq, menu_add_on.sortby, menu_add_on.is_active, modifier_groups.name")
			->from("menu_add_on")
			->join("modifier_groups", "menu_add_on.modifier_groupid = modifier_groups.id", "left")
			->where("menu_add_on.menu_id", $id)
			->get()
			->result();
		$foodItem['modifiers'] = !empty($modifiers) ? $modifiers : [];
		return $foodItem;
	}  
	public function findMainModifiers($id = null)
	{
		$this->db->select('promotion_main_modifiers.*');
        $this->db->from('promotion_main_modifiers');
		$this->db->where('promotion_main_modifiers.ProductsID',$id);
        $query = $this->db->get();
		return $query->row();
	}
	public function findOtherModifiers($id = null)
	{
		$this->db->select('promotion_other_modifiers.*');
        $this->db->from('promotion_other_modifiers');
		$this->db->where('promotion_other_modifiers.ProductsID',$id);
        $query = $this->db->get();
		return $query->row();
	}
 	public function allgroupitem($id = null)
	{ 
		$this->db->select('*');
        $this->db->from('tbl_groupitems');
		$this->db->where('gitemid',$id);
        $query = $this->db->get();
	
		return $query->result();
	} 
// Category Dropdown
	public function category_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = display('category_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->CategoryID] = $value->Name;
			return $list;
		} else {
			return false; 
		}
	}
// Parent Category Dropdown
	public function parentcategory_dropdown($parent = null)
	{
		return $this->db->select("*")
			->from('item_category')
			->where('parentid',$parent) 
			->get()
			->result();

		
	}

 public function fooditem_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = 'Select '.display('item_name');
		if (!empty($data)) {
			foreach($data as $value)
				//$list[$value->ProductsID] = $value->ProductName . ' ('. getCusineTypeName($value->cusine_type) .')';
				$list[$value->ProductsID] = [
					'title' => $value->ProductName . ' (' . getCusineTypeName($value->cusine_type) . ')',
					'cusine_type' => $value->cusine_type
				];
			return $list;
		} else {
			return false; 
		}
	}

public function count_fooditem()
	{
		$this->db->select('item_foods.*,item_category.Name');
        $this->db->from($this->table);
		$this->db->join('item_category','item_foods.CategoryID = item_category.CategoryID','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
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
			->where('currencyid',$id) 
			->get()
			->row();
	} 
	public function allkitchen(){
		$data = $this->db->select("*")
			->from('tbl_kitchen')
			->where('status',1)
			->get()
			->result();
			return $data;
		
		}
	public function findfooditem($product_name)
		{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('ProductsIsActive',1);
		$this->db->like('ProductName', $product_name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
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
	
		public function ingrediantlist()
		{
			$data = $this->db->select("*")->from('ingredients')->where('is_active', 1)->order_by('ingredient_name')->get()->result();
			//echo $this->db->last_query();
			return $data;
		}
		

		public function read_modified_groups_addons($limit = null, $start = null)
		{
			$this->db->select("modifier_groups.id as group_id, modifier_groups.name, modifier_groups.min_selection, 
								GROUP_CONCAT(add_ons.add_on_name ORDER BY add_ons.add_on_id SEPARATOR ', ') as add_on_names,
								GROUP_CONCAT(add_ons.price ORDER BY add_ons.add_on_id SEPARATOR ', ') as prices,
								add_ons.is_active");
			$this->db->from('modifier_groups');
			$this->db->join('add_ons', 'modifier_groups.id = add_ons.modifier_set_id', 'left');
			$this->db->group_by('modifier_groups.id');
			$this->db->order_by('modifier_groups.id', 'desc');
	
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			return false;
		}



		public function checkingredient($nitqty, $ingredientid)
		{
			$this->db->select('SUM(purchase_details.quantity) as totalquantity, ingredients.id, ingredients.ingredient_name');
			$this->db->from('purchase_details');
			$this->db->join('ingredients', 'purchase_details.indredientid = ingredients.id', 'left');
			$this->db->where('purchase_details.indredientid', $ingredientid);
			$query = $this->db->get();

			$purchaseqty = 0;
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$purchaseqty = $row->totalquantity ?? 0;
			}

			// Calculate used quantity in production
			$foodwise = $this->db->select("
				production_details.foodid, 
				production_details.ingredientid, 
				production_details.qty, 
				SUM(production.itemquantity * production_details.qty) as foodqty
			")
			->from('production_details')
			->join('production', 'production.itemid = production_details.foodid', 'left')
			->where('production_details.ingredientid', $ingredientid)
			->group_by('production_details.foodid')
			->get()
			->result();

			$lastqty = 0;
			foreach ($foodwise as $gettotal) {
				$lastqty += $gettotal->foodqty;
			}

			$restqty = $purchaseqty - $lastqty;

			return ($restqty >= $nitqty) ? 1 : 0;
		}
	
	//Insert in Production Details table
	public function create_food_ingredient($ingredient)
	{	
		$foodid = $ingredient['foodid'];
		$foodvarientid  = $ingredient['pvarientid'];
		$ingredientid = $ingredient['ingredientid'];
		$quantity	= $ingredient['qty'];
		$unitid  = $ingredient['unitid'];
		$unitname  = $ingredient['unitname'];
		$recipe_price =  $ingredient['recipe_price'];
		$saveid = $this->session->userdata('id');
		$newdate = date('Y-m-d');
		$data1 = array(
			'foodid'		    =>	$foodid,
			'pvarientid'		=>	$foodvarientid,
			'ingredientid'		=>	$ingredientid,
			'qty'				=>	$quantity,
			'unitid'			=>	$unitid,
			'unitname'			=>	$unitname,
			'recipe_price'		=> $recipe_price,
			'createdby'			=>	$saveid,
			'created_date'		=>	$newdate
		);

		$this->db->insert('production_details', $data1);
		return $this->db->affected_rows() > 0;
	}

	public function create_food_production($production)
	{	
		$itemid = $production['itemid'];
		$itemvid = $production['itemvid'];
		$itemquantity = $production['itemquantity'];
		$is_bom = $production['is_bom'];
		$production_date = 	$production['production_date'];
		$expire_date = $production['expire_date'];
		$suplierid = 0;
		$saveid = $this->session->userdata('id');
		$data1 = array(
			'itemid'				=>	$itemid,
			'itemvid'				=>	$itemvid,
			'itemquantity'			=>	$itemquantity,
			'savedby'				=>	$saveid,
			'suplierid'				=>	$suplierid,
			'is_bom'				=>	$is_bom,
			'saveddate'				=>	date('Y-m-d', strtotime($production_date)),
			'productionexpiredate'	=>	date('Y-m-d', strtotime($expire_date))
		);

		$this->db->insert('production', $data1);
		return $this->db->affected_rows() > 0;
	}

	public function create_modifiers($modifier)
	{	
		$menu_id = $modifier['menu_id'];
		//$add_on_id = $modifier['add_on_id'];
		$modifier_groupid =  $modifier['modifier_groupid'];
		$min = $modifier['min'];
		$max = $modifier['max'];
		$isreq = $modifier['isreq'];
		$sortyb = $modifier['sortby'];

		$data1 = array(
			'menu_id'				=>	$menu_id,
			//'add_on_id'				=>	$add_on_id,
			'modifier_groupid'		=>  $modifier_groupid,
			'min'					=> $min,
			'max'					=> $max,
			'isreq'					=> $isreq,
			'sortby'				=> $sortyb,
			'is_active'				=>	1,
		);

		$this->db->insert('menu_add_on', $data1);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * New Find all details on base food id
	 */

	public function findByFoodId($id = null)
	{ 
		// Fetch main food item details
		$foodItem = $this->db->select("*")
			->from($this->table)
			->where('ProductsID', $id)
			->get()
			->row_array();
		
		// if (!$foodItem) {
		// 	return [];
		// }
		//Fetch Production details
		$production =  $this->db->select("itemid, itemvid, itemquantity, saveddate, productionexpiredate")
						->from("production")
						->where("itemid", $id)
						->get()
						->result();
		// Fetch variants
		$variants = $this->db->select("variantid, menuid, variantName, price, takeaway_price, uber_eats_price, doordash_price, web_order_price")
			->from("variant")
			->where("menuid", $id)
			->get()
			->result();
		
		// Fetch recipes
		// $recipes = $this->db->select("vt.variantName, pd.pro_detailsid, pd.foodid, pd.pvarientid, pd.ingredientid, pd.qty, pd.unitid, pd.unitname")
		// 	->from("production_details as pd")
		// 	->join("variant as vt", "pd.pvarientid = vt.variantid", "left")
		// 	->where("pd.foodid", $id)
		// 	->get()
		// 	->result();
		$recipes = $this->db->select("vt.variantName, pd.pro_detailsid, pd.foodid, pd.pvarientid, pd.ingredientid, pd.qty, pd.unitid, pd.unitname, pd.recipe_price")
			->from("production_details as pd")
			->join("variant as vt", "pd.pvarientid = vt.variantid", "left")
			->where("pd.foodid", $id)
			->get()
			->result();
		
		// Fetch modifiers with left join to modifier_groups
		$modifiers = $this->db->select("menu_add_on.row_id, menu_add_on.menu_id, menu_add_on.add_on_id, menu_add_on.modifier_groupid, menu_add_on.min, menu_add_on.max, menu_add_on.isreq, menu_add_on.sortby, menu_add_on.is_active, modifier_groups.name")
			->from("menu_add_on")
			->join("modifier_groups", "menu_add_on.modifier_groupid = modifier_groups.id", "left")
			->where("menu_add_on.menu_id", $id)
			->get()
			->result();
		
		// Attach related data to the main food item
		$foodItem['production'] = !empty($production) ? $production : [];
		$foodItem['variants'] = !empty($variants) ? $variants : [];
		$foodItem['recipes'] = !empty($recipes) ? $recipes : [];
		$foodItem['modifiers'] = !empty($modifiers) ? $modifiers : [];
		
		return $foodItem;
	}

	// Update Food Ingredient
	public function update_food_ingredient($foodid, $ingredient)
	{   
		$this->db->where('foodid', $foodid);
		$data = array(
			'pvarientid'   => $ingredient['pvarientid'],
			'ingredientid' => $ingredient['ingredientid'],
			'qty'          => $ingredient['qty'],
			'unitid'       => $ingredient['unitid'],
			'unitname'     => $ingredient['unit_name'],
			'updatedby'    => $this->session->userdata('id'),
			'updated_date' => date('Y-m-d')
		);

		$this->db->update('production_details', $data);
		return $this->db->affected_rows() > 0;
	}

	// Update Food Production
	public function update_food_production($itemid, $production)
	{   
		$this->db->where('itemid', $itemid);
		$data = array(
			'itemvid'               => $production['itemvid'],
			'itemquantity'          => $production['itemquantity'],
			'is_bom'                => $production['is_bom'],
			'suplierid'             => 0,
			'savedby'               => $this->session->userdata('id'),
			'saveddate'             => date('Y-m-d', strtotime($production['production_date'])),
			'productionexpiredate'  => date('Y-m-d', strtotime($production['expire_date']))
		);

		$this->db->update('production', $data);
		return $this->db->affected_rows() > 0;
	}

	// Update Food Production
	public function update_food_production_unit($itemid, $production)
	{  
		$this->db->where('itemid', $itemid);
		$data = array(
			'itemvid'               => $production['itemvid'],
			'itemquantity'          => $production['itemquantity'],
			'savedby'               => $this->session->userdata('id'),
		);

		$this->db->update('production', $data);
		return $this->db->affected_rows() > 0;
	}

	// Update Modifiers
	public function update_modifiers($menu_id, $modifier)
	{   
		$this->db->where('menu_id', $menu_id);
		$data = array(
			'modifier_groupid'  => $modifier['modifier_groupid'],
			'min'               => $modifier['min'],
			'max'               => $modifier['max'],
			'isreq'             => $modifier['isreq'],
			'sortby'            => $modifier['sortby'],
			'is_active'         => 1,
		);

		$this->db->update('menu_add_on', $data);
		return $this->db->affected_rows() > 0;
	}

	 // Check if a modifier exists for the given menu_id and modifier_groupid
	 public function modifier_exists($menu_id, $modifier_groupid) {
        $this->db->select('row_id');
        $this->db->from('menu_add_on');
        $this->db->where('menu_id', $menu_id);
        $this->db->where('modifier_groupid', $modifier_groupid);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->row_id; // Return row_id if found
        }
        return false; // Return false if not found
    }

    // Update an existing modifier
    public function update_modifier_new($row_id, $data) {
        $this->db->where('row_id', $row_id);
        return $this->db->update('menu_add_on', $data);
    }

    // Insert a new modifier
    public function insert_modifier_new($data) {
        return $this->db->insert('menu_add_on', $data);
    }

	public function get_modifiers_by_menu_id($menu_id) {
		$this->db->select('modifier_groupid');
		$this->db->from('menu_add_on'); // Replace with your table name
		$this->db->where('menu_id', $menu_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function delete_modifier($menu_id, $modifier_groupid) {
		$this->db->where('menu_id', $menu_id);
		$this->db->where('modifier_groupid', $modifier_groupid);
		$this->db->delete('menu_add_on');
		return $this->db->affected_rows() > 0;
	}

	public function delete_variant($variantid, $menuid)
    {
        $this->db->where("variantid", $variantid);
        $this->db->where("menuid", $menuid);
        return $this->db->delete("variant");
    }

	public function delete_variant_and_recipes($variantid, $menuid)
    {
        // Start a transaction to ensure data integrity
        $this->db->trans_start();

        // Delete from `production_details`
        $this->db->where("pvarientid", $variantid);
		$this->db->where("foodid", $variantid);
        $this->db->delete("production_details");

        // Delete from `production`
        $this->db->where("itemvid", $variantid);
        $this->db->where("itemid", $menuid);
        $this->db->delete("production");

        // Delete from `variant`
        $this->db->where("variantid", $variantid);
        $this->db->where("menuid", $menuid);
        $this->db->delete("variant");

        // Complete transaction
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
	
	/**
	 * Delete Recipe Ingredient
	 */
	public function delete_recipe_ingredient($ingredientid, $foodid, $variantid)
	{
		 // Delete the record from production_details
		 $this->db->where("ingredientid", $ingredientid);
		 $this->db->where("foodid", $foodid);
		 $this->db->where("pvarientid", $variantid);
		 $this->db->delete("production_details");
	 
		 // Check if any more records exist for this foodid and variantid
		 $this->db->where("foodid", $foodid);
		 $this->db->where("pvarientid", $variantid);
		 $query = $this->db->get("production_details");
	 
		 if ($query->num_rows() == 0) { 
			 // No more records in production_details, so delete from production
			 $this->db->where("itemid", $foodid);
			 $this->db->where("itemvid", $variantid);
			 $this->db->delete("production");
	 
			 // Also delete from variant table
			 $this->db->where("menuid", $foodid);
			 $this->db->where("variantid", $variantid);
			 $this->db->delete("variant");
		 }
	 
		 return true;
	}

	public function get_production_details($foodid, $pvarientid, $ingredientid)
	{
		return $this->db->where([
			'foodid' => $foodid,
			'pvarientid' => $pvarientid,
			'ingredientid' => $ingredientid
		])->get('production_details')->row();
	}

	// Insert new ingredient entry
	public function create_food_ingredient_updt($ingredient)
	{
		$ingredient['created_date'] = date('Y-m-d');
		$this->db->insert('production_details', $ingredient);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id(); // Return inserted ID
		}
		return false; // Return false if insert fails
	}

	// Update existing ingredient entry
	public function update_food_ingredient_updt($pro_detailsid, $ingredient) {
		log_message('error', 'prodetailid : ' . $pro_detailsid);
		$this->db->where('pro_detailsid', $pro_detailsid)
				 ->update('production_details', $ingredient);
	
		// Log the query for debugging
		log_message('error', 'Update Query: ' . $this->db->last_query());
	
		return $this->db->affected_rows() > 0;
	}

	// public function update_food_ingredient_updt($foodid, $pvarientid, $ingredients)
	// {
	// 	$saveid = $this->session->userdata('id');
	// 	$newdate = date('Y-m-d');

	// 	// Delete all existing ingredients for the given food variant
	// 	$this->db->where('foodid', $foodid)->where('pvarientid', $pvarientid)->delete('production_details');

	// 	// Prepare batch insert data
	// 	$insertData = [];
	// 	foreach ($ingredients as $ingredient) {
	// 		if (!empty($ingredient['ingredientid']) && !empty($ingredient['qty'])) {
	// 			$insertData[] = [
	// 				'foodid'        => $foodid,
	// 				'pvarientid'    => $pvarientid,
	// 				'ingredientid'  => $ingredient['ingredientid'],
	// 				'qty'           => $ingredient['qty'],
	// 				'createdby'     => $saveid,
	// 				'created_date'  => $newdate
	// 			];
	// 		}
	// 	}

	// 	// Insert all new ingredients in a single query for better performance
	// 	if (!empty($insertData)) {
	// 		$this->db->insert_batch('production_details', $insertData);
	// 	}
	// }

	

	//Get Production Details
	public function get_production_details_byingredients($foodid, $pvarientid, $ingredientid)
	{
		return $this->db->where([
			'foodid' => $foodid,
			'pvarientid' => $pvarientid,
			'ingredientid' => $ingredientid
		])->limit(1)->get('production_details')->row();
	}

	public function get_production_details_byvariants($foodid, $pvarientid)
	{
		// Log the query for debugging
		log_message('error', 'Update varientid: ' . $pvarientid);
		log_message('error', 'Update foodid: ' . $foodid);
		
		return $this->db->where([
			'foodid' => $foodid,
			'pvarientid' => $pvarientid,
		])->get('production_details')->row();
	}
	public function get_production_details_byvariantsnew($foodid, $pvarientid)
	{
		// Log the query for debugging
		log_message('error', 'Update varientid: ' . $pvarientid);
		log_message('error', 'Update foodid: ' . $foodid);
		
		return $this->db->where([
			'foodid' => $foodid,
			'pvarientid' => $pvarientid,
		])->get('production_details')->result();
	}
	
	// public function get_production_details_byingredients($updatedId, $variantId, $foodIngredient) {
	// 	return $this->db->select('pro_detailsid')  // Select only the unique identifier
	// 					->where('foodid', $updatedId)
	// 					->where('pvarientid', $variantId)
	// 					->where('ingredientid', $foodIngredient)
	// 					->group_by('pro_detailsid')  // Group by the unique identifier
	// 					->get('production_details')
	// 					->row();  // Get the first result
	// }

    /**
     * Get all food units (where is_foodunit = 1)
     * @return array
     */
    public function get_food_units() {
        $this->db->select('id, uom_name, uom_short_code');
        $this->db->from('unit_of_measurement');
        $this->db->where('is_foodunit', 1);
        $this->db->where('is_active', 1); // Fetch only active units
        $query = $this->db->get();
        
        return $query->result();
    }

	public function finditem($product_id)
	{
		$this->db->select('
			ingredients.*,
			ROUND(ingredients.purchase_price / ingredients.convt_ratio, 2) AS cost_perunit_price
		');
		$this->db->from('ingredients');
		$this->db->where('ingredients.is_active', 1);
		$this->db->where('ingredients.id', $product_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array(); // Return single row as array
		}
		return false;
	}



}
