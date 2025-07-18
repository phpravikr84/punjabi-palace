<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'category'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : 'Create Category'); ?></h4>
                    <small style="font-size:0.7em; font-weight:400">(Note: Select a group only if this item is a sub-category. If it's a main category, check the "Is Parent Category" box and this field will be disabled.)</small>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_category/create_category"); ?>

                <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                <?php echo form_hidden('CategoryID', (!empty($categoryinfo->CategoryID) ? $categoryinfo->CategoryID : null)); ?>
                <?php echo form_hidden('type', 'category'); ?>

                <!-- Dynamic Category Fields -->
                <div id="categoryContainer">
                    <?php $categoryIndex = 1; ?>
                    <?php if (!empty($categoryinfo->sub)) { ?>
                        <?php foreach ($categoryinfo->sub as $sub) { ?>
                            <div class="category-row row mb-3 align-items-end border-bottom pb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Parentcategory_<?php echo $categoryIndex; ?>">Group *</label>
                                        <select name="Parentcategory[]" id="Parentcategory_<?php echo $categoryIndex; ?>" class="form-control select2" required>
                                            <option value="">Select Group</option>
                                            <?php foreach ($groups as $category) { ?>
                                                <option value="<?php echo $category->CategoryID; ?>" 
                                                    <?php if (!empty($sub->parentid) && $sub->parentid == $category->CategoryID) echo "selected"; ?>>
                                                    <?php echo $category->Name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="category-label">Category Name *</label>
                                        <input name="subCategoryId[]" type="hidden" value="<?php echo $sub->CategoryID; ?>">
                                        <input name="categoryname[]" class="form-control category-input" type="text" 
                                            placeholder="Category Name" value="<?php echo $sub->Name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="isoffer[]" 
                                                id="isoffer_<?php echo $categoryIndex; ?>" value="1"
                                                <?php echo $sub->isoffer == 1 ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="isoffer_<?php echo $categoryIndex; ?>">
                                                <?php echo display('is_offer'); ?>
                                            </label>
                                            <input type="hidden" name="offer[]" value="<?php echo $sub->isoffer == 1 ? '1' : '0'; ?>" 
                                                id="offer_<?php echo $categoryIndex; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 offer-section" id="offeractive_<?php echo $categoryIndex; ?>" 
                                    style="<?php echo $sub->isoffer == 1 ? '' : 'display: none;'; ?>">
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <label>Percentage (%)</label>
                                            <input name="offerpercentage[]" class="form-control" type="number" 
                                                placeholder="Offer Percentage" value="<?php echo $sub->offerpercentage; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label><?php echo display('offerdate'); ?></label>
                                            <input name="offerstartdate[]" class="form-control datepicker" type="text"
                                                placeholder="<?php echo display('offerdate'); ?>" 
                                                id="offerstartdate_<?php echo $categoryIndex; ?>"
                                                value="<?php echo $sub->offerstartdate; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label><?php echo display('offerenddate'); ?></label>
                                            <input name="offerendate[]" class="form-control datepicker" type="text"
                                                placeholder="<?php echo display('offerenddate'); ?>" 
                                                id="offerendate_<?php echo $categoryIndex; ?>"
                                                value="<?php echo $sub->offerendate; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" style="display:none;">
                                    <div class="form-group">
                                        <label><?php echo display('status'); ?></label>
                                        <select name="status[]" class="form-control">
                                            <option value="1" <?php echo $sub->CategoryIsActive == 1 ? 'selected' : ''; ?>>
                                                <?php echo display('active'); ?>
                                            </option>
                                            <option value="0" <?php echo $sub->CategoryIsActive == 0 ? 'selected' : ''; ?>>
                                                <?php echo display('inactive'); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm remove-category" 
                                        data-id="<?php echo $sub->CategoryID; ?>">×</button>
                                </div>
                            </div>
                            <?php $categoryIndex++; ?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="category-row row mb-3 align-items-end border-bottom pb-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Parentcategory_1">Group *</label>
                                    <select name="Parentcategory[]" id="Parentcategory_1" class="form-control select2">
                                        <option value="">Select Group</option>
                                        <?php foreach ($groups as $category) { ?>
                                            <option value="<?php echo $category->CategoryID; ?>">
                                                <?php echo $category->Name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="category-label">Category Name *</label>
                                    <input name="categoryname[]" class="form-control category-input" type="text" 
                                        placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isoffer[]" 
                                            id="isoffer_1" value="1">
                                        <label class="form-check-label" for="isoffer_1"><?php echo display('is_offer'); ?></label>
                                        <input type="hidden" name="offer[]" value="0" id="offer_1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 offer-section" id="offeractive_1" style="display: none;">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label>Percentage (%)</label>
                                        <input name="offerpercentage[]" class="form-control" type="number" 
                                            placeholder="Offer Percentage">
                                    </div>
                                    <div class="col-md-4">
                                        <label><?php echo display('offerdate'); ?></label>
                                        <input name="offerstartdate[]" class="form-control datepicker" type="text"
                                            placeholder="<?php echo display('offerdate'); ?>" id="offerstartdate_1">
                                    </div>
                                    <div class="col-md-4">
                                        <label><?php echo display('offerenddate'); ?></label>
                                        <input name="offerendate[]" class="form-control datepicker" type="text"
                                            placeholder="<?php echo display('offerenddate'); ?>" id="offerendate_1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" style="display:none;">
                                <div class="form-group">
                                    <label><?php echo display('status'); ?></label>
                                    <select name="status[]" class="form-control">
                                        <option value="1" selected><?php echo display('active'); ?></option>
                                        <option value="0"><?php echo display('inactive'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-sm remove-category">×</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group row mb-3" <?php echo !empty($categoryinfo->CategoryID) ? 'style="display:none;"' : ''; ?>>
                    <div class="col-sm-12">
                        <button type="button" id="addCategory" class="btn btn-info"><?php echo display('add_category'); ?></button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="reset" class="btn btn-secondary"><?php echo display('reset'); ?></button>
                        <button type="submit" class="btn btn-success">
                            <?php echo !empty($categoryinfo->CategoryID) ? 'Update' : 'Save'; ?>
                        </button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<style>
    .remove-category, .remove-editcategory {
        margin-top: 21px !important;
    }
    .parentcattooltips { margin-top: 10px; }
   
    .form-control-100 {
        display: block;
        width: 100px;
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>

<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function () {
    let categoryIndex = <?php echo $categoryIndex; ?>;

    // Initialize Select2 for all group dropdowns
    $('.select2').select2({
        placeholder: "Select Group",
        allowClear: true
    });

    // Initialize datepickers
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    // Show validation errors
    $('#categoryForm').submit(function (e) {
        let errors = [];
        const categoryNames = new Set();
        
        $('.category-row').each(function(index) {
            const categoryInput = $(this).find('.category-input').val().trim();
            const groupSelect = $(this).find('.select2').val();

            if (!categoryInput) {
                errors.push(`Category name cannot be empty in row ${index + 1}`);
            } else if (categoryNames.has(categoryInput)) {
                errors.push(`Duplicate category name: ${categoryInput} in row ${index + 1}`);
            } else {
                categoryNames.add(categoryInput);
            }

            if (!groupSelect) {
                errors.push(`Please select a group for category in row ${index + 1}`);
            }
        });

        if (errors.length > 0) {
            e.preventDefault(); // Stop submission
            swal({
                title: "Validation Error",
                html: errors.join('<br>'),
                type: "error"
            });
        }
    });


    // Add new category row
    $('#addCategory').on('click', function () {
        try {
            console.log('Adding new category row, index:', categoryIndex + 1);
            categoryIndex++;
            
            // Clone the first category row
            //const newRow = $('.category-row:first').clone(true, true);
            var newRow = $(".category-row:first").clone();
            
            // Remove Select2 containers and destroy instances
            newRow.find('.select2-container').remove();
            // newRow.find('.select2').each(function() {
            //     try {
            //         $(this).select2('destroy');
            //     } catch (e) {
            //         console.warn('Select2 destroy failed:', e);
            //     }
            // });
            // Clean up select2 safely before cloning
            newRow.find('.select2').each(function () {
                if ($.fn.select2 && $(this).data('select2')) {
                    $(this).select2('destroy');
                }
            });

            
            // Reset all inputs and selects
            newRow.find('input:not([type=checkbox])').val('');
            newRow.find('input[type=checkbox]').prop('checked', false);
            newRow.find('.offer-section').hide();
            newRow.find('input[name="subCategoryId[]"]').remove();
            newRow.find('select.select2').val(null); // Clear group select
            newRow.find('select').val('1'); // Set status to Active
            //newRow.find('.select2-hidden-accessible').remove(); // Remove hidden select2 elements
            
            // Update IDs
            newRow.find('[id^=Parentcategory_]').attr('id', 'Parentcategory_' + categoryIndex);
            newRow.find('[id^=isoffer_]').attr('id', 'isoffer_' + categoryIndex);
            newRow.find('[id^=offer_]').attr('id', 'offer_' + categoryIndex).val('0');
            newRow.find('[id^=offeractive_]').attr('id', 'offeractive_' + categoryIndex);
            newRow.find('[id^=offerstartdate_]').attr('id', 'offerstartdate_' + categoryIndex).val('');
            newRow.find('[id^=offerendate_]').attr('id', 'offerendate_' + categoryIndex).val('');
            
            newRow.find('.remove-category').removeAttr('data-id');
            
            // Append the new row
            newRow.appendTo('#categoryContainer').hide().fadeIn(300);
            
            // Reinitialize Select2
            newRow.find('.select2').select2({
                placeholder: "Select Group",
                allowClear: true
            });
            
            // Reinitialize datepicker
            newRow.find('.datepicker').removeClass('hasDatepicker').removeAttr('id').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
            
            console.log('New row added successfully, index:', categoryIndex);
        } catch (error) {
            console.error('Error adding category row:', error);
            swal({
                title: "Error",
                text: "Failed to add new category row. Check console for details.",
                type: "error"
            });
        }
    });

    // Remove category row
    $(document).on('click', '.remove-category', function () {
        const categoryId = $(this).data('id');
        const row = $(this).closest('.category-row');
        
        if (categoryId) {
            swal({
                title: "Are you sure?",
                text: "This will delete the category permanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.value) {
                    deleteCategory(categoryId, row);
                }
            });
        } else if ($('.category-row').length > 1) {
            row.fadeOut(300, function() { $(this).remove(); });
        }
    });

    // Toggle offer fields
    $(document).on('change', '[id^=isoffer_]', function () {
        const index = $(this).attr('id').split('_')[1];
        const offerSection = $('#offeractive_' + index);
        const offerInput = $('#offer_' + index);
        
        if ($(this).is(':checked')) {
            offerSection.slideDown(300);
            offerInput.val('1');
        } else {
            offerSection.slideUp(300);
            offerInput.val('0');
        }
    });

    // Form validation
    $('#categoryForm').submit(function (e) {
        let errors = [];
        const categoryNames = new Set();
        
        $('.category-row').each(function(index) {
            const categoryInput = $(this).find('.category-input').val().trim();
            const groupSelect = $(this).find('.select2').val();
            
            if (!categoryInput) {
                errors.push(`Category name cannot be empty in row ${index + 1}`);
            } else if (categoryNames.has(categoryInput)) {
                errors.push(`Duplicate category name: ${categoryInput} in row ${index + 1}`);
            } else {
                categoryNames.add(categoryInput);
            }
            
            if (!groupSelect) {
                errors.push(`Please select a group for category in row ${index + 1}`);
            }
        });

        if (errors.length > 0) {
            e.preventDefault();
            swal({
                title: "Validation Error",
                html: errors.join('<br>'),
                type: "error"
            });
        }
    });

    function deleteCategory(id, row) {
        $.ajax({
            url: '<?php echo base_url("itemmanage/item_category/delete_category/"); ?>' + id,
            type: 'POST',
            data: { csrf_test_name: $('#csrfhashresarvation').val() },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: "Success",
                        text: response.message,
                        type: "success"
                    });
                    row.fadeOut(300, function() { $(this).remove(); });
                } else {
                    swal({
                        title: "Error",
                        text: response.message || "Failed to delete category",
                        type: "error"
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                swal({
                    title: "Error",
                    text: "Failed to delete category. Check console for details.",
                    type: "error"
                });
            }
        });
    }
});
</script>