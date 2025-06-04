<?php
session_start();
require_once 'config.php'; // use the shared config with correct RDS credentials

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    if (empty($uname) || empty($password)) {
        echo "you cannot leave username and password empty";
    } else {
        $sql = "SELECT * FROM user_registration WHERE username='$uname' AND is_admin = true";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $check = mysqli_fetch_assoc($result);

            // NOTE: In real-world, use password_verify() for hashed passwords
            if ($check['password'] == $password) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $uname;
                header("location:admin_view.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password or not an admin.');</script>";
            }
        } else {
            echo "<script>alert('User not found or not admin.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html>

<link rel="stylesheet" href="css/login.css">

<head>
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
             <div class="title">Admin Login
    </div>


    <div class="input-box underline">
        <input type="text" name="username" placeholder="Enter Your Username" required />
        <div class="underline"></div>
    </div>


    <div class="input-box">
        <input type="password" name="password" placeholder="Enter Your Password" required />
        <div class="underline"></div>
    </div>


    <div class="input-box button">
        <input type="submit" name="login" value="Sign In" />
    </div>
    </form>
    </div>
</body>

</html>
