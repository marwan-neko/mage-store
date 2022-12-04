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
		$cartListID = urldecode(base64_decode($_GET['cartListID']));
			

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}							

		// SQL Statement
		$sql = "SELECT * FROM cart WHERE memberID = '$userID'";
		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");
		while($row = mysqli_fetch_array($sqlQuery)) 
		{
				$sqlDelete = "DELETE FROM cartlist where cartListID = '$cartListID'";
				$sqlQuery2 = mysqli_query($dbconn, $sqlDelete) or die("Statement Error");
		}
		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('Game Deleted from order')</script>";					
			echo "</script>";
			header("refresh:0.1; url=cart.php?");
		}
	?>	
</body>
</html>