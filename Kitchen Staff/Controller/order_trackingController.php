<?php
requiire_once '../Model/order_trackingModel.php';
header("Content-Type: application/json");
$rawData = file_get_contents("php://input");


$data = json_decode($rawData, true);
if ($data === null) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid JSON data"
    ]);
    exit;
}

$order_id = $data['order_id'] ?? null;
$status   = $data['status'] ?? null;

if (empty($order_id) || empty($status)) {
    echo json_encode([
        "success" => false,
        "message" => "Order ID or status missing"
    ]);
    exit;
}

$result = updateOrderStatus($order_id, $status);
if ($result) {
    echo json_encode([
        "success" => true,
        "message" => "Order status updated successfully",
        "order_id" => $order_id,
        "status" => $status
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to update order status"
    ]);
}
?>