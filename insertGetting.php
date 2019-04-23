<!DOCTYPE HTML>
<html>
<nav>
  <ul>
    <li><a href="index.html">Home Page</a> </li>
    <li><a href="facilities.html">Facilities</a> </li>
    <li><a href="prices.html">Prices</a> </li>
	<li><a href="cafe.html">Cafe</a> </li>
	<li><a href="gettingHere.html">Getting Here</a> </li>
	<li><a href="contactUs.html">Contact Us</a> </li>
	<li><a href="admin.html">Admin</a> </li>
  </ul>
</nav>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contact Us</title>
<link href="styleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
  <header>
  <h1 align="center"> Backpacker's Hostel</h1>
  <img src='images/banners/banner_black.jpg' class="banner"/>
  </header>
  
<section id="content">

<div class="row">
<div class="col-12">

</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Connected successfully <br />";
 }
catch(PDOException $e)
 {
 echo "Connection failed: " . $e->getMessage();
 }
$query=$conn->prepare("INSERT INTO surveys (selection, car, bus, train, bicycle, walking, radio) VALUES
(?,?,?,?,?,?,?)");
$query->bindParam(1, $selection);
$query->bindParam(2, $car);
$query->bindParam(3, $bus);
$query->bindParam(4, $train);
$query->bindParam(5, $bicycle);
$query->bindParam(6, $walking);
$query->bindParam(7, $radio);
if(isset($_POST['selection'])){ $selection = $_POST['selection']; }
if(isset($_POST['car'])){ $car = $_POST['car']; } else {$car = 'off'; }
if(isset($_POST['bus'])){ $bus = $_POST['bus']; } else {$bus = 'off'; }
if(isset($_POST['train'])){ $train = $_POST['train']; } else {$train = 'off'; }
if(isset($_POST['bicycle'])){ $bicycle = $_POST['bicycle']; } else {$bicycle = 'off'; }
if(isset($_POST['walking'])){ $walking = $_POST['walking']; } else {$walking = 'off'; }
$radio=$_POST['radio'];
$query->execute();
$conn = null;
echo 'Hi, thanks for letting us know, see you soon!</br>';
?>

</section>
</body>
</html>
