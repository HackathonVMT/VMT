<?php
session_start();
include('config.php');
$var="";
$user_id="";
  $vname="";
    $vid="";

if(isset($_SESSION['name1']))
    {
         $var = $_SESSION['name1'];
    }
$q1="select user_id from users where username='$var'";
$res=$con->query($q1);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc();
  $user_id = $row['user_id'];
  $q2="select vehicle_id,vehicle_name from vehicle where vehicle_id='$user_id'";
$res1=$con->query($q2);
if ($res1->num_rows > 0) {
  $row1=$res1->fetch_assoc();
  $vid=$row1['vehicle_id'];
  $vname=$row1['vehicle_name'];

}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">click for details</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><h4>Hi<?php echo "<h4>".$var."</h4>"?></h4></h4>
        </div>
        <div class="modal-body">
          <p id="id1"><?php echo "<h4>Yusername is</h4> ".$var."<br>". "<h4>vehiclename is </h4>".$vname."<br>"."<h4>vechicle id is</h4>".$vid."<br>"; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

</body>
</html>
<?php
session_unset();
session_destroy(); ?>
