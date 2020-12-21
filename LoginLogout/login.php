<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng Nhập</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php

	require('db.php');
	session_start();
	if(isset($_SESSION['username'])){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['username'])){

		$username = $_POST['username'];
		$username = mysqli_real_escape_string($con, $username);

		$password = $_POST['password'];
		$password = mysqli_real_escape_string($con, $password);

		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$result = mysqli_query($con, $query);
		$rows = mysqli_num_rows($result);
		

		if($rows == 1){
			$record =mysqli_fetch_array($result);
			if( password_verify($password, $record['password'])){
				$_SESSION['username'] = $username;
				$_SESSION['full_name'] = $record['first_name']." ".$record['last_name'];
				header('Location: index.php');
				exit();
			}else{
				$error = 'Incorrect Username/Password';
			}

			
		}
		else{
			$error = 'Incorrect Username/Password';
		}
	}
?>


<div class="form">
	<center>
		<h1>Đăng nhập</h1>
		<form name="login" action="" method="post" >
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<div id="p1" style = "color:red"> 
				<?php if(isset($error)) echo $error; ?>  
			</div>
			<input type="submit" name="submit" value="Đăng Nhập">
		</form>
	</center>
	
</div>
<center><p>Bạn chưa có tài khoản? <a href="registration.php">Đăng ký ngay</a></p></center>

</div>
</body>
</html>