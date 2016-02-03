<?php
session_start();
require 'connecreq.php';
$username=$_POST['username'];
$password=$_POST['password'];
$query1= "SELECT * FROM `login` WHERE `username`='$username' AND `password`='$password'";
$query1_run=mysql_query($query1);
$query1_num_rows=mysql_num_rows($query1_run);
if($query1_num_rows>0)
{	
	$id= mysql_result($query1_run,0,'id');
}
if($query1_num_rows==1)
{
	$type= mysql_result($query1_run,0,'type');
	if($type=='Donor')
	{
		$_SESSION['loggedin']=$id;
		
		header('Location: ddisp.php');
	}
	else if($type=='Customer')
	{
		$_SESSION['loggedin']=$id;
		header('Location: cdisp.php');
	}
}	
else
{
	echo "<font color='red'>"."Wrong Username/Password!"."</font>"."<br/>";
	echo "<a href='index.php'>Click here to go back to Home Page</a>";
}

?>
