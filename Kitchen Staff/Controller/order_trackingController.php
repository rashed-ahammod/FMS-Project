<?php
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
?>