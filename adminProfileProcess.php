<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>		
	<?php
		session_start();

		if(!isset($_SESSION['sessionID'])) {
			header('Location: login.php');
		}

		include("dbconn.php");

		// Capture data
		$name = mysqli_real_escape_String($dbconn,$_POST['updateUsername']);		
		$password = mysqli_real_escape_String($dbconn,$_POST['updatePassword']);
		$userID = $_SESSION['userID'];
		
		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}							

		// SQL Statement
		$sqlUpdate = "UPDATE admin SET adminName = '$name', adminPassword = '$password' WHERE adminID = $userID";		
		$sqlQuery = mysqli_query($dbconn, $sqlUpdate) or die("Statement Error");

		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('Updated Successfully!')</script>";					
			echo "</script>";
			header("refresh:0.1; url=adminProfile.php");
		}
	?>	
</body>
</html>