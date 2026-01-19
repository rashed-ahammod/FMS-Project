<?php
session_start();


if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}


if (!isset($_SESSION['admin'])) {
     header("Location: ../View/Login.php");
}

require_once '../Model/feedbackModel.php';
$feedbacks = getAllFeedbacks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedback</title>
    <link rel="stylesheet" href="../CSS/feedback.css">
    
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
<?php
if ($feedbacks && mysqli_num_rows($feedbacks) > 0) {

    while ($row = mysqli_fetch_assoc($feedbacks)) {

        $feedbackId = $row['feedback_id'];
        $hasReply = !empty($row['feedback_reply']);
?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
        <td><?php echo htmlspecialchars($row['feedback_message']); ?></td>

        <td>
            <?php if (!$hasReply) { ?>
                <form method="POST" action="../Controller/feedbackController.php">
                    <input type="hidden" name="feedback_id"
                           value="<?php echo $feedbackId; ?>">

                    <textarea name="reply" required
                              placeholder="Write reply..."></textarea>
        </td>

        <td>
                    <button type="submit">Reply</button>
                </form>
            <?php } else { ?>
                <textarea disabled><?php
                    echo htmlspecialchars($row['feedback_reply']);
                ?></textarea>
        </td>

        <td>
                <span class="replied">Replied</span>
            <?php } ?>
        </td>
    </tr>

<?php
    }

} else {
?>
    <tr>
        <td colspan="5" style="text-align:center;">
            No feedback found
        </td>
    </tr>
<?php
}
?>

</table>

</body>
</html>
