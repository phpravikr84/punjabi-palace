<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/posordernew.css'); ?>">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/postop.js'); ?>" type="text/javascript"></script>
<?php
(int)$new_version  = file_get_contents('https://update.adzguru.co/punjabi_palace/autoupdate/update_info');
$myversion = current_version();
function current_version()
{

  //Current Version
  $product_version = '';
  $path = FCPATH . 'system/core/compat/lic.php';
  if (file_exists($path)) {

    // Open the file
    $whitefile = file_get_contents($path);

    $file = fopen($path, "r");
    $i    = 0;
    $product_version_tmp = array();
    $product_key_tmp = array();
    while (!feof($file)) {
      $line_of_text = fgets($file);

      if (strstr($line_of_text, 'product_version')  && $i == 0) {
        $product_version_tmp = explode('=', strstr($line_of_text, 'product_version'));
        $i++;
      }
    }
    fclose($file);

    $product_version = trim(@$product_version_tmp[1]);
    $product_version = ltrim(@$product_version, '\'');
    $product_version = rtrim(@$product_version, '\';');

    return @$product_version;
  } else {
    //file is not exists
    return false;
  }
}

?>
<input name="site_url" type="hidden" value="<?php echo $soundsetting->nofitysound; ?>" id="site_url">

<?php $subtotal = 0;
$ptdiscount = 0; ?>
<div id="openregister" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="openclosecash">

    </div>
  </div>
</div>
<div class="modal fade" id="vieworder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" id="exampleModalLabel"><?php echo display('foodnote') ?></h5>

      </div>
      <div class="modal-body pd-15">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="user_email"><?php echo display('foodnote') ?></label>
              <textarea cols="45" rows="3" id="foodnote" class="form-control" name="foodnote"></textarea>
              <input name="foodqty" id="foodqty" type="hidden" />
              <input name="foodgroup" id="foodgroup" type="hidden" />
              <input name="foodid" id="foodid" type="hidden" />
              <input name="foodvid" id="foodvid" type="hidden" />
              <input name="foodcartid" id="foodcartid" type="hidden" />

            </div>
          </div>
          <div class="col-md-4">
            <a onclick="addnotetoitem()" class="btn btn-success btn-md text-white" id="notesmbt"><?php echo display('addnotesi') ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-none">
      <div class="modal-body p-0">
        <div class="position-relative">
          <div class="calcbody">
            <form name="calc">
              <div class="cacldisplay">
                <input type="text" placeholder="0" name="displayResult" />
              </div>
              <div class="calcbuttons">
                <div class="calcrow">
                  <input type="button" name="c0" value="C" placeholder="0" onClick="calcNumbers(c0.value)">
                  <button type="button" data-dismiss="modal" aria-label="Close"> <i class="fa fa-power-off" aria-hidden="true"></i> </button>
                </div>
                <div class="calcrow">
                  <input type="button" name="b7" value="7" onClick="calcNumbers(b7.value)">
                  <input type="button" name="b8" value="8" onClick="calcNumbers(b8.value)">
                  <input type="button" name="b9" value="9" onClick="calcNumbers(b9.value)">
                  <input type="button" name="addb" value="+" onClick="calcNumbers(addb.value)">
                </div>
                <div class="calcrow">
                  <input type="button" name="b4" value="4" onClick="calcNumbers(b4.value)">
                  <input type="button" name="b5" value="5" onClick="calcNumbers(b5.value)">
                  <input type="button" name="b6" value="6" onClick="calcNumbers(b6.value)">
                  <input type="button" name="subb" value="-" onClick="calcNumbers(subb.value)">
                </div>
                <div class="calcrow">
                  <input type="button" name="b1" value="1" onClick="calcNumbers(b1.value)">
                  <input type="button" name="b2" value="2" onClick="calcNumbers(b2.value)">
                  <input type="button" name="b3" value="3" onClick="calcNumbers(b3.value)">
                  <input type="button" name="mulb" value="*" onClick="calcNumbers(mulb.value)">
                </div>
                <div class="calcrow">
                  <input type="button" name="b0" value="0" onClick="calcNumbers(b0.value)">
                  <input type="button" name="potb" value="." onClick="calcNumbers(potb.value)">
                  <input type="button" name="divb" value="/" onClick="calcNumbers(divb.value)">
                  <input type="button" class="calcred" value="=" onClick="displayResult.value = eval(displayResult.value)">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="payprint" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong><?php echo display('sl_payment'); ?></strong>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="panel">
              <div class="panel-body">
                <div class="col-md-8">
                  <div class="form-group row">
                    <label for="payments" class="col-sm-4 col-form-label"><?php echo display('paymd'); ?></label>
                    <div class="col-sm-7 customesl">
                      <?php $card_type = 4;
                      echo form_dropdown('card_typesl', $paymentmethod, (!empty($card_type) ? $card_type : null), 'class="postform resizeselect form-control" id="card_typesl"') ?>
                    </div>
                  </div>
                  <div id="cardarea wpr_100 display-none">
                    <div class="form-group row">
                      <label for="card_terminal" class="col-sm-4 col-form-label"><?php echo display('crd_terminal'); ?></label>
                      <div class="col-sm-7 customesl"> <?php echo form_dropdown('card_terminal', $terminalist, '', 'class="postform resizeselect form-control" id="card_terminal"') ?> </div>
                    </div>
                    <div class="form-group row">
                      <label for="bank" class="col-sm-4 col-form-label"><?php echo display('sl_bank'); ?></label>
                      <div class="col-sm-7 customesl"> <?php echo form_dropdown('bank', $banklist, '', 'class="postform resizeselect form-control" id="bank"') ?> </div>
                    </div>
                    <div class="form-group row">
                      <label for="4digit" class="col-sm-4 col-form-label"><?php echo display('lstdigit'); ?></label>
                      <div class="col-sm-7 customesl">
                        <input type="text" class="form-control" id="last4digit" name="last4digit" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="4digit" class="col-sm-4 col-form-label"><?php echo display('total_amount'); ?></label>
                    <div class="col-sm-7 customesl">
                      <input type="hidden" id="maintotalamount" name="maintotalamount" value="" />
                      <input type="text" class="form-control" id="totalamount" name="totalamount" readonly="readonly" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="4digit" class="col-sm-4 col-form-label"><?php echo display('cuspayment'); ?></label>
                    <div class="col-sm-7 customesl">
                      <input type="number" class="form-control" id="paidamount" name="paidamount" placeholder="0" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="4digit" class="col-sm-4 col-form-label"><?php echo display('cuspayment'); ?></label>
                    <div class="col-sm-7 customesl">
                      <input type="text" class="form-control" id="change" name="change" readonly="readonly" value="" />
                    </div>
                  </div>
                  <div class="form-group text-right">
                    <div class="col-sm-11 pr-0">
                      <button type="button" id="paidbill" class="btn btn-success w-md m-b-5" onclick="orderconfirmorcancel()"><?php echo display('pay_print'); ?></button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <form name="placenum">
                    <div class="grid-container">
                      <input type="button" class="grid-item" name="n1" value="1" onClick="inputNumbers(n1.value)">
                      <input type="button" class="grid-item" name="n2" value="2" onClick="inputNumbers(n2.value)">
                      <input type="button" class="grid-item" name="n3" value="3" onClick="inputNumbers(n3.value)">
                      <input type="button" class="grid-item" name="n4" value="4" onClick="inputNumbers(n4.value)">
                      <input type="button" class="grid-item" name="n5" value="5" onClick="inputNumbers(n5.value)">
                      <input type="button" class="grid-item" name="n6" value="6" onClick="inputNumbers(n6.value)">
                      <input type="button" class="grid-item" name="n7" value="7" onClick="inputNumbers(n7.value)">
                      <input type="button" class="grid-item" name="n8" value="8" onClick="inputNumbers(n8.value)">
                      <input type="button" class="grid-item" name="n9" value="9" onClick="inputNumbers(n9.value)">
                      <input type="button" class="grid-item" name="n10" value="10" onClick="inputNumbers(n10.value)">
                      <input type="button" class="grid-item" name="n20" value="20" onClick="inputNumbers(n20.value)">
                      <input type="button" class="grid-item" name="n50" value="50" onClick="inputNumbers(n50.value)">
                      <input type="button" class="grid-item" name="n100" value="100" onClick="inputNumbers(n100.value)">
                      <input type="button" class="grid-item" name="n500" value="500" onClick="inputNumbers(n500.value)">
                      <input type="button" class="grid-item" name="n1000" value="1000" onClick="inputNumbers(n1000.value)">
                      <input type="button" class="grid-item" name="n0" value="0" onClick="inputNumbers(n0.value)">
                      <input type="button" class="grid-item" name="n00" value="00" onClick="inputNumbers(n00.value)">
                      <input type="button" class="grid-item" name="c0" value="C" placeholder="0" onClick="inputNumbers(c0.value)">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="paymentsselect" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong><?php echo display('sl_payment'); ?></strong>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="panel">
              <div class="panel-body">
                <div class="form-group row">
                  <label for="payments" class="col-sm-4 col-form-label"><?php echo display('paymd'); ?></label>
                  <div class="col-sm-7 customesl">
                    <?php $card_type = 4;
                    echo form_dropdown('card_typesl', $paymentmethod, (!empty($card_type) ? $card_type : null), 'class="postform resizeselect form-control" id="card_typesl"') ?>
                  </div>
                </div>
                <div id="cardarea display-none wpr_100">
                  <div class="form-group row">
                    <label for="card_terminal" class="col-sm-4 col-form-label"><?php echo display('crd_terminal'); ?></label>
                    <div class="col-sm-7 customesl"> <?php echo form_dropdown('card_terminal', $terminalist, '', 'class="postform resizeselect form-control" id="card_terminal"') ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="bank" class="col-sm-4 col-form-label"><?php echo display('sl_bank'); ?></label>
                    <div class="col-sm-7 customesl"> <?php echo form_dropdown('bank', $banklist, '', 'class="postform resizeselect form-control" id="bank"') ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="4digit" class="col-sm-4 col-form-label"><?php echo display('lstdigit'); ?></label>
                    <div class="col-sm-7 customesl">
                      <input type="text" class="form-control" id="last4digit" name="last4digit" value="" />
                    </div>
                  </div>
                </div>
                <div class="form-group text-right">
                  <div class="col-sm-11 pr-0">
                    <button type="button" class="btn btn-success w-md m-b-5" onclick="onlinepay()"><?php echo display('payn'); ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="cancelord" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong><?php echo display('can_ord'); ?></strong>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="panel">
              <div class="panel-body">
                <div class="form-group row">
                  <label for="payments" class="col-sm-4 col-form-label"><?php echo display('ordid'); ?></label>
                  <div class="col-sm-7 customesl"> <span id="canordid"></span>
                    <input name="mycanorder" id="mycanorder" type="hidden" value="" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="canreason" class="col-sm-4 col-form-label"><?php echo display('can_reason'); ?></label>
                  <div class="col-sm-7 customesl">
                    <textarea name="canreason" id="canreason" cols="35" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group text-right">
                  <div class="col-sm-11 pr-0">
                    <button type="button" class="btn btn-success w-md m-b-5" id="cancelreason"><?php echo display('submit'); ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong>
          <?php //echo display('unit_update');
          ?>
        </strong>
      </div>
      <div class="modal-body addonsinfo"> </div>
    </div>
    <div class="modal-footer"> </div>
  </div>
</div>
<!-- 22-09 -->
<div id="payprint_marge" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg" id="modal-ajaxview"> </div>
</div>
<div id="tablemodal" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-inner" id="table-ajaxview"> </div>
</div>
<div id="payprint_split" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg" id="modal-ajaxview-split"> </div>
</div>

<?php echo form_open('ordermanage/order/insert_customer', 'method="post" class="form-vertical" id="validate"') ?>
<div class="modal fade modal-warning" id="client-info" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><?php echo display('add_customer'); ?></h3>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label"><?php echo display('customer_name'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-6">
            <input class="form-control simple-control" name="customer_name" id="name" type="text" placeholder="Customer Name" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label"><?php echo display('email'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-6">
            <input class="form-control" name="email" id="email" type="email" placeholder="Customer Email" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('mobile'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-6">
            <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Customer Mobile" required="" min="0">
          </div>
        </div>
        <div class="form-group row">
          <label for="address " class="col-sm-3 col-form-label"><?php echo display('b_address'); ?></label>
          <div class="col-sm-6">
            <textarea class="form-control" name="address" id="address " rows="3" placeholder="Customer Address"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="address " class="col-sm-3 col-form-label"><?php echo display('fav_addesrr'); ?></label>
          <div class="col-sm-6">
            <textarea class="form-control" name="favaddress" id="favaddress " rows="3" placeholder="Customer Address"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close'); ?> </button>
        <button type="submit" class="btn btn-success"><?php echo display('submit'); ?> </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</form>
<div class="modal fade modal-warning" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <form id="updateCart" action="#" method="post">
        <div class="modal-body">
          <table class="table table-bordered table-striped">
            <tbody>
              <tr>
                <th class="wpr_25">Price</th>
                <th class="wpr_25"><span id="net_price" class="price"></span></th>
              </tr>
            </tbody>
          </table>
          <div class="form-group row">
            <label for="available_quantity" class="col-sm-4 col-form-label">Ava. Qnty</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="available_quantity" placeholder="Ava. Qnty" name="available_quantity" readonly="readonly">
            </div>
          </div>
          <div class="form-group row">
            <label for="unit" class="col-sm-4 col-form-label">Unit</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="unit" placeholder="Unit" name="unit" readonly="readonly">
            </div>
          </div>
          <div class="form-group row">
            <label for="Qnty" class="col-sm-4 col-form-label">Qnty <span class="color-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="Qnty" name="quantity">
            </div>
          </div>
          <div class="form-group row">
            <label for="Rate" class="col-sm-4 col-form-label">Rate <span class="color-red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="Rate" name="rate">
            </div>
          </div>
          <div class="form-group row">
            <label for="Dis/ Pcs" class="col-sm-4 col-form-label">Dis/ Pcs</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="Dis/ Pcs" placeholder="Dis/ Pcs" name="discount">
            </div>
          </div>
          <input type="hidden" name="rowID">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php

$scan = scandir('application/modules/');
$qrapp = 0;
foreach ($scan as $file) {
  if ($file == "qrapp") {
    if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
      $qrapp = 1;
    }
  }
}

?>
<div id="mySidebar" class="sidebar animate__animated animate__fadeInLeft">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="card">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="card-header">
          Choose Variants
        </div>
        <small class="modifier-sec-sub-heading">Choose the variant of the food item</small>
        <div class="card-body" id="sideVarContainer">
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="card-header">
          Choose Modifiers
        </div>
        <small class="modifier-sec-sub-heading">Choose the add-on items want to serve with the main food item</small>
        <div class="card-body" id="sideMfContainer">
        </div>
      </div>
    </div>
  </div>
</div>
<input name="csrfres" id="csrfresarvation" type="hidden" value="<?php echo $this->security->get_csrf_token_name(); ?>" />
<input name="csrfhash" id="csrfhashresarvation" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<div class="row pos">
  <div class="panel">
    <div class="panel-body">
      <div class="tabsection"> <span class="display-none"><?php echo $settinginfo->language; ?></span>
        <ul class="nav nav-tabs" role="tablist">
          <!-- <li><button class="openbtn" onclick="openNav()">☰ Open Sidebar</button></li> -->
          <!-- <li>
            <a href="javascript:void(0);" class="maindashboard" onclick="openNav()">☰ Modifiers</a>
          </li> -->
          <li><a href="<?php echo base_url() ?>dashboard/home" class="maindashboard"><svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.44618 16.1752C7.44618 16.6294 7.82502 16.9976 8.29233 16.9976C8.75963 16.9976 9.13848 16.6294 9.13848 16.1752H7.44618ZM8.29233 13.7286L7.4468 13.6971C7.44639 13.7077 7.44618 13.7181 7.44618 13.7286H8.29233ZM11 11.2832L10.9702 12.1051C10.9901 12.1057 11.0099 12.1057 11.0298 12.1051L11 11.2832ZM13.7077 13.7286H14.5538C14.5538 13.7181 14.5536 13.7077 14.5533 13.6971L13.7077 13.7286ZM12.8615 16.1752C12.8615 16.6294 13.2404 16.9976 13.7077 16.9976C14.175 16.9976 14.5538 16.6294 14.5538 16.1752H12.8615ZM8.29233 15.3527C7.82502 15.3527 7.44618 15.7209 7.44618 16.1752C7.44618 16.6294 7.82502 16.9976 8.29233 16.9976V15.3527ZM13.7077 16.9976C14.175 16.9976 14.5538 16.6294 14.5538 16.1752C14.5538 15.7209 14.175 15.3527 13.7077 15.3527V16.9976ZM8.29233 16.9976C8.75963 16.9976 9.13848 16.6294 9.13848 16.1752C9.13848 15.7209 8.75963 15.3527 8.29233 15.3527V16.9976ZM7.61541 16.1752V15.3527C7.60548 15.3527 7.59556 15.3528 7.58563 15.3531L7.61541 16.1752ZM3.55391 12.5059H2.70776C2.70776 12.5162 2.70796 12.5266 2.70837 12.537L3.55391 12.5059ZM4.40005 5.15196C4.40005 4.69774 4.02122 4.3295 3.55391 4.3295C3.0866 4.3295 2.70776 4.69774 2.70776 5.15196H4.40005ZM0.371038 6.25785C-0.0156291 6.5129 -0.116321 7.02436 0.14612 7.40027C0.408573 7.77608 0.934775 7.8739 1.32143 7.61883L0.371038 6.25785ZM4.0291 5.83248C4.41577 5.57737 4.51646 5.0659 4.25402 4.69007C3.99157 4.31424 3.46536 4.21636 3.07871 4.47146L4.0291 5.83248ZM3.07871 4.47146C2.69203 4.72653 2.59135 5.23798 2.85377 5.61383C3.1162 5.98968 3.64243 6.08755 4.0291 5.83248L3.07871 4.47146ZM9.43858 1.26995L8.97951 0.579053C8.9741 0.582453 8.96868 0.585907 8.96338 0.589427L9.43858 1.26995ZM12.5614 1.26995L13.0366 0.589427C13.0313 0.585907 13.0259 0.582453 13.0205 0.579053L12.5614 1.26995ZM17.9709 5.8325C18.3576 6.08757 18.8838 5.98968 19.1463 5.61383C19.4087 5.23798 19.3079 4.72651 18.9213 4.47144L17.9709 5.8325ZM13.7077 15.3527C13.2404 15.3527 12.8615 15.7209 12.8615 16.1752C12.8615 16.6294 13.2404 16.9976 13.7077 16.9976V15.3527ZM14.3846 16.1752L14.4144 15.3531C14.4044 15.3528 14.3945 15.3527 14.3846 15.3527V16.1752ZM18.4461 12.5059L19.2917 12.537C19.292 12.5266 19.2922 12.5162 19.2922 12.5059H18.4461ZM19.2922 5.15196C19.2922 4.69774 18.9134 4.3295 18.4461 4.3295C17.9788 4.3295 17.6 4.69774 17.6 5.15196H19.2922ZM20.6788 7.61784C21.0655 7.87292 21.5917 7.77488 21.854 7.39896C22.1163 7.02304 22.0155 6.51158 21.6287 6.25662L20.6788 7.61784ZM18.9213 4.47144C18.5345 4.21644 18.0082 4.31436 17.7458 4.69027C17.4835 5.06618 17.5842 5.57751 17.9709 5.8325L18.9213 4.47144ZM9.13848 16.1752V13.7286H7.44618V16.1752H9.13848ZM9.13791 13.76C9.17514 12.8118 9.99467 12.0716 10.9702 12.1051L11.0298 10.4611C9.12212 10.3959 7.51966 11.8431 7.4468 13.6971L9.13791 13.76ZM11.0298 12.1051C12.0053 12.0716 12.8249 12.8118 12.8621 13.76L14.5533 13.6971C14.4804 11.8431 12.8779 10.3959 10.9702 10.4611L11.0298 12.1051ZM12.8615 13.7286V16.1752H14.5538V13.7286H12.8615ZM8.29233 16.9976H13.7077V15.3527H8.29233V16.9976ZM8.29233 15.3527H7.61541V16.9976H8.29233V15.3527ZM7.58563 15.3531C5.88889 15.4113 4.46377 14.1237 4.39944 12.4747L2.70837 12.537C2.80803 15.0921 5.01618 17.0871 7.6452 16.9971L7.58563 15.3531ZM4.40005 12.5059V5.15196H2.70776V12.5059H4.40005ZM1.32143 7.61883L4.0291 5.83248L3.07871 4.47146L0.371038 6.25785L1.32143 7.61883ZM4.0291 5.83248L9.91377 1.95049L8.96338 0.589427L3.07871 4.47146L4.0291 5.83248ZM9.89764 1.96085C10.5687 1.53961 11.4313 1.53961 12.1024 1.96085L13.0205 0.579053C11.7906 -0.193018 10.2094 -0.193018 8.97951 0.579053L9.89764 1.96085ZM12.0862 1.95049L17.9709 5.8325L18.9213 4.47144L13.0366 0.589427L12.0862 1.95049ZM13.7077 16.9976H14.3846V15.3527H13.7077V16.9976ZM14.3548 16.9971C16.9838 17.0871 19.1919 15.0921 19.2917 12.537L17.6005 12.4747C17.5362 14.1237 16.1111 15.4113 14.4144 15.3531L14.3548 16.9971ZM19.2922 12.5059V5.15196H17.6V12.5059H19.2922ZM21.6287 6.25662L18.9213 4.47144L17.9709 5.8325L20.6788 7.61784L21.6287 6.25662Z"></path>
              </svg>Home</a></li>
          <li class="active"> <a href="#home" role="tab" data-toggle="tab" title="<?php echo display('nw_order') ?>" id="fhome" autofocus class="home newtab" onclick="giveselecttab(this)"><i class="fa fa-plus smallview"></i> <span class="responsiveview"><?php echo display('nw_order'); ?></span> </a></li>
          <li><a href="#profile" role="tab" data-toggle="tab" class="ongord newtab" id="ongoingorder" onclick="giveselecttab(this)"><i class="fa fa-hourglass-start smallview"></i> <span class="responsiveview"><?php echo display('ongoingorder'); ?></span> </a> </li>
          <li><a href="#kitchen" role="tab" data-toggle="tab" class="kstatus newtab" id="kitchenorder" onclick="giveselecttab(this)"><i class="fa fa-coffee smallview"></i> <span class="responsiveview"><?php echo display('kitchen_status'); ?></span> </a> </li>
          <?php if ($qrapp == 1) { ?>
            <li class="seelist2"> <a href="#qrorder" role="tab" data-toggle="tab" id="todayqrorder" class="home newtab" onclick="giveselecttab(this)"><i class="fa fa-qrcode smallview"></i> <span class="responsiveview"><?php echo display('qr-order'); ?></span> </a> <a href="" class="notif2"><span class="label label-danger count2">0</span></a> </li>
          <?php } ?>
          <li class="seelist"> <a href="#settings" role="tab" data-toggle="tab" class="comorder newtab" id="todayonlieorder" onclick="giveselecttab(this)"><i class="fa fa-shopping-bag smallview"></i> <span class="responsiveview"><?php echo display('onlineord'); ?></span> </a> <!--<a href="" class="notif"><span class="label label-danger count">0</span></a> --></li>
          <li> <a href="#messages" role="tab" data-toggle="tab" class="torder newtab" id="todayorder" onclick="giveselecttab(this)"><i class="fa fa-first-order smallview"></i> <span class="responsiveview"><?php echo display('tdayorder'); ?></span> </a> </li>

          <li class="mobiletag"><a href="javascript:;" class="btn" onclick="closeopenresister()" role="button"><i class="fa fa-window-close fa-lg"></i></a></li>
          <li class="mobiletag"><a href="#"><i class="fa fa-keyboard hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<table class='table table-condensed table-striped' >
        <tr>
            <th>Operations</th>
            <th>Keyboard Shortcut</th>
            <th>Operations</th>
            <th>Keyboard Shortcut</th>
        </tr>
        <tr>
        <td>New Order Tab</td>
        <td>Shift+N</td>
        <td>On Going Tab</td>
        <td>Shift+G</td>
        </tr>
        <tr>
        <td>Today Order Tab</td>
        <td>Shift+T</td>
        <td>Online Order Tab</td>
        <td>Shift+O</td>
        </tr>
        <tr>
        <td>Place Order</td>
        <td>Shift+P</td>
        <td>Quick Order</td>
        <td>Shift+Q</td>
        </tr>
        <tr>
        <td>Search Product</td>
        <td>Shift+S</td>
        <td>Select Customer</td>
        <td>Shift+C</td>
        </tr>               
        <tr>
        <td>Select Customer Type</td>
        <td>Shift+Y</td>
        <td>Edit Discount:</td>
        <td>Shift+D</td></tr>
        <tr>
        <td>Edit Service Charge</td>
        <td>Shift+R</td>
        <td>Select Waiter</td>
        <td>Shift+W</td>
        </tr>          
        <tr>
        <td>Select Table</td>
        <td>Shift+B</td>
        <td>Cooking Time</td>
        <td>Alt+K</td></tr>
        <tr>
        <td>Search Table</td>
        <td>Alt+T</td>
        <td>Go Edit</td>
        <td>Shift+E</td></tr>
        <tr>
        <td>Search Today Order</td>
        <td>Shift+X</td>
        <td>Search Online Order</td>
        <td>Shift+V</td>
        </tr>  
        <tr>
        <td>Update Search Product</td>
        <td>Alt+S</td>
        <td>Update Select Customer</td>
        <td>Alt+C</td>
        </tr>               
        <tr>
        <td>Update Select Customer Type</td>
        <td>Alt+Y</td>
        <td>Update Discount:</td>
        <td>Alt+D</td></tr>
        <tr>
        <td>Update Service Charge:</td>
        <td>Alt+R</td>
        <td>Update Select Table</td>
        <td>Alt+B</td>
        </tr>          
        
        <td>Update Submit From</td>
        <td>Alt+U</td>
        <td>Select Payment Type</td>
        <td>Alt+M</td></tr>
        <tr>
        <td>Pay & Print Bill</td>
        <td>Alt+P</td>
        <td>Paid Amount Typing</td>
        <td>Alt+A</td></tr>
    </table>" data-html="true" data-trigger="hover" data-original-title="" title=""></i></a></li>
          <li class="mobiletag">
            <?php $languagenames = $this->db->field_data('language'); ?>
            <!-- for language -->
            <div class="dropdown dropdown-user">

              <a href="#" class="btn dropdown-toggle lang_box" data-toggle="dropdown"><?php if ($this->session->has_userdata('language')) {
                                                                                        echo mb_strimwidth(strtoupper($this->session->userdata('language')), 0, 3, '');
                                                                                      } else {
                                                                                        echo mb_strimwidth(strtoupper($setting->language), 0, 3, '');
                                                                                      } ?></a>
              <ul class="dropdown-menu lang_options">
                <?php
                $lii = 0;
                foreach ($languagenames as $languagename) {
                  if ($lii >= 2) {
                ?>
                    <li><a href="javascript:;" onclick="addlang(this)" data-url="<?php echo base_url(); ?>hungry/setlangue/<?php echo $languagename->name; ?>">
                        <?php echo ucfirst($languagename->name); ?></a></li>
                <?php
                  }
                  $lii++;
                } ?>
              </ul>
            </div>
          </li>
        </ul>

        <div class="tgbar">

          <a href="javascript:;" class="btn" onclick="closeopenresister()" role="button"><i class="fa fa-window-close fa-lg"></i></a>
          <?php if ($new_version > $myversion) {
            if ($versioncheck->version != $new_version) {
          ?>
              <a href="<?php echo base_url("dashboard/autoupdate") ?>" class="updateanimate"><i class="fa fa-warning fa-warning-bg"></i><span class="f-size-weight">Update Available</span></a>
          <?php }
          } ?>
          <a id="fullscreen" href="#"><i class="pe-7s-expand1"></i></a> <a href="#"><i class="fa fa-keyboard hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<table class='table table-condensed table-striped' >
        <tr>
            <th>Operations</th>
            <th>Keyboard Shortcut</th>
            <th>Operations</th>
            <th>Keyboard Shortcut</th>
        </tr>
        <tr>
        <td>New Order Tab</td>
        <td>Shift+N</td>
        <td>On Going Tab</td>
        <td>Shift+G</td>
        </tr>
        <tr>
        <td>Today Order Tab</td>
        <td>Shift+T</td>
        <td>Online Order Tab</td>
        <td>Shift+O</td>
        </tr>
        <tr>
        <td>Place Order</td>
        <td>Shift+P</td>
        <td>Quick Order</td>
        <td>Shift+Q</td>
        </tr>
        <tr>
        <td>Search Product</td>
        <td>Shift+S</td>
        <td>Select Customer</td>
        <td>Shift+C</td>
        </tr>               
        <tr>
        <td>Select Customer Type</td>
        <td>Shift+Y</td>
        <td>Edit Discount:</td>
        <td>Shift+D</td></tr>
        <tr>
        <td>Edit Service Charge</td>
        <td>Shift+R</td>
        <td>Select Waiter</td>
        <td>Shift+W</td>
        </tr>          
        <tr>
        <td>Select Table</td>
        <td>Shift+B</td>
        <td>Cooking Time</td>
        <td>Alt+K</td></tr>
        <tr>
        <td>Search Table</td>
        <td>Alt+T</td>
        <td>Go Edit</td>
        <td>Shift+E</td></tr>
        <tr>
        <td>Search Today Order</td>
        <td>Shift+X</td>
        <td>Search Online Order</td>
        <td>Shift+V</td>
        </tr>  
        <tr>
        <td>Update Search Product</td>
        <td>Alt+S</td>
        <td>Update Select Customer</td>
        <td>Alt+C</td>
        </tr>               
        <tr>
        <td>Update Select Customer Type</td>
        <td>Alt+Y</td>
        <td>Update Discount:</td>
        <td>Alt+D</td></tr>
        <tr>
        <td>Update Service Charge:</td>
        <td>Alt+R</td>
        <td>Update Select Table</td>
        <td>Alt+B</td>
        </tr>          
        
        <td>Update Submit From</td>
        <td>Alt+U</td>
        <td>Select Payment Type</td>
        <td>Alt+M</td></tr>
        <tr>
        <td>Pay & Print Bill</td>
        <td>Alt+P</td>
        <td>Paid Amount Typing</td>
        <td>Alt+A</td></tr>
    </table>" data-html="true" data-trigger="hover" data-original-title="" title=""></i></a>
          <?php $languagenames = $this->db->field_data('language'); ?>
          <div class="dropdown">
            <a class="dropdown-toggle lang_box" type="button" data-toggle="dropdown"><?php if ($this->session->has_userdata('language')) {
                                                                                        echo mb_strimwidth(strtoupper($this->session->userdata('language')), 0, 3, '');
                                                                                      } else {
                                                                                        echo mb_strimwidth(strtoupper($setting->language), 0, 3, '');
                                                                                      } ?>
              <span class="caret"></span></a>
            <ul class="dropdown-menu lang_options">
              <?php
              $lii = 0;
              foreach ($languagenames as $languagename) {
                if ($lii >= 2) {
              ?>
                  <li><a href="javascript:;" onclick="addlang(this)" data-url="<?php echo base_url(); ?>hungry/setlangue/<?php echo $languagename->name; ?>">
                      <?php echo ucfirst($languagename->name); ?></a></li>
              <?php
                }
                $lii++;
              } ?>
            </ul>
          </div>

        </div>
      </div>

      <!-- Tab panes -->
      <div class="tab-content tab-content-xs">
        <div class="tab-pane fade active in" id="home">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="panel">
                <input name="url" type="hidden" id="posurl" value="<?php echo base_url("ordermanage/order/getitemlist") ?>" />
                <input name="url" type="hidden" id="posBanqurl" value="<?php echo base_url("ordermanage/order/getBanqitemlist") ?>" />
                <input name="url" type="hidden" id="productdata" value="<?php echo base_url("ordermanage/order/getitemdata") ?>" />
                <input name="url" type="hidden" id="url" value="<?php echo base_url("ordermanage/order/itemlistselect") ?>" />
                <input name="url" type="hidden" id="carturl" value="<?php echo base_url("ordermanage/order/posaddtocart") ?>" />
                <input name="url" type="hidden" id="cartupdateturl" value="<?php echo base_url("ordermanage/order/poscartupdate") ?>" />
                <input name="url" type="hidden" id="addonexsurl" value="<?php echo base_url("ordermanage/order/posaddonsmenu") ?>" />
                <input name="url" type="hidden" id="modifierurl" value="<?php echo base_url("ordermanage/order/posaddmodifier") ?>" />
                <input name="url" type="hidden" id="cartmodifiersaveurl" value="<?php echo base_url("ordermanage/order/cartmodifiersave") ?>" />
                <input name="url" type="hidden" id="removeurl" value="<?php echo base_url("ordermanage/order/removetocart") ?>" />
                <input name="updateid" type="hidden" id="updateid" value="" />
                <div class="row">
                  <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="navbar-search" method="get" action="<?php echo base_url("ordermanage/order/pos_invoice") ?>">
                          <label class="sr-only screen-reader-text" for="search"><?php echo display('search') ?>:</label>
                          <div class="input-group">
                            <select id="product_name" class="form-control dont-select-me  search-field" dir="ltr" name="s">
                            </select>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-lg-3">
                        <div class="leftSidebarPosMain">
                          <div class="slimScrollDiv">
                            <div class="product-category">
                              <div class="listcatnew" onclick="getslcategory('')"><?php echo display('all') ?> </div>
                              <?php //$result = array_diff($categorylist, array("Select Food Category"));
                              foreach ($allcategorylist as $category) {
                                if (!empty($category->sub)) {
                              ?>
                                  <div class="listcatnew cat-nav2 pos-category">
                                    <a class="btn listcatnew listcat2 pos-category-sub">
                                      <?php echo $category->Name; ?>
                                      <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menucat dropcat display-none" id="newtcat<?php echo $subcat->CategoryID; ?>">
                                      <?php foreach ($category->sub as $subcat) { ?>
                                        <li class="lip-2 border-bottom-white"><a onclick="getslcategory(<?php echo $subcat->CategoryID; ?>)"><?php echo $subcat->Name; ?></a></li>
                                      <?php } ?>
                                    </ul>


                                  </div>
                                <?php } else { ?>

                                  <div class="listcatnew cat-nav pos-category" onclick="getslcategory(<?php echo $category->CategoryID; ?>)"><?php echo $category->Name; ?></div>
                              <?php  }
                              } ?>
                              <!-- Banquet Menu URL [start] -->
                              <div class="listcatnew cat-nav pos-category" onclick="getBanqcategory()">Banquet</div>
                              <!-- Banquet Menu URL [end] -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-9 col-lg-9">
                        <div class="leftSidebarPosMain bg-alice-blue pb-5">
                          <div class="slimScrollDiv">
                            <div class="row row-m-3" id="product_search">
                              <?php $i = 0;
                              foreach ($itemlist as $item) {
                                $item = (object)$item;
                                $i++;
                                $this->db->select('*');
                                $this->db->from('menu_add_on');
                                $this->db->where('menu_id', $item->ProductsID);
                                $query = $this->db->get();
                                $getadons = "";
                                if ($query->num_rows() > 0) {
                                  $getadons = 1;
                                } else {
                                  $getadons =  0;
                                }
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 col-p-3">
                                  <div class="panel panel-bd product-panel select_product p-10 rounded-lg">
                                    <div class="panel-body"> <img src="<?php echo base_url(!empty($item->small_thumb) ? $item->small_thumb : 'assets/img/icons/default_pos_pro.jpg'); ?>" class="img-responsive" alt="<?php echo $item->ProductName; ?>">
                                      <input type="hidden" name="select_product_id" class="select_product_id" value="<?php echo $item->ProductsID; ?>">
                                      <input type="hidden" name="select_totalvarient" class="select_totalvarient" value="<?php echo $item->totalvarient; ?>">
                                      <input type="hidden" name="select_iscustomeqty" class="select_iscustomeqty" value="<?php echo $item->is_customqty; ?>">
                                      <input type="hidden" name="select_product_size" class="select_product_size" value="<?php echo $item->variantid; ?>">
                                      <input type="hidden" name="select_product_isgroup" class="select_product_isgroup" value="<?php echo $item->isgroup; ?>">
                                      <input type="hidden" name="select_product_cat" class="select_product_cat" value="<?php echo $item->CategoryID; ?>">
                                      <input type="hidden" name="select_varient_name" class="select_varient_name" value="<?php echo $item->variantName; ?>">
                                      <input type="hidden" name="select_product_name" class="select_product_name" value="<?php echo $item->ProductName;
                                                                                                                          if (!empty($item->itemnotes)) {
                                                                                                                            echo " -" . $item->itemnotes;
                                                                                                                          } ?>">
                                      <input type="hidden" name="select_product_price" class="select_product_price" value="<?php echo $item->price; ?>">
                                      <input type="hidden" name="select_addons" class="select_addons" value="<?php echo $getadons; ?>">
                                    </div>
                                    <div class="text-center">
                                      <?php 
                                      // echo "<pre>";
                                      // print_r($item);
                                      // echo "</pre>";
                                      ?>
                                      <h5><?php echo $item->ProductName; ?> (<?php echo $item->variantName; ?>)
                                        <?php 
                                        if (!empty($item->itemnotes)) {
                                          echo " - " . $item->itemnotes;
                                        } 
                                        if (!empty($item->price)) {
                                          echo "<br /> <strong style='padding-bottom:15px;'>" .(($currency->position == 1) ? $currency->curr_icon : '').$item->price."</strong>";
                                        } 
                                        ?>
                                      </h5>
                                    </div>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form action="<?php echo base_url("ordermanage/order/pos_order") ?>" class="form-vertical" id="onlineordersubmit" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <div class="col-md-5">
                      <div class="leftSidebarPosMain bg-alice-blue pb-5 px-3 py-3">
                        <div class="slimScrollDiv">
                          <div class="row pos-newform">
                            <div class="col-md-6 form-group">
                              <label for="customer_name"><?php echo display('customer_name'); ?><span class="color-red">*</span></label>
                              <div class="d-flex">
                                <?php $cusid = 1;
                                echo form_dropdown('customer_name', $customerlist, (!empty($cusid) ? $cusid : null), 'class="postform resizeselect form-control" id="customer_name" required') ?>
                                <button type="button" class="btn btn-primary ml-l" aria-hidden="true" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" id="add_cust" data-target="#client-info"><i class="ti-plus"></i></button>
                              </div>
                            </div>
                            <div class="col-md-6 form-group">
                              <label for="store_id"><?php echo display('customer_type'); ?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                              <?php $ctype = 1;
                              echo form_dropdown('ctypeid', $curtomertype, (!empty($ctype) ? $ctype : null), 'class="form-control" id="ctypeid" required') ?>
                            </div>
                            <div id="nonthirdparty" class="col-md-12">
                              <div class="row">

                                <div class="col-md-4 form-group">
                                  <label for="store_id"><?php echo display('waiter'); ?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  <?php $waiterkitchen = $this->session->userdata('id');
                                  echo form_dropdown('waiter', $waiterlist, (!empty($waiterkitchen) ? $waiterkitchen : null), 'class="form-control" id="waiter" required') ?>
                                </div>
                                <?php
                                if ($possetting->tablemaping == 1) {
                                ?>
                                  <div class="col-md-2 form-group pl-0" id="tblsecp" data-tip="Persons">
                                    <label for="store_id" class="wpr_100 person"> <span class="color-red">&nbsp;&nbsp;</span></label>
                                    <!-- <input name="" type="button" class="btn btn-primary  form-control" onclick="showTablemodal()" id="table_person" value="<?php //echo display('person'); 
                                                                                                                                                                ?>"> -->
                                    <button type="button"
                                      class="btn btn-primary d-flex justify-content-center align-items-center"
                                      onclick="showTablemodal()"
                                      data-bs-toggle="tooltip"
                                      data-bs-placement="top"
                                      id="table_person">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"></path>
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"></path>
                                      </svg>
                                    </button>

                                    <input type="hidden" id="table_member" name="table_member" class="form-control" value="" />
                                  </div>
                                <?php } ?>
                                <div class="col-md-3 form-group" id="tblsec">

                                  <label for="store_id"><?php echo display('table'); ?> <span class="color-red">*</span></label>
                                  <?php echo form_dropdown('tableid', $tablelist, (!empty($tablelist->tableid) ? $tablelist->tableid : null), 'class="postform resizeselect form-control" id="tableid" required onchange="checktable()"') ?>
                                  <input type="hidden" id="table_member_multi" name="table_member_multi" class="form-control" value="0" />
                                  <input type="hidden" id="table_member_multi_person" name="table_member_multi_person" class="form-control" value="0" />

                                </div>
                                <?php
                                ?>
                                <div class="col-md-3 form-group px-0" id="cookingtime">
                                  <label for="Cooked Time"><?php echo 'Cook Time'; ?></label>
                                  <input name="cookedtime" type="text" class="form-control timepicker3" id="cookedtime" placeholder="00:00:00" autocomplete="off" />
                                </div>

                              </div>
                            </div>
                            <div id="thirdparty" style="display: none;">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="store_id"><?php echo display('del_company'); ?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  <?php echo form_dropdown('delivercom', $thirdpartylist, (!empty($thirdpartylist->companyId) ? $thirdpartylist->companyId : null), 'class="form-control wpr_95" id="delivercom" required disabled="disabled"') ?>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="third_id"><?php echo display('thirdparty_orderid'); ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  <input name="thirdinvoiceid" type="text" class="form-control" id="thirdinvoiceid">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="hidden" id="order_date" name="order_date" required value="<?php echo date('d-m-Y') ?>" />
                              <input class="form-control" type="hidden" id="bill_info" name="bill_info" required value="1" />
                              <input type="hidden" id="card_type" name="card_type" value="4" />
                              <input type="hidden" id="isonline" name="isonline" value="0" />
                              <input type="hidden" id="assigncard_terminal" name="assigncard_terminal" value="" />
                              <input type="hidden" id="assignbank" name="assignbank" value="" />
                              <input type="hidden" id="assignlastdigit" name="assignlastdigit" value="" />
                              <input type="hidden" id="product_value" name="">
                            </div>
                          </div>
                          <div class="productlist">
                            <div class="product-list pdlist">
                              <div class="table-responsive" id="addfoodlist">
                                <?php $grtotal = 0;
                                $totalitem = 0;
                                $calvat = 0;
                                $discount = 0;
                                $itemtotal = 0;
                                $pdiscount = 0;
                                $multiplletax = array();
                                $this->load->model('ordermanage/order_model', 'ordermodel');
                                if ($cart = $this->cart->contents()) {
                                  // foreach ($cart as $ck => $cv) {
                                  //   echo "Row ID: ".$cv['rowid'];
                                  // }
                                  // echo "<pre>";
                                  // print_r($cart);
                                  // echo "</pre><br>";
                                  // echo "Cart Count: ". count($cart);
                                  // exit;
                                ?>
                                  <table class="table table-bordered wpr_100" border="1" id="addinvoice">
                                    <thead>
                                      <tr>
                                        <th><?php echo display('item') ?></th>
                                        <th><?php echo display('varient_name') ?></th>
                                        <th><?php echo display('price'); ?></th>
                                        <th><?php echo display('quantity'); ?></th>
                                        <th><?php echo display('total'); ?></th>
                                        <th><?php echo display('action'); ?></th>
                                      </tr>
                                    </thead>
                                    <tbody class="itemNumber">
                                      <?php $i = 0;
                                      $totalamount = 0;
                                      $subtotal = 0;
                                      $ptdiscount = 0;
                                      $pvat = 0;
                                      $addOnTotal = 0;
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
                                          $ptdiscount = $ptdiscount + ($iteminfo->OffersRate * $itemprice / 100);
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
                                      ?>
                                        <tr id="<?php echo $i; ?>">
                                          <th id="product_name_MFU4E">
                                            <?php echo  $item['name'];
                                            if (!empty($item['addonsid'])) {
                                              echo "<br>";
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
                                            //Fetching modifier groups information from the database
                                            $this->db->select('modifier_groups.*,menu_add_on.*');
                                            $this->db->from('modifier_groups');
                                            $this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
                                            $this->db->where('menu_add_on.menu_id', $item['pid']);
                                            $this->db->where('menu_add_on.is_active', 1);
                                            $query = $this->db->get();
                                            $modifiers = $query->result();
                                            // echo "<pre>";
                                            // print_r($modifiers);
                                            // echo "</pre><br />";
                                            // echo "Query: ".$this->db->last_query();
                                            ?>
                                            <a class="serach pl-15" onclick="itemnote('<?php echo $item['rowid'] ?>','<?php echo $item['itemnote'] ?>',<?php echo $item['qty']; ?>,2)" title="<?php echo display('foodnote') ?>"> <i class="fa fa-sticky-note" aria-hidden="true"></i> </a>
                                            <?php if (count($modifiers) > 0): ?>
                                              <br />
                                              <a class="" id="cartModToggle_<?=$item['pid'];?>" onclick="itemModifiers(<?= $item['pid']; ?>,'<?= $item['rowid']; ?>')" title="Click to Choose Modifiers">
                                                <!-- <small class="modCheck" id="cartModToggle_<?= $item['pid']; ?>">Choose Modifiers <?php if ($modTotalPrice->mod_total_price > 0): ?>(<?= (($currency->position == 1) ? $currency->curr_icon : '') . ' ' . $modTotalPrice->mod_total_price; ?>) <?php endif; ?></small> -->
                                                
                                                <?php
                                                $this->db->select('add_ons.add_on_name, add_ons.price');
                                                $this->db->from('add_ons');
                                                $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
                                                $this->db->where('cart_selected_modifiers.menu_id', $item['pid']);
                                                $this->db->where('cart_selected_modifiers.is_active', 1);
                                                $q1 = $this->db->get();
                                                $selectedModsForCart = $q1->result();
                                                if (count($selectedModsForCart) > 0):
                                                  foreach ($selectedModsForCart as $smk => $smv):
                                                ?>
                                                    <br />
                                                    <small class="modCheck" style="font-style: italic;font-weight: 400;"><?= $smv->add_on_name; ?> <?php if($smv->price>0): ?>(<?= (($currency->position == 1) ? $currency->curr_icon : '') . ' ' . $smv->price; ?>)<?php endif; ?></small>
                                                <?php
                                                  endforeach;
                                                else:
                                                ?>
                                                <small class="modCheck">Choose Modifiers</small>
                                                <?php  
                                                endif;
                                                ?>
                                              </a>
                                            <?php endif; ?>
                                          </th>
                                          <td><?php echo $item['size']; ?></td>
                                          <td width=""><?php if ($currency->position == 1) {
                                                          echo $currency->curr_icon;
                                                        } ?>
                                            <?php echo $item['price']; ?>
                                            <?php if ($currency->position == 2) {
                                              echo $currency->curr_icon;
                                            } ?></td>
                                          <td scope="row"><a class="btn btn-info btn-sm btnleftalign" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid']; ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'add')"><i class="fa fa-plus" aria-hidden="true"></i></a> <span id="productionsetting-<?php echo $item['pid'] . '-' . $item['sizeid'] ?>"> <?php echo $item['qty']; ?> </span> <a class="btn btn-danger btn-sm btnrightalign" onclick="posupdatecart('<?php echo $item['rowid'] ?>',<?php echo $item['pid']; ?>,<?php echo $item['sizeid'] ?>,<?php echo $item['qty']; ?>,'del')"><i class="fa fa-minus" aria-hidden="true"></i></a></td>
                                          <td width=""><?php if ($currency->position == 1) {
                                                          echo $currency->curr_icon;
                                                        } ?>
                                            <?php echo $itemprice - $mypdiscount; ?>
                                            <?php if ($currency->position == 2) {
                                              echo $currency->curr_icon;
                                            } ?></td>
                                          <td width:"80"=""><a class="btn btn-danger btn-sm btnrightalign" onclick="removecart('<?php echo $item['rowid']; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                        </tr>
                                      <?php }
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
                                      $totalitem = $i;
                                      ?>
                                    </tbody>
                                  </table>
                                <?php $pdiscount = $ptdiscount;
                                }

                                $multiplletaxvalue = htmlentities(serialize($multiplletax));
                                ?>
                                <input name="subtotal" id="subtotal" type="hidden" value="<?php echo $subtotal; ?>" />

                                <input name="multiplletaxvalue" id="multiplletaxvalue" type="hidden" value="<?php echo $multiplletaxvalue; ?>" />
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
                                ?>
                              </div>
                            </div>
                          </div>
                          <div class="fixedclasspos">
                            <div class="row d-flex flex-wrap align-items-center">
                              <div class="col-sm-6 leftview">
                                <input name="distype" id="distype" type="hidden" value="<?php echo $settinginfo->discount_type; ?>" />
                                <input name="sdtype" id="sdtype" type="hidden" value="<?php echo $settinginfo->service_chargeType; ?>" />
                                <input type="hidden" id="orginattotal" value="<?php echo $calvat + $itemtotal + $servicetotal - ($discount + $pdiscount); ?>" name="orginattotal">
                                <input type="hidden" id="invoice_discount" class="form-control text-right" name="invoice_discount" value="<?php echo $discount + $pdiscount ?>">
                                <table class="table table-bordered footersumtotal">
                                  <tr>
                                    <td>
                                      <div class="row m-0">
                                        <label for="date" class="col-sm-8 mb-0"><?php echo display('vat_tax1') ?>: </label>
                                        <label class="col-sm-4 mb-0">
                                          <input type="hidden" id="vat" name="vat" value="<?php echo $calvat; ?>" />
                                        </label>
                                        <strong>
                                          <?php if ($currency->position == 1) {
                                            echo $currency->curr_icon;
                                          } ?>
                                          <span id="calvat"> <?php echo $calvat; ?></span>
                                          <?php if ($currency->position == 2) {
                                            echo $currency->curr_icon;
                                          } ?>
                                        </strong>
                                        </label>
                                      </div>
                                    </td>
                                    <td rowspan="2"><label for="date" class="mb-0 col-sm-6"><?php echo display('grand_total') ?>:</label>
                                      <label class="col-sm-6 p-0 mb-0">
                                        <input type="hidden" id="orggrandTotal" value="<?php echo $calvat + $itemtotal + $servicetotal - ($discount + $pdiscount); ?>" name="orggrandTotal">
                                        <input name="grandtotal" type="hidden" value="<?php echo $calvat + $itemtotal + $servicetotal - ($discount + $pdiscount); ?>" id="grandtotal" />
                                        <span class="badge badge-primary grandbg font-26"><strong>
                                            <?php if ($currency->position == 1) {
                                              echo $currency->curr_icon;
                                            } ?>
                                            <span id="caltotal"><?php echo $calvat + $itemtotal + $servicetotal - ($discount + $pdiscount); ?></span>
                                            <?php if ($currency->position == 2) {
                                              echo $currency->curr_icon;
                                            } ?>
                                          </strong></span></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label for="date" class="col-sm-8 mb-0"><?php echo display('service_chrg') ?>
                                        <?php if ($settinginfo->service_chargeType == 0) {
                                          echo "(" . $currency->curr_icon . ")";
                                        } else {
                                          echo "(%)";
                                        } ?>
                                        :</label>
                                      <div class="col-sm-4 p-0">
                                        <input type="text" id="service_charge" onkeyup="calculatetotal();" class="form-control text-right mb-5" value="<?php echo $servicecharge; ?>" name="service_charge" placeholder="0.00" />
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-sm-6 text-right"> <a class="btn btn-primary cusbtn" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-calculator" aria-hidden="true"></i>Calculator</a> <a href="<?php echo base_url("ordermanage/order/posclear") ?>" type="button" class="btn btn-danger cusbtn"><?php echo display('cancel') ?></a>
                                <input type="hidden" id="getitemp" name="getitemp" value="<?php echo $totalitem - $discount; ?>" />
                                <input type="button" id="add_payment2" class="btn btn-primary btn-large cusbtn" onclick="quickorder()" name="add-payment" value="<?php echo display('quickorder') ?>">
                                <input type="button" id="add_payment" class="btn btn-success btn-large cusbtn" onclick="placeorder()" name="add-payment" value="<?php echo display('placeorder') ?>">


                                <input type="hidden" id="production_setting" value="<?php echo $possetting->productionsetting; ?>">
                                <input type="hidden" id="production_url" value="<?php echo base_url("production/production/ingredientcheck") ?>">
                                <input type="hidden" id="production_urlOrder" value="<?php echo base_url("production/production/ingredientcheckOrder") ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile">
          <div class="row m-0" id="onprocesslist"> </div>
        </div>
        <div class="tab-pane fade" id="kitchen">
          <div class="row" id="kitchenstatus"> </div>
        </div>
        <?php if ($qrapp == 1) { ?>
          <div class="tab-pane fade" id="qrorder"> </div>
        <?php } ?>
        <div class="tab-pane fade" id="settings"> </div>
        <div class="tab-pane fade" id="messages"> </div>
      </div>
    </div>
  </div>
</div>
<audio id="myAudio" src="<?php echo base_url() ?><?php echo $soundsetting->nofitysound; ?>" preload="auto" class="display-none"></audio>
<div id="payprint2"> </div>
<div class="modal fade modal-warning" id="posprint" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" id="kotenpr"> </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div id="orderdetailsp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong>

        </strong>
      </div>
      <div class="modal-body orddetailspop"> </div>
    </div>
    <div class="modal-footer"> </div>
  </div>
</div>
<?php
$scan1 = scandir('application/modules/');
$getdisc = "";
foreach ($scan1 as $file) {
  if ($file == "loyalty") {
    if (file_exists(APPPATH . 'modules/' . $file . '/assets/data/env')) {
      $getdisc = 1;
    }
  }
}
//$this->load->view('include/pos_script');
?>
<script>
  Pace.options.ajax = {
    trackMethods: ['POST', 'GET'],
    trackWebSockets: false,
    ignoreURLs: []
  };
</script>
<script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "100%";
    $("#mySidebar").find(".closebtn").css({
      position: "relative"
    });
    setTimeout(() => {
      $("#mySidebar").find(".closebtn").css({
        position: "absolute"
      });
      $("#mySidebar").find(".closebtn").addClass("animate__animated animate__fadeInLeft");
    }, 100);
    // document.getElementById("main").style.marginLeft = "100%";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
  }
  // $(document).on('click', '#sideMfContainer .panel-heading a.accordion-plus-toggle', function () {
  //   console.log("Accordion Clicked, and collapsed: "+((!$(this).hasClass('collapsed')) ? "False" : "True"));
  //   $('.modifier-set-sub-heading').toggle($(this).hasClass('collapsed'));
  // });
  $(document).on('click', '.panel-heading a.accordion-plus-toggle', function () {
    let subHeading = $(this).find('.modifier-set-sub-heading'); // Get the sub-heading inside the clicked <a>

    if (!$(this).hasClass('collapsed')) {
        subHeading.hide();
    } else {
        subHeading.show();
    }
    console.log("Accordion Clicked, and collapsed: "+((!$(this).hasClass('collapsed')) ? "False" : "True"));
  });

</script>
<script src="<?php echo base_url('ordermanage/order/possettingjs') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('ordermanage/order/quickorderjs') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/possetting.js'); ?>" type="text/javascript"></script>