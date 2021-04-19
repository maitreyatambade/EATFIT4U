<?php
require_once "pdo.php";
session_start();
$usernameErr = $emailErr = $passwordErr = $confirmpasswordErr = $securityquestionErr = $answerErr = "";
	//$username = $email = $password = $confirmpassword = $securityquestion = $answer = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){	
  if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
  } 
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  if (empty($_POST["password"])) {
    $passwordErr = "Password required";
  } 
  if (empty($_POST["confirm_password"])) {
    $confirmpasswordErr = "Confirm Password required";
  } else if (($_POST["confirm_password"]) != $_POST["password"]) {
   $confirmpasswordErr = "Password Mismatch";
  }
  if (empty($_POST["security_question"])) {
    $securityquestionErr = "Security Question is required";
  } 
  if (empty($_POST["answer"])) {
    $answerErr = "Answer is required";
  }   
/*if ( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['security_question'])&& isset($_POST['answer']))
 {

    // Data validation
	/*
    if ( strlen($_POST['username']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1|| strlen($_POST['security_question']) < 1|| strlen($_POST['answer']) < 1) {
        $_SESSION['error'] = 'Missing data';
        
    }
	if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        
    }*/
	$sql = "INSERT INTO users (username, email, password, security_question, answer) VALUES (:username, :email, :password, :security_question, :answer)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $_POST['username'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
		':security_question' => $_POST['security_question'],
		':answer' => $_POST['answer']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: signup1.html' ) ;
    return;
	/*
}
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:red">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

// Flash pattern
/*
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}*/

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
							<a class="navbar-brand" href="index.html">
								<img src="images/logo.png" alt="Logo">
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="service.html">Blog</a></li>
								<li><a href="contact.html">About Us</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="contact.html">Sign In/ Sign Up</a></li>
							</ul>
							</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
			</header><!-- header close -->
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Sign Up</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- signup form start -->
<section class="contact-form">
    <div class="container">
        <div class="row">
            <form method ="post" id="contact-form" name="signup" >
                <div>
                    <div class="block">
                        
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
							<?php echo isset($usernameErr)?$usernameErr:'' ; ?>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Id">
							<?php echo isset($emailErr)?$emailErr:'' ; ?>
                        </div> 
						<div class="form-group">
                            <input type="password"name="password" class="form-control" placeholder="Password">
							<?php echo isset($passwordErr)?$passwordErr:'' ; ?>
                        </div>
                        <div class="form-group">
                            <input  type="password" name="confim_password" class="form-control" placeholder="Confirm Password">
							<?php echo isset($confirmpassword)?$confirmpassword:'' ; ?>
                        </div>
						<div class="form-group">
                            <input type="text" name="security_question" class="form-control" placeholder="Security Question">
							<?php echo isset($securityquestionErr)?$securityquestionErr:'' ; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="answer"  class="form-control" placeholder="Answer">
							<?php echo isset($answer)?$answer:'' ; ?>
                        </div>
						<br>
						<br>
						<button class="btn btn-small mt-20"type="submit"align="center">Sign Up</button>
					</div>
					</div>
				<div class="error" id="error">
                <div class="success" id="success">Logging in</div>
            </form>
        </div>
		<br>
		<br>
</div>

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