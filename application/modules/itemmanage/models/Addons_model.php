<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addons_model extends CI_Model {
	
	private $table = 'add_ons';
	private $table1 = 'modifier_groups';
	private $table2 = 'menu_add_on';
 
	public function addons_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function menuaddons_create($data = array())
	{
		return $this->db->insert($this->table2, $data);
	}

	public function addons_delete($id = null)
	{
		$this->db->where('add_on_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			$this->db->where('add_on_id',$id)->delete($this->table2);
			return true;
		} else {
			return false;
		}
	}

	
	public function addons_modifiers_delete($id = null)
	{
		if (!$id) {
			return false; // Ensure ID is provided
		}

		// Check if the add-on is assigned in menu_add_on table
		$menuassign = $this->db->where('add_on_id', $id)->count_all_results($this->table2);
		if ($menuassign > 0) {
			return false; // Prevent deletion if assigned to a menu
		}

		// Get the modifier_set_id associated with the add_on_id
		$modifiers = $this->db->select('modifier_set_id')
							->from($this->table)
							->where('add_on_id', $id)
							->group_by('modifier_set_id')
							->get()
							->row(); // Changed row() to result() for multiple entries

		// Delete from modifier_groups table
		$this->db->where('id', $modifiers->modifier_set_id)->delete($this->table1);
		// Delete from add_ons table
		$this->db->where('add_on_id', $id)->delete($this->table);

		if ($this->db->affected_rows() > 0) {
			// Ensure complete cleanup by deleting from menu_add_on
			foreach ($modifiers as $modifier) {
				$this->db->where('add_on_id', $id)->delete($this->table2);
			}

			return true;
		}

		return false;
	}

	
  public function menuaddons_delete($id = null)
	{
		$this->db->where('row_id',$id)
			->delete($this->table2);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 



	public function update_addons($data = array())
	{
		return $this->db->where('add_on_id',$data["add_on_id"])
			->update($this->table, $data);
	}
	public function update_menuaddons($data = array())
	{
		
		return $this->db->where('row_id',$data["row_id"])
			->update('menu_add_on', $data);
	}

    public function read_addons($limit = null, $start = null)
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('add_on_id', 'desc');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}

	public function get_addons_bymodifiers($id =  null)
	{
	   $this->db->select('add_on_id');
        $this->db->from('add_ons');
		$this->db->where('modifier_set_id', $id);
        $this->db->order_by('add_on_id', 'desc');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
	public function read_modified_groups_addons($limit = null, $start = null)
	{
		// $this->db->select("modifier_groups.id as group_id, modifier_groups.name, modifier_groups.min_selection, 
		// 					GROUP_CONCAT(add_ons.add_on_name ORDER BY add_ons.add_on_id SEPARATOR ', ') as add_on_names,
		// 					GROUP_CONCAT(add_ons.price ORDER BY add_ons.add_on_id SEPARATOR ', ') as prices,
		// 					add_ons.is_active");
		// $this->db->from('modifier_groups');
		// $this->db->join('add_ons', 'modifier_groups.id = add_ons.modifier_set_id', 'left');
		// $this->db->group_by('modifier_groups.id');
		// $this->db->order_by('modifier_groups.id', 'desc');
		
		$this->db->select("
			mg.id as group_id, 
			mg.name, 
			mg.min_selection, 
			GROUP_CONCAT(ao.add_on_name ORDER BY ao.sort_order SEPARATOR ', ') as add_on_names,
			GROUP_CONCAT(ao.price ORDER BY ao.sort_order SEPARATOR ', ') as prices,
			MAX(ao.is_active) as is_active
		");
		$this->db->from('modifier_groups mg');
		$this->db->join('add_ons ao', 'mg.id = ao.modifier_set_id', 'left');
		$this->db->group_by('mg.id');
		$this->db->order_by('mg.id', 'desc');


		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	public function read_menuaddons($limit = null, $start = null)
	{
	    $this->db->select('menu_add_on.*,item_foods.ProductName,add_ons.add_on_name');
        $this->db->from($this->table2);
		$this->db->join('item_foods','menu_add_on.menu_id = item_foods.ProductsID','left');
		$this->db->join('add_ons','menu_add_on.add_on_id = add_ons.add_on_id','inner');
        $this->db->order_by('row_id', 'desc');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}

	public function findModifierGroupsById($id = null)
	{ 
		return $this->db->select("modifier_groups.id as group_id, modifier_groups.name, modifier_groups.min_selection, add_ons.*")
			->from('modifier_groups')
			->join('add_ons', 'modifier_groups.id = add_ons.modifier_set_id', 'left')
			->where('modifier_groups.id', $id)
			->order_by('sort_order', 'asc')
			->get()
			->result();  // Use result() instead of row()
	}



	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('add_on_id',$id) 
    		->limit($limit, $start)
			->get()
			->row();
	} 
	public function findBymenuaddons($id = null)
	{ 
		return $this->db->select("*")->from($this->table2)
			->where('row_id',$id) 
			->get()
			->row();
	} 
 
public function count_addons()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function count_menuaddons()
	{
		$this->db->select('menu_add_on.*,item_foods.ProductName,add_ons.add_on_name');
        $this->db->from($this->table2);
		$this->db->join('item_foods','menu_add_on.menu_id = item_foods.ProductsID','left');
		$this->db->join('add_ons','menu_add_on.add_on_id = add_ons.add_on_id','inner');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
// menu item Dropdown
	public function menu_dropdown()
	{
		$data = $this->db->select("*")
			->from('item_foods')
			->where("ProductsIsActive", 1)
			->get()
			->result();

		$list[''] = display('item_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->ProductsID] = $value->ProductName;
			return $list;
		} else {
			return false; 
		}
	}
	
// Addons Dropdown
	public function addons_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->where("is_active", 1)
			->get()
			->result();

		$list[''] = display('addons_list');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->add_on_id] = $value->add_on_name;
			return $list;
		} else {
			return false; 
		}
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
    
}
