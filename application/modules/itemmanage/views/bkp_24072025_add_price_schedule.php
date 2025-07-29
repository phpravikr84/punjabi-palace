<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <!-- Button area -->
    <?php if ($sub_header == 'price_schedule'): ?>
    <?php $this->load->view('_sub_header'); ?>
    <?php endif; ?>
    <!-- Table area -->
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo (!empty($title) ? $title : null); ?></h2>
                    <small style="font-size:1em; font-weight:400"><?php echo 'Price Schedule'; ?></small>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("itemmanage/item_food/save_schedule", ['id' => 'priceScheduleForm']); ?>
                <?php echo form_hidden('id', $this->session->userdata('id')); ?>
                <?php echo form_hidden('ScheduleID', (!empty($scheduleinfo->ScheduleID) ? $scheduleinfo->ScheduleID : null)); ?>
                <?php echo form_hidden('items', ''); ?>

                <!-- Price Schedule Fields -->
                <div id="scheduleContainer">
                    <div class="schedule-row row border-bottom pb-4 align-items-start gx-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price_level"><?php echo 'New Prices for'; ?> *</label>
                                <select name="price_level" class="form-control price-level select2" id="price_level">
                                    <option value=""><?php echo 'Select'; ?></option>
                                    <?php if($customer_types): ?>
                                        <?php foreach ($customer_types as $type): ?>
                                            <option value="<?php echo $type['customer_type_id']; ?>" <?php echo (!empty($scheduleinfo->price_level) && $scheduleinfo->price_level == $type['customer_type_id']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($type['customer_type']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="effectiveFrom"><?php echo 'Effective From'; ?> *</label>
                                <input name="effective_date" class="form-control datepicker" type="text"
                                    placeholder="Effective From" id="effectiveFrom"
                                    value="<?php echo !empty($scheduleinfo->effective_date) ? htmlspecialchars($scheduleinfo->effective_date) : date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo 'Description'; ?></label>
                                <textarea name="description" class="form-control" id="description"
                                        placeholder="Enter description"><?php echo !empty($scheduleinfo->description) ? htmlspecialchars($scheduleinfo->description) : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label style="visibility:hidden;"> </label><br>
                                <button type="button" class="btn btn-success apply-changesNow active" data-level="1">
                                    <?php echo 'Apply Changes Now'; ?>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basedOn"><?php echo 'Based On'; ?></label>
                                <select name="based_on" class="form-control select2" id="basedOn">
                                    <option value=""><?php echo 'Select'; ?></option>
                                    <option value="sp" <?php echo (!empty($scheduleinfo->based_on) ? ($scheduleinfo->based_on == 'sp' ? 'selected' : '') : 'selected'); ?>>Sell Price</option>
                                    <option value="cp" <?php echo (!empty($scheduleinfo->based_on) && $scheduleinfo->based_on == 'cp') ? 'selected' : ''; ?>>Cost Price</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="basePrice"><?php echo 'Base Price'; ?></label>
                                <select name="base_price" class="form-control select2" id="basePrice" disabled>
                                    <option value=""><?php echo 'Select'; ?></option>
                                    <?php if($customer_types): ?>
                                        <?php foreach ($customer_types as $type): ?>
                                            <option value="<?php echo $type['customer_type_id']; ?>" <?php echo (!empty($scheduleinfo->base_price) && $scheduleinfo->base_price == $type['customer_type_id']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($type['customer_type']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="calculationMethod"><?php echo 'Calculation Method'; ?></label>
                                <select name="calculation_method" class="form-control select2" id="calculationMethod">
                                    <option value=""><?php echo 'Select'; ?></option>
                                    <option value="Percentage Markup" <?php echo (!empty($scheduleinfo->calculation_method) && $scheduleinfo->calculation_method == 'Percentage Markup') ? 'selected' : ''; ?>>Percentage Markup</option>
                                    <option value="Amount Markup" <?php echo (!empty($scheduleinfo->calculation_method) && $scheduleinfo->calculation_method == 'Amount Markup') ? 'selected' : ''; ?>>Amount Markup</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="percentage"><?php echo 'Percentage'; ?></label>
                                <input name="percentage" class="form-control" type="number" step="0.01"
                                    placeholder="Enter %" id="percentage"
                                    value="<?php echo !empty($scheduleinfo->percentage) ? htmlspecialchars($scheduleinfo->percentage) : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="roundingMethod"><?php echo 'Rounding Method'; ?></label>
                                <select name="rounding_method" class="form-control select2" id="roundingMethod">
                                    <option value=""><?php echo 'Select'; ?></option>
                                    <option value="none" <?php echo (!empty($scheduleinfo->rounding_method) && $scheduleinfo->rounding_method == 'none') ? 'selected' : ''; ?>>None</option>
                                    <option value="round_half_down" <?php echo (!empty($scheduleinfo->rounding_method) && $scheduleinfo->rounding_method == 'round_half_down') ? 'selected' : ''; ?>>Round Half Down</option>
                                    <option value="round_down" <?php echo (!empty($scheduleinfo->rounding_method) && $scheduleinfo->rounding_method == 'round_down') ? 'selected' : ''; ?>>Round Down</option>
                                    <option value="round_half_up" <?php echo (!empty($scheduleinfo->rounding_method) && $scheduleinfo->rounding_method == 'round_half_up') ? 'selected' : ''; ?>>Round Half Up</option>
                                    <option value="round_up" <?php echo (!empty($scheduleinfo->rounding_method) && $scheduleinfo->rounding_method == 'round_up') ? 'selected' : ''; ?>>Round Up</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="round_to_nearest"><?php echo 'Round to Nearest'; ?></label>
                                <input name="round_to_nearest" class="form-control" type="number" step="0.01"
                                    placeholder="e.g. 0.05, 0.10" id="round_to_nearest"
                                    value="<?php echo !empty($scheduleinfo->round_to_nearest) ? htmlspecialchars($scheduleinfo->round_to_nearest) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="adjusted_by"><?php echo 'x.00 Adjusted by'; ?></label>
                                <input name="adjusted_by" class="form-control" type="number" step="0.01"
                                    placeholder="e.g. 0.02" id="adjusted_by"
                                    value="<?php echo !empty($scheduleinfo->adjusted_by) ? htmlspecialchars($scheduleinfo->adjusted_by) : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item Selection -->
                <div class="form-group row border-bottom pb-2">
                    <label class="col-sm-10 col-form-label"><?php echo 'Selected Items'; ?> (<span id="itemTable_length">0</span>)</label>
                    <button type="button" class="col-sm-2 btn btn-primary mb-3 pull-right" data-toggle="modal" data-target="#itemModal"><?php echo 'Search Items'; ?></button>
                    <div class="col-sm-12">
                        <table width="100%" class="datatable table table-striped table-bordered table-hover" id="itemTable">
                            <thead>
                                <tr>
                                    <th><?php echo 'Item Name'; ?></th>
                                    <th><?php echo 'Item Code'; ?></th>
                                    <th><?php echo 'Category'; ?></th>
                                    <th><?php echo 'Last Cost'; ?></th>
                                    <th><?php echo 'Average Cost'; ?></th>
                                    <th><?php echo 'Price'; ?></th>
                                    <th><?php echo 'New Price'; ?></th>
                                    <th><?php echo 'Adjustment'; ?></th>
                                    <th><?php echo 'Margin'; ?></th>
                                </tr>
                            </thead>
                            <tbody id="itemTableBody">
                                <!-- Hidden Category Id Selected -->
                                <input type="hidden" name="Parentcategory" id="CategoryID" value="<?php echo isset($scheduleinfo->CategoryID) ?: ''; ?>">
                                <?php if (!empty($scheduleinfo->items)): ?>
                                    <?php foreach (json_decode($scheduleinfo->items, true) as $item): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                            <td><?php echo htmlspecialchars($item['item_code']); ?></td>
                                            <td><?php echo htmlspecialchars($item['category']); ?></td>
                                            <td><?php echo isset($item['last_cost']) ? htmlspecialchars($item['last_cost']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['average_cost']) ? htmlspecialchars($item['average_cost']) : '0.00'; ?></td>
                                            <td><?php echo htmlspecialchars($item['price']); ?></td>
                                            <td><?php echo isset($item['new_price']) ? htmlspecialchars($item['new_price']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['adjustment']) ? htmlspecialchars($item['adjustment']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['margin']) ? htmlspecialchars($item['margin']) : '0.00'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary"><?php echo 'Reset'; ?></button>
                    <button type="submit" id="saveButton" class="btn btn-success"><?php echo (!empty($scheduleinfo->ScheduleID) ? 'Update' : 'Save' ); ?></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Item Selection Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo 'Select Items'; ?></h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group row border-bottom pb-2">
                    <label for="Parentcategory" class="col-sm-2 col-form-label"><?php echo 'Category'; ?></label>
                    <div class="col-sm-8">
                        <select name="Parentcategory" id="Parentcategory" class="form-control select2">
                            <option value=""><?php echo 'Select Category'; ?></option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['CategoryID']; ?>">
                                    <?php echo htmlspecialchars($category['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <table class="table table-bordered" id="itemSearchTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th><?php echo 'Item Name'; ?></th>
                            <th><?php echo 'Item Code'; ?></th>
                            <th><?php echo 'Category'; ?></th>
                            <th><?php echo 'Weight'; ?></th>
                            <th><?php echo 'Unit'; ?></th>
                            <th><?php echo 'Price'; ?></th>
                        </tr>
                    </thead>
                    <tbody id="itemSearchTableBody"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addSelectedItems"><?php echo 'Add'; ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo 'Close'; ?></button>
            </div>
        </div>
    </div>
</div>

<!-- Include SweetAlert2 and other dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

<script>
$(document).ready(function() {
    // Initialize Select2 and Datepicker
    $('#price_level, #basedOn, #basePrice, #calculationMethod, #roundingMethod, #Parentcategory').select2({
        placeholder: "<?php echo 'Select'; ?>",
        allowClear: true
    });

    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    function updateItemTableLength() {
        $('#itemTable_length').text($('#itemTableBody tr').length);
    }
    updateItemTableLength();

    function applyRounding(price, roundingMethod, roundToNearest) {
        if (!price || isNaN(price)) return '0.00';
        let basePrice = parseFloat(price);
        let roundToNearestValue = parseFloat(roundToNearest) || 0.05;

        if (!roundingMethod || roundingMethod === 'none') {
            return basePrice.toFixed(2);
        }

        let lastDigit = (basePrice % 0.10) * 100;
        if (roundingMethod === 'round_half_down') {
            if (lastDigit <= 2.5) basePrice = Math.floor(basePrice * 20) / 20;
            else if (lastDigit > 2.5 && lastDigit <= 7.5) basePrice = Math.floor(basePrice * 20 + 0.5) / 20;
            else basePrice = Math.ceil(basePrice * 20) / 20;
        } else if (roundingMethod === 'round_down') {
            basePrice = Math.floor(basePrice * 20) / 20;
        } else if (roundingMethod === 'round_half_up') {
            if (lastDigit < 5) basePrice = Math.ceil(basePrice * 20 - 0.5) / 20;
            else basePrice = Math.ceil(basePrice * 20) / 20;
        } else if (roundingMethod === 'round_up') {
            basePrice = Math.ceil(basePrice * 20) / 20;
        }

        if (roundToNearestValue > 0) {
            basePrice = Math.round(basePrice / roundToNearestValue) * roundToNearestValue;
        }

        return parseFloat(basePrice).toFixed(2);
    }

    function calculateMargin(price, newPrice) {
        price = parseFloat(price) || 0;
        newPrice = parseFloat(newPrice) || 0;
        if (newPrice === 0) return '100.00';
        if (price === 0) return '0.00';
        return (((newPrice - price) / price) * 100).toFixed(2);
    }

    function updateTablePrices($scheduleRow) {
        let priceLevel = $scheduleRow.find('[name="price_level"]').val();
        let basedOn = $scheduleRow.find('[name="based_on"]').val();
        let calculationMethod = $scheduleRow.find('[name="calculation_method"]').val();
        let percentage = parseFloat($scheduleRow.find('[name="percentage"]').val()) || 0;
        let roundingMethod = $scheduleRow.find('[name="rounding_method"]').val();
        let roundToNearest = parseFloat($scheduleRow.find('[name="round_to_nearest"]').val()) || 0;
        let adjustedBy = parseFloat($scheduleRow.find('[name="adjusted_by"]').val()) || 0;

        $('#itemTableBody tr').each(function() {
            let $row = $(this);
            let itemPrice = parseFloat($row.find('td:eq(5)').text()) || 0;
            let basePrice = itemPrice;
            let lastCost = parseFloat($row.data('last-cost')) || 0;
            let averageCost = parseFloat($row.data('average-cost')) || 0;

            if (basedOn === 'sp') {
                if (priceLevel && $row.data('prices') && $row.data('prices')[priceLevel]) {
                    basePrice = parseFloat($row.data('prices')[priceLevel]) || itemPrice;
                }
            } else if (basedOn === 'cp') {
                basePrice = parseFloat($row.data('cost-price')) || itemPrice;
            }

            let newPrice = basePrice;
            if (calculationMethod === 'Percentage Markup') {
                newPrice = basePrice * (1 + percentage / 100);
            } else if (calculationMethod === 'Amount Markup') {
                newPrice = basePrice + percentage;
            }

            newPrice = applyRounding(newPrice, roundingMethod, roundToNearest);
            newPrice = parseFloat(newPrice) + adjustedBy;

            $row.find('td:eq(3)').text(lastCost.toFixed(2));
            $row.find('td:eq(4)').text(averageCost.toFixed(2));
            $row.find('td:eq(6)').text(parseFloat(newPrice).toFixed(2));
            $row.find('td:eq(7)').text(adjustedBy.toFixed(2));
            $row.find('td:eq(8)').text(calculateMargin(basePrice, newPrice));
        });
    }

    function bindScheduleRowEvents($scheduleRow) {
        $scheduleRow.find('[name="price_level"]').on('change', function() {
            let priceLevel = $(this).val();
            $scheduleRow.find('[name="base_price"]').val(priceLevel).trigger('change.select2');
            updateTablePrices($scheduleRow);
        });

        $scheduleRow.find('[name="based_on"], [name="calculation_method"], [name="percentage"], [name="rounding_method"], [name="round_to_nearest"], [name="adjusted_by"]').on('change input', function() {
            updateTablePrices($scheduleRow);
        });
    }

    bindScheduleRowEvents($('.schedule-row'));

    $('#price_level, #basedOn, #calculationMethod, #roundingMethod').each(function() {
        if ($(this).val()) {
            $(this).trigger('change');
        }
    });

    $('#Parentcategory').on('change', function() {
        let categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: '<?php echo base_url('itemmanage/item_food/get_items_by_category'); ?>',
                type: 'GET',
                data: { category_id: categoryId },
                dataType: 'json',
                success: function(data) {
                    $('#itemSearchTableBody').empty();
                    console.log('Received data:', data);
                    if (!Array.isArray(data)) {
                        console.error('Expected array, received:', data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Invalid data format received from server.',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }
                    $.each(data, function(i, item) {
                        if (!item.ProductsID || !item.ProductName || !item.item_code || !item.category_name) {
                            console.warn('Incomplete item data:', item);
                            return true;
                        }
                        let itemData = {
                            product_id: String(item.ProductsID || ''),
                            product_name: String(item.ProductName || ''),
                            item_code: String(item.item_code || ''),
                            category: String(item.category_name || ''),
                            weight: String(item.weightage || '0.00'),
                            unit: String(item.uom_short_code || ''),
                            price: String(item.price || '0.00'),
                            prices: {
                                '1': String(item.price || '0.00'),
                                '2': String(item.takeaway_price || '0.00'),
                                '3': String(item.uber_eats_price || '0.00')
                            },
                            cost_price: String(item.cost_price || '0.00'),
                            last_cost: '0.00',
                            average_cost: '0.00'
                        };
                        let jsonString = JSON.stringify(itemData);
                        let encodedItemData = jsonString.replace(/'/g, '\\\'').replace(/"/g, '"');
                        console.log('Encoded item data:', encodedItemData);
                        $('#itemSearchTableBody').append(`
                            <tr>
                                <td><input type="checkbox" class="item-checkbox" data-item='${encodedItemData}'></td>
                                <td>${$('<div/>').text(item.ProductName || '').html()}</td>
                                <td>${$('<div/>').text(item.item_code || '').html()}</td>
                                <td>${$('<div/>').text(item.category_name || '').html()}</td>
                                <td>${$('<div/>').text(item.weightage || '0.00').html()}</td>
                                <td>${$('<div/>').text(item.uom_short_code || '').html()}</td>
                                <td>${$('<div/>').text(item.price || '0.00').html()}</td>
                            </tr>
                        `);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown, jqXHR.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error loading items: ' + (jqXHR.responseJSON ? jqXHR.responseJSON.message : textStatus),
                        confirmButtonText: 'OK'
                    });
                }
            });
        } else {
            $('#itemSearchTableBody').empty();
        }
    });

    $('#selectAll').on('change', function() {
        $('.item-checkbox').prop('checked', this.checked);
    });

    $('#addSelectedItems').on('click', function() {
        $('#itemTableBody').empty();
        let validItems = 0;
        let itemsArray = [];
        $category_id = $('#Parentcategory').val();
        $('#CategoryID').val($category_id);
        $('.item-checkbox:checked').each(function() {
            let rawData = $(this).attr('data-item');
            console.log('Raw data-item:', rawData);
            try {
                let decodedData = rawData.replace(/"/g, '"').replace(/\\'/g, "'");
                let item = JSON.parse(decodedData);
                console.log('Parsed item:', item);
                if (!item.product_name || !item.item_code || !item.category) {
                    console.warn('Invalid item data:', item);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Invalid item data for: ' + item.product_name,
                        confirmButtonText: 'OK'
                    });
                    return true;
                }
                $('#itemTableBody').append(`
                    <tr data-prices='${JSON.stringify(item.prices)}' data-cost-price="${item.cost_price}" data-last-cost="${item.last_cost}" data-average-cost="${item.average_cost}">
                        <td>${$('<div/>').text(item.product_name).html()}</td>
                        <td>${$('<div/>').text(item.item_code).html()}</td>
                        <td>${$('<div/>').text(item.category).html()}</td>
                        <td>${$('<div/>').text(item.last_cost).html()}</td>
                        <td>${$('<div/>').text(item.average_cost).html()}</td>
                        <td>${$('<div/>').text(item.price).html()}</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                    </tr>
                `);
                itemsArray.push({
                    product_id: item.product_id,
                    product_name: item.product_name,
                    item_code: item.item_code,
                    category: item.category,
                    price: item.price,
                    prices: item.prices,
                    cost_price: item.cost_price,
                    last_cost: item.last_cost,
                    average_cost: item.average_cost
                });
                validItems++;
            } catch (e) {
                console.error('Error parsing item data:', e, 'Raw data:', rawData);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error adding item: Invalid data format.',
                    confirmButtonText: 'OK'
                });
            }
        });
        if (validItems > 0) {
            $('#itemModal').modal('hide');
            $('#selectAll').prop('checked', false);
            $('[name="items"]').val(JSON.stringify(itemsArray));
            updateItemTableLength();
            updateTablePrices($('.schedule-row'));
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No valid items selected.',
                confirmButtonText: 'OK'
            });
        }
    });

    $('#priceScheduleForm').on('submit', function(e) {
        e.preventDefault();
        
        let priceLevel = $('[name="price_level"]').val().trim();
        let items = $('[name="items"]').val();

        if (!priceLevel) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->lang->line('price_level_required'); ?>',
                confirmButtonText: 'OK'
            });
            return;
        } else if (!items || items === '' || (items && JSON.parse(items).length === 0)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->lang->line('select_at_least_one_item'); ?>',
                confirmButtonText: 'OK'
            });
            return;
        }

         var csrf = $('#csrfhashresarvation').val();
        var form = $('#priceScheduleForm')[0];
        var formData = new FormData(form);

        // Append CSRF token to formData
        formData.append('csrf_test_name', csrf);

        $.ajax({
            url: '<?php echo base_url('itemmanage/item_food/save_schedule'); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                console.log('Server response:', response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message || 'Price schedule saved successfully.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#priceScheduleForm')[0].reset();
                        $('#itemTableBody').empty();
                        $('[name="items"]').val('');
                        updateItemTableLength();
                        $('#price_level, #basedOn, #basePrice, #calculationMethod, #roundingMethod').select2({
                            placeholder: "<?php echo 'Select'; ?>",
                            allowClear: true
                        });
                        window.location.href = '<?php echo base_url('itemmanage/item_food/price_schedule'); ?>';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Failed to save price schedule.',
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

    });
});
</script>