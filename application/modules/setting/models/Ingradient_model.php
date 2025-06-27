<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingradient_model extends CI_Model {
	
	private $table = 'ingredients';
	private $table2 = 'ingredients_opening_stock';
 
	public function unit_ingredient($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function ingredient_delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update_ingredient($data = array())
	{
		return $this->db->where('id',$data["id"])
			->update($this->table, $data);
	}

    public function read_ingredient($limit = null, $start = null)
	{
	    $this->db->select('ingredients.*,unit_of_measurement.uom_name');
        $this->db->from($this->table);
		$this->db->join('unit_of_measurement','ingredients.uom_id = unit_of_measurement.id','left');
        $this->db->order_by('id', 'desc');
    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('id',$id) 
			->get()
			->row();
	} 

 
	public function count_ingredient()
	{
		$this->db->select('ingredients.*,unit_of_measurement.uom_name');
        $this->db->from($this->table);
		$this->db->join('unit_of_measurement','ingredients.uom_id = unit_of_measurement.id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}

	/**
	 * Get Ingredient from purchase details
	 */
	
	//  public function get_ingredient_frm_purchase($term)
	//  {
	// 	 $this->db->select('i.id as id, i.ingredient_name as label, pd.price as purchase_price');
	// 	 $this->db->from('purchase_details pd');
	// 	 $this->db->join('ingredients i', 'pd.indredientid = i.id', 'left');
	// 	 $this->db->like('i.ingredient_name', $term);
	// 	 $this->db->order_by('pd.price', 'desc');
	// 	 $this->db->group_by('pd.indredientid');
 
	// 	 $query = $this->db->get();
	// 	 if ($query->num_rows() > 0) {
	// 		 return $query->result();
	// 	 }
	// 	 return false;
	//  }
	public function get_ingredient_frm_purchase($term)
	{
		$this->db->select('i.id as id, i.ingredient_name as label, pd.price as purchase_price, i.uom_id as uom_id');
		$this->db->from('purchase_details pd');
		$this->db->join('ingredients i', 'pd.indredientid = i.id', 'left');
		$this->db->join(
			'(SELECT indredientid, MAX(purchasedate) AS latest_date 
			FROM purchase_details 
			GROUP BY indredientid) AS latest_pd',
			'pd.indredientid = latest_pd.indredientid AND pd.purchasedate = latest_pd.latest_date',
			'inner'
		);
		$this->db->like('i.ingredient_name', $term);
		$this->db->order_by('i.ingredient_name', 'asc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * Check Ingredient Exists
	 */
	public function check_ingredient_exists($term)
	{
		$this->db->select('id, ingredient_name as label, uom_id');
		$this->db->from('ingredients');
		$this->db->like('ingredient_name', $term);
		$this->db->order_by('ingredient_name', 'asc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * Add Ingradient Opening stock
	 */
	public function ingredient_opening_stock($data = array())
	{
		return $this->db->insert($this->table2, $data);
	}
	/**
	 * Get Brands
	 */

	 public function get_all_brands() {
        $this->db->select('id, brand_name');
        $this->db->from('brands');
        $this->db->where('status', 1); // Only active brands
        $this->db->order_by('brand_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

	
	/**
	 *  Sheet Upload Model 
	 */

	// public function get_uom_id_by_short_code($short_code)
	// {
	// 	return $this->db->select('id')->where('uom_short_code', $short_code)->get('unit_of_measurement')->row('id');
	// }

	// public function get_uom_id_by_short_code($short_code)
	// {
	// 	$short_code = strtolower(trim($short_code));

	// 	return $this->db
	// 		->select('id')
	// 		->from('unit_of_measurement')
	// 		->where('is_active', 1)
	// 		->group_start()
	// 			->like('LOWER(uom_short_code)', $short_code)
	// 			->or_like('LOWER(uom_name)', $short_code)
	// 		->group_end()
	// 		->get()
	// 		->row('id');
	// }

		public function get_uom_id_by_short_code($short_code)
	{
		$short_code = strtolower(trim($short_code));

		$result = $this->db
			->select('id, uom_variations')
			->where('is_active', 1)
			->get('unit_of_measurement')
			->result();

		foreach ($result as $row) {
			$variations = array_map('strtolower', array_map('trim', explode(',', $row->uom_variations)));

			if (in_array($short_code, $variations)) {
				return $row->id;
			}
		}

		return null; // Not found
	}


	public function get_brand_id_by_name($brand_name)
	{
		if (empty($brand_name)) return null;
		$brand = $this->db->where('brand_name', $brand_name)->get('brands')->row();

		if ($brand) return $brand->id;

		$this->db->insert('brands', ['brand_name' => $brand_name, 'status' => 1]);
		return $this->db->insert_id();
	}

	public function get_temp_by_name($name)
	{
		return $this->db->where('ingredient_name', $name)->get('ingredient_temp')->row();
	}

	public function insert_temp($data)
	{
		return $this->db->insert('ingredient_temp', $data);
	}

	public function get_all_temp()
	{
		return $this->db->get('ingredient_temp')->result();
	}

	public function insert_ingredient($data)
	{
		$this->db->insert('ingredients', $data);
		return $this->db->insert_id();
	}

	public function get_by_name($name)
	{
		return $this->db->where('ingredient_name', $name)->get('ingredients')->row();
	}


	public function get_purchased_ingredients()
	{
		return $this->db->select('i.id, i.ingredient_name, i.purchase_price, i.cost_perunit, i.consumption_unit, i.uom_id, i.brand_id, i.status')
			->distinct()
			->from('order_menu om')
			->join('production_details pd', 'pd.foodid = om.menu_id', 'inner')
			->join('ingredients i', 'i.id = pd.ingredientid', 'inner')
			->where('i.is_active', 1)
			->get()
			->result();
	}

	public function get_conversion_ratio($primary_uom_id, $secondary_uom_id) {
        $this->db->select('conversion_ratio');
        $this->db->from('unit_conversion');
        $this->db->where('primary_uom_id', $primary_uom_id);
        $this->db->where('secondary_uom_id', $secondary_uom_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->conversion_ratio;
        } else {
            return null;
        }
    }
		
}
