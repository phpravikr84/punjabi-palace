<div class="form-group text-right">
 <?php if($this->permission->method('setting','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
<?php echo display('add_ingredient')?></button>
<?php endif; ?>
<!-- Upload Ingredient-->
 <button type="button" class="btn btn-primary btn-md" data-target="#uploadIngr" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
<?php echo 'Upload Ingredient'; ?></button> 
<!-- Upload Ingredient End -->
</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
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
                                <!-- Brands -- Added--> 
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label for="brand_id" class="col-sm-2 col-form-label text-right"><?php echo 'Brand'; ?> </label>
                                        <div class="col-sm-10">
                                            <?php
                                                $brand_options = array('' => display('select_brand'));
                                                if (!empty($brands)) {
                                                    foreach ($brands as $brand) {
                                                        $brand_options[$brand->id] = $brand->brand_name;
                                                    }
                                                }

                                                echo form_dropdown(
                                                    'brand_id',
                                                    $brand_options,
                                                    null, // no selection for create form
                                                    'class="form-control" id="brand_id"'
                                                );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Brands -- Added--> 
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo display('ingredient_name'); ?> *</label>
                                            <input type="text" name="ingredient_name" id="ingredient_name" class="form-control ingredientDropDown" placeholder="<?php echo display('ingredient_name'); ?>" autocomplete="off" value="">
                                            <input type="hidden" name="ingredient_id" id="ingredient_id" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Pack Size'; ?> *</label>
                                            <input name="pack_size" id="pack_size" class="form-control pack_size"
                                            type="number" placeholder="Pack Size" value=""
                                            min="0.000001" step="any" oninput="validity.valid||(value='');">
                                        </div>
                                        <div class="form-group purchase_price_div">
                                            <label><?php echo 'Price Per Purchase Unit'; ?> *</label>
                                            <input name="purchase_price" id="purchase_price" class="form-control purchase_price" type="text" placeholder="Purchase Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Cost Per Consumption Unit'; ?> *</label>
                                            <input name="cost_perunit" id="cost_perunit" class="form-control" type="text" placeholder="Cost Per Unit" value="">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo display('stock_limit'); ?> *<br/>(<em style="font-size: 10px; font-weight: bold; padding: 2px 5px; background-color: yellow; animation: highlightBlink 1s infinite alternate;">
                                            Consumption unit stock limit.
                                </em>)</label>
                                            <input name="min_stock" class="form-control" type="text" placeholder="<?php echo display('stock_limit'); ?>" value="">
                                        </div>
                                        <div class="form-group open_balance_div">
                                            <label><?php echo display('opening_balance'); ?> *<br/>(<em style="font-size: 10px; font-weight: bold; padding: 2px 5px; background-color: yellow; animation: highlightBlink 1s infinite alternate;">
                                            Consumption unit stock limit.
                                </em>)</label>
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
                                            <label><?php echo 'Purchase Unit'; ?></label>
                                            <?php
                                            $unit_with_blank = ['' => '-- Select --'] + $unitdropdown;
                                            if (empty($categories)) { $categories = array('' => '--Select--'); }
                                            echo form_dropdown('unitid', $unitdropdown, (!empty($intinfo->id) ? $intinfo->id : null), 'class="form-control" id="unitid"');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Pack Unit'; ?> *</label>
                                            <?php
                                            $unit_with_blank = ['' => '-- Select --'] + $unitdropdown;
                                            if (empty($categories)) { $categories = array('' => '--Select--'); }
                                            echo form_dropdown('pack_unit', $unitdropdown, (!empty($intinfo->id) ? $intinfo->id : null), 'class="form-control pack_unit" id="pack_unit"');
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo 'Consumption Unit'; ?> *</label>
                                            <?php
                                            $unit_with_blank = ['' => '-- Select --'] + $unitdropdown;
                                            if (empty($categories)) { $categories = array('' => '--Select--'); }
                                            echo form_dropdown('consumption_unit', $unitdropdown, (!empty($intinfo->id) ? $intinfo->id : null), 'class="form-control consumtion_unit" id="consumtion_unit"');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo 'Conversation Ratio'; ?> *</label>
                                            <select name="convt_ratio" class="form-control" id="convt_ratio">
                                                <option value="1000">1000</option>
                                                <option value="100">100</option>
                                                <option value="12">12</option>
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
    <div class="modal-dialog modal-lg">
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


<!-- Upload Ingredient Modal Begin -->

<div id="uploadIngr" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo 'Upload Ingredient'; ?></strong>
            </div>
            <div class="modal-body">
           
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <?php echo form_open_multipart('setting/ingradient/sheetupload', [
                                        'id' => 'ingredientUploadForm',
                                        'onsubmit' => 'return false;',
                                    ]); ?>

                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo 'Upload Ingredient Sheet'; ?> *</label>
                                                <input type="file" name="ingredient_filename" id="ingredient_filename" class="form-control" placeholder="<?php echo 'Upload Ingredient'; ?>" autocomplete="off" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Button Alignment -->
                                            <div class="form-group text-left" style="margin-top: 20px;">
                                                <button type="reset" class="btn btn-primary"><?php echo display('reset'); ?></button>
                                                <button type="submit" class="btn btn-success"><?php echo 'Upload'; ?></button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-top: 20px;">
                                                <a href="<?php echo base_url('setting/ingradient/sample_csv'); ?>" class="btn btn-primary">
                                                    Download Sample
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress" id="uploadProgress" style="display:none; margin-top:10px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%">0%</div>
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

<!-- Upload Ingredient Modal End -->

   
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
<script>
    $(document).ready(function () {
    $('#ingredientUploadForm').on('submit', function (e) {
        e.preventDefault();

        var fileInput = $('#ingredient_filename')[0];
        var file = fileInput.files[0];

        if (!file) {
            alert('Please select a file to upload.');
            return;
        }

        var formData = new FormData(this);

        $('#uploadProgress').show();
        $('.progress-bar').css('width', '0%').text('0%');

        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        var percentComplete = Math.round((e.loaded / e.total) * 100);
                        $('.progress-bar').css('width', percentComplete + '%').text(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function () {
                $('.btn-success').prop('disabled', true).text('Uploading...');
            },
            success: function (response) {
                if (response.status === 'success') {
                    //alert(response.message + `\nTotal Rows: ${response.total}\nNew Inserts: ${response.inserted}`);
                   alert(
                        response.message + 
                        `\nTotal Rows: ${response.total}\nNew Inserts: ${response.inserted}\nFailed Rows: ${response.failed}` + 
                        (response.fail_details && response.fail_details.length > 0 ? 
                            `\n\nFailure Details:\n- ${response.fail_details.join('\n- ')}` : '')
                    );

                    $('#uploadIngr').modal('hide');
                    location.reload();
                } else {
                    alert(response.message || 'Upload failed on server.');
                }
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:", xhr.responseText);
                alert('Upload failed. Please try again.');
            },
            complete: function () {
                $('.btn-success').prop('disabled', false).text('Upload');
                $('#uploadProgress').hide();
            }
        });
    });
});

</script>
