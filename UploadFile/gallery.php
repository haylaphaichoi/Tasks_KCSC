<?php
	if(isset($_GET['delete'])){
		unlink('./uploads/'.basename($_GET['delete']));
		header('Location: gallery.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>

	<style type="text/css">
		img {
			width: 100px;
			height: 100px
		}
	</style>
</head>
<body>

<?php
	require('menu.php');
	$arr_file = scandir('./uploads');
	$len = count($arr_file);
	for($i =2 ; $i < $len ; $i++){
		echo "<img src='./uploads/".htmlspecialchars($arr_file[$i]) ." ' alt= '".htmlspecialchars($arr_file[$i])."' />
		<a href='?delete=".htmlspecialchars($arr_file[$i])."'>Xóa</a>
		<br> ";
	}
?>
</body>
</html>

