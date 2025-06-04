<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>EzyRentals</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    header {
      background-color: #0d1b2a;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar-logo {
      font-size: 1.8rem;
      font-weight: 600;
      color: #fff;
      text-decoration: none;
    }

    .navbar-logo .rental {
      color: #ff6b6b;
    }

    .nav_links {
      display: flex;
      list-style: none;
      gap: 25px;
    }

    .nav-item {
      position: relative;
    }

    .nav-link {
      text-decoration: none;
      color: #ccc;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      color: #ff6b6b;
    }

    .last-menu-group h2 {
      font-size: 1rem;
      color: #a9f1df;
      margin-right: 10px;
    }

    .last-menu-group a.nav-link {
      background-color: #ff6b6b;
      padding: 5px 15px;
      border-radius: 5px;
      color: white;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .last-menu-group a.nav-link:hover {
      background-color: #d94444;
    }

    .menu-logo {
      display: none;
    }

    @media (max-width: 768px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav_links {
        flex-direction: column;
        gap: 15px;
        margin-top: 10px;
      }

      .menu-logo {
        display: block;
        cursor: pointer;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="first-menu-group">
    <a class="navbar-logo" href="index.php">Ezy<span class="rental">Rentals</span></a>
  </div>

  <div class="middle-menu-group">
    <ul class="nav_links">
      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
      <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
      <li class="nav-item"><a href="price.php" class="nav-link">Pricing</a></li>
      <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
    </ul>
  </div>

  <div class="last-menu-group">
    <ul class="nav_links">
      <?php
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $first_name = $_SESSION['username'];
        echo "<li class='nav-item'><h2>Welcome, $first_name!</h2></li>";
        echo "<li class='nav-item'><a href='logout.php' name='logout' class='nav-link'>Logout</a></li>";
      } else {
        echo "<li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>";
      }
      ?>
    </ul>
  </div>
</header>

</body>
</html>
