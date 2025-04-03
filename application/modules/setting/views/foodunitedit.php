<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php echo form_open('setting/unitmeasurement/update'); ?>
                <?php echo form_hidden('id', (!empty($unitinfo->id) ? $unitinfo->id : null)); ?>
                
                <div class="form-group row">
                    <label for="unit_name" class="col-sm-3 col-form-label"><?php echo display('unit_name'); ?> *</label>
                    <div class="col-sm-9">
                        <input name="unitname" class="form-control" type="text" placeholder="<?php echo display('unit_name'); ?>" id="unitname" value="<?php echo (!empty($unitinfo->uom_name) ? $unitinfo->uom_name : null); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="unit_short_name" class="col-sm-3 col-form-label"><?php echo display('unit_short_name'); ?></label>
                    <div class="col-sm-9">
                        <input name="shortname" class="form-control" type="text" placeholder="<?php echo display('unit_short_name'); ?>" id="shortname" value="<?php echo (!empty($unitinfo->uom_short_code) ? $unitinfo->uom_short_code : null); ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="quantity" class="col-sm-3 col-form-label"><?php echo display('quantity'); ?></label>
                    <div class="col-sm-9">
                        <input name="quantity" class="form-control" type="number" step="0.01" placeholder="<?php echo display('quantity'); ?>" id="quantity" value="<?php echo (!empty($unitinfo->quantity) ? $unitinfo->quantity : null); ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="quantity_measure" class="col-sm-3 col-form-label"><?php echo display('quantity_measure'); ?></label>
                    <div class="col-sm-9">
                        <select name="quantity_measure" class="form-control">
                            <option value="" selected><?php echo display('select_option'); ?></option>
                            <option value="ml" <?php if (!empty($unitinfo) && $unitinfo->quantity_measure == 'ml') echo "selected"; ?>>ml</option>
                            <option value="gm" <?php if (!empty($unitinfo) && $unitinfo->quantity_measure == 'gm') echo "selected"; ?>>gm</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"><?php echo display('status'); ?></label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option value="" selected><?php echo display('select_option'); ?></option>
                            <option value="1" <?php if (!empty($unitinfo) && $unitinfo->is_active == 1) echo "selected"; ?>><?php echo display('active'); ?></option>
                            <option value="0" <?php if (!empty($unitinfo) && $unitinfo->is_active == 0) echo "selected"; ?>><?php echo display('inactive'); ?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update'); ?></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
