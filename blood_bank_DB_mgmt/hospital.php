<?php

session_start();


?>
<!doctype html>
<html lang=en>
<head>
<title>Hospital Page</title>
<meta charset=utf-8><!--important prerequisite for escaping problem characters-->
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">

<div id="content"><!-- Registration handler content starts here -->
<p>
<?php
// The link to the database is moved to the top of the PHP code.
require ('connect-mysql.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$errors = array(); // Initialize an error array.
// Check for a name:
if (empty($_POST['name'])) {
$errors[] = 'You forgot to enter your Name.';
} else {
$fname = mysqli_real_escape_string($dbcon, trim($_POST['name']));
}
// Check for phone number
if (empty($_POST['unitsreq'])) {
$errors[] = 'You forgot to enter units req.';
} else {
$phone = mysqli_real_escape_string($dbcon, trim($_POST['unitsreq']));
}

// Check for an address
if (empty($_POST['address'])) {
$errors[] = 'You forgot to enter your address.';
} else {
$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
}


if (empty($_POST['date'])) {
$errors[] = 'You forgot to enter your date.';
} else {
$date = mysqli_real_escape_string($dbcon, trim($_POST['date']));
}
// Check for an email address
if (empty($_POST['group'])) {
$errors[] = 'You forgot to enter your bgroup.';
} else {
$group = mysqli_real_escape_string($dbcon, trim($_POST['group']));
}



if (empty($errors)) { // If it runs
// Register the user in the database...
// Make the query:
$q = "INSERT INTO customer (name,address,dates,btype,unitreq)
VALUES ('$name', '$address','$unitsreq','$dates','$group')";
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it runs
header ("location: register-thanks.php");
exit();
} else { // If it did not run
// Message:
echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize 
for any inconvenience.</p>';
// Debugging message:
echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
// Include the footer and quit the script:
include ('footer.php');
exit();
} else { // Report the errors.
	echo '<h2>Error!</h2>
<p class="error">The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Extract the errors from the array and echo them
echo " - $msg<br>\n";
}
echo '</p><h3>Please try again.</h3><p><br></p>';
}// End of if (empty($errors))
} // End of the main Submit conditional.
?>

<h2>Register Users</h2>
<form action="customer.php" method="post">
<p><label class="label" for="name">Name:</label>
<input id="lname" type="text" name="name" size="30" maxlength="40" 
value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></p>
<p><label class="label" for="unitsreq">UnitsReq</label>
<input id="lname" type="number" name="unitsreq" size="30" maxlength="40" 
value="<?php if (isset($_POST['unitsreq'])) echo $_POST['unitsreq']; ?>"></p>
<p><label class="label" for="date">Date:</label>
<input id="email" type="date" name="date" size="30" maxlength="60" 
value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" > </p>
<p><label class="label" for="address">Address:</label>
<input id="lname" type="text" name="address" size="30" maxlength="40" 
value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></p>


<p> <label for="group">Blood Group Required:</label> <select name="group" id="hall" value="<?php if (isset($_POST['group'])) echo $_POST['group']; ?>" >
        <option>A +</option>
        <option>A -</option>
        <option>B+</option>
        <option>B- </option>
        <option>AB+</option>
        <option>AB-</option>
        <option>O-</option>
        <option>O+</option>
     
      </select></p>

<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>

</p>
</div>
</div>
</body>
</html>