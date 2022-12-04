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
		$userID = $_SESSION['userID'];
		$cartID = $_SESSION['cartID'];
		$name = $_POST['checkName'];
		$address = $_POST['checkAddress'];
		$city = $_POST['checkCity'];
		$zip = $_POST['checkZip'];
		$state = $_POST['checkState'];
		$email = $_POST['checkEmail'];
		$phone = $_POST['checkPhone'];
		$cartTotal = urldecode(base64_decode($_GET['totPrice']));
		$payment = $_POST['optradio'];			

		if(isset($_POST['account'])) {
			$acc = $_POST['account'];
		}

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}							

		// SQL Statement
		$sql = "SELECT * FROM cart WHERE memberID = '$userID'";
		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");
		while($row = mysqli_fetch_array($sqlQuery)) 
		{
			if(isset($_POST['account'])) {
				$sqlUpdate = "UPDATE cart SET shipName = '$name' , shipAddress ='$address', shipState = '$state' ,shipCity = '$city' , shipZip = '$zip', shipEmail = '$email', shipPhone = '$phone', cartTotal = '$cartTotal',paymentType='$payment', shipAccNo = '$acc' where cartID = '$cartID'";
			}
			else {
				$sqlUpdate = "UPDATE cart SET shipName = '$name' , shipAddress ='$address', shipState = '$state' ,shipCity = '$city' , shipZip = '$zip', shipEmail = '$email', shipPhone = '$phone', cartTotal = '$cartTotal',paymentType='$payment' where cartID = '$cartID'";
			}
			
			$sqlQuery2 = mysqli_query($dbconn, $sqlUpdate) or die("Statement Error");
		}

		$oldCartID = $_SESSION["cartID"];

		$sqlInsert2 = "INSERT INTO cart(cartTotal, paymentType, memberID) VALUES ('', '', '$userID')";
		$sqlQuery2 = mysqli_query($dbconn, $sqlInsert2) or die("Statement Error");

		$sqlInsert3 = "SELECT * FROM cart ORDER BY cartID DESC LIMIT 1";
		$sqlQuery3 = mysqli_query($dbconn, $sqlInsert3) or die("Statement Error");
		$row2 = mysqli_fetch_array($sqlQuery3);		

		$_SESSION["cartID"] = $row2["cartID"];
		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('Your Order has been Placed!')</script>";					
			echo "</script>";
			header("refresh:0.1; url=order-complete.php?oldCartID=".base64_encode($oldCartID));
		}
	?>	
</body>
</html>