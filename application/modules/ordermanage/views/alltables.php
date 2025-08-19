<div class="container-fluid pos-table-container">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <a href="<?php echo $this->input->server('HTTP_REFERER') ?: 'javascript:history.back()'; ?>" class="btn btn-primary btn-large" style="padding:20px 40px; font-size:2rem;">Back To POS Screen</a>
        </div>
        <?php 
        foreach ($tableinfo as $table) {
            $availableSeats = $table['person_capicity'] - $table['sum'];
            $isReserved = false;

            // Check if table is reserved
            if (isset($reservations) && !empty($reservations)) {
                foreach ($reservations as $reservation) {
                    if ($reservation->tableid == $table['tablename']) {
                        $isReserved = true;
                        break;
                    }
                }
            }

            // Determine button class based on status
            $buttonClass = 'btn-available'; // Default: Available (Green)
            if ($isReserved || $availableSeats < $table['person_capicity']) {
                $buttonClass = 'btn-occupied'; // Booked or Reserved (Red)
            }
            // Check for payment status (assumed field in $table)
            if (isset($table['cleaning_table']) && $table['cleaning_table'] == 1) {
                $buttonClass = 'btn-paid'; // Paid (Yellow)
            }
        ?>
        <div class="col-6 col-sm-3 col-md-3 col-lg-2 mb-3">
            <a href="javascript:void(0);" onclick="showCleaningTableDetails(<?php echo (string)$table['tableid']; ?>)" class="table-btn <?php echo $buttonClass; ?>">
                <span class="table-name">T- <?php echo $table['tablename']; ?></span>
            </a>
            <?php if ($isReserved) { ?>
                <div class="reserve-indicator" onclick="showsreservationdetails(<?php echo $table['tableid']; ?>)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Modals and Scripts -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/posordernew.css'); ?>">
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/postop.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/tablesetting.js'); ?>" type="text/javascript"></script>
<!-- SweetAlert v2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<audio id="myAudio" src="<?php echo base_url() ?><?php echo $soundsetting->nofitysound; ?>" preload="auto" class="display-none"></audio>

<div id="tablebookviewmodal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-inner" id="tablebookview"></div>
</div>

<div id="tablereservationviewmodal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-inner" id="tablereservationview"></div>
</div>

<script>
    var basicinfo = {
       baseurl: "<?php echo base_url(); ?>"
   };
function showstabledetails(tableId) {
    console.log('Table ID: ' + tableId); // For debugging
    var url = basicinfo.baseurl + 'ordermanage/order/showtablemodalnew/' + tableId;
    getAjaxModalNew(url, false, '#tablebookview', '#tablebookviewmodal', '', 'GET');
}

function showsreservationdetails(tableId) {
    var url = basicinfo.baseurl + 'ordermanage/order/showreservationmodalnew/' + tableId;
    getReservationAjaxModal(url, false, '#tablereservationview', '#tablereservationviewmodal', '', 'GET');
}

function showCleaningTableDetails(tableId) {
    var $tableBtn = $('a.table-btn').filter(function () {
        return $(this).attr("onclick") && $(this).attr("onclick").includes("(" + tableId + ")");
    });

    if ($tableBtn.length === 0) {
        console.error("Table button not found for tableId:", tableId);
        return;
    }

    var csrf = $('#csrfhashresarvation').val();

    // Check if table is in cleaning state (btn-paid means cleaning in your logic)
    if ($tableBtn.hasClass('btn-paid')) {
        Swal.fire({
            title: 'Confirm Action',
            text: 'Do you want to mark this table as cleaned?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '✅ Yes',
            cancelButtonText: '❌ No',
            customClass: {
                popup: 'pos-swal-popup',
                confirmButton: 'pos-swal-confirm',
                cancelButton: 'pos-swal-cancel'
            },
            buttonsStyling: false // disable default styling so our CSS works
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: basicinfo.baseurl + "ordermanage/order/mark_table_clean/" + tableId,
                    type: "GET",
                    data: { csrf_test_name: csrf },
                    dataType: "json",
                    success: function (res) {
                        if (res.status === "success") {
                            // Update DOM classes & maybe text/icon
                            $tableBtn.removeClass("btn-paid").addClass("btn-available");
                            //$tableBtn.text("Available"); 
                            Swal.fire("Success!", "Table is now available.", "success");
                        } else {
                            Swal.fire("Error!", res.message || "Could not update table.", "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        Swal.fire("Error!", "Server error occurred.", "error");
                    }
                });
            }
        });
    } else {
        // Default behavior (open modal if not in cleaning state)
        var url = basicinfo.baseurl + 'ordermanage/order/showtablemodalnew/' + tableId;
        getAjaxModalNew(url, false, '#tablebookview', '#tablebookviewmodal', '', 'GET');
    }
}


</script>

<style>
/* Make popup itself larger */
.pos-swal-popup {
    font-size: 1.5rem !important;
    padding: 2rem !important;
}

/* Big YES button */
.pos-swal-confirm {
    background-color: #28a745 !important; /* Green */
    color: white !important;
    font-size: 1.5rem !important;
    padding: 1.2rem 3rem !important;
    border-radius: 10px !important;
    margin: 0 1rem;
}

/* Big NO button */
.pos-swal-cancel {
    background-color: #dc3545 !important; /* Red */
    color: white !important;
    font-size: 1.5rem !important;
    padding: 1.2rem 3rem !important;
    border-radius: 10px !important;
    margin: 0 1rem;
}

/* POS Table Container */
.pos-table-container {
    padding: 20px;
    background-color: #f8f9fa;
    min-height: 100vh;
}

/* Table Button Styles */
.table-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80%;
    height: 80px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    text-align: center;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s;
    position: relative;
}

.table-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Button States */
.btn-available {
    background-color: #28a745; /* Green */
}

.btn-occupied {
    background-color: #dc3545; /* Red */
}

.btn-paid {
    background-color: #ffc107; /* Yellow */
}

/* Table Name */
.table-name {
    font-size: 20px;
    font-weight: bold;
}

/* Reservation Indicator */
.reserve-indicator {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .table-btn {
        height: 80px;
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .table-btn {
        height: 60px;
        font-size: 14px;
    }
}
</style>