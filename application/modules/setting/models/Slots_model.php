<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slots_model extends CI_Model {
    
    private $table = 'slots';
    
    public function create($data = array())
    {
        return $this->db->insert($this->table, $data);
    }
    
    public function delete($id = null)
    {
        $this->db->where('slot_id', $id)
            ->delete($this->table);
            
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update($data = array())
    {
        return $this->db->where('slot_id', $data['slot_id'])
            ->update($this->table, $data);
    }
    
    public function read($limit = null, $start = null)
    {
        $this->db->select('s.*, d.day_name');
        $this->db->from($this->table . ' s');
        $this->db->join('Days d', 'd.day_id = s.day_id', 'left');
        $this->db->order_by('s.slot_id', 'desc');
        if ($limit != null && $start != null) {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }
    
    public function findById($id = null)
    {
        return $this->db->select('*')
            ->from($this->table)
            ->where('slot_id', $id)
            ->get()
            ->row();
    }
    
    public function countlist()
    {
        $this->db->select('s.*, d.day_name');
        $this->db->from($this->table . ' s');
        $this->db->join('Days d', 'd.day_id = s.day_id', 'left');
        return $this->db->count_all_results();
    }
    
    public function readdays()
    {
        return $this->db->select('*')
            ->from('Days')
            ->order_by('day_name', 'asc')
            ->get()
            ->result();
    }
}