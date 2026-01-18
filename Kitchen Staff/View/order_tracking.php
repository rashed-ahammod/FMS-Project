<?php
require_once '../Controller/order_trackingController.php';
$orders = getKitchenOrders();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kitchen Orders</title>
    <link rel="stylesheet" href="../CSS/order.css">
</head>
<body>

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
        $currentStatus = $row['status'];
        $items = [];
    }

    $items[] = $row['food_name'] . " x" . $row['quantity'];
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

<script src="../JS/order.js"></script>
</body>
</html>
