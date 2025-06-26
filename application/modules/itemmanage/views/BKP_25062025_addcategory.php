<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : null); ?></h4>
                    <small style="font-size:0.7em; font-weight:400">(Note: Select a parent category only if this item is a sub-category. If it's a main category, check the "Is Parent Category" box and this field will be disabled.)</small>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_category/create"); ?>

                <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                <?php echo form_hidden('CategoryID', (!empty($categoryinfo->CategoryID) ? $categoryinfo->CategoryID : null)); ?>
                <!-- Parent Category (Multiple Select) -->
                <div class="form-group row border-bottom pb-2" id="GroupContainer">
                    <label for="Parentcategory" class="col-sm-2 col-form-label"> <?php echo display('parent_cat'); ?>
                    </label>
                    <div class="col-sm-8">
                        <?php //echo '<pre>'; print_r($categoryinfo); echo '</pre>'; ?>
                        <select name="Parentcategory[]" id="Parentcategory" class="form-control select2">
                            <option value="">Select</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->CategoryID; ?>" 
                                    <?php if (!empty($categoryinfo) && in_array($category->CategoryID, explode(',', $categoryinfo->CategoryID))) echo "selected"; ?>>
                                    <?php echo $category->Name; ?>
                                </option>
                                <?php if (!empty($category->sub)) {
                                    foreach ($category->sub as $subcat) { ?>
                                        <option value="<?php echo $subcat->CategoryID; ?>" 
                                            <?php if (!empty($categoryinfo) && in_array($subcat->CategoryID, explode(',', $categoryinfo->CategoryID))) echo "selected"; ?>>
                                            &nbsp;&nbsp;&nbsp;&mdash;<?php echo $subcat->Name; ?>
                                        </option>
                                <?php }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input name="is_parent_cat" class="form-check-input" type="checkbox"
                            placeholder="<?php echo 'Is Parent Category'; ?>" id="is_parent_cat"
                            value="<?php echo !empty($categoryinfo->is_parent_cat) ? $categoryinfo->is_parent_cat : ''; ?>" checked>
                        <label for="is_parrent_cat"><?php echo 'Is Parent Category'; ?></label>
                    </div>
                </div>
                <!-- Parent Category Offer End-->
                <?php if(isset($categoryinfo->sub) && empty($categoryinfo->sub)) { ?>
                    <input name="categoryname[]" class="form-control category-input" type="hidden" 
                                                placeholder="<?php echo display('category_name'); ?>" 
                                                value="<?php echo $categoryinfo->Name; ?>" required>
                    <input type="hidden" name="parentid" value="<?php echo $categoryinfo->parentid; ?>">
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <label for="isoffer"><?php echo display('is_offer'); ?></label>
                            <input class="form-check-input" type="checkbox" name="isoffer[]" id="isoffer_1" value="1"
                                <?php if (!empty($categoryinfo) && $categoryinfo->isoffer == 1) echo 'checked'; ?>>
                            <input type="hidden" name="offer[]" value="<?php echo $categoryinfo->isoffer; ?>" id="offer_1">
                        </div>

                        <?php
                        $offerActiveClass = 'd-none';
                        if (!empty($categoryinfo) && $categoryinfo->isoffer == 1) {
                            $offerActiveClass = '';
                        }
                        ?>

                        <div class="col-sm-8 <?php echo $offerActiveClass; ?>" id="offeractive">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="offerpercentage"><?php echo 'Percentage (%)'; ?></label>
                                    <input name="offerpercentage[]" class="form-control" type="text"
                                        placeholder="<?php echo 'Offer Percentage'; ?>" id="offerpercentage"
                                        value="<?php echo !empty($categoryinfo->offerpercentage) ? $categoryinfo->offerpercentage : ''; ?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="offerstartdate"><?php echo display('offerdate'); ?></label>
                                    <input name="offerstartdate[]" class="form-control datepicker" type="text"
                                        placeholder="<?php echo display('offerdate'); ?>" id="offerstartdate_1"
                                        value="<?php echo !empty($categoryinfo->offerstartdate) ? $categoryinfo->offerstartdate : ''; ?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="offerendate"><?php echo display('offerenddate'); ?></label>
                                    <input name="offerendate[]" class="form-control datepicker" type="text"
                                        placeholder="<?php echo display('offerenddate'); ?>" id="offerendate_1"
                                        value="<?php echo !empty($categoryinfo->offerendate) ? $categoryinfo->offerendate : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="col-md-12" style="display: none;">
                            <div class="form-group">
                                <label for="status"><?php echo display('status'); ?></label>
                                <select name="status[]" class="form-control-100">
                                    <option value="1" <?php echo $categoryinfo->CategoryIsActive==1 ? 'selected' : ''; ?>><?php echo display('active'); ?></option>
                                    <option value="0" <?php echo $categoryinfo->CategoryIsActive==0 ? 'selected' : ''; ?>><?php echo display('inactive'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>
                <!-- Parent Category Offer End -->

                <!-- Dynamic Category Fields -->
                <div id="categoryContainer">
           
                    <?php if(!empty($categoryinfo)) { ?>
                        <?php if(!empty($categoryinfo->sub)) { $i=1; ?>
                            <?php foreach($categoryinfo->sub as $sub) { ?>
                                <div class="category-row row border-bottom pb-2 align-items-end gx-2">
                                    <!-- Category Name -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="categoryname"><?php echo display('category_name'); ?> *
                                            <a class="parentcattooltips" data-toggle="tooltip" data-placement="top" title="Is it a subcategory ? Please choose Parent Category also.">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </a>
                                        </label>
                                            <input name="subCategoryId[]" type="hidden" value="<?php echo $sub->CategoryID; ?>"/>
                                            <input name="categoryname[]" class="form-control category-input" type="text" 
                                                placeholder="<?php echo display('category_name'); ?>" 
                                                value="<?php echo $sub->Name; ?>" required>
                                        </div>
                                    </div>

                                    <!-- Is Offer Checkbox -->
                                    <div class="col-lg-1 col-md-6">
                                        <div class="form-group d-flex align-items-center">
                                            <label class="me-2 mb-0" for="isoffer"><?php echo display('is_offer'); ?></label>
                                            <input class="form-check-input" type="checkbox" name="isoffer[]" id="isoffer_<?php echo $i; ?>" value="1"
                                                <?php if (!empty($sub) && $sub->isoffer == 1) echo 'checked'; ?>>

                                                <?php if (!empty($sub) && $sub->isoffer == 1){ ?>
                                                        <input type="hidden" name="offer[]" value="1" id="offer_<?php echo $i; ?>"> 
                                                    <?php } else { ?>
                                                        <input type="hidden" name="offer[]" value="0" id="offer_<?php echo $i; ?>"> 
                                                   <?php  }
                                                ?>

                                        </div>
                                    </div>

                                    <!-- Offer Dates Section -->
                                    <div class="col-lg-5 col-md-12" id="offeractive_<?php echo $i; ?>"
                                        style="<?php if (!empty($sub)) {
                                                    echo ($sub->isoffer == 1) ? '' : 'display: none;';
                                                } else {
                                                    echo 'display: none;';
                                                } ?>">
                                        <div class="row gx-2">
                                            <div class="col-md-4">
                                                <label for="offerpercentage"><?php echo 'Percentage (%)'; ?></label>
                                                <input name="offerpercentage[]" class="form-control" type="text"
                                                    placeholder="<?php echo 'Offer Percentage'; ?>" id="offerpercentage"
                                                    value="<?php echo !empty($sub->offerpercentage) ? $sub->offerpercentage : ''; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="offerstartdate"><?php echo display('offerdate'); ?></label>
                                                <input name="offerstartdate[]" class="form-control datepicker" type="text"
                                                    placeholder="<?php echo display('offerdate'); ?>" id="offerstartdate_1"
                                                    value="<?php echo !empty($sub->offerstartdate) ? $sub->offerstartdate : ''; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="offerendate"><?php echo display('offerenddate'); ?></label>
                                                <input name="offerendate[]" class="form-control datepicker" type="text"
                                                    placeholder="<?php echo display('offerenddate'); ?>" id="offerendate_1"
                                                    value="<?php echo !empty($sub->offerendate) ? $sub->offerendate : ''; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="status"><?php echo display('status'); ?></label>
                                            <select name="status[]" class="form-control-100">
                                                <option value="1" <?php echo $sub->CategoryIsActive==1 ? 'selected' : ''; ?>><?php echo display('active'); ?></option>
                                                <option value="0" <?php echo $sub->CategoryIsActive==0 ? 'selected' : ''; ?>><?php echo display('inactive'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Remove Button -->
                                    <div class="col-md-1">
                                        <button type="button" id="<?php echo !empty($sub->CategoryID) ? $sub->CategoryID : 0; ?>" 
                                            class="btn btn-danger remove-editcategory w-100">&times;</button>
                                    </div>
                                </div>

                            <?php  $i++; } ?>

                        <?php  } ?>
 
             
                    <?php } else { ?>

                        <div class="category-row row g-2 align-items-end mb-5">
                            <!-- Category Name -->
                            <div class="col-lg-3 col-md-6">
                                <label for="categoryname"><?php echo display('category_name'); ?> *
                                <a class="parentcattooltips" data-toggle="tooltip" data-placement="top" title="Is it a subcategory ? Please choose Parent Category also.">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </a>
                            </label>
                                <input name="categoryname[]" class="form-control category-input" type="text" 
                                    placeholder="<?php echo display('category_name'); ?>" required>
                            </div>

                            <!-- Is Offer Checkbox -->
                            <div class="col-lg-1 col-md-6">
                                <div class="form-check row">
                                    <label class="form-check-label col-lg-6 col-md-4" for="isoffer"><?php echo display('is_offer'); ?></label>
                                    <input class="form-check-input col-lg-6 col-md-8" type="checkbox" name="isoffer[]" id="isoffer_1" value="1"
                                        <?php if (!empty($categoryinfo) && $categoryinfo->isoffer == 1) echo 'checked'; ?> 
                                        id="isoffer">
                                        <input type="hidden" name="offer[]" value="0" id="offer_1"> 
                                </div>
                            </div>

                            <!-- Offer Dates Section -->
                            <div class="col-lg-5 col-md-12" id="offeractive_1"
                                class="<?php if (!empty($categoryinfo)) {
                                    echo ($categoryinfo->isoffer == 1) ? '' : 'd-none';
                                } else {
                                    echo 'd-none';
                                } ?>">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label for="offerpercentage"><?php echo 'Percentage (%)'; ?></label>
                                        <input name="offerpercentage[]" class="form-control" type="text"
                                            placeholder="<?php echo 'Offer Percentage'; ?>" id="offerpercentage"
                                            value="<?php echo !empty($categoryinfo->offerpercentage) ? $categoryinfo->offerpercentage : ''; ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="offerstartdate"><?php echo display('offerdate'); ?></label>
                                        <input name="offerstartdate[]" class="form-control datepicker" type="text"
                                            placeholder="<?php echo display('offerdate'); ?>" id="offerstartdate_1"
                                            value="<?php echo !empty($categoryinfo->offerstartdate) ? $categoryinfo->offerstartdate : ''; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="offerendate"><?php echo display('offerenddate'); ?></label>
                                        <input name="offerendate[]" class="form-control datepicker" type="text"
                                            placeholder="<?php echo display('offerenddate'); ?>" id="offerendate_1"
                                            value="<?php echo !empty($categoryinfo->offerendate) ? $categoryinfo->offerendate : ''; ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-lg-2 col-md-6">
                                <label for="status"><?php echo display('status'); ?></label>
                                <select name="status[]" class="form-control-100">
                                    <option value="1" selected><?php echo display('active'); ?></option>
                                    <option value="0"><?php echo display('inactive'); ?></option>
                                </select>
                            </div>

                            <!-- Remove Button -->
                            <div class="col-lg-1 col-md-6">
                                <button type="button" class="btn btn-danger mt-4 remove-category">&times;</button>
                            </div>
                        </div>


                    <?php  } ?>
                   
                </div>

                <!-- Hide this button on Edit Category -->
                <?php if(!empty($categoryinfo->CategoryID)) {
                        $hideHtmlElement =  'style="display:none;"';
                        $TextBtn = 'Update';
                    } else {
                        $hideHtmlElement = '';
                        $TextBtn = 'Save';
                    }
                ?>
                    <div class="form-group text-left border-bottom pb-2" <?php echo $hideHtmlElement; ?> >
                        <button type="button" id="addCategory" class="btn btn-info"> <?php echo display('add_category'); ?> </button>
                    </div>
          

                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary" <?php echo $hideHtmlElement; ?>> <?php echo display('reset'); ?> </button>
                    <button type="submit" id="saveButton" class="btn btn-success"> <?php echo $TextBtn; ?> </button>
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
</style>

<script>
$(document).ready(function () {
    let categoryIndex = 1; // Counter for unique IDs
    $("#addCategory").click(function () {
        var newRow = $(".category-row:first").clone();
        newRow.hide().appendTo("#categoryContainer").fadeIn(300);
        newRow.find("input[type='text']").val("");
        newRow.find("input[type='checkbox']").prop("checked", false);
        newRow.find("select").val("1");
        // Update IDs for checkbox and offer section
        categoryIndex++;
        newRow.find("[id^='isoffer']").each(function () {
            const newId = 'isoffer_' + categoryIndex;
            $(this).attr('id', newId);
        });

        // Update checkbox and offeractive IDs
        newRow.find("[id^='offer']").each(function () {
            const newId = 'offer_' + categoryIndex;
            $(this).attr('id', newId);
        });

        newRow.find("[id^='offeractive']").each(function () {
            const newId = 'offeractive_' + categoryIndex;
            $(this).attr('id', newId).hide();
        });

        // Update and reinitialize date fields
        newRow.find("[id^='offerstartdate']").each(function () {
            const newId = 'offerstartdate_' + categoryIndex;
            $(this).attr('id', newId);
        });

        newRow.find("[id^='offerendate']").each(function () {
            const newId = 'offerendate_' + categoryIndex;
            $(this).attr('id', newId);
        });

        newRow.find(".datepicker").removeClass("hasDatepicker").datepicker({
            dateFormat: 'dd-mm-yy' // or your format
        });

    });

    $(document).on("click", ".remove-category", function () {
        if ($(".category-row").length > 1) {
            $(this).closest(".category-row").fadeOut(300, function () {
                $(this).remove();
            });
        }
        var categoryid = this.id;
        // Call Dee
    });

    $("#saveButton").click(function (e) {
        let values = [];
        let isUnique = true;
        $(".category-input").each(function () {
            let val = $(this).val().trim();
            if (val && values.includes(val)) {
                isUnique = false;
                return false;
            }
            values.push(val);
        });
        if (!isUnique) {
            alert("Category names must be unique!");
            e.preventDefault();
        }
    });

});


//Remove Edit button
$(document).on("click", ".remove-editcategory", function () {
    var categoryid = this.id;
    var rowElement = $(this).closest(".category-row");

    // JavaScript confirm box
    var confirmDelete = confirm("Are you sure you want to delete this record?");
    if (confirmDelete) {
        // If user confirms, proceed with deletion
        deleteAdonsInfo(categoryid, rowElement);
    }
});

function deleteAdonsInfo(id, rowElement) {
    var myurl = baseurl + "itemmanage/item_category/delete_category/" + id;
    var csrf = $('#csrfhashresarvation').val();

    $.ajax({
        type: "POST",
        url: myurl,
        data: { id: id, csrf_test_name: csrf },
        success: function(response) {
            alert("Record deleted successfully!");
            rowElement.fadeOut(300, function () {
                $(this).remove();
            });
        },
        error: function(xhr, status, error) {
            alert("Error: Unable to delete the record. Please try again.");
        }
    });
}

</script>



<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#Parentcategory').select2({
            placeholder: "<?php echo display('category_name'); ?>", // Placeholder text
            allowClear: true,
                closeOnSelect: false,
                allowHtml: true,
                tags: true // создает новые опции на 
        });
    });

    $(document).ready(function () {
        var $select = $('#Parentcategory');
        $select.prop('disabled', true); // use disabled for Select2 compatibility
        $('#is_parent_cat').on('change', function () {
            if ($(this).is(':checked')) {
                $select.prop('disabled', true); // use disabled for Select2 compatibility
            } else {
                $select.prop('disabled', false);
            }
            // Re-initialize Select2 to reflect disabled state
            $select.select2();
        });
    });
</script>

<style>

.parentcattooltips { margin-top: 10px; }
    .select2-container--default.select2-container--disabled .select2-selection--single {
    background-color: #e9ecef;
    cursor: not-allowed;
}

    .select2-container {
  min-width: 300px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #f77750;
	border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
	display: none;
}
.select-icon .placeholder {
	display: none;
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
	display: none;
}
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
