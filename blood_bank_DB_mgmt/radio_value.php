<?php
session_start();
if (isset($_POST['submit'])) {
if(isset($_POST['radio']))
{
echo "<span>You have selected :<b> ".$_POST['radio']."</b></span>";
header('location:donor.php');
}
else{ echo "<span>Please choose any radio button.</span>";}
}
?>