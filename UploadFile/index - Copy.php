<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
</head>
<body>
	<?php require('menu.php')  ?>

	<h1>Upload Image</h1><br>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileUpload" ><br>
		<input type="submit" name="submit" value="Upload Image">
	</form>
</body>
</html>