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
$this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
$q1 = $this->db->get();
$selectedModsForCart = $q1->result();
$this->db->select('item_foods.ProductName AS food_name');
$this->db->from('item_foods');
$this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=item_foods.ProductsID');
$this->db->where('cart_selected_modifiers.menu_id',$pid);
$this->db->where('cart_selected_modifiers.foods_or_mods', 1);
$this->db->where('cart_selected_modifiers.is_active', 1);
$this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
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
        <small class="modCheck" style="font-style: italic;font-weight: 400;background-color: #dff0d8 !important;"><?=$smv->food_name;?></small>
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
        $smv->add_on_name = $smv->add_on_name;
?>
        <br />
        <small class="modCheck" style="font-style: italic;font-weight: 400;background-color: #f2dede !important;"><?=$smv->add_on_name;?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)</small>
<?php
      endif;
  endforeach;
endif;
if (count($selectedModsForCart) == 0 && count($selectedFoodsForCart) == 0):
?>
        <br />
        <small class="modCheck" style="font-style: italic;font-weight: 400;background-color: #f2dede !important;">+ Modifiers</small>
<?php
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
$cartItemQty=0;
if ($cart = $this->cart->contents()):
    $i = 0;
    $totalamount = 0;
    $subtotal = 0;
    $pvat = 0;
    $discount = 0;
    $pdiscount = 0;
    foreach ($cart as $item) {
        $iteminfo = $this->ordermodel->getiteminfo($item['pid']);
        // switch ($ctype) {
        //     case '1':
        //         $itemprice = $item['price'] * $item['qty'];
        //         break;
        //     case '2':
        //         $itemprice = $item['uber_eats_price'] * $item['qty'];
        //         break;
        //     case '4':
        //         $itemprice = $item['takeaway_price'] * $item['qty'];
        //         break;
        //     default:
        //         $itemprice = $item['price'] * $item['qty'];
        // }
        $itemprice = $item['price'] * $item['qty'];

        $cartItemQty = $item['qty'];
        //Fetching add-on prices
        $this->db->select('SUM(add_ons.price) AS mod_total_price');
        $this->db->from('add_ons');
        $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
        $this->db->where('cart_selected_modifiers.menu_id', $item['pid']);
        $this->db->where('cart_selected_modifiers.is_active', 1);
        $this->db->where('DATE(cart_selected_modifiers.created_at)',date('Y-m-d'));
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

<?php 
// check if the item id [$pid] has any active promo (promo_type = 2) in the database
$this->db->select('promo_data.*');
$this->db->from('promo_data');
$this->db->where('promo_data.offer_food_id', $pid);
$this->db->where('promo_data.status', 1);
$this->db->where('promo_data.promo_type', 2); // promo_type = 2 for free item
$this->db->where('promo_data.end_date >=', date('Y-m-d'));
$promo_query = $this->db->get();
// echo "<pre>";
// print_r($promo_query->result());
// echo "</pre>";
// exit;
// create a hidden input field to store the promo item ID and quantity
$promo_get_food_id = $promo_get_food_qty = 0;
if ($promo_query->num_rows() > 0) {
    $promo_item = $promo_query->row();
    if ($promo_item->buy_qty == $cartItemQty) {
        if ($promo_item->end_date >= date('Y-m-d')) {
            $promo_get_food_id = $promo_item->get_food_id; // The food ID that is part of the promo
            $promo_get_food_qty = $promo_item->get_qty; // The quantity of the food item in the promo
            echo '<input type="hidden" name="promo_item_id" id="promo_item_id_'.$pid.'" value="' . $promo_get_food_id . '">';
            echo '<input type="hidden" name="promo_item_qty" id="promo_item_qty_'.$pid.'" value="' . $promo_get_food_qty . '">';
        }
    }
    // If there is an active promo, display the promo details
    // echo '<div class="alert alert-info">';
    // echo '<strong>Promo Available:</strong> ' . $promo_item->promo_title . '<br>';
    // echo 'Promo Type: ' . ($promo_item->promo_type == 1 ? 'Discount' : 'Free Item') . '<br>';
    // echo 'Start Date: ' . getFormattedDateTime($promo_item->start_date, LONG_DATE_FORMAT) . '<br>';
    // echo 'End Date: ' . getFormattedDateTime($promo_item->end_date, LONG_DATE_FORMAT);
    // echo '</div>';
} else {
    // No active promo found for this item
    // echo '<div class="alert alert-warning">No active promo available for this item.</div>';
    $promo_get_food_id = 0;
    $promo_get_food_qty = 0;
}
echo '<input type="hidden" name="cartItemQty" id="cartItemQty_'.$pid.'" value="' . $cartItemQty . '">';
?>