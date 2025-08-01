<?php
// Initialize variables
$group_name = '';
$addons = [];

// Check if addonsinfo is not empty
if (!empty($addonsinfo)) {
    foreach ($addonsinfo as $group) {
        $group_id = $group->group_id;
        $group_name = $group->name;
        $addons = $group->addons; // Store addons array
        $modifier_setting = $group->min_selection;
        $isMealDeal = $group->isMealDeal;
        $meal_deal_item_id = $group->meal_deal_item_id;
    }
}
$this->db->select('recipe_feature_flag');
$this->db->from('common_setting');
$query = $this->db->get();
$recipe_feature_flag = $query->row()->recipe_feature_flag;
$variantOn=true;
if ($recipe_feature_flag == 1) {
    $variantOn=true;
} else {
    $variantOn=false;
}
function renderCategoryOptions($categories, $selectedID = null, $level = 0)
{
    foreach ($categories as $category) {
        $indent = str_repeat('--', $level); // Indentation for subcategories
        $selected = ($selectedID == $category->CategoryID) ? "selected" : "";
        echo "<option " . (($level == 0) ? 'class="bolden"' : (($level == 1) ? 'class="bolder"' : '')) . " value='{$category->CategoryID}' {$selected}><strong>{$indent} {$category->Name}</strong></option>";

        // Check if there are subcategories
        if (!empty($category->sub)) {
            renderCategoryOptions($category->sub, $selectedID, $level + 1);
        }
    }
}
?>
<!-- <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input {
  display: none;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 34px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  transition: .4s;
}

.slider:before {
  content: "";
  position: absolute;
  height: 16px;
  width: 16px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  border-radius: 50%;
  transition: .4s;
}

.switch input:checked + .slider {
  background-color: #2196F3;
}

.switch input:checked + .slider:before {
  transform: translateX(20px);
}
fieldset {
    border: 1px solid #ddd;
    padding: 10px;
    margin-top: 20px;
    border-radius: 5px;
    width: 100%;
}
legend {
    /* padding: 0 10px; */
    font-weight: bold;
    color: #333;
    border-bottom: none !important;
    width: auto !important;
    border: 1px solid #000;
    background: #e1e1e1;
    border-radius: 10px;
    padding: 5px;
    font-size: 1.3rem !important;
}
.fldsetCol {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}
.modifier-row label {
    font-size: 1.4rem;
}
.viewModifiers {
    background-color: #e3e3e3;
    color: #333;
    border: solid 1px #e3e3e3;
}
.viewModifiers:hover {
    background-color: #fff;
    color: #333;
    border: solid 1px #e3e3e3;
}
#mealModifierItemsSelect {
    display: none;
    width: 100%;
    margin-bottom: 20px;
}
.mtype {
        margin-left: 5px;
        /* Adds bottom space between columns */
    }

.bolder {
    font-weight: 650;
}

.bolden {
    font-weight: 800;
}
</style>
<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'modifiers'): ?>
        <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>

    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo 'Modifiers'; ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/menu_addons/create"); ?>

                <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                <?php echo form_hidden('group_id',  (!empty($group_id) ? $group_id : null)); ?>
                <input type="hidden" name="getModifierItem" id="getModifierItem" value="<?php echo base_url('itemmanage/menu_addons/search_modifiers'); ?>"/>
                <input type="hidden" name="getMealModifierItems" id="getMealModifierItems" value="<?php echo base_url('itemmanage/menu_addons/get_modifier_items'); ?>"/>
                <input type="hidden" name="getModifierIngredientItem" id="getModifierIngredientItem" value="<?php echo base_url('itemmanage/menu_addons/get_modifier_details'); ?>"/>
                <div class="row modifiersetname">
                    <!-- Modifier Set Name -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group row modifiersetname">
                            <div class="col-sm-5 col-md-5 text-right">
                                <label for="modifiersetname" class="col-form-label"><?php echo 'Modifier Set Name'; ?> *</label>
                            </div>
                            <div class="col-sm-7 col-md-7 text-left">
                                <input name="modifiersetname" class="form-control" type="text" placeholder="<?php echo 'Modifier Set Name'; ?>" id="modifiersetname" value="<?php echo (!empty($group_name) ? $group_name : ''); ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group row mt-4 modifiersetname" style="display:none;">
                            <div class="col-sm-7 col-md-7 text-right">
                                <label for="modifier_setting" class="col-form-label"><?php echo 'Atleast One Modifier Required?'; ?> *</label>
                            </div>
                            <div class="col-sm-5 col-md-5 text-left pt-3">
                                <div class="form-group" style="margin-bottom: -3px;margin-top: 7px;">
                                    <label class="switch">
                                        <input type="checkbox" name="modifier_setting" id="modifier_setting" class="form-check-input" data-toggle="toggle" data-style="mr-1" <?php echo (!empty($modifier_setting) && $modifier_setting==1) ?  'checked' : ''; ?>>
                                        <div class="slider"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 modifiersetname">
                            <div class="col-sm-7 col-md-7 text-right">
                                <label for="isMealDeal" class="col-form-label"><?php echo 'Meal Deal?'; ?> <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-5 col-md-5 text-left pt-3">
                                <div class="form-group" style="margin-bottom: -3px;margin-top: 7px;">
                                    <label class="switch">
                                        <input type="checkbox" name="isMealDeal" id="isMealDeal" class="form-check-input" data-toggle="toggle" data-style="mr-1" <?php echo (!empty($isMealDeal) && $isMealDeal==1) ?  'checked' : ''; ?>>
                                        <div class="slider"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 fldsetCol">
                    <fieldset>
                        <legend><?php echo 'Modifier Items'; ?></legend>
                     <!-- Modifier Fields -->
                    <div class="col-lg-12 col-md-12 col-sm-12 text-right mb-3">
                        <!-- <button class="btn btn-md btn-primary" id="mealModifierItemsSelectBtn" style="display: none;" onclick="getAllCategories();"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i>&nbsp;Select Items</button> -->
                        <select name="mealModifierItemsSelect" id="mealModifierItemsSelect" class="form-control" required="">
                            <option class="bolden" value="0" disabled <?php if(!empty($meal_deal_item_id)): ?>selected <?php endif; ?>><strong>--- Select Items ---</strong></option>
                            <?php renderCategoryOptions($categories, $meal_deal_item_id); ?>
                        </select>
                    </div>
                    <input type="hidden" name="mealModifierSelectedItems" id="mealModifierSelectedItems" value="" />
                    <input type="hidden" name="mealModifierSelectedItemsValue" id="mealModifierSelectedItemsValue" value="" />
                    <div class="col-lg-12 text-right mb-3" id="mealModItemsCount" style="display: none;">
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="form-row align-items-end d-flex" id="modifier-header" style="border-bottom: solid 1px #e1dbdb;margin-bottom: 15px;">
                            <!-- <div class="form-group col-md-1">
                                <span>&NonBreakingSpace;</span>
                            </div> -->
                            <div class="form-group col-md-2" style="display: flex;justify-content: flex-start;align-items: baseline;">
                                <input type="checkbox" name="modItemActiveAll" class="form-check-input isComplementary" id="modItemActiveAll" style="margin-right: 5px;" />
                                <label>Select All</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Modifier *</label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Price </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Min </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Max </label>
                            </div>
                            <div class="form-group col-md-2 consumptionbox" style="display:none;">
                                <label>Consumption</label>
                            </div>
                            <div class="form-group col-md-2 consumptionunitbox" style="display:none;">
                                <label>Unit</label>
                            </div>
                            
                            <?php if($variantOn): ?>
                            <!-- <div class="form-group col-md-2">
                                <label>Recipe</label>
                            </div> -->
                            <?php endif; ?>

                            <div class="form-group col-md-2">
                                <label>Action</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 modifier-container sortable">
                        <?php 
                        if (!empty($addons)) {
                            foreach ($addons as $addon) { ?>
                           
                            <div class="form-row align-items-end modifier-row <?php if(!empty($isMealDeal) && ($isMealDeal==1)): ?>food-item-row<?php endif; ?>" id="modifierRow_<?php echo !empty($addon->add_on_id) ? $addon->add_on_id : '1'; ?>">
                                <?php echo form_hidden('addon_ids[]', (!empty($addon->add_on_id) ? $addon->add_on_id : null)); ?>
                                <!-- <div class="form-group col-md-1 drag-handle">
                                    <span class="fa fa-bars"></span>
                                </div> -->
                                <div class="form-group col-md-2">
                                    <!-- <label style="font-size: 11px !important;">Complementary?</label> -->
                                    <input type="checkbox" name="complementary[]" class="form-check-input isComplementary" <?php echo $addon->is_comp==1 ? 'checked' : ''; ?> style="display: none; visibility:hidden;" />
                                    <input type="checkbox" name="modItemActive[]" class="form-check-input isComplementary" value="1" <?php if (!empty($addonsinfo)): ?>checked<?php endif; ?> />
                                </div>
                                <div class="form-group col-md-3">
                                    <!-- <label>Modifier *</label> -->
                                    <input name="addonsname[]" class="form-control modifierDropDown" type="text" placeholder="Modifier Name" value="<?php echo $addon->add_on_name; ?>">
                                    <input type="hidden" class="modifierId" name="modifier_id[]" value="<?php echo $addon->modifier_id; ?>">
                                    <input type="hidden" class="modifier_set_id" name="modifier_set_id[]" value="<?php echo $addon->modifier_set_id; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <!-- <label>Price </label> -->
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price" value="<?php echo $addon->price; ?>" <?php echo $addon->is_comp==1 ? 'disabled' : ''; ?>>
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <label>Min </label> -->
                                    <input name="minqty[]" class="form-control" type="number" value="<?php echo $addon->minqty; ?>" placeholder="Minimum Quantity">
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <label>Max </label> -->
                                    <input name="maxqty[]" class="form-control" type="number" value="<?php echo $addon->maxqty; ?>" placeholder="Maximum Quantity">
                                </div>
                            <?php 
                                $ingr_add_on_dtls = get_add_on_ingredient_details($addon->add_on_id, $addon->modifier_id); // Call the function to get ingredient details
                                if(!empty($addon->modifier_id)): ?>

                                    <div class="form-group col-md-2 consumptionbox" style="display: none;">
                                        <!-- <label>Consumption</label> -->
                                        <input type="text" name="consumptiom[]" class="form-control consumption" value="<?php echo $ingr_add_on_dtls->modifier_ingr_adj_qty; ?>" />
                                        <input type="hidden" name="consumtion_ingrstock[]" class="form-control consumtion_ingrstock" value="<?php echo $ingr_add_on_dtls->modifier_ingr_qty; ?>" />
                                    </div>
                                    <div class="form-group col-md-2 consumptionunitbox" style="display: none;">
                                        <!-- <label>Unit</label> -->
                                        <input type="hidden" name="consumption_unitid[]" class="form-control consumptionunitid" value="<?php echo $ingr_add_on_dtls->modifier_ingr_unitid; ?>"  />
                                        <input type="text" name="consumption_unit[]" class="form-control consumptionunit" value="<?php echo $ingr_add_on_dtls->modifier_ingr_unitname; ?>"  readonly/>
                                    </div>
                            <?php else: ?>
                                <div class="form-group col-md-2 consumptionbox" style="display:none;">
                                    <!-- <label>Consumption</label> -->
                                    <input type="text" name="consumptiom[]" class="form-control consumption" />
                                    <input type="hidden" name="consumtion_ingrstock[]" class="form-control consumtion_ingrstock" />
                                </div>
                                <div class="form-group col-md-2 consumptionunitbox" style="display:none;">
                                    <!-- <label>Unit</label> -->
                                    <input type="hidden" name="consumption_unitid[]" class="form-control consumptionunitid" />
                                    <input type="text" name="consumption_unit[]" class="form-control consumptionunit" readonly/>
                                </div>
                            <?php endif; ?>
                                <!-- <div class="form-group col-md-4">
                                    <label>Complementary?</label>
                                    <input type="checkbox" name="complementary[]" class="form-check-input isComplementary" <?php ##echo $addon->is_comp==1 ? 'checked' : ''; ?>/>
                                </div> -->

                                <!-- <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-success mt-4 viewModifiers" style="margin-top:20px;">View Recipe</button>
                                </div> -->
                                <div class="form-group col-md-2" style="display:none;">
                                    <!-- <label>Status</label> -->
                                    <select name="status[]" class="form-control">
                                        <option value="1" <?php echo ($addon->is_active == 1) ? "selected" : ""; ?>>Active</option>
                                        <option value="0" <?php echo ($addon->is_active == 0) ? "selected" : ""; ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-left">
                                    <button type="button" id="<?php echo !empty($addon->add_on_id) ? $addon->add_on_id : ''; ?>" class="btn btn-danger remove-row">&times;</button>
                                </div>
                                <!-- Hidden field to store order -->
                                <input type="hidden" name="sort_order[]" class="sort-order" value="">
                            </div>
                        <?php }
                        } else { ?>
                            <div class="form-row align-items-end modifier-row" id="modifierRow_1">
                                <!-- <div class="form-group col-md-1 drag-handle">
                                    <span class="fa fa-bars"></span>
                                </div> -->
                                <div class="form-group col-md-2">
                                    <!-- <label style="font-size: 11px !important;">Complementary?</label> -->
                                    <input type="checkbox" name="complementary[]" class="form-check-input isComplementary" style="display: none; visibility:hidden;" />
                                    <input type="checkbox" name="modItemActive[]" class="form-check-input isComplementary" value="1" />
                                </div>
                                <div class="form-group col-md-3">
                                    <!-- <label>Modifier *</label> -->
                                    <input name="addonsname[]" class="form-control modifierDropDown" type="text" placeholder="Modifier Name">
                                    <input type="hidden" class="modifierId" name="modifier_id[]" value="">
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <label>Price </label> -->
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price">
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <label>Min </label> -->
                                    <input name="minqty[]" class="form-control" type="number" value="1" placeholder="Minimum Quantity">
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <label>Max </label> -->
                                    <input name="maxqty[]" class="form-control" type="number" value="1" placeholder="Maximum Quantity">
                                </div>

                                <div class="form-group col-md-2 consumptionbox" style="display:none;">
                                    <!-- <label>Consumption</label> -->
                                    <input type="text" name="consumptiom[]" class="form-control consumption" />
                                    <input type="hidden" name="consumtion_ingrstock[]" class="form-control consumtion_ingrstock" />
                                </div>
                                <div class="form-group col-md-2 consumptionunitbox" style="display:none;">
                                    <!-- <label>Unit</label> -->
                                    <input type="hidden" name="consumption_unitid[]" class="form-control consumptionunitid" />
                                    <input type="text" name="consumption_unit[]" class="form-control consumptionunit" readonly/>
                                </div>
                                <?php if($variantOn): ?>
                                <!-- <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-success mt-4 viewModifiers" style="margin-top:20px;">View Recipe</button>
                                </div> -->
                                <?php endif; ?>

                                <div class="form-group col-md-2" style="display:none;">
                                    <!-- <label>Status</label> -->
                                    <select name="status[]" class="form-control"> 
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-2 text-left">
                                    <button type="button" class="btn btn-danger remove-row">&times;</button>
                                </div>
                                <!-- Hidden field to store order -->
                                <input type="hidden" name="sort_order[]" class="sort-order" value="">
                            </div>

                        <?php } ?>
                    </div>

                    <!-- "Add Modifiers" Button -->
                    <div class="col-lg-12 text-right mt-2">
                        <button type="button" class="btn btn-success add-row"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<?php echo 'Add more items'; ?></button>
                    </div>
                    </fieldset>
                    </div>
                    <!-- Settings Section -->
                    <!-- <div class="col-lg-12 mt-5 modifiersettings">
                        <h5 class="border-bottom pb-2">Settings</h5>
                        <div class="form-group row mt-4">
                            <label for="modifier_setting" class="col-sm-4 col-form-label"><?php ##echo 'Customer can select one modifier'; ?> *</label>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input id="modifier_setting" name="modifier_setting" class="form-check-input" type="checkbox" data-toggle="toggle" data-style="mr-1" <?php ##echo (!empty($modifier_setting) && $modifier_setting==1) ?  'checked' : ''; ?>>
                                    <label for="modifier_setting" class="form-check-label"></label>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Submit & Reset Buttons -->
                    <div class="col-lg-12">
                        <div class="form-group text-right mt-3">
                            <button type="reset" class="btn btn-primary"><?php echo display('reset'); ?></button>
                            <button type="submit" id="mod_sub_btn" class="btn btn-success"><?php echo isset($group_id) && !empty($group_id) ? '<i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Update' : '<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Submit'; ?></button>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Custom Style -->
<style>
    .sortable .modifier-row {
        cursor: grab;
        /* padding: 10px;
        margin-bottom: 5px; */
        display: flex;
    }
    .drag-handle {
        cursor: grab;
        font-size: 14px;
        padding: 25px;
        color: #d3d3d3;
    }
    .modifiersetname {
        /* border-bottom: 1px solid #e5e5e5; */
        padding-bottom: 20px;
    }
    .remove-row {
        /* margin-top: 21px !important; */
    }
    .modifiersettings{
        margin-top: 20px;
        border-top: 1px solid #e5e5e5;
        padding-top: 15px;
    }
    .closeBtnIng{
        cursor: pointer;
    }
    
</style>

<!-- jQuery for Add/Remove Modifier Rows -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addonscreate_script.js'); ?>" type="text/javascript"></script>