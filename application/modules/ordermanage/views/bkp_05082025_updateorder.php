<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/posordernew.css'); ?>">
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong></strong>
            </div>
            <div class="modal-body addonsinfo">
                
            </div>
            
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<div id="items" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo "Item Information";?></strong>
            </div>
            <div class="modal-body iteminfo">
                
            </div>
            
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<div class="row update-order-height">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <fieldset class="border p-2">
                <legend  class="w-auto"><?php echo display('update_ord') ?></legend>
            </fieldset>
            <input name="url" type="hidden" id="posurl_update" value="<?php echo base_url("ordermanage/order/getitemlist") ?>" />
            <input name="url" type="hidden" id="possuburl_update" value="<?php echo base_url("ordermanage/order/getsubitemlist") ?>" />
            <input name="url" type="hidden" id="productdata" value="<?php echo base_url("ordermanage/order/getitemdata") ?>" />
            <input name="url" type="hidden" id="updatecarturl" value="<?php echo base_url("ordermanage/order/addtocartupdate") ?>" />
            <input name="url" type="hidden" id="cartupdateturl" value="<?php echo base_url("ordermanage/order/poscartupdate") ?>" />
            <input name="url" type="hidden" id="addonexsurl" value="<?php echo base_url("ordermanage/order/posaddonsmenu") ?>" />
            <input name="url" type="hidden" id="removeurl" value="<?php echo base_url("ordermanage/order/removetocart") ?>" />
            <input name="url" type="hidden" id="posBanqurl" value="<?php echo base_url("ordermanage/order/getBanqitemlist") ?>" />
            <input name="url" type="hidden" id="posPromoDealurl" value="<?php echo base_url("ordermanage/order/getPromoDealsItemlist") ?>" />
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="navbar-search" method="get" action="<?php echo base_url("ordermanage/order/pos_invoice")?>" >
                                <label class="sr-only screen-reader-text" for="search"><?php echo display('search')?>:</label>
                                <div class="input-group">
                                    <select id="update_product_name" class="form-control dont-select-me  update_search-field" dir="ltr" name="s">
                                    </select>
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3"> 
                            <div class="leftSidebarPos">
                                <div class="slimScrollDiv">
                                    <div class="product-category">
                                        <div class="listcat" onclick="getslcategory_update('')">All</div>
                                        <?php
                                        function renderCategory($categories, $level = 0) {
                                            foreach ($categories as $category) {
                                                $hasSub = !empty($category->sub);
                                                $indent = str_repeat('&nbsp;&nbsp;', $level); // Visual indent for hierarchy
                                                // Determine if this is a child category (level >= 2)
                                                $isChild = $level >= 2;
                                                // Choose the appropriate function based on level
                                                $clickFunction = $isChild ? 'getslsubcategory_update' : 'getslcategory_update';
                                        ?>
                                                <div class="listcat dropdown cat-nav<?php echo $hasSub ? ' pos-category' : ''; ?> pos-category">
                                                    <a class="btn listcat <?php echo $hasSub ? 'dropdown-toggle listcat2 listcat3' : ''; ?>" 
                                                    onclick="<?php echo $clickFunction . '(' . $category->CategoryID . ')'; ?>"
                                                    <?php echo $hasSub ? 'data-toggle="updatenewtcat' . $category->CategoryID . '"' : ''; ?>>
                                                        <?php echo $indent . htmlspecialchars($category->Name); ?>
                                                        <?php echo $hasSub ? '<span class="caret"></span>' : ''; ?>
                                                    </a>
                                                    <?php if ($hasSub) { ?>
                                                        <ul class="dropdown-menu dropcat display-none" id="updatenewtcat<?php echo $category->CategoryID; ?>">
                                                            <?php renderCategory($category->sub, $level + 1); ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        renderCategory($allcategorylist);
                                        ?>
                                        <!-- Banquet Menu URL [start] -->
                                        <div class="listcatnew cat-nav pos-category" onclick="getBanqcategory_update()">Banquet</div>
                                        <!-- Banquet Menu URL [end] -->
                                        <!-- Promotional Menu URL [start] -->
                                        <div class="listcatnew cat-nav pos-category" onclick="getPromotionalDeals_update()">Deals</div>
                                        <!-- Promotional Menu URL [end] -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9">
                            <div class="leftSidebarPos">
                            <div class="slimScrollDiv">
                                <div class="row row-m-3" id="product_search_update">
                                    <?php $i=0;
                                    foreach($itemlist as $item){
                                        $item=(object)$item;
                                        $i++;
                                        if($item->isgroup==1){
                                            $isgroupid=1;
                                        }
                                        else{
                                            $isgroupid=0;
                                        }
                                    $this->db->select('*');
                                    $this->db->from('menu_add_on');
                                    $this->db->where('menu_id',$item->ProductsID);
                                    $query = $this->db->get();
                                    $getadons="";
                                    if ($query->num_rows() > 0) {
                                    $getadons = 1;
                                    }
                                    else{
                                    $getadons =  0;
                                    }
                                    ?>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 col-p-3">
                                        <div class="panel panel-bd product-panel p-12 rounded-lg <?php if($item->isgroup !=1): ?>update_select_product<?php endif; ?>" <?php if($item->isgroup ==1): ?>onclick="selectGroupItem($(this));"<?php endif; ?>>
                                            <div class="panel-body">
                                                <img src="<?php echo base_url(!empty($item->ProductImage)?$item->ProductImage:'assets/img/icons/default_pos_pro.jpg'); ?>" class="img-responsive" alt="<?php echo $item->ProductName;?>">
                                                <input type="hidden" name="update_select_product_id" class="select_product_id" value="<?php echo $item->ProductsID;?>">
                                                <input type="hidden" name="update_select_totalvarient" class="select_totalvarient" value="<?php echo $item->totalvarient;?>">
                                                <input type="hidden" name="update_select_iscustomeqty" class="select_iscustomeqty" value="<?php echo $item->is_customqty;?>">
                                                <input type="hidden" name="update_select_product_size" class="select_product_size" value="<?php echo $item->variantid;?>">
                                                <input type="hidden" name="update_select_product_isgroup" class="select_product_isgroup" value="<?php echo $isgroupid;?>">
                                                <input type="hidden" name="update_select_product_cat" class="select_product_cat" value="<?php echo $item->CategoryID;?>">
                                                <input type="hidden" name="update_select_varient_name" class="select_varient_name" value="<?php echo $item->variantName;?>">
                                                <input type="hidden" name="update_select_product_name" class="select_product_name" value="<?php echo $item->ProductName; if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>">
                                                <input type="hidden" name="update_select_product_price" class="select_product_price" value="<?php echo $item->price;?>">
                                                <input type="hidden" name="update_select_addons" class="select_addons" value="<?php echo $getadons;?>">
                                            </div>
                                            <div class="text-center">
                                                <h5>
                                                    <?php echo $item->ProductsID.'-'.$item->ProductName;?>
                                                    <?php 
                                                    if (!empty($item->itemnotes)) {
                                                        echo " -<span class='posShDesc'>" . $item->itemnotes."</span>";
                                                    }
                                                    if (!empty($item->component)) {
                                                        $components = explode(',', $item->component);
                                                        echo '<div class="tag-wrapper">';
                                                        foreach ($components as $comp) {
                                                            echo '<span class="label label-primary" style="margin-right:5px;">' . trim($comp) . '</span>';
                                                        }
                                                        echo '</div>';
                                                    }
                                                    if (!empty($item->price)) {
                                                        echo "<div class='tag-wrapper'><strong>" .(($currency->position == 1) ? $currency->curr_icon : '').$item->price."</strong>";
                                                        echo '</div>';
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
                <?php echo form_open_multipart('ordermanage/order/modifyoreder',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                <div class="col-md-5">
                    <div class="leftSidebarPos">
                        <div class="slimScrollDiv">
                        <input name="url" type="hidden" id="url" value="<?php echo base_url("ordermanage/order/itemlistselect") ?>" />
                    <input name="url" type="hidden" id="addonsurl" value="<?php echo base_url("ordermanage/order/addonsmenu") ?>" />
                    <input name="url" type="hidden" id="updatecarturl" value="<?php echo base_url("ordermanage/order/addtocartupdate") ?>" />
                    <input name="url" type="hidden" id="delurl" value="<?php echo base_url("ordermanage/order/deletetocart") ?>" />
                    <input name="updateid" type="hidden" id="uidupdateid" value="<?php echo $orderinfo->order_id;?>" />
                    <input name="custmercode" type="hidden" id="custmercode" value="<?php echo $customerinfo->cuntomer_no;?>" />
                    <input name="custmername" type="hidden" id="custmername" value="<?php echo $customerinfo->customer_name;?>" />
                    <input name="saleinvoice" type="hidden" id="saleinvoice" value="<?php echo $orderinfo->saleinvoice;?>" />
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="customer_name"><?php echo display('customer_name');?> <span class="color-red">*</span></label>
                            <div class="d-flex">
                                <?php $cusid=1;
                                echo form_dropdown('customer_name',$customerlist,(!empty($orderinfo->customer_id)?$orderinfo->customer_id:null),'class="postform resizeselect form-control" id="customer_name_update" required') ?>
                                <button type="button" class="btn btn-primary ml-l" aria-hidden="true" data-toggle="modal" data-target="#client-info"><i class="ti-plus"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="store_id"><?php echo display('customer_type');?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <?php $ctype=1;
                            echo form_dropdown('ctypeid',$curtomertype,(!empty($orderinfo->cutomertype)?$orderinfo->cutomertype:null),'class="form-control" id="ctypeid_update" required') ?>
                        </div>
                        <div id="nonthirdparty_update" class="col-md-12">
                            <div class="row">
                                <?php if($possetting->waiter==1){?>
                                <div class="col-md-6 form-group">
                                    <label for="store_id"><?php echo display('waiter');?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <?php echo form_dropdown('waiter',$waiterlist,(!empty($orderinfo->waiter_id)?$orderinfo->waiter_id:null),'class="form-control" id="waiter_update" required') ?>
                                </div>
                                <?php }
                                                                                    if($possetting->tableid==1){
                                ?>
                                <div class="col-md-6 form-group" id="tblsec_update display-none">
                                    <label for="store_id"><?php echo display('table');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="color-red">*</span></label>
                                    <?php echo form_dropdown('tableid',$tablelist,(!empty($orderinfo->table_no)?$orderinfo->table_no:null),'class="form-control" id="tableid_update" required') ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="thirdparty_update" class="col-md-12 display-none">
                            <div class="form-group">
                                <label for="store_id"><?php echo display('del_company');?> <span class="color-red">*</span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <?php echo form_dropdown('delivercom',$thirdpartylist,(!empty($orderinfo->isthirdparty)?$orderinfo->isthirdparty:null),'class="form-control wpr_95" id="delivercom_update" required disabled="disabled"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" id="order_date" name="order_date" required value="<?php echo date('d-m-Y')?>" />
                            <input class="form-control" type="hidden" id="bill_info" name="bill_info" required value="<?php echo $billinfo->bill_status;?>" />
                            <input type="hidden" id="card_type" name="card_type" value="<?php echo $billinfo->payment_method_id;?>" />
                            <input type="hidden" id="orderstatus" name="orderstatus" value="<?php echo $orderinfo->order_status;?>" />
                            <input type="hidden" id="assigncard_terminal" name="assigncard_terminal" value="" />
                            <input type="hidden" id="assignbank" name="assignbank" value="" />
                            <input type="hidden" id="assignlastdigit" name="assignlastdigit" value="" />
                            <input type="hidden" id="product_value" name="">
                        </div>
                        
                    </div>
                    <div class="product-list">
                        <div id="updatefoodlist">
                            
                            
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table table-fixed table-bordered table-hover bg-white" id="purchaseTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><?php echo display('item')?> </th>
                                                <th class="text-center" style="display:none;"><?php echo display('varient_name')?></th>
                                                <th class="text-center wp_100"><?php echo display('unit_price')?></th>
                                                <th class="text-center wp_100"><?php echo display('quantity');?></th>
                                                <th class="text-center"><?php echo display('total_price')?></th>
                                                <th class="text-center"><?php echo display('action')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $this->load->model('ordermanage/order_model','ordermodel');
                                            $i=0;
                                            $totalamount=0;
                                            $subtotal=0;
                                            $pvat=0;
                                            $total=$orderinfo->totalamount;
											$pdiscount=0;
											$discount=0;
											$multiplletax = array();
                                            $modEachItemTotal=$modGrandTotal=0;
                                        foreach ($iteminfo as $item){
                                            //print the cart
                                            $cart = $this->cart->contents();
                                            // echo "<pre>";
                                            // print_r($ordered_menu_item_modifiers);
                                            // echo "</pre>";
                                            $modifierHtml='';
                                            if(count($ordered_menu_item_modifiers)>0){
                                                
                                                foreach($ordered_menu_item_modifiers as $modifier){
                                                    if ($modifier->foods_or_mods == 2 && $modifier->menu_id == $item->menu_id) {
                                                        //fetch add_ons details from `add_ons` table [Modifiers]
                                                        $this->db->select('add_ons.*');
                                                        $this->db->from('add_ons');
                                                        $this->db->where('add_ons.add_on_id', $modifier->add_on_id);
                                                        $q = $this->db->get();
                                                        $ordered_modifiers = $q->row();

                                                        // echo "<pre>";
                                                        // print_r($ordered_modifiers);
                                                        // echo "</pre><br> name: ".$ordered_modifiers->add_on_name;

                                                        $cr=($currency->position == 1) ? $currency->curr_icon : '';
                                                        if($q->num_rows() > 0){
                                                            $modifierHtml .= '<small class="modCheck" style="background-color: #f2dede !important;">'.$ordered_modifiers->add_on_name.' '.(($ordered_modifiers->price>0)?$cr.' '.$ordered_modifiers->price:'').'</small> ';
                                                        }
                                                        $modEachItemTotal += $ordered_modifiers->price;
                                                    } 
                                                }
                                            }
                                            //Fetching add-on prices
                                            $this->db->select('SUM(add_ons.price) AS mod_total_price');
                                            $this->db->from('add_ons');
                                            $this->db->join('cart_selected_modifiers', 'cart_selected_modifiers.add_on_id=add_ons.add_on_id');
                                            $this->db->where('cart_selected_modifiers.menu_id', $item->menu_id);
                                            $this->db->where('cart_selected_modifiers.is_active', 1);
                                            $q1 = $this->db->get();
                                            $modTotalPrice = $q1->row();
                                            $i++;
                                            if($item->isgroup==1){
                                                $isgroupidp=1;
                                                $isgroup=$item->menu_id;
                                            }
                                            else{
                                                $isgroupidp=0;
                                                $isgroup=0;
                                                }
                                                if($item->price>0){
                                                $itemprice= $item->price*$item->menuqty;

                                                $itemsingleprice=$item->price;
                                                }
                                                else{
                                                    $itemprice= $item->mprice*$item->menuqty;
                                                    $itemsingleprice=$item->mprice;
                                                    }
                                            $itemprice += $modEachItemTotal;
                                            $iteminfo=$this->ordermodel->getiteminfo($item->menu_id);
                                            $mypdiscountprice =0;
                                            if(!empty($taxinfos)){
                                            $tx=0;
                                            if($iteminfo->OffersRate>0){
                                            $mypdiscountprice=$iteminfo->OffersRate*$itemprice/100;
                                            }
                                            $itemvalprice =  ($itemprice-$mypdiscountprice);
                                            foreach ($taxinfos as $taxinfo)
                                            {
                                            $fildname='tax'.$tx;
                                            if(!empty($iteminfo->$fildname)){
                                            $vatcalc=$itemvalprice*$iteminfo->$fildname/100;
                                            $multiplletax[$fildname] = $multiplletax[$fildname]+$vatcalc;
                                            }
                                            else{
                                            $vatcalc=$itemvalprice*$taxinfo['default_value']/100;
                                            $multiplletax[$fildname] = $multiplletax[$fildname]+$vatcalc;
                                            }
                                            $pvat=$pvat+$vatcalc;
                                            $vatcalc =0;
                                            $tx++;
                                            }
                                            }
                                            else{
                                            $vatcalc=$itemprice*$iteminfo->productvat/100;
                                            $pvat=$pvat+$vatcalc;
                                            }
                                            if($iteminfo->OffersRate>0){
                                                $mypdiscount=$iteminfo->OffersRate*$itemprice/100;
                                                $pdiscount=$pdiscount+($iteminfo->OffersRate*$itemprice/100);
                                                }
                                            else{
                                                $mypdiscount=0;
                                                $pdiscount=$pdiscount+0;
                                            }
                                            $adonsprice=0;
                                            if(!empty($item->add_on_id)){
                                            $addons=explode(",",$item->add_on_id);
                                            $addonsqty=explode(",",$item->addonsqty);
                                            $text='&nbsp;&nbsp;<a class="text-right adonsmore" onclick="expand('.$i.')">More..</a>';
                                            $x=0;
                                            foreach($addons as $addonsid){
                                            $adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
                                            $adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
                                            $x++;
                                            }
                                            $nittotal=$adonsprice;
                                            $itemprice=$itemprice;
                                            }
                                            else{
                                            $nittotal=0;
                                            $text='';
                                            }
                                            $totalamount=$totalamount+$nittotal;
                                            $modGrandTotal += $modEachItemTotal;
                                            $subtotal=$subtotal+$nittotal+$itemsingleprice*$item->menuqty+$modGrandTotal;

                                            //Fetching modifier groups information from the database
                                            $this->db->select('modifier_groups.*,menu_add_on.*');
                                            $this->db->from('modifier_groups');
                                            $this->db->join('menu_add_on', 'modifier_groups.id=menu_add_on.modifier_groupid', 'inner');
                                            $this->db->where('menu_add_on.menu_id', $item->menu_id);
                                            $this->db->where('menu_add_on.is_active', 1);
                                            $query = $this->db->get();
                                            $modifiers = $query->result();

                                            //last query for debugging
                                            // echo $this->db->last_query();
                                            // exit;
                                            // echo "<pre>";
                                            // print_r($modifiers);
                                            // echo "</pre><br />Item Info: <br /><pre>";
                                            // print_r($item);
                                            // echo "</pre>";
                                            ?>
                                            <tr>
                                                <td style="text-align:left;">
                                                    <?php echo $item->ProductName;?><?php echo $text;?> 
                                                    <a class="serach pl-15" onclick="itemnote('<?php echo $item->row_id;?>','<?php echo $item->notes;?>',<?php echo $item->order_id;?>,1,<?php echo $isgroup;?>)" title="<?php echo display('foodnote') ?>"> <i class="fa fa-sticky-note" aria-hidden="true"></i> </a>
                                                    <?php 
                                                    if (count($modifiers) > 0):

                                                        $this->db->select('add_ons.add_on_name, add_ons.price, ordered_menu_item_modifiers.menu_id, add_ons.add_on_id, add_ons.modifier_id');
                                                        $this->db->from('add_ons');
                                                        $this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=add_ons.add_on_id');
                                                        $this->db->where('ordered_menu_item_modifiers.menu_id',$item->menu_id);
                                                        $this->db->where('ordered_menu_item_modifiers.foods_or_mods', 2);
                                                        $this->db->where('ordered_menu_item_modifiers.is_active', 1);
                                                        $this->db->where('ordered_menu_item_modifiers.meal_deal_id', 0);
                                                        $this->db->where('ordered_menu_item_modifiers.order_id', $order_id);
                                                        $this->db->where('DATE(ordered_menu_item_modifiers.created_at)',date('Y-m-d'));
                                                        $q1 = $this->db->get();
                                                        $selectedModsForCart = $q1->result();

                                                        $this->db->select('item_foods.ProductName AS food_name');
                                                        $this->db->from('item_foods');
                                                        $this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=item_foods.ProductsID');
                                                        $this->db->where('ordered_menu_item_modifiers.menu_id',$item->menu_id);
                                                        $this->db->where('ordered_menu_item_modifiers.foods_or_mods', 2);
                                                        $this->db->where('ordered_menu_item_modifiers.is_active', 1);
                                                        $this->db->where('ordered_menu_item_modifiers.meal_deal_id', 0);
                                                        $this->db->where('ordered_menu_item_modifiers.order_id', $order_id);
                                                        $this->db->where('DATE(ordered_menu_item_modifiers.created_at)',date('Y-m-d'));
                                                        $q2 = $this->db->get();
                                                        $selectedFoodsForCart = $q2->result();
                                                    ?>
                                                    <!-- <br /> -->
                                              <a class="cartModToggle" id="cartModToggle_update_<?=$item->menu_id;?>" onclick="itemModifiers(<?= $item->menu_id; ?>,'<?= $item->rowid; ?>')" title="Click to Choose Modifiers" >
                                              <?php 
                                              if(($q1->num_rows() <= 0) || ($q2->num_rows() <= 0) && (count($modifiers) == 0)):
                                                // if(count($selectedModsForCart) == 0):
                                              ?>
                                              <small class="modCheck posAddMod" id="cartModToggle_<?=$item->menu_id; ?>">+ Modifiers <?php if ($modTotalPrice->mod_total_price > 0): ?>(<?= (($currency->position == 1) ? $currency->curr_icon : '') . ' ' . $modTotalPrice->mod_total_price; ?>) <?php endif; ?></small>
                                              <?php endif; ?>
                                                <?php

                                                // echo $this->db->last_query();
                                                // echo "<pre>";
                                                // print_r($selectedModsForCart);
                                                // echo "</pre>";
                                                if (count($selectedFoodsForCart)>0):
                                                  foreach ($selectedFoodsForCart as $smk => $smv):
                                                ?>
                                                        <!-- <br /> -->
                                                        <!-- <small class="modCheck" style="background-color: #dff0d8 !important;"><?=$smv->food_name;?></small> -->
                                                <?php
                                                  endforeach;
                                                endif;
                                                if (count($selectedModsForCart)>0):
                                                //   echo "<br />";
                                                  foreach ($selectedModsForCart as $smk => $smv):
                                                    if($smv->foods_or_mods == 1):
                                                        $smv->add_on_name = $smv->add_on_name;
                                                ?>
                                                        <!-- <br /> -->
                                                        <small class="modCheck"><?=$smv->add_on_name;?><?php if($smv->price > 0): ?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)<?php endif; ?></small>
                                                <?php 
                                                    else:
                                                        $smv->add_on_name = $smv->add_on_name;
                                                ?>
                                                        <!-- <br /> -->
                                                        <small class="modCheck"><?=$smv->add_on_name;?><?php if($smv->price > 0): ?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$smv->price;?>)<?php endif; ?></small>
                                                <?php
                                                        $this->db->select('add_ons.add_on_name, add_ons.price, add_ons.add_on_id, ordered_menu_item_modifiers.modifier_groupid, ordered_menu_item_modifiers.menu_id, ordered_menu_item_modifiers.meal_deal_id');
                                                        $this->db->from('add_ons');
                                                        $this->db->join('ordered_menu_item_modifiers', 'ordered_menu_item_modifiers.add_on_id=add_ons.add_on_id');
                                                        // $this->db->where('ordered_menu_item_modifiers.menu_id',$pid);
                                                        $this->db->where('ordered_menu_item_modifiers.foods_or_mods', 1);
                                                        $this->db->where('ordered_menu_item_modifiers.is_active', 1);
                                                        $this->db->where('ordered_menu_item_modifiers.meal_deal_id', $item->menu_id);
                                                        $this->db->where('ordered_menu_item_modifiers.order_id', $order_id);
                                                        // $this->db->where('ordered_menu_item_modifiers.add_on_id', $smv->menu_id);
                                                        $this->db->where('DATE(ordered_menu_item_modifiers.created_at)',date('Y-m-d'));
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
                                                                <small class="modCheck selectedDealSubMods"><?=$smv->add_on_name;?><?php if($sdm->price>0):?> (<?=(($currency->position == 1)?$currency->curr_icon:'').' '.$sdm->price;?>)<?php endif; ?></small>
                                                        <?php
                                                                endif;
                                                                endforeach;
                                                            echo "</div>";
                                                            endif;
                                                      endif;
                                                  endforeach;
                                                endif;
                                                // echo $modifierHtml;
                                                ?>
                                              </a>
                                              <?php endif; ?>
                                                </td>
                                                <td style="display:none;">
                                                    <?php echo $item->variantName;?>
                                                </td>
                                                <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $itemsingleprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                                <td class="text-right"><a class="btn btn-danger btn-sm btnrightalign" onclick="positemupdate('<?php echo $item->menu_id?>',<?php echo $item->menuqty;?>,'<?php echo $item->order_id;?>','<?php echo $item->varientid?>','<?php echo $isgroupidp;?>','<?php echo $item->addonsuid?>','del')"><i class="fa fa-minus" aria-hidden="true"></i></a><input class="exists_qty" type="hidden" name="select_qty_<?php echo $item->menu_id?>" id="select_qty_<?php echo $item->menu_id?>_<?php echo $item->varientid?>" value="<?php echo $item->menuqty;?>"> <span id="productionsetting-update-<?php echo $item->menu_id.'-'.$item->varientid ?>"><?php echo number_format($item->menuqty,3);?> </span> <a class="btn btn-info btn-sm btnleftalign" onclick="positemupdate('<?php echo $item->menu_id?>',<?php echo $item->menuqty;?>,'<?php echo $item->order_id;?>','<?php echo $item->varientid?>','<?php echo $isgroupidp;?>','<?php echo $item->addonsuid?>','add')"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                                <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo number_format($itemprice-$mypdiscount,3);?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                                <td class="text-right"><?php if($orderinfo->order_status!=4){?><a class="btn btn-danger btn-sm btnrightalign" onclick="deletecart(<?php echo $item->row_id;?>,<?php echo $item->order_id;?>,<?php echo $item->menu_id?>,<?php echo $item->varientid?>,<?php echo $item->menuqty;?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?></td>
                                            </tr>
                                            <?php
                                            if(!empty($item->add_on_id)){
                                            $y=0;
                                            foreach($addons as $addonsid){
                                            $adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
                                            $adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$y];
                                                                                                /*for adonsval cal*/
                                                                                                if(!empty($taxinfos)){
                                                                                                            $tax=0;
                                                                                                
                                                                                                foreach ($taxinfos as $taxainfo)
                                                                                                {
                                                        
                                                                                                    $fildaname='tax'.$tax;
                                                        
                                                                                                if(!empty($adonsinfo->$fildaname)){
                                                                                            
                                                                                                $avatcalc=($adonsinfo->price*$addonsqty[$y])*($adonsinfo->$fildaname)/100;
                                                                                                $multiplletax[$fildaname] = $multiplletax[$fildaname]+$avatcalc;
                                                                                                
                                                                                                }
                                                                                                else{
                                                                                                $avatcalc=($adonsinfo->price*$addonsqty[$y])*$taxainfo['default_value']/100;
                                                                                                $multiplletax[$fildaname] = $multiplletax[$fildaname]+$avatcalc;
                                                                                                }
                                                        
                                                                                            $pvat=$pvat+$avatcalc;
                                                                                            
                                                                                            $avatcalc=0;
                                                                                                    $tax++;
                                                                                                }
                                                                                            }
                                                                                            /*adonse update val cal*/
                                            ?>
                                            <tr class="bg-deep-purple get_<?php echo $i;?> hasaddons" id="expandcol_<?php echo $i;?>">
                                                <td colspan="2">
                                                    <?php echo $adonsinfo->add_on_name;?>
                                                </td>
                                                <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </td>
                                                <td class="text-right"><?php echo $addonsqty[$y];?></td>
                                                <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $adonsinfo->price*$addonsqty[$y];?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                                <td class="text-right">&nbsp;</td>
                                            </tr>
                                            <?php $y++;
                                            }
                                            }
                                            }
                                            $itemtotal=$subtotal;
                                      
                                            if(empty($taxinfos)){
                                            if($settinginfo->vat>0 ){
                                            $calvat=($itemtotal-$pdiscount)*$settinginfo->vat/100;
                                            }
                                            else{
                                            $calvat=$pvat;
                                            }
                                            }
                                            else{
                                            $calvat=$pvat;
                                            }
                                                                                $multiplletaxvalue=htmlentities(serialize($multiplletax));
                                            ?>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong><?php echo display('subtotal')?></strong></td>
                                                <td class="text-right"><strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo number_format($itemtotal-$pdiscount,3);?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                        
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <input name="subtotal" id="subtotal_update" type="hidden" value="<?php echo $subtotal;?>" />
                            <input name="multiplletaxvalue" id="multiplletaxvalue_update" type="hidden" value="<?php echo $multiplletaxvalue;?>" />                           
                            <?php $servicecharge=0;
                            if(empty($billinfo)){
                            $servicecharge=0;
                            }
                            else{
                            if($settinginfo->service_chargeType==0){
                            $servicecharge=$settinginfo->servicecharge;
                            }
                            else{
								$totalsercharge=$subtotal-$pdiscount;
								$servicecharge=$settinginfo->servicecharge*$totalsercharge/100;
                            }
                            $sdamount=$settinginfo->service_charge;
                            }
                            ?>
                            <?php $discount=0;
                                                        $customerinfo=$this->ordermodel->read('*', 'customer_info', array('customer_id' =>$billinfo->customer_id));
                                                        $mtype=$this->order_model->read('*', 'membership', array('id' => $customerinfo->membership_type));
                            if(empty($billinfo)){
                            $discount=$pdiscount;
                            }
                            else{
                                                                                $newsubtotal=$subtotal-$pdiscount;
                                                                                $discount=$pdiscount+($mtype->discount*$newsubtotal/100);
                            $disamount=$billinfo->discount;
                            }
                            
                            ?>
                            <input name="distype" id="distype_update" type="hidden" value="<?php echo $settinginfo->discount_type;?>" />
                            <input name="sdtype" id="sdtype_update" type="hidden" value="<?php echo $settinginfo->service_chargeType;?>" />
                            <input name="invoice_discount" class="text-right" id="invoice_discount_update" type="hidden" value="<?php echo $discount;?>" />
                            <table class="table table-bordered bg-white">
                                
                                <tr>
                                    <td class="text-right wpr_494"><strong><?php echo display('service_chrg')?><?php if($settinginfo->service_chargeType==0){ echo "(".$currency->curr_icon.")";}else{ echo "(%)";}?></strong></td>
                                    <td class="text-right wpr_28">
                                        <strong>
                                        <input name="service_charge" class="text-right" id="service_charge_update" type="number" placeholder="0.00" onkeyup="sumcalculation(1)" value="<?php echo $settinginfo->servicecharge;?>" />
                                        
                                        </strong>
                                    </td>
                                    <td class="text-right wpr_126">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-right wpr_494"><strong><?php echo display('vat_tax')?></strong></td>
                                    <td class="text-right wpr_28"><input id="vat_update" name="vat" type="hidden" value="<?php echo $calvat;?>" />
                                    <strong><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo number_format($calvat,3);?> <?php if($currency->position==2){echo $currency->curr_icon;}?> </strong>
                                </td>
                                <td class="text-right wpr_126">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-right wpr_494"><strong><?php echo display('grand_total')?></strong></td>
                                <td class="text-right wpr_28"><input name="vat" id="tvat" type="hidden" value="<?php echo $calvat;?>" />
                                <input name="tgtotal" type="hidden" value="<?php echo $calvat+$itemtotal+$servicecharge-$discount;?>" id="tgtotal" />
                                <input name="orginattotal" id="orginattotal_update" type="hidden" value="<?php echo $calvat+$itemtotal+$servicecharge-$discount;?>" /><input name="grandtotal" id="grandtotal_update" type="hidden" value="<?php echo $calvat+$itemtotal+$servicecharge-$discount;?>" /><?php if($currency->position==1){echo $currency->curr_icon;}?> <strong id="gtotal_update"><?php
								$isvatinclusive=$this->db->select("*")->from('setting')->get()->row();
							 if($isvatinclusive->isvatinclusive==1){
								echo number_format($itemtotal+$servicecharge-$discount,3);
							 }else{
								echo number_format($calvat+$itemtotal+$servicecharge-$discount,3); 
							 } 
							 ?>
                                </strong> <?php if($currency->position==2){echo $currency->curr_icon;}?>
                            </td>
                            <td class="text-right wpr_126">&nbsp;</td>
                        </tr>
                        
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixedclasspos">
            <div class="bottomarea">
                <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <!-- <div class="d-flex justify-content-right"> -->
                            <input name="getuv" id="uvchange" type="hidden" value="0" />
                            <input type="button" id="update_order_confirm" onclick="postupdateorder_ajax()" class="btn btn-success btn-large cusbtn" name="add-payment" value="Order Update">
                            <!-- </div> -->
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('ordermanage/order/possettingjs') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('ordermanage/order/updateorderjs/'.$orderinfo->order_id) ?>" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/posupdate.js'); ?>" type="text/javascript"></script>