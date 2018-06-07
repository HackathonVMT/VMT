<?php
include("config.php");

if(isset($_POST['submit'])){
   $userid = $_POST['userid'];
   $user = $_POST['user'];
   $pwd=$_POST['pwd'];

  if($userid !=''||$user !=''){
  //Insert Query of SQL
     $sql = "insert into users(user_id, username, password) values ($userid, '$user', '$pwd')";

   }
   if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
   } else {
    echo "Error: " . $sql . "<br>" . $con->error;
   }

}
$con->close();
?>
