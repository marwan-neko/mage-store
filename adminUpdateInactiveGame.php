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
		include("dbconn.php");	
		$gameID = base64_decode($_GET['gameid']);
	?>	
	<div class="colorlib-loader"></div>

	<div id="page">
		<!-- Navigation Bar -->
		<?php
			if(!isset($_SESSION['sessionID'])) {				
				header('Location: login.php');
			}

			include("navbarAdmin.php");

			$sql1 = "SELECT * FROM product WHERE prodID = '".$gameID."'";
			$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");
			$row1 = mysqli_fetch_array($sqlQuery1);

			if(!$sqlQuery1) {
				echo "Error in SQL Query" . mysqli_error();
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
				   					<h1>Update Game Details</h1>
				   					<h2 class="bread"><span><a href="adminIndex.php">Home</a></span> <span>Update Game Details</span></h2>
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
									<form name="updateInactiveGameForm" action="adminUpdateInactiveGameProcess.php?cartStatus=1" method="post" enctype="multipart/form-data">
									<div class="desc">								
										<h4>Game Name</h4>
										<input type="text" name="gameName" size="30" value="<?php echo $row1["prodName"] ?>">
										<br><br>
										<h4>Game Price</h4>
										<input type="text" name="gamePrice" size="10" value="<?php echo $row1["prodPrice"] ?>">				
										<br><br>
										<h4>Game Platform</h4>
										<select name="gamePlatform">
											<?php $platform = $row1["prodPlatform"]; ?>	
											<option value="PS4" <?php if($platform == "PS4") {echo "selected";} ?>>PS4</option>
											<option value="PS3" <?php if($platform == "PS3") {echo "selected";} ?>>PS3</option>
											<option value="XBOX ONE" <?php if($platform == "XBOX ONE") {echo "selected";} ?>>XBOX ONE</option>
											<option value="XBOX 360" <?php if($platform == "XBOX 360") {echo "selected";} ?>>XBOX 360</option>
											<option value="SWITCH" <?php if($platform == "SWITCH") {echo "selected";} ?>>NINTENDO SWITCH</option>
											<option value="3DS" <?php if($platform == "3DS") {echo "selected";} ?>>NINTENDO 3DS</option>
										</select>
										<br><br>
										<h4>Game Description</h4>
										<textarea name="gameDesc" rows="5" cols="50"><?php echo $row1["prodDesc"] ?></textarea>	
										<br><br>
										<div class="row row-pb-sm">
										<div class="col-md-4">
	                                    	<div class="input-group">             	
	                                    	<h4>Update Cover Image</h4>
	                                    	<input type="file" id="imageUpload" name="coverUpload" accept="image/jpeg">                            	
	                                    	<p>*JPG Only</p> 
	                                 		</div>
	                                 		<div class="input-group">             	
	                                    	<h4>Thumbnail Image 1</h4>
	                                    	<input type="file" id="thumbnailUpload1" name="thumbnailUpload1" accept="image/jpeg">                            	
	                                    	<p>*JPG Only</p> 
	                                 		</div>
	                                 		<div class="input-group">             	
	                                    	<h4>Thumbnail Image 2</h4>
	                                    	<input type="file" id="thumbnailUpload2" name="thumbnailUpload2" accept="image/jpeg">                            	
	                                    	<p>*JPG Only</p> 
	                                 		</div>
	                                 		<div class="input-group">             	
	                                    	<h4>Thumbnail Image 3</h4>
	                                    	<input type="file" id="thumbnailUpload3" name="thumbnailUpload3" accept="image/jpeg">                            	
	                                    	<p>*JPG Only</p> 
	                                    	<input type="checkbox" id="statusChoice" name="gameStatus" value="2">&nbsp;Activate Product
	                                 		</div>
                        				</div>
										</div>
										<input type="hidden" name="gameID" value="<?php echo $row1["prodID"]; ?>">
										<p><input type="submit" class="btn btn-primary btn-addtocart" value="Update Game Details" onclick="return checkStatus()"></p>
									</form>
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

	<script type="text/javascript">
		document.getElementById("plusImage").addEventListener('click', addImage);
		function addImage() {
			document.getElementById("imageUpload").click();
		}
		
		function checkStatus() {
			var name = document.updateInactiveGameForm.gameName.value;
			var price = document.updateInactiveGameForm.gamePrice.value;
			var platform = document.updateInactiveGameForm.gamePlatform.value;
			var desc = document.updateInactiveGameForm.gameDesc.value;
			var cover = document.updateInactiveGameForm.coverUpload;
			var thumb1 = document.updateInactiveGameForm.thumbnailUpload1;
			var thumb2 = document.updateInactiveGameForm.thumbnailUpload2;
			var thumb3 = document.updateInactiveGameForm.thumbnailUpload3;
			var status = document.updateInactiveGameForm.gameStatus;

			if(status.checked) {
				if(name == '') {
					alert("Insert a name!");
					return false;
				}

				else if(price == '') {
					alert("Insert a price!");
					return false;
				}

				else if(isNaN(price)) {
					alert("Price must be number!");
					return false;
				}

				else if(platform == 0) {
					alert("Insert a platform!");
					return false;
				}
				
				else if(desc == '') {
					alert("Insert a description!");
					return false;
				}			

				else if(cover.files.length == 0) {
					alert("Insert a cover!");
					return false;
				}				

				else if(thumb1.files.length == 0) {
					alert("Insert thumbnail 1!");
					return false;
				}

				else if(thumb2.files.length == 0) {
					alert("Insert thumbnail 2!");
					return false;
				}

				else if(thumb3.files.length == 0) {
					alert("Insert thumbnail 3!");
					return false;
				}
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

