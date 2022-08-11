<?php
include 'database.php';
?>

<?php

if(isset($_POST['login']))
{

    $username=$_POST['username'];
    $password=$_POST['password'];

    $check="SELECT * FROM sign WHERE user='$username' AND password='$password'";
    $inq=mysqli_query($connection,$check);
    $bring=mysqli_num_rows($inq);
    if($inq)
    {
      session_start();
      $_SESSION['login']=true;
      $_SESSION['username']=$username;
      header("location:welcome.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login </p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" >
            </div>
			<div class="input-group">
				<button name="login" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="signup.php">Signup Here</a>.</p>
		</form>
	</div>
</body>
</html>