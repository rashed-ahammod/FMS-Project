<?<php>

function getAllMenu(){
    $con=getConnection();
    $sql="SELECT * FROM menu ORDER BY menu_id DESC";
    return mysqli_query($con,$sql);
}