<div class="row">
    <!-- Table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading">
                <h3 class="panel-title">Waste Management List</h3>
                <span class="flex pull-right align-items-center mb-3">
                    <a href="<?= base_url('itemmanage/waste/form') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Waste
                    </a>
                <span>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>SN</th>
                            <th>Reference No</th>
                            <th>Date</th>
                            <th>Total Loss (₹)</th>
                            <th>Item Count</th>
                            <th>Responsible</th>
                            <th>Note</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($wastes)) : ?>
                          <?php foreach ($wastes as $k => $waste): 
                              $itemCount = count($waste->items);
                              $totalLoss = 0;
                              foreach ($waste->items as $itm) {
                                  $totalLoss += $itm->loss_amount;
                              }
                          ?>
                          <tr>
                              <td><?= $k + 1 ?></td>
                              <td><?= $waste->reference_no ?></td>
                              <td><?= $waste->waste_date ?></td>
                              <td><?= number_format($totalLoss, 2) ?></td>
                              <td><?= $itemCount ?></td>
                              <td><?= $waste->firstname . ' ' . $waste->lastname ?></td>
                              <td><?= $waste->note ?></td>
                              <td><?= $waste->firstname . ' ' . $waste->lastname ?></td> <!-- added_by -->
                              <td class="text-center">
                                  <a href="<?= base_url('itemmanage/waste/view/' . $waste->id) ?>" title="View/Edit" class="btn btn-sm btn-info">
                                      <i class="fa fa-eye"></i>
                                  </a>
                                  <a href="<?= base_url('itemmanage/waste/delete/' . $waste->id) ?>" 
                                    title="Delete" 
                                    onclick="return confirm('Are you sure?')" 
                                    class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                  </a>

                              </td>
                          </tr>
                          <?php endforeach; ?>
                      <?php else : ?>
                          <tr><td colspan="9" class="text-center">No records found</td></tr>
                      <?php endif; ?>
                  </tbody>

                </table>
                <div class="text-right">
                    <?= !empty($links) ? $links : '' ?>
                </div>
            </div>
        </span>
    </span>
</div>
