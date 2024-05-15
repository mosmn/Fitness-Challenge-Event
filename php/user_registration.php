<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO Users (full_name, username, password, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $full_name, $username, $password, $email);

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if($stmt->execute()) {
    header("Location: registration_success.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>