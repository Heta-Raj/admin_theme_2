<?php
session_start();
include './db.php';
 
if (isset($_POST['id'])) {
$id = $_POST['id'];

		
	//$select = "SELECT * FROM admin WHERE id = '$id' ";
	$delete = "DELETE FROM admin WHERE id = '$id' ";
	
	$result = mysqli_query($conn, $delete);
	if ($result) {
		echo 1;
	}
	else{
		echo 0;
	}
	/*$row = mysqli_fetch_array($result);*/
	

	
}

?>