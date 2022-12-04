<?php
	include("dbconn.php");

	$prodID = mysqli_real_escape_String($dbconn,base64_decode($_GET['gameid']));
	$status = mysqli_real_escape_String($dbconn,$_GET['status']);
	$platformID = mysqli_real_escape_String($dbconn,$_GET['platformid']);

	if($status == "draft") {
		$sql = "DELETE FROM product WHERE prodID = '$prodID'";
	}
	
	else {
		$sql = "UPDATE product SET prodStatus = 'inactive' WHERE prodID = $prodID";
	}

	$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");	

	// Checking SQL Statement
	if(!$sqlQuery) {
		echo "Error in SQL Query" . mysqli_error();
	}

	if($status == "draft") {
		header("Location: adminDraftGame.php?platformid=$platformID".$platformID);	
	}

	else {
		header("Location: adminViewGame.php?platformid=".$platformID);
	}			
?>