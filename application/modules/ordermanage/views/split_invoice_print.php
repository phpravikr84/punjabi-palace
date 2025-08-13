<!DOCTYPE html>
<html>
<head>
    <title>Split Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .invoice-box { max-width: 800px; margin: auto; padding: 20px; border: 1px solid #eee; }
        .text-center { text-align: center; }
        .table th, .table td { padding: 5px; vertical-align: top; }
    </style>
</head>
<body onload="window.print()">
    <div class="invoice-box">
        <h2 class="text-center">Split Invoice #<?php echo $invoice_no; ?></h2>
        <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
        <p><strong>Invoice No:</strong> <?php echo $saleinvoice; ?></p>
        <p><strong>Table:</strong> <?php echo $table_name; ?></p>
        <p><strong>Customer:</strong> <?php echo $customer_name; ?></p>
        <p><strong>Date:</strong> <?php echo $order_date; ?></p>
        <p><strong>Split Type:</strong> <?php echo $split_type; ?></p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo number_format($item['price'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <p><strong>VAT:</strong> <?php echo $vat; ?></p>
        <p><strong>Discount:</strong> <?php echo $discount; ?></p>
        <p><strong>Service Charge:</strong> <?php echo $s_charge; ?></p>
        <p><strong>Total:</strong> <?php echo $total_price; ?></p>
        <p><strong>Status:</strong> <?php echo $status; ?></p>
    </div>
</body>
</html>