<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'meal_deals'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <!--  table area -->
    <div class="col-sm-12 mt-5">

        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('image') ?></th>
                            <th><?php echo 'Group Name'; ?></th>
                            <th><?php echo display('category_name') ?></th>
                            <th><?php echo 'Item Name'; ?></th>
                            <th><?php echo 'Cusine Type'; ?></th> 
                            <th><?php echo display('component') ?></th>
                            <th><?php echo display('vat_tax') ?></th>  
                            <th>BOM</th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($fooditemslist)) { 
						?>
                            <?php $sl =  $pagenum+1; ?>
                            
                            <?php foreach ($fooditemslist as $fooditems) { ?>
                                <?php $variant_dtls = get_menu_prices($fooditems->ProductsID);?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo base_url(!empty($fooditems->ProductImage)?$fooditems->ProductImage:'assets/img/icons/default.jpg'); ?>" alt="Image" width="80" ></td>
                                     <td class="text-center"><?php echo get_category_name($fooditems->GroupID); ?></td>
                                    <td class="text-center"><?php if($fooditems->isgroup==1): echo "<strong class='text-success'>Promotions</strong>"; else: echo $fooditems->Name; endif;?></td>
                                    <td> <?php echo $fooditems->ProductName .  ($fooditems->is_bom == 1 ? ' (With BOM)' : ''); ?></td>
                                    <td><?php echo getCusineTypeName($fooditems->cusine_type); ?></td>
                                    <td><?php echo $fooditems->component; ?></td>
                                    <td><?php echo $fooditems->productvat; ?> %</td>
                                    <td><?php if($fooditems->is_bom==1){echo display('YES');}else{echo display('NO');} ?></td>
                                    <td><?php if($fooditems->ProductsIsActive==1){echo display('active');}else{echo display('inactive');} ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('itemmanage','update')->access()): 
									if($fooditems->isgroup==1){
									?>
                                        <a href="<?php echo base_url("itemmanage/item_food/addgroupfood/$fooditems->ProductsID") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                        <?php 
									}else{?>
                                    <a href="<?php echo base_url("itemmanage/item_food/create_new/$fooditems->ProductsID") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update')?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
									<?php }endif; 
										 if($this->permission->method('itemmanage','delete')->access()): ?>
                                        <a href="<?php echo base_url("itemmanage/item_food/delete/$fooditems->ProductsID") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete')?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>  
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
 
