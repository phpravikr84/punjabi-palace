<?php
//   echo "<pre>";
//   print_r($modifiers);
//   echo "</pre><br>";
//   echo "modifiers count: ". count($modifiers);
//   echo "<br>modifiers type: ". var_dump($modifiers);
//   exit();
$size="";
if ($cart = $this->cart->contents()){
    foreach ($cart as $ck => $cv) {
        $size = $cv['size'];
    }
}
if (count($modifiers) > 0):
?>
<div id="posAddmodSizeInfo">
    <div class="row">
        <div class="col-md-6">
            Selected Size: 
        </div>
        <div class="col-md-6">
            <?=$size;?>
        </div>
    </div>
</div>
    <div class="panel-group" id="foodAccordion" role="tablist" aria-multiselectable="false">
        <?php
        //   echo "<pre>";
        //   print_r($modifiers);
        //   echo "</pre><br>";
        //   echo "Selected modifiers: <br />";
        //   echo "<pre>";
        //   print_r($selectedMods);
        //   echo "</pre><br>";
        //   echo "modifiers count: ". count($modifiers);
        //   echo "<br>modifiers type: ". gettype($modifiers);
        // exit();
        foreach ($modifiers as $mk => $mv):
            // echo "<pre>";
            // print_r($mv);
            // echo "</pre>";
        ?>
            <div class="panel panel-default" id="modifiersPanel_<?=$mv->id;?>">
                <div class="panel-heading" role="tab" id="headingModifiers_<?=$mv->id;?>">
                    <h5 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#foodAccordion" href="#collapseModifiers_<?=$mv->id;?>" aria-expanded="<?=(($mk==0)?'true':'false')?>" aria-controls="collapseModifiers" class="accordion-plus-toggle <?=(($mk==0)?'':'collapsed')?>">
                            <?=$mv->name;?>
                            <br />
                            <small class="modifier-set-sub-heading" <?php if($mk==0): ?>style="display:block !important;"<?php endif; ?>>Select the items for adding them into the cart</small>
                        </a>
                    </h5>
                </div>
                <div id="collapseModifiers_<?=$mv->id;?>" class="panel-collapse collapse <?=(($mk==0)?'in':'')?>" role="tabpanel" aria-labelledby="headingModifiers_<?=$mv->id;?>" aria-expanded="<?=(($mk==0)?'true':'false')?>" style="">
                    <div class="panel-body">
                        <div class="mt-3">
                            <table class="table table-bordered">
                                <!-- <thead class="table-primary">
                                    <tr>
                                        <th scope="col" style="width:10%">Select</th>
                                        <th scope="col" style="width:50%">Modifier Item</th>
                                        <th scope="col" style="width:50%">Price</th>
                                    </tr>
                                </thead> -->
                                <tbody>
                                    <?php
                                    //Fetching modifier item information from the database
                                    $this->db->select('add_on_id,add_on_name,price,is_comp,minqty,maxqty,is_food_item');
                                    $this->db->from('add_ons');
                                    $this->db->where('modifier_set_id', $mv->id);
                                    $this->db->where('is_active', 1);
                                    $this->db->order_by('sort_order', "ASC");
                                    $miq = $this->db->get();
                                    $modifier_items = $miq->result();
                                    // echo "<pre>";
                                    // print_r($selectedMods);
                                    // echo "</pre><br>";
                                    // echo "selectedMods count: ". count($selectedMods);
                                    if (count($modifier_items) > 0):
                                        // echo "<pre>";
                                        // print_r($modifier_items);
                                        // echo "</pre>";
                                        // exit;
                                        foreach ($modifier_items as $mik => $miv):
                                            $checked = "";
                                            if (count($selectedMods) > 0) {
                                                foreach ($selectedMods as $smk => $smv) {
                                                    if ($mv->modifier_groupid == $smv->modifier_groupid) {
                                                        if ($miv->add_on_id == $smv->add_on_id) {
                                                            $checked = "checked";
                                                        }
                                                    }
                                                }
                                            }
                                    ?>
                                            <tr>
                                                <td style="width: 85%;">
                                                    <label for="modifier_item_<?=$miv->add_on_id;?>" class="form-label"><?=$miv->add_on_name;?></label>
                                                </td>
                                                <td style="width: 10%;text-align: end;">
                                                    <label for="modifier_item_<?=$miv->add_on_id;?>" class="form-label"><?=(($currency->position == 1) ? $currency->curr_icon : '').$miv->price;?></label>
                                                </td>
                                                <td style="width: 5%;" class="text-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input modifier-checkbox" type="checkbox" <?=$checked;?> name="modifier_items[]" value="<?=$miv->add_on_id;?>" id="modifier_item_<?=$miv->add_on_id;?>" data-group-id="<?=$mv->modifier_groupid;?>" autocomplete="off">
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        <div class="row">
            <div class="col-md-12 text-end" style="text-align: end;padding-top: 30px;" id="modifierChoosebtnDiv">
                <button class="btn btn-success modifierChoosebtn" onclick="ApplyModifierSelect(<?= $pid; ?>,'<?= $tr_row_id; ?>',1);">Apply</button>
            </div>
        </div>
    </div>
<?php
endif;
?>