<?php $grtotal = 0;
$totalitem = 0;
$calvat = 0;
$discount = 0;
$itemtotal = 0;
$pvat = 0;
$multiplletax = array();
$this->load->model('ordermanage/order_model',  'ordermodel');
// echo "<pre>";
// print_r($modifiers);
// echo "</pre>";
if ($cart = $this->cart->contents()) { ?>
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
                          <thead class="table-primary">
                              <tr>
                                  <th scope="col" style="width:10%">Select</th>
                                  <th scope="col" style="width:50%">Modifier Item</th>
                                  <th scope="col" style="width:50%">Price</th>
                              </tr>
                          </thead>
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
                                  <td class="text-center">
                                      <div class="form-check">
                                          <input class="form-check-input modifier-checkbox" type="checkbox" name="modifier_items[]" value="<?=$miv->add_on_id;?>" id="modifier_item_<?=$miv->add_on_id;?>" data-group-id="<?=$mv->add_on_id;?>" autocomplete="off">
                                      </div>
                                  </td>
                                  <td>
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->add_on_name;?></label>
                                  </td>
                                  <td>
                                      <label for="modifiers_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->price;?></label>
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
          <button class="btn btn-success">Apply</button>
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
        <th><?php echo display('varient_name') ?></th>
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
        $iteminfo = $this->ordermodel->getiteminfo($item['pid']);

        $itemprice = $item['price'] * $item['qty'];
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
          <th id="product_name_MFU4E"><?php echo  $item['name'];
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
                                      <a class="serach pl-15" onclick="itemnote('<?php echo $item['rowid'] ?>','<?php echo $item['itemnote'] ?>',<?php echo $item['qty']; ?>,2)" title="<?php echo display('foodnote') ?>"> <i class="fa fa-sticky-note" aria-hidden="true"></i> </a>
                                      <?php if (count($modifiers)>0): ?>
                                      <br />
                                      <a class="" onclick="itemModifiers(<?=$item['pid'];?>)" title="Click to Choose Modifiers">
                                        <small class="modCheck">Modifiers</small>
                                      </a>
                                      <?php endif; ?>
                                      </th>
          <td>
            <?php echo $item['size']; ?>
          </td>

          <td width="">
            <?php echo $item['price']; ?>
          </td>
          <td scope="row">
            <a class="btn btn-info btn-sm btnleftalign" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid'] ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'add')"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <span id="productionsetting-<?php echo $item['pid'] . '-' . $item['sizeid'] ?>"> <?php echo $item['qty']; ?> </span>
            <a class="btn btn-danger btn-sm btnrightalign" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid'] ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'del')"><i class="fa fa-minus" aria-hidden="true"></i></a>
          </td>
          <td width="">
            <?php echo $itemprice - $mypdiscount; ?>
          </td>

          <td width:"80"=""><a class="btn btn-danger btn-sm btnrightalign" onclick="removecart('<?php echo $item['rowid']; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<input name="totalitem" id="totalitem" type="hidden" value="<?php echo $totalitem; ?>" />
<input name="multiplletaxvalue" id="multiplletaxvalue" type="hidden" value="<?php echo $multiplletaxvalue; ?>" />
<input name="tvat" type="hidden" value="<?php echo $calvat; ?>" id="tvat" />
<input name="sc" type="hidden" value="<?php echo $servicecharge; ?>" id="sc" />
<input name="tdiscount" type="hidden" value="<?php echo $pdiscount; ?>" placeholder="0.00" id="tdiscount" />
<input name="tgtotal" type="hidden" value="<?php echo $calvat + $servicetotal + $itemtotal - $pdiscount; ?>" id="tgtotal" />