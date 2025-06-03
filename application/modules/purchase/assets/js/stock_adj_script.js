

/**
 * This script handles stock adjustment operations in a web application.
 */

    $(document).on('change', '#ingredientSelect', function () {
        var ingredientId = $(this).val(); // Selected ingredient ID
        var csrf = $('#csrfhashresarvation').val(); // CSRF token
        var getUrl = $('#getIngrItem').val(); // Endpoint to fetch ingredient details


        if (ingredientId) {
            $.ajax({
                url: getUrl,
                type: 'GET',
                dataType: 'json',
                data: {
                    id: ingredientId,
                    csrf_test_name: csrf
                },
                success: function (data) {
                    if (data && data.length > 0) {
                        var item = data[0];
                        $('#stock_qty').val(item.purchase_qty + ' '+ item.purchase_unit_name + ' (' + item.stock_qty + ' ' + item.consumption_unit_name + ')'); // You must have an input with id="stock_qty"
                        $('#adjustmentUnit').text(item.purchase_unit_name); // Set the adjustment unit
                    } else {
                        console.error('No data found for the selected ingredient.');
                        clearIngredientFields();
                    }
                },
                error: function (xhr) {
                    console.error('Error fetching ingredient details:', xhr.responseText);
                    clearIngredientFields();
                }
            });
        } else {
            clearIngredientFields();
        }
    });

    function clearIngredientFields() {
        $('#stock_qty').val('');
    }

