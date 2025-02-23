<link href="<?php echo base_url('application/modules/dashboard/assest/css/home_dashboard.css'); ?>" rel="stylesheet" type="text/css"/>

<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $totalorder; ?></span> <span class="slight"> </span></h2>
                            <div class="lifeord text-orange"><?php echo display('lifeord')?></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $todayorder; ?></span> <span class="slight"> </span></h2>
                            <div class="lifeord text-green"><?php echo display('tdayorder')?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $todayamount; ?></span></h2>
                            <div class="lifeord text-orange"><?php echo display('tdaysell')?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $totalcustomer; ?></span> <span class="slight"> </span></h2>
                            <div class="lifeord text-green"><?php echo display('tcustomer')?></div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $completeord; ?></span></h2>
                            <div class="lifeord text-violet"><?php echo display('tdeliv')?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 mt-10">
                <div class="panel home-panel-bd bg-alice-blue rounded-15 d-flex align-items-center justify-content-center">
                    <div class="panel-body">
                        <div class="statistic-box text-center text-white">
                            <h2><span class="count-number text-inverse fs-24"><?php echo $totalreservation;?></span> <span class="slight"> </span></h2>
                            <div class="lifeord text-info"><?php echo display('treserv')?></div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
<div class="row">
    <!-- Latest Order -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading latestord">
                <div class="panel-title bg-success">
                    <h4><?php echo display('latestord')?></h4>
                </div>
            </div>
            <div class="panel-body">
            	<div class="message_inner1">
                  <div class="message_widgets">
                            <?php if(!empty($latestoreder)){
							 foreach($latestoreder as $order){ ?>
                                       <div class="inbox-item">
                                        <p class="inbox-item-customer-name"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                        
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>: <a href="<?php echo base_url() ?>ordermanage/order/orderdetails/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } ?>   
                                     </div>
                                 </div>                          
            </div>
        </div>
    </div>
    <!-- Latest Reservation -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading latest_reser">
                <div class="panel-title">
                    <h4><?php echo display('latest_reser')?></h4>
                </div>
            </div>
            <div class="panel-body">
            <div class="message_inner1">
                 <div class="message_widgets">
                 <?php if(!empty($latestreservation)){
							 foreach($latestreservation as $order){ ?>
                                       <div class="inbox-item">
                                        <p class="inbox-item-customer-name"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('date')?>: <a href="<?php echo base_url() ?>reservation/reservation/index">(<?php echo $order->reserveday;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->formtime;?></p>
                                        
                                    </div>
                                     <?php } } ?>
                   			</div>
                         </div>    
            </div>
        </div>
    </div>
    <!-- Online Order -->
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading latestolorder">
                <div class="panel-title">
                    <h4><?php echo display('latestolorder')?></h4>
                </div>
            </div>
            <div class="panel-body">
            	<div class="message_inner1">
                   <div class="message_widgets">
                 <?php if(!empty($onlineorder)){
							 foreach($onlineorder as $order){ ?>
                                       <div class="inbox-item">
                                        <p class="inbox-item-customer-name"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong></p>
                                      
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>: <a href="<?php echo base_url() ?>ordermanage/order/orderdetails/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } ?>  
                     </div>
                 </div>                           
            </div>
        </div>
    </div>
</div>
<div class="row">
 <!-- Monthly Sales Amount and Order -->
    <div class="col-sm-12 col-lg-4">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading topselleingitem">
                <div class="panel-title">
                    <h4><?php echo display('topselleingitem')?></h4>
                    
                </div>
            </div>
            <div class="panel-body">
            	<div class="message_inner1">
                   <div class="message_widgets">
                        <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('item_name')?></th>
                                        <th><?php echo display('varient_name')?></th>
                                        <th><?php echo display('quantity'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($topseller)){
                                foreach($topseller as $pitem){?>
                                    <tr>
                                        <td><?php echo $pitem->ProductName;?></td>
                                        <td><?php echo $pitem->variantName;?></td>
                                        <td><?php echo $pitem->qty;?></td>
                                    </tr>
                                  <?php } } ?>
                                </tbody>
                        </table>
                  	</div>
                 </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-8">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading monsalamntorder">
                <div class="panel-title">
                    <h4><?php echo display('monsalamntorder')?></h4>
                    <ul class="nav nav-tabs pull-right order_status order_status-new">
                                <li><input name="yearmonth" id="datepicker3" class="form-control datepicker3" type="text" placeholder="<?php echo display('month')?>" value="" readonly="readonly"></li>
                                <li><input type="button"  class="btn btn-success" name="search" value="<?php echo display('search')?>" onclick="searchmonth()"></li>
                            </ul>
                </div>
            </div>
            <div class="panel-body" id="salechart">
                <canvas id="lineChart" height="90"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Online Vs Offline Order and sales -->
    <div class="col-sm-12 col-lg-8">
        <div class="panel panel-bd shadow-1 border-none rounded-10">

            <div class="panel-heading onlineofline">
                <div class="panel-title">
                    <h4><?php echo display('onlineofline')?></h4>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="barChart" height="435"></canvas>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-sm-12 col-lg-4">
        <div class="panel panel-bd shadow-1 border-none rounded-10">
            <div class="panel-heading pending_ord">
                <div class="panel-title">
                    <h4><?php echo display('pending_ord')?></h4>
                </div>
            </div>
            <div class="panel-body">
            <div class="message_inner1">
                            <div class="message_widgets">
                <?php 
				if(!empty($latestpending)){
							 foreach($latestpending as $order){ ?>
                                       <div class="inbox-item">
                                        <p class="inbox-item-customer-name"><strong class="inbox-item-author"><?php echo display('name')?> : <?php echo $order->customer_name;?></strong><span class="profile-status away pull-right"></span></p>
                                     
                                        <p class="inbox-item-text"><?php echo display('phone')?>: <?php echo $order->customer_phone;?></p>
                                        <p class="inbox-item-text"><?php echo display('ord_number')?>.: <a href="<?php echo base_url() ?>ordermanage/order/orderdetails/<?php echo $order->order_id;?>">(<?php echo $order->saleinvoice;?>)</a></p>
                                        <p class="inbox-item-text"><?php echo display('tabltno')?>: <?php echo $order->tablename;?></p>
                                        <p class="inbox-item-text"><?php echo display('time')?>: <?php echo $order->order_time;?></p>
                                        
                                    </div>
                                     <?php } } 
									 ?>  
                              </div>
                        </div>    
            </div>
        </div>
    </div> 
</div>
<input name="monthname" id="monthname" type="hidden" value="<?php echo $monthname;?>" />
<input name="monthlysaleamount" id="monthlysaleamount" type="hidden" value="<?php echo $monthlysaleamount;?>" />
<input name="monthlysaleorder" id="monthlysaleorder" type="hidden" value="<?php echo $monthlysaleorder;?>" />
<input name="onlinesaleamount" id="onlinesaleamount" type="hidden" value="<?php echo $onlinesaleamount;?>" />
<input name="onlinesaleorder" id="onlinesaleorder" type="hidden" value="<?php echo $onlinesaleorder;?>" />
<input name="offlinesaleamount" id="offlinesaleamount" type="hidden" value="<?php echo $offlinesaleamount;?>" />
<input name="offlinesaleorder" id="offlinesaleorder" type="hidden" value="<?php echo $offlinesaleorder;?>" />
<?php if(isset($_GET['status'])){?>
<input name="registerclose" id="registerclose" type="hidden" value="<?php echo $_GET['status'];?>" />
<?php } ?>
<!-- Chart js -->
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('dashboard/home/chartjs') ?>" type="text/javascript"></script> 
<script src="<?php echo base_url('application/modules/dashboard/assest/js/chartdata.js'); ?>" type="text/javascript"></script>
<?php //$this->load->view('include/homescript');?>
