<?php
session_start();
require_once '../Model/manage_menuMode.php';


if(isset($_POST['add'])){
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

     $image = $_FILES['image'];
    $img_name = $image['name'];
    $img_size = $image['size'];
    $tmp_name = $image['tmp_name'];

       $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        $check = getimagesize($tmp_name);
    if ($check === false) {
        $_SESSION['error'] = "File is not a valid image";
        header('location: ../View/manage_menu.php');
        exit;
    }
        if ($img_size > 500000) {
        $_SESSION['error'] = "Image size must be less than 500KB";
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

if (isset($_POST['update'])) {

    $menu_id = $_POST['update'];
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);

    if ($name === "" || $price === "" || $description === "") {
        echo "validation_failed";
        exit;
    }

    updateMenu($menu_id, $name, $price, $description);
    echo "success";
    exit;
}
if (isset($_POST['toggle'])) {

    toggleMenuStatus($_POST['toggle'], $_POST['status']);
    echo "success";
    exit;
}

if (isset($_POST['toggle'])) {

    toggleMenuStatus($_POST['toggle'], $_POST['status']);
    echo "success";
    exit;
}
?>
