<?php  session_start();
include './db.php';
$user_id = $_SESSION['user_id'];


if ($_POST['action'] == 'state_windowload') {	
	$user_id = $_POST['user_id'];
	$country_id = $_POST['country_id'];

	$get_user = "SELECT state FROM admin WHERE id = $user_id" ;
	$user_res = $conn->query($get_user);	
	$userrow = $user_res->fetch_assoc();

	$sel_state = "SELECT * FROM states WHERE country_id = $country_id" ;
	$result = $conn->query($sel_state);
	
	if($result){
		if ($result->num_rows != 0) {
			while($row = $result->fetch_assoc()){
				foreach($result as $value){ ?>
					<option value="<?php echo $value['id']; ?>"
						<?php if ($userrow['state'] == $value['id']) { echo "selected"; } ?>>
						<?php echo $value['name']; ?></option>
					<?php }
				}
			}
		} 
	}
	
if ($_POST['action'] == 'city_windowload') {	
	$user_id = $_POST['user_id'];
	$state_id = $_POST['state_id'];

	$get_user = "SELECT city FROM admin WHERE id = $user_id" ;
	$user_res = $conn->query($get_user);	
	$userrow = $user_res->fetch_assoc();

	$sel_state = "SELECT * FROM cities WHERE state_id = $state_id" ;
	$result = $conn->query($sel_state);
	
	if($result){
		if ($result->num_rows != 0) {
			while($row = $result->fetch_assoc()){
				foreach($result as $value){ ?>
					<option value="<?php echo $value['id']; ?>"
						<?php if ($userrow['city'] == $value['id']) { echo "selected"; } ?>>
						<?php echo $value['name']; ?></option>
					<?php }
				}
			}
		} 
	}


if ($_POST['action'] == 'country') {	
	$country_id = $_POST['country_id'];
	$get_user = "SELECT state FROM admin WHERE id = $user_id" ;
	$user_res = $conn->query($get_user);	
	$userrow = $user_res->fetch_assoc();

	$sel_state = "SELECT * FROM states WHERE country_id = $country_id" ;
	$result = $conn->query($sel_state);
	
	if($result){
		if ($result->num_rows != 0) {
			while($row = $result->fetch_assoc()){
				foreach($result as $value){ ?>
					<option value="<?php echo $value['id']; ?>"
						<?php if ($userrow['state'] == $value['id']) { echo "selected"; } ?>>
						<?php echo $value['name']; ?></option>
					<?php }
				}
			}
		} 
	}

	if ($_POST['action'] == 'state') {
		$state_id = $_POST['state_id'];

		$get_user = "SELECT city FROM admin WHERE id =$user_id ";
		$user_res = $conn->query($get_user);
		$userrow = $user_res->fetch_assoc();

		$sel_city = "SELECT * FROM cities WHERE state_id = $state_id ";
		$result = $conn->query($sel_city);	

		if ($result) {
			if ($result->num_rows !=0) {
				while ($row = $result->fetch_assoc()) {
					foreach ($result as $value) { ?>
						<option value="<?php echo $value['id']; ?>"
							<?php if ($userrow['city'] == $value['id']) {
								echo "selected";
							} 
							?>>
							<?php echo $value['name']; ?> </option>
						<?php }
					}
				}
			}
		}
		
		if ($_POST['action'] == 'user_reset') {
			$username = $_POST['username'];
			$select = "SELECT username FROM admin WHERE username = '$username' AND id = '$user_id' ";	
			$rselect = mysqli_query($conn,$select);
			$select2 = "SELECT username FROM admin WHERE username = '$username' ";
			$rselect2 = mysqli_query($conn,$select2);	
			if (mysqli_num_rows($rselect) == 1) {
				echo "true";
			}elseif (mysqli_num_rows($rselect2) == 1) {
				echo "false";
			}else{
				echo "true";
			}
		}

		if ($_POST['action'] == 'email_reset') {
			$email = $_POST['email'];
			$select = "SELECT email FROM admin WHERE email='$email' AND id= '$user_id' ";
			$rselect = mysqli_query($conn, $select);
			$select2 = "SELECT email FROM admin WHERE email = '$email' ";
			$rselect2 = mysqli_query($conn,$select2);

			if (mysqli_num_rows($rselect) == 1) {
				echo "true";
			}
			elseif (mysqli_num_rows($rselect2) == 1 ) {
				echo "false";
			}else{
				echo "true";
			}
		}

		if ($_POST['action'] == 'user_reg_edit') {
			$username = $_POST['username'];
			$row_id = $_POST['id'];
			
			$select = "SELECT username FROM admin WHERE username = '$username' AND id = '$row_id' ";	
			$rselect = mysqli_query($conn,$select);
			
			$select2 = "SELECT username FROM admin WHERE username = '$username' ";
			$rselect2 = mysqli_query($conn,$select2);	
			if (mysqli_num_rows($rselect) == 1) {
				echo "true";
			}elseif (mysqli_num_rows($rselect2) == 1) {
				echo "false";
			}else{
				echo "true";
			}
		}
		if ($_POST['action'] == 'email_reg_edit') {
			$email = $_POST['email'];
			$row_id = $_POST['id'];
			$select = "SELECT email FROM admin WHERE email='$email' AND id= '$row_id' ";
			$rselect = mysqli_query($conn, $select);
			$select2 = "SELECT email FROM admin WHERE email = '$email' ";
			$rselect2 = mysqli_query($conn,$select2);

			if (mysqli_num_rows($rselect) == 1) {
				echo "true";
			}
			elseif (mysqli_num_rows($rselect2) == 1 ) {
				echo "false";
			}else{
				echo "true";
			}
		}

?>