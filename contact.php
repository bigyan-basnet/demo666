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
    /* [same styles from your original code] */
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

