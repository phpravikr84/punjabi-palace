<div id="posSelectPurchaseTable">
<?php 
// echo "<pre>";
// print_r($this->cart->contents());
// echo "</pre><br />";

// foreach ($this->cart->contents() as $item) {
//     if (!(strpos($item['size'], 'Free Item'))) {
//         echo "<br>Free Item: <br />";
//         echo "Name: ".$item['name']."<br /> pid: ".$item['pid']."<br /> rowid: ".$item['rowid'];
//         break;
//     }
    
// }

$tr_row_id="";
if ($cart = $this->cart->contents()) 
{
    foreach ($cart as $citem) 
    {
        if ($citem['pid']==$item->ProductsID) {
            $tr_row_id=$citem['rowid'];
        }
    }
}
$this->db->select('cart_selected_modifiers.*');
$this->db->from('cart_selected_modifiers');
$this->db->where('cart_selected_modifiers.menu_id',$pid);
$this->db->where('cart_selected_modifiers.is_active',1);
$this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
$q2 = $this->db->get();
$selectedMods = $q2->result();
// echo "tr_row_id: ".$tr_row_id;
// echo "<pre>";
// print_r($item);
// echo "</pre>";
// echo $item->ProductName;
// exit();
//get the 'recipe_feature_flag' value from the database, table 'common_setting'
$this->db->select('recipe_feature_flag');
$this->db->from('common_setting');
$query = $this->db->get();
$recipe_feature_flag = $query->row()->recipe_feature_flag;
$variantOn=true;
if ($recipe_feature_flag == 1) {
    $variantOn=true;
} else {
    $variantOn=false;
}
?>
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
                <input name="itemname" type="hidden" id="itemname_<?php echo "1"; ?>" value="<?php echo $item->ProductName;
                                                                                            if (!empty($item->component)) {
                                                                                                echo " (" . $item->component . ")";
                                                                                            } ?>" />
                <?php 
                    echo $item->ProductName;
                    if (!empty($item->component)) {
                        echo " (" . $item->component . ")";
                    }
                ?>
            </td>
            
            <td <?php if(!$variantOn): ?>style="display:none;"<?php endif; ?>>
                <input name="sizeid" type="hidden" id="sizeid_<?php echo "1"; ?>" value="<?php echo $item->variantid; ?>" />
                <input name="size" type="hidden" value="<?php echo $item->variantName; ?>" id="size_<?php echo 1; ?>" />
                <input name="catid" type="hidden" value="<?php echo (!empty($catid) ? $catid : null) ?>" id="catid" />
                <input name="totalvarient" type="hidden" value="<?php echo $totalvarient; ?>" id="totalvarient" />
                <input name="customqty" type="hidden" value="<?php echo $customqty; ?>" id="customqty" />
                <select name="varientinfo" class="form-control" required id="varientinfo" <?php if(count($varientlist)==1): ?> disabled <?php endif;?> <?php if(!$variantOn): ?>style="display:none;"<?php endif; ?>>
                    <?php foreach ($varientlist as $thisvarient): ?>
                        <option <?php if(count($varientlist)==1): ?> disabled aria-readonly="true" <?php endif;?> value="<?php echo $thisvarient->variantid; ?>" data-title="<?php echo $thisvarient->variantName; ?>" data-price="<?php echo $thisvarient->price; ?>" <?php if ($item->variantid == $thisvarient->variantid) {
                                                                                                                                                                                        echo "selected";
                                                                                                                                                                                    } ?>><?php echo $thisvarient->variantName; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            
            <td>
                <input type="number" name="itemqty" id="itemqty_<?php echo "1"; ?>" class="form-control text-right" value="1" min="1" />
            </td>
            <td>
                <?php 
                $itemprice=0;
                // echo "<pre>";
                // print_r($item);
                // echo "</pre>";
                switch ($ctype) {
                    case '1':
                        $itemprice = $item->price;
                        break;
                    case '2':
                        $itemprice = $item->uber_eats_price;
                        break;
                    case '4':
                        $itemprice = $item->takeaway_price;
                        break;
                    default:
                        $itemprice = $item->price;
                }
                ?>
                <input name="itemprice" type="hidden" value="<?php echo $itemprice; ?>" id="itemprice_<?php echo "1"; ?>" />
                <span id="vprice"><?php echo (($currency->position == 1) ? $currency->curr_icon : '').$itemprice; ?></span>
            </td>

        </tr>

    </tbody>
    <tfoot>

    </tfoot>
</table>
</div>

<div class="div" id="modifierContent_1" style="display: none;">
    <input type="hidden" name="currModCount" id="currModCount" value="<?=$modQty;?>">
    <input type="hidden" name="modVarItemNameCont" id="modVarItemNameCont" value="<?=$item->ProductName;?>">
      <?php 
      if (isset($modifiers) && count($modifiers)>0):
      ?>
      <div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
      <?php
      // echo "<pre>";
      // print_r($modifiers);
      // echo "</pre><br>";
      // echo "modifiers count: ". count($modifiers);
      // echo "<br>modifiers type: ". gettype($modifiers);
      // exit();
        $modGroupQty = 0;
        foreach ($modifiers as $mk => $mv):
        //Fetching modifier item information from the database
        $this->db->select('add_on_id,add_on_name,price,is_comp');
        $this->db->from('add_ons');
        $this->db->where('modifier_set_id', $mv->id);
        $this->db->where('is_active', 1);
        $miq = $this->db->get();
        $modifier_items = $miq->result();
          // echo "<pre>";
          // print_r($mv);
          // echo "</pre>";
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
                              if(count($modifier_items)>0):
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
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->add_on_name;?></label>
                                  </td>
                                  <td style="width: 10%;text-align: end;">
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->price;?></label>
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
      <!-- <div class="row">
        <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;">
          <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(<?php ##$pid;?>);">Apply</button>
        </div>
      </div> -->
        <div class="row">
            <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;" id="modifierChoosebtnDiv">
                <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(<?=$pid;?>);">Apply</button>
            </div>
        </div>
      </div>
      <?php
      endif;
      ?>
</div>
<?php if (!empty($addonslist) && (2 + 2 != 4)) { ?>
    <table class="table table-bordered table-hover bg-white" id="purchaseTable">
        <thead>
            <tr>
                <th class="text-center"></th>
                <th class="text-center"><?php echo display('addons_name') ?></th>
                <th class="text-center wp_100"><?php echo display('addons_qty') ?></th>
                <th class="text-center"><?php echo display('price') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php

            $k = 0;
            foreach ($addonslist as $addons) {
                $k++;
            ?>
                <tr>
                    <td>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" role="<?php echo $addons->price; ?>" title="<?php echo $addons->add_on_name; ?>" name="addons" value="<?php echo $addons->add_on_id; ?>" id="addons_<?php echo $addons->add_on_id; ?>">
                            <label for="addons_<?php echo $addons->add_on_id; ?>"></label>
                        </div>
                    </td>
                    <td class="text-center"><?php echo $addons->add_on_name; ?></td>
                    <td>
                        <input type="number" name="addonqty" id="addonqty_<?php echo $addons->add_on_id; ?>" class="form-control text-right" value="1" min="1" />
                    </td>
                    <td class="text-center"><?php echo $addons->price; ?></td>
                </tr>
            <?php } ?>

        </tbody>
        <tfoot>

        </tfoot>
    </table>
<?php } ?>
<a class="btn btn-success asingle" id="add_to_cart" onclick="posaddonsfoodtocart(<?php echo $item->ProductsID; ?>,1)"><?php echo display('add_to_cart') ?></a>
<a class="btn btn-success" id="add_to_cart" onclick="posaddonsfoodtocart(<?php echo $item->ProductsID; ?>,1,1)"><?php echo display('add_to_cart_more') ?></a>

<script>
    $(document).on("keypress", '#itemqty_1', function(e) {
        if (e.which == 13) {
            $('.asingle').trigger('click');
        }
    });
</script>