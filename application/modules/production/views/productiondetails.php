<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Product js php -->
<script src="<?php echo base_url()?>assets/js/product.js.php" ></script>

<!-- Stock report start -->
<script src="<?php echo base_url('application/modules/production/assets/js/product_wise_detail.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('application/modules/production/assets/css/product_wise_detail.css'); ?>" rel="stylesheet" type="text/css"/>

<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo 'Production Details'; ?></legend>
                    </fieldset>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4><?php echo 'Production Details'; ?></h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="printableArea">
                                        <div class="text-center">
                                            <h3> <?php echo $setting->storename;?> </h3>
                                            <h4 ><?php echo $setting->address;?> </h4>
                                        </div>
                                        <div class="table-responsive" id="stockproduct">
                                        <table id="respritbl" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"><?php echo display('item_name') ?></th>
                                                        <th class="text-center"><?php echo display('in_quantity') ?></th>
                                                        <th class="text-center"><?php echo display('out_quantity') ?></th>
                                                        <th class="text-center"><?php echo display('stock') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($allproduct as $stockinfo){?>
                                                <tr>
                                                        <td><?php echo $stockinfo['ProductName'];?></td>
                                                        <td><?php echo $stockinfo['In_Qnty'];?></td>
                                                        <td><?php echo $stockinfo['Out_Qnty'];?></td>
                                                        <td><?php echo $stockinfo['Stock'];?></td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th  colspan="4"></th>
                                                    </tr>
                                                </tfoot>
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

