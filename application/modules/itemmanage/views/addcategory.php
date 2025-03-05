<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : null); ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_category/create"); ?>

                <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                <?php echo form_hidden('CategoryID', (!empty($categoryinfo->CategoryID) ? $categoryinfo->CategoryID : null)); ?>

                <!-- Parent Category (Multiple Select) -->
                <div class="form-group row border-bottom pb-2">
                    <label for="Parentcategory" class="col-sm-4 col-form-label"> <?php echo display('parent_cat'); ?> </label>
                    <div class="col-sm-8">
                        <select name="Parentcategory[]" id="Parentcategory" class="form-control select2" multiple="multiple">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->CategoryID; ?>" 
                                    <?php if (!empty($categoryinfo) && in_array($category->CategoryID, explode(',', $categoryinfo->parentid))) echo "selected"; ?>>
                                    <?php echo $category->Name; ?>
                                </option>
                                <?php if (!empty($category->sub)) {
                                    foreach ($category->sub as $subcat) { ?>
                                        <option value="<?php echo $subcat->CategoryID; ?>" 
                                            <?php if (!empty($categoryinfo) && in_array($subcat->CategoryID, explode(',', $categoryinfo->parentid))) echo "selected"; ?>>
                                            &nbsp;&nbsp;&nbsp;&mdash;<?php echo $subcat->Name; ?>
                                        </option>
                                <?php }
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <!-- Dynamic Category Fields -->
                <div id="categoryContainer">
           
                    <?php if(!empty($categoryinfo)) { ?>


                            <div class="category-row row border-bottom pb-2 align-items-end">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoryname"><?php echo display('category_name'); ?> *</label>
                                        <input name="categoryname[]" class="form-control category-input" type="text" 
                                            placeholder="<?php echo display('category_name'); ?>" value="<?php echo $categoryinfo->Name; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="isoffer"><?php echo display('is_offer'); ?></label>
                                        <div class="form-check">
                                            <input type="checkbox" name="isoffer[]" value="1" class="form-check-input" <?php echo !empty($categoryinfo->isOffer) ? 'checked' : ''; ?>>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status"><?php echo display('status'); ?></label>
                                        <select name="status[]" class="form-control">
                                            <option value="1" <?php echo $categoryinfo->CategoryIsActive==1 ? 'selected' : ''; ?>><?php echo display('active'); ?></option>
                                            <option value="0" <?php echo $categoryinfo->CategoryIsActive==0 ? 'selected' : ''; ?>><?php echo display('inactive'); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 text-left">
                                    <button type="button" class="btn btn-danger remove-category">&times;</button>
                                </div>
                            </div>
 
             
                    <?php } else { ?>

                        <div class="category-row row border-bottom pb-2 align-items-end">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoryname"><?php echo display('category_name'); ?> *</label>
                                    <input name="categoryname[]" class="form-control category-input" type="text" 
                                        placeholder="<?php echo display('category_name'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="isoffer"><?php echo display('is_offer'); ?></label>
                                    <div class="form-check">
                                        <input type="checkbox" name="isoffer[]" value="1" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status"><?php echo display('status'); ?></label>
                                    <select name="status[]" class="form-control">
                                        <option value="1" selected><?php echo display('active'); ?></option>
                                        <option value="0"><?php echo display('inactive'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 text-left">
                                <button type="button" class="btn btn-danger remove-category">&times;</button>
                            </div>
                        </div>

                    <?php  } ?>
                   
                </div>

                <div class="form-group text-left border-bottom pb-2">
                    <button type="button" id="addCategory" class="btn btn-info"> <?php echo display('add_category'); ?> </button>
                </div>

                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary"> <?php echo display('reset'); ?> </button>
                    <button type="submit" id="saveButton" class="btn btn-success"> <?php echo display('save'); ?> </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<style>
    .remove-category {
        margin-top: 21px !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#addCategory").click(function () {
        var newRow = $(".category-row:first").clone();
        newRow.hide().appendTo("#categoryContainer").fadeIn(300);
        newRow.find("input[type='text']").val("");
        newRow.find("input[type='checkbox']").prop("checked", false);
        newRow.find("select").val("1");
    });

    $(document).on("click", ".remove-category", function () {
        if ($(".category-row").length > 1) {
            $(this).closest(".category-row").fadeOut(300, function () {
                $(this).remove();
            });
        }
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
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
</script>

<style>
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
</style>
