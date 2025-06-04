<?php
require_once 'config.php'; // Connect to RDS

// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $sql = "INSERT INTO contact (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";
    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo '<script>alert("Message sent successfully!");</script>';
        // Optional redirect:
        // echo '<script>window.location.href="thank_you.php";</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Us | EzyRentals</title>
  <link rel="stylesheet" href="css/contact.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f4f4f4;
    }

    .main-page {
      position: relative;
      height: 100vh;
      background: url('css/images/bg-1.jpg') no-repeat center center/cover;
    }

    .main-page::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(6px);
      background-color: rgba(0, 0, 0, 0.4);
    }

    .contact-form {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 90%;
      max-width: 500px;
      transform: translate(-50%, -50%);
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
      padding: 30px;
      z-index: 1;
    }

    .contact-form h2 {
      margin-top: 0;
      text-align: center;
      font-weight: 600;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group input,
    .form-msg-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      font-family: 'Poppins';
    }

    .form-msg-group textarea {
      resize: none;
    }

    .submit-btn {
      text-align: center;
    }

    .sub-btn {
      padding: 12px 25px;
      font-size: 16px;
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .sub-btn:hover {
      background-color: #e03c3c;
    }

    @media (max-width: 600px) {
      .contact-form {
        padding: 20px;
      }

      .form-msg-group textarea {
        height: 120px;
      }
    }
  </style>
</head>
<body>

  <div class="main-page">
    <div class="contact-form">
      <h2>Contact Us</h2>
      <form action="" method="POST">
        <div class="form-group">
          <input type="text" name="name" placeholder="Your Name" required />
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Your Email" required />
        </div>
        <div class="form-group">
          <input type="text" name="subject" placeholder="Subject" required />
        </div>
        <div class="form-msg-group">
          <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
        </div>
        <div class="submit-btn">
          <button class="sub-btn" type="submit" name="submit">Send Message</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
