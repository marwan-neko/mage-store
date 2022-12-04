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
		$searchGame = mysqli_real_escape_String($dbconn,$_POST['searchGame']);
		$platformID = mysqli_real_escape_String($dbconn,$_GET['platformid']);	
		$status = mysqli_real_escape_String($dbconn,$_GET['status']);
		$user = mysqli_real_escape_String($dbconn,$_GET['user']);				

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}					

		// Step 3: SQL Statement
		if($platformID == "0") {
			$sql1 = "SELECT prodID FROM product WHERE prodName LIKE '%$searchGame%' AND prodStatus = '$status' ORDER BY prodName";
		}

		else if ($platformID == "PS") {
			$sql1 = "SELECT prodID FROM product WHERE ((prodPlatform = 'PS4' OR prodPlatform = 'PS3') AND prodStatus = '$status' AND prodName LIKE '%$searchGame%') ORDER BY prodName";
		}

		else if ($platformID == "XBOX") {
			$sql1 = "SELECT prodID FROM product WHERE ((prodPlatform = 'XBOX ONE' OR prodPlatform = 'XBOX 360') AND prodStatus = '$status' AND prodName LIKE '%$searchGame%') ORDER BY prodName";
		}

		else if ($platformID == "NINTENDO") {
			$sql1 = "SELECT prodID FROM product WHERE ((prodPlatform = '3DS' OR prodPlatform = 'SWITCH') AND prodStatus = '$status' AND prodName LIKE '%$searchGame%') ORDER BY prodName";
		}

		else {
			$sql1 = "SELECT prodID FROM product WHERE (prodPlatform = '$platformID' AND prodName LIKE '%$searchGame%') AND prodStatus = '$status' ORDER BY prodName";			
		}
		
		$sqlQuery = mysqli_query($dbconn, $sql1) or die("Statement Error");		
		$numRow = mysqli_num_rows($sqlQuery);

		$game = array();

		while($row = mysqli_fetch_array($sqlQuery)) {
			$game[] = $row["prodID"];
		}

		// Concatenate Game ID
		$in = "(".implode(",",$game).")";
		
		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}				

		else {				
			// Admin User
			if($user == 1) {
				if($numRow != 0) {
					if($status == "active") {
						header("Location:adminViewGame.php?platformid=".$platformID."&in=".base64_encode($in));
					}

					else if($status == "inactive") {
						header("Location:adminInactiveGame.php?platformid=".$platformID."&in=".base64_encode($in));
					}

					else {
						header("Location:adminDraftGame.php?platformid=".$platformID."&in=".base64_encode($in));
					}
					
				}

				else {
					if($status == "active") {
						header("Location:adminViewGame.php?platformid=".$platformID."&result=none");
					}

					else if($status == "inactive") {
						header("Location:adminInactiveGame.php?platformid=".$platformID."&result=none");
					}

					else {
						header("Location:adminDraftGame.php?platformid=".$platformID."&result=none");
					}					
				}
			}

			// Normal User
			else {
				if($numRow != 0) {
					header("Location:shop.php?platformid=".$platformID."&in=".base64_encode($in));
				}

				else {
					header("Location:shop.php?platformid=".$platformID."&result=none");
				}	
			}		
		}

		mysqli_close($dbconn);
	?>						
</body>
</html>