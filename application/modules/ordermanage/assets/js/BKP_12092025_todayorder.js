$(document).ready(function () {
    "use strict";
    $('#onprocessing').DataTable({ 
        responsive: true, 
        paging: true,
        "language": {
            "sProcessing":     lang.Processingod,
            "sSearch":         lang.search,
            "sLengthMenu":     lang.sLengthMenu,
            "sInfo":           lang.sInfo,
            "sInfoEmpty":      lang.sInfoEmpty,
            "sInfoFiltered":   lang.sInfoFiltered,
            "sInfoPostFix":    "",
            "sLoadingRecords": lang.sLoadingRecords,
            "sZeroRecords":    lang.sZeroRecords,
            "sEmptyTable":     lang.sEmptyTable,
            "oPaginate": {
                "sFirst":      lang.sFirst,
                "sPrevious":   lang.sPrevious,
                "sNext":       lang.sNext,
                "sLast":       lang.sLast
            },
            "oAria": {
                "sSortAscending":  ":"+lang.sSortAscending+'"',
                "sSortDescending": ":"+lang.sSortDescending+'"'
            },
            "select": {
                "rows": {
                    "_": lang._sign,
                    "0": lang._0sign,
                    "1": lang._1sign
                }  
            },
            buttons: {
                copy: lang.copy,
                csv: lang.csv,
                excel: lang.excel,
                pdf: lang.pdf,
                print: lang.print,
                colvis: lang.colvis
            }
        },
        dom: 'Bfrtip', 
        "lengthMenu": [[ 25, 50, 100, 150, 200, 500, -1], [ 25, 50, 100, 150, 200, 500, "All"]], 
        buttons: [  
            {extend: 'copy', className: 'btn-sm',footer: true}, 
            {extend: 'csv', title: 'ExampleFile', className: 'btn-sm',footer: true}, 
            {extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle',footer: true}, 
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm',footer: true}, 
            {extend: 'print', className: 'btn-sm',footer: true},
            {extend: 'colvis', className: 'btn-sm',footer: true}  
        ],
        "searching": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: basicinfo.baseurl+"ordermanage/order/todayallorder",
            type: "post",
            "data": function ( data ) {
                data.csrf_test_name = $('#csrfhashresarvation').val();
            }
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            total = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var pageTotal = pageTotal.toFixed(2); 
            var total = total.toFixed(2); 
            $( api.column( 7 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }
    });

    // Function to show split invoice modal
    window.showSplitInvoice = function(order_id) {
        $.ajax({
            url: basicinfo.baseurl + "ordermanage/order/getsplitorder",
            method: "POST",
            data: {
                order_id: order_id,
                csrf_test_name: $('#csrfhashresarvation').val()
            },
            dataType: "json",
            success: function(data) {
                var html = '';
                $.each(data, function(index, split) {
                    html += '<div class="card mb-3">';
                    html += '<div class="card-header">Split Invoice #' + split.invoice_no + ' (' + split.split_type + ')</div>';
                    html += '<div class="card-body">';
                    html += '<p><strong>Table:</strong> ' + split.table_name + '</p>';
                    html += '<p><strong>Customer:</strong> ' + split.customer_name + '</p>';
                    html += '<p><strong>VAT:</strong> ' + split.vat + '</p>';
                    html += '<p><strong>Discount:</strong> ' + split.discount + '</p>';
                    html += '<p><strong>Service Charge:</strong> ' + split.s_charge + '</p>';
                    html += '<p><strong>Total:</strong> ' + split.total_price + '</p>';
                    html += '<p><strong>Status:</strong> ' + split.status + '</p>';
                    if (split.items.length > 0) {
                        html += '<h6>Items:</h6><ul>';
                        $.each(split.items, function(i, item) {
                            html += '<li>' + item.name + ' (Qty: ' + item.qty + ', Price: ' + item.price + ')</li>';
                        });
                        html += '</ul>';
                    }
                    html += '<button class="btn btn-success btn-sm print-split-invoice" data-subid="' + split.sub_id + '">Print Split Invoice</button>';
                    html += '</div></div>';
                });
                $('#splitInvoiceModal .modal-body').html(html);
                $('#splitInvoiceModal').modal('show');
            },
            error: function() {
                alert('Error fetching split order details');
            }
        });
    };

    // Handle print split invoice
    $(document).on('click', '.print-split-invoice', function() {
        var sub_id = $(this).data('subid');
        var url = basicinfo.baseurl + "ordermanage/order/printsplitinvoice/" + sub_id;
        var win = window.open(url, '_blank');
        if (win) {
            win.focus();
        } else {
            alert('Please allow popups for this website');
        }
    });
});