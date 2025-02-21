<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/tableorder.css'); ?>">


<!-- Modal -->
<div id="tablebookviewmodal" class="modal-dialog modal-inner" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Reservation Information</h4>
            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div class="row reservation-tab">
                        <?php 
                        $numOfCols = 3;
                        $rowCount = 0;

                        foreach($tableinfo as $table) { ?>
                            <div class="col-md-12">
                                <div class="info_part <?php if($table['sum'] >= $table['person_capicity']){ echo 'booked';}?>">
                                    <table class="table table-bordered table-modal table-info text-center">
                                        <?php $table_count = count($table['table_details']); ?>
                                        <thead <?= ($table_count > 3) ? 'class="ws"' : '' ?>>
                                            <tr>
                                                <th><?= display('ord') ?></th>
                                                <th><?= display('seat_time') ?></th>
                                                <th><?= display('person') ?></th>
                                                <th><?= display('action') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-tbody-<?= $table['tableid'] ?>">
                                            <?php if (!empty($table['table_details'])) {
                                                foreach ($table['table_details'] as $table_details) { ?>
                                                    <tr id="table-tr-<?= $table_details->id ?>">
                                                        <td><?= $table_details->order_id ?></td>
                                                        <td><?= $table_details->time_enter ?></td>
                                                        <td><?= $table_details->total_people ?></td>
                                                        <td>
                                                            <button class="btn btn-del" onClick="deleterow_table(<?= $table_details->id ?>)">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } 
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4">
                                                        <h6><?= display('no_customer') ?></h6>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php 
                            $rowCount++;
                            if ($rowCount % $numOfCols == 0) {
                                echo '</div><div class="row kitchen-tab">';
                            }
                        } ?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <!-- <button type="button" onclick="multi_table()"class="btn btn-success btn-md"><?php echo display('submit')?></button>
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><?php echo display('cancel')?></button> -->
            </div>
        </div>
</div>
