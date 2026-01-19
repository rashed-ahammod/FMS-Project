<?php
require_once 'connection.php';

function getAllFeedbacks() {
    $conn = getConnection();

    $sql = "
        SELECT 
            f.feedback_id,
            f.feedback_message,
            f.feedback_reply,
            f.order_id,
            u.Name AS customer_name
        FROM feedback f
        JOIN orders o ON f.order_id = o.order_id
        JOIN user u ON o.user_id = u.user_id
        ORDER BY f.feedback_id DESC
    ";

    return mysqli_query($conn, $sql);
}

function replyFeedback($feedback_id, $reply) {
    $conn = getConnection();

    $reply = mysqli_real_escape_string($conn, $reply);

    $sql = "
        UPDATE feedback 
        SET feedback_reply = '$reply'
        WHERE feedback_id = $feedback_id
          AND feedback_reply = ''
    ";

    return mysqli_query($conn, $sql);
}
