<?php 
// echo "<pre>";
// print_r($this->cart->contents());
// echo "</pre>";
$selectedItemName=$selectedVarientId=$selectedItemQty=$selectedItemPrice=$selectedVarientName="";
if ($cart = $this->cart->contents()){
    foreach ($cart as $ck => $cv) {
        // $size = $cv['size'];
        if ($pid == $cv['pid']) {
            $selectedItemName=$cv['name'];
            $selectedVarientId=$cv['sizeid'];
            $selectedItemQty=$cv['qty'];
            $selectedItemPrice=$cv['price'];
            $selectedVarientName=$cv['size'];
        }
    }
}
// echo "<br>pid: ".$pid;
// echo "<br>Selected Item Name: ".$selectedItemName;
//get the 'recipe_feature_flag' value from the database, table 'common_setting'
$this->db->select('recipe_feature_flag');
$this->db->from('common_setting');
$query = $this->db->get();
$recipe_feature_flag = $query->row()->recipe_feature_flag;
// echo "<br>recipe_feature_flag: ".$recipe_feature_flag;
$variantOn=true;
if ($recipe_feature_flag == 1) {
    $variantOn=true;
} else {
    $variantOn=false;
}
?>
<div id="posSelectPurchaseTable">
<table class="table table-bordered table-hover bg-white" id="purchaseTable">
    <thead>
        <tr>
            <th class="text-center"><?php echo display('item_information') ?></th>
            <?php if($variantOn): ?>
            <th class="text-center"><?php echo display('size') ?></th>
            <?php endif; ?>
            <th class="text-center wp_100"><?php echo display('qty') ?></th>
            <th class="text-center wp_120"><?php echo display('price') ?></th>
        </tr>
    </thead>
    <tbody id="addItem">
        <tr>
            <td>
                <input name="itemname" type="hidden" id="itemname_<?php echo "1"; ?>" value="<?php echo $selectedItemName;
                                                                                            if (!empty($item->component)) {
                                                                                                echo " (" . $item->component . ")";
                                                                                            } ?>" />
                <?php 
                echo $selectedItemName;
                if (!empty($item->component)) {
                    echo " (" . $item->component . ")";
                } 
                ?>
            </td>
            <?php if($variantOn): ?>
            <td>
                <input name="sizeid" type="hidden" id="sizeid_<?php echo "1"; ?>" value="<?php echo $selectedVarientId; ?>" />
                <input name="size" type="hidden" value="<?php echo htmlentities($selectedVarientName); ?>" id="size_<?php echo 1; ?>" />
                <input name="catid" type="hidden" value="<?php echo (!empty($catid) ? $catid : null) ?>" id="catid" />
                <input name="totalvarient" type="hidden" value="<?php echo $totalvarient; ?>" id="totalvarient" />
                <input name="customqty" type="hidden" value="<?php echo $selectedItemQty; ?>" id="customqty" />
                <select name="varientinfo" class="form-control" required id="varientinfo" <?php if(count($varientlist)==1): ?> disabled <?php endif;?>>
                    <?php foreach ($varientlist as $thisvarient) { ?>
                        <option <?php if(count($varientlist)==1): ?> disabled aria-readonly="true" <?php endif;?> value="<?php echo $thisvarient->variantid; ?>" data-title="<?php echo $thisvarient->variantName; ?>" data-price="<?php echo $thisvarient->price; ?>" <?php if ($selectedVarientId == $thisvarient->variantid) {
                                                                                                                                                                                        echo "selected";
                                                                                                                                                                                    } ?>><?php echo $thisvarient->variantName; ?></option>
                    <?php } ?>
                </select>
            </td>
            <?php endif; ?>
            <td>
                <input type="number" name="itemqty" id="itemqty_<?php echo "1"; ?>" class="form-control text-right" value="<?=$selectedItemQty;?>" min="1" />
            </td>
            <td>
                <input name="itemprice" type="hidden" value="<?php echo $selectedItemPrice; ?>" id="itemprice_<?php echo "1"; ?>" />
                <span id="vprice"><?php echo (($currency->position == 1) ? $currency->curr_icon : '').$selectedItemPrice; ?></span>
            </td>

        </tr>

    </tbody>
    <tfoot>

    </tfoot>
</table>
</div>
<?php
//   echo "<pre>";
//   print_r($mainCats);
//   echo "</pre><br>";
//   echo "mainCats count: ". count($mainCats);
//   echo "<br>modifiers type: ". var_dump($modifiers);
//   exit();
$size=""; 
if ($cart = $this->cart->contents()){
    foreach ($cart as $ck => $cv) {
        $size = $cv['size'];
    }
}
if (count($mainCats) > 0):
    // echo "<pre>";
    // print_r($selectedFoodsForCart);
    // echo "</pre><br>";
    // echo "mainCats count: ". count($selectedFoodsForCart);
?>
<div id="posAddmodSizeInfo" style="display:none;">
<?php if(count($mainCats) > 0): ?>
    <div id="promomainfoodlist">
    <?php 
        if (count($mainCats)>0):
        ?>
        <div class="panel-group" id="foodAccordion2" role="tablist" aria-multiselectable="false">
        <?php
            foreach ($mainCats as $mck => $mcv):
        ?>
        <div class="panel panel-default" id="PromoMainFoodCatPanel_<?=$mcv->id;?>">
            <div class="panel-heading" role="tab" id="headingFoodCats_<?=$mcv->id;?>">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#foodAccordion2" href="#collapsePromoMainFoods_<?=$mcv->id;?>" aria-expanded="<?=(($mck==0)?'true':'false')?>" aria-controls="collapsePromoMainFoods" class="accordion-plus-toggle <?=(($mck==0)?'':'collapsed')?>">
                        <?=$mcv->category_name;?>
                        <br />
                        <small class="modifier-set-sub-heading" <?php if($mck==0): ?>style="display:block !important;"<?php endif; ?>>Select the main food items for the deal</small>
                    </a>
                </h5>
            </div>
            <div id="collapsePromoMainFoods_<?=$mcv->id;?>" class="panel-collapse collapse <?=(($mck==0)?'in':'')?>" role="tabpanel" aria-labelledby="headingFoodCats_<?=$mcv->id;?>" aria-expanded="<?=(($mck==0)?'true':'false')?>" style="">
                <div class="panel-body">
                    <div class="mt-3">
                        <table class="table table-bordered">
                            <tbody>
                                <?php 
                                //Fetching Food item information from the database
                                $this->db->select('item_foods.ProductsID as id,item_foods.ProductName as text,variant.variantid,variant.variantName,variant.price');
                                $this->db->from('item_foods');
                                $this->db->join('variant', 'item_foods.ProductsID=variant.menuid', 'left');
                                $this->db->where('item_foods.CategoryID', $mcv->category_id);
                                $this->db->where('item_foods.ProductsIsActive', 1);
                                $pmf = $this->db->get();
                                $pm_flist = $pmf->result();

                                $this->db->select('item_foods.ProductName AS food_name, item_foods.ProductsID as selected_id, cart_selected_modifiers.variant_id, cart_selected_modifiers.modifier_groupid');
                                $this->db->from('item_foods');
                                $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=item_foods.ProductsID');
                                $this->db->where('cart_selected_modifiers.menu_id',$pid);
                                $this->db->where('cart_selected_modifiers.foods_or_mods', 1);
                                $this->db->where('cart_selected_modifiers.is_active', 1);
                                $q2 = $this->db->get();
                                $selectedFoodsForCart = $q2->result();
                                // echo "<pre>";
                                // print_r($selectedFoodsForCart);
                                // echo "</pre><br>";

                                if(count($pm_flist)>0):
                                    foreach ($pm_flist as $mik => $miv):
                                        $checked = "";
                                        if (count($selectedFoodsForCart) > 0) {
                                            foreach ($selectedFoodsForCart as $smk => $smv) {
                                                if ($mcv->category_id == $smv->modifier_groupid) {
                                                    if (($miv->id == $smv->selected_id) && ($miv->variantid == $smv->variant_id)) {
                                                        $checked = "checked";
                                                    }
                                                }
                                            }
                                        }
                                ?>
                                <tr>
                                    <td style="width: 85%;">
                                        <label for="modifiers_<?=$miv->id;?>" class="form-label"><?=$miv->text;?> (<?=$miv->variantName;?>)</label>
                                    </td>
                                    <td style="width: 10%;text-align: end;">
                                        <label for="modifiers_<?=$miv->id;?>" class="form-label"><?=(($currency->position == 1) ? $currency->curr_icon : '').$miv->price;?></label>
                                    </td>
                                    <td style="width: 5%;" class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input modifier-checkbox" type="checkbox" <?=$checked;?> name="promo_main_food_items[]" value="<?=$miv->id;?>" id="promo_main_food_items_<?=$miv->id;?>" data-group-id="<?=$mcv->category_id;?>" autocomplete="off">
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>
        </div>
        <?php
        endif;
        ?>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-6">
            Selected Size: 
        </div>
        <div class="col-md-6">
            <?=$size;?>
        </div>
    </div>
<?php endif; ?>
</div>
<?php
endif;
if (count($modifiers) > 0):
?>
<div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
    <?php
    $modGroupQty = 0;
    foreach ($modifiers as $mk => $mv):
        // echo "<pre>";
        // print_r($mv);
        // echo "</pre>";
        //Fetching modifier item information from the database
        $this->db->select('add_on_id,add_on_name,price,is_comp,minqty,maxqty,is_food_item');
        $this->db->from('add_ons');
        $this->db->where('modifier_set_id', $mv->id);
        $this->db->where('is_active', 1);
        $this->db->order_by('sort_order', "ASC");
        $miq = $this->db->get();
        $modifier_items = $miq->result();
        if(count($modifier_items)>0):
        $modGroupQty++;
    ?>
        <div class="panel panel-default" id="modifiersPanel_<?=$mv->id;?>">
            <div class="panel-heading" role="tab" id="headingModifiers_<?=$mv->id;?>">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseModifiers_<?=$mv->id;?>" aria-expanded="<?=(($modGroupQty==1)?'true':'false')?>" aria-controls="collapseModifiers" class="accordion-plus-toggle <?=(($modGroupQty==1)?'':'collapsed')?>">
                        <?=$mv->name;?>
                        <br />
                        <small class="modifier-set-sub-heading" <?php if($modGroupQty==1): ?>style="display:block !important;"<?php endif; ?>>Select the items for adding them into the cart</small>
                    </a>
                </h5>
            </div>
            <div id="collapseModifiers_<?=$mv->id;?>" class="panel-collapse collapse <?=(($modGroupQty==1)?'in':'')?>" role="tabpanel" aria-labelledby="headingModifiers_<?=$mv->id;?>" aria-expanded="<?=(($modGroupQty==1)?'true':'false')?>" style="">
                <div class="panel-body">
                    <div class="mt-3">
                        <table class="table table-bordered">
                            <!-- <thead class="table-primary">
                                <tr>
                                    <th scope="col" style="width:10%">Select</th>
                                    <th scope="col" style="width:50%">Modifier Item</th>
                                    <th scope="col" style="width:50%">Price</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <?php
                                // echo "<pre>";
                                // print_r($selectedMods);
                                // echo "</pre><br>";
                                // echo "selectedMods count: ". count($selectedMods);
                                if (count($modifier_items) > 0):
                                    // echo "<pre>";
                                    // print_r($modifier_items);
                                    // echo "</pre>";
                                    // exit;
                                    foreach ($modifier_items as $mik => $miv):
                                        $checked = "";
                                        if (count($selectedMods) > 0) {
                                            foreach ($selectedMods as $smk => $smv) {
                                                if ($mv->modifier_groupid == $smv->modifier_groupid) {
                                                    if ($miv->add_on_id == $smv->add_on_id) {
                                                        $checked = "checked";
                                                    }
                                                }
                                            }
                                        }
                                ?>
                                        <tr>
                                            <td style="width: 85%;">
                                                <label for="modifier_item_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->add_on_name;?></label>
                                            </td>
                                            <td style="width: 10%;text-align: end;">
                                                <label for="modifier_item_<?=$miv->add_on_id;?>" class="form-label"><?=(($currency->position == 1) ? $currency->curr_icon : '').$miv->price;?></label>
                                            </td>
                                            <td style="width: 5%;" class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input modifier-checkbox" type="checkbox" <?=$checked;?> name="modifier_items[]" value="<?=$miv->add_on_id;?>" id="modifier_item_<?=$miv->add_on_id;?>" data-group-id="<?=$mv->modifier_groupid;?>" autocomplete="off">
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif;
    endforeach;
    if ($modGroupQty == 0) {
        echo "No modifier items found for this product !";
    }
    ?>
    <div class="row">
        <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;" id="modifierChoosebtnDiv">
            <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(<?=$pid;?>,'<?=$tr_row_id;?>',1);">Apply</button>
        </div>
    </div>
</div>
<?php
endif;
?>