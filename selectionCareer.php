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
	<style type="text/css">
		.afif {
			color: red;
			font-size: 20px;
		}
	</style>
	</head>
	<body>
		<?php 
			session_start();
			include("dbconn.php");	
			$careerID = $_GET['careerID'];		
			?>	
	<div class="colorlib-loader"></div>

	<div id="page">

	<!-- Navigation Bar -->
		<?php
			if(isset($_SESSION['sessionID'])) 
			{include("navbarSession.php");}				
			else {include("navbar.php");}
		?>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>About Us</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span>About</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth">
							<div class="row">
								<div class="col-md-12 about">
									<h2>About</h2>
									<ul>
										<li><a href="about.php">History</a></li>
										<li><a href="staff.php">Staff</a></li>
										<li><a href="career.php">Career</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-three-forth">
							<h2>Career</h2>
						<?php
						if($careerID == 1) {
							echo "<h3>Marketing Manager</h3>
							<div>
								<h4>Description</h4>
								<li>Responsible for developing, implementing and executing strategic marketing plans for an entire organization in order to atrract potential customers and retain existing ones.</li>
								<li>Developing strategies and tactics to get the word out about our company and drive qualified traffic to our front door.</li>
								<li>Be in charge of marketing budget and allocate/invest funds wisely</li>
							</div>
							<h3>Requirement:</h3>
							<div>
								<li>Banchelor Bussiness or Management in marketing or related field or higher</li>
								<li>Communication Skills and Multiple language(Mandatory English & Malay)</li>
								<li>Excel in computer</li>
								<li>Best practices in online marketing and measurement.</li>
							</div>";					
						}
						
						else if($careerID == 2) {
							echo "<h3>Financial Manager</h3>
							<div>
								<h4>Description</h4>
								<li>Providing financial reports and interpreting financial information to managerial staff while recommeding further courses of action.</li>
								<li>Maintain the financial health of the organization.</li>
								<li>Manage the preparation of the company's budget.</li>
							</div>
							<h3>Requirement:</h3>
							<div>
								<li>Proven experience as Financial Manager</li>
								<li>Communication Skills and Multiple language(Mandatory English & Malay).</li>
								<li>A solid understanding of financial statistics and accounting principles</li>
								<li>Bancherlor Bussiness in Finance,Accounting or Economics or higher</li>
							</div>";
						}
						elseif ($careerID == 3) {
							echo"<h3>Adminstration Manager</h3>
							<div>
								<h4>Description</h4>
								<li>Plan and coordinate administrative procedures and systems and devise ways to streamline processes.</li>
								<li>Ensure the smooth and adequate flow of information.</li>
								<li>Be in charge of marketing budget and allocate/invest funds wisely</li>
							</div>
							<h3>Requirement:</h3>
							<div>
								<li>Bancherlor Bussiness Adminstration or related field or higher</li>
								<li>Communication Skills and Multiple language(Mandatory English & Malay).</li>
								<li>Proven as Adminstration Manager.</li>
								<li>A team player with leadership skills.</li>
							</div>";
						}
						elseif ($careerID == 4) {
							echo "<h3>IT Manager</h3>
							<div>
								<h4>Description</h4>
								<li>Responsible for implementing and maintaining an organization's technology infrastructure.</li>
								<li>Ensure security of data,network access and backup systems.</li>
								<li>Manage information technology and computer systems.</li>
							</div>
							<h3>Requirement:</h3>
							<div>
								<li>Bancherlor in Computer Science or related field or higher</li>
								<li>Communication Skills and Multiple language(Mandatory English & Malay).</li>
								<li>Exccellent knowledge of techincal management,information analysis and of computer hardware/software systems.</li>
								<li>Proven working experience as IT manager or relevent experience.</li>
							</div>"
							;
						}
						elseif ($careerID == 5) {
							echo "<h3>General Worker</h3>
							<div>
								<h4>Description</h4>
								<li>COntribute of the work for company.</li>
								<li>Can be work with one of the manager and also has chance to be one of manager.</li>
								<li>Many scope of work can be done in this company</li>
							</div>
							<h3>Requirement:</h3>
							<div>
								<li>SPM level or higher</li>
								<li>Communication Skills</li>
								<li>Basic in bussiness/mathematic</li>
							</div>
							";
						}
						?>
							<h3>Interested</h3>
							<p>Please email your resume at <a href="apipeijlan@gmail.com">apipeijlan@gmail.com</a></p>
							<p style="color: red">*Any email that we reply is indicator for you ready for interview session</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
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

