<!DOCTYPE html>

<html>
<head>
    
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/registration.css">
    
</head>
<body>
    <h1><center>Register Form</center></h1>
    <form action="" method="post">

        <label for="name">Username:</label><br>
        <input type="text" id="name" name="name" required><br><br>

         <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>
       

         <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

         <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

         <label for="confirmpassword">Confirm Password:</label><br>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>

                <label for="accounttype">Account Type:</label><br>
        <select id="accounttype" name="accounttype" required>
            <option value="customer">Customer</option>
            <option value="kitchenstaff">Kitchen Staff</option>
        </select><br><br>
    
        
        <button type="submit">Register</button>
    </form>

</body>
</html>