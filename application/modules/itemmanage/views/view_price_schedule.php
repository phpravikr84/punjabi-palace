<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo 'Price Schedule Details'; ?></h2>
                </div>
            </div>
            <div class="panel-body">
                <!-- Price Schedule Fields -->
                <div id="scheduleContainer">
                    <div class="schedule-row row border-bottom pb-4 align-items-start gx-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo 'Price Level'; ?></label>
                                <p><?php echo isset($scheduleinfo->price_level_name) ? htmlspecialchars($scheduleinfo->price_level_name) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Effective From'; ?></label>
                                <p><?php echo !empty($scheduleinfo->EffectiveDate) ? htmlspecialchars(date('d-m-Y', strtotime($scheduleinfo->EffectiveDate))) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Description'; ?></label>
                                <p><?php echo !empty($scheduleinfo->Description) ? htmlspecialchars($scheduleinfo->Description) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Cron Run Date'; ?></label>
                                <p><?php echo !empty($scheduleinfo->cron_run_datetime) ? htmlspecialchars(date('d-m-Y H:i:s', strtotime($scheduleinfo->cron_run_datetime))) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Status'; ?></label>
                                <p><span class=" <?php echo $scheduleinfo->is_enabled ? 'badge badge-success' : 'btn btn-danger'; ?>">
                                    <?php echo $scheduleinfo->is_enabled ? 'Enabled' : 'Disabled'; ?>
                                </span></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo 'Based On'; ?></label>
                                <p><?php echo !empty($scheduleinfo->BasedOn) ? htmlspecialchars($scheduleinfo->BasedOn) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Base Price'; ?></label>
                                <p><?php echo !empty($scheduleinfo->base_price_name) ? htmlspecialchars($scheduleinfo->base_price_name) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Calculation Method'; ?></label>
                                <p><?php echo !empty($scheduleinfo->CalculationMethod) ? htmlspecialchars($scheduleinfo->CalculationMethod) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Percentage'; ?></label>
                                <p><?php echo !empty($scheduleinfo->Percentage) ? htmlspecialchars($scheduleinfo->Percentage) : '0.00'; ?>%</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo 'Rounding Method'; ?></label>
                                <p><?php echo !empty($scheduleinfo->RoundingMethod) ? htmlspecialchars($scheduleinfo->RoundingMethod) : '-'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Round to Nearest'; ?></label>
                                <p><?php echo !empty($scheduleinfo->RoundToNearest) ? htmlspecialchars($scheduleinfo->RoundToNearest) : '0.00'; ?></p>
                            </div>
                            <div class="form-group">
                                <label><?php echo 'Adjusted By'; ?></label>
                                <p><?php echo !empty($scheduleinfo->AdjustedBy) ? htmlspecialchars($scheduleinfo->AdjustedBy) : '0.00'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item Selection -->
                <div class="form-group row border-bottom pb-2">
                    <label class="col-sm-10 col-form-label"><?php echo 'Selected Items'; ?> (<span id="itemTable_length"><?php echo count(json_decode($scheduleinfo->Items, true) ?: []); ?></span>)</label>
                    <div class="col-sm-12">
                        <table width="100%" class="datatable table table-striped table-bordered table-hover" id="itemTable">
                            <thead>
                                <tr>
                                    <th><?php echo 'Item Name'; ?></th>
                                    <th><?php echo 'Item Code'; ?></th>
                                    <th><?php echo 'Category'; ?></th>
                                    <th><?php echo 'Last Cost'; ?></th>
                                    <th><?php echo 'Average Cost'; ?></th>
                                    <th><?php if(isset($scheduleinfo->price_level_name) && $scheduleinfo->price_level_name == 'Dine In') {
                                        echo 'Price'; 
                                    } elseif (isset($scheduleinfo->price_level_name) && $scheduleinfo->price_level_name == 'Ubereats') {
                                        echo 'Uber Eats Price'; 
                                    } elseif (isset($scheduleinfo->price_level_name) && $scheduleinfo->price_level_name == 'Take Way') {
                                        echo 'Take Away Price'; 
                                    } else {
                                    echo 'Price'; 
                                    }
                                    ?>
                                    </th>
                                    <th><?php echo 'New Price'; ?></th>
                                    <th><?php echo 'Adjustment'; ?></th>
                                    <th><?php echo 'Margin'; ?></th>
                                </tr>
                            </thead>
                            <tbody id="itemTableBody">
                                <?php if (!empty($scheduleinfo->Items)): ?>
                                    <?php foreach (json_decode($scheduleinfo->Items, true) as $item): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                            <td><?php echo htmlspecialchars($item['item_code']); ?></td>
                                            <td><?php echo htmlspecialchars($item['category']); ?></td>
                                            <td><?php echo isset($item['last_cost']) ? htmlspecialchars($item['last_cost']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['average_cost']) ? htmlspecialchars($item['average_cost']) : '0.00'; ?></td>
                                            <td><?php echo htmlspecialchars($item['price']); ?></td>
                                            <td><?php echo isset($item['new_price']) ? htmlspecialchars($item['new_price']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['adjustment']) ? htmlspecialchars($item['adjustment']) : '0.00'; ?></td>
                                            <td><?php echo isset($item['margin']) ? htmlspecialchars($item['margin']) : '0.00'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group text-right">
                    <a href="<?php echo base_url('itemmanage/item_food/price_schedule'); ?>" class="btn btn-primary"><?php echo 'Back to List'; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>