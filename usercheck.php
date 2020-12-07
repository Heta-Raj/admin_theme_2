<?php 
include './db.php';

session_start();

if ($_POST['action'] == 'login_username_check') {
	$username = $_POST['username'];

	$select = "SELECT username FROM admin WHERE username = '$username' ";	

	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);

	if ($rselect->num_rows != 0 ) {
		if ($row['username'] === $username) {
			echo "true";
		}else{
			echo "false";
		}
	}else{
		echo "false";
	}
}

if ($_POST['action'] == 'login_password_check') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$md5 = md5($password);

	$select = "SELECT id, username FROM admin WHERE username = '$username' AND password = '$md5' ";	

	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);

	$user_id = $row['id'];

	if ($rselect->num_rows != 0 ) {
			$_SESSION['user_id'] = $user_id; 
			echo "true";
	}else{
		echo "false";
	}
}
?>