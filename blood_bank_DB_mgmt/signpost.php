<?php
session_start();
require 'connecreq.php';
$username = $_POST['name'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$type = $_POST['type'];

if($password!=$cpassword)
{
	echo "Passwords do not match";
	echo "<br><a href='signup.php'>Click here to go back.</a>";
	die();
}
$query = "INSERT into `login` values (' ', '$username', '$password', '$type')";
$queryrun = mysql_query($query);
$query1 = "SELECT * FROM `login` WHERE `login`.`username` ='$username'";
$query1run = mysql_query($query1);
$query_num_rows=mysql_num_rows($queryrun);
echo $id = mysql_result($query1run,0,'id');
echo $type = mysql_result($query1run,0,'type');
if($queryrun)
{ 
	 if($type == 'Customer')
	 {
		 $_SESSION['id']=$id;
		 header('location: customer.php');
	 }
	 
     if($type == 'Donor') 
	 {
		 $_SESSION['id']=$id;
		 header('location: donor.php');
	 }
}
else
{
	echo "Username already exists!!<br>";
	echo "<br><a href='signup.php'>Click here to go back.</a>";
}
?>