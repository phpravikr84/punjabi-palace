<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <?php echo form_open('itemmanage/menu_addons/assignaddonscreatemultiple'); ?>
                
                <input type="hidden" name="row_id" value="<?php echo !empty($addonsinfo[0]->group_id) ? $addonsinfo[0]->group_id : ''; ?>">
                
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="group_id" value="<?php echo !empty($addonsinfo[0]->group_id) ? $addonsinfo[0]->group_id : ''; ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="modifier_name" class="col-sm-4 col-form-label">Modifier Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="modifier_name" value="<?php echo !empty($addonsinfo[0]->modifier_name) ? $addonsinfo[0]->modifier_name : ''; ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="menuid" class="col-sm-4 col-form-label">Item Name</label>
                    <div class="col-sm-8">
                        <?php 
                        $selectedMenus = array_column($addonsinfo, 'ProductsID'); // Extract ProductsID from addonsinfo
                        $menuOptions = [];
                        
                        foreach ($menudropdown as $menu) {
                            $menuOptions[$menu->menu_id] = $menu->menu_name;
                        }
                        
                        echo form_dropdown(
                            'menuid[]', 
                            $menuOptions, 
                            $selectedMenus, 
                            'class="form-control select2-multiple" multiple="multiple"'
                        ); 
                        ?>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5">Update</button>
                </div>
                
                <?php echo form_close(); ?>
            </div>  
        </div>
    </div>
</div>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('.select2-multiple').select2({
            placeholder: "Select options",
            allowClear: true,
            closeOnSelect: false,
            allowHtml: true,
            tags: true
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
