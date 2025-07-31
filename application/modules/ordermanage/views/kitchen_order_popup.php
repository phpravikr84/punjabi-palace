<!-- Modal -->
<div class="modal fade" id="kitchenOrderModal" tabindex="-1" role="dialog" aria-labelledby="kitchenOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="kitchenOrderModalLabel"><?php echo 'Kitchen Order Confirmation'; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><?php echo 'Order Details'; ?></h5>
                <p><strong><?php echo 'Order Number'; ?>:</strong> <?php echo $order->saleinvoice; ?></p>
                <p><strong><?php echo 'Table'; ?>:</strong> <?php echo $order->tablename; ?></p>
                <p><strong><?php echo 'Waiter'; ?>:</strong> <?php echo $order->first_name . ' ' . $order->last_name; ?></p>
                <p><strong><?php echo 'Customer'; ?>:</strong> <?php echo $order->customer_name; ?></p>
                <p><strong><?php echo 'Order type'; ?>:</strong> <?php echo $order->customer_type; ?></p>
                <!-- <p><strong><?php //echo display('total_amount'); ?>:</strong> <?php echo number_format($order->totalamount, 2); ?></p> -->
                
                <h6><?php echo display('items'); ?>:</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo display('item'); ?></th>
                            <!-- <th><?php //echo display('variant'); ?></th> -->
                            <th><?php echo display('quantity'); ?></th>
                            <!-- <th><?php //echo display('price'); ?></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_details as $item) { ?>
                            <tr>
                                <td><?php echo $item->ProductName; ?></td>
                                <!-- <td><?php //echo $item->variantName; ?></td> -->
                                <td><?php echo $item->menuqty; ?></td>
                                <!-- <td><?php //echo number_format($item->price * $item->menuqty, 2); ?></td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo display('close'); ?></button>
                <button type="button" class="btn btn-success confirm-order" data-order-id="<?php echo $order->order_id; ?>"><?php echo display('confirm'); ?></button>
            </div>
        </div>
    </div>
</div>
<style>
    #kitchenOrderModal .modal-dialog {
    max-width: 600px;
}
#kitchenOrderModal .modal-body {
    max-height: 500px;
    overflow-y: auto;
}
#kitchenOrderModal .table {
    margin-bottom: 0;
}
#kitchenOrderModal .table th,
#kitchenOrderModal .table td {
    font-size: 14px;
}
.kitchen-order-count {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 16px;
    padding: 5px 10px;
}
</style>