<div class="form-group text-right">
    <?php if ($this->permission->method('setting', 'create')->access()): ?>
        <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <?php echo display('unit_add'); ?>
        </button>
    <?php endif; ?>
</div>

<!-- Add Modal -->
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('unit_add'); ?></strong>
            </div>
            <div class="modal-body">
                <?php echo form_open('setting/unitmeasurement/create'); ?>
                <div class="form-group row">
                    <label for="unitname" class="col-sm-3 col-form-label">
                        <?php echo display('unit_name'); ?> *
                    </label>
                    <div class="col-sm-9">
                        <input name="unitname" class="form-control" type="text" placeholder="<?php echo display('unit_name'); ?>" id="unitname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="shortname" class="col-sm-3 col-form-label">
                        <?php echo display('unit_short_name'); ?>
                    </label>
                    <div class="col-sm-9">
                        <input name="shortname" class="form-control" type="text" placeholder="<?php echo display('unit_short_name'); ?>" id="shortname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">
                        <?php echo display('status'); ?>
                    </label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option value="" selected><?php echo display('select_option'); ?></option>
                            <option value="1"><?php echo display('active'); ?></option>
                            <option value="0"><?php echo display('inactive'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary w-md m-b-5">
                        <?php echo display('reset'); ?>
                    </button>
                    <button type="submit" class="btn btn-success w-md m-b-5">
                        <?php echo display('add'); ?>
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('unit_update'); ?></strong>
            </div>
            <div class="modal-body editinfo"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-body">
                <table width="100%" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl'); ?></th>
                            <th><?php echo display('unit_name'); ?></th>
                            <th><?php echo display('unit_short_name'); ?></th>
                            <th><?php echo display('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($unitlist)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($unitlist as $unit) { ?>
                                <tr class="<?php echo ($sl & 1) ? 'odd gradeX' : 'even gradeC'; ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $unit->uom_name; ?></td>
                                    <td><?php echo $unit->uom_short_code; ?></td>
                                    <td class="center">
                                        <?php if ($this->permission->method('setting', 'update')->access()): ?>
                                            <input name="url" type="hidden" id="url_<?php echo $unit->id; ?>" value="<?php echo base_url('setting/unitmeasurement/updateunitfrm'); ?>" />
                                            <a onclick="editinfo('<?php echo $unit->id; ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update'); ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($this->permission->method('setting', 'delete')->access()): ?>
                                            <a href="<?php echo base_url('setting/unitmeasurement/delete/' . $unit->id); ?>" onclick="return confirm('<?php echo display('are_you_sure'); ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete'); ?>">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-right"> <?php echo @$links; ?> </div>
            </div>
        </div>
    </div>
</div>