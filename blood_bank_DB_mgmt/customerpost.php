<?php
session_start();
require 'connecreq.php';
$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$id = $_SESSION['id'];

$query1= "INSERT INTO `customer` VALUES ( '$id' , '$name', '$address', '$email','$phno')";
$query1_run=mysql_query($query1);

if($query1_run)
{
	echo "data entered successfully.<br>";
	echo "<a href='index.php'>Click here to go to home page</a>";
}	
else
{
	echo "<font color='red'>"."Wrong Data Entered!"."</font>"."<br/>";
	echo "<a href='index.php'>Click here to go back to Home Page</a>";
}

?>
