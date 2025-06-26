<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading">
                <h3 class="panel-title">Waste Detail</h3>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Reference No</th>
                        <td><?php echo htmlspecialchars($waste->reference_no); ?></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><?php echo htmlspecialchars($waste->waste_date); ?></td>
                    </tr>
                    <tr>
                        <th>Responsible Person</th>
                        <td><?php echo htmlspecialchars($waste->firstname . ' ' . $waste->lastname); ?></td>
                    </tr>
                    <tr>
                        <th>Waste Type</th>
                        <td><?php echo ucfirst($waste->waste_type); ?></td>
                    </tr>
                    <tr>
                        <th>Note</th>
                        <td><?php echo htmlspecialchars($waste->note); ?></td>
                    </tr>
                </table>

                <h4>Items</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ingredient Name (ID)</th>
                            <th>Quantity</th>
                            <th>Unit ID</th>
                            <th>Food Name (ID)</th>
                            <th>Food Wastage Qty (Pc/Plate)</th>
                            <th>Loss Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($waste->items as $i => $item): ?>
                            <?php   $unit= get_unit_detail($item->unit_id);
                                    $unit_name = $unit ? $unit['uom_short_code'] : '-'; 
                            ?>
                          
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $item->ingredient_id ? $item->ingredient_name . ' (ID: ' . $item->ingredient_id . ')' : '-' ?></td>
                            <td><?php echo $item->qty; ?></td>
                            <td><?php echo $unit_name; ?></td>
                            <td><?php echo $item->food_id ? $item->food_name . ' (ID: ' . $item->food_id . ')' : '-' ?>
                                <?php echo $item->variant_name ? ' (' . $item->variant_name . ')' : ''; ?>
                            </td>
                            <td><?php echo $item->food_qty; ?></td>
                            <td><?php echo number_format($item->loss_amount, 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="<?php echo base_url('itemmanage/waste'); ?>" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</div>
