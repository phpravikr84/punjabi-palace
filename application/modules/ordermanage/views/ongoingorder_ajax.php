<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/modules/ordermanage/assets/css/onoing_ajax.css'); ?>">
<div class="col-md-12">
  <div class="row mb-2">
    <div class="col-sm-3">
      <select id="ongoingtable_name" class="form-control dont-select-me search-table-field" dir="ltr" name="s">
      </select>
    </div>
    <div class="col-sm-3">
      <select id="ongoingtable_sr" class="form-control dont-select-me search-tablesr-field" dir="ltr" name="ts">
      </select>
    </div>
    <div class="col-sm-6">
      <button class="btn btn-success float-right" onclick="mergeorderlist()"><?php echo display('mergeord') ?></button>
    </div>
  </div>
  <div class="row">
    <?php 
    if (!empty($ongoingorder)) {
      foreach ($ongoingorder as $onprocess) {
        $billtotal = round($onprocess->totalamount - $onprocess->customerpaid);
        // Dynamic customer type (from customer_type table)
        $customerType = $onprocess->customer_type ?? ($onprocess->cutomertype == 1 ? 'Dine In' : ($onprocess->cutomertype == 2 ? 'Ubereats' : 'Take Away'));
    ?>
        <div class="col-sm-4 col-md-3 col-xs-6 col-xlg-2 mb-2">
          <?php if (!empty($onprocess->marge_order_id)) { ?>
            <div class="hero-widget card border-0 shadow-sm position-relative" onclick="editposorder(<?php echo $onprocess->order_id; ?>, 1)" style="cursor: pointer;">
              <!-- 45-degree band for customer type -->
              <div class="band <?php echo strtolower(str_replace(' ', '', $customerType)); ?>-band">
                <span><?php echo $customerType; ?></span>
              </div>
              <!-- Merge checkbox in top-right -->
              <?php if ($this->permission->method('ordermanage', 'update')->access() && $onprocess->splitpay_status == 0) { ?>
                <div class="merge-checkbox">
                  <input id='chkbox-<?php echo $onprocess->order_id; ?>' type='checkbox' class="individual" name="margeorder" value="<?php echo $onprocess->order_id; ?>"/>
                  <label for='chkbox-<?php echo $onprocess->order_id; ?>' class="mb-0">
                    <span class="radio-shape"><i class="fa fa-check"></i></span>
                  </label>
                </div>
              <?php } ?>
              <div class="card-body text-center">
                <?php if ($onprocess->cutomertype == 1) { ?>
                  <!-- Dine In: Table No. in large font -->
                  <h3 class="mb-1 tablename"><?php echo 'Table No: '; ?>: <?php echo $onprocess->tablename;; ?></h3>
                  <div class="row mb-1">
                    <div class="col-6 text-left"><?php echo display('waiter'); ?>: <?php echo $onprocess->first_name . ' ' . $onprocess->last_name; ?></div>
                    <div class="col-6 text-right">
                      <?php
                      $diff = 0;
                      $actualtime = date('H:i:s');
                      $array1 = explode(':', $actualtime);
                      $array2 = explode(':', $onprocess->order_time);
                      $minutes1 = ($array1[0] * 3600.0 + $array1[1] * 60.0 + $array1[2]);
                      $minutes2 = ($array2[0] * 3600.0 + $array2[1] * 60.0 + $array2[2]);
                      $diff = $minutes1 - $minutes2;
                      $format = sprintf('%02d:%02d:%02d', ($diff / 3600), ($diff / 60 % 60), $diff % 60);
                      ?>
                      <?php echo display('before_time'); ?>: <?php echo $format; ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <!-- Ubereats or Take Away -->
                  <h4><?php echo $customerType; ?></h4>
                  <p class="mb-1"><?php echo display('waiter'); ?>: <?php echo $onprocess->first_name . ' ' . $onprocess->last_name; ?></p>
                  <p class="mb-1"><?php echo display('before_time'); ?>: <?php echo $format; ?></p>
                <?php } ?>
              </div>
              <div class="card-footer text-right small">
                <?php 
                $allorder = '';
                $margeinfo = $this->db->select('order_id')->from('customer_order')->where('marge_order_id', $onprocess->marge_order_id)->get()->result();
                foreach ($margeinfo as $mergeord) {
                  $allorder .= $mergeord->order_id . ',';
                }
                $allorder = trim($allorder, ',');
                ?>
                <input name="margeid" id="allmerge_<?php echo $onprocess->marge_order_id; ?>" type="hidden" value="<?php echo $allorder; ?>" />
                #<?php echo $onprocess->saleinvoice; ?>
              </div>
              <?php if ($this->permission->method('ordermanage', 'delete')->access()) { ?>
                <a href="javascript:;" data-id="<?php echo $onprocess->order_id; ?>" class="btn btn-xs btn-danger btn-sm cancelorder position-absolute" style="bottom: 10px; right: 40px;" data-toggle="tooltip" data-placement="left" title="<?php echo display('cancel_order'); ?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              <?php } ?>
            </div>
          <?php } else { ?>
            <div class="hero-widget card border-0 shadow-sm position-relative" onclick="editposorder(<?php echo $onprocess->order_id; ?>, 1)" style="cursor: pointer;">
              <!-- 45-degree band for customer type -->
              <div class="band <?php echo strtolower(str_replace(' ', '', $customerType)); ?>-band">
                <span><?php echo $customerType; ?></span>
              </div>
              <!-- Merge checkbox in top-right -->
              <?php if ($this->permission->method('ordermanage', 'update')->access() && $onprocess->splitpay_status == 0) { ?>
                <div class="merge-checkbox">
                  <input id='chkbox-<?php echo $onprocess->order_id; ?>' type='checkbox' class="individual" name="margeorder" value="<?php echo $onprocess->order_id; ?>"/>
                  <label for='chkbox-<?php echo $onprocess->order_id; ?>' class="mb-0">
                    <span class="radio-shape"><i class="fa fa-check"></i></span>
                  </label>
                </div>
              <?php } ?>
              <div class="card-body text-center">
                <?php if ($onprocess->cutomertype == 1) { ?>
                  <!-- Dine In: Table No. in large font -->
                  <h3 class="mb-1 tablename"><?php echo display('table'); ?>: <?php echo $onprocess->table_no; ?></h3>
                  <div class="row mb-1">
                    <div class="col-6"><?php echo display('waiter'); ?>: <?php echo $onprocess->first_name . ' ' . $onprocess->last_name; ?></div>
                    <div class="col-6">
                      <?php
                         $diff=0;
                        $actualtime=date('H:i:s');
                          $array1 = explode(':', $actualtime);
                        $array2 = explode(':', $onprocess->order_time);
                        $minutes1 = ($array1[0] * 3600.0 + $array1[1]*60.0+$array1[2]);
                        $minutes2 = ($array2[0] * 3600.0 + $array2[1]*60.0+$array2[2]);
                        $diff = $minutes1 - $minutes2;
                        $format = sprintf('%02d:%02d:%02d', ($diff / 3600), ($diff / 60 % 60), $diff % 60);
                        
                      ?>
                      <?php echo display('before_time'); ?>: <?php echo $format; ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <!-- Ubereats or Take Away -->
                  <h3 class="mb-1 tablename"> TA- #<?php echo $onprocess->saleinvoice; ?></h3>
                  <p><?php echo display('waiter'); ?>: <?php echo $onprocess->first_name . ' ' . $onprocess->last_name; ?></p>
                  <!-- <p class="mb-1"><?php //echo display('before_time'); ?>: <?php //echo $format; ?></p> -->
                <?php } ?>
              </div>
              <div class="card-footer text-right small">
                #<?php echo $onprocess->saleinvoice; ?>
              </div>
              <?php if ($this->permission->method('ordermanage', 'delete')->access()) { ?>
                <a href="javascript:;" data-id="<?php echo $onprocess->order_id; ?>" class="btn btn-xs btn-danger btn-sm cancelorder position-absolute" style="bottom: 10px; right: 40px;" data-toggle="tooltip" data-placement="left" title="<?php echo display('cancel_order'); ?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
    <?php 
      }
    } else { 
      $odmsg = display('no_order_run');
      echo "<p class='pl-12'>$odmsg</p>";
    }
    ?>
  </div>
</div>
<script src="<?php echo base_url('application/modules/ordermanage/assets/js/ongoing.js'); ?>" type="text/javascript"></script>

<style>
  .tablename{ font-size: 2rem!important;}
  /* General card styling for POS */
.hero-widget.card {
  min-height: 150px;
  position: relative;
  transition: all 0.2s ease;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
}
.hero-widget.card:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* 45-degree band for customer type */
.band {
  position: absolute;
  top: 20px;
  left: -40px;
  width: 150px;
  background: #000;
  color: #fff;
  text-align: center;
  transform: rotate(-45deg);
  font-size: 12px;
  padding: 5px 0;
  text-transform: uppercase;
}
.dinein-band, .dine-in-band { background: #28a745; } /* Green for Dine In */
.ubereats-band { background: #ff5733; } /* Orange for Ubereats */
.takeaway-band, .take-away-band { background: #FC8019; } /* Blue for Take Away */

/* Merge checkbox in top-right */
.merge-checkbox {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 10;
}
.merge-checkbox .radio-shape {
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  text-align: center;
  line-height: 20px;
}
.merge-checkbox input:checked + .radio-shape {
  background: #28a745;
  color: #fff;
}

/* Card body and footer */
.card-body {
  padding: 15px;
}
.card-body h3 {
  font-size: 1.5rem;
  font-weight: bold;
}
.card-body h4 {
  font-size: 1.2rem;
}
.card-footer {
  background: #f8f9fa;
  padding: 5px 10px;
  font-size: 0.8rem;
}

/* Cancel button positioning */
.cancelorder {
  z-index: 10;
}

/* Responsive adjustments for POS screens */
@media (max-width: 768px) {
  .hero-widget.card {
    min-height: 120px;
  }
  .card-body h3 {
    font-size: 1.2rem;
  }
  .card-body h4 {
    font-size: 1rem;
  }
  .band {
    font-size: 10px;
    width: 120px;
    left: -30px;
  }
}
</style>