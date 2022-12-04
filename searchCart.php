<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>
	<?php
		session_start();	

		include("dbconn.php");

		// Step 1: Capture data
		$searchCart = mysqli_real_escape_String($dbconn,$_POST['searchCart']);		

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}					

		// Step 3: SQL Statement
		if(!is_numeric($searchCart)) {
			$sql = "SELECT cartID FROM cart WHERE shipName LIKE '%$searchCart%'";
		}

		else {
			$sql = "SELECT cartID FROM cart WHERE cartTotal = '$searchCart'";
		}			
		
		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");		
		$numRow = mysqli_num_rows($sqlQuery);

		$cart = array();
		
		while($row = mysqli_fetch_array($sqlQuery)) {
			$cart[] = $row["cartID"];
		}				

		// Concatenate Game ID
		$in = "(".implode(",",$cart).")";
		echo $in;
		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}				

		else {		
			if($numRow != 0) {
				header("Location:adminViewOrder.php?in=".base64_encode($in));
			}		
			
			else {
				header("Location:adminViewOrder.php?result=none");
			}					
		}

		mysqli_close($dbconn);
	?>						
</body>
</html>