<link href="<?php echo base_url('application/modules/hrm/assets/css/employ_form_style.css') ?>" rel="stylesheet"
    type="text/css" />
<div class="row">
    <div class="customcon margin-0">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><?php echo display('basic_info') ?></a></li>
            <li><a data-toggle="tab" href="#menu1"><?php echo display('positional_info') ?></a></li>
            <li><a data-toggle="tab" href="#menu2"><?php echo display('benefits') ?></a></li>

            <li><a data-toggle="tab" href="#menu3"><?php echo display('supervisor') ?></a></li>
            <li><a data-toggle="tab" href="#menu4"><?php echo display('biographical_info') ?></a></li>
            <li><a data-toggle="tab" href="#menu5"><?php echo display('additional_address') ?></a></li>
            <li><a data-toggle="tab" href="#menu6"><?php echo display('emerg_contct') ?></a></li>
            <li><a data-toggle="tab" href="#menu7"><?php echo display('custom') ?></a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <?php echo  form_open_multipart('hrm/Employees/create_employee', 'id="emp_form"') ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="first_name"><?php echo display('first_name') ?><sup
                                                    class="color-red ">*</sup></label>

                                            <div class="input__holder">
                                                <input id="first_name" name="first_name" type="text"
                                                    class="form-control" placeholder="First Name">
                                                <span id="first_name-error" class="input__error">!</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('last_name') ?></label>

                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Your Last Name">

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="email"><?php echo display('email') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Your Email">
                                                <span id="email-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="phone"><?php echo display('phone') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                    placeholder="Your Phone Number">
                                                <span id="phone-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="country"><?php echo display('country') ?></label>
                                            <?php echo form_dropdown('country', $allcountry, (!empty($emp->country) ? $emp->country : "Bangladesh"), ' class="form-control" onchange="getstate()" id="country"') ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group" id="state">
                                            <label for="state"><?php echo display('state') ?></label>
                                            <?php echo form_dropdown('state', '', (!empty($emp->state) ? $emp->state : "York"), ' class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="city"><?php echo display('city') ?> </label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="zip_code"><?php echo display('zip_code') ?></label>
                                            <input type="number" class="form-control" id="zip_code" name="zip_code"
                                                placeholder="Your Zip Code">
                                        </div>
                                    </div>

                                </div>
                                <fieldset class="border p-2">
                                    <legend class="w-auto"><?php echo display('logininfo') ?></legend>
                                </fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city"><?php echo display('User_Login_Email') ?> </label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="<?php echo display('username') ?> ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="zip_code"><?php echo display('password') ?></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="<?php echo display('password') ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-right">
                                    <input type="button" class="btn btn-primary btnNext" onclick="valid_inf()"
                                        value="<?php echo display('next') ?>">

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dept_id"><?php echo display('division'); ?> <sup
                                                    class="color-red ">*</sup></label><br>
                                            <div class="input__holder">
                                                <select name="division" id="division" class="form-control">
                                                    <option value=""> Select Division</option>
                                                    <?php

                                                    foreach ($dropdowndept as $division) {
                                                        if ($division_type == 0) {
                                                            if ($division_type == 0) {
                                                                echo '</optgroup>';
                                                            }
                                                            echo '<optgroup label="' . $division['department_name'] . '">';
                                                        }
                                                        $vl = $this->db->select('*')->from('department')->where('parent_id', $division['dept_id'])->get()->result();
                                                        foreach ($vl as $dv) {
                                                            echo '<option value="' . $dv->dept_id . '">' . $dv->department_name . '</option>';
                                                        }
                                                        $division_type = $division['parent_id'];
                                                    }
                                                    if ($division_type == 0) {
                                                        echo '</optgroup>';
                                                    }
                                                    ?>
                                                </select>
                                                <span id="division-error" class="input__error">!</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="designation"><?php echo display('designation'); ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <select name="pos_id" id="designation" class="form-control">
                                                    <option value="">select Designation</option>
                                                    <?php

                                                    foreach ($dropdown as $desig) { ?>
                                                    <option value="<?php echo $desig->pos_id ?>">
                                                        <?php echo $desig->position_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="designation-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period"><?php echo display('duty_type') ?> </label><br>
                                            <select name="duty_type" class="form-control">
                                                <option value="1"> Full Time</option>
                                                <option value="2"> Part Time</option>
                                                <option value="3"> Contructual</option>
                                                <option value="4"> Other</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('hire_date') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control datepicker" name="hiredate"
                                                    id="hiredate" placeholder="Hire date">
                                                <span id="hiredate-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('original_h_date') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control datepicker" name="ohiredate"
                                                    id="ohiredate" placeholder="Original Hire date">
                                                <span id="ohiredate-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('termination_date') ?> </label>
                                            <input type="text" class="form-control datepicker" name="terminatedate"
                                                id="tdate" placeholder="Termination date">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('termination_reason') ?></label>
                                            <textarea class="form-control" name="termreason" id="treason"
                                                placeholder="Termination Reason"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period"><?php echo display('voluntary_termination') ?></label>
                                            <select name="volunt_termination" class="form-control">
                                                <option value="1"> <?php echo display('yes') ?></option>
                                                <option value="2"><?php echo display('no') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('re_hire_date') ?></label>
                                            <input type="text" class="form-control datepicker" name="rehiredate"
                                                id="rhdate" placeholder="Rehire date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period"><?php echo display('rate_type') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <select name="rate_type" id="rate_type" class="form-control">
                                                    <option value="1">Hourly</option>
                                                    <option value="2">Salary</option>
                                                </select>
                                                <span id="rate_type-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('s_rate') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="number" class="form-control" name="rate" id="rate"
                                                    placeholder="Rate">
                                                <span id="rate-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period"><?php echo display('pay_frequency') ?> <sup
                                                    class="color-red ">*</sup></label><br>
                                            <div class="input__holder">
                                                <select name="pay_frequency" id="pay_frequency" class="form-control">
                                                    <option value="">Select Frequency</option>
                                                    <option value="1">Weekly</option>
                                                    <option value="2">Biweekly</option>
                                                    <option value="3">Annual</option>
                                                    <option value="4">Monthly</option>
                                                </select>
                                                <span id="pay_frequency-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('pay_frequency_txt') ?></label>
                                            <input type="text" class="form-control" name="pay_f_text" id="qfre_text"
                                                placeholder="Rate">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('hourly_rate2') ?></label>
                                            <input type="number" class="form-control" name="h_rate2" id="rate2"
                                                placeholder="Hourly Rate">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('hourly_rate3') ?></label>
                                            <input type="number" class="form-control" name="h_rate3" id="rate3"
                                                placeholder="Hourly Rate">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('home_department') ?></label>
                                            <input type="text" class="form-control" name="h_department" id="rate3"
                                                placeholder="Hourly Rate">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="work_hour"><?php echo display('department_text') ?></label>
                                            <input type="text" class="form-control" name="h_dep_text" id="hdptext"
                                                placeholder="Hourly Rate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf2()"
                                    value="<?php echo display('next') ?>">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dfs"><?php echo display('benifit_class_code') ?></label>
                                            <input type="text" class="form-control" id="bnfid" name="benifit_c_code[]"
                                                placeholder="Benifit Class Code">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('benifit_desc') ?></label>
                                            <input type="text" class="form-control" id="benifit_c_code_d"
                                                name="benifit_c_code_d[]"
                                                placeholder="<?php echo display('benifit_desc') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('benifit_acc_date') ?> </label>
                                            <input type="text" class="form-control datepicker" name="benifit_acc_date[]"
                                                placeholder="Benefit Accrual Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status"><?php echo display('benifit_sta') ?> <sup
                                                    class="color-red "></sup></label>
                                            <select name="benifit_sst[]" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div id="addbenifit" class="toggle">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dfs"><?php echo display('benifit_class_code') ?></label>
                                                <input type="text" class="form-control" id="bnfid"
                                                    name="benifit_c_code[]" placeholder="Benifit Class Code">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="l_name"><?php echo display('benifit_desc') ?></label>
                                                <input type="text" class="form-control" id="benifit_c_code_d"
                                                    name="benifit_c_code_d[]"
                                                    placeholder="<?php echo display('benifit_desc') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="l_name"><?php echo display('benifit_acc_date') ?> </label>
                                                <input type="text" class="form-control datepicker"
                                                    name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="status"><?php echo display('benifit_sta') ?> <sup
                                                        class="color-red "></sup></label>
                                                <select name="benifit_sst[]" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div id="addbenifit" class="toggle">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="dfs"><?php echo display('benifit_class_code') ?></label>
                                                    <input type="text" class="form-control" id="bnfid"
                                                        name="benifit_c_code[]" placeholder="Benifit Class Code">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="l_name"><?php echo display('benifit_desc') ?></label>
                                                    <input type="text" class="form-control" id="benifit_c_code_d"
                                                        name="benifit_c_code_d[]"
                                                        placeholder="<?php echo display('benifit_desc') ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="l_name"><?php echo display('benifit_acc_date') ?>
                                                    </label>
                                                    <input type="text" class="form-control datepicker"
                                                        name="benifit_acc_date[]" placeholder="Benefit Accrual Date">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="status"><?php echo display('benifit_sta') ?> <sup
                                                            class="color-red "></sup></label>
                                                    <select name="benifit_sst[]" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div id="addbenifit" class="toggle">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="dfs"><?php echo display('benifit_class_code') ?></label>
                                                        <input type="text" class="form-control" id="bnfid"
                                                            name="benifit_c_code[]" placeholder="Benifit Class Code">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="l_name"><?php echo display('benifit_desc') ?></label>
                                                        <input type="text" class="form-control" id="benifit_c_code_d"
                                                            name="benifit_c_code_d[]"
                                                            placeholder="<?php echo display('benifit_desc') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="l_name"><?php echo display('benifit_acc_date') ?>
                                                        </label>
                                                        <input type="text" class="form-control datepicker"
                                                            name="benifit_acc_date[]"
                                                            placeholder="Benefit Accrual Date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="status"><?php echo display('benifit_sta') ?> <sup
                                                                class="color-red "></sup></label>
                                                        <select name="benifit_sst[]" class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="2">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right">

                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="button" class="btn btn-primary btnNext" onclick="valid_inf3()"
                                        value="<?php echo display('next') ?>">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- class -->

            <!-- supervisor -->
            <div id="menu3" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="s_name"><?php echo display('super_visor_name') ?></label>
                                            <select name="supervisorname" class="form-control">
                                                <?php foreach ($supervisor as $suplist) { ?>
                                                <option value="<?php echo $suplist->employee_no ?>">
                                                    <?php echo $suplist->first_name . ' ' . $suplist->last_name ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('is_super_visor') ?></label>
                                            <select name="is_supervisor" class="form-control">
                                                <option value="1"><?php echo display('yes')?></option>
                                                <option value="0"><?php echo display('no')?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reports"><?php echo display('supervisor_report') ?> </label>
                                            <input type="text" class="form-control" name="reports"
                                                placeholder="<?php echo display('reports')?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-right">

                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="button" class="btn btn-primary btnNext" onclick="valid_inf4()"
                                        value="<?php echo display('next') ?>">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu4" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="s_name"><?php echo display('dob') ?><sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control datepicker" id="dob" name="dob"
                                                    placeholder="<?php echo display('dob') ?>">
                                                <span id="dob-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender"><?php echo display('gender') ?><sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="2">Other</option>
                                                </select>
                                                <span id="gender-error" class="input__error">!</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reports"><?php echo display('marital_stats') ?> </label>
                                            <select name="marital_status" class="form-control">
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Divorced</option>
                                                <option value="4">Widowed</option>
                                                <option value="5">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="s_name"><?php echo display('ethnic_group') ?></label>
                                            <input type="text" class="form-control" id="ethnic" name="ethnic"
                                                placeholder="<?php echo display('ethnic_group') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="eeo_class"><?php echo display('eeo_class_gp') ?></label>
                                            <input type="text" class="form-control" id="eeo_class" name="eeo_class"
                                                placeholder="<?php echo display('eeo_class_gp') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ssn"><?php echo display('ssn') ?></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="ssn" name="ssn"
                                                    placeholder="<?php echo display('ssn') ?>">
                                                <span id="ssn-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="w_s"><?php echo display('work_in_state') ?></label>
                                            <select name="w_s" class="form-control">
                                                <option value="1"><?php echo display('yes')?></option>
                                                <option value="2"><?php echo display('no')?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_in_s"><?php echo display('live_in_state') ?></label>
                                            <select name="l_in_s" class="form-control">
                                                <option value="1"><?php echo display('yes')?></option>
                                                <option value="2"><?php echo display('no')?></option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="citizenship"><?php echo display('citizenship') ?></label>
                                            <select name="citizenship" class="form-control">
                                                <option value="1"> Citizen</option>
                                                <option value="0"> Non-citizen</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <label for="picture"><?php echo display('picture') ?></label>
                                        <input type="file" accept="image/*" name="picture" onchange="loadFile(event)">
                                        <small id="fileHelp" class="text-muted"><img
                                                src="<?php echo base_url(); ?>event/css/images/user.jpg" id="output"
                                                class="img-thumbnail profile-height-width" />
                                        </small>
                                    </div>

                                </div>

                                <div class="form-group text-right">

                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="button" class="btn btn-primary btnNext" onclick="valid_inf5()"
                                        value="<?php echo display('next') ?>">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu5" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="s_name"><?php echo display('home_email') ?></label>
                                            <input type="email" class="form-control" id="h_email" name="h_email"
                                                placeholder="<?php echo display('home_email')?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="b_email"><?php echo display('business_email') ?></label>
                                            <input type="email" class="form-control" id="b_email" name="b_email"
                                                placeholder="<?php echo display('business_email') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="h_phone"><?php echo display('home_phone') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="h_phone" name="h_phone"
                                                    placeholder="<?php echo display('home_phone') ?>">
                                                <span id="h_phone-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="w_phone"><?php echo display('business_phone') ?> </label>
                                            <input type="text" class="form-control" id="w_phone" name="w_phone"
                                                placeholder="<?php echo display('business_phone') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="c_phone"><?php echo display('cell_phone') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="c_phone" name="c_phone"
                                                    placeholder="<?php echo display('cell_phone') ?>">
                                                <span id="c_phone-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right">

                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="button" class="btn btn-primary btnNext" onclick="valid_inf6()"
                                        value="<?php echo display('next') ?>">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu6" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="s_name"><?php echo display('emerg_contct') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="em_contact"
                                                    name="em_contact" placeholder="Emergency Contact">
                                                <span id="em_contact-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="e_h_phone"><?php echo display('emerg_home_phone') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="e_h_phone" name="e_h_phone"
                                                    placeholder="<?php echo display('emerg_home_phone') ?>">
                                                <span id="e_h_phone-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="e_w_phone"><?php echo display('emrg_w_phone') ?> <sup
                                                    class="color-red ">*</sup></label>
                                            <div class="input__holder">
                                                <input type="text" class="form-control" id="e_w_phone" name="e_w_phone"
                                                    placeholder="<?php echo display('emrg_w_phone') ?>">
                                                <span id="e_w_phone-error" class="input__error">!</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="e_c_relation"><?php echo 'Emergency Contact Relation' ?>
                                            </label>
                                            <input type="text" class="form-control" id="e_c_relation"
                                                name="e_c_relation"
                                                placeholder="<?php echo display('emer_con_rela') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alt_em_cont"><?php echo display('alt_em_contct') ?></label>
                                            <input type="text" class="form-control" id="alt_em_cont" name="alt_em_cont"
                                                placeholder="<?php echo display('alt_em_contct') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="a_e_h_phone"><?php echo display('alt_emg_h_phone') ?> </label>
                                            <input type="text" class="form-control" id="a_e_h_phone" name="a_e_h_phone"
                                                placeholder="<?php echo display('alt_emg_h_phone') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="a_e_w_phone"><?php echo display('alt_emg_w_phone') ?></label>
                                            <input type="text" class="form-control" id="a_e_w_phone" name="a_e_w_phone"
                                                placeholder="<?php echo display('alt_emg_w_phone') ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group text-right">
                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="button" class="btn btn-success" value="<?php echo display('next') ?>" onclick="valid_inf7()">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu7" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">

                            <div class="panel-body">
                                <span>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="c_f_name"><?php echo display('custfldname') ?></label>
                                                <input type="text" class="form-control" id="c_f_name" name="c_f_name[]"
                                                    placeholder="<?php echo display('custfldname') ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="c_f_type"><?php echo display('custfldtype') ?></label>
                                                <select name="c_f_type[]" class="form-control">
                                                    <option value="1">Text</option>
                                                    <option value="2">Date</option>
                                                    <option value="3">Text Area</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="reports"><?php echo display('customvalue') ?> </label>
                                                <input type="text" name="customvalue[]" class="form-control"
                                                    placeholder="<?php echo display('customvalue') ?>">

                                            </div>
                                        </div>

                                    </div>

                                </span>
                                <div id="add" class="toggle">
                                    <span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="c_f_name"><?php echo display('custfldname') ?></label>
                                                    <input type="text" class="form-control" id="c_f_name"
                                                        name="c_f_name[]" placeholder="<?php echo display('custfldname') ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="c_f_type"><?php echo display('custfldtype') ?></label>
                                                    <select name="c_f_type[]" class="form-control">
                                                        <option value="1">Text</option>
                                                        <option value="2">Date</option>
                                                        <option value="3">Text Area</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reports"><?php echo display('customvalue') ?></label>
                                                    <input type="text" name="customvalue[]" class="form-control"
                                                        placeholder="<?php echo display('customvalue') ?>">

                                                </div>
                                            </div>

                                        </div>
                                    </span>
                                    <div id="add" class="toggle">
                                        <span>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="c_f_name"><?php echo display('custfldname') ?></label>
                                                        <input type="text" class="form-control" id="c_f_name"
                                                            name="c_f_name[]" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="c_f_type"><?php echo display('custfldtype') ?></label>
                                                        <select name="c_f_type[]" class="form-control">
                                                            <option value="1">Text</option>
                                                            <option value="2">Date</option>
                                                            <option value="3">Text Area</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="reports"><?php echo display('customvalue') ?> </label>
                                                        <input type="text" name="customvalue[]" class="form-control"
                                                            placeholder="<?php echo display('customvalue') ?>">

                                                    </div>
                                                </div>

                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <input type="button" class="btn btn-primary btnPrevious" value="<?php echo display('sPrevious') ?>">
                                    <input type="submit" class="btn btn-success" onclick="valid_inf8()" value="<?php echo display('save') ?>">
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/hrm/assets/js/addemployee.js'); ?>" type="text/javascript"></script>
