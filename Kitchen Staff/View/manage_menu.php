<?php
session_start();
require_once '../Model/manage_menuMode.php';
$menus=getAllMenu();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Menu</title>
        <link rel="stylesheet" href="../CSS/manage_menu.css">

</head>
<body>
    <h2>Manage Menu<h2>

    <?php
    if(isset($_SESSION['error'])){?>
        <p class="error"><?=$_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']);}?>
    

    <form method="POST" action="../Controller/manage_menuController.php" enctype="multipart/form-data">
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
<?php while($row=mysqli_fetch_assoc($menus)){?>

<tr>
        <td>
        <input type="text" id="name<?=$row['menu_id']?>" value="<?=$row['name']?>">
</td>

    <td>
        <input type="number" id="price<?=$row['menu_id']?>" value="<?=$row['price']?>">
</td>

<td>
<textarea id="desc<?=$row['menu_id']?>"><?=htmlspecialchars($row['description']) ?></textarea>
</td>

<td>
   <button type="button" id="toggle<?=$row['menu_id']?>" class="<?=$row['availability'] ? 'on' : 'off'?>"
    onclick="toggleStatus(<?= $row['menu_id'] ?>, <?= $row['availability'] ?>)"> <?=$row['availability'] ? 'Available' : 'Unavailable'?>
</button>
</td>

<td>
    <button type="button" onclick="ajaxUpdate(<?= $row['menu_id'] ?>)">Update</button>
    <a href="manage_menuController.php?delete=<?= $row['menu_id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
    

</td>
</tr>
<?php } ?>
</table>
<script src="../JS/manage_menu.js"></script>

</body>
 </html>
