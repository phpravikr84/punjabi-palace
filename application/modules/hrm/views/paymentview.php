<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail">

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('employee_name') ?></th>
                            <th><?php echo display('employee_no') ?></th>
                            <th><?php echo display('total_salary') ?></th>
                            <th><?php echo display('total_working_minutes') ?></th>
                            <th><?php echo display('working_period') ?></th>
                            <th><?php echo display('payment_due') ?></th>
                            <th><?php echo display('payment_date') ?></th>
                            <th><?php echo display('paid_by') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_pay)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($emp_pay as $que) { ?>
                        <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $que->first_name . ' ' . $que->last_name; ?></td>
                            <td><?php echo $que->employee_no; ?></td>
                            <td><?php echo $que->total_salary; ?></td>
                            <td><?php echo $que->total_working_minutes; ?></td>
                            <td><?php echo $que->working_period; ?></td>
                            <td><?php echo $que->payment_due; ?></td>
                            <td><?php echo $que->payment_date; ?></td>
                            <td><?php echo $que->paid_by; ?></td>
                            <td class="center">
                                <?php if ($this->permission->method('hrm', 'update')->access()) : ?>
                                <?php
                                            if ($que->payment_due == 'paid') {
                                                echo 'Paid';
                                            } else { ?>

                                <a href='#' class='btn btn-success btn-xs'
                                    onclick='Payment(<?php echo $que->emp_sal_pay_id; ?>,"<?php echo $que->employee_no; ?>","<?php echo $que->total_salary; ?>","<?php echo $que->total_working_minutes; ?>","<?php echo $que->working_period; ?>")'><?php echo display('pay_now') ?></a>
                                <?php  }

                                            ?>
                                <?php endif; ?>

                                <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                <a href="<?php echo base_url("hrm/Employees/delete_payment/$que->emp_sal_pay_id") ?>"
                                    class="btn btn-xs btn-danger"
                                    onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i
                                        class="fa fa-trash"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
            </div>
        </div>
    </div>
    <div id="PaymentMOdal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bgc-c-green-white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <strong>
                        <center> <?php echo display('payment') ?></center>
                    </strong>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4><?php echo 'Payment Form'; ?></h4>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <?php echo  form_open('hrm/Employees/payconfirm/' . $data->emp_sal_pay_id) ?>


                                    <input name="emp_sal_pay_id" id="salType" type="hidden" value="">

                                    <div class="form-group row">
                                        <label for="employee_no"
                                            class="col-sm-3 col-form-label"><?php echo display('employee_name') ?>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="empname" class="form-control" id="employee_name"
                                                value="" readonly>
                                            <input type="hidden" name="employee_no" class="form-control"
                                                id="employee_no" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="total_salary"
                                            class="col-sm-3 col-form-label"><?php echo display('total_salary') ?>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="total_salary" class="form-control"
                                                id="total_salary" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="total_working_minutes"
                                            class="col-sm-3 col-form-label"><?php echo display('total_working_minutes') ?>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="total_working_minutes" class="form-control"
                                                id="total_working_minutes" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="working_period"
                                            class="col-sm-3 col-form-label"><?php echo display('working_period') ?>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="working_period" class="form-control"
                                                id="working_period" value="" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">&times;
                                        <?php echo display('cancel')?></button>
                                        <button type="submit"
                                            class="btn btn-primary"><?php echo display('confirm') ?></button>
                                    </div>

                                    <?php echo form_close() ?>


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
<script src="<?php echo base_url('application/modules/hrm/assets/js/paymentview.js'); ?>" type="text/javascript"></script>