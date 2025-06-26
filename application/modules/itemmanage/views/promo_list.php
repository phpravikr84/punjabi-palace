<?php 
if ($this->session->flashdata('message')) {
    if ($message && strpos($message, 'Welcome') === false) {
?>
    <div class="alert alert-success alert-dismissible" role="alert" style="color: #3c763d !important;background-color: #dff0d8 !important;border-color: #d6e9c6 !important;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php 
        //check if there is any word: "Welcome" in the message, then don't show it
        $message = $this->session->flashdata('message');
        echo $message;
        unset($_SESSION['message']);
        ?>
    </div>
<?php 
    }
}
?>
<?php if ($this->session->flashdata('exception')) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php 
        echo $this->session->flashdata('exception');
        unset($_SESSION['exception']);
        ?>
    </div>
<?php } ?>
<?php if (validation_errors()) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors() ?>
    </div>
<?php } ?>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo 'Name' ?></th>
                            <th><?php echo 'Offer Food' ?></th>
                            <th><?php echo 'Promo Type' ?></th>
                            <th><?php echo 'Start Date'; ?></th> 
                            <th><?php echo 'End Date' ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($promoitemslist)) { 
						?>
                            <?php $sl =  $pagenum+1; ?>
                            <?php foreach ($promoitemslist as $fooditems) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $fooditems->promo_title; ?></td>
                                    <td><strong>
                                    <?php 
                                        // echo getCusineTypeName($fooditems->cusine_type);
                                        //getting food name by offer food id
                                        if(!empty($fooditems->offer_food_id)){
                                            $offer_food_id = $fooditems->offer_food_id;
                                            //get the food name from db by the offer_food_id
                                            $this->db->select('ProductName');
                                            $this->db->from('item_foods');
                                            $this->db->where('ProductsID', $offer_food_id);
                                            $query = $this->db->get();
                                            if($query->num_rows() > 0){
                                                $offer_food = $query->row();
                                                echo $offer_food->ProductName;
                                            } else {
                                                echo 'No food item found';
                                            }
                                        } else {
                                            echo 'No food item found';
                                        }
                                    ?>
                                    </strong>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        if($fooditems->promo_type==1): 
                                            echo "<strong class='text-success'>Discount</strong>"; 
                                        else:
                                            echo "<strong class='text-success'>Free Item</strong>"; 
                                        endif;
                                        ?>
                                    </td>
                                    <td> <?php echo getFormattedDateTime($fooditems->start_date, LONG_DATE_FORMAT); ?></td>
                                    <td> <?php echo getFormattedDateTime($fooditems->end_date, LONG_DATE_FORMAT); ?></td>
                                    <td><?php if($fooditems->status==1){echo display('active');}else{echo display('inactive');} ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('itemmanage','update')->access()): 
                                    ?>
									<a href="<?php echo base_url("itemmanage/item_food/addpromofood/$fooditems->id") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update')?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
									<?php endif;
                                    if($this->permission->method('itemmanage','promo_delete')->access()): ?>
                                    <a href="<?php echo base_url("itemmanage/item_food/promo_delete/$fooditems->id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete')?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>  
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                 <div class="text-right"></div>
            </div>
        </div>
    </div>
</div>
 
