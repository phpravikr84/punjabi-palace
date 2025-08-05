<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Include Bootstrap 3 CSS and JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background: #f5f5f5;
    }
    .panel {
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .panel-body {
        padding: 15px;
    }
    .grid {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }
    .grid-col {
        padding: 10px;
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
    }
    .grid-item-content {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 12px;
        transition: box-shadow 0.2s;
    }
    .grid-item-content:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .food_item.pending {
        background: #fff3cd;
    }
    .food_item_top {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 10px;
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }
    .item_inner {
        flex: 1;
        min-width: 120px;
        margin: 5px;
    }
    .kf_info {
        font-size: 13px;
        margin: 3px 0;
        font-weight: 500;
        color: #333;
    }
    .cooking_time {
        font-size: 13px;
        text-align: center;
        padding: 8px;
        color: #dc3545;
        font-weight: 600;
    }
    .food_select {
        padding: 12px;
    }
    .category-section {
        margin: 12px 0;
    }
    .category-title {
        font-size: 15px;
        font-weight: 600;
        color: #007bff;
        padding-bottom: 6px;
        border-bottom: 2px solid #007bff;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    .single_item {
        padding: 8px 0;
        border-bottom: 1px solid #e9ecef;
    }
    .item-dv {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .item-span {
        font-size: 12px;
        color: #666;
    }
    .quantity {
        font-size: 13px;
        font-weight: 600;
        min-width: 50px;
        text-align: right;
    }
    .bgkitchen {
        background: #ffe6e6;
        padding: 8px;
        border-radius: 4px;
    }
    .radio-shape {
        margin-right: 8px;
    }
    .btn-success {
        padding: 6px 12px;
        font-size: 13px;
    }
    .text-success {
        font-size: 12px;
        font-weight: bold;
    }
    .modal-content {
        border-radius: 6px;
    }
    .modal-header {
        background: #007bff;
        color: #fff;
    }
    .no-items {
        font-size: 13px;
        color: #666;
        padding: 8px;
    }
    @media (max-width: 992px) {
        .grid-col {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .kf_info {
            font-size: 12px;
        }
    }
    @media (max-width: 768px) {
        .grid-col {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .item_inner {
            min-width: 100%;
        }
        .btn-success {
            font-size: 12px;
            padding: 5px 10px;
        }
    }
</style>

<div id="cancelord" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <strong><?php echo display('can_ord');?></strong>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label for="payments" class="col-sm-4 col-form-label"><?php echo display('ordid');?></label>
                                    <div class="col-sm-7 customesl">
                                        <span id="canordid"></span>
                                        <input name="mycanorder" id="mycanorder" type="hidden" value="" />
                                        <input name="mycanitem" id="mycanitem" type="hidden" value="" />
                                        <input name="myvarient" id="myvarient" type="hidden" value=""/>
                                        <input name="mykid" id="mykid" type="hidden" value=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="canreason" class="col-sm-4 col-form-label"><?php echo display('can_reason');?></label>
                                    <div class="col-sm-7 customesl">
                                        <textarea name="canreason" id="canreason" cols="35" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <div class="col-sm-11 pr-0">
                                        <button type="button" class="btn btn-success w-md m-b-5" id="itemcancel"><?php echo display('submit');?></button>
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

<div class="row">
    <div class="panel">
        <div class="panel-body">
            <div class="text-right">
                <a class="display-none" id="fullscreen" href="#"><i class="pe-7s-expand1"></i></a>
                <a href="<?php echo base_url();?>ordermanage/order/allkitchen" class="btn btn-primary btn-md">
                    <i class="fa fa-load-circle" aria-hidden="true"></i> <?php echo display('ref_page');?>
                </a>
            </div>
            <div class="row kitchen-tab">
                <div class="col-sm-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills">
                        <?php $x=0;
                        foreach($kitchenslist as $kitchen){
                            $x++;
                        ?>
                        <li class="<?php if($x==1){echo "active";}?>"><a href="#tab<?php echo $x; ?>" data-toggle="tab"><?php echo $kitchen->kitchen_name;?></a></li>
                        <?php } ?>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <?php 
                        $this->load->model('ordermanage/order_model', 'ordermodel');
                        if(!empty($kitcheninfo)){
                            $k=0;
                            foreach($kitcheninfo as $kitchenorderinfo){
                                $k++;
                                ?>
                                <div class="tab-pane fade <?php if($k==1){echo "in active";}?>" id="tab<?php echo $k;?>">
                                    <div class="panel-body">
                                        <div class="grid">
                                            <div class="grid-sizer col-vxs-12 col-xs-6 col-md-4 col-lg-3 col-xlg-4"></div>
                                            <?php if(!empty($kitchenorderinfo['orderlist'])){
                                                $t=0;
                                                foreach($kitchenorderinfo['orderlist'] as $orderinfo){
                                                    $t++;
                                                    ?>
                                                    <div class="grid-col col-vxs-12 col-xs-6 col-md-4 col-lg-3 col-xlg-4" id="singlegrid<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                                                        <div class="grid-item-content" id="gridcontent<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                                                            <?php 
                                                            $alliteminfo = $this->order_model->customerorderkitchen($orderinfo->order_id, $orderinfo->kitchenid);
                                                            // Debug: Check $alliteminfo
                                                            // echo '<pre>'; print_r($alliteminfo); echo '</pre>'; // Uncomment to debug
                                                            $allcancelitem = $this->ordermodel->customercancelkitchen($orderinfo->order_id, $orderinfo->kitchenid);
                                                            $allchecked2 = "";
                                                            $date_arr = array();
                                                            $c = 0;
                                                            foreach($alliteminfo as $single){
                                                                $date_arr[$c] = $single->cookedtime;
                                                                $allisexit = $this->db->select('tbl_kitchen_order.*')
                                                                    ->from('tbl_kitchen_order')
                                                                    ->where('orderid', $orderinfo->order_id)
                                                                    ->where('kitchenid', $orderinfo->kitchenid)
                                                                    ->where('itemid', $single->menu_id)
                                                                    ->where('varient', $single->variantid)
                                                                    ->get()
                                                                    ->num_rows();
                                                                $allchecked2 .= ($allisexit > 0) ? "1," : "0,";
                                                                $c++;
                                                            }
                                                            $isaccept = (strpos($allchecked2, '0') !== false) ? 0 : 1;
                                                            ?>
                                                            <div class="food_item <?php if($isaccept==0){ echo "pending";}?>" id="topsec<?php echo $orderinfo->order_id.$orderinfo->kitchenid;?>">
                                                                <div class="food_item_top">
                                                                    <div class="item_inner">
                                                                        <h4 class="kf_info"><?php echo display('table') ?>: <?php echo $orderinfo->tablename;?></h4>
                                                                        <h4 class="kf_info"><?php echo $orderinfo->first_name.' '.$orderinfo->last_name;?></h4>
                                                                    </div>
                                                                    <div class="item_inner">
                                                                        <h4 class="kf_info"><?php echo display('tok') ?>: <?php echo $orderinfo->tokenno;?></h4>
                                                                        <h4 class="kf_info"><?php echo display('ord') ?>: #<?php echo $orderinfo->order_id;?></h4>
                                                                    </div>
                                                                    <div class="item_inner">
                                                                        <h4 class="kf_info"><?php echo display('customer_name') ?>: <?php echo $orderinfo->customer_name;?></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="cooking_time">
                                                                    <?php 
                                                                    $st = 1;
                                                                    $curtime = date("i");
                                                                    $currentday = date('Y-m-d');
                                                                    $actualtime = date('H:i:s');
                                                                    $sortactualtime = strtotime($actualtime);
                                                                    $cookedtime = strtotime(max($date_arr)); 
                                                                    $ordertime = strtotime($orderinfo->order_time); 
                                                                    $estimatedtime = $ordertime + $cookedtime - strtotime('00:00:00');
                                                                    
                                                                    if(($currentday == $orderinfo->order_date) && ($sortactualtime < $estimatedtime)){
                                                                        $finishtime = date("H:i:s", $estimatedtime);
                                                                        $array1 = explode(':', $finishtime);
                                                                        $array2 = explode(':', $actualtime);
                                                                        $minutes1 = ($array1[0] * 3600.0 + $array1[1]*60.0 + $array1[2]);
                                                                        $minutes2 = ($array2[0] * 3600.0 + $array2[1]*60.0 + $array2[2]);
                                                                        $diff = $minutes1 - $minutes2;
                                                                        $mins = sprintf('%02d:%02d:%02d', ($diff / 3600), ($diff / 60 % 60), $diff % 60);
                                                                        $st = 1;
                                                                        ?>
                                                                        <script>
                                                                            var timer<?php echo $orderinfo->order_id;echo $c;?> = "<?php echo $mins;?>";
                                                                            var interval<?php echo $orderinfo->order_id;echo $c;?> = setInterval(function() {
                                                                                var timer = timer<?php echo $orderinfo->order_id;echo $c;?>.split(':');
                                                                                var hours = parseInt(timer[0], 10);
                                                                                var minutes = parseInt(timer[1], 10);
                                                                                var seconds = parseInt(timer[2], 10);
                                                                                --seconds;
                                                                                hours = (minutes < 0) ? --hours : hours;
                                                                                minutes = (seconds < 0) ? --minutes : minutes;
                                                                                seconds = (seconds < 0) ? 59 : seconds;
                                                                                seconds = (seconds < 10) ? '0' + seconds : seconds;
                                                                                $('.countdown_<?php echo $orderinfo->order_id;echo $c;?>').html(hours+':'+minutes + ':' + seconds);
                                                                                if (minutes < 0) clearInterval(interval<?php echo $orderinfo->order_id;echo $c;?>);
                                                                                if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval<?php echo $orderinfo->order_id;echo $c;?>);
                                                                                timer<?php echo $orderinfo->order_id;echo $c;?> = hours+':'+minutes + ':' + seconds;
                                                                            }, 1000);
                                                                        </script>
                                                                        <span class="countdown_<?php echo $orderinfo->order_id;echo $c;?>"></span>
                                                                    <?php } else {
                                                                        $st = 0;
                                                                        ?>
                                                                        <span><?php echo display('time_over');?></span>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="food_select" id="acceptitem<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>">
                                                                    <?php
                                                                    $categories = [
                                                                         5 => 'Starters',
                                                                        3 => 'Main Course',
                                                                        15 => 'Bread',
                                                                        11 => 'Rice',
                                                                        17 => 'Desserts'
                                                                    ];
                                                                    $items_by_category = [];
                                                                    if (!empty($alliteminfo)) {
                                                                        foreach($alliteminfo as $item){
                                                                            $category_id = isset($item->CategoryID) ? $item->CategoryID : 0;
                                                                            $category_name = isset($categories[$category_id]) ? $categories[$category_id] : 'Other';
                                                                            $items_by_category[$category_name][] = $item;
                                                                        }
                                                                    }
                                                                    // Debug: Check $items_by_category
                                                                    // echo '<pre>'; print_r($items_by_category); echo '</pre>'; // Uncomment to debug
                                                                    $display_order = ['Starters', 'Main Course', 'Bread', 'Rice', 'Desserts'];
                                                                    foreach($display_order as $cat_name){
                                                                        ?>
                                                                        <div class="category-section">
                                                                            <div class="category-title"><?php echo $cat_name; ?></div>
                                                                            <?php
                                                                            if (!empty($items_by_category[$cat_name])) {
                                                                                $l = 0;
                                                                                foreach($items_by_category[$cat_name] as $item){
                                                                                    $l++;
                                                                                    $ischecked = $this->db->select('tbl_kitchen_order.*')
                                                                                        ->from('tbl_kitchen_order')
                                                                                        ->where('orderid', $orderinfo->order_id)
                                                                                        ->where('kitchenid', $orderinfo->kitchenid)
                                                                                        ->where('itemid', $item->menu_id)
                                                                                        ->where('varient', $item->variantid)
                                                                                        ->get()
                                                                                        ->num_rows();
                                                                                    ?>
                                                                                    <div class="single_item">
                                                                                        <div class="item-dv">
                                                                                            <input id='chkbox-<?php echo $l . $item->kitchenid . $orderinfo->order_id; ?>'
                                                                                                usemap="<?php echo $orderinfo->order_id; ?>"
                                                                                                title="<?php echo $item->variantid; ?>"
                                                                                                alt="<?php echo $isaccept; ?>"
                                                                                                type='checkbox'
                                                                                                <?php 
                                                                                                    if($ischecked == 1 && $isaccept == 0){ echo "checked disabled"; } 
                                                                                                    if($isaccept == 1 && $item->food_status == 1){ echo "checked"; }
                                                                                                ?>
                                                                                                class="individual"
                                                                                                name="item<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>"
                                                                                                value="<?php echo $item->menu_id; ?>" />
                                                                                            <label for='chkbox-<?php echo $l . $item->kitchenid . $orderinfo->order_id; ?>'>
                                                                                                <span class="radio-shape"><i class="fa fa-check"></i></span>
                                                                                                <div>
                                                                                                    <span class="display-block"><?php echo $item->ProductName; ?></span>
                                                                                                    <?php if(!empty($item->variantid)){ ?>
                                                                                                        <span class="item-span"><?php echo $item->variantName; ?></span>
                                                                                                    <?php } ?>
                                                                                                </div>
                                                                                            </label>
                                                                                            <h4 class="quantity"><?php echo $item->menuqty; ?>x</h4>
                                                                                        </div>
                                                                                        <?php if(!empty($item->add_on_id)){
                                                                                            $addons = explode(",", $item->add_on_id);
                                                                                            $addonsqty = explode(",", $item->addonsqty);
                                                                                            $p = 0;
                                                                                            ?>
                                                                                            <div>
                                                                                                <?php 
                                                                                                foreach($addons as $addonsid){
                                                                                                    $adonsinfo = $this->ordermodel->read('*', 'add_ons', array('add_on_id' => $addonsid));
                                                                                                    echo !empty($adonsinfo) ? $adonsinfo->add_on_name . " (" . $addonsqty[$p] . "), " : '';
                                                                                                    $p++;
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                        <?php if(!empty($item->notes)){ ?>
                                                                                            <div><strong>Notes:</strong> <?php echo $item->notes; ?></div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <div class="no-items">No items in this category</div>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if(!empty($allcancelitem)){
                                                                        ?>
                                                                        <div class="category-section">
                                                                            <div class="category-title">Cancelled Items</div>
                                                                            <?php
                                                                            foreach($allcancelitem as $cancelitem){
                                                                                ?>
                                                                                <div class="single_item bgkitchen">
                                                                                    <div class="item-dv">
                                                                                        <div>
                                                                                            <h4 class="quantity"><?php echo $cancelitem->ProductName; ?></h4>
                                                                                            <span class="item-span"><?php echo $cancelitem->variantName; ?></span>
                                                                                        </div>
                                                                                        <h4 class="quantity"><?php echo $cancelitem->quantity; ?>x</h4>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (empty($alliteminfo) && empty($allcancelitem)) { ?>
                                                                        <div class="no-items">No items found for this order</div>
                                                                    <?php } ?>
                                                                    <div class="align-center justify-between">
                                                                        <div class="checkAll">
                                                                            <input id='allSelect<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>'
                                                                                name="item<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>"
                                                                                type='checkbox' class="selectall" value=""/>
                                                                            <label for='allSelect<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>'>
                                                                                <span class="radio-shape"><i class="fa fa-check"></i></span>
                                                                                <?php echo display('all'); ?>
                                                                            </label>
                                                                        </div>
                                                                        <?php if($user_is_waiter && $isaccept == 1): ?>
                                                                            <div class="display-block" id="isprepare<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>">
                                                                                <button class="btn btn-success w-smd lh-30"
                                                                                        onclick="onprepare(<?php echo $orderinfo->order_id; ?>, <?php echo $orderinfo->kitchenid; ?>)">
                                                                                    <?php echo 'Pickup'; ?>
                                                                                </button>
                                                                                <p class="text-success" style="margin-top:10px; font-weight:800;">Ready to pickup.</p>
                                                                            </div>
                                                                        <?php elseif($user_is_waiter && $isaccept == 0): ?>
                                                                            <div class="display-block" id="isprepare<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>">
                                                                                <small><img src="<?php echo base_url('assets/img/pot.gif'); ?>" width="40" alt="Pot Image"></small>
                                                                            </div>
                                                                        <?php elseif(!$user_is_waiter && $isaccept == 0): ?>
                                                                            <div class="display-block" id="isongoing<?php echo $orderinfo->order_id . $orderinfo->kitchenid; ?>">
                                                                                <button class="btn btn-success lh-30"
                                                                                        onclick="orderaccept(<?php echo $orderinfo->order_id; ?>, <?php echo $orderinfo->kitchenid; ?>)">
                                                                                    <?php echo 'Ready to Pickup'; ?>
                                                                                </button>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                }
                                                if(empty($kitchenorderinfo['orderlist'])){                                    
                                                    echo '<div class="col-sm-12"><div style="text-align: center;"><h3>'.display('no_orderfound').'</h3> <img src="'.base_url().'assets/img/nofood.png" width="400" /></div></div>';
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-warning" id="posprint" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="kotenpr"></div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('application/modules/ordermanage/assets/js/kitchen.js'); ?>" type="text/javascript"></script>