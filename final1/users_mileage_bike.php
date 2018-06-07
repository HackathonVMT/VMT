<?php
session_start();
include("config.php");
  //if (isset($_POST['submit'])) {
  $var="";
  $id="";
$user_id1="";
  if(isset($_SESSION['name1']))
      {
           $var = $_SESSION['name1'];
      }

      $query1 = "select user_id from vehicle where vehicle_type='bike'";
      $result1 = $con->query($query1);
      if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc())
        {
        $user_id1 = $row1['user_id'];
      $query2="select user_id from users where username='$var' and user_id=$user_id1";

        $res2=$con->query($query2);
        if ($res2->num_rows > 0){
        $r=$res2->fetch_assoc();

        $id=$r['user_id'];
      }

}
      }

    $date_mile = array();
    $user_id_query = "select user_id from users";
    $result = $con->query($user_id_query);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        $user_id = $row['user_id'];
        $data_mile[$user_id] = array();
        $query = "select mileage,date from mileage1 where user_id = $user_id order by date";
        $res = $con->query($query) or die("Mileage Error");
        while ($row = $res->fetch_assoc()) {
          $date_mile[$user_id][$row['date']] = $row['mileage'];
        }
      }
    }
  //}
?>
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="b1.css">
</head>

<body>

<div class="um" style="	position: absolute;	visibility: visible;	left: 0px;	top: -4px; z-index: 200;	" id="umid">

<script>
var users = <?php echo json_encode($date_mile); ?>;
var ids = Object.keys(users);
var data = [];
var date = Object.keys(users).map(function(key){
  return users[key];
});
for (var i = 0; i < Object.keys(date).length; i++) {
  opacity = 0.35;
  name="other vehicles";
  width=1.8;
if (ids[i] == "<?php echo $id;?>") {
  opacity = 1;
  name="<?php echo $var; ?>";
  width=3.5;
}
    year = Object.keys(date[i]);
	  mileage = Object.keys(date[i]).map(function(key){
		  return date[i][key];
	  });
	   // console.log(year);
	  // console.log(mileage);

var trace = {
  x: year,
  y: mileage,
  type: 'scatter',
  opacity:opacity,
  name:name,
  line:{
    width:width,
    shape:"spline",
    smooth:1.3
  },
  fill:"none",
  gradient:"radial"
};
data.push(trace);
}
var layout1 = {
  title: 'Mileage of user with other users',
  width:590,
  height:550,
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

Plotly.newPlot('umid', data,layout1);

</script></div>
</body>
