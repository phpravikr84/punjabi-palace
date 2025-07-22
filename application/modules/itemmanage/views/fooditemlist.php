<style>
/* Rotate main table headers 90 degrees */
.table th.rotate {
    height: 120px; /* Adjusted for rotated text */
    white-space: nowrap;
    vertical-align: bottom;
}
.table th.rotate > div {
    transform: translate(10px, 0px) rotate(-90deg);
    width: 35px; /* Adjust width for rotated headers */
}
.table th.rotate > div > span {
    padding: 5px 10px;
    text-align: center;
}
/* Ensure action column header is not rotated */
.table th.no-rotate {
    vertical-align: middle;
    padding: 8px;
}
/* Style for sub-table */
.variant-subtable {
    width: 100%;
    font-size: 12px;
    margin: 0;
}
/* Rotate sub-table headers 90 degrees */
.variant-subtable th.rotate-sub {
    height: 100px; /* Adjusted for sub-table header height */
    white-space: nowrap;
    vertical-align: bottom;
    padding: 0;
}
.variant-subtable th.rotate-sub > div {
    transform: translate(5px, 0px) rotate(-90deg);
    width: 20px; /* Slightly narrower for sub-table */
}
.variant-subtable th.rotate-sub > div > span {
    padding: 5px 8px;
}
/* Search input styling */
.search-input {
    width: 100%;
    padding: 2px;
    font-size: 12px;
    margin-bottom: 5px;
}
/* Responsive adjustments */
@media (max-width: 768px) {
    .table th.rotate {
        height: 80px;
        font-size: 12px;
    }
    .table th.rotate > div {
        width: 20px;
    }
    .variant-subtable {
        font-size: 10px;
    }
    .variant-subtable th.rotate-sub {
        height: 70px;
        font-size: 10px;
    }
    .variant-subtable th.rotate-sub > div {
        width: 15px;
    }
    .table td img {
        width: 50px; /* Smaller image on mobile */
    }
    .search-input {
        font-size: 10px;
        padding: 1px;
    }
}
</style>

<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'item'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <!-- Table area -->
    <div class="col-sm-12 mt-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="foodItemsTable">
                        <thead>
                            <tr>
                                <th class="no-rotate"><div><span><?php echo 'Sl.' ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo display('image') ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo 'Group'; ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo 'Category'; ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo 'Item Name'; ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo 'Item Code' ?></span></div></th>
                                <th class="rotate"><div><span><?php echo 'Meal Type' ?></span></div></th>
                                <th class="rotate"><div><span><?php echo display('component') ?></span></div></th>
                                <th class="rotate"><div><span>Recipe</span></div></th>
                                <th class="no-rotate text-center"><div><span><?php echo 'All Prices (Incl. other vendors)' ?></span></div></th>
                                <th class="no-rotate"><div><span><?php echo display('status') ?></span></div></th>
                                <th class="no-rotate"><?php echo display('action') ?></th>
                            </tr>
                            <tr>
                                <th></th> <!-- No search for Sl. -->
                                <th></th> <!-- No search for Image -->
                                <th><input type="text" class="search-input" id="search-group" placeholder="Search Group"></th>
                                <th><input type="text" class="search-input" id="search-category" placeholder="Search Category"></th>
                                <th><input type="text" class="search-input" id="search-item" placeholder="Search Item Name"></th>
                                <th></th> <!-- No search for Component -->
                                <th></th> <!-- No search for Recipe -->
                                <th></th> <!-- No search for Variant Prices -->
                                <th></th> <!-- No search for Status -->
                                <th></th> <!-- No search for Action -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($fooditemslist)) { ?>
                                <?php $sl = $pagenum + 1; ?>
                                <?php foreach ($fooditemslist as $fooditems) { ?>
                                    <?php $variant_dtls = get_menu_prices($fooditems->ProductsID); ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><img src="<?php echo base_url(!empty($fooditems->ProductImage) ? $fooditems->ProductImage : 'assets/img/icons/default.jpg'); ?>" alt="Image" width="60"></td>
                                        <td class="text-center"><?php echo get_category_name($fooditems->GroupID); ?></td>
                                        <td class="text-center"><?php if ($fooditems->isgroup == 1): echo "<strong class='text-success'>Promotions</strong>"; else: echo $fooditems->Name; endif; ?></td>
                                        <td><?php echo $fooditems->ProductName . ($fooditems->is_bom == 1 ? ' (With BOM)' : ''); ?></td>
                                        <td><?php echo $fooditems->item_code; ?></td>
                                        <td>
                                            <?php
                                            $groupName = strtolower(get_category_name($fooditems->GroupID));
                                            //echo $groupName; // For debugging, can be removed later

                                            if ($groupName === 'Food Menu' || $groupName === 'food menu' || $groupName === 'FOOD MENU') {
                                                echo htmlspecialchars($fooditems->food_type == 1 ? '🥗' : '🍗');
                                            } elseif (in_array($groupName, ['beverage', 'beverages'])) {
                                                echo '🥤'; // Drink icon for beverages
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo !empty($fooditems->component) ? $fooditems->component : '-'; ?></td>
                                        <td class="text-center">
                                            <?php if ($fooditems->is_bom == 1): ?>
                                                <i class="fa fa-lg fa-check-circle text-success" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-lg fa-times-circle text-danger" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($variant_dtls)) { ?>
                                                <table class="table table-bordered table-sm variant-subtable">
                                                    <thead>
                                                        <tr>
                                                            <?php if ($fooditems->is_bom == 1) { ?>
                                                                <th class="rotate-sub"><div><span>Variant</span></div></th>
                                                            <?php } ?>
                                                            <th class="rotate-sub"><div><span>Dine In</span></div></th>
                                                            <th class="rotate-sub"><div><span>Takeaway</span></div></th>
                                                            <th class="rotate-sub"><div><span>Uber Eats</span></div></th>
                                                            <!-- <th class="rotate-sub"><div><span>DoorDash</span></div></th>
                                                            <th class="rotate-sub"><div><span>Web Order</span></div></th> -->
                                                            <?php if ($fooditems->is_bom == 1) { ?>
                                                                <th class="rotate-sub"><div><span>Recipe Cost</span></div></th>
                                                                <!-- <th class="rotate-sub"><div><span>Weightage</span></div></th> -->
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($variant_dtls as $variant) { ?>
                                                            <tr>
                                                                <?php if ($fooditems->is_bom == 1) { ?>
                                                                    <td><?php echo '<strong>'.get_variant_first_letter($variant['variantid']).'</strong>'; ?></td>
                                                                <?php } ?>
                                                                <td><?php echo number_format($variant['price'], 2); ?></td>
                                                                <td><?php echo number_format($variant['takeaway_price'], 2); ?></td>
                                                                <td><?php echo number_format($variant['uber_eats_price'], 2); ?></td>
                                                                <!-- <td><?php //echo number_format($variant['doordash_price'], 2); ?></td>
                                                                <td><?php //echo number_format($variant['web_order_price'], 2); ?></td> -->
                                                                <?php if ($fooditems->is_bom == 1) { ?>
                                                                    <td><?php echo !empty($variant['recipe_cost']) ? number_format($variant['recipe_cost'], 2) : '-'; ?></td>
                                                                    <!-- <td><?php //echo !empty($variant['recipe_weightage']) ? number_format($variant['recipe_weightage'], 2) : '-'; ?></td> -->
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } else { ?>
                                                No variants available
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="toggle-status" data-url="<?= generate_toggle_url('item_foods', 'ProductsIsActive', 'ProductsID', $fooditems->ProductsID) ?>">
                                                <?php if ($fooditems->ProductsIsActive == 1): ?>
                                                    <i class="fa fa-lg fa-eye text-primary"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-lg fa-eye-slash text-muted"></i>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($this->permission->method('itemmanage', 'update')->access()): ?>
                                                <?php if ($fooditems->isgroup == 1) { ?>
                                                    <a href="<?php echo base_url("itemmanage/item_food/addgroupfood/$fooditems->ProductsID") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url("itemmanage/item_food/create_new/$fooditems->ProductsID") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            <?php endif; ?>
                                            <?php if ($this->permission->method('itemmanage', 'delete')->access()): ?>
                                                <a href="<?php echo base_url("itemmanage/item_food/delete/$fooditems->ProductsID") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="10" class="text-center">No records found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right"></div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Search functionality for Group, Category, and Item Name columns
    $('#search-group, #search-category, #search-item').on('keyup', function() {
        var groupVal = $('#search-group').val().toLowerCase();
        var categoryVal = $('#search-category').val().toLowerCase();
        var itemVal = $('#search-item').val().toLowerCase();

        $('#foodItemsTable tbody tr').each(function() {
            var groupText = $(this).find('td:eq(2)').text().toLowerCase();
            var categoryText = $(this).find('td:eq(3)').text().toLowerCase();
            var itemText = $(this).find('td:eq(4)').text().toLowerCase();

            var groupMatch = groupVal ? groupText.includes(groupVal) : true;
            var categoryMatch = categoryVal ? categoryText.includes(categoryVal) : true;
            var itemMatch = itemVal ? itemText.includes(itemVal) : true;

            if (groupMatch && categoryMatch && itemMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

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