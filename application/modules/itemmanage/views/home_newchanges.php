<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('image') ?></th>
                            <th><?php echo display('category_name') ?></th>
                            <th><?php echo 'Sub Category';  ?></th> 
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)) { ?>
                            <?php $sl = $pagenum + 1; ?>
                            <?php foreach ($categories as $category) { 
                                $catid = $category['CategoryID'];
                                
                                // Fetch child categories and create comma-separated list
                                $subcategories = [];
                                if (!empty($category['children_menus'])) {
                                    foreach ($category['children_menus'] as $child) {
                                        $subcategories[] = $child['Name'];
                                    }
                                }
                                $subcategories_list = !empty($subcategories) ? implode(', ', $subcategories) : 'None';

                                // Check if items exist in category
                                $this->load->model('itemmanage/category_model', 'categorymodel'); 
                                $itemexist = $this->categorymodel->checkcategoryitem($catid);
                                $alerttext = !empty($itemexist) ? "If You Delete this Category, then Your Food also Deleted!!!!" : display("are_you_sure");
                            ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC"; ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo base_url(!empty($category['CategoryImage']) ? $category['CategoryImage'] : 'assets/img/icons/default.jpg'); ?>" alt="Image" width="80"></td>
                                    <td><?php echo $category['parentName']; ?></td>
                                    <td><?php echo $subcategories_list; ?></td>
                                    <td><?php echo ($category['ParentCategoryIsActive'] == 1) ? display('active') : display('inactive'); ?></td>
                                    <td class="center">
                                        <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                            <a href="<?php echo base_url("itemmanage/item_category/create/$catid") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                        <?php endif; ?>
                                        <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                            <a href="<?php echo base_url("itemmanage/item_category/delete/$catid") ?>" onclick="return confirm('<?php echo $alerttext; ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>