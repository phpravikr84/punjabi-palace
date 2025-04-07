<div class="form-group text-right">
 <?php if($this->permission->method('setting','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
<?php echo display('add_ingredient')?></button> 
<?php endif; ?>

</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_ingredient');?></strong>
            </div>
            <div class="modal-body">
           
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
                                            <input type="text" name="ingredient_name" id="ingredient_name" class="form-control ingredientDropDown" placeholder="<?php echo display('ingredient_name'); ?>" autocomplete="off" value="">
                                            <input type="hidden" name="ingredient_id" id="ingredient_id" value="" />
                                        </div>
                                        <div class="form-group purchase_price_div">
                                            <label><?php echo 'Purchase Price'; ?> *</label>
                                            <input name="purchase_price" id="purchase_price" class="form-control" type="text" placeholder="Purchase Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Cost Per Unit'; ?> *</label>
                                            <input name="cost_perunit" id="cost_perunit" class="form-control" type="text" placeholder="Cost Per Unit" value="">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo display('stock_limit'); ?> *</label>
                                            <input name="min_stock" class="form-control" type="text" placeholder="<?php echo display('stock_limit'); ?>" value="">
                                        </div>
                                        <div class="form-group open_balance_div">
                                            <label><?php echo display('opening_balance'); ?> *</label>
                                            <input 
                                                name="opening_balance" 
                                                class="form-control" 
                                                type="number" 
                                                placeholder="<?php echo display('opening_balance'); ?>" 
                                                value=""
                                                step="0.01"
                                                min="0"
                                                required
                                            >
                                        </div>

                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo 'Purchase Unit'; ?> *</label>
                                            <?php
                                            $unit_with_blank = ['' => '-- Select --'] + $unitdropdown;
                                            if (empty($categories)) { $categories = array('' => '--Select--'); }
                                            echo form_dropdown('unitid', $unitdropdown, (!empty($intinfo->id) ? $intinfo->id : null), 'class="form-control" id="unitid"');
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo 'Consumption Unit'; ?> *</label>
                                            <?php
                                            $unit_with_blank = ['' => '-- Select --'] + $unitdropdown;
                                            if (empty($categories)) { $categories = array('' => '--Select--'); }
                                            echo form_dropdown('consumption_unit', $unitdropdown, (!empty($intinfo->id) ? $intinfo->id : null), 'class="form-control consumtion_unit"');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Conversation Ratio'; ?> *</label>
                                            <select name="convt_ratio" class="form-control" id="convt_ratio">
                                                <option value="1000">1000</option>
                                                <option value="100">100</option>
                                                <option value="10">10</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo display('status'); ?> *</label>
                                            <select name="is_active" class="form-control">
                                                <!-- <option value="" selected="selected"><?php //echo display('select_option'); ?></option> -->
                                                <option value="1" selected="selected"><?php echo display('active'); ?></option>
                                                <option value="0"><?php echo display('inactive'); ?></option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group open_balance_date_div">
                                            <label><?php echo 'Opening Balance Date'; ?> *</label>
                                            <input 
                                                name="opening_date" 
                                                class="form-control" 
                                                type="date" 
                                                value="<?php echo date('Y-m-d'); ?>" 
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Alignment -->
                                <div class="form-group text-right">
                                    <button type="reset" class="btn btn-primary"><?php echo display('reset'); ?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('Ad'); ?></button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>  
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="modal-footer">
                
        </div>

    </div>
</div>

<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('update_ingredient');?></strong>
            </div>
            <div class="modal-body editinfo">
            
    		</div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('ingredient_name') ?></th>
                            <th><?php echo display('unit_name') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ingredientlist)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($ingredientlist as $ingredient) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $ingredient->ingredient_name; ?></td>
                                    <td><?php echo $ingredient->uom_name; ?></td>
                                   <td class="center">
                                    <?php if($this->permission->method('setting','update')->access()): ?>
										 <input name="url" type="hidden" id="url_<?php echo $ingredient->id; ?>" value="<?php echo base_url("setting/ingradient/updateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo $ingredient->id; ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update')?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                         <?php endif; 
										 if($this->permission->method('setting','delete')->access()): ?>
                                        <a href="<?php echo base_url("setting/ingradient/delete/$ingredient->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete')?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                         <?php endif; ?>
                                    </td>
                                    
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
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
