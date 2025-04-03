 "use strict";
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
	$("#bigurl").val(output.src);
  }; 

  /** New CSS Added on 13-03-2025 */

$(document).ready(function(){
    $("#addMore").click(function(){
        let row = $(".variant-row:first").clone();
        row.find("input").val(""); 
        $("#variantContainer").append(row);
    });
    
    $(document).on("click", ".removeRowVariant", function(){
        if($(".variant-row").length > 1){
            $(this).closest(".variant-row").remove();
        } else {
            alert("At least one row is required.");
        }
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
            $("#addMore").hide();
            $("#saveEditVariant").hide();
            $('#recipesPanel').hide();

            // Remove all past added rows from #recipeContainer
            //$("#recipeContainer").empty();
            $(".variant-recipe").remove();

            // Keep only the first row in #variantContainer
            $("#variantContainer .variant-row:gt(0)").remove(); // Removes all but the first variant row
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
                                        <input type="hidden" name="recipe_for[]" value="${variantName}"/>
                                        <table class="table table-bordered" id="recipeTable_${variantId}">
                                            <thead>
                                                <tr>
                                                    <th width="200">Item Information</th>
                                                    <th>Qty</th>
                                                    <th style="display:none;">Price</th>
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
                                                    <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${variantId}_1" class="form-control quantityCheck" data-row-id="${variantId}_1"></td>
                                                    <td class="text-right" style="display:none;">
                                                        <input type="hidden" name="product_price_${variantId}[]" id="product_price_${variantId}_1" class="form-control text-right" placeholder="0.00" readonly>
                                                    </td>
                                                    <td class="text-right">
                                                        <input type="hidden" id="unit-total_${variantId}_1" class="" />
                                                        <input type="hidden" name="unitid_${variantId}[]" id="unitid_${variantId}_1" class="form-control text-right">
                                                        <input type="text" name="unitname_${variantId}[]" id="unitname_${variantId}_1" class="form-control text-right" readonly>
                                                    </td>
                                                    <td><button class="btn btn-danger remove-item" type="button">Delete</button></td>
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
    $(document).on("click", ".add-item", function () {
        var variantId = $(this).data("variant"); // Get the correct variant ID
      
        var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
        var csrf = $('#csrfhashresarvation').val();
        var rowCount = $("#addPurchaseItem_" + variantId + " tr").length + 1; // Count rows to maintain sequential numbering
        var rowId = variantId + "_" + rowCount; // Unique row ID

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
                            <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${rowId}" class="form-control quantityCheck" data-row-id="${rowId}"></td>
                            <td class="text-right" style="display:none;">
                                  <input type="hidden" name="product_price_${variantId}[]" id="product_price_${rowId}" class="form-control text-right" placeholder="0.00" readonly>
                            </td>
                            <td class="text-right">
                                <input type="hidden" id="unit-total_${rowId}" class="" />
                                <input type="hidden" name="unitid_${variantId}[]" id="unitid_${rowId}" class="form-control text-right">
                                <input type="text" name="unitname_${variantId}[]" id="unitname_${rowId}" class="form-control text-right" readonly>
                            </td>
                            <td><button class="btn btn-danger remove-item" type="button">Delete</button></td>
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
        var rowId = $(this).data("row-id"); // Get row ID
        checkproduct_list(ingredientId, rowId); // Pass ingredient ID and row ID to function
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
        var rowId = $(this).data("row-id"); // Get row ID
        checkproduct_list_editview(ingredientId, rowId); // Pass ingredient ID and row ID to function
    });


    //Handle Quantity Change
    $(document).on("keyup", ".quantityCheck", function () {
        var rowId = $(this).data("row-id"); // Get row ID
        calprice(rowId); // Pass ingredient ID and row ID to function
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
      alert('Please select Item!');

      return false;
    }
    else{
        var toatalval = $('#unit-total_'+rowId).val();
        var qty = $('#product_quantity_'+rowId).val();
        var nitcost=parseFloat(toatalval)*parseFloat(qty);
        $('#product_price_'+rowId).val(parseFloat(nitcost).toFixed(3));

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


    // Get Unit value based on selected Ingredient
    var getUomIngredientUrl = $("#get_uom_listby_ing").val();
    $.ajax({
        type: "GET",
        url: getUomIngredientUrl + '/' + product_id,
        cache: false,
        success: function (response) {
            var uomData = JSON.parse(response);

            if (uomData && uomData.length > 0) {
                $('#unitid_' + sl).val(product_id); // Set UOM ID
                $('#unitname_' + sl).val(uomData[0].uom_short_code); // Set UOM Name
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
    $.ajax({
        type: "POST",
        url: geturl,
        data: { product_name: product_name, csrf_test_name: csrf },
        cache: false,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj && obj.length > 0 && obj[0].uprice > 0) {
                $('#product_quantity_' + sl).removeAttr('readonly'); // Removes the readonly attribute
                $('#unit-total_' + sl).val(obj[0].uprice);
            } else {
                alert('Please purchase this Item.!!!');
                $('#unit-total_' + sl).val('');
                $('#product_quantity_' + sl).prop('readonly', true); // Preferred way for boolean attributes
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
                                                <input type="hidden" name="recipe_for[]" value="${variantId}"/>
                                                <table class="table table-bordered" id="recipeTable_${variantId}">
                                                    <thead>
                                                        <tr>
                                                            <th width="200">Item Information</th>
                                                            <th>Qty</th>
                                                            <th style="display:none;">Price</th>
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
                                                            <td><input type="text" name="product_quantity_${variantId}[]" id="product_quantity_${variantId}_1" class="form-control quantityCheck" data-row-id="${variantId}_1"></td>
                                                            <td class="text-right" style="display:none;">
                                                                <input type="hidden" name="product_price_${variantId}[]" id="product_price_${variantId}_1" class="form-control text-right" placeholder="0.00" readonly>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="hidden" id="unit-total_${variantId}_1" />
                                                                <input type="hidden" name="unitid_${variantId}[]" id="unitid_${variantId}_1" class="form-control text-right">
                                                                <input type="text" name="unitname_${variantId}[]" id="unitname_${variantId}_1" class="form-control text-right" readonly>
                                                            </td>
                                                            <td><button class="btn btn-danger remove-item" type="button">Delete</button></td>
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
    $("#addMoreEdit").click(function(){
        let row = $(".variant-rowedit:first").clone(); // Clone the first row
        row.find("input").val(""); // Clear input values
        $("#variantContainer").append(row); // Append cloned row
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



