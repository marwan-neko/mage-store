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
	
	<div class="colorlib-loader"></div>

	<div id="page">
		<!-- Navigation Bar -->
		<?php 
			session_start();
			include("dbconn.php");
			if(!isset($_SESSION['sessionID'])) {				
				header('Location: login.php');
			}

			include("navbarAdmin.php");

			// Get ID of Platform
			$platformID = mysqli_real_escape_String($dbconn,$_GET['platformid']);	
		?>
		
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
				<?php
					if($platformID == "0") {
						echo "<li style='background-image: url(images/pageSlider/allconsole.jpg)'>";
					}

					else if($platformID == "PS" || $platformID == "PS4" || $platformID == "PS3" || $platformID == "PSVITA") {
						echo "<li style='background-image: url(images/pageSlider/ps.jpg)'>";
					}

					else if($platformID == "XBOX" || $platformID == "XBOX ONE" || $platformID == "XBOX 360") {
						echo "<li style='background-image: url(images/pageSlider/xbox.jpg)'>";
					}

					else if($platformID == "NINTENDO" || $platformID == "SWITCH" || $platformID == "3DS") {
						echo "<li style='background-image: url(images/pageSlider/nintendo.jpg)'>";
					}
				?>			   	
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Inactive Games</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>Shop</span></h2>
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
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">							
							<?php
								if(isset($_GET['pageno'])) {
									$pageno = mysqli_real_escape_String($dbconn,$_GET['pageno']);
								}

								else {
									$pageno = 1;
								}

								$limit = 15;
								$offset = ($pageno-1) * $limit;				

								// Values for pagination
								$totalPageSql = "SELECT COUNT(prodID) FROM product";
								$result = mysqli_query($dbconn,$totalPageSql);
								$totalRows = mysqli_fetch_array($result)[0];
								$totalPages = ceil($totalRows/$limit);

								// Selecting Product Information
								// Searched Games
								if(isset($_GET['in'])) {
									$in = base64_decode($_GET['in']);				

									if($platformID == "0") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE prodID IN $in AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE prodID IN $in AND prodStatus = 'inactive' ORDER BY prodName LIMIT $offset, $limit";	
									}

									else if ($platformID == "PS") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = 'PS4' OR prodPlatform = 'PS3') AND prodID IN $in AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = 'PS4' OR prodPlatform = 'PS3') AND prodID IN $in AND prodStatus = 'inactive') ORDER BY prodName";
									}

									else if ($platformID == "XBOX") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = 'XBOX ONE' OR prodPlatform = 'XBOX 360') AND prodID IN $in AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = 'XBOX ONE' OR prodPlatform = 'XBOX 360') AND prodID IN $in AND prodStatus = 'inactive') ORDER BY prodName";
									}

									else if ($platformID == "NINTENDO") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = '3DS' OR prodPlatform = 'SWITCH') AND prodID IN $in AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = '3DS' OR prodPlatform = 'SWITCH') AND prodID IN $in AND prodStatus = 'inactive') ORDER BY prodName";
									}

									else {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE (prodPlatform = '$platformID' AND prodID IN $in AND prodStatus = 'inactive')";			
										$sql1 = "SELECT * FROM product WHERE (prodPlatform = '$platformID' AND prodID IN $in AND prodStatus = 'inactive') ORDER BY prodName";
									}	
									$result = mysqli_query($dbconn,$totalPageSql);
									$totalRows = mysqli_fetch_array($result)[0];
									$totalPages = ceil($totalRows/$limit);
								}

								// Not Searched Games
								else {
									if($platformID == "0") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE prodStatus = 'inactive' ORDER BY prodName LIMIT $offset, $limit";
									}

									else if ($platformID == "PS") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = 'PS4' OR prodPlatform = 'PS3') AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = 'PS4' OR prodPlatform = 'PS3') AND prodStatus = 'inactive') ORDER BY prodName LIMIT $offset, $limit";
									}

									else if ($platformID == "XBOX") {
										// Values for pagination
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = 'XBOX ONE' OR prodPlatform = 'XBOX 360') AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = 'XBOX ONE' OR prodPlatform = 'XBOX 360') AND prodStatus = 'inactive') ORDER BY prodName LIMIT $offset, $limit";
									}

									else if ($platformID == "NINTENDO") {
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE ((prodPlatform = '3DS' OR prodPlatform = 'SWITCH') AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE ((prodPlatform = '3DS' OR prodPlatform = 'SWITCH') AND prodStatus = 'inactive') ORDER BY prodName LIMIT $offset, $limit";
									}

									else {
										$totalPageSql = "SELECT COUNT(prodID) FROM product WHERE prodPlatform = '$platformID' AND prodStatus = 'inactive'";
										$sql1 = "SELECT * FROM product WHERE prodPlatform = '$platformID' AND prodStatus = 'inactive' ORDER BY prodName LIMIT $offset, $limit";
									}
									$result = mysqli_query($dbconn,$totalPageSql);
									$totalRows = mysqli_fetch_array($result)[0];
									$totalPages = ceil($totalRows/$limit);
								}
								
								$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");
								$rowNo = mysqli_num_rows($sqlQuery1); // Number of rows

								if(!$sqlQuery1) {
									echo "Error in SQL Query" . mysqli_error();
								}							

								if(isset($_GET['result'])) {
									echo "<h2>No Result Found!</h2>";
								}

								else {
									// Displaying all the products
									while($row1 = mysqli_fetch_array($sqlQuery1)) {	
										echo "<div class='col-md-4 text-center'>";
										echo	"<div class='product-entry'>";
										echo		"<div class='product-img' style='background-image: url(images/boxArt/".$row1["prodID"].".jpg)'>";
										echo		"<p class='tag'><span class='new'>".$row1["prodPlatform"]."</span></p>";
										echo		"<div class='cart'>";
										echo			"<p>";						 
										echo				"<span><a href='adminUpdateInactiveGame.php?gameid=".base64_encode($row1["prodID"])."'><i class='icon-edit2'></i></a></span>";	
										echo			"</p>";
										echo		"</div>";
										echo	"</div>";
										echo	"<div class='desc'>";
										echo		"<h3><a href='adminUpdateInactiveGame.php?gameid=".base64_encode($row1["prodID"])."'>".$row1["prodName"]."</a></h3>";
										echo		"<p class='price'><span>RM".$row1["prodPrice"]."</span></p>";
										echo	"</div>";
										echo"</div>";
										echo"</div>";	
									}									
								}				
								mysqli_close($dbconn);
							?>						
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<?php										
										for($x=1;$x<=$totalPages;$x++) {
											// Page Number Active
											if($pageno == $x) {
												if(isset($_GET['in'])) {
													echo "<li class='active'><a href='adminInactiveGame.php?pageno=".$x."&platformid=".$platformID."&in=".$in."'>".$x."</a></li>";
												}

												else {
													echo "<li class='active'><a href='adminInactiveGame.php?pageno=".$x."&platformid=".$platformID."'>".$x."</a></li>";
												}
											}											
											// Page Number inactive
											else {
												if(isset($_GET['in'])) {
													echo "<li><a href='adminInactiveGame.php?pageno=".$x."&platformid=".$platformID."&in=".$in."'>".$x."</a></li>";
												}

												else {
													echo "<li><a href='adminInactiveGame.php?pageno=".$x."&platformid=".$platformID."'>".$x."</a></li>";
												}
											}
										}										
									?>									
								</ul>
							</div>
						</div>
					</div>

					<!-- Sidebar -->
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
							<h2>Search Bar</h2>
							<form name="searchGame" action="searchGame.php?platformid=<?php echo $platformID; ?>&status=inactive&user=1" method="post" class="colorlib-form-2">
				             <div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
					                  <label for="guests">Search Games</label>
					                  <div class="form-field">		                      
					                    <input type="text" name="searchGame" size="15px">
					                  </div>					                  
				                  </div>
				                </div>				                
				              </div>
				              <input type="submit" name="submitSearch" value="Search" class="btn btn-primary">
				            </form>
							</div>
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">			                  	
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingOne">
			                             <h4 class="panel-title">
			                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Playstation
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			                             <div class="panel-body">
			                                 <ul>
			                                 	<li><a href="adminInactiveGame.php?platformid=PS3">PS3</a></li>
			                                 	<li><a href="adminInactiveGame.php?platformid=PS4">PS4</a></li>                               	
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingTwo">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Nintendo
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			                             <div class="panel-body">
			                                <ul>
			                                 	<li><a href="adminInactiveGame.php?platformid=3DS">Nintendo 3DS</a></li>
			                                 	<li><a href="adminInactiveGame.php?platformid=SWITCH">Nintendo Switch</a></li>                 	
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingThree">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Xbox
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			                             <div class="panel-body">
			                                <ul>
			                                 	<li><a href="adminInactiveGame.php?platformid=XBOX 360">Xbox 360</a></li>
			                                 	<li><a href="adminInactiveGame.php?platformid=XBOX ONE">Xbox One</a></li>     	
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>			                     
			                  </div>
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

	</body>
</html>

