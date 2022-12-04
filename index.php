<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mage</title>
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
			if(isset($_SESSION['sessionID'])) {				
				include("navbarSession.php");
			}

			else {
				include("navbar.php");
			}
		?>	
		
		<!-- Sliders -->
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				<?php
					// Selecting Product Information
					$sql1 = "SELECT * FROM product LIMIT 5";
					$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");
					$rowNo1 = mysqli_num_rows($sqlQuery1); // Number of rows

					if(!$sqlQuery1) {
						echo "Error in SQL Query" . mysqli_error();
					}
					
					while($row1 = mysqli_fetch_array($sqlQuery1)) {	
						echo "<li style='background-image: url(images/Slider/".$row1["prodID"]."s.jpg);'>";
					   	echo	"<div class='overlay'></div>";
					   	echo	"<div class='container-fluid'>";
					   	echo		"<div class='row'>";
						echo   			"<div class='col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text'>";
						echo   				"<div class='slider-text-inner'>";			
						echo	   					"<h5 class='head-1' style='-webkit-text-stroke-color: white; -webkit-text-stroke-width: 2px;'>".$row1["prodName"]."</h5>";
						echo	   					"<h2 class='head-2' style='-webkit-text-stroke-color: white; -webkit-text-stroke-width: 1px;'>".substr($row1["prodDesc"],0,70)."...</h2>";						
						echo	   					"<p><a href='product-detail.php?gameid=".base64_encode($row1["prodID"])."' class='btn btn-primary'>Buy Now</a></p>";
						echo   				"</div>";
						echo   			"</div>";
						echo   		"</div>";
					   	echo	"</div>";
					   	echo "</li>";								
					}							
				?>							   	
			  	</ul>
		  	</div>
		</aside>

		<!-- Featured Product -->
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="shop.php?platformid=0" class="f-product-1" style="background-image: url(images/ffxv.jpg);">
							<div class="desc">
								<h2>All<br>GAMES</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="shop.php?platformid=PS4" class="f-product-2" style="background-image: url(images/rdd2.jpg);">
									<div class="desc">
										<h2>PS4 <br>Games</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="shop.php?platformid=XBOX ONE" class="f-product-2" style="background-image: url(images/bf1.jpg);">
									<div class="desc">
										<h2>XBOX <br>ONE <br>GAMES</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="shop.php?platformid=SWITCH" class="f-product-2" style="background-image: url(images/feth.jpg);">
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

		<!-- New Arrival -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
						<p>This is the newly added games section!</p>
					</div>
				</div>
				<div class="row">					
					<?php
						// Selecting Product Information Last 4 Rows
						$sql2 = "SELECT * FROM product WHERE prodStatus = 'active' ORDER BY prodID DESC LIMIT 4";
						$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");
						$rowNo2 = mysqli_num_rows($sqlQuery2); // Number of rows

						if(!$sqlQuery2) {
							echo "Error in SQL Query" . mysqli_error();
						}	

						while($row2 = mysqli_fetch_array($sqlQuery2)) {
							echo "<div class='col-md-3 text-center'>";
							echo	"<div class='product-entry'>";
							echo		"<div class='product-img' style='background-image: url(images/boxArt/".$row2["prodID"].".jpg);'>";
							echo			"<p class='tag'><span class='new'>".$row2["prodPlatform"]."</span></p>";
							echo			"<div class='cart'>";
							echo				"<p>";
							echo					"<span class='addtocart'><a href='cart.html'><i class='icon-shopping-cart'></i></a></span>"; 
							echo					"<span><a href='product-detail.php?gameid=".base64_encode($row2["prodID"])."'><i class='icon-eye'></i></a></span>";						
							echo				"</p>";
							echo			"</div>";
							echo		"</div>";
							echo		"<div class='desc'>";
							echo			"<h3><a href='product-detail.php?gameid=".$row2["prodID"]."'>".$row2["prodName"]."</a></h3>";
							echo			"<p class='price'><span>RM".$row2["prodPrice"]."</span></p>";
							echo		"</div>";
							echo	"</div>";
							echo "</div>";							
						}							
					?>								
				</div>
			</div>
		</div>		

		<!-- Our Products -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Products</span></h2>
						<p>We sell a wide range of console games from the third generation console(PS3, XBOX 360, N3DS) to the current generation(PS4, XBOX ONE, SWITCH)!</p>
					</div>
				</div>
				<div class="row">
					<?php 
						$sql3 = "SELECT * FROM product WHERE prodStatus = 'active' ORDER BY RAND() LIMIT 4";
						$sqlQuery3 = mysqli_query($dbconn, $sql3) or die("Statement Error");
						$rowNo3 = mysqli_num_rows($sqlQuery3); // Number of rows

						if(!$sqlQuery3) {
							echo "Error in SQL Query" . mysqli_error();
						}	

						while($row3 = mysqli_fetch_array($sqlQuery3)) { 
							echo "<div class='col-md-3 text-center'>";
							echo	"<div class='product-entry'>";								
							echo		"<div class='product-img' style='background-image: url(images/boxArt/".$row3["prodID"].".jpg);'>";
							echo			"<p class='tag'><span class='sale'>".$row3["prodPlatform"]."</span></p>";
							echo			"<div class='cart'>";
							echo				"<p>";
							echo					"<span class='addtocart'><a href='addToCart.php?cartStatus=0'><i class='icon-shopping-cart'></i></a></span>"; 
							echo					"<span><a href='product-detail.php?gameid=".base64_encode($row3["prodID"])."'><i class='icon-eye'></i></a></span>";						
							echo				"</p>";
							echo			"</div>";
							echo		"</div>";
							echo		"<div class='desc'>";
							echo			"<h3><a href='shop.php'>".$row3["prodName"]."</a></h3>";
							echo			"<p class='price'><span>RM".$row3["prodPrice"]."</span></p>";
							echo		"</div>";
							echo	"</div>";
							echo "</div>";  
						} 
					?>					
				</div>
			</div>
		</div>	

		<!-- Footer -->
		<?php include("footer.php"); ?>
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