<?php




session_start();
include('dbcon.php');
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	if($cpassword == $password)
	{
		$sql="insert into adminn (username,password) values ('$username','$password')";

		$run=mysqli_query($con,$sql);
	
		$row = mysqli_num_rows($run);
			if($row < 1)
			{
				?>
				<script>
					alert('SUCESSFUL REGISTERED');
					window.open('index.php','_self');
				</script>
				<?php	
			}
	}
	else
	{
		?>
		<script>
			alert('PASSWORD NOT MATCHED');
			window.open('adminres.php','_self');
		</script>
		<?php	
	}
		
}
?>
<!DOCTYPE HTML>
<html lang="en_us">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
	<title>Student Management System</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body>
<div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form name="form1" action="adminres.php" method="post">
            <h2>User Registration Form</h2><br>

                <div>
					<input type="text" class="form-control" placeholder="username" name="username" required=""/>
                </div>
				<div>
					<input type="password" class="form-control" placeholder="password" name="password" required=""/>
                </div>
				<div>
					<input type="password" class="form-control" placeholder="confrm password" name="cpassword" required=""/>
                </div>
				<div class="col-lg-12  col-lg-push-3">
					<input class="btn btn-default submit" type="submit" name="login" value="sing up">
				</div>
		</form>
	</section>
</div>

</body>
</html>