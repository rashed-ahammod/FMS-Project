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
    $category=$data['category'];
    $description=$data['description'];

    $img_name = $files['image']['name'];
    $tmp_name = $files['image']['tmp_name'];

    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $new_name = time() . "_" . rand(1000, 9999) . "." . $img_ext;
     $upload_path = "../images/" . $new_name;

     if(!move_uploaded_file($tmp_name,$upload_path)){
return false;
     }
     $image_path=$new_name;
        $sql = "INSERT INTO menu (name, price, category, description, image, availability)
            VALUES ('$name', '$price', '$category', '$description', '$image_path', 1)";
            return mysqli_query($conn,$sql);

}

function updateMenu($menu_id, $name, $price, $category, $description)
{
    $con = getConnection();

    $sql = "UPDATE menu 
            SET name='$name',
                price='$price',
                category='$category',
                description='$description'
            
            WHERE menu_id='$menu_id'";

    return mysqli_query($con, $sql);
}
function toggleMenuStatus($menu_id, $status)
{
    $con = getConnection();

    $sql = "UPDATE menu 
            SET availability='$status'
            WHERE menu_id='$menu_id'";

    return mysqli_query($con, $sql);
}
function deleteMenu($menu_id)
{
    $con = getConnection();
    $sql_img = "SELECT image FROM menu WHERE menu_id='$menu_id'";
    $res = mysqli_query($con, $sql_img);
    $row = mysqli_fetch_assoc($res);

$imagePath = "../images/" . $row['image'];

if ($row && file_exists($imagePath)) {
    unlink($imagePath);
}


    $sql = "DELETE FROM menu WHERE menu_id='$menu_id'";
    return mysqli_query($con, $sql);
}

?>