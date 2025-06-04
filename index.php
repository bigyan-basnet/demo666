<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Carbook | EzyRentals</title>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f4;
    }

    .main-page {
      position: relative;
      height: 100vh;
      background: url('css/images/bg-home.jpg') no-repeat center center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .main-page::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(6px);
      background: rgba(0, 0, 0, 0.5);
    }

    .text-container {
      position: relative;
      text-align: center;
      z-index: 1;
      padding: 30px;
      max-width: 800px;
    }

    .text-container h1 {
      font-size: 40px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #fff;
    }

    .text-container p {
      font-size: 18px;
      line-height: 1.8;
      color: #ddd;
    }

    @media (max-width: 768px) {
      .text-container h1 {
        font-size: 28px;
      }
      .text-container p {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>

  <div class="main-page">
    <div class="text-container">
      <h1>Welcome to EzyRentals DevOps Release 0.1 🚗</h1>
      <p>
        Discover and book your dream car with ease. Whether you're planning a weekend adventure or a business trip,<br>
        our platform offers a variety of top-tier vehicles at competitive prices.
        <br><br>
        Let’s drive your journey forward — fast, reliable, and affordable.
      </p>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
