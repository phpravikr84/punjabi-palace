<?php 
    // echo "product Id: ". $productinfo->ProductsID;
    // exit;
    // if(count($food_list) > 0){
    //     foreach($food_list as $fl => $food){
    //         echo $food->ProductName;
    //     }
    // } 
    // echo "<pre>";
    // print_r($food_list);
    // echo "</pre>";
?>

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
                <?php echo form_hidden('ProductsID', (!empty($productinfo->ProductsID)?$productinfo->ProductsID:null)) ?>
                <input name="bigimage" type="hidden" value="<?php echo (!empty($productinfo->bigthumb)?$productinfo->bigthumb:null) ?>" />
                <input name="mediumimage" type="hidden" value="<?php echo (!empty($productinfo->medium_thumb)?$productinfo->medium_thumb:null) ?>" />
                <input name="smallimage" type="hidden" value="<?php echo (!empty($productinfo->small_thumb)?$productinfo->small_thumb:null) ?>" />
                     

<div class="form-group row">
    <label for="promo_title" class="col-sm-1 col-form-label">Title <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Offer Name"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
    <div class="col-sm-11">
        <input name="promo_title" class="form-control" type="text"  placeholder="Enter Promo Title" id="promo_title"  value="">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="promo_type" class="col-sm-5 col-form-label">Type</label>
            <div class="col-sm-7">
                <select name="promo_type" id="promo_type" class="form-control">
                    <option value=""  selected="selected" disabled><?php echo display('select_option');?></option>
                    <option value="1">Discount</option>
                    <option value="2">Free Item</option>
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
            <label for="lastname" class="col-sm-5 col-form-label"><?php echo display('status');?></label>
            <div class="col-sm-7">
                <select name="status"  class="form-control">
                    <option value=""  selected="selected"><?php echo display('select_option');?></option>
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
                <input name="offerendate" class="form-control datepicker" type="text"  placeholder="<?php echo display('offerenddate')?>" id="offerendate"  value="<?php echo (!empty($productinfo->offerendate)?$productinfo->offerendate:null) ?>">
            </div>
        </div>
    </div>
</div>
<div class="form-group row" id="discount_item_div" style="display:none;">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="discount_offerate" class="col-sm-5 col-form-label"><?php echo display('offer_rate')?> <a class="cattooltips" data-toggle="tooltip" data-placement="top" title="Offer Rate Must be a number. It a Percentange Like: if 5% then put 5"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <div class="col-sm-7">
                <input name="discount_offerate" class="form-control" type="text"  placeholder="0" id="discount_offerate"  value="<?php echo (!empty($productinfo->OffersRate)?$productinfo->OffersRate:'') ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="discount_food" class="col-sm-5 col-form-label">Food</label>
            <div class="col-sm-7">
                <select name="discount_food" id="discount_food" class="form-control">
                    <option value=""  selected="selected" disabled><?php echo display('select_option');?></option>
                    <?php 
                    if(count($food_list) > 0){
                        foreach($food_list as $fl => $food){
                            ?>
                            <option value="<?php echo $food->ProductsID; ?>"><?php echo $food->ProductName; ?></option>
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
                            ?>
                            <option value="<?php echo $food->ProductsID; ?>" <?php if(!empty($productinfo)){if($productinfo->ProductsID == $food->ProductsID){echo "Selected";}} ?>><?php echo $food->ProductName; ?></option>
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
                <input name="free_item_buy_qty" class="form-control" type="text"  placeholder="0" id="free_item_buy_qty"  value="<?php echo (!empty($productinfo->OffersRate)?$productinfo->OffersRate:'') ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="free_item_get_food" class="col-sm-5 col-form-label">Get</label>
            <div class="col-sm-7">
                <select name="free_item_get_food" id="free_item_get_food" class="form-control">
                    <option value=""  selected="selected" disabled><?php echo display('select_option');?></option>
                    <?php 
                    if(count($food_list) > 0){
                        foreach($food_list as $food){
                            ?>
                            <option value="<?php echo $food->ProductsID; ?>" <?php if(!empty($productinfo)){if($productinfo->ProductsID == $food->ProductsID){echo "Selected";}} ?>><?php echo $food->ProductName; ?></option>
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
                <input name="free_item_get_qty" class="form-control" type="text"  placeholder="0" id="free_item_get_qty"  value="<?php echo (!empty($productinfo->OffersRate)?$productinfo->OffersRate:'') ?>">
            </div>
        </div>
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
        }else if(promo_type == 2){
            $("#discount_item_div").hide();
            $("#free_item_div").show();
        }else{
            $("#discount_item_div").hide();
            $("#free_item_div").hide();
        }
    });
</script>