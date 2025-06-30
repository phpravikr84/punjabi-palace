<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_new_script.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input {
  display: none;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 34px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  transition: .4s;
}

.slider:before {
  content: "";
  position: absolute;
  height: 16px;
  width: 16px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  border-radius: 50%;
  transition: .4s;
}

.switch input:checked + .slider {
  background-color: #2196F3;
}

.switch input:checked + .slider:before {
  transform: translateX(20px);
}
</style>
<?php 
// echo "<pre>";
// print_r($productinfo);
// echo "</pre>"; 
// echo "variants: ".$productinfo['variants'][0]->variantName;
?>
<div class="row">
    <!-- <pre>
        <?php ##print_r($productinfo); ?>
    </pre> -->
    <!-- Button area -->
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_food/index'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Manage Item'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_food/create_new'); ?>" class="btn btn-success"><?php echo 'Create Item'; ?></a>
        </div>
    </div>
  
    <?php
        $action_url = isset($id) && $id ? 'itemmanage/item_food/create_new/' . $id : 'itemmanage/item_food/create_new';
        echo form_open_multipart($action_url, ['id' => 'addFoodItemForm']);
    ?>
    <?php echo form_hidden('id',$this->session->userdata('id'));?>
    <?php echo form_hidden('ProductsID', (isset($productinfo) && !empty($productinfo['ProductsID'])?$productinfo['ProductsID']:null)) ?>
    <input name="bigimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['bigthumb'])?$productinfo['bigthumb']:null) ?>" />
    <input name="mediumimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['medium_thumb'])?$productinfo['medium_thumb']:null) ?>" />
    <input name="smallimage" type="hidden" value="<?php echo (isset($productinfo) && !empty($productinfo['small_thumb'])?$productinfo['small_thumb']:null) ?>" />
    <input type="hidden" name="foodItemCheck" id="foodItemCheck" value="<?php echo base_url('itemmanage/item_food/check_food_production'); ?>" />
        <div class="text-right mb-3">
            <!-- <input type="checkbox" name="recipe_mode_toggle" id="recipe_mode_toggle" class="mr-3" checked data-toggle="toggle" data-onstyle="success" data-width="100"> -->
            <input type="hidden" name="recipeMode" id="recipeMode">
            <button type="submit" class="btn btn-primary w-100">Save Item</button>
        </div>
        <!-- First Panel - Add Form -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Add Item</div>
                <div class="card-body form-panel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cusine Type</label>
                                <select name="cusine_type" class="form-control" required="">
                                    <option value="1" <?=((isset($productinfo) && $productinfo['cusine_type']==1)?"selected":'')?>><?php echo 'Restaurant' ?></option>
                                    <option value="2" <?php if(isset($productinfo) && $productinfo['cusine_type']==2){echo "selected";}?>><?php echo 'Banquet' ?></option>
                                    <option value="3" <?php if(isset($productinfo) && $productinfo['cusine_type']==3){echo "selected";}?>><?php echo 'Product' ?></option>
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
                                <label>Item Name</label>
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
                                <label>Special Item?</label>
                                <input type="checkbox" name="special" value="1"
                                    <?php if(!empty($productinfo) && $productinfo['special']==1){echo "checked";} ?>
                                    id="special" class="form-check-input">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Type</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="food_type" value="1" id="veg"
                                            <?php echo (isset($productinfo) && $productinfo['food_type'] == 1) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="veg">🥗 Vegetarian</label> &nbsp;
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="food_type" value="0" id="non-veg"
                                            <?php echo (isset($productinfo) && $productinfo['food_type'] == 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="non-veg">🍗 Non-Vegetarian</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cooked Time</label>
                                    <input name="cookedtime" type="text" class="form-control timepicker3" id="cookedtime" placeholder="00:00" autocomplete="off" value="<?php echo (!empty($productinfo['cookedtime'])?$productinfo['cookedtime']:null) ?>" />
                                </div>
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3" style="display:none;">
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
                        <!-- Only for Product -->
                        <div class="col-md-12" id="productinfo">
                            <?php

                            $ingredient = !empty($productinfo['ingredients'][0]) ? $productinfo['ingredients'][0] : null;
                            $ingredient_id = !empty($productinfo['ingredients'][0]->id) ? $productinfo['ingredients'][0]->id : null;
                            $readonly = is_ingredient_readonly($ingredient_id);
                            ?>
                            <input type="hidden" name="ingredient_id" value="<?php echo $stockinfo->id; ?>">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Pack Size 
                                            <a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Put pack size">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </a>
                                        </label>
                                        <input name="pack_size" class="form-control" type="text"
                                            placeholder="<?php echo display('pack_size') ?>" id="pack_size"
                                            value="<?php echo !empty($stockinfo) ? $stockinfo->pack_size : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Pack Unit 
                                            <a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Put Pack Unit">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </a>
                                        </label>
                                        <select name="pack_unit" id="pack_unit" class="form-control">
                                            <option value=""><?php echo display('select_pack_unit'); ?></option>
                                            <?php foreach($units as $unit) { ?>
                                                <option value="<?php echo $unit->id; ?>"
                                                    <?php if (!empty($stockinfo) && $stockinfo->uom_id == $unit->id) echo 'selected'; ?>>
                                                    <?php echo $unit->uom_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Purchase Unit</label>
                                        <select name="purchase_unit" id="purchase_unit" class="form-control">
                                            <option value=""><?php echo display('select_purchase_unit'); ?></option>
                                            <?php foreach($units as $unit) { ?>
                                                <option value="<?php echo $unit->id; ?>"
                                                    <?php if (!empty($stockinfo) && $stockinfo->uom_id == $unit->id) echo 'selected'; ?>>
                                                    <?php echo $unit->uom_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Purchase Price</label>
                                        <input name="purchase_price" class="form-control" type="number" step="0.01"
                                            placeholder="<?php echo display('purchase_price') ?>" id="purchase_price"
                                            value="<?php echo !empty($stockinfo) ? $stockinfo->opening_price : ''; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Minimum Stock</label>
                                        <input name="minimum_stock" class="form-control" type="number"
                                            placeholder="<?php echo display('minimum_stock') ?>" id="minimum_stock"
                                            value="<?php echo !empty($stockinfo) ? $stockinfo->min_stock : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Opening Stock</label>
                                        <input name="opening_stock" class="form-control" type="number"
                                            placeholder="<?php echo display('opening_stock') ?>" id="opening_stock"
                                            value="<?php echo !empty($stockinfo) ? $stockinfo->opening_balance : ''; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Only for Product End -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row" id="serving_weightage">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Serving Weightage</label>
                                        <input name="weightage" class="form-control" type="text" 
                                            placeholder="<?php echo display('weightage') ?>" id="weightage"  
                                            value="<?php echo (isset($productinfo) && !empty($productinfo['weightage']) ? $productinfo['weightage'] : null) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(isset($units) && !empty($units)) { ?>
                                            <label class="col-form-label">Unit</label>
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
                                        <?php } else { ?>
                                            <div class="alert alert-warning mt-2" role="alert">
                                                No units available.
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Highlighted Recipe Mode Section -->

                    <!-- Only for Product Prices -->
                    <?php
                    $variants = !empty($productinfo['variants']) ? $productinfo['variants'] : [ (object)[
                        'variantid' => '',
                        'variantName' => 'Regular',
                        'price' => '',
                        'takeaway_price' => '',
                        'uber_eats_price' => '',
                        'doordash_price' => '',
                        'web_order_price' => '',
                    ]];
                    ?>

                    <?php foreach ($variants as $variant): 
                        $variantNamePr = $variant->variantName ?? 'Regular';
                        $variantIdPr = $variant->variantid ?? '';
                    ?>
                    <div class="row mb-4 p-3 productprices" style="background-color:#ececec; border-radius: 5px;">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="variant_id[]" value="<?= htmlspecialchars($variantIdPr); ?>">
                            <div class="form-group">
                                <!-- <label>Variant Name</label> -->
                                <input type="hidden" name="variant_name[]" id="pr_variant_name" class="form-control" value="<?= htmlspecialchars($variantNamePr); ?>" placeholder="Variant Name">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Sale Price (Dine In)</label>
                            <input type="number" step="0.01" min="0" name="price[]" class="form-control" id="pr_variant_price" value="<?= htmlspecialchars($variant->price ?? ''); ?>"><br/><span class="product-price-comparison"></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Sale Price (Takeaway)</label>
                            <input type="number" step="0.01" min="0" name="takeaway_price[]" class="form-control" id="pr_takeaway_price" value="<?= htmlspecialchars($variant->takeaway_price ?? ''); ?>"><br/><span class="product-price-comparison"></span>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h5 class="mb-2">Sale Price (Delivery Partner)</h5>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Ubereats</label>
                            <input type="number" step="0.01" min="0" name="uber_eats_price[]" class="form-control" id="pr_uber_eats_price" value="<?= htmlspecialchars($variant->uber_eats_price ?? ''); ?>"><br/><span class="product-price-comparison"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Doordash</label>
                            <input type="number" step="0.01" min="0" name="doordash_price[]" class="form-control" id="pr_doordash_price" value="<?= htmlspecialchars($variant->doordash_price ?? ''); ?>"><br/><span class="product-price-comparison"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Weborder</label>
                            <input type="number" step="0.01" min="0" name="weborder_price[]" class="form-control" id="pr_weborder_price" value="<?= htmlspecialchars($variant->web_order_price ?? ''); ?>"><br/><span class="product-price-comparison"></span>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Only for Product Prices End -->
                   
                    <!-- Highlighted Food Type Section -->

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
                    
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status"  class="form-control">
                            <option value=""  selected="selected"><?php echo display('select_option');?></option>
                            <option value="1" <?php  if(isset($productinfo) && !empty($productinfo)){if($productinfo['ProductsIsActive']==1){echo "Selected";}} else{echo "Selected";} ?>><?php echo display('active')?></option>
                            <option value="0" <?php  if(isset($productinfo) && !empty($productinfo)){if($productinfo['ProductsIsActive']==0){echo "Selected";}} ?>><?php echo display('inactive')?></option>
                        </select>
                    </div>

                    <div class="form-group" style="display:none;">
                        <label for="date"><?php echo display('production')?> <?php echo display('date')?><i class="text-danger">*</i>
                        </label>
                        <?php if((isset($productinfo) && isset($productinfo['production']))){ ?>
                        <input type="text" class="form-control datepicker" name="production_date" value="<?php echo isset($productinfo['production'][0]->saveddate) ? $productinfo['production'][0]->saveddate : date('Y-m-d'); ?>" id="production_date" required="" tabindex="2">
                        <?php } else { ?>
                            <input type="text" class="form-control datepicker" name="production_date" value="<?php echo date('Y-m-d');?>" id="production_date" required="" tabindex="2">
                        <?php } ?>
                    </div>

                    <div class="form-group" style="display:none;">
                        <label for="date"><?php echo display('expdate')?> <a class="" data-toggle="tooltip" data-placement="top" title="<?php echo display('expiredatenotes')?>"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                        </label>
                        <?php if((isset($productinfo) && isset($productinfo['production']))){ ?>
                        <input type="text" class="form-control datepicker" name="expire_date" value="<?php echo isset($productinfo['production'][0]->productionexpiredate) ? $productinfo['production'][0]->productionexpiredate : date('Y-m-d'); ?>" id="expire_date" required="" tabindex="2">
                        <?php } else { ?>
                        <input type="text" class="form-control datepicker" name="expire_date" value="<?php echo date('Y-m-d');?>" id="expire_date" required="" tabindex="2">
                        <?php } ?>
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- Second Panel - Vertical Tabs -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Item Details</div>
                <div class="card-body">
                    <div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
                    <!-- Categories Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingCategories">
                            <h5 class="panel-title">
                                <!-- <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" class="accordion-plus-toggle"> -->
                                <a role="button" data-toggle="collapse" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" class="accordion-plus-toggle">
                                Group & Categories
                                </a>
                            </h5>
                        </div>
                        <div id="collapseCategories" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCategories">
                            <div class="panel-body">
                                    <div class="mt-3">
                                        <input type="hidden" id="getSubcategoriesUrl" value="<?php echo base_url('itemmanage/item_food/get_subcategories'); ?>">
                                        <?php if (!empty($categories)) { ?>
                                            <?php 
                                                // Handle selected categories for edit mode
                                                $selected_parent = $selected_child = $selected_grandchild = '';
                                                if (isset($productinfo) && !empty($productinfo['CategoryID'])) {
                                                    $selectedCategories = explode(',', $productinfo['CategoryID']);
                                                    $last_category_id = end($selectedCategories);
                                                    
                                                    foreach ($categories as $cat) {
                                                        if ($cat->CategoryID == $last_category_id) {
                                                            if ($cat->parentid == 0) {
                                                                $selected_parent = $last_category_id;
                                                            } else {
                                                                foreach ($categories as $parent_cat) {
                                                                    if ($parent_cat->CategoryID == $cat->parentid) {
                                                                        $selected_child = $last_category_id;
                                                                        if ($parent_cat->parentid == 0) {
                                                                            $selected_parent = $parent_cat->CategoryID;
                                                                        } else {
                                                                            $selected_grandchild = $last_category_id;
                                                                            $selected_child = $parent_cat->CategoryID;
                                                                            foreach ($categories as $grandparent_cat) {
                                                                                if ($grandparent_cat->CategoryID == $parent_cat->parentid) {
                                                                                    $selected_parent = $grandparent_cat->CategoryID;
                                                                                }
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                            break;
                                                        }
                                                    }
                                                }
                                            ?>

                                            <!-- Parent Category Dropdown -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Select Group</label>
                                                <select id="parent_category" name="CategoryID[parent]" class="form-control selectcategories">
                                                    <option value="">Select Category Group</option>
                                                    <?php foreach ($categories as $category) { ?>
                                                        <?php if ($category->parentid == 0) { ?>
                                                            <option value="<?php echo $category->CategoryID; ?>" <?php echo ($selected_parent == $category->CategoryID) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($category->Name); ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <!-- Child Category Dropdown -->
                                            <div class="mb-3" id="child_category_container" style="display: <?php echo $selected_child ? 'block' : 'none'; ?>;">
                                                <label class="form-label fw-bold">Category</label>
                                                <select id="child_category" name="CategoryID[child]" class="form-control selectcategories" multiple data-group-id="<?php echo $category->CategoryID; ?>">
                                                    <option value="0">Select Category</option>
                                                    <?php if ($selected_child) { 
                                                        $child_categories = sub_categories_by_parent_id($selected_parent);
                                                        foreach ($child_categories as $child) { ?>
                                                            <option value="<?php echo $child->CategoryID; ?>" <?php echo ($selected_child == $child->CategoryID) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($child->Name); ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <!-- Grandchild Category Dropdown -->
                                            <div class="mb-3" id="grandchild_category_container" style="display: <?php echo $selected_grandchild ? 'block' : 'none'; ?>;">
                                                <label class="form-label fw-bold">Sub-subcategory</label>
                                                <select id="grandchild_category" name="CategoryID[grandchild]" class="form-control selectcategories">
                                                    <option value="0">Select Sub-subcategory</option>
                                                    <?php if ($selected_grandchild) { 
                                                        $grandchild_categories = sub_categories_by_parent_id($selected_child);
                                                        foreach ($grandchild_categories as $grandchild) { ?>
                                                            <option value="<?php echo $grandchild->CategoryID; ?>" <?php echo ($selected_grandchild == $grandchild->CategoryID) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($grandchild->Name); ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Module Web Setting -->
                    <?php
                        $flag = get_setting_value('recipe_feature_flag');
                        if ($flag === '1') { // compare as string
                    ?>
                    <div class="row">
                        <div class="col-md-6 text-left" style="padding-top:15px;">
                            
                        </div>
                        <div class="col-md-6" style="padding-top:15px;">
                            <small><strong style="color: #ff784a; font-weight:650;">Note:</strong> Enable to attach variants with the food</small>
                            <div class="form-group">
                                <label class="control-label variant-act-toggle-swtch">Variants are <strong class="text-success">Enabled</strong></label><br>
                                <label class="switch">
                                    <input type="checkbox" name="recipe_mode_toggle" id="recipe_mode_toggle" <?php if(isset($productinfo) && !empty($productinfo['ProductsID']) && (!empty($productinfo['recipes']))): ?> checked <?php else: ?>  <?php endif; ?>>
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Variants Panel -->
                    <!-- <ul class="list-group list-group-flush" style="margin-top:10px;">
                        <li class="list-group-item">
                                    <label class="switch ">
                            <input type="checkbox" name="recipe_mode_toggle" id="recipe_mode_toggle" class="default">
                            <span class="slider round"></span>
                            </label>
                            <strong>Recipe Mode (Off/On)</strong>
                        </li>
                    </ul>
                    <input type="hidden" name="recipeMode" id="recipeMode"> -->

                    <div class="panel panel-default variantsPanel">
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
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="d-flex text-end align-items-center enable_rec_mode" style="display:none !important;">
                                                <div class="custom-control custom-switch" >
                                                    <input type="hidden" name="is_bom" value="1">
                                                    <input type="checkbox" class="custom-control-input" id="is_bom_check" name="is_bom_check"
                                                        <?php echo (isset($productinfo) && $productinfo['is_bom'] == 1) ? 'checked' : ''; ?>>
                                                    <label class="custom-control-label font-weight-bold" for="is_bom_check">Enable Recipe Mode</label>
                                                </div>

                                                <a href="javascript:void(0);" 
                                                class="cattooltipsimg" 
                                                data-toggle="popover" 
                                                data-content="When enabled, the product will support recipe-based stock calculation." 
                                                data-placement="left" 
                                                data-trigger="focus">
                                                    <i class="fa fa-question-circle fa-lg bg-dark" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                                    
                             

                                <div id="variantContainer">
                                    <?php
                                        // Group recipes by variantName for easier access
                                        $groupedRecipes = [];
                                        if (!empty($productinfo['recipes'])) {
                                            foreach ($productinfo['recipes'] as $recipe) {
                                                $groupedRecipes[$recipe->variantName][] = $recipe;
                                            }
                                        }
                                        ?>

                                        <?php foreach ($productinfo['variants'] as $variant) {
                                            $variantName = $variant->variantName;
                                            $variantId = $variant->variantid;
                                            $variantKey = strtolower(str_replace(' ', '_', $variantName));
                                            $recipes = isset($groupedRecipes[$variantName]) ? $groupedRecipes[$variantName] : [];
                                        ?>
                                         <input type="hidden" name="foodCheckBomorNotBomUrl" id="foodCheckBomorNotBomUrl" value="<?php echo base_url('production/production/check_food_item_without_bom'); ?>"/>
                                        <input name="url" type="hidden" id="url" value="<?php echo base_url('itemmanage/item_food/getingredientitem'); ?>" />
                                        <input type="hidden" id="get_uom_listby_ing" value="<?php echo base_url('production/production/getUomDetailsNew'); ?>" />


                                        <!-- Variant Form -->
                                        <div class="row variant-rowedit mb-2" id="variantRow_<?php echo $variantId; ?>">
                                            <div class="col-md-12 mb-2">
                                                <input type="hidden" name="variant_id[]" class="form-control" value="<?php echo $variantId; ?>">
                                                <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name" value="<?php echo $variantName; ?>">
                                            </div>

                                             <!-- Recipe Section for Variant -->
                                            <?php if (!empty($recipes)) { ?>
                                                <div class="variant-recipe mt-3" style="border-top: 1px solid #ccc; padding: 10px;">
                                                    <h5 style="display:none;">Recipe for - <?php echo $variantName; ?></h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <small><strong>Recipe Cost Price</strong></small>
                                                            <input type="text" class="form-control" id="recipe_costprice_<?php echo $variantKey; ?>" name="recipe_costprice_<?php echo $variantKey; ?>[]" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <small><strong>Recipe Used Quantity</strong></small>
                                                            <input type="text" class="form-control" id="recipe_usedqty_<?php echo $variantKey; ?>" name="recipe_usedqty_<?php echo $variantKey; ?>[]">
                                                        </div>
                                                    </div>
                                                    
                                                    <input type="hidden" name="recipe_for[]" value="<?php echo $variantKey; ?>" />

                                                    <table class="table table-bordered table-hover" id="recipeTable_<?php echo $variantKey; ?>">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo display('item_information'); ?><i class="text-danger">*</i></th>
                                                                <th><?php echo display('qty'); ?> <i class="text-danger">*</i></th>
                                                                <th><?php echo display('price'); ?></th>
                                                                <th>Unit</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="addPurchaseItem_<?php echo $variantKey; ?>">
                                                            <?php $i = 1;
                                                            foreach ($recipes as $recipe) {
                                                                $unit_data = get_ingredient_unit($recipe->ingredientid);
                                                                $unit_price = ($unit_data && $unit_data->convt_ratio != 0) ? $unit_data->cost_perunit : 0.000;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" name="variant_id_<?php echo $variantKey; ?>[]" value="<?php echo $recipe->pvarientid; ?>">
                                                                    <input type="hidden" name="menu_id_<?php echo $variantKey; ?>[]" value="<?php echo $productinfo['ProductsID']; ?>">
                                                                    <select name="product_id_<?php echo $variantKey; ?>[]" class="form-control ingredient-selecteditview" data-row-id="<?php echo $variantKey; ?>_<?php echo $i; ?>" id="product_id_<?php echo $variantKey; ?>_<?php echo $i; ?>">
                                                                        <option value=""><?php echo display('select'); ?> <?php echo display('ingredients'); ?></option>
                                                                        <?php foreach ($ingrdientslist as $ingredient) { ?>
                                                                            <option value="<?php echo $ingredient->id; ?>" data-title="<?php echo $ingredient->id; ?>" <?php echo ($recipe->ingredientid == $ingredient->id) ? 'selected' : ''; ?>>
                                                                                <?php echo $ingredient->ingredient_name; ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="product_quantity_<?php echo $variantKey; ?>[]" id="product_quantity_<?php echo $variantKey; ?>_<?php echo $i; ?>" class="form-control quantityCheck product_quantity_<?php echo $variantKey; ?>" value="<?php echo $recipe->qty; ?>" data-row-id="<?php echo $variantKey; ?>_<?php echo $i; ?>"></td>
                                                                <td><input type="text" name="product_price_<?php echo $variantKey; ?>[]" id="product_price_<?php echo $variantKey; ?>_<?php echo $i; ?>" class="form-control product_price_<?php echo $variantKey; ?>" value="<?php echo $recipe->recipe_price; ?>"></td>
                                                                <td>
                                                                    <input type="hidden" id="unit-total_<?php echo $variantKey; ?>_<?php echo $i; ?>" value="<?php echo $unit_price; ?>" />
                                                                    <input type="hidden" name="unitid_<?php echo $variantKey; ?>[]" id="unitid_<?php echo $variantKey; ?>_<?php echo $i; ?>" value="<?php echo $recipe->unitid; ?>">
                                                                    <input type="text" name="unitname_<?php echo $variantKey; ?>[]" id="unitname_<?php echo $variantKey; ?>_<?php echo $i; ?>" value="<?php echo $recipe->unitname; ?>" class="form-control" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" id="get_delrecipe" value="<?php echo base_url('itemmanage/item_food/delete_recipe_ingredient'); ?>" />
                                                                    <button type="button" class="btn btn-danger btn-sm removeEditRecipeBtn"
                                                                            data-ingredientid="<?php echo $recipe->ingredientid; ?>"
                                                                            data-variantid="<?php echo $recipe->pvarientid; ?>"
                                                                            data-menuid="<?php echo $productinfo['ProductsID']; ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; } ?>
                                                        </tbody>
                                                    </table>
                                                    <button type="button" class="btn btn-success add-item" id="<?php echo $variantKey; ?>" data-variant="<?php echo $variantKey; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Ingradient</button>
                                                </div>
                                            <?php } ?>

                                            <!-- Price Fields -->
                                            <div class="col-md-2 mb-2">
                                                <small>Price</small>
                                                <input type="text" name="price[]" class="form-control" value="<?php echo $variant->price; ?>"><br/><span class="price-comparison"></span>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <small>Takeaway</small>
                                                <input type="text" name="takeaway_price[]" class="form-control" value="<?php echo $variant->takeaway_price; ?>"><br/><span class="price-comparison"></span>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <small>Ubereats</small>
                                                <input type="text" name="uber_eats_price[]" class="form-control" value="<?php echo $variant->uber_eats_price; ?>"><br/><span class="price-comparison"></span>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <small>Doordash</small>
                                                <input type="text" name="doordash_price[]" class="form-control" value="<?php echo $variant->doordash_price; ?>"><br/><span class="price-comparison"></span>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <small>Weborder</small>
                                                <input type="text" name="weborder_price[]" class="form-control" value="<?php echo $variant->web_order_price; ?>"><br/><span class="price-comparison"></span>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="hidden" id="get_deletemodifier" value="<?php echo base_url('/itemmanage/item_food/delete_variant'); ?>" />
                                                <button type="button" data-variantid="<?php echo $variantId; ?>" data-menuid="<?php echo $productinfo['ProductsID']; ?>" class="removeEditRowVariant">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                                </button>
                                            </div>
                                        </div>

                                       

                                        <?php } // end variant loop ?>

                                </div>
                                <button type="button" id="addMoreEdit" class="btn btn-primary mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Variant</button>
                                <!-- <button type="button" id="saveEditVariantUpdt" class="btn btn-secondary mt-3">Save</button> -->
                            </div>
                        </div>
                        <?php } else { ?>
                        <!-- End of edit view -->
                        <div id="collapseVariants" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingVariants">
                            <div class="panel-body">
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="d-flex text-end align-items-center enable_rec_mode" style="display:none !important;">
                                                <div class="custom-control custom-switch" id="recipe_mode">
                                                    <input type="hidden" name="is_bom" value="1">
                                                    <input type="checkbox" class="custom-control-input" id="is_bom_check" name="is_bom_check"
                                                        <?php echo (isset($productinfo) && $productinfo['is_bom'] == 1) ? 'checked' : ''; ?>>
                                                    <label class="custom-control-label font-weight-bold" for="is_bom_check">Enable Recipe Mode</label>
                                                </div>

                                                <a href="javascript:void(0);" 
                                                class="cattooltipsimg" 
                                                data-toggle="popover" 
                                                data-content="When enabled, the product will support recipe-based stock calculation." 
                                                data-placement="left" 
                                                data-trigger="focus">
                                                    <i class="fa fa-question-circle fa-lg bg-dark" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                                <div id="variantContainer">
                                        <input type="hidden" name="foodCheckBomorNotBomUrl" id="foodCheckBomorNotBomUrl" value="<?php echo base_url('production/production/check_food_item_without_bom'); ?>"/>
                                        <input name="url" type="hidden" id="url" value="<?php echo base_url('itemmanage/item_food/getingredientitem'); ?>" />
                                        <input type="hidden" id="get_uom_listby_ing" value="<?php echo base_url('production/production/getUomDetailsNew'); ?>" />


                                    <div class="row variant-row mb-2" id="variantRow_1">
                                        <div class="col-md-12 mb-2">
                                            <input type="text" name="variant_name[]" class="form-control variant-name" id="variant_name_1" placeholder="Variant Name">
                                        </div>

                                        <!-- Recipe Section -->
                                       
                                        <div class="col-md-12" id="variantRecipe_{{name}}">
                                            <div class="recipe mt-5" id="recipeBox" style="border-top: 1px solid #ccc; padding: 10px;">
                                                <h4 style="display:none;">Recipe for - {{name}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <small><strong>Recipe Cost Price</strong></small>
                                                        <input type="text" class="form-control" id="recipe_costprice_{{name}}" name="recipe_costprice_{{name}}[]">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small><strong>Recipe Used Quantity</strong></small>
                                                        <input type="text" class="form-control" id="recipe_usedqty_{{name}}" name="recipe_usedqty_{{name}}[]">
                                                    </div>
                                                </div>
                                                
                                                <input type="hidden" name="recipe_for[]" value="{{name}}">

                                                <table class="table table-bordered" id="recipeTable_{{name}}">
                                                    <thead>
                                                        <tr>
                                                            <th width="200">Item Information</th>
                                                            <th>Qty</th>
                                                            <th>Unit</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="addPurchaseItem_{{name}}">
                                                        <tr id="row_{{name}}_1">
                                                            <td>
                                                                <select name="product_id_{{name}}[]" id="product_id_{{name}}_1" class="form-control ingredient-select" data-row-id="{{name}}_1">
                                                                    <option value="">Select Ingredients</option>
                                                                    <?php foreach($ingrdientslist as $ingredient): ?>
                                                                        <option value="<?= $ingredient->id ?>" data-title="<?= $ingredient->ingredient_name ?>"><?= $ingredient->ingredient_name ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="product_quantity_{{name}}[]" id="product_quantity_{{name}}_1" class="form-control quantityCheck product_quantity_{{name}}" data-row-id="{{name}}_1"></td>
                                                            <td>
                                                                <input type="hidden" id="unit-total_{{name}}_1">
                                                                <input type="hidden" name="unitid_{{name}}[]" id="unitid_{{name}}_1">
                                                                <input type="text" name="unitname_{{name}}[]" id="unitname_{{name}}_1" class="form-control" readonly>
                                                            </td>
                                                            <td><input type="text" name="product_price_{{name}}[]" id="product_price_{{name}}_1" class="form-control text-right product_price_{{name}}" placeholder="0.00"></td>
                                                            <td><button type="button" class="btn btn-danger remove-item"><i class="fa fa-trash"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-success add-item" id="{{name}}" data-variant="{{name}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Ingradient</button>
                                            </div>
                                        </div>
                                        <!-- Pricing Columns -->
                                        <div class="col-md-2 mb-2"><small>Price</small><input type="text" name="price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Takeaway</small><input type="text" name="takeaway_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Ubereats</small><input type="text" name="uber_eats_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Doordash</small><input type="text" name="doordash_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2"><small>Weborder</small><input type="text" name="weborder_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                                        <div class="col-md-2 mb-2">
                                            <button type="button" class="removeRowVariant btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>

                                    <div id="recipeContainer">
                                    </div>
                                </div>
                                <button type="button" id="addMore" class="btn btn-primary mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Variant</button>
                                <!-- <button type="button" id="saveEditVariant" class="btn btn-secondary mt-3">Save</button> -->
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Recipes Panel -->
                   <?php } ?>
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
        <div class="text-right">
            <button type="submit" class="btn btn-primary w-100">Save Food Item</button>
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
//     $(document).on("click", "#addfooditemsubmit", (e)=>{
//     e.preventDefault();
//     // alert("Form Submission Prevented " + $("#addfooditemsubmit").closest("form"));
//     // return false;
//     const
//       $foodname = $("#foodname"),
//       $regPrice = $("#regPrice"),
//       $takeawayPrice = $("#takeawayPrice"),
//       $uberEatsPrice = $("#uberEatsPrice"),
//       $webOrderPrice = $("#webOrderPrice"),
//       $addfooditemerr = $("#addfooditemerr");
//     var
//       foodname = $foodname.val(),
//       regPrice = $regPrice.val(),
//       takeawayPrice = $takeawayPrice.val(),
//       uberEatsPrice = $uberEatsPrice.val(),
//       webOrderPrice = $webOrderPrice.val();
//     $addfooditemerr.text("");
//     $addfooditemerr.hide();
//     if (foodname == "") {
//       $addfooditemerr.text("* Food Name cannot be left blank");
//       $addfooditemerr.show();
//       $foodname.focus();
//       return false;
//     }
//     if (regPrice == "") {
//       $addfooditemerr.text("* Food regular price cannot be left blank");
//       $addfooditemerr.show();
//       $regPrice.focus();
//       return false;
//     } else {
//       if (isNaN(regPrice)) {
//         $addfooditemerr.text("* Please enter a valid amount");
//         $addfooditemerr.show();
//         $regPrice.focus();
//         return false;
//       }
//     }
//     if (takeawayPrice == "") {
//       $addfooditemerr.text("* Food takeaway price cannot be left blank");
//       $addfooditemerr.show();
//       $takeawayPrice.focus();
//       return false;
//     } else {
//       if (isNaN(takeawayPrice)) {
//         $addfooditemerr.text("* Please enter a valid amount");
//         $addfooditemerr.show();
//         $takeawayPrice.focus();
//         return false;
//       }
//     }
//     if (uberEatsPrice == "") {
//       $addfooditemerr.text("* Food uber eats price cannot be left blank");
//       $addfooditemerr.show();
//       $uberEatsPrice.focus();
//       return false;
//     }  else {
//       if (isNaN(uberEatsPrice)) {
//         $addfooditemerr.text("* Please enter a valid amount");
//         $addfooditemerr.show();
//         $uberEatsPrice.focus();
//         return false;
//       }
//     }
//     if (webOrderPrice == "") {
//       $addfooditemerr.text("* Food web order price cannot be left blank");
//       $addfooditemerr.show();
//       $webOrderPrice.focus();
//       return false;
//     } else {
//       if (isNaN(webOrderPrice)) {
//         $addfooditemerr.text("* Please enter a valid amount");
//         $addfooditemerr.show();
//         $webOrderPrice.focus();
//         return false;
//       }
//     }
//     $("#addfooditemsubmit").closest("form").submit();
//     // return false;
//   });
document.getElementById("isoffer").addEventListener("change", function () {
    //document.getElementById("offeractive").classList.toggle("d-none", !this.checked);

    if (this.checked) {
        document.getElementById("offeractive").classList.remove("showhide");
       
    } else {
        document.getElementById("offeractive").classList.add("showhide");
    }
});
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function () {
    // Initial setup
    handleRecipeVisibility();

    // On toggle change
    $('#recipe_mode_toggle').change(function () {
        handleRecipeVisibility();
    });

    // On cuisine type change
    $('select[name="cusine_type"]').change(function () {
        handleRecipeVisibility();
    });

    function handleRecipeVisibility() {
        const isToggleOn = $('#recipe_mode_toggle').prop('checked');
        const cuisineType = $('select[name="cusine_type"]').val();
        $('#recipeMode').val('1');

        if (isToggleOn && cuisineType !== '3') {
            $('#recipe_mode, #recipeBox, #addMore').show();
            $('#recipeMode').val('1');
            $('.variantsPanel').show();
            $('.productprices').find('input').prop('disabled', true).end().hide();
            $('#serving_weightage').hide();

            // Check this item is not recipe type
            
        } else {
            $('#recipe_mode, #recipeBox, #addMore').hide();
            $('.variantsPanel').hide();
            $('#recipeMode').val('0');
            $('.productprices').find('input').prop('disabled', false).end().show();
            $('#serving_weightage').show();
        }
    }
});

$(document).ready(function () {
    // Define baseurl
    var baseurl = '<?php echo base_url(); ?>';

    // Handle form submission
    $('#addFoodItemForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(this);

        // Debugging: Log form submission
        console.log('Form submitted to: ' + $(this).attr('action'));

        // Perform AJAX submission
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('Response received: ', response); // Debugging: Log raw response
                try {
                    var result = JSON.parse(response);
                    console.log('Parsed result: ', result); // Debugging: Log parsed result

                    if (result.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: result.message || 'Food item saved successfully!',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = baseurl + 'itemmanage/item_food/index';
                            }
                        });
                    } else {
                        // Handle server-side validation errors
                        var errorMessage = result.message || 'Please correct the form errors.';
                        if (result.errors && result.errors.length > 0) {
                            errorMessage = result.errors.map(function (err) {
                                return err.message;
                            }).join('\n');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: errorMessage,
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (e) {
                    console.error('Error parsing response: ', e); // Debugging: Log parsing error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An unexpected error occurred. Please try again.',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error: ', status, error); // Debugging: Log AJAX error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while submitting the form: ' + error,
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    let varSwtch = $("#recipe_mode_toggle");
    let varSwtchLabel = $(".variant-act-toggle-swtch");
    // Check if the switch is checked
    if (varSwtch.is(':checked')) {
        // If checked, show the recipe mode section
        varSwtchLabel.html(`Variants are <strong class="text-success">Enabled</strong>`);
    } else {
        // If not checked, hide the recipe mode section
        varSwtchLabel.html(`Variants are <strong class="text-danger">Disabled</strong>`);
    }
    varSwtch.on('change', function () {
        if ($(this).is(':checked')) {
            // If checked, show the recipe mode section
            varSwtchLabel.html(`Variants are <strong class="text-success">Enabled</strong>`);
        } else {
            // If not checked, hide the recipe mode section
            varSwtchLabel.html(`Variants are <strong class="text-danger">Disabled</strong>`);
        }
    });
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
