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

<!-- ===== Header / Navigation Bar ===== -->
<div class="header">
    <div class="logo">
        <span>Kitchen Panel</span>
    </div>

    <div class="nav-buttons">
        <a href="dashboard.php">Home</a>
        <a href="order_tracking.php" class="active">Order Tracking</a>
        <a href="order_history.php">Order History</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

    <h2>Manage Menu<h2>

    <?php
    if (isset($_SESSION['error'])) { ?>

    <script>
        alert("<?php echo $_SESSION['error']; ?>");
    </script>
    <?php unset($_SESSION['error']); } ?>

    <?php 
    if (isset($_SESSION['success'])) { ?>
    <script>
        alert("<?php echo $_SESSION['success']; ?>");
    </script>
     <?php unset($_SESSION['success']); }?>
    

    <form method="POST" action="../Controller/manage_menuController.php" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Food Name" >
        <input type="number" name="price" placeholder="Price">
         <input type="text" name="category" placeholder="Category">
        <textarea name="description"></textarea>
        <input type="file" name="image">
        <button type="submit" name="add">Add Item</button>
</form>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Food Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
</tr>
<?php while($row=mysqli_fetch_assoc($menus)){
    
        
        $menuId = $row['menu_id'];
        $availability = (int)$row['availability'];

        $statusText  = $availability ? 'Available' : 'Unavailable';
        $statusClass = $availability ? 'on' : 'off';
    
    
    ?>

<tr>
        <td>
        <input type="text" id="name<?=$row['menu_id']?>" value="<?=$row['name']?>">
</td>

    <td>
        <input type="number" id="price<?=$row['menu_id']?>" value="<?=$row['price']?>">
</td>

<td>
        <input type="text" id="category<?=$row['menu_id']?>" value="<?=$row['category']?>">
</td>

<td>
<textarea id="desc<?=$row['menu_id']?>"><?=htmlspecialchars($row['description']) ?></textarea>
</td>

<td>
     <button type="button" id="toggle<?php echo $menuId; ?>" class="<?php echo $statusClass; ?>"
     onclick="toggleStatus(<?php echo $menuId; ?>, <?php echo $availability; ?>)">
    <?php echo $statusText; ?>
    </button>
</td>

<td>
        <button type="button"  onclick="UpdateStatus(<?php echo $menuId; ?>)"> Update</button>
        <a href="../Controller/manage_menuController.php?delete=<?= $row['menu_id'] ?>" 
        onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
    

</td>
</tr>
<?php } ?>
</table>
<script src="../JS/manage_menu.js"></script>

</body>
 </html>
