<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    
</head>
<body>
    <h1>Register</h1>
    <form action="/register" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

         <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
         <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>

                <label for="accounttype">Account Type:</label>
        <select id="accounttype" name="accounttype" required>
            <option value="customer">Customer</option>
            <option value="kitchenstaff">Kitchen Staff</option>
        </select><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        

        
        <input type="submit" value="Register">
    </form>

</body>
</html>