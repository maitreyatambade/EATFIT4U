<?php
require_once "pdo.php";
session_start();
//error_reporting(0);
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    // Getting username/ email and password
    $username=$_POST['username'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT * FROM dietition WHERE username=:username AND password=:password";
    $query= $pdo -> prepare($sql);
   // $query-> bindParam(':username', $username, PDO::PARAM_STR);
    //$query-> bindParam(':usrpassword', $password, PDO::PARAM_STR);
    $query-> execute(array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     ) );
   //$results=$query->fetchAll(PDO::FETCH_OBJ);
  //$query-> execute();
  $count = $query->rowCount();
  while($row= $query->fetch())
  {
	//while($row=$s->fetch()){ //for each result, do the following
     $userId=$row['dietition_id'];
     $name=$row['name'];
     //$dbPassword=$row['password'];
    // $salt=$row['salt'];

    //do something with the variables
}
  
  if($count > 0)
  {
    $_SESSION['username']=$_POST['username'];
	$_SESSION['userid']=$userId;//$result['user_id'];
	$_SESSION['name']=$name;//result["name"];
	header( 'Location: dietition home.php' ) ;
    //echo "<script > document.location = 'home.php'; </script>";
  } else{
    $_SESSION['invaliddetails']='Invalid Details';
	//header( 'Location: signin.php' ) ;
  }
}
//$alt = 'XyZzy12*_';
//$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; 

 // Pw is php123
/*
// Check to see if we have some POST data, if we do store it in SESSION
if(isset($_POST["email"]) && isset($_POST["pass"]))
{
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["pass"] = $_POST["pass"];

	header("Location: login.php");
	return;
}*/

// Check to see if we have some new data in $_SESSION, if we do process it
/*if (isset($_SESSION["email"]) && isset($_SESSION["pass"])) 
{
	$username = $_SESSION["email"];
	$password = $_SESSION["pass"];

	if(strlen($username) < 1 || strlen($password) < 1)
		$_SESSION["error"] = "User name and password are required";
	else
	{
		$check = hash("md5", $alt.$password);

		if($check == $stored_hash)
		{
			// Redirect the browser to add.php
			header("Location: index.php");
			error_log("Login success " . $username);
			return;
		}
		else
		{
			$_SESSION["error"] = "Incorrect password";
			error_log("Login fail" . $username . "$check");
		}

	}

	unset($_SESSION["email"]);
	unset($_SESSION["pass"]);
}
*/
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
var username=document.signin.username.value;
var password=document.signin.password.value;  

if (username==null || username==""){  
  alert("UserName can't be blank");  
  return false;  
}
  else if (password==null || password==""){  
  alert("Password can't be blank");  
  return false;  
}
else{  
return true;
} 
 
}  
</script>

  <title>EatFit4U | Dietition Console</title>

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
          <h1>Dietition LogIn</h1>
		   </div>
      </div>
    </div>
  </div>
</section>
<!-- Login form start -->
<section class="contact-form">
<br>
		  <p>
		  <?php 
		   if ( isset($_SESSION['success']) ) {
    echo '<<div class="alert alert-info alert-common alert-dismissible" role="alert">
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-android-checkbox-outline"></i><span><p align="center">'.$_SESSION['success'].'</span> </div>';
    unset($_SESSION['success']);} 
	
	
	if ( isset($_SESSION['invaliddetails']) ) {
    echo ' <div class="alert alert-info alert-common alert-dismissible" role="alert">
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-android-checkbox-outline"></i><span><p align="center">'.$_SESSION['invaliddetails'].'</span> </div>';			            
    unset($_SESSION['invaliddetails']);} 
		
	?>
</p>
    <div class="container">
        <div class="row">
            <form method ="post" id="contact-form" name="signin"  action="index.php" onSubmit="return formValidation() ;" >
                <div>
                    <div class="block">
                        
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div> <br>
						<button class="btn btn-small mt-20"type="submit" align="center">Log In</button>
					</div>
					</div>
				     </form>
			
        </div>
		<br>
<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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