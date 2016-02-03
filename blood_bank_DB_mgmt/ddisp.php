<html>
<head><title>Donor's Page</title>
<style>
body {
		background-image: url("w3.jpg");
		no-repeat center center fixed;
        background-size: cover;
		}
html{
		font-family:Segoe UI Light;
		-ms-text-size-adjust:100%;
		-webkit-text-size-adjust:100%;
		}
th,td {
    text-align: center;
	padding:5px;
}
</style>
</head>
<body>
<?php
require 'connecreq.php';
session_start();
$x = false;
$id = $_SESSION['loggedin'];
$query = "SELECT * FROM `donor` WHERE `donor`.`Did` = '$id'";
$queryrun = mysql_query($query);
$querynr = mysql_num_rows($queryrun);
$query1= "SELECT * FROM `camps`";
$query1run= mysql_query($query1);
$query2 = "SELECT `campid` FROM `donorcamp` where did = '$id'";
$query2run = mysql_query($query2);
$nr = mysql_num_rows($query2run);
if($nr>0)
{
	$result = mysql_result($query2run,0,`campid`);
	$query3 = "SELECT `name` FROM `camps` WHERE campid = '$result'";
	$query3run = mysql_query($query3);
	$campnm = mysql_result($query3run, 0, `name`);
	$query4 = "SELECT `dates` FROM `donorcamp` where did = '$id'";
	$query4run = mysql_query($query4);
	$dates = mysql_result($query4run, 0,`dates`);
	$x= true;
}
if($querynr>0)
{
	echo "<h3><font color='navy'><center>Donor Details:-</center></font></h3><br/>";
	while($array1=mysql_fetch_assoc($queryrun))
	{
		echo "<table border='1' align='center'>";
		echo "<tr><th>Name</th>
				  <th>Address</th>
				  <th>Age</th>
				  <th>Blood Group</th>
				  <th>Phone No.</th>
				  <th>Email</th>
				  <th>Selected Camp Name:</th>
				  <th>Donation Date</th>
				  </tr>";
		echo "<tr>";
		echo "<td>".$array1['Name']."</td>";
		echo "<td>".$array1['Address']."</td>";
		echo "<td>".$array1['age']."</td>";
		echo "<td>".$array1['btype']."</td>";
		echo "<td>".$array1['phno']."</td>";
		echo "<td>".$array1['Email']."</td>";
		if($x)
		{
			echo "<td>".$campnm."</td>";
			echo "<td>".$dates."</td>";
		}	
		else
		{
			echo "<td>None</td>";
			echo "<td>None</td>";
		}		
		echo "</tr></table>";
		echo "<br><br><hr>";
		
	}
if($nr==0)
{	
	echo "<h2>Please select a date on which you would like to donate:-</h2>
	<form action='dcpost.php' method='POST'>
	<input type='date' name= 'date'><br>";
	echo "<h2>Please select a camp:-</h2>";
	while($array = mysql_fetch_assoc($query1run))
	{
		echo "<input type='radio' name='camp' value='".$array['name']."'>".$array['name']."<br>";	
	}
	echo "<br><br><input type='submit'>
	</form>";
}	
	
}	
else
{
	echo "<font color='red'>No record found for the given Username</font><br/><br/>";
}

?>
<center>
<button onclick="window.print()">Print</button>
</center></p>

<a href='logout.php'><input type='submit' value= "Log Out"></a>
</body>
</html>