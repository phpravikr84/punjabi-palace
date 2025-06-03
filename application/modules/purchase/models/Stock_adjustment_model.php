<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_adjustment_model extends CI_Model {

    private $table = 'stock_adjustments';

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function read($limit, $offset) {
        $this->db->select('stock_adjustments.*, i.ingredient_name as ingredient_name')
                ->from($this->table)
                ->join('ingredients i', 'i.id = stock_adjustments.ingredient_id', 'left')
                ->limit($limit, $offset)
                ->order_by('stock_adjustments.adjustment_date', 'desc');

        $query = $this->db->get(); // Execute the query
        // echo $this->db->last_query(); // Print the last query
        // exit; // Stop script execution to see the query output

        return $query->result(); // Won’t execute due to exit above
    }


    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($data) {
        return $this->db->where('id', $data['id'])->update($this->table, $data);
    }

    public function findById($id) {
        return $this->db->select('*')->from($this->table)->where('id', $id)->get()->row();
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
