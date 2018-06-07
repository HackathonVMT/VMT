<?php
session_start();

//$query="select vehicle_id from vehicle where =$v";
$name=$_SESSION['name1'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HISTORY details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="button.css">
</head>
<body class="w3-sand">
<div class="container">
<h1 style="text-align:center;">HEY <?php echo $name ?>!!!</h1>
<h2 style="text-align:center;margin-top:50px">YOUR ODOMETER AND REFILL HISTORY</h2>
<table class="table table-hover">
<thead>
<tr>
        <th>vehicle_id</th>
        <th>Odometer</th>
        <th>price</th>
        <th>date</th>
      </tr>
</thead>
<tbody>
<?php
include("config.php");
for($i=0 ; $i<count($_SESSION['vehid']) ; $i++)
{
$v=$_SESSION['vehid'][$i];
$query="select * from odometer_details where vehicle_id=$v order by date desc";
$res=$con->query($query);
while($row=$res->fetch_assoc())
{
$vid=$row['vehicle_id'];
$odo=$row['odometer'];
$price=$row['price'];
$dat=$row['date'];
echo "<tr><td>".$vid."</td><td>".$odo."</td><td>".$price."</td><td>".$dat."</td><br>";
}
}
?>
</tbody>
</table>
</div>
</body>
</html>
