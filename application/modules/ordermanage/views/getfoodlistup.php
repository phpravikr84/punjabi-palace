<?php $i=0;
foreach($itemlist as $item){
    $item=(object)$item;
    $i++;
    if($item->isgroup==1){
        $isgroupid=1;
    }
    else{
        $isgroupid=0;
    }
$this->db->select('*');
$this->db->from('menu_add_on');
$this->db->where('menu_id',$item->ProductsID);
$query = $this->db->get();
$getadons="";
if ($query->num_rows() > 0) {
$getadons = 1;
}
else{
$getadons =  0;
}
?>
<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 col-p-3">
    <div class="panel panel-bd product-panel update_select_product p-12 rounded-lg">
        <div class="panel-body">
            <img src="<?php echo base_url(!empty($item->ProductImage)?$item->ProductImage:'assets/img/icons/default_pos_pro.jpg'); ?>" class="img-responsive" alt="<?php echo $item->ProductName;?>">
            <input type="hidden" name="update_select_product_id" class="select_product_id" value="<?php echo $item->ProductsID;?>">
            <input type="hidden" name="update_select_totalvarient" class="select_totalvarient" value="<?php echo $item->totalvarient;?>">
            <input type="hidden" name="update_select_iscustomeqty" class="select_iscustomeqty" value="<?php echo $item->is_customqty;?>">
            <input type="hidden" name="update_select_product_size" class="select_product_size" value="<?php echo $item->variantid;?>">
            <input type="hidden" name="update_select_product_isgroup" class="select_product_isgroup" value="<?php echo $isgroupid;?>">
            <input type="hidden" name="update_select_product_cat" class="select_product_cat" value="<?php echo $item->CategoryID;?>">
            <input type="hidden" name="update_select_varient_name" class="select_varient_name" value="<?php echo $item->variantName;?>">
            <input type="hidden" name="update_select_product_name" class="select_product_name" value="<?php echo $item->ProductName; if(!empty($item->itemnotes)){ echo " -".$item->itemnotes;}?>">
            <input type="hidden" name="update_select_product_price" class="select_product_price" value="<?php echo $item->price;?>">
            <input type="hidden" name="update_select_addons" class="select_addons" value="<?php echo $getadons;?>">
        </div>
        <div class="text-center">
         <h5>
          <?php 
          echo $item->ProductsID.'-'.$item->ProductName;
          if (!empty($item->itemnotes)) {
            echo " -<span class='posShDesc'>" . $item->itemnotes."</span>";
          }
          if (!empty($item->component)) {
              $components = explode(',', $item->component);
              echo '<div class="tag-wrapper">';
              foreach ($components as $comp) {
                echo '<span class="label label-primary" style="margin-right:5px;">' . trim($comp) . '</span>';
              }
              echo '</div>';
          }
          if (!empty($item->price)) {
            echo "<div class='tag-wrapper'><strong>" .(($currency->position == 1) ? $currency->curr_icon : '').$item->price."</strong>";
            echo '</div>';
          }
          ?>
           <?php  ?>
         </h5>
       </div>
    </div>
</div>
<?php } ?>