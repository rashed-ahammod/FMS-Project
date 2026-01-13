<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Menu</title>

</head>
<body>
    <h2>Manage Menu<h2>

    <?php
    if(isset($_SESSION['error'])){?>
        <p class="error"><?=$_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']);}?>
    

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Food Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <textarea name="description" required></textarea>
        <input type="file" name="image" required>
        <button type="submit" name="add">Add Item</button>
</form>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Food Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
</tr>

<tr>

    <td>
        <input type="number" id="price<?=$row['menu_id']?>" value="<?=$row['price']?>">
</td>

<td>
<textarea id="desc<?=row['menu_id']?>"><?=$row['description']?></textarea>
</td>

<td>
    <button type="button" id="toggle<?=$row['menu_id']?>" class="<?=$row[ 'availability' ] ? 'on' : 'off'?>" onclick="togglestatus()">
        <?=$row['availability'] ? 'Available' : 'Unavailable'?>
</button>
</td>

<td>
    <button type="button" onclick="ajaxupdte()">Update</button>
    

</td>
</tr>
</table>
</body>
 </html>
