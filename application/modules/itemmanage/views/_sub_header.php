<!-- Group Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'group'): ?>
<div class="col-sm-12 mb-3">
    <div class="d-flex justify-content-start">
        <a href="<?php echo base_url('itemmanage/item_category/group_list'); ?>" class="btn btn-primary me-2" style="margin-right:10px;">
            <?php echo 'Group List'; ?>
        </a>
        <a href="<?php echo base_url('itemmanage/item_category/create_group'); ?>" class="btn btn-success">
            <?php echo 'Create Group'; ?>
        </a>
    </div>
</div>
<?php endif; ?>

<!-- Category Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'category'): ?>
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_category/category_list'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Category List'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_category/create_category'); ?>" class="btn btn-success"><?php echo 'Create Category'; ?></a>
        </div>
    </div>
<?php endif; ?>

<!-- Sub Category Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'subcategory'): ?>
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_category/subcategory_list'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'SubCategory List'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_category/create_subcategory'); ?>" class="btn btn-success"><?php echo 'Create SubCategory'; ?></a>
        </div>
    </div>
<?php endif; ?>

<!-- Item Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'item'): ?>
     <div class="col-sm-12 mb-3" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_food/index'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Manage Item'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_food/create_new'); ?>" class="btn btn-success"><?php echo 'Create Item'; ?></a>
        </div>
    </div>
<?php endif; ?>

<!-- Addons Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'modifiers'): ?>
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/menu_addons/index'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Modifiers Listing'; ?></a>
            <a href="<?php echo base_url('itemmanage/menu_addons/create'); ?>" class="btn btn-success"><?php echo 'Create Modifiers'; ?></a>
        </div>
    </div>
<?php endif; ?>

<!-- Meal Deals Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'meal_deals'): ?>
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_food/promo_index'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Meal Deals Listing'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_food/addgroupfood'); ?>" class="btn btn-success"><?php echo 'Create Meal Deal'; ?></a>
        </div>
    </div>
<?php endif; ?>

<!-- Promo Sub Header -->
<?php if (!empty($sub_header) && $sub_header == 'promos'): ?>
    <div class="col-sm-12 mb-3">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url('itemmanage/item_food/promo_list'); ?>" class="btn btn-primary me-2" style="margin-right:10px;"><?php echo 'Promo Listing'; ?></a>
            <a href="<?php echo base_url('itemmanage/item_food/addpromofood'); ?>" class="btn btn-success"><?php echo 'Create Promo'; ?></a>
        </div>
    </div>
<?php endif; ?>