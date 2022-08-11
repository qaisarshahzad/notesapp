<?php 

include 'database.php';

session_start();

error_reporting(0);


if (isset($_POST['update'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
    $cpassword=$_POST['cpassword']; 

        $sql1 = "UPDATE sign SET password='$password'WHERE email='$email'";
	    $reslt = mysqli_query($connection, $sql1);
	   if ($reslt) {
		echo "<script>alert('Woow! Password UPdated.')</script>";
                $email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                header("location: welcome.php");
	    }
       else 
       {
		echo "<script>alert('Woops! Password Not UPdated.')</script>";
	   }
    

	
}
if(isset($_POST['back']))
{
    header("Location: welcome.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Update Password</title> 
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="New Password" name="password" >
			</div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" >
			</div>
            <div class="input-group">
				<button name="update" class="btn">Update</button>
			</div>
			<div class="input-group">
				<button name="back"  class="btn" >Back</button>
			</div>
			
		</form>
	</div>
</body>
</html>