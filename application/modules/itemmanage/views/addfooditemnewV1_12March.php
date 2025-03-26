<?php 
    // echo "product Id: ". $productinfo->ProductsID;
    // exit;
?>


<div class="row d-flex">

    <!-- First Panel - Add Form -->
    <div class="col-md-4 d-flex align-items-stretch">
        <div class="card">
            <div class="card-header">Add Food Item</div>
            <div class="card-body form-panel">
            <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Food Name</label>
                                <input type="text" class="form-control" placeholder="Enter food name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="2" placeholder="Enter description"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Special Notes</label>
                                <input type="text" class="form-control" placeholder="Enter special notes">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Components</label>
                                <input type="text" class="form-control" placeholder="Enter components">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <select class="form-control">
                                    <option value="">Select Unit</option>
                                    <option value="kg">Kilogram</option>
                                    <option value="g">Gram</option>
                                    <option value="piece">Piece</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check" style="margin-top:40px;">
                                <input type="hidden" name="is_bom" value="0">
                                <input type="checkbox" class="form-check-input" name="is_bom_check" id="is_bom_check">
                                <label class="form-check-label" for="is_bom_check">Recipe Mode</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Menu Type</label>
                        <div class="d-flex">
                            <div class="form-check me-3" style="margin-right:10px;">
                                <input type="radio" class="form-check-input" name="menu_type" value="1" id="veg">
                                <label class="form-check-label" for="veg">Vegetarian</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="menu_type" value="2" id="non-veg">
                                <label class="form-check-label" for="non-veg">Non-Vegetarian</label>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-orphane">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" placeholder="$">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Takeaway Price</label>
                                    <input type="text" class="form-control" placeholder="$">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Uber Eats Price</label>
                                    <input type="text" class="form-control" placeholder="$">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DoorDash Price</label>
                                    <input type="text" class="form-control" placeholder="$">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Web Order Price</label>
                                    <input type="text" class="form-control" placeholder="$">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GST (%)</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="isoffer" id="isoffer">
                        <label class="form-check-label" for="isoffer">Offer Available?</label>
                    </div>

                    <div id="offeractive" class="d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer Rate (%)</label>
                                    <input type="text" class="form-control" placeholder="Enter offer rate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer Start Date</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Offer End Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cooked Time</label>
                        <input type="text" class="form-control" placeholder="00:00">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>

                <script>
                document.getElementById("isoffer").addEventListener("change", function () {
                    document.getElementById("offeractive").classList.toggle("d-none", !this.checked);
                });
                </script>

                <style>
                    .form-group {
                        margin-bottom: 12px;
                    }
                    .bg-gray-orphane {
                        background-color: #f3f3f3;
                        padding:10px;
                    }
                </style>

            </div>
        </div>
    </div>

    <!-- Second Panel - Vertical Tabs -->
    <div class="col-md-8 d-flex align-items-stretch">
        <div class="card">
            <div class="card-header">Food Details</div>
            <div class="card-body">
                <div class="row d-flex">
                    <!-- Vertical Tabs -->
                    <div class="col-md-3 d-flex align-items-stretch">
                        <ul class="nav nav-pills nav-stacked" id="foodTabs">
                            <li class="active"><a href="#categories" data-toggle="tab">Categories</a></li>
                            <li><a href="#variants" data-toggle="tab">Variants</a></li>
                            <li><a href="#recipes" data-toggle="tab">Recipes</a></li>
                            <li><a href="#modifiers" data-toggle="tab">Modifiers</a></li>
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="col-md-9 d-flex align-items-stretch">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="categories">
                                <div class="row">
                                    <!-- Category Tree View -->
                                    <div class="col-md-4 tree-container">
                                        <h4>Select Categories</h4>
                                        <div class="treeviewinner">
                                            <ul id="categoryTree">
                                                <!-- Dynamic Category List Here -->
                                            </ul>
                                        </div>
                                        <button id="assignBtn" class="btn btn-primary">Assign Selected</button>
                                    </div>
                                    <!-- Selected Categories -->
                                    <div class="col-md-8">
                                        <h4>Assigned Categories</h4>
                                        <div class="selected-categories" id="selectedCategories">
                                            <p>No categories assigned yet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="variants">
                                <div id="variantContainer">
                                    <div class="row variant-row mb-2">
                                        <div class="col-md-6 mb-2">
                                            <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="number" name="regular_price[]" class="form-control" placeholder="Regular Price">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="number" name="takeaway_price[]" class="form-control" placeholder="Takeaway Price">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="number" name="uber_eats_price[]" class="form-control" placeholder="Uber Eats Price">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="number" name="doordash_price[]" class="form-control" placeholder="Doordash Price">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="number" name="weborder_price[]" class="form-control" placeholder="Weborder Price">
                                        </div>
                                        <div class="col-md-1 mb-2">
                                            <button type="button" class="btn btn-danger removeRowVariant">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="addMore" class="btn btn-primary mt-3">Add More</button>
                            </div>
                            <div class="tab-pane fade" id="recipes">
                                <h3>Recipes</h3>

                                <!-- Production -->

                                
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    
               
                   <form></form>
                    <input name="url" type="hidden" id="url" value="<?php echo base_url("production/production/productionitem") ?>" />

                    <div class="row">

                             <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-2 col-form-label"><?php echo display('varient_name') ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <?php 
                            if(empty($item)){$item = array('' => '--Select--');}
                            echo form_dropdown('foodvarientid','','','class="form-control" id="foodvarientid"') ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%"><?php echo display('item_information') ?><i class="text-danger">*</i></th> 
                                            <th class="text-center"><?php echo display('qty') ?> <i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('price');?> </th>
                                            <th class="text-center"><?php echo 'Unit'; ?> </th>
                                            <th class="text-center"></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier">
                                       
                                 <input type="hidden" id="unit-total_1" class="" />
                                        <select name="product_id[]" id="product_id_1" class="postform resizeselect form-control" onchange="product_list(1)">
                    					<option value="" data-title=""><?php echo display('select');?> <?php echo display('ingredients');?></option>
										<?php foreach ($ingrdientslist as $ingrdients) {?>
                    							<option value="<?php echo $ingrdients->id;?>" data-ingredientid="<?php echo $ingrdients->id;?>" data-title="<?php echo $ingrdients->ingredient_name;?>"><?php echo $ingrdients->ingredient_name;?></option>
                    					<?php }?>
                  						</select>
                                        </td>
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" onkeyup='calprice(this)' class="form-control text-right store_cal_1" placeholder="0.00" value="" min="0" tabindex="6">
                                            </td>
                                            <td class="text-right">
                                                <input type="text"  id="price_1" class="form-control text-right store_cal_1" placeholder="0.00" value="" min="0" tabindex="6" readonly>
                                            </td>
                                            <td class="text-right">
                                                <input type="hidden" id="get_uom_listby_ing" value="<?php echo base_url("production/production/getUomDetails") ?>" />
                                                <input type="hidden" name="unitid[]" id="unitid_1" class="form-control text-right store_unitid_1" tabindex="6" readonly>
                                                <input type="text" name="unitname[]" id="unitname_1" class="form-control text-right store_unitname_1" tabindex="6" readonly>
                                            </td>
                                            <td>
                                                <button  class="btn btn-danger red text-right" type="button" value="<?php echo display('delete') ?>" onclick="deleteRow(this)" tabindex="8"><?php echo display('delete') ?></button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <input type="button" id="add_invoice_item" class="btn btn-success" name="add-invoice-item" onclick="addmore('addPurchaseItem');" value="<?php echo display('add_more') ?> <?php echo display('item') ?>" tabindex="9">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                     <div class="form-group row">
                          
                        </div>
                        </form>
                </div> 
            </div>
        </div>
    </div>
    <div id="cntra" hidden>
    <option value="" data-title=""><?php echo display('select');?> <?php echo display('ingredients');?></option>
<?php foreach ($ingrdientslist as $ingrdients) {?><option value="<?php echo $ingrdients->id;?>" data-title="<?php echo $ingrdients->ingredient_name;?>"><?php echo $ingrdients->ingredient_name;?></option><?php }?>
</div>
<script src="<?php echo base_url('application/modules/production/assets/js/production.js'); ?>" type="text/javascript"></script>


                                <!-- Production End -->

                            </div>
                            <div class="tab-pane fade" id="modifiers">
                                
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<div class="mt-3">
    <?php if (!empty($addonslist)) { ?>
        <?php foreach ($addonslist as $addons) { ?>
            <label class="form-label fw-bold"><?php echo $addons->name; ?></label> <!-- Heading -->
            <select class="addons-select form-control" multiple data-group-id="<?php echo $addons->group_id; ?>">
                <option value="select-all-<?php echo $addons->group_id; ?>" class="select-all-option">
                    Select All
                </option>
                <?php 
                $addonItems = explode(', ', $addons->add_on_names); 
                foreach ($addonItems as $addonName) { ?>
                    <option value="<?php echo $addons->group_id . '-' . $addonName; ?>">
                        <?php echo $addonName; ?>
                    </option>
                <?php } ?>
            </select>
        <?php } ?>
    <?php } ?>
</div>




                                            
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

</div>

<style>
        /* ChatGPT-like grey theme */

        .card {
            border: none;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .card-header {
            font-weight: bold;
            background: #e0e0e0;
            color: #333;
            padding: 10px;
            border-radius: 6px 6px 0 0;
        }

        .form-panel{ margin-top: 10px; }

        /* Styled Vertical Tabs */
        .nav-pills {
            background-color: #f3f3f3;
            border-radius: 6px;
            padding: 10px;
            margin-top: 10px;
        }

        .nav-pills > li {
            width: 100%;
            height: auto;
        }

        .nav-pills > li > a {
            color: #333;
            padding: 12px 15px;
            border-radius: 6px;
            display: block;
            text-align: left;
            font-weight: bold;
            word-break: break-all;
        }

        .nav-pills > li.active > a {
            /* background-color: #0097a7; */
            color: white;
        }

        /* Fixed Tab Content Alignment */
        .tab-content {
            background: #ffffff;
            /* border-radius: 6px; */
            padding: 15px 5px;
            /* min-height: 150px; */
            /* border: 1px solid #ddd; */
        }

        /* Ensure "Promotions/Meal Deal" fits */
        .nav-pills > li > a span {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

<style>
                                    .tree-container {
                                        border: 1px solid #ccc;
                                        padding: 10px;
                                        border-radius: 4px;
                                        background: #f8f9fa;
                                    }
                                    .tree-container ul {
                                        list-style-type: none;
                                        padding-left: 10px;
                                    }
                                    .tree-container li {
                                        padding: 5px 0;
                                        /* display: flex; */
                                        align-items: center;
                                        word-break: break-word;
                                    }
                                    .tree-container input[type="checkbox"] {
                                        margin-right: 8px;
                                    }
                                    .treeviewinner{
                                        height: auto;
                                        overflow-y: scroll;
                                    }
                                    .assign-btn {
                                        font-size: 12px;
                                        padding: 5px 10px;
                                    }
                                    .selected-category {
                                        border: 1px solid #ddd;
                                        padding: 8px;
                                        margin-top: 10px;
                                        background: #fff;
                                    }
                                    .remove-icon {
                                        color: grey;
                                        cursor: pointer;
                                        margin-left: 10px;
                                    }
                                </style>
                            
                            <script>
                            $(document).ready(function() {
                                // Sample category data (You can replace it with dynamic PHP data)
                                var categories = [
                                            {
                                                "id": 1,
                                                "name": "Food Menu",
                                                "parentId": 0,
                                                "sub": [
                                                    {
                                                        "id": 3,
                                                        "name": "Starters",
                                                        "parentId": 1,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 4,
                                                        "name": "Tandoori Starters",
                                                        "parentId": 1,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 5,
                                                        "name": "Punjabi Palace Specials",
                                                        "parentId": 1,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 6,
                                                        "name": "Mains",
                                                        "parentId": 1,
                                                        "sub": [
                                                            {
                                                                "id": 7,
                                                                "name": "Vegetarian",
                                                                "parentId": 6,
                                                                "sub": []
                                                            },
                                                            {
                                                                "id": 8,
                                                                "name": "Prawns or Fish",
                                                                "parentId": 6,
                                                                "sub": []
                                                            },
                                                            {
                                                                "id": 9,
                                                                "name": "Chicken, Beef, Lamb or Vegetable",
                                                                "parentId": 6,
                                                                "sub": []
                                                            },
                                                            {
                                                                "id": 10,
                                                                "name": "Tandoori Specials",
                                                                "parentId": 6,
                                                                "sub": []
                                                            }
                                                        ]
                                                    }
                                                ]
                                            },
                                            {
                                                "id": 2,
                                                "name": "Beverage",
                                                "parentId": 0,
                                                "sub": [
                                                    {
                                                        "id": 11,
                                                        "name": "Beer Selection",
                                                        "parentId": 2,
                                                        "sub": [
                                                            {
                                                                "id": 12,
                                                                "name": "Imported Beer",
                                                                "parentId": 11,
                                                                "sub": []
                                                            },
                                                            {
                                                                "id": 13,
                                                                "name": "Local Beer",
                                                                "parentId": 11,
                                                                "sub": []
                                                            },
                                                            {
                                                                "id": 14,
                                                                "name": "Cider",
                                                                "parentId": 11,
                                                                "sub": []
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "id": 15,
                                                        "name": "Spirits",
                                                        "parentId": 2,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 16,
                                                        "name": "HOT Drinks",
                                                        "parentId": 2,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 17,
                                                        "name": "Sparkling Wines",
                                                        "parentId": 2,
                                                        "sub": []
                                                    },
                                                    {
                                                        "id": 18,
                                                        "name": "Red and Rose Wines",
                                                        "parentId": 2,
                                                        "sub": []
                                                    }
                                                ]
                                            }
                                        ];

                            
                                function buildTree(categories, parentEl) {
                                    categories.forEach(function(cat) {
                                        var li = $('<li><label><input type="checkbox" class="category" data-id="' + cat.id + '">' + cat.name + '</label></li>');
                                        var subList = $('<ul></ul>');
                                        if (cat.sub.length > 0) {
                                            buildTree(cat.sub, subList);
                                        }
                                        li.append(subList);
                                        parentEl.append(li);
                                    });
                                }
                            
                                buildTree(categories, $('#categoryTree'));
                            
                                $(document).on('change', '.category', function() {
                                    var isChecked = $(this).is(':checked');
                                    $(this).closest('li').find('input.category').prop('checked', isChecked);
                                    if (!isChecked) {
                                        $(this).parents('li').children('label').find('input.category').prop('checked', false);
                                    }
                                });
                            
                                $('#assignBtn').click(function() {
                                    $('#selectedCategories').empty();
                                    var selected = [];
                                    $('.category:checked').each(function() {
                                        selected.push({ id: $(this).data('id'), name: $(this).parent().text().trim() });
                                    });
                                    if (selected.length > 0) {
                                        selected.forEach(function(cat) {
                                            $('#selectedCategories').append('<div class="selected-item">' + cat.name + ' <a class="remove" data-id="' + cat.id + '"><span class="glyphicon glyphicon-remove-circle"></span></a></div>');
                                        });
                                    } else {
                                        $('#selectedCategories').html('<p>No categories assigned yet.</p>');
                                    }
                                });
                            
                                $(document).on('click', '.remove', function() {
                                    var id = $(this).data('id');
                                    $('.category[data-id="' + id + '"]').prop('checked', false).trigger('change');
                                    $(this).parent().remove();
                                    if ($('#selectedCategories').children().length === 0) {
                                        $('#selectedCategories').html('<p>No categories assigned yet.</p>');
                                    }
                                });
                            });
                            </script>

<style>

        .variant-row .form-control {
            border-radius: 6px;
        }
        .removeRowVariant {
            white-space: nowrap;
            margin-top: 10px;
        }
    </style>

<style>

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


<script>
        $(document).ready(function(){
            $("#addMore").click(function(){
                let row = $(".variant-row:first").clone();
                row.find("input").val(""); 
                $("#variantContainer").append(row);
            });
            
            $(document).on("click", ".removeRowVariant", function(){
                if($(".variant-row").length > 1){
                    $(this).closest(".variant-row").remove();
                } else {
                    alert("At least one row is required.");
                }
            });
        });
    </script>

<script>
$(document).ready(function() {
    $(".addons-select").each(function() {
        let selectBox = $(this);

        selectBox.select2({
            placeholder: "Choose Modifiers",
            closeOnSelect: false,
            allowClear: true,
            templateResult: formatOption,
            templateSelection: formatSelection
        });

        function formatOption(state) {
            if (!state.id) return state.text;
            let checkbox = $("<input>", {
                type: "checkbox",
                class: "select2-checkbox",
                checked: selectBox.find('option[value="' + state.id + '"]').prop("selected")
            });
            return $("<span>").append(checkbox).append(" " + state.text);
        }

        function formatSelection(state) {
            return state.text;
        }

        // Select All Functionality
        selectBox.on("select2:select", function (e) {
            let selectedValue = e.params.data.id;
            if (selectedValue.startsWith("select-all-")) {
                let groupId = selectedValue.replace("select-all-", "");
                let allOptions = selectBox.find("option").not(".select-all-option");
                allOptions.prop("selected", true);
                selectBox.trigger("change");
            }
        });

        selectBox.on("select2:unselect", function (e) {
            let selectedValue = e.params.data.id;
            let allOptions = selectBox.find("option").not(".select-all-option");

            if (selectedValue.startsWith("select-all-")) {
                allOptions.prop("selected", false);
            } else {
                let allSelected = allOptions.filter(":selected").length === allOptions.length;
                selectBox.find("option.select-all-option").prop("selected", allSelected);
            }

            selectBox.trigger("change");
        });
    });
});


</script>