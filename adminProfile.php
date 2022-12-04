<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<?php include("dbconn.php"); ?>	
	<div class="colorlib-loader"></div>

	<div id="page">
		<?php 
		session_start();
		include("dbconn.php");
		if(!isset($_SESSION['sessionID'])) {				
			header('Location: login.php');
		}

		include("navbarAdmin.php"); 

		$sql = "SELECT * FROM admin WHERE adminID = '$_SESSION[userID]'";

		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");	
		$row = mysqli_fetch_array($sqlQuery);
		$numRow = mysqli_num_rows($sqlQuery);

		// Checking SQL Statement

		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}
		?>
		<!-- Profile Form -->
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">					
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Profile</h3>
							<form name="updateForm" action="adminProfileProcess.php" method="post">
								<div class="row form-group">
									<div class="col-md-4 padding-bottom">
										<label for="subject">Username</label>
										<input type="text" name="updateUsername" class="form-control" value="<?php echo $row["adminName"];?>">										
									</div>
								</div>								
								<div class="row form-group">
									<div class="col-md-4">
										<label for="subject">Password</label>
										<input type="password" name="updatePassword" class="form-control" value="<?php echo $row["adminPassword"];?>">
									</div>
								</div>
								<div class="form-group text-left">
									<input type="submit" value="Update" class="btn btn-primary">
								</div>
							</form>	
						</div>								
					</div>
				</div>
			</div>	
		</div>
	</div>
		
	<!-- Footer -->
	<?php include("footerAdmin.php"); ?>		
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>