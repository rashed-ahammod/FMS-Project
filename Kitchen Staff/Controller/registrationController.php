<?php
include '../Model/user.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword']; 
    $accountType = $_POST['accounttype'];

    if($password !== $confirmPassword){
        echo "<script>alert('Passwords do not match!'); window.location.href='../View/Registration.php';</script>";
        exit();
    }

    $user = [
        'name'=> $name,
        'contactno' => $contactno, 
        'address' => $address,
        'email' => $email,
        'password' => $password, 
        'accountType' => $accountType
    ];

    $status = regUser($user);

    if($status){
        echo "<script>alert('Registration Successful'); window.location.href='../View/Login.php';</script>";
        exit();
    } else {

    }

} else {
    echo "Invalid Request.";
}
?>