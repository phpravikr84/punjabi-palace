<div class="row text-center">
    <!-- Total Sales -->
    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body bg-primary text-white rounded" style="padding:10px 0;">
                <i class="fa fa-shopping-cart fa-2x"></i>
                <h5 class="mt-3">Today Total Sales</h5>
                <h2 class="fw-bold mb-0"><?php echo isset($total_sales) ? $total_sales : '0.00'; ?></h2>
            </div>
        </div>
    </div>

    <!-- Sales by Dine In -->
    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body bg-success text-dark rounded" style="padding:10px 0;">
                <i class="fa fa-credit-card fa-2x"></i>
                <h5 class="mt-3">Dine In Sales</h5>
                <h2 class="fw-bold mb-0"><?php echo isset($dinein_sales) ? $dinein_sales : '0.00'; ?></h2>
            </div>
        </div>
    </div>

    <!-- Sales by Takeaway -->
    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body bg-warning text-dark rounded" style="padding:10px 0;">
                <i class="fa fa-credit-card fa-2x"></i>
                <h5 class="mt-3">Takeaway Sales</h5>
                <h2 class="fw-bold mb-0"><?php echo isset($takeaway_sales) ? $takeaway_sales : '0.00'; ?></h2>
            </div>
        </div>
    </div>

    <!-- Sales by Card -->
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body bg-success text-dark rounded" style="padding:10px 0;">
                <i class="fa fa-credit-card fa-2x"></i>
                <h5 class="mt-3">Sales by Card</h5>
                <h2 class="fw-bold mb-0"><?php echo isset($card_sales) ? $card_sales : '0.00'; ?></h2>
            </div>
        </div>
    </div>

    <!-- Sales by Cash -->
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body bg-warning text-dark rounded" style="padding:10px 0;">
                <i class="fa fa-money fa-2x"></i>
                <h5 class="mt-3">Sales by Cash</h5>
                <h2 class="fw-bold mb-0">
                    <?php
                        if (isset($cash_sales) && isset($card_sales)) {
                            $difference = $cash_sales - $card_sales;

                            if ($difference > 0) {
                                echo number_format($difference, 2);
                            } elseif ($difference < 0) {
                                echo number_format($difference, 2);
                            } else {
                                echo "0.00";
                            }
                        } else {
                            echo "0.00";
                        }
                        ?>

                </h2>
            </div>
        </div>
    </div>
</div>


<table class="table table-fixed table-bordered table-hover bg-white wpr_100" id="onprocessing">
                                    <thead>
                                         <tr>
                                                <th class="text-center"><?php echo display('sl');?>. </th>
                                                <th class="text-center"><?php echo display('invoice');?> </th>
                                                <th class="text-center"><?php echo display('customer_name');?></th>
                                                <th class="text-center"><?php echo display('customer_type');?></th> 
                                                <th class="text-center"><?php echo display('waiter');?></th> 
                                                <th class="text-center"><?php echo display('tabltno');?></th> 
                                                <th class="text-center"><?php echo display('ordate');?></th>
                                                <th class="text-right"><?php echo display('amount');?></th>
                                                <th class="text-center"><?php echo display('action');?></th>  
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" class="text-right"><?php echo display('total');?>:</th>
                                            <th colspan="2" class="text-center"></th>
                                        </tr>
                                    </tfoot>
                                </table>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/todayorder.js'); ?>" type="text/javascript"></script>
                                