<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_regesteration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user_info (username, password, Email, Address) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $hashed_password, $email, $address);

// Set parameters and execute
$username = $_POST['username'];
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$address = $_POST['address'];

if($stmt->execute()) {
    // Redirect to the success page
    header("Location: registration_success.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
