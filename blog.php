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
          <h1>Blog</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<h2 class="post-title">Benefits &amp;amp; Advantages of Going Vegetarian</h2>
					<div class="post-meta">
			            <ul>
			              <li>
			                <i class="ion-calendar"></i> 10, OCT 2020
			              </li>
			              <li>
			                <i class="ion-android-people"></i> POSTED BY ADMIN
			              </li>
			              <li>
			                <a href=""><i class="ion-pricetags"></i> LIFESTYLE</a>,<a href=""> HEALTH</a>, <a
			                href="">FOOD</a>
			              </li>
			              
			            </ul>
		          	</div>
					<div class="post-thumb">
						<img class="img-responsive" src="images/blog/blog-post-1.jpg" alt="">
					</div>
					<div class="post-content post-excerpt">
						<p>Eating a variety of vegetables and whole fruits is a key recommendation of healthy eating patterns. A varied consumption of fruits, vegetables, whole-grains, legumes and nuts at an appropriate calorie level usually leads to an adequate intake of dietary fiber and a low intake of saturated fat and hydrogenated vegetable oils. As a result, vegetarians commonly have lower body mass indexes (BMI), LDL-cholesterol, blood pressure and reduced rates of stroke, type 2 diabetes, certain cancers, and death from heart diseasethan do non-vegetarians.

Further, vegetarian eating patterns are rich in health-promoting phytochemicals and vitamins C and E, which function as antioxidants to protect against oxidative stress. Additionally, these eating patterns provide magnesium and potassium rich foods which can improve insulin sensitivity and vascular function, respectively The dietary fiber along with phytochemicals can help improve and maintain gut the microbiome.

To summarize, potential mechanisms for improved health from vegetarian eating plans include weight loss/maintenance, blood sugar control, improved lipid profile, reduced blood pressure, decreased inflammation and improved gut health.

Benefit #2: Decreased Unhealthy Food Intake
Several dietary factors in animal foods have been associated with increased risk of CVD. Historically, saturated fats, prevalent in meats, have been linked to elevated cholesterol and other unfavorable disease risk profiles. Interestingly, saturated fats themselves may not be responsible for many of the adverse health effects that they have been associated with, but rather the processing of meats may be at fault. Consuming preservatives in processed meats, such as sodium, nitrates and nitrites, may raise blood pressure and impair insulin response.

Most research shows a sliding scale of improved health outcomes from increased plant intake with decreased meat intake. Completely eliminating meat and dairy products may not be necessary for good health, however, as they can be part of a healthy eating pattern. Choosing whole foods over processed foods also is an important strategy for maximizing the health benefits from any diet plan.</p>
						<blockquote class="quote-post">
				            <p>Albert Einstein said, Nothing will benefit human health and increase the chances for survival of life on Earth as much as the evolution to a vegetarian diet.</p>
				        </blockquote>
				        
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