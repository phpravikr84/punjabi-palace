<div class="container">
    <!-- Header Section -->
    <div class="header-container">
        <h1 class="header-title">Tables</h1>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search">
            <i class="fa fa-search search-icon"></i>
        </div>
    </div>

    <!-- Status Summary -->
    <div class="row my-3 text-center">
        <div class="col-md-4">
            <div class="row">
            <?php 
                $countAvailable = 0;
                $countOccupied = 0;
                $countReserved = 0;

                $numOfCols = 6; 
                $rowCount = 0;
                $tdtlsArrIndex = 0;

                foreach ($tableinfo as $table) {
                    $availableSeats = $table['person_capicity'] - $table['sum'];

                    // Count logic
                    if ($availableSeats == $table['person_capicity']) {
                        $countAvailable++;
                    } elseif ($availableSeats == 0 || $availableSeats < $table['person_capicity']) {
                        $countOccupied++;
                    //} elseif ($availableSeats < $table['person_capicity']) {
                    } else {
                        $countReserved;
                    }
                }
            ?>

            <div class="col-md-4">
                <h5>
                    <span class="status-badge available"><?php echo $countAvailable; ?></span> Available
                </h5>
            </div>
            <div class="col-md-4">
                <h5>
                    <span class="status-badge occupied"><?php echo $countOccupied; ?></span> Occupied
                </h5>
            </div>
            <div class="col-md-4">
                <h5>
                    <span class="status-badge reserved"><?php echo $countReserved; ?></span> Reserved
                </h5>
            </div>

            </div>
        </div>
        <div class="col-md-4">
            <input type="datetime-local" class="calendar-container" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
        </div>
        <div class="col-md-4">
            <!-- <button class="btn select-pay w-100">Select & Pay</button> -->
        </div>
    </div>

    <div class="row tables-bg">
        <div class="col-md-12 tablelist">
            <div class="row">

                <?php 
                $numOfCols = 6; 
                $rowCount = 0;
                $tdtlsArrIndex = 0;
                foreach ($tableinfo as $table) {
                    $backgroundImage = base_url("assets/img/tables/" . $table['person_capicity'] . "_". $table['person_capicity'] .".png");
                    $availableSeats = $table['person_capicity'] - $table['sum'];

                    // Open a new row if it's the first item in a new set of 4
                    if ($rowCount % $numOfCols == 0) {
                        echo '<div class="row">';
                    }
                ?>
                <a href="javascript:void(0);" onclick="showstabledetails(<?php echo $table['tablename']; ?>)">
                    <div class="col-md-2"> <!-- Ensures 4 columns in each row -->
                        <div class="table-container">
                            <div class="table-box" style="background-image: url('<?php echo $backgroundImage; ?>');">
                                <!-- Table Name -->
                                <div class="table-name"></div>

                                <!-- Order Number & Capacity Indicator -->
                                <div class="table-top">
                                    <div class="order-number">
                                        <?php if(!empty($table['table_details'])){
                                                    foreach ($table['table_details'] as $table_details) {
                                                        if($table_details->table_id == $table['tablename']){
                                                    ?>
                                            <?php echo '#'.$table_details->order_id .' ' ; ?>
                                        <?php } } } ?>
                                    </div>
                                    <div class="table-status-circle">
                                        <?php
                                        if ($availableSeats < $table['person_capicity']) {
                                            $avail = $availableSeats; // Half Available (Blue & Red)
                                        } else {
                                            $avail =  $table['person_capicity'];
                                        }
                                        ?>
                                        <?php echo $avail . "/" . $table['person_capicity']; ?>
                                    </div>
                                </div>

                                <!-- Center Circle (Availability Status) -->
                                <?php
                                    $statusClass = "status-available"; // Default: Available (Blue)
                                    if ($availableSeats == 0) {
                                        $statusClass = "status-occupied"; // Fully Occupied (Red)
                                    } elseif ($availableSeats < $table['person_capicity']) {
                                        $statusClass = "status-half"; // Half Available (Blue & Red)
                                    }
                                ?>
                                <div class="table-status <?php echo $statusClass; ?>">
                                    <?php echo 'T '.$table['tablename']; ?>
                                </div>

                                <!-- Footer - Seat Time & Persons -->
                                <div class="table-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if (!empty($table['table_details'])) {
                                                    foreach ($table['table_details'] as $table_details) {
                                                        if ($table_details->table_id == $table['tablename']) { 
                                                        ?>
                                                        <a href="javascript:void(0);" onclick="showstabledetails(<?php echo $table_details->table_id; ?>)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                                            </svg>
                                                        </a>

                                                        <?php break; 
                                                        }
                                                    }
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="seat-time">
                                                <?php if(!empty($table['table_details'])){
                                                                foreach ($table['table_details'] as $table_details) {
                                                                    if($table_details->table_id == $table['tablename']){
                                                                ?>
                                                                    <?php echo (!empty($table_details->time_enter) && $table['sum'] != 0) ? date('h:i A', strtotime($table_details->time_enter)) : "--"; ?>
                                                <?php } } } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <?php 
                    $tdtlsArrIndex++;
                    $rowCount++;
                    
                    // Close the row after 4 columns
                    if ($rowCount % $numOfCols == 0) {
                        echo '</div>'; // Close the row
                    }
                } 
                // Ensure last row is closed if the total items are not a multiple of 4
                if ($rowCount % $numOfCols != 0) {
                    echo '</div>'; 
                }
                ?>
            </div>
        </div>
    </div>


</div>

<!-- Modal Poup -->
<!-- <div id="modal-ajaxview-tablebook" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Table Details2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="tablebookview">
            </div>
        </div>
    </div>
</div> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/posordernew.css'); ?>">
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/postop.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/tablesetting.js'); ?>" type="text/javascript"></script>

<audio id="myAudio" src="<?php echo base_url() ?><?php echo $soundsetting->nofitysound; ?>" preload="auto" class="display-none"></audio>

<div id="tablebookviewmodal" class="modal fade  bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-inner" id="tablebookview"> </div>
</div>

<script>
     function showstabledetails(tableId) {
    var url = basicinfo.baseurl + 'ordermanage/order/showtablemodalnew/' + tableId;
    getAjaxModalNew(url, false, '#tablebookview', '#tablebookviewmodal', '', 'GET');
}

</script>



<style>
/* General Styles */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #EDEDED;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.header-title {
    color: black;
    font-size: 24px;
    font-weight: bold;
}

.search-container {
    position: relative;
}

.search-input {
    background-color: #F2F2F2;
    border: none;
    border-radius: 20px;
    padding: 10px 15px;
    padding-left: 35px;
    width: 250px;
}

.search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

/* Status Badges */
.status-badge {
    display: inline-block;
    min-width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    font-weight: bold;
    margin-right: 8px;
}

.available { background-color: #CEE2FF; color: black; }
.occupied { background-color: #FFB1A4; color: black; }
.reserved { background-color: #F8EB7B; color: black; }

/* Calendar Style */
.calendar-container {
    border: 1px solid #DADADA;
    border-radius: 10px;
    padding: 10px;
    width: 100%;
}

/* Select & Pay Button */
.select-pay {
    background-color: #2E82FF;
    color: white;
    border-radius: 10px;
    padding: 10px 15px;
    text-align: center;
    cursor: pointer;
}

/* Background for Tables Section */
.tables-bg {
    background-color: #F2F2F2;
    padding: 20px 0;
    border-radius: 10px;
}
.tablelist{
    display: inline-flex;
    justify-content: space-around;
    
}

/* Table Styles */
.table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
}

.table-box {
    width: 150px;
    height: 100px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    border-radius: 10px;
}

/* Status Circle */
.table-status-circle {
    position: absolute;
    top: 14px;
    right: 20px;
    width: 20px;
    height: 20px;
    background-color: yellow;
    border-radius: 50%;
    font-size: 8px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Order Number */
.order-number {
    font-size: 8px;
    font-weight: bold;
    position: absolute;
    top: 15px;
    left: 21px;
}

/* Table Footer */
.table-footer {
    position: absolute;
    bottom: 13px;
    right: 21px;
    font-size: 8px;
    font-weight: bold;
    width:125px;
}

/* Availability Status */
.table-status {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    /* margin: 10px auto; */
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.status-available { background-color: #CEE3FF; }
.status-occupied { background-color: #FFB1A8; }
.status-half { background: linear-gradient(to right, #CEE3FF 50%, #FFB1A8 50%); }

/* Table Name */
.table-name {
    font-weight: bold;
    font-size: 12px;
}
</style>
