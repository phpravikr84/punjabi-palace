<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('cid') ?></th>
                            <th><?php echo display('employee_name') ?></th>
                            <th><?php echo display('employee_no') ?></th>
                            <th><?php echo display('sal_type') ?></th>
                             <th><?php echo display('SetUp_Date') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_sl_setup)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_sl_setup as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                      <td><?php echo $sl; ?></td>
                                      <td><?php echo $que->first_name.' '.$que->last_name; ?></td>
                                      <td><?php echo $que->employee_no; ?></td>
                                      <td><?php echo $que->sal_type; ?></td>
                                      <td><?php echo $que->create_date; ?></td>
                                                                
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/Payroll/updates_salstup_form/$que->employee_no") ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a> 
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?>
                                        <a href="<?php echo base_url("hrm/Payroll/delete_salsetup/$que->employee_no") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a>
                                        <?php endif; ?> 
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
 
 