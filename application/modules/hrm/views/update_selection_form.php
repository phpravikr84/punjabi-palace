    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">

                    </div>
                </div>
                <div class="panel-body">

                    <?php echo  form_open_multipart('hrm/Candidate_select/update_selection_form/' . $data->can_sel_id) ?>


                    <input name="can_sel_id" type="hidden" value="<?php echo $data->can_sel_id ?>">

                    <div class="form-group row">
                        <label for="can_id" class="col-sm-3 col-form-label"><?php echo display('candidate_name') ?>
                            *</label>
                        <div class="col-sm-9">
                            <?php echo form_dropdown('can_id', $dropdownselection, (!empty($data->can_id) ? $data->can_id : null), ' class="form-control" onchange="SelectToLoadsl(this.value)" id="c_id"') ?>
                            <input type="hidden" name="employee_no" class="form-control" id="employee_no"
                                value="<?php echo $data->employee_no ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pos_id" class="col-sm-3 col-form-label"><?php echo display('pos_id') ?> *</label>
                        <div class="col-sm-9">
                            <input type="text" name="pos_name" class="form-control" id="pos_name"
                                value="<?php echo $data->position_name ?>">
                            <input type="hidden" name="pos_id" class="form-control" id="pos_id"
                                value="<?php echo $data->pos_id ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selection_terms"
                            class="col-sm-3 col-form-label"><?php echo display('selection_terms') ?> *</label>
                        <div class="col-sm-9">
                            <input type="text" name="selection_terms" class="form-control" id="selection_terms"
                                value="<?php echo $data->selection_terms ?>">
                        </div>
                    </div>



                    <div class="form-group text-right">

                        <button type="submit"
                            class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                    </div>

                    <?php echo form_close() ?>


                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('application/modules/hrm/assets/js/expense.js'); ?>" type="text/javascript"></script>