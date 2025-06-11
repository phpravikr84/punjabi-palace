<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
 
	public function create($data = array())
	{
		return $this->db->insert('user', $data);
	}

	public function read()
	{
		return $this->db->select("
				user.*, 
				CONCAT_WS(' ', firstname, lastname) AS fullname 
			")
			->from('user')
			->order_by('id', 'desc')
			->get()
			->result();
	}

	// public function single($id = null)
	// {
	// 	return $this->db->select('*')
	// 		->from('user')
	// 		->where('id', $id)
	// 		->get()
	// 		->row();
	// }

	public function single($id = null)
	{
		return $this->db->select('user.*, sec_user_access_tbl.fk_role_id as pos_id') // Add other fields if needed
			->from('user')
			->join('sec_user_access_tbl', 'sec_user_access_tbl.fk_user_id = user.id', 'left')
			->where('user.id', $id)
			->get()
			->row();
	}


	public function update($data = array())
	{
		return $this->db->where('id', $data["id"])
			->update("user", $data);
	}

	public function delete($id = null)
	{
		return $this->db->where('id', $id)
			->where_not_in('is_admin',1)
			->delete("user");
	}

	public function dropdown()
	{
		$data = $this->db->select("id, CONCAT_WS(' ', firstname, lastname) AS fullname")
			->from("user")
			->where('status', 1)
			->where_not_in('is_admin', 1)
			->get()
			->result();
		$list[''] = display('select_option');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->id] = $value->fullname;
			return $list;
		} else {
			return false; 
		}
	}

	public function insert_employee_history($data) {
        return $this->db->insert('employee_history', $data);
    }

	public function get_all_positions() {
        return $this->db->select('pos_id, position_name')
                        ->from('position')
                        ->order_by('position_name', 'ASC')
                        ->get()
                        ->result();
    }

	public function get_all_roles() {
        return $this->db->select('*')
                        ->from('sec_role_tbl')
                        ->order_by('role_name', 'ASC')
                        ->get()
                        ->result();
    }


	// Get users based on admin condition
	public function get_users_for_pin_change($is_admin, $user_id)
	{
		if ($is_admin == 1) {
			return $this->db->select('*')
							->from('user')
							->where('status', 1)
							->where_not_in('is_admin', 1)
							->get()
							->result();
		} else {
			return $this->db->select('*')
							->from('user')
							->where('id', $user_id)
							->where_not_in('is_admin', 1)
							->get()
							->result();
		}
	}

	// Update user's login_pin
	public function update_user_pin($user_id, $pin)
	{
		return $this->db->where('id', $user_id)
						->update('user', ['login_pin' => $pin]);
	}

	public function get_user_by_id($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row();
	}

 

}
