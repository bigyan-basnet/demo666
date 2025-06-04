<?php
session_start();
require_once 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("You must be logged in to book a car.");
}

if (isset($_POST['submit'])) {
    $total = $_POST['total'];
    $no_of_days = $_POST['no_of_days'];
    $car_id = $_POST['car_id'];
    $username = $_SESSION['username'];

    if (!is_numeric($total) || !is_numeric($no_of_days) || !is_numeric($car_id)) {
        die("Invalid input.");
    }

    $stmt = $conn->prepare("INSERT INTO booking (total, username, car_id, no_of_days) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dsii", $total, $username, $car_id, $no_of_days);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location.href='services.php';</script>";
    } else {
        echo "<script>alert('Booking failed: " . $stmt->error . "');</script>";
    }
}

// Fetch cars
$cars = [];
$query2 = "SELECT ID, car_model, rental_price FROM car";
$result2 = $conn->query($query2);
if ($result2) {
    while ($row = $result2->fetch_assoc()) {
        $cars[] = $row;
    }
}
?>
