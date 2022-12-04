<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>		
	<?php
		session_start();
		
		if(!isset($_SESSION['sessionID'])) {
			header('Location:login.php');
		}

		include("dbconn.php");

		// Capture data
		if($_GET['cartStatus'] == 0) {
			$platformID = $_GET['platformid'];
			$productID = base64_decode($_GET['gameid']);
			$quantity = 1;
		}

		else {
			$productID = $_POST['gameid'];
			$quantity = $_POST['quantity'];	
		}			

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}			

		$sql = "SELECT * FROM cartList WHERE cartID = '$_SESSION[cartID]' AND prodID = '$productID'";		
		$sqlQuery0 = mysqli_query($dbconn, $sql) or die("Statement Error");	
		$row = mysqli_fetch_array($sqlQuery0);			
		$numRow = mysqli_num_rows($sqlQuery0);

		// Insert New Games into cartList
		if($numRow == 0) {
			// SQL Statement
			$sqlInsert = "INSERT INTO cartList(cartID, prodID, quantity) VALUES ('$_SESSION[cartID]', '$productID', '$quantity')";		
			$sqlQuery = mysqli_query($dbconn, $sqlInsert) or die("Statement Error");
		}

		// Update the quantity of the same game in cartList
		else {
			$quantity = ($quantity + $row["quantity"]);
			// SQL Statement
			$sqlInsert = "UPDATE cartList SET quantity = $quantity WHERE cartID = '$_SESSION[cartID]' AND prodID = '$productID'";		
			$sqlQuery = mysqli_query($dbconn, $sqlInsert) or die("Statement Error");
		}
		
		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('Added to cart!')</script>";					
			echo "</script>";
			if($_GET['cartStatus'] == 0) {
				header("refresh:0.1; url=shop.php?platformid=".$platformID);
			}

			else {
				header("refresh:0.1; url=product-detail.php?gameid=".base64_encode($productID));
			}			
		}
	?>	
</body>
</html>