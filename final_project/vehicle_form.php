<?php
session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
include("config.php");

if(isset($_POST['submit'])){
   $vehicleid = $_POST['vehicleId'];
   $vehicle_name = $_POST['vehicleName'];
   $vehicle_type = $_POST['vehicleType'];

  if($vehicleid !=''||$vehicle_name !='' || $vehicle_type !=''){
  //Insert Query of SQL
     $sql = "insert into vehicle(vehicle_id, vehicle_name, vehicle_type) values ($vehicleid, '$vehicle_name', '$vehicle_type')";

   }
   if ($con->query($sql) === TRUE) {
      $_SESSION['set']="hidden";
      $_SESSION['r1']=true;
    header("Location: try1.php");
   } else {
     $_SESSION['set']="visible";
    header("Location: vehicle_form1.php");
    exit();
   }

}
$con->close();
?>
