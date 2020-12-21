<?php
	require('menu.php');
	$target_dir = "uploads/";
	$name_file = $_FILES['fileUpload']['name'];
	$target_file = $target_dir.$name_file;

	//Check extension file
	$ext_file = strtolower(pathinfo($name_file, PATHINFO_EXTENSION));
	$ext_allow = array('jpg', 'png', 'jpeg', 'gif');
	if(!in_array($ext_file, $ext_allow)){
		echo "Sorry, only JPG, PNG, JEPG and GIF are accepted";
		exit();
	}

	//Check if image file is actual image
	if(!getimagesize($_FILES['fileUpload']['tmp_name'])){		
		echo "File is not an image<br>";
		exit();
	}

	//Check if file already exists
	if(file_exists($target_file)){
		echo "Sorry, file already exists.";
		exit();
	}

	//Check size of image
	if($_FILES['fileUpload']['size'] > 500000){
		echo "Sorry, your file is too large.";
		exit();
	}
	 

	//Try to upload file
	if(move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $target_file)){
		echo "The File <b> ".htmlspecialchars($name_file)." </b> has been uploaded successfully <br>
		<a href='./".htmlspecialchars($target_file) . " '>View Imgae</a>";
		exit();
	}else{
		echo "Sorry, there was an error uploading your file";
		exit();
	}

?>