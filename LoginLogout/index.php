<?php	
	require('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="">
		<h1>Đây là trang chủ</h1>
		<p>Xin chào <b><?php echo htmlspecialchars($_SESSION['full_name']) ?> </b> </p>
		<p><a href="dashboard.php">Bảng điều khiển</a></p>
		<a href="logout.php">Đăng xuất</a>
	</div>
</body>
</html>

