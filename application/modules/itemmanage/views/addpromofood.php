<?php 
    // echo "product Id: ". $productinfo->ProductsID;
    // exit;
    // if(count($food_list) > 0){
    //     foreach($food_list as $fl => $food){
    //         echo $food->ProductName;
    //     }
    // } 
    // echo "<pre>";
    // print_r($productinfo);
    // echo "</pre>";
    $isUpdate=false;
    if(!empty($productinfo->id)){
        $isUpdate=true;
        $title = "Update Promo Food";
    }
if ($this->session->flashdata('message')) {
    if ($message && strpos($message, 'Welcome') === false) {
?>
    <div class="alert alert-success alert-dismissible" role="alert" style="color: #3c763d !important;background-color: #dff0d8 !important;border-color: #d6e9c6 !important;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php 
        //check if there is any word: "Welcome" in the message, then don't show it
        $message = $this->session->flashdata('message');
        echo $message;
        unset($_SESSION['message']);
        ?>
    </div>
<?php 
    }
}
if ($this->session->flashdata('exception')) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php 
        echo $this->session->flashdata('exception');
        unset($_SESSION['exception']);
        ?>
    </div>
<?php } ?>
<?php if (validation_errors()) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors() ?>
    </div>
<?php } ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_food/addpromofood") ?>                    
                <?php echo form_hidden('id',$this->session->userdata('id'));?>
                <?php echo form_hidden('ProductsID', (!empty($productinfo->id)?$productinfo->id:null)); ?>
                <input name="bigimage" type="hidden" value="<?php echo (!empty($productinfo->bigthumb)?$productinfo->bigthumb:null) ?>" />
                <input name="mediumimage" type="hidden" value="<?php echo (!empty($productinfo->medium_thumb)?$productinfo->medium_thumb:null) ?>" />
                <input name="smallimage" type="hidden" value="<?php echo (!empty($productinfo->small_thumb)?$productinfo->small_thumb:null) ?>" />
                     

<div class="form-group row">
    <label for="promo_title" class="col-sm-1 col-form-label">Title <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="The name of the Promo Offer"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
    <div class="col-sm-11">
        <input name="promo_title" class="form-control" type="text"  placeholder="Enter Promo Title" id="promo_title"  value="<?=(($isUpdate)?$productinfo->promo_title:'');?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="promo_type" class="col-sm-5 col-form-label">Type</label>
            <div class="col-sm-7">
                <select name="promo_type" id="promo_type" class="form-control">
                    <option value="" <?php if(!$isUpdate): ?> selected="selected" <?php endif; ?> disabled><?php echo display('select_option');?></option>
                    <option value="1" <?php if($isUpdate && ($productinfo->promo_type == 1)): ?> selected <?php endif; ?>>Discount</option>
                    <option value="2" <?php if($isUpdate && ($productinfo->promo_type == 2)): ?> selected <?php endif; ?>>Free Item</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="offerstartdate" class="col-sm-5 col-form-label"><?php echo display('offerdate')?></label>
            <div class="col-sm-7">
                <input name="offerstartdate" class="form-control datepicker" type="text"  placeholder="<?php echo display('offerdate')?>" id="offerstartdate"  value="<?php echo (!empty($productinfo->offerstartdate)?$productinfo->offerstartdate:null) ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="status" class="col-sm-5 col-form-label"><?php echo display('status');?></label>
            <div class="col-sm-7">
                <select name="status" id="status" class="form-control">
                    <option value="1" <?php  if(!empty($productinfo)){if($productinfo->ProductsIsActive==1){echo "Selected";}} else{echo "Selected";} ?>><?php echo display('active')?></option>
                    <option value="0" <?php  if(!empty($productinfo)){if($productinfo->ProductsIsActive==0){echo "Selected";}} ?>><?php echo display('inactive')?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="offerendate" class="col-sm-5 col-form-label"><?php echo display('offerenddate')?></label>
            <div class="col-sm-7">
                <input name="offerendate" class="form-control datepicker" type="text"  placeholder="<?php echo display('offerenddate')?>" id="offerendate"  value="<?php echo (($isUpdate)?$productinfo->end_date:null) ?>">
            </div>
        </div>
    </div>
</div>
<div class="form-group row" id="discount_item_div" style="display:none;">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="discount_offerate" class="col-sm-5 col-form-label"><?php echo display('offer_rate')?> <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Offer Rate Must be a number. It a Percentange Like: if 5% then put 5"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <div class="col-sm-7">
                <input name="discount_offerate" class="form-control" type="text"  placeholder="0" id="discount_offerate"  value="<?php echo (!empty($productinfo->discount_rate)?$productinfo->discount_rate:'') ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="discount_food" class="col-sm-5 col-form-label">Food</label>
            <div class="col-sm-7">
                <select name="discount_food" id="discount_food" class="form-control">
                    <option value="" <?php if(!$isUpdate): ?> selected="selected" <?php endif; ?> disabled><?php echo display('select_option');?></option>
                    <?php 
                    if(count($food_list) > 0){
                        foreach($food_list as $fl => $food){
                            $selected = '';
                            if ($isUpdate && ($productinfo->promo_type == 1) && $productinfo->offer_food_id == $food->ProductsID) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="<?php echo $food->ProductsID;?>" <?=$selected;?>><?php echo $food->ProductName; ?></option>
                            <?php
                        }
                    } 
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group row" id="free_item_div" style="display:none;">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="free_item_buy_food" class="col-sm-5 col-form-label">Buy</label>
            <div class="col-sm-7">
                <select name="free_item_buy_food" id="free_item_buy_food" class="form-control">
                    <option value=""  selected="selected" disabled><?php echo display('select_option');?></option>
                    <?php 
                    if(count($food_list) > 0){
                        foreach($food_list as $food){
                            $selected = '';
                            if($isUpdate && ($productinfo->promo_type == 2) && $productinfo->offer_food_id == $food->ProductsID) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $food->ProductsID;?>" <?=$selected;?>><?php echo $food->ProductName; ?></option>
                            <?php
                        }
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="free_item_buy_qty" class="col-sm-5 col-form-label">Buy Quantity <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="How many of the item purchase can avail the free food"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <div class="col-sm-7">
                <input name="free_item_buy_qty" class="form-control" type="text"  placeholder="0" id="free_item_buy_qty"  value="<?php echo (($isUpdate && ($productinfo->promo_type == 2) && $productinfo->buy_qty)?$productinfo->buy_qty:'') ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="free_item_get_food" class="col-sm-5 col-form-label">Get</label>
            <div class="col-sm-7">
                <select name="free_item_get_food" id="free_item_get_food" class="form-control">
                    <option value="" <?php if(!$isUpdate): ?> selected="selected" <?php endif; ?> disabled><?php echo display('select_option');?></option>
                    <?php 
                    if(count($food_list) > 0){
                        foreach($food_list as $food){
                            $selected = '';
                            if($isUpdate && ($productinfo->promo_type == 2) && $productinfo->get_food_id == $food->ProductsID) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $food->ProductsID; ?>" <?=$selected;?>><?php echo $food->ProductName; ?></option>
                            <?php
                        }
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="free_item_get_qty" class="col-sm-5 col-form-label">Get Quantity <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Free Food Quantity"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <div class="col-sm-7">
                <input name="free_item_get_qty" class="form-control" type="text"  placeholder="0" id="free_item_get_qty"  value="<?php echo (($isUpdate && ($productinfo->promo_type == 2) && $productinfo->get_qty)?$productinfo->get_qty:'') ?>">
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success" name="promo_submit_btn" id="promo_submit_btn"><?php echo 'Submit'; ?></button>
    </div>
</div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/itemmanage/assets/js/addfooditem_script.js'); ?>" type="text/javascript"></script>
<?php 
    if(empty($productinfo->ProductsID)):
?>
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
</script>
<?php 
    endif;
?>
<script type="text/javascript">
    $(document).on("change", "#promo_type", ()=>{
        var promo_type = $("#promo_type").children("option:selected").val();
        if(promo_type == 1){
            $("#discount_item_div").show();
            $("#free_item_div").hide();
            $("#free_item_buy_food").val('');
            $("#free_item_buy_qty").val('');
            $("#free_item_get_food").val('');
            $("#free_item_get_qty").val('');
        }else if(promo_type == 2){
            $("#discount_item_div").hide();
            $("#free_item_div").show();
            $("#discount_offerate").val('');
            $("#discount_food").val(null);
        }else{
            $("#discount_item_div").hide();
            $("#free_item_div").hide();
        }
    });
    // $(document).on("click", "#promo_submit_btn", (e) => {
    //     e.preventDefault();
        
    //     var promo_title = $("#promo_title").val();
    //     var promo_type = $("#promo_type").children("option:selected").val();
    //     var offerstartdate = $("#offerstartdate").val();
    //     var offerendate = $("#offerendate").val();
    //     var discount_offerate = $("#discount_offerate").val();
    //     var discount_food = $("#discount_food").children("option:selected").val();
    //     var free_item_buy_food = $("#free_item_buy_food").children("option:selected").val();
    //     var free_item_buy_qty = $("#free_item_buy_qty").val();
    //     var free_item_get_food = $("#free_item_get_food").children("option:selected").val();
    //     var free_item_get_qty = $("#free_item_get_qty").val();

    //     if (promo_title == "") {
    //         swal({
    //             title: "Error!",
    //             text: "Please enter promo title",
    //             type: "error",
    //             confirmButtonClass: "btn-success",
    //             confirmButtonText: "OK",
    //             closeOnConfirm: true
    //         }, function () {
    //             setTimeout(() => { $("#promo_title").focus(); }, 100);
    //         });
    //         return false;
    //     }

    //     if (promo_type == "") {
    //         swal({
    //             title: "Error!",
    //             text: "Please select promo type",
    //             type: "error",
    //             confirmButtonClass: "btn-success",
    //             confirmButtonText: "OK",
    //             closeOnConfirm: true
    //         }, function () {
    //             setTimeout(() => { $("#promo_type").focus(); }, 100);
    //         });
    //         return false;
    //     }

    //     if (offerstartdate == "") {
    //         swal({
    //             title: "Error!",
    //             text: "Please select offer start date",
    //             type: "error",
    //             confirmButtonClass: "btn-success",
    //             confirmButtonText: "OK",
    //             closeOnConfirm: true
    //         }, function () {
    //             setTimeout(() => { $("#offerstartdate").focus(); }, 100);
    //         });
    //         return false;
    //     }

    //     if (offerendate == "") {
    //         swal({
    //             title: "Error!",
    //             text: "Please select offer end date",
    //             type: "error",
    //             confirmButtonClass: "btn-success",
    //             confirmButtonText: "OK",
    //             closeOnConfirm: true
    //         }, function () {
    //             setTimeout(() => { $("#offerendate").focus(); }, 100);
    //         });
    //         return false;
    //     }

    //     if (promo_type == 1) {
    //         if (discount_offerate == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please enter discount offer rate",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#discount_offerate").focus(); }, 100);
    //             });
    //             return false;
    //         }

    //         if (discount_food == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please select food for discount",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#discount_food").focus(); }, 100);
    //             });
    //             return false;
    //         }

    //     } else if (promo_type == 2) {
    //         if (free_item_buy_food == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please select food for buy",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#free_item_buy_food").focus(); }, 100);
    //             });
    //             return false;
    //         }

    //         if (free_item_buy_qty == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please enter buy quantity",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#free_item_buy_qty").focus(); }, 100);
    //             });
    //             return false;
    //         }

    //         if (free_item_get_food == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please select food for get",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#free_item_get_food").focus(); }, 100);
    //             });
    //             return false;
    //         }

    //         if (free_item_get_qty == "") {
    //             swal({
    //                 title: "Error!",
    //                 text: "Please enter get quantity",
    //                 type: "error",
    //                 confirmButtonClass: "btn-success",
    //                 confirmButtonText: "OK",
    //                 closeOnConfirm: true
    //             }, function () {
    //                 setTimeout(() => { $("#free_item_get_qty").focus(); }, 100);
    //             });
    //             return false;
    //         }
    //     }

    //     return false;
    //     // $("#promo_submit_btn").closest("form").submit();
    // });


    $(document).on("click", "#promo_submit_btn", (e) => {
    e.preventDefault();
    
    var promo_title = $("#promo_title").val();
    var promo_type = $("#promo_type").children("option:selected").val();
    var offerstartdate = $("#offerstartdate").val();
    var offerendate = $("#offerendate").val();
    
    var discount_offerate = $("#discount_offerate").val();
    var discount_food = $("#discount_food").children("option:selected").val();
    
    var free_item_buy_food = $("#free_item_buy_food").children("option:selected").val();
    var free_item_buy_qty = $("#free_item_buy_qty").val();
    var free_item_get_food = $("#free_item_get_food").children("option:selected").val();
    var free_item_get_qty = $("#free_item_get_qty").val();
    var status = $("select[name='status']").children("option:selected").val();

    if (promo_title == "") {
        showErrorAlert("Please enter promo title", "#promo_title");
        return false;
    }

    if (promo_type == "") {
        showErrorAlert("Please select promo type", "#promo_type");
        return false;
    }

    if (offerstartdate == "") {
        showErrorAlert("Please select offer start date", "#offerstartdate");
        return false;
    }

    if (offerendate == "") {
        showErrorAlert("Please select offer end date", "#offerendate");
        return false;
    }

    if (promo_type == 1) {
        if (discount_offerate == "") {
            showErrorAlert("Please enter discount offer rate", "#discount_offerate");
            return false;
        }

        if (discount_food == "") {
            showErrorAlert("Please select food for discount", "#discount_food");
            return false;
        }
    } else if (promo_type == 2) {
        if (free_item_buy_food == "") {
            showErrorAlert("Please select food for buy", "#free_item_buy_food");
            return false;
        }

        if (free_item_buy_qty == "") {
            showErrorAlert("Please enter buy quantity", "#free_item_buy_qty");
            return false;
        }

        if (free_item_get_food == "") {
            showErrorAlert("Please select food for get", "#free_item_get_food");
            return false;
        }

        if (free_item_get_qty == "") {
            showErrorAlert("Please enter get quantity", "#free_item_get_qty");
            return false;
        }
    }
    // return false;
    $("#promo_submit_btn").closest("form").submit();
});

</script>