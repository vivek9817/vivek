
<?php

session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | SMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Student Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="logins.php" method="post" >
            <h1>Admin Login Form</h1>

            <div>
                <input type="text" name="uname" class="form-control" placeholder="Username" required >
            </div>
            <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required >
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="login" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

           <!----- <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.html"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>----->
        </form>
    </section>


</div>

<!--------<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>------>


</body>
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
			
			 <script>
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
