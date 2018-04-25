<?php
	//uploads the file submited
	if (isset($_FILES['file'])){
		$file = $_FILES['file'];

		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);
		$fileAcutalExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'bmp');

		if (in_array($fileAcutalExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5000000) {
					$fileNameNew = "IMG.".$fileAcutalExt;
					$fileDestination = '../uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					copy($fileDestination, '../edits/'.$fileNameNew);
					exit($fileNameNew);
				} else {
					exit("File to big");
				}
			} else {
				exit("Something went wrong");
			}
		} else {
			exit("This file extension is not allowed");
		}	
	}