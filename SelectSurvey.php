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
$query=$conn->prepare("SELECT selection FROM surveys");
$query->execute();
$transportArray = ["train" => 0,"bus"=> 0,"bicycle"=> 0,"car"=> 0, "walking" => 0];
	$results=$query->fetchAll(PDO::FETCH_ASSOC);

	foreach ($results as $row) {

		if($row['selection'] == "train")
		{
			$transportArray["train"] += 1;
		}
		else if($row['selection'] == "bus")
		{
			$transportArray["bus"] += 1;
		}
		else if($row['selection'] == "bicycle")
		{
			$transportArray["bicycle"] += 1;
		}
		else if($row['selection'] == "car")
		{
			$transportArray["car"] += 1;
		}
		else if($row['selection'] == "walking")
		{
			$transportArray["walking"] += 1;
		}
	}
?>

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
<script src="./Chart.bundle.js"></script>
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
<div class="col-6">
This Pie Chart Shows How Many People Selected How They Will Get To The Hostel
</div>
<div class="col-6">
<canvas id="myChart" width="200" height="200"></canvas>
</div>
</div>


</section>
</body>
</html>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Train", "Bus", "Bicycle", "Car", "Walking",],
        datasets: [{
            label: '# of People',
            data: [<?php foreach ($transportArray as $key => $val) { echo $val; echo ",";} ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
					display:false,
                }
            }]
        }
    }
});
</script>