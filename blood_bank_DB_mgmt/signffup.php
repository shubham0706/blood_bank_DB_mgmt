<!doctype html>
<html lang=en>
<head>
<title>Register page</title>
<meta charset=utf-8><!--important prerequisite for escaping problem characters-->
<link rel="stylesheet" type="text/css" href="signup.css">
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
$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
}

/*
// Check for phone number
if (empty($_POST['phone'])) {
$errors[] = 'You forgot to enter your phone number.';
} else {
$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
}
// Check for age
if (empty($_POST['age'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
}
// Check for an address
if (empty($_POST['address'])) {
$errors[] = 'You forgot to enter your address.';
} else {
$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
}
// Check for an email address
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
}

*/
// Check for an email address




// Check for an email address
if (empty($_POST['type'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$type = mysqli_real_escape_string($dbcon, trim($_POST['type']));
}


// Check for a password and match it against the confirmed password
if (!empty($_POST['psword1'])) {
if ($_POST['psword1'] != $_POST['psword2']) {
$errors[] = 'Your two passwords did not match.';
} else {
$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
}
} else {
$errors[] = 'You forgot to enter your password.';
}


if (empty($errors)) { // If it runs
// Register the user in the database...
// Make the query:
$q = "INSERT INTO login (id, username,password,type)
VALUES (' ', '$name','$p','$type')";
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it runs

if($type=="Donor"){

         header ("location: donor.php");
         exit();}


if($type=="Customer"){
	header ("location: customer.php");
    exit();}

header("location: index.php");
exit();
}
 else { // If it did not run
// Message:
echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize 
for any inconvenience.</p>';
// Debugging message:
echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
// Include the footer and quit the script:

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

<h2 class="title">Register Users</h2>
<form action="signup.php" method="post" class="form">
<p><label class="label" for="name">Name:</label> 
<input id="fname" type="text" name="name" size="30" maxlength="30" patttern='[a-zA-Z\s]{5,30}'
value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" ></p>



<p><label class="label" for="psword1">Password:</label>
<input id="psword1" type="password" name="psword1" size="12" maxlength="12"
value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" ></p>
<p><label class="label" for="psword2">Confirm Password:</label>
<input id="psword2" type="password" name="psword2" size="12" maxlength="12" 
value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>

<p> <label class="label" for="type">Type:</label> <select name="type" id="hall" value="<?php if (isset($_POST['type'])) echo $_POST['type']; ?>" >
        <option>Donor</option>
        <option>Customer</option>
       
      </select></p>


<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>

</p>
</div>
</div>
</body>
</html>