<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pricing | EzyRentals</title>
  <link rel="stylesheet" href="css/price.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
    }

    .main-page {
      position: relative;
      height: 40vh;
      background: url('css/images/bg-3.jpg') no-repeat center center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .main-page::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(6px);
      background: rgba(0, 0, 0, 0.4);
    }

    .text-container {
      position: relative;
      z-index: 1;
      color: white;
    }

    .text-container p {
      margin: 0;
      font-size: 14px;
      opacity: 0.9;
    }

    .text-container h1 {
      margin: 10px 0 0;
      font-size: 36px;
      font-weight: 600;
    }

    .text-info {
      text-align: center;
      padding: 40px 20px 10px;
    }

    .text-info h2 {
      font-size: 28px;
      margin-bottom: 10px;
      font-weight: 600;
      color: #333;
    }

    .text-info p {
      font-size: 16px;
      color: #666;
      max-width: 800px;
      margin: 0 auto;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      border-radius: 12px;
      overflow: hidden;
    }

    .table thead {
      background-color: #2c3e50;
    }

    .table thead th {
      color: #fff;
      font-weight: 500;
      padding: 16px;
      text-align: center;
      font-size: 14px;
    }

    .table td {
      padding: 18px;
      text-align: center;
      font-size: 15px;
      border-bottom: 1px solid #eee;
    }

    .table tbody tr:hover {
      background-color: #fdfdfd;
    }

    .car-image img {
      width: 100px;
      height: auto;
      border-radius: 8px;
      object-fit: cover;
    }

    .blue-color {
      color: #3498db;
      font-weight: 600;
    }

    .light-color {
      color: #888;
      font-size: 13px;
    }

    .car-name {
      font-weight: 600;
      color: #222;
    }

    @media (max-width: 768px) {
      .table th, .table td {
        padding: 12px 6px;
        font-size: 13px;
      }

      .car-image img {
        width: 70px;
      }

      .text-container h1 {
        font-size: 28px;
      }
    }
  </style>
</head>

<body>

  <div class="main-page">
    <div class="text-container">
      <p>HOME > PRICING</p>
      <h1>Our Pricing</h1>
    </div>
  </div>

  <section>
    <div class="text-info">
      <h2>Find Your Perfect Ride</h2>
      <p>With our diverse selection of luxury and economy vehicles, finding the perfect car for your needs has never been easier. Explore pricing details below for your ideal ride.</p>
    </div>

    <div class="container">
      <div class="car-list">
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Car Model</th>
              <th>Per Hour</th>
              <th>Per Day</th>
              <th>Per Month</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $cars = [
              ["car-1.jpg", "Mercedes 2000cc", "$10.99", "$50.99", "$1000.99"],
              ["car-2.jpg", "Audi 550cc", "$15.99", "$55.99", "$1550.99"],
              ["car-3.jpg", "Lamborghini 4750cc", "$18.99", "$70.99", "$2000.99"],
              ["car-4.jpg", "Rolls-Royce Phantom", "$10.99", "$50.99", "$1000.99"],
              ["car-5.jpg", "Bentley Mulsanne", "$10.99", "$50.99", "$1000.99"],
              ["car-6.jpg", "Mercedes-Benz S-Class", "$10.99", "$50.99", "$1000.99"],
              ["car-7.jpg", "BMW 7 Series", "$10.99", "$50.99", "$1000.99"],
              ["car-8.jpg", "Audi A8", "$10.99", "$50.99", "$1000.99"],
              ["car-9.jpg", "Jaguar XJ 2000cc", "$10.99", "$50.99", "$1000.99"],
              ["car-10.jpg", "Aston Martin Rapide", "$10.99", "$50.99", "$1000.99"],
              ["car-11.jpg", "Porsche Panamera", "$10.99", "$50.99", "$1000.99"],
              ["car-12.jpg", "Jaguar XJ 550cc", "$10.99", "$50.99", "$1000.99"]
            ];

            foreach ($cars as $car) {
              echo "<tr>
                      <td class='car-image'><img src='css/images/{$car[0]}' alt='{$car[1]}' /></td>
                      <td class='car-name'>{$car[1]}</td>
                      <td><span class='blue-color'>{$car[2]}</span><br><span class='light-color'>+ $5/hr fuel</span></td>
                      <td><span class='blue-color'>{$car[3]}</span><br><span class='light-color'>+ $25/day fuel</span></td>
                      <td><span class='blue-color'>{$car[4]}</span><br><span class='light-color'>+ $590/month fuel</span></td>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

</body>
</html>
