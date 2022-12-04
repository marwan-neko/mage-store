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
				   					<h1>View Order</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>View Order</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="sidebar" align="center">
			<div class="side">
			<form name="searchCart" action="searchCart.php" method="post" class="colorlib-form-2">
             <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
	                  <label for="guests">Search Data</label>
	                  <div class="form-field">		                      
	                    <input type="text" name="searchCart" size="15px">
	                  </div>					                  
                  </div>
                </div>				                
              </div>
              <input type="submit" name="submitSearch" value="Search" class="btn btn-primary">
            </form>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">				
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-eight text-center">
								<span>No.</span>
							</div>
							<div class="one-forth text-center">
								<span>Name</span>
							</div>
							<div class="one-eight text-center">
								<span>Total Purchase</span>
							</div>
							<div class="one-eight text-center">
								<span>Action</span>
							</div>
						</div>

						<?php
							if(isset($_GET['pageno'])) {
								$pageno = mysqli_real_escape_String($dbconn,$_GET['pageno']);
							}

							else {
								$pageno = 1;
							}

							$limit = 10;
							$offset = ($pageno-1) * $limit;							

							if(isset($_GET['result'])) {
								echo "<h2>No Result Found!</h2>";
							}

							else {
								if(isset($_GET['in'])) {
									$in = base64_decode($_GET['in']);
									
									$totalPageSql = "SELECT COUNT(cartID) FROM cart WHERE cartID IN $in";
									$sql = "SELECT * FROM cart WHERE NOT cartTotal = 0 AND cartID IN $in LIMIT $offset, $limit";	
								}	

								else {
									$totalPageSql = "SELECT COUNT(cartID) FROM cart";
									$sql = "SELECT * FROM cart WHERE NOT cartTotal = 0 LIMIT $offset, $limit";						
								}

								$result = mysqli_query($dbconn,$totalPageSql);
								$totalRows = mysqli_fetch_array($result)[0];
								$totalPages = ceil($totalRows/$limit);

								$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");

								$x = $offset + 1;
								while($row1 = mysqli_fetch_array($sqlQuery)) {
									$sql2 = "SELECT * FROM member WHERE memberID = '$row1[memberID]' ";
									$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");	

									$row2 = mysqli_fetch_array($sqlQuery2);				

									echo "<div class='product-cart'>";
									echo "<div class='one-eight text-center'>";		
									echo 	"<div class='display-tc'>";
									echo 		"<h3>".$x."</h3>";
									echo 	"</div>";
									echo "</div>";
									echo "<div class='one-forth text-center'>";
									echo 	"<div class='display-tc'>";
									echo 		"<span class='price'>".$row1['shipName']."</span>";
									echo 	"</div>";
									echo "</div>";								
									echo "<div class='one-eight text-center'>";
									echo 	"<div class='display-tc'>";
									echo 		"<span class='price'>RM".$row1['cartTotal']."</span>";
									echo 	"</div>";
									echo "</div>";
									echo "<div class='one-eight text-center'>";
									echo 	"<div class='display-tc'>";
									echo 		"<a href ='adminViewOrderDetails.php?cartID=".base64_encode($row1['cartID'])."&memberID=".base64_encode($row2['memberID'])."&name=".base64_encode($row1['shipName'])."' class='btn btn-primary'>View Details</a>";
									echo 	"</div>";
									echo "</div>";
									echo "</div>";
									$x++;								
								}
							}														
						?>

						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<?php		
										if(!isset($_GET['result']))	{
											for($x=1;$x<$totalPages;$x++) {
												// Page Number Active
												if($pageno == $x) {
													if(isset($_GET['in'])) {
														echo "<li class='active'><a href='adminViewOrder.php?pageno=".$x."&in=".$in."'>".$x."</a></li>";
													}

													else {
														echo "<li class='active'><a href='adminViewOrder.php?pageno=".$x."'>".$x."</a></li>";
													}
												}											
												// Page Number inactive
												else {
													if(isset($_GET['in'])) {
														echo "<li><a href='adminViewOrder.php?pageno=".$x."&in=".$in."'>".$x."</a></li>";
													}

													else {
														echo "<li><a href='adminViewOrder.php?pageno=".$x."'>".$x."</a></li>";
													}
												}
											}
										}							
										
									?>									
								</ul>
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