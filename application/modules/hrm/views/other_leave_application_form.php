<link href="<?php echo base_url('application/modules/hrm/assets/css/other_leave_application_form_style.css') ?>"
    rel="stylesheet" type="text/css" />
<div class="form-group text-right">
    <?php if ($this->permission->method('hrm', 'create')->access()) : ?>
    <button type="button" class="btn btn-primary btn-md" data-target="#add" data-toggle="modal"><i
            class="fa fa-plus-circle" aria-hidden="true"></i>
        <?php echo display('others_leave_application'); ?></button>
    <?php endif; ?>
    <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
    <a href="<?php echo base_url(); ?>hrm/Leave/application_view"
        class="btn btn-primary"><?php echo display('manage_application'); ?></a>
    <?php endif; ?>
</div>
<!--  -->

<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail">

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('cid') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('leave_type') ?></th>
                            <th><?php echo display('apply_strt_date') ?></th>
                            <th><?php echo display('apply_end_date') ?></th>
                            <th><?php echo display('leave_aprv_strt_date') ?></th>
                            <th><?php echo display('leave_aprv_end_date') ?></th>
                            <th><?php echo display('apply_day') ?></th>
                            <th><?php echo display('num_aprv_day') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mang)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($mang as $row) { ?>
                        <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $row->first_name . ' ' . $row->last_name ?></td>
                            <td><?php echo $row->leave_type; ?></td>
                            <td><?php echo $row->apply_strt_date; ?></td>
                            <td><?php echo $row->apply_end_date; ?></td>
                            <td><?php echo $row->leave_aprv_strt_date; ?></td>
                            <td><?php echo $row->leave_aprv_end_date; ?></td>
                            <td><?php echo $row->apply_day; ?></td>
                            <td><?php echo $row->num_aprv_day; ?></td>
                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>


<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bgc-c-green-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><strong>Leave Application Form</strong></center>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">

                                </div>
                            </div>
                            <div class="panel-body">

                                <?php echo  form_open_multipart('hrm/leave/others_leave') ?>


                                <div class="form-group row">
                                    <label for="employee_no" class="col-sm-2 col-form-label">Select
                                        <?php echo display('employee_name') ?></label>
                                    <div class="col-sm-4">

                                        <?php if ($this->session->userdata('isAdmin') == 1 || $this->session->userdata('supervisor') == 1) { ?>
                                        <?php echo form_dropdown('employee_no', $dropdown, null, 'class="form-control width-100" id="employee_no"') ?>
                                        <?php } else { ?>
                                        <input type="text" name="employee_name" class="form-control"
                                            value="<?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?>"
                                            readonly>
                                        <input type="hidden" name="employee_no" id="employee_no" class="form-control"
                                            value="<?php echo $this->session->userdata('employee_no'); ?>">
                                        <?php } ?>

                                    </div> <label for="leave_type" class="col-sm-2 col-form-label">Select
                                        <?php echo display('leave_type') ?></label>
                                    <div class="col-sm-4">
                                        <?php echo form_dropdown('leave_type_id', $type, null, 'class="form-control width-100" onchange="leavetypechange(this.value)"') ?>
                                        <span id="enjoy" class="other_leave_application_form-css1"></span><span
                                            class="color-green" id="checkleave"></span>
                                    </div>
                                    <input type="hidden" name="apply_date" class="form-control" id="f"
                                        value="<?php echo date('Y-m-d') ?>">
                                </div>
                                <div class="form-group row">
                                    <!-- for leave leave type -->

                                    <label for="apply_strt_date" class="col-sm-2 col-form-label">
                                        <?php echo display('apply_strt_date') ?> </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="apply_strt_date"
                                            class="datepickerjs form-control apply_start" id="apply_start"
                                            placeholder="<?php echo display('apply_strt_date') ?>">
                                    </div>
                                    <label for="apply_end_date" class="col-sm-2 col-form-label">
                                        <?php echo display('apply_end_date') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="apply_end_date"
                                            class="datepickerjs form-control apply_end" id="apply_end"
                                            placeholder="<?php echo display('apply_end_date') ?>">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="apply_day" class="col-sm-2 col-form-label">
                                        <?php echo display('apply_day') ?> </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="apply_day" class="form-control apply_day"
                                            id="apply_day" placeholder="<?php echo display('apply_day') ?>" readonly>
                                    </div>
                                    <label for="apply_hard_copy" class="col-sm-2 col-form-label">
                                        <?php echo display('apply_hard_copy') ?></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="apply_hard_copy" class="form-control">

                                    </div>
                                </div>
                                <?php if ($this->session->userdata('isAdmin') == 1 || $this->session->userdata('supervisor') == 1) { ?>
                                <div class="form-group row">
                                    <label for="leave_aprv_strt_date" class="col-sm-2 col-form-label">
                                        <?php echo display('leave_aprv_strt_date') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="leave_aprv_strt_date"
                                            class="datepickerjs form-control leave_aprv_strt_date"
                                            id="leave_aprv_strt_date"
                                            placeholder="<?php echo display('leave_aprv_strt_date') ?>">

                                    </div>
                                    <label for="leave_aprv_end_date" class="col-sm-2 col-form-label">
                                        <?php echo display('leave_aprv_end_date') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="leave_aprv_end_date"
                                            class="datepickerjs form-control leave_aprv_end_date"
                                            id="leave_aprv_end_date"
                                            placeholder="<?php echo display('leave_aprv_end_date') ?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="num_aprv_day" class="col-sm-2 col-form-label">
                                        <?php echo display('num_aprv_day') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="num_aprv_day" class="form-control num_aprv_day"
                                            placeholder="<?php echo display('num_aprv_day') ?>" readonly>

                                    </div>
                                    <label for="approved_by" class="col-sm-2 col-form-label">
                                        <?php echo display('approved_by') ?></label>
                                    <div class="col-sm-4">
                                        <select name="approved_by" class="form-control width-100">
                                            <option value="">Select One</option>
                                            <?php foreach ($supr as $supervisor) { ?>
                                            <option value="<?php echo $supervisor->employee_no; ?>">
                                                <?php echo $supervisor->first_name . ' ' . $supervisor->last_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group row">

                                    <label for="reason"
                                        class="col-sm-2 col-form-label"><?php echo display('reason') ?></label>
                                    <div class="col-sm-10">
                                        <textarea name="reason" class="form-control"
                                            placeholder="<?php echo display('reason') ?>"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="approve_date" class="form-control"
                                            value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="reset"
                                        class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                                </div>
                                <?php echo form_close() ?>
								<input name="weekendn" id="weekendn" type="hidden" value="<?php echo $weekend ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">

        </div>

    </div>

</div>

</div>

<script src="<?php echo base_url('application/modules/hrm/assets/js/otherleave.js'); ?>" type="text/javascript"></script>