<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Kitchen Order</title>
    <style>
        @media print {
            body {
                font-size: 14pt;
                color: #000;
                margin: 0;
                padding: 10mm;
            }
			.text-center{
				text-align:center;
			}
            .print-area {
                width: 80mm;
                max-width: 100%;
                margin: 0 auto;
                font-family: Arial, sans-serif;
                border: 2px solid #d3d3d3;
                border-radius: 10px;
                padding: 15px;
            }
            .border-top-gray {
                border-top: 1px dotted #ccc;
                margin-top: 10px;
                padding-top: 10px;
            }

			.border-bottom-gray {
                border-bottom: 1px dotted #ccc;
                margin-bottom: 10px;
                padding-bottom: 10px;
            }
            .table-responsive {
                overflow-x: visible;
            }
            .logo-img {
                max-width: 70px;
                margin-bottom: 10px;
            }
            .text-success-outline {
                border: 1px solid #28a745;
                color: #28a745;
                padding: 5px 10px;
                border-radius: 5px;
                display: inline-block;
                margin-bottom: 10px;
            }
            .token-box {
                background-color: #000;
                color: #fff;
                padding: 5px 10px;
                border-radius: 5px;
                display: inline-block;
                margin-bottom: 10px;
            }
            .middle-info {
                color: #000;
                padding: 5px 10px;
                font-weight: bold;
            }

			/* Custom class for dotted table styling */
			.dotted-table table {
				border-collapse: collapse;
				width: 100%;
				border: 1px dotted #ccc;
			}

			.dotted-table th,
			.dotted-table td {
				border: 1px dotted #ccc;
				padding: 8px;
				text-align: left;
			}

			.dotted-table thead th {
				background-color: #f7f7f7;
				font-weight: bold;
			}

        }
    </style>
    <script>
        <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        var pstatus = "<?php echo $this->uri->segment(5);?>";
        var returnurl = pstatus == 0 
            ? "<?php echo base_url('ordermanage/order/pos_invoice'); ?>" 
            : "<?php echo base_url('ordermanage/order/pos_invoice'); ?>?tokenorder=<?php echo $orderinfo->order_id;?>";
        
        window.print();
        setTimeout(() => {
            document.location.href = returnurl;
        }, 3000);
    </script>
</head>
<body>
    <div class="print-area">
        <div class="container-fluid">
            <!-- Store Information -->
			 <div class="text-center mb-3">
				<span class="text-success-outline"><?php echo 'KOT'; ?></span>
			</div>
            <!-- <div class="text-center mb-3">
                <img src="<?php //echo base_url();?><?php //echo $storeinfo->logo?>" class="logo-img img-fluid" alt="Store Logo">
                <address class="mt-2">
                    <strong><?php //echo $storeinfo->storename;?></strong><br>
                    <?php //echo $storeinfo->address;?><br>
                    <?php //echo $storeinfo->phone;?><br>
                    <?php //echo $storeinfo->email;?>
                </address>
            </div> -->

			 <!-- Middle Information -->
            <div class="text-center border-top-gray border-bottom-gray">
                <div class="middle-info">
                    <?php if (!empty($tableinfo)) { echo display('table') . ': ' . $tableinfo->tablename . ' | '; } ?>
                    <?php echo display('ord_number');?>: <?php echo $orderinfo->order_id;?>
                </div>
            </div>

            <!-- Order Header -->
            <div class="text-center mb-3">
                <!-- <div class="token-box"><?php //echo display('token_no')?>: <?php //echo $orderinfo->tokenno;?></div> -->
                <p class="mb-0"><?php echo $customerinfo->customer_name;?></p>
            </div>

            <!-- Order Items Table -->
            <div class="table-responsive dotted-table">
    			<table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th scope="col"><?php echo display('item')?></th>
							<th scope="col">Qty</th>
                            <!-- <th scope="col"><?php //echo display('size')?></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalamount = 0;
                        $subtotal = 0;
                        $total = $orderinfo->totalamount;
                        foreach ($iteminfo as $item) {
                            $itemprice = $item->price * $item->menuqty;
                            $discount = 0;
                            $adonsprice = 0;
                            $newitem = $this->order_model->read('*', 'order_menu', array('row_id' => $item->row_id, 'isupdate' => 1));
                            $isexitsitem = $this->order_model->readupdate('tbl_updateitems.*,SUM(tbl_updateitems.qty) as totalqty', 'tbl_updateitems', array('ordid' => $item->order_id, 'menuid' => $item->menu_id, 'varientid' => $item->varientid, 'addonsuid' => $item->addonsuid));
                            
                            if (!empty($item->add_on_id)) {
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
                        <tr>
                            
                            <td>
								<span style="font-weight:bold; border-bottom:1px solid #ccc; margin-bottom:10px;"><?php echo $item->CategoryName; ?></span><br/>
                                <?php echo $item->ProductName;?><br>
                                <?php if (!empty($item->notes)) { ?>
                                    <small><?php echo $item->notes;?></small>
                                <?php } ?>
                               <?php
								if (!empty($orderedMods)) {
									$modifiers = []; // Initialize an empty array to store add-on names
									foreach ($orderedMods as $mod) {
										if ($mod->menu_id == $item->menu_id) {
											// Append add-on name to the modifiers array
											$modifiers[] = $mod->add_on_name;
										}
									}
								}
								?>

								<?php if (!empty($modifiers) && is_array($modifiers)) { ?>
									<div style="font-weight:bold;">( <?php echo htmlspecialchars(implode(', ', $modifiers)); ?> )</div>
								<?php } ?>
								<?php
                                if (!empty($selectedFoodsForCart)) {
                                    foreach ($selectedFoodsForCart as $promo) {
                                        if ($promo->menu_id == $item->menu_id) {
                                            $this->db->select('variantName');
                                            $this->db->from('variant');
                                            $this->db->where('variantid', $promo->variant_id);
                                            $vq = $this->db->get();
                                            $variant = $vq->row();
                                        ?>
                                            <div>Promo Food: <?php echo $promo->food_name . " [" . $variant->variantName . "]";?></div>
                                        <?php }
                                    }
                                }
                                if (!empty($item->add_on_id)) {
                                    $y = 0;
                                    foreach ($addons as $addonsid) {
                                        $adonsinfo = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid)); ?>
                                        <div><?php echo $adonsinfo->add_on_name; ?> (x<?php echo $addonsqty[$y]; ?>)</div>
                                    <?php $y++;
                                    }
                                } ?>
                            </td>
							<td><?php echo $item->menuqty;?></td>
                            <!-- <td><?php //echo $item->variantName;?></td> -->
                        </tr>
                        <?php } 
                        foreach ($exitsitem as $exititem) {
                            $newitem = $this->order_model->read('*', 'order_menu', array('row_id' => $exititem->row_id, 'isupdate' => 1));
                            $isexitsitem = $this->order_model->readupdate('tbl_updateitems.*,SUM(tbl_updateitems.qty) as totalqty', 'tbl_updateitems', array('ordid' => $orderinfo->order_id, 'menuid' => $exititem->menu_id, 'varientid' => $exititem->varientid, 'addonsuid' => $exititem->addonsuid));
                            if (!empty($isexitsitem) && $isexitsitem->qty > 0 && $newitem->isupdate != 1) {
                                $itemprice = $exititem->price * $isexitsitem->qty;
                        ?>
                        <tr>
                            <td><?php echo $isexitsitem->totalqty;?></td>
                            <td>
                                <?php echo $exititem->ProductName;?><br>
                                <?php if (!empty($exititem->notes)) { ?>
                                    <small><?php echo $exititem->notes;?></small>
                                <?php } ?>
                            </td>
                            <td><?php echo $exititem->variantName;?></td>
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

			<div class="text-center" style="margin-top:10px; font-weight:bold;"> <?php echo $orderTiming['bill_date']. ' ' .$orderTiming['bill_time']; ?></div>

           
        </div>
    </div>
</body>
</html>