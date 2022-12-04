<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>		
	<?php
		include("dbconn.php");

		// Capture data
		$name = mysqli_real_escape_String($dbconn,$_POST['registerName']);
		$email = mysqli_real_escape_String($dbconn,$_POST['registerEmail']);			
		$username = mysqli_real_escape_String($dbconn,$_POST['registerUsername']);			
		$password = mysqli_real_escape_String($dbconn,$_POST['registerPassword']);
		
		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}							

		// SQL Statement
		$sqlInsert = "INSERT INTO member(memberName, memberUsername, memberEmail, memberPassword) VALUES ('$name', '$username', '$email', '$password')";		
		$sqlQuery = mysqli_query($dbconn, $sqlInsert) or die("Statement Error");

		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('You have registered successfully!')</script>";					
			echo "</script>";
			header("refresh:0.1; url=login.php");
		}
	?>	
</body>
</html>