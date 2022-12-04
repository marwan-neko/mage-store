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

		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/addGameSlider.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Add Game</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>Add Game</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		<!-- Login Form -->
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">					
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Add Game</h3>
							<form name="addGameForm" action="adminAddGameProcess.php" method="post" enctype="multipart/form-data">
								<div class="row form-group">
									<div class="col-md-5">
										<label for="email">Game Name</label>
										<input type="text" name="gameName" class="form-control" placeholder="Game Name">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-5">
										<label for="subject">Game Price</label>
										<input type="text" name="gamePrice" class="form-control" placeholder="Game Price">
									</div>
								</div>		
								<div class="row form-group">
									<div class="col-md-5">
										<label for="subject">Game Platform</label>
										<br>
										<select name="gamePlatform">
											<option value="0">--Select Platform--</option>
											<option value="PS4">PS4</option>
											<option value="PS3">PS3</option>
											<option value="XBOX ONE">XBOX ONE</option>
											<option value="XBOX 360">XBOX 360</option>
											<option value="SWITCH">NINTENDO SWITCH</option>
											<option value="3DS">NINTENDO 3DS</option>
										</select>
									</div>
								</div>	
								<div class="row form-group">
									<div class="col-md-5">
										<label for="subject">Game Description</label>
										<textarea name="gameDesc" rows="5" cols="50" placeholder="Game Description"></textarea>
									</div>
								</div>	
								<div class="row form-group">
									<div class="col-md-5">
										<label for="subject">Game Cover Image</label>
										<input type="file" name="coverUpload">			
										<p style="color: red">* Only JPG Image and less than 5MB</p>
									</div>
								</div>
								<div class="cols form-group">
									<div class="col-md-3">
										<label for="subject">Thumbnail Image 1</label>
										<input type="file" name="thumbnailUpload1">
										<p style="color: red">* Only JPG Image and less than 5MB</p>
									</div>
								</div>
								<div class="cols form-group">
									<div class="col-md-3">
										<label for="subject">Thumbnail Image 2</label>
										<input type="file" name="thumbnailUpload2">
										<p style="color: red">* Only JPG Image and less than 5MB</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3">
										<label for="subject">Thumbnail Image 3</label>
										<input type="file" name="thumbnailUpload3">
										<p style="color: red">* Only JPG Image and less than 5MB</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3">
										<label for="subject">Save as Draft</label>
										<input type="checkbox" id="gameStatusID" name="gameStatus" value="0">
									</div>
								</div>				
								<div class="form-group text-left">
									<input type="submit" value="Add Game" class="btn btn-primary" onclick="return checkStatus()">		
								</div>
							</form>		
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
	
	<script type="text/javascript">		
		function checkStatus() {
			var name = document.addGameForm.gameName.value;
			var price = document.addGameForm.gamePrice.value;
			var platform = document.addGameForm.gamePlatform.value;
			var desc = document.addGameForm.gameDesc.value;
			var cover = document.addGameForm.coverUpload;
			var thumb1 = document.addGameForm.thumbnailUpload1;
			var thumb2 = document.addGameForm.thumbnailUpload2;
			var thumb3 = document.addGameForm.thumbnailUpload3;
			var status = document.addGameForm.gameStatus;

			if(!status.checked) {
				if(name == '') {
					alert("Insert a name!");
					return false;
				}

				else if(price == '') {
					alert("Insert a price!");
					return false;
				}

				else if(isNaN(price)) {
					alert("Price must be number!");
					return false;
				}

				else if(platform == 0) {
					alert("Insert a platform!");
					return false;
				}
				
				else if(desc == '') {
					alert("Insert a description!");
					return false;
				}			

				else if(cover.files.length == 0) {
					alert("Insert a cover!");
					return false;
				}				

				else if(thumb1.files.length == 0) {
					alert("Insert thumbnail 1!");
					return false;
				}

				else if(thumb2.files.length == 0) {
					alert("Insert thumbnail 2!");
					return false;
				}

				else if(thumb3.files.length == 0) {
					alert("Insert thumbnail 3!");
					return false;
				}
			}	

			else {
				if(name == '' && price == '' && platform == 0 && desc == '' && cover.files.length == 0 && thumb1.files.length == 0 && thumb2.files.length == 0 && thumb3.files.length == 0) {
					alert("Insert Something!");
					return false;
				}

				else if(isNaN(price)) {
					alert("Price must be number!");
					return false;
				}
			}		
		}
		
	</script>

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