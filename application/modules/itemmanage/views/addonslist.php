<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo 'Modifier Set Name'; ?></th>
                            <th><?php echo 'Modifier Items' ?></th>
                            <th><?php echo display('price') ?></th> 
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($addonslist)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($addonslist as $addons) { ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $addons->name; ?></td>
                                    <td><?php echo $addons->add_on_names; ?></td> <!-- Now comma-separated -->
                                    <td>
                                        <?php echo $addons->prices; ?> <!-- Now comma-separated -->(In <?php echo $currency->curr_icon; ?>)
                                    </td>
                                    <td><?php echo ($addons->is_active == 1) ? display('active') : display('inactive'); ?></td>
                                    <td class="center">
                                        <?php if ($this->permission->method('itemmanage', 'update')->access()) : ?>
                                            <a href="<?php echo base_url("itemmanage/menu_addons/create/$addons->group_id") ?>" 
                                            class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        <?php endif;
                                        if ($this->permission->method('itemmanage', 'delete')->access()) : ?>
                                            <a href="<?php echo base_url("itemmanage/menu_addons/deleteModifiers/$addons->group_id") ?>" 
                                            onclick="return confirm('<?php echo display("are_you_sure") ?>')" 
                                            class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete') ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
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
 
