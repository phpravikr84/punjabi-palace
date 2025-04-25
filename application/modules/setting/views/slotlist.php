<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        <?php echo display('slot_list')?> 
                        <a href="<?php echo base_url('setting/slots/create') ?>" class="btn btn-primary btn-sm pull-right"> 
                            <i class="fa fa-plus"></i> <?php echo 'Add Slot'; ?>
                        </a>
                    </h4>
                </div>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo 'Sl No'; ?></th>
                            <th><?php echo 'Day'; ?></th>
                            <th><?php echo 'Start Time'; ?></th>
                            <th><?php echo 'End Time'; ?></th>
                            <th><?php echo 'Status'; ?></th>
                            <th><?php echo 'Action'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($slotlist)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($slotlist as $slot) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $slot->day_name; ?></td>
                                    <td><?php echo $slot->start_time; ?></td>
                                    <td><?php echo $slot->end_time; ?></td>
                                    <td><?php echo ($slot->is_active == 1) ? display('active') : display('inactive'); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("setting/slots/create/$slot->slot_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url("setting/slots/delete/$slot->slot_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure')?>')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr><td colspan="6" class="text-center"><?php echo display('no_record_found')?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo $links; ?>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 15,
        defaultTime: '08:00'
    });
});
</script>