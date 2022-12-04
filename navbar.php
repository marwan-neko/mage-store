<?php $pageName = basename($_SERVER['PHP_SELF']); ?>
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
								<!--<li><a href="product-detail.html?platformID=0">All Games</a></li>
								<li><a href="cart.html?platformID=0">PS4 Games</a></li>
								<li><a href="checkout.html?platformID=0">Xbox One Games</a></li>
								<li><a href="order-complete.html?platformID=0">Nintendo Switch Games</a></li>
								<li><a href="add-to-wishlist.html">Wishlist</a></li>-->
							</ul>
						</li>						
						<li <?php if($pageName == 'about.php') {echo "class='active'";} ?>><a href="about.php">About</a></li>
						<li <?php if($pageName == 'login.php' || $pageName == 'register.php') {echo "class='has-dropdown active'";} else {echo "class='has-dropdown'";}?>>
							<a href="login.php">Member</a>
							<ul class="dropdown">
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Sign Up</a></li>
							</ul>
						</li>
						<!--<li><a href="cart.php"><i class="icon-shopping-cart"></i> Cart [0]</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>