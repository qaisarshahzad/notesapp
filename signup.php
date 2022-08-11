<?php
include 'database.php';


?>

<?php
  if(isset($_POST['signup']))
  {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

	if($password===$cpassword)
	{
		$dcheck="SELECT * FROM sign WHERE email ='$email' ";
		$search=mysqli_query($connection,$dcheck);
		if(!mysqli_num_rows($search)>0){
		$ins="INSERT INTO sign (user,email,password) VALUES ('$username','$email','$password')";
    	$new_user= "CREATE TABLE notes.$username(
		id INT NOT NULL AUTO_INCREMENT,
		title VARCHAR(255),
		content VARCHAR(1000) NOT NULL,
		date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY	(id)) ENGINE = InnoDB";
	    $tablea=mysqli_query($connection,$new_user);
	    $qu=mysqli_query($connection,$ins); 
	    if($qu && $tablea)
	    {
		header("location: login.php");
		$username = "";
		$email = "";  
		$_POST['password'] = "";
				
	    }
	    else 
	    {
		echo "Wrong Data";
	    }

	}
	else
	{
		echo"Already Signedup User";
	}

	
	
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

	<title>SignUp</title> 
</head>
<body>
	<div class="container">
		<form action="signup.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<div class="input-group">
				<button type="submit" name="signup" class="btn">Sign Up</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>