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


?>
<table align="center" style="margin-top:20px;">
<form action="updatestudent.php" method="post">

	<tr>
		<th>Enter Standerd</th>
		<td><input type="number" name="std" placeholder="enter standerd" required="required"></td>
		
		<th>Enter Studentname</th>
		<td><input type="text" name="stuname" placeholder="enter name" required="required"></td>
		
		
		<td colspan="2"><input type="submit" name="submit" value="search"></td>
	</tr>

</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr style="background-color:#000; color:#fff;">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>

	</tr>
	<?Php

	if(isset($_POST['submit']))
	{
		include("../dbcon.php");
		$standerd = $_POST['std'];
		$name = $_POST['stuname'];

	
		$sql="SELECT * FROM student WHERE standerd='$standerd' AND name LIKE '%$name%'";
	
		$run = mysqli_query($con,$sql);
	
		if(mysqli_num_rows($run)<1)
		{
			echo '<tr><td colspan="5">record not found</td></tr>';
		}
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run))
			{
				$count++;
				?>
				<tr>
					<td align="center"><?php echo $count; ?></td>
					<td align="center"><img src="../dataimg/<?php echo $data['image'] ?>"style="max-width:100px;" /></td>
					<td align="center"><?php echo $data['name']; ?></td>
					<td align="center"><?php echo $data['rollno']; ?></td>
					<td align="center" colspan="2"><a href="updateform.php?sid=<?php echo $data['id'] ?>">Edit</a></td>

				</tr>
			
			
				<?php
			}
		}
	
	}

	?>

</table>
