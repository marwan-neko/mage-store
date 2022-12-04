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
			if(isset($_SESSION['sessionID'])) {				
				include("navbarSession.php");
			}

			else {
				include("navbar.php");
			}
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
				   					<h1>Shopping Cart</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span>Shopping Cart</span></h2>
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
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
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
							<div class="one-eight text-center">
								<span>Action</span>

							</div>
						</div>

						<!--Cart List!-->
						<?php
							$userID = $_SESSION['userID'];

							$sql = "SELECT * FROM cart WHERE memberID = '$userID'";
							$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");			

							while($row = mysqli_fetch_array($sqlQuery)) {
								$sql2 = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$row[cartID]' ";
									$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");
							}

							$totPrice = 0;
							$shippingPrice = 0;	

							$rowNum = mysqli_num_rows($sqlQuery2);						

							while($row1 = mysqli_fetch_array($sqlQuery2)){
							echo "<form name= 'updateOrder' action='updateOrder.php?cartListID=".urlencode(base64_encode($row1['cartListID']))."' method= 'post'>";	
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
							echo 		"<input type='text' id='quantity' name='quantity' class='form-control input-number text-center' value=".$row1['quantity']." min='1' max='100'>";
							echo 	"</div>";
							echo "</div>";
							echo "<div class='one-eight text-center'>";
							echo 	"<div class='display-tc'>";
							echo 		"<span class='price'>RM".$row1['prodPrice']*$row1['quantity']."</span>";
							echo 	"</div>";
							echo "</div>";
							echo "<div class='one-eight text-center'>";
							echo 	"<div class='display-tc'>";
							echo 		"<input type='submit' value='Update' class='btn btn-primary'>";
							echo 		"<a href ='deleteOrder.php?cartListID=".urlencode(base64_encode($row1['cartListID']))."' class='btn btn-primary'>Delete</a>";
							echo 	"</div>";
							echo "</div>";
							echo "</div>";
							echo "</form>";

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
											<div class="col-md-3">
												<a href="checkout.php" class='btn btn-primary' onclick="return checkout()">Checkout</a>
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

		<?php include("footer.php"); ?>		
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<script type="text/javascript">
		function checkout() {
			var numRow = <?php echo $numRow; ?>;
			if(numRow == 0) {
				alert("You have no game in your cart!");
				return false;
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
	</script>

	</body>
</html>