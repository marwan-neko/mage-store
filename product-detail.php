<!DOCTYPE HTML>
<html>
	<head>
		<?php
		include("dbconn.php");
		$gameID = base64_decode($_GET['gameid']);
		$sql1 = "SELECT * FROM product WHERE prodID = '".$gameID."'";
		$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");
		$row1 = mysqli_fetch_array($sqlQuery1);

		if(!$sqlQuery1) {
			echo "Error in SQL Query" . mysqli_error();
		}
		?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $row1["prodName"]; ?></title>
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
		.thumbnail {
			transition: 1s;
		}
		.thumbnail:hover {
			transform: scale(2); 
			z-index: 1; 
		}
	</style>
	</head>
	<body>
	<?php 
		session_start();				
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
			   	<li style="background-image: url(images/boxArt/<?php echo $gameID; ?>.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Product Detail</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span><a href="shop.php?platformid=0">Product</a></span> <span>Product Detail</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/boxArt/<?php echo $gameID; ?>.jpg);">
											<p class="tag"><span class="sale"><?php echo $row1["prodPlatform"]; ?></span></p>
										</div>
										<div class="thumb-nail">
											<a href="#" class="thumb-img thumbnail" style="background-image: url(images/thumbnails/<?php echo $gameID ?>-1.jpg);"></a>
											<a href="#" class="thumb-img thumbnail" style="background-image: url(images/thumbnails/<?php echo $gameID ?>-2.jpg);"></a>
											<a href="#" class="thumb-img thumbnail" style="background-image: url(images/thumbnails/<?php echo $gameID ?>-3.jpg);"></a>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?php echo $row1["prodName"] ?></h3>
										<p class="price">
											<span>RM<?php echo $row1["prodPrice"] ?></span><p style="font-weight: bold">Platform: <?php echo $row1["prodPlatform"] ?></p>		
										</p>
										<p><?php echo $row1["prodDesc"] ?></p>
										
										<form name="addToCart" action="addToCart.php?cartStatus=1" method="post">
											<div class="row row-pb-sm">
												<div class="col-md-4">
	                                    <div class="input-group">
	                                    	<span class="input-group-btn">
	                                       	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                                          <i class="icon-minus2"></i>
	                                       	</button>
	                                   		</span>
	                                    	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	                                    	<span class="input-group-btn">
	                                       	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                                            <i class="icon-plus2"></i>
	                                        </button>
	                                    	</span>
	                                 	</div>
	                        			</div>
											</div>
											<input type="hidden" name="gameid" value="<?php echo $row1["prodID"]; ?>">
											<p><input type="submit" class="btn btn-primary btn-addtocart" value="Add To Cart"><!--<i class="icon-shopping-cart"></i>--></p>		
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Description</a></li>				
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										<p><?php echo $row1["prodDesc"]; ?></p>		
						         	</div>						         
								</div>
					         </div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Similar products -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span><?php echo $row1["prodPlatform"]; ?> Games</span></h2>
					</div>
				</div>
				<div class="row">
					<?php
						$sql2 = "SELECT * FROM product WHERE prodPlatform = '$row1[prodPlatform]' AND prodStatus = 'active' ORDER BY RAND() LIMIT 4";
						$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");						

						if(!$sqlQuery2) {
							echo "Error in SQL Query" . mysqli_error();
						}

						while($row2 = mysqli_fetch_array($sqlQuery2)) {
							echo "<div class='col-md-3 text-center'>";
							echo 	"<div class='product-entry'>";
							echo 		"<div class='product-img' style='background-image: url(images/boxArt/".$row2["prodID"].".jpg);'>";
							echo 			"<p class='tag'><span class='new'>".$row2["prodPlatform"]."</span></p>";
							echo 			"<div class='cart'>";
							echo 				"<p>";
							echo 					"<span class='addtocart'><a href=''><i class='icon-shopping-cart'></i></a></span>"; 
							echo 					"<span><a href='product-detail.php?gameid=".base64_encode($row2["prodID"])."'><i class='icon-eye'></i></a></span>";						
							echo 				"</p>";
							echo 			"</div>";
							echo 		"</div>";
							echo 		"<div class='desc'>";
							echo 			"<h3><a href='shop.php'>".$row2["prodName"]."</a></h3>";
							echo 			"<p class='price'><span>RM".$row2["prodPrice"]."</span></p>";
							echo 		"</div>";
							echo 	"</div>";
							echo "</div>";
						}
					?>					
				</div>
			</div>
		</div>		

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

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

	</body>
</html>

