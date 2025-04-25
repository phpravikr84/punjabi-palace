<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo !empty($intinfo->slot_id) ? display('slot_edit') : display('add_new_slot'); ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open('setting/slots/create'); ?>
                <?php if (!empty($intinfo->slot_id)): ?>
                    <?php echo form_hidden('slot_id', !empty($intinfo->slot_id) ? $intinfo->slot_id : ''); ?>
                <?php endif; ?>

                <div class="form-group row">
                    <label for="day_id" class="col-sm-2 col-form-label"><?php echo 'Day'; ?> *</label>
                    <div class="col-sm-4">
                        <select name="day_id" class="form-control" required>
                            <option value=""><?php echo display('select_day'); ?></option>
                            <?php foreach($daylist as $day): ?>
                                <option value="<?php echo $day->day_id; ?>" <?php echo (!empty($intinfo->day_id) && $intinfo->day_id == $day->day_id) ? 'selected' : ''; ?>>
                                    <?php echo $day->day_name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_time" class="col-sm-2 col-form-label"><?php echo 'Start Time'; ?> *</label>
                    <div class="col-sm-4">
                        <input name="start_time" class="form-control timepicker" type="text"
                               placeholder="<?php echo display('start_time'); ?>"
                               value="<?php echo !empty($intinfo->start_time) ? $intinfo->start_time : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="end_time" class="col-sm-2 col-form-label"><?php echo 'End time'; ?> *</label>
                    <div class="col-sm-4">
                        <input name="end_time" class="form-control timepicker" type="text"
                               placeholder="<?php echo display('end_time'); ?>"
                               value="<?php echo !empty($intinfo->end_time) ? $intinfo->end_time : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_active" class="col-sm-2 col-form-label"><?php echo 'Status'; ?> *</label>
                    <div class="col-sm-4">
                        <select name="is_active" class="form-control" required>
                            <option value="1" <?php echo (isset($intinfo->is_active) && $intinfo->is_active == 1) ? 'selected' : ''; ?>>
                                <?php echo display('active'); ?>
                            </option>
                            <option value="0" <?php echo (isset($intinfo->is_active) && $intinfo->is_active == 0) ? 'selected' : ''; ?>>
                                <?php echo display('inactive'); ?>
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5">
                        <?php echo !empty($intinfo->slot_id) ? display('update') : display('save'); ?>
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Timepicker Script -->
<script>
    $(document).ready(function () {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm:ss',
            interval: 15,
            defaultTime: '08:00'
        });
    });
</script>
