  // JavaScript Document
  var editpos=0;
  $(document).ready(function() {
      "use strict";
 	
      if (basicinfo.segment4 != null) {
          swal({
                  title: lang.ord_uodate_success,
                  text: lang.do_print_token,
                  type: "success",
                  showCancelButton: true,
                  confirmButtonColor: "#28a745",
                  confirmButtonText: lang.yes,
                  cancelButtonText: lang.no,
                  closeOnConfirm: false,
                  closeOnCancel: true
              },
              function(isConfirm) {
                  if (isConfirm) {
                      window.location.href = basicinfo.baseurl + "ordermanage/order/postokengenerate/" + basicinfo.segment4 + "/1";
                  } else {
                      window.location.href = basicinfo.baseurl + "ordermanage/order/pos_invoice";
                  }
              });
      }
  });


  function load_unseen_notification(view = '') {
      var csrf = $('#csrfhashresarvation').val();
    //   var myAudio = document.getElementById("myAudio");
    //   var soundenable = possetting.soundenable;
      $.ajax({
          url: "notification",
          method: "POST",
          data: { csrf_test_name: csrf, view: view },
          dataType: "json",
          success: function(data) {
              if (data.unseen_notification > 0) {
                  $('.count').html(data.unseen_notification);
                //   if (soundenable == 1) {
                //       myAudio.play();
                //   }
              } else {
                //   if (soundenable == 1) {
                //       myAudio.pause();
                //   }
                  $('.count').html(data.unseen_notification);
              }

          }
      });
  }
  var intervalc = 0;
  setInterval(function() {
      load_unseen_notification(intervalc);
  }, 30000);

  function load_unseen_notificationqr(view = '') {
      var csrf = $('#csrfhashresarvation').val();
    //   var myAudio = document.getElementById("myAudio");
    //   var soundenable = possetting.soundenable;
      $.ajax({
          url: basicinfo.baseurl + "ordermanage/order/notificationqr",
          method: "POST",
          data: { csrf_test_name: csrf, view: view },
          dataType: "json",
          success: function(data) {
              if (data.unseen_notificationqr > 0) {
                  $('.count2').html(data.unseen_notificationqr);
                //   if (soundenable == 1) {
                //       myAudio.play();
                //   }
              } else {
                //   if (soundenable == 1) {
                //       myAudio.pause();
                //   }
                  $('.count2').html(data.unseen_notification);
              }
          }
      });
  }
  setInterval(function() {
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
          success: function(data) {
              $('.orddetailspop').html(data);
              $('#orderdetailsp').modal('show');
          }
      });

  }

  load_unseen_notification();



  function checktable(id = null) {
       
      if (id != null) {
          var select = '#person-' + id;
          var valu = $(select).val();
          var url = 'checktablecap/' + id;
      } else {
          idd = $('#tableid').val();
          var url = 'checktablecap/' + idd;
      }
      var order_person = valu;

      if (order_person != "") {
          var csrf = $('#csrfhashresarvation').val();
          $.ajax({
              type: "GET",
              url: url,
              data: { csrf_test_name: csrf },
              success: function(data) {
                    console.log('Order Person'+ typeof(order_person));
                    console.log('Data'+ typeof(data));
                  if (parseInt(order_person) > parseInt(data)) {
                    console.log('High capacity');
                    alert('Table capacity overflow');
                    $('.add_input').css('border', '1px solid red'); // Fixed color syntax
                
                    // This part is unnecessary because `alert()` is not a condition.  
                    // If you want to reset the border after clicking OK on the alert, use `setTimeout`.
                    setTimeout(function () {
                        $('.add_input').css('border', '1px solid #dcdbd9');
                    }, 6000); // Reset after 3 seconds (adjust as needed)

                    //   setTimeout(function() {

                    //       toastr.options = {
                    //           closeButton: true,
                    //           progressBar: true,
                    //           showMethod: 'slideDown',
                    //           timeOut: 4000,

                    //       };
                    //       toastr.warning('table capacity overflow', 'Warning');



                    //   }, 300);
                  } else {
                        //   if (id != null) {
                        //     console.log('it goes in else with id'+ data);
                        //       $('#tableid').val(id).trigger('change');
                        //       $('#table_member_multi').val(0);
                        //       $('#table_member_multi_person').val(0);
                        //       $('#table_person').val(order_person);
                        //       $('#tablebookviewmodal').modal('hide');
                        //   }
                        console.log('it goes in else with id'+ data);
                        $('#tableid').val(id).trigger('change');
                        $('#table_member_multi').val(0);
                        $('#table_member_multi_person').val(0);
                        $('#table_person').val(order_person);
                        $('#tablebookviewmodal').modal('hide');
                        /**
                         * In below line ps is the number of person and tid is the table id
                         * tmmulti is the table_member_multi and table_member_multi_person is the number of person
                         */
                        window.location.href = basicinfo.baseurl + "ordermanage/order/pos_invoice?ps=" + order_person + "&tid=" + id + "&tmmulti=0&tmmultipr=0";

                      return false;

                  }

              }

          });
      } else {

        //   setTimeout(function() {
        //       $("#table_member").focus();

        //       toastr.options = {
        //           closeButton: true,
        //           progressBar: true,
        //           showMethod: 'slideDown',
        //           timeOut: 4000,

        //       };
        //       toastr.error('Please type Number of person', 'Error');



        //   }, 300);


      }
  }

  function showTablemodal() {
      var url = "showtablemodal";
      getAjaxModal(url, false, '#table-ajaxview', '#tablebookviewmodal');

  }

  

  function showfloor(floorid) {
      var csrf = $('#csrfhashresarvation').val();
      var geturl = 'fllorwisetable';
      var dataString = "floorid=" + floorid + '&csrf_test_name=' + csrf;
      $.ajax({
          type: "POST",
          url: geturl,
          data: dataString,
          success: function(data) {
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
              success: function(data) {
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
              success: function(data) {
                  if (data == 1) {
                      $('#table-tbody-' + tableid).empty();

                  }
              }
          });
      }

  }

  function multi_table() {
      var arr = $('input[name="add_table[]"]').map(function() {
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

      $('#tablebookviewmodal').modal('hide');
      $('#tableid').val(arr[0]).trigger('change');
  }
  $(document).on('change', '#update_product_name', function() {
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
          success: function(data) {


              var myurl = "adonsproductadd" + '/' + id;
              $.ajax({
                  type: "GET",
                  url: myurl,
                  data: dataString,
                  success: function(data) {
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
                      if(basicinfo.isvatinclusive==1){
						$('#caltotal').text(tgtotal-tax);  
					  }else{
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
  
  
  function getAjaxView(url, ajaxclass, callback = false, data = '', method = 'get') {
      var csrf = $('#csrfhashresarvation').val();
      var fulldata = data + '&csrf_test_name=' + csrf;
      $.ajax({
          url: url,
          type: method,
          data: fulldata,
          beforeSend: function(xhr) {

          },
          success: function(result) {
              if (callback) {
                  callback(result);
                  return;
              }
              $('#' + ajaxclass).html(result);
          },
          error: function(a) {}
      });
      return false;
  }

  function selectelement(element) {

      $(".split-item").each(function(index) {

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
          $('#tablebookviewmodal').modal('hide');
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

      $(".number").each(function() {
          var inputdata = parseFloat($(this).val());
          inputval = inputval + inputdata;

      });
      if (inputval < parseFloat(maintotalamount)) {

          setTimeout(function() {
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
          success: function(data) {
              var value = $('#get-order-flag').val();

              setTimeout(function() {
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