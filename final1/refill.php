<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
include("config.php");

$var="";

if(isset($_SESSION['name1']))
    {
         $var = $_SESSION['name1'];
    }
    $user_id_query = "select user_id from users where username='$var'";
    $result = $con->query($user_id_query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];
      $query = "select mileage,date from mileage1 where user_id = $user_id order by date";
      $res = $con->query($query);
      $date_mile = array();
      while ($row = $res->fetch_assoc()) {
        $date_mile[$row['date']] = $row['mileage'];
      }
    }
  //}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="b1.css">
</head>

<body>

<div id="pli" style="margin-top:-22px;">

<script>
var dat = [];
      var temp = [];
	  var date = <?php echo json_encode($date_mile); ?>;

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
  height:500,
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

</body>
</html>
