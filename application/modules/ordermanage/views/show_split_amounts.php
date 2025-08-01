<div class="row">
    <?php foreach ($suborderid as $index => $sub_id) { ?>
        <div class="col-md-6">
            <div class="info_part split-amount" onclick="selectAmountSplit(this)" data-value="<?php echo $sub_id; ?>">
                <div class="table-topper">
                    <table class="table table-modal table-title">
                        <tbody>
                            <tr>
                                <td><?php echo display('split'); ?></td>
                                <td><?php echo $sub_id; ?></td>
                            </tr>
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
                            <td><?php echo number_format($total_amount, 3); ?></td>
                            <td><?php echo number_format($vat, 3); ?></td>
                            <td><?php echo number_format($service_charge, 3); ?></td>
                            <td><?php echo number_format($total_amount + $vat + $service_charge, 3); ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><b><?php echo display('grand_total'); ?></b></td>
                            <td><b><?php echo number_format($total_amount + $vat + $service_charge, 3); ?></b></td>
                            <input type="hidden" id="total-split-<?php echo $sub_id; ?>" value="<?php echo $total_amount; ?>">
                            <input type="hidden" id="vat-split-<?php echo $sub_id; ?>" value="<?php echo $vat; ?>">
                            <input type="hidden" id="service-split-<?php echo $sub_id; ?>" value="<?php echo $service_charge; ?>">
                        </tr>
                    </tfoot>
                </table>
                <div class="customer-select">
                    <label for="customer" class="customer-label"><?php echo display('customer'); ?></label>
                    <?php echo form_dropdown('customer_name[]', $customerlist, '', 'class="form-control" id="customer-' . $sub_id . '" required'); ?>
                </div>
                <div class="submit_area">
                    <button class="btn btn-clear" id="splitpay-<?php echo $sub_id; ?>" onclick="paySplitByAmount(this)" data-url="<?php echo base_url() . 'ordermanage/order/pay_split_by_amount'; ?>"><?php echo display('pay_print'); ?></button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>