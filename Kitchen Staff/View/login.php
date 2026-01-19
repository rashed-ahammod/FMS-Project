<?php 
session_start();


if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'customer') {
        $_SESSION['user_id'] = true; 
    }
}


if (isset($_SESSION['admin'])) {
    header("Location: /FMS/Kitchen Staff/View/dashboard.php");
    exit();
}

if (isset($_SESSION['user_id']) && isset($_COOKIE['remember_role']) && $_COOKIE['remember_role'] === 'customer') {
    header("Location: /FMS/Customer/View/CustomerDashboard.php");
    exit();
}

include '../Controller/logincontroller.php'; 
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/Login.css">
</head>

<body>

<form method="POST" action="">
    <h1 style="text-align: center;">Sign in with your email</h1>

    Email:<br>
    <input type="email" name="email" required placeholder="Please write your registered email">
    <?php echo $emailErr; ?>

    <br><br>

    Password:<br>
    <input type="password" name="password" required placeholder="Please write your password">
    <?php echo $passErr; ?>

    <br><br>

    <div class="remember-box">
        <input type="checkbox" name="remember_me"
        <?php echo isset($_COOKIE['remember_email']) ? 'checked' : ''; ?>>
        <label>Remember Me</label>
    </div>

    <button type="submit" name="Login_btn">Login</button>

    <div class="links">
        <a href="Registration.php">Not a user? Sign Up</a><br>
        <a href="#">Forgot Password?</a>
    </div>
</form>

</body>
</html>
