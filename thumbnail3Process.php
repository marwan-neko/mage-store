<?php		
	$fileName3 = $_FILES['thumbnailUpload3']['name'];
	if($fileName3 != '') {
		$fileError3 = $_FILES['thumbnailUpload3']['error'];
		$fileSize3 = $_FILES['thumbnailUpload3']['size'];
		$fileExt3 = explode('.', $fileName3);
		$fileActualExt3 = strtolower(end($fileExt3));
		
		if($fileActualExt3 == "jpg") {
			if($fileError3 == 0) {
				if($fileSize3 < 5000000) {
					// fileNameNew for naming the uploaded file
					$fileNameNew3 = $row["prodID"] . "-3." . $fileActualExt3;
					$fileDestination3 = "images/thumbnails/".$fileNameNew3;
					move_uploaded_file($_FILES['thumbnailUpload3']['tmp_name'], $fileDestination3);				
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