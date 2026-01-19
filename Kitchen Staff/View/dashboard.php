
<?php
session_start();

/* Restore admin from cookie */
if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}

/* Protect page */
if (!isset($_SESSION['admin'])) {
    header("Location: ../View/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kitchen Staff Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">


</head>
<body>
    <div class="dashboard_header">
        <div class="logo">Online Food Service Management</div>
        <div class="profile">
            <span class="profile_name">Profile</span>
            <div class="options">
                <a href="profile.php">My Profile</a>
                <a href="">Change Password</a>
                <a href="">Logout</a>
</div>
</div>
</div>
<div class="dashboard">
    <h1>Kitchen Staff Dashboard<h1>
        <div class="feature_list">
            <a href="../View/manage_menu.php" class ="feature">
            <h2>Manage Menu</h2>
                <p>Add,Update or Remove Menu Items</p>
</a>
        <a href="../View/order_tracking.php" class ="feature">
            <h2>Update Order Status</h2>
                <p>Track and Update Order Status</p>
</a>
        <a href="../View/orderHistory.php" class ="feature">
            <h2>Order History</h2>
                <p>All Order History</p>
<!-- </a>
        <a href="" class ="feature">
            <h2>Availability</h2>
                <p>Set Food item wether availabe or unavailabe</p>
</a> -->
        <a href="feedback.php" class ="feature">
            <h2>Review</h2>
                <p>Customer Feedback</p>
</a>
</div>
</div>
</body>
</html>

