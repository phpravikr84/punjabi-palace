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
                                    <input name="addonsname[]" class="form-control" type="text" placeholder="Modifier Name" value="<?php echo $addon->add_on_name; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price </label>
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price" value="<?php echo $addon->price; ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select name="status[]" class="form-control">
                                        <option value="" selected="selected">Select Option</option>
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
                            <div class="form-row align-items-end modifier-row">
                                <div class="form-group col-md-1 drag-handle">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Modifier *</label>
                                    <input name="addonsname[]" class="form-control" type="text" placeholder="Modifier Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price </label>
                                    <input name="addonsprice[]" class="form-control" type="text" placeholder="Price">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select name="status[]" class="form-control">
                                        <option value="" selected="selected">Select Option</option>
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
                            <button type="submit" class="btn btn-success"><?php echo display('Add'); ?></button>
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
    
</style>

<!-- jQuery for Add/Remove Modifier Rows -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function () {
    // Initialize sortable
    $(".modifier-container").sortable({
        handle: ".drag-handle",
        axis: "y",
        containment: "parent",
        update: function () {
            updateSortOrder(); // Update order after sorting
        }
    });

    // Function to update order after sorting
    function updateSortOrder() {
        $(".modifier-row").each(function (index) {
            $(this).find(".sort-order").val(index + 1); // Set order starting from 1
        });
    }

    // Add new row
    $(".add-row").click(function () {
        let newRow = $(".modifier-row:first").clone(); // Clone first row
        newRow.find("input").val(""); // Clear input values
        newRow.find("select").val("1"); // Reset dropdown
        newRow.find(".remove-row").show(); // Ensure remove button is visible
        newRow.find(".sort-order").val(""); // Reset hidden order input
        $(".modifier-container").append(newRow); // Append new row
        updateSortOrder(); // Update sorting after adding
        checkRemoveButton(); // Check remove button visibility
    });

    // Remove row
    $(document).on("click", ".remove-row", function () {
        $(this).closest(".modifier-row").remove();
        updateSortOrder(); // Update sorting after removal
        checkRemoveButton(); // Check remove button visibility

        // Remove from add on record and also check that its not assign in a menu
        var addonId =  this.id;
        console.log('Add on Id'+addonId);
  
    });

    // Check remove button visibility (only show if more than one row exists)
    function checkRemoveButton() {
        if ($(".modifier-row").length > 1) {
            $(".remove-row").show();
        } else {
            $(".remove-row").hide();
        }
    }

    // Run this on page load
    updateSortOrder();
    checkRemoveButton();

    
});

</script>

