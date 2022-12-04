<?php	
	$fileName1 = $_FILES['thumbnailUpload1']['name'];	
	if($fileName1 != '') {		
		$fileError1 = $_FILES['thumbnailUpload1']['error'];
		$fileSize1 = $_FILES['thumbnailUpload1']['size'];
		$fileExt1 = explode('.', $fileName1);
		$fileActualExt1 = strtolower(end($fileExt1));
		
		if($fileActualExt1 == "jpg") {
			if($fileError1 == 0) {
				if($fileSize1 < 5000000) {
					// fileNameNew for naming the uploaded file
					$fileNameNew1 = $row["prodID"] . "-1." . $fileActualExt1;
					$fileDestination1 = "images/thumbnails/".$fileNameNew1;
					move_uploaded_file($_FILES['thumbnailUpload1']['tmp_name'], $fileDestination1);				
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