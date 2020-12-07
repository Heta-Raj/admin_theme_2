<?php
include './db.php';

if ($_POST['action'] == 'email_check') {
	$email = $_POST['email'];
	$select = "SELECT email FROM admin WHERE email = '$email' ";	
	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);
	if ($rselect->num_rows == 1) {
		if ($row['email'] === $email) {
			echo "true";
		}else{
			echo "false";
		}
	}else{
		echo "false";
	}
}
if ($_POST['action'] == 'pwd_reset') {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$md5 = md5($password);	
	$select = "SELECT email FROM admin WHERE email = '$email' ";	
	$rselect = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($rselect);
	if ($rselect->num_rows == 1) {				
		$update = "UPDATE admin SET password = '$md5' WHERE email = '$email' ";
		if ($conn->query($update) === TRUE) {
			echo "true";
		} else {
			echo "false";
		}		
	}else{
		echo "false";
	}
}
?>