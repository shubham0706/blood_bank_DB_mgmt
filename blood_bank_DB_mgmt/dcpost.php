<?php
require 'connecreq.php';
session_start();
$date = $_POST['date'];
$camp = $_POST['camp'];
$id = $_SESSION['loggedin'];
$date = $_POST['date'];
	$query = "SELECT * FROM `camps` WHERE `camps`.`name` = '$camp'";
	$queryrun = mysql_query($query);
	$querynumr= mysql_num_rows($queryrun);
	$campid = mysql_result($queryrun, 0 ,`campid`);
	$query1 = "INSERT INTO `donorcamp` VALUES ('$id', '$campid', '$date')";
	if($query1run = mysql_query($query1))
	{
		echo "Your Camp location has been stored successfully";
		echo "<a href='ddisp.php'>Click here to go Back</a>";
	}
	else
	{
		echo "Error Occured";
		die();
	}

?>