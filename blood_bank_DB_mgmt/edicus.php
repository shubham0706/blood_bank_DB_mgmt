<html>
<head>
<title>Admin's Page</title>
<style>
body {
		background: url("w3.jpg") 
		no-repeat center center fixed;
        background-size: cover;
	 }
html{
		font-family:Segoe UI Light;
		-ms-text-size-adjust:100%;
		-webkit-text-size-adjust:100%;
	}
</style>
</head>
<body>
<h2><center> ADMIN'S PAGE </center></h2>
<?php
require "connecreq.php";
$query = "SELECT `Did` from `donor`";
$queryrun = mysql_query($query);
$i=0;
while($row=mysql_fetch_assoc($queryrun))
	$holddt[$i++]=$row['Did'];
$query2 = "SELECT `Cid` from `customer`";
$query2run = mysql_query($query2);
$j=0;
while($row2=mysql_fetch_assoc($query2run))
	$holddt2[$j++]=$row2['Cid'];
?>
<br>
<br>
<br>
<br>
<li><font color='navy'>Select a Donor ID to delete the Donor details:</font></li>
<form action='ddel.php' method='POST'><select name="did">
	<?php
			foreach($holddt as $ID){
				echo "<option value='".$ID."' >".$ID."</option>";
			}
		 ?>	</select><input type='submit' value='Go'></form>

		 

<br>
<br>
<br>		 
<li><font color='navy'>Select a Customer ID to delete the Customer details:</font></li>
<form action='cdel.php' method='POST'><select name="cid">
	<?php
			foreach($holddt2 as $ID2){
				echo "<option value='".$ID2."' >".$ID2."</option>";
			}
		 ?>	</select><input type='submit' value='Go'></form>



