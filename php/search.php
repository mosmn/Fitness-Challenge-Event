<?php
// Check if the user is logged in as admin
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>FCZ Admin</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />
  <style>
    form {
        margin-bottom: 20px;
    }

    input[type="text"] {
        padding: 10px;
        width: 80%;
        margin-right: 10px;
        margin-left: 10%;

    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #f8bc1a;
        color: white;
        border: none;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f8bc1a;
        color: white;
    }
</style>
</head>

<body class="sub_page about_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="../index.html">
            <img src="../images/logo.png" alt="" />
            <span>
            FCZ Admin
            </span>
          </a>
          <div class="contact_nav" id="">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="../images/location.png" alt="" />
                  <span>The bridge</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="../images/call.png" alt="" />
                  <span>Call : + 60 1234567890</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="../images/envelope.png" alt="" />
                  <span>event@fcz.com</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container">
        <div class="custom_nav2">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex  flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item">
                    <a class="nav-link" href="admin_view.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="add_subevent-form.php">Add Sub-Event</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="subevents_view.php">Sub-Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="list_of_registered_users.php">Participants</a>
                  </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="search.php">Search Users</a>
                    </li>
                  <?php
                    if (isset($_SESSION["userid"])) {
                        echo "<form action='admin_login.php' method='post'>";
                        echo "<button class='nav-item' type='submit' name='logout'>Logout</button>";
                        echo "</form>";
                    } else {
                        echo "<a class='nav-link' href='user_login.php'>Login</a>";
                    }
                    ?>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- main section -->
  <section class="about_section layout_padding">
    <form method="get">
        <input type="text" name="query" placeholder="Search...">
        <input type="submit" value="Search">
    </form>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['query'])) {
                $query = $_GET['query'];
                $con = mysqli_connect("localhost", "root", "", "project");
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Users WHERE username LIKE '%$query%' OR full_name LIKE '%$query%' OR email LIKE '%$query%'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No results found</td></tr>";
                }

                mysqli_close($con);
            }
            ?>
        </tbody>
    </table>
</section>
  <!-- end main section -->

  <!-- info section -->

  <section class="info_section layout_padding2-top">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About
          </h6>
          <p>
            The Fitness Challenge Zoom is a community-driven fitness event that aims to promote health and wellness through a series of workout programs, nutritional guidance, and expert advice. Join us and take the first step towards a healthier lifestyle.
          </p>
        </div>
        <div class="col-md-2 offset-md-1">
          <h6>
            Menus
          </h6>
          <ul>
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html">About </a>
            </li>
            <li class="">
              <a class="" href="service.html">Fitness Programs</a>
            </li>
            <li class="">
              <a class="" href="#contactSection">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="admin-login.html">Admin Login</a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
            <a href="">
              <img src="images/location-white.png" alt="">
              <span> No.123, loram ipusm</span>
            </a>
            <a href="">
              <img src="images/call-white.png" alt="">
              <span>+01 12345678901</span>
            </a>
            <a href="">
              <img src="images/mail-white.png" alt="">
              <span> demo123@gmail.com</span>
            </a>
          </div>
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2024 All Rights Reserved. Made with love by Mohamed, Abdulaziz, Ali, and Khalid
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }

      function validateForm() {
          var username = document.getElementById("username").value;
          var password = document.getElementById("password").value;
          if (username == "" || password == "") {
              alert("Please fill in all fields");
              return false;
          }
          return true;
      }

  </script>
</body>

</html>
