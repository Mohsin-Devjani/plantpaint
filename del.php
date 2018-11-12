<?php
  if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if($_SESSION['access']!= "salesperson")
  {
  	echo 'You are not authorized!';
  	header('location: ctable.php');
  }
	$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'PROJECT1');

	if( isset($_GET['del'] ))
{
	$id = $_GET['del'];
	$sql = "DELETE FROM CUSTOMERS WHERE CID = '$id';";
	$res = mysqli_query($con,$sql) or die("Failed".mysqli_error($con));
}


header("refresh:1 ;url=ctable.php");


?>
