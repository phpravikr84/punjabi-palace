<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/tableorder.css'); ?>">


<!-- Modal -->
<div id="tablebookviewmodal" class="modal-dialog modal-inner" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Reservation Information</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="tab-content">
                    <div class="row reservation-tab">
                        <div class="col-md-12">
                            <div class="info_part">
                                <table class="table table-bordered table-modal table-info text-center">
                                    <thead>
                                        <tr>
                                            <!-- <th><?php //echo display('Sl'); ?></th> -->
                                            <th><?php echo 'Name'; //display('customer_name'); ?></th>
                                            <th><?php echo display('tabltno'); ?></th>
                                            <th><?php echo 'Person';//display('no_of_people'); ?></th>
                                            <th><?php echo display('s_time'); ?></th>
                                            <!-- <th><?php //echo display('e_time'); ?></th> -->
                                            <th><?php echo display('date'); ?></th>
                                            <th><?php echo display('status'); ?></th>
                                            <th><?php echo 'Action'; ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($reservations)) : ?>
                                            <?php $sl = isset($pagenum) ? $pagenum + 1 : 1; ?>
                                            <?php foreach ($reservations as $reservation) : ?>
                                                <!-- <tr class="<?php //echo ($sl % 2 == 0) ? 'even gradeC' : 'odd gradeX'; ?>"> -->
                                                    <!-- <td><?php //echo $sl; ?></td> -->
                                                    <td><?php echo $reservation->customer_name; ?></td>
                                                    <td><?php echo $reservation->tablename; ?></td>
                                                    <td><?php echo $reservation->person_capicity; ?></td>
                                                    <td><?php echo $reservation->formtime; ?></td>
                                                    <!-- <td><?php //echo $reservation->totime; ?></td> -->
                                                    <td><?php echo $reservation->reserveday; ?></td>
                                                    <!-- <td><?php //echo ($reservation->status == 1) ? 'Free' : (($reservation->status == 2) ? 'Booked' : 'Unknown'); ?></td> -->
                                                    <td>
                                                        <?php if($reservation->status == 1) { ?>
                                                           Free
                                                            <?php } elseif($reservation->status == 2) { ?>
                                                          Booked
                                                        <?php } elseif($reservation->status == 3) { ?>
                                                            Complete
                                                        <?php }else { ?>
                                                                <span>Expire</span>
                                                       <?php  }
                                                        ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <?php if($reservation->status == 2) { ?>
                                                            <a href="<?php echo site_url('ordermanage/order/pos_invoice?ps=' . $reservation->person_capicity . '&tid=' . $reservation->tablename . '&cid=' . $reservation->cid . '&tmmulti=0&tmmultipr=0&reserveid='.$reservation->reserveid); ?>" 
                                                            class="btn btn-success btn-md">
                                                            Order
                                                            </a>
                                                        <?php } elseif($reservation->status == 3) { ?>
                                                            <span class="badge badge-success text-light">Complete</span>
                                                        <?php } elseif($reservation->status == 4) { ?>
                                                            <span class="badge badge-danger text-light">Expire</span>
                                                        <?php }else { ?>
                                                                <span>--</span>
                                                       <?php  }
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                                <?php $sl++; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">No reservations found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
            </div>

        </div>
</div>
