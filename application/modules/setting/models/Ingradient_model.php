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
    
}
