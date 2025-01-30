 "use strict";
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
	$("#bigurl").val(output.src);
  };

  //Default BOM enable
  $(document).ready(function(){
    // Set default checked state
    //$('#is_bom').prop('checked', true); // Set checkbox as checked by default
  
    // Trigger the change event to set the hidden field value immediately
    const isChecked = $('#is_bom_check').is(':checked');
    const value = isChecked ? 1 : 0;
    $('input[name="is_bom"][type="hidden"]').val(isChecked ? 1 : 0); // Set hidden field value based on checkbox state
  
    // Listen for any changes to the checkbox
    $('#is_bom_check').on('change', function() {
      const isChecked = $(this).is(':checked');
      const value = isChecked ? 1 : 0;
  
      // Update the hidden field based on checkbox state
      $('input[name="is_bom"][type="hidden"]').val(isChecked ? 1 : 0);
  
      // Log the current checkbox state for debugging
      console.log('Checkbox Value Changed:', value);
    });
  });
  