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
    }
}
?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<div class="row">
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
                <input type="hidden" name="getModifierIngredientItem" id="getModifierIngredientItem" value="<?php echo base_url('itemmanage/menu_addons/get_modifier_details'); ?>"/>
                <div class="row">
                    <!-- Modifier Set Name -->
                    <div class="col-lg-12">
                        <div class="form-group row modifiersetname">
                            <label for="modifiersetname" class="col-sm-4 col-form-label"><?php echo 'Modifier Set Name'; ?> *</label>
                            <div class="col-sm-8">
                                <input name="modifiersetname" class="form-control" type="text" placeholder="<?php echo 'Modifier Set Name'; ?>" id="modifiersetname" value="<?php echo (!empty($group_name) ? $group_name : ''); ?>">
                            </div>
                        </div>
                    </div>

                     <!-- Modifier Fields -->
                    <div class="col-lg-12 modifier-container sortable">
                        <?php if (!empty($addons)) {
                            foreach ($addons as $addon) { ?>
                           
                            <div class="form-row align-items-end modifier-row">
                                <?php echo form_hidden('addon_ids[]', (!empty($addon->add_on_id) ? $addon->add_on_id : null)); ?>
                                <div class="form-group col-md-1 drag-handle">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Modifier *</label>
                                    <input name="addonsname[]" class="form-control modifierDropDown" type="text" placeholder="Modifier Name" value="<?php echo $addon->add_on_name; ?>">
                                    <input type="hidden" class="modifierId" name="modifier_id[]" value="<?php echo $addon->modifier_id; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price </label>
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price" value="<?php echo $addon->price; ?>" <?php echo $addon->is_comp==1 ? 'disabled' : ''; ?>>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Min </label>
                                    <input name="minqty[]" class="form-control" type="number" value="<?php echo $addon->minqty; ?>" placeholder="Minimum Quantity">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Max </label>
                                    <input name="maxqty[]" class="form-control" type="number" value="<?php echo $addon->maxqty; ?>" placeholder="Maximum Quantity">
                                </div>
                            <?php 
                                    $ingr_add_on_dtls = get_add_on_ingredient_details($addon->add_on_id, $addon->modifier_id); // Call the function to get ingredient details
                                    if(!empty($addon->modifier_id)){ ?>

                                        <div class="form-group col-md-2 consumptionbox">
                                            <label>Consumption</label>
                                            <input type="text" name="consumptiom[]" class="form-control consumption" value="<?php echo $ingr_add_on_dtls->modifier_ingr_adj_qty; ?>" />
                                            <input type="hidden" name="consumtion_ingrstock[]" class="form-control consumtion_ingrstock" value="<?php echo $ingr_add_on_dtls->modifier_ingr_qty; ?>" />
                                        </div>
                                        <div class="form-group col-md-2 consumptionunitbox">
                                            <label>Unit</label>
                                            <input type="hidden" name="consumption_unitid[]" class="form-control consumptionunitid" value="<?php echo $ingr_add_on_dtls->modifier_ingr_unitid; ?>"  />
                                            <input type="text" name="consumption_unit[]" class="form-control consumptionunit" value="<?php echo $ingr_add_on_dtls->modifier_ingr_unitname; ?>"  readonly/>
                                        </div>

                            <?php }
                            ?>
         

                                <div class="form-group col-md-2">
                                    <label>Is Complementary</label>
                                    <input type="checkbox" name="complementary[]" class="form-check-input isComplementary" <?php echo $addon->is_comp==1 ? 'checked' : ''; ?>/>
                                </div>

                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-success mt-4 viewModifiers" style="margin-top:20px;">View Recipe</button>
                                </div>
                                <div class="form-group col-md-2" style="display:none;">
                                    <label>Status</label>
                                    <select name="status[]" class="form-control">
                                        <option value="1" <?php echo ($addon->is_active == 1) ? "selected" : ""; ?>>Active</option>
                                        <option value="0" <?php echo ($addon->is_active == 0) ? "selected" : ""; ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-left">
                                    <button type="button" id="<?php echo !empty($addon->add_on_id) ? $addon->add_on_id : ''; ?>" class="btn btn-danger remove-row mt-4">&times;</button>
                                </div>
                                <!-- Hidden field to store order -->
                                <input type="hidden" name="sort_order[]" class="sort-order" value="">
                            </div>
                        <?php }
                        } else { ?>
                            <div class="form-row align-items-end modifier-row" id="modifierRow_1">
                                <div class="form-group col-md-1 drag-handle">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Modifier *</label>
                                    <input name="addonsname[]" class="form-control modifierDropDown" type="text" placeholder="Modifier Name">
                                    <input type="hidden" class="modifierId" name="modifier_id[]" value="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Price </label>
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Min </label>
                                    <input name="minqty[]" class="form-control" type="number" value="1" placeholder="Minimum Quantity">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Max </label>
                                    <input name="maxqty[]" class="form-control" type="number" value="1" placeholder="Maximum Quantity">
                                </div>

                                <div class="form-group col-md-2 consumptionbox" style="display:none;">
                                    <label>Consumption</label>
                                    <input type="text" name="consumptiom[]" class="form-control consumption" />
                                    <input type="hidden" name="consumtion_ingrstock[]" class="form-control consumtion_ingrstock" />
                                </div>
                                <div class="form-group col-md-2 consumptionunitbox" style="display:none;">
                                    <label>Unit</label>
                                    <input type="hidden" name="consumption_unitid[]" class="form-control consumptionunitid" />
                                    <input type="text" name="consumption_unit[]" class="form-control consumptionunit" readonly/>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Is Complementary</label>
                                    <input type="checkbox" name="complementary[]" class="form-check-input isComplementary" />
                                </div>

                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-success mt-4 viewModifiers" style="margin-top:20px;">View Recipe</button>
                                </div>


                                <div class="form-group col-md-2" style="display:none;">
                                    <label>Status</label>
                                    <select name="status[]" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-2 text-left">
                                    <button type="button" class="btn btn-danger remove-row mt-4">&times;</button>
                                </div>
                                <!-- Hidden field to store order -->
                                <input type="hidden" name="sort_order[]" class="sort-order" value="">
                            </div>

                        <?php } ?>
                    </div>

                    <!-- "Add Modifiers" Button -->
                    <div class="col-lg-12 text-left mt-2">
                        <button type="button" class="btn btn-success add-row"><?php echo 'Add Modifiers'; ?></button>
                    </div>

                    <!-- Settings Section -->
                    <div class="col-lg-12 mt-5 modifiersettings">
                        <h5 class="border-bottom pb-2">Settings</h5>
                        <div class="form-group row mt-4">
                            <label for="modifier_setting" class="col-sm-4 col-form-label"><?php echo 'Customer can select one modifier'; ?> *</label>
                            <div class="col-sm-8">
                                <!-- Bootstrap 5 Switch -->
                                <div class="form-check form-switch">
                                    <input id="modifier_setting" name="modifier_setting" class="form-check-input" type="checkbox" data-toggle="toggle" data-style="mr-1" <?php echo (!empty($modifier_setting) && $modifier_setting==1) ?  'checked' : ''; ?>>
                                    <label for="modifier_setting" class="form-check-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit & Reset Buttons -->
                    <div class="col-lg-12">
                        <div class="form-group text-right mt-3">
                            <button type="reset" class="btn btn-primary"><?php echo display('reset'); ?></button>
                            <button type="submit" class="btn btn-success"><?php echo isset($group_id) && !empty($group_id) ? 'Update' : display('Add'); ?></button>
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
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 15px;
    }
    .remove-row {
        margin-top: 21px !important;
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