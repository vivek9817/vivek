<?php

session_start();
			
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location: ../login.php');
	}



?>
<?php


include('header.php');
include('titlehead.php');
include('../dbcon.php');

$sid = $_GET['sid'];

$sql = "SELECT * FROM student WHERE id='$sid'";
$run=mysqli_query($con,$sql);


$data = mysqli_fetch_assoc($run);


?>


<form method="POST" action="updatedata.php" enctype="multipart/form-data">
	
	<table border="1" align="center" style="width:50%; margin-top:40px;">
		<tr>
			<th align="center">Roll No<th>
			<td><input type="text" name="rollno" value=<?php echo $data['rollno'] ?> required></td>
		</tr>
		<tr>
			<th align="center">Full Name<th>
			<td><input type="text" name="name" value=<?php echo $data['name'] ?> required></td>
			
		</tr>
		<tr>
			<th align="center">City<th>
			<td><input type="text" name="city" value=<?php echo $data['city'] ?> required></td>
		</tr>
		<tr>
			<th align="center">Parents Contact no<th>
			<td><input type="text" name="pcon" value=<?php echo $data['pcont'] ?> required></td>
		</tr>
		<tr>
			<th align="center">Standerd<th>
			<td><input type="number" name="std" value=<?php echo $data['standerd'] ?> required ></td>
		</tr>
		<tr>
			<th align="center">Image<th>
			<td><input type="file" name="simg"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			
			<input type="hidden" name="sid" value="<?php echo $data['id'] ?>"/>
			<input type="submit" name="submit" value="submit">
			</td>
		</tr>
	</table>
	
	
</form>