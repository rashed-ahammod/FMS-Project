<?php
require_once '../Model/feedbackModel.php';
$feedbacks = getAllFeedbacks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedback</title>
    
</head>
<body>

<h2>Customer Feedback</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Feedback</th>
        <th>Reply</th>
        <th>Action</th>
    </tr>
