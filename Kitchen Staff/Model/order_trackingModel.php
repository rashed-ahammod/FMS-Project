<?php
require_once 'connection.php';

function getKitchenOrders() {
    $conn=getConnection();
     $sql = "
        SELECT 
            o.order_id,
            o.status,
            m.name AS food_name,
            oi.quantity
        FROM orders o
        JOIN order_item oi ON o.order_id = oi.order_id
        JOIN menu m ON oi.menu_id = m.menu_id
        WHERE o.status != 'Delivered'
        ORDER BY o.order_time ASC";

    return mysqli_query($conn, $sql);
}

function updateOrderStatus($order_id, $status) {
    $conn = getConnection();

    $sql = "UPDATE orders SET status='$status' WHERE order_id='$order_id'";

    return mysqli_query($conn, $sql);
}

