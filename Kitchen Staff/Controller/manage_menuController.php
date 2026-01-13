<?php
session-start();
require_once '../Model/manage_menuModel.php';
if($_SERVER['REQUEST_ METHOD']=='POST'){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];


        if ($name == "" || $price == "" || $description == "") {
        $_SESSION['error'] = "All fields are required";
        header('location: ../View/manage_menu.php');
        exit;
    }
        if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {
        $_SESSION['error'] = "Image is required";
        header('location: ../View/manage_menu.php');
        exit;
    }

    
    $data=[
        'name'=>$name,
        'price'=>$price,
        'description'=>$description
    ];
    $result=addMenu($data,$_FILES);
    if(!$result){
        $_SESSION['error']="Failed to add menu item";
        header('location: ../View/manage_menu.php');
    }
    else{
         $_SESSION['success'] = "Menu added successfully";
    }
    header('location: ../View/manage_menu.php');

}
?>
