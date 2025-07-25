<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : null) ?></h4>
                </div>
            </div>
            <div class="panel-body">

                <?php echo  form_open('hrm/Employees/update_payment_form/' . $data->emp_sal_pay_id) ?>


                <input name="emp_sal_pay_id" type="hidden" value="<?php echo $data->emp_sal_pay_id ?>">

                <div class="form-group row">
                    <label for="employee_no" class="col-sm-3 col-form-label"><?php echo display('employee_no') ?>
                        *</label>
                    <div class="col-sm-9">
                        <input type="text" name="empname" class="form-control" id="employee_no"
                            value="<?php echo $data->first_name . ' ' . $data->last_name; ?>">
                        <input type="hidden" name="employee_no" class="form-control" id="employee_no"
                            value="<?php echo $data->employee_no ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="total_salary" class="col-sm-3 col-form-label"><?php echo display('total_salary') ?>
                        *</label>
                    <div class="col-sm-9">
                        <input type="text" name="total_salary" class="form-control" id="total_salary"
                            value="<?php echo $data->total_salary ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="total_working_minutes"
                        class="col-sm-3 col-form-label"><?php echo display('total_working_minutes') ?> *</label>
                    <div class="col-sm-9">
                        <input type="text" name="total_working_minutes" class="form-control" id="total_working_minutes"
                            value="<?php echo $data->total_working_minutes ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="working_period" class="col-sm-3 col-form-label"><?php echo display('working_period') ?>
                        *</label>
                    <div class="col-sm-9">
                        <input type="text" name="working_period" class="form-control" id="working_period"
                            value="<?php echo $data->working_period ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="payment_due" class="col-sm-3 col-form-label"><?php echo display('payment_due') ?>
                        *</label>
                    <div class="col-sm-9">

                        <select name="payment_due" class="form-control" id="payment_due">
                            <option value="unpaid"><?php echo display('unpaid'); ?></option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_date" class="col-sm-3 col-form-label"><?php echo display('payment_date') ?>
                        *</label>
                    <div class="col-sm-9">
                        <input type="text" name="payment_date" class="datepicker form-control" id="payment_date"
                            value="<?php echo $data->payment_date ?>" />
                    </div>
                </div>



                <div class="form-group text-right">

                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('paid') ?></button>
                </div>

                <?php echo form_close() ?>


            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/hrm/assets/js/paymentview.js'); ?>" type="text/javascript"></script>