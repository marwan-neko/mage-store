<?php		
	$fileName2 = $_FILES['thumbnailUpload2']['name'];
	if($fileName2 != '') {
		$fileError2 = $_FILES['thumbnailUpload2']['error'];
		$fileSize2 = $_FILES['thumbnailUpload2']['size'];
		$fileExt2 = explode('.', $fileName2);
		$fileActualExt2 = strtolower(end($fileExt2));
		
		if($fileActualExt2 == "jpg") {
			if($fileError2 == 0) {
				if($fileSize2 < 5000000) {
					// fileNameNew for naming the uploaded file
					$fileNameNew2 = $row["prodID"] . "-2." . $fileActualExt2;
					$fileDestination2 = "images/thumbnails/".$fileNameNew2;
					move_uploaded_file($_FILES['thumbnailUpload2']['tmp_name'], $fileDestination2);				
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