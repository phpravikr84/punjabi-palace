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
                <div class="col-md-4">
                    <h5>
                        <span class="status-badge available">18</span> Available
                    </h5>
                </div>
                <div class="col-md-4">
                    <h5>
                        <span class="status-badge occupied">6</span> Occupied
                    </h5>
                </div>
                <div class="col-md-4">
                    <h5>
                        <span class="status-badge reserved">4</span> Reserved
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <input type="datetime-local" class="calendar-container">
        </div>
        <div class="col-md-4">
            <button class="btn select-pay w-100">Select & Pay</button>
        </div>
    </div>

    <div class="row tables-bg">
        <div class="col-md-12 tablelist">
            <div class="row">
                <?php 
                $numOfCols = 3;
                $rowCount = 0;
                foreach ($tableinfo as $table) {
                    $backgroundImage = base_url("assets/img/tables/size-" . $table['person_capicity'] . "-tb.png");
                    $availableSeats = $table['person_capicity'] - $table['sum'];
                ?>
                    <div class="table-container">
                        <div class="table-box" style="background-image: url('<?php echo $backgroundImage; ?>');">
                            <!-- Table Name -->
                            <div class="table-name"></div>

                            <!-- Order Number & Capacity Indicator -->
                            <div class="table-top">
                                <?php if (!empty($table_details->order_id)): ?>
                                    <div class="order-number"><?php echo $table_details->order_id; ?></div>
                                <?php endif; ?>
                                <div class="table-status-circle">
                                    <?php echo $availableSeats . "/" . $table['person_capicity']; ?>
                                </div>
                            </div>

                            <!-- Center Circle (Availability Status) -->
                            <?php
                                $statusClass = "status-available"; // Default: Available (Blue)
                                if ($table_details->total_people > 0) {
                                    $statusClass = "status-occupied"; // Fully Occupied (Red)
                                } elseif ($availableSeats < $table['person_capicity']) {
                                    $statusClass = "status-half"; // Half Available (Blue & Red)
                                }
                            ?>
                            <div class="table-status <?php echo $statusClass; ?>">
                                <?php echo 'T- '.$table['tablename']; ?>
                            </div>

                            <!-- Footer - Seat Time & Persons -->
                            <div class="table-footer">
                                <div class="seat-time">
                                    <?php echo (!empty($table_details->time_enter) && $table['sum'] != 0) ? date('h:i A', strtotime($table_details->time_enter)) : "--"; ?>
                                </div>
                                <div class="persons">
                                    <?php echo (!empty($table_details->total_people)) ? $table_details->total_people . " persons" : "0 persons"; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php 
                    $rowCount++;
                    if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                }
                ?>
            </div>
        </div>
    </div>
</div>

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
    width: 145px;
    height: auto;
    background-size: cover;
    background-position: center;
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
    top: 5px;
    left: 5px;
    width: 20px;
    height: 20px;
    background-color: yellow;
    border-radius: 50%;
    font-size: 12px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Order Number */
.order-number {
    font-size: 16px;
    font-weight: bold;
}

/* Table Footer */
.table-footer {
    position: absolute;
    bottom: 5px;
    right: 5px;
    font-size: 12px;
    font-weight: bold;
}

/* Availability Status */
.table-status {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin: 10px auto;
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
    font-size: 16px;
}
</style>
