<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waste_model extends CI_Model {

    public function get_all() {
        return $this->db->get('waste_management')->result();
    }
    
    public function count_all()
    {
        return $this->db->count_all('waste_management');
    }

    public function get_by_id($id) {
        return $this->db->get_where('waste_management', ['id' => $id])->row();
    }

    public function get_all_paginated($limit, $offset)
    {
        $this->db->select('wm.*, u.firstname, u.lastname');
        $this->db->from('waste_management wm');
        $this->db->join('user u', 'u.id = wm.user_id', 'left');
        $this->db->order_by('wm.id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $waste) {
            $waste->items = $this->get_items($waste->id); // load waste items
        }

        return $result;
    }


    public function get_items($waste_id)
    {
        return $this->db->get_where('waste_management_items', ['waste_id' => $waste_id])->result();
    }

    public function insert($data)
    {
        $insert = [
            'reference_no'     => $data['reference_no'],
            'waste_date'       => $data['waste_date'],
            'user_id'          => $data['user_id'],
            'waste_type'       => $data['waste_type'],
            'note'             => $data['notes'] ?? null,
            'total_loss_amt'   => $data['total_loss_amt'] ?? 0
        ];
        $this->db->insert('waste_management', $insert);
        return $this->db->insert_id();
    }


    public function update($id, $data)
    {
        $update = [
            'waste_date'   => $data['waste_date'],
            'user_id'      => $data['user_id'],
            'waste_type'   => $data['waste_type'],
            'note'         => $data['notes'],
        ];
        $this->db->where('id', $id)->update('waste_management', $update);
    }

    public function delete_items($waste_id)
    {
        $this->db->delete('waste_management_items', ['waste_id' => $waste_id]);
    }

    public function insert_ingredients($waste_id, $data)
    {
        foreach ($data['item_id'] as $index => $ing_id) {
            $this->db->insert('waste_management_items', [
                'waste_id'         => $waste_id,
                'ingredient_id'    => $ing_id,
                'qty'              => $data['qty'][$index],
                'unit_id'          => $data['unit_id'][$index],
                'ingredient_status'=> $data['ingredient_status'][$index],
                'loss_amount'      => $data['loss_amount'][$index]
            ]);
        }

        // Optionally update total_loss_amt in parent
        $this->db->where('id', $waste_id)
                ->update('waste_management', ['total_loss_amt' => $data['total_loss_amt'] ?? 0]);
    }

    public function insert_food($waste_id, $data)
    {
        $food_id     = $data['food_id'];
        $food_qty    = $data['food_wastage'];
        $food_variant = $data['food_variant'] ?? null;

        foreach ($data['item_id'] as $index => $ing_id) {
            $this->db->insert('waste_management_items', [
                'waste_id'         => $waste_id,
                'food_id'          => $food_id,
                'food_qty'         => $food_qty,
                'food_variant'      => $food_variant,
                'ingredient_id'    => $ing_id,
                'qty'              => $data['qty'][$index],
                'unit_id'          => $data['unit_id'][$index] ?? null,
                'ingredient_status'=> $data['ingredient_status'][$index] ?? 0,
                'loss_amount'      => $data['loss_amount'][$index]
            ]);
        }

        // Optionally update total_loss_amt in parent
        $this->db->where('id', $waste_id)
                ->update('waste_management', ['total_loss_amt' => $data['total_loss_amt'] ?? 0]);
    }


    public function get_next_ref_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('waste_management');
        $max_id = $query->row()->id ?? 0;
        return 'WM' . str_pad($max_id + 1, 5, '0', STR_PAD_LEFT);
    }

    public function get_food_ingredients($food_id, $variant_id)
    {
        $this->db->select('pd.*, i.ingredient_name, u.uom_short_code');
        $this->db->from('production_details pd');
        $this->db->join('ingredients i', 'i.id = pd.ingredientid');
        $this->db->join('unit_of_measurement u', 'u.id = i.unitid');
        $this->db->where('pd.foodid', $food_id);
        if ($variant_id) {
            $this->db->where('pd.pvarientid', $variant_id);
        }
        return $this->db->get()->result();
    }

    public function get_cost_per_unit($item_id, $unit_id, $ingr_status = 0)
    {
        // echo "Fetching cost per unit for item ID: $item_id, unit ID: $unit_id, ingredient status: $ingr_status\n"; // Debugging line
        // exit;
        $this->db->select('cost_perunit, purchase_price');
        $this->db->from('ingredients');
        $this->db->where('id', $item_id);
        if($ingr_status == 0) {
             $this->db->where('consumption_unit', $unit_id); // or consumption_unit
        } else {
             $this->db->where('uom_id', $unit_id); // or consumption_unit
        }
       
        $this->db->where('status', $ingr_status); // 0 for kitchen items, 1 for other items
        $query = $this->db->get();
       

        if ($query->num_rows() > 0) {
            if($ingr_status == 0) {
                // For kitchen items, use cost_perunit
                return $query->row()->cost_perunit;
            } else {
                // For other items, use purchase_price
                return $query->row()->purchase_price;
            }
        }
        return null;
    }

    public function get_detail_by_id($id)
    {
        // Fetch waste record with user name
        $this->db->select('w.*, u.firstname, u.lastname');
        $this->db->from('waste_management w');
        $this->db->join('user u', 'u.id = w.user_id', 'left');
        $this->db->where('w.id', $id);
        $waste = $this->db->get()->row();

        if ($waste) {
            // Fetch related waste items (ingredients/food with variant)
            $this->db->select('wi.*, i.ingredient_name, f.ProductName AS food_name, v.variantName as variant_name, v.variantid as variant_id');
            //$this->db->select('wi.*, i.ingredient_name, f.ProductName AS food_name');
            $this->db->from('waste_management_items wi');
            $this->db->join('ingredients i', 'i.id = wi.ingredient_id', 'left');
            $this->db->join('item_foods f', 'f.ProductsID = wi.food_id', 'left');
            $this->db->join('variant v', 'v.variantid = wi.food_variant', 'left');
            $this->db->where('wi.waste_id', $id);
            $waste->items = $this->db->get()->result();
        }

        return $waste;
    }

}
