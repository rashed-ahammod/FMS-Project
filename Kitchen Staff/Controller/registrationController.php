<?php

function regController(){


   require_once '../../Model/Staff/registrationModel.php';

    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $accountType = $_POST['accounttype'];  
    $user={
        'name' => $name,
        'contactno' => $contactno,
        'address' => $address,
        'email' => $email,
        'password' => $password,
        'confirmPassword' => $confirmPassword,
        'accountType' => $accountType
    };
    $status = regUser($user);
    if($status){
        return true;
    } else {
        return false;
    }
    if($_SERVER['REQUEST_METHOD'] =='POST'){
        if(regController()){
            header
        } else {
            echo "Registration Failed. Please try again.";
        }
    }
    else {
        echo "Invalid Request Method.";}
  
}
?>