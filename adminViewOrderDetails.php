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
			   	<li style="background-image: url(images/pageSlider/cartSlider.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>View Order Details</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>View Order Details</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">				
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<?php
							$memberID = base64_decode($_GET['memberID']);
							$customerName = base64_decode($_GET['name']);

							$sql = "SELECT * FROM member WHERE memberID = '$memberID' ";
							$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");	

							$row = mysqli_fetch_array($sqlQuery);	
						?>

						<h4>Customer Name: <?php echo $customerName; ?></h4>

						<div class="product-name">
							<div class="one-forth text-center">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>							
						</div>

						<!--Cart List!-->
						<?php
							$cartID = base64_decode($_GET['cartID']);
						
							$sql2 = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$cartID' ";
								$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");							

							$totPrice = 0;
							$shippingPrice = 0;	

							$rowNum = mysqli_num_rows($sqlQuery2);						

							while($row1 = mysqli_fetch_array($sqlQuery2)){
							echo "<div class='product-cart'>";
							echo "<div class='one-forth'>";
							echo 	"<div class='product-img' style='background-image: url(images/boxArt/".$row1['prodID'].".jpg)'>";
							echo 	"</div>";
							echo 	"<div class='display-tc'>";
							echo 		"<h3>".$row1['prodName']."</h3>";
							echo 	"</div>";
							echo "</div>";
							echo "<div class='one-eight text-center'>";
							echo 	"<div class='display-tc'>";
							echo 		"<span class='price'>RM".$row1['prodPrice']."</span>";
							echo 	"</div>";
							echo "</div>";
							echo "<div class='one-eight text-center'>";
							echo 	"<div class='display-tc'>";
							echo 		"<span class='price'>".$row1['quantity']."</span>";
							echo 	"</div>";
							echo "</div>";
							echo "<div class='one-eight text-center'>";
							echo 	"<div class='display-tc'>";
							echo 		"<span class='price'>RM".$row1['prodPrice']*$row1['quantity']."</span>";
							echo 	"</div>";
							echo "</div>";							
							echo "</div>";

							$totPrice = $totPrice +($row1['prodPrice']*$row1['quantity']);
							}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
											<div class="col-md-3">							<!-- Fill Gap -->					
											</div>
										</div>
									</form>
								</div>
								<!--Cart Total!-->
								<div class="col-md-3 col-md-push-1 text-center">
									<?php
										echo "<div class='total'>";
										echo 	"<div class='grand-total'>";
										echo 		"<p><span><strong>Sub Total:</strong></span> <span>RM".$totPrice."</span></p>";
										echo 	"</div>";
										echo "</div>";
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				

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
	</script>

	</body>
</html>