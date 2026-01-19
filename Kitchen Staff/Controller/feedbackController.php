<?php
require_once '../Model/feedbackModel.php';

if (isset($_POST['feedback_id']) && isset($_POST['reply'])) {

    $feedback_id = intval($_POST['feedback_id']);
    $reply = trim($_POST['reply']);

    if ($reply === '') {
        header("Location: ../View/feedback.php");
        exit;
    }

    replyFeedback($feedback_id, $reply);

    header("Location: ../View/feedback.php");
    exit;
}
?>