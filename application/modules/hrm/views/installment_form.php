 <div class="form-group text-right">
     <?php if ($this->permission->method('hrm', 'create')->access()) : ?>
     <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
             class="fa fa-plus-circle" aria-hidden="true"></i>
         <?php echo display('add_installment') ?></button>
     <?php endif; ?>
     <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
     <a href="<?php echo base_url(); ?>hrm/Loan/installmentView"
         class="btn btn-primary"><?php echo display('manage_installment') ?></a>
     <?php endif; ?>
 </div>



 <div id="add0" class="modal fade" role="dialog">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <strong><?php echo display('loan_installment') ?></strong>
             </div>
             <div class="modal-body">


                 <div class="row">
                     <div class="col-sm-12 col-md-12">
                         <div class="panel">

                             <div class="panel-body">

                                 <?php echo  form_open('hrm/Loan/create_installment') ?>


                                 <div class="form-group row">
                                     <label for="employee_no"
                                         class="col-sm-3 col-form-label"><?php echo display('employee_name') ?>
                                         *</label>

                                     <div class="col-sm-9">

                                         <?php echo form_dropdown('employee_no', $gndloan, (!empty($example->employee_no) ? $example->employee_no : null), 'class="form-control width-400-px"  id="employee_no" onchange="SelectToLoad(this.value)"') ?>
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label for="loan_id"
                                         class="col-sm-3 col-form-label"><?php echo display('loan_id') ?> *</label>
                                     <div class="col-sm-9">
                                         <select name="loan_id" class="form-control width-400-px"
                                             onchange="SelectToname(this.value),SelectAuto(this.value)"
                                             id="loan_id"></select>


                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label for="installment_amount"
                                         class="col-sm-3 col-form-label"><?php echo display('installment_amount') ?>
                                         *</label>
                                     <div class="col-sm-9">
                                         <input type="number" min="1" name="installment_amount" class="form-control"
                                             placeholder="<?php
                                                                                                                                    echo display('installment_amount') ?>"
                                             id="installment_amount">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label for="payment"
                                         class="col-sm-3 col-form-label"><?php echo display('payment') ?> *</label>
                                     <div class="col-sm-9">
                                         <input name="payment" min="1" class="form-control" type="number"
                                             placeholder="<?php echo display('payment') ?>" id="payment">
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                     <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?>
                                         *</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="date" class="datepicker form-control"
                                             placeholder="<?php echo display('date') ?>" id="date">
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                     <label for="received_by"
                                         class="col-sm-3 col-form-label"><?php echo display('received_by') ?> *</label>
                                     <div class="col-sm-9">

                                         <?php echo form_dropdown('received_by', $gndloan, null, 'class="form-control width-400-px"  id="received_by"') ?>
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label for="installment_no"
                                         class="col-sm-3 col-form-label"><?php echo display('installment_no') ?>
                                         *</label>
                                     <div class="col-sm-9">
                                         <input type="number" min="1" name="installment_no" class="form-control"
                                             placeholder="<?php echo display('installment_no') ?>" id="installment_no"
                                             value="1">
                                     </div>
                                 </div>


                                 <div class="form-group row">
                                     <label for="notes" class="col-sm-3 col-form-label"><?php echo display('notes') ?>
                                         *</label>
                                     <div class="col-sm-9">
                                         <textarea name="notes" class="form-control"
                                             placeholder="<?php echo display('notes') ?>" id="notes"></textarea>
                                     </div>
                                 </div>


                                 <div class="form-group text-right">
                                     <button type="reset"
                                         class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                     <button type="submit"
                                         class="btn btn-success w-md m-b-5"><?php echo display('paid') ?></button>
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

 <div class="row">
     <!--  table area -->
     <div class="col-sm-12">

         <div class="panel panel-default thumbnail">

             <div class="panel-body">
                 <table width="100%" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('Sl') ?></th>
                             <th><?php echo display('name') ?></th>
                             <th><?php echo display('employee_no') ?></th>
                             <th><?php echo display('loan_id') ?></th>
                             <th><?php echo display('installment_amount') ?></th>
                             <th><?php echo display('payment') ?></th>
                             <th><?php echo display('date') ?></th>
                             <th><?php echo display('received_by') ?></th>
                             <th><?php echo display('installment_no') ?></th>
                             <th><?php echo display('notes') ?></th>
                             </th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($loanss)) { ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($loanss as $que) { ?>
                         <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo $que->first_name . ' ' . $que->last_name; ?></td>
                             <td><?php echo $que->employee_no; ?></td>
                             <td><?php echo $que->loan_id; ?></td>
                             <td><?php echo $que->installment_amount; ?>$</td>
                             <td><?php echo $que->payment; ?>$</td>
                             <td><?php echo $que->date; ?></td>
                             <td><?php echo $que->receiver; ?></td>
                             <td><?php echo $que->installment_no; ?></td>
                             <td><?php echo $que->notes; ?></td>




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

<script src="<?php echo base_url('application/modules/hrm/assets/js/installment.js'); ?>" type="text/javascript"></script>