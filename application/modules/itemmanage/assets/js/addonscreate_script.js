$(document).ready(function () {
    let rowCount = $(".modifier-row").length; // Track row count dynamically

    // Initialize sortable
    $(".modifier-container").sortable({
        handle: ".drag-handle",
        axis: "y",
        containment: "parent",
        update: function () {
            updateSortOrder(); // Update order after sorting
        }
    });

    // Function to update order after sorting
    function updateSortOrder() {
        $(".modifier-row").each(function (index) {
            $(this).find(".sort-order").val(index + 1); // Set order starting from 1
        });
    }

    updateSortOrder(); // Initialize sorting order on page load

    /**
     * Auto suggestion box which fetch Food Item and Ingredient 
     */
    var getUrl = $('#getModifierItem').val();
    var getModifierIngredient = $('#getModifierIngredientItem').val();
    var csrf = $('#csrfhashresarvation').val();
    console.log('Request URL:', getUrl);

    // Function to initialize autocomplete for dynamically added elements
    function initAutocomplete(element) {
        element.autocomplete({
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: getUrl,
                    cache: false,
                    dataType: "json", // Ensure JSON is parsed correctly
                    data: { term: request.term, csrf_test_name: csrf },
                    success: function (data) {
                        console.log("Response Data:", data); // Debugging output
                        response(data);
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error:", status, error, xhr.responseText);
                    }
                });
            },
            minLength: 2, // Minimum characters before triggering search
            select: function (event, ui) {
                console.log("Selected Item:", ui.item); // Debugging output
                $(this).val(ui.item.label); // Set selected value
                var $row = $(this).closest('.modifier-row'); // Find the closest modifier-row
                var $modifierInput = $row.find('input[name="modifier_id[]"]');
                var prevModifierId = $modifierInput.val(); // Store previous modifier ID

                // Update the hidden modifier_id input
                $modifierInput.val(ui.item.id);

                //Get Consumtion Unit and Consumption
                var $modifierConsumptionUnitId = $row.find('input[name="consumption_unitid[]"]');
                var prevModifierConsumptionUnitId = $modifierConsumptionUnitId.val(); // Store previous consumption unit ID
                var $modifierConsumptionUnit = $row.find('input[name="consumption_unit[]"]');
                var prevModifierConsumptionUnit = $modifierConsumptionUnit.val(); // Store previous consumption unit
                $modifierConsumptionUnitId.val(ui.item.unit_id); // Set new consumption unit ID
                $modifierConsumptionUnit.val(ui.item.uom_short_code); // Set new consumption unit
                //Ingredient current Stock
                $modifierCurrentStock = $row.find('input[name="consumtion_ingrstock[]"]');
                $modifierCurrentStock.val(ui.item.ingr_stock); // Set new consumption unit


                // Remove previously added hidden fields if the modifier_id changes
                if (prevModifierId && prevModifierId !== ui.item.id) {
                    $row.next('.hidden-fields-container').remove();
                }
              

                // Check if ui.item.id is valid
                if (ui.item.id && ui.item.id !== "0") {
                    $.ajax({
                        type: "GET",
                        url: getModifierIngredient,
                        cache: false,
                        dataType: "json",
                        data: { foodid: ui.item.id, csrf_test_name: csrf },
                        success: function (response) {
                            if (response.status === 'success' && response.data.length > 0) {
                                var $formhtml = '<div class="hidden-fields-container">';
                                response.data.forEach(function (item) {
                                    var adjustedQty = item.qty * 0.6; // Example adjustment logic
                                    $formhtml += `
                                        <input type="hidden" name="foodid_${item.foodid}[]" value="${item.foodid}"/>
                                        <input type="hidden" name="ingr_${item.foodid}[]" value="${item.ingredientid}"/>
                                        <input type="hidden" name="ingr_qty_${item.foodid}[]" value="${item.qty}"/>
                                        <input type="hidden" name="ingr_adj_qty_${item.foodid}[]" value="${adjustedQty}"/>
                                        <input type="hidden" name="ingr_unitname_${item.foodid}[]" value="${item.unitname}"/>
                                        <input type="hidden" name="ingr_unitid_${item.foodid}[]" value="${item.unitid}"/>
                                    `;
                                });
                                $formhtml += '</div>';

                                // Append hidden fields after the modifier row
                                $row.after($formhtml);
                                 //Disable button in case of error
                                 $row.find('.viewModifiers').removeAttr('disabled');
                                 //Hide all consumption unit and consumption
                                 $row.find('.consumptionunitbox').hide();
                                 $row.find('.consumptionbox').hide();
                            } else {
                                //Disable button in case of error
                                $row.find('.viewModifiers').attr('disabled', true);
                                   //Hide all consumption unit and consumption
                                //    $row.find('.consumptionunitbox').show();
                                //    $row.find('.consumptionbox').show();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log("AJAX Error:", status, error, xhr.responseText);
                        }
                    });
                }

                return false; // Prevent default behavior
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };
    }

    // Initialize autocomplete for existing elements on page load
    initAutocomplete($(".modifierDropDown"));

    /**
     *  END of Auto suggestion box
     */

     /**
      * When select modifier name if its food item then
      */
    $(document).on("click", ".viewModifiers", function() {
        var parentRow = $(this).closest('.modifier-row');
        var modifierId = parentRow.find('input[name="modifier_id[]"]').val();

        if (!modifierId) {
            alert("Please select a modifier first.");
            return;
        }

        // Remove existing tooltip content to prevent duplication
        parentRow.find('.ingredient-details').remove();

        $.ajax({
            type: "GET",
            url: getModifierIngredient,
            cache: false,
            dataType: "json",
            data: { foodid: modifierId, csrf_test_name: csrf },
            success: function(response) {
                if (response.status === 'success') {
                    var tableHtml = `<div class="ingredient-details" style="position: absolute; right:12px; background: white; border: 1px solid #ccc; padding: 10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); z-index: 100;">
                          <span class="closeBtnIng" style="cursor: pointer; float: right; font-weight: bold;">X</span>
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Recipe</th>
                                    <th>Quantity Used</th>
                                    <th>Adjusted Quantity</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    response.data.forEach(function(item) {
                        var adjustedQty = (parseFloat(item.qty) * 0.6).toFixed(3);
                        tableHtml += `<tr>
                            <td> ${item.ingredient_name} - (Id: ${item.ingredientid})</td>
                            <td>${item.qty}</td>
                            <td>${adjustedQty}</td>
                            <td>${item.unitname}</td>
                        </tr>`;
                    });

                    tableHtml += `</tbody></table></div>`;

                    // Insert the table right next to the modifier button
                    parentRow.find('.viewModifiers').after(tableHtml);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", status, error, xhr.responseText);
            }
        });
    });

// Remove tooltip when mouse leaves
// $(document).on("mouseleave", ".viewModifiers", function() {
//     $(this).siblings('.ingredient-details').remove();
// });
// Close button functionality
$(document).on("click", ".closeBtnIng", function() {
    $(this).closest('.ingredient-details').remove();
});


      /**
       * END
       */
    // Add new row
    $(".add-row").click(function () {
        rowCount++; // Increment row count
        let newRow = $(".modifier-row:first").clone(); // Clone first row

        // Update row ID
        newRow.attr("id", "modifierRow_" + rowCount);
        newRow.removeClass("food-item-row");

        // Clear input values properly
        newRow.find("input[type='text'], input[type='hidden'], input[type='number']").val("");
        newRow.find("input[type='checkbox']").prop("checked", false); // Uncheck checkboxes
        newRow.find("select").val("1"); // Reset dropdown

        // Update remove button ID and make it visible
        if ($('#isMealDeal').is(':checked')) {
            newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).hide();
        } else {
            newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).show(); // Show remove button for new row    
        }

        // Append the new row
        $(".modifier-container").append(newRow);
        initAutocomplete(newRow.find(".modifierDropDown")); // Initialize autocomplete for new row

        updateSortOrder(); // Update sorting after adding
        checkRemoveButton(); // Check remove button visibility
    });

    // Remove row
    $(document).on("click", ".remove-row", function () {
        let rowId = $(this).closest(".modifier-row").attr("id"); // Get row ID
        console.log("Removing Row ID: " + rowId);

        $(this).closest(".modifier-row").remove();
        rowCount = $(".modifier-row").length; // Reset row count
        updateSortOrder(); // Update sorting after removal
        checkRemoveButton(); // Check remove button visibility
    });

    // Check remove button visibility (only show if more than one row exists)
    function checkRemoveButton() {
        if ($(".modifier-row").length > 1) {
            $(".remove-row").show();
            $(".food-item-row").find(".remove-row").hide(); // Hide remove button for food item rows
        } else {
            $(".remove-row").hide();
        }
    }

    // Run this on page load
    updateSortOrder();
    checkRemoveButton();


    $(document).on('change', '#mealModifierItemsSelect', function () {
        let selectedValue = $(this).val();
        console.log("Selected Category ID:", selectedValue); // Debugging output
        // rowCount=0;
        $.ajax({
            type: "GET",
            url: $('#getMealModifierItems').val(),
            data: { categoryId: selectedValue, csrf_test_name: $('#csrfhashresarvation').val() },
            dataType: "json",
            // success: function (response) {
            //     console.log("Raw Response:", response);
            //     console.log("Response Status:", response.status);
            //     if (response.status === "success") {
            //         //from here function is not working. even the following console.log is not printing
            //         console.log("Meal Modifier Items Response:", response); // Debugging output
            //         response.data.forEach(function (item) {
            //             // ✅ Check if modifier already exists
            //             let isAlreadyAdded = $("input[name='modifier_id[]']").filter(function () {
            //                 return $(this).val() == item.id;
            //             }).length > 0;

            //             if (isAlreadyAdded) {
            //                 console.warn("Modifier already exists with ID:", item.id);
            //                 return;
            //             }

            //             rowCount++;
            //             let newRow = $(".modifier-row:first").clone();

            //             newRow.attr("id", "modifierRow_" + rowCount);
            //             newRow.find("input[type='text'], input[type='hidden'], input[type='number']").val("");
            //             newRow.find("input[type='checkbox']").prop("checked", false);
            //             newRow.find("select").val("1");

            //             newRow.find("input[name='modifier_id[]']").val(item.id);
            //             newRow.find("input[name='addonsname']").val(item.name);
            //             newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).show();

            //             $(".modifier-container").append(newRow);
            //             initAutocomplete(newRow.find(".modifierDropDown"));
            //             updateSortOrder();
            //             checkRemoveButton();
            //         });
            //     }
            // },
            success: function (response) {
                // $(".modifier-container").html(``); // Clear existing rows
                console.log("Meal Modifier Items Response:", response); // Raw array
                console.log("Meal Modifier Items Response lenghts:", response.length); // Raw array
                
                // Loop through array directly
                if (response.length === 0) {
                    console.warn("No items found for the selected category.");
                    // return; // Exit if no items found
                } else {
                    response.forEach(function (item) {
                        let isAlreadyAdded = $("input[name='modifier_id[]']").filter(function () {
                            return $(this).val() == item.id;
                        }).length > 0;

                        if (isAlreadyAdded) {
                            console.warn("Modifier already exists with ID:", item.id);
                            return;
                        }

                        rowCount++;
                        let newRow = $(".modifier-row:first").clone();

                        // Update row ID
                        newRow.attr("id", "modifierRow_" + rowCount);
                        newRow.addClass("food-item-row"); // Add class for food item rows

                        // Reset fields
                        newRow.find("input[type='text']").val("");
                        newRow.find("input[type='hidden']").val("");
                        newRow.find("input[type='number']").val("");
                        newRow.find("input[type='checkbox']").prop("checked", false);
                        newRow.find("select").val("1");

                        // Now set the cloned row values
                        newRow.find("input[name='modifier_id[]']").val(item.id);
                        newRow.find("input[name='addonsname[]']").val(item.name);

                        // Set remove button ID
                        newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).hide();

                        // Append to container
                        $(".modifier-container").append(newRow);

                        // Optional autocomplete (only if needed)
                        // initAutocomplete(newRow.find(".modifierDropDown"));
                        console.log("newRow: ", newRow); // Debugging output
                        updateSortOrder();
                        checkRemoveButton();
                    });
                    if ($(".modifier-row:first").find('input[name="addonsname[]"]').val() === "") {
                        $(".modifier-row:first").remove(); // Remove the first row if it was cloned
                    }
                    $(".food-item-row").find(".remove-row").hide();
                }
                let cntHtml = `<span class="badge badge-info">${response.length} Items</span>`;
                $("#mealModItemsCount").html(cntHtml).show(); // Show count of meal modifier
                $(".modifier-row").find(".remove-row").hide(); // Hide remove button for food item rows
            },
            error: function (xhr, status, error) {
                console.error("Error fetching meal modifier items:", error);
            }
        });
    });
});



$(document).on('change', '#isMealDeal', function () {
    let mealModifierItemsSelect = $('#mealModifierItemsSelect'); // Find the related price input field
    let mealModifierItemsSelect2 = mealModifierItemsSelect.closest(".select2-container"); // Find the related price input field

    if ($(this).is(':checked')) {
        mealModifierItemsSelect.show(); // Disable and clear the price field
        $('#mealModifierItemsSelect').closest('.col-lg-12').find(".select2-container").show(); // Disable and clear the price field
        $(".food-item-row").find(".remove-row").hide(); // Hide remove button for food item rows
        $(".modifier-row").find(".remove-row").hide();
        $("#mealModItemsCount").show();
        rowCount = $(".modifier-row").length; // Reset row count
    } else {
        mealModifierItemsSelect.hide(); // Enable the price field
        $('#mealModifierItemsSelect').closest('.col-lg-12').find(".select2-container").hide(); // Enable the price field
        rowCount = 1; // Reset row count
        $(".add-row").click(); // Add a new row
        $(".modifier-container").find(".food-item-row").remove(); // Remove all food item rows
        rowCount = $(".modifier-row").length; // Reset row count
        $('#mealModifierItemsSelect').val(''); // Reset the select dropdown
        $("#mealModItemsCount").hide(); // Hide the count of meal modifier
    }
});

//Disable when click isComplementary button it will disable input box its realted price field
$(document).ready(function () {
    $(document).on("click", ".isComplementary", function () {
        let row = $(this).closest(".modifier-row"); // Get the parent row dynamically
        let priceInput = row.find("input[name='addonsprice[]']"); // Find the related price input field

        if ($(this).is(":checked")) {
            priceInput.prop("disabled", true).val(""); // Disable and clear the price field
        } else {
            priceInput.prop("disabled", false); // Enable the price field
        }
    });
    if ($('#isMealDeal').is(':checked')) {
        $('#isMealDeal').change(); // Trigger change to set initial state
    }
});

$(document).on('change', '#mealModifierItemsSelectdvdsvdsv', function () {
    let selectedValue = $(this).val();
    //get the items under the selected category id
    $.ajax({
        type: "GET",
        url: $('#getMealModifierItems').val(),
        data: { categoryId: selectedValue, csrf_test_name: $('#csrfhashresarvation').val() },
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                console.log("Meal Modifier Items Response:", response); // Debugging output
                // let options = '<option value="">Select Item</option>';
                // response.data.forEach(function (item) {
                //     options += `<option value="${item.id}">${item.name}</option>`;
                // });
                // $('#mealModifierItems').html(options);
                //add modifier-row [e.g. id=modifierRow_1] for each item from response data
                response.data.forEach(function (item, index) {
                    console.log("Adding Item:", item); // Debugging output
                    // Check if the row already exists  
                    if ($("#modifierRow_" + (index + 1)).length > 0) {
                        console.warn("Row already exists for index:", index + 1);
                        return; // Skip if row already exists
                    }
                    rowCount++; // Increment row count
                    let newRow = $(".modifier-row:first").clone(); // Clone first row

                    // Update row ID
                    newRow.attr("id", "modifierRow_" + rowCount);

                    // Clear input values properly
                    newRow.find("input[type='text'], input[type='hidden'], input[type='number']").val("");
                    newRow.find("input[type='checkbox']").prop("checked", false); // Uncheck checkboxes
                    newRow.find("select").val("1"); // Reset dropdown

                    var $row = newRow.closest('.modifier-row'); // Find the closest modifier-row
                    var $modifierInput = $row.find('input[name="modifier_id[]"]');
                    $modifierInput.val(item.id);
                    newRow.find("input[name='addonsname']").val(item.name); // update 

                    // Update remove button ID and make it visible
                    newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).show();

                    // Append the new row
                    $(".modifier-container").append(newRow);
                    initAutocomplete(newRow.find(".modifierDropDown")); // Initialize autocomplete for new row

                    updateSortOrder(); // Update sorting after adding
                    checkRemoveButton(); // Check remove button visibility
                });                
            }          
        },
        error: function (xhr, status, error) {
            console.error("Error fetching meal modifier items:", error);
        }
    });
});

// keep the list in a CSV inside #mealModifierSelectedItems
// $(document).on('change', 'input[name="modItemActive[]"]', function () {
//     const $row   = $(this).closest('.modifier-row');
//     const $price = $row.find('input[name="addonsprice[]"]');
//     const $min   = $row.find('input[name="minqty[]"]');
//     const $max   = $row.find('input[name="maxqty[]"]');
//     const $hidden = $("#mealModifierSelectedItems");

//     const id = $row.find('input[name="modifier_id[]"]').val();

//     // read & normalize current list
//     const list = ($hidden.val() || '')
//         .split(',')
//         .map(s => s.trim())
//         .filter(Boolean); // remove empties

//     if (this.checked) {
//         // enable fields for this row
//         $price.prop('disabled', false);
//         $min.prop('disabled', false);
//         $max.prop('disabled', false);

//         if (!list.includes(id)) list.push(id);
//         console.log("Added modifier id:", id);
//     } else {
//         // disable & clear fields for this row
//         $price.prop('disabled', true).val('');
//         $min.prop('disabled', true).val('');
//         $max.prop('disabled', true).val('');

//         const idx = list.indexOf(id);
//         if (idx > -1) list.splice(idx, 1);
//         console.log("Removed modifier id:", id);
//     }

//     $hidden.val(list.join(','));
//     console.log("mealModifierSelectedItems:", $hidden.val());
// });


// helpers
function readIds() {
  return ($("#mealModifierSelectedItems").val() || '')
    .split(',')
    .map(s => s.trim())
    .filter(Boolean);
}

function writeIds(list) {
  $("#mealModifierSelectedItems").val(list.join(','));
}

function toggleRow($row, checked, list) {
  const $price = $row.find('input[name="addonsprice[]"]');
  const $min   = $row.find('input[name="minqty[]"]');
  const $max   = $row.find('input[name="maxqty[]"]');
  const id     = $row.find('input[name="modifier_id[]"]').val();

  $row.find('input[name="modItemActive[]"]').prop('checked', checked);

  if (checked) {
    $price.prop('disabled', false);
    $min.prop('disabled', false);
    $max.prop('disabled', false);
    if (!list.includes(id)) list.push(id);
  } else {
    $price.prop('disabled', true).val('');
    $min.prop('disabled', true).val('');
    $max.prop('disabled', true).val('');
    const idx = list.indexOf(id);
    if (idx > -1) list.splice(idx, 1);
  }
}

// individual checkbox handler (same as before, just factored)
$(document).on('change', 'input[name="modItemActive[]"]', function () {
  const $row   = $(this).closest('.modifier-row');
  const list   = readIds();
  toggleRow($row, this.checked, list);
  writeIds(list);

  // keep the Select All checkbox in sync
  syncSelectAll();
  console.log("mealModifierSelectedItems:", $("#mealModifierSelectedItems").val());
});

// Select All handler
$(document).on('change', 'input[name="modItemActiveAll"]', function () {
  const checked = this.checked;
  const list = [];

  $('.modifier-row').each(function () {
    toggleRow($(this), checked, list);
  });

  writeIds(list);
  // ensure indeterminate is cleared
  this.indeterminate = false;
  console.log("mealModifierSelectedItems:", $("#mealModifierSelectedItems").val());
});

// keep Select All state (checked / unchecked / indeterminate)
function syncSelectAll() {
  const total = $('input[name="modItemActive[]"]').length;
  const checked = $('input[name="modItemActive[]"]:checked').length;
  const $all = $('input[name="modItemActiveAll"]');

  if (checked === 0) {
    $all.prop('checked', false).prop('indeterminate', false);
  } else if (checked === total) {
    $all.prop('checked', true).prop('indeterminate', false);
  } else {
    $all.prop('checked', false).prop('indeterminate', true);
  }
}

function refreshHiddenFromUI() {
  const ids = $('input[name="modItemActive[]"]:checked').map(function () {
    return $(this)
      .closest('.modifier-row')
      .find('input[name="modifier_id[]"]').val();
  }).get().filter(Boolean);

  // de-duplicate
  const uniqueIds = [...new Set(ids)];
  $("#mealModifierSelectedItems").val(uniqueIds.join(','));
}


// call once at load in case some are pre-checked
$(function () {
  // if some rows are pre-checked, reflect that in the hidden field
  refreshHiddenFromUI();
  // and keep the master checkbox state correct
  syncSelectAll();
});

$(document).on('click', '#mod_sub_btn', function (e) {
    e.preventDefault();
    //each function with name modItemActive and gather all checked item's data and set it to hidden field mealModifierSelectedItemsValue
    const selectedItems = [];
    $('input[name="modItemActive[]"]:checked').each(function () {
        const $row = $(this).closest('.modifier-row');
        const itemData = {
            id: $row.find('input[name="modifier_id[]"]').val(),
            name: $row.find('input[name="addonsname[]"]').val(),
            price: $row.find('input[name="addonsprice[]"]').val(),
            minQty: $row.find('input[name="minqty[]"]').val(),
            maxQty: $row.find('input[name="maxqty[]"]').val()
        };
        selectedItems.push(itemData);
    });
    // Set the selected items to the hidden field
    $('#mealModifierSelectedItemsValue').val(JSON.stringify(selectedItems));
    // Optionally, you can submit the form or perform any other action here
    console.log("Selected Items:", selectedItems); // Debugging output  
    // Submit the form if needed
    $(this).closest('form').submit(); // Assuming your form has the ID addonsForm
});