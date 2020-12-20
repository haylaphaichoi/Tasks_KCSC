<?php
	$dbhost = 'localhost';
	$dbuser = 'conco';
	$dbpass = '123456';
	$dbname = 'my_database';

	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//Check connection
	if(mysqli_connect_errno()){
		echo "Không thể kết nối đến MySQL: ");
		exit();
	}
?>