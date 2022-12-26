<?php
include 'config.php';

$Type= $_GET["Query"];

$SitN = $_GET["Type"]; 




$query = "SELECT * FROM time_schedule WHERE Sl = 1";

$result_nbr = $conn->query($query);
$DAtaCheck = mysqli_fetch_assoc($result_nbr);



$obj=$DAtaCheck['BookedJson'];

  

$BookedJson = json_decode($obj, true); 

if( $BookedJson[$SitN]==0){

    $BookedJson[$SitN]=1;


} else  $BookedJson[$SitN]=0;


 $newjson = json_encode($BookedJson, true); 


 $updateQ = "UPDATE `time_schedule` SET `BookedJson`= '$newjson' WHERE Sl = 1";

 //print_r($newjson) ;



 if ($conn->query($updateQ) == TRUE)
 {
    
     echo "success";
    
     
 }
 else
 {
     echo $updateQ;
    // echo '<script> alert("Data Not Updated"+ ); </script>';
 }








?>