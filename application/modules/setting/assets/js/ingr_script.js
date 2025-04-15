$(document).ready(function () {
    var getUrl = $('#getIngrItem').val(); // should return your endpoint URL
    var csrf = $('#csrfhashresarvation').val();
    var convertRatio =  $("#convt_ratio").val(); // get the conversion ratio from the input field
    var submitBtn = $('button[type="submit"]'); // Add/Submit button
    var open_balance_div = $('.open_balance_div'); // Open balance div
    var open_balance_date_div = $('.open_balance_date_div'); // Open balance date div
    submitBtn.prop('disabled', false); // enable submit
    open_balance_div.hide(); // Hide open balance div by default
    open_balance_date_div.hide(); // Hide open balance date div by default
    function initAutocomplete(element) {
        element.autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: getUrl,
                    type: "GET",
                    dataType: "json",
                    data: {
                        term: request.term,
                        csrf_test_name: csrf
                    },
                    success: function (data) {
                        console.log("Autocomplete Response:", data);
                        response(data);
                    },
                    error: function (xhr) {
                        console.error("Autocomplete Error:", xhr.responseText);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                console.log("Selected:", ui.item.label, ui.item.id);
                //For add Form
                $('#ingredient_name').val(ui.item.label); // fill input
                $('#ingredient_id').val(ui.item.id);     // set hidden id
                $('#purchase_price').val(ui.item.purchase_price); // set purchase price
                $('#purchase_price').attr('readonly', true); // make readonly
                //Calculate the cost per unit price based on the conversion ratio
                $('#unitid').val(ui.item.uom_id).trigger('change');

                //For Edit Form
                $('#ingredient_name_edit').val(ui.item.label); // fill input
                $('#ingredient_id_edit').val(ui.item.id);     // set hidden id
                $('#purchase_price_edit').val(ui.item.purchase_price); // set purchase price
                $('#purchase_price_edit').attr('readonly', true); // make readonly
                submitBtn.prop('disabled', false); // enable submit
                return false; // prevent default behaviour
            },
            change: function (event, ui) {
                if (!ui.item) {
                    // $('#ingredient_id').val('');
                    // $('#purchase_price').val('');
                    // $('#purchase_price').removeAttr('readonly');
                    // $('#unitid').val('').trigger('change');
                    var inputVal = $(this).val();
                    var checkUrl = $('#chkIngredient').val(); // URL to check existence
                    var thisElement = $(this);
                    open_balance_div.hide(); // Hide open balance div by default
                    open_balance_date_div.hide(); // Hide open balance date div by default
            
                    $.ajax({
                        url: checkUrl,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            term: inputVal,
                            csrf_test_name: csrf
                        },
                        success: function (data) {
                            // If ingredient exists in DB, show alert
                            if (data && data.length > 0) {
                                alert('Ingredient name already exists.');
                                submitBtn.prop('disabled', true); // disable submit
                            } else {
                                submitBtn.prop('disabled', false); // enable submit
                            }
            
                            // In both cases (exist or not), clear values
                            $('#ingredient_id').val('');
                            $('#purchase_price').val('');
                            $('#purchase_price').removeAttr('readonly');
                            $('#unitid').val('').trigger('change');
                            open_balance_div.show(); // Show open balance div by default
                            open_balance_date_div.show(); // Show open balance date div by default
                        },
                        error: function (xhr) {
                            console.error('Error while checking ingredient existence:', xhr.responseText);
                        }
                    });
                }
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>").append("<div>" + item.label + "</div>").appendTo(ul);
        };
    }

    initAutocomplete($('.ingredientDropDown')); // updated to match ID

    //Calculate the cost per unit price based on the conversion ratio
    function calculateCostPerUnit() {

        //Add Form fields
        var purchaseUnit = $('#purchase_unit').val();
        var consumptionUnit = $('#consumtion_unit').val();
        var convtRatio = parseFloat($('#convt_ratio').val());
        var purchasePrice = parseFloat($('#purchase_price').val());
        var packSize = parseFloat($("#pack_size").val());

        //Edit Form Fields
        var purchaseUnitEdit = $('#purchase_unit_edit').val();
        var consumptionUnitEdit = $('#consumtion_unit_edit').val();
        var convtRatioEdit = parseFloat($('#convt_ratio_edit').val());
        var purchasePriceEdit = parseFloat($('#purchase_price_edit').val());
        var packSizeEdit = parseFloat($("#edit_pack_size").val());

       
        //Check if the form is in add mode
        if (consumptionUnit) {
            console.log('Purchase Unit: ' + purchaseUnit + ', Consumption Unit: ' + consumptionUnit + ', Conversion Ratio: ' + convtRatio + ', Purchase Price: ' + purchasePrice);
            if (!purchasePrice || isNaN(purchasePrice) || purchasePrice === 0) {
                alert('Please put purchase price');
                $('#purchase_price').focus();
                $('#cost_perunit').val('');
                return;
            }

            if (!convtRatio || isNaN(convtRatio) || convtRatio === 0) {
                alert('Invalid conversion ratio');
                $('#cost_perunit').val('');
                return;
            }

            var totalPack = packSize * convtRatio;
            var costPerUnit = purchasePrice / totalPack;
            //alert('Cost per unit: ' + costPerUnit.toFixed(2));
            $('#cost_perunit').val(costPerUnit.toFixed(4));
        }
        //Check if the form is in the edit mode
        if (consumptionUnitEdit) {
            console.log('Purchase Unit: ' + purchaseUnitEdit + ', Consumption Unit: ' + consumptionUnitEdit + ', Conversion Ratio: ' + convtRatioEdit + ', Purchase Price: ' + purchasePriceEdit);
        
            if (!purchasePriceEdit || isNaN(purchasePriceEdit) || purchasePriceEdit === 0) {
                alert('Please put purchase price');
                $('#purchase_price').focus();
                $('#cost_perunit_edit').val('');
                return;
            }

            if (!convtRatioEdit || isNaN(convtRatioEdit) || convtRatioEdit === 0) {
                alert('Invalid conversion ratio');
                $('#cost_perunit_edit').val('');
                return;
            }

            //alert(purchasePriceEdit + ' ' + packSizeEdit + ' ' + convtRatioEdit);
            var totalPackSizeEdit = packSizeEdit * convtRatioEdit;
            var costPerUnitEdit = purchasePriceEdit / totalPackSizeEdit;
            //alert('Cost per unit: ' + costPerUnit.toFixed(2));
            $('#cost_perunit_edit').val(costPerUnitEdit.toFixed(4));
        }
    }

    $('.consumtion_unit').on('change', function () {
        calculateCostPerUnit();
    });
    $(".purchase_price").on('change', function(){
        calculateCostPerUnit();
    }).on('mouseout', function(){
        calculateCostPerUnit();
    });
    $('.pack_size').on('change', function () {
        calculateCostPerUnit();
    });
    $('.edit_pack_size').on('change', function () {
        calculateCostPerUnit();
    });
});


// Initialize select2
$(document).ready(function () {
    $('.select2').select2();

    // Reset fix
    $('form').on('reset', function () {
        setTimeout(function () {
            $('.select2').val(null).trigger('change');
        }, 0);
    });
    // Listen for the modal's 'hidden.bs.modal' event
    $('#edit').on('hidden.bs.modal', function () {
        // Refresh the window when the modal is fully hidden
        window.location.reload();
    });
});
