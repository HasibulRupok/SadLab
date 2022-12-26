<?php 


//DATABSE DETAILS//
$DB_ADDRESS="localhost";
$DB_USER="root";
$DB_PASS="";
$DB_NAME="shahxaut_DB";

$conn = new mysqli($DB_ADDRESS,$DB_USER,$DB_PASS,$DB_NAME); 


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";





?>