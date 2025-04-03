<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foodunit_model extends CI_Model {
    
    private $table = 'measurement_units';
    private $uom_table = 'unit_of_measurement';

    // Fetch units where is_foodunit = 1
    public function get_food_units($limit = null, $start = null)
    {
        $this->db->select('measurement_units.*, unit_of_measurement.uom_name')
                 ->from($this->table)
                 ->join($this->uom_table, 'measurement_units.uomid = unit_of_measurement.id')
                 ->where('unit_of_measurement.is_foodunit', 1)
                 ->limit($limit, $start)
                 ->order_by('measurement_units.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_units()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function create_unit($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_unit($data)
    {
        return $this->db->where('id', $data['id'])->update($this->table, $data);
    }

    public function delete_unit($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function findById($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Fetch UOMs where is_foodunit = 1
    public function get_food_uom_options()
    {
        $query = $this->db->select('id, uom_name')
                          ->where('is_foodunit', 1)
                          ->get($this->uom_table);
        return $query->result();
    }
}
