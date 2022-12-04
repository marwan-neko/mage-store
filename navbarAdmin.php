<?php 
	$pageName = basename($_SERVER['PHP_SELF']);	
	$sql1 = "SELECT * FROM admin WHERE adminID = '$_SESSION[userID]'";
	$sqlQuery1 = mysqli_query($dbconn, $sql1) or die("Statement Error");	

	if(!$sqlQuery1) {
		echo "Error in SQL Query" . mysqli_error();
	} 

	$row = mysqli_fetch_array($sqlQuery1); 	
?>
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="adminIndex.php"><img src="images/mage.png" alt="Mage Logo" width="70%"></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li <?php if($pageName == 'adminIndex.php') {echo "class='active'";} ?>><a href="adminIndex.php">Home</a></li>
						<li <?php if($pageName == 'adminProduct.php' || $pageName == 'product-detail.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="adminViewGame.php?platformid=0">Product</a>
							<ul class="dropdown">
								<li><a href="adminViewGame.php?platformid=0">Active Games</a></li>		
								<li><a href="adminInactiveGame.php?platformid=0">Inactive Games</a></li>									
								<li><a href="adminDraftGame.php?platformid=0">Draft Games</a></li>								
								<li><a href="adminAddGame.php">Add Games</a></li>
							</ul>
						</li>
						<li <?php if($pageName == 'adminViewOrder.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="adminViewOrder.php">Order</a>
							<ul class="dropdown">
								<li><a href="adminViewOrder.php?">View Order</a></li>		
							</ul>
						</li>
						<li <?php if($pageName == 'adminViewFeedback.php' || $pageName == 'adminViewFeedbackDetails.php') {echo "class='active'";} ?>><a href="adminViewFeedback.php">Feedback</a></li>				
						<li <?php if($pageName == 'adminProfile.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="adminProfile.php"><?php echo $row["adminName"] ?></a>
							<ul class="dropdown">
								<li><a href="adminProfile.php">Profile</a></li>
								<li><a href="logout.php">Log out</a></li>			
							</ul>
						</li>						
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>