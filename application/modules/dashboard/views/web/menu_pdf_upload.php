<?php
//$selected_menus = !empty($material) ? array_column($material, 'menu_id') : [];
$selected_menus = $selected_menus ?? [];
$btn_text = !empty($material_pdf->btn_text) ? $material_pdf->btn_text : '';
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <h4><?php echo display('upload_menu_pdf'); ?></h4>
            </div>
            <div class="panel-body">

                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>

                <?php echo form_open_multipart('dashboard/web_setting/menu_pdf_upload' . (!empty($material_pdf->pdf_group_id) ? '/' . $material_pdf->id : '')); ?>

                <!-- Menu Selection -->
                <div class="form-group row">
                    <label for="menu_id" class="col-sm-3 col-form-label"><?php echo display('menu_name'); ?> *</label>
                    <div class="col-sm-9">
                        <select 
                            name="<?php echo !empty($material_pdf) ? 'menu_id' : 'menu_id[]'; ?>" 
                            id="menu_id" 
                            class="form-control select2" 
                            <?php echo !empty($material_pdf) ? '' : 'multiple'; ?> 
                            required
                        >
                            <?php  foreach ($menus as $menu) {   ?>
                                <option value="<?php echo $menu->menuid; ?>" <?php echo in_array($menu->menuid, $selected_menus) ? 'selected' : ''; ?>>
                                    <?php echo $menu->menu_name; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <?php if (!empty($material_pdf)) { ?>
                            <small class="text-info">Note: Only the first selected menu will be updated.</small>
                        <?php } ?>
                    </div>
                </div>

                <!-- Button Text -->
                <div class="form-group row">
                    <label for="btn_text" class="col-sm-3 col-form-label">Button Text *</label>
                    <div class="col-sm-9">
                        <input type="text" name="btn_text" id="btn_text" class="form-control" required value="<?php echo html_escape($btn_text); ?>">
                    </div>
                </div>

                <!-- PDF Upload -->
                <div class="form-group row">
                    <label for="pdf_file" class="col-sm-3 col-form-label">PDF File <?php echo empty($material_pdf) ? '*' : '(Optional)'; ?></label>
                    <div class="col-sm-9">
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf" <?php echo empty($material_pdf) ? 'required' : ''; ?>>

                        <?php if (!empty($material_pdf->pdf_file)) { ?>
                            <small>Current file:
                                <input type="hidden" name="old_pdf_file" value="<?php echo $material_pdf->pdf_file; ?>">
                                <a href="<?php echo base_url('pdf/' . $material_pdf->pdf_file); ?>" target="_blank">
                                    <?php echo $material_pdf->pdf_file; ?>
                                </a>
                            </small>
                        <?php } ?>
                    </div>
                </div>

                <!-- Submit -->
                <div class="form-group text-right">
                    <button type="submit" name="submit" class="btn btn-success">
                        <?php echo empty($material_pdf) ? 'Upload' : 'Update'; ?>
                    </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- jQuery Select2 -->
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Menus",
            width: "100%"
        });
    });
</script>
