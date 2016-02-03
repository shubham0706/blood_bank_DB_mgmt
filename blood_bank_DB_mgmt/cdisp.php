<html>
<head><title>Customer's Page</title>
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
input {
		  border: solid 2px #E5E5E5;
		  outline: 0;
		  width: 200px;
		  background: #FFFFFF;
		  margin-right:520px;
		  background: transparent;
      }		
select {
	margin-right:520px;
	width: 200px;
	background: transparent;
	border: solid 2px #E5E5E5;
}
form
{
	margin-left:10px;
	text-align:right;
}
</style>
</head>
<body>
<?php
require 'connecreq.php';
session_start();
$x= false;
$id= $_SESSION['loggedin'];
$query = "SELECT * FROM `customer` WHERE `customer`.`Cid` = '$id'";
$queryrun = mysql_query($query);
$querynr = mysql_num_rows($queryrun);
$query2 = "SELECT * FROM `custorder` where cid = '$id'";
$query2run = mysql_query($query2);
$nr = mysql_num_rows($query2run);
if($nr>0)
{
	
	$x=true;
	$oid = mysql_result($query2run , 0 , `oid`);
	$query3 = "SELECT `unitsreq` FROM `custorder` where cid = '$id'";
	$query3run = mysql_query($query3);
	$unitsreq = mysql_result($query3run , 0 , `unitsreq`);
	$query4 = "SELECT `btype` FROM `custorder` where cid = '$id'";
	$query4run = mysql_query($query4);
	$btype = mysql_result($query4run , 0 , `btype`);
	$query5 = "SELECT `dates` FROM `custorder` where cid = '$id'";
    $query5run = mysql_query($query5);
	$dates = mysql_result($query5run , 0 , `dates`);
}
if($querynr>0)
{
	echo "<h3><font color='navy'><center>Customer's Details:-</center></font></h3><br/>";
	while($array1=mysql_fetch_assoc($queryrun))
	{
		echo "<table border='1' align='center'>";
		echo "<tr><th>Name</th>
				  <th>Address</th>
				  <th>Email</th>
				  <th>Phone No.</th>
				  <th>OrderID</th>
				  <th>Units Required</th>
				  <th>Bloodgroup</th>
				  <th>Date of Requirement</th>
				  </tr>";
		echo "<tr>";
		echo "<td>".$array1['Name']."</td>";
		echo "<td>".$array1['Address']."</td>";
		echo "<td>".$array1['Email']."</td>";
		echo "<td>".$array1['phno']."</td>";
		if($x)
		{
			echo "<td>".$oid."</td>";	
			echo "<td>".$unitsreq."</td>";	
			echo "<td>".$btype."</td>";
			echo "<td>".$dates."</td>";				
		}
		else
		{
			echo "<td>n/a</td>";
			echo "<td>n/a</td>";
			echo "<td>n/a</td>";
			echo "<td>n/a</td>";
		}
		echo "</tr></table>";
		echo "<br><br><hr>";
		
	}
}
if($nr==0)
{
	echo "
	<h2><center>Place an Order:-</center></h2><br>
	<form action='ccpost.php' method='POST'>
	Blood Type: <select name='btype' >
			<option value='A+'>A+</option>
			<option value='A-'>A-</option>
			<option value='B+'>B+</option>
			<option value='B-'>B- </option>
			<option value='AB+'>AB+</option>
			<option value='AB-'>AB-</option>
			<option value='O-'>O-</option>
			<option value='O+'>O+</option>
		</select><br><br>
	Units Required: <input type='number' name ='unitsreq' min = '1' max ='20' required><br><br>
	Date of Requirement: <input type = 'date' name = 'dates' required><br><br> 
	<input type='submit' >
	</form>";
}

if($querynr==0)
{
	echo "Error Occurred";
}


?>
<center>
<button onclick="window.print()">Print</button>
</center></p>

<a href='logout.php'><input type='submit' value= "Log Out"></a>
</body>
