<link href="<?php echo base_url('application/modules/itemmanage/assets/css/item_stylenew.css') ?>" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= isset($editdata) ? 'Edit Waste Entry' : 'Add Waste Entry' ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <?= form_open_multipart('itemmanage/waste/' . (isset($editdata) ? 'update/'.$editdata->id : 'save'), ['id' => 'wasteForm']) ?>
                <?= form_hidden('id', $this->session->userdata('id')) ?>

                <div class="row">
                    <!-- Reference No -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="reference_no" class="col-sm-4 col-form-label">Reference No</label>
                            <div class="col-sm-8">
                                <input type="text" name="reference_no" class="form-control" id="reference_no" readonly value="<?= isset($editdata) ? $editdata->reference_no : $last_id ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="waste_date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="waste_date" id="waste_date" class="form-control" value="<?= isset($editdata) ? $editdata->waste_date : date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Responsible Person -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-4 col-form-label">Responsible Person</label>
                            <div class="col-sm-8">
                                <select name="user_id" id="user_id" class="form-control select2">
                                    <option value="">Select</option>
                                    <?php foreach($users as $user): ?>
                                        <option value="<?= $user->id ?>" <?= isset($editdata) && $editdata->user_id == $user->id ? 'selected' : '' ?>><?= $user->firstname . ' '. $user->lastname ?> <?php echo $user->is_admin==1 ? '(admin)' : ''; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Waste Type -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="waste_type" class="col-sm-4 col-form-label">Choose Type</label>
                            <div class="col-sm-8">
                                <select name="waste_type" id="waste_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="ingredient" <?= isset($editdata) && $editdata->waste_type == 'ingredient' ? 'selected' : '' ?>>Ingredient</option>
                                    <option value="food" <?= isset($editdata) && $editdata->waste_type == 'food' ? 'selected' : '' ?>>Food Menu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Ingredient Dropdown -->
                    <div class="col-lg-6">
                        <div class="form-group row ingredient-group" style="display:none;">
                            <label for="ingredient_id" class="col-sm-4 col-form-label">Select Ingredient</label>
                            <div class="col-sm-5">
                                <select id="ingredient_id" class="form-control select2">
                                    <option value="">Select Ingredient</option>
                                    <?php foreach ($ingredients as $ing): ?>
                                        <?php 
                                            // Prefer consumption_unit, fallback to uom_id
                                            $unit = get_unit_detail($ing->consumption_unit ?: $ing->uom_id); 
                                            $unitid = $ing->consumption_unit ?: $ing->uom_id;
                                        ?>
                                        <option value="<?= htmlspecialchars($ing->id) ?>" data-unitid="<?= $unitid ?>" data-unitname="<?= htmlspecialchars($unit['uom_short_code'] ?? '') ?>" data-status="<?= htmlspecialchars($ing->status) ?>" <?= isset($editdata) && in_array($ing->id, $waste_items) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($ing->ingredient_name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-success" id="addIngredientBtn">➕ Add</button>
                            </div>
                        </div>
                    </div>

                    <!-- Food Dropdown -->
                    <div class="col-lg-6">
                        <div class="form-group row food-group" style="display:none;">
                            <label for="food_id" class="col-sm-4 col-form-label">Select Food Menu</label>
                            <div class="col-sm-8">
                                <select name="food_id" id="food_id" class="form-control select2">
                                    <option value="">Select Food</option>
                                    <?php foreach ($foods as $food): ?>
                                        <option value="<?= $food->ProductsID ?>"><?= $food->ProductName ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Food Variant -->
                    <div class="col-lg-6">
                        <div class="form-group row food-variant" style="display:none;">
                            <label for="food_variant" class="col-sm-4 col-form-label">Select Food Variant</label>
                            <div class="col-sm-8">
                                <select name="food_variant" id="food_variant" class="form-control select2">
                                    <option value="">Select Food Variant</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Food Wastage -->
                    <div class="col-lg-6">
                        <div class="form-group row food-wastage" style="display:none;">
                            <label for="food_wastage" class="col-sm-4 col-form-label">Food Wastage Quantity</label>
                            <div class="col-sm-6">
                                <input type="text" name="food_wastage" id="food_wastage" class="form-control" placeholder="Enter Food Wastage Quantity">
                            </div>
                            <div class="col-sm-2" style="position:relative;">
                                <span class="input-group-text"><strong>pc/plate</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Waste Items Table -->
                <div class="form-group row" id="listingSection" style="display:none;">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="wasteItemsTable">
                            <thead>
                                <tr>
                                    <th>Ingredient(Code)</th>
                                    <th>Quantity/Amount</th>
                                    <th>Loss Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="wasteItemsBody">
                                <!-- Injected by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Total Loss Amount -->
                        <div class="form-group row" style="display:none;" id="totalLossSection"></div>
                            <label for="total_loss_amt" class="col-sm-4 col-form-label">Total Loss Amount</label>
                            <div class="col-sm-8">
                                <input type="text" name="total_loss_amt" id="total_loss_amt" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <!-- Remarks -->
                        <div class="form-group row" id="notes" style="display:none;">
                            <label for="notes" class="col-sm-4 col-form-label">Notes</label>
                            <div class="col-sm-8">
                                <textarea name="notes" class="form-control" rows="3" placeholder="Enter any additional notes..."><?= isset($editdata) ? $editdata->note : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Total Wastage Section -->
                    

                    

                <!-- Buttons -->
                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary">Save Waste</button>
                        <a href="<?= base_url('itemmanage/waste') ?>" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- JS for dynamic form -->
<script>
$(document).ready(function () {
    function toggleTypeFields() {
        var type = $('#waste_type').val();
        $('.ingredient-group, .food-group,.food-variant,.food-wastage, #totalLossSection, #notes').hide();
        $('#listingSection').hide();
        $('#wasteItemsBody').html('');

        if (type === 'ingredient') {
            $('.ingredient-group').show();
            $('#totalLossSection').show();
             $('#notes').show();
             $('#total_loss_amt').val('');
        } else if (type === 'food') {
            $('.food-group').show();
            $('.food-wastage').show();
            $('.food-variant').show();
            $('#totalLossSection').show();
            $('#notes').show();
            $('#total_loss_amt').val('');
        }
    }

    $('#waste_type').change(function () {
        toggleTypeFields();
    });

    $('#addIngredientBtn').click(function () {
        const selectedId = $('#ingredient_id').val();
        const selectedName = $('#ingredient_id option:selected').text();
        const selectedUnit = $('#ingredient_id option:selected').data('unitname');
        const selectedUnitId = $('#ingredient_id option:selected').data('unitid');
        const selectedStatus = $('#ingredient_id option:selected').data('status');

        if (!selectedId) return;

        let exists = false;
        $('#wasteItemsBody tr').each(function () {
            if ($(this).find('td:first').text().trim().includes(`(${selectedId})`)) {
                exists = true;
            }
        });

        if (exists) {
            alert('This ingredient is already added.');
            return;
        }

        $('#listingSection').show();
        $('#wasteItemsBody').append(`
            <tr>
                <td>
                    ${selectedName} (${selectedId})
                    <input type="hidden" name="item_id[]" value="${selectedId}">
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <input type="text" name="qty[]" class="form-control" placeholder="Qty" style="width:100px; margin-right:5px;">
                        <span>${selectedUnit}</span>
                        <input type="hidden" name="unit_id[]" value="${selectedUnitId}">
                        <input type="hidden" name="ingredient_status[]" value="${selectedStatus}">
                    </div>
                </td>
                <td><input type="number" name="loss_amount[]" class="form-control" step="0.00001" min="0" placeholder="Loss Amount"></td>
                <td><button type="button" class="btn btn-danger btn-sm deleteRow">Delete</button></td>
            </tr>
        `);

        $('#ingredient_id').val(null).trigger('change');
    });

    $('#wasteItemsBody').on('click', '.deleteRow', function () {
        $(this).closest('tr').remove();
        if ($('#wasteItemsBody tr').length === 0) {
            $('#listingSection').hide();
        }
    });

    $('#food_id').change(function () {
        const foodId = $(this).val();
        if (!foodId) return;


        $('#food_variant').html('<option value="">Loading...</option>');

        $.ajax({
            url: baseurl + 'itemmanage/waste/get_food_variants/' + foodId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let options = '<option value="">Select Variant</option>';
                data.forEach(variant => {
                    options += `<option value="${variant.variantid}">${variant.variantName}</option>`;
                });
                $('#food_variant').html(options);
            },
            error: function () {
                $('#food_variant').html('<option value="">No variants found</option>');
            }
        });

        $.ajax({
            url: baseurl + 'itemmanage/waste/get_food_ingredients/' + foodId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length === 0) {
                    $('#wasteItemsBody').html('<tr><td colspan="4">No ingredients found for this food item.</td></tr>');
                    return;
                }

                $('#listingSection').show();
                let rows = '';
                data.forEach(function (item) {
                    rows += `
                        <tr>
                            <td>
                                ${item.ingredient_name} (${item.id})
                                <input type="hidden" name="item_id[]" value="${item.id}">
                            </td>
                            <td><input type="text" name="qty[]" class="form-control" placeholder="Qty"></td>
                            <td><input type="number" name="loss_amount[]" step="0.00001" min="0" class="form-control" placeholder="Loss Amount"></td>
                            <td><button type="button" class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                        </tr>
                    `;
                });
                $('#wasteItemsBody').html(rows);
            },
            error: function () {
                alert('Failed to load ingredients.');
            }
        });
    });

    // Food Variant Change
    $('#food_variant').change(function () {
        const foodId = $('#food_id').val();
        const variantId = $(this).val();

        if (!foodId || !variantId) return;

        $.ajax({
            url: baseurl + 'itemmanage/waste/get_food_variant_ingredients/' + foodId + '/' + variantId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length === 0) {
                    $('#wasteItemsBody').html('<tr><td colspan="4">No ingredients found for this variant.</td></tr>');
                    return;
                }

                let rows = '';
                data.forEach(function (item) {
                    rows += `
                        <tr>
                            <td>
                                ${item.ingredient_name} (${item.id})
                                <input type="hidden" name="item_id[]" value="${item.id}">
                                <input type="hidden" name="unit_cost[]" id="unit_cost_${item.id}" value="${item.cost_perunit}">
                            </td>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <input type="text" name="qty[]" class="form-control" value="${item.qty}" placeholder="Qty" style="width:100px; margin-right:5px;">
                                    <span>${item.unitname}</span>
                                    <input type="hidden" name="unit_id[]" value="${item.consumption_unit}">
                                </div>
                            </td>
                            <td><input type="number" name="loss_amount[]" step="0.00001" min="0" class="form-control" placeholder="Loss Amount"></td>
                            <td><button type="button" class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                        </tr>
                    `;
                });
                $('#wasteItemsBody').html(rows);
                  var totalWastage = 0;
                  var totalWastageAmount = 0;
                $('#wasteItemsBody tr').each(function () {
                    const qty = parseFloat($(this).find('input[name="qty[]"]').val()) * 1 || 0;
                    const unit_cost = parseFloat($(this).find('input[name="unit_cost[]"]').val()) || 0;
                    $(this).find('input[name="loss_amount[]"]').val(qty * unit_cost); // Assuming loss amount is 10 times the quantity
                    // Calculate total wastage
                    totalWastage += qty;
                    // Calculate total loss amount
                    totalWastageAmount += qty * unit_cost;
                });
                $('#listingSection').show();
                 $('#total_loss_amt').val(parseFloat(totalWastageAmount).toFixed(2)); // Set total loss amount
                $('#food_wastage').val(1); // Clear food wastage input
            },
            error: function () {
                alert('Failed to load variant ingredients.');
            }
        });
    });

    //When Food Wastage is entered
    $('#food_wastage').on('input', function () {
        const wastageQty = $(this).val();
        if (wastageQty && wastageQty > 0) {
           var totalWastage = 0;
           var totalWastageAmount = 0;
            $('#wasteItemsBody tr').each(function () {
                const qty = parseFloat($(this).find('input[name="qty[]"]').val()) * parseFloat(wastageQty) || 0;
                const unit_cost = parseFloat($(this).find('input[name="unit_cost[]"]').val()) || 0;
                $(this).find('input[name="qty[]"]').val(qty);
                $(this).find('input[name="loss_amount[]"]').val(qty * unit_cost); // Assuming loss amount is 10 times the quantity
                // Calculate total wastage
                totalWastage += qty;
                // Calculate total loss amount
                totalWastageAmount += qty * unit_cost;
            });

             $('#total_loss_amt').val(parseFloat(totalWastageAmount).toFixed(2)); // Set total loss amount
            // Validate total wastage against entered food wastage quantity
            if (totalWastage < wastageQty) {
                alert('Total wastage cannot be less than the entered food wastage quantity.');
                $(this).val('');
            }
            $('#listingSection').show();
        } else {
            $('#listingSection').hide();
        }
    });


    // Handle qty change for ingredients
    $('#wasteItemsBody').on('input', 'input[name="qty[]"]', function () {
    const $row = $(this).closest('tr');
    const qty = parseFloat($(this).val()) || 0;
    const ingredientId = $row.find('input[name="item_id[]"]').val();
    const unitId = $row.find('input[name="unit_id[]"]').val();
    const ingredientStatus = $row.find('input[name="ingredient_status[]"]').val();



        // Validate inputs

    if (!qty || !ingredientId || !unitId) return;

        if(ingredientStatus) {

                $.ajax({
                    url: baseurl + 'itemmanage/waste/calculate_loss_amount/'+ingredientId+'/'+unitId+'/'+qty+'/'+ingredientStatus,
                    type: 'GET',
                    dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                         // Use 4 decimal precision if loss_amount is very small
                        const lossAmount = parseFloat(response.loss_amount).toFixed(5);

                        $row.find('input[name="loss_amount[]"]').val(lossAmount);

                        // Recalculate total loss across all rows
                        let totalLoss = 0;
                        $('input[name="loss_amount[]"]').each(function () {
                            const val = parseFloat($(this).val());
                            if (!isNaN(val)) totalLoss += val;
                        });

                        $('#total_loss_amt').val(totalLoss.toFixed(4));
                    } else {
                        alert('Failed to calculate loss amount.');
                    }
                },
                error: function () {
                    alert('Error contacting server.');
                }
            });

        } else {

                $.ajax({
                url: `${baseurl}itemmanage/waste/calculate_loss_amount`,
                type: 'GET',
                data: {
                    item_id: ingredientId,
                    unit_id: unitId,
                    qty: qty
                },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        const lossAmount = parseFloat(response.loss_amount).toFixed(2);
                        $row.find('input[name="loss_amount[]"]').val(lossAmount);

                        // Recalculate total loss
                        let totalLoss = 0;
                        $('input[name="loss_amount[]"]').each(function () {
                            totalLoss += parseFloat($(this).val()) || 0;
                        });
                        $('#total_loss_amt').val(totalLoss.toFixed(2));
                    } else {
                        alert('Failed to calculate loss amount.');
                    }
                },
                error: function () {
                    alert('Error contacting server.');
                }
            });

        }
        
    });



    toggleTypeFields(); // On page load
});
</script>
