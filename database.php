<?php
$server="localhost";
$username="root";
$pass="";
$db="notes";

$connection=mysqli_connect($server,$username,$pass,$db);
// if($connection)
// {
//     echo "connected";
// }
// else
// {
//     echo "Not connected";
// }

if(isset($_POST['savenotes'])){

    session_start();
    $tab=$_SESSION['username'];
    $title=$_POST['title'];
    $descrip=$_POST['description'];
    $insert="INSERT INTO $tab (title,content) VALUES('$title','$descrip')";
    $quer=mysqli_query($connection,$insert);
    if($quer)
    {
      header("location: notes.php");
    }


} 
		

if(isset($_GET['ids']))
{
	session_start();
	$tab=$_SESSION['username'];
	$id=$_GET['ids'];
	$del="DELETE FROM $tab WHERE id=$id";
	$qu=mysqli_query($connection,$del);
	if($qu)
	{
		header("Location: notes.php");
	}
	else
	{
		echo"Failed to remove note";
	}
}   
if(isset($_POST['back']))
{
	header("location:welcome.php");
}

?>