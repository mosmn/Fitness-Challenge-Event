<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$check = $conn->prepare("SELECT * FROM Users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();

if($check->num_rows > 0) {
    echo "Username already exists. Please choose a different username.";
} else {
    $stmt = $conn->prepare("INSERT INTO Users (full_name, username, password, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $username, $password, $email);

    if($stmt->execute()) {
        header("Location: registration_success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$check->close();
$conn->close();
?>