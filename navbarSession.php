<?php
	$pageName = basename($_SERVER['PHP_SELF']);	
	$sql1 = "SELECT * FROM member WHERE memberID = '$_SESSION[userID]'";
	$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");	

	if(!$sqlQuery1) {
		echo "Error in SQL Query" . mysqli_error();
	} 

	$row = mysqli_fetch_array($sqlQuery1); 

	// Cart ID Select
	$sql2 = "SELECT * FROM cartList WHERE cartID = '$_SESSION[cartID]'";
	$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");	

	if(!$sqlQuery1) {
		echo "Error in SQL Query" . mysqli_error();
	} 
	
	$numRow = mysqli_num_rows($sqlQuery2);
?>
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="index.php"><img src="images/mage.png" alt="Mage Logo" width="70%"></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li <?php if($pageName == 'index.php') {echo "class='active'";} ?>><a href="index.php">Home</a></li>
						<li <?php if($pageName == 'shop.php' || $pageName == 'product-detail.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="shop.php?platformid=0">Shop</a>
							<ul class="dropdown">
								<li><a href="shop.php?platformid=0">All Games</a></li>
								<li><a href="shop.php?platformid=PS">Playstation Games</a></li>
								<li><a href="shop.php?platformid=XBOX">Xbox Games</a></li>
								<li><a href="shop.php?platformid=NINTENDO">Nintendo Games</a></li>
							</ul>
						</li>						
						<li <?php if($pageName == 'about.php') {echo "class='active'";} ?>><a href="about.php">About</a></li>
						<li <?php if($pageName == 'contact.php') {echo "class='active'";} ?>><a href="contact.php">Contact</a></li>
						<li <?php if($pageName == 'memberProfile.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="memberProfile.php"><?php echo $row["memberUsername"] ?></a>
							<ul class="dropdown">
								<li><a href="memberProfile.php">Profile</a></li>
								<li><a href="logout.php?memberID=<?php echo $row["memberID"]; ?>">Log out</a></li>			
							</ul>
						</li>
						<li><a href="cart.php"><i class="icon-shopping-cart"></i> Cart [<?php echo $numRow; ?>]</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>