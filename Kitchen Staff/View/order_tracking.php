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
</table>