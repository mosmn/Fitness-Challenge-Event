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
    $selected_subevents = $_POST['subevents'];

    // First, delete all existing registrations for the user
    $delete_sql = "DELETE FROM Participants WHERE user_id = $user_id";
    mysqli_query($con, $delete_sql);

    // Then, insert new registrations for the selected sub-events
    foreach ($selected_subevents as $subevent_id) {
        $insert_sql = "INSERT INTO Participants (user_id, sub_event_id) VALUES ($user_id, $subevent_id)";
        mysqli_query($con, $insert_sql);
    }

    echo "Sub-events updated successfully.";
    echo "<p>Return to <a href='user_profile.php'>User Profile</a></p>";

    mysqli_close($con);
}
?>
