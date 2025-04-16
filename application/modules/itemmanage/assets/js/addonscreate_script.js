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
                                   $row.find('.consumptionunitbox').show();
                                   $row.find('.consumptionbox').show();
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

        // Clear input values properly
        newRow.find("input[type='text'], input[type='hidden'], input[type='number']").val("");
        newRow.find("input[type='checkbox']").prop("checked", false); // Uncheck checkboxes
        newRow.find("select").val("1"); // Reset dropdown

        // Update remove button ID and make it visible
        newRow.find(".remove-row").attr("id", "removeBtn_" + rowCount).show();

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
        updateSortOrder(); // Update sorting after removal
        checkRemoveButton(); // Check remove button visibility
    });

    // Check remove button visibility (only show if more than one row exists)
    function checkRemoveButton() {
        if ($(".modifier-row").length > 1) {
            $(".remove-row").show();
        } else {
            $(".remove-row").hide();
        }
    }

    // Run this on page load
    updateSortOrder();
    checkRemoveButton();
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
});


