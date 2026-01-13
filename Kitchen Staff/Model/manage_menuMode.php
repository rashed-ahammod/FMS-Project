<?php
require_once 'connection.php';
function getAllMenu(){
    $conn=getConnection();
    $sql="SELECT * FROM menu ORDER BY menu_id DESC";
    return mysqli_query($conn,$sql);
}

function addMenu($data,$files){
    $conn=getConnection();
    $name=$data['name'];
    $price=$data['price'];
    $description=$data['description'];

    $img_name = $files['image']['name'];
    $tmp_name = $files['image']['tmp_name'];

    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $new_name = time() . "_" . rand(1000, 9999) . "." . $img_ext;
     $upload_path = "../../images/" . $new_name;

     if(!move_uploaded_file($tmp_name,$upload_path)){
return false;
     }
     $image_path=$new_name;
        $sql = "INSERT INTO menu (name, price, description, image, availability)
            VALUES ('$name', '$price', '$description', '$image_path', 1)";
            return mysqli_query($con,$sql);

}
?>