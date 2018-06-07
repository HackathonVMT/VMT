<?php
include("config.php");
  //if (isset($_POST['submit'])) {
    $vehicle_mile = array();
    $vehicle_query = "select distinct vehicle_name from vehicle where vehicle_type = 'car'";
    $result = $con->query($vehicle_query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $vehicle_name = $row['vehicle_name'];
        $query = "select avg(mileage) as average from mileage_details where vehicle_id =
        (select vehicle_id from vehicle where vehicle_name = '$vehicle_name')";
        $res = $con->query($query) or die("Query Error");
        if ($res->num_rows > 0) {
          $vehicle_mile[$vehicle_name] = $res->fetch_assoc()['average'];
        }
      }
    }
  //}
?>
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>

  <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
<div class="hide" style="width:100px;height:100px">

</div>
<script>
var dat = [];
      var temp = [];
	  var date = <?php echo json_encode($vehicle_mile); ?>;

	  console.log(date);
	  year = Object.keys(date);
	  mileage = Object.keys(date).map(function(key){
		  return date[key];
	  });
	  console.log(year);
	  console.log(mileage);
    console.log("Heyy");
	  count = Object.keys(date).length;
	  for(i = 0;i < count;i++){
		  temp.push(year[i].split("-")[0]);
		  temp.push(mileage[i]);
		  dat.push(temp);
	  }
var trace1 = {
  x: year,
  y: mileage,
  type: 'bar',
  width: 0.5,
  
};

var data = [trace1];
var layout = {
  title: 'Mileage for different CARS',
  width:700,
  xaxis: {
    title: 'MODEL',
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


Plotly.newPlot('myDiv', data,layout);

</script>
</body>
