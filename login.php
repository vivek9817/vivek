<?php

session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
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
	<title>Admin Login</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form border="5" name="form1" action="login.php" method="post" >
            <h1>Admin Login Form</h1>

            <div>
                <input type="text" name="uname" class="form-control" placeholder="Username" required>
            </div>
            <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required >
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="login" value="Login">
                <a class="reset_pass" href="forgetpass.php">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="adminres.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>

<!--------<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>------>


</body>


<!---------
<body>

<h1 align="center">Admin Login</h1>
<form action="login.php" method="POST">

    <h1><a href="index.php">GO BACK</a></h1>
	<h1 style="float:right; margin-down:100px;"><a href="adminres.php">New Admin</a><h1>

	<table align="center">
		<tr>
			<td>Username</td><td><input type="text" name="uname" required></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" name="pass" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
		</tr>
	</table>

</form>

</body>---->
</html>
<?php

include('dbcon.php');


if(isset($_POST['login']))
	{
		$username = $_POST['uname'];
		$password = $_POST['pass'];
		
		
		$qry="SELECT * FROM adminn WHERE  username ='$username' AND  password ='$password';";
		$run=mysqli_query($con,$qry);
		
		$row = mysqli_num_rows($run);
		if($row < 1)
		{
			?>
		
			<div class="alert alert-danger col-lg-6 col-lg-push-3">
				<strong style="color:white">Invalid</strong> Username Or Password.
			</div>
			<!----<script>
				alert('Username or Password not match');
				window.open('login.php','_self');
			</script>
			<?php	
		}
		else
		{
			$data=mysqli_fetch_assoc($run);
			
			$id=$data['id'];
			
			
			
			$_SESSION['uid']=$id;
			header('location:admin/admindash.php');
		}
		
		
	}

?>