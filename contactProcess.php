<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>		
	<?php
		session_start();
		include("dbconn.php");

		// Capture data		
		$name = mysqli_real_escape_String($dbconn,$_POST['contactName']);
		$email = mysqli_real_escape_String($dbconn,$_POST['contactEmail']);			
		$title = mysqli_real_escape_String($dbconn,$_POST['contactTitle']);			
		$message = mysqli_real_escape_String($dbconn,$_POST['contactMessage']);
		$memberID = $_SESSION['userID'];
		
		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}							

		// SQL Statement
		$sqlInsert = "INSERT INTO feedback(feedbackName, feedbackEmail, feedbackTitle, feedbackMessage, memberID) VALUES ('$name', '$email', '$title', '$message', '$memberID')";		
		$sqlQuery = mysqli_query($dbconn, $sqlInsert) or die("Statement Error");

		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		else {			
			echo "<script>";
				echo "alert('Your message has been sent!')</script>";					
			echo "</script>";
			header("refresh:0.1; url=contact.php");
		}
	?>	
</body>
</html>