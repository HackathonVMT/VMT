<?php session_start();
$id="";?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="b1.css">

  <title>Vehicle Details</title>
<style>

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	<--background-image: url(indexbg.jpg);>
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	/* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 55px);
	left: calc(50% - 350px);
	z-index: 2;
}

.header div{
	float: left;
	color: #000;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: purple !important;
}

.login{
	position: absolute;
	top: calc(50% - 100px);
	left: calc(50% - 20px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	border: 1px solid black;
	border-radius: 20px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}



.login input[type=submit]{
	width: 200px;
	height: 35px;
	background: indigo;
	border: 1px solid black;
	cursor: pointer;
	border-radius: 20px;
	color:white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: black;
}

::-moz-input-placeholder{
   color: black;
}
    </style>




</head>
<body class="w3-sand">

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>ODOMETER<span>Details</span></div>
		</div>
		<br>
    <?php if(isset($_SESSION['set'])){ echo $_SESSION['set'];} ?>
    <span id="ds" style="visibility:"></span>
		<form class="login" action="odo.php" method="post">
            <h4>Current Petrol Price is :<?php  $cpp = mt_rand(60,80);  $_SESSION['pp']=$cpp;echo $cpp; ?></h4>
		        <input type="text" autocomplete="off" placeholder="odometer" name="odometer"><br><br>
             <input type="text" autocomplete="off" placeholder="vehicleid" name="vehid"><br><br>
				<input type="text" autocomplete="off" placeholder="price" name="price" style="visibility:visible;"><br><br>

				<input type="submit" name="submit" value="submit">
		</form>




</body>

</html>
