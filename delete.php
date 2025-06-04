<?php
session_start();
require_once 'config.php'; // RDS connection

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Delete car if "del" parameter is passed
if (isset($_GET['del'])) {
    $car_id = intval($_GET['del']);
    $delete_query = "DELETE FROM car WHERE ID = $car_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Car deleted successfully!'); window.location.href='delete.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error deleting car: " . mysqli_error($con) . "');</script>";
    }
}

// Fetch all cars
$cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Cars</title>
    <link rel="stylesheet" href="css/services.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>
        .card-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px;
        }
        .card {
            width: 300px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .photo img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .description {
            padding: 20px;
            text-align: center;
        }
        .description h1 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .description p {
            font-size: 16px;
            color: #444;
        }
        .delete-btn {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body class="delete_bg">

<section>
    <div class="card-row">
        <?php while ($row = mysqli_fetch_assoc($cr)) { ?>
            <div class="card">
                <div class="photo">
                    <img src="css/images/car-2.jpg" alt="Car Image" />
                </div>
                <div class="description">
                    <h1><?php echo htmlspecialchars($row['car_model']); ?></h1>
                    <p>$<?php echo number_format($row['rental_price'], 2); ?> / day</p>
                    <a class="delete-btn" href="delete.php?del=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>
