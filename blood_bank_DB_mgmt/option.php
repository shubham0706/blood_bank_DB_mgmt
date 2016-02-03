
<!DOCTYPE html>
<html>
<head>
<title>PHP Get Value of Select Option and Radio Button</title> <!-- Include CSS File Here-->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="main">
<h2>Choose your option</h2>
<form action="radio_value.php" method="post">
<!-- Select Option Fields Starts Here -->
<!--<label class="heading">To Select Multiple Options Press ctrl+left click :</label>
<select multiple name="Color[2]">
<option value="customer">Customer</option>
<option value="donor">Donor</option>

</select>
-->

<!-- Radio Button Starts Here -->
<label class="heading">Radio Buttons :</label>
<input name="radio" type="radio" value="customer">Customer	
<input name="radio" type="radio" value="donor">Donor

<?php include'radio_value.php'; ?>
<input name="submit" type="submit" value="Get Selected Values">
</form>
</div>
</div>
</body>
</html>