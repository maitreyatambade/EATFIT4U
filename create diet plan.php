<?php
require_once "pdo.php";
session_start();
//$userid=$_GET['user_id'];
if ( isset($_GET['user_id']))
{
$stmt = $pdo->prepare("SELECT * FROM users inner join users_profile on users.user_id = users_profile.user_id WHERE users_profile.user_id=:xyz ");
$stmt->execute(array(":xyz" => $_GET["user_id"]));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION["date"] = date('Y/m/d');
$_SESSION["user_id"] = $row["user_id"];
$_SESSION["name1"] =$row["name"];
$_SESSION["age"] = $row["age"];
$_SESSION["height"] = $row["height"];
$_SESSION["weight"] = $row["weight"];
$_SESSION["eating_habits"] = $row["eating_habits"];
$_SESSION["worktype"] = $row["worktype"];
$_SESSION["disease"] = $row["disease"];}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ( isset($_POST['title']) && isset($_POST['plan']))
  {
	//$user_id=$_SESSION['userid'];
	//$date = date('Y/m/d');
  $sql = "INSERT INTO dietplan (start_date, dietition_id, user_id, name, age, height, weight, eating_habits, work_type, disease, title, plan)
  VALUES (:date ,:dietition_id, :user_id, :name, :age, :height, :weight, :eating_habits, :worktype, :disease, :title, :plan)";
    $stmt = $pdo->prepare($sql);
	
    $stmt -> execute( array ( ':date' => $_SESSION["date"],
	':dietition_id' => $_SESSION["userid"],
	':user_id' => $_SESSION["user_id"],
	':name' => $_SESSION["name1"],
	':age' => $_SESSION["age"],
	':height' => $_SESSION["height"],
	':weight' => $_SESSION["weight"],
	':eating_habits' => $_SESSION["eating_habits"], 
	':worktype' => $_SESSION["worktype"],
	':disease' => $_SESSION["disease"], 
	':title' => $_POST["title"],
	':plan' => $_POST["plan"]
	)
	);
    header( 'Location: provide diet plan.php' ) ;
	$_SESSION['profile_success'] = 'Plan Sent to User Successfully';
unset($_SESSION["date"]);
unset($_SESSION["user_id"]);
unset($_SESSION["name1"]);
unset($_SESSION["age"]);
unset($_SESSION["height"]);
unset($_SESSION["weight"]);
unset($_SESSION["eating_habits"]);
unset($_SESSION["worktype"]);
unset($_SESSION["disease"]);
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
  <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>

  <script type="text/javascript">  
  
function formValidation(){  
var title=document.profile.title.value;
var plan=document.profile.plan.value;

if (title==null || title==""){  
  alert("Title can't be blank");  
  return false;  
}
else if (plan==null || plan==""){  
  alert("Plan can't be blank");  
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
  <style>
 .zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
</style>

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
								<li><a href="dietition home.php">Home</a></li>
								<li><a href="provide diet plan.php">Provide Diet Plan</a></li>
								<?php 
								if ( isset($_SESSION['name']) ) {
								echo '
								<li class="dropdown-slide"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['name'].'<span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu">
										
										<li><a href="logout.php">LogOut</a></li>
									</ul>
								</li>'; 
								
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
          <h1>Create Diet Plan</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Profile form start -->
<section class="contact-form">
<br>
		  <p>
		
</p>
    <div class="container">
        <div class="row">
		<br> <br>
            <form method ="post" id="contact-form" name="profile"  action="create diet plan.php" onSubmit="return formValidation();" >
                <div>
                    <div class="block">
						<div class="form-group"><b>Name:</b>
                            <input type="text" name="name" class="form-control" placeholder="<?php echo $_SESSION["name1"];  ?>" readonly>
							
                        </div>
						<div class="form-group"><b>Age in Years:</b>
                            <input type="text" name="age" class="form-control" placeholder="<?php echo $_SESSION["age"];  ?>" readonly>
							
                        </div>
                        <div class="form-group"><b>Height in Centimeters:</b>
                            <input type="text" name="height" class="form-control" placeholder="<?php echo $_SESSION["height"];  ?>" readonly>
							
                        </div>
                        <div class="form-group"><b>Weight in Kilograms:</b>
                            <input type="text" name="weight" class="form-control" placeholder="<?php echo $_SESSION["weight"];  ?>" readonly>

                        </div> 
						<div class="form-group"><b>Food Preference:</b>
                            <input type="text"name="eating_habits" class="form-control" placeholder="<?php echo $_SESSION["eating_habits"];  ?>" readonly>
							
                        </div>
                        <div class="form-group"><b>Work Level of Activity:</b>
                            <input  type="text" name="worktype" class="form-control" placeholder="<?php echo $_SESSION["worktype"];  ?>"readonly>
							
                        </div>
						<div class="form-group"><b>Disease:</b>
                            <input type="text" name="disease" class="form-control" placeholder="<?php echo $_SESSION["disease"];  ?>"readonly>
							
                        </div>
						<div class="form-group"><b>Plan Title:</b>
                            <input type="text" name="title" class="form-control" placeholder="Please Enter title for Plan">
							
                        </div>
						<div class="form-group"><b>Plan:</b>
                            <textarea class="ckeditor" style="height:300px;" name="plan" class="form-control" placeholder="Please Enter Full Personalized Plan">
							<script> CKEDITOR.replace( 'plan' );</script>
							</textarea>
                        </div>
                       	<br>
						<br>
						<button class="btn btn-small mt-20"type="submit"align="center">Send Plan to User</button>
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
				<p class="copyright">Copyright 2020 &copy; Design & Developed by <a href="https:/www.linkedin.com/in/maitreya-tambade">Maitreya Tambade</a>. All rights reserved.
					<br>
				</p>
			</div>
		</div>
	</div>
</footer>    <!-- 
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