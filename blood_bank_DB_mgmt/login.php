<?php
session_start();
?>
<html>
<head>
<title>Login</title>
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
<a href="index.php"><img src="logo.png" width="40" height="40" class="logo"><font size='6'>BloodBank Management</font></a>
<h2><font color='navy'> <center>Enter your Login details:-</center></font></h2>
<b>
<form action='loginpost.php' method='POST'>
Username: <input type="text" name="username" required><br/><br/>
Password: <input type="password" name="password" required ><br/><br/>
<input type="submit" name="login" value="Login">
</form>
</b>
</body>
</html>