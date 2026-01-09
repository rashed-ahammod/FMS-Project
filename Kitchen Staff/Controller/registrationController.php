<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once '../../Model/Staff/registrationModel.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $accountType = $_POST['accounttype'];


    
}
?>