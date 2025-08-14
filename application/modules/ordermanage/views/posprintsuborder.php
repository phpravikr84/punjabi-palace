<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Print Invoice</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @page {
            size: auto;
            margin: 1mm;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 8px;
            line-height: 1.1;
            width: 210px; /* For 58mm (2-inch) thermal printer at 96 DPI; use 432px for 203 DPI */
            background: #fff;
            color: #000;
        }
        .invoice-card {
            width: 100%;
            padding: 3px;
        }
        .invoice-head {
            text-align: center;
            margin-bottom: 5px;
        }
        .invoice-head img {
            max-width: 80px;
            margin-bottom: 3px;
        }
        .invoice-head h4, .invoice-address h5, .invoice-footer h5 {
            margin: 1px 0;
            font-size: 10px;
            font-weight: bold;
        }
        .invoice-details {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            margin: 3px 0;
        }
        .invoice-list {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-title {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            padding: 3px 0;
        }
        .invoice-title .heading {
            flex: 1;
            text-align: left;
            font-size: 9px;
        }
        .invoice-title .heading:nth-child(2) {
            text-align: center;
        }
        .invoice-title .heading:last-child {
            text-align: right;
        }
        .row-data {
            display: flex;
            justify-content: space-between;
            padding: 2px 0;
            border-bottom: 1px dashed #000;
        }
        .row-data:last-child {
            border-bottom: none;
        }
        .item-info {
            flex: 1;
            text-align: left;
        }
        .item-info h5, .item-info p {
            margin: 0;
            font-size: 8px;
        }
        .item-qty, .item-total {
            width: 40px;
            text-align: center;
            font-size: 8px;
        }
        .item-total {
            text-align: right;
        }
        .invoice-footer {
            margin-top: 5px;
        }
        .row-data.border-top {
            border-top: 1px dashed #000;
            padding-top: 3px;
        }
        .text-center {
            text-align: center;
        }
        .b_top {
            border-top: 1px dashed #000;
            padding-top: 3px;
        }
    </style>
</head>
<body>
    <div class="invoice-card">
        <div class="invoice-head">
            <img src="<?php echo base_url(); ?><?php echo $storeinfo->logo ?>" alt="Logo">
            <h4><?php echo $storeinfo->storename; ?></h4>
            <p><?php echo $storeinfo->address; ?></p>
        </div>
        <div class="invoice-address">
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo display('date'); ?>: <?php echo date("M d, Y", strtotime($billinfo->bill_date)); ?></h5>
                </div>
                <?php if ($storeinfo->isvatnumshow == 1) { ?>
                    <h5><?php echo display('tinvat'); ?>: <?php echo $storeinfo->vattinno; ?></h5>
                <?php } ?>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">
                    <h4 class="heading"><?php echo display('item'); ?></h4>
                    <h4 class="heading"><?php echo 'Qty'; ?></h4>
                    <h4 class="heading"><?php echo display('total'); ?></h4>
                </div>
                <div class="invoice-data">
                    <?php
                    $totalamount = 0;
                    $subtotal = 0;
                    $pdiscount = 0;
                    $total = $orderinfo->total_price;
                    $vat = $orderinfo->vat;
                    $servicecharge = $orderinfo->s_charge;
                    $alldiscount = $orderinfo->discount;

                    foreach ($iteminfo as $item) {
                        $isoffer = $this->order_model->read('*', 'order_menu', array('row_id' => $item->row_id));
                        if ($isoffer->isgroup == 1) {
                            $this->db->select('order_menu.*,item_foods.ProductName,item_foods.OffersRate,variant.variantid,variant.variantName,variant.price');
                            $this->db->from('order_menu');
                            $this->db->join('item_foods', 'order_menu.groupmid=item_foods.ProductsID', 'left');
                            $this->db->join('variant', 'order_menu.groupvarient=variant.variantid', 'left');
                            $this->db->where('order_menu.row_id', $item->row_id);
                            $query = $this->db->get();
                            $orderinfo_item = $query->row();
                            $item->ProductName = $orderinfo_item->ProductName;
                            $item->OffersRate = $orderinfo_item->OffersRate;
                            $item->price = $orderinfo_item->price;
                            $item->variantName = $orderinfo_item->variantName;
                        }
                        $isaddones = $this->order_model->read('*', 'check_addones', array('order_menuid' => $item->row_id));
                        $itemprice = $item->price * $presentsub[$item->row_id];
                        $itemdetails = $this->order_model->getiteminfo($item->menu_id);
                        if ($itemdetails->OffersRate > 0) {
                            $ptdiscount = $itemdetails->OffersRate * $itemprice / 100;
                            $pdiscount += $ptdiscount;
                        } else {
                            $ptdiscount = 0;
                        }
                        $adonsprice = 0;
                        if (!empty($item->add_on_id) && !empty($isaddones)) {
                            $addons = explode(",", $item->add_on_id);
                            $addonsqty = explode(",", $item->addonsqty);
                            $x = 0;
                            foreach ($addons as $addonsid) {
                                $adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
                                $adonsprice += $adonsinfo->price * $addonsqty[$x];
                                $x++;
                            }
                            $totalamount += $adonsprice;
                        }
                        $subtotal += $item->price * $item->menuqty;
                    ?>
                        <div class="row-data">
                            <div class="item-info">
                                <h5><?php echo $item->ProductName; ?></h5>
                                <p><?php echo $item->price; ?></p>
                            </div>
                            <div class="item-qty"><?php echo $item->menuqty; ?></div>
                            <div class="item-total"><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $itemprice - $ptdiscount; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></div>
                        </div>
                        <?php
                        if (!empty($item->add_on_id) && !empty($isaddones)) {
                            $y = 0;
                            foreach ($addons as $addonsid) {
                                $adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
                        ?>
                                <div class="row-data">
                                    <div class="item-info">
                                        <h5>- <?php echo $adonsinfo->add_on_name; ?> (<?php echo $adonsinfo->price; ?>)</h5>
                                    </div>
                                    <div class="item-qty"><?php echo $addonsqty[$y]; ?></div>
                                    <div class="item-total"><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $adonsinfo->price * $addonsqty[$y]; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></div>
                                </div>
                        <?php
                                $y++;
                            }
                        }
                    }
                    $itemtotal = $totalamount + $subtotal;
                    ?>
                </div>
            </div>
        </div>
        <div class="invoice-footer">
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo display('subtotal'); ?></h5>
                </div>
                <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $total; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo display('vat_tax'); ?></h5>
                </div>
                <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $vat; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
            </div>
            <?php if (isset($servicecharge) && $servicecharge > 0) { ?>
                <div class="row-data">
                    <div class="item-info">
                        <h5><?php echo 'Surcharge'; ?></h5>
                    </div>
                    <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $servicecharge; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
                </div>
            <?php } ?>
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo display('discount'); ?></h5>
                </div>
                <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $alldiscount; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
            </div>
            <div class="row-data border-top">
                <div class="item-info">
                    <h5><?php echo display('grand_total'); ?></h5>
                </div>
                <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $gtotal; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo display('billing_to'); ?>: <?php echo $customerinfo->customer_name; ?></h5>
                </div>
                <h5><?php echo display('bill_by'); ?>: <?php echo $cashierinfo->firstname . ' ' . $cashierinfo->lastname; ?></h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5><?php echo 'Table'; ?>: <?php echo $table_split; ?></h5>
                </div>
                <h5><?php echo display('orderno'); ?>: <?php echo $mainorderinfo->saleinvoice; ?>(<?php echo $orderinfo->sub_id; ?>)</h5>
            </div>
            <div class="text-center">
                <h5 style="font-size: 10px; font-weight: bold;"><?php echo display('payment_status'); ?>: <?php
                    if ($billinfo->bill_status == 1) {
                        echo 'Paid';
                    } else {
                        if ($orderinfo->order_status == 5) {
                            echo 'Canceled';
                        } else {
                            echo display('due');
                        }
                    }
                ?></h5>
            </div>
            <?php if (!empty($payment_details)) { ?>
                <div class="row-data border-top">
                    <div class="item-info">
                        <h5><?php echo 'Payment Details'; ?>:</h5>
                    </div>
                </div>
                <?php foreach ($payment_details as $payment) { ?>
                    <div class="row-data">
                        <div class="item-info">
                            <h5><?php echo $payment['payment_method']; ?></h5>
                        </div>
                        <h5><?php if ($currency->position == 1) { echo $currency->curr_icon; } ?><?php echo $payment['amount']; ?><?php if ($currency->position == 2) { echo $currency->curr_icon; } ?></h5>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="text-center">
                <h3 style="font-size: 12px; margin: 3px 0;"><?php echo display('thanks_you'); ?></h3>
                <p class="b_top"><?php echo display('powerbyadzguru'); ?></p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>