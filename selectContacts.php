

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
define("DB_USER", "root");
define("DB_PASS", "");
$servername = "localhost";
$dbname = "hostel";
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully <br />";
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
$query=$conn->prepare("SELECT * FROM contacts");
$query->execute();
$results=$query->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
echo $row['first'] . "<br />";
echo $row['last'] . "<br />";
echo $row['email'] . "<br />";
echo $row['message'] . "<br />";
echo "<hr />";
}
$conn = null;
?>
</div>


</section>
</body>
</html>
