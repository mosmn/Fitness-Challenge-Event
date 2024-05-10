<html>
<body>
<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    echo "You have been logged out.";
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    $con = mysqli_connect("localhost:3306", "root", "", "project") or die("Cannot connect to server." . mysqli_error($con));
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "Username does not exist";
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row["password"] == $password) {
            $_SESSION["normal-userid"] = $row["user_id"];
            header("Location: user_join_subevent.php");
            exit();
        } else {
            echo "Password wrong";
        }
    }
} else if (isset($_SESSION["normal-userid"])) {
    $user_id = $_SESSION["normal-userid"];
    echo "Welcome, User $user_id";
} else {
    echo "No session exists or session has expired. Please log in again";
}
?>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
