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
	
	/*
    public function create($id = null)
    {
	  $this->permission->method('itemmanage','create')->redirect();
	  //$data['title'] = display('add_adons');
	  $data['title'] = 'Add Modifiers';
	  $this->form_validation->set_rules('addonsname', display('addonsname')  ,'required|max_length[100]');
	  $this->form_validation->set_rules('addonsprice', display('price')  ,'required');
	  $this->form_validation->set_rules('status', display('status')  ,'required');
	  
	   
	   $savedid=$this->session->userdata('id');
	   $data['addons']   = (Object) $postData = [
	   'add_on_id'     => $this->input->post('add_on_id',true),
	   'add_on_name'     	=> $this->input->post('addonsname',true), 
	   'price'           =>$this->input->post('addonsprice',true),
	   'is_active'   => $this->input->post('status',true),
	  ];
	   $taxsettings = $this->taxchecking();
		if(!empty($taxsettings)){
			$tx=0;
			$taxitems= array();
			foreach ($taxsettings as $taxitem) {
				$filedtax = 'tax'.$tx;
					$taxitems[$filedtax] = $this->input->post($filedtax,true);
				$tx++;
			}
			$postData = array_merge($postData,$taxitems);
		}
	 
	  if ($this->form_validation->run()) { 
	   if (empty($this->input->post('add_on_id'))) {
		$this->permission->method('itemmanage','create')->redirect();
	   $logData = [
	   'action_page'         => "Add Add-ons",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "New Add-ons is Created",
	   'user_name'           => $this->session->userdata('fullname',true),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
		if ($this->addons_model->addons_create($postData)) { 
		$this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('itemmanage/menu_addons/create');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("itemmanage/menu_addons/create"); 
	
	   } else {
		$this->permission->method('itemmanage','update')->redirect();
		if(empty($img)){
			$img=$this->input->post('old_image');
			}
	   $logData = [
	   'action_page'         => "Add-ons List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Add-ons Updated",
	   'user_name'           => $this->session->userdata('fullname',true),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
	
		if ($this->addons_model->update_addons($postData)) { 
		$this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("itemmanage/menu_addons/create/".$postData['add_on_id']);  
	   }
	  } else { 
	  $data['taxitems'] = $this->taxchecking();
	   if(!empty($id)) {
		//$data['title'] = display('update_adons');
		$data['title'] = 'Update Modifiers';
		$data['addonsinfo']   = $this->addons_model->findById($id);
	   }
	   $data['module'] = "itemmanage";
	   $data['page']   = "addonscreate";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    } */

	/*public function create($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = empty($id) ? 'Add Modifiers' : 'Update Modifiers';

		// Set validation rules
		$this->form_validation->set_rules('modifiersetname', 'Modifier Set Name', 'required|max_length[100]');
		$this->form_validation->set_rules('addonsname[]', 'Modifier Name', 'required');
		$this->form_validation->set_rules('addonsprice[]', 'Price', 'required|numeric');
		$this->form_validation->set_rules('status[]', 'Status', 'required');

		if ($this->form_validation->run() === true) {
			$savedid = $this->session->userdata('id');

			// Modifier Group Data
			$modifierData = [
				'name'          => $this->input->post('modifiersetname', true),
				'description'   => $this->input->post('description', true),
				'is_required'   => $this->input->post('modifier_setting') ? 1 : 0,
				'min_selection' => $this->input->post('modifier_setting') ? 1 : 0,
				'updated_at'    => date('Y-m-d H:i:s')
			];

			if (empty($id)) {
				// Insert new modifier set
				$modifierData['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('modifier_groups', $modifierData);
				$modifier_set_id = $this->db->insert_id();
				$action = "created";
			} else {
				// Update existing modifier set
				$this->db->where('id', $id);
				$this->db->update('modifier_groups', $modifierData);
				$modifier_set_id = $id;
				$action = "updated";

				// Delete existing add-ons for this modifier set to prevent duplicates
				$this->db->where('modifier_set_id', $id);
				$this->db->delete('add_ons');
			}

			// Process Add-ons
			$addonsname  = $this->input->post('addonsname', true);
			$addonsprice = $this->input->post('addonsprice', true);
			$status      = $this->input->post('status', true);
			$sort_order  = $this->input->post('sort_order', true);

			if (!empty($addonsname)) {
				$addonDataBatch = [];
				foreach ($addonsname as $key => $name) {
					if (!empty($name)) {
						$addonDataBatch[] = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $name,
							'price'           => !empty($addonsprice[$key]) ? $addonsprice[$key] : 0.00,
							'sort_order'      => !empty($sort_order[$key]) ? $sort_order[$key] : 0,
							'is_active'       => !empty($status[$key]) ? $status[$key] : 1
						];
					}
				}

				if (!empty($addonDataBatch)) {
					$this->db->insert_batch('add_ons', $addonDataBatch);
				}
			}

			$this->session->set_flashdata('message', "Modifier set {$action} successfully!");
			redirect('itemmanage/menu_addons');
		} else {
			// Load data for edit
			if (!empty($id)) {
				$data['title'] = 'Update Modifiers';
				$modifiedGroups  = $this->addons_model->findModifierGroupsById($id);
				$data['addonsinfo'] = $this->singleObjectArray($modifiedGroups);
			}

			$data['module'] = "itemmanage";
	   		$data['page']   = "addonscreate";
			$this->load->view('template/layout', $data);
		}
	} */

	public function create($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = empty($id) ? 'Add Modifiers' : 'Update Modifiers';

		// Set validation rules
		$this->form_validation->set_rules('modifiersetname', 'Modifier Set Name', 'required|max_length[100]');
		$this->form_validation->set_rules('addonsname[]', 'Modifier Name', 'required');
		$this->form_validation->set_rules('status[]', 'Status', 'required|in_list[0,1]');

		if ($this->form_validation->run() === true) {
			$savedid = $this->session->userdata('id');

			//Get Group id
			$groupid = $this->input->post('group_id');

			// Modifier Group Data
			$modifierData = [
				'name'          => $this->db->escape_str($this->input->post('modifiersetname', true)),
				'description'   => $this->db->escape_str($this->input->post('description', true)),
				'is_required'   => $this->input->post('modifier_setting') ? 1 : 0,
				'min_selection' => $this->input->post('modifier_setting') ? 1 : 0,
				'updated_at'    => date('Y-m-d H:i:s')
			];

			// Start Database Transaction
			$this->db->trans_start();

			if (empty($groupid)) {
				// Insert new modifier set
				$modifierData['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('modifier_groups', $modifierData);
				$modifier_set_id = $this->db->insert_id();
				$action = "created";
			} else {
				// Update existing modifier set
				$this->db->where('id', $groupid);
				$this->db->update('modifier_groups', $modifierData);
				$modifier_set_id = $groupid;
				$action = "updated";
			}

			// Process Add-ons
			$addonsname  = $this->input->post('addonsname', true);
			$addonsprice = $this->input->post('addonsprice', true);
			$status      = $this->input->post('status', true);
			$sort_order  = $this->input->post('sort_order', true);
			$addon_ids   = $this->input->post('addon_ids', true); // Expecting hidden input field with addon IDs

			if (!empty($addonsname)) {
				foreach ($addonsname as $key => $name) {
					if (!empty($name)) {
						$addonData = [
							'modifier_set_id' => $modifier_set_id,
							'add_on_name'     => $this->db->escape_str($name),
							'price'           => isset($addonsprice[$key]) ? floatval($addonsprice[$key]) : 0.00,
							'sort_order'      => isset($sort_order[$key]) ? intval($sort_order[$key]) : 0,
							'is_active'       => isset($status[$key]) ? intval($status[$key]) : 1
						];
	
						if (!empty($groupid) && !empty($addon_ids[$key])) {
							
							// DELETE OLD ADD-ONS NOT IN THE UPDATED LIST
							if (!empty($groupid) && !empty($addon_ids)) {
								$this->db->where('modifier_set_id', $groupid);
								$this->db->where_not_in('add_on_id', $addon_ids);
								$this->db->delete('add_ons'); // Remove old add-ons that are not part of the update
							}
							// UPDATE existing add-on (only if $addon_ids[$key] exists)
							$this->db->where('add_on_id', $addon_ids[$key]);
							$this->db->update('add_ons', $addonData);
						} else {
							//INSERT new add-on when updating or creating
							$this->db->insert('add_ons', $addonData);
						}
					}
				}
			}
			

			// Complete transaction (commit or rollback)
			$this->db->trans_complete();

			if ($this->db->trans_status() === false) {
				$this->session->set_flashdata('error', "Error while saving modifier set!");
			} else {
				$this->session->set_flashdata('message', "Modifier set {$action} successfully!");
			}

			redirect('itemmanage/menu_addons');
		} else {
			// Load data for edit
			if (!empty($id)) {
				$data['title'] = 'Update Modifiers';
				$modifiedGroups  = $this->addons_model->findModifierGroupsById($id);
				$data['addonsinfo'] = $this->singleObjectArray($modifiedGroups);
			}

			$data['module'] = "itemmanage";
			$data['page']   = "addonscreate";
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
		$data['addonsinfo']   = $this->addons_model->findBymenuaddons($id);
		$data['menudropdown']   =  $this->addons_model->menu_dropdown();
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
		if ($this->addons_model->menuaddons_delete($addons)) {
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
							'addons' => []
						];
					}
					
					// Remove group_id before adding to addons
					$addon = clone $item;
					unset($addon->group_id);
					unset($addon->name);
					unset($addon->min_selection);
					unset($addon->modifier_set_id);
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
        $data['module'] = "itemmanage";  
        $data['page']   = "assignaddonsemodifiers";
		$this->load->view('itemmanage/assignaddonsemodifiers', $data);   
    
	}
	
	public function assignaddonscreatemultiple($id = null)
	{
		$this->permission->method('itemmanage', 'create')->redirect();
		$data['title'] = display('assign_adons');

		// Validate multiple select fields correctly
		$this->form_validation->set_rules('addonsid[]', display('addonsname'), 'required');
		$this->form_validation->set_rules('menuid[]', display('item_name'), 'required');

		$savedid = $this->session->userdata('id');
		
		$addonsIds = $this->input->post('addonsid', true);
		$menuIds = $this->input->post('menuid', true);

		if ($this->form_validation->run()) {
			if (empty($this->input->post('row_id', true))) {
				$this->permission->method('itemmanage', 'create')->redirect();

				// Loop through addons and menu IDs to insert multiple records
				foreach ($menuIds as $menuId) {
					foreach ($addonsIds as $addonId) {
						$postData = [
							'add_on_id' => $addonId,
							'menu_id'   => $menuId,
							'is_active' => 1,
						];

						$this->addons_model->menuaddons_create($postData);
					}
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
				foreach ($menuIds as $menuId) {
					$this->addons_model->delete_by_menu_id($menuId); // You need to create this function
				}

				// Insert new records
				foreach ($menuIds as $menuId) {
					foreach ($addonsIds as $addonId) {
						$postData = [
							'add_on_id' => $addonId,
							'menu_id'   => $menuId,
							'is_active' => 1,
						];

						$this->addons_model->menuaddons_create($postData);
					}
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


 
}
