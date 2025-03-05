<div class="form-group text-right">
    <?php if ($this->permission->method('itemmanage', 'create')->access()): ?>
        <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i>
            <?php echo display('add_varient') ?></button>
    <?php endif; ?>

</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_varient'); ?></strong>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">

                            <div class="panel-body">

                                <?php echo  form_open('itemmanage/item_food/varientcreate') ?>
                                <?php echo form_hidden('variantid', (!empty($intinfo->variantid) ? $intinfo->variantid : null)) ?>
                                <div class="form-group row">
                                    <label for="itemname" class="col-sm-4 col-form-label"><?php echo display('item_name')
                                                                                            ?>*</label>
                                    <div class="col-sm-8 customesl">
                                        <select name="foodid" id="select_food_id" class="form-control">
                                            <?php
                                            if (empty($itemdropdown)) {
                                                $itemdropdown = array('' => '--Select--');
                                            }
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
                                    <label for="varientname" class="col-sm-4 col-form-label select_varient_name"><?php echo display('varient_name') ?> *</label>
                                    <div class="col-sm-8">
                                        <input name="varientname" class="form-control" type="text" placeholder="<?php echo display('add_varient') ?>" id="unitname" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 col-form-label"><?php echo display('price') ?> *</label>
                                    <div class="col-sm-8">
                                        <input name="price" class="form-control" type="text" placeholder="<?php echo display('price') ?>" id="price" value=""><a class="cattooltips" data-toggle="tooltip" data-placement="top" title=""><?php echo $currency->curr_icon; ?></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="takeawayPrice" class="col-sm-4 col-form-label">Takeaway Price <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="takeawayPrice" class="form-control" type="text" placeholder="Enter Takeaway Price" id="takeawayPrice" value="" /><a class="cattooltips" data-toggle="tooltip" data-placement="top" title=""><?php echo $currency->curr_icon; ?></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uberEatsPrice" class="col-sm-4 col-form-label">Uber Eats / Doordash Price <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="uberEatsPrice" class="form-control" type="text" placeholder="Enter Uber Eats / Doordash Price" id="uberEatsPrice" value="" /><a class="cattooltips" data-toggle="tooltip" data-placement="top" title=""><?php echo $currency->curr_icon; ?></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="webOrderPrice" class="col-sm-4 col-form-label">Web Order Price <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="webOrderPrice" class="form-control" type="text" placeholder="Enter Web Order Price" id="webOrderPrice" value="" /><a class="cattooltips" data-toggle="tooltip" data-placement="top" title=""><?php echo $currency->curr_icon; ?></i></a>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <div class="modal-footer">

            <script>
                $(document).on('change', '#select_food_id', function() {
                    const cusineType = $(this).find(':selected').data('cusine-type');
                    console.log('Selected Cusine Type:', cusineType);
                    if (cusineType == 2) {
                        $('.select_varient_name').text(' ');
                        $('.select_varient_name').text('Heads Count* ');
                    } else {
                        $('.select_varient_name').text(' ');
                        $('.select_varient_name').text('Variant Name* ');
                    }
                })
            </script>

        </div>

    </div>

</div>

<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('variant_edit'); ?></strong>
            </div>
            <div class="modal-body editinfo">

            </div>

        </div>
        <div class="modal-footer">

        </div>

    </div>

</div>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail">

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('varient_name') ?></th>
                            <th><?php echo display('item_name') ?></th>
                            <th><?php echo 'Cusine Type'; ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($fooditemslist)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($fooditemslist as $varient) { ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $varient->variantName; ?></td>
                                    <td><?php echo $varient->ProductName; ?></td>
                                    <td><?php echo getCusineTypeName($varient->cusine_type); ?></td>
                                    <td class="center">
                                        <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>

                                            <a onclick="editvarient('<?php echo $varient->variantid; ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <?php endif;
                                        if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                            <a href="<?php echo base_url("itemmanage/item_food/deletevarient/$varient->variantid") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                                <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
                <div class="text-right"></div>
            </div>
        </div>
    </div>
</div>