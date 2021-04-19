<?php
require_once "pdo.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ( isset($_POST['age']) && ($_POST['height']) && isset($_POST['weight']) && isset($_POST['eating_habits']) && isset($_POST['worktype']))
  {
	//$user_id=$_SESSION['userid'];
  $sql = "INSERT INTO users_profile (user_id, age, height, weight, eating_habits, worktype, disease) VALUES (:user_id, :age, :height, :weight, :eating_habits, :worktype, :disease)
  ON DUPLICATE KEY UPDATE user_id=:user_id, age=:age, height=:height, weight=:weight, eating_habits=:eating_habits, worktype=:worktype, disease=:disease";
    $stmt = $pdo->prepare($sql);
	
    $stmt->execute(array(
        ':user_id' => $_SESSION['userid'],
		':age' => $_POST['age'],
        ':height' => $_POST['height'],
        ':weight' => $_POST['weight'],
		':eating_habits' => $_POST['eating_habits'],
		':worktype' => $_POST['worktype'],
		':disease' => $_POST['disease']));
    
    header( 'Location: profile.php' ) ;
	$_SESSION['profile_success'] = 'Profile Updated Successfully';
	unset($_SESSION['age']);
	unset($_SESSION['height']);
	unset($_SESSION['weight']);
	unset($_SESSION['eating_habits']);
	unset($_SESSION['worktype']);
	unset($_SESSION['disease']);
	
    return;
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
var age=document.profile.age.value;
var height=document.profile.height.value;
var weight=document.profile.weight.value;
var eating_habits=document.profile.eating_habits.value;  
var worktype=document.profile.worktype.value;
//var disease=document.profile.disease.value;
//var heightcode = document.getElementById("height").value.charCodeAt(0);
//var weightcode = document.getElementById("weight").value.charCodeAt(0);
if (age==null || age==""){  
  alert("Age can't be blank");  
  return false;  
}
else if (height==null || height==""){  
  alert("Height can't be blank");  
  return false;  
}
/*else if (heightcode > 31 && (heightcode < 48 || heightcode > 57)){  
		        alert("Enter Height in Centimenters only");  
  return false;  
}*/
else if (weight==null || weight==""){  
  alert("Weight can't be blank");  
  return false;  
}
/*else if (weightcode > 31 && (weightcode < 48 || weightcode > 57)){  
	       alert("Enter Weight in Kilograms only");  
  return false;  
}*/
else if (eating_habits==null || eating_habits==""){  
  alert("Eating Habits can't be blank");  
  return false;  
} 
  else if (worktype==null || worktype==""){  
  alert("Activity level can't be blank");  
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
          <h1>Profile Update Form</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Profile form start -->
<section class="contact-form">
<br>
		  <p>
		  <?php 
		   if ( isset($_SESSION['profile_success']) ) {
    echo '<<div class="alert alert-info alert-common alert-dismissible" role="alert">
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-android-checkbox-outline"></i><span><p align="center">'.$_SESSION['profile_success'].'</span> </div>';
    unset($_SESSION['profile_success']);} 	
	?>
</p>
    <div class="container">
        <div class="row">
		<br> <br>
            <form method ="post" id="contact-form" name="profile"  action="profile update.php" onSubmit="return formValidation();" >
                <div>
                    <div class="block">
						<div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="<?php echo $_SESSION['name']  ?>" readonly>
							
                        </div>
						<div class="form-group">
                            <input type="text" name="age" class="form-control" placeholder="Enter your age in years">
							
                        </div>
                        <div class="form-group">
                            <input type="text" name="height" class="form-control" placeholder="Height in Centimeters">
							
                        </div>
                        <div class="form-group">
                            <input type="text" name="weight" class="form-control" placeholder="Weight in Kilograms">

                        </div> 
						<div class="form-group">
                            <input type="text"name="eating_habits" class="form-control" placeholder="Please mention you are Vegetarian, Non-Vegetarian, Vegan etc.">
							
                        </div>
                        <div class="form-group">
                            <input  type="text" name="worktype" class="form-control" placeholder="Mention Your physical activity level">
							
                        </div>
						<div class="form-group">
                            <input type="text" name="disease" class="form-control" placeholder="Mention your medical history if any">
							
                        </div>
                       	<br>
						<br>
						<button class="btn btn-small mt-20"type="submit"align="center">Update</button>
					</div>
					</div>
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