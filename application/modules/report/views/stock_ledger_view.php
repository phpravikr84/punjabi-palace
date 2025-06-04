<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="d-flex justify-content-between pull-left">
            <h3 class="mb-0"><?php echo $title; ?></h3>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Ingredient</th>
                            <th>Transaction Type</th>
                            <th>Ref No</th>
                            <th>Opening Stock</th>
                            <th>Inward Qty (Purchase)</th>
                            <th>Outward Qty (Sales)</th>
                            <th>Adjusted Qty</th>
                            <th>Closing Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ledger)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($ledger as $entry) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td style="width:150px;"><?php echo htmlspecialchars(date('d-m-Y', strtotime($entry['date']))); ?></td>
                                    <td style="width:200px;"><?php echo htmlspecialchars($entry['ingredient_name']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['transaction_type']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['ref_no']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['opening_stock']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['inward_qty']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['outward_qty']); ?></td>
                                    <td class="<?php echo ($entry['adjusted_qty'] >= 0) ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo htmlspecialchars($entry['adjusted_qty']); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($entry['closing_stock']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr><td colspan="10" class="text-center">No records found</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if (!empty($links)) echo $links; ?>
            </div>
        </div>
    </div>
</div>
