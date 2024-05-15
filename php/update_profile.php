<?php
session_start();

if (!isset($_SESSION["normal-userid"])) {
    header("Location: user_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "project");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $user_id = $_SESSION["normal-userid"];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $update_sql = "UPDATE Users 
                   SET full_name = '$full_name', email = '$email' 
                   WHERE user_id = $user_id";

    if (mysqli_query($con, $update_sql)) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
