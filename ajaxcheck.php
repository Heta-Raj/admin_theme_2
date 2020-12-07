<?php 
include './db.php';

if ($_POST['action']=='username_check'){
  $username = $_POST['username'];
  $query = "SELECT username FROM admin WHERE username = '$username'";
        //print_r($query);
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1){
    $valid = 'false';}
    else{
      $valid = 'true';
    }
    echo $valid;
  }

  if ($_POST['action']=='email_check'){
    $email = $_POST['email'];
    $query = "SELECT email FROM admin WHERE email = '$email'";
        //print_r($query);
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1){
      $valid = 'false';}
      else{
        $valid = 'true';
      }
      echo $valid;
    }


    if ($_POST['action']=='username_check_update'){
      $username = $_POST['username'];
      $id = $_POST['id'];
      $query1 = "SELECT username FROM admin WHERE username = '$username' AND id = $id";
      $result1 = mysqli_query($conn, $query1);
      $roww = mysqli_fetch_array($result1);

      $query2 = "SELECT username FROM admin WHERE username = '$username'";
      $result2 = mysqli_query($conn, $query2);

      if($roww['username'] == $username){
        $valid = 'true';
      }elseif (mysqli_num_rows($result2) == 1){
        $valid = 'false';
      }else{
        $valid = 'true';
      }
      echo $valid;
    }
    
    if ($_POST['action']=='email_check_update'){
     $email = $_POST['email'];
     $id = $_POST['id'];
     $query1 = "SELECT email FROM admin WHERE email = '$email' AND id = $id";
     $result1 = mysqli_query($conn, $query1);
     $roww = mysqli_fetch_array($result1);

     $query2 = "SELECT email FROM admin WHERE email = '$email'";
     $result2 = mysqli_query($conn, $query2);

     if($roww['email'] == $email){
      $valid = 'true';
    }elseif (mysqli_num_rows($result2) == 1){
      $valid = 'false';
    }else{
      $valid = 'true';
    }
    echo $valid;
  }

 

?>