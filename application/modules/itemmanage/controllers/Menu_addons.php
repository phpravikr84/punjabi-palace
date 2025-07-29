<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_addons extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		//$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'addons_model',
			'logs_model'
		));	
    }
 
    public function index()
    {
        
		$this->permission->method('itemmanage','read')->redirect();
        $data['title']    = display('addons_list'); 
              
        #
        #pagination starts
        #
        $config["base_url"] = base_url('itemmanage/menu_addons/index');
        $config["total_rows"]  = $this->addons_model->count_addons();
        $config["per_page"]    = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['sub_header'] = 'modifiers';
        $data["addonslist"] = $this->addons_model->read_modified_groups_addons($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		$settinginfo=$this->addons_model->settinginfo();
		$data['currency']=$this->addons_model->currencysetting($settinginfo->currency);

        #
        #pagination ends
        #   
        $data['module'] = "itemmanage";
        $data['page']   = "addonslist";   
        echo Modules::run('template/layout', $data); 
    }
	
	// public function create($id = null)
	// {
	// 	$this->permission->method('itemmanage', 'create')->redirect();

	// 	$data['title'] = empty($id) ? 'Add Modifiers' : 'Update Modifiers';

	// 	if (!empty($id)) {
	// 		$data['group_id'] = $id;
	// 	}

	// 	// Validation Rules
	// 	$this->form_validation->set_rules('modifiersetname', 'Modifier Set Name', 'required|max_length[100]');
	// 	$this->form_validation->set_rules('addonsname[]', 'Modifier Name', 'required');
	// 	$this->form_validation->set_rules('status[]', 'Status', 'required|in_list[0,1]');

	// 	if ($this->form_validation->run() === true) {

	// 		$arrangedData = $this->arrangeModifierData($this->input->post());
	// 		echo '<pre>'; 
	// 		print_r($arrangedData);
	// 		echo '</pre>';
	// 		exit;
	// 		$groupid = $this->input->post('group_id', true);

	// 		$modifierData = [
	// 			'name'          => $this->db->escape_str($this->input->post('modifiersetname', true)),
	// 			'description'   => $this->db->escape_str($this->input->post('description', true)),
	// 			'is_required'   => $this->input->post('modifier_setting') ? 1 : 0,
	// 			'min_selection' => $this->input->post('modifier_setting') ? 1 : 0,
	// 			'updated_at'    => date('Y-m-d H:i:s'),
	// 		];

	// 		$this->db->trans_start();

	// 		// Insert or Update Modifier Set
	// 		if (empty($groupid)) {
	// 			$modifierData['created_at'] = date('Y-m-d H:i:s');
	// 			$this->db->insert('modifier_groups', $modifierData);
	// 			$modifier_set_id = $this->db->insert_id();
	// 			$action = "created";
	// 		} else {
	// 			$this->db->where('id', $groupid)->update('modifier_groups', $modifierData);
	// 			$modifier_set_id = $groupid;
	// 			$action = "updated";
	// 		}

	// 		// Delete add-ons that were removed during edit
	// 		if (!empty($groupid)) {
	// 			$existingAddonIDs = array_column($arrangedData['food_menu'], 'modifier_id');
	// 			$this->db->where('modifier_set_id', $groupid);
	// 			if (!empty($existingAddonIDs)) {
	// 				$this->db->where_not_in('modifier_id', $existingAddonIDs);
	// 			}
	// 			$this->db->delete('add_ons');
	// 		}

	// 		// Process Add-ons
	// 		foreach ($arrangedData['food_menu'] as $addon) {

	// 			// Check if add-on already exists
	// 			$this->db->where([
	// 				'modifier_set_id' => $modifier_set_id,
	// 				'modifier_id'     => $addon['modifier_id'],
	// 			]);
	// 			$exists = $this->db->get('add_ons')->row();

	// 			$addonData = [
	// 				'modifier_set_id' => $modifier_set_id,
	// 				'add_on_name'     => $this->db->escape_str($addon['addon_name']),
	// 				'price'           => isset($addon['addonsprice']) ? $addon['addonsprice'] : 0,
	// 				'minqty'          => isset($addon['min_qty']) ? intval($addon['min_qty']) : 0,
	// 				'maxqty'          => isset($addon['max_qty']) ? intval($addon['max_qty']) : 0,
	// 				'is_comp'         => isset($addon['complementary']) ? 1 : 0,
	// 				'modifier_id'     => $addon['modifier_id'],
	// 				'is_food_item'    => $this->addons_model->check_id_existence($addon['modifier_id']),
	// 				'is_active'       => $addon['status'],
	// 			];

	// 			if ($exists) {
	// 				// Update existing add-on
	// 				$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
	// 				$addonid = $exists->id;
	// 			} else {
	// 				// Insert new add-on
	// 				$this->db->insert('add_ons', $addonData);
	// 				$addonid = $this->db->insert_id();
	// 			}

	// 			// Clean old ingredients
	// 			$this->db->where('add_on_id', $addonid)->delete('add_on_ingr_dtls');

	// 			// Insert ingredients if present
	// 			if (!empty($addon['ingredients'])) {
	// 				foreach ($addon['ingredients'] as $ingredient) {
	// 					$ingrData = [
	// 						'add_on_id'             => $addonid,
	// 						'modifier_set_id'       => $modifier_set_id,
	// 						'modifier_foodid'       => $ingredient['food_id'],
	// 						'modifier_ingr_id'      => $ingredient['ingredient_id'],
	// 						'modifier_ingr_qty'     => $ingredient['quantity'],
	// 						'modifier_ingr_adj_qty' => $ingredient['adjusted_qty'],
	// 						'modifier_ingr_unitname'=> $ingredient['unit_name'],
	// 						'modifier_ingr_unitid'  => $ingredient['unit_id'],
	// 						'created_at'            => date('Y-m-d H:i:s'),
	// 						'updated_at'            => date('Y-m-d H:i:s'),
	// 					];
	// 					$this->db->insert('add_on_ingr_dtls', $ingrData);
	// 				}
	// 			}
	// 		}

	// 		// Process Standalone Ingredients
	// 		if (!empty($arrangedData['ingredients'])) {
	// 			foreach ($arrangedData['ingredients'] as $ingredient) {

	// 				// Check if add-on exists
	// 				$this->db->where([
	// 					'modifier_set_id' => $modifier_set_id,
	// 					'modifier_id'     => $ingredient['modifier_id'],
	// 				]);
	// 				$exists = $this->db->get('add_ons')->row();

	// 				$addonData = [
	// 					'modifier_set_id' => $modifier_set_id,
	// 					'add_on_name'     => $this->db->escape_str($ingredient['addon_name']),
	// 					'price'           => isset($ingredient['addonsprice']) ? $ingredient['addonsprice'] : 0,
	// 					'minqty'          => isset($ingredient['min_qty']) ? intval($ingredient['min_qty']) : 0,
	// 					'maxqty'          => isset($ingredient['max_qty']) ? intval($ingredient['max_qty']) : 0,
	// 					'is_comp'         => isset($ingredient['complementary']) && $ingredient['complementary'] == 'on' ? 1 : 0,
	// 					'modifier_id'     => $ingredient['modifier_id'],
	// 					'is_food_item'    => $this->addons_model->check_id_existence($ingredient['modifier_id']),
	// 					'is_active'       => 1,
	// 				];

	// 				if ($exists) {
	// 					// Update if exists
	// 					$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
	// 					$addonid = $exists->id;
	// 				} else {
	// 					// Insert if new
	// 					$this->db->insert('add_ons', $addonData);
	// 					$addonid = $this->db->insert_id();
	// 				}

	// 				// Clean existing ingredients for this add-on
	// 				$this->db->where('add_on_id', $addonid)->delete('add_on_ingr_dtls');

	// 				// Insert new ingredient details
	// 				$ingrData = [
	// 					'add_on_id'             => $addonid,
	// 					'modifier_set_id'       => $modifier_set_id,
	// 					'modifier_ingr_id'      => $ingredient['modifier_id'],  // depends on schema
	// 					'modifier_ingr_qty'     => $ingredient['consumption'],
	// 					'modifier_ingr_adj_qty' => $ingredient['consumption'],
	// 					'modifier_ingr_unitname'=> $ingredient['unit'],
	// 					'modifier_ingr_unitid'  => $ingredient['unit_id'],
	// 					'created_at'            => date('Y-m-d H:i:s'),
	// 					'updated_at'            => date('Y-m-d H:i:s'),
	// 				];
	// 				$this->db->insert('add_on_ingr_dtls', $ingrData);
	// 			}
	// 		}

	// 		// Process Standalone Flavours
	// 		if (!empty($arrangedData['flavours'])) {
	// 			foreach ($arrangedData['flavours'] as $flavour) {

	// 				// Check if add-on exists
	// 				$this->db->where([
	// 					'modifier_set_id' => $modifier_set_id,
	// 					'add_on_name'     => $flavour['modifier_id'],
	// 				]);
	// 				$exists = $this->db->get('add_ons')->row();

	// 				$addonData = [
	// 					'modifier_set_id' => $modifier_set_id,
	// 					'add_on_name'     => $this->db->escape_str($flavour['addon_name']),
	// 					'price'           => isset($flavour['addonsprice']) ? $flavour['addonsprice'] : 0,
	// 					'minqty'          => isset($flavour['min_qty']) ? intval($flavour['min_qty']) : 0,
	// 					'maxqty'          => isset($flavour['max_qty']) ? intval($flavour['max_qty']) : 0,
	// 					'is_comp'         => isset($flavour['complementary']) && $flavour['complementary'] == 'on' ? 1 : 0,
	// 					'modifier_id'     => $flavour['modifier_id'],
	// 					'is_food_item'    => $this->addons_model->check_id_existence($flavour['modifier_id']),
	// 					'is_active'       => 1,
	// 				];

	// 				if ($exists) {
	// 					// Update if exists
	// 					$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
	// 					$addonid = $exists->id;
	// 				} else {
	// 					// Insert if new
	// 					$this->db->insert('add_ons', $addonData);
	// 					$addonid = $this->db->insert_id();
	// 				}
	// 			}
	// 		}


	// 		$this->db->trans_complete();

	// 		if ($this->db->trans_status() === FALSE) {
	// 			$this->session->set_flashdata('exception', 'Something went wrong, please try again.');
	// 		} else {
	// 			$this->session->set_flashdata('message', "Modifier Set {$action} successfully.");
	// 		}

	// 		redirect('itemmanage/menu_addons');

	// 	} else {
	// 		// Validation failed or first page load
	// 		if (!empty($id)) {
	// 			$data['title'] = 'Update Modifiers';
	// 			$modifiedGroups = $this->addons_model->findModifierGroupsById($id);
	// 			$data['addonsinfo'] = $this->singleObjectArray($modifiedGroups);
	// 		}
	// 		$data['module'] = "itemmanage";
	// 		$data['sub_header'] = 'modifiers';
	// 		$data['page'] = "addonscreate";
	// 		$this->load->view('template/layout', $data);
	// 	}
	// }

	public function create($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();

		$data['title'] = empty($id) ? 'Add Modifiers' : 'Update Modifiers';
		if (!empty($id)) {
			$data['group_id'] = $id;
		}

		// Validation
		$this->form_validation->set_rules('modifiersetname', 'Modifier Set Name', 'required|max_length[100]');
		$this->form_validation->set_rules('addonsname[]', 'Modifier Name', 'required');
		$this->form_validation->set_rules('status[]', 'Status', 'required|in_list[0,1]');

		if ($this->form_validation->run() === true) {

			// echo '<pre>';
			// print_r($this->input->post());
			// echo '</pre>';
			// exit;

			$arrangedData = $this->arrangeModifierData($this->input->post());
			$groupid = $this->input->post('group_id', true);
			$isMealDeal = $this->input->post('isMealDeal', true) ? 1 : 0;
			$mealModifierItemsSelect = $this->input->post('mealModifierItemsSelect', false) ?? 0;

			$idsCsv = $_POST['mealModifierSelectedItems'] ?? '';
			$modItemsCsv = $_POST['mealModifierSelectedItemsValue'] ?? '';
			$ids = array_filter(array_map('intval', explode(',', $idsCsv)));

			$modItemsArr = array_filter(array_map('intval', explode(',', $modItemsCsv)));
			//have to convert to array this data: [{"id":"86","name":"Palak","price":"2.00","minQty":"0","maxQty":"0"},{"id":"58","name":"Rogan Josh","price":"4.00","minQty":"0","maxQty":"0"},{"id":"43","name":"Kadahi Paneer","price":"2.00","minQty":"0","maxQty":"0"},{"id":"88","name":"Prawn Biryani","price":"0.00","minQty":"0","maxQty":"0"},{"id":"60","name":"Butter Chicken","price":"0.00","minQty":"0","maxQty":"0"},{"id":"45","name":"Vegetable Paneer Tikka Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"62","name":"Kadahi Chicken","price":"0.00","minQty":"0","maxQty":"0"},{"id":"47","name":"Butter Paneer","price":"0.00","minQty":"0","maxQty":"0"},{"id":"64","name":"Chicken Makhini","price":"0.00","minQty":"0","maxQty":"0"},{"id":"31","name":"Alu Gobi","price":"0.00","minQty":"0","maxQty":"0"},{"id":"49","name":"Paneer Tikka Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"33","name":"Bombay Potatoes","price":"0.00","minQty":"0","maxQty":"0"},{"id":"66","name":"Chicken Tikka Biryani","price":"0.00","minQty":"0","maxQty":"0"},{"id":"51","name":"Dhansak","price":"0.00","minQty":"0","maxQty":"0"},{"id":"36","name":"Malai Kofta","price":"0.00","minQty":"0","maxQty":"0"},{"id":"68","name":"Goat Curry","price":"0.00","minQty":"0","maxQty":"0"},{"id":"53","name":"Madras","price":"0.00","minQty":"0","maxQty":"0"},{"id":"38","name":"Alu or Paneer Palak","price":"0.00","minQty":"0","maxQty":"0"},{"id":"83","name":"Malai","price":"0.00","minQty":"0","maxQty":"0"},{"id":"55","name":"Ceylon","price":"0.00","minQty":"0","maxQty":"0"},{"id":"40","name":"Dhal Palak","price":"0.00","minQty":"0","maxQty":"0"},{"id":"85","name":"Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"57","name":"Punjabi Delight","price":"0.00","minQty":"0","maxQty":"0"},{"id":"42","name":"Dhal Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"87","name":"Tikka Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"59","name":"Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"44","name":"Butter Matar Paneer","price":"0.00","minQty":"0","maxQty":"0"},{"id":"61","name":"Chicken Tikka Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"46","name":"Alu Matar Madras","price":"0.00","minQty":"0","maxQty":"0"},{"id":"63","name":"Chicken Or Lamb Palak","price":"0.00","minQty":"0","maxQty":"0"},{"id":"48","name":"Shahi Paneer","price":"0.00","minQty":"0","maxQty":"0"},{"id":"32","name":"Mixed Vegetable Curry","price":"0.00","minQty":"0","maxQty":"0"},{"id":"65","name":"Mango Chicken","price":"0.00","minQty":"0","maxQty":"0"},{"id":"50","name":"Mushroom Malai","price":"0.00","minQty":"0","maxQty":"0"},{"id":"35","name":"Channa Masala","price":"0.00","minQty":"0","maxQty":"0"},{"id":"67","name":"Chicken Tikka Jalfrezi","price":"0.00","minQty":"0","maxQty":"0"},{"id":"52","name":"Korma","price":"0.00","minQty":"0","maxQty":"0"},{"id":"37","name":"Alu Matar","price":"0.00","minQty":"0","maxQty":"0"},{"id":"69","name":"Mutton Keema Curry","price":"0.00","minQty":"0","maxQty":"0"},{"id":"54","name":"Vindaloo","price":"0.00","minQty":"0","maxQty":"0"},{"id":"39","name":"Dhal Makhini","price":"0.00","minQty":"0","maxQty":"0"},{"id":"84","name":"Vindaloo","price":"0.00","minQty":"0","maxQty":"0"},{"id":"56","name":"Bhuna","price":"0.00","minQty":"0","maxQty":"0"}]
			$modItemsCsv = array_map(function($item) {
				return json_decode($item, true);
			}, explode(',', $modItemsCsv));

			$raw = $this->input->post('mealModifierSelectedItemsValue', true);   // or whatever key you used

			// Decode to ASSOCIATIVE array
			$items = json_decode($raw, true);

			if (json_last_error() !== JSON_ERROR_NONE || !is_array($items)) {
				// handle bad/empty JSON
				show_error('Invalid items payload');
			}

			$rows = array_map(function ($r) {
				return [
					'item_id'    => (int)$r['id'],
					'name'       => $r['name'],
					'price'      => (float)$r['price'],
					'min_qty'    => (int)$r['minQty'],
					'max_qty'    => (int)$r['maxQty'],
					'created_at' => date('Y-m-d H:i:s'),
				];
			}, $items);

			// echo 'arrangedData(food_menu): <br /><pre>';
			// print_r($rows);
			// echo '</pre><br />';
			// echo 'Meal Deal Selected Ids: <br /><pre>';
			// print_r($ids);
			// echo '</pre>';
			// exit;

			$modifierData = [
				'name'          	=> $this->db->escape_str($this->input->post('modifiersetname', true)),
				'description'   	=> $this->db->escape_str($this->input->post('description', true)),
				'is_required'   	=> $this->input->post('modifier_setting') ? 1 : 0,
				'min_selection' 	=> $this->input->post('modifier_setting') ? 1 : 0,
				'isMealDeal' 		=> $isMealDeal,
				'meal_deal_item_id' => $mealModifierItemsSelect,
				'updated_at'    	=> date('Y-m-d H:i:s')
			];

			$this->db->trans_start();
			// Create or Update Modifier Set
			if (empty($groupid)) {
				$modifierData['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('modifier_groups', $modifierData);
				$modifier_set_id = $this->db->insert_id();
				$action = "created";
			} else {
				$this->db->where('id', $groupid)->update('modifier_groups', $modifierData);
				$modifier_set_id = $groupid;
				$action = "updated";
			}

			// Delete removed add-ons
			if (!empty($groupid)) {
				$existingAddonIDs = array_column($arrangedData['food_menu'], 'modifier_id');
				$this->db->where('modifier_set_id', $groupid);
				if (!empty($existingAddonIDs)) {
					$this->db->where_not_in('modifier_id', $existingAddonIDs);
				}
				$this->db->delete('add_ons');
			}

			if ($isMealDeal==1 && count($rows)>0) {
				//delete existing meal deal items
				$this->db->where('modifier_set_id', $modifier_set_id);
				$this->db->delete('add_ons');
				// Insert or Update Meal Deal Items
				foreach ($rows as $row) {
					if ((count($ids)>0) && (in_array($row['item_id'], $ids))) {
						// continue; // Skip if not selected in meal deal
						// }
						// Check if meal deal item already exists
						$this->db->where([
							'modifier_set_id' => $modifier_set_id,
							'modifier_id'     => $row['item_id'],
						]);
						$exists = $this->db->get('add_ons')->row();

						$addonData = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $this->db->escape_str($row['name']),
							'price'           => $row['price'],
							'minqty'          => $row['min_qty'],
							'maxqty'          => $row['max_qty'],
							'is_comp'         => 0, // Meal deals are not complementary
							'modifier_id'     => $row['item_id'],
							'is_food_item'    => 1, // Assuming all meal deal items are food items
							'is_active'       => 1, // Active by default
						];

						if ($exists) {
							$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
						} else {
							$this->db->insert('add_ons', $addonData);
						}
					}
				}
			} else {
				// Handle Add-ons
				foreach ($arrangedData['food_menu'] as $addon) {
					if ((count($ids)>0) && (in_array($addon['modifier_id'], $ids))) {
						// 	continue; // Skip if not selected in meal deal
						// }
			
						$addon['modifier_id'] = $addon['modifier_id'] == 0 ? $modifier_set_id : $addon['modifier_id'];

						$this->db->where([
							'modifier_set_id' => $modifier_set_id,
							'modifier_id'     => $addon['modifier_id'],
						]);
						$exists = $this->db->get('add_ons')->row();

						$addonData = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $this->db->escape_str($addon['addon_name']),
							'price'           => isset($addon['addonsprice']) ? $addon['addonsprice'] : 0,
							'minqty'          => isset($addon['min_qty']) ? intval($addon['min_qty']) : 0,
							'maxqty'          => isset($addon['max_qty']) ? intval($addon['max_qty']) : 0,
							'is_comp'         => !empty($addon['complementary']) ? 1 : 0,
							'modifier_id'     => $addon['modifier_id'],
							'is_food_item'    => $this->addons_model->check_id_existence($addon['modifier_id']),
							'is_active'       => $addon['status'],
						];

						if ($exists) {
							$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
							$addonid = $exists->add_on_id;
						} else {
							$this->db->insert('add_ons', $addonData);
							$addonid = $this->db->insert_id();
						}

						$this->db->where('add_on_id', $addonid)->delete('add_on_ingr_dtls');

						if (!empty($addon['ingredients'])) {
								
							foreach ($addon['ingredients'] as $ingredient) {
								$this->db->insert('add_on_ingr_dtls', [
									'add_on_id'             => $addonid,
									'modifier_set_id'       => $modifier_set_id,
									'modifier_foodid'       => $ingredient['food_id'],
									'modifier_ingr_id'      => $ingredient['ingredient_id'],
									'modifier_ingr_qty'     => $ingredient['quantity'],
									'modifier_ingr_adj_qty' => $ingredient['adjusted_qty'],
									'modifier_ingr_unitname'=> $ingredient['unit_name'],
									'modifier_ingr_unitid'  => $ingredient['unit_id'],
									'created_at'            => date('Y-m-d H:i:s'),
									'updated_at'            => date('Y-m-d H:i:s'),
								]);
							}
						}
					}
				}
			}

			// Standalone Ingredients
			if (!empty($arrangedData['ingredients'])) {

				foreach ($arrangedData['ingredients'] as $ingredient) {
					$this->db->where([
						'modifier_set_id' => $modifier_set_id,
						'modifier_id'     => $ingredient['modifier_id'],
					]);
					$exists = $this->db->get('add_ons')->row();

					$addonData = [
						'modifier_set_id' => $modifier_set_id,
						'add_on_name'     => $this->db->escape_str($ingredient['addon_name']),
						'price'           => $ingredient['addonsprice'] ?? 0,
						'minqty'          => intval($ingredient['min_qty'] ?? 0),
						'maxqty'          => intval($ingredient['max_qty'] ?? 0),
						'is_comp'         => !empty($ingredient['complementary']) ? 1 : 0,
						'modifier_id'     => $ingredient['modifier_id'],
						'is_food_item'    => $this->addons_model->check_id_existence($ingredient['modifier_id']),
						'is_active'       => 1,
					];

					if ($exists) {
						$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
						$addonid = $exists->add_on_id;
					} else {
						$this->db->insert('add_ons', $addonData);
						$addonid = $this->db->insert_id();
					}

					$this->db->where('add_on_id', $addonid)->delete('add_on_ingr_dtls');

					$this->db->insert('add_on_ingr_dtls', [
						'add_on_id'             => $addonid,
						'modifier_set_id'       => $modifier_set_id,
						'modifier_ingr_id'      => $ingredient['modifier_id'],
						'modifier_ingr_qty'     => $ingredient['consumption'],
						'modifier_ingr_adj_qty' => $ingredient['consumption'],
						'modifier_ingr_unitname'=> $ingredient['unit'],
						'modifier_ingr_unitid'  => $ingredient['unit_id'],
						'created_at'            => date('Y-m-d H:i:s'),
						'updated_at'            => date('Y-m-d H:i:s'),
					]);
				}
			}

			// Standalone Flavours
			if (!empty($arrangedData['flavours'])) {

				foreach ($arrangedData['flavours'] as $flavour) {
					$modifier_id = $flavour['modifier_id'] == 0 ? $modifier_set_id : $flavour['modifier_id'];

					$this->db->where('add_on_name', $flavour['addon_name']);
					$this->db->where('add_on_id', $modifier_id);
					$this->db->where('is_food_item', 0);
					$exists = $this->db->get('add_ons')->row();

					if ($exists) {
						$addonData = [
							'add_on_name'     => $this->db->escape_str($flavour['addon_name']),
							'price'           => $flavour['addonsprice'] ?? 0,
							'minqty'          => intval($flavour['min_qty'] ?? 0),
							'maxqty'          => intval($flavour['max_qty'] ?? 0),
							'is_comp'         => !empty($flavour['complementary']) ? 1 : 0,
							'is_active'       => 1,
						];

						$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
					} else {
						
						$addonData = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $this->db->escape_str($flavour['addon_name']),
							'price'           => $flavour['addonsprice'] ?? 0,
							'minqty'          => intval($flavour['min_qty'] ?? 0),
							'maxqty'          => intval($flavour['max_qty'] ?? 0),
							'is_comp'         => !empty($flavour['complementary']) ? 1 : 0,
							'is_active'       => 1,
						];

						$this->db->insert('add_ons', $addonData);
					}
				}
			}


			// Fallback: If all main addon types are empty, update existing addons based on add_on_id
			if (
				empty($arrangedData['ingredients']) &&
				empty($arrangedData['flavours']) &&
				empty($arrangedData['food_menu']) &&
				!empty($arrangedData['add_on_id'])
			) {

				foreach ($arrangedData['add_on_id'] as $addon) {
					if (!empty($addon['modifier_id']) && !empty($addon['addon_name'])) {
						$this->db->where('add_on_id', $addon['modifier_id']);
						$this->db->where('add_on_name', $addon['addon_name']);
						$exists = $this->db->get('add_ons')->row();

						$addonData = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $this->db->escape_str($addon['addon_name']),
							'price'           => isset($addon['addonsprice']) ? $addon['addonsprice'] : 0,
							'minqty'          => isset($addon['min_qty']) ? intval($addon['min_qty']) : 0,
							'maxqty'          => isset($addon['max_qty']) ? intval($addon['max_qty']) : 0,
							'is_comp'         => !empty($addon['complementary']) ? 1 : 0,
							'is_active'       => 1,
						];

						if ($exists) {
							$this->db->where('add_on_id', $exists->add_on_id)->update('add_ons', $addonData);
						}
					}
				}
			}


			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$this->session->set_flashdata('exception', 'Something went wrong, please try again.');
			} else {
				$this->session->set_flashdata('message', "Modifier Set {$action} successfully.");
			}

			redirect('itemmanage/menu_addons');
		} else {
			// Validation or first load
			if (!empty($id)) {
				$data['title'] = 'Update Modifiers';
				$modifiedGroups = $this->addons_model->findModifierGroupsById($id);
				// echo '<pre>';
				// print_r($modifiedGroups);
				// echo '</pre>';
				// exit;
				$data['addonsinfo'] = $this->singleObjectArray($modifiedGroups);
				// echo '<pre>';
				// print_r($data['addonsinfo']);
				// echo '</pre>';
				// exit;
			}
			$data['module'] = "itemmanage";
			$data['sub_header'] = 'modifiers';
			$data['page'] = "addonscreate";
			$data['categories'] = $this->addons_model->allcategory_dropdown();
			$this->load->view('template/layout', $data);
		}
	}




	
    public function delete($addons = null)
    {
        $this->permission->module('itemmanage','delete')->redirect();
		$logData = [
	   'action_page'         => "Add-ons List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Add-ons Deleted",
	   'user_name'           => $this->session->userdata('fullname',true),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
		if ($this->addons_model->addons_delete($addons)) {
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('itemmanage/menu_addons/index');
    }

	public function deleteModifiers($id = null)
	{
		//$this->permission->module('itemmanage', 'delete')->redirect();
		

		if (!$id) {
			$this->session->set_flashdata('exception', display('invalid_request'));
			redirect('itemmanage/menu_addons/index');
			return;
		}

		$logData = [
			'action_page'   => "Add-ons List",
			'action_done'   => "Delete Data",
			'remarks'       => "Add-ons Deleted",
			'user_name'     => $this->session->userdata('fullname', true),
			'entry_date'    => date('Y-m-d H:i:s'),
		];

		// Fetch add-ons associated with this modifier set ID
		$addons = $this->addons_model->get_addons_bymodifiers($id);
		
		if (!$addons) {
			$this->session->set_flashdata('exception', display('no_addons_found'));
			redirect('itemmanage/menu_addons/index');
			return;
		}

		foreach ($addons as $addon) {

			if ($this->addons_model->addons_modifiers_delete($addon->add_on_id)) {
				
				$this->session->set_flashdata('message', display('delete_successfully'));
			} else {
				$this->session->set_flashdata('exception', display('please_try_again'));
			}
		}

		redirect('itemmanage/menu_addons/index');
	}


	private function taxchecking()
    {
    	$taxinfos = '';
    	if ($this->db->table_exists('tbl_tax')) {
    		$taxsetting = $this->db->select('*')->from('tbl_tax')->get()->row();
    	}
		if(!empty($taxsetting)){
    	if($taxsetting->tax == 1){
    	$taxinfos = $this->db->select('*')->from('tax_settings')->get()->result_array();
    		}
		}
          return $taxinfos;

    }
	//Assign Add-ons Part
	public function assignaddons($id = null)
    {
        
		$this->permission->method('itemmanage','read')->redirect();
        $data['title']    = display('assign_adons_list'); 
              
        #
        #pagination starts
        #
        $config["base_url"] = base_url('itemmanage/menu_addons/assignaddons');
        $config["total_rows"]  = $this->addons_model->count_menuaddons();
        $config["per_page"]    = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["addonsmenulist"] = $this->addons_model->read_menuaddons($config["per_page"], $page);
		$data["addonsmenulist2"] = $this->addons_model->read_menuaddons($config["per_page"], $page);
		$data["addonsmenulistgroups"] = $this->addons_model->read_allmodifieritemgroups($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		if(!empty($id)) {
		$data['title'] = display('update_adons');
		$data['addonsinfo']   = $this->addons_model->findById($id);
	   }
	    $data['menudropdown']   =  $this->addons_model->menu_dropdown();
		$data['addonsdropdown']   =  $this->addons_model->addons_dropdown();
        #
        #pagination ends
        #   
        $data['module'] = "itemmanage";
        $data['page']   = "assignaddons";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function assignaddonscreate($id = null)
    {
	  $this->permission->method('itemmanage','create')->redirect();
	  $data['title'] = display('assign_adons');
	  $this->form_validation->set_rules('addonsid', display('addonsname')  ,'required');
	  $this->form_validation->set_rules('menuid', display('item_name')  ,'required');
	  
	   
	   $savedid=$this->session->userdata('id');
	   $data['addons']   = (Object) $postData = [
	   'row_id'     => $this->input->post('row_id',true),
	   'add_on_id'     => $this->input->post('addonsid',true),
	   'menu_id'     	=> $this->input->post('menuid',true), 
	   'is_active'   => 1,
	  ];
	   
	 
	  if ($this->form_validation->run()) { 
	   if (empty($this->input->post('row_id'))) {
		$this->permission->method('itemmanage','create')->redirect();
	   $logData = [
	   'action_page'         => "Add-ons Assign",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "Assign New Add-ons To Menu",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
		if ($this->addons_model->menuaddons_create($postData)) { 
		$this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('itemmanage/menu_addons/assignaddons');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("itemmanage/menu_addons/assignaddons"); 
	
	   } else {
		$this->permission->method('itemmanage','update')->redirect();
		if(empty($img)){
			$img=$this->input->post('old_image');
			}
	   $logData = [
	   'action_page'         => "Add-ons Assign List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Add-ons Assign List Updated",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];

		if ($this->addons_model->update_menuaddons($postData)) { 
		
		$this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("itemmanage/menu_addons/assignaddons");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('update_adons');
		$data['addonsinfo']   = $this->addons_model->findById($id);
	   }
	   $data['module'] = "itemmanage";
	   $data['page']   = "assignaddons";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
 public function assignaddonsupdateinfo($id){
	  
		$this->permission->method('itemmanage','update')->redirect();
		$data['title'] = display('assign_adons_list');
		//$data['addonsinfo']   = $this->addons_model->findBymenuaddons($id);
		//$data['menudropdown']   =  $this->addons_model->menu_dropdown();
		$data['addonsinfo'] = $this->addons_model->get_addon_by_id($id);
        $data['menudropdown'] = $this->addons_model->read_fooditem(); // Fetch all menu items
		$data['addonsdropdown']   =  $this->addons_model->addons_dropdown();
        $data['module'] = "itemmanage";  
        $data['page']   = "assignaddonsedit";
		$this->load->view('itemmanage/assignaddonsedit', $data);   
    
	   }
 
    public function assignaddonsdelete($addons = null)
    {
        $this->permission->module('itemmanage','delete')->redirect();
		$logData = [
	   'action_page'         => "Add-ons List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Add-ons Assign Menu Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
	  	if ($this->addons_model->delete_by_group_id($addons)) {
		//if ($this->addons_model->menuaddons_delete($addons)) {
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('itemmanage/menu_addons/assignaddons');
    }

	public function addonsdelete($addons = null)
	{
		// Check user permissions
		$this->permission->module('itemmanage', 'delete')->redirect();

		// Load necessary models
		$this->load->model('addons_model');
		$this->load->model('logs_model');

		// Log action details
		$logData = [
			'action_page'     => "Add-ons List",
			'action_done'     => "Delete Data",
			'remarks'         => "Add-ons Assign Menu Deleted",
			'user_name'       => $this->session->userdata('fullname'),
			'entry_date'      => date('Y-m-d H:i:s'),
		];

		// Attempt to delete the add-on
		if ($this->addons_model->menuaddons_delete($addons)) {
			// Record deletion in logs
			$this->logs_model->log_recorded($logData);

			// Send success response
			echo json_encode(['status' => 'success', 'message' => display('delete_successfully')]);
		} else {
			// Send failure response
			echo json_encode(['status' => 'error', 'message' => display('please_try_again')]);
		}
	}


	private function singleObjectArray($originalArray){
		$result = [];
				$grouped = [];

				// Grouping by group_id
				foreach ($originalArray as $item) {
					$group_id = $item->group_id;
					$group_name = $item->name;
					$group_min_selection = $item->min_selection;
					$group_modifier_set_id = $item->modifier_set_id;
					if (!isset($grouped[$group_id])) {
						$grouped[$group_id] = (object) [
							'group_id' => $group_id,
							'name'	=> $group_name,
							'min_selection' => $group_min_selection,
							'modifier_set_id' => $group_modifier_set_id,
							'isMealDeal' => $item->isMealDeal,
							'meal_deal_item_id' => $item->meal_deal_item_id,
							'addons' => []
						];
					}
					
					// Remove group_id before adding to addons
					$addon = clone $item;
					// echo '<pre>';
					// print_r($addon);
					// echo '</pre>';
					// exit;
					unset($addon->group_id);
					unset($addon->name);
					unset($addon->min_selection);
					unset($addon->modifier_set_id);
					unset($addon->isMealDeal);
					unset($addon->meal_deal_item_id);
					$grouped[$group_id]->addons[] = $addon;
				}

				$result = array_values($grouped);

				return $result;
	}

	public function get_addons_by_group()
	{
		$group_id = $this->input->post('group_id');
		$addons = $this->addons_model->findByGroupsId($group_id);
		echo json_encode($addons);
	}

	public function assignaddonmodifieritems($id){
	  
		$this->permission->method('itemmanage','update')->redirect();
		$data['title'] = display('assign_adons_list');
		#$data['addonsinfo']   = $this->addons_model->findBymenuaddons($id);
		$data['menudropdown']   =  $this->addons_model->menu_dropdown_modifiers();
		//$data['addonsdropdown']   =  $this->addons_model->addons_dropdown();
		$data['addonsdropdown']   =  $this->addons_model->addons_dropdown_modifiers($id);
		$data['modifiergroup'] = $this->addons_model->getModifierGroupsById($id);
        $data['module'] = "itemmanage";  
        $data['page']   = "assignaddonsemodifiers";
		$this->load->view('itemmanage/assignaddonsemodifiers', $data);   
    
	}
	
	public function assignaddonscreatemultiple($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('assign_adons');

		// Validate multiple select fields correctly
		//$this->form_validation->set_rules('addonsid[]', display('addonsname'), 'required');
		$this->form_validation->set_rules('menuid[]', display('item_name'), 'required');

		$savedid = $this->session->userdata('id');
		
		//$addonsIds = $this->input->post('addonsid', true);
		$group_id = $this->input->post('group_id', true);
		$menuIds = $this->input->post('menuid', true);

		if ($this->form_validation->run()) {
			if (empty($this->input->post('row_id', true))) {
				$this->permission->method('itemmanage', 'create')->redirect();

				// Loop through addons and menu IDs to insert multiple records
				foreach ($menuIds as $menuId) {
						$postData = [
							//'add_on_id' => $addonId,
							'modifier_groupid' => $group_id,
							'menu_id'   => $menuId,
							'is_active' => 1,
						];

						$this->addons_model->menuaddons_create($postData);
				}

				// Logging the action
				$logData = [
					'action_page'  => "Add-ons Assign",
					'action_done'  => "Insert Data",
					'remarks'      => "Assigned multiple Add-ons to Menus",
					'user_name'    => $this->session->userdata('fullname'),
					'entry_date'   => date('Y-m-d H:i:s'),
				];
				$this->logs_model->log_recorded($logData);

				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('itemmanage/menu_addons/assignaddons');
			} else {

				$this->permission->method('itemmanage', 'update')->redirect();

				// Delete existing records for selected menu items before inserting new ones
				$this->addons_model->delete_by_group_id($group_id); 

				// Insert new records
				foreach ($menuIds as $menuId) {
						$postData = [
							//'add_on_id' => $addonId,
							'modifier_groupid' => $group_id,
							'menu_id'   => $menuId,
							'is_active' => 1,
						];

						$this->addons_model->menuaddons_create($postData);
				}

				// Logging update action
				$logData = [
					'action_page'  => "Add-ons Assign List",
					'action_done'  => "Update Data",
					'remarks'      => "Updated Add-ons Assign List",
					'user_name'    => $this->session->userdata('fullname'),
					'entry_date'   => date('Y-m-d H:i:s'),
				];
				$this->logs_model->log_recorded($logData);

				$this->session->set_flashdata('message', display('update_successfully'));
				redirect("itemmanage/menu_addons/assignaddons");
			}
		} else {
			if (!empty($id)) {
				$data['title'] = display('update_adons');
				$data['addonsinfo'] = $this->addons_model->findById($id);
			}
			$data['module'] = "itemmanage";
			$data['page']   = "assignaddons";
			echo Modules::run('template/layout', $data);
		}
	}

	public function search_modifiers()
	{
		$term = $this->input->get('term', true);

		if (!$term) {
			echo json_encode([]); // Return empty array if no term
			exit;
		}

		$food_items = $this->addons_model->search_food_items($term);
		$ingredients = $this->addons_model->search_ingredients($term);

		$modifiers = array_merge($food_items, $ingredients);

		// Ensure JSON response with correct header
		header('Content-Type: application/json');
		echo json_encode($modifiers, JSON_UNESCAPED_UNICODE);
		exit;
	}
	public function get_modifier_items()
	{
		// $term = $this->input->get('term', true);
		$cat_id = $this->input->get('categoryId', true);
		if (empty($cat_id)) {
			echo json_encode([]); // Return empty array if no term
			exit;
		}
		// Fetch food items based on category ID
		$food_items = $this->addons_model->get_food_items_by_category($cat_id);
		// Prepare the result array
		$result = [];
		foreach ($food_items as $item) {
			// echo "<pre>";
			// print_r($item);
			// echo "</pre><br>";
			// echo $item->ProductName;
			// echo $item->ProductsID;
			// exit;
			$result[] = [
				'name' => $item->ProductName,
				'id' => $item->ProductsID
			];
		}
		// Ensure JSON response with correct header
		header('Content-Type: application/json');
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
		exit;
	}

	
	public function get_modifier_details() {
        $foodid = $this->input->get('foodid', true);
        // if (empty($foodid)) {
        //     echo json_encode(['status' => 'error', 'message' => 'Invalid food ID']);
        //     return;
        // }

        $data = $this->addons_model->get_production_details($foodid);
		//$data =  $this->addons_model->get_ingredient_details($foodid);
        if (!empty($data)) {
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No ingredients found for this modifier.']);
        }
    }


	public function getingredientitem(){
		$csrf_token=$this->security->get_csrf_hash();
		$product_name 	= $this->input->post('product_name',true);
		$product_info 	= $this->addons_model->finditem($product_name);
	
		$list[''] = '';
		foreach ($product_info as $value) {
			$json_product[] = array('label'=>$value['ingredient_name'],'value'=>$value['id'],'uprice'=>$value['utotalprice']/$value['uquantity']);
		} 
		echo json_encode($json_product);
	}


	//Arrange Array
	function arrangeModifierData(array $postData) {
		$result = [
			'id' => $postData['id'] ?? null,
			'group_id' => $postData['group_id'] ?? null,
			'getModifierItem' => $postData['getModifierItem'] ?? null,
			'getModifierIngredientItem' => $postData['getModifierIngredientItem'] ?? null,
			'modifiersetname' => $postData['modifiersetname'] ?? null,
			'addon_ids' => $postData['addon_ids'] ?? null,
			'food_menu' => [],
			'ingredients' => [],
			'flavours' => []
		];

		// echo "<pre>";
		// print_r($postData);
		// echo "</pre>";
		// exit;
	
		if (!empty($postData['modifier_id']) && is_array($postData['modifier_id'])) {
	
			foreach ($postData['modifier_id'] as $index => $modifierId) {
	
				$addonId = $postData['addon_ids'][$index] ?? '';
				$addonName = $postData['addonsname'][$index] ?? '';
	
				// Only process if addon_name and modifier_id have values.
				if (!empty($addonName) && !empty($modifierId)) {
	
					// Check if this modifier_id is linked to food or ingredient.
					$type = $this->addons_model->check_id_existence($modifierId);  // 1 = FoodItem, 2 = Ingredient
	
					if ($type == 1) {
	
						// It's a food item — build ingredients inside if present.
						$ingredients = [];
						$foodKey = 'foodid_' . $modifierId;
	
						if (isset($postData[$foodKey]) && is_array($postData[$foodKey])) {
							foreach ($postData[$foodKey] as $i => $foodItem) {
								$ingredients[] = [
									'food_id' => $foodItem ?? null,
									'ingredient_id' => $postData['ingr_' . $modifierId][$i] ?? null,
									'quantity' => $postData['ingr_qty_' . $modifierId][$i] ?? null,
									'adjusted_qty' => $postData['ingr_adj_qty_' . $modifierId][$i] ?? null,
									'unit_name' => $postData['ingr_unitname_' . $modifierId][$i] ?? null,
									'unit_id' => $postData['ingr_unitid_' . $modifierId][$i] ?? null,
								];
							}
						}
	
						$result['food_menu'][] = [
							'modifier_id' => $modifierId,
							'addon_name' => $addonName,
							'min_qty' => $postData['minqty'][$index] ?? '',
							'max_qty' => $postData['maxqty'][$index] ?? '',
							'status' => $postData['status'][$index] ?? '',
							'sort_order' => $postData['sort_order'][$index] ?? '',
							'ingredients' => $ingredients,
							'addonsprice' => $postData['addonsprice'][$index] ?? 0,
						];
	
					} elseif ($type == 2) {
	
						// It's an ingredient.
						$result['ingredients'][] = [
							'modifier_id' => $modifierId,
							'addon_name' => $addonName,
							'consumption' => $postData['consumptiom'][$index] ?? '',
							'stock' => $postData['consumtion_ingrstock'][$index] ?? '',
							'unit_id' => $postData['consumption_unitid'][$index] ?? '',
							'unit' => $postData['consumption_unit'][$index] ?? '',
							'status' => $postData['status'][$index] ?? '',
							'sort_order' => $postData['sort_order'][$index] ?? ''
						];
	
					} else {
	
						// Not food, not ingredient = treat as flavours.
						$result['flavours'][] = [
							'modifier_id' => $modifierId,
							'addon_name' => $addonName,
							'status' => $postData['status'][$index] ?? '',
							'sort_order' => $postData['sort_order'][$index] ?? ''
						];
	
					}
	
				//} elseif (empty($addonId) && !empty($addonName)) {
				} elseif (!empty($addonName)) {
	
					// New record with no existing addon_id but valid addon_name — treat as new flavour.
					$result['flavours'][] = [
						'modifier_id' => $modifierId,
						'addon_name' => $addonName,
						'status' => $postData['status'][$index] ?? '',
						'sort_order' => $postData['sort_order'][$index] ?? ''
					];
				}
			}
		}
	
		return $result;
	}
		

}
