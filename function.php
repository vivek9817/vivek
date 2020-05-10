<?php

function showdetails($standerd,$rollno)
{
	include('dbcon.php');
	
	$sql="SELECT * FROM student WHERE rollno='$rollno' AND standerd='$standerd'";
	
	$run=mysqli_query($con,$sql);
	
	if(mysqli_num_rows($run)>0)
	{
		$data=mysqli_fetch_assoc($run);
		?>
		<table border="2" style="width:50%; margin-top:20px; background-color:#c1ad95;" align="center">
			<tr>
				<th colspan="5">Student Details</th>
			</tr>
			<tr>
				<td colspan="3"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px; padding-left:300px; margin-top:10px;margin-bottom:10px;" /> </td>
			</tr>
			<tr>
				<th>Roll No</th>
				<td><?php echo $data['rollno']; ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data['name']; ?></td>
			</tr>
			<tr>
				<th>standerd</th>
				<td><?php echo $data['standerd']; ?></td>
			</tr>
			<tr>
				<th>Parents contact No</th>
				<td><?php echo $data['pcont']; ?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $data['city']; ?></td>
			</tr>
		</table>
		<?php
	}
	else
	{
		echo "<script>alert('no student found.');</script>";
	}
}


?>