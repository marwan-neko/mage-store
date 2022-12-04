<?php
	session_start();			
	session_unset();
	session_destroy();	

	include("dbconn.php");

	if(isset($_GET['memberID'])) {
		// Delete cart row that has no information except ID; Meaning the user does not intend to buy any product
		$memberID = $_GET['memberID'];
		$sql = "DELETE FROM cart WHERE cartTotal = 0 AND paymentType = '' AND memberID = '$memberID'";
		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");	

		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}
	}	

	header("Location: index.php");				
?>