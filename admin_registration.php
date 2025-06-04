<?php
require_once 'config.php'; // Ensure config.php contains the RDS connection

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $is_admin = 1;

    // Check if username already exists
    $sql = "SELECT * FROM user_registration WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    $check = mysqli_fetch_assoc($result);

    if ($check && $check['username'] == $username) {
        echo "<script>alert('Username already exists. Please choose a different one.');</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Hash password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_sql = "INSERT INTO user_registration 
            (first_name, middle_name, last_name, username, password, is_admin)
            VALUES 
            ('$first_name', '$middle_name', '$last_name', '$username', '$hashed_password', '$is_admin')";

        $rs = mysqli_query($con, $insert_sql);

        if ($rs) {
            echo "<script>alert('Admin account created successfully!'); window.location.href='admin_login.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="css/register.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background: #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .user-details .input-box {
            margin-bottom: 15px;
        }
        .input-box input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .details {
            font-weight: bold;
        }
        .button input {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
        }
        .button input:hover {
            background: #0056b3;
        }
        .button a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Admin User Registration</div>
        <div class="content">
            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="first_name" placeholder="Mr." required />
                    </div>
                    <div class="input-box">
                        <span class="details">Middle Name</span>
                        <input type="text" name="middle_name" placeholder="" />
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="last_name" placeholder="Bean" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Admin Username</span>
                        <input type="text" name="username" placeholder="Enter your username" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="*******" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="confirm_password" placeholder="Confirm your password" required />
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Create an account" />
                </div>
                <div class="button">
                    <p>Already have an account?</p>
                    <a href="admin_login.php">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

