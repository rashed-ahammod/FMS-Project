<?php
require_once '../Model/order_trackingModel.php';
$orders = getKitchenOrders();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kitchen Orders</title>
    <link rel="stylesheet" href="../CSS/order_tracking.css">
</head>
<body>
    <div class="header">
    <div class="logo">
        <span>Kitchen Panel</span>
    </div>

    <div class="nav-buttons">
        <a href="../View/dashboard.php">Home</a>
        <a href="../View/manage_menu.php" class="active">Order Tracking</a>
        <a href="../View/orderHistory.php">Order History</a>
        <a href="../View/feedback.php">Feedback</a>
        <a href="../View/logout.php" class="logout">Logout</a>
    </div>
</div>

<h2>Kitchen Orders</h2>

<table>
<tr>
    <th>Order ID</th>
    <th>Items</th>
    <th>Status</th>
    <th>Update</th>
</tr>

<?php
$currentOrder = null;
$items = [];

while ($row = mysqli_fetch_assoc($orders)) {

    if ($currentOrder !== $row['order_id']) {

        if ($currentOrder !== null) {
            echo row($currentOrder, $items, $currentStatus);
        }

        $currentOrder = $row['order_id'];
        $currentStatus = $row['order_status'];
        $items = [];
    }

    $items[] = ($row['food_name'] . " x" . ($row['quantity'] ?? 0));
}

if ($currentOrder !== null) {
    echo row($currentOrder, $items, $currentStatus);
}

function row($orderId, $items, $status) {
    $list = implode("<br>", $items);

    return "
    <tr>
        <td>$orderId</td>
        <td>$list</td>
        <td id='status$orderId'>$status</td>
        <td>
            <select onchange=\"updateOrder($orderId,this.value)\">
                <option value='Pending' ".($status=='Pending'?'selected':'').">Pending</option>
                <option value='Cooking' ".($status=='Cooking'?'selected':'').">Cooking</option>
                <option value='Ready' ".($status=='Ready'?'selected':'').">Ready</option>
                <option value='Delivered' ".($status=='Delivered'?'selected':'').">Delivered</option>
            </select>
        </td>
    </tr>";
}
?>

</table>

<script src="../JS/order_tracking.js"></script>
</body>
</html>
