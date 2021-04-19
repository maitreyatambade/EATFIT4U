<?php 
require_once "pdo.php";
session_start();
if(isset($_POST['payment']))
{
$date= date('Y-m-d');
$enddate= Date('y:m:d', strtotime('+30 days'));
$sql = "INSERT INTO subscription (user_id, plan_id, dietition_id, start_timestamp, end_timestamp) VALUES ( :user_id, :plan_id, :dietition_id, :start_timestamp, :end_timestamp)";
 $stmt = $pdo->prepare($sql);

$stmt->execute(array(
        ':user_id' => $_SESSION['userid'],
        ':plan_id' => $_SESSION['plan_id'],
		':dietition_id'  => $_SESSION['dietition_id'],
        ':start_timestamp' => $date,
		':end_timestamp' => $enddate ));
    header( 'Location: profile update.php' ) ;
	$_SESSION['payment_success'] = 'Congratulations, Welcome to EatFit4U Family! Please Update Your Profile...';
  }  
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
          <h1>Payment</h1>
         </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section align="center">
<br><br>
<br><a href="index.php" align="center" >
								<img src="images/paypal logo.png" width="10%" height="10%" " alt="Paypal Logo">
							</a>
							<br><br><p align='center'><?php if($_SESSION['plan_id']==1){ echo "Rs.599.00";} else if($_SESSION['plan_id']==2){ echo "Rs.999.00";}
else if($_SESSION['plan_id']==3){ echo "Rs.1299.00";}							?> <br><br>
							<form method='post' > <button type:'submit' class='btn btn-small' name='payment' > Pay</button> </form>
							<br><br><br>
<br>
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
				<p class="copyright">Copyright 2020 &copy; Design & Developed by <a href="https:/www.linkedin.com/in/maitreya-tambade">Maitreya Tambade</a>. All rights reserved.
					<br>
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