<?php 
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>EatFit4U | YOUR PERSONAL DIET & FITNESS PLANNER</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- header Nav Start -->
				<nav class="navbar">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">
								<img src="images/logo.png" alt="Logo">
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php">Home</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="aboutus.php">About Us</a></li>
								<li><a href="services.php">Services</a></li>
								<?php 
								if ( isset($_SESSION['name']) ) {
								echo '<li><a href="solutions.php">Health Solutions</a></li>
								<li class="dropdown-slide"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['name'].'<span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu">
										<li><a href="profile.php">Profile</a></li>
										<li><a href="logout.php">LogOut</a></li>
									</ul>
								</li>'; 
								}
								else {
								echo '<li><a href="signin.php">Sign In/ Sign Up</a></li>';
								} ?>
								</ul>
							</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
						<?php
						if ( isset($_SESSION['plan_id']) )
						{
						if ($_SESSION['plan_id']== 1) 
						{echo "<p align='right'>BASIC PLAN";}
						else if ($_SESSION['plan_id']== 2) 
						{echo "<p align='right'>PREMIUM PLAN";}
						else if ($_SESSION['plan_id']== 3) 
						{echo "<p align='right'>ADVANCE PLAN";}
						}
						else
						{
						echo"";}
						?>
					</div>
				</div>
			</div>
			</header><!-- header close -->



<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Some of our latest projects.</h1>
          <p>Don’t just take our word for it. Check out some of our latest work.</p>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Portfolio Start -->
<section class="portfolio-work">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <div class="portfolio-menu">
            <ul>
              <li class="filter" data-filter="all">All</li>
              <li class="filter" data-filter=".Branding">Branding</li>
              <li class="filter" data-filter=".Websites">Websites</li>
              <li class="filter" data-filter=".Graphic">Graphic</li>
              <li class="filter" data-filter=".design">Design</li>
              <li class="filter" data-filter=".Video">Video</li>
            </ul>
          </div>
          <div class="portfolio-contant">
            <ul class="portfolio-contant-active text-center portfolio-popup">
              <li class="mix Branding">
                <a class="portfolio-popup" href="images/portfolio/work1.jpg">
                  <img src="images/portfolio/work1.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Rio Furniture</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mix Websites">
                <a  href="images/portfolio/work2.jpg">
                  <img src="images/portfolio/work2.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Behance Design</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mix Graphic">
                <a href="images/portfolio/work3.jpg">
                  <img src="images/portfolio/work3.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Brothers Furniture</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mix design">
                <a href="images/portfolio/work4.jpg">
                  <img src="images/portfolio/work4.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Adestra Cookup</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mix Video">
                <a href="images/portfolio/work5.jpg">
                  <img src="images/portfolio/work5.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Texas Boxing</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                      
                    </div>
                  </div>
                </a>
              </li>
              <li class="mix Graphic">
                <a href="images/portfolio/work6.jpg">
                  <img src="images/portfolio/work6.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Apple Mockup</h4>
                      <p>Labore et dolore magna aliqua. Ut enim ad </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-manu">
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">How it works</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Terms</a></li>
					</ul>
				</div>
				<p class="copyright">Copyright 2018 &copy; Design & Developed by <a href="http://www.themefisher.com">themefisher.com</a>. All rights reserved.
					<br>
					Get More <a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">Free Bootstrap Templates</a>
				</p>
			</div>
		</div>
	</div>
</footer>
    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- <script src="js/jquery.counterup.js"></script> -->
    
    <!-- Main jQuery -->
   
    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!--  -->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Mixit Up JS -->
    <script src="plugins/mixitup/dist/mixitup.min.js"></script>
    <!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
    <script src="plugins/SyoTimer/build/jquery.syotimer.min.js"></script>


    <!-- Form Validator -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>


    
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    

    <script src="js/script.js"></script>
    



  </body>
  </html>