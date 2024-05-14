
<?php
$participant_id = $_POST['participant_id'];

$con = mysqli_connect("localhost", "root", "", "project") or die("Cannot connect to server." . mysqli_error($con));

$sql = "DELETE FROM Participants WHERE participant_id = '$participant_id'";
$result = mysqli_query($con, $sql) or die('Cannot execute sql ' . mysqli_error($con));

if ($result) {
    echo "Registration deleted successfully.";
    echo "Return to list of registrations <a href='list_of_registered_users.php'>here</a>";
} else {
    echo "Error deleting registration: " . mysqli_error($con);
}

mysqli_close($con);
?>
