<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo 'PDF Materials'; ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="flex justify-content-end pull-right mb-5">
                    <a href="<?php echo site_url('dashboard/web_setting/menu_pdf_upload'); ?>" class="btn btn-success">
                        <i class="fa fa-plus"></i> <?php echo 'Upload Menu PDF'; ?>
                    </a>
                </div>
                <table id="pdfTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no'); ?></th>
                            <th><?php echo display('menu_name'); ?></th>
                            <th><?php echo 'Menu Slug'; ?></th>
                            <th><?php echo 'PDF File'; ?></th>
                            <th><?php echo display('status'); ?></th>
                            <th><?php echo display('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pdf_materials)) {
                            $sl = 1;
                            foreach ($pdf_materials as $mat) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $mat->menu_name; ?></td>
                                    <td><?php echo $mat->menu_slug; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('uploads/pdf/' . $mat->pdf_file); ?>" target="_blank">
                                            <?php echo $mat->pdf_file; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo ($mat->status == 1)
                                            ? '<span class="label label-success">Active</span>'
                                            : '<span class="label label-danger">Inactive</span>'; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('dashboard/web_setting/toggle_pdf_status/' . $mat->id); ?>"
                                           class="btn btn-sm btn-info" title="Toggle Status">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <a href="<?php echo site_url('dashboard/web_setting/menu_pdf_upload/' . $mat->id); ?>"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('pdf/' . $mat->pdf_file); ?>"
                                           class="btn btn-sm btn-primary" target="_blank" title="View PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php }} else { ?>
                            <tr><td colspan="6" class="text-center"><?php echo display('no_data_found'); ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- jQuery AJAX script to toggle status -->
<script>
$(document).ready(function () {
    $('.toggle-status').change(function () {
        var id = $(this).data('id');
        var status = $(this).prop('checked') ? 1 : 0;

        $.ajax({
            url: "<?php echo base_url('dashboard/web_setting/ajax_toggle_pdf_status'); ?>",
            method: "POST",
            data: { id: id, status: status },
            dataType: "json",
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message);
                }
            },
            error: function () {
                toastr.error('An error occurred while toggling status.');
            }
        });
    });
});
</script>
