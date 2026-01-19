<?php

session_start();


if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}

if (!isset($_SESSION['admin'])) {
    header("Location: /FMS/View/Login.php");
    exit();
}
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