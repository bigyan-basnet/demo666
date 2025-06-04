<?php
require_once 'config.php'; // Connect to RDS

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Insert new car
if (isset($_POST['submit'])) {
    $car_year = mysqli_real_escape_string($con, $_POST['car_year']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
    $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
    $booked = 0;

    $sql = "INSERT INTO car (car_year, car_model, car_colour, rental_price, booked) 
            VALUES ('$car_year', '$car_model', '$car_colour', '$rental_price', '$booked')";

    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "<script>alert('Car record inserted successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}

// Delete car if "del" parameter is set
if (isset($_GET['del'])) {
    $car_id = intval($_GET['del']);
    $delete_sql = "DELETE FROM car WHERE ID = $car_id";
    mysqli_query($con, $delete_sql);
    echo "<script>alert('Car deleted successfully.'); window.location.href='car_details.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        form {
            width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 10px;
        }
        form input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        .delete a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h2>Add a New Car</h2>
    <form method="POST">
        <label>Car Manufacture Year:</label>
        <input type="number" name="car_year" placeholder="e.g. 2021" required>

        <label>Car Model:</label>
        <input type="text" name="car_model" required>

        <label>Car Colour:</label>
        <input type="text" name="car_colour" required>

        <label>Rental Price per Day ($):</label>
        <input type="number" step="0.01" name="rental_price" required>

        <input type="submit" name="submit" value="Add Car">
    </form>

    <h2>Available Cars</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Year</th>
                <th>Colour</th>
                <th>Price per Day</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
            $i = 1;
            while ($row = mysqli_fetch_assoc($cr)) {
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['car_model']}</td>
                        <td>{$row['car_year']}</td>
                        <td>{$row['car_colour']}</td>
                        <td>\${$row['rental_price']}</td>
                        <td class='delete'><a href='car_details.php?del={$row['ID']}' onclick=\"return confirm('Are you sure?')\">Delete</a></td>
                      </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>

</body>
</html>
