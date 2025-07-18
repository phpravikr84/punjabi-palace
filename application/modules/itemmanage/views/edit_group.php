<div class="row">
     <!-- Button area -->
    <?php if ($sub_header == 'group'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo 'Edit Group'; ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open("itemmanage/item_category/update_group"); ?>
                
                <?php echo form_hidden('CategoryID', (!empty($categoryinfo->CategoryID) ? $categoryinfo->CategoryID : null)); ?>
                <?php echo form_hidden('csrf_test_name', $this->security->get_csrf_hash()); ?>

                <div class="form-group row">
                    <label for="group_name" class="col-sm-2 col-form-label"><?php echo 'Group Name'; ?> *</label>
                    <div class="col-sm-10">
                        <input name="group_name" class="form-control" type="text" 
                               placeholder="<?php echo 'Group Name'; ?>" 
                               id="group_name" value="<?php echo !empty($categoryinfo->Name) ? $categoryinfo->Name : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group text-right">
                    <a href="<?php echo base_url('itemmanage/item_category/group_list'); ?>" class="btn btn-secondary"><?php echo display('cancel'); ?></a>
                    <button type="submit" class="btn btn-success"><?php echo display('save'); ?></button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<style>
    .panel-bd {
        border: 1px solid #e9ecef;
        border-radius: 0.25rem;
    }
    .panel-heading {
        background-color: #f8f9fa;
        padding: 10px 15px;
        border-bottom: 1px solid #e9ecef;
    }
    .panel-title h4 {
        margin: 0;
        font-size: 1.25rem;
    }
    .panel-body {
        padding: 15px;
    }
</style>