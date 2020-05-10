<!DOCTYPE HTML>
<html lang="en_us">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student management system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>


<h3 align="right" style="margin-right:20px;"><a href="login.php">admin login</a><h3>
<h1 align="center"style="font-size:50px;">Welcome to student management system</h1>

<form method="post" action="index.php">
	<table border="1" style="width:30%; font-size:25px;" align="center" >
		<tr>
			<td colspan="2" align="center">Student Information</td>
		</tr>
		<tr>
			<td align="left">Choose Standerd</td>
			<td align="left">
				<select name="std" required>
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
					<option value="7">7th</option>
					<option value="8">8th</option>
					<option value="9">9th</option>
					<option value="10">10th</option>
					<option value="11">11th</option>
					<option value="12">12th</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="left">Enter Rollno</td>
			<td align="left"><input type="text" name="rollno" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="show info"></td>
		</tr>
	</table>
</form>

</body>
</html>



<?php

if(isset($_POST['submit']))
{
	
	$standerd=$_POST['std'];
	$rollno=$_POST['rollno'];
	
	
	include('dbcon.php');
	include('function.php');
	
	showdetails($standerd,$rollno);
	
	
}

?>
