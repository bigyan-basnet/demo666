<?php
$host = 'awseb-e-phwcv2kg3y-stack-awsebrdsdatabase-g89toxltijqm.cx4wq0c06lyz.ap-southeast-2.rds.amazonaws.com';
$user = 'admin';
$pass = 'mukul123';
$dbname = 'car_rental_database';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
