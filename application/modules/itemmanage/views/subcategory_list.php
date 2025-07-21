<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'subcategory'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <!-- Table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo 'Sl.' ?></th>
                            <th><?php echo 'Category Name' ?></th>
                            <th><?php echo 'Sub Category' ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($categories as $category) { ?>
                                <?php if (!empty($category['Subcategories'])): ?>
                                    <?php foreach ($category['Subcategories'] as $subcategory): ?>
                                        <?php 
                                            $catid = $subcategory['CategoryID'];
                                            $itemexist = $this->category_model->checkcategoryitem($catid);
                                            $alerttext = !empty($itemexist) ? "If you delete this subcategory, associated items will also be deleted!" : display("are_you_sure");
                                        ?>
                                        <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC"; ?>">
                                            <td><?php echo $sl++; ?></td>
                                            <td><?php echo $category['Name']; ?></td>
                                            <td><?php echo $subcategory['Name']; ?></td>
                                            <td>
                                                <a href="#" class="toggle-status" data-url="<?= base_url('itemmanage/item_category/toggle_status/' . $subcategory['CategoryID']) ?>">
                                                    <?php if ($subcategory['CategoryIsActive'] == 1): ?>
                                                        <i class="fa fa-lg fa-eye text-primary"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-lg fa-eye-slash text-muted"></i>
                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <td class="center">
                                                <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                                    <a href="<?php echo base_url("itemmanage/item_category/create_subcategory/" . $subcategory['parentid']) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="<?php echo display('update'); ?>"><i class="fa fa-pencil"></i></a>
                                                <?php endif; ?>
                                                <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                                    <a href="<?php echo base_url("itemmanage/item_category/delete_category/" . $subcategory['CategoryID']) ?>" onclick="return confirm('<?php echo $alerttext; ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="<?php echo display('delete'); ?>"><i class="fa fa-trash-o"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>

                </table>
                <div class="text-right"><?php echo $links; ?></div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // $('.datatable').DataTable({
    //     "pageLength": 25,
    //     "lengthMenu": [10, 25, 50, 100],
    //     "ordering": true,
    //     "columnDefs": [
    //         { "targets": [0, 4], "orderable": false }
    //     ]
    // });

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
                    swal({
                        title: "Error",
                        text: "Failed to toggle status.",
                        type: "error"
                    });
                }
            },
            error: function() {
                swal({
                    title: "Error",
                    text: "AJAX error occurred.",
                    type: "error"
                });
            }
        });
    });
});
</script>