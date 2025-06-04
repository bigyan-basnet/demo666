<?php
include('header.php');
require('config.php'); // Database connection now reused
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
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .description h2 {
            margin-top: 10px;
            font-size: 20px;
        }

        .description p {
            margin: 4px 0;
            font-size: 14px;
        }

        .book-btn {
            display: inline-block;
            margin-top: 10px;
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
        $query = mysqli_query($conn, "SELECT * FROM car") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($query)) {
            $model = htmlspecialchars($row['car_model'] ?? 'Unknown');
            $color = htmlspecialchars($row['car_colour'] ?? 'N/A');
            $price = htmlspecialchars($row['rental_price'] ?? '0.00');
            $year = htmlspecialchars($row['car_my'] ?? 'Unknown');

            switch (strtolower($model)) {
                case 'lamborghini': $img = 'car-6.jpg'; break;
                case 'rolls royce': $img = 'car-1.jpg'; break;
                case 'bmw': $img = 'car-5.jpg'; break;
                case 'tata': $img = 'car-11.jpg'; break;
                case 'jeep': $img = 'car-8.jpg'; break;
                case 'audi': $img = 'bg-2.jpg'; break;
                case 'mercedes': $img = 'car-10.jpg'; break;
                default: $img = 'car-4.jpg';
            }
        ?>
        <div class="card">
            <div class="photo">
                <img src="css/images/<?php echo $img; ?>" alt="<?php echo $model; ?>">
            </div>
            <div class="card-container">
                <div class="description">
                    <h2><?php echo $model; ?></h2>
                    <p><strong>Manufacture Year:</strong> <?php echo $year; ?></p>
                    <p><strong>Color:</strong> <?php echo $color; ?></p>
                    <p><strong>Rent/Day:</strong> $<?php echo $price; ?></p>
                    <a class="book-btn" href="book.php?book=<?php echo $row['ID']; ?>">Book Now</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
