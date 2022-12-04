<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About Mage</title>
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

	<style>
		#customers {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: center;
		  background-color: skyblue;
		  color: white;
		}
	</style>

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
			if(!isset($_SESSION['sessionID'])) 
			{header('Location: login.php');}				
			include("navbarAdmin.php");
		?>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/feedback.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Feedback</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>Feedback</span></h2>
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
						<table id="customers" align="center">
						  <tr>
						    <th width="1%">No.</th>
						    <th width="19%">Name</th>
						    <th width="65%">Title</th>
						    <th>Action</th>
						  </tr>
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
							$totalPageSql = "SELECT COUNT(feedbackID) FROM feedback";
							$result = mysqli_query($dbconn,$totalPageSql);
							$totalRows = mysqli_fetch_array($result)[0];
							$totalPages = ceil($totalRows/$limit);

							$sql1 = "SELECT * FROM feedback LIMIT $offset, $limit";
							$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("statement error");							
							$numRow1 = mysqli_num_rows($sqlQuery1);

							if($numRow1 != 0) {
								$x = $offset + 1;
								while($row1 = mysqli_fetch_array($sqlQuery1)) {			
									echo	  "<tr>";
									echo	    "<td>".$x."</td>";
									echo	    "<td>".$row1["feedbackName"]."</td>";
									echo	    "<td>".$row1["feedbackTitle"]."</td>";
									echo	    "<td align='center'><button><a href='adminViewFeedbackDetails.php?feedbackID=".$row1["feedbackID"]."' style='color:black'>View</button></td>";
									echo	  "</tr>";									
									$x += 1;
								}								
							}
						?>						
						</table>							
					</div>
				</div>	
				<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<?php										
										for($x=1;$x<=$totalPages;$x++) {
											// Page Number Active
											if($pageno == $x) {						
												echo "<li class='active'><a href='adminViewFeedback.php?pageno=".$x."'>".$x."</a></li>";					
											}											
											// Page Number inactive
											else {										
												echo "<li><a href='adminViewFeedback.php?pageno=".$x."'>".$x."</a></li>";			
											}
										}										
									?>									
								</ul>
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

