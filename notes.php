<?php

include "database.php";

session_start();
$table=$_SESSION['username'];
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Notes </title>
</head> 
<body >
    <div class="container">
	    <form action="database.php" method="POST" class="login-email">
			<div class="from-group md-col-5 text-center">
			<label for="exampleInputEmail1">Title</label>
			<input type="text" class="from-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>


			<div class="from-group md-col-5 text-center">
			<label for="exampleInputEmail1">Description</label>
			<textarea class="from-control" name="description" id="exampleInputEmail1" rows="3"></textarea>
            </div>


			<button type="submit" name="savenotes" class="btn btn-primary">Save</button>
			<button type="submit" name="back" class="btn btn-primary">Back</button>
		</form>
	</div>
	<div class="container">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead> 
  <tbody>
	<?php 
	
	$check="SELECT * FROM notes.$table ";
	$id=1;
	if ($result = mysqli_query($connection,$check))
	{

		while($show=mysqli_fetch_array($result)){
			echo '<tr>
			<th scope="row">'.$id.'</th>
			<td>'.$show['title'].'</td>
			<td>'.$show['content'].'</td> 
			<td><a href="notes.php?ids='.$show['id'].'">Delete</a></td>
		   </tr>';
		   $id++;
		}
		 

	}
	
    ?>
  </tbody>
</table>
	</div>
</body> 
</html>