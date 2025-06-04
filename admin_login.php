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
