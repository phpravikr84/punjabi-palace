<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Stock report start -->
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo display('inv_information') ?></legend>
                    </fieldset>
                    <div class="row">
			<div class="col-sm-12">
		        <div class="panel panel-default">
		            <div class="panel-body"> 
						<a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
		            </div>
		        </div>

		    </div>
	    </div>
					<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4><?php echo display('inv_information') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">
						<div id="printableArea" class="purchase_invoice_left" >
							<div class="text-center">
								<h3> <?php echo $setting->storename;?> </h3>
								<h4>Supplier Name:<?php echo $supplierinfo->supName;?> </h4>
                                <h4>Date : <?php echo date("d-M-Y", strtotime($purchaseinfo->purchasedate));?></h4>
                                <h4>Invoice No : <?php echo $purchaseinfo->invoiceid;?></h4>
								<h4> <?php echo "Print Date" ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>
			                <div class="table-responsive purchase_invoice_top"  id="stockproduct">
                            <table id="" class="table table-bordered table-striped table-hover">
			                        <thead>
										<tr>
											<th class="text-center"><?php echo display('ingredient_name') ?></th>
											<th class="text-center"><?php echo display('quantity') ?></th>
											<th class="text-center"><?php echo display('unit_price') ?></th>
											<th class="text-center"><?php echo display('total_price') ?></th>
										</tr>
									</thead>
									<tbody>
                                     <?php 
									 //print_r($iteminfo);
									 //print_r($purchase_notify_info);
									 foreach($iteminfo as $item){?>
									<tr>
											<td><?php echo $item->ingredient_name;?></td>
                                            <!--
                                                Convert the fetch Product Quanity on base of Purchase Conversion Unit
                                                -->
                                                <?php
                                                    $convertedItemQty = get_quantity_purchase_unit($item->indredientid, $item->quantity);
                                                ?>
                                            <td class="text-center"><?php echo $convertedItemQty; ?> <?php echo $item->uom_short_code;?></td>
                                            <td class="text-right"><?php echo $item->price;?>
											
												<!-- Notification code if price up or down -->

												<?php 
                                                $purchase_notify_info = get_price_diff_data($item->indredientid);

                                                if ($purchase_notify_info && isset($purchase_notify_info->price_up, $purchase_notify_info->price_down)):

                                                    // Prepare content (safe for HTML)
                                                    $tooltipContent = sprintf(
                                                        '<b>Last Unit Price:</b> %s<br><b>Current Unit Price:</b> %s<br><b>Price Difference:</b> %s<br><b>Difference Percentage:</b> %s%%',
                                                        number_format($purchase_notify_info->last_unit_price, 2),
                                                        number_format($purchase_notify_info->current_unit_price, 2),
                                                        number_format($purchase_notify_info->price_difference, 2),
                                                        number_format($purchase_notify_info->price_diff_percentage, 2)
                                                    );

                                                    $uniqueId = 'tooltip_' . uniqid();

                                                    if ($purchase_notify_info->price_up != 0 || $purchase_notify_info->price_down != 0): ?>
                                                        <span class="price-info-wrapper" style="position: relative;">
                                                            <i class="fas fa-exclamation-triangle show-info-icon" 
                                                            style="color: red; cursor: pointer;"
                                                            data-target="#<?= $uniqueId ?>"></i>

                                                            <div class="custom-tooltip-content" id="<?= $uniqueId ?>" style="display: none; position: absolute; z-index: 999; background: #fff3cd; padding: 10px; border: 1px solid #ffeeba; border-radius: 5px; width: 250px; top: 20px; left: -62px; font-size: 13px;">
                                                                <?= $tooltipContent ?>
                                                            </div>
                                                        </span>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <span></span> <!-- Empty placeholder -->
                                                <?php endif; ?>


											</td>
                                            <td class="text-right"><?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $item->totalprice;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                         <td class="text-right" colspan="4"><?php echo display('grand_total') ?>:  <?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $purchaseinfo->total_price;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
                                    </tr>
                                    <tr>
                                         <td class="text-right" colspan="4"><?php echo display('paid_amnt') ?>:  <?php if($currency->position==1){echo $currency->curr_icon;}?> <?php echo $purchaseinfo->paid_amount;?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
                                    </tr>
									</tbody>
									
			                    </table>
			                    
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

<script src="<?php echo base_url('application/modules/purchase/assets/js/purchaseinvoice_script.js'); ?>" type="text/javascript"></script>
<script>
    // $(document).ready(function () {
    //     $('[data-toggle="tooltip"]').tooltip(); // Initialize Bootstrap tooltip
    // });

        $(document).ready(function () {
            $('.show-info-icon').on('click', function (e) {
                e.stopPropagation(); // Prevent event bubbling
                const targetId = $(this).data('target');
                $('.custom-tooltip-content').not(targetId).hide(); // Hide others
                $(targetId).toggle(); // Toggle current
            });

            // Hide on clicking anywhere else
            $(document).on('click', function () {
                $('.custom-tooltip-content').hide();
            });
        });


</script>
<style>
	.tooltip-inner {
		background-color:rgb(243, 49, 15);
	}
</style>