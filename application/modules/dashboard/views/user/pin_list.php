<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : 'User PIN List'); ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('email') ?></th>
                            <th><?php echo 'Login PIN'; ?></th>
                            <th><?php echo display('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php $sl = 1; foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $user->firstname . ' ' . $user->lastname; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->login_pin ? '<strong class="text-primary">'.htmlspecialchars($user->login_pin).'</strong>' : '<span class="badge bg-secondary">Not Set</span>'; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("dashboard/user/pin_management/" . $user->id); ?>" class="btn btn-xs btn-info">
                                            <i class="fa fa-pencil"></i> <?php echo display('edit'); ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">No records found</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
