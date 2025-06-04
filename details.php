<?php
require_once 'config.php'; // Connect to RDS

// Enable errors (for development only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cars</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1 style="text-align:center;">Available Cars</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Rental Price ($/day)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            while ($row = mysqli_fetch_assoc($cr)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['car_model']); ?></td>
                    <td><?php echo htmlspecialchars($row['car_year']); ?></td>
                    <td><?php echo htmlspecialchars($row['car_colour']); ?></td>
                    <td><?php echo number_format($row['rental_price'], 2); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
