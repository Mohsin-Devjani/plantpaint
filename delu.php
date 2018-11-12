<?php
if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if($_SESSION['access']!= "admin")
  {
    echo 'You are not authorized!';
    header('location: user.php');
  }

	$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'PROJECT1');

	if( isset($_GET['del'] ))
{
	$id = $_GET['del'];
	$sql = "DELETE FROM useraccounts WHERE ID = '$id';";
	$res = mysqli_query($con,$sql) or die("Failed".mysqli_error($con));
}


header("refresh:1 ;url=user.php");


?>
