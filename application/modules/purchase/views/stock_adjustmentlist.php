<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="d-flex justify-content-between pull-right">
            <h4 class="mb-0"><?php echo $title; ?></h4>
            <div class="ms-auto">
                <a href="<?php echo base_url('purchase/stock_adjustment/create'); ?>" class="btn btn-sm btn-primary">
                    + Add Adjustment
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Ingredient</th>
                            <th>Quantity</th>
                            <th>Adjustment Date</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($adjustments)){ ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($adjustments as $item){ ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $item->ingredient_name; ?></td>
                                    <td class="<?php echo ($item->adjusted_qty >= 0) ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $item->adjusted_qty; ?>
                                    </td>
                                    <td><?php echo $item->adjustment_date;  ?></td>
                                    <td><?php echo $item->note; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr><td colspan="6" class="text-center">No records found</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo $links; ?>
            </div>
        </div>
    </div>
</div>
