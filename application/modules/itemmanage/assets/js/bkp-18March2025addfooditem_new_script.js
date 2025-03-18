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
                                    options += `<option value="${ingredient.id}">${ingredient.ingredient_name}</option>`;
                                });
    
                                var recipeTable = `
                                    <div class="variant-recipe mt-5" style="border-top: 1px solid #ccc; padding: 10px;">
                                        <h4>Recipe for - ${variantName}</h4>
                                        <table class="table table-bordered" id="recipeTable_${variantId}">
                                            <thead>
                                                <tr>
                                                    <th>Item Information</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th>Unit</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addPurchaseItem_${variantId}">
                                                <tr>
                                                    <td>
                                                        <select name="product_id[]" class="postform resizeselect form-control">
                                                            ${options}
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="product_quantity[]" class="form-control"></td>
                                                    <td class="text-right"><input type="text" class="form-control text-right" placeholder="0.00" readonly></td>
                                                    <td class="text-right">
                                                        <input type="text" name="unitname[]" class="form-control text-right" readonly>
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
    

    // Add More Recipe Items for Each Variant
    // 
    

    $(document).on("click", ".add-item", function () {
        var variantId = $(this).data("variant");
        var myurl = baseurl + 'itemmanage/item_food/ingredientlistdropdowns';
        var getUomDetails = baseurl + 'production/production/getUomDetails';
        var csrf = $('#csrfhashresarvation').val();
        var rowId = "row_" + new Date().getTime(); // Generate a unique row ID
    
        $.ajax({
            type: "GET",
            url: myurl,
            data: { csrf_test_name: csrf },
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    var options = '<option value="">Select Ingredients</option>';
                    $.each(response.data, function (key, ingredient) {
                        options += `<option value="${ingredient.id}">${ingredient.ingredient_name}</option>`;
                    });
    
                    var newRow = `
                        <tr id="${rowId}">
                            <td>
                                <select name="product_id[]" id="product_id_${rowId}" class="postform resizeselect form-control ingredient-select" data-row-id="${rowId}">
                                    ${options}
                                </select>
                            </td>
                            <td><input type="text" name="product_quantity[]" id="product_quantity_${rowId}" class="form-control"></td>
                            <td class="text-right">
                                 
                                 <input type="hidden" id="get_uom_listby_ing" value="${getUomDetails}" />
                                <input type="text" name="unitid[]" id="unitid_${rowId}" class="form-control text-right" placeholder="0.00" readonly>
                            </td>
                            <td class="text-right">
                                <input type="text" name="unitname[]" id="unitname_${rowId}" class="form-control text-right" readonly>
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
    
    // Handle onchange event dynamically and pass row ID
    $(document).on("change", ".ingredient-select", function () {
        var ingredientId = $(this).val(); // Get selected ingredient ID
        var rowId = $(this).data("row-id"); // Get row ID
        checkproduct_list(ingredientId, rowId); // Pass ingredient ID and row ID to function
    });
    
    // Remove Recipe Item
    $(document).on("click", ".remove-item", function () {
        $(this).closest("tr").remove();
    });
    


});

function calprice(element){
    var id = element.id.replace('cartoon_', '');
    var ingrden = $('#product_id_'+id+' option:selected').data('title');
     if (ingrden == 0 || ingrden=='') {
      $(element).val('');
      alert('Please select Item!');

      return false;
    }
    else{
        var toatalval = $('#unit-total_'+id).val();
        var qty = $(element).val();
        var nitcost=parseFloat(toatalval)*parseFloat(qty);
        $('#price_'+id).val(parseFloat(nitcost).toFixed(3));

    }

}

function checkproduct_list(ingredientId, sl) {
    var foodid = $('#foodid').val();
     var geturl=$("#url").val();
     
    if (ingredientId == 0 || ingredientId=='') {
        alert('Please select Ingredient !');
        $('#product_id_'+sl).select2('destroy').val("").select2();
        return false;
    }
    var product_id          = $('#product_id_'+sl).val();
    var product_name = $('#product_id_'+sl+' option:selected').data('title');
    //alert(product_id);

    // Get Unit value based on selected Ingredient
    var getUomIngredientUrl = $("#get_uom_listby_ing").val();
    $.ajax({
        type: "GET",
        url: getUomIngredientUrl + '/' + product_id,
        cache: false,
        success: function (response) {
            var uomData = JSON.parse(response);

            if (uomData && uomData.length > 0) {
                // Assuming the API returns an array of unit objects
                $('#unitid_' + sl).val(product_id);  // Set UOM ID
                $('#unitname_' + sl).val(uomData[0].uom_short_code);  // Set UOM Name
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
             data: {product_name:product_name,csrf_test_name: csrf},
            cache: false,
            success: function(data)
            {
                var obj = JSON.parse(data);
                if(obj!=null){
                    if(obj[0].uprice>0){
                           $('#unit-total_'+sl).val(obj[0].uprice);
                    }else{
                        $('#product_id_'+sl).select2('destroy').val("").select2();
                        alert('Please purchase this Item.!!!');
                        $('#unit-total_'+sl).val('');
                        return false;
                        
                    }
                }else{
                    $('#product_id_'+sl).select2('destroy').val("").select2();
                    alert('Please purchase this Item.!!!');
                    $('#unit-total_'+sl).val('');
                    return false;
                }
              
            } 
        });
}

/**
 * ===================================================
 * ALL PRODUCTION JS VALIDATION CODE
 * =======================================================
 * 
 */

// Validate Item
let geturl = $('#foodCheckBomorNotBomUrl').val();
var product_id          = $('#product_id_'+sl).val();
var product_name = $('#product_id_'+sl+' option:selected').data('title');
var csrf = $('#csrfhashresarvation').val();
		$.ajax({
                type: "POST",
                url: geturl,
                 data: {product_name:product_name,csrf_test_name: csrf},
                cache: false,
                success: function(data)
                {
					var obj = JSON.parse(data);
					if(obj!=null){
						if(obj[0].uprice>0){
                   			$('#unit-total_'+sl).val(obj[0].uprice);
						}else{
							$('#product_id_'+sl).select2('destroy').val("").select2();
							alert('Please purchase this Item.!!!');
							$('#unit-total_'+sl).val('');
							return false;
							
						}
					}else{
						$('#product_id_'+sl).select2('destroy').val("").select2();
						alert('Please purchase this Item.!!!');
						$('#unit-total_'+sl).val('');
						return false;
					}
                  
                } 
        });

