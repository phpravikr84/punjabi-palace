<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modifiers_model extends CI_Model {

    private $table = 'modifiers';

    public function create($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data = array())
    {
        return $this->db->where('id', $data['id'])
                        ->update($this->table, $data);
    }

    public function delete($id = null)
    {
        return $this->db->where('id', $id)
                        ->delete($this->table);
    }

    public function get_all()
    {
        return $this->db->select('modifiers.*, modifier_groups.name as group_name')
                        ->from($this->table)
                        ->join('modifier_groups', 'modifiers.group_id = modifier_groups.id', 'inner')
                        ->order_by('id', 'desc')
                        ->get()->result();
    }

    public function find_by_id($id = null)
    {
        return $this->db->select('*')->from($this->table)
                        ->where('id', $id)
                        ->get()->row();
    }

    public function count()
    {
        return $this->db->count_all($this->table);
    }
}
