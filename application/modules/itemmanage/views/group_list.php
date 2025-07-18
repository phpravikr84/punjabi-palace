<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'group'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
   <!-- Table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo 'Group Name' ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($categories as $category) { ?>
                                <?php if ($category->parentid == 0) { // Only show groups (parent_id = 0)
                                    $catid = $category->CategoryID;
                                    $this->load->model('itemmanage/category_model', 'categorymodel'); 
                                    $itemexist = $this->categorymodel->checkcategoryitem($catid);
                                    $alerttext = !empty($itemexist) ? "If You Delete this Group, then Your Food also Deleted!!!!" : display("are_you_sure");
                                ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $category->Name; ?></td>
                                        <td><?php echo $category->CategoryIsActive == 1 ? display('active') : display('inactive'); ?></td>
                                        <td class="center">
                                            <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                                <a href="<?php echo base_url("itemmanage/item_category/edit_group/$category->CategoryID") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update')?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                            <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                               <a href="javascript:void(0);" 
                                                    class="btn btn-danger btn-sm delete-group-btn" 
                                                    data-id="<?php echo $category->CategoryID ?>" 
                                                    data-toggle="tooltip" 
                                                    title="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>


                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
                <div class="text-right"><?php echo $links; ?></div>
            </div>
        </div>
    </div>
</div>
<!-- SweetAlert JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).on('click', '.delete-group-btn', function (e) {
    e.preventDefault();
    var categoryId = $(this).data('id');
    var row = $(this).closest('tr'); // or .category-row, if that's your class
    var csrf = $('#csrfhashresarvation').val();
  
    swal({
        title: "Are you sure?",
        text: "This group will be permanently deleted!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: baseurl + "itemmanage/item_category/delete_group/" + categoryId,
                type: "GET",
                dataType: "json",
                data: { csrf_test_name: csrf },
                success: function (res) {
                    if (res.status) {
                        swal({
                            title: "Deleted!",
                            text: res.message,
                            type: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        row.fadeOut(300, function () {
                            $(this).remove();
                        });
                    } else {
                        swal("Error", res.message, "error");
                    }
                },
                error: function () {
                    swal("Error", "An unexpected error occurred.", "error");
                }
            });
        }
    });
});
</script>
