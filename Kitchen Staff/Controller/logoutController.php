<?php
session_start();


$_SESSION = [];
session_destroy();


if (isset($_COOKIE['remember_email'])) {
    setcookie("remember_email", "", time() - 3600, "/");
}

if (isset($_COOKIE['remember_role'])) {
    setcookie("remember_role", "", time() - 3600, "/");
}

header("Location: ../View/login.php");
exit();

?>
