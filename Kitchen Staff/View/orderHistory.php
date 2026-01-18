<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link rel="stylesheet" href="order_history.css">
</head>
<body>

<h2>Order History</h2>

<div class="summary-container">

    <div class="summary-box">
        <h3>Today's Delivered Orders</h3>
        <p><?php echo $todaySummary['total_orders']; ?></p>
    </div>

    <div class="summary-box">
        <h3>Today's Total Payment</h3>
        <p><?php echo number_format($todaySummary['total_payment'], 2); ?> ৳</p>
    </div>

</div>
