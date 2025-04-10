<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <?php echo form_open('setting/ingradient/create'); ?>
                    <?php echo form_hidden('id', (!empty($intinfo->id) ? $intinfo->id : null)); ?>
                    <input type="hidden" name="getIngrItem" id="getIngrItem" value="<?php echo base_url('setting/ingradient/search_ingredient'); ?>"/>
                    <input type="hidden" name="chkIngredient" id="chkIngredient" value="<?php echo base_url('setting/ingradient/check_ingredient_exist'); ?>"/>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo display('ingredient_name'); ?> *</label>
                                <input type="text" name="ingredient_name" id="ingredient_name_edit" class="form-control ingredientDropDown" placeholder="<?php echo display('ingredient_name'); ?>" autocomplete="off" value="<?php echo (!empty($intinfo->ingredient_name) ? $intinfo->ingredient_name : '') ?>">
                                <input type="hidden" name="ingredient_id" id="ingredient_id_edit" value="<?php echo (!empty($intinfo->id) ? $intinfo->id : '') ?>" />
                            </div>

                            <div class="form-group">
                                <label><?php echo 'Purchase Price'; ?> *</label>
                                <input name="purchase_price" id="purchase_price_edit" class="form-control purchase_price" type="text" placeholder="Purchase Price" value="<?php echo (!empty($intinfo->purchase_price) ? $intinfo->purchase_price : '') ?>">
                            </div>

                            <div class="form-group">
                                <label><?php echo 'Cost Per Unit'; ?> *</label>
                                <input name="cost_perunit" id="cost_perunit_edit" class="form-control" type="text" placeholder="Cost Per Unit" value="<?php echo (!empty($intinfo->cost_perunit) ? $intinfo->cost_perunit : '') ?>">
                            </div>

                            <div class="form-group">
                                <label><?php echo display('stock_limit'); ?> *<br/>(<em style="font-size: 10px; font-weight: bold; padding: 2px 5px; background-color: yellow; animation: highlightBlink 1s infinite alternate;">
                                Consumption unit stock limit.
                                </em>)</label>
                                <input name="min_stock" class="form-control" type="text" placeholder="<?php echo display('stock_limit'); ?>" value="<?php echo (!empty($intinfo->min_stock) ? $intinfo->min_stock : '') ?>">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo 'Purchase Unit'; ?> *</label>
                                <?php 
                                echo form_dropdown('unitid', $unitdropdown, (!empty($intinfo->uom_id) ? $intinfo->uom_id : null), 'class="form-control" id="purchase_unit_edit"');
                                ?>
                            </div>

                            <div class="form-group">
                                <label><?php echo 'Consumption Unit'; ?> *</label>
                                <?php 
                                echo form_dropdown('consumption_unit', $unitdropdown, (!empty($intinfo->consumption_unit) ? $intinfo->consumption_unit : null), 'class="form-control consumtion_unit" id="consumtion_unit_edit"');
                                ?>
                            </div>

                            <div class="form-group">
                                <label><?php echo 'Conversation Ratio'; ?> *</label>
                                <select name="convt_ratio" class="form-control" id="convt_ratio_edit">
                                    <option value="1000" <?php echo (!empty($intinfo->convt_ratio) && $intinfo->convt_ratio == '1000') ? 'selected' : ''; ?>>1000</option>
                                    <option value="100" <?php echo (!empty($intinfo->convt_ratio) && $intinfo->convt_ratio == '100') ? 'selected' : ''; ?>>100</option>
                                    <option value="10" <?php echo (!empty($intinfo->convt_ratio) && $intinfo->convt_ratio == '10') ? 'selected' : ''; ?>>10</option>
                                    <option value="1" <?php echo (!empty($intinfo->convt_ratio) && $intinfo->convt_ratio == '1') ? 'selected' : ''; ?>>1</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo display('status'); ?> *</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" <?php echo (!empty($intinfo->is_active) && $intinfo->is_active == 1) ? 'selected' : ''; ?>><?php echo display('active'); ?></option>
                                    <option value="0" <?php echo (isset($intinfo->is_active) && $intinfo->is_active == 0) ? 'selected' : ''; ?>><?php echo display('inactive'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Button Alignment -->
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success"><?php echo display('update'); ?></button>
                    </div>

                    <?php echo form_close(); ?>


                </div>  
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo base_url('application/modules/setting/assets/js/ingr_script.js'); ?>" type="text/javascript"></script>
<style>
.ui-autocomplete {
    z-index: 99999 !important;
    position: absolute !important;
    background-color: white;
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ccc;
    }
</style>
