<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'price_schedule'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <!-- Table area -->
    <div class="col-sm-12 mt-5">
        <div class="panel panel-default thumbnail">
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover" id="priceSchedulesTable">
                    <thead>
                        <tr>
                            <th><?php echo display('sl'); ?></th>
                            <th><?php echo 'Price Level'; ?></th>
                            <th><?php echo 'Effective On'; ?></th>
                            <th><?php echo 'Description'; ?></th>
                            <th><?php echo 'Cron Run Date'; ?></th>
                            <th class="text-center"><?php echo 'Status'; ?></th>
                            <th><?php echo 'Action'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($schedules)): ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($schedules as $schedule): ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><a href="<?php echo base_url('itemmanage/item_food/view_schedule/' . $schedule['ScheduleID']); ?>" class="text-primary"><?php echo isset($schedule['price_level']) ? htmlspecialchars($schedule['price_level']) : '-'; ?></a></td>
                                    <td><?php echo isset($schedule['EffectiveDate']) ? htmlspecialchars(date('d-m-Y', strtotime($schedule['EffectiveDate']))) : '-'; ?></td>
                                    <td><a href="<?php echo base_url('itemmanage/item_food/view_schedule/' . $schedule['ScheduleID']); ?>" class="text-primary"><?php echo isset($schedule['category_name']) ? htmlspecialchars($schedule['category_name']) : '-'; ?></a></td>
                                    <td><?php echo isset($schedule['cron_run_datetime']) ? htmlspecialchars(date('d-m-Y H:i:s', strtotime($schedule['cron_run_datetime']))) : '-'; ?></td>
                                    <td class="text-center">
                                        <?php echo $schedule['is_enabled'] ? '<i class="fas fa-lg fa-check-circle text-success"></i>' : '<i class="fas fa-lg fa-times-circle text-danger"></i>'; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm <?php echo $schedule['is_enabled'] ? 'btn-warning' : 'btn-success'; ?> toggle-status" data-url="<?php echo base_url('itemmanage/item_food/toggle_schedule_status/' . $schedule['ScheduleID']); ?>">
                                            <?php echo $schedule['is_enabled'] ? 'Disable' : 'Enable'; ?>
                                        </button>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center"><?php echo display('no_records_found'); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Search functionality for Category, Description, and Price Level columns
    $('#search-category, #search-description, #search-price-level').on('keyup', function() {
        var categoryVal = $('#search-category').val().toLowerCase();
        var descriptionVal = $('#search-description').val().toLowerCase();
        var priceLevelVal = $('#search-price-level').val().toLowerCase();

        $('#priceSchedulesTable tbody tr').each(function() {
            var categoryText = $(this).find('td:eq(1)').text().toLowerCase();
            var descriptionText = $(this).find('td:eq(3)').text().toLowerCase();
            var priceLevelText = $(this).find('td:eq(1)').text().toLowerCase();

            var categoryMatch = categoryVal ? categoryText.includes(categoryVal) : true;
            var descriptionMatch = descriptionVal ? descriptionText.includes(descriptionVal) : true;
            var priceLevelMatch = priceLevelVal ? priceLevelText.includes(priceLevelVal) : true;

            if (categoryMatch && descriptionMatch && priceLevelMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Toggle status with SweetAlert2
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        const url = $(this).data('url');
        const button = $(this);
        const isEnabled = button.hasClass('btn-warning'); // btn-warning for Enabled, btn-success for Disabled
        const actionText = isEnabled ? 'disable' : 'enable';

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${actionText} this schedule?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${actionText} it!`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST', // Changed to POST for CSRF protection
                    data: { csrf_test_name: '<?php echo $this->security->get_csrf_hash(); ?>' },
                    dataType: 'json',
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Price schedule status change.',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to status price schedule.',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX error:', textStatus, errorThrown, jqXHR.responseText);
                        let errorMessage = 'Server error occurred.';
                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            errorMessage = jqXHR.responseJSON.message;
                        } else if (jqXHR.responseText) {
                            errorMessage = 'Server error: ' + jqXHR.responseText;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage,
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });
});
</script>