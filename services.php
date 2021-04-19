<?php 
require_once "pdo.php";
session_start();
$_SESSION['plan_id']="";
if( isset ($_POST['plan1'])){$_SESSION['plan_id']=1; 
	$sql ="SELECT * FROM dietition ORDER BY RAND() LIMIT 1;";
    $query= $pdo -> prepare($sql);
	$query-> execute();
	while($row= $query->fetch())
  {
	 $_SESSION['dietition_id']=$row['dietition_id'];
  }
header( 'Location: payment.php' ) ;}

else if(isset ($_POST['plan2'])){$_SESSION['plan_id']=2;
	$sql ="SELECT * FROM dietition ORDER BY RAND() LIMIT 1;";
    $query= $pdo -> prepare($sql);
	$query-> execute();
	while($row= $query->fetch())
  {
	 $_SESSION['dietition_id']=$row['dietition_id'];
  }
header( 'Location: payment.php' ) ;}
else if(isset ($_POST['plan3'])){$_SESSION['plan_id']=3;
	$sql ="SELECT * FROM dietition ORDER BY RAND() LIMIT 1;";
    $query= $pdo -> prepare($sql);
	$query-> execute();
	while($row= $query->fetch())
  {
	 $_SESSION['dietition_id']=$row['dietition_id'];
  }
 header( 'Location: payment.php' ) ;}

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
          <h1>Packages &  Pricing</h1>
          <p>Exclusive Health & Fitness Packages For You!</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="pricing-table section bg-gray">
	<div class="container">
	<?php 
		   if ( isset($_SESSION['active']) ) {
    echo '<div class="alert alert-info alert-common alert-dismissible" role="alert">
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-android-checkbox-outline"></i><span><p align="center">Your Subscription is already Active and will Expire on '.$_SESSION['expiry_date'].'</span> </div>';
    unset($_SESSION['active']);} ?>
		<div class="row">
			<!-- single pricing table -->
			<div class="col-md-4 col-sm-6 col-xs-12" >
				<div class="pricing-item text-center">
					
					<!-- plan name & value -->
					<div class="price-title">
						<h3>Basic</h3>
						<strong class="value">₹599</strong>
					</div>
					<!-- /plan name & value -->
					
					<!-- plan description -->
					<ul>
						<li><i class="ion-ios-circle-outline"></i> Personalised Tips</li>
						<li><i class="ion-ios-circle-outline"></i> Diet Plan by Experts</li>
						<li><i class="ion-ios-circle-outline"></i>Access to 2 Health Seminars</li>
						<li><i class="ion-ios-circle-outline"></i> 1 Online Fitness Workshop</li>
						<li><i class="ion-ios-circle-outline"></i> Email Support</li>
				</ul>
					<!-- /plan description -->
					<br>
					<br>
					<!-- Buy Now button -->
					<?php
					if(isset($_SESSION['subscription_id']))
					{
					$_SESSION['active']= true;
					echo'<a class="btn btn-small" href="#">Buy Now</a>' ;
					}
					else if(isset($_SESSION['name']))
					{
					echo "<form method='post' > <button type:'submit' class='btn btn-small' name='plan1' > Buy Now</button> </form>";
					}
					else 
					{
					echo'<a class="btn btn-small" href="signin.php">Buy Now</a>' ;
					}
					?>
					<!-- /Buy Now button -->
					
				</div>
			</div>
			<!-- end single pricing table -->
			
			<!-- single pricing table -->
			<div class="col-md-4 col-sm-6 col-xs-12  "  >
				<div class="pricing-item text-center">
				
					<!-- plan name & value -->
					<div class="price-title">
						<h3>Premium</h3>
						<strong class="value">₹999</strong>
	
					</div>
					<!-- /plan name & value -->
					
					<!-- plan description -->
					<ul>
						<li><i class="ion-ios-circle-outline"></i> Personalised Tips</li>
						<li><i class="ion-ios-circle-outline"></i> Diet Plan by Experts</li>
						<li><i class="ion-ios-circle-outline"></i> Workout Plan by Experts</li>
						<li><i class="ion-ios-circle-outline"></i>Access to 4 Health Seminars</li>
						<li><i class="ion-ios-circle-outline"></i> 4 Online Fitness Workshop</li>
						<li><i class="ion-ios-circle-outline"></i> Email Support</li>
					</ul>
					<!-- /plan description -->
					
					<!-- Buy Now button -->
					<?php
					if(isset($_SESSION['subscription_id']))
					{
					$_SESSION['active']= true;
					echo'<a class="btn btn-small" href="#">Buy Now</a>' ;
					}
					else if(isset($_SESSION['name']))
					{
					echo "<form method='post' > <button type:'submit' class='btn btn-small' name='plan2' > Buy Now</button> </form>";
					}
					else 
					{
					echo'<a class="btn btn-small" href="signin.php">Buy Now</a>' ;
					}
					?>
					<!-- /Buy Now button -->
					
				</div>
			</div>
			<!-- end single pricing table -->
			
			<!-- single pricing table -->
			<div class="col-md-4 col-sm-6 col-xs-12 ">
				<div class="pricing-item text-center">
					
					<!-- plan name & value -->
					<div class="price-title">
						<h3>Advance</h3>
						<strong class="value">₹1299</strong>
					</div>
					<!-- /plan name & value -->
					
					<!-- plan description -->
					<ul>
						<li><i class="ion-ios-circle-outline"></i> Personalised Tips</li>
						<li><i class="ion-ios-circle-outline"></i> Diet Plan by Experts</li>
						<li><i class="ion-ios-circle-outline"></i> Workout Plan by Experts</li>
						<li><i class="ion-ios-circle-outline"></i>Unlimited Access to Health Seminars</li>
						<li><i class="ion-ios-circle-outline"></i> Open Access Online Fitness Workshop</li>
						<li><i class="ion-ios-circle-outline"></i> WhatsApp & On-Call Councelling  Twice a Week</li>
					</ul>
					<!-- /plan description -->
					
					<!-- Buy Now button -->
					<?php
					if(isset($_SESSION['subscription_id']))
					{
					$_SESSION['active']= true;
					echo'<a class="btn btn-small" href="#">Buy Now</a>' ;
					}
					else if(isset($_SESSION['name']))
					{
					echo "<form method='post' > <button type:'submit' class='btn btn-small' name='plan3' > Buy Now</button> </form>";
					}
					else 
					{
					echo'<a class="btn btn-small" href="signin.php">Buy Now</a>' ;
					}
					?>
					<!-- /Buy Now button -->
					
				</div>
			</div>
			<!-- end single pricing table -->
			
			
		</div>       <!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->



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