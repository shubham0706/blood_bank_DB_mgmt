<?php

session_start();


?>
<!doctype html>
<html lang=en>
<head>
<title>Donor's Page</title>
<meta charset=utf-8><!--important prerequisite for escaping problem characters-->
<style>
body {
		background-image: url("pic2.jpg");
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
submit {
	 width: 200px;
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
<h2 class="title"><center>Register Donor:-</center><br></h2>
<form action="donorpost.php" method="POST">
Name: <input type="text" name="name" pattern= '[a-zaA-Z\s]{4,30}' required><br><br>
Address: <input type="text" name="address" size="30" maxlength="40" pattern='[a-zaA-Z\s0-9,]{4,50}' required><br><br>
Email: <input type="email" name="email" required><br><br>
Age: <input type='number' min='18' max='60' name='age' required><br><br>
Phone No:  <input type='number' min='7000000000' max='9999999999' name='phno' required><br><br>

Bloodgroup:  
 <select name="btype" >
        <option value='A+'>A+</option>
        <option value='A-'>A-</option>
        <option value='B+'>B+</option>
        <option value='B-'>B- </option>
        <option value='AB+'>AB+</option>
        <option value='AB-'>AB-</option>
        <option value='O-'>O-</option>
        <option value='O+'>O+</option>
     </select></p>
<input id="submit" type="submit" name="submit">
</form>

</p>
</div>
</div>
</body>
</html>