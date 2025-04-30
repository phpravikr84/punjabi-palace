<?php
// Get today's date
$today = date('Y-m-d');

// Prepare Days Order
$days_of_week = [
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    7 => 'Sunday',
];

// For date display on tabs (Monday to Sunday of current week)
$week_dates = [];
$start_of_week = strtotime('monday this week');
foreach ($days_of_week as $id => $day) {
    $week_dates[$id] = date('d M', strtotime("+".($id-1)." day", $start_of_week));
}
?>

<div class="row">
           
    <div class="col-md-12">
        <h2 class="mb-4 text-center">Online Reservation Times Weekly Calendar</h2>
        <a href="<?= site_url('reservation/reservation/index'); ?>" class="btn btn-primary btn-sm" style="margin-top: 10px; margin-bottom: 10px; float: right;">
        Back to Reservation List
        </a>
    </div>
  

    <!-- Tabs for Days -->
    <ul class="nav nav-tabs mb-4" id="dayTab" role="tablist">
        <?php $i = 0; foreach ($days_of_week as $day_id => $day_name): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo ($i == 0) ? 'active' : ''; ?>" id="tab-<?php echo $day_id; ?>" data-toggle="tab" href="#day-<?php echo $day_id; ?>" role="tab">
                    <?php echo $day_name . " (" . $week_dates[$day_id] . ")"; ?>
                </a>
            </li>
        <?php $i++; endforeach; ?>
    </ul>

    <div class="tab-content" id="dayTabContent">
        <?php $i = 0; foreach ($days_of_week as $day_id => $day_name): ?>
            <div class="tab-pane fade <?php echo ($i == 0) ? 'in active' : ''; ?>" id="day-<?php echo $day_id; ?>" role="tabpanel">
                <h4 class="mb-3">Online Reservation Table Booking View - <?php echo $day_name; ?></h4>

                <div id="slots-day-<?php echo $day_id; ?>" class="row">
                    <!-- Slot cards will be loaded here by jQuery AJAX -->
                    <div class="col-12 text-center">
                        <div class="spinner-border text-primary" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++; endforeach; ?>
    </div>
</div>

<!-- Customer Detail Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Reservation Details</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="customerDetailBody">
        <!-- Customer details will load here -->
      </div>
    </div>
  </div>
</div>

<!-- JQuery for dynamic loading -->
<script>
$(document).ready(function() {
    function loadSlots(dayId) {
        var container = $("#slots-day-" + dayId);
        container.html('<div class="col-12 text-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');

        $.ajax({
            url: "<?php echo base_url('reservation/reservation/load_slots_by_day'); ?>",
            type: "GET",
            data: { day_id: dayId },
            dataType: "json",
            success: function(response) {
                container.empty();

                if (response.length > 0) {
                    $.each(response, function(index, slot) {
                        var slotClass = '';
                        var readonly = '';

                        if (slot.status == 2) {
                            // Booked slot - green color
                            slotClass = 'bg-success text-dark';
                            readonly = 'readonly';
                        } else if (slot.status == 2) {
                            // Completed reservation - also green, and show details
                            slotClass = 'bg-success text-dark';
                        } else {
                            // Available slot - red color
                            slotClass = 'bg-danger text-dark';
                        }
                        
                        var button = '<div class="col-md-3 mb-3">' +
                                        '<div class="card '+slotClass+' slot-card" data-toggle="modal" data-target="#customerModal" data-reservation-id="'+slot.reservation_id+'" ' +
                                        readonly + '>' +
                                            '<div class="card-body text-center">' +
                                                '<h6>'+slot.start_time+' - '+slot.end_time+'</h6>' +
                                                (slot.status == 2 ? '<small>Table No: '+slot.table_no+'</small>' : 
                                                 (slot.status == 3 ? '<small>Completed</small>' : '<small>Available</small>')) +
                                            '</div>' +
                                        '</div>' +
                                     '</div>';
                        container.append(button);
                    });
                } else {
                    container.html('<div class="col-12"><div class="alert alert-warning text-center">No Slots Found</div></div>');
                }
            },
            error: function() {
                container.html('<div class="col-12"><div class="alert alert-danger text-center">Failed to load slots</div></div>');
            }
        });
    }

    // Load first tab by default
    loadSlots(1);

    // Tab click event
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var dayId = $(e.target).attr('id').replace('tab-', '');
        loadSlots(dayId);
    });

    // Slot click to load customer details
    $(document).on('click', '.slot-card', function() {
        var reservationId = $(this).data('reservation-id');

        // Check if reservation_id is not 0 before opening the modal
        if (reservationId != 0) {
            $.ajax({
                url: "<?php echo base_url('reservation/reservation/get_customer_detail'); ?>",
                type: "GET",
                data: { reservation_id: reservationId },
                success: function(response) {
                    console.log(response);
                    $("#customerModal").modal('show');
                    $("#customerDetailBody").html(response);
                },
                error: function() {
                    $("#customerModal").modal('show');
                    $("#customerDetailBody").html('<div class="alert alert-danger text-center">Failed to load customer details</div>');
                }
            });
        } else {
            // If reservation_id is 0, do nothing (prevent modal from opening)
            $("#customerModal").modal('hide');
            return false;
        }
    });

});
</script>
<style>
.slot-card {
    padding: 10px;
}
</style>