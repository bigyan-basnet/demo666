<?php
require_once 'config.php'; // Make sure config.php is in the same folder

// Enable error reporting during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $car_year = mysqli_real_escape_string($con, $_POST['car_year']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
    $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
    $booked = 0; // default value

    $sql = "INSERT INTO car (car_year, car_model, car_colour, rental_price, booked) 
            VALUES ('$car_year', '$car_model', '$car_colour', '$rental_price', '$booked')";

    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "<script>alert('Car Record Inserted');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Add New Car</title>
    <link rel="stylesheet" href="css/add_car.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background: #f8f8f8;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
        }
        label {
            display: block;
            margin: 15px 0 5px;
        }
        input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        .submit-button {
            background: #28a745;
            color: white;
            padding: 10px;
            margin-top: 20px;
            width: 100%;
            border: none;
            cursor: pointer;
        }
        .submit-button:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Car</h1>
        <form action="" method="POST">
            <label for="car_year">Car Manufacture Year:</label>
            <input name="car_year" type="number" id="car_year" placeholder="e.g. 2022" required>

            <label for="car_model">Car Model:</label>
            <input name="car_model" type="text" id="car_model" required>

            <label for="car_colour">Car Color:</label>
            <input name="car_colour" type="text" id="car_colour" required>

            <label for="rental_price">Rental Price per Day:</label>
            <input name="rental_price" type="number" step="0.01" id="rental_price" required>

            <button class="submit-button" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
