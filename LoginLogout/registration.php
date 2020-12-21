<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng Ký</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	session_start();
	require('db.php');
	if(isset($_SESSION['username'])){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['submit'])){


		$first_name = $_REQUEST['first_name'];
		$first_name = mysqli_real_escape_string($con, $first_name);

		$last_name = $_REQUEST['last_name'];
		$last_name = mysqli_real_escape_string($con, $last_name);

		$username = $_REQUEST['username'];
		$username = mysqli_real_escape_string($con, $username);

		$password = $_REQUEST['password'];		
		$password = mysqli_real_escape_string($con, $password);
		$options = array('cost' => 4);
		$password = password_hash($password, PASSWORD_BCRYPT, $options);

		// set the default timezone to use. Available since PHP 5.1
		date_default_timezone_set('Asia/Ho_Chi_Minh');

		$regis_date = date("Y-m-d H:i:s");

		//Check username existence
		$query = "SELECT * FROM users WHERE username= '$username' LIMIT 1";
		$res = mysqli_query($con, $query);
		if(mysqli_num_rows($res) > 0 ){
			$error = "Username existed<br/>Please take other username";
		}else{

			//Add user into database
			$query = "INSERT INTO users (first_name, last_name,username, password, regis_date) VALUES ('$first_name', '$last_name','$username' , '$password', '$regis_date')";
			$result = mysqli_query($con, $query);

			if($result){
				header('Location: regis_success.php');
				exit();
			}
		}
	}

?>
<div class="form">
	
	<center>
		<h1>Đăng Ký</h1>
		<form name="registration" action="" method="post">
			<input type="text" name="first_name" placeholder="First Name" required>
			<input type="text" name="last_name" placeholder="Last Name" required>
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<div id='p2' style="color:red" > <?php if(isset($error)) echo $error; ?></div>
			<input type="submit" name="submit" value="Đăng Ký">
		</form>
	</center>
	
</div>
<center><p>Đã có tài khoản ? <a href="login.php">Đăng nhập ngay</a></p></center>

</body>
</html>