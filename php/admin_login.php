<html> 
<body> 
<?php 
session_start();

if(isset($_POST['logout'])){
    session_destroy();
    echo "You have been logged out.";
} else if(isset($_POST['username']) && isset($_POST['password'])) {
    $con = mysqli_connect("localhost:3306", "root", "", "project") or die("Cannot connect to server." . mysqli_error($con));
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 0) {
        echo "Username does not exist";
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        if($row["password"] == $password) {
            $_SESSION["userid"] = $username;
            header("Location: admin_view.php");
        } else {
            echo "Password wrong";
        }
    }
} else if(isset($_SESSION["userid"])) {
    $user = $_SESSION["userid"];
    echo "Welcome $user";
} else {
    echo "No session exist or session is expired. Please log in again"; 
}
?> 

</body> 
</html>

