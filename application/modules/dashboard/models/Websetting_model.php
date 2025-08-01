<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Websetting_model extends CI_Model {
 
	private $table = "setting";
	
	public function read()
	{
		return $this->db->select("*")
			->from('common_setting')
			->get()
			->row();
	} 
	public function create_setting($data = [])
	{	 
		return $this->db->insert('common_setting',$data);
	}
	public function update_setting($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('common_setting',$data); 
	} 

	public function create($data = array())
	{	 
		return $this->db->insert('tbl_slider',$data);
	}
 	
	public function createtype($data = array())
	{	 
		return $this->db->insert('tbl_slider_type',$data);
	}
	public function updatetype($data = array())
	{
		return $this->db->where('stype_id',$data["stype_id"])
			->update('tbl_slider_type', $data);
	}
	public function type_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_slider_type')
			->get()
			->result();

		$list[''] = display('name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->stype_id] = $value->STypeName;
			return $list;
		} else {
			return false; 
		}
	}

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from('tbl_slider')
			->where('slid',$id) 
			->get()
			->row();
	} 
  	public function update($data = array())
	{
		return $this->db->where('slid',$data['slid'])
			->update('tbl_slider',$data); 
	} 
	
	public function delete($id = null)
	{
		$this->db->where('slid',$id)
			->delete('tbl_slider');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
 //menu section
 
 	public function allmenu_dropdown(){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', 0);
        $parent = $this->db->get();
        $menulist = $parent->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
			
            $i++;
        }
        return $menulist;
    }

    public function sub_menu($id){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', $id);

        $child = $this->db->get();
        $menulist = $child->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
            $i++;
        }
        return $menulist;       
    }
	public function createmenu($data = array())
	{	 
		return $this->db->insert('top_menu',$data);
	}
	public function updatemenu($data = array())
	{
		return $this->db->where('menuid',$data["menuid"])
			->update('top_menu', $data);
	}
	
	public function deletemenu($id = null)
	{
		$this->db->where('menuid',$id)
			->delete('top_menu');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	
	//Social Links section
 

	public function createslink($data = array())
	{	 
		return $this->db->insert('tbl_sociallink',$data);
	}
	public function updateslink($data = array())
	{
		return $this->db->where('sid',$data["sid"])
			->update('tbl_sociallink', $data);
	}
	
	public function deleteslink($id = null)
	{
		$this->db->where('sid',$id)
			->delete('tbl_sociallink');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	//Seo Links section
 

	public function createseoption($data = array())
	{	 
		return $this->db->insert('tbl_seoption',$data);
	}
	public function updateseopage($data = array())
	{
		return $this->db->where('id',$data["id"])
			->update('tbl_seoption', $data);
	}
	
	public function deleteseo($id = null)
	{
		$this->db->where('id',$id)
			->delete('tbl_seoption');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	//Delivary Address section
 

	public function createnewaddress($data = array())
	{	 
		return $this->db->insert('tbl_delivaryaddress',$data);
	}
	public function updateaddress($data = array())
	{
		return $this->db->where('delivaryid',$data["delivaryid"])
			->update('tbl_delivaryaddress', $data);
	}
	
	public function deleteaddress($id = null)
	{
		$this->db->where('delivaryid',$id)->delete('tbl_delivaryaddress');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	//Delivary Time section
 

	public function createtime($data = array())
	{	 
		return $this->db->insert('tbl_delivaritime',$data);
	}
	public function updatetime($data = array())
	{
		return $this->db->where('dtimeid',$data["dtimeid"])
			->update('tbl_delivaritime', $data);
	}
	
	public function deletetime($id = null)
	{
		$this->db->where('dtimeid',$id)->delete('tbl_delivaritime');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}  
	//widget section
 
 	
	public function createwidget($data = array())
	{	 
		return $this->db->insert('tbl_widget',$data);
	}
	public function updatewidget($data = array())
	{
		return $this->db->where('widgetid',$data["widgetid"])
			->update('tbl_widget', $data);
	}
	
	public function deletewidget($id = null)
	{
		$this->db->where('widgetid',$id)
			->delete('tbl_widget');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function emailread($limit = null, $start = null)
	{
	   $this->db->select('*');
        $this->db->from('subscribe_emaillist');
        $this->db->order_by('emailid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	public function countlist()
	{
		$this->db->select('*');
        $this->db->from('subscribe_emaillist');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}

	/**
	 * Menu PDF
	 */
	public function get_active_menus() {
        $this->db->where('isactive', 1);
        $this->db->order_by('menu_name', 'asc');
        return $this->db->get('top_menu')->result();
    }

    public function save_pdf_material($data) {
        $this->db->insert('menu_pdf_materials', $data);
    }

	public function get_menu_slug_by_id($menu_id)
	{
		return $this->db->select('menu_slug')
						->from('top_menu') // replace with your actual table name
						->where('menuid', $menu_id)
						->get()
						->row('menu_slug');
	}


    public function get_pdf_materials() {
        $this->db->select('m.*, t.menu_name');
        $this->db->from('menu_pdf_materials m');
        $this->db->join('top_menu t', 'm.menu_id = t.menuid');
        return $this->db->get()->result();
    }

    public function toggle_pdf_status($id) {
        $material = $this->db->get_where('menu_pdf_materials', ['id' => $id])->row();
        $new_status = $material->status ? 0 : 1;
        $this->db->where('id', $id)->update('menu_pdf_materials', ['status' => $new_status]);
    }
 
}
