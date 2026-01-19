<?php

session_start();


if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}

if (!isset($_SESSION['admin'])) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Unauthorized"
    ]);
    exit;
}
require_once '../Model/order_trackingModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  $data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['order_id'], $data['order_status'])) {
    header("Content-Type: application/json");
    echo json_encode([
        "success" => false,
       // "message" => "Invalid JSON data"
    ]);
    exit;
}

$order_id = $data['order_id'];
$status   = $data['order_status'];

if (empty($order_id) || empty($status)) {
    echo json_encode([
        "success" => false,
        "message" => "Order ID or status missing"
    ]);
    exit;
}

$result = updateOrderStatus($order_id, $status);
header("Content-Type: application/json");
if ($result) {
    echo json_encode([
        "success" => $result,
       // "message" => "Order status updated successfully",
        "order_id" => $order_id,
        "order_status" => $status
    ]);
} else {
    echo json_encode([
        "success" => false,
       // "message" => "Failed to update order status"
    ]);
}
exit;
}
?>