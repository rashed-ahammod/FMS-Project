<?php



include '../Model/login_DB.php';

$email = $password = "";
$emailErr = $passErr = "";
$loginSuccess = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate email
    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    } 
    else 
    {
        $email = trim($_POST["email"]);
    }
    // Validate password
    if (empty($_POST["password"])) 
    {
        $passErr = "Password is required";
    } 
    else 
    {
        $password = trim($_POST["password"]);
    }
    // Check database
    if (empty($emailErr) && empty($passErr))
    {

        if ($email === 'admin@gmail.com' && $password === '123') {

        $_SESSION['admin'] = true;
        

                    if (isset($_POST['remember_me'])) {
                setcookie("remember_email", $email, time() + (86400 * 7), "/");
                setcookie("remember_role", "admin", time() + (86400 * 7), "/");
            }

            header("Location: /FMS/Kitchen Staff/View/dashboard.php");
            exit();
        // echo "<script>
        //     alert('Kitchen Staff Login Successful');
        //     window.location.href = '/FMS/Kitchen Staff/View/dashboard.php';
        // </script>";
        // exit();
    }
   
        $safe_email = mysqli_real_escape_string($conn, $email);
        $safe_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM user WHERE email='$safe_email' AND password='$safe_password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['accountType'] = 'customer';
            $_SESSION['cart'] = [];

            if (isset($_POST['remember_me'])) {
                setcookie("remember_email", $row['Email'], time() + (86400 * 7), "/");
                setcookie("remember_role", "customer", time() + (86400 * 7), "/");
            }

            header("Location: /FMS/Customer/View/CustomerDashboard.php");
            exit();
            // echo"<script>
            // alert('Login Successful');
            // window.location.href = 'CustomerDashboard.php';           
            // </script>";
            // $loginSuccess = true;
        } 
        else 
        {
            echo"<script>alert('Invalid email or password');</script>";
        }
        
    }
}
?>