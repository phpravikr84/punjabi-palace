<div class="row">
    <?php
    foreach ($suborder_info as $suborder) { 
        $customer = $suborder->customer_id ? $this->order_model->read('*', 'customer_info', array('customer_id' => $suborder->customer_id)) : null;
        ?>
        <div class="col-md-6">
            <div class="info_part split-amount<?php echo $suborder->status == 1 ? ' split-paid' : ''; ?>" onclick="selectAmountSplit(this)" data-value="<?php echo $suborder->sub_id; ?>">
                <div class="table-topper">
                    <table class="table table-modal table-title">
                        <tbody>
                            <tr>
                                <td><?php echo display('split'); ?></td>
                                <td><?php echo $suborder->sub_id; ?></td>
                            </tr>
                            <?php if ($suborder->status == 1 && $customer) { ?>
                                <tr>
                                    <td><?php echo display('customer'); ?></td>
                                    <td><?php echo $customer->customer_name; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <table class="table table-bordered table-modal table-info text-center">
                    <thead>
                        <tr>
                            <th><?php echo display('amount'); ?></th>
                            <th><?php echo display('vat'); ?></th>
                            <th><?php echo display('service_charge'); ?></th>
                            <th><?php echo display('total'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo number_format($suborder->total_price, 3); ?></td>
                            <td><?php echo number_format($suborder->vat, 3); ?></td>
                            <td><?php echo number_format($suborder->s_charge, 3); ?></td>
                            <td><?php echo number_format($suborder->total_price + $suborder->vat + $suborder->s_charge, 3); ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><b><?php echo display('grand_total'); ?></b></td>
                            <td><b><?php echo number_format($suborder->total_price + $suborder->vat + $suborder->s_charge, 3); ?></b></td>
                            <input type="hidden" id="total-split-<?php echo $suborder->sub_id; ?>" value="<?php echo $suborder->total_price; ?>">
                            <input type="hidden" id="vat-split-<?php echo $suborder->sub_id; ?>" value="<?php echo $suborder->vat; ?>">
                            <input type="hidden" id="service-split-<?php echo $suborder->sub_id; ?>" value="<?php echo $suborder->s_charge; ?>">
                        </tr>
                    </tfoot>
                </table>
                <?php if ($suborder->status == 0) { ?>
                    <div class="customer-select">
                        <label for="customer" class="customer-label"><?php echo display('customer'); ?></label>
                        <?php echo form_dropdown('customer_name[]', $customerlist, $suborder->customer_id, 'class="form-control" id="customer-' . $suborder->sub_id . '" required'); ?>
                    </div>
                    <div class="submit_area">
                        <button class="btn btn-clear" id="splitpay-<?php echo $suborder->sub_id; ?>" onclick="paySplitByAmount(this)" data-url="<?php echo base_url() . 'ordermanage/order/pay_split_by_amount'; ?>"><?php echo display('pay_print'); ?></button>
                    </div>
                <?php } else { ?>
                    <div class="submit_area">
                        <span class="text-success"><?php echo display('paid'); ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>