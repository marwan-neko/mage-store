<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>		
	<?php
		include("dbconn.php");

		// Capture data
		$gameName = mysqli_real_escape_String($dbconn,$_POST['gameName']);
		$gamePrice = mysqli_real_escape_String($dbconn,$_POST['gamePrice']);			
		$gamePlatform = mysqli_real_escape_String($dbconn,$_POST['gamePlatform']);			
		$gameDesc = mysqli_real_escape_String($dbconn,$_POST['gameDesc']);		
		$gameID = mysqli_real_escape_String($dbconn,$_POST['gameID']);
		
		if(isset($_POST['gameStatus'])) {
			$gameStatus = "active";
		}		

		else {
			$gameStatus = "draft";			
		}		

		$sql = "UPDATE product SET prodName = '$gameName', prodDesc = '$gameDesc', prodPrice = '$gamePrice', prodPlatform = '$gamePlatform', prodStatus = '$gameStatus' WHERE prodID = $gameID";		
		$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");

		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}

		// Images Section
		$sql2 = "SELECT prodID FROM product WHERE prodID = '$gameID'";		
		$sqlQuery2 = mysqli_query($dbconn, $sql2) or die("Statement Error");
		$row = mysqli_fetch_array($sqlQuery2);
		
		// Box Art Upload
		include("boxArtProcess.php");

		// Thumbnail 1 Upload
		include("thumbnail1Process.php");

		// Thumbnail 2 Upload
		include("thumbnail2Process.php");

		// Thumbnail 3 Upload
		include("thumbnail3Process.php");
	
		echo "<script>";
			echo "alert('Game Updated!')</script>";
		echo "</script>";	
		if($gameStatus == "draft") {
			header("refresh:0.1; url=adminDraftUpdateGame.php?gameid=".base64_encode($gameID));
		}

		else {
			header("refresh:0.1; url=adminDraftGame.php?platformid=0");
		}
					
	?>	
</body>
</html>