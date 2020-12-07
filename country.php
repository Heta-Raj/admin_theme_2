<?php
include './db.php';
if(isset($_POST["state_id"])){

    $state_id = $_POST['state_id'];

    $sel_state = "SELECT * FROM states WHERE country_id = $state_id" ;
    $result = $conn->query($sel_state);
    
    if($result){
    if ($result->num_rows != 0) {
    	while($row = $result->fetch_assoc()){
    		foreach($result as $value){
                echo "<option value=".$value['id'].">". $value['name'] . "</option>";
            }
    	}
    }
   } else{
    	echo '<option selected="">Choose...</option>'; 
    }
    
}
if (isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];

    $select_city = "SELECT * FROM cities WHERE state_id = '$city_id' ";
    $res = $conn->query($select_city);

    if($res){
    	while ($row = $res->fetch_assoc()) {
    		foreach ($res as $value) {
        echo "<option value=".$value['id'].">". $value['name'] . "</option>";
    }
    }
}else{
    	echo '<option selected="">Choose...</option>'; 
    }
    
}

?>