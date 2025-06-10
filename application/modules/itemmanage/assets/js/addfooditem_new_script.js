 "use strict";
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
	$("#bigurl").val(output.src);
  }; 

  /** New CSS Added on 13-03-2025 */

$(document).ready(function(){
    // $("#addMore").click(function(){
    //     let lastRow = $(".variant-row").last();
    //     let variantInput = lastRow.find("input[name='variant_name[]']");
    //     let variantValue = $.trim(variantInput.val()).toLowerCase();
    
    //     if(variantValue === "" || variantValue === "0" || variantValue === null){
    //         alert("Variant Name cannot be empty, null, or 0!");
    //         variantInput.focus();
    //         return false;
    //     }
    
    //     let newRow = lastRow.clone();

    //      // Get new row index based on number of rows
    //      let rowCount = $(".variant-row").length + 1;

    //      // Set new ID for the row
    //      newRow.attr("id", "variantRow_" + rowCount);
         
    //     newRow.find("input").val(""); // Clear values
    //     newRow.find(".price-comparison").html(''); //Clear price comparison message
    //     newRow.find("input").removeAttr("id"); // Remove old IDs
    
    //     $("#variantContainer").append(newRow);
    // });

    $("#addMore").click(function () {
    let lastRow = $(".variant-row").last();
    let variantInput = lastRow.find("input[name='variant_name[]']");
    let variantValue = $.trim(variantInput.val()).toLowerCase();

    if (variantValue === "" || variantValue === "0" || variantValue === null) {
        alert("Variant Name cannot be empty, null, or 0!");
        variantInput.focus();
        return false;
    }


    let rowCount = $(".variant-row").length + 1;
    let variantId = "variantRow_" + rowCount;
    let variantName = "variant" + rowCount; // used to replace {{name}}

    var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
    var csrf = $('#csrfhashresarvation').val();

    $.ajax({
        type: "GET",
        url: myurl,
        data: { csrf_test_name: csrf },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var options = '<option value="">Select Ingredients</option>';
                $.each(response.data, function (key, ingredient) {
                    options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
                });

                var recipeTable = `
                    <div class="row variant-row mb-2" id="${variantId}">
                        <div class="col-md-12 mb-2">
                            <input type="text" name="variant_name[]" class="form-control variant-name" placeholder="Variant Name">
                        </div>

                        <div class="col-md-2 mb-2"><small>Price</small><input type="text" name="price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Takeaway</small><input type="text" name="takeaway_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Ubereats</small><input type="text" name="uber_eats_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Doordash</small><input type="text" name="doordash_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Weborder</small><input type="text" name="weborder_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2">
                            <button type="button" class="removeRowVariant btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>

                        <div class="col-md-12" id="variantRecipe_{{name}}">
                            <div class="recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                <h4 style="display:none;">Recipe for - {{name}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small><strong>Recipe Cost Price</strong></small>
                                        <input type="text" class="form-control" id="recipe_costprice_{{name}}" name="recipe_costprice_{{name}}[]">
                                    </div>
                                <div class="col-md-6">
                                    <small><strong>Recipe Used Quantity</strong></small>
                                    <input type="text" class="form-control" id="recipe_usedqty_{{name}}" name="recipe_usedqty_{{name}}[]">
                                </div>
                            </div>
                                <input type="hidden" name="recipe_for[]" value="{{name}}">

                                <table class="table table-bordered" id="recipeTable_{{name}}">
                                    <thead>
                                        <tr>
                                            <th width="200">Item Information</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addPurchaseItem_{{name}}">
                                        <tr id="row_{{name}}1">
                                            <td>
                                                <select name="product_id_{{name}}[]" id="product_id_{{name}}_1" class="postform resizeselect form-control ingredient-select" data-row-id="{{name}}_1">
                                                    ${options}
                                                </select>
                                            </td>
                                            <td><input type="text" name="product_quantity_{{name}}[]" id="product_quantity_{{name}}_1" class="form-control quantityCheck product_quantity_{{name}}" data-row-id="{{name}}_1"></td>
                                            <td><input type="text" name="product_price_{{name}}[]" id="product_price_{{name}}_1" class="form-control text-right product_price_{{name}}" placeholder="0.00"></td>
                                            <td>
                                                <input type="hidden" id="unit-total_{{name}}_1">
                                                <input type="hidden" name="unitid_{{name}}[]" id="unitid_{{name}}_1">
                                                <input type="text" name="unitname_{{name}}[]" id="unitname_{{name}}_1" class="form-control" readonly>
                                            </td>
                                            <td><button type="button" class="btn btn-danger remove-item"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success add-item" id="{{name}}" data-variant="{{name}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Ingradient</button>
                            </div>
                        </div>
                    </div>
                `;

                $("#variantContainer").append(recipeTable);
            } else {
                alert("Failed to fetch ingredients.");
            }
        },
        error: function () {
            alert("Error fetching ingredients.");
        }
    });
});

    


    
    
    
    
    

    //Add new logic for variant row
    // $(document).on('blur', "input[name='variant_name[]']", function(){
    //     let variantName = $.trim($(this).val()).toLowerCase().replace(/\s+/g, "_").replace(/[^\w\-]+/g, "");
    //     if(variantName !== ""){
    //         $(this).attr("id", variantName);
    //         $(this).closest(".variant-row").find("input[name='price[]']").attr("id", variantName + "_price");
    //         $(this).closest(".variant-row").find("input[name='takeaway_price[]']").attr("id", variantName + "_takeaway_price");
    //         $(this).closest(".variant-row").find("input[name='uber_eats_price[]']").attr("id", variantName + "_uber_eats_price");
    //         $(this).closest(".variant-row").find("input[name='doordash_price[]']").attr("id", variantName + "_doordash_price");
    //         $(this).closest(".variant-row").find("input[name='weborder_price[]']").attr("id", variantName + "_weborder_price");
    //     }
    // });

    
    // Remove Row Logic
    $(document).on("click", ".removeRowVariant", function(){
        if($(".variant-row").length > 1){
            $(this).closest(".variant-row").remove();
        } else {
            alert("At least one row is required.");
        }
    });
    
    
    $(document).on("click", ".removeRowVariant", function(){
        if($(".variant-row").length > 1){
            $(this).closest(".variant-row").remove();
        } else {
            alert("At least one row is required.");
        }
    });
});



// On page load: assign IDs for any prefilled variant names


    // Add new logic for Variant row on Blur an On load
    function assignVariantIds() {
        $("input[name='variant_name[]']").each(function(){
            let variantName = $.trim($(this).val()).toLowerCase().replace(/\s+/g, "_").replace(/[^\w\-]+/g, "");
            if(variantName !== ""){
                $(this).attr("id", variantName);
                $(this).closest(".variant-rowedit").find("input[name='price[]']").attr("id", variantName + "_price");
                $(this).closest(".variant-rowedit").find("input[name='takeaway_price[]']").attr("id", variantName + "_takeaway_price");
                $(this).closest(".variant-rowedit").find("input[name='uber_eats_price[]']").attr("id", variantName + "_uber_eats_price");
                $(this).closest(".variant-rowedit").find("input[name='doordash_price[]']").attr("id", variantName + "_doordash_price");
                $(this).closest(".variant-rowedit").find("input[name='weborder_price[]']").attr("id", variantName + "_weborder_price");

                //
                $(this).closest(".variant-row").find("input[name='price[]']").attr("id", variantName + "_price");
                $(this).closest(".variant-row").find("input[name='takeaway_price[]']").attr("id", variantName + "_takeaway_price");
                $(this).closest(".variant-row").find("input[name='uber_eats_price[]']").attr("id", variantName + "_uber_eats_price");
                $(this).closest(".variant-row").find("input[name='doordash_price[]']").attr("id", variantName + "_doordash_price");
                $(this).closest(".variant-row").find("input[name='weborder_price[]']").attr("id", variantName + "_weborder_price");
            }
        });
    }

//for Add / Edit view Price Calculation

// Function to handle comparison
// Function to handle comparison of all price inputs with updated purchase price
function updateAllPriceComparisons() {
    let purchasePrice = parseFloat($('#purchase_price').val());

    if (isNaN(purchasePrice)) {
        $('.price-comparison').html('');
        return;
    }

    $('.productprices').each(function () {
        $(this).find("input[name='price[]'], input[name='takeaway_price[]'], input[name='uber_eats_price[]'], input[name='doordash_price[]'], input[name='weborder_price[]']").each(function () {
            let $input = $(this);
            let price = parseFloat($input.val());

            let variantName = ($row.find("input[name='variant_name[]']").val() || '').trim().toLowerCase();

            if (variantName === '') {
                // silently skip without showing a message
                return;
            }

            if (isNaN(price)) {
                $input.next('br').next('.price-comparison').html('');
                return;
            }

            let diff = price - purchasePrice;
            let percentage = ((Math.abs(diff) / purchasePrice) * 100).toFixed(2);

            let message = '';
            if (diff > 0) {
                message = `<small class="text-success"><i class="fa fa-long-arrow-up"></i> $${diff.toFixed(2)} (${percentage}%)</small>`;
            } else if (diff < 0) {
                message = `<small class="text-danger"><i class="fa fa-long-arrow-down"></i> $${Math.abs(diff).toFixed(2)} (${percentage}%)</small>`;
            } else {
                message = `<small class="text-primary"><i class="fa fa-long-arrow-right"></i> Equal to Purchase Price</small>`;
            }

            $input.next('br').next('.price-comparison').html(message);
        });
    });
}

// Only compare when purchase price changes
$('#purchase_price').on('input', function () {
    updateAllPriceComparisons();
});


$(document).ready(function() {

    assignVariantIds();  // <-- run once
    // First attach the event handler
    $(document).on('input', "input[name='price[]'], input[name='takeaway_price[]'], input[name='uber_eats_price[]'], input[name='doordash_price[]'], input[name='weborder_price[]']", function() {

        let $input = $(this);
        console.log('Input ID on page loading: ' + $input.attr('id'));  // use console instead of alert for better debugging

        let price = parseFloat($input.val());
        console.log('Price Value:', price);
    
        if (isNaN(price)) {
            $input.next('br').next('.price-comparison').html('');
            return;
        }

         // Try to find .variant-rowedit first, then fallback to .variant-row
        let $row = $input.closest('.variant-rowedit');
        if ($row.length === 0) {
            $row = $input.closest('.variant-row');
        }
        console.log('Row ID loading..:', $row.attr('id'));
        //let variantName = $row.find("input[name='variant_name[]']").val().trim().toLowerCase();
        let variantName = ($row.find("input[name='variant_name[]']").val() || '').trim().toLowerCase();
    
        if (variantName === '') {
            $input.next('br').next('.price-comparison').html('<small style="color:red;">Enter Variant Name first!</small>');
            return;
        }
    
        console.log('Variant Name:', variantName);

        let recipeSelector = "#recipe_costprice_" + variantName;
        let recipeInput = $(recipeSelector);

        console.log('Looking for recipe input with selector:', recipeSelector);
        console.log('Number of matching inputs:', recipeInput.length);
        console.log('Recipe Input:', recipeInput);

        if (recipeInput.length === 0) {
            console.error('No recipe cost price input found for variant:', variantName);
            $input.next('br').next('.price-comparison').html('<small style="color:orange;">Recipe cost input not found!</small>');
            return;
        }

        let recipeCost = parseFloat($(recipeSelector).val());
        console.log('Recipe Cost Value:', recipeCost);

        if (isNaN(recipeCost)) {
            //$input.next('br').next('.price-comparison').html('<small style="color:orange;">Recipe cost not available!</small>');
            return;
        }

    
        let diff = price - recipeCost;
        let percentage = ((Math.abs(diff) / recipeCost) * 100).toFixed(2);
    
        let message = '';
        if (diff > 0) {
            message = '<small class="text-success"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> $' + diff.toFixed(2) + ' (' + percentage + '%)</small>';
        } else if (diff < 0) {
            message = '<small class="text-danger"><i class="fa fa-long-arrow-down" aria-hidden="true"></i> $' + Math.abs(diff).toFixed(2) + ' (' + percentage + '%)</small>';
        } else {
            message = '<small class="text-primary"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Equal Cost</small>';
        }
    
        $input.next('br').next('.price-comparison').html(message);

    });

    // Then trigger 'input' on all fields after handler is attached
    //$("input[name='price[]'], input[name='takeaway_price[]'], input[name='uber_eats_price[]'], input[name='doordash_price[]'], input[name='weborder_price[]']").trigger('input');
    $("input[name='price[]'], input[name='takeaway_price[]'], input[name='uber_eats_price[]'], input[name='doordash_price[]'], input[name='weborder_price[]']").each(function () {
        $(this).trigger('input');
    });


});



$(document).ready(function() {
    $(".addons-select").each(function() {
        let selectBox = $(this);
        selectBox.select2({
            placeholder: "Choose Modifiers",
            closeOnSelect: false,
            allowClear: true,
            templateResult: formatOption,
            templateSelection: formatSelection
        });

        function formatOption(state) {
            if (!state.id) return state.text;
            let checkbox = $("<input>", {
                type: "checkbox",
                class: "select2-checkbox",
                checked: selectBox.find('option[value="' + state.id + '"]').prop("selected")
            });
            return $("<span>").append(checkbox).append(" " + state.text);
        }

        function formatSelection(state) {
            return state.text;
        }

        // Select All Functionality
        selectBox.on("select2:select", function (e) {
            let selectedValue = e.params.data.id;
            if (selectedValue.startsWith("select-all-")) {
                let groupId = selectedValue.replace("select-all-", "");
                let allOptions = selectBox.find("option").not(".select-all-option");
                allOptions.prop("selected", true);
                selectBox.trigger("change");
            }
        });

        selectBox.on("select2:unselect", function (e) {
            let selectedValue = e.params.data.id;
            let allOptions = selectBox.find("option").not(".select-all-option");

            if (selectedValue.startsWith("select-all-")) {
                allOptions.prop("selected", false);
            } else {
                let allSelected = allOptions.filter(":selected").length === allOptions.length;
                selectBox.find("option.select-all-option").prop("selected", allSelected);
            }

            selectBox.trigger("change");
        });
    });
});



$(document).ready(function () {
    $('.selectcategories').select2();
});

// Hide  Add Variant button and show Save Variant button in case of not enable Recipe Mode
$(document).ready(function () {
    // Function to toggle buttons and clear recipeContainer if unchecked
    function toggleButtons() {
        let is_bom_checked = $("#is_bom_check").is(":checked");
        if (is_bom_checked) {
            $("#addMore").show();
            $("#saveEditVariant").show();
            $('#recipesPanel').show();
        } else {
            //$("#addMore").hide();
            $("#saveEditVariant").hide();
            $('#recipesPanel').hide();

            // Remove all past added rows from #recipeContainer
            //$("#recipeContainer").empty();
            $(".variant-recipe").remove();

            // Keep only the first row in #variantContainer
            //$("#variantContainer .variant-row:gt(0)").remove(); // Removes all but the first variant row
        }
    }

    // Call the function on page load
    toggleButtons();

    // Add change event listener to the checkbox
    $("#is_bom_check").on("change", function () {
        toggleButtons();
    });
});


// Handle Variant on Recepie on 17th May 2025
/**
 * ===================================================
 * ALL PRODUCTION JS VALIDATION CODE
 * =======================================================
 * 
 */

// Validate Item

$(document).ready(function () {
    $("#saveEditVariant").on("click", function () {
        $("#variantContainer .variant-row").each(function () {
            var variantName = $(this).find('input[name="variant_name[]"]').val().trim();
    
            if (variantName !== "") {
                var variantId = variantName.replace(/\s+/g, '_').toLowerCase(); // Create a unique ID
    
                // Check if the recipe table for this variant already exists
                if ($("#recipeTable_" + variantId).length === 0) {
                    var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
                    var csrf = $('#csrfhashresarvation').val();
    
                    $.ajax({
                        type: "GET",
                        url: myurl,
                        data: { csrf_test_name: csrf },
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success") {
                                var options = '<option value="">Select Ingredients</option>';
                                $.each(response.data, function (key, ingredient) {
                                    options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
                                });
    
                                var recipeTable = `
                                    <div class="variant-recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                        <h4>Recipe for - ${variantName}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small><strong>Recipe Cost Price</strong></small>
                                                <input type="text" class="form-control" id="recipe_costprice_${variantId}" name="recipe_costprice_${variantId}[]"/>
                                            </div>
                                            <div class="col-md-6">
                                                <small><strong>Recipe Used Quantity</strong></small>
                                                <input type="text" class="form-control" id="recipe_usedqty_${variantId}" name="recipe_usedqty_${variantId}[]"/>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="recipe_for[]" value="${variantName}"/>
                                        <table class="table table-bordered" id="recipeTable_${variantId}">
                                            <thead>
                                                <tr>
                                                    <th width="200">Item Information</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th>Unit</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addPurchaseItem_${variantId}">
                                                <tr id="row_${variantId}_1">
                                                    <td>
                                                        <select name="product_id_${variantId}[]" id="product_id_${variantId}_1" class="postform resizeselect form-control ingredient-select" data-row-id="${variantId}_1">
                                                            ${options}
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${variantId}_1" class="form-control quantityCheck product_quantity_${variantId}" data-row-id="${variantId}_1"></td>
                                                    <td class="text-right">
                                                        <input type="hidden" id="unit-total_${variantId}_1" class="" />
                                                        <input type="hidden" name="unitid_${variantId}[]" id="unitid_${variantId}_1" class="form-control text-right">
                                                        <input type="text" name="unitname_${variantId}[]" id="unitname_${variantId}_1" class="form-control text-right" readonly>
                                                    </td>
                                                    <td class="text-right">
                                                        <input type="text" name="product_price_${variantId}[]" id="product_price_${variantId}_1" class="form-control text-right product_price_${variantId}" placeholder="0.00">
                                                    </td>
                                                    <td><button class="btn btn-danger remove-item" type="button"><i class="fa fa-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success add-item" data-variant="${variantId}">Add More Item</button>
                                    </div>
                                `;

                                $("#recipeContainer").after(recipeTable);
                            } else {
                                alert("Failed to fetch ingredients.");
                            }
                        },
                        error: function () {
                            alert("Error fetching ingredients.");
                        }
                    });
                }
            }
        });
    });

    // Add new row dynamically
    // $(document).on("click", ".add-item", function () {
    //     var variantId = $(this).data("variant"); // Get the correct variant ID
      
    //     var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
    //     var csrf = $('#csrfhashresarvation').val();
    //     var rowCount = $("#addPurchaseItem_" + variantId + " tr").length + 1; // Count rows to maintain sequential numbering
    //     var rowId = variantId + "_" + rowCount; // Unique row ID

    //     $.ajax({
    //         type: "GET",
    //         url: myurl,
    //         data: { csrf_test_name: csrf },
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.status == "success") {
    //                 var options = '<option value="">Select Ingredients</option>';
    //                 $.each(response.data, function (key, ingredient) {
    //                     options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
    //                 });

    //                 var newRow = `
    //                     <tr id="row_${rowId}">
    //                         <td>
    //                             <select name="product_id_${variantId}[]" id="product_id_${rowId}" class="postform resizeselect form-control ingredient-select" data-row-id="${rowId}">
    //                                 ${options}
    //                             </select>
    //                         </td>
    //                         <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${rowId}" class="form-control quantityCheck" data-row-id="${rowId}"></td>
    //                         <td class="text-right">
    //                               <input type="text" name="product_price_${variantId}[]" id="product_price_${rowId}" class="form-control text-right product_price_${variantId}" placeholder="0.00">
    //                         </td>
    //                         <td class="text-right">
    //                             <input type="hidden" id="unit-total_${rowId}" class="" />
    //                             <input type="hidden" name="unitid_${variantId}[]" id="unitid_${rowId}" class="form-control text-right">
    //                             <input type="text" name="unitname_${variantId}[]" id="unitname_${rowId}" class="form-control text-right" readonly>
    //                         </td>
    //                         <td><button class="btn btn-danger remove-item" type="button"><i class="fa fa-trash"></i></button></td>
    //                     </tr>
    //                 `;

    //                 $("#addPurchaseItem_" + variantId).append(newRow);
    //             } else {
    //                 alert("Failed to fetch ingredients.");
    //             }
    //         },
    //         error: function () {
    //             alert("Error fetching ingredients.");
    //         }
    //     });
    // });

    $(document).on("click", ".add-item", function () {
        
        //var variantId = $(this).data("variant").toString().toLowerCase().trim(); // Ensure lowercase trimmed ID
        var variantId = $(this).attr('id').toString().toLowerCase().trim();
        var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
        var csrf = $('#csrfhashresarvation').val();
        
        var rowCount = $("#addPurchaseItem_" + variantId + " tr").length + 1;
        var rowId = variantId + "_" + rowCount;
    
        $.ajax({
            type: "GET",
            url: myurl,
            data: { csrf_test_name: csrf },
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    var options = '<option value="">Select Ingredients</option>';
                    $.each(response.data, function (key, ingredient) {
                        options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
                    });
    
                    var newRow = `
                        <tr id="row_${rowId}">
                            <td>
                                <select name="product_id_${variantId}[]" id="product_id_${rowId}" class="postform resizeselect form-control ingredient-select" data-row-id="${rowId}">
                                    ${options}
                                </select>
                            </td>
                            <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${rowId}" class="form-control quantityCheck product_quantity_${variantId}" data-row-id="${rowId}"></td>
                            <td>
                                <input type="hidden" id="unit-total_${rowId}">
                                <input type="hidden" name="unitid_${variantId}[]" id="unitid_${rowId}">
                                <input type="text" name="unitname_${variantId}[]" id="unitname_${rowId}" class="form-control" readonly>
                            </td>
                            <td><input type="text" name="product_price_${variantId}[]" id="product_price_${rowId}" class="form-control text-right product_price_${variantId}" placeholder="0.00"></td>
                            <td><button class="btn btn-danger remove-item" type="button"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    `;
                    $("#addPurchaseItem_" + variantId).append(newRow);
                } else {
                    alert("Failed to fetch ingredients.");
                }
            },
            error: function () {
                alert("Error fetching ingredients.");
            }
        });
    });
    

    // Handle onchange event dynamically for ingredient selection
    $(document).on("change", ".ingredient-select", function () {
        var ingredientId = $(this).val(); // Get selected ingredient ID
        var rowId = $(this).attr('data-row-id'); // Get row ID
        console.log('Ingredient Select Row ID:', rowId);
        if((rowId !="{{name}}")){
            checkproduct_list(ingredientId, rowId); // Pass ingredient ID and row ID to function
        }
    });

    //Handle onchange event dynamically for ingredient Selection Edit View
    function checkproduct_list_editview(ingredientId, sl) {
        var geturl = $("#url").val();
    
        if (ingredientId == 0 || ingredientId == '') {
            alert('Please select Ingredient !');
            $('#product_id_' + sl).val("").trigger('change');
            return false;
        }
    
        var product_id = $('#product_id_' + sl).val();
        var product_name = $('#product_id_' + sl + ' option:selected').data('title');

        
    }
    $(document).on("change", ".ingredient-selecteditview", function () {
        var ingredientId = $(this).val(); // Get selected ingredient ID
        console.log('Ingredient ID:', ingredientId);
        var rowId = $(this).attr('data-row-id'); // Get row ID
        console.log('Row ID:', rowId);
        if((rowId !=="{{name}}")){
            checkproduct_list(ingredientId, rowId); // Pass ingredient ID and row ID to function
        }
    });


    //Handle Quantity Change
    $(document).on("keyup", ".quantityCheck", function () {
        var rowId = $(this).attr('data-row-id'); // Get row ID
        //alert('Row ID'+rowId);
        console.log('Quantity Row ID:', rowId);
        if(rowId !=="{{name}}"){
            calprice(rowId); // Pass ingredient ID and row ID to function
        }
    });

    // Remove row on delete button click
    $(document).on("click", ".remove-item", function () {
        $(this).closest("tr").remove();
    });    


});


function calprice(rowId){
    //alert('Row ID'+rowId);
    var ingrden = $('#product_id_'+rowId+' option:selected').data('title');
    //alert('Ingredient Name'+ingrden);
    if (ingrden == 0 || ingrden=='') {
      $('#product_quantity_'+rowId).val('');
      //alert('Please select Item!');
      $('#product_price_' + rowId).attr("value", '');


      //Add Recipe Cost Price to 0
      $('#recipe_costprice_'+rowId).val(0);

      return false;
    }
    else{
        //alert('Row ID Else condition :'+rowId);
        var toatalval = $('#unit-total_'+rowId).val();
        //alert('Total Value:' + toatalval);
        var qty = $('#product_quantity_'+rowId).val();
        //alert('Quantity:' + qty);
        var totalval = parseFloat(toatalval);
        if (isNaN(totalval) || totalval <= 0) {
            totalval = 0;
        }

        var qty = parseFloat(qty);
        if (isNaN(qty) || qty <= 0) {
            qty = 0;
        }
        var nitcost=parseFloat(toatalval)*parseFloat(qty);
        console.log('Nit Cost :', nitcost);
        $('#product_price_'+rowId).val(parseFloat(nitcost).toFixed(3));
        $('#product_price_' + rowId).attr("value", parseFloat(nitcost).toFixed(3));

        // Sum all product_price fields for the current variant
        var recipe_costprice = 0;
        // Get the variant Name from Row Id
        var variantId =  rowId.replace(/[0-9_]/g, '').trim().toLowerCase();
        console.log('.product_price_' + variantId);
        $('.product_price_' + variantId).each(function () {
            recipe_costprice += parseFloat($(this).val());
        });

        //Get the recipe used quantity
        var recipe_usedqty = 0;
       $('.product_quantity_' + variantId).each(function () {
            recipe_usedqty += parseFloat($(this).val());
        });
        console.log('Recipe Used Quantity:', recipe_usedqty);
        $('#recipe_usedqty_' + variantId).val(recipe_usedqty.toFixed(3));
        $('#recipe_usedqty_' + variantId).attr("value", recipe_usedqty.toFixed(3));

        // Find the first .variant-rowedit or .variant-row
        var targetRow = $('.variant-rowedit, .variant-row').first();
        console.log('Target Row:', targetRow.attr('id'));

        // Find any element with a class starting with 'recipe_usedqty_'
           // Within that row, find input with id or class starting with 'recipe_usedqty_'
        var qtyInput = targetRow.find('input[id^="recipe_usedqty_"], input[class^="recipe_usedqty_"]').first();
        console.log('Qty Input:', qtyInput);

        // If found, get its value
        if (qtyInput.length) {
            var qtyValue = qtyInput.val(); // use .text() if it's not an input
            console.log('Qty Value:', qtyValue);
            $('#weightage').val(qtyValue);
        }


 
         // Update total recipe cost input for the current variant
         console.log('Recipe Cost Price:', recipe_costprice);
         $('#recipe_costprice_' + variantId).val(recipe_costprice.toFixed(3));
         $('#recipe_costprice_' + variantId).attr("value", recipe_costprice.toFixed(3));

        // Trigger input on all price fields for this variant to refresh profit display
        $("input[name='price[]'], input[name='takeaway_price[]'], input[name='uber_eats_price[]'], input[name='doordash_price[]'], input[name='weborder_price[]']").trigger('input');

    }

}

function checkproduct_list(ingredientId, sl) {
    var geturl = $("#url").val();

    if (ingredientId == 0 || ingredientId == '') {
        alert('Please select Ingredient !');
        $('#product_id_' + sl).val("").trigger('change');
        return false;
    }

    var product_id = $('#product_id_' + sl).val();
    var product_name = $('#product_id_' + sl + ' option:selected').data('title');

    console.log('Ingradient Select product_id' + product_id);

    // Get Unit value based on selected Ingredient
    var getUomIngredientUrl = $("#get_uom_listby_ing").val();
    console.log('getUomIngredientUrl' + getUomIngredientUrl);
    $.ajax({
        type: "GET",
        url: getUomIngredientUrl + '/' + product_id,
        cache: false,
        success: function (response) {
            var uomData = JSON.parse(response);
            console.log('uomdata' +JSON.stringify(uomData));

            if (uomData && uomData.length > 0) {
                $('#unitid_' + sl).val(uomData[0].consumption_unit); // Set UOM ID of conusmption unit
                $('#unitname_' + sl).val(uomData[0].consumtion_unitname); // Set UOM Name of consumption unit
            } else {
                alert('No UOM available for the selected product.');
                $('#unitid_' + sl).val('');
                $('#unitname_' + sl).val('');
            }
        },
        error: function () {
            alert('Error fetching UOM details.');
        }
    });

    var csrf = $('#csrfhashresarvation').val();
    console.log('product_id' +product_id);
    $.ajax({
        type: "POST",
        url: geturl,
        data: { product_id: product_id, csrf_test_name: csrf },
        cache: false,
        success: function (data) {
            console.log('raw data:', data);
            var obj = JSON.parse(data);
            console.log('parsed:', obj);
    
            if (obj && obj.length > 0 && obj[0].cost_perunit > 0) {
                //$('#product_quantity_' + sl).removeAttr('readonly'); cost_perunit
                //$('#unit-total_' + sl).val(obj[0].cost_perunit_price);
                $('#unit-total_' + sl).val(obj[0].cost_perunit);
            } else {
                $('#unit-total_' + sl).val('');
                //$('#product_quantity_' + sl).prop('readonly', true);
            }
        }
    });
}

/**
 * ===================================================
 * MODIFIER JS VALIDATION CODE
 * ===================================================
 */

$(document).ready(function () {
    $(".modifier-checkbox").on("change", function () {
        let groupId = $(this).data("group-id");
        let minInput = $("#minsel_" + groupId);
        let maxInput = $("#maxsel_" + groupId);
        let isReqInput = $("#isreq_" + groupId);
        let sortInput = $("#sort_" + groupId);

        if ($(this).is(":checked")) {
            minInput.prop("disabled", false);
            maxInput.prop("disabled", false);
            isReqInput.prop("disabled", false);
            sortInput.prop("disabled", false);
        } else {
            minInput.prop("disabled", true).val(""); // Clear value when disabled
            maxInput.prop("disabled", true).val("");
            isReqInput.prop("disabled", true);
            sortInput.prop("disabled", true).val("");
        }
    });

    // Prevent negative values dynamically when input changes
    $(".modifierminsel, .modifiermaxsel, #sort").on("input", function () {
        if ($(this).val() < 0) {
            $(this).val(0);
        }
    });
});

/**
 * Modified Edit form When Edit Item
 */
$(document).ready(function(){

    $(document).ready(function () {
        $("#saveEditVariantUpdt").on("click", function () {
            $("#variantContainer .variant-rowedit").each(function () {
                var variantName = $(this).find('input[name="variant_name[]"]').val().trim();
    
                if (variantName !== "") {
                    var variantId = variantName.replace(/\s+/g, '_').toLowerCase(); // Generate unique ID
                    
                    // Check if the recipe table for this variant already exists
                    if ($("#recipeTable_" + variantId).length === 0) {
                        var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
                        var csrf = $('#csrfhashresarvation').val();
    
                        $.ajax({
                            type: "GET",
                            url: myurl,
                            data: { csrf_test_name: csrf },
                            dataType: "json",
                            success: function (response) {
                                if (response.status === "success") {
                                    var options = '<option value="">Select Ingredients</option>';
                                    $.each(response.data, function (key, ingredient) {
                                        options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
                                    });
    
                                    // Ensure variant does not exist before adding it
                                    var existingVariant = $(".variant-recipe").filter(function () {
                                        return $(this).find("h4").text().trim() === `Recipe for - ${variantName}`;
                                    });
                                    //alert(JSON.stringify(existingVariant));
                                    //alert(existingVariant.length);
                                    if (existingVariant.length === 0) {
                                        var recipeTable = `
                                            <div class="variant-recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                                <h4>Recipe for - ${variantName}</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <small><strong>Recipe Cost Price</strong></small>
                                                        <input type="text" class="form-control" id="recipe_costprice_${variantId}" name="recipe_costprice_${variantId}[]"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small><strong>Recipe Used Quantity</strong></small>
                                                        <input type="text" class="form-control" id="recipe_usedqty_${variantId}" name="recipe_usedqty_${variantId}[]"/>
                                                    </div>
                                                </div>
                                                  
                                                    <input type="hidden" name="recipe_for[]" value="${variantName}"/>

                                                <table class="table table-bordered" id="recipeTable_${variantId}">
                                                    <thead>
                                                        <tr>
                                                            <th width="200">Item Information</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Unit</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="addPurchaseItem_${variantId}">
                                                        <tr id="row_${variantId}_1">
                                                            <td>
                                                                <select name="product_id_${variantId}[]" id="product_id_${variantId}_1" class="postform resizeselect form-control ingredient-select" data-row-id="${variantId}_1">
                                                                    ${options}
                                                                </select>
                                                            </td>
                                                             <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${variantId}_1" class="form-control quantityCheck product_quantity_${variantId}" data-row-id="${variantId}_1"></td>
                                                            
                                                            <td class="text-right">
                                                                <input type="hidden" id="unit-total_${variantId}_1" class="" />
                                                                <input type="hidden" name="unitid_${variantId}[]" id="unitid_${variantId}_1" class="form-control text-right">
                                                                <input type="text" name="unitname_${variantId}[]" id="unitname_${variantId}_1" class="form-control text-right" readonly>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="product_price_${variantId}[]" id="product_price_${variantId}_1" class="form-control text-right product_price_${variantId}" placeholder="0.00">
                                                            </td>
                                                            <td><button class="btn btn-danger remove-item" type="button"><i class="fa fa-trash"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-success add-item" data-variant="${variantId}">Add More Item</button>
                                            </div>
                                        `;
    
                                        $("#recipeContainer").append(recipeTable); // Append new recipe table
                                    }
                                } else {
                                    alert("Failed to fetch ingredients.");
                                }
                            },
                            error: function () {
                                alert("Error fetching ingredients.");
                            }
                        });
                    }
                }
            });
        });
    });
    
    
    // Add new variant row
    // $("#addMoreEdit").click(function(){
    //     let row = $(".variant-rowedit:first").clone(); // Clone the first row
    //     row.find("input").val(""); // Clear input values
    //     $("#variantContainer").append(row); // Append cloned row
    // });

    // $("#addMoreEdit").click(function() {
    //     let row = $(".variant-rowedit:first").clone(); // Clone the first variant row
    //     row.find("input").val(""); // Clear all input values
    //     row.find(".price-comparison").html(''); // Clear any profit/loss messages if present
    //     row.find("input").removeAttr("id"); // Remove any existing IDs
    //     $("#variantContainer").append(row); // Append the cleared clone to the container
    // });

    $("#addMoreEdit").click(function () {
        let lastRow = $(".variant-rowedit").last();
        let variantInput = lastRow.find("input[name='variant_name[]']");
        let variantValue = $.trim(variantInput.val()).toLowerCase();
    
        if (variantValue === "" || variantValue === "0" || variantValue === null) {
            alert("Variant Name cannot be empty, null, or 0!");
            variantInput.focus();
            return false;
        }
    
        let rowCount = $(".variant-rowedit").length + 1;
        let variantId = "variantRowEdit_" + rowCount;
        let variantName = "variantEdit" + rowCount;
    
        var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
        var csrf = $('#csrfhashresarvation').val();
    
        $.ajax({
            type: "GET",
            url: myurl,
            data: { csrf_test_name: csrf },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    var options = '<option value="">Select Ingredients</option>';
                    $.each(response.data, function (key, ingredient) {
                        options += `<option value="${ingredient.id}" data-title="${ingredient.ingredient_name}">${ingredient.ingredient_name}</option>`;
                    });
    
                    var recipeTable = `
                    <div class="row variant-row mb-2" id="${variantId}">
                        <div class="col-md-12 mb-2">
                            <input type="text" name="variant_name[]" class="form-control variant-name" placeholder="Variant Name">
                        </div>

                        <div class="col-md-2 mb-2"><small>Price</small><input type="text" name="price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Takeaway</small><input type="text" name="takeaway_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Ubereats</small><input type="text" name="uber_eats_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Doordash</small><input type="text" name="doordash_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2"><small>Weborder</small><input type="text" name="weborder_price[]" class="form-control"><br/><span class="price-comparison"></span></div>
                        <div class="col-md-2 mb-2">
                            <button type="button" class="removeRowVariant btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>

                        <div class="col-md-12" id="variantRecipe_{{name}}">
                            <div class="recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                <h4 style="display:none;">Recipe for - {{name}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small><strong>Recipe Cost Price</strong></small>
                                        <input type="text" class="form-control" id="recipe_costprice_{{name}}" name="recipe_costprice_{{name}}[]">
                                    </div>
                                    <div class="col-md-6">
                                        <small><strong>Recipe Used Quantity</strong></small>
                                        <input type="text" class="form-control" id="recipe_usedqty_{{name}}" name="recipe_usedqty_{{name}}[]">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="recipe_for[]" value="{{name}}">

                                <table class="table table-bordered" id="recipeTable_{{name}}">
                                    <thead>
                                        <tr>
                                            <th width="200">Item Information</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addPurchaseItem_{{name}}">
                                        <tr id="row_{{name}}1">
                                            <td>
                                                <select name="product_id_{{name}}[]" id="product_id_{{name}}_1" class="postform resizeselect form-control ingredient-select" data-row-id="{{name}}_1">
                                                    ${options}
                                                </select>
                                            </td>
                                            <td><input type="text" name="product_quantity_{{name}}[]" id="product_quantity_{{name}}_1" class="form-control quantityCheck product_quantity_{{name}}" data-row-id="{{name}}_1"></td>
                                            <td>
                                            <input type="hidden" id="unit-total_{{name}}_1">
                                            <input type="hidden" name="unitid_{{name}}[]" id="unitid_{{name}}_1">
                                            <input type="text" name="unitname_{{name}}[]" id="unitname_{{name}}_1" class="form-control" readonly>
                                            </td>
                                            <td><input type="text" name="product_price_{{name}}[]" id="product_price_{{name}}_1" class="form-control text-right product_price_{{name}}" placeholder="0.00"></td>
                                            <td><button type="button" class="btn btn-danger remove-item"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success add-item" id="{{name}}" data-variant="{{name}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Ingradient</button>
                            </div>
                        </div>
                    </div>
                `;
    
                    $("#variantContainer").append(recipeTable);
                } else {
                    alert("Failed to fetch ingredients.");
                }
            },
            error: function () {
                alert("Error fetching ingredients.");
            }
        });
    });
    

    
    
});


 // Remove variant row
 $(document).on("click", ".removeEditRowVariant", function(){
    var variantid = $(this).data("variantid");
    var menuid = $(this).data("menuid");
    var row = $(this).closest(".variant-rowedit");
    var deleteUrl =  $('#get_deletemodifier').val();
    var csrf = $('#csrfhashresarvation').val();
    // Show confirmation dialog
    if (confirm("Are you sure you want to delete this variant and its recipes?")) {
        $.ajax({
            url: deleteUrl,  // Adjust this based on your controller route
            type: "POST",
            data: {csrf_test_name: csrf, variantid: variantid, menuid: menuid},
            dataType: "json",
            success: function(response) {
                if (response.status == "success") {
                    alert("Variant & its recipes deleted successfully!");
                    row.remove();
                } else {
                    alert("Failed to delete variant & its recipes. Please try again.");
                }
            },
            error: function() {
                alert("An error occurred while deleting the variant and its recipes.");
            }
        });
    }
});

//Remove Recipe
$(document).on("click", ".removeEditRecipeBtn", function() {
    var ingredientid = $(this).data("ingredientid");
    var foodid = $(this).data("menuid");
    var variantid =  $(this).data("variantid");
    var delRecipeUrl =  $('#get_delrecipe').val();
    var csrf = $('#csrfhashresarvation').val();

    if (confirm("Are you sure you want to delete this recipe ingredient?")) {
        $.ajax({
            url: delRecipeUrl,
            type: "POST",
            data: { csrf_test_name: csrf, ingredientid: ingredientid, foodid: foodid, variantid :  variantid },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert("Recipe deleted successfully!");
                    location.reload(); // Reload to update UI
                } else {
                    alert("Error deleting recipe. Please try again.");
                }
            },
            error: function() {
                alert("Something went wrong. Please check your connection.");
            }
        });
    }
});

/**
 *  ===================================================\
 * LOADING Calculatinng Sum of price of all ingredients
 * ===================================================
 */
$(document).ready(function () {

    function updateRecipeCostPrice(variantId) {
        var recipe_costprice = 0;
        $('input[name="product_price_' + variantId + '[]"]').each(function () {
            var price = parseFloat($(this).val()) || 0;
            recipe_costprice += price;
        });
        var $recipeInput = $('#recipe_costprice_' + variantId);
        $recipeInput.val(recipe_costprice.toFixed(3));
        $recipeInput.attr('value', recipe_costprice.toFixed(3));
        console.log('Variant: ' + variantId + ', Recipe Cost Price: ' + recipe_costprice.toFixed(3));

        // Update recipe used quantity
        var recipe_usedqty = 0;
        $('input[name="product_quantity_' + variantId + '[]"]').each(function () {
            var qty = parseFloat($(this).val()) || 0;
            recipe_usedqty += qty;
        });
        var $usedQtyInput = $('#recipe_usedqty_' + variantId);
        $usedQtyInput.val(recipe_usedqty.toFixed(3));
        $usedQtyInput.attr('value', recipe_usedqty.toFixed(3));
        console.log('Variant: ' + variantId + ', Recipe Used Quantity: ' + recipe_usedqty.toFixed(3));
        
        
        // Find the first .variant-rowedit or .variant-row
        var targetRow = $('.variant-rowedit, .variant-row').first();
        console.log('Target Row:', targetRow.attr('id'));

        // Find any element with a class starting with 'recipe_usedqty_'
           // Within that row, find input with id or class starting with 'recipe_usedqty_'
        var qtyInput = targetRow.find('input[id^="recipe_usedqty_"], input[class^="recipe_usedqty_"]').first();
        console.log('Qty Input:', qtyInput);

        // If found, get its value
        if (qtyInput.length) {
            var qtyValue = qtyInput.val(); // use .text() if it's not an input
            console.log('Qty Value:', qtyValue);
            $('#weightage').val(qtyValue);
        }

    }

    // Loop through each variant dynamically
    // $('input[name="recipe_for[]"]').each(function () {
    //     var variantId = $(this).val(); // e.g., "regular", "medium"
    //     console.log('Variant ID:', variantId);
    //     updateRecipeCostPrice(variantId);
    // });

    $('input[name="recipe_for[]"]').each(function () { 
        var variantId = $(this).val(); // e.g., "regular", "medium"
        console.log('Variant ID:', variantId);
        console.log(typeof variantId);

        if (variantId != "{{name}}") {
            updateRecipeCostPrice(variantId);
        }
    });


    $(document).on('blur', '.variant-name', function () {
        const $row = $(this).closest('.variant-row');
        const name = $(this).val().toLowerCase().trim().replace(/\s+/g, '_').replace(/[^\w\-]+/g, ''); // Dynamically generated value
    
        // Replace {{name}} dynamically in all the relevant elements
        $row.find('[id*="{{name}}"], [name*="{{name}}"], [data-row-id*="{{name}}"], [data-variant*="{{name}}"]').each(function () {
            const idAttr = $(this).attr('id');
            if (idAttr && idAttr.includes('{{name}}')) {
                $(this).attr('id', idAttr.replace('{{name}}', name));
            }
    
            const nameAttr = $(this).attr('name');
            if (nameAttr && nameAttr.includes('{{name}}')) {
                $(this).attr('name', nameAttr.replace('{{name}}', name));
            }
    
            const dataVariant = $(this).attr('data-variant');
            if (dataVariant && dataVariant.includes('{{name}}')) {
                $(this).attr('data-variant', dataVariant.replace('{{name}}', name)); // Update the data-variant attribute dynamically
            }
    
            const dataRowId = $(this).attr('data-row-id');
            if (dataRowId && dataRowId.includes('{{name}}')) {
                $(this).attr('data-row-id', dataRowId.replace('{{name}}', name));
            }

                // CLASS — this is new
                const $el = $(this);
            const classAttr = $el.attr('class');
            if (classAttr && classAttr.includes('{{name}}')) {
                $el.attr('class', classAttr.replace('{{name}}', name));
            }
    
            updateRecipeCostPrice(name);
    
        });
    
         //Update the hidden input's value (assumes only one per row)
        $row.find('input[type="hidden"][name="recipe_for[]"]').val(name);
        // Update the heading text as well
        $row.find('h4').text(`Recipe for - ${name}`);
    });
    


});



$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});


$(document).ready(function () {


    // Function to toggle visibility
    function toggleRecipeElements(value) {
        if (value == 3) {
            $('#recipe_mode, #recipeBox, #addMore').hide();
            $('#productinfo').show();
            $('#serving_weightage').show();
            $('.productprices').find('input').prop('disabled', false).end().show();
            $('.variantsPanel').hide();
        } else {
            $('#recipe_mode, #recipeBox, #addMore').show();
            $('#productinfo').hide();
            $('#serving_weightage').hide();
            $('.productprices').find('input').prop('disabled', true).end().hide();
            $('.variantsPanel').show();
        }
    }

    // Default show on page load
    $('#recipe_mode, #recipeBox, #addMore, #serving_weightage').show();
    $('#productinfo').hide();
    $('#serving_weightage').hide();
    $('.productprices').find('input').prop('disabled', true).end().hide();
    $('.variantsPanel').show();

    // On change of cuisine_type select box
    $('select[name="cusine_type"]').on('change', function () {
        let selectedValue = $(this).val();
        //alert('selected value '+selectedValue);
        toggleRecipeElements(selectedValue);
    });

    // Optionally trigger once in case value is preselected
    toggleRecipeElements($('select[name="cusine_type"]').val());
});

$(document).on('change', 'select[name="cusine_type"]', function () {
    let selectedValue = $(this).val();
    toggleRecipeElements(selectedValue);
});



