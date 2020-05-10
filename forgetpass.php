<?php
SESSION_START();

?>



<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
	<title>forget password</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<form action="forgetpass.php" class="login_wrapper" method="POST">
	<h2 class="form-signin-heading" align="center">Get Password</h2>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"></span>
			<input type="text" name="uname" class="form-control" placeholder="user name" required>
		</div>
		<br>
	<?php  echo $_SESSION["alert"]; ?>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Get Password">
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
</form>
	<?php  echo $_SESSION["alert"]="" ?>
</body>
</html>

<?php

include("dbcon.php");
if(isset($_POST['submit']))
{
$user=$_POST['uname'];

$rs=mysqli_query($con,"select * from adminn where username='$user'");
if(mysqli_num_rows($rs)>0)
{
	$row=mysqli_fetch_assoc($rs);
	$pass=$row["password"];
	$_SESSION["alert"]=$pass;
}
else
{
	?>
	<div style="margin-top:50px;" class="alert alert-danger col-lg-6 col-lg-push-3">
        User Not Exit
    </div>
	<?php
}
}


?>