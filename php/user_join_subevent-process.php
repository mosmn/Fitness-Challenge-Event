<html>
<body>
<?php
session_start();

$sub_event_id = $_POST['subevent'];
$user_id = $_SESSION["normal-userid"];

$con = mysqli_connect("localhost:3306", "root","", "project") or die("Cannot connect to server." . mysqli_error($con));

$sql = "SELECT quota, registered_count FROM SubEvents WHERE sub_event_id = '$sub_event_id'";
$result = mysqli_query($con, $sql) or die('Cannot execute sql ' . mysqli_error($con));
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

$quota = $row['quota'];
$registered_count = $row['registered_count'];

if ($registered_count < $quota) {
    $sql_insert_participant = "INSERT INTO Participants (user_id, sub_event_id) VALUES ('$user_id', '$sub_event_id')";
    mysqli_query($con, $sql_insert_participant) or die('Cannot execute sql ' . mysqli_error($con));

    $sql_update_count = "UPDATE SubEvents SET registered_count = registered_count + 1 WHERE sub_event_id = '$sub_event_id'";
    mysqli_query($con, $sql_update_count) or die('Cannot execute sql ' . mysqli_error($con));

    echo "You have successfully registered for the sub-event.";
} else {
    echo "Sorry, registration for this sub-event is full. Please try another sub-event.";
}
?>


</body>
</html>
