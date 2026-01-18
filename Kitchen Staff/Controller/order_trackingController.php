<?php
require_once '../Model/order_trackingModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$rawData = file_get_contents("php://input");


$data = json_decode($rawData, true);
if (!isset($data['order_id'], $data['status'])) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid JSON data"
    ]);
    exit;
}

$order_id = $data['order_id'] 
$status   = $data['status'] 

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
        "status" => $status
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