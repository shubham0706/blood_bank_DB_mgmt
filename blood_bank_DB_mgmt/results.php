<html>
<head><title>Lab Results</title>
<style>
body {
		background-image: url("labs.jpg");
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
		  outline: 10px;
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
div {
    
	background-color: white;
    width: 300px;
    padding: 25px;
    border: 5px black;
    margin: 25px;
	position: absolute;
    height: 250px;
    width: 400px;
    margin: -100px 0 0 -200px;
    top: 25%;
    left: 50%;
}

</style>
</head>
<body>

<div>
<h2><center>Enter the SampleID to get your test results:-</center></h2>
<form action='lab.php' method='POST'>
<input type='number' style="border-color:black" placeholder="SAMPLE ID" name='sid' required><br><br>
<input type='submit' style="border-color:black" value='Get Results'>
</form>
</div>






</body>
</html>