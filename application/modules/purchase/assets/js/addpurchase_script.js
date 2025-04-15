/*function product_list(sl) {
     var supplier_id = $('#suplierid').val();
	 var geturl=$("#url").val();
	 var csrf_token=$("#setcsrf").val();
	var csrfname=$("#csrfname").val();
	var csrf = $('#csrfhashresarvation').val();
	
    if (supplier_id == 0 || supplier_id=='') {
        alert('Please select Supplier !');
        return false;
    }

    // Auto complete
    var options = {
        minLength: 1,
        source: function( request, response ) {
        var product_name = $('#product_name_'+sl).val();
        $.ajax( {
          url: geturl,
          method: 'post',
          dataType: "json",
          data: {
            csrf_test_name:csrf,
			product_name:product_name
          },
          success: function( data ) {
            response( data );
			
          }
        });
      },
       focus: function( event, ui ) {
           $(this).val(ui.item.label);
           return false;
       },
       select: function( event, ui ) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value); 
            var sl = $(this).parent().parent().find(".sl").val(); 
            var product_id          = ui.item.value;
         	var  supplier_id=$('#supplier_id').val();
            var available_quantity    = 'available_quantity_'+sl;
            var product_rate    = 'product_rate_'+sl;
			var csrf = $('#csrfhashresarvation').val();
            $.ajax({
                type: "POST",
                url: baseurl+"purchase/purchase/purchasequantity",
                 data: {product_id:product_id,csrf_test_name:csrf},
                cache: false,
                success: function(data)
                {
                    console.log(data);
                    obj = JSON.parse(data);
                   $('#'+available_quantity).val(obj.total_purchase);
                  
                } 
            });

            $(this).unbind("change");
            return false;
       }
   }

   $('body').on('keydown.autocomplete', '.product_name', function() {
       $(this).autocomplete(options);
   });
}*/

function product_list(sl) {
     var supplier_id = $('#suplierid').val();
	 var product_id          = $('#product_id_'+sl).val();
	 var geturl=$("#url").val();
	 var csrf_token=$("#setcsrf").val();
	var csrfname=$("#csrfname").val();
	var csrf = $('#csrfhashresarvation').val();
	var available_quantity    = 'available_quantity_'+sl;
    if (supplier_id == 0 || supplier_id=='') {
        alert('Please select Supplier !');
        return false;
    }

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
                    $('#product_rate_' + sl).val(uomData[0].purchase_price);  // Set Rate
					$('#unitname_' + sl).val(uomData[0].uom_short_code);  // Set UOM Name
				} else {
					alert('No UOM available for the selected product.');
					$('#unitid_' + sl).val('');
                    $('#product_rate_' + sl).val('');  // Set Rate
					$('#unitname_' + sl).val('');
				}
			},
			error: function () {
				alert('Error fetching UOM details.');
			}
		});

     $.ajax({
                type: "POST",
                url: baseurl+"purchase/purchase/purchasequantity",
                 data: {product_id:product_id,csrf_test_name:csrf},
                cache: false,
                success: function(data)
                {
                    console.log(data);
                    obj = JSON.parse(data);
                   $('#'+available_quantity).val(obj.total_purchase);
                  
                } 
            });
}
var count = 2;
    var limits = 500;

    function addmore(divName){
		var credit = $('#cntra').html();
        //Get vat percentage
        var vat = $('#vatper').val();
        if (count == limits)  {
            alert("You have reached the limit of adding " + count + " inputs");
        }
        else{
            var newdiv = document.createElement('tr');
            var tabin="product_id_"+count;
             tabindex = count * 4 ,
           newdiv = document.createElement("tr");
            tab1 = tabindex + 1;
            
            tab2 = tabindex + 2;
            tab3 = tabindex + 3;
            tab4 = tabindex + 4;
            tab5 = tabindex + 5;
            tab6 = tab5 + 1;
            tab7 = tab6 +1;
           


  //newdiv.innerHTML ='<td class="span3 supplier"><select name="product_id[]" id="product_id_'+ count +'" class="postform resizeselect form-control" onchange="product_list('+ count +')">'+credit+'</select></td><td class="wt"> <input type="text" id="available_quantity_'+ count +'" class="form-control text-right stock_ctn_'+ count +'" placeholder="0.00" readonly/> </td><td class="text-right"><input type="number" step="0.0001" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calculate_store(' + count + ');" onchange="calculate_store(' + count + ');" placeholder="0.00" value="" min="0"/>  </td><td class="test"><input type="number" step="0.0001" name="product_rate[]" onkeyup="calculate_store('+ count +');" onchange="calculate_store('+ count +');" id="product_rate_'+ count +'" class="form-control product_rate_'+ count +' text-right" placeholder="0.00" value="" tabindex="'+tab3+'"/></td><td class="text-right"><input class="form-control total_price text-right total_price_'+ count +'" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button  class="btn btn-danger red text-right" type="button" value="Delete" onclick="purchasetdeleteRow(this)" tabindex="8">Delete</button></td>';
    newdiv.innerHTML = `
    <td class="span3 supplier">
        <select name="product_id[]" id="product_id_${count}" class="postform resizeselect form-control" onchange="product_list(${count})">${credit}</select>
    </td>
    <td class="wt">
        <input type="text" id="available_quantity_${count}" class="form-control text-right stock_ctn_${count}" placeholder="0.00" readonly/>
    </td>
    <td class="text-right">
        <input type="number" step="0.0001" name="product_quantity[]" tabindex="${tab2}" required id="cartoon_${count}" class="form-control text-right store_cal_${count}" onkeyup="calculate_store(${count});" onchange="calculate_store(${count});" placeholder="0.00" value="" min="0"/>
    </td>
    <td class="test">
        <input type="number" step="0.0001" name="product_rate[]" onkeyup="calculate_store(${count});" onchange="calculate_store(${count});" id="product_rate_${count}" class="form-control product_rate_${count} text-right" placeholder="0.00" value="" tabindex="${tab3}"/>
    </td>
    <td class="test">
        <input type="hidden" name="unitid[]" id="unitid_${count}" class="form-control text-right" placeholder="Unit ID" readonly/>
        <input type="text" name="unitname[]" id="unitname_${count}" class="form-control text-right" placeholder="Unit Name" readonly/>
    </td>
    <td class="test">
        <input type="number" step="0.0001" name="product_gst[]"  id="product_gst_${count}" class="form-control product_gst_${count} text-right" placeholder="0.00" value="${vat}" min="0"  tabindex="7">
    </td>
    <td class="text-right">
        <input class="form-control total_price text-right total_price_${count}" type="text" name="total_price[]" id="total_price_${count}" value="0.00" readonly="readonly" />
    </td>
    <td>
        <input type="hidden" id="total_discount_1" class="" />
        <input type="hidden" id="all_discount_1" class="total_discount" />
        <button class="btn btn-danger red text-right" type="button" value="Delete" onclick="purchasetdeleteRow(this)" tabindex="8">Delete</button>
    </td>`;

            document.getElementById(divName).appendChild(newdiv);
            document.getElementById(tabin).focus();
            document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
            document.getElementById("add_purchase").setAttribute("tabindex", tab6);
           
            count++;

            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: lang.sl_option,
                allowClear: true
            });
        }
    }
    //Calculate store product
    function calculate_store(sl) {
       
        var gr_tot = 0;
        var item_ctn_qty    = $("#cartoon_"+sl).val();
        var vendor_rate = $("#product_rate_"+sl).val();

        var total_price     = item_ctn_qty * vendor_rate;
         //New code added on 10April 2025
         var gst = parseFloat($("#product_gst_" + sl).val()) || 0;
         console.log('GST'+gst);
         var gst_amount = (total_price * gst) / 100;
         var total_price_inc_gst = parseFloat(total_price) + parseFloat(gst_amount);
         $("#total_price_" + sl).val(total_price_inc_gst.toFixed(2));

        //$("#total_price_"+sl).val(total_price.toFixed(2));

       
        //Total Price
        $(".total_price").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $("#grandTotal").val(gr_tot.toFixed(2,2));

    }
    function purchasetdeleteRow(e) {
        var t = $("#purchaseTable > tbody > tr").length;
        if (1 == t) alert(lang.cantdel);
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
        calculate_store()
    }
	
function bank_paymet(id){
			var csrf = $('#csrfhashresarvation').val();
		    var dataString = 'bankid='+id+'&status=1&csrf_test_name='+csrf;
		if(id==2){
			$("#showbank").show();
			$('#bankid').attr('required', true);   
        	$.ajax({
			 url: baseurl+"purchase/purchase/banklist",
			 dataType:'json',
			  type: "POST",
			  data: dataString,
			  async:true,
			  success: function(data) {
					var options = data.map(function(val, ind){
    					return $("<option></option>").val(val.bankid).html(val.bank_name);
					});
					$('#bankid').append(options);
				  }

		   });
		}
		else{
			$("#showbank").hide();
			$('#bankid').attr('required', false);  
			}
	}
    
    // Check product prices before submitting form
    $(document).ready(function () {
        $("#insert_purchase").on("submit", function (event) {
            event.preventDefault(); // Prevent default submission
    
            let productIds = $("select[name='product_id[]']").map(function () {
                return $(this).val();
            }).get();
    
            let productRates = $("input[name='product_rate[]']").map(function () {
                return $(this).val();
            }).get();
    
            let priceCheckPromises = [];
    
            // Check all product prices asynchronously
            for (let i = 0; i < productIds.length; i++) {
                if (productIds[i] && productRates[i]) {
                    priceCheckPromises.push(checkproductprices(productIds[i], productRates[i]));
                }
            }
    
            Promise.all(priceCheckPromises).then((responses) => {
                let hasPriceChange = responses.includes(true);
    
                if (hasPriceChange) {
                    Swal.fire({
                        title: "Alert!",
                        text: "Product price has changed. Do you still want to continue?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, Submit",
                        cancelButtonText: "No, Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            submitForm(); // Call function to submit form
                        }
                    });
                } else {
                    submitForm(); // Submit directly if no price change
                }
            });
        });
    
        function submitForm() {
            $.ajax({
                type: $("#insert_purchase").attr("method"), // Use form method (POST)
                url: $("#insert_purchase").attr("action"), // Use form action
                data: $("#insert_purchase").serialize(), // Serialize form data
                success: function (response) {
                    // Redirect only if submission is successful
                    window.location.href = baseurl + "purchase/purchase/create";
                },
                error: function () {
                    Swal.fire("Error", "Something went wrong. Please try again.", "error");
                }
            });
        }
    
        function checkproductprices(product_id, vendor_rate) {
            return new Promise((resolve) => {
                var csrf = $('#csrfhashresarvation').val();
    
                if (product_id && vendor_rate) {
                    $.ajax({
                        type: "GET",
                        url: baseurl + "purchase/showPriceDiff/" + product_id + "/" + vendor_rate,
                        data: { csrf_test_name: csrf },
                        dataType: "json",
                        cache: false
                    }).done(function (response) {
                        resolve(response.message === 'success'); // Returns true if price changed
                    }).fail(function () {
                        resolve(false); // Default to no price change if AJAX fails
                    });
                } else {
                    resolve(false);
                }
            });
        }
    });
    