<?php
require_once "pdo.php";
session_start();
/*if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ( isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['email']) && isset($_POST['qualification']))
  {
$sql = "INSERT INTO dietition (name, username, password, email, qualification) VALUES (:name, :username, :password, :email, :qualification)";
    $stmt = $pdo->prepare($sql);
	
    $stmt->execute(array(
        ':name' => $_POST['name'],
		':username' => $_POST['username'],
		':password' => $_POST['password'],
        ':email' => $_POST['email'],
        ':qualification' => $_POST['qualification']));
    
    header( 'Location: add dietition.php' ) ;
	$_SESSION['new_dietititon'] = 'New Dietition Added';
    return;
	}
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
  <script type="text/javascript">  
function formValidation(){  
var name=document.signup.name.value;
var username=document.signup.username.value;
var email=document.signup.email.value;  
var atposition=email.indexOf("@");  
var dotposition=email.lastIndexOf(".");  
var password=document.signup.password.value;  
var qualification=document.signup.qualification.value; 

if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}
else if (username==null || username==""){  
  alert("UserName can't be blank");  
  return false;  
}
else if (password==null || password==""){  
  alert("Password can't be blank");  
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
  else if (qualification==null || qualification==""){  
  alert("Qualification can't be blank");  
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
          <h1>Clients History</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- signup form start -->
<section class="contact-form">
<br><p>

	<br><br>
  <?php
				//index view 
				if ( isset($_GET['user_id']))
				{
					$sql= "SELECT * FROM dietplan inner join users on users.user_id = dietplan.user_id WHERE dietplan.user_id=:user_id ORDER BY dietplan.start_date DESC";
					$query = $pdo -> prepare($sql);
					$query-> execute(array(  
                          ':user_id'     =>     $_GET['user_id']) 
                     );

					if($query -> rowCount() > 0)
					{
						echo('<table border = "1" align="Center"  class="zui-table">' . "\n");

						echo "<thead><tr><th>dietplan Id</th><th>Name</th><th>Plan Date</th><th>Plan Title</th><th>Action</th></tr></thead> <tbody>";

						while($row = $query -> fetch(PDO::FETCH_ASSOC))
						{
							echo "<tr><td>";
							echo(htmlentities($row["dietplan_id"]));
							echo "</td><td>";
							echo(htmlentities($row["name"]));
							echo "</td><td>";
							echo(htmlentities($row["start_date"]));
							echo "</td><td>";
							echo(htmlentities($row["title"]));
							echo "</td><td>";
							echo ('<a class="btn btn-small" href = "view details.php?plan_id='.$row["dietplan_id"].'">View Details</a>  ');
	
							echo "</td></tr>\n";
						}

						echo " <tbody></table>\n<br><br><p align='center'><a class='btn btn-small' href = 'provide diet plan.php?'>Back</a></p>";
					}
					else
					{
						echo "<p align='center'><B>No Records found</B></p><br><br>
						<p align='center'><a align='center' class='btn btn-small' href = 'provide diet plan.php?'>Back</a></p>";
					}

				}	
				
			?>
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