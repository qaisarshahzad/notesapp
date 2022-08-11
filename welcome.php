<?php
session_start();
if(isset($_POST['logout']))
{
	session_destroy();
	header("Location: login.php");

}
if(isset($_POST['changepassword']))
{
	header("Location: changepass.php");
}
if(isset($_POST['notes']))
{
	header("Location:notes.php");
}
if(isset($_POST['change']))
{
	$color=$_POST['color'];
	$_SESSION['color']=$color;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>User Panel </title>
</head>
<body<body style="background:<?php
if(isset($_SESSION['color']))
{
	echo  $_SESSION['color'];
}
else
{
	echo "white";
}
?>">
    <div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Panel</p>
			<div class="from-control">
				<input type="text" placeholder="Enter Color To Change" name="color"  > 
			</div>
			<div class="input-group">
				<button name="change" class="btn">Apply Color</button>
			</div>
			<div class="input-group">
				<button name="notes" class="btn">Notes</button>
			</div>
			<div class="input-group">
				<button name="changepassword" class="btn">Change Password</button>
			</div>
			<div class="input-group">
				<button name="logout" class="btn">LogOut</button>
			</div>

		</form>
	</div>
</body>
</html>
