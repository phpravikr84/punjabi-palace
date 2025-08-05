<style>
    body {
        font-family: 'Roboto', sans-serif;
        background: #f5f5f5;
    }
    .category-section {
        margin: 15px 0;
        padding: 10px;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .category-title {
        font-size: 16px;
        font-weight: 700;
        color: #007bff;
        padding: 8px 0;
        border-bottom: 2px solid #007bff;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .single_item {
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: nowrap;
    }
    .single_item:last-child {
        border-bottom: none;
    }
    .item-content {
        max-width: 60%;
        flex: 1;
    }
    .item-span {
        font-size: 12px;
        color: #666;
        margin-top: 2px;
        display: block;
    }
    .quantity {
        font-size: 13px;
        font-weight: 600;
        color: #333;
        min-width: 150px;
        text-align: right;
    }
    .status-row {
        margin: 3px 0;
    }
    .font-colr1 {
        color: #28a745;
    }
    .pull-right {
        margin-left: auto;
        text-align: right;
    }
    .single_item-bg {
        background: #ffe6e6;
        padding: 10px;
        border-radius: 4px;
        margin: 5px 0;
    }
    .posShDesc {
        font-size: 12px;
        color: #555;
        font-style: italic;
    }
    .item-title {
        font-size: 12px;
        color: #444;
        margin: 5px 0 0 10px;
    }
    .no-items {
        font-size: 13px;
        color: #666;
        padding: 10px;
        text-align: center;
    }
    @media (max-width: 768px) {
        .category-section {
            padding: 8px;
        }
        .category-title {
            font-size: 14px;
        }
        .single_item {
            padding: 8px 0;
            flex-wrap: wrap;
        }
        .item-content {
            max-width: 100%;
        }
        .quantity {
            font-size: 12px;
            min-width: 120px;
        }
        .status-row {
            font-size: 11px;
        }
        .item-span, .posShDesc, .item-title {
            font-size: 11px;
        }
    }
</style>

<?php
// Define category display names
$categories = [
    5 => 'Starters',
    3 => 'Main Course',
    15 => 'Bread',
    11 => 'Rice',
    17 => 'Desserts'
];

// Organize items by category display name and collect unmapped CategoryNames
$items_by_category = [];
$unmapped_categories = [];
foreach ($itemlist as $item) {
    $category_id = isset($item->CategoryID) ? $item->CategoryID : 0;
    $category_name = isset($categories[$category_id]) ? $categories[$category_id] : ($item->CategoryName ?? 'Uncategorized');
    $items_by_category[$category_name][] = $item;
    if (!isset($categories[$category_id]) && !in_array($item->CategoryName, $unmapped_categories) && $item->CategoryName) {
        $unmapped_categories[] = $item->CategoryName;
    }
}

// Define display order for categories, including unmapped CategoryNames
$display_order = array_merge(['Starters', 'Main Course', 'Bread', 'Rice', 'Desserts'], $unmapped_categories);

// Loop through categories in display order
foreach ($display_order as $cat_name) {
    if (!empty($items_by_category[$cat_name])) {
?>
        <div class="category-section">
            <div class="category-title"><?php echo $cat_name; ?></div>
            <?php
            foreach ($items_by_category[$cat_name] as $item) {
                $isexists = $this->db->select('tbl_kitchen_order.*')
                    ->from('tbl_kitchen_order')
                    ->where('orderid', $item->order_id)
                    ->where('itemid', $item->menu_id)
                    ->where('varient', $item->variantid)
                    ->get()
                    ->num_rows();
                $condition = "orderid=" . $item->order_id . " AND menuid=" . $item->menu_id . " AND varient=" . $item->variantid;
                $accepttime = $this->db->select('*')
                    ->from('tbl_itemaccepted')
                    ->where($condition)
                    ->get()
                    ->row();
                $readytime = $this->db->select('*')
                    ->from('tbl_orderprepare')
                    ->where($condition)
                    ->get()
                    ->row();
            ?>
                <div class="single_item">
                    <div class="item-content">
                        <div>
                            <span class="display-block"><?php echo $item->ProductName; ?></span>
                            <!-- <span class="item-span"><?php //echo $item->variantName; ?></span> -->
                        </div>
                        <?php
                        if (!empty($item->notes)) {
                            echo "<div><strong>Notes:</strong> <span class='posShDesc'>" . $item->notes . "</span></div>";
                        }
                        if (!empty($orderedMods)) {
                            foreach ($orderedMods as $mv) {
                                if ($mv->menu_id == $item->menu_id) {
                        ?>
                                    <h5 class="item-title">- <?php echo $mv->add_on_name; ?> (x 1)</h5>
                        <?php
                                }
                            }
                        }
                        ?>
                        <span><strong>Qty:</strong> <?php echo $item->menuqty; ?></span>
                    </div>
                    <div class="quantity pull-right">
                        <?php if ($item->food_status == 1) { ?>
                            <div class="status-row font-colr1"><?php echo display('ready'); ?></div>
                            <div class="status-row">Accept Time: <?php echo date("H:i:s", strtotime($accepttime->accepttime)); ?></div>
                            <div class="status-row">Ready Time: <?php echo date("H:i:s", strtotime($readytime->preparetime)); ?></div>
                        <?php } elseif ($item->food_status == 0) { ?>
                            <?php if ($isexists > 0) { ?>
                                <div class="status-row">Ready for serve</div>
                                <div class="status-row">Accept Time: <?php echo date("H:i:s", strtotime($accepttime->accepttime)); ?></div>
                            <?php } else { ?>
                                <div class="status-row"><?php echo display('kitnotacpt'); ?></div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
<?php
    }
}

// Handle cancelled items
if (!empty($allcancelitem)) {
?>
    <div class="category-section">
        <div class="category-title">Cancelled Items</div>
        <?php
        foreach ($allcancelitem as $cancelitem) {
        ?>
            <div class="single_item single_item-bg">
                <div class="item-content">
                    <div>
                        <span class="display-block"><?php echo $cancelitem->ProductName; ?></span>
                        <span class="font-p-fw"><?php echo $cancelitem->variantName; ?></span>
                    </div>
                    <?php
                    if (!empty($orderedMods)) {
                        foreach ($orderedMods as $mv) {
                            if ($mv->menu_id == $cancelitem->menu_id) {
                    ?>
                                <h5 class="item-title">- <?php echo $mv->add_on_name; ?> (x 1)</h5>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="quantity pull-right">
                    <div class="status-row"><?php echo display('cancel'); ?></div>
                </div>
                <div><?php echo $cancelitem->menuqty; ?>X</div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php if (empty($itemlist) && empty($allcancelitem)) { ?>
    <div class="no-items">No items found for this order</div>
<?php } ?>