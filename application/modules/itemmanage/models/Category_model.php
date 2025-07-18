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
	
	public function allgroups_dropdown(){

        $this->db->select('*');
        $this->db->from('item_category');
        $this->db->where('parentid', 0);
        $parent = $this->db->get();
        $categories = $parent->result();
        // $i=0;
        // foreach($categories as $p_cat){
			
        //     $categories[$i]->sub = $this->sub_categories($p_cat->CategoryID);

		// 	$scs=0;
		// 	foreach ($categories[$i]->sub as $scat) {
		// 		$categories[$i]->sub[$scs]->sub = $this->sub_categories($scat->CategoryID);
		// 		$scs++;
		// 	}
			
        //     $i++;
        // }
        return $categories;
    }


	public function update_category($id, $data)
	{
		$this->db->where('CategoryID', $id);
		return $this->db->update('item_category', $data);
	}

	/**
	 * Delete a category by ID
	 */
	public function delete_category($id) {
        $this->db->where('CategoryID', $id);
        return $this->db->delete('item_category');
    }

	/**
	 *  Subcategories function
	 */
	  // Fetch parent categories for dropdown (used in create/edit form)
     // Fetch parent categories for dropdown (used in create/edit form)
    public function get_parent_categories_for_dropdown() {
        $query = $this->db->query("
            SELECT * FROM item_category WHERE parentid IN ( SELECT CategoryID FROM item_category WHERE parentid = 0 GROUP BY CategoryID )
        ");
        return $query->result();
    }

    // Fetch subcategories with first category name for listing
    public function get_subcategories_for_listing($limit = null, $start = null)
	{
		$allCategories = $this->db->get('item_category')->result_array();

		$topLevelIds = [];
		$firstChildren = [];
		$secondChildren = [];

		// Step 1: Get top-level CategoryIDs
		foreach ($allCategories as $cat) {
			if ($cat['parentid'] == 0) {
				$topLevelIds[] = $cat['CategoryID'];
			}
		}

		// Step 2: Get first-level children (whose parent is in topLevel)
		foreach ($allCategories as $cat) {
			if (in_array($cat['parentid'], $topLevelIds)) {
				$firstChildren[$cat['CategoryID']] = $cat;
				$firstChildren[$cat['CategoryID']]['Subcategories'] = []; // initialize subcategory array
			}
		}

		// Step 3: Get second-level children and group under their parent
		foreach ($allCategories as $cat) {
			$parentId = $cat['parentid'];
			if (isset($firstChildren[$parentId])) {
				$firstChildren[$parentId]['Subcategories'][] = $cat;
			}
		}

    // Return grouped list (re-indexed)
    	return array_values($firstChildren);
	}


	/**
	 * Read categories with pagination and optional conditions
	 */
	// Find category with its subcategories
    // Find category with its subcategories (renamed to avoid conflict)
    public function findCategoryWithSubcategories($id) {
        $category = $this->findById($id);
        if ($category) {
            $category->sub = $this->db->select('*')
                ->from($this->table)
                ->where('parentid', $id)
                ->get()
                ->result();
        }
        return $category;
    }

    // Existing findByIdWithSubcatRow (as per your code)
    public function findByIdWithSubcatRowNew($id = null) {
        if ($id === null) {
            return null;
        }
        $subcategory = $this->db->select("*")
            ->from($this->table)
            ->where("CategoryID", $id)
            ->get()
            ->row_array();
        if (!$subcategory) {
            return null;
        }
        $parent = $this->db->select("*")
            ->from($this->table)
            ->where("CategoryID", $subcategory['parentid'])
            ->get()
            ->row_array();
        if (!$parent) {
            return null;
        }
        $subcategories = $this->db->select("*")
            ->from($this->table)
            ->where("parentid", $subcategory['parentid'])
            ->get()
            ->result_array();
        $parent['sub'] = $subcategories;
        return json_decode(json_encode($parent));
    }


	public function read_category_first($limit = null, $start = null, $condition = []) {
        $this->db->select('*');
        $this->db->from('item_category');
        if (!empty($condition)) {
            $this->db->where($condition);
        }
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('CategoryID', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}
