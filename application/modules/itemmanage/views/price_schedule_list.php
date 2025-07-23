<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'item'): ?>
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
                                <th><?php echo display('category'); ?></th>
                                <th><?php echo 'Description'; ?></th>
                                <th><?php echo 'Price Level'; ?></th>
                                <th><?php echo 'Effective On'; ?></th>
                                <th class="no-rotate text-center"><?php echo 'All Prices'; ?></th>
                                <th><?php echo display('status'); ?></th>
                                <th><?php echo display('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($schedules)): ?>
                                <?php $sl = $pagenum + 1; ?>
                                <?php foreach ($schedules as $schedule): ?>
                                    <?php $variant_dtls = []; // Placeholder for variant prices ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td class="text-center"><?php echo isset($schedule['category_name']) ? htmlspecialchars($schedule['category_name']) : '-'; ?></td>
                                        <td><?php echo isset($schedule['description']) ? htmlspecialchars($schedule['description']) : '-'; ?></td>
                                        <td><?php echo isset($schedule['price_level']) ? htmlspecialchars($schedule['price_level']) : '-'; ?></td>
                                        <td><?php echo isset($schedule['effective_date']) ? htmlspecialchars($schedule['effective_date']) : '-'; ?></td>
                                        <td>
                                            <?php if (!empty($variant_dtls)): ?>
                                                <table class="table table-bordered table-sm variant-subtable">
                                                    <thead>
                                                        <tr>
                                                            <th class="rotate-sub"><?php echo display('dine_in'); ?></th>
                                                            <th class="rotate-sub"><?php echo display('takeaway'); ?></th>
                                                            <th class="rotate-sub"><?php echo display('ubereats'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($variant_dtls as $variant): ?>
                                                            <tr>
                                                                <td><?php echo number_format($variant['price'], 2); ?></td>
                                                                <td><?php echo number_format($variant['takeaway_price'], 2); ?></td>
                                                                <td><?php echo number_format($variant['uber_eats_price'], 2); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php else: ?>
                                                <?php echo display('no_variants_available'); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="toggle-status" data-url="<?php echo base_url('itemmanage/item_food/toggle_schedule/' . (isset($schedule['ScheduleID']) ? $schedule['ScheduleID'] : 0)); ?>">
                                                <?php if (isset($schedule['is_active']) && $schedule['is_active'] == 1): ?>
                                                    <i class="fa fa-lg fa-eye text-primary" aria-hidden="true"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-lg fa-eye-slash text-muted" aria-hidden="true"></i>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                                <a href="<?php echo base_url('itemmanage/item_food/add_price_schedule/' . (isset($schedule['ScheduleID']) ? $schedule['ScheduleID'] : 0)); ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                            <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                                <a href="<?php echo base_url('itemmanage/item_food/delete_schedule/' . (isset($schedule['ScheduleID']) ? $schedule['ScheduleID'] : 0)); ?>" onclick="return confirm('<?php echo display('are_you_sure'); ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete'); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $sl++; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center"><?php echo display('no_records_found'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Search functionality for Category, Description, and Price Level columns
    $('#search-category, #search-description, #search-price-level').on('keyup', function() {
        var categoryVal = $('#search-category').val().toLowerCase();
        var descriptionVal = $('#search-description').val().toLowerCase();
        var priceLevelVal = $('#search-price-level').val().toLowerCase();

        $('#priceSchedulesTable tbody tr').each(function() {
            var categoryText = $(this).find('td:eq(1)').text().toLowerCase();
            var descriptionText = $(this).find('td:eq(2)').text().toLowerCase();
            var priceLevelText = $(this).find('td:eq(3)').text().toLowerCase();

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

    // Toggle status
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        const url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res.status === 'success') {
                    location.reload();
                } else {
                    alert('<?php echo display('toggle_failed'); ?>');
                }
            },
            error: function() {
                alert('<?php echo display('ajax_error'); ?>');
            }
        });
    });
});
</script>