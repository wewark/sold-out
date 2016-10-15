<?php

function uploadImage($folder, $image_name) {
	$target_dir = $folder. "/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000)
	{
		return "Sorry, your file is too large.";
		//$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" )
	{
		return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		//$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0)
	{
		return "Sorry, your file was not uploaded.";
	}

	// if everything is ok, try to upload file
	else
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{
			//echo "The file ". $target_file. " has been uploaded. in". $target_dir;
			// change file name
			$new_filename = $target_dir. $image_name. ".". $imageFileType;
			rename($target_file, $new_filename);

			// convert to png
			imagepng(imagecreatefromstring(file_get_contents($new_filename)), $target_dir. $image_name. ".png");

			// redir to profile.php..
			//redirect("profile.php");
			return true;
		}
		else
		{
			return "Sorry, there was an error uploading your file.";
		}
	}
}

?>