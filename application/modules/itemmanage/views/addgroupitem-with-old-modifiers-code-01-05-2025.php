<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_new_script.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />
<?php
function renderCategoryOptions($categories, $selectedID = null, $level = 0)
{
    foreach ($categories as $category) {
        $indent = str_repeat('--', $level); // Indentation for subcategories
        $selected = ($selectedID == $category->CategoryID) ? "selected" : "";
        echo "<option " . (($level == 0) ? 'class="bolden"' : (($level == 1) ? 'class="bolder"' : '')) . " value='{$category->CategoryID}' {$selected}><strong>{$indent} {$category->Name}</strong></option>";

        // Check if there are subcategories
        if (!empty($category->sub)) {
            renderCategoryOptions($category->sub, $selectedID, $level + 1);
        }
    }
}
?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title box-header itemmanage_box_header">
                    <h4><?php echo (!empty($title) ? $title : null) ?></h4>
                    <div class="col-md-2" style="display: none;">
                        <input type="text" name="item_list" class="form-control" placeholder="Search" id="item_list" />
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_food/addgroupfood"); ?>
                <div class="row">
                    <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                    <?php echo form_hidden('ProductsID', (!empty($productinfo->ProductsID) ? $productinfo->ProductsID : null)) ?>
                    <input name="bigimage" type="hidden" value="<?php echo (!empty($productinfo->bigthumb) ? $productinfo->bigthumb : null) ?>" />
                    <input name="mediumimage" type="hidden" value="<?php echo (!empty($productinfo->medium_thumb) ? $productinfo->medium_thumb : null) ?>" />
                    <input name="smallimage" type="hidden" value="<?php echo (!empty($productinfo->small_thumb) ? $productinfo->small_thumb : null) ?>" />
                    <div class="col-lg-4">
                        <div class="form-group row" style="display: none;">
                            <label for="category" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label for="itemnotes" class="col-sm-4 col-form-label"><?php echo display('notes') ?> </label>
                            <div class="col-sm-8">
                                <input name="itemnotes" class="form-control" type="text" placeholder="<?php echo display('notes') ?>" id="itemnotes" value="<?php echo (!empty($productinfo->itemnotes) ? $productinfo->itemnotes : null) ?>">
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label for="itemnotes" class="col-sm-4 col-form-label"><?php echo display('Description') ?> </label>
                            <div class="col-sm-8">
                                <input name="descrip" class="form-control" type="text" placeholder="<?php echo display('Description') ?>" id="descrip" value="<?php echo (!empty($productinfo->descrip) ? $productinfo->descrip : null) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-4 col-form-label">Food Image</label>
                            <div class="col-sm-8">
                                <input type="file" accept="image/*" name="picture" onchange="loadFile(event)" />
                                <a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                <small id="fileHelp" class="text-muted">
                                    <img src="<?php echo base_url(!empty($productinfo->ProductImage) ? $productinfo->ProductImage : 'assets/img/icons/default.jpg'); ?>" id="output" class="img-thumbnail add_cat_img_item" />
                                </small>
                                <input name="big" type="hidden" value="" id="bigurl" />
                                <input type="hidden" name="old_image" value="<?php echo (!empty($productinfo->ProductImage) ? $productinfo->ProductImage : null) ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="foodname" class="col-sm-4 col-form-label"><?php echo display('food_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="foodname" class="form-control" type="text" placeholder="<?php echo display('food_name') ?>" id="foodname" value="<?php echo (!empty($productinfo->ProductName) ? $productinfo->ProductName : null) ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="component" class="col-sm-4 col-form-label"><?php echo display('component') ?> </label>
                            <div class="col-sm-8">
                                <input name="component" class="form-control" data-role="tagsinput" type="text" placeholder="<?php echo display('component') ?>" id="category_subtitle" value="<?php echo (!empty($productinfo->component) ? $productinfo->component : null) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vat" class="col-sm-5 col-form-label">GST <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="GST Are always Caltulate percent like: 5 means 5%;"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                            <div class="col-sm-7">
                                <input name="vat" class="form-control" type="text" placeholder="0%" id="vat" value="<?php echo (!empty($productinfo->productvat) ? $productinfo->productvat : '') ?>">
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label for="firstname" class="col-sm-5 col-form-label"><?php echo display('is_offer') ?> <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="If use Food Special Offer then check it and fill necessary field"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                            <div class="col-sm-2">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="isoffer" value="1" <?php if (!empty($productinfo)) if ($productinfo->offerIsavailable == 1) {
                                                                                        echo "checked";
                                                                                    } ?> id="isoffer" />
                                    <label for="isoffer"></label>
                                </div>
                            </div>
                            <label for="special" class="col-sm-3 col-form-label"><?php echo display('is_special') ?></label>
                            <div class="col-sm-2">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="special" value="1" <?php if (!empty($productinfo)) if ($productinfo->special == 1) {
                                                                                        echo "checked";
                                                                                    } ?> id="special" />
                                    <label for="special"></label>
                                </div>
                            </div>
                        </div>
                        <div id="offeractive" class="<?php if (!empty($productinfo)) {
                                                            if ($productinfo->offerIsavailable == 1) {
                                                                echo "";
                                                            } else {
                                                                echo "showhide";
                                                            }
                                                        } else {
                                                            echo "showhide";
                                                        } ?>">
                            <div class="form-group row">
                                <label for="offerate" class="col-sm-5 col-form-label"><?php echo display('offer_rate') ?><a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Offer Rate Must be a number. It a Percentange Like: if 5% then put 5"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                <div class="col-sm-7">
                                    <input name="offerate" class="form-control" type="text" placeholder="0" id="offerate" value="<?php echo (!empty($productinfo->OffersRate) ? $productinfo->OffersRate : '') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="offerstartdate" class="col-sm-5 col-form-label"><?php echo display('offerdate') ?></label>
                                <div class="col-sm-7">
                                    <input name="offerstartdate" class="form-control datepicker" type="text" placeholder="<?php echo display('offerdate') ?>" id="offerstartdate" value="<?php echo (!empty($productinfo->offerstartdate) ? $productinfo->offerstartdate : null) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="offerendate" class="col-sm-5 col-form-label"><?php echo display('offerenddate') ?></label>
                                <div class="col-sm-7">
                                    <input name="offerendate" class="form-control datepicker" type="text" placeholder="<?php echo display('offerenddate') ?>" id="offerendate" value="<?php echo (!empty($productinfo->offerendate) ? $productinfo->offerendate : null) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label for="cookedtime" class="col-sm-5 col-form-label"><?php echo display('cookedtime'); ?></label>
                            <div class="col-sm-7">
                                <input name="cookedtime" type="text" class="form-control timepicker3" id="cookedtime" placeholder="00:00" autocomplete="off" value="<?php echo (!empty($productinfo->cookedtime) ? $productinfo->cookedtime : null) ?>" />
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <?php 
                                if (!empty($todaymenu)) { ?>
                                <label for="menutype" class="col-sm-4 col-form-label"><?php echo display('menu_type'); ?></label>
                                <div class="col-sm-8">
                                    <?php
                                    $searcharray = explode(',', (!empty($productinfo->menutype) ? $productinfo->menutype : null));
                                    $m = 0;
                                    foreach ($todaymenu as $tmenu) {
                                        $m++;
                                        $key = array_search($tmenu->menutypeid, $searcharray);
                                    ?>
                                        <div class="col-sm-4 mtype">
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" name="menutype[]" value="<?php echo $tmenu->menutypeid; ?>" <?php if (!empty($productinfo)) if ($searcharray[$key] == $tmenu->menutypeid) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> id="<?php echo $m; ?>">
                                                <label for="<?php echo $m; ?>"><?php echo $tmenu->menutype; ?></label>
                                                <input name="mytmenu_<?php echo $tmenu->menutypeid; ?>" type="hidden" value="<?php echo $tmenu->menutypeid; ?>" />
                                            </div>
                                        </div>
                                <?php 
                                    }
                                ?>
                                </div>
                                <?php
                                } 
                                ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php if (!empty($taxitems)) {
                            $tx = 0;
                            foreach ($taxitems as $taxitem) {
                                $field_name = 'tax' . $tx;
                        ?>
                                <div class="form-group row">
                                    <label for="<?php echo $field_name; ?>" class="col-sm-5 col-form-label"><?php echo $taxitem['tax_name']; ?></label>
                                    <div class="col-sm-7">
                                        <input name="<?php echo $field_name; ?>" type="text" class="form-control" id="<?php echo $field_name; ?>" placeholder="<?php echo $taxitem['tax_name']; ?>" autocomplete="off" value="<?php echo (!empty($productinfo->$field_name) ? $productinfo->$field_name : null) ?>" />
                                    </div>
                                </div>
                        <?php
                                $tx++;
                            }
                        }
                        ?>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-5 col-form-label"><?php echo display('status'); ?></label>
                            <div class="col-sm-7">
                                <select name="status" class="form-control">
                                    <option value="" selected="selected"><?php echo display('select_option'); ?></option>
                                    <option value="1" <?php if (!empty($productinfo)) {
                                                            if ($productinfo->ProductsIsActive == 1) {
                                                                echo "Selected";
                                                            }
                                                        } else {
                                                            echo "Selected";
                                                        } ?>><?php echo display('active') ?></option>
                                    <option value="0" <?php if (!empty($productinfo)) {
                                                            if ($productinfo->ProductsIsActive == 0) {
                                                                echo "Selected";
                                                            }
                                                        } ?>><?php echo display('inactive') ?></option>
                                </select>
                            </div>
                        </div>

                        <table id="mytble" class="table table-striped table-bordered table-hover" style="display: none;">
                            <thead>
                                <tr id="0">
                                    <th><?php echo display('name') ?></th>
                                    <th><?php echo display('varient_name') ?></th>
                                    <th><?php echo display('price') ?></th>
                                    <th><?php echo display('qty') ?></th>
                                    <th><?php echo display('action') ?></th>
                                </tr>
                            </thead>
                            <tbody id="mygroupitem">
                                <?php $allpvid = '';
                                if (!empty($groupsitem)) {
                                    $i = 0;

                                    foreach ($groupsitem as $items) {
                                        $i++;
                                        $allpvid .= $items->varientid . $items->items . ",";
                                        $inteminfo = $this->fooditem_model->findBygroupId($items->items);
                                ?>
                                        <tr id="test<?php echo $i; ?>">
                                            <td><input name="itemidvid" class="itemidvid" type="hidden" value="<?php echo $inteminfo->variantid . $inteminfo->menuid ?>"><input name="itemid[]" id="itemid" type="hidden" value="<?php echo $inteminfo->ProductsID; ?>"><?php echo $inteminfo->ProductName; ?></td>
                                            <td><input name="varientid[]" id="varientid" type="hidden" value="<?php echo $inteminfo->variantid; ?>"><?php echo $inteminfo->variantName; ?></td>
                                            <td><input name="myprice" class="myprice" type="hidden" id="pr<?php echo $inteminfo->variantid . $inteminfo->menuid ?>" value="<?php echo $inteminfo->price; ?>"><?php echo $inteminfo->price; ?></td>
                                            <td class="itemmanage_box_w_100"><button onclick="decrese(<?php echo $i; ?>,<?php echo $inteminfo->price; ?>,<?php echo $inteminfo->variantid . $inteminfo->menuid ?>)" class="reduced items-count" type="button"><i class="fa fa-minus"></i></button><input type="text" class="itemmanage_box_w_25 input-text qty" name="qty[]" id="sst<?php echo $i; ?>" maxlength="12" value="<?php echo (!empty($items->item_qty) ? $items->item_qty : null) ?>" readonly="readonly"><button onclick="increse(<?php echo $i; ?>,<?php echo $inteminfo->price; ?>,<?php echo $inteminfo->variantid . $inteminfo->menuid ?>)" class="increase items-count" type="button"><i class="fa fa-plus"></i></button></td>
                                            <td><a onclick="rem_values(<?php echo $i; ?>);" class="itemmanage_box_w"><?php echo display('remove') ?></a></td>
                                        </tr>
                                <?php }
                                }
                                $allpvid = trim($allpvid, ',');
                                ?>
                            </tbody>
                        </table>
                        <input name="allid" type="hidden" id="allid" value="<?php echo $allpvid; ?>" />
                        <div class="form-group row" style="display: none;">
                            <label for="foodname" class="col-sm-4 col-form-label"><?php echo display('price') ?> *</label>
                            <div class="col-sm-8">
                                <input name="price" class="form-control" type="text" placeholder="<?php echo display('price') ?>" id="price" value="<?php echo (!empty($productinfo->price) ? $productinfo->price : 0.00) ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Select Modifiers [start] -->
                <div class="row mt-2">
                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-bd">
                            <div class="panel-heading" style="background-color: #eeeeee;">
                                <div class="panel-title box-header itemmanage_box_header">
                                    <h4 style="font-weight: bold;"><?php echo 'Main Modifiers'; ?></h4>
                                    <!-- <div class="col-md-2">
                                        <input type="text" name="item_list" class="form-control" placeholder="Search" id="item_list"  />
                                    </div> -->
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12">
                                        <small>Consumption (%) & No. of Item(s)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12">
                                        <label for="noOfItemWise">Ad hoc</label>
                                        <input type="radio" name="noOfItemWise" id="noOfItemWise" checked />
                                    </div>
                                </div>
                                <?php
                                // echo "data: ".$mainModinfo[0]->total_weight_percent."<br>";
                                // echo "<pre>";
                                // print_r($otherModinfo);
                                // echo "</pre>";
                                ?>
                                <div class="form-group row">
                                    <label for="addhoc_weight_percent" class="col-sm-4 col-form-label">Total Weightage (%)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="addhoc_weight_percent" class="form-control addhoc_weight_percent hdb" id="addhoc_weight_percent" placeholder="Weightage %" value="<?php if (!empty($mainModinfo[0]->total_weight_percent)): echo $mainModinfo[0]->total_weight_percent;
                                                                                                                                                                                                    endif; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="addhoc_max_item" class="col-sm-4 col-form-label">Total No. of Item</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="addhoc_max_item" class="form-control addhoc_max_item hdb" id="addhoc_max_item" placeholder="Max No. of Item" value="<?php if (!empty($mainModinfo[0]->total_no_of_item)): echo $mainModinfo[0]->total_no_of_item;
                                                                                                                                                                                        endif; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mainModID" class="col-sm-4 col-form-label" style="display: none;">Select Main Modifiers</label>
                                    <div class="col-sm-8" style="display: none;">
                                    </div>
                                    <div class="form-group row" style="padding-left: 10px;">
                                        <div class="col-sm-12 col-md-12">
                                            <label for="categeorywise">Individual</label>
                                            <input type="radio" name="categeorywise" id="categeorywise" />
                                        </div>
                                        <input type="hidden" name="weightageCriteria" id="weightageCriteria" value="" />
                                    </div>
                                    <table class="table table-bordered table-hover" id="purchaseTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="20%">Item <i class="text-danger">*</i></th>
                                                <th class="text-center">Max Qty <i class="text-danger">*</i></th>
                                                <th class="text-center">Weightage (%) </th>
                                                <th class="text-center">Remove</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        // echo "<pre>";
                                        // print_r($categories);
                                        // echo "</pre>";
                                        // exit;
                                        ?>
                                        <tbody id="addPurchaseItem">
                                            <input type="hidden" name="mainModifiersIds" id="mainModifiersIds" value="" />
                                            <?php
                                            if (empty($productinfo->ProductsID)):
                                            ?>
                                                <tr>
                                                    <td class="span3 supplier">
                                                        <input type="hidden" id="unit-total_1" class="" />
                                                        <!-- <select name="product_id[]" id="product_id_1" class="postform resizeselect form-control" onchange="product_list(1)">
                                            <option value="" data-title=""><?php ##echo display('select');
                                                                            ?> <?php ##echo display('ingredients');
                                                                                                                ?></option>
                                            <?php ##foreach ($ingrdientslist as $ingrdients) {
                                            ?>
                                                <option value="<?php ##echo $ingrdients->id;
                                                                ?>" data-ingredientid="<?php ##echo $ingrdients->id;
                                                                                                                    ?>" data-title="<?php ##echo $ingrdients->ingredient_name;
                                                                                                                                                                ?>"><?php ##echo $ingrdients->ingredient_name;
                                                                                                                                                                                                                ?></option>
                                            <?php ## }
                                            ?>
                                            </select> -->
                                                        <!-- <select name="mainModID[]" id="mainModID_1" class="form-control dont-select-me" required="">
                                            <?php
                                                ##foreach($categories as $caregory){
                                            ?>
                                            <option value="<?php ##echo $caregory->CategoryID;
                                                            ?>" class='bolden' <?php ##if($productinfo->CategoryID==$caregory->CategoryID){echo "selected";}
                                                                                                                    ?>><strong><?php ##echo $caregory->Name;
                                                                                                                                                                                                            ?></strong></option>
                                            <?php
                                                ##if(!empty($caregory->sub)){
                                                ##foreach($caregory->sub as $subcat){
                                            ?>
                                                <option value="<?php ##echo $subcat->CategoryID;
                                                                ?>" disabled data-parentID="<?php ##echo $caregory->CategoryID;
                                                                                                                            ?>" <?php ##if($productinfo->CategoryID==$subcat->CategoryID){echo "selected";}
                                                                                                                                                                    ?>>&nbsp;&nbsp;&nbsp;&mdash;<?php ##echo $subcat->Name;
                                                                                                                                                                                                                                                                            ?></option>
                                            <?php
                                                // if(!empty($caregory->sub->sub)){
                                                //     foreach($caregory->sub->sub as $ssubcat){
                                                //         echo $ssubcat->Name;
                                            ?>
                                                    <option value="<?php ##echo $ssubcat->CategoryID;
                                                                    ?>" disabled data-parentID="<?php ##echo $caregory->CategoryID;
                                                                                                                                    ?>" <?php ##if($productinfo->CategoryID==$ssubcat->CategoryID){echo "selected";}
                                                                                                                                                                        ?>>&nbsp;&nbsp;&nbsp;&mdash;<?php ##echo $ssubcat->Name;
                                                                                                                                                                                                                                                                                ?></option>
                                            <?php ##} } } } } 
                                            ?>
                                            
                                            </select> -->
                                                        <select name="mainModID[]" id="mainModID_1" class="form-control dont-select-me" required="">
                                                            <?php renderCategoryOptions($categories, $productinfo->category_id); ?>
                                                        </select>
                                                    </td>
                                                    <td class="text-right">
                                                        <input type="text" name="max_quantity[]" id="max_quantity_1" class="form-control text-right max_quantity_1 rdb" placeholder="0" value="" min="0" tabindex="6" readonly style="cursor: not-allowed;" />
                                                    </td>
                                                    <td class="text-right">
                                                        <input type="text" name="weight_percent[]" id="weight_percent_1" class="form-control text-right weight_percent_1 rdb" placeholder="0%" value="" min="0" tabindex="6" readonly style="cursor: not-allowed;" />
                                                    </td>
                                                    <td>
                                                        <!-- <button class="btn btn-danger red text-right" type="button" value="<?php ##echo display('delete') 
                                                                                                                                ?>" onclick="deleteRow(this)" tabindex="8"><?php ##echo display('delete') 
                                                                                                                                                                                                            ?></button> -->
                                                    </td>
                                                </tr>
                                                <?php
                                            else:
                                                foreach ($mainModinfo as $mmk => $mmv):
                                                ?>
                                                    <tr>
                                                        <td class="span3 supplier">
                                                            <input type="hidden" id="unit-total_<?= $mmk + 1 ?>" class="" />
                                                            <!-- <select name="product_id[]" id="product_id_1" class="postform resizeselect form-control" onchange="product_list(1)">
                                            <option value="" data-title=""><?php ##echo display('select');
                                                                            ?> <?php ##echo display('ingredients');
                                                                                                                ?></option>
                                            <?php ##foreach ($ingrdientslist as $ingrdients) {
                                            ?>
                                                <option value="<?php ##echo $ingrdients->id;
                                                                ?>" data-ingredientid="<?php ##echo $ingrdients->id;
                                                                                                                    ?>" data-title="<?php ##echo $ingrdients->ingredient_name;
                                                                                                                                                                ?>"><?php ##echo $ingrdients->ingredient_name;
                                                                                                                                                                                                                ?></option>
                                            <?php ## }
                                            ?>
                                            </select> -->
                                                            <!-- <select name="mainModID[]" id="mainModID_1" class="form-control dont-select-me" required="">
                                            <?php
                                                    foreach ($categories as $caregory) {
                                            ?>
                                            <option value="<?php echo $caregory->CategoryID; ?>" class='bolden' <?php if ($productinfo->CategoryID == $caregory->CategoryID) {
                                                                                                                    echo "selected";
                                                                                                                } ?>><strong><?php echo $caregory->Name; ?></strong></option>
                                            <?php
                                                        if (!empty($caregory->sub)) {
                                                            foreach ($caregory->sub as $subcat) {
                                            ?>
                                                <option value="<?php echo $subcat->CategoryID; ?>" disabled data-parentID="<?php echo $caregory->CategoryID; ?>" <?php if ($productinfo->CategoryID == $subcat->CategoryID) {
                                                                                                                                                                    echo "selected";
                                                                                                                                                                } ?>>&nbsp;&nbsp;&nbsp;&mdash;<?php echo $subcat->Name; ?></option>
                                            <?php
                                                                if (!empty($caregory->sub->sub)) {
                                                                    foreach ($caregory->sub->sub as $ssubcat) {
                                                                        echo $ssubcat->Name;
                                            ?>
                                                    <option value="<?php echo $ssubcat->CategoryID; ?>" disabled data-parentID="<?php echo $caregory->CategoryID; ?>" <?php if ($productinfo->CategoryID == $ssubcat->CategoryID) {
                                                                                                                                                                        echo "selected";
                                                                                                                                                                    } ?>>&nbsp;&nbsp;&nbsp;&mdash;<?php echo $ssubcat->Name; ?></option>
                                            <?php }
                                                                }
                                                            }
                                                        }
                                                    } ?>
                                            
                                            </select> -->
                                                            <select name="mainModID[]" id="mainModID_<?= $mmk + 1 ?>" class="form-control dont-select-me" required="">
                                                                <?php renderCategoryOptions($categories, $mmv->category_id); ?>
                                                            </select>
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="text" name="max_quantity[]" id="max_quantity_<?= $mmk + 1 ?>" class="form-control text-right max_quantity_<?= $mmk + 1 ?> rdb" placeholder="0" value="<?= (!empty($mmv->category_max_qty)) ? $mmv->category_max_qty : 0; ?>" min="0" tabindex="6" readonly style="cursor: not-allowed;" />
                                                        </td>
                                                        <td class="text-right">
                                                            <input type="text" name="weight_percent[]" id="weight_percent_<?= $mmk + 1 ?>" class="form-control text-right weight_percent_<?= $mmk + 1 ?> rdb" placeholder="0%" value="<?= (!empty($mmv->category_weight_percent)) ? $mmv->category_weight_percent : 0; ?>" min="0" tabindex="6" readonly style="cursor: not-allowed;" />
                                                        </td>
                                                        <td>
                                                            <?php if ($mmk != 0): ?>
                                                                <button class="btn btn-danger red text-right" type="button" value="<?php echo display('delete') ?>" onclick="deleteRow(this)" tabindex="8"><?php echo display('delete') ?></button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <input type="button" id="add_invoice_item" class="btn btn-success" name="add-invoice-item" onclick="addmore('addPurchaseItem');" value="<?php echo display('add_more') ?> <?php echo display('item') ?>" tabindex="9">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-bd">
                            <div class="panel-heading" style="background-color: #eeeeee;">
                                <div class="panel-title box-header itemmanage_box_header">
                                    <h4 style="font-weight: bold;"><?php echo 'Other Modifiers'; ?></h4>
                                    <!-- <div class="col-md-2">
                                        <input type="text" name="item_list" class="form-control" placeholder="Search" id="item_list"  />
                                    </div> -->
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label for="otherModID" class="col-sm-4 col-form-label">Select Other Modifiers</label>
                                    <div class="col-sm-8">
                                        <select name="otherModID[]" id="otherModID" class="form-control" required multiple>
                                            <?php
                                            if (!empty($productinfo->ProductsID)):
                                                foreach ($modifiers as $mv):
                                                    $othMSelect = ""; // Default empty

                                                    // Check if the current modifier exists in $otherModinfo
                                                    foreach ($otherModinfo as $omv) {
                                                        if ($omv->modifier_set_id == $mv->id) {
                                                            $othMSelect = "selected"; // Mark as selected
                                                            break; // No need to check further, break the loop
                                                        }
                                                    }
                                            ?>
                                                    <option value="<?php echo $mv->id; ?>" <?= $othMSelect; ?> class='bolden'><strong><?php echo $mv->name; ?></strong></option>
                                                <?php
                                                endforeach;
                                            else:
                                                foreach ($modifiers as $mv):
                                                ?>
                                                    <option value="<?php echo $mv->id; ?>" class='bolden'><strong><?php echo $mv->name; ?></strong></option>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                        <input type="hidden" name="otherModifiersIds" id="otherModifiersIds" value="" />
                                    </div>
                                </div>
                                <?php
                                // $a = $this->db->select('*')->from('modifier_groups')->get()->result();
                                // echo "<pre>";
                                // print_r($a);
                                // echo "</pre>";
                                ?>
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
                        <div class="mt-2">
                            <div class="form-group text-right">
                                <p class="text-danger text-left" id="promoErr">* Error Message</p>
                            </div>
                            <div class="form-group text-right">
                                <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                <button type="submit" id="promotionAddSbmt" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Select Modifiers [end] -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<div id="cntra" hidden>
    <?php renderCategoryOptions($categories, $productinfo->CategoryID); ?>
</div>
<div id="cntra1" hidden style="display: none;">
    <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->CategoryID; ?>" class="bolden"
            <?php if ($productinfo->CategoryID == $category->CategoryID) echo "selected"; ?>>
            <?php echo $category->Name; ?>
        </option>

        <?php if (!empty($category->sub)) {
            foreach ($category->sub as $subcategory) { ?>
                <option value="<?php echo $subcategory->CategoryID; ?>">
                    &nbsp;&nbsp;&nbsp;<?php echo $subcategory->Name; ?>
                </option>
        <?php }
        } ?>
    <?php } ?>
</div>
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addgroupitem_script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_script.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // $("#mainModID").change(function () {
        //     let mainModIds = [];

        //     $("#mainModID option:selected").each(function () {
        //         let value = $(this).val();
        //         let parentID = $(this).attr("data-parentid") || null;
        //         mainModIds.push({ id: value, parentID: parentID });
        //     });

        //     // console.log(mainModIds);
        //     $("#mainModifiersIds").val(JSON.stringify(mainModIds));
        //     console.log("mainModIds: " + $("#mainModifiersIds").val());
        // });
        $("#otherModID").change(function() {
            let otherModIds = [];

            $("#otherModID option:selected").each(function() {
                let value = $(this).val();
                otherModIds.push({
                    id: value
                });
            });

            // console.log(otherModIds);
            $("#otherModifiersIds").val(JSON.stringify(otherModIds));
            console.log("otherModIds: " + $("#otherModifiersIds").val());
        });
        $("#categeorywise").change(() => {
            if ($("#categeorywise").prop('checked')) {
                $("#categeorywise").prop('checked', true);
                $("#noOfItemWise").prop('checked', false);
                $("#weightageCriteria").val('1');
                $(".rdb").attr('readonly', false);
                $(".rdb").css('cursor', 'auto');
                $(".hdb").attr('readonly', true);
                $(".hdb").css('cursor', 'not-allowed');
                $(".hdb").val('0');
            }
        });
        $("#noOfItemWise").change(() => {
            if ($("#noOfItemWise").prop('checked')) {
                $("#noOfItemWise").prop('checked', true);
                $("#categeorywise").prop('checked', false);
                $("#weightageCriteria").val('2');
                $(".rdb").attr('readonly', true);
                $(".rdb").css('cursor', 'not-allowed');
                $(".hdb").attr('readonly', false);
                $(".hdb").css('cursor', 'auto');
                $(".rdb").val('0');
            }
        });

        <?php
        if (!empty($productinfo->ProductsID)):
            if (!empty($mainModinfo[0]->total_weight_percent)):
        ?>
                $("#noOfItemWise").prop('checked', true).change();
            <?php else: ?>
                $("#categeorywise").prop('checked', true).change();
        <?php
            endif;
        endif;
        ?>
        $("#promotionAddSbmt").on('click', function(e) {
            e.preventDefault();
            // alert("Submission Prevented");
            const
                $foodname = $('input[name="foodname"]'),
                $categeorywise = $('#categeorywise'),
                $noOfItemWise = $('#noOfItemWise'),
                $addhoc_weight_percent = $('#addhoc_weight_percent'),
                $addhoc_max_item = $('#addhoc_max_item'),
                $mainModID = $('select[name="mainModID[]"]'),
                $otherModID = $('select[name="otherModID[]"]'),
                $promoErr = $('#promoErr');
            var
                foodname = $foodname.val(),
                // categeorywise = $categeorywise.val(),
                // noOfItemWise = $noOfItemWise.val(),
                addhoc_weight_percent = $addhoc_weight_percent.val(),
                addhoc_max_item = $addhoc_max_item.val(),
                // mainModID = $mainModID.val(),
                // otherModID = $otherModID.val();
                totalMainMod = $mainModID.length;
            totalOtherMod = $('select[name="otherModID[]"] option:selected').length;
            $promoErr.text("");
            $promoErr.hide();
            if (foodname == "") {
                $foodname.focus();
                $promoErr.text("Food Name cannot be left blank !");
                $promoErr.show();
                return false;
            }
            if (totalMainMod < 2) {
                $mainModID.focus();
                $promoErr.text("Add More then 1 main modifiers for setting Promotion items !");
                $promoErr.show();
                return false;
            }
            if ($categeorywise.prop('checked')) {
                $("input[name='max_quantity[]']").each(function() {
                    let indvQty = $(this).val();
                    if (indvQty == "" || indvQty == 0) {
                        $(this).focus();
                        $promoErr.text("Item Qty. cannot be left blank !");
                        $promoErr.show();
                        return false;
                    }
                });
                $("input[name='weight_percent[]']").each(function() {
                    let indvWeight = $(this).val();
                    if (indvWeight == "" || indvWeight == 0) {
                        $(this).focus();
                        $promoErr.text("Item Weightage cannot be left blank !");
                        $promoErr.show();
                        return false;
                    }
                });
            } else {
                if (addhoc_weight_percent == "" || addhoc_weight_percent == 0) {
                    $addhoc_weight_percent.focus();
                    $promoErr.text("Total Weightage cannot be left blank !");
                    $promoErr.show();
                    return false;
                } else {
                    if (isNaN(addhoc_weight_percent)) {
                        $addhoc_weight_percent.focus();
                        $promoErr.text("Please enter a valid number !");
                        $promoErr.show();
                        return false;
                    }
                }
                if (addhoc_max_item == "" || addhoc_max_item == 0) {
                    $addhoc_max_item.focus();
                    $promoErr.text("Total No. of Item cannot be left blank !");
                    $promoErr.show();
                    return false;
                } else {
                    if (isNaN(addhoc_max_item)) {
                        $addhoc_max_item.focus();
                        $promoErr.text("Please enter a valid number !");
                        $promoErr.show();
                        return false;
                    }
                }
            }
            if (totalOtherMod < 1) {
                $otherModID.focus();
                $promoErr.text("Add 1 other modifiers for setting Promotion items !");
                $promoErr.show();
                return false;
            }
            $promoErr.removeClass("text-danger");
            $promoErr.addClass("text-success");
            $promoErr.text("All Ok !");
            $promoErr.show();
            $("#promotionAddSbmt").closest('form').submit();
            return false;
        });
    });
</script>
<style>
    .mtype {
        margin-left: 5px;
        /* Adds bottom space between columns */
    }

    .bolder {
        font-weight: 650;
    }

    .bolden {
        font-weight: 800;
    }

    #promoErr {
        font-weight: bold;
        display: none;
    }
</style>