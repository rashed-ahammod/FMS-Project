<?php
require_once 'connection.php';

function getAllOrders() {
    $conn=getConnection();
   $sql = "SELECT * FROM orderlist WHERE status != 'Delivered' ORDER BY order_time ASC";
    $result = mysqli_query($conn, $sql);
    if(!$result) die("Query Failed: " . mysqli_error($conn));
    return $result;
}

function updateOrderStatus($order_id, $status) {
    $conn = getConnection();

    $sql = "UPDATE orderlist  SET status='$status'  WHERE order_id=$order_id";

    return mysqli_query($conn, $sql);
}

