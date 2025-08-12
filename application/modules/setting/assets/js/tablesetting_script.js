$(function () {
    "use strict";

    $(".draggable").css("position", "relative");

    $(".draggable").each(function () {
        var $el = $(this);

        // Make only the image inside rotatable
        $el.find(".rotatable-content").rotatable({
            handle: $('<div class="ui-rotatable-handle" style="display:none;"></div>'),
            wheelRotate: false,
            stop: function () {
                saveTablePosition($el);
            }
        });

        // Make the whole block draggable
        $el.draggable({
            cursor: "move",
            stop: function () {
                saveTablePosition($el);
            }
        });

        // On click — show only this table's handle
        $el.on("click", function (e) {
            e.stopPropagation();
            $(".ui-rotatable-handle").hide();
            $(this).find(".ui-rotatable-handle").show();
        });

        // On double-click the handle — hide it
        $el.on("dblclick", ".ui-rotatable-handle", function (e) {
            e.stopPropagation();
            $(this).hide();
        });
    });

    // Hide handles when clicking outside
    $(document).on("click", function () {
        $(".ui-rotatable-handle").hide();
    });

    function saveTablePosition($el) {
        var id = $el.attr('id');
        var style = $el.attr('style');
        var csrf = $('#csrfhashresarvation').val();
        var dataString = "ids=" + id + "&style=" + style + "&csrf_test_name=" + csrf;

        $.ajax({
            type: "POST",
            url: basicinfo.baseurl + 'setting/restauranttable/updatesetting',
            data: dataString
        });
    }
});
