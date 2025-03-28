
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_new_script.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<div class="row">
    <?php echo form_open_multipart("itemmanage/item_food/create_new") ?>
    <?php echo form_hidden('id',$this->session->userdata('id'));?>
    <?php echo form_hidden('ProductsID', (!empty($productinfo['ProductsID'])?$productinfo['ProductsID']:null)) ?>
    <input name="bigimage" type="hidden" value="<?php echo (!empty($productinfo['bigthumb'])?$productinfo['bigthumb']:null) ?>" />
    <input name="mediumimage" type="hidden" value="<?php echo (!empty($productinfo['medium_thumb'])?$productinfo['medium_thumb']:null) ?>" />
    <input name="smallimage" type="hidden" value="<?php echo (!empty($productinfo['small_thumb'])?$productinfo['small_thumb']:null) ?>" />
        <!-- First Panel - Add Form -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Add Food Item</div>
                <div class="card-body form-panel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cusine Type</label>
                                <select name="cusine_type" class="form-control" required="">
                                    <option value="1" <?php if($productinfo['cusine_type']==1){echo "selected";}?>><?php echo 'Restaurant' ?></option> 
                                    <option value="2" <?php if($productinfo['cusine_type']==2){echo "selected";}?>><?php echo 'Banquet' ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kitchen Name</label>
                                <select name="kitchen" class="form-control" required="">
                                    <option value="" selected="selected"><?php echo display('kitchen_name') ?></option> 
                                    <?php foreach($allkitchen as $kitchen){?>
                                    <option value="<?php echo $kitchen->kitchenid;?>" class='bolden' <?php if($productinfo['kitchenid']==$kitchen->kitchenid){echo "selected";}?>><strong><?php echo $kitchen->kitchen_name;?></strong></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Food Name</label>
                                <input name="foodname" class="form-control" type="text" placeholder="<?php echo display('food_name') ?>" id="foodname"  value="<?php echo (!empty($productinfo['ProductName'])?$productinfo['ProductName']:null) ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input name="descrip" class="form-control" type="text" placeholder="<?php echo display('Description') ?>" id="descrip"  value="<?php echo (!empty($productinfo['descrip'])?$productinfo['descrip']:null) ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                                <input name="itemnotes" class="form-control" type="text" placeholder="<?php echo 'Short Description'; ?>" id="itemnotes"  value="<?php echo (!empty($productinfo['itemnotes'])?$productinfo['itemnotes']:null) ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Components</label>
                                <input name="component" class="form-control" data-role="tagsinput" type="text" placeholder="<?php echo display('component') ?>" id="category_subtitle"  value="<?php echo (!empty($productinfo['component'])?$productinfo['component']:null) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a> 
                                <small id="fileHelp" class="text-muted"><img src="<?php echo base_url(!empty($productinfo['ProductImage'])?$productinfo['ProductImage']:'assets/img/icons/default.jpg'); ?>" id="output"  class="img-thumbnail add_cat_img_item"/>
                                </small><input name="big" type="hidden" value="" id="bigurl" />
                                <input type="hidden" name="old_image" value="<?php echo (!empty($productinfo['ProductImage'])?$productinfo['ProductImage']:null) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <?php if((isset($productinfo) && isset($productinfo['production']))){ ?>
                                    <input name="unit" class="form-control" type="number" placeholder="Unit" id="production_unit" value="<?php $productinfo['production'][0]->itemquantity; ?>">
                              <?php  } else { ?>
                                <input name="unit" class="form-control" type="number" placeholder="Unit" id="production_unit" value="1">
                                <?php  } ?>
                                
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check" style="margin-top:30px;">
                                <div class="checkbox checkbox-success">
                                    <!-- Hidden field to ensure unchecked state passes 0 -->
                                    <input type="hidden" name="is_bom"  <?php echo (isset($productinfo) && $productinfo['is_bom'] == 0) ? 'checked' : ''; ?>>

                                    <!-- Checkbox to capture value 1 when checked -->
                                    <input type="checkbox" name="is_bom_check" 
                                    id="is_bom_check"
                                    <?php echo (isset($productinfo) && $productinfo['is_bom'] == 1) ? 'checked' : ''; ?>>
                                    
                                    <label for="is_bom_check">Recipe Mode</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Menu Type</label>
                        <div class="d-flex">
                            <div class="form-check me-3" style="margin-right:10px;">
                                <input type="radio" class="form-check-input" name="food_type" value="1" id="veg"  <?php echo (isset($productinfo) && $productinfo['food_type'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="veg">Vegetarian</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="food_type" value="2" id="non-veg" <?php echo (isset($productinfo) && $productinfo['food_type'] == 0) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="non-veg">Non-Vegetarian</label>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="isoffer" value="1" <?php if(!empty($productinfo))if($productinfo['offerIsavailable']==1){echo "checked";}?> id="isoffer">
                        <label for="isoffer">Offer Available?</label>
                    </div>
                    <div id="offeractive" class="<?php if(!empty($productinfo)){if($productinfo['offerIsavailable']==1){echo "";} else{ echo "showhide";}}else{echo "showhide";}?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Offer Rate (%)</label>
                                    <input name="offerate" class="form-control" type="text"  placeholder="0" id="offerate"  value="<?php echo (!empty($productinfo['OffersRate'])?$productinfo['OffersRate']:'') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Offer Start Date</label>
                                    <input name="offerstartdate" class="form-control datepicker" type="text"  placeholder="<?php echo display('offerdate')?>" id="offerstartdate"  value="<?php echo (!empty($productinfo['offerstartdate'])?$productinfo['offerstartdate']:null) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Offer End Date</label>
                            <input name="offerendate" class="form-control datepicker" type="text"  placeholder="<?php echo display('offerenddate')?>" id="offerendate"  value="<?php echo (!empty($productinfo['offerendate'])?$productinfo['offerendate']:null) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cooked Time</label>
                        <input name="cookedtime" type="text" class="form-control timepicker3" id="cookedtime" placeholder="00:00" autocomplete="off" value="<?php echo (!empty($productinfo['cookedtime'])?$productinfo['cookedtime']:null) ?>" />
                    </div>

                    <div class="form-group">
                        <?php if(!empty($todaymenu)){?>
                            <label for="menutype" class="col-sm-5 col-form-label"><?php echo display('menu_type');?></label>
                            <div class="col-sm-7">
                                <?php 
                                $searcharray=explode(',',(!empty($productinfo['menutype'])?$productinfo['menutype']:null));
                                $m=0;
                                foreach($todaymenu as $tmenu){
                                    $m++;
                                    $key = array_search($tmenu->menutypeid, $searcharray);
                                    ?>
                            <div class="col-sm-5">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="menutype[]" value="<?php echo $tmenu->menutypeid;?>" <?php if(!empty($productinfo))if($searcharray[$key]==$tmenu->menutypeid){echo "checked";}?> id="<?php echo $m;?>">
                                    <label for="<?php echo $m;?>"><?php echo $tmenu->menutype;?></label>
                                    <input name="mytmenu_<?php echo $tmenu->menutypeid;?>" type="hidden" value="<?php echo $tmenu->menutypeid;?>" />
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
                     <?php if(!empty($taxitems)){
                        $tx=0;
                        foreach ($taxitems as $taxitem) {
                           $field_name = 'tax'.$tx; 
                        ?>
                          <div class="form-group">
                                <label for="<?php echo $field_name;?>" class="col-sm-5 col-form-label"><?php echo $taxitem['tax_name'];?></label>
                                <div class="col-sm-7">
                                    
                                    <input name="<?php echo $field_name;?>" type="text" class="form-control" id="<?php echo $field_name;?>" placeholder="<?php echo $taxitem['tax_name'];?>" autocomplete="off" value="<?php echo (!empty($productinfo['$field_name'])?$productinfo['$field_name']:null) ?>" />
                                    </div>
                            </div>
                        <?php
                        $tx++;
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status"  class="form-control">
                            <option value=""  selected="selected"><?php echo display('select_option');?></option>
                            <option value="1" <?php  if(!empty($productinfo)){if($productinfo['ProductsIsActive']==1){echo "Selected";}} else{echo "Selected";} ?>><?php echo display('active')?></option>
                            <option value="0" <?php  if(!empty($productinfo)){if($productinfo['ProductsIsActive']==0){echo "Selected";}} ?>><?php echo display('inactive')?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date"><?php echo display('production')?> <?php echo display('date')?><i class="text-danger">*</i>
                        </label>
                        <?php if((isset($productinfo) && isset($productinfo['production']))){ ?>
                        <input type="text" class="form-control datepicker" name="production_date" value="<?php echo isset($productinfo['production'][0]->saveddate) ? $productinfo['production'][0]->saveddate : date('Y-m-d'); ?>" id="production_date" required="" tabindex="2">
                        <?php } else { ?>
                            <input type="text" class="form-control datepicker" name="production_date" value="<?php echo date('Y-m-d');?>" id="production_date" required="" tabindex="2">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="date"><?php echo display('expdate')?> <a class="" data-toggle="tooltip" data-placement="top" title="<?php echo display('expiredatenotes')?>"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                        </label>
                        <?php if((isset($productinfo) && isset($productinfo['production']))){ ?>
                        <input type="text" class="form-control datepicker" name="expire_date" value="<?php echo isset($productinfo['production'][0]->productionexpiredate) ? $productinfo['production'][0]->productionexpiredate : date('Y-m-d'); ?>" id="expire_date" required="" tabindex="2">
                        <?php } else { ?>
                        <input type="text" class="form-control datepicker" name="expire_date" value="<?php echo date('Y-m-d');?>" id="expire_date" required="" tabindex="2">
                        <?php } ?>
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
        </div>
        <!-- Second Panel - Vertical Tabs -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Food Details</div>
                <div class="card-body">
                    <div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
                    <!-- Categories Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingCategories">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" class="accordion-plus-toggle">
                                Categories
                                </a>
                            </h5>
                        </div>
                        <div id="collapseCategories" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCategories">
                            <div class="panel-body">
                                <div class="mt-3">
                                    <?php if (!empty($categories)) { ?>
                                        <?php 
                                            // Convert CategoryID string to an array
                                            $selectedCategories = explode(',', $productinfo['CategoryID']);
                                        ?>
                                        <?php foreach ($categories as $category) { ?>
                                            <?php if ($category->parentid == 0) { ?>
                                            <?php $all_subcategories = sub_categories_by_parent_id($category->CategoryID); ?>
                                                  <label class="form-label fw-bold"><?php echo $category->Name; ?></label>
                                               
                                                <select id="categorySelect_<?php echo $category->CategoryID; ?>" name="CategoryID[]" class="form-control selectcategories" multiple data-group-id="<?php echo $category->CategoryID; ?>">
                                                    <?php 
                                                    if (!empty($all_subcategories)) { 
                                                        foreach ($all_subcategories as $all_subcategory) { ?>
                                                            <option value="parent_<?php echo $all_subcategory->CategoryID; ?>" class="fw-bold"  <?php if(in_array($all_subcategory->CategoryID, $selectedCategories)){echo "selected";} ?> >
                                                                <?php echo $all_subcategory->Name; ?>
                                                            </option>

                                                            <?php if (!empty($all_subcategory->sub)) {
                                                                foreach ($all_subcategory->sub as $child) { ?>
                                                                    <option value="<?php echo $all_subcategory->CategoryID; ?>_<?php echo $child->CategoryID; ?>" data-parent="parent_<?php echo $all_subcategory->CategoryID; ?>" <?php if(in_array($child->CategoryID, $selectedCategories)){echo "selected";} ?>>
                                                                        -- <?php echo $child->Name; ?>
                                                                    </option>

                                                                    <?php if (!empty($child->sub)) {
                                                                        foreach ($child->sub as $subChild) { ?>
                                                                            <option value="<?php echo $child->CategoryID; ?>_<?php echo $subChild->CategoryID; ?>" data-parent="child_<?php echo $child->CategoryID; ?>" <?php if(in_array($subChild->CategoryID, $selectedCategories)){echo "selected";} ?>>
                                                                                ---- <?php echo $subChild->Name; ?>
                                                                            </option>
                                                                        <?php }
                                                                    } ?>
                                                                <?php }
                                                            } ?>
                                                        <?php }
                                                    } ?>
                                                </select>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Variants Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingVariants">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseVariants" aria-expanded="false" aria-controls="collapseVariants" class="accordion-plus-toggle">
                                Variants
                                </a>
                            </h5>
                        </div>
                        <!-- Check if in edit view -->
                        <?php if(!empty($productinfo) && isset($productinfo['variants'])  && !empty($productinfo['variants']) ) { ?>
                        <div id="collapseVariants" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingVariants">
                            <div class="panel-body">
                                <div id="variantContainer">
                                <?php foreach($productinfo['variants'] as $variant) { ?>
                                    <div class="row variant-rowedit mb-2">
                                        <div class="col-md-12 mb-2">
                                            <input type="hidden" name="variant_id[]" class="form-control" value="<?php echo $variant->variantid; ?>">
                                            <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name" value="<?php echo $variant->variantName; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="number" name="price[]" class="form-control" placeholder="Price" value="<?php echo $variant->price; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="number" name="takeaway_price[]" class="form-control" placeholder="Takeaway Price" value="<?php echo $variant->takeaway_price; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="number" name="uber_eats_price[]" class="form-control" placeholder="Uber Eats Price" value="<?php echo $variant->uber_eats_price; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="number" name="doordash_price[]" class="form-control" placeholder="Doordash Price" value="<?php echo $variant->doordash_price; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="number" name="weborder_price[]" class="form-control" placeholder="Weborder Price" value="<?php echo $variant->web_order_price; ?>">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <button type="button" class="removeEditRowVariant">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                                <button type="button" id="addMoreEdit" class="btn btn-primary mt-3">Add More</button>
                                <button type="button" id="saveEditVariantUpdt" class="btn btn-secondary mt-3">Save</button>
                            </div>
                        </div>
                        <?php } else { ?>
                        <!-- End of edit view -->
                        <div id="collapseVariants" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingVariants">
                            <div class="panel-body">
                                <div id="variantContainer">
                                    <div class="row variant-row mb-2">
                                        <div class="col-md-12 mb-2"><input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name" value="Regular"></div>
                                        <div class="col-md-2 mb-2"><input type="number" name="price[]" class="form-control" placeholder="Price"></div>
                                        <div class="col-md-2 mb-2"><input type="number" name="takeaway_price[]" class="form-control" placeholder="Takeaway Price"></div>
                                        <div class="col-md-2 mb-2"><input type="number" name="uber_eats_price[]" class="form-control" placeholder="Uber Eats Price"></div>
                                        <div class="col-md-2 mb-2"><input type="number" name="doordash_price[]" class="form-control" placeholder="Doordash Price"></div>
                                        <div class="col-md-2 mb-2"><input type="number" name="weborder_price[]" class="form-control" placeholder="Weborder Price"></div>
                                        <div class="col-md-2 mb-2"><button type="button" class="removeRowVariant"><span class="glyphicon glyphicon-remove-circle"></span></button></div>
                                    </div>
                                </div>
                                <button type="button" id="addMore" class="btn btn-primary mt-3">Add More</button>
                                <button type="button" id="saveEditVariant" class="btn btn-secondary mt-3">Save</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Recipes Panel -->
                    <div class="panel panel-default" id="recipesPanel">
                        <div class="panel-heading" role="tab" id="headingRecipes">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseRecipes" aria-expanded="false" aria-controls="collapseRecipes" class="accordion-plus-toggle"> 
                                    Recipes <em style="font-size: 10px; font-weight: bold; padding: 2px 5px; background-color: yellow; animation: highlightBlink 1s infinite alternate;">
                                    *Note: Please save variants before adding recipes if recipe mode is enabled!
                                </em>

                                </a>
                            </h5>
                        </div>
                        <div id="collapseRecipes" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingRecipes">
                            <div class="panel-body">
                                <!-- <h3>Recipes</h3> -->
                                <input type="hidden" name="foodCheckBomorNotBomUrl" id="foodCheckBomorNotBomUrl" value="<?php echo base_url('production/production/check_food_item_without_bom'); ?>"/>
                                <input name="url" type="hidden" id="url" value="<?php echo base_url('production/production/productionitem'); ?>" />
                                <input type="hidden" id="get_uom_listby_ing" value="<?php echo base_url('production/production/getUomDetails'); ?>" />
                                <!-- Get Edit view data begin -->
                                <?php 
                                // Group recipes by variantName
                                $groupedRecipes = [];
                                if (!empty($productinfo) && isset($productinfo['recipes']) && !empty($productinfo['recipes'])) {
                                    foreach ($productinfo['recipes'] as $recipe) {
                                        $groupedRecipes[$recipe->variantName][] = $recipe;
                                    }
                                }
                                ?>

                                <!-- Get Edit view data begin -->
                                <?php if (!empty($groupedRecipes)) { ?>
                                    <?php foreach ($groupedRecipes as $variantName => $recipes) { ?>
                                        <div class="variant-recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                            <h4>Recipe for - <?php echo $variantName; ?></h4>
                                            <input type="hidden" name="recipe_for[]" value="<?php echo $variantName; ?>"/>
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
                                                    <?php foreach ($recipes as $recipe) { ?>
                                                        <tr>
                                                            <td class="span3 supplier">
                                                                <input type="hidden" id="unit-total_1" class="" />
                                                                <select name="product_id_<?php echo $variantName; ?>[]" id="product_id_1" class="postform resizeselect form-control" onchange="product_list(1)">
                                                                    <option value="" data-title=""><?php echo display('select');?> <?php echo display('ingredients');?></option>
                                                                    <?php foreach ($ingrdientslist as $ingredient) { ?>
                                                                        <option value="<?php echo $ingredient->id;?>" data-ingredientid="<?php echo $ingredient->id;?>" data-title="<?php echo $ingredient->ingredient_name;?>" <?php echo ($recipe->ingredientid == $ingredient->id) ? 'selected' : ''; ?>>
                                                                            <?php echo $ingredient->ingredient_name;?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="qty_<?php echo $variantName; ?>[]" class="form-control text-right" value="<?php echo $recipe->qty; ?>">
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="price_<?php echo $variantName; ?>[]" class="form-control text-right">
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="unit_<?php echo $variantName; ?>[]" class="form-control text-right" value="<?php echo $recipe->unitname; ?>" readonly>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <!-- Get Edit view data end -->
                                <div id="recipeContainer">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Modifiers Panel -->
                    <div class="panel panel-default" id="modifiersPanel">
                        <div class="panel-heading" role="tab" id="headingModifiers">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseModifiers" aria-expanded="false" aria-controls="collapseModifiers" class="accordion-plus-toggle">
                                    Modifiers
                                </a>
                            </h5>
                        </div>
                        <div id="collapseModifiers" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingModifiers">
                            <div class="panel-body">
                                <div class="mt-3">
                                <?php if (!empty($addonslist)) { ?>
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th scope="col" style="width:10%"></th>
                                                    <th scope="col" style="width:50%">Modifier Name</th>
                                                    <th scope="col" style="width:10%">Min</th>
                                                    <th scope="col" style="width:10%">Max</th>
                                                    <th scope="col" style="width:10%">Is Require</th>
                                                    <th scope="col" style="width:10%">Sort Order</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($addonslist as $addons) { ?>
                                                    <?php 
                                                        $selectedModifers = []; // Initialize before checking
                                                        if (!empty($productinfo) && isset($productinfo['modifiers']) && !empty($productinfo['modifiers'])) {
                                                            foreach ($productinfo['modifiers'] as $modifier) {
                                                                $selectedModifers[] = $modifier->modifier_groupid; // Append instead of overwrite
                                                            }
                                                        }
                                                    ?>
                                                            <?php
                                                                $disableField = (!empty($selectedModifers) && in_array($addons->group_id, $selectedModifers)) ? '' : 'disabled';
                                                            ?>

                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input modifier-checkbox" type="checkbox" name="modifiers[]" value="<?php echo $addons->group_id; ?>" id="modifiers_<?php echo $addons->group_id; ?>" data-group-id="<?php echo $addons->group_id; ?>"
                                                                        <?php echo (!empty($selectedModifers) && in_array($addons->group_id, $selectedModifers)) ? 'checked' : ''; ?>
                                                                    >
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label for="modifiers_<?php echo $addons->group_id; ?>" class="form-label"><?php echo $addons->name; ?></label>
                                                            </td>
                                                            <td>
                                                               
                                                                <input type="text" class="form-control modifierminsel" name="min[]" id="minsel_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control modifiermaxsel" name="max[]" id="maxsel_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input modifierisreq" name="isreq[]" id="isreq_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="sort[]" id="sort_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                            </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
   <?php echo form_close() ?>
</div>
</div>

<div id="cntra" hidden>
    <option value="" data-title=""><?php echo display('select');?> <?php echo display('ingredients');?></option>
<?php foreach ($ingrdientslist as $ingrdients) {?><option value="<?php echo $ingrdients->id;?>" data-title="<?php echo $ingrdients->ingredient_name;?>"><?php echo $ingrdients->ingredient_name;?></option><?php }?>
</div>

<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_script.js'); ?>" type="text/javascript"></script>
<?php 
    if(empty($productinfo->ProductsID)):
?>
<style>
@keyframes highlightBlink {
    0% { background-color: yellow; }
    100% { background-color: transparent; }
}
</style>
<script type="text/javascript">
    $(document).on("click", "#addfooditemsubmit", (e)=>{
    e.preventDefault();
    // alert("Form Submission Prevented " + $("#addfooditemsubmit").closest("form"));
    // return false;
    const
      $foodname = $("#foodname"),
      $regPrice = $("#regPrice"),
      $takeawayPrice = $("#takeawayPrice"),
      $uberEatsPrice = $("#uberEatsPrice"),
      $webOrderPrice = $("#webOrderPrice"),
      $addfooditemerr = $("#addfooditemerr");
    var
      foodname = $foodname.val(),
      regPrice = $regPrice.val(),
      takeawayPrice = $takeawayPrice.val(),
      uberEatsPrice = $uberEatsPrice.val(),
      webOrderPrice = $webOrderPrice.val();
    $addfooditemerr.text("");
    $addfooditemerr.hide();
    if (foodname == "") {
      $addfooditemerr.text("* Food Name cannot be left blank");
      $addfooditemerr.show();
      $foodname.focus();
      return false;
    }
    if (regPrice == "") {
      $addfooditemerr.text("* Food regular price cannot be left blank");
      $addfooditemerr.show();
      $regPrice.focus();
      return false;
    } else {
      if (isNaN(regPrice)) {
        $addfooditemerr.text("* Please enter a valid amount");
        $addfooditemerr.show();
        $regPrice.focus();
        return false;
      }
    }
    if (takeawayPrice == "") {
      $addfooditemerr.text("* Food takeaway price cannot be left blank");
      $addfooditemerr.show();
      $takeawayPrice.focus();
      return false;
    } else {
      if (isNaN(takeawayPrice)) {
        $addfooditemerr.text("* Please enter a valid amount");
        $addfooditemerr.show();
        $takeawayPrice.focus();
        return false;
      }
    }
    if (uberEatsPrice == "") {
      $addfooditemerr.text("* Food uber eats price cannot be left blank");
      $addfooditemerr.show();
      $uberEatsPrice.focus();
      return false;
    }  else {
      if (isNaN(uberEatsPrice)) {
        $addfooditemerr.text("* Please enter a valid amount");
        $addfooditemerr.show();
        $uberEatsPrice.focus();
        return false;
      }
    }
    if (webOrderPrice == "") {
      $addfooditemerr.text("* Food web order price cannot be left blank");
      $addfooditemerr.show();
      $webOrderPrice.focus();
      return false;
    } else {
      if (isNaN(webOrderPrice)) {
        $addfooditemerr.text("* Please enter a valid amount");
        $addfooditemerr.show();
        $webOrderPrice.focus();
        return false;
      }
    }
    $("#addfooditemsubmit").closest("form").submit();
    // return false;
  });
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
<?php 
    endif;
?>
