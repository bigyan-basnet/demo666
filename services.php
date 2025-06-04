<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Cars | EzyRentals</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/services.css">
    <style>
        .card-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 30px rgba(0,0,0,0.12);
        }

        .card-container {
            padding: 20px;
        }

        .photo img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .description {
            color: #333;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .description h2 {
            margin-top: 0;
            font-size: 20px;
            color: #222;
        }

        .description p {
            margin: 6px 0;
            font-size: 14px;
            color: #555;
        }

        .book-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .book-btn:hover {
            background-color: #e03c3c;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 style="text-align:center; margin-top:30px; font-family:'Poppins'; font-weight:600; font-size:36px;">Available Cars</h1>
    <div class="card-row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'car_rental_database');
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
        while ($row = mysqli_fetch_assoc($cr)) {
            $model = $row['car_model'] ?? 'Unknown';
            $color = $row['car_colour'] ?? 'N/A';
            $price = $row['rental_price'] ?? '0.00';
            $year = $row['car_year'] ?? 'Unknown Year';

            // Assign image file based on car model
            switch (strtolower($model)) {
                case 'lamborghini':
                    $img = 'car-6.jpg';
                    break;
                case 'rolls royce':
                    $img = 'car-1.jpg';
                    break;
                case 'bmw':
                    $img = 'car-5.jpg';
                    break;
                case 'tata':
                    $img = 'car-11.jpg';
                    break;
                case 'jeep':
                    $img = 'car-8.jpg';
                    break;
                case 'audi':
                    $img = 'bg-2.jpg';
                    break;
                case 'mercedes':
                    $img = 'car-10.jpg';
                    break;
                default:
                    $img = 'car-4.jpg'; // fallback
                    break;
            }
        ?>
        <div class="card">
            <div class="photo">
                <img src="css/images/<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($model); ?>">
            </div>
            <div class="card-container">
                <div class="description">
                    <h2><?php echo htmlspecialchars($model); ?></h2>
                    <p><strong>Manufacture Year:</strong> <?php echo htmlspecialchars($year); ?></p>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($color); ?></p>
                    <p><strong>Rent/Day:</strong> $<?php echo htmlspecialchars($price); ?></p>
                    <a class="book-btn" href="book.php?book=<?php echo $row['ID']; ?>">Book Now</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
