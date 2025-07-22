<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'category'): ?>
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
                            <th><?php echo display('category_name') ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($categories as $category) { ?>
                                <?php if ($category->parentid != 0) { // Only show categories (parent_id != 0)
                                    $parentname = '';
                                    if ($category->parentid > 0) {
                                        $test = $this->category_model->findById($category->parentid);
                                        $parentname = $test->Name;
                                    }
                                    $catid = $category->CategoryID;
                                    $this->load->model('itemmanage/category_model', 'categorymodel'); 
                                    $itemexist = $this->categorymodel->checkcategoryitem($catid);
                                    $alerttext = !empty($itemexist) ? "If You Delete this Category, then Your Food also Deleted!!!!" : display("are_you_sure");
                                ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $parentname; ?></td>
                                        <td><?php echo $category->Name; ?></td>
                                        <td>
                                            <?php //echo $category->CategoryIsActive == 1 ? display('active') : display('inactive'); ?>
                                            <a href="#" class="toggle-status" data-url="<?= generate_toggle_url('item_category', 'CategoryIsActive', 'CategoryID', $category->CategoryID) ?>">
                                                <?php if ($category->CategoryIsActive == 1): ?>
                                                    <i class="fa fa-lg fa-eye text-primary"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-lg fa-eye-slash text-muted"></i>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td class="center">
                                            <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                                <a href="<?php echo base_url("itemmanage/item_category/create_category/$category->parentid") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update')?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                            <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                                <a href="<?php echo base_url("itemmanage/item_category/delete_category/$category->CategoryID") ?>" onclick="return confirm('<?php echo $alerttext; ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete')?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<script>
$(document).ready(function() {
   //Change status toggle
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();

        const url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res.status === 'success') {
                    location.reload(); // or toggle icon dynamically here
                } else {
                    alert('Toggle failed.');
                }
            },
            error: function() {
                alert('AJAX error occurred.');
            }
        });
    });
});
</script>