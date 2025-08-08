// JavaScript Document
var editpos = 0;
let selectedDealSubMods = [];
let newModifierDefaultContent = `
<div class="leftSidebarPosMain bg-alice-blue pb-5">
    <div class="slimScrollDiv">
        <div class="text-center p-3 my-5">
        <p class="text-muted">Modifiers will be displayed here when selected.</p>
        </div>
    </div>
</div>
`;
$(document).ready(function () {
    "use strict";

    if (basicinfo.segment4 != null) {
        // swal({
        //     title: lang.ord_uodate_success,
        //     text: lang.do_print_token,
        //     type: "success",
        //     showCancelButton: true,
        //     confirmButtonColor: "#28a745",
        //     confirmButtonText: lang.yes,
        //     cancelButtonText: lang.no,
        //     closeOnConfirm: false,
        //     closeOnCancel: true
        // },
        //     function (isConfirm) {
        //         if (isConfirm) {
        //             window.location.href = basicinfo.baseurl + "ordermanage/order/postokengenerate/" + basicinfo.segment4 + "/1";
        //         } else {
        //             window.location.href = basicinfo.baseurl + "ordermanage/order/pos_invoice";
        //         }
        //     });
        swal({
            title: lang.ord_uodate_success,
            text: '',
            type: "success",
            confirmButtonColor: "#28a745",
            confirmButtonText: "OK",
            closeOnConfirm: false
        }, function () {
            window.location.href = basicinfo.baseurl + "ordermanage/order/postokengenerate/" + basicinfo.segment4 + "/1";
        });
    }
});

function leftArrowPressed(id) {

    if (id == 'ongoingorder') {
        $('#fhome').trigger('click');
    }
    if (id == 'kitchenorder') {
        $('#ongoingorder').trigger('click');
    }
    if (id == 'todayonlieorder') {
        $('#kitchenorder').trigger('click');
    }
    if (id == 'todayorder') {
        $('#todayonlieorder').trigger('click');
    }
    if (id == 'cancelorder') {
        $('#todayorder').trigger('click');
    }

}

function rightArrowPressed(id) {
    if (id == 'fhome') {
        $('#ongoingorder').trigger('click');
    }
    if (id == 'ongoingorder') {
        $('#kitchenorder').trigger('click');
    }
    if (id == 'kitchenorder') {
        $('#todayonlieorder').trigger('click');
    }
    if (id == 'todayonlieorder') {
        $('#todayorder').trigger('click');
    }
    if (id == 'todayorder') {

    }

}

function topArrowPressed(id) {
    //alert("topArrowPressed" + id);

}

function downArrowPressed(id) {
    //alert("downArrowPressed" + id);

}

document.onkeydown = function (evt) {
    var id = $("li.active a").attr("id");


    evt = evt || window.event;
    switch (evt.keyCode) {
        case 37:
            leftArrowPressed(id);
            break;

        case 38:
            topArrowPressed(id);
            break;

        case 39:
            rightArrowPressed(id);
            break;

        case 40:
            downArrowPressed(id);
            break;

    }
};
$(window).on('load', function () {
    // Run code
    "use strict";

    $(".sidebar-mini").addClass('sidebar-collapse');
    var myurl = basicinfo.baseurl + "ordermanage/order/cashregister";
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        async: false,
        url: myurl,
        success: function (data) {
            if (data == 1) { return false; }
            $('#openclosecash').html(data);
            $('#openregister').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
    var filename = basicinfo.baseurl + basicinfo.nofitysound;
    var audio = new Audio(filename);
});
$(document).ready(function () {
    "use strict";
    // select 2 dropdown 
    $("select.form-control:not(.dont-select-me)").select2({
        placeholder: lang.sl_option,
        allowClear: true
    });




    //form validate
    $("#validate").validate();
    $("#add_category").validate();
    $("#customer_name").validate();

    $('.product-list').slimScroll({
        size: '3px',
        height: '345px',
        allowPageScroll: true,
        railVisible: true
    });

    $('.product-grid').slimScroll({
        size: '3px',
        height: 'calc(100vh - 180px)',
        allowPageScroll: true,
        railVisible: true
    });
    $('.cat-grid').slimScroll({
        size: '3px',
        height: 'calc(100vh - 180px)',
        allowPageScroll: true,
        railVisible: true
    });

    var audio = new Audio(basicinfo.baseurl + 'assets/beep-08b.mp3');
});

"use strict";

function getslcategory(carid) {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = carid;
    var myurl = $('#posurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { product_name: product_name, category_id: category_id, isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('Product not found !');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
function getslsubcategory(carid) {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = carid;
    var myurl = $('#possuburl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { product_name: product_name, category_id: category_id, isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('Product not found !');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
function getBanqcategory() {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = 0;
    var myurl = $('#posBanqurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('Product not found !');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
function getPromotionalDeals() {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = 0;
    var myurl = $('#posPromoDealurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('Product not found !');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
function getPromotionalDeals_update() {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = 0;
    var myurl = $('#posPromoDealurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search_update").html('Product not found !');
            } else {
                $("#product_search_update").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
function getBanqcategory_update() {
    var product_name = $('#product_name').val();
    var csrf = $('#csrfhashresarvation').val();
    var category_id = 0;
    var myurl = $('#posBanqurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { isuptade: 0, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search_update").html('Product not found !');
            } else {
                $("#product_search_update").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
}
 function getslsubcategory_update(carid) {
        var product_name = $("#update_product_name").val();
        var category_id = carid;
        var myurl = $("#possuburl_update").val();
        var csrf = $("#csrfhashresarvation").val();
        $.ajax({
            type: "post",
            async: false,
            url: myurl,
            data: {
            product_name: product_name,
            category_id: category_id,
            isuptade: 1,
            csrf_test_name: csrf,
            },
            success: function (data) {
            if (data == "420") {
                $("#product_search_update").html("Product not found !");
            } else {
                $("#product_search_update").html(data);
            }
            },
            error: function () {
            alert(lang.req_failed);
            },
        });
    }
//Product search button js
$('body').on('click', '#search_button', function () {
    var product_name = $('#product_name').val();
    var category_id = $('#category_id').val();
    var csrf = $('#csrfhashresarvation').val();
    var myurl = $('#posurl').val();
    $.ajax({
        type: "post",
        async: false,
        url: myurl,
        data: { product_name: product_name, category_id: category_id, csrf_test_name: csrf },
        success: function (data) {
            if (data == '420') {
                $("#product_search").html('Product not found !');
            } else {
                $("#product_search").html(data);
            }
        },
        error: function () {
            alert(lang.req_failed);
        }
    });
});

//Product search button js
$('body').on('click', '.select_product', function (e) {

    e.preventDefault();
    var panel = $(this);
    var pid = panel.find('.panel-body input[name=select_product_id]').val();
    var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
    var totalvarient = panel.find('.panel-body input[name=select_totalvarient]').val();
    var customqty = panel.find('.panel-body input[name=select_iscustomeqty]').val();
    var isgroup = panel.find('.panel-body input[name=select_product_isgroup]').val();
    var catid = panel.find('.panel-body input[name=select_product_cat]').val();
    var itemname = panel.find('.panel-body input[name=select_product_name]').val();
    var varientname = panel.find('.panel-body input[name=select_varient_name]').val();
    var qty = 1;
    var price = panel.find('.panel-body input[name=select_product_price]').val();
    var hasaddons = panel.find('.panel-body input[name=select_addons]').val();
    var csrf = $('#csrfhashresarvation').val();

    // Pace.restart();
    console.log("hasaddons: " + hasaddons);
    console.log("totalvarient: " + totalvarient);
    console.log("customqty: " + customqty);
    if (hasaddons >= 0 && totalvarient == 1 && customqty == 0) {
        /*check production*/
        var productionsetting = $('#production_setting').val();
        if (productionsetting == 1) {

            var isselected = $('#productionsetting-' + pid + '-' + sizeid).length;

            if (isselected == 1) {

                var checkqty = parseInt($('#productionsetting-' + pid + '-' + sizeid).text()) + qty;


            } else {
                var checkqty = qty;
            }

            //   var checkvalue = checkproduction(pid, sizeid, checkqty);
            //   var checkvalue = checkproductionOrder(pid, sizeid, checkqty);
            var checkvalue = true;

            if (checkvalue == false) {
                return false;
            }

        }
        /*end checking*/
        var mysound = basicinfo.baseurl + "assets/";
        var audio = ["beep-08b.mp3"];
        new Audio(mysound + audio[0]).play();
        var dataString = "pid=" + pid + '&itemname=' + itemname + '&varientname=' + varientname + '&qty=' + qty + '&price=' + price + '&catid=' + catid + '&sizeid=' + sizeid + '&isgroup=' + isgroup + '&csrf_test_name=' + csrf;
        var myurl = $('#carturl').val();
        $.ajax({
            type: "POST",
            url: myurl,
            data: dataString,
            success: function (data) {
                console.log("addfoodlist data: " + data);
                $('#addfoodlist').html(data);
                $('#sideMfContainer').html($("#modifierContent").html());
                //   openNav();
                //   $("#modifierContent").show();
                var total = $('#grtotal').val();
                var totalitem = $('#totalitem').val();
                $('#item-number').text(totalitem);
                $('#getitemp').val(totalitem);
                var tax = $('#tvat').val();
                $('#vat').val(tax);
                var discount = $('#tdiscount').val();
                var tgtotal = $('#tgtotal').val();
                $('#calvat').text(tax);
                $('#invoice_discount').val(discount);
                var sc = $('#sc').val();
                $('#service_charge').val(sc);
                if (basicinfo.isvatinclusive == 1) {
                    $('#caltotal').text(tgtotal - tax);
                } else {
                    $('#caltotal').text(tgtotal);
                }
                $('#grandtotal').val(tgtotal);
                $('#orggrandTotal').val(tgtotal);
                $('#orginattotal').val(tgtotal);
                if (isNaN($('#caltotal').text())) {
                    $('#caltotal').text(parseFloat(0));
                }
            }
        });
    } else {
        var geturl = $("#addonexsurl").val();
        var ctype = $("#ctype").val();
        var myurl = geturl + '/' + pid;
        var dataString = "pid=" + pid + "&sid=" + sizeid + '&ctype=' + ctype + '&csrf_test_name=' + csrf;
        $.ajax({
            type: "POST",
            url: geturl,
            data: dataString,
            success: function (data) {
                $("#modifierContent_1").remove();
                $("#posSelectPurchaseTable").remove();
                $('.addonsinfo').html(data);

                $('#sideVarContainer').html($("#posSelectPurchaseTable").html());
                $('#sideMfContainer').html($("#modifierContent_1").html());
                $("#posSelectPurchaseTable").remove();
                $("#modifierContent_1").remove();
                var modVarItemNameCont = $("#modVarItemNameCont").val();
                // $("#modVarItemName").html(`<p class="text-left" style="padding:0px 25px;">Item Name: <strong>${modVarItemNameCont}</strong></p>`);
                // $("#modVarItemName").show();
                var currModCount = $("#currModCount").val();
                if (currModCount == 0) {
                    var noModHtml = `
                    <div class="row">
                        <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;" id="modifierChoosebtnDiv">
                            <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(${pid});">Apply</button>
                        </div>
                    </div>
                    `;
                    $('#sideVarContainer').append(noModHtml);
                    $('#sideMfContainer').html(`<p class="text-left" style="padding:0px 0px;">No Modifiers Found For this Item !</strong></p>`);
                    // $('#modSubHeading').html(`No Modifiers Found For this Item`);
                }
                if (!isPromoFreeItem) {
                    openNav();
                } else {
                    isPromoFreeItem = false;
                }
                //   $('#edit').modal('show');

                //$('#edit').find('.close').focus();
                var totalitem = $('.totalitem').val();
                var tax = $('#tvat').val();
                var discount = $('#tdiscount').val();
                var tgtotal = $('#tgtotal').val();
                $('#vat').val(tax);
                $('#calvat').text(tax);
                $('#getitemp').val(totalitem);
                $('#invoice_discount').val(discount);
                if (basicinfo.isvatinclusive == 1) {
                    $('#caltotal').text(tgtotal - tax);
                } else {
                    $('#caltotal').text(tgtotal);
                }
                $('#grandtotal').val(tgtotal);
                $('#orggrandTotal').val(tgtotal);
                $('#orginattotal').val(tgtotal);
                if (isNaN($('#caltotal').text())) {
                    $('#caltotal').text(parseFloat(0));
                }
            }
        });
    }
});
function selectGroupItem(th) {
    // e.preventDefault();
    var panel = th;
    var pid = panel.find('.panel-body input[name=select_product_id]').val();
    var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
    var totalvarient = panel.find('.panel-body input[name=select_totalvarient]').val();
    var customqty = panel.find('.panel-body input[name=select_iscustomeqty]').val();
    var isgroup = panel.find('.panel-body input[name=select_product_isgroup]').val();
    var catid = panel.find('.panel-body input[name=select_product_cat]').val();
    var itemname = panel.find('.panel-body input[name=select_product_name]').val();
    var varientname = panel.find('.panel-body input[name=select_varient_name]').val();
    var qty = 1;
    var price = panel.find('.panel-body input[name=select_product_price]').val();
    var hasaddons = panel.find('.panel-body input[name=select_addons]').val();
    var csrf = $('#csrfhashresarvation').val();

    // Pace.restart();

    var dataString = "pid=" + pid + "&sid=" + sizeid + '&itemname=' + itemname + '&isgroup=' + isgroup + '&csrf_test_name=' + csrf;
    var myurl = $('#GetPromoFoodsForCart').val();
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function (data) {
            $("#modifierContent_1").remove();
            $("#posSelectPurchaseTable").remove();
            $("#promomainfoodlist").remove();
            $('.addonsinfo').html(data);


            // $('#sideMfContainer').html($("#modifierContent_1").html());
            $('#newModSection').html($("#modifierContent_1").html());
            $('#sideVarContainer').html($("#posSelectPurchaseTable").html());
            // $('#sideVarContainer').append($("#promomainfoodlist").html());
            $("#promomainfoodlist").remove();
            $("#posSelectPurchaseTable").remove();
            $("#modifierContent_1").remove();
            // $("#sideVarContainer").parent('.col-md-6').find('.card-header').html('Choose Main Foods');
            // $("#sideVarContainer").parent('.col-md-6').find('.modifier-sec-sub-heading').html('Choose the main food items of the Deal Menu');
            var modVarItemNameCont = $("#modVarItemNameCont").val();
            // $("#modVarItemName").html(`<p class="text-left" style="padding:0px 25px;">Item Name: <strong>${modVarItemNameCont}</strong></p>`);
            // $("#modVarItemName").show();
            var currModCount = $("#currModCount").val();
            if (currModCount == 0) {
                var noModHtml = `
                <div class="row">
                    <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;" id="modifierChoosebtnDiv">
                        <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(${pid});">Apply</button>
                    </div>
                </div>
                `;
                // $('#sideVarContainer').append(noModHtml);
                $('#sideMfContainer').html(`<p class="text-left" style="padding:0px 0px;">No Modifiers Found For this Item !</strong></p>`);
                $('#newModSection').html(`<p class="text-left" style="padding:0px 0px;">No Modifiers Found For this Item !</strong></p>`);
                // $('#modSubHeading').html(`No Modifiers Found For this Item`);
            }
            // openNav();
            //   $('#edit').modal('show');

            //$('#edit').find('.close').focus();
            var totalitem = $('.totalitem').val();
            var tax = $('#tvat').val();
            var discount = $('#tdiscount').val();
            var tgtotal = $('#tgtotal').val();
            $('#vat').val(tax);
            $('#calvat').text(tax);
            $('#getitemp').val(totalitem);
            $('#invoice_discount').val(discount);
            if (basicinfo.isvatinclusive == 1) {
                $('#caltotal').text(tgtotal - tax);
            } else {
                $('#caltotal').text(tgtotal);
            }
            $('#grandtotal').val(tgtotal);
            $('#orggrandTotal').val(tgtotal);
            $('#orginattotal').val(tgtotal);
            if (isNaN($('#caltotal').text())) {
                $('#caltotal').text(parseFloat(0));
            }
        }
    });
}
//   function checkproduction(foodid, vid, servingqty) {
//     var myurl = $("#production_url").val();
//     var csrf = $("#csrfhashresarvation").val();
//     var dataString =
//       "foodid=" +
//       foodid +
//       "&vid=" +
//       vid +
//       "&qty=" +
//       servingqty +
//       "&csrf_test_name=" +
//       csrf;

//     var check = true;
//     $.ajax({
//       type: "POST",
//       url: myurl,
//       async: false,
//       global: false,
//       data: dataString,
//       success: function (data) {
//         if (data != 1) {
//           alert(data);
//           check = false;
//         }
//       },
//     });
//     return check;
//   }
function itemModifiers(pid, tr_row_id) {
    // var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
    // pid = 0;
    if (pid == "" || pid == 0) {
        // alert("No Item Found !");
        //create sweatalert alert
        swal({
            title: "No Item Found !",
            text: "Please select an item first.",
            type: "warning",
            confirmButtonText: "OK",
            closeOnConfirm: true
        });
        return false;
    }
    var csrf = $('#csrfhashresarvation').val(),
        geturl = $("#modifierurl").val(),
        myurl = geturl,
        dataString = "pid=" + pid + '&tr_row_id=' + tr_row_id + '&csrf_test_name=' + csrf;
    $("#posAddmodSizeInfo").remove();
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function (data) {
            console.log("Modifier data: " + data);
            $("#posSelectPurchaseTable").remove();
            // $('#addfoodlist').html(data);
            $("#mySidebar").find('#sideMfContainer').html('');
            $("#newModSection").html(data);
            $("#newModSection").find('#posSelectPurchaseTable').hide();
            // $('#sideVarContainer').html($("#posAddmodSizeInfo").html());
            $('#sideVarContainer').html($("#posSelectPurchaseTable").html());
            $("#posSelectPurchaseTable").remove();
            $("#posAddmodSizeInfo").remove();
            // $("#modifierChoosebtnDiv").html(`
            //     <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(${pid});">Apply</button>
            //     `);
            // openNav();
            //   $("#modifierContent").show();
        }
    });
}
function itemModifiersUpdate(pid, orderid) {
    // var sizeid = panel.find('.panel-body input[name=select_product_size]').val();
    // pid = 0;
    if (pid == "" || pid == 0) {
        // alert("No Item Found !");
        //create sweatalert alert
        swal({
            title: "No Item Found !",
            text: "Please select an item first.",
            type: "warning",
            confirmButtonText: "OK",
            closeOnConfirm: true
        });
        return false;
    }
    var csrf = $('#csrfhashresarvation').val(),
        geturl = $("#modifierurlupdate").val(),
        myurl = geturl,
        dataString = "pid=" + pid + '&orderid=' + orderid + '&csrf_test_name=' + csrf;
    $("#posAddmodSizeInfo").remove();
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function (data) {
            console.log("Modifier data: " + data);
            $("#posSelectPurchaseTable").remove();
            // $('#addfoodlist').html(data);
            $("#mySidebar").find('#sideMfContainer').html(data);
            // $('#sideVarContainer').html($("#posAddmodSizeInfo").html());
            $('#sideVarContainer').html($("#posSelectPurchaseTable").html());
            $("#posSelectPurchaseTable").remove();
            $("#posAddmodSizeInfo").remove();
            // $("#modifierChoosebtnDiv").html(`
            //     <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(${pid});">Apply</button>
            //     `);
            openNav();
            //   $("#modifierContent").show();
        }
    });
}
// function checkModGroupMaxItemNumber(pid,mods) {

//     //fetch the maximum item number for the pid from menu_add_on table
//     //make an ajax call to the controller to get the max item number
//     var csrf = $('#csrfhashresarvation').val(),
//         geturl = $("#checkModGroupMaxItemNumberUrl").val(),
//         myurl = geturl,
//         dataString = "pid=" + pid + '&csrf_test_name=' + csrf;
//     var maxItemNumber = 0;
//     $.ajax({
//         type: "POST",
//         url: myurl,
//         data: dataString,
//         async: false,
//         success: function(data) {
//             // maxItemNumber = JSON.parse(data);
//             console.log("Max Item Number Data: " + data);
//             console.log("Selected Mods: " + mods);
//             console.log(data[0].row_id);
//             const response = data;
//             // return false;
//             const res = response[0]; // since your response only has one object

//             let minSelect = null, maxSelect = null;

//             response.forEach((rule) => {
//                 mods.forEach((item) => {
//                     if (item.pid == rule.menu_id && item.mgid == rule.modifier_groupid) {
//                         // Attach min/max to the item
//                         minSelect = rule.min;
//                         maxSelect = rule.max;
//                         let count = $(`input[type="checkbox"][data-group-id="${item.mgid}"]:checked`).length;
//                         console.log(`Checked count for group ${item.mgid}:`, count);
//                         if (count < minSelect || count > maxSelect) {
//                             $(`input[type="checkbox"][data-group-id="${item.mgid}"]`).prop("checked", false);
//                             // alert("You can select between " + minSelect + " and " + maxSelect + " items for this modifier group.");
//                             swal({
//                                 title: "Invalid Selection",
//                                 text: `You can select between ${minSelect} and ${maxSelect} items for this modifier group.`,
//                                 type: "warning",
//                                 confirmButtonText: "OK",
//                                 closeOnConfirm: true
//                             });
//                             return false;
//                         }
//                     }
//                 });
//             });
//             return true;
//         },
//         error: function() {
//             // alert("Error fetching maximum item number!");
//             swal({
//                 title: "Error fetching maximum item number!",
//                 text: "Please try again later.",
//                 type: "error",
//                 confirmButtonText: "OK",
//                 closeOnConfirm: true
//             });
//             return false;
//         }
//     });
// }

function checkModGroupMaxItemNumber(pid, mods, callback) {
    var csrf = $('#csrfhashresarvation').val(),
        loader = $('#posSidebarLoader'),
        modifierChoosebtn = $('.modifierChoosebtn'),
        geturl = $("#checkModGroupMaxItemNumberUrl").val(),
        dataString = "pid=" + pid + '&csrf_test_name=' + csrf;
    loader.css({ display: 'flex' });
    modifierChoosebtn.prop("disabled", true);
    modifierChoosebtn.css({ cursor: 'not-allowed', opacity: 0.5 });
    $.ajax({
        type: "POST",
        url: geturl,
        data: dataString,
        success: function (data) {
            loader.hide();
            modifierChoosebtn.prop("disabled", false);
            modifierChoosebtn.css({ cursor: 'pointer', opacity: 1 });
            const response = data; // make sure it's parsed
            let valid = true;

            response.forEach((rule) => {
                mods.forEach((item) => {
                    if (item.pid == rule.menu_id && item.mgid == rule.modifier_groupid) {
                        const minSelect = parseInt(rule.min);
                        const maxSelect = parseInt(rule.max);
                        let count = $(`input[type="checkbox"][data-group-id="${item.mgid}"]:checked`).length;
                        if (minSelect === 0 && maxSelect === 0) {
                            count = 0; // Reset count to 0 if both are 0
                        }
                        if (count < minSelect || count > maxSelect) {
                            valid = false;
                            $(`input[type="checkbox"][data-group-id="${item.mgid}"]`).prop("checked", false);
                            swal({
                                title: "Invalid Selection",
                                text: `You can select between ${minSelect} and ${maxSelect} items for this modifier group.`,
                                type: "warning",
                                confirmButtonText: "OK"
                            });
                        }
                    }
                });
            });

            callback(valid);
        },
        error: function () {
            swal({
                title: "Error",
                text: "Could not validate modifier group selection. Try again later.",
                type: "error",
                confirmButtonText: "OK"
            });
            callback(false);
        }
    });
}
function checkMealDealModGroupMaxItemNumber(pid, mods, callback) {
    var csrf = $('#csrfhashresarvation').val(),
        loader = $('#posSidebarLoader'),
        modifierChoosebtn = $('.modifierChoosebtn'),
        geturl = $("#checkModGroupMaxItemNumberUrl").val(),
        dataString = "pid=" + pid + '&csrf_test_name=' + csrf;

    loader.css({display:'flex'});
    modifierChoosebtn.prop("disabled", true);
    modifierChoosebtn.css({cursor: 'not-allowed', opacity: 0.5});
    $.ajax({
        type: "POST",
        url: geturl,
        data: dataString,
        success: function (data) {
            loader.hide();
            modifierChoosebtn.prop("disabled", false);
            modifierChoosebtn.css({cursor: 'pointer', opacity: 1});
            const response = data; // make sure it's parsed
            let valid = true;

            response.forEach((rule) => {
                mods.forEach((item) => {
                    if (item.deal_mod_pid == rule.menu_id && item.mgid == rule.modifier_groupid) {
                        const minSelect = parseInt(rule.min);
                        const maxSelect = parseInt(rule.max);
                        let count = $(`input[type="checkbox"][name="promo_sub_modifiers[]"][data-group-id="${item.mgid}"]:checked`).length;
                        //we have to avoid checking if minSelect and maxSelect are 0
                        if (minSelect === 0 && maxSelect === 0) {
                            count = 0; // Reset count to 0 if both are 0
                        }
                        if (count < minSelect || count > maxSelect) {
                            valid = false;
                            $(`input[type="checkbox"][name="promo_sub_modifiers[]"][data-group-id="${item.mgid}"]`).prop("checked", false);
                            swal({
                                title: "Invalid Selection",
                                text: `You can select between ${minSelect} and ${maxSelect} items for this modifier group.`,
                                type: "warning",
                                confirmButtonText: "OK"
                            });
                        }
                    }
                });
            });

            callback(valid);
        },
        error: function () {
            swal({
                title: "Error",
                text: "Could not validate modifier group selection. Try again later.",
                type: "error",
                confirmButtonText: "OK"
            });
            callback(false);
        }
    });
}


function ApplyModifierSelect(pid = 0, tr_row_id = null, skipAddToCart = 0, promoqty = 0) {
    if (pid == 0) {
        console.log("No Item Found !");
        return false;
    }
    let selectedValues = [];
    let loader = $('#posSidebarLoader');

    $("input[name='modifier_items[]']:checked").each(function () {
        let value = $(this).val();
        let groupId = $(this).attr("data-group-id");
        //check for same groupId, pid and value within selectedValues
        let existingItem = selectedValues.find(item => item.mid === value && item.mgid === groupId && item.pid === pid);
        if (existingItem) {
            // selectedValues.push({ mid: value, mgid: groupId, pid: pid });
        } else {
            selectedValues.push({ mid: value, mgid: groupId, pid: pid });
        }
    });
    console.log("selectedValues cartmodifiersave: " + selectedValues);
    loader.css({ display: 'flex' });
    if (selectedValues.length > 0) {
        checkModGroupMaxItemNumber(pid, selectedValues, function (isValid) {
            if (isValid) {
                // proceed with logic here
                console.log("Validation passed. Proceed...");

                // if((selectedValues.length > 0) && checkModGroupMaxItemNumber(pid,selectedValues)){
                // return false;
                var mods = JSON.stringify(selectedValues);
                console.log("Modifier Selected Values: " + mods);
                //sending to the controller to check validations and save to the database
                if (skipAddToCart == 0) {
                    if (promoqty != 0) {
                        if (!posaddonsfoodtocart(pid, 1, null, true, promoqty)) {
                            // alert("Error adding the free item to the cart!");
                            swal({
                                title: "Error adding the free item to the cart!",
                                text: "Please try again.",
                                type: "error",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                            });
                            loader.hide();
                            return false;
                        }
                    } else {
                        if (!posaddonsfoodtocart(pid, 1)) {
                            // alert("Error adding this item to the cart!");
                            swal({
                                title: "Error adding this item to the cart!",
                                text: "Please try again.",
                                type: "error",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                            });
                            loader.hide();
                            return false;
                        }
                    }
                } else {
                    console.log("skipAddToCart else part");
                    if (promoqty == 0) {
                        removecart(tr_row_id);
                        if (!posaddonsfoodtocart(pid, 1)) {
                            // alert("Error adding this item to the cart!");
                            swal({
                                title: "Error adding this item to the cart!",
                                text: "Please try again.",
                                type: "error",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                            });
                            loader.hide();
                            return false;
                        }
                    }
                }
                $(".page-loader-wrapper").show();
                // the following settimeout function is to wait for the above posaddonsfoodtocart, removecart function to complete its execution
                // before proceeding to save the modifiers. but I want it to be dynamic and not hardcoded to 3000ms
                setTimeout(() => {
                    var trrowid = $("#tr_row_id_" + pid).val();
                    console.log("cart save row id: " + $("#tr_row_id_" + pid).val());
                    var csrf = $('#csrfhashresarvation').val(),
                        geturl = $("#cartmodifiersaveurl").val(),
                        ctype = $("#ctype").val(),
                        myurl = geturl,
                        dataString = "pid=" + pid + '&tr_row_id=' + trrowid + '&mods=' + mods + '&selectedDealSubMods=' + JSON.stringify(selectedDealSubMods) + '&ctype=' + ctype + '&csrf_test_name=' + csrf;
                    $.ajax({
                        type: "POST",
                        url: myurl,
                        data: dataString,
                        success: function (data) {
                            $(".page-loader-wrapper").hide();
                            loader.hide();
                            console.log("Modifier save data: " + data);
                            if (data == 420) {
                                // alert("The modifier doesn't have any ingredients!!!");
                                swal({
                                    title: "The modifier doesn't have any ingredients!!!",
                                    text: "Please check the modifier ingredients.",
                                    type: "warning",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                                return false;
                            }
                            if (data == 421) {
                                // alert("The modifier doesn't have sufficient ingredients!!!");
                                swal({
                                    title: "The modifier doesn't have sufficient ingredients!!!",
                                    text: "Please check the modifier stock.",
                                    type: "warning",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                                return false;
                            }
                            if (data == 422) {
                                // alert("The modifier doesn't have sufficient stock!!!");
                                swal({
                                    title: "The modifier doesn't have sufficient stock!!!",
                                    text: "Please check the modifier stock.",
                                    type: "warning",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                                return false;
                            }
                            if (data == 423) {
                                // alert("The modifier can't be added!!!");
                                swal({
                                    title: "The modifier can't be added!!!",
                                    text: "Please check the modifier settings.",
                                    type: "warning",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                                return false;
                            }
                            if ($("#selectedModsDetails_" + pid)) {
                                $("#selectedModsDetails_" + pid).remove();
                                $('#grtotal_' + pid).remove();
                                $('#totalitem_' + pid).remove();
                                $('#tvat_' + pid).remove();
                                $('#tdiscount_' + pid).remove();
                                $('#tgtotal_' + pid).remove();
                                $('#sc_' + pid).remove();
                                $('#promo_item_id_' + pid).remove();
                                $('#promo_item_qty_' + pid).remove();
                            }
                            $("#addfoodlist").append(data);
                            closeNav();
                            $("#newModSection").html(newModifierDefaultContent);
                            var promo_item_id = promo_item_qty = 0;
                            if ($("#promo_item_id_" + pid).length > 0) {
                                // Get the promo item id and quantity if they exist
                                promo_item_id = $('#promo_item_id_' + pid).val();
                                promo_item_qty = $('#promo_item_qty_' + pid).val();
                            }

                            var modTotalPrice = $('#modTotalPrice_' + pid).val();
                            var togText = $("#modToggleText_" + pid).val();
                            let selectedNewModsHtml = $("#selectedModsDetails_" + pid).html();
                            console.log("selectedNewModsHtml: " + selectedNewModsHtml);
                            $("#cartModToggle_" + pid).html(selectedNewModsHtml);
                            var oldIndvPrice = $("#subtotal").val();

                            var total = $('#grtotal_' + pid).val();
                            var totalitem = $('#totalitem_' + pid).val();
                            $('#item-number').text(totalitem);
                            $('#getitemp').val(totalitem);
                            var tax = $('#tvat_' + pid).val();
                            $('#vat').val(tax);
                            var discount = $('#tdiscount_' + pid).val();
                            var tgtotal = $('#tgtotal_' + pid).val();
                            $('#calvat').text(tax);
                            $('#invoice_discount').val(discount);
                            var sc = $('#sc_' + pid).val();
                            $('#service_charge').val(sc);
                            $('#caltotal').text(tgtotal);
                            $('#grandtotal').val(tgtotal);
                            $('#orggrandTotal').val(tgtotal);
                            $('#orginattotal').val(tgtotal);

                            // console.log("oldIndvPrice: "+oldIndvPrice);
                            console.log("Subtotal: " + parseFloat(total));
                            console.log("existiing price: " + $("#cartModToggle_" + pid).closest('.itemNumber').find('tr').find('td').eq(3).html());

                            //The following line was used for updating the total price in the cart, but the logic is not correct as it always sets the cart total to the first item.
                            // $("#cartModToggle_"+pid).closest('.itemNumber').find('tr').find('td').eq(3).html(parseFloat(total));
                            if ((promo_item_id != "" || promo_item_id != 0) && (promo_item_qty != null || promo_item_qty != 0)) {
                                // Add the promo item to the cart
                                isPromoFreeItem = true;
                                $('.select_product_id[value="' + promo_item_id + '"]').parent('.panel-body').parent('.select_product').click();
                                ApplyModifierSelect(promo_item_id, null, 0, promo_item_qty);
                                $('#promo_item_id_' + pid).remove();
                                $('#promo_item_qty_' + pid).remove();
                            }
                            // window.location.href = basicinfo.baseurl + "ordermanage/order/pos_invoice";
                            $(".page-loader-wrapper").hide();
                        }
                    });
                }, 4000);


            } else {
                console.log("Validation failed.");
            }
        });
    }
}
let isPromoFreeItem = false;
function ApplyPromoFoodAndModifierSelect(pid = 0, tr_row_id = null, skipAddToCart = 0) {
    let selectedValues = [];
    let selectedFoods = [];

    let loader = $('#posSidebarLoader');

    $("input[name='modifier_items[]']:checked").each(function () {
        let value = $(this).val();
        let groupId = $(this).attr("data-group-id");
        selectedValues.push({ mid: value, mgid: groupId, pid: pid });
    });
    $("input[name='promo_main_food_items[]']:checked").each(function () {
        let value = $(this).val();
        let groupId = $(this).attr("data-group-id");
        let variantid = $(this).attr("data-variantid");
        selectedFoods.push({ mid: value, mgid: groupId, pid: pid, vid: variantid });
    });
    loader.css({ display: 'flex' });
    if (selectedValues.length > 0) {
        checkModGroupMaxItemNumber(pid, selectedValues, function (isValid) {
            if (isValid) {
                // proceed with logic here
                console.log("Validation passed for Meal Deals. Proceed...");
                var mods = JSON.stringify(selectedValues),
                    foods = JSON.stringify(selectedFoods);
                console.log("Promo Selected Modifiers: " + mods);
                console.log("Promo Selected Foods: " + foods);
                //sending to the controller to check validations and save to the database
                if (skipAddToCart == 0) {
                    //old add to cart function
                    if (!posPromofoodtocart(pid, 1)) {
                        alert("Error adding this item to the cart!");
                        loader.hide();
                        return false;
                    }
                    // have to write new add to cart function for promo food
                    //...
                }
                $(".page-loader-wrapper").show();
                setTimeout(() => {
                    var trrowid = $("#tr_row_id_" + pid).val();
                    console.log("cart save row id: " + $("#tr_row_id_" + pid).val());
                    var csrf = $('#csrfhashresarvation').val(),
                        geturl = $("#cartPromoFoodModifierSaveUrl").val(),
                        myurl = geturl,
                        dataString = "pid=" + pid + '&tr_row_id=' + trrowid + '&mods=' + mods + '&foods=' + foods + '&selectedDealSubMods=' + JSON.stringify(selectedDealSubMods) + '&csrf_test_name=' + csrf;
                    $.ajax({
                        type: "POST",
                        url: myurl,
                        data: dataString,
                        success: function (data) {
                            $(".page-loader-wrapper").hide();
                            loader.hide();
                            console.log("Modifier save data: " + data);
                            if (data == 420) {
                                alert("The modifier doesn't have any ingredients!!!");
                                return false;
                            }
                            if (data == 421) {
                                alert("The modifier doesn't have sufficient ingredients!!!");
                                return false;
                            }
                            if (data == 422) {
                                alert("The modifier doesn't have sufficient stock!!!");
                                return false;
                            }
                            if (data == 423) {
                                alert("The modifier can't be added!!!");
                                return false;
                            }
                            if ($("#selectedModsDetails_" + pid)) {
                                $("#selectedModsDetails_" + pid).remove();
                                $('#grtotal_' + pid).remove();
                                $('#totalitem_' + pid).remove();
                                $('#tvat_' + pid).remove();
                                $('#tdiscount_' + pid).remove();
                                $('#tgtotal_' + pid).remove();
                                $('#sc_' + pid).remove();
                            }
                            $("#addfoodlist").append(data);
                            closeNav();
                            $("#newModSection").html(newModifierDefaultContent);
                            var modTotalPrice = $('#modTotalPrice_' + pid).val();
                            var togText = $("#modToggleText_" + pid).val();
                            let selectedNewModsHtml = $("#selectedModsDetails_" + pid).html();
                            console.log("selectedNewModsHtml: " + selectedNewModsHtml);
                            $("#cartModToggle_" + pid).html(selectedNewModsHtml);
                            var oldIndvPrice = $("#subtotal").val();

                            var total = $('#grtotal_' + pid).val();
                            var totalitem = $('#totalitem_' + pid).val();
                            $('#item-number').text(totalitem);
                            $('#getitemp').val(totalitem);
                            var tax = $('#tvat_' + pid).val();
                            $('#vat').val(tax);
                            var discount = $('#tdiscount_' + pid).val();
                            var tgtotal = $('#tgtotal_' + pid).val();
                            $('#calvat').text(tax);
                            $('#invoice_discount').val(discount);
                            var sc = $('#sc_' + pid).val();
                            $('#service_charge').val(sc);
                            $('#caltotal').text(tgtotal);
                            $('#grandtotal').val(tgtotal);
                            $('#orggrandTotal').val(tgtotal);
                            $('#orginattotal').val(tgtotal);

                            // console.log("oldIndvPrice: "+oldIndvPrice);
                            console.log("Subtotal: " + parseFloat(total));
                            console.log("existiing price: " + $("#cartModToggle_" + pid).closest('.itemNumber').find('tr').find('td').eq(3).html());

                            $("#cartModToggle_" + pid).closest('.itemNumber').find('tr').find('td').eq(3).html(parseFloat(total));
                            $(".page-loader-wrapper").hide();
                        }
                    });
                }, 3500);
            }
        });
    }
}

$(document).on('click', '#newModSection tr', function (e) {
    if (!$(e.target).is("input[type='checkbox']")) {
        let $checkbox = $(this).find("input[name='modifier_items[]']"),
        loader = $('#posSidebarLoader'),
        modifierChoosebtn = $('.modifierChoosebtn');
        $checkbox.prop("checked", !$checkbox.prop("checked")).trigger("change");

        if ($checkbox.is(":checked")) {
            let myurl = $('#modifierCheckUrl').val(),
                csrf = $('#csrfhashresarvation').val(),
                group_id = $checkbox.data('group-id'),
                addon_id = $checkbox.val(),
                pid = $checkbox.data('pid');
            // $(".page-loader-wrapper").show();
            loader.css({display:'flex'});
            modifierChoosebtn.prop("disabled", true);
            modifierChoosebtn.css({cursor: 'not-allowed', opacity: 0.5});
            $.ajax({
                type: "POST",
                url: myurl,
                data: {
                    group_id: group_id,
                    addon_id: addon_id,
                    pid: pid,
                    csrf_test_name: csrf
                },
                success: function (data) {
                    // $(".page-loader-wrapper").hide();
                    loader.hide();
                    modifierChoosebtn.prop("disabled", false);
                    modifierChoosebtn.css({cursor: 'pointer', opacity: 1});
                    if (data == '0') {
                    } else {
                        if (data != "") {
                            console.log("Modifiers found: " + data);
                            $("#mealDealSubModListModal").find('.modal-body').html(data);
                            $("#mealDealSubModListModal").modal('show');
                        }
                    }
                },
                error: function () {
                    $(".page-loader-wrapper").hide();
                    swal({
                        title: "Error",
                        text: "An error occurred while checking modifiers. Please try again.",
                        type: "error",
                        confirmButtonText: "OK",
                        closeOnConfirm: true
                    });
                }
            });
        }
    }
});


$(document).on('click', '#mealDealSubModListModal .modal-body table tr', function (e) {
    if (!$(e.target).is("input[type='checkbox']")) {
        const $checkbox = $(this).find("input[name='promo_sub_modifiers[]']");
        $checkbox.prop("checked", !$checkbox.prop("checked")).trigger("change"); // Toggle and trigger
    }
});



$(document).on('click', "#newModSection input[name='modifier_items[]']", function () {
    var checkbox = $(this), // Save reference for later use
    loader = $('#posSidebarLoader'),
    modifierChoosebtn = $('.modifierChoosebtn');
    //extract pid from the checkbox data attribute
    var pid = checkbox.data('pid');

    if (checkbox.is(":checked")) {
        //make an ajax request to find the modifiers assigned to the checked item
        var myurl = $('#modifierCheckUrl').val(),
            csrf = $('#csrfhashresarvation').val(),
            group_id = checkbox.data('group-id'),
            addon_id = checkbox.val();
        // $(".page-loader-wrapper").show();
        loader.css({display:'flex'});
        modifierChoosebtn.prop("disabled", true);
        modifierChoosebtn.css({cursor: 'not-allowed', opacity: 0.5});
        $.ajax({
            type: "POST",
            url: myurl,
            data: { group_id: group_id, addon_id: addon_id, pid: pid, csrf_test_name: csrf },
            success: function (data) {
                // $(".page-loader-wrapper").hide();
                loader.hide();
                modifierChoosebtn.prop("disabled", false);
                modifierChoosebtn.css({cursor: 'pointer', opacity: 1});
                if (data == '0') {
                    // No modifiers found for this item
                } else {
                    console.log("Modifiers found: " + data);
                    $("#mealDealSubModListModal").find('.modal-body').html(data);
                    $("#mealDealSubModListModal").modal('show');
                }
            },
            error: function () {
                $(".page-loader-wrapper").hide();
                // Handle error case
                swal({
                    title: "Error",
                    text: "An error occurred while checking modifiers. Please try again.",
                    type: "error",
                    confirmButtonText: "OK",
                    closeOnConfirm: true
                });
            }
        });
    }
});

function selectMealDealSubMods(menu_id) {
    $("input[name='promo_sub_modifiers[]']:checked").each(function () {
        let value = $(this).val();
        let groupId = $(this).attr("data-group-id");
        let pid = $(this).data("pid");

        //before this I have to check if the groupId, add_on_id and menu_id are already exists with the same pid into the selectedDealSubMods array
        let exists = selectedDealSubMods.some(function (item) {
            return item.add_on_id === value && item.mgid === groupId && item.deal_mod_pid === menu_id && item.meal_deal_pid === pid;
        });
        if (exists) {
            console.log("This sub mod is already selected: " + value);
            return; // Skip adding this sub mod if it already exists
        }
        // If it doesn't exist, add it to the selectedDealSubMods array
        console.log("Adding sub mod: " + value + " with groupId: " + groupId + " for menu_id: " + menu_id + " and pid: " + pid);
        selectedDealSubMods.push({ add_on_id: value, mgid: groupId, deal_mod_pid: menu_id, meal_deal_pid: pid });
    });
    if (selectedDealSubMods.length > 0) {
        checkMealDealModGroupMaxItemNumber(menu_id, selectedDealSubMods, function (isValid) {
            if (isValid) {
                // proceed with logic here
                console.log("Validation passed for meal deal sub mods. Proceed...");
                var mods = JSON.stringify(selectedDealSubMods);
                console.log("Selected Meal Deal Sub Mods: " + mods);
                $("#mealDealSubModListModal").modal('hide');
            }
        });
    }
}


$(document).ready(function () {
    "use strict";
    $("#nonthirdparty").show();
    $("#thirdparty").hide();
    $("#delivercom").prop('disabled', true);
    $("#waiter").prop('disabled', false);
    $("#tableid").prop('disabled', false);
    $("#cookingtime").prop('disabled', false);
    $("#cardarea").hide();


    $("#paidamount").on('keyup', function () {
        var maintotalamount = $("#maintotalamount").val();
        var paidamount = $("#paidamount").val();
        var restamount = (parseFloat(paidamount)) - (parseFloat(maintotalamount));
        var changes = restamount.toFixed(2);
        $("#change").val(changes);
    });

    $(".payment_button").click(function () {
        $(".payment_method").toggle();

        //Select Option
        $("select.form-control:not(.dont-select-me)").select2({
            placeholder: lang.sl_option,
            allowClear: true
        });
    });

    $("#card_typesl").on('change', function () {
        var cardtype = $("#card_typesl").val();

        $("#card_type").val(cardtype);
        if (cardtype == 4) {
            $("#isonline").val(0);
            $("#cardarea").hide();
            $("#assigncard_terminal").val('');
            $("#assignbank").val('');
            $("#assignlastdigit").val('');
        } else if (cardtype == 1) {
            $("#isonline").val(0);
            $("#cardarea").show();
        } else {
            $("#isonline").val(1);
            $("#cardarea").hide();
            $("#assigncard_terminal").val('');
            $("#assignbank").val('');
            $("#assignlastdigit").val('');
        }

    });
    $("#ctypeid").on('change', function () {
        var customertype = $("#ctypeid").val();
        if (customertype == 3) {
            $("#delivercom").prop('disabled', false);
            $("#waiter").prop('disabled', true);
            $("#tableid").prop('disabled', true);
            $("#cookingtime").prop('disabled', true);
            $("#nonthirdparty").hide();
            $("#thirdparty").show();
        } else if (customertype == 4) {
            $("#nonthirdparty").show();
            $("#thirdparty").hide();
            $("#tblsec").hide();
            $("#tblsecp").hide();
            $("#delivercom").prop('disabled', true);
            $("#waiter").prop('disabled', false);
            $("#tableid").prop('disabled', true);
            $("#cookingtime").prop('disabled', true);
        } else if (customertype == 2) {
            $("#nonthirdparty").show();
            $("#tblsecp").hide();
            $("#tblsec").hide();
            $("#thirdparty").hide();
            $("#waiter").prop('disabled', false);
            $("#tableid").prop('disabled', false);
            $("#cookingtime").prop('disabled', false);
            $("#delivercom").prop('disabled', true);
        } else {
            $("#nonthirdparty").show();
            $("#tblsecp").show();
            $("#tblsec").show();
            $("#thirdparty").hide();
            $("#waiter").prop('disabled', false);
            $("#tableid").prop('disabled', false);
            $("#cookingtime").prop('disabled', false);
            $("#delivercom").prop('disabled', true);

        }
    });
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });
    /*place order*/
    Mousetrap.bind('shift+p', function () {

        placeorder();
    });
    /*quick order*/
    Mousetrap.bind('shift+q', function () {
        quickorder();
    });
    /*select customer name*/
    Mousetrap.bind('shift+c', function () {
        $("#customer_name").select2('open');
    });

    /*select customer type*/
    Mousetrap.bind('shift+y', function () {
        $("#ctypeid").select2('open');
    });

    /*focus on discount*/
    Mousetrap.bind('shift+d', function () {
        $("#invoice_discount").focus();
        return false;
    });
    /*focus service charge*/
    Mousetrap.bind('shift+r', function () {
        $("#service_charge").focus();
        return false;
    });
    /*go ongoing order tab*/
    Mousetrap.bind('shift+g', function () {
        $(".ongord").trigger("click");
    });
    /*go total order tab*/
    Mousetrap.bind('shift+t', function () {
        $(".torder").trigger("click");
    });
    /*go online order tab*/
    Mousetrap.bind('shift+o', function () {
        $(".comorder").trigger("click");
    });
    /*go new order tab*/
    Mousetrap.bind('shift+n', function () {
        $(".home").trigger("click");
    });

    /*search unique product for cart*/
    Mousetrap.bind('shift+s', function () {
        $("#product_name").select2('open');
    });
    /*select item qty on addons modal*/
    Mousetrap.bind('alt+q', function () {
        $('#itemqty_1').focus();
        return false;
    });
    /*add to cart on addons modal*/
    Mousetrap.bind('shift+a', function () {
        $("#add_to_cart").trigger("click");
    });
    /*edit on going order*/
    Mousetrap.bind('shift+e', function (e) {
        $('[id*=table-]').focus();

    });

    /*table search*/
    Mousetrap.bind('shift+x', function (e) {
        $("input[aria-controls=onprocessing]").focus();
        return false;
    });
    /*table search*/
    Mousetrap.bind('shift+v', function (e) {
        $("input[aria-controls=Onlineorder]").focus();
        return false;
    });
    /*edit on going order*/
    Mousetrap.bind('shift+m', function (e) {
        $('[id*=table-today-]').focus();

    });
    /*select cooking time*/
    Mousetrap.bind('alt+k', function () {
        $('#cookedtime').focus();
        return false;
    });
    /*select waiter*/
    Mousetrap.bind('shift+w', function () {
        $('#waiter').select2('open');
        return false;
    });
    /*select table*/
    Mousetrap.bind('shift+b', function () {
        $('#tableid').select2('open');
        return false;
    });
    /*select uniqe table on going order*/
    Mousetrap.bind('alt+t', function () {
        $("#ongoingtable_name").select2('open');
    });
    /*update srotcut*/
    /*select update order list*/
    Mousetrap.bind('alt+s', function () {
        $("#update_product_name").select2('open');
    });
    /*select customer name*/
    Mousetrap.bind('alt+c', function () {
        $("#customer_name_update").select2('open');
    });

    /*select customer type*/
    Mousetrap.bind('alt+y', function () {
        $("#ctypeid_update").select2('open');
    });
    /*select waiter*/
    Mousetrap.bind('alt+w', function () {
        $('#waiter_update').select2('open');
        return false;
    });
    /*select table*/
    Mousetrap.bind('alt+b', function () {
        $('#tableid_update').select2('open');
        return false;
    });
    /*focus on discount*/
    Mousetrap.bind('alt+d', function () {
        $("#invoice_discount_update").focus();
        return false;
    });
    /*focus service charge*/
    Mousetrap.bind('alt+r', function () {
        $("#service_charge_update").focus();
        return false;
    });
    /*submit  update order*/
    Mousetrap.bind('alt+u', function () {
        $("#update_order_confirm").trigger("click");
    });
    /*end update sort cut*/
    /*quick paid modal*/
    /*select payment type name*/
    Mousetrap.bind('alt+m', function () {
        $(".card_typesl").select2('open');
    });
    /*type paid amount*/
    Mousetrap.bind('alt+a', function () {
        $('.number').focus();
        //window.prevFocus = $('.number');
        return false;
    });
    /*print bill paid amount*/
    Mousetrap.bind('alt+p', function () {
        $('#pay_bill').trigger("click");
    });
    /*print bill paid amount*/
    Mousetrap.bind('alt+x', function () {
        $('.close').trigger("click");
    });

    $('.search-field').select2({
        placeholder: lang.sl_product,
        minimumInputLength: 1,
        ajax: {
            url: baseurl + '/ordermanage/order/getitemlistdroup',
            dataType: 'json',
            delay: 250,
            //data:{csrf_test_name:basicinfo.csrftokeng},
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.text + '-' + item.variantName,
                            id: item.id + '-' + item.variantid
                        }
                    })
                };
            },
            cache: true
        }
    });

    /*all ongoingorder product as ajax*/
    $(document).on('click', '#ongoingorder', function () {
        var url = baseurl + 'ordermanage/order/getongoingorder';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#onprocesslist').html(data);
            }

        });
    });
    /*all ongoingorder product as ajax*/
    $(document).on('click', '#kitchenorder', function () {
        var url = baseurl + 'ordermanage/order/kitchenstatus';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#kitchen').html(data);
            }

        });


    });
    /*all todayorder product as ajax*/
    $(document).on('click', '#todayorder', function () {
        var url = baseurl + 'ordermanage/order/showtodayorder';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#messages').html(data);
            }

        });


    });
    /*all todayorder product as ajax*/
    $(document).on('click', '#todayonlieorder', function () {

        var url = baseurl + 'ordermanage/order/showonlineorder';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#settings').html(data);
            }

        });


    });
    /*all todayorder product as ajax*/
    $(document).on('click', '#todayqrorder', function () {

        var url = baseurl + 'ordermanage/order/showqrorder';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#qrorder').html(data);
            }

        });


    });

       /*all cancelorder product as ajax*/
    $(document).on('click', '#cancelorder', function () {
        var url = baseurl + 'ordermanage/order/showcancelorder';
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                $('#messages').html(data);
            }

        });


    });

});
/*unique table data*/
"use strict";
$(document).on('change', '#ongoingtable_name', function () {
    var id = $(this).children("option:selected").val();
    var url = baseurl + 'ordermanage/order/getongoingorder' + '/' + id;
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#onprocesslist').html(data);

        }

    });
    $('#table-' + id).focus();

});
$(document).on('change', '#ongoingtable_sr', function () {
    var id = $(this).children("option:selected").val();
    var url = baseurl + 'ordermanage/order/getongoingorder' + '/' + id + '/table';
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#onprocesslist').html(data);

        }

    });
    $('#table-' + id).focus();

});
/*select product from list*/
$(document).on('change', '#product_name', function () {

    var tid = $(this).children("option:selected").val();
    var idvid = tid.split('-');
    var id = idvid[0];
    var vid = idvid[1];
    var url = baseurl + 'ordermanage/order/srcposaddcart' + '/' + id;
    var csrf = $('#csrfhashresarvation').val();
    /*check production*/
    /*please fixt count total counting*/
    var productionsetting = $('#production_setting').val();
    if (productionsetting == 1) {
        var checkqty = 1;
        var checkvalue = checkproduction(id, vid, checkqty);
        if (checkvalue == false) {
            $('#product_name').html('');
            return false;
        }

    }
    /*end checking*/
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            var myurl = baseurl + "ordermanage/order/adonsproductadd" + '/' + id;
            $.ajax({
                type: "GET",
                url: myurl,
                data: { csrf_test_name: csrf },
                success: function (data) {
                    console.log('Data' + data);
                    $('.addonsinfo').html(data);
                    $('#edit').modal('show');
                    var totalitem = $('#totalitem').val();
                    var tax = $('#tvat').val();
                    var discount = $('#tdiscount').val();
                    var tgtotal = $('#tgtotal').val();
                    $('#vat').val(tax);
                    $('#calvat').text(tax);
                    var sc = $('#sc').val();
                    $('#service_charge').val(sc);
                    $('#getitemp').val(totalitem);
                    $('#invoice_discount').val(discount);
                    if (basicinfo.isvatinclusive == 1) {
                        $('#caltotal').text(tgtotal - tax);
                    } else {
                        $('#caltotal').text(tgtotal);
                    }
                    $('#grandtotal').val(tgtotal);
                    $('#orggrandTotal').val(tgtotal);
                    $('#orginattotal').val(tgtotal);
                    $('#product_name').html('');

                }
            });
        }
    });


});
/*$(document).on("keypress", '#varientinfo', function(e){
    if(e.which == 13){
        $('#itemqty_1').trigger(click);	    
    }
});*/
$(document).on("keypress", '#itemqty_1', function (e) {
    if (e.which == 13) {
        $('.asingle').trigger('click');
    }
});
$("#edit").on('shown.bs.modal', function () {
    $('#varientinfo').focus();
});
function printRawHtml(view) {
    printJS({
        printable: view,
        type: 'raw-html',

    });
}

function placeorder() {
    var ctypeid = $("#ctypeid").val();
    var waiter = "";
    var isdelivary = "";
    var thirdinvoiceid = "";
    var tableid = "";
    var customer_name = $("#customer_name").val();
    var cardtype = 4;
    var isonline = 0;
    var order_date = $("#order_date").val();
    var grandtotal = $("#grandtotal").val();
    var customernote = "";
    var invoice_discount = $("#invoice_discount").val();
    var service_charge = $("#service_charge").val();
    var vat = $("#vat").val();
    var orggrandTotal = $("#subtotal").val();
    var isonline = $("#isonline").val();
    var isitem = $("#totalitem").val();
    var cookedtime = $("#cookedtime").val();
    var multiplletaxvalue = $('#multiplletaxvalue').val();
    var csrf = $('#csrfhashresarvation').val();
    var reserveid = $('#reserveid').val();
    var errormessage = '';
    if (customer_name == '') {
        errormessage = errormessage + '<span>Please Select Customer Name.</span>';
        alert("Please Select Customer Name!!!");
        return false;
    }
    if (ctypeid == '') {
        errormessage = errormessage + '<span>Please Select Customer Type.</span>';
        alert("Please Select Customer Type!!!");
        return false;
    }
    if (isitem == '' || isitem == 0) {
        errormessage = errormessage + '<span>Please add Some Food</span>';
        alert("Please add Some Food!!!");
        return false;
    }
    if (ctypeid == 3) {
        var isdelivary = $("#delivercom").val();
        var thirdinvoiceid = $("#thirdinvoiceid").val();
        if (isdelivary == '') {
            errormessage = errormessage + '<span>Please Select Customer Type.</span>';
            alert("Please Select Delivar Company!!!");
            return false;
        }
    } else if (ctypeid == 4 || ctypeid == 2) {
        if (possetting.waiter == 1) {
            var waiter = $("#waiter").val();
            if (waiter == '') {
                errormessage = errormessage + '<span>Please Select Waiter.</span>';
                alert("Please Select Waiter!!!");
                return false;
            }
        }
    } else {
        var waiter = $("#waiter").val();
        var tableid = $("#tableid").val();
        var table_member_multi = $('#table_member_multi').val();
        var table_member_multi_person = $('#table_member_multi_person').val();
        var table_member = $("#table_member").val(); //table member 02/11
        if (possetting.waiter == 1) {
            if (waiter == '') {
                errormessage = errormessage + '<span>Please Select Waiter.</span>';
                $("#waiter").select2('open');
                return false;
            }
        }
        if (possetting.tableid == 1) {
            if (tableid == '') {
                $("#tableid").select2('open');
                toastr.warning("Please Select Table", 'Warning');
                return false;
            }
            if (possetting.tablemaping == 1) {

                if (tableid == '' || !$.isNumeric($('#table_person').val())) {
                    toastr.warning("Please Select Table or number person", 'Warning');
                    return false;
                }
            }
        }
    }
    if (errormessage == '') {
        order_date = encodeURIComponent(order_date);
        customernote = encodeURIComponent(customernote);
        var errormessage = '<span style="color:#060;">Signup Completed Successfully.</span>';
        var dataString = 'customer_name=' + customer_name + '&ctypeid=' + ctypeid + '&waiter=' + waiter + '&tableid=' + tableid + '&card_type=' + cardtype + '&isonline=' + isonline + '&order_date=' + order_date + '&grandtotal=' + grandtotal + '&customernote=' + customernote + '&invoice_discount=' + invoice_discount + '&service_charge=' + service_charge + '&vat=' + vat + '&subtotal=' + orggrandTotal + '&assigncard_terminal=&assignbank=&assignlastdigit=&delivercom=' + isdelivary + '&thirdpartyinvoice=' + thirdinvoiceid + '&cookedtime=' + cookedtime + '&tablemember=' + table_member + '&table_member_multi=' + table_member_multi + '&table_member_multi_person=' + table_member_multi_person + '&multiplletaxvalue=' + multiplletaxvalue + '&csrf_test_name=' + csrf + '&reserveid=' + reserveid;
        $.ajax({
            type: "POST",
            url: basicinfo.baseurl + "ordermanage/order/pos_order",
            data: dataString,
            success: function (data) {
                selectedDealSubMods = [];
                $('#addfoodlist').empty();
                $("#getitemp").val('0');
                $('#calvat').text('0');
                $('#vat').val('0');
                $('#invoice_discount').val('0');
                $('#caltotal').text('');
                $('#grandtotal').val('');
                $('#thirdinvoiceid').val('');
                $('#orggrandTotal').val('');
                $('#waiter').select2('data', null);
                $('#tableid').select2('data', null);
                $('#waiter').val('');

                $('#table_member').val('');
                $('#table_person').val(lang.person);
                $('#table_member_multi').val(0);
                $('#table_member_multi_person').val(0);

                var err = data;
                switch (err) {
                    case '201':
                        swal({
                            title: lang.ord_failed,
                            // text: lang.failed_msg,
                            text: "You haven't set Ingredients to some items. Please set ingredients to all items.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: lang.yes + ", " + lang.cancel + "!",
                            closeOnConfirm: true
                        },
                            function () {

                            });
                        return false;
                        break;
                    case '202':
                        swal({
                            title: lang.ord_failed,
                            // text: lang.failed_msg,
                            text: "Please check Ingredients!!Some Ingredients are not Available!!!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: lang.yes + ", " + lang.cancel + "!",
                            closeOnConfirm: true
                        },
                            function () {

                            });
                        return false;
                        break;
                }
                if (err == "error") {
                    swal({
                        title: lang.ord_failed,
                        text: lang.failed_msg,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: lang.yes + ", " + lang.cancel + "!",
                        closeOnConfirm: true
                    },
                        function () {

                        });
                } else {
                    selectedDealSubMods = [];
                    if (basicinfo.printtype == 1) {
                        swal({
                            title: lang.ord_succ,
                            text: "",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#28a745",
                            confirmButtonText: "Done",
                            closeOnConfirm: true
                        },
                            function () {

                            });
                    } else {
                        swal({
                            title: lang.ord_succ,
                            text: "Do you Want to Print Token No.???",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#28a745",
                            confirmButtonText: lang.yes,
                            cancelButtonText: lang.no,
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                            function (isConfirm) {
                                if (isConfirm) {
                                    printRawHtml(data);
                                } else {
                                    $('#waiter').select2('data', null);
                                    $('#tableid').select2('data', null);
                                    $('#waiter').val('');
                                    $('#tableid').val('');
                                }
                            });
                    }
                }
            }
        });
    }
}

function postokenprint(id) {
    var csrf = $('#csrfhashresarvation').val();
    var url = 'paidtoken' + '/' + id + '/';
    $.ajax({
        type: "POST",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            printRawHtml(data);
        }
    });
}

function editposorder(id, view) {
    var url = basicinfo.baseurl + 'ordermanage/order/updateorder' + '/' + id;
    var csrf = $('#csrfhashresarvation').val();
    if (view == 1) {
        editpos = 1;
        var vid = $("#onprocesslist");
    } else if (view == 2) {
        var vid = $("#messages");
    } else if (view == 4) {
        var vid = $("#qrorder");
    } else {
        var vid = $("#settings");
    }

    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            vid.html(data);
            $('.listcat3').on('click', function (event) {
                var spid = $(this).next(".dropcat").attr('id');
                if ($("#" + spid).hasClass('display-none')) { $("#" + spid).removeClass('display-none'); $("#" + spid).addClass('display-block'); } else { $("#" + spid).removeClass('display-block'); $("#" + spid).addClass('display-none'); }
            });
        }
    });

}

function quickorder() {
    var ctypeid = $("#ctypeid").val();
    var waiter = "";
    var isdelivary = "";
    var thirdinvoiceid = "";
    var tableid = "";
    var customer_name = $("#customer_name").val();
    var cardtype = 4;
    var isonline = 0;
    var order_date = $("#order_date").val();
    var grandtotal = $("#grandtotal").val();
    var customernote = "";
    var invoice_discount = $("#invoice_discount").val();
    var service_charge = $("#service_charge").val();
    var vat = $("#vat").val();
    var orggrandTotal = $("#subtotal").val();

    var isitem = $("#totalitem").val();
    var cookedtime = $("#cookedtime").val();
    var multiplletaxvalue = $('#multiplletaxvalue').val();
    var csrf = $('#csrfhashresarvation').val();
    var errormessage = '';
    if (customer_name == '') {
        errormessage = errormessage + '<span>Please Select Customer Name.</span>';
        alert("Please Select Customer Name!!!");
        return false;
    }
    if (ctypeid == '') {
        errormessage = errormessage + '<span>Please Select Customer Type.</span>';
        alert("Please Select Customer Type!!!");
        return false;
    }
    if (isitem == '' || isitem == 0) {
        errormessage = errormessage + '<span>Please add Some Food</span>';
        alert("Please add Some Food!!!");
        return false;
    }
    if (ctypeid == 3) {
        var isdelivary = $("#delivercom").val();
        var thirdinvoiceid = $("#thirdinvoiceid").val();
        if (isdelivary == '') {
            errormessage = errormessage + '<span>Please Select Customer Type.</span>';
            alert("Please Select Delivar Company!!!");
            return false;
        }
    } else if (ctypeid == 4 || ctypeid == 2) {
        var waiter = $("#waiter").val();
        if (quickordersetting.waiter == 1) {
            if (waiter == '') {
                errormessage = errormessage + '<span>Please Select Waiter.</span>';
                $("#waiter").select2('open');

                return false;
            }
        }
    } else {
        var waiter = $("#waiter").val();
        var tableid = $("#tableid").val();
        var table_member_multi = $('#table_member_multi').val();
        var table_member_multi_person = $('#table_member_multi_person').val();
        var table_member = $("#table_member").val(); //table member 02/11
        if (quickordersetting.waiter == 1) {
            if (waiter == '') {
                errormessage = errormessage + '<span>Please Select Waiter.</span>';
                $("#waiter").select2('open');
                return false;
            }
        }
        if (quickordersetting.tableid == 1) {
            if (tableid == '') {
                $("#tableid").select2('open');
                toastr.warning("Please Select Table", 'Warning');
                return false;
            }
            if (quickordersetting.tablemaping == 1) {
                if (tableid == '' || !$.isNumeric($('#table_person').val())) {
                    toastr.warning("Please Select Table or number person", 'Warning');
                    return false;
                }
            }
        }
    }


    if (errormessage == '') {
        order_date = encodeURIComponent(order_date);
        customernote = encodeURIComponent(customernote);
        var errormessage = '<span style="color:#060;">Signup Completed Successfully.</span>';
        var dataString = 'customer_name=' + customer_name + '&ctypeid=' + ctypeid + '&waiter=' + waiter + '&tableid=' + tableid + '&card_type=' + cardtype + '&isonline=' + isonline + '&order_date=' + order_date + '&grandtotal=' + grandtotal + '&customernote=' + customernote + '&invoice_discount=' + invoice_discount + '&service_charge=' + service_charge + '&vat=' + vat + '&subtotal=' + orggrandTotal + '&assigncard_terminal=&assignbank=&assignlastdigit=&delivercom=' + isdelivary + '&thirdpartyinvoice=' + thirdinvoiceid + '&cookedtime=' + cookedtime + '&tablemember=' + table_member + '&table_member_multi=' + table_member_multi + '&table_member_multi_person=' + table_member_multi_person + '&multiplletaxvalue=' + multiplletaxvalue + '&csrf_test_name=' + csrf;

        $.ajax({
            type: "POST",
            url: basicinfo.baseurl + "ordermanage/order/pos_order/1",
            data: dataString,
            success: function (data) {
                $('#addfoodlist').empty();
                $("#getitemp").val('0');
                $('#calvat').text('0');
                $('#vat').val('0');
                $('#invoice_discount').val('0');
                $('#caltotal').text('');
                $('#grandtotal').val('');
                $('#thirdinvoiceid').val('');
                $('#orggrandTotal').val('');
                $('#waiter').select2('data', null);
                $('#tableid').select2('data', null);
                $('#waiter').val('');

                $('#table_member').val('');
                $('#table_person').val(lang.person);
                $('#table_member_multi').val(0);
                $('#table_member_multi_person').val(0);
                var err = data;
                if (err == "error") {
                    swal({
                        title: lang.ord_failed,
                        text: lang.failed_msg,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: lang.yes + ", " + lang.cancel + "!",
                        closeOnConfirm: true
                    },
                        function () {

                        });
                } else {
                    swal({
                        title: lang.ord_places,
                        text: lang.do_print_in,
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#28a745",
                        confirmButtonText: lang.yes,
                        cancelButtonText: lang.no,
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                        function (isConfirm) {
                            if (isConfirm) {
                                createMargeorder(data, 1)

                            } else {
                                $('#waiter').select2('data', null);
                                $('#tableid').select2('data', null);
                                $('#waiter').val('');
                                $('#tableid').val('');

                            }
                        });

                }
            }
        });
    }
}

function printJobComplete() {
    $("#kotenpr").empty();
}

function printRawHtmlupdate(view, id) {
    printJS({
        printable: view,
        type: 'raw-html',
        onPrintDialogClose: function () {
            $.ajax({
                type: "GET",
                url: "tokenupdate/" + id,
                data: { csrf_test_name: csrftokeng },
                success: function (data) {
                    console.log("done");
                }
            });
        }
    });
}

function postupdateorder_ajax() {
    var form = $('#insert_purchase');
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',

        beforeSend: function (xhr) {

            $('span.error').html('');
        },

        success: function (result) {
            swal({
                title: result.msg,
                text: result.tokenmsg,
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                confirmButtonText: lang.yes,
                cancelButtonText: lang.no,
                closeOnConfirm: true,
                closeOnCancel: true
            },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "GET",
                            url: "postokengenerateupdate/" + result.orderid + "/1",
                            success: function (data) {
                                printRawHtml(data);
                                $(".maindashboard").removeClass("disabled");
                                $("#fhome").removeClass("disabled");
                                $("#kitchenorder").removeClass("disabled");
                                $("#todayqrorder").removeClass("disabled");
                                $("#todayonlieorder").removeClass("disabled");
                                $("#todayorder").removeClass("disabled");
                                $("#cancelorder").removeClass("disabled");
                                $("#ongoingorder").removeClass("disabled");
                            }
                        });
                    } else {

                        $.ajax({
                            type: "GET",
                            url: "tokenupdate/" + result.orderid,
                            success: function (data) {
                                $(".maindashboard").removeClass("disabled");
                                $("#fhome").removeClass("disabled");
                                $("#kitchenorder").removeClass("disabled");
                                $("#todayqrorder").removeClass("disabled");
                                $("#todayonlieorder").removeClass("disabled");
                                $("#todayorder").removeClass("disabled");
                                 $("#cancelorder").removeClass("disabled");
                                $("#ongoingorder").removeClass("disabled");
                            }
                        });
                    }
                });
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000,

                };
                toastr.success(result.msg, 'Success');
                prevsltab.trigger("click");


            }, 300);
        },
        error: function (a) {

        }
    });
}

function payorderbill(status, orderid, totalamount) {
    $('#paidbill').attr('onclick', 'orderconfirmorcancel(' + status + ',' + orderid + ')');
    $('#maintotalamount').val(totalamount);
    $('#totalamount').val(totalamount);
    $('#paidamount').attr("max", totalamount);
    $('#payprint').modal('show');
}

function onlinepay() {
    $("#onlineordersubmit").submit();
}

function orderconfirmorcancel(status, orderid) {
    mystatus = status;
    if (status == 9 || status == 10) {
        status = 4;
        var pval = $("#paidamount").val();
        if (pval < 1 || pval == '') {
            alert("Please Insert Paid Amount!!!");
            return false;
        }
    }
    var carttype = '';
    var cterminal = '';
    var mybank = '';
    var mydigit = '';
    var paid = '';
    if (status == 4) {
        var carttype = $("#card_typesl").val();
        var cterminal = $("#card_terminal").val();
        var mybank = $("#bank").val();
        var mydigit = $("#last4digit").val();
        var paid = $('#paidamount').val();

        if (carttype == '') {
            alert("Please Select Payment Method!!!");
            return false;
        }
        if (carttype == 1) {
            if (cterminal == '') {
                alert(lang.crd_terminal_message);
                return false;
            }
        }
    }
    var csrf = $('#csrfhashresarvation').val();
    var dataString = 'status=' + status + '&orderid=' + orderid + '&paytype=' + carttype + '&cterminal=' + cterminal + '&mybank=' + mybank + '&mydigit=' + mydigit + '&paid=' + paid + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/changestatus", //workingnow
        data: dataString,
        success: function (data) {
            $("#onprocesslist").html(data);
            if (mystatus == "9") {
                window.location.href = basicinfo.baseurl + "ordermanage/order/orderinvoice/" + orderid;
            } else if (mystatus == "10") {
                $('#payprint').modal('hide');

                prevsltab.trigger("click");
            } else if (mystatus == 4) {
                swal({
                    title: lang.ord_complte,
                    text: lang.ord_com_sucs,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#28a745",
                    confirmButtonText: lang.yes,
                    closeOnConfirm: true
                },
                    function () {
                        prevsltab.trigger("click");
                        $('#paidamount').val('');
                        $('#payprint').modal('hide');
                    });
            }
        }
    });
}

function paysound() {
    var filename = basicinfo.baseurl + basicinfo.nofitysound;
    var audio = new Audio(filename);
    audio.play();
}

function load_unseen_notification(view = '') {
    var csrf = $('#csrfhashresarvation').val();
    var myAudio = document.getElementById("myAudio");
    var soundenable = possetting.soundenable;
    $.ajax({
        url: "notification",
        method: "POST",
        data: { csrf_test_name: csrf, view: view },
        dataType: "json",
        success: function (data) {
            if (data.unseen_notification > 0) {
                $('.count').html(data.unseen_notification);
                if (soundenable == 1) {
                    myAudio.play();
                }
            } else {
                if (soundenable == 1) {
                    myAudio.pause();
                }
                $('.count').html(data.unseen_notification);
            }

        }
    });
}
var intervalc = 0;
setInterval(function () {
    load_unseen_notification(intervalc);
}, 30000);

function load_unseen_notificationqr(view = '') {
    var csrf = $('#csrfhashresarvation').val();
    var myAudio = document.getElementById("myAudio");
    var soundenable = possetting.soundenable;
    $.ajax({
        url: basicinfo.baseurl + "ordermanage/order/notificationqr",
        method: "POST",
        data: { csrf_test_name: csrf, view: view },
        dataType: "json",
        success: function (data) {
            if (data.unseen_notificationqr > 0) {
                $('.count2').html(data.unseen_notificationqr);
                if (soundenable == 1) {
                    myAudio.play();
                }
            } else {
                if (soundenable == 1) {
                    myAudio.pause();
                }
                $('.count2').html(data.unseen_notification);
            }
        }
    });
}
setInterval(function () {
    $('li.active').trigger('click');
    load_unseen_notificationqr();
}, 30000);

function detailspop(orderid) {
    var csrf = $('#csrfhashresarvation').val();
    var myurl = basicinfo.baseurl + 'ordermanage/order/orderdetailspop/' + orderid;
    var dataString = "orderid=" + orderid + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function (data) {
            $('.orddetailspop').html(data);
            $('#orderdetailsp').modal('show');
        }
    });

}

function pospageprint(orderid) {
    var csrf = $('#csrfhashresarvation').val();
    var datavalue = 'customer_name=' + customer_name + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/posprintview/" + orderid,
        data: datavalue,
        success: function (printdata) {
            if (basicinfo.printtype != 1) {
                $("#kotenpr").html(printdata);
                const style = '@page { margin:0px;font-size:18px; }';
                printJS({
                    printable: 'kotenpr',
                    onPrintDialogClose: printJobComplete,
                    type: 'html',
                    font_size: '25px',
                    style: style,
                    scanStyles: false
                })
            }
        }
    });
}

function printPosinvoice(id) {
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'posorderinvoice/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            printRawHtml(data);

        }

    });
}

function pos_order_invoice(id) {
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'pos_order_invoice/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#messages').html(data);
        }

    });

}

function orderdetails_post(id) {
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'orderdetails_post/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#messages').html(data);
        }

    });

}

function orderdetails_onlinepost(id) {
    var url = basicinfo.baseurl + 'orderdetails_post/' + id;
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#settings').html(data);
        }

    });

}

load_unseen_notification();


function createMargeorder(orderid, value = null) {
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'ordermanage/order/showpaymentmodal/' + orderid;
    callback = function (a) {
        $("#modal-ajaxview").html(a);
        $('#get-order-flag').val('2');
    };
    if (value == null) {

        getAjaxModal(url);
    } else {
        getAjaxModal(url, callback);
    }
}
/*all ongoingorder product as ajax*/
$(document).on('click', '#add_new_payment_type', function () {
    var gtotal = $("#grandtotal").val();
    var total = 0;
    $(".pay").each(function () {
        total += parseFloat($(this).val()) || 0;
    });
    if (total == gtotal) {
        alert("Paid amount is exceed to Total amount.");
        $("#pay-amount").text('0');
        return false;
    }
    var orderid = $('#get-order-id').val();
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'ordermanage/order/showpaymentmodal/' + orderid + '/1';
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#add_new_payment').append(data);
            var length = $(".number").length;
            $(".number:eq(" + (length - 1) + ")").val(parseFloat($("#pay-amount").text()));


        }
    });
});
$(document).on('click', '.close_div', function () {
    $(this).parent('div').remove();
    changedueamount();
});
/*show due invoice*/
$(document).on('click', '.due_print', function () {
    var id = $(this).children("option:selected").val();
    var url = $(this).attr("data-url");
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            printRawHtml(data);
        }
    });
});
$(document).on('click', '.due_mergeprint', function () {
    var id = $(this).children("option:selected").val();
    var url = $(this).attr("data-url");
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            printRawHtml(data);
        }
    });
});

function printmergeinvoice(id) {
    var id = atob(id);
    var csrf = $('#csrfhashresarvation').val();
    var url = basicinfo.baseurl + 'ordermanage/order/checkprint/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: { csrf_test_name: csrf },
        success: function (data) {
            printRawHtml(data);

        }

    });
}

function showhidecard(element) {
    var cardtype = $(element).val();
    var data = $(element).closest('div.row').next().find('div.cardarea');

    if (cardtype == 4) {
        $("#isonline").val(0);
        $(element).closest('div.row').next().find('div.cardarea').addClass("display-none");
        $("#assigncard_terminal").val('');
        $("#assignbank").val('');
        $("#assignlastdigit").val('');
    } else if (cardtype == 1) {
        $("#isonline").val(0);
        $(element).closest('div.row').next().find('div.cardarea').removeClass("display-none");
    } else {
        $("#isonline").val(1);
        $(element).closest('div.row').next().find('div.cardarea').addClass("display-none");
        $("#assigncard_terminal").val('');
        $("#assignbank").val('');
        $("#assignlastdigit").val('');
    }
}

function submitmultiplepay() {
    var thisForm = $('#paymodal-multiple-form');
    var inputval = parseFloat(0);
    var maintotalamount = $('#due-amount').text();

    $(".number").each(function () {
        var inputdata = parseFloat($(this).val());
        inputval = inputval + inputdata;

    });
    if (inputval < parseFloat(maintotalamount)) {

        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000

            };
            toastr.error("Pay full amount ", 'Error');
        }, 100);
        return false;
    }
    var formdata = new FormData(thisForm[0]);

    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/paymultiple",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            var value = $('#get-order-flag').val();
            if (value == 1) {
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success("payment taken successfully", 'Success');
                    $('#payprint_marge').modal('hide');
                    $('#modal-ajaxview').empty();
                    prevsltab.trigger("click");


                }, 100);
            } else {
                $('#payprint_marge').modal('hide');
                $('#modal-ajaxview').empty();
                if (basicinfo.printtype != 1) {
                    printRawHtml(data);
                }
                prevsltab.trigger("click");
            }

        },

    });
}

function changedueamount() {
    var inputval = parseFloat(0);
    var maintotalamount = $('#due-amount').text();

    $(".number").each(function () {
        var inputdata = parseFloat($(this).val());
        inputval = inputval + inputdata;

    });

    restamount = (parseFloat(maintotalamount)) - (parseFloat(inputval));
    var changes = restamount.toFixed(3);
    if (changes <= 0) {
        $("#change-amount").text(Math.abs(changes));
        $("#pay-amount").text(0);
    } else {
        $("#change-amount").text(0);
        $("#pay-amount").text(changes);
    }

}

function mergeorderlist() {
    var values = $('input[name="margeorder"]:checked').map(function () {
        return $(this).val();
    }).get().join(',');
    var csrf = $('#csrfhashresarvation').val();
    var dataString = 'orderid=' + values + '&csrf_test_name=' + csrf;
    $.ajax({
        url: basicinfo.baseurl + "ordermanage/order/mergemodal",
        method: "POST",
        data: dataString,
        success: function (data) {
            $("#payprint_marge").modal('show');
            $("#modal-ajaxview").html(data);
            $('#get-order-flag').val('2');
        }
    });
}

function duemergeorder(orderid, mergeid) {
    var allorderid = $("#allmerge_" + mergeid).val();
    var csrf = $('#csrfhashresarvation').val();
    var dataString = 'orderid=' + orderid + '&mergeid=' + mergeid + '&allorderid=' + allorderid + '&csrf_test_name=' + csrf;
    $.ajax({
        url: basicinfo.baseurl + "ordermanage/order/duemergemodal",
        method: "POST",
        data: dataString,
        success: function (data) {
            $("#payprint_marge").modal('show');
            $("#modal-ajaxview").html(data);
            $('#get-order-flag').val('2');
        }
    });
}

function margeorderconfirmorcancel() {

    var thisForm = $('#paymodal-multiple-form');
    var formdata = new FormData(thisForm[0]);

    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/changeMargeorder",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            $('#payprint_marge').modal('hide');
            if (basicinfo.printtype != 1) {
                printRawHtml(data);
            }
            prevsltab.trigger("click");
        },

    });
}

function duemargebill() {

    var thisForm = $('#paymodal-multiple-form');
    var formdata = new FormData(thisForm[0]);

    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/changeMargedue",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            $('#payprint_marge').modal('hide');
            if (basicinfo.printtype != 1) {
                printRawHtml(data);
            }
            prevsltab.trigger("click");
        },

    });
}

function margeorder() {
    var totaldue = 0;
    $(".marg-check").each(function () {
        if ($(this).is(":checked")) {
            var id = $(this).val();
            totaldue = parseFloat($('#due-' + id).text()) + totaldue;

        }
        $('#due-amount').text(totaldue);
        $('#totalamount_marge').text(totaldue);
        $('#paidamount_marge').val(totaldue);
    });
}

function checktable(id = null) {

    if (id != null) {
        var select = '#person-' + id;
        var valu = $(select).val();
        $('#table_member').val(valu);
        var url = 'checktablecap/' + id;
    } else {
        idd = $('#tableid').val();
        var url = 'checktablecap/' + idd;
    }
    var order_person = $('#table_member').val();
    if (order_person != "") {
        var csrf = $('#csrfhashresarvation').val();
        // Ensure order_person is a number
        var order_person = parseInt($('#order_person').val(), 10);
        if (isNaN(order_person)) order_person = 0;
        $.ajax({
            type: "GET",
            url: url,
            data: { csrf_test_name: csrf },
            success: function (data) {
                //var capacity = parseInt(data.capacity || data, 10); // handle both plain/text and JSON
                var capacity = parseInt(order_person);
                console.log('Order Person' + order_person);
                console.log('Table Capacity' + capacity);
                if (order_person > capacity) {

                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000,
                        };
                        toastr.warning('table capacity overflow', 'Warning');



                    }, 300);
                } else {
                    if (id != null) {
                        $('#tableid').val(id).trigger('change');
                        $('#table_member_multi').val(0);
                        $('#table_member_multi_person').val(0);
                        $('#table_person').val(order_person);
                        $('#tablemodal').modal('hide');
                    }

                    return false;

                }

            }

        });
    } else {
        setTimeout(function () {
            $("#table_member").focus();

            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000,

            };
            toastr.error('Please type Number of person', 'Error');
        }, 5000);


    }
}

//   function showTablemodal() {
//       var url = "showtablemodal";
//       getAjaxModal(url, false, '#table-ajaxview', '#tablemodal');

//   }

// function showTablemodal() {
//     var url = "showtablemodalpopup";
//     getAjaxModalPopUp(url, false, '#modal-ajaxviewnew', '#tablemodalNew');
// }

// function showTablemodal() {
//     window.location.href = basicinfo.baseurl + "ordermanage/order/alltables";
// }

function showTablemodal() {
    const customerName = document.querySelector('#customer_name')?.value.trim();
    const waiter = document.querySelector('#waiter')?.value.trim();

    let url = basicinfo.baseurl + "ordermanage/order/alltables";

    // Check if both fields are valid
    if (customerName || waiter && waiter !== "0") {
        url += `?cid=${encodeURIComponent(customerName)}&waiter=${encodeURIComponent(waiter)}`;
    }

    window.location.href = url;
}




function showfloor(floorid) {
    var csrf = $('#csrfhashresarvation').val();
    var geturl = 'fllorwisetable';
    var dataString = "floorid=" + floorid + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: geturl,
        data: dataString,
        success: function (data) {
            $('#floor' + floorid).html(data);
        }
    });
}

function deleterow_table(id, tableid = null) {
    var csrf = $('#csrfhashresarvation').val();
    var dataString = 'csrf_test_name=' + csrf;
    if (tableid == null) {
        var url = 'delete_table_details/' + id;
        $.ajax({
            type: "GET",
            url: url,
            data: dataString,
            success: function (data) {
                if (data == 1) {
                    $('#table-tr-' + id).remove();
                }
            }
        });
    } else {
        var url = 'delete_table_details_all/' + tableid;
        $.ajax({
            type: "GET",
            url: url,
            data: dataString,
            success: function (data) {
                if (data == 1) {
                    $('#table-tbody-' + tableid).empty();

                }
            }
        });
    }

}

function multi_table() {
    var arr = $('input[name="add_table[]"]').map(function () {
        return this.value;
    }).get();
    $('#table_member_multi').val(arr);
    var value = [];
    var order_person_t = 0;
    for (i = 0; i < arr.length; i++) {
        value[i] = $('#person-' + arr[i]).val();

        // Parse the input value to an integer and check if it’s a valid number
        let parsedValue = parseInt(value[i], 10);
        if (!isNaN(parsedValue)) { // Check if parsedValue is a valid number
            order_person_t += parsedValue;
        }
    }


    $('#table_member').val($('#person-' + arr[0]).val());
    $('#table_person').val(order_person_t);
    $('#table_member_multi_person').val(value);

    $('#tablemodal').modal('hide');
    $('#tableid').val(arr[0]).trigger('change');
}
$(document).on('change', '#update_product_name', function () {
    var tid = $(this).children("option:selected").val();
    var idvid = tid.split('-');
    var id = idvid[0];
    var vid = idvid[1];
    var csrf = $('#csrfhashresarvation').val();
    var updateid = $("#saleinvoice").val();
    var url = 'addtocartupdate_uniqe' + '/' + id + '/' + updateid;
    var dataString = 'csrf_test_name=' + csrf;
    /*check production*/
    /*please fixt cart total counting*/
    var productionsetting = $('#production_setting').val();
    if (productionsetting == 1) {

        var checkqty = 1;
        var checkvalue = checkproduction(id, vid, checkqty);

        if (checkvalue == false) {
            $('#update_product_name').html('');
            return false;
        }

    }
    /*end checking*/
    $.ajax({
        type: "GET",
        url: url,
        data: dataString,
        success: function (data) {


            var myurl = "adonsproductadd" + '/' + id;
            $.ajax({
                type: "GET",
                url: myurl,
                data: dataString,
                success: function (data) {
                    $('.addonsinfo').html(data);
                    $('#edit').modal('show');
                    var tax = $('#tvat').val();
                    var discount = $('#tdiscount').val();
                    var tgtotal = $('#tgtotal').val();
                    $('#vat').val(tax);
                    $('#calvat').text(tax);
                    var sc = $('#sc').val();
                    $('#service_charge').val(sc);
                    $('#invoice_discount').val(discount);
                    if (basicinfo.isvatinclusive == 1) {
                        $('#caltotal').text(tgtotal - tax);
                    } else {
                        $('#caltotal').text(tgtotal);
                    }
                    $('#grandtotal').val(tgtotal);
                    $('#orggrandTotal').val(tgtotal);
                    $('#orginattotal').val(tgtotal);
                    $('#update_product_name').html('');

                }
            });
        }
    });


});
$(function ($) {
    $("#customer_name").select2();
    var barcodeScannerTimer;
    var barcodeString = '';

    $('#customer_name').on("select2:open", function () {
        document.getElementsByClassName('select2-search__field')[0].onkeypress = function (evt) {
            barcodeString = barcodeString + String.fromCharCode(evt.charCode);
            clearTimeout(barcodeScannerTimer);
            barcodeScannerTimer = setTimeout(function () {
                processbarcodeGui();
            }, 300);
        }
    });

    function processbarcodeGui() {
        if (barcodeString != '') {
            var customerid = Number(barcodeString).toString();
            if (Math.floor(customerid) == customerid && $.isNumeric(customerid)) {
                $("#customer_name").select2().val(customerid).trigger('change');
            }
            $('#customer_name').val(customerid);
        } else {
            alert('barcode is invalid: ' + barcodeString);
        }

        barcodeString = '';
    }
});

/*for split order js*/
function showsplitmodal(orderid, option = null) {
    var url = basicinfo.baseurl + 'ordermanage/order/showsplitorder/' + orderid;
    callback = function (a) {
        $("#modal-ajaxview").html(a);

    };
    if (option == null) {

        getAjaxModal(url, false, '#table-ajaxview', '#tablemodal');
    } else {
        getAjaxModal(url, callback);
    }
    setTimeout(() => {
        var presentvalue = $(".splitOrderTr").find("td:eq(1)").text();
        if ($("#CurrSplitFoodQty")) {
            $("#CurrSplitFoodQty").remove();
        }
        var foodqtyhtml = `<input type="hidden" id="CurrSplitFoodQty" value="${presentvalue}" />`;
        $("#table-ajaxview").find(".modal-content").find(".modal-body").append(foodqtyhtml);
        console.log("presentvalue: " + presentvalue);
    }, 2000);

}

function showsuborder(element) {
    var val = $(element).val();
    var url = $(element).attr('data-url') + val;
    var orderid = $(element).attr('data-value');
    var csrf = $('#csrfhashresarvation').val();
    var datavalue = 'orderid=' + orderid;
    $(".splitOrderTr").find("td:eq(1)").text($("#CurrSplitFoodQty").val());
    getAjaxView(url, "show-sub-order", false, datavalue, 'post');

}

function getAjaxView(url, ajaxclass, callback = false, data = '', method = 'get') {
    var csrf = $('#csrfhashresarvation').val();
    var fulldata = data + '&csrf_test_name=' + csrf;
    $.ajax({
        url: url,
        type: method,
        data: fulldata,
        beforeSend: function (xhr) {

        },
        success: function (result) {
            if (callback) {
                callback(result);
                return;
            }
            $('#' + ajaxclass).html(result);
        },
        error: function (a) { }
    });
    return false;
}

function selectelement(element) {

    $(".split-item").each(function (index) {

        $(this).removeClass('split-selected');
    });
    $(element).toggleClass('split-selected');
}

function addintosuborder(menuid, orderid, element) {
    var presentvalue = $(element).find("td:eq(1)").text();
    var isselected = $('.split-selected').length;
    if (presentvalue != 0 && isselected == 1) {
        var suborderid = $('.split-selected').attr('data-value');
        var service_chrg = $('#service-' + suborderid).val();
        var csrf = $('#csrfhashresarvation').val();
        var datavalue = 'orderid=' + orderid + '&menuid=' + menuid + '&suborderid=' + suborderid + '&qty=' + 1 + '&service_chrg=' + service_chrg;
        var url = $(element).attr('data-url');
        var id = 'table-tbody-' + orderid + '-' + suborderid;
        getAjaxView(url, id, false, datavalue, 'post');

        var nowvalue = parseInt(presentvalue) - 1;
        $(element).find("td:eq(1)").text(nowvalue);
    }

}

function paySuborder(element) {
    var id = $(element).attr('id').replace('subpay-', '');
    var url = $(element).attr('data-url');
    var vat = $('#vat-' + id).val();
    if ($('#vat-' + id).length) {

        var service = $('#service-' + id).val();
        var total = $('#total-sub-' + id).val();
        var customerid = $('#customer-' + id).val();
        $('#tablemodal').modal('hide');
        $("#modal-ajaxview").empty();
        var data = 'sub_id=' + id + '&vat=' + vat + '&service=' + service + '&total=' + total + '&customerid=' + customerid;
        getAjaxModal(url, false, '#modal-ajaxview-split', '#payprint_split', data, 'post')
    } else {
        return false;
    }
}

function submitmultiplepaysub(subid) {
    var thisForm = $('#paymodal-multiple-form');
    var inputval = parseFloat(0);
    var maintotalamount = $('#due-amount').text();

    $(".number").each(function () {
        var inputdata = parseFloat($(this).val());
        inputval = inputval + inputdata;

    });
    if (inputval < parseFloat(maintotalamount)) {

        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000

            };
            toastr.error("Pay full amount ", 'Error');
        }, 100);
        return false;
    }
    var formdata = new FormData(thisForm[0]);
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/paymultiplsub",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            var value = $('#get-order-flag').val();

            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000

                };
                toastr.success("payment taken successfully", 'Success');
                $('#payprint_split').modal('hide');
                $('#subpay-' + subid).hide();
                $("#modal-ajaxview-split").empty();
                if (basicinfo.printtype != 1) {
                    printRawHtml(data);
                }
                prevsltab.trigger("click");

            }, 100);


        },

    });

}

function showsplit(orderid) {
    var url = basicinfo.baseurl + 'ordermanage/order/showsplitorderlist/' + orderid;
    getAjaxModal(url, false, '#modal-ajaxview-split', '#payprint_split');
}

function possubpageprint(orderid) {
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        url: basicinfo.baseurl + "ordermanage/order/posprintdirectsub/" + orderid,
        data: { csrf_test_name: csrf },
        success: function (printdata) {
            printRawHtml(printdata);
        }
    });
}
/*end split order js*/
function itemnote(rowid, notes, qty, isupdate, isgroup = null) {
    $("#foodnote").val(notes);
    $("#foodqty").val(qty);
    $("#foodcartid").val(rowid);
    $("#foodgroup").val(isgroup);
    if (isupdate == 1) {
        $("#notesmbt").text("Update Note");
        $("#notesmbt").attr("onclick", "addnotetoupdate()");
    } else {
        $("#notesmbt").text("Update Note");
        $("#notesmbt").attr("onclick", "addnotetoitem()");
    }
    $('#vieworder').modal('show');
}

function addnotetoitem() {
    var rowid = $("#foodcartid").val();
    var note = $("#foodnote").val();
    var foodqty = $("#foodqty").val();
    var csrf = $('#csrfhashresarvation').val();
    var geturl = basicinfo.baseurl + 'ordermanage/order/additemnote';
    var dataString = "foodnote=" + note + '&rowid=' + rowid + '&qty=' + foodqty + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: geturl,
        data: dataString,
        success: function (data) {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success("Note Added Successfully", 'Success');
                $('#addfoodlist').html(data);
                // $('#sideMfContainer').html($("#modifierContent").html());
                // openNav();
                //   $('#sideMfContainer').html($("#modifierContent").html());
                $('#vieworder').modal('hide');
            }, 100);

        }
    });
}

function addnotetoupdate() {
    var rowid = $("#foodcartid").val();
    var note = $("#foodnote").val();
    var orderid = $("#foodqty").val();
    var group = $("#foodgroup").val();
    var csrf = $('#csrfhashresarvation').val();
    var geturl = basicinfo.baseurl + 'ordermanage/order/addnotetoupdate';
    var dataString = "foodnote=" + note + '&rowid=' + rowid + '&orderid=' + orderid + '&group=' + group + '&csrf_test_name=' + csrf;
    $.ajax({
        type: "POST",
        url: geturl,
        data: dataString,
        success: function (data) {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success("Note Added Successfully", 'Success');
                $('#updatefoodlist').html(data);
                $('#vieworder').modal('hide');
            }, 100);

        }
    });
}

function opencashregister() {
    var form = $('#cashopenfrm')[0];
    var formdata = new FormData(form);
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/addcashregister",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data == 1) {
                $("#openregister").modal('hide');
            } else {
                alert("Something Wrong!!! .Please Select Counter Number!!");
            }
        }

    });
}

function closeopenresister() {
    var closeurl = basicinfo.baseurl + "ordermanage/order/cashregisterclose";
    var csrf = $('#csrfhashresarvation').val();
    $.ajax({
        type: "GET",
        async: false,
        url: closeurl,
        data: { csrf_test_name: csrf },
        success: function (data) {
            $('#openclosecash').html(data);
            var htitle = $("#rpth").text();
            var counter = $("#pcounter").val();
            var puser = $("#puser").val();
            var fullheader = "Cash Register In" + htitle + "\n" + "Counter:" + counter + "\n" + puser;
            $("#openregister").modal('show');
            $('#RoleTbl').DataTable({
                responsive: true,
                paging: true,
                dom: 'Bfrtip',
                "lengthMenu": [
                    [25, 50, 100, 150, 200, 500, -1],
                    [25, 50, 100, 150, 200, 500, "All"]
                ],
                buttons: [
                    { extend: 'csv', title: 'Open-Close Cash Register', className: 'btn-sm', footer: true, header: true, orientation: 'landscape', messageTop: fullheader },
                    { extend: 'excel', title: 'Open-Close Cash Register', className: 'btn-sm', title: 'exportTitle', messageTop: fullheader, footer: true, header: true, orientation: 'landscape' },
                    {
                        extend: 'pdfHtml5',
                        title: 'Open-Close Cash Register',
                        className: 'btn-sm',
                        footer: true,
                        header: true,
                        orientation: 'landscape',
                        messageTop: fullheader,
                        customize: function (doc) {
                            doc.defaultStyle.alignment = 'center';
                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        }
                    }
                ],
                "searching": true,
                "processing": true,

            });
        }
    });

}

function closecashregister() {
    var form = $('#cashopenfrm')[0];
    var formdata = new FormData(form);
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/closecashregister",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data == 1) {
                $("#openregister").modal('hide');
                window.location.href = basicinfo.baseurl + "dashboard/home";
            } else {
                alert("Something Wrong On Cash Closing!!!");
            }
        }

    });
}
function closeandprintcashregister() {
    var form = $('#cashopenfrm')[0];
    var formdata = new FormData(form);
    $.ajax({
        type: "POST",
        url: basicinfo.baseurl + "ordermanage/order/closecashregister",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data == 0) {
                alert("Something Wrong On Cash Closing!!!");
            } else {
                $("#openregister").modal('hide');
                window.location.href = basicinfo.baseurl + "dashboard/home?status=done";
            }
        }

    });
}

$('.lang_box').on('click', function (event) {
    var submenu = $(this).next('.lang_options');
    submenu.slideToggle(400, function () { });
});


$(window).on('load', function () {
    // Function to get query parameters
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Get query parameters
    const tid = getQueryParam('tid');
    const tmmulti = getQueryParam('tmmulti');
    const tmmultipr = getQueryParam('tmmultipr');
    const ps = getQueryParam('ps');
    const custid = getQueryParam('cid');
    const waiterid = getQueryParam('waiter');

    //Get Waiter Session
    const waiterSession = $('#waiter_session').val();


    // Set Select2 Table Id values
    // Destroy Select2 first (to avoid conflicts)
    if ($.fn.select2 && $('#tableid').data('select2')) {
        $('#tableid').select2('destroy');
    }

    // Reinitialize Select2
    $("#tableid").select2();

    setTimeout(function () {
        $('#tableid').val(tid).trigger('change.select2'); // Set value after a slight delay
        $('#tableid_sha').val(tid);
        //console.log("Table ID Updated to:", tid);
    }, 500);


    // Set values if available
    //if (tid !== null) $('#tableid').val(tid).trigger('change');
    if (tmmulti !== null) $('#table_member_multi').val(tmmulti);
    if (tmmultipr !== null) $('#table_member_multi_person').val(tmmultipr);
    if (ps !== null || ps !== 'undefined' || ps !== '') {
        $('#table_person').attr('value', ps); // Set button value
        $('#table_person').val(ps);
        $('#table_member').val(parseInt(ps));
    }
    if (custid !== null || custid !== 'undefined' || custid != '') {
        $("#customer_name").select2().val(custid).trigger('change');
    }
    if (waiterid !== null || waiterid !== 'undefined' || waiterid != '') {
        if (waiterSession != '' && waiterSession != null && waiterSession != undefined) {
            $("#waiter").select2().val(waiterSession).trigger('change');
        } else {
            $("#waiter").select2().val(waiterid).trigger('change');
        }
        //$("#waiter").select2().val(waiterid).trigger('change');
    }
});

// Cron for Waiter

$(document).ready(function () {
    // Audio element for notification sound
    var myAudio = document.getElementById("myAudio") || new Audio();
    var intervalc = 0;

    // Function to play notification sound
    function playNotificationSound(filename) {
        myAudio.src = filename;
        myAudio.play().catch(function (error) {
            console.error('Error playing sound:', error);
        });
    }

    // Function to check for unseen kitchen orders
    function load_unseen_kitchen_orders(view = '') {
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            url: baseurl + "ordermanage/order/cronongoingorderconfirmbyKitchen",
            method: 'POST',
            data: { csrf_test_name: csrf, view: view },
            dataType: 'json',
            success: function (data) {
                console.log('Response:', data); // Debugging
                if (data.status === 'success' && data.unseen_count > 0) {
                    // Update notification count
                    $('.kitchen-order-count').html(data.unseen_count);

                    // Play sound if enabled
                    if (data.soundenable == 1) {
                        playNotificationSound(data.notifysound);
                    }

                    // Show modal if not already open
                    if (!$('#kitchenOrderModal').is(':visible')) {
                        $('body').append(data.modal_content);
                        $('#kitchenOrderModal').modal('show');
                        $('#kitchenOrderModal').on('hidden.bs.modal', function () {
                            $(this).remove();
                            // Pause sound
                            if (data.soundenable == 1) {
                                myAudio.pause();
                            }
                        });
                    }

                    // Update CSRF token
                    $('#csrfhashresarvation').val(data.csrf_hash);
                } else {
                    // No orders, update count and pause sound
                    $('.kitchen-order-count').html(data.unseen_count);
                    if (data.soundenable == 1) {
                        myAudio.pause();
                    }
                    // Update CSRF token
                    $('#csrfhashresarvation').val(data.csrf_hash);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error checking kitchen orders:', error);
            }
        });
    }

    // Handle confirm button click
    $(document).on('click', '.confirm-order', function () {
        var orderId = $(this).data('order-id');
        var csrf = $('#csrfhashresarvation').val();
        $.ajax({
            url: baseurl + "ordermanage/order/confirm_order_notification",
            method: 'POST',
            data: { order_id: orderId, csrf_test_name: csrf },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#kitchenOrderModal').modal('hide');

                    // Set flag to show modal after reload
                    sessionStorage.setItem('showNextKitchenModal', 'true');

                    // Reload page
                    // Force top-level redirect if inside iframe or nested context
                    window.top.location.href = baseurl + "ordermanage/order/pos_invoice";

                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert('Error confirming order');
            }
        });
    });

    // Function to refresh ongoing orders
    function loadOngoingOrders() {
        $.ajax({
            url: baseurl + "ordermanage/order/getongoingorder",
            method: 'GET',
            success: function (data) {
                $('#ongoingorder').html(data);
            }
        });
    }

    // On reload: if modal should be shown
    if (sessionStorage.getItem('showNextKitchenModal') === 'true') {
        sessionStorage.removeItem('showNextKitchenModal');
        // Delay to ensure page is fully loaded before AJAX call
        setTimeout(function () {
            load_unseen_kitchen_orders(); // This will trigger next modal if any
        }, 500);
    }

    // Start polling
    setInterval(function () {
        load_unseen_kitchen_orders(intervalc);
    }, 5000);
});


//Load Expanded Screen
$(document).ready(function () {
    function launchFullscreen() {
    const docEl = document.documentElement;

    if (docEl.requestFullscreen) {
      docEl.requestFullscreen();
    } else if (docEl.webkitRequestFullscreen) {
      docEl.webkitRequestFullscreen();
    } else if (docEl.mozRequestFullScreen) {
      docEl.mozRequestFullScreen();
    } else if (docEl.msRequestFullscreen) {
      docEl.msRequestFullscreen();
    }

    $('#fullscreen i').addClass('fullscreen-active');
    document.removeEventListener('click', launchFullscreen);
  }

  // Wait for first click anywhere on the page
  document.addEventListener('click', launchFullscreen);
     
});

/**
 * Split by Amount
 */
function showsplitmodalbyamount(orderid, option = null) {
    var url = basicinfo.baseurl + 'ordermanage/order/showsplitbyamount/' + orderid;
    var callback = function(response) {
        $("#modal-ajaxview").html(response);
    };
    
    if (option == null) {
        getAjaxModal(url, false, '#table-ajaxview', '#tablemodal');
    } else {
        getAjaxModal(url, callback);
    }
}

function showSplitByAmount(element) {
    var val = $(element).val();
    var url = $(element).attr('data-url') + val;
    var orderid = $(element).attr('data-value');
    var csrf = $('#csrfhashresarvation').val();
    var datavalue = 'orderid=' + orderid + '&csrf_test_name=' + csrf;
    getAjaxView(url, "show-split-amounts", false, datavalue, 'post');
}

function selectAmountSplit(element) {
    $(".split-amount").each(function() {
        $(this).removeClass('split-selected');
    });
    $(element).toggleClass('split-selected');
}

function paySplitByAmount(element) {
    var id = $(element).attr('id').replace('splitpay-', '');
    var url = $(element).attr('data-url');
    var vat = $('#vat-split-' + id).val();
    var service = $('#service-split-' + id).val();
    var total = $('#total-split-' + id).val();
    var customerid = $('#customer-' + id).val();
    
    if ($('#total-split-' + id).length) {
        $('#tablemodal').modal('hide');
        $("#modal-ajaxview").empty();
        var data = 'sub_id=' + id + '&vat=' + vat + '&service=' + service + '&total=' + total + '&customerid=' + customerid + '&csrf_test_name=' + $('#csrfhashresarvation').val();
        getAjaxModal(url, false, '#modal-ajaxview-split', '#payprint_split', data, 'post');
    }
}