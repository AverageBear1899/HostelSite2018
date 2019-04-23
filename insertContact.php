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
$query=$conn->prepare("INSERT INTO contacts (first, last, email, message) VALUES
(?,?,?,?)");
$query->bindParam(1, $first);
$query->bindParam(2, $last);
$query->bindParam(3, $email);
$query->bindParam(4, $message);
$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$message=$_POST['message'];
$query->execute();
$conn = null;
echo 'Hi '.$_POST['first'].' ' .$_POST['last'] .' thanks for your interest.</br>';
echo 'We will contact you at '. $_POST['email'].' soon.</br>';
?>
</div>


</section>
</body>
</html>
