<?php
include("config.php");
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $user_id_query = "select user_id from users where username='$username'";
    $result = $con->query($user_id_query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];
      $query = "select mileage,date from mileage_details where user_id = $user_id";
      $res = $con->query($query);
      $date = array();
      $mileage = array();
      while ($row = $res->fetch_assoc()) {
        array_push($mileage,$row['mileage']);
        array_push($date,$row['date']);
      }
    }
  }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      var data = [];
      var temp = [];
      <?php

        for ($i=0; $i < count($date); $i++) {
          ?>
          temp.push(<?php echo $date[$i]; ?>);
          temp.push(<?php echo $mileage[$i]; ?>);
          data.push(temp);
          <?php
        }

      ?>

      function drawChart() {
        var data = google.visualization.arrayToDataTable(data);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 600px; height: 500px;"></div>
  </body>
</html>
