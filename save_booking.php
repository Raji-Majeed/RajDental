<?php
$conn = new mysqli("localhost", "root", "", "raj_dental_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$service = $_POST['service'];

$sql = "INSERT INTO bookings (name, email, phone, date, service)
        VALUES ('$name', '$email', '$phone', '$date', '$service')";

if ($conn->query($sql) === TRUE) {
    header("Location: booking_success.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>