<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sub Event</title>
</head>
<body>
    <?php
     $con = mysqli_connect("localhost:3306", "root", "", "project") or die("Cannot connect to server." . mysqli_error($con));

    $sub_event_name = $_POST['sub_event_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $location = $_POST['location'];
    $quota = $_POST['quota'];

    $sql = "INSERT INTO SubEvents (sub_event_name, description, date, start_time, end_time, location, quota) 
            VALUES ('$sub_event_name', '$description', '$date', '$start_time', '$end_time', '$location', '$quota')";
    $result = mysqli_query($con, $sql) or die('Cannot execute sql ' . mysqli_error($con));

    if ($result) {
        echo "$sub_event_name has been added successfully";
        header("location: subevents_view.php");
    } else {
        echo "Error in inserting new sub event";
    }
    ?>
</body>
</html>
