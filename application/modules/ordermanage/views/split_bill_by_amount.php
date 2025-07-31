<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/splitorder.css'); ?>">
<div id="payprint_marge" class="modal-dialog modal-inner" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo display('split_bill_by_amount'); ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="number-of-split">Select number of people (1-8):</label>
                        <?php
                        $list = array('' => 'Select Number');
                        for ($i = 1; $i <= 8; $i++) {
                            $list[$i] = $i;
                        }
                        echo form_dropdown('number', $list, '', 'class="form-control" id="number-of-split" onchange="showSplitByAmount(this)" data-url="' . base_url() . 'ordermanage/order/create_split_by_amount/" data-value="' . $order_info->order_id . '"');
                        ?>
                    </div>
                    <div class="order-details">
                        <h5><?php echo display('order_details'); ?></h5>
                        <table class="table table-bordered table-modal table-info text-center">
                            <thead>
                                <tr>
                                    <th><?php echo display('item'); ?></th>
                                    <th><?php echo display('variant_name'); ?></th>
                                    <th><?php echo display('quantity'); ?></th>
                                    <th><?php echo display('price'); ?></th>
                                    <th><?php echo display('total_price'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_price = 0;
                                foreach ($iteminfo as $item) {
                                    $item_total = $item->price * $item->menuqty;
                                    if ($item->OffersRate > 0) {
                                        $discount = ($item->price * $item->OffersRate / 100) * $item->menuqty;
                                        $item_total -= $discount;
                                    }
                                    $total_price += $item_total;
                                    // Handle add-ons if present
                                    $addons_price = 0;
                                    $addons_name = '';
                                    if (!empty($item->add_on_id)) {
                                        $addons = explode(',', $item->add_on_id);
                                        $addonsqty = explode(',', $item->addonsqty);
                                        $addon_names = array();
                                        foreach ($addons as $index => $addon_id) {
                                            $addon_info = $this->order_model->read('*', 'add_ons', array('add_on_id' => $addon_id));
                                            if ($addon_info) {
                                                $addon_names[] = $addon_info->add_on_name;
                                                $addons_price += $addon_info->price * $addonsqty[$index];
                                            }
                                        }
                                        $addons_name = implode(', ', $addon_names);
                                        $total_price += $addons_price;
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $item->ProductName . ($addons_name ? ', ' . $addons_name : ''); ?></td>
                                        <td><?php echo $item->variantName; ?></td>
                                        <td><?php echo $item->menuqty; ?></td>
                                        <td><?php echo number_format($item->price, 3); ?></td>
                                        <td><?php echo number_format($item_total + $addons_price, 3); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right"><b><?php echo display('subtotal'); ?></b></td>
                                    <td><b><?php echo number_format($total_price, 3); ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><b><?php echo display('vat_tax'); ?></b></td>
                                    <td><b><?php echo number_format($bill_info->VAT, 3); ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><b><?php echo display('service_charge'); ?></b></td>
                                    <td><b><?php echo number_format($bill_info->service_charge, 3); ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><b><?php echo display('total_billing_amount'); ?></b></td>
                                    <td><b><?php echo number_format($total_price + $bill_info->VAT + $bill_info->service_charge, 3); ?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div id="show-split-amounts"></div>
                </div>
            </div>
        </div>
    </div>
</div>