
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_new_script.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<div class="row">
    <?php echo form_open_multipart("itemmanage/item_food/create_new") ?>
    <?php echo form_hidden('id',$this->session->userdata('id'));?>
    <?php echo form_hidden('ProductsID', (isset($productinfo) && !empty($productinfo['ProductsID'])?$productinfo['ProductsID']:null)) ?>
    <input name="bigimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['bigthumb'])?$productinfo['bigthumb']:null) ?>" />
    <input name="mediumimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['medium_thumb'])?$productinfo['medium_thumb']:null) ?>" />
    <input name="smallimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['small_thumb'])?$productinfo['small_thumb']:null) ?>" />
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
                                    <option value="1" <?php if(isset($productinfo) && $productinfo['cusine_type']==1){echo "selected";}?>><?php echo 'Restaurant' ?></option> 
                                    <option value="2" <?php if(isset($productinfo) && $productinfo['cusine_type']==2){echo "selected";}?>><?php echo 'Banquet' ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kitchen Name</label>
                                <select name="kitchen" class="form-control" required="">
                                    <!-- <option value="" selected="selected"><?php echo display('kitchen_name') ?></option>  -->
                                    <?php foreach($allkitchen as $kitchen){?>
                                    <option value="<?php echo $kitchen->kitchenid;?>" class='bolden' <?php if(isset($productinfo) && $productinfo['kitchenid']==$kitchen->kitchenid){echo "selected";}?>><strong><?php echo $kitchen->kitchen_name;?></strong></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Food Name</label>
                                <input name="foodname" class="form-control" type="text" placeholder="<?php echo display('food_name') ?>" id="foodname"  value="<?php echo (isset($productinfo) && !empty($productinfo['ProductName'])?$productinfo['ProductName']:null) ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input name="descrip" class="form-control" type="text" placeholder="<?php echo display('Description') ?>" id="descrip"  value="<?php echo (isset($productinfo) && !empty($productinfo['descrip'])?$productinfo['descrip']:null) ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                                <input name="itemnotes" class="form-control" type="text" placeholder="<?php echo 'Short Description'; ?>" id="itemnotes"  value="<?php echo (isset($productinfo) && !empty($productinfo['itemnotes'])?$productinfo['itemnotes']:null) ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Components</label>
                                <input name="component" class="form-control" data-role="tagsinput" type="text" placeholder="<?php echo display('component') ?>" id="category_subtitle"  value="<?php echo (isset($productinfo) && !empty($productinfo['component'])?$productinfo['component']:null) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a> 
                                <small id="fileHelp" class="text-muted"><img src="<?php echo base_url(isset($productinfo) && !empty($productinfo['ProductImage'])?$productinfo['ProductImage']:'assets/img/icons/default.jpg'); ?>" id="output"  class="img-thumbnail add_cat_img_item"/>
                                </small><input name="big" type="hidden" value="" id="bigurl" />
                                <input type="hidden" name="old_image" value="<?php echo (isset($productinfo) && !empty($productinfo['ProductImage'])?$productinfo['ProductImage']:null) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Size</label>
                                <?php if((isset($productinfo) && !empty($productinfo))){ ?>
                                    <?php if(isset($productinfo['production']) && !empty($productinfo['production'])) {  ?>
                                        <input name="unit" class="form-control" type="number" placeholder="Unit" id="production_unit" value="<?php echo $productinfo['production'][0]->itemquantity; ?>">
                                    <?php } else {?>
                                        <input name="unit" class="form-control" type="number" placeholder="Unit" id="production_unit" value="1">
                                    <?php  } ?>
                                    
                              <?php  } else { ?>
                                <input name="unit" class="form-control" type="number" placeholder="Unit" id="production_unit" value="1">
                                <?php  } ?>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unit</label>
                                    <?php if(isset($units) && !empty($units)) { ?>
                                    <div class="form-group">
                                        <select class="form-control" id="uomid" name="uomid">
                                            <?php foreach($units as $unit) { ?>
                                                <option value="<?php echo $unit->id; ?>" 
                                                    <?php if(isset($productinfo) && !empty($productinfo)) { 
                                                        if($productinfo['uomid'] == $unit->id) { echo "selected"; }
                                                    } ?>> 
                                                    <?php echo $unit->uom_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning" role="alert">
                                        No units available.
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
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
                        <label>Food Type</label>
                        <div class="d-flex">
                            <div class="form-check me-3" style="margin-right:10px;">
                                <input type="radio" class="form-check-input" name="food_type" value="1" id="veg"  <?php echo (isset($productinfo) && $productinfo['food_type'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="veg">Vegetarian</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="food_type" value="0" id="non-veg" <?php echo (isset($productinfo) && $productinfo['food_type'] == 0) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="non-veg">Non-Vegetarian</label>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="isoffer" value="1" <?php if(isset($productinfo) && !empty($productinfo))if($productinfo['offerIsavailable']==1){echo "checked";}?> id="isoffer">
                        <label for="isoffer">Offer Available?</label>
                    </div>
                    <div id="offeractive" class="<?php if(isset($productinfo) && !empty($productinfo)){if($productinfo['offerIsavailable']==1){echo "";} else{ echo "showhide";}}else{echo "showhide";}?>">
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
                                $searcharray=explode(',',(isset($productinfo) && !empty($productinfo['menutype'])?$productinfo['menutype']:null));
                                $m=0;
                                foreach($todaymenu as $tmenu){
                                    $m++;
                                    $key = array_search($tmenu->menutypeid, $searcharray);
                                    ?>
                            <div class="col-sm-5">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="menutype[]" value="<?php echo $tmenu->menutypeid;?>" <?php if(isset($productinfo) && !empty($productinfo))if($searcharray[$key]==$tmenu->menutypeid){echo "checked";}?> id="<?php echo $m;?>">
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
                            <option value="1" <?php  if(isset($productinfo) && !empty($productinfo)){if($productinfo['ProductsIsActive']==1){echo "Selected";}} else{echo "Selected";} ?>><?php echo display('active')?></option>
                            <option value="0" <?php  if(isset($productinfo) && !empty($productinfo)){if($productinfo['ProductsIsActive']==0){echo "Selected";}} ?>><?php echo display('inactive')?></option>
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

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
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
                                <!-- <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" class="accordion-plus-toggle"> -->
                                <a role="button" data-toggle="collapse" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" class="accordion-plus-toggle">
                                Categories
                                </a>
                            </h5>
                        </div>
                        <div id="collapseCategories" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCategories">
                            <div class="panel-body">
                                <div class="mt-3">
                                    <?php if (!empty($categories)) { ?>
                                        <?php 
                                            if(isset($productinfo)) {
                                                // Convert CategoryID string to an array
                                                $selectedCategories = explode(',', $productinfo['CategoryID']);
                                            } else {
                                                $selectedCategories = [];
                                            }

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
                                <!-- <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseVariants" aria-expanded="false" aria-controls="collapseVariants" class="accordion-plus-toggle">
                                Variants
                                </a> -->
                                <a role="button" data-toggle="collapse" href="#collapseVariants" aria-expanded="false" aria-controls="collapseVariants" class="accordion-plus-toggle">
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
                                            <small>Price</small>
                                            <input type="text" name="price[]" class="form-control" placeholder="Price" value="<?php echo $variant->price; ?>"><br/><span class="price-comparison"></span>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <small>Takeaway</small>
                                            <input type="text" name="takeaway_price[]" class="form-control" placeholder="Takeaway Price" value="<?php echo $variant->takeaway_price; ?>"><br/><span class="price-comparison"></span>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <small>Ubereats</small>
                                            <input type="text" name="uber_eats_price[]" class="form-control" placeholder="Uber Eats Price" value="<?php echo $variant->uber_eats_price; ?>"><br/><span class="price-comparison"></span>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <small>Doordash</small>
                                            <input type="text" name="doordash_price[]" class="form-control" placeholder="Doordash Price" value="<?php echo $variant->doordash_price; ?>"><br/><span class="price-comparison"></span>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <small>Weborder</small>
                                            <input type="text" name="weborder_price[]" class="form-control" placeholder="Weborder Price" value="<?php echo $variant->web_order_price; ?>"><br/><span class="price-comparison"></span>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                        <input type="hidden" id="get_deletemodifier" value="<?php echo base_url('/itemmanage/item_food/delete_variant'); ?>" />
                                            <button type="button" data-variantid="<?php echo $variant->variantid; ?>" data-menuid="<?php echo $productinfo['ProductsID']; ?>" class="removeEditRowVariant">
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
                                        <div class="col-md-12 mb-2"><input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name" ></div>
                                        <div class="col-md-2 mb-2"><small>Price</small><input type="text" name="price[]" class="form-control" placeholder="Price"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Takeaway</small><input type="text" name="takeaway_price[]" class="form-control" placeholder="Takeaway Price"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Ubereats</small><input type="text" name="uber_eats_price[]" class="form-control" placeholder="Uber Eats Price"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Doordash</small><input type="text" name="doordash_price[]" class="form-control" placeholder="Doordash Price"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Weborder</small><input type="text" name="weborder_price[]" class="form-control" placeholder="Weborder Price"><br/><span class="price-comparison"></span></div>
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
                                <!-- <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseRecipes" aria-expanded="false" aria-controls="collapseRecipes" class="accordion-plus-toggle"> 
                                    Recipes <em style="font-size: 10px; font-weight: bold; padding: 2px 5px; background-color: yellow; animation: highlightBlink 1s infinite alternate;">
                                    *Note: Please save variants before adding recipes if recipe mode is enabled!
                                </em>

                                </a> -->
                                <a role="button" data-toggle="collapse" href="#collapseRecipes" aria-expanded="false" aria-controls="collapseRecipes" class="accordion-plus-toggle"> 
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
                                <input name="url" type="hidden" id="url" value="<?php echo base_url('itemmanage/item_food/getingredientitem'); ?>" />
                                <input type="hidden" id="get_uom_listby_ing" value="<?php echo base_url('production/production/getUomDetailsNew'); ?>" />
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
                                            <!-- Variant Id -->
                                             <?php $variantNm = strtolower(str_replace(' ', '_', $variantName)); ?>
                                            <!-- Variant ID End -->
                                            <small>Recipe Cost Price</small>
                                            <input type="text" class="form-control" id="recipe_costprice_<?php echo $variantNm; ?>" name="recipe_costprice_<?php echo $variantNm; ?>[]"/>
                                            <input type="hidden" name="recipe_for[]" value="<?php echo $variantNm; ?>"/>
                                            <table class="table table-bordered table-hover" id="recipeTable_<?php echo $variantNm; ?>">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="200"><?php echo display('item_information') ?><i class="text-danger">*</i></th> 
                                                        <th class="text-center"><?php echo display('qty') ?> <i class="text-danger">*</i></th>
                                                        <th class="text-center"><?php echo display('price');?> </th>
                                                        <th class="text-center"><?php echo 'Unit'; ?> </th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="addPurchaseItem_<?php echo $variantNm; ?>">
                                                    <?php $i = 1;
                                                    foreach ($recipes as $key=>$recipe) { ?>
                                                        <tr>
                                                            <td class="span3 supplier">
                                                                <input type="hidden" name="variant_id_<?php echo $variantNm; ?>[]" value="<?php echo $recipe->pvarientid;?>" >
                                                                <input type="hidden" name="menu_id_<?php echo $variantNm; ?>[]" value="<?php echo $productinfo['ProductsID'];?>" >
                                                                <input type="hidden" id="unit-total_1" class="" />
                                                                <select name="product_id_<?php echo $variantNm; ?>[]" id="product_id_<?php echo $variantName; ?>" class="postform resizeselect form-control ingredient-selecteditview">
                                                                    <option value="" data-title=""><?php echo display('select');?> <?php echo display('ingredients');?></option>
                                                                    <?php foreach ($ingrdientslist as $ingredient) { ?>
                                                                        <option value="<?php echo $ingredient->id;?>" data-ingredientid="<?php echo $ingredient->id;?>" data-title="<?php echo $ingredient->ingredient_name;?>" <?php echo ($recipe->ingredientid == $ingredient->id) ? 'selected' : ''; ?>>
                                                                            <?php echo $ingredient->ingredient_name;?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="product_quantity_<?php echo $variantNm; ?>[]" id="product_quantity_<?php echo $variantNm;; ?>_<?php echo $i; ?>" data-row-id="<?php echo $variantNm; ?>_<?php echo $i; ?>" class="form-control text-right quantityCheck" value="<?php echo $recipe->qty; ?>">
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="product_price_<?php echo $variantNm; ?>[]" id="product_price_<?php echo $variantNm; ?>_<?php echo $i; ?>" class="form-control text-right product_price_<?php echo $variantNm; ?>" value="<?php echo $recipe->recipe_price; ?>">
                                                            </td>
                                                            <td class="text-right">
                                                            <?php
                                                                $recipe_ingr = get_ingredient_unit($recipe->ingredientid);

                                                                $unit_price = 0.000; // default value
                                                                if ($recipe_ingr && isset($recipe_ingr->purchase_price, $recipe_ingr->convt_ratio) && $recipe_ingr->convt_ratio != 0) {
                                                                    $unit_price = $recipe_ingr->cost_perunit;
                                                                }
                                                                ?>

                                                                <input type="hidden" id="unit-total_<?php echo $variantNm; ?>_<?php echo $i; ?>" value="<?php echo $unit_price; ?>">

                                                                <input type="hidden" name="unitid_<?php echo $variantNm; ?>[]" id="unitid_<?php echo $variantNm; ?>_<?php echo $i; ?>" class="form-control text-right" value="<?php echo $recipe->unitid; ?>">
                                                                <input type="text" name="unitname_<?php echo $variantNm; ?>[]" id="unitname_<?php echo $variantNm; ?>_<?php echo $i; ?>"class="form-control text-right" value="<?php echo $recipe->unitname; ?>" readonly>
                                                            </td>
                                                            <td class="text-center">
                                                            <input name="url" type="hidden" id="get_delrecipe" value="<?php echo base_url('itemmanage/item_food/delete_recipe_ingredient'); ?>" />
                                                                <button type="button" class="btn btn-danger btn-sm removeEditRecipeBtn" data-ingredientid="<?php echo $recipe->ingredientid; ?>" data-variantid="<?php echo $recipe->pvarientid; ?>" data-menuid="<?php echo $productinfo['ProductsID']; ?>"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php $i++; } ?>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-success add-item" data-variant="<?php echo $variantNm; ?>">Add More Item</button>
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
                                <!-- <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseModifiers" aria-expanded="false" aria-controls="collapseModifiers" class="accordion-plus-toggle">
                                    Modifiers
                                </a> -->
                                <a role="button" data-toggle="collapse" href="#collapseModifiers" aria-expanded="false" aria-controls="collapseModifiers" class="accordion-plus-toggle">
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
                                                        $selectedModifers = []; 
                                                        $modifierData = null; // Store modifier data if exists

                                                        if (!empty($productinfo) && isset($productinfo['modifiers']) && !empty($productinfo['modifiers'])) {
                                                            foreach ($productinfo['modifiers'] as $modifier) {
                                                                if ($modifier->modifier_groupid == $addons->group_id) {
                                                                    $modifierData = $modifier; // Assign existing modifier data
                                                                }
                                                                $selectedModifers[] = $modifier->modifier_groupid;
                                                            }
                                                        }

                                                        $disableField = !empty($modifierData) ? '' : 'disabled';
                                                    ?>

                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input modifier-checkbox" type="checkbox" 
                                                                    name="modifiers[]" value="<?php echo $addons->group_id; ?>" 
                                                                    id="modifiers_<?php echo $addons->group_id; ?>" 
                                                                    data-group-id="<?php echo $addons->group_id; ?>"
                                                                    <?php echo !empty($modifierData) ? 'checked' : ''; ?>
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <label for="modifiers_<?php echo $addons->group_id; ?>" class="form-label">
                                                                <?php echo $addons->name; ?>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control modifierminsel" name="min[]" 
                                                                value="<?php echo !empty($modifierData) ? $modifierData->min : ''; ?>" 
                                                                id="minsel_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control modifiermaxsel" name="max[]" 
                                                                value="<?php echo !empty($modifierData) ? $modifierData->max : ''; ?>" 
                                                                id="maxsel_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" class="form-check-input modifierisreq" 
                                                                name="isreq[]" id="isreq_<?php echo $addons->group_id; ?>" 
                                                                <?php echo (!empty($modifierData) && $modifierData->isreq == 1) ? 'checked' : ''; ?> 
                                                                <?php echo $disableField; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="sort[]" 
                                                                value="<?php echo !empty($modifierData) ? $modifierData->sortby : ''; ?>" 
                                                                id="sort_<?php echo $addons->group_id; ?>" <?php echo $disableField; ?>>
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
<script>
   


</script>
<style>
    .form-group {
    margin-bottom: 12px;
    }
    .bg-gray-orphane {
    background-color: #f3f3f3;
    padding:10px;
    }
    .removeEditRowVariant {
    margin-top: 24px;
    }
    span.price-comparison {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.1rem;
    position: absolute;
    bottom: -10px;
}
</style>
<?php 
    endif;
?>
