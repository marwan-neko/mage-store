<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
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
	<?php 
	session_start();

	include("dbconn.php");	
	?>	
	<div class="colorlib-loader"></div>

	<div id="page">
		<!-- Navigation Bar -->
		<?php
			if(!isset($_SESSION['sessionID'])) {				
				header('Location: login.php');
			}

			include("navbarAdmin.php");			
		?>	
		
		<!-- Sliders -->
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				<!-- Slider Example -->
			   	<li style="background-image: url(images/adminSlider.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">		   					
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li> 			   	
			  	</ul>
		  	</div>
		</aside>

		<!-- Featured Product -->
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="adminViewGame.php?platformid=0" class="f-product-1" style="background-image: url(images/ffxv.jpg);">
							<div class="desc">
								<h2>All<br>GAMES</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="adminViewGame.php?platformid=PS4" class="f-product-2" style="background-image: url(images/rdd2.jpg);">
									<div class="desc">
										<h2>PS4 <br>Games</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="adminViewGame.php?platformid=XBOX ONE" class="f-product-2" style="background-image: url(images/bf1.jpg);">
									<div class="desc">
										<h2>XBOX <br>ONE <br>GAMES</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="adminViewGame.php?platformid=SWITCH" class="f-product-2" style="background-image: url(images/feth.jpg);">
									<div class="desc">
										<h2>NINTENDO <br>SWITCH <br>GAMES</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- New Releases -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">					
					<div class="col-md-6">
						<div class="cart-detail">
							<?php
								$sql1 = "SELECT * FROM product WHERE prodStatus = 'active'";
								$sqlQuery1 = mysqli_query($dbconn,$sql1) or die("statement error");
								$numRow1 = mysqli_num_rows($sqlQuery1);

								$sql2 = "SELECT * FROM product WHERE prodPlatform = 'PS4' AND prodStatus = 'active'";
								$sqlQuery2 = mysqli_query($dbconn,$sql2) or die("statement error");
								$numRow2 = mysqli_num_rows($sqlQuery2);

								$sql3 = "SELECT * FROM product WHERE prodPlatform = 'PS3' AND prodStatus = 'active'";
								$sqlQuery3 = mysqli_query($dbconn,$sql3) or die("statement error");
								$numRow3 = mysqli_num_rows($sqlQuery3);

								$sql4 = "SELECT * FROM product WHERE prodPlatform = 'XBOX ONE' AND prodStatus = 'active'";
								$sqlQuery4 = mysqli_query($dbconn,$sql4) or die("statement error");
								$numRow4 = mysqli_num_rows($sqlQuery4);

								$sql5 = "SELECT * FROM product WHERE prodPlatform = 'XBOX 360' AND prodStatus = 'active'";
								$sqlQuery5 = mysqli_query($dbconn,$sql5) or die("statement error");
								$numRow5 = mysqli_num_rows($sqlQuery5);

								$sql6 = "SELECT * FROM product WHERE prodPlatform = 'SWITCH' AND prodStatus = 'active'";
								$sqlQuery6 = mysqli_query($dbconn,$sql6) or die("statement error");
								$numRow6 = mysqli_num_rows($sqlQuery6);

								$sql7 = "SELECT * FROM product WHERE prodPlatform = '3DS' AND prodStatus = 'active'";
								$sqlQuery7 = mysqli_query($dbconn,$sql7) or die("statement error");
								$numRow7 = mysqli_num_rows($sqlQuery7);

								$sql8 = "SELECT * FROM product WHERE prodStatus = 'inactive'";
								$sqlQuery8 = mysqli_query($dbconn,$sql8) or die("statement error");
								$numRow8 = mysqli_num_rows($sqlQuery8);

								$sql9 = "SELECT * FROM product WHERE prodStatus = 'draft'";
								$sqlQuery9 = mysqli_query($dbconn,$sql9) or die("statement error");
								$numRow9 = mysqli_num_rows($sqlQuery9);
							?>
							<h2 align="center">Number of Games</h2>
							<ul>
								<li>
									<span>Total Number of Active Games</span> <span><?php echo $numRow1; ?></span>
									<ul>
										<li><span>- PS4 Games</span> <span><?php echo $numRow2; ?></span></li>
										<li><span>- PS3 Games</span> <span><?php echo $numRow3; ?></span></li>
										<li><span>- Xbox One Games</span> <span><?php echo $numRow4; ?></span></li>
										<li><span>- Xbox 360 Games</span> <span><?php echo $numRow5; ?></span></li>
										<li><span>- Nintendo Switch Games</span> <span><?php echo $numRow6; ?></span></li>
										<li><span>- Nintendo 3DS Games</span> <span><?php echo $numRow7; ?></span></li>
									</ul>
								</li>
								<li><span>Total Number of Inactive Games</span> <span><?php echo $numRow8; ?></span></li>
								<li><span>Total Number of Draft Games</span> <span><?php echo $numRow9; ?></span></li>
							</ul>
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