<?php	
	$fileName0 = $_FILES['coverUpload']['name'];
	if($fileName0 != '') {
		$fileError0 = $_FILES['coverUpload']['error'];
		$fileSize0 = $_FILES['coverUpload']['size'];
		$fileExt0 = explode('.', $fileName0);
		$fileActualExt0 = strtolower(end($fileExt0));
		
		if($fileActualExt0 == "jpg") {
			if($fileError0 == 0) {
				if($fileSize0 < 5000000) {
					// fileNameNew for naming the uploaded file
					$fileNameNew0 = $row["prodID"] . "." . $fileActualExt0;
					$fileDestination0 = "images/boxArt/".$fileNameNew0;
					move_uploaded_file($_FILES['coverUpload']['tmp_name'], $fileDestination0);
				}
				else {
					echo "<script>alert('The File Size must be 5MB or less!')</script>";
				}				
			}			
		}
		else {
			echo "<script>alert('Image File must be in JPG File Only!')</script>";
		}			
	}	  
?>