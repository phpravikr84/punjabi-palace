<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="d-flex justify-content-between pull-right" style="margin-bottom: 20px;">
            <h4 class="mb-0"><?php echo $title; ?></h4>
            <div class="ms-auto">
                <a href="<?php echo base_url('purchase/stock_adjustment/'); ?>" class="btn btn-sm btn-primary">
                    Back List View
                </a>
               
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12">
        <div class="panel">
                <div class="panel-body">
                <?php echo form_open('purchase/stock_adjustment/create'); ?>
                <?php echo form_hidden('id', $info->id ?? ''); ?>
                <input type="hidden" id="getIngrItem" value="<?php echo base_url('purchase/stock_adjustment/getIngredientItem'); ?>">


                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Ingredient -->
                        <div class="form-group row">
                            <label for="ingredient_id" class="col-sm-4 col-form-label text-right">
                                Ingredient <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                                <select name="ingredient_id" id="ingredientSelect" class="form-control ingredientSelect" required>
                                    <option value="">Select Ingredient</option>
                                    <?php foreach ($ingredients as $ing): ?>
                                        <option value="<?php echo $ing->id; ?>">
                                            <?php echo $ing->ingredient_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Current Stock -->
                        <div class="form-group row">
                            <label for="stock_qty" class="col-sm-4 col-form-label text-right">
                                Current Stock
                            </label>
                            <div class="col-sm-8">
                                <input type="text" id="stock_qty" class="form-control" readonly>
                            </div>
                        </div>


                        <!-- Adjustment Type -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Adjustment Type <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select name="operation" class="form-control" required>
                                    <option value="add">Add</option>
                                    <option value="subtract">Subtract</option>
                                </select>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-4 col-form-label text-right">
                                Quantity <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="number" step="0.01" name="quantity" class="form-control"
                                       value="" required>
                            </div>
                            <div class="col-sm-2">
                                <span id="adjustmentUnit"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Adjustment Date -->
                        <div class="form-group row">
                            <label for="adjustment_date" class="col-sm-4 col-form-label text-right">
                                Adjustment Date <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                               <input type="date" name="adjustment_date" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>


                        <!-- Reason -->
                        <div class="form-group row">
                            <label for="reason" class="col-sm-4 col-form-label text-right">
                                Reason <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                                <textarea name="reason" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="form-group text-right mt-3">
                    <a href="<?php echo base_url('purchase/stock_adjustment/index'); ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">
                        <?php echo !empty($info->id) ? 'Update' : 'Save'; ?>
                    </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/purchase/assets/js/stock_adj_script.js'); ?>" type="text/javascript"></script>