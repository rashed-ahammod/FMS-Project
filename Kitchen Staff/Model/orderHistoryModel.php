<?php
require_once 'connection.php';

function getOrderHistory() {
    $conn = getConnection();

    $sql = "
        SELECT 
            order_id,
            user_id,
            order_time,
            order_status,
            total_amount
        FROM orders
        WHERE order_status IN ('Delivered','Cancelled')
        ORDER BY order_time DESC
    ";

    return mysqli_query($conn, $sql);
}


function getTodaySummary() {
    $conn = getConnection();

    $sql = "
        SELECT 
            COUNT(*) AS total_orders,
            COALESCE(SUM(total_amount),0) AS total_payment
        FROM orders
        WHERE order_status = 'Delivered'
    ";

    return mysqli_fetch_assoc(mysqli_query($conn, $sql));
}

