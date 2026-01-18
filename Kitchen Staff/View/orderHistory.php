<?php
require_once '../Controller/historyController';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link rel="stylesheet" href="../CSS/order_history.css">
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
<table>
<tr>
    <th>Order ID</th>
    <th>User ID</th>
    <th>Total Price</th>
    <th>Order Time</th>
    <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($orders)) { ?>
<tr>
    <td><?php echo $row['order_id']; ?></td>
    <td><?php echo $row['user_id']; ?></td>
    <td><?php echo number_format($row['total_amount'], 2); ?> ৳</td>
    <td><?php echo $row['order_time']; ?></td>
    <td><?php echo $row['order_status']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>