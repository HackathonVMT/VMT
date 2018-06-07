<?php session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);


$var1="";
include('config.php');
$mil="";$mil1="";
$mil_max="";
?>
<!DOCTYPE html>
<?php
if(isset($_SESSION['redirect']) and $_SESSION['redirect']==true)
{
echo "<script>window.alert(\"You dont have any bike records\");
</script>";
unset($_SESSION['redirect']);
}
if(isset($_SESSION['redirect1']) and $_SESSION['redirect1']==true)
{
echo "<script>window.alert(\"You dont have any car records\");
</script>";
unset($_SESSION['redirect1']);
}
if(isset($_SESSION['r']) and $_SESSION['r']==true)
{
echo "<script>window.alert(\"succesfully entered your odometer details\");
</script>";
unset($_SESSION['r']);
}
if(isset($_SESSION['r1']) and $_SESSION['r1']==true)
{
echo "<script>window.alert(\"succesfully entered your vehicle details\");
</script>";
unset($_SESSION['r1']);
}
?>
<html>
<title>Vehicle Mileage Tracker</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Vehicle Mileage Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<meta property="og:description" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/modernizr-2.6.2.min.js"></script>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-sand" style="margin-bottom:75px";>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo">
                            <a href="">
                              <div class="w3-col s4">
                                       <img src="userImage.jpg" class="w3-circle w3-margin-right" style="width:50px">
                                </div>
                                  <span>VMT</span>
                                </a>
                        </div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <!-- <li class="active"><a href="index.html">Home</a></li> -->
                            <li class="active">
                                <a href="#">Overview</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#myModal1">User Details</a>
                            </li>
                            <li>
                                <a href="vehicle_form1.php">Vehicle Details</a>
                            </li>
                            <li>
                                <a href="mileage_form.php">Odometer Details</a>
                            </li>
                            <li>
                             <a data-toggle="modal" data-target="#myModal2">Edit profile</a>
                            </li>
                            <li>
                                <a href="history.php">VIEW HISTORY</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header style="height: 100px;" id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
</div>
</header>

<?php
if(isset($_POST["nm"])){
  $_SESSION["name1"]=$_POST["nm"];}//echo $_POST["user"];
  //echo "session varible is ".$_SESSION["name1"];

  if(isset($_POST["editname"])){
  $_SESSION["editn"]=$_POST["editname"];
  $en = $_SESSION["editn"];
       $q3="select user_id from users where username='$en'";
        $res3=$con->query($q3);

	     if($res3->num_rows > 0){
			echo "<script>window.alert(\"user already exists!\")</script>";
		}
		else{
			$temp = $_SESSION["name1"];
	   	$q4 = "UPDATE `users` SET `username`= '$en' WHERE username = '$temp'";
		   $res4=$con->query($q4);
           $_SESSION["name1"]=$_SESSION["editn"];


		}
  }
  ?>
<!--
<script>
function val()
{
	document.getElementById("y").innerHTML="welcome  <h5> "+document.getElementById("user").value+"</h5>";
}
</script>--><!-- Sidebar/menu -->

<!-- Overlay effect when opening sidebar on small screens -->
<?php

$var="";
$user_id=" ";
  $vname=array();
    $vid=array();
    $vtype="";
         if(isset($_SESSION['name1'])){
          $var = $_SESSION['name1'];}
$q1="select user_id from users where username='$var'";
$res=$con->query($q1);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc();
  $user_id = $row['user_id'];
 $_SESSION['n']=$user_id;
  $q2="select vehicle_id,vehicle_name,vehicle_type from vehicle where user_id=$user_id";
$res1=$con->query($q2);
$i=0;
$_SESSION['vehid']=array();
$_SESSION['veh_name']=array();
$_SESSION['veh_type']=array();
if ($res1->num_rows > 0) {
  while($row1=$res1->fetch_assoc()){
    $vid[$i]=$row1['vehicle_id'];
    $vname[$i]=$row1['vehicle_name'];

  array_push($_SESSION['vehid'],$row1['vehicle_id']);
  array_push($_SESSION['veh_name'],$row1['vehicle_name']);
  array_push($_SESSION['veh_type'],$row1['vehicle_type']);
  $i++;
}
}
}
$_SESSION['uid']=$user_id;
if(isset($_SESSION['bikecount']) && $_SESSION['bikecount']>0)
{
$_SESSION['car']=false;
}
else if(isset($_SESSION['bikecount']) && $_SESSION['carcount']>0){

  $_SESSION['bike']=false;
}
?>
<div class="container" style="margin-top:65px; margin-left:330px;">
  <h2 style=" margin-left:100px; font-size:50px;">WELCOME <?php if(isset($_SESSION["name1"])){ echo $_SESSION["name1"];}
    ?></h2>
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg w3-teal" style="margin-top: 15px;margin-left: 192px; " data-toggle="modal" data-target="#myModal">VIEW PROFILE</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal"  role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><h4>Hi<?php echo "<h4>".$var."</h4>"?></h4></h4>
        </div>
        <div class="modal-body">
          <p id="id1">
          <?php
          $i=0;
          echo "<h4>Username is</h4><h2> ".$var."</h2><br>". "<h4>vehiclename is </h4>";
          for($i=0;$i<count($vname);$i++)
          {
          echo "<h2>".$vname[$i]."</h2>,";
        }
        echo "<h4>vechicle id is</h4>";
        for($i=0;$i<count($vname);$i++)
        echo "<h2>".$vid[$i]."</h2>,";

         ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div class="modal fade" id="myModal1"  role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <form method="post">
         <input type="text" autocomplete="off" name="nm" id="user" >
       <input type="submit">
       </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="myModal2"  role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><h4>Hi<?php echo "<h4>".$var."</h4>"?></h4></h4>
       </div>

       <div class="modal-body">
         <form method="post">
    <h4>Edit your Username</h4>
    <input type="text" autocomplete="off" name="editname" id="user1" >

      <input type="submit">
      </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
</div>


</div>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:100px;margin-top:83px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:12px; text-align:left">
    <h5><b style="font-size:26px; padding-left:20px;"><i class="fa fa-car"></i> Vehicle Management Tracker</b></h5>
  </header>
  <script type="text/javascript">
  function var(){
   var myval="bike";
if(myval=="bike")
document.getElementById('div1').style.display='none';
    }
  </script>

  </script>
 <a href="buttonexample.php">

  <div class="w3-row-padding w3-margin-bottom" id="div1" onmouseover="var()">
    <div class="w3-quarter">
      <div class="w3-container w3-brown w3-padding-48">
        <div class="w3-left"><i class="fa fa-bicycle w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
		  include("config.php");
      $uj="";
        if(isset($_SESSION['n']))
        {
          $uj=$_SESSION['n'];

			$sql5 = "select count(*) as c from vehicle where vehicle_type = 'bike' and user_id=$uj";

	      $res5 = $con->query($sql5);

		  if ($res5->num_rows > 0){
		  $row5 = $res5->fetch_assoc();
		  $id=$row5['c'];
      $_SESSION['bikecount']=$id;
		  echo "<div style=color:white>".$id."</div>";

		  }
}
		  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4 style="color:white">Want to know your bike perfomance? Click here</h4>
      </div>
    </div>
</a>
	<a href="buttonexamplecar.php">
    <div class="w3-quarter">
      <div class="w3-container w3-pink w3-padding-48">
        <div class="w3-left"><i class="fa fa-car w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
		  include("config.php");
     $uj1="";
      if(isset($_SESSION['n']))
      {
        $uj1=$_SESSION['n'];

			$sql6 = "select count(*) as c from vehicle where vehicle_type = 'car' and user_id=$uj1";

	      $res6 = $con->query($sql6);

		  if ($res6->num_rows > 0){
		  $row6 = $res6->fetch_assoc();
		  $id=$row6['c'];
      $_SESSION['carcount']=$id;
		  echo "<div style=color:white>".$id."</div>";
}
		  }
		  ?></h3>
        </div>

        <div class="w3-clear"></div>
        <h4 style="color:white">Want to know your car perfomance? Click here</h4>
      </div>
    </div>
	</a>
	<a href="AVP.php">
    <div class="w3-quarter">
      <div class="w3-container w3-indigo w3-text-white w3-padding-48">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
		  include("config.php");
      $uj2="";
      if(isset($_SESSION['n']))
      {
        $uj2=$_SESSION['n'];

			$sql7 = "select count(*) as c from vehicle where user_id=$uj2";

	      $res7 = $con->query($sql7);

		  if ($res7->num_rows > 0){
		  $row7 = $res7->fetch_assoc();
		  $id=$row7['c'];

		  echo "<div style=color:white>".$id."</div>";
}
		  }


		  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4 style="color:white">Wanna Compare vehicles<br>Click here!</h4>
      </div>
    </div>
  </div>
</a>

<hr>
  <div class="w3-container">
    <h3>Mileage Status</h3>
    <p>Your recent Mileage</p>
    <div class="w3-grey ">
	<?php      include("config.php");
  $usern="";
if(isset($_SESSION['name1'])){
	        $usern = $_SESSION['name1'];
			$sql1 = "select user_id from users where username = '$usern'";

	      $res1 = $con->query($sql1);

		  if ($res1->num_rows > 0){
		  $row1 = $res1->fetch_assoc();
		  $id=$row1['user_id'];

		  }
		 $sql2= " select mileage as a from mileage1 where user_id = $id order by date desc limit 1";
		 $res2 = $con->query($sql2);

		  if ($res2->num_rows > 0){
		  $row2 = $res2->fetch_assoc();
		  $mil =$row2['a'];
		  $mil1 = number_format($mil, 2);

    }}
    ?>
    <script>
var n1 = <?php echo $mil1 ?>;
   if(n1 < 25){
  notifyMe();
}
           function notifyMe() {

              if (Notification.permission !== "granted")
                   Notification.requestPermission();
              else {
                  var notification = new Notification('Red Alert', {
                  icon: 'http://qnimate.com/wp-content/uploads/2014/07/web-notification-api-300x150.jpg',
                  body: " Phew! Your mileage is below ideal condition. Click here to contact service center",
              });
             notification.onclick = function () {
             window.open("https://www.cars.com/auto-repair/");
             };
             }
           }

</script>

      <div class="w3-container w3-center w3-padding w3-indigo" style="width:<?php echo $mil1?>%"><?php echo $mil1?></div>
    </div>

    <!--<p><span>Car with maximum mileage: </span>


<!--<div class="w3-container">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>
-->
  <!-- Footer -->


  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>
</html>
