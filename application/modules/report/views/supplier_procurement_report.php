<script src="<?php echo base_url('application/modules/report/assets/js/prechasereport.js'); ?>"></script>
<link href="<?php echo base_url('application/modules/report/assets/css/prechasereport.css'); ?>" rel="stylesheet" />

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <fieldset class="border p-2">
                    <legend class="w-auto"><?php echo $title; ?></legend>
                </fieldset>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo form_open('report/reports/supplier_procurement_price', ['method' => 'post']); ?>
                                <div class="form-row row g-3 align-items-end">

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <label for="from_date"><?php echo display('start_date') ?></label>
                                        <input type="text" name="from_date" class="form-control datepicker" placeholder="Start Date" readonly>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <label for="to_date"><?php echo display('end_date') ?></label>
                                        <input type="text" name="to_date" class="form-control datepicker" value="<?php echo date('d-m-Y'); ?>" readonly>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <label for="supplier_id"><?php echo display('supplier') ?></label>
                                        <select name="supplier_id" class="form-control">
                                            <option value=""><?php echo display('all_suppliers'); ?></option>
                                            <?php foreach ($suppliers as $supplier): ?>
                                                <option value="<?php echo $supplier->supid; ?>"><?php echo $supplier->supName; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12 d-flex gap-2" style="margin-top:20px;">
                                        <button type="submit" class="btn btn-success w-100"><?php echo display('search') ?></button>
                                        <button type="button" class="btn btn-warning w-100" onclick="printDiv('report_div')"><?php echo display('print') ?></button>
                                    </div>

                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="report_div">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div id="lineChart"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="barChart"></div>
                        </div>
                    </div>

                    <div class="row" id="report_div">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4><?php echo display('supplier_procurement_price_report') ?></h4>
                                    </div>
                                </div>
                                    
                                <div class="panel-body">
                                    <div class="table-responsive" id="getresult2">
                                        <table class="table table-bordered table-striped table-hover" id="respritbl">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo display('date'); ?></th>
                                                    <th><?php echo 'Ingredient Name'; ?></th>
                                                    <th><?php echo 'Current Price'; ?></th>
                                                    <th><?php echo 'Previous_price'; ?></th>
                                                    <th><?php echo 'Difference'; ?></th>
                                                    <th><?php echo 'Percentage_change'; ?></th>
                                                    <th><?php echo 'Current Supplier'; ?></th>
                                                    <th><?php echo 'Previous Supplier'; ?></th>
                                                    <th><?php echo 'Price trend'; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if (!empty($price_changes)) {
                                                    foreach ($price_changes as $entry) {
                                                        $diff = $entry->current_unit_price - $entry->last_unit_price;
                                                        $percent_change = ($entry->last_unit_price != 0) ? ($diff / $entry->last_unit_price) * 100 : 0;
                                                        $is_up = $diff > 0;
                                                    
                                                        $trend_icon = $is_up ? '🔼 Up' : ($diff < 0 ? '🔽 Down' : '➖ No Change');
                                                ?>

                                                <tr>
                                                    <td><?php echo date('d-m-Y', strtotime($entry->purchasedate)); ?></td>
                                                    <td><?php echo html_escape($entry->ingredient_name); ?></td>
                                                    <td><?php echo number_format($entry->current_unit_price, 2); ?></td>
                                                    <td><?php echo number_format($entry->last_unit_price, 2); ?></td>
                                                    <td><?php echo number_format($diff, 2); ?></td>
                                                    <td><?php echo ($diff != 0 ? sprintf('%+.2f', $entry->price_diff_percentage) . '%' : '0.00%'); ?></td>
                                                    <td><?php echo html_escape($entry->current_supplier); ?></td>
                                                    <td><?php echo html_escape($entry->last_supplier); ?></td>
                                                    <td><?php echo $trend_icon; ?></td>
                                                </tr>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                <tr>
                                                    <td colspan="9" class="text-center"><?php echo display('no_data_found'); ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- report row end -->

                </div> <!-- report div print end -->
            </div>
        </div>
    </div>
</div>


<!-- Load ApexCharts -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const rawData = <?php echo json_encode($chartData); ?>;

    if (!rawData || !rawData.results || !Array.isArray(rawData.results)) {
        console.error('Invalid data format. "results" key missing or not an array.');
    } else {
        const results = rawData.results;

        // Step 1: Get latest 5 ingredients by purchase date
        const latestByIngredient = {};

        results.forEach(item => {
            const date = new Date(item.purchasedate);
            if (
                !latestByIngredient[item.ingredient_name] ||
                new Date(latestByIngredient[item.ingredient_name].purchasedate) < date
            ) {
                latestByIngredient[item.ingredient_name] = item;
            }
        });

        // Sort ingredients by absolute price_diff_percentage descending
        const sortedIngredients = Object.values(latestByIngredient)
            .sort((a, b) => Math.abs(b.price_diff_percentage) - Math.abs(a.price_diff_percentage))
            .slice(0, 5)
            .map(item => item.ingredient_name);
        
        const sortedIngredientsBar = Object.values(latestByIngredient)
        .sort((a, b) => Math.abs(b.price_diff_percentage) - Math.abs(a.price_diff_percentage))
        .slice(0, 3)
        .map(item => item.ingredient_name);

        // Step 2: Filter results to only include those ingredients
        const filteredResults = results.filter(item => sortedIngredients.includes(item.ingredient_name));

        // Step 3: Group filtered data by ingredient for line chart
        const groupedLine = {};
        filteredResults.forEach(item => {
            const dateISO = new Date(item.purchasedate).toISOString();
            if (!groupedLine[item.ingredient_name]) groupedLine[item.ingredient_name] = [];
            groupedLine[item.ingredient_name].push({
                x: dateISO,
                y: parseFloat(item.current_unit_price)
            });
        });

        // Sort dates in each ingredient group
        Object.keys(groupedLine).forEach(ing => {
            groupedLine[ing].sort((a, b) => new Date(a.x) - new Date(b.x));
        });

        // Step 4: Prepare line chart (Zoomable Time Series)
        const lineSeries = Object.keys(groupedLine).map(name => ({
            name: name,
            data: groupedLine[name]
        }));

        const lineChart = new ApexCharts(document.querySelector("#lineChart"), {
            chart: {
                type: 'line',
                height: 350,
                zoom: {
                    enabled: true,
                    type: 'x',
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom',
                    tools: {
                        zoom: true,
                        zoomin: true,
                        zoomout: true,
                        pan: true,
                        reset: true
                    }
                }
            },
            series: lineSeries,
            title: {
                text: "Daywise Top 5 Ingredients Price Movement"
            },
            xaxis: {
                type: 'datetime',
                title: { text: 'Purchase Date' }
            },
            yaxis: {
                title: { text: 'Current Unit Price ($)' }
            },
            tooltip: {
                x: {
                    format: 'yyyy-MM-dd'
                },
                y: {
                    formatter: val => "$" + val.toFixed(2)
                }
            }
        });
        lineChart.render();

        // Step 5: Bar chart for latest unit prices and price difference
        const latestBarData = sortedIngredientsBar.map(name => {
            const item = latestByIngredient[name];
            return {
                name: item.ingredient_name,
                diff: parseFloat(item.price_diff_percentage),
                current: parseFloat(item.current_unit_price),
                last: parseFloat(item.last_unit_price)
            };
        });

        const barSeries = [
        {
            name: "Current Unit Price",
            data: latestBarData.map(i => ({
                x: `${i.name}`,
                y: i.current,
                invoiceid: i.invoiceid
            }))
        },
        {
            name: "Last Unit Price",
            data: latestBarData.map(i => ({
                x: `${i.name}`,
                y: i.last,
                invoiceid: i.invoiceid
            }))
        }
    ];


        const barLabels = latestBarData.map(i => i.name);

        const barChart = new ApexCharts(document.querySelector("#barChart"), {
            chart: {
                type: 'bar',
                height: 350
            },
            series: barSeries,
            title: {
                text: "Latest 3 Ingredients - Price Comparison & Change"
            },
            xaxis: {
                categories: barLabels,
                title: { text: 'Ingredient' }
            },
            yaxis: {
                title: { text: 'Price / % Change' }
            },
            tooltip: {
                y: {
                    formatter: val => isNaN(val) ? val : val.toFixed(2)
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%'
                }
            }
        });
        barChart.render();
    }
</script>
