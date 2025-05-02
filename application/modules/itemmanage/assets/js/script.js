//all js 
$(document).ready(function(){
	  "use strict";
	//   $('#offeractive').hide();
    //     $('#isoffer').click(function(){
    //         if($(this).prop("checked") == true){
    //            $("#offeractive").show();
    //         }
    //         else if($(this).prop("checked") == false){
    //             $("#offeractive").hide();
    //         }
    //     });
		// Function to toggle offer section visibility
		// function toggleOfferSection(checkbox) {
		// 	//const id = $(checkbox).attr('id').split('_')[1];
		// 	const idAttr = $(checkbox).attr('id');
		// 	if (idAttr && idAttr.includes('_')) {
		// 		const id = idAttr.split('_')[1];
		// 		// use `id` safely here
		// 	} else {
		// 		console.warn('Invalid or missing ID on checkbox:', checkbox);
		// 	}

		// 	const offerDiv = $('#offeractive_' + id);
		// 	const offerInput = $('#offer_' + id);
		// 	if ($(checkbox).prop("checked")) {
		// 		offerInput.val('1');
		// 		offerDiv.show();
		// 	} else {
		// 		offerInput.val('0');
		// 		offerDiv.hide();
		// 	}
		// }
		function toggleOfferSection(checkbox) {
			const idAttr = $(checkbox).attr('id');
			let id = null;
		
			if (idAttr && idAttr.includes('_')) {
				id = idAttr.split('_')[1];
			} else {
				//console.warn('Invalid or missing ID on checkbox:', checkbox);
				return; // Exit early if ID is invalid
			}
		
			const offerDiv = $('#offeractive_' + id);
			const offerInput = $('#offer_' + id);
		
			if ($(checkbox).prop("checked")) {
				offerInput.val('1');
				offerDiv.show();
			} else {
				offerInput.val('0');
				offerDiv.hide();
			}
		}
		

		// Delegate the click event to dynamically added checkboxes
		$(document).on('click', "[id^='isoffer_']", function () {
			toggleOfferSection(this);
		});
		 // Initial checkbox toggle (for the first one)
		 toggleOfferSection($('#isoffer_1'));
    });

"use strict";
function adonseditinfo(id){
	   var myurl =baseurl+'itemmanage/menu_addons/assignaddonsupdateinfo/'+id;
	   var csrf = $('#csrfhashresarvation').val();
	    var dataString = "unitid="+id+"&csrf_test_name="+csrf;
	 
		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			 $('#edit').modal('show');
		 } 
	});
	}

function editvarient(id){
	   var myurl =baseurl+'itemmanage/item_food/updateintfrm/'+id;
	   var csrf = $('#csrfhashresarvation').val();
	    var dataString = "varient="+id+"&csrf_test_name="+csrf;

		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			 $('#edit').modal('show');
		 } 
	});
	}
function editavailable(id){
	   var myurl =baseurl+'itemmanage/item_food/updateavailfrm/'+id;
	   var csrf = $('#csrfhashresarvation').val();
	    var dataString = "varient="+id+"&csrf_test_name="+csrf;

		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			 $('.timepicker2').timepicker({
				timeFormat: 'HH:mm:ss',
				stepMinute: 5,
				stepSecond: 15
			});
			 $('#edit').modal('show');
		 } 
	});
	}

// Assign Menu to Modifier Items
// function addapplyitems(id){
// 	var myurl =baseurl+'itemmanage/menu_addons/assignaddonsupdateinfo/'+id;
// 	var csrf = $('#csrfhashresarvation').val();
// 	 var dataString = "unitid="+id+"&csrf_test_name="+csrf;
  
// 	  $.ajax({
// 	  type: "GET",
// 	  url: myurl,
// 	  data: dataString,
// 	  success: function(data) {
// 		  $('.editinfo').html(data);
// 		  $('#edit').modal('show');
// 	  } 
//  });
//  }

 // Modal pop

 function addapplyitems(id) {
    var myurl =baseurl+'itemmanage/menu_addons/assignaddonmodifieritems/'+id;
	   var csrf = $('#csrfhashresarvation').val();
	    var dataString = "unitid="+id+"&csrf_test_name="+csrf;
	 
		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.setitemsinfo').html(data);
			 $('#assignmenuitems').modal('show');
		 } 
	});
}


