<?php session_start();
$mil="";$mil1="";
$mil_max="";$var1="";
$va="";
$date_mile2=array();?><script>
ini_set('session.cache_limiter','public');
session_cache_limiter(false);</script>
<!DOCTYPE html>
<html>
<title>VMT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="new.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Plotly.js -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="b1.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="b1" >
<!-- Top container -->
<div class="w3-bar w3-top w3-grey w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
   <form method="post">
  <input type="text" name="nm" id="user" >
<input type="submit">
</form>
  </div>
<?php
if(isset($_POST["nm"])){
  $_SESSION["name1"]=$_POST["nm"];}//echo $_POST["user"];
  //echo "session varible is ".$_SESSION["name1"];
  ?>
<!--
<script>
function val()
{
	document.getElementById("y").innerHTML="welcome  <h5> "+document.getElementById("user").value+"</h5>";
}
</script>--><!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span id="y"><h4>Welcome to VMT</h4><strong>
	 </strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>  Overview</a>
	<a href="users_form.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>User Details</a>
  <a href="vehicle_form.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Vehicle Details</a>
  <a href="mileage_form.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Mileage Details</a>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-car"></i> Vehicle Management Tracker</b></h5>
  </header>
  <script type="text/javascript">
  function var(){
   var myval="bike";
if(myval=="bike")
document.getElementById('div1').style.display='none';
    }
  </script>

  </script>


  <div class="w3-row-padding w3-margin-bottom" id="div1" onmouseover="var()">
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-padding-16">
        <div class="w3-left"><i class="fa fa-bicycle w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Bikes</h4>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">click for details</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Mileage comparision</h4
              </div>
              <div class="modal-body">





                <?php

                include("config.php");
                if(isset($_SESSION['name1']))
                {
                  $va=$_SESSION['name1'];
                }
                    $user_id_query2= "select user_id from users where username='$va'";
                    $result2= $con->query($user_id_query2);
                    if ($result2->num_rows > 0) {
                      $row2= $result2->fetch_assoc();
                      $user_id2 = $row2['user_id'];
                      $query2 = "select mileage,date from mileage_details where user_id = $user_id2 order by date";
                      $res2 = $con->query($query2);

                      while ($row2 = $res2->fetch_assoc()) {
                        $date_mile2[$row2['date']] = $row2['mileage'];
                      }
                    }
                  //}
                ?>



                <div class="pl"; id="pli">

                <script>
                var dat = [];
                      var temp = [];
                	  var date = <?php echo json_encode($date_mile2); ?>;

                	  console.log(date);
                	  year = Object.keys(date);
                	  mileage = Object.keys(date).map(function(key){
                		  return date[key];
                	  });
                	  console.log(year);
                	  console.log(mileage);
                	  count = Object.keys(date).length;
                	  for(i = 0;i < count;i++){
                		  temp.push(year[i].split("-")[0]);
                		  temp.push(mileage[i]);
                		  dat.push(temp);
                	  }
                var trace1 = {
                  x: year,
                  y: mileage,
                  type: 'linechart'
                };

                var data = [trace1];
                var layout = {
                  title: 'Mileage of user from refill to refill',
                  width:500,
                  height:400,
                  autosize:false,
                  xaxis: {
                    title: 'date',
                    titlefont: {
                      family: 'Courier New, monospace',
                      size: 18,
                      color: '#7f7f7f'
                    }
                  },
                  yaxis: {
                    title: 'Mileage',
                    titlefont: {
                      family: 'Courier New, monospace',
                      size: 18,
                      color: '#7f7f7f'
                    }
                  }
                };


                Plotly.newPlot('pli', data,layout);

                </script></div>













              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-car w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Cars</h4>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">click for details</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Mileage comparision</h4
              </div>
              <div class="modal-body">
      </div>
    </div>
	

<?php

include('config.php');
$var="";
$user_id="";
  $vname="";
    $vid="";
         if(isset($_SESSION['name1'])){
          $var = $_SESSION['name1'];}
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
<div class="container">
  <h2>WELCOME <?php if(isset($_SESSION["name1"])){ echo $_SESSION["name1"];}
    ?></h2>
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
<hr>
  <div class="w3-container">
    <h5>Mileage Status</h5>
    <p>Your Avg Mileage</p>
    <div class="w3-grey">
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
		 $sql2= " select AVG(mileage) as a from mileage_details where user_id = $id group by user_id";
		 $res2 = $con->query($sql2);

		  if ($res2->num_rows > 0){
		  $row2 = $res2->fetch_assoc();
		  $mil =$row2['a'];
		  $mil1 = number_format($mil, 2);

    }}
    ?>
      <div class="w3-container w3-center w3-padding w3-green" style="width:<?php echo $mil1?>%"><?php echo $mil1?></div>
    </div>

    <p><span>Car with maximum mileage: </span><?php
        $sql3 = "select MAX(mileage) as h, vehicle_name as n
                 from vehicle v,mileage_details m
                 where v.vehicle_type= 'car' and v.vehicle_id = m.vehicle_id and m.mileage = (select max(mileage)
                                                                                               from mileage_details,vehicle
																								where vehicle.vehicle_type= 'car' and vehicle.vehicle_id = mileage_details.vehicle_id);";
        $res3 = $con->query($sql3);
         if ($res3->num_rows > 0){
		  $row3 = $res3->fetch_assoc();
		  $mil_max =$row3['h'];
          $v_name = $row3['n'];
          //echo "<strong>".$v_name."</strong>";
			echo "<strong style='color:orange;'>".$v_name."</strong>";

         }

       ?></p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:<?php echo $mil_max?>%"><?php echo $mil_max?></div>
    </div>

    <p><span> Bike with maximum mileage: </span><?php
        $sql4 = "select min(mileage) as h1, vehicle_name as n1
                 from vehicle v,mileage_details m
                 where v.vehicle_type= 'bike' and v.vehicle_id = m.vehicle_id and m.mileage = (select min(mileage)
                                                                                               from mileage_details,vehicle
																								where vehicle.vehicle_type= 'bike' and vehicle.vehicle_id = mileage_details.vehicle_id);";
        $res4 = $con->query($sql4);
         if ($res4->num_rows > 0){
		  $row4 = $res4->fetch_assoc();
		  $mil_min =$row4['h1'];
          $v_name1 = $row4['n1'];
          echo "<strong style='color:red;'>".$v_name1."</strong>";
          //echo "<strong>".$v_name1."</strong>";
		  }

       ?></p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:<?php echo $mil_min?>%"><?php echo $mil_min?></div>
    </div>
  </div>
  <hr>

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
