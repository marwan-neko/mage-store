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
			
			include("navbarSession.php");						
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
				   					<h1>Checkout</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span><a href="cart.php">Shopping Cart</a></span> <span>Checkout</span></h2>
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
							<div class="process text-center active">
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
				<?php 

						$userID = $_SESSION['userID'];
						$cartID = $_SESSION['cartID'];

							$sql = "SELECT * FROM cart WHERE memberID = '$userID'";
							$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");			

							while($row = mysqli_fetch_array($sqlQuery)) {
								$sql2 = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$row[cartID]' ";
									$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");
							}


							$sql3 = "SELECT * FROM cart WHERE cartID = '$cartID' ";
							$sqlQuery3 = mysqli_query($dbconn, $sql3) or die("Statement Error");

							$totPrice = 0;
							$delivery = 0;

							while ($row5 = mysqli_fetch_array($sqlQuery2)) {
									$totPrice = $totPrice+($row5['quantity']*$row5['prodPrice']);
								}

							while($row2 =  mysqli_fetch_array($sqlQuery3))
								{
									if($row2['shipState']=='12'|| $row2['shipState']=='13' || $row2['shipState']=='15'){$delivery = 15;}
									elseif ($row2['shipState']=='0'||$row2['shipState']=='') { $delivery = 0;}
									else{$delivery = 10;}
									$totPrice = $totPrice+$delivery;
								
											echo "
				<div class='row'>
					<div class='col-md-7'> 
						<form method='post' class='colorlib-form' action='checkoutAddress.php?totPrice=".urlencode(base64_encode($totPrice))."'>
							<h2>Billing Details</h2>
		              	<div class='row'>
			               <div class='col-md-12'>
			                  <div class='form-group'>
			                  	<label for='country'>Select State</label>
			                     <div class='form-field'>
			                     	<i class='icon icon-arrow-down3'></i>
			                        <select name='checkState' id='people' class='form-control'>";	
			                        	echo "<option value='0'>Select State</option>
				                        <option value='1'>Johor</option>
				                        <option value='2'>Kedah</option>
				                        <option value='3'>Kelantan</option>
				                        <option value='4'>Melaka</option>
				                        <option value='5'>Negeri Sembilan</option>
				                        <option value='6'>Pahang</option>
				                        <option value='7'>Pulau Pinang</option>
				                        <option value='8'>Perak</option>
				                        <option value='9'>Perlis</option>
				                        <option value='10'>Selangor</option>
				                        <option value='11'>Terenganu</option>
				                        <option value='12'>Sabah</option>
				                        <option value='13'>Sarawak</option>
				                        <option value='14'>Wilayah Persekutuan Kuala Lumpur</option>
				                        <option value='15'>Wilayah Persekutuan Labuan</option>
				                        <option value='16'>Wilayah Persekutuan Putrajaya</option>";  
			                        echo "</select>
			                     </div>
			                  </div>
			               </div>
			               <div class='form-group'>
									<div class='col-md-12'>
										<label for='fname'>Name</label>
										<input type='text' id='fname' class='form-control' name='checkName'>
									</div>
							</div>
							<div class='col-md-12'>
								<div class='form-group'>
										<label for='fname'>Address</label>
			                    	<input type='text' id='address' class='form-control' name='checkAddress'>
			                  </div>
			               </div>
			               <div class='col-md-12'>
								<div class='form-group'>
										<label for='companyname'>Town/City</label>
			                    	<input type='text' id='towncity' class='form-control' name='checkCity'>
			                  </div>
			               </div>
			               <div class='form-group'>
									<div class='col-md-6'>
										<label for='lname'>Zip/Postal Code</label>
										<input type='text' id='zippostalcode' class='form-control' name='checkZip'>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-md-6'>
										<label for='email'>E-mail Address</label>
										<input type='text' id='mail' class='form-control' name='checkEmail'>
									</div>
									<div class='col-md-6'>
										<label for='Phone'>Phone Number</label>
										<input type='text' id='phoneNumber' class='form-control' name='checkPhone'>
									</div>
								</div>
		              </div>
					</div>"; }

					echo "<div class='col-md-5'>
						<div class='cart-detail'>
							<h2>Cart Total</h2>";

							$userID = $_SESSION['userID'];
							$cartID = $_SESSION['cartID'];

							$sql10 = "SELECT * FROM cart WHERE memberID = '$userID'";
							$sqlQuery10 = mysqli_query($dbconn, $sql) or die("Statement Error");			

							while($row10 = mysqli_fetch_array($sqlQuery10)) {
								$sql12 = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$row[cartID]' ";
									$sqlQuery12 = mysqli_query($dbconn, $sql2) or die("Statement Error");
							}

							$sql13 = "SELECT * FROM cart WHERE cartID = '$cartID' ";
							$sqlQuery13 = mysqli_query($dbconn, $sql13) or die("Statement Error");

							$totPrice =0;
							$delivery = 0;						

								echo"<ul>";
								echo	"<ul>";

								while ($row12 = mysqli_fetch_array($sqlQuery12)) {
									echo		"<li><span>".$row12['quantity']." x ".$row12['prodName']."</span> <span>RM".$row12['quantity']*$row12['prodPrice']."</span></li>";
									$totPrice = $totPrice+($row12['quantity']*$row12['prodPrice']);
								}
								
								echo	"</ul>";
								while($row13 =  mysqli_fetch_array($sqlQuery13))
								{
									if($row13['shipState']=='12'|| $row13['shipState']=='13' || $row13['shipState']=='15'){$delivery = 15;}
									elseif ($row13['shipState']=='0'||$row13['shipState']=='') { $delivery = 0;}
									else{$delivery = 10;}
									$totPrice = $totPrice+$delivery;
								}
								echo    "<li><span>Order Total</span> <span id='totalOrder'>RM".$totPrice."</span></li>";
								echo"</ul>";							
						echo "</div>"; 

							$userID = $_SESSION['userID'];
							$cartID = $_SESSION['cartID'];

							$sql20 = "SELECT * FROM cart WHERE memberID = '$userID'";
							$sqlQuery20 = mysqli_query($dbconn, $sql) or die("Statement Error");			

							while($row = mysqli_fetch_array($sqlQuery20)) {
								$sql22 = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$row[cartID]' ";
									$sqlQuery22 = mysqli_query($dbconn, $sql22) or die("Statement Error");
							}

							$sql23 = "SELECT * FROM cart WHERE cartID = '$cartID' ";
							$sqlQuery23 = mysqli_query($dbconn, $sql23) or die("Statement Error");

							//while ($row24 = mysqli_fetch_array($sqlQuery23)) {
							echo "
								<div class='cart-detail'>
							<h2>Payment Method</h2>
							<div class='form-group'>
								<div class='col-md-12'>
									<div class='radio'>";							
										echo "<label><input type='radio' id='optradio1' name='optradio' value='1' onclick='return accFunction()'>Direct Bank Tranfer</label>
										<label id='accLabel' style='display:none'>Account Number:<input type='text' id='account' name='account' disabled ></label>
									</div>
								</div>
							</div>								
							<div class='form-group'>
								<div class='col-md-12'>
									<div class='radio'>
								   		<label><input type='radio' id='optradio2' name='optradio' value='2' onclick='return accFunction()'>Cash On Delivery</label>
									</div>
								</div>
							</div>	";									   
						echo "
								</div>
							<div class='row'>
							<div class='col-md-6'>
								<p><input type='submit' value='Place an order' class='btn btn-primary' onclick='return placeOrder()'></p>
							</div>
							</div>	
								</form>";
						//}
						?>
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
		function placeOrder() {
			var state = document.getElementById("people").value;
			var name = document.getElementById("fname").value;
			var address = document.getElementById("address").value;
			var towncity = document.getElementById("towncity").value;
			var zip = document.getElementById("zippostalcode").value;
			var email = document.getElementById("mail").value;
			var phone = document.getElementById("phoneNumber").value;
			var r1 = document.getElementById("optradio1");
			var r2 = document.getElementById("optradio2");
			var acc = document.getElementById("account");

			var atpos = email.indexOf("@");
			var dotpos = email.indexOf(".");

			if(state == 0) {
				alert("Please Select your state!");
				return false;
			}			

			else if(name == '') {
				alert("Please Insert your name!");
				return false;
			}

			else if(address == '') {
				alert("Please Insert your address!");
				return false;
			}

			else if(towncity == '') {
				alert("Please Insert your town/city!");
				return false;
			}

			else if(zip == '') {
				alert("Please Insert your zip/postal code!");
				return false;
			}

			else if(email == '') {
				alert("Please Insert your email!");
				return false;
			}

			else if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= email.length) {
				alert("Not a valid email address");
				return false; 
			}

			else if(phone == '') {
				alert("Please Insert your phone number!");
				return false;
			}

			else if(isNaN(phone)) {
				alert("Phone number must be a number!");
				return false;				
			}

			else if(r1.checked == false && r2.checked == false) {
				alert("Please Select A Payment Type");
				return false;
			}

			else if(!acc.disabled && acc.value == '') {
				alert("Give Your Account Number!");
				return false;
			}
		}

		function accFunction() {
			var r1 = document.getElementById("optradio1");
			var r2 = document.getElementById("optradio2");
			var acc = document.getElementById("account");
			var accLabel = document.getElementById("accLabel");

			if(r1.checked) {
				acc.disabled = false;
				accLabel.style.display = "block";
			}

			else {
				acc.disabled = true;
				accLabel.style.display = "none";
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