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
		<!-- Navigation Bar -->
		<?php include("navbar.php"); ?>

		<!-- Register Form -->
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">					
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Register</h3>
							<form name="registerForm" action="registerProcess.php" method="post">
								<div class="row form-group">
									<div class="col-md-7 padding-bottom">
										<label for="fname">Full Name</label>
										<input type="text" id="registerName" name="registerName" class="form-control" placeholder="Please Enter Your Full Name">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										<label for="email">Email</label>
										<input type="text" name="registerEmail" class="form-control" placeholder="Your email address">
									</div>
								</div>								
								<div class="row form-group">
									<div class="col-md-6">
										<label for="subject">Username</label>
										<input type="text" id="registerUsername" name="registerUsername" class="form-control" placeholder="Please Enter your Username">
										<br>
										<h5 style="color: red">*You cannot change your username after registration</h5>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-4">
										<label for="subject">Password</label>
										<input type="password" name="registerPassword" class="form-control" placeholder="Please Enter your Password">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-4">
										<label for="subject">Confirm Password</label>
										<input type="password" name="registerConfirmPassword" class="form-control" placeholder="Please Confirm your Password">
									</div>
								</div>
								<div class="form-group text-left">
									<input type="submit" value="Submit" class="btn btn-primary" onclick="return validateForm()">
								</div>
							</form>	
						</div>								
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- Footer -->
	<?php include("footer.php"); ?>		
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<script type="text/javascript">
		// Form Validation Function    
	    function validateForm() {
			var name = document.registerForm.registerName.value;
			var email = document.registerForm.registerEmail.value;
			var username = document.registerForm.registerUsername.value;			
			var password = document.registerForm.registerPassword.value;
			var confirmPassword = document.registerForm.registerConfirmPassword.value;

			var lowerCaseLetters = /[a-z]/g; 	
			var upperCaseLetters = /[A-Z]/g;
			var numbers = /[0-9]/g;		

			var atpos = email.indexOf("@");
			var dotpos = email.indexOf(".");			

			if (name == '') {
				alert("Please Insert Your Name!");
				document.registerForm.registerName.focus();
				return false; // Stop user from going to next page
			}

			else if (email == '') {
				alert("Please Insert Your Email!");
				document.registerForm.registerEmail.focus();
				return false; // Stop user from going to next page
			}

			else if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= email.length) {
				alert("Not a valid email address");
				document.registerForm.registerEmail.focus();
				return false; // Stop user from going to next page
			}

			else if (username == '') {
				alert("Please Insert Your Username!");
				document.registerForm.registerUsername.focus();
				return false; // Stop user from going to next page
			}			

			else if (password == '') {
				alert("Please Insert Your Password!");
				document.registerForm.registerPassword.focus();
				return false; // Stop user from going to next page
			}

			else if(password.length < 8) {
				alert("Password must be 8 characters or longer!");
				document.registerForm.registerPassword.focus();
				return false; // Stop user from going to next page
			}

			else if(!password.match(lowerCaseLetters)) {
				alert("Password must have at least 1 lowercase letter!");
				document.registerForm.registerPassword.focus();
				return false; // Stop user from going to next page
			}

			else if(!password.match(upperCaseLetters)) {
				alert("Password must have at least 1 uppercase letter!");
				document.registerForm.registerPassword.focus();
				return false; // Stop user from going to next page
			}

			else if(!password.match(numbers)) {
				alert("Password must have at least 1 number!");
				document.registerForm.registerPassword.focus();
				return false; // Stop user from going to next page
			}

			else if (confirmPassword == '') {
				alert("Please Confirm Your Password!");
				document.registerForm.registerConfirmPassword.focus();
				return false; // Stop user from going to next page
			}

			else if(password != confirmPassword) {
				alert("Confirm Password Must Be The Same!");
				document.registerForm.registerConfirmPassword.focus();
				return false; // Stop user from going to next page
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