<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["normal-userid"])) {
    header("Location: user_login.php");
    exit();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "project");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID from the session
$user_id = $_SESSION["normal-userid"];

// Fetch the user's profile data from the database
$user_sql = "SELECT * FROM Users WHERE user_id = $user_id";
$user_result = mysqli_query($con, $user_sql);
$user_row = mysqli_fetch_assoc($user_result);

// Fetch the user's registered subevents from the database
$participant_sql = "SELECT SubEvents.sub_event_name 
                    FROM Participants 
                    INNER JOIN SubEvents ON Participants.sub_event_id = SubEvents.sub_event_id 
                    WHERE Participants.user_id = $user_id";
$participant_result = mysqli_query($con, $participant_sql);

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

  <title>Fit Challenge Zoom</title>

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
    .about_section form {
        background-color: white;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .about_section label {
        display: block;
        margin-bottom: 10px;
    }

    .about_section input, .about_section select, .about_section button {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 0.5px solid #ccc;
        border-radius: 5px;
    }

    .about_section button {
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .about_section button:hover {
        background-color: white;
        color: black;
        border: 1px solid black;
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
              Fitness Challenge Zoom
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
              <!-- if the user is loged in, add a clickable profile icon here -->
              <?php
                if (isset($_SESSION["normal-userid"])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='user_profile.php'>";
                    echo "<img src='../images/profile.webp' alt='' style='width: 40px; height: 40px; border-radius: 50%;'>";
                    echo "</a>";
                    echo "</li>";
                }
                ?>
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
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../pages/about.html">About</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="subevents_view.php">Fitness Programs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../pages/contact.html">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  <?php
                    if (isset($_SESSION["normal-userid"])) {
                        echo "<form action='user_login.php' method='post'>";
                        echo "<button class='nav-item' type='submit' name='logout'>Logout</button>";
                        echo "</form>";
                    } else {
                        echo "<a class='nav-link' href='user_login.php'>Login</a>";
                    }
                    ?>

                  </li>
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
  <form method="post" action="update_profile.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user_row['username']; ?>" disabled>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $user_row['full_name']; ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_row['email']; ?>">
        <button type="submit">Update Profile</button>
    </form>

    <h2>Update Subevents</h2>
    <form method="post" action="update_profile_subevents.php">
        <select name="subevents[]" multiple>
            <?php
            // Fetch all subevents from the database
            $subevents_sql = "SELECT * FROM SubEvents";
            $subevents_result = mysqli_query($con, $subevents_sql);
            while ($subevent_row = mysqli_fetch_assoc($subevents_result)) {
                // Check if the user is registered for this subevent
                $selected = '';
                while ($participant_row = mysqli_fetch_assoc($participant_result)) {
                    if ($subevent_row['sub_event_name'] == $participant_row['sub_event_name']) {
                        $selected = 'selected';
                        break;
                    }
                }
                // Output subevent option
                echo "<option value='" . $subevent_row['sub_event_id'] . "' $selected>" . $subevent_row['sub_event_name'] . "</option>";
                // Reset pointer for participant result
                mysqli_data_seek($participant_result, 0);
            }
            ?>
        </select>
        <button type="submit">Update</button>
    </form>

    <form method="post" action="user_logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>

    <?php
    mysqli_close($con);
    ?>
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
              <a class="" href="../pages/admin-login.html">Admin Login</a>
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

      }

    function showSubeventDropdown(subeventId) {
      document.getElementById('subeventDropdown' + subeventId).style.display = 'block';
    }

  </script>
</body>

</html>