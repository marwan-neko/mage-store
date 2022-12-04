<!DOCTYPE html>
<html>
<head>
	<title>Marwan's Products</title>	
</head>
<body>
	<?php
		session_start();	

		if(isset($_SESSION['sessionID'])) {
			
		}

		include("dbconn.php");

		// Step 1: Capture data
		$username = mysqli_real_escape_String($dbconn,$_POST['loginUsername']);			
		$password = mysqli_real_escape_String($dbconn,$_POST['loginPassword']);			

		// Test Connection
		if(!$dbconn) {
			echo "Error in DB Connection" . mysqli_error();
		}					

		// Step 3: SQL Statement For Login
		$sqlInsert = "SELECT * FROM member WHERE memberUsername = '$username' && memberPassword = '$password'";
		$sqlQuery = mysqli_query($dbconn, $sqlInsert) or die("Statement Error");	
		$row = mysqli_fetch_array($sqlQuery);
		$numRow = mysqli_num_rows($sqlQuery);					

		// Step 3: SQL Statement For Login
		$sql = "SELECT * FROM admin WHERE adminName = '$username' && adminPassword = '$password'";
		$sqlQuery4 = mysqli_query($dbconn, $sql) or die("Statement Error");	
		$row4 = mysqli_fetch_array($sqlQuery4);
		$numRowAdmin = mysqli_num_rows($sqlQuery4);

		// Checking SQL Statement
		if(!$sqlQuery) {
			echo "Error in SQL Query" . mysqli_error();
		}	

		else {
			if($numRow == 0) {		
				if($numRowAdmin == 0) {
					echo "<script>";
						echo "alert('Wrong Username or Password!')</script>";				
					echo "</script>";
					header("refresh:0.1; url=login.php");	
				}		

				else {
					$_SESSION["sessionID"] = rand();
					$_SESSION["userID"] = $row4["adminID"];								
					header('Location: adminIndex.php');
				}							
			}

			else {
				// Step 4: SQL Statement For Cart
				$sqlInsert2 = "INSERT INTO cart(memberID) VALUES ('$row[memberID]')";
				$sqlQuery2 = mysqli_query($dbconn, $sqlInsert2) or die("Statement Error");

				$sqlInsert3 = "SELECT * FROM cart ORDER BY cartID DESC LIMIT 1";
				$sqlQuery3 = mysqli_query($dbconn, $sqlInsert3) or die("Statement Error");
				$row2 = mysqli_fetch_array($sqlQuery3);		

				// Checking SQL Statement
				if(!$sqlQuery2) {
					echo "Error in SQL Query" . mysqli_error();
				}

				$_SESSION["sessionID"] = rand();
				$_SESSION["userID"] = $row["memberID"];
				$_SESSION["cartID"] = $row2["cartID"];
				header('Location: index.php');
			}			
		}
		mysqli_close($dbconn);
	?>					
</body>
</html>