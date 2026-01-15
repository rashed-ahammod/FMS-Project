<?php
require_once 'ordrModel.php';
$orders = getAllOrders();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Tracking</title>
    
</head>
<body>

<h2>Current Orders</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Food</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Update</th>
    </tr>
    <?php while ($order = mysqli_fetch_assoc($orders)) { ?>

   <tr id="order<?php echo $order['order_id']; ?>">
        <td><?php echo $order['order_id']; ?></td>
        <td><?php echo htmlspecialchars($order['Name']); ?></td>
        <td><?php echo htmlspecialchars($order['food_name']); ?></td>
        <td><?php echo $order['quantity']; ?></td>
        <td><?php echo $order['status']; ?></td>
        <td>

            <select onchange="updateOrder(<?php echo $orderId; ?>, this.value)">
                <option value="Pending"   <?php if ($status == 'Pending')   echo 'selected'; ?>>Pending</option>
                <option value="Cooking"   <?php if ($status == 'Cooking')   echo 'selected'; ?>>Cooking</option>
                <option value="Ready"     <?php if ($status == 'Ready')     echo 'selected'; ?>>Ready</option>
                <option value="Delivered" <?php if ($status == 'Delivered') echo 'selected'; ?>>Delivered</option>
            </select>
        </td>
    </tr>

        <?php }?>
</table>