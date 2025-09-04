<?php $grtotal = 0;
$totalitem = 0;
$calvat = 0;
$discount = 0;
$itemtotal = 0;
$pvat = 0;
$multiplletax = array();
$tr_row_id="";
$this->load->model('ordermanage/order_model',  'ordermodel');
// echo "<pre>";
// print_r($modifiers);
// echo "</pre>";
if ((!isset($modifiers)) && !is_array($modifiers)) {
    $modifiers = [];
}
if ($cart = $this->cart->contents()) {
// echo "<pre>";
// print_r($cart);
// echo "</pre>";  
?>
<div class="div" id="modifierContent" style="display: none;">
      <?php 
      if (count($modifiers)>0):
      ?>
      <div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
      <?php
      // echo "<pre>";
      // print_r($modifiers);
      // echo "</pre><br>";
      // echo "modifiers count: ". count($modifiers);
      // echo "<br>modifiers type: ". gettype($modifiers);
      // exit();
        foreach ($modifiers as $mk => $mv):
          // echo "<pre>";
          // print_r($mv);
          // echo "</pre>";
      ?>
      <div class="panel panel-default" id="modifiersPanel_<?=$mv->id;?>">
          <div class="panel-heading" role="tab" id="headingModifiers_<?=$mv->id;?>">
              <h5 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseModifiers_<?=$mv->id;?>" aria-expanded="false" aria-controls="collapseModifiers" class="accordion-plus-toggle collapsed">
                    <?=$mv->name;?>
                  </a>
              </h5>
          </div>
          <div id="collapseModifiers_<?=$mv->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingModifiers_<?=$mv->id;?>" aria-expanded="false" style="">
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
                              //Fetching modifier item information from the database
                              $this->db->select('add_on_id,add_on_name,price,is_comp');
                              $this->db->from('add_ons');
                              $this->db->where('modifier_set_id', $mv->id);
                              $this->db->where('is_active', 1);
                              $miq = $this->db->get();
                              $modifier_items = $miq->result();
                              if(count($modifier_items)>0):
                                // echo "<pre>";
                                // print_r($modifier_items);
                                // echo "</pre>";
                                // exit;
                                foreach ($modifier_items as $mik => $miv):
                              ?>
                              <tr>
                                  <td style="width: 85%;">
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->add_on_name;?></label>
                                  </td>
                                  <td style="width: 10%;text-align: end;">
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=(($currency->position == 1) ? $currency->curr_icon : '').$miv->price;?></label>
                                  </td>
                                  <td style="width: 5%;" class="text-center">
                                      <div class="form-check">
                                          <input class="form-check-input modifier-checkbox" type="checkbox" name="modifier_items[]" value="<?=$miv->add_on_id;?>" id="modifier_item_<?=$miv->add_on_id;?>" data-group-id="<?=$mv->add_on_id;?>" autocomplete="off">
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
      <div class="row">
        <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;">
          <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(<?=$pid;?>,'',0);">Apply</button>
        </div>
      </div>     
      </div>
      <?php
      endif;
      ?>
</div>
  <table class="table table-bordered" border="1" width="100%" id="addinvoice">
    <thead>
      <tr>
        <th><?php echo display('item') ?></th>
        <th style="display: none;"><?php echo display('varient_name') ?></th>
        <th><?php echo display('price'); ?></th>
        <th><?php echo display('qty'); ?></th>
        <th><?php echo display('total'); ?></th>
        <th><?php echo display('action'); ?></th>
      </tr>
    </thead>
    <tbody class="itemNumber">
      <?php $i = 0;
      $totalamount = 0;
      $subtotal = 0;
      $pvat = 0;
      $discount = 0;
      $pdiscount = 0;
      foreach ($cart as $item) {
        ?>
        <input name="tr_row_id_<?=$item['pid']?>" id="tr_row_id_<?=$item['pid']?>" type="hidden" value="<?php echo $item['rowid']; ?>" />
        <?php
        $iteminfo = $this->ordermodel->getiteminfo($item['pid']);
        // echo "<pre>";
        // print_r($iteminfo);
        // echo "</pre>";
        $itemprice = $item['price'] * $item['qty'];
        //Fetching add-on prices
        $this->db->select('SUM(add_ons.price) AS mod_total_price');
        $this->db->from('add_ons');
        $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
        $this->db->where('cart_selected_modifiers.menu_id',$item['pid']);
        $this->db->where('cart_selected_modifiers.is_active', 1);
        $this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
        $q = $this->db->get();
        $modTotalPrice = $q->row();
        // echo "<pre>";
        // print_r($modTotalPrice);
        // echo "</pre><br />";
        // echo "mod_total_price: ".$modTotalPrice->mod_total_price;
        // if ($modTotalPrice->mod_total_price > 0) {
        //   $itemprice+=$modTotalPrice->mod_total_price;
        // }
        $itemprice+=$modTotalPrice->mod_total_price;
        $mypdiscountprice = 0;
        if (!empty($taxinfos)) {
          $tx = 0;
          if ($iteminfo->OffersRate > 0) {
            $mypdiscountprice = $iteminfo->OffersRate * $itemprice / 100;
          }
          $itemvalprice =  ($itemprice - $mypdiscountprice);
          foreach ($taxinfos as $taxinfo) {
            //print_r($taxinfo);
            $fildname = 'tax' . $tx;
            if (!empty($iteminfo->$fildname)) {
              $vatcalc = $itemvalprice * $iteminfo->$fildname / 100;
              $multiplletax[$fildname] = $multiplletax[$fildname] + $vatcalc;
            } else {
              $vatcalc = $itemvalprice * $taxinfo['default_value'] / 100;
              $multiplletax[$fildname] = $multiplletax[$fildname] + $vatcalc;
            }

            $pvat = $pvat + $vatcalc;
            $vatcalc = 0;
            $tx++;
          }
        } else {
          $vatcalc = $itemprice * $iteminfo->productvat / 100;
          $pvat = $pvat + $vatcalc;
        }

        if ($iteminfo->OffersRate > 0) {
          $mypdiscount = $iteminfo->OffersRate * $itemprice / 100;
          $pdiscount = $pdiscount + ($iteminfo->OffersRate * $itemprice / 100);
        } else {
          $mypdiscount = 0;
          $pdiscount = $pdiscount + 0;
        }
        if (!empty($item['addonsid'])) {
          $nittotal = $item['addontpr'];
          $itemprice = $itemprice + $item['addontpr'];
        } else {
          $nittotal = 0;
          $itemprice = $itemprice;
        }
        $totalamount = $totalamount + $nittotal;
        $subtotal = $subtotal + $nittotal + $item['price'] * $item['qty'];
        $i++;
        $totalitem = $i;
      ?>
        <tr id="<?php echo $i; ?>">
          <th id="product_name_MFU4E" style="text-align:left;"><?php echo  $item['name'];
                                      echo "<br>";
                                      if (!empty($item['addonsid'])) {
                                        echo $item['addonname'];
                                        if (!empty($taxinfos)) {

                                          $addonsarray = explode(',', $item['addonsid']);
                                          $addonsqtyarray = explode(',', $item['addonsqty']);
                                          $getaddonsdatas = $this->db->select('*')->from('add_ons')->where_in('add_on_id', $addonsarray)->get()->result_array();
                                          $addn = 0;
                                          foreach ($getaddonsdatas as $getaddonsdata) {
                                            $tax = 0;

                                            foreach ($taxinfos as $taxainfo) {

                                              $fildaname = 'tax' . $tax;

                                              if (!empty($getaddonsdata[$fildaname])) {

                                                $avatcalc = ($getaddonsdata['price'] * $addonsqtyarray[$addn]) * $getaddonsdata[$fildaname] / 100;
                                                $multiplletax[$fildaname] = $multiplletax[$fildaname] + $avatcalc;
                                              } else {
                                                $avatcalc = ($getaddonsdata['price'] * $addonsqtyarray[$addn]) * $taxainfo['default_value'] / 100;
                                                $multiplletax[$fildaname] = $multiplletax[$fildaname] + $avatcalc;
                                              }

                                              $pvat = $pvat + $avatcalc;

                                              $tax++;
                                            }
                                            $addn++;
                                          }
                                        }
                                      }
                                      ?>
                                      <a class="serach pl-15" onclick="itemnote('<?php echo $item['rowid'] ?>','<?php echo $item['itemnote'] ?>',<?php echo $item['qty']; ?>,2)" title="<?php echo display('foodnote') ?>"> <?php if(!empty($item['itemnote'])):?> <span class="cartItemNote"><?=$item['itemnote'];?></span> <?php else: ?><i class="fa fa-sticky-note" aria-hidden="true"></i><?php endif; ?> </a>
                                      <?php 
                                      //Fetching modifier groups information from the database
                                      $this->db->select('modifier_groups.*,menu_add_on.*');
                                      $this->db->from('modifier_groups');
                                      $this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
                                      $this->db->where('menu_add_on.menu_id', $item['pid']);
                                      $this->db->where('menu_add_on.is_active', 1);
                                      $query = $this->db->get();
                                      $modifiers = $query->result();

                                      // $this->db->select('add_ons.add_on_name, add_ons.price');
                                      // $this->db->from('add_ons');
                                      // $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
                                      // $this->db->where('cart_selected_modifiers.menu_id',$pid);
                                      // $this->db->where('cart_selected_modifiers.is_active', 1);
                                      // $q1 = $this->db->get();
                                      // $selectedModsForCart = $q1->result();

                                      $this->db->select('add_ons.add_on_name, add_ons.price, cart_selected_modifiers.menu_id, add_ons.add_on_id, add_ons.modifier_id');
                                      $this->db->from('add_ons');
                                      $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
                                      $this->db->where('cart_selected_modifiers.menu_id',$item['pid']);
                                      $this->db->where('cart_selected_modifiers.foods_or_mods', 2);
                                      $this->db->where('cart_selected_modifiers.is_active', 1);
                                      $this->db->where('cart_selected_modifiers.meal_deal_id', 0);
                                      $this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
                                      $q1 = $this->db->get();
                                      $selectedModsForCart = $q1->result();

                                      if (count($modifiers)>0): ?>
                                      <br />
                                      <a class="cartModToggle" id="cartModToggle_<?=$item['pid'];?>" onclick="itemModifiers(<?=$item['pid'];?>,'<?=$item['rowid'];?>')" title="Click to Choose Modifiers">
                                        <!-- <small class="modCheck" id="cartModToggle_<?=$item['pid'];?>">Choose Modifiers <?php if($modTotalPrice->mod_total_price > 0): ?>(<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$modTotalPrice->mod_total_price;?>) <?php endif; ?></small> -->
                                        
                                        <?php
                                        if (count($selectedModsForCart)>0):
                                          foreach ($selectedModsForCart as $smk => $smv):
                                        ?>
                                            <br />
                                          <small class="modCheck"><?=$smv->add_on_name;?> <?php if($smv->price>0): ?>(<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)<?php endif; ?></small>
                                        <?php 
                                          $this->db->select('add_ons.add_on_name, add_ons.price, add_ons.add_on_id, cart_selected_modifiers.modifier_groupid, cart_selected_modifiers.menu_id, cart_selected_modifiers.meal_deal_id');
                                          $this->db->from('add_ons');
                                          $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
                                          // $this->db->where('cart_selected_modifiers.menu_id',$pid);
                                          $this->db->where('cart_selected_modifiers.foods_or_mods', 1);
                                          $this->db->where('cart_selected_modifiers.is_active', 1);
                                          $this->db->where('cart_selected_modifiers.meal_deal_id', $item['pid']);
                                          // $this->db->where('cart_selected_modifiers.add_on_id', $smv->menu_id);
                                          $this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
                                          $q3 = $this->db->get();
                                          // echo $this->db->last_query();
                                          $selectedDealSubMods = $q3->result();
                                          if(count($selectedDealSubMods) > 0):
                                              echo "<div class='subMods'>";
                                              foreach ($selectedDealSubMods as $sdm):
                                                  if($smv->modifier_id == $sdm->menu_id):
                                                    $smv->add_on_name = $sdm->add_on_name;
                                          ?>
                                                  <!-- <br /> -->
                                                  <small class="modCheck"><?=$smv->add_on_name;?><?php if($sdm->price>0):?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$sdm->price;?>)<?php endif; ?></small>
                                          <?php
                                                  endif;
                                                  endforeach;
                                              echo "</div>";
                                              endif;
                                          endforeach;
                                        else:
                                          if(count($modifiers) > 0):
                                        ?>
                                        <small class="modCheck posAddMod">+ Modifiers</small>
                                        <?php
                                          endif;
                                        endif;
                                        ?>
                                      </a>
                                      <?php 
                                      endif; 
                                      ?>
                                      </th>
          <td style="display: none;">
            <?php echo $item['size']; ?>
          </td>

          <td width="">
            <?php echo (($currency->position == 1)?$currency->curr_icon:'').' '.$item['price']; ?>
          </td>
          <td scope="row">
           <?php if($itemprice!=0): ?>
            <a class="btn btn-danger btn-sm btnrightalign btn-group" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid'] ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'del')"><i class="fa fa-minus" aria-hidden="true"></i></a>
            <?php endif; ?>
            <span id="productionsetting-<?php echo $item['pid'] . '-' . $item['sizeid'] ?>"> <?php echo $item['qty']; ?> </span>
            <?php if($itemprice!=0): ?>
            <a class="btn btn-info btn-sm btnleftalign btn-group" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid'] ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'add')"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <?php endif; ?>
          </td>
          <td width="" class="ritempr">
            <?php echo (($currency->position == 1)?$currency->curr_icon:'').' '.$itemprice - $mypdiscount; ?>  
          </td>
          <td width="80"><a class="btn btn-danger btn-sm btnrightalign" onclick="removecart('<?php echo $item['rowid']; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php }
      $itemtotal = $subtotal;
      /*check $taxsetting info*/
      if (empty($taxinfos)) {
        if ($settinginfo->vat > 0) {
          $calvat = ($itemtotal - $pdiscount) * $settinginfo->vat / 100;
        } else {
          $calvat = $pvat;
        }
      } else {
        $calvat = $pvat;
      }
      $grtotal = $itemtotal;
      ?>

      <input name="grandtotal" id="grtotal" type="hidden" value="<?php echo $grtotal - $pdiscount; ?>" />

    </tbody>
  </table>
<?php }
if (!empty($this->cart->contents())) {
  if ($settinginfo->service_chargeType == 1) {
    $totalsercharge = $subtotal - $pdiscount;
    $servicetotal = $settinginfo->servicecharge * $totalsercharge / 100;
  } else {
    $servicetotal = $settinginfo->servicecharge;
  }
  $servicecharge = $settinginfo->servicecharge;
} else {
  $servicetotal = 0;
  $servicecharge = 0;
}

$multiplletaxvalue = htmlentities(serialize($multiplletax));
?>
<input name="subtotal" id="subtotal" type="hidden" value="<?php echo $subtotal; ?>" />
<input name="settingVatValue" id="settingVatValue" type="hidden" value="<?php echo $settinginfo->vat; ?>" />
<input name="totalitem" id="totalitem" type="hidden" value="<?php echo $totalitem; ?>" />
<input name="multiplletaxvalue" id="multiplletaxvalue" type="hidden" value="<?php echo $multiplletaxvalue; ?>" />
<input name="tvat" type="hidden" value="<?php echo $calvat; ?>" id="tvat" />
<input name="sc" type="hidden" value="<?php echo $servicecharge; ?>" id="sc" />
<input name="tdiscount" type="hidden" value="<?php echo $pdiscount; ?>" placeholder="0.00" id="tdiscount" />
<input name="tgtotal" type="hidden" value="<?php echo $calvat + $servicetotal + $itemtotal - $pdiscount; ?>" id="tgtotal" />
<input name="hasModifiers" type="hidden" value="<?php echo ((count($modifiers)>0)? '1' :'0'); ?>" id="hasModifiers_<?=$pid;?>" />