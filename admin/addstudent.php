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



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form action="addstudent.php" method="POST" enctype="multipart/form-data">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" name="rollno" placeholder="Enter Rollno" required>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
                    </div>

                    <div>
                       <input type="text"  class="form-control" name="city" placeholder="Enter City" required>
                    </div>
                    <div>
                        <input type="text"  class="form-control" name="pcon" placeholder="Enter Parents Contact no" required>
                    </div>
                    <div>
                        <input type="number"  class="form-control" name="std" placeholder="Enter Standard" required >
                    </div>
                    <div>
                        <input style="margin-top:20px;" class="form-control" type="file" name="simg">
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input style="margin-top:20px;" class="btn btn-default submit " type="submit" name="submit" value="Submit">
                    </div>

                </form>
            </section>



    </div>

    






<!------
<form method="POST" action="addstudent.php" enctype="multipart/form-data">
	
	<table border="1" align="center" style="width:50%; margin-top:40px;">
		<tr>
			<th align="center">Roll No<th>
			<td><input type="text" name="rollno" placeholder="Enter Rollno" required></td>
		</tr>
		<tr>
			<th align="center">Full Name<th>
			<td><input type="text" name="name" placeholder="Enter Full Name" required></td>
			
		</tr>
		<tr>
			<th align="center">City<th>
			<td><input type="text" name="city" placeholder="Enter City" required></td>
		</tr>
		<tr>
			<th align="center">Parents Contact no<th>
			<td><input type="text" name="pcon" placeholder="Enter Parents Contact no" required></td>
		</tr>
		<tr>
			<th align="center">Standerd<th>
			<td><input type="number" name="std" placeholder="Enter Standard" required ></td>
		</tr>
		<tr>
			<th align="center">Image<th>
			<td><input type="file" name="simg" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
		</tr>
	</table>
	
	
</form>---->
</body>
</html>


<?php

if(isset($_POST['submit']))
{
	
	include('../dbcon.php');
	
	$rolno = $_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['std'];
	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimg/$imagename");
	
	$qry = "INSERT INTO student(rollno, name, city, pcont, standerd, image) VALUES ('$rolno','$name','$city','$pcon','$std','$imagename')";
	
	$run = mysqli_query($con,$qry);
	if($run == true)	
	{
		?>
		<div class="alert alert-success col-lg-6 col-lg-push-3">
			Inserted successfully
		</div>
		<!---<script>
			alert('Data Inserted Succesfully');
		</script>
		<?php
	}
	
}


?>