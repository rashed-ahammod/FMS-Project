<?php
require_once 'connection.php';
function regUser($user){
    global $conn; 


    $sql = "INSERT INTO user (`Name`, `Contact No`, `Address`, `Email`, `Password`, `Account Type`) 
            VALUES ('{$user['name']}', '{$user['contactno']}', '{$user['address']}', '{$user['email']}', '{$user['password']}', '{$user['accountType']}')";

    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn); 
        return false;
    }
}
?>