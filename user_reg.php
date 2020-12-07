<?php
include './db.php';
session_start();

if ($_POST['action'] == 'user_check') {
	$username = $_POST['username'];

	$select = "SELECT username FROM admin WHERE username = '$username' ";	

	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);

	if ($rselect->num_rows == 1 ) {
		
			echo "false";
		
	}else{
		echo "true";
	}
}

if ($_POST['action'] == 'email_check') {
	$email = $_POST['email'];

	$select = "SELECT email FROM admin WHERE email = '$email' ";	

	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);

	if ($rselect->num_rows == 1 ) {		
			echo "false";		
	}else{
		echo "true";
	}
}

?>