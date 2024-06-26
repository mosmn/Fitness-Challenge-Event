<?php
  // Start the session
  session_start();

  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["normal-userid"])){
      header("location: user_login.php");
      exit;
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

  <title>Fitness Challenge Zoom</title>

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
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span>
              Fitness Challenge Zoom
            </span>
          </a>
          <div class="contact_nav" id="">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="images/location.png" alt="" />
                  <span>The bridge</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="images/call.png" alt="" />
                  <span>Call : + 60 1234567890</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">
                  <img src="images/envelope.png" alt="" />
                  <span>event@fcz.com</span>
                </a>
              </li>
              <?php
                if (isset($_SESSION["normal-userid"])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='user_profile.php'>";
                    echo "<img src='../images/profile.webp' alt='' style='width: 40px; height: 40px; border-radius: 50%;'>";
                    echo "</a>";
                    echo "</li>";
                }
                ?>
              <?php
                    if (isset($_SESSION["normal-userid"])) {
                        echo "<form action='user_login.php' method='post'>";
                        echo "<button type='submit' name='logout'style='background-color: #f00; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;'>Logout</button>";
                        echo "</form>";
                    } else {
                        echo "<a class='logoutbtn' href='user_login.php'>Login</a>";
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
                    <a class="nav-link active" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="user_join_subevent.php">Fitness Programs</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                  <li class="nav-item">
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>Join the Fitness Challenge Zoom</h2>
                      <h1>Get Fit with Us</h1>
                      <p>Participate in our fitness challenge event and achieve your health and wellness goals. Join our community of fitness enthusiasts and embark on a journey to a healthier lifestyle.</p>
                      <div class="btn-box">
                        <a href="#" class="btn-1">Learn More</a>
                        <a href="#" class="btn-2">Join Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Slide 2 -->
            <div class="carousel-item">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>Transform Your Body</h2>
                      <h1>Embrace Fitness</h1>
                      <p>Experience the power of fitness with our diverse range of workout programs and training sessions. Whether you're a beginner or a seasoned athlete, we have something for everyone.</p>
                      <div class="btn-box">
                        <a href="#" class="btn-1">Explore Programs</a>
                        <a href="#" class="btn-2">Start Today</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Slide 3 -->
            <div class="carousel-item">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                    <div class="detail-box">
                      <h2>Reach Your Fitness Goals</h2>
                      <h1>Be Strong, Be Fit</h1>
                      <p>Elevate your fitness journey with our expert trainers and personalized fitness plans. Take the first step towards a healthier lifestyle and join our fitness challenge event today.</p>
                      <div class="btn-box">
                        <a href="#" class="btn-1">Discover More</a>
                        <a href="#" class="btn-2">Get Started</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    </section>
    <!-- end slider section -->
  </div>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>About Fitness Challenge Zoom</h2>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
        <div class="detail-box">
          <p>Join the Fitness Challenge Zoom and embark on a journey towards better health and fitness. Our mission is to provide a supportive community where individuals can achieve their fitness goals, whether it's weight loss, muscle gain, or improving overall wellness.</p>
          <a href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Our Fitness Programs</h2>
      </div>
      <div class="service_container">
        <div class="box">
          <img src="images/s-1.jpg" alt="">
          <h6 class="visible_heading">Fitness Challenge Workouts</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Fitness Challenge Workouts</h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-2.jpg" alt="">
          <h6 class="visible_heading">Nutritional Guidance</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Nutritional Guidance</h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-3.jpg" alt="">
          <h6 class="visible_heading">Dynamic Strength Training</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Dynamic Strength Training</h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-4.jpg" alt="">
          <h6 class="visible_heading">Health Assessments</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Health Assessments</h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-5.jpg" alt="">
          <h6 class="visible_heading">Personalized Workouts</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Personalized Workouts</h6>
          </div>
        </div>
        <div class="box">
          <img src="images/s-6.jpg" alt="">
          <h6 class="visible_heading">Fitness Strategies</h6>
          <div class="link_box">
            <a href="#"><img src="images/link.png" alt=""></a>
            <h6>Fitness Strategies</h6>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- end service section -->


  <!-- Us section -->

  <section class="us_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why Participate With Us
        </h2>
      </div>
      <div class="us_container">
        <div class="box">
          <div class="img-box">
            <img src="images/u-1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Quality Equipment
            </h5>
            <p>
              Our gym is equipped with high-quality machines and gear to ensure your workouts are effective and safe.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/u-2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Healthy Nutrition Plan
            </h5>
            <p>
              We provide personalized nutrition plans tailored to your fitness goals, helping you achieve optimal health and performance.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/u-3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Shower Service
            </h5>
            <p>
              Refresh after your workout/program with our convenient shower facilities, allowing you to leave feeling rejuvenated and ready for the day ahead.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/u-4.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Unique to Your Needs
            </h5>
            <p>
              Our programs are designed to cater to your individual needs and preferences, ensuring a personalized fitness experience like no other.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- end us section -->


  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Participant Reviews
        </h2>
      </div>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  John Doe
                </h5>
                <p>
                  "The fitness event was life-changing! I've never felt more energized and motivated to stay fit. Thanks to the fantastic trainers and supportive community, I've achieved my fitness goals and more!"
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Jane Smith
                </h5>
                <p>
                  "I can't recommend this fitness event enough! The variety of workouts, nutrition guidance, and expert advice have transformed my approach to health and fitness. It's not just an event; it's a lifestyle changer!"
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Michael Johnson
                </h5>
                <p>
                  "Attending this fitness event was one of the best decisions I've made for my health. The trainers are knowledgeable, the facilities top-notch, and the camaraderie among participants is inspiring. I've never felt better!"
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- end client section -->

  <!-- result section -->

  <section class="result_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="images/result-img.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="detail-box">
            <h2>
              Achieve Your Goals <br>
              with Our Programs
            </h2>
            <p>
              Our fitness programs are meticulously designed to help you achieve your goals efficiently and effectively. Whether you're looking to lose weight, build muscle, or improve your overall health, we have the expertise and resources to guide you every step of the way.
            </p>
            <a href="">
              Get Started Today
            </a>
          </div>
        </div>
      </div>
    </div>
</section>


  <!-- end result section -->


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span>
            Get In Touch
          </span>
        </h2>
      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-md-6 ">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email" />
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                  <div class="mt-5">
                    <input type="text" placeholder="Message" />
                  </div>
                  <div class="mt-5">
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="map_container">
              <div class="map-responsive">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1136.0915239623814!2d101.72831704204435!3d2.9739747189206795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smy!4v1714906475853!5m2!1sen!2smy"
                  width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding2-top">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About Fitness Challenge Zoom
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
              <a class="" href="pages/about.html">About </a>
            </li>
            <li class="">
              <a class="" href="pages/service.html">Fitness Programs</a>
            </li>
            <li class="">
              <a class="" href="pages/contact.html">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="pages/admin-login.html">Admin Login</a>
            </li>
            <li class="">
              <a class="" href="pages/login.html">Login</a>
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
  </script>
</body>

</html>