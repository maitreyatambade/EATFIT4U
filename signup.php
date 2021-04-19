<?php
require_once "pdo.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ( isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['security_question'])&& isset($_POST['answer']))
  {
   $sql ="SELECT * FROM users WHERE username=:username";
    $query= $pdo -> prepare($sql);
    $query-> execute(array(  
                          'username'     =>     $_POST["username"],  
                     ) );
   $count = $query->rowCount();
   if($count > 0)
  {
  	$_SESSION['error'] = 'Username Already Exist Please add New Username';
}
else{
$sql = "INSERT INTO users (name, username, email, password, security_question, answer) VALUES (:name, :username, :email, :password, :security_question, :answer)";
    $stmt = $pdo->prepare($sql);
	
    $stmt->execute(array(
        ':name' => $_POST['name'],
		':username' => $_POST['username'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
		':security_question' => $_POST['security_question'],
		':answer' => $_POST['answer']));
    
    header( 'Location: signin.php' ) ;
	$_SESSION['success'] = 'Welcome, to EatFit4U Registration Complete Please LogIn to Your Account';
    return;
	}
	}
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
  <script type="text/javascript">  
function formValidation(){  
var name=document.signup.name.value;
var username=document.signup.username.value;
var email=document.signup.email.value;  
var atposition=email.indexOf("@");  
var dotposition=email.lastIndexOf(".");  
var firstpassword=document.signup.password.value;  
var secondpassword=document.signup.confirm_password.value; 
var security_question=document.signup.security_question.value;
var answer=document.signup.answer.value;

if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}
else if (username==null || username==""){  
  alert("UserName can't be blank");  
  return false;  
}
else if (email==null || email==""){  
  alert("Email can't be blank");  
  return false;  
} 
else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;
  }
  else if (firstpassword==null || firstpassword==""){  
  alert("Password can't be blank");  
  return false;  
}
 else if (secondpassword==null || secondpassword==""){  
  alert(" Confirm Password can't be blank");  
  return false;  
}
 else if(firstpassword!=secondpassword){  
alert("Password & Confirm Pass word must be same!");  
return false;   
}
else if (security_question==null || security_question==""){  
  alert(" Security Question can't be blank");  
  return false;  
}
else if (answer==null || answer==""){  
  alert(" answer can't be blank");  
  return false;  
}  
else{  
return true;
} 
 
}  
</script>  

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
<br><p>
  <?php 
		   if ( isset($_SESSION['error']) ) {
    echo '<<div class="alert alert-info alert-common alert-dismissible" role="alert">
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-android-checkbox-outline"></i><span><p align="center">'.$_SESSION['error'].'</span> </div>';
    unset($_SESSION['error']);} 
	
	?>

    <div class="container">
        <div class="row">
		<br> <br>
            <form method ="post" id="contact-form" name="signup"  action="signup.php" onSubmit="return formValidation() ;" >
                <div>
                    <div class="block">
						<div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name">
							
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
							
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Id">

                        </div> 
						<div class="form-group">
                            <input type="password"name="password" class="form-control" placeholder="Password">
							
                        </div>
                        <div class="form-group">
                            <input  type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
							
                        </div>
						<div class="form-group">
                            <input type="text" name="security_question" class="form-control" placeholder="Security Question">
							
                        </div>
                        <div class="form-group">
                            <input type="text" name="answer"  class="form-control" placeholder="Answer">
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