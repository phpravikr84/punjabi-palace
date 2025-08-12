<link href="<?php echo base_url('application/modules/setting/assets/css/tablesetting.css'); ?>" rel="stylesheet" type="text/css"/>

<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 

            <div class="panel-body">
               <div class="row" id="gallery">
                <?php if (!empty($tablelist)) { ?>
                            <?php $sl = 0; ?>
                            <?php foreach ($tablelist as $table) {
								$sl++; 
								$style='style="'.$table->iconpos.'"';
								?>
                            
                	<div class="text-center boxpad draggable" id="<?php echo $table->tableid;?>" <?php echo $style;?> data-itemid='<?php echo $table->tableid;?>'>
                    <input name="sortid[]" type="hidden" value="<?php echo $table->tableid;?>" />
                    <div>
                    <img src="<?php echo base_url(!empty($table->table_icon)?$table->table_icon:'assets/img/icons/table/default.jpg'); ?>" class="img-thumbnail"/></div>
                    </div>
                    <?php } }?>
                    
               </div>
               
            </div>
        </div>
    </div>
</div>
<style>
    .ui-rotatable-handle {
    width: 20px;
    height: 20px;
    background: #ffcc00;
    border: 2px solid #333;
    border-radius: 50%;
    position: absolute;
    right: -10px;
    top: -10px;
    cursor: grab;
    z-index: 9999;
}

</style>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/godswearhats/jquery-ui-rotatable@1.1/jquery.ui.rotatable.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/godswearhats/jquery-ui-rotatable@1.1/jquery.ui.rotatable.css">

<script src="<?php echo base_url('application/modules/setting/assets/js/tablesetting_script.js'); ?>" type="text/javascript"></script>