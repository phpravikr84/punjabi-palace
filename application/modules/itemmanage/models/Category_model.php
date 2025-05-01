<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	
	private $table = 'item_category';
 
    public function cat_view()
	{
		return $this->db->select('*')	
			->from($this->table)
			->order_by('CategoryID', 'desc')
			->get()
			->result();
	}
	public function cat_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}

	public function cat_delete($id = null)
	{
		$this->db->where('CategoryID',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 




	// public function update_cat($data = array())
	// {
	// 	return $this->db->where('CategoryID',$data["CategoryID"])
	// 		->update($this->table, $data);
	// }

	// public function update_cat($data = array(), $subcatid=null)
	// {
	// 	// if (!isset($data['CategoryID']) || !isset($data['Name']) || !isset($data['CategoryIsActive'])) {
	// 	// 	return false; // Ensure required data exists
	// 	// }
	// 	// Fetch parent category ID
	// 	$categoryid = $data['CategoryID'];
	// 	$parent_id = $data['parentid'];
	// 	$category_name = $data['Name'];
	// 	$status = $data['CategoryIsActive'];
	// 	$isoffer = $data['isoffer'];
	// 	$offerpercentage = $data['offerpercentage'];
	// 	$offerstartdate = $data['offerstartdate'];
	// 	$offerendate = $data['offerendate'];

	// 		// Update query
	// 	return $this->db->where('parentid', $parent_id)
	// 			->where('CategoryID', $categoryid) // Ensure correct child ID
	// 				->update($this->table, [
	// 					'Name' => $category_name,
	// 					'CategoryIsActive' => $status,
	// 					'isoffer' => $isoffer,
	// 					'offerpercentage' => $offerpercentage,
	// 					'offerstartdate' => $offerstartdate,
	// 					'offerendate' => $offerendate,
	// 					'DateUpdated' => date('Y-m-d H:i:s')
	// 				]);

	// }
	public function update_cat($data = [])
	{
		if (empty($data['CategoryID'])) return false;

		return $this->db->where('CategoryID', $data['CategoryID'])
			->update($this->table, [
				'Name' => $data['Name'],
				'CategoryIsActive' => $data['CategoryIsActive'],
				'isoffer' => $data['isoffer'],
				'offerpercentage' => $data['offerpercentage'],
				'offerstartdate' => $data['offerstartdate'],
				'offerendate' => $data['offerendate'],
				'DateUpdated' => date('Y-m-d H:i:s'),
			]);
	}



    public function read_category($limit = null, $start = null)
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('CategoryID', 'desc');
     
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}

	public function getAllCategories()
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('CategoryID', 'desc');
     
        $query = $this->db->get();
        return $query->result(); 
	} 


	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('CategoryID',$id)
			->get()
			->row();
	}

	public function findByIdWithSubcat($id = null)
	{
		if ($id === null) {
			return null; // Return null if no ID is provided
		}

		// Fetch parent category
		$parent = $this->db->select("*")
			->from($this->table)
			->where("CategoryID", $id)
			->get()
			->row_array(); // Fetch as associative array

		if (!$parent) {
			return null; // Return null if no parent found
		}

		// Fetch subcategories
		$subcategories = $this->db->select("*")
			->from($this->table)
			->where("parentid", $id)
			->get()
			->result_array(); // Fetch all as an array

		// Add subcategories inside the parent array
		$parent['sub'] = $subcategories;

		// Convert array to object
		return json_decode(json_encode($parent));
	}

	public function findByIdWithSubcatRow($id = null) 
	{
		if ($id === null) {
			return null; // Return null if no ID is provided
		}

		// Fetch the subcategory using its ID
		$subcategory = $this->db->select("*")
			->from($this->table)
			->where("CategoryID", $id)
			->get()
			->row_array(); // Fetch as associative array

		if (!$subcategory) {
			return null; // Return null if the subcategory does not exist
		}

		// Fetch the parent category using the parent ID from the subcategory
		$parent = $this->db->select("*")
			->from($this->table)
			->where("CategoryID", $subcategory['parentid']) // Get parent category
			->get()
			->row_array();

		if (!$parent) {
			return null; // Return null if no parent is found
		}

		// Fetch all subcategories that share the same parentid
		$subcategories = $this->db->select("*")
			->from($this->table)
			->where("parentid", $subcategory['parentid']) // Get all siblings
			->get()
			->result_array();

		// Add subcategories inside the parent array
		$parent['sub'] = $subcategories;

		// Convert array to object and return
		return json_decode(json_encode($parent));
	}
	
// Department Dropdown
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
	
    public function allcategory_dropdown(){

        $this->db->select('*');
        $this->db->from('item_category');
        //$this->db->where('parentid', 0);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
			
            $categories[$i]->sub = $this->sub_categories($p_cat->CategoryID);

			$scs=0;
			foreach ($categories[$i]->sub as $scat) {
				$categories[$i]->sub[$scs]->sub = $this->sub_categories($scat->CategoryID);
				$scs++;
			}
			
            $i++;
        }
        return $categories;
    }
    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('item_category');
        $this->db->where('parentid', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->CategoryID);
            $i++;
        }
        return $categories;       
    }
	
	
	    public function checkcategoryitem($catid){
	    $this->db->select('*');
        $this->db->from('item_foods');
		$this->db->where('CategoryID', $catid);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	   }

	
public function count_category()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    
}
