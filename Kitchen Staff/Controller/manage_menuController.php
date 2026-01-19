<?php
session_start();
if (!isset($_SESSION['admin']) && isset($_COOKIE['remember_role'])) {
    if ($_COOKIE['remember_role'] === 'admin') {
        $_SESSION['admin'] = true;
    }
}


if (!isset($_SESSION['admin'])) {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit();
}
require_once '../Model/manage_menuMode.php';


if(isset($_POST['add'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $description=$_POST['description'];


        if ($name == "" || $price == "" || $category == "" || $description == "") {
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
        'category'=>$category,
        'description'=>$description
    ];
    $result=addMenu($data,$_FILES);
    if ($result) {
        $_SESSION['success'] = "Menu added successfully";
    } else {
        $_SESSION['error'] = "Failed to add menu";
    }

    header('location: ../View/manage_menu.php');
}
    // header('location: ../View/manage_menu.php');



$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (is_array($data) && isset($data['action'])) {

 
    if ($data['action'] === 'update') {

        $menu_id = $data['menu_id'];
        $name = trim($data['name']);
        $price = trim($data['price']);
        $category = trim($data['category']);
        $description = trim($data['description']);

        if ($name === "" || $price === "" || $category === "" || $description === "") {
         echo json_encode([
        "success" => false,
        "message" => "Validation failed"
]);

            exit;
        }

        $success = updateMenu($menu_id, $name, $price, $category, $description);

        echo json_encode([
            "success" => $success
        ]);
        exit;
    }
    if ($data['action'] === 'toggle') {

        $menu_id = $data['menu_id'];
        $status = $data['status'];

        $success = toggleMenuStatus($menu_id, $status);

        
     echo json_encode([
     "success" => $success,
     "new_status" => $status
]);

        exit;
    }
}
?>
