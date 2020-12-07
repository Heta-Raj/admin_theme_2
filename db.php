<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
/*
$sql = "CREATE DATABASE admin";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
*/

/*
$sql_table ="CREATE TABLE IF NOT EXISTS admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
firstname VARCHAR(100) NOT NULL,
lastname VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
country VARCHAR(100),
state VARCHAR(100),
city VARCHAR(100),
dob VARCHAR(100),
gender VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($sql_table);

if (mysqli_query($conn, $sql_table)) {
  echo "Table admin created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}*/
/*
$sql = "ALTER TABLE admin 
ADD firstname VARCHAR(100) NOT NULL,
lastname VARCHAR(100) NOT NULL, 
country VARCHAR(100),
state VARCHAR(100),
city VARCHAR(100),
dob VARCHAR(100),
gender VARCHAR(100), ";
$conn->query($sql);

if (mysqli_query($conn, $sql)) {
  echo "Table admin UPDATED successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
*/


?>