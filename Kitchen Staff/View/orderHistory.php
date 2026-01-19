<?php
session_start();
if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}


if (!isset($_SESSION['admin'])) {
    header("Location: /FMS/View/Login.php");
    exit();
}
require_once '../Controller/historyController';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link rel="stylesheet" href="../CSS/order_history.css">
</head>
<body>
    <div class="header">
    <div class="logo">
        <span>Kitchen Panel</span>
    </div>

    <div class="nav-buttons">
        <a href="../View/dashboard.php">Home</a>
        <a href="../View/order_tracking.php" class="active">Order Tracking</a>
        <a href="../View/manage_menu.php">Manage Menu</a>
        <a href="../View/feedback.php">Feedback</a>
        <a href="../View/logoutController.php" class="logout">Logout</a>
    </div>
</div>

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