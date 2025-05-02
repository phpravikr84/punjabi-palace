<input name="modTotalPrice_<?= $pid; ?>" type="hidden" value="<?= $modTotalPrice; ?>" id="modTotalPrice_<?= $pid; ?>" />
<input name="modToggleText_<?= $pid; ?>" type="hidden" value="<?php if ($modTotalPrice > 0): ?>(<?= (($currency->position == 1) ? $currency->curr_icon : '') . ' ' . $modTotalPrice; ?>) <?php endif; ?>" id="modToggleText_<?= $pid; ?>" />
<div id="selectedModsDetails_<?= $pid; ?>" style="display: none; visibility:hidden;">
<?php
$this->db->select('add_ons.add_on_name, add_ons.price');
$this->db->from('add_ons');
$this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
$this->db->where('cart_selected_modifiers.menu_id',$pid);
$this->db->where('cart_selected_modifiers.foods_or_mods', 2);
$this->db->where('cart_selected_modifiers.is_active', 1);
$q1 = $this->db->get();
$selectedModsForCart = $q1->result();
$this->db->select('item_foods.ProductName AS food_name');
$this->db->from('item_foods');
$this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=item_foods.ProductsID');
$this->db->where('cart_selected_modifiers.menu_id',$pid);
$this->db->where('cart_selected_modifiers.foods_or_mods', 1);
$this->db->where('cart_selected_modifiers.is_active', 1);
$q2 = $this->db->get();
$selectedFoodsForCart = $q2->result();
// echo "<pre>";
// print_r($selectedModsForCart);
// echo "</pre><br>";
// echo "selectedModsForCart Count: " . count($selectedModsForCart);
// echo "<br />";
if (count($selectedFoodsForCart)>0):
  foreach ($selectedFoodsForCart as $smk => $smv):
?>
        <br />
        <small class="modCheck" style="font-style: italic;font-weight: 400;background-color: #dff0d8 !important;"><?=$smv->food_name. ' (Food)';?></small>
<?php
  endforeach;
endif;

if (count($selectedModsForCart)>0):
  foreach ($selectedModsForCart as $smk => $smv):
    if($smv->foods_or_mods == 1):
        $smv->add_on_name = $smv->add_on_name . ' (Food)';
?>
        <br />
        <small class="modCheck" style="font-style: italic;font-weight: 400;"><?=$smv->add_on_name;?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)</small>
<?php 
    else:
        $smv->add_on_name = $smv->add_on_name . ' (Modifier)';
?>
        <br />
        <small class="modCheck" style="font-style: italic;font-weight: 400;background-color: #f2dede !important;"><?=$smv->add_on_name;?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)</small>
<?php
      endif;
  endforeach;
endif;
?>
</div>
<?php
// silence is golden
$grtotal = 0;
$totalitem = 0;
$calvat = 0;
$discount = 0;
$itemtotal = 0;
$pvat = 0;
$multiplletax = array();
$this->load->model('ordermanage/order_model',  'ordermodel');
if ($cart = $this->cart->contents()):
    $i = 0;
    $totalamount = 0;
    $subtotal = 0;
    $pvat = 0;
    $discount = 0;
    $pdiscount = 0;
    foreach ($cart as $item) {
        $iteminfo = $this->ordermodel->getiteminfo($item['pid']);
        $itemprice = $item['price'] * $item['qty'];
        //Fetching add-on prices
        $this->db->select('SUM(add_ons.price) AS mod_total_price');
        $this->db->from('add_ons');
        $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
        $this->db->where('cart_selected_modifiers.menu_id', $item['pid']);
        $this->db->where('cart_selected_modifiers.is_active', 1);
        $q = $this->db->get();
        $modTotalPrice = $q->row();
        // echo "mod_total_price: ".$modTotalPrice->mod_total_price;
        // if ($modTotalPrice->mod_total_price > 0) {
        //   $itemprice+=$modTotalPrice->mod_total_price;
        // }
        $itemprice += $modTotalPrice->mod_total_price;
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
        $subtotal = $subtotal + $nittotal + $itemprice;
        $i++;
        $totalitem = $i;
        if (!empty($item['addonsid'])) {
            // echo $item['addonname'];
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
    }
    $itemtotal = $subtotal;
    /*check $taxsetting info*/
    if (empty($taxinfos)) {
        if ($settinginfo->vat > 0) {
            $calvat = ($itemtotal - $ptdiscount) * $settinginfo->vat / 100;
        } else {
            $calvat = $pvat;
        }
    } else {
        $calvat = $pvat;
    }
    $grtotal = $itemtotal;
    $pdiscount = $ptdiscount;
endif;
?>
<input name="grandtotal_<?= $pid; ?>" id="grtotal_<?= $pid; ?>" type="hidden" value="<?php echo $grtotal - $pdiscount; ?>" />
<?php
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
<input name="subtotal_<?= $pid; ?>" id="subtotal_<?= $pid; ?>" type="hidden" value="<?php echo $subtotal; ?>" />
<input name="settingVatValue_<?= $pid; ?>" id="settingVatValue_<?= $pid; ?>" type="hidden" value="<?php echo $settinginfo->vat; ?>" />
<input name="totalitem_<?= $pid; ?>" id="totalitem_<?= $pid; ?>" type="hidden" value="<?php echo $totalitem; ?>" />
<input name="multiplletaxvalue_<?= $pid; ?>" id="multiplletaxvalue_<?= $pid; ?>" type="hidden" value="<?php echo $multiplletaxvalue; ?>" />
<input name="tvat_<?= $pid; ?>" type="hidden" value="<?php echo $calvat; ?>" id="tvat_<?= $pid; ?>" />
<input name="sc_<?= $pid; ?>" type="hidden" value="<?php echo $servicecharge; ?>" id="sc_<?= $pid; ?>" />
<input name="tdiscount_<?= $pid; ?>" type="hidden" value="<?php echo $pdiscount; ?>" placeholder="0.00" id="tdiscount_<?= $pid; ?>" />
<input name="tgtotal_<?= $pid; ?>" type="hidden" value="<?php echo $calvat + $servicetotal + $itemtotal - $pdiscount; ?>" id="tgtotal_<?= $pid; ?>" />