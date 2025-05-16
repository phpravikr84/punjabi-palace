"use strict";
var loadFile = function (event) {
  var output = document.getElementById("output");
  output.src = URL.createObjectURL(event.target.files[0]);
  $("#bigurl").val(output.src);
};

function mainFoddList(sl) {
  // $('#mainModID_'+sl).select2();
}

function addmore(divName) {
  var credit = $("#cntra").html();
  if (count == limits) {
    alert("You have reached the limit of adding " + count + " inputs");
  } else {
    var newdiv = document.createElement("tr");
    var tabin = "mainModID_" + count;
    var tabindex = count * 4;
    var newdiv = document.createElement("tr");
    var tab1 = tabindex + 1;
    var tab2 = tabindex + 2;
    var tab3 = tabindex + 3;
    var tab4 = tabindex + 4;
    var indv = $("#categeorywise").prop("checked");
    var readonly = ``;
    if (indv) {
      var readonly = ``;
    } else {
      var readonly = `readonly style="cursor: not-allowed;"`;
    }
    //newdiv.innerHTML ='<td class="span3 supplier"><select name="product_id[]" id="product_id_'+ count +'" class="postform resizeselect form-control" onchange="product_list('+ count +')">'+credit+'</select></td><td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calprice(this)"  placeholder="0.00" value="" min="0"/>  </td><td class="text-right"><input type="text" tabindex="'+tab2+'" id="price_'+ count +'" class="form-control text-right store_cal_' + count + '"  placeholder="0.00" value="" min="0" readonly/>  </td><td> <input type="hidden" id="total_discount_1" class="" /> <input type="hidden" id="unit-total_'+count+'" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button class="btn btn-danger red text-right" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button></td>';

    newdiv.innerHTML = `
			<td class="span3 supplier">
        <select name="mainModID[]" id="mainModID_${count}" class="form-control dont-select-me" required="">
					${credit}
				</select>
			</td>

      <td class="text-right">
          <input type="text" name="max_quantity[]" id="max_quantity_${count}" class="form-control text-right max_quantity_${count} rdb" placeholder="0" value="" min="0" tabindex="${tab2}" ${readonly} />
      </td>
      <td class="text-right">
          <input type="text" name="weight_percent[]" id="weight_percent_${count}" class="form-control text-right weight_percent_${count} rdb" placeholder="0%" value="" min="0" tabindex="${tab2}" ${readonly} />
      </td>
      
			<td>
			<button class="btn btn-danger red text-right" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button>
			</td>
			`;
    document.getElementById(divName).appendChild(newdiv);
    if ($("#noOfItemWise").prop('checked')) {
      let addhocWeight = document.getElementById("addhoc_weight_percent").value;
      let addhocQuantity = document.getElementById("addhoc_max_item").value;
      $('input[name="weight_percent[]"]').each(function() {
          $(this).val(addhocWeight);
      });
      $('input[name="max_quantity[]"]').each(function() {
          $(this).val(addhocQuantity);
      });
    }
    document.getElementById(tabin).focus();
    // document.getElementById("add_invoice_item").setAttribute("tabindex", tab3);
    // document.getElementById("add_purchase").setAttribute("tabindex", tab4);
    // $('#mainModID_'+count).select2();
    count++;

    $("select.form-control:not(.dont-select-me)").select2({
      placeholder: lang.sl_option,
      allowClear: true,
    });
  }
}
