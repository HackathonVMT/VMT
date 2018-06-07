<?php
include("config.php");

if(isset($_POST['submit'])){ 
   $vehicleid = $_POST['vehicleId'];
   $userid = $_POST['userId'];
   $lt = $_POST['litres'];
   

  if($vehicleid !=''||$userid !='' || $lt !=''){
  //Insert Query of SQL
     $sql = "insert into petrol_details(vehicle_id, user_id, litres) values ($vehicleid, $userid, $lt)";

   }
   if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
   } else {
    echo "Error: " . $sql . "<br>" . $con->error;
   }
   
}
$con->close();
?>