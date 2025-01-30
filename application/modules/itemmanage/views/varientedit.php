<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">

                    <?php echo form_open('itemmanage/item_food/varientcreate'); ?>
                   	<?php echo form_hidden('variantid', (!empty($intinfo->variantid)?$intinfo->variantid:null)) ?>
                        <div class="form-group row">
                        <label for="itemname" class="col-sm-4 col-form-label"><?php echo display('item_name') ?>*</label>
                        <div class="col-sm-8 customesl">
                            <select name="foodid" id="select_food_id" class="form-control">
                            <?php 
                                if(empty($itemdropdown)){$itemdropdown = array('' => '--Select--');}
                                //echo form_dropdown('foodid',$itemdropdown,(!empty($intinfo->menuid)?$intinfo->menuid:null),'class="form-control"')
                                if (!empty($itemdropdown)) {
                                    foreach ($itemdropdown as $key => $item) {
                                        if (is_array($item)) { 
                                            $selected = (!empty($intinfo->menuid) && $intinfo->menuid == $key) ? 'selected' : '';
                                            echo '<option value="' . $key . '" data-cusine-type="' . $item['cusine_type'] . '" ' . $selected . '>'
                                                . $item['title'] . '</option>';
                                        } else {
                                            // Fallback for simple array values
                                            echo '<option value="' . $key . '">' . $item . '</option>';
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                        <div class="form-group row">
                            <?php 
                                if (!empty($intinfo->cusine_type)) {
                                    if ($intinfo->cusine_type == 2) {
                                        $varientName = 'Heads Count';
                                    } else {
                                        $varientName = 'Varient Name';
                                    }
                                } else {
                                    $varientName = '';
                                }
                            ?>
                            <!-- <label for="varientname" class="col-sm-4 col-form-label"><?php //echo display('varient_name') ?> *</label> -->
                            <label for="varientname" class="col-sm-4 col-form-label"><?php echo $varientName; ?> *</label>
                            <div class="col-sm-8">
                                <input name="varientname" class="form-control" type="text" placeholder="<?php echo display('add_varient') ?>" id="unitname" value="<?php echo (!empty($intinfo->variantName)?$intinfo->variantName:null) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label"><?php echo display('price') ?> *</label>
                            <div class="col-sm-8">
                                <input name="price" class="form-control" type="text" placeholder="<?php echo display('price') ?>" id="price" value="<?php echo (!empty($intinfo->price)?$intinfo->price:null) ?>"><a class="cattooltips" data-toggle="tooltip" data-placement="top" title=""><?php echo $currency->curr_icon;?></i></a>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>

        <script>
            $(document).on('change', '#select_food_id', function(){
                    const cusineType = $(this).find(':selected').data('cusine-type');
                    console.log('Selected Cusine Type:', cusineType);
                    if(cusineType == 2){
                        $('.select_varient_name').text(' ');
                        $('.select_varient_name').text('Heads Count* ');
                    } else {
                        $('.select_varient_name').text(' ');
                        $('.select_varient_name').text('Variant Name* ');
                    }
                })

        </script>
