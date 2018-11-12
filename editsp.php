<?php
if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if($_SESSION['access']!= "admin")
  {
    echo 'You are not authorized!';
    header('location: salesperson.php');
  }

	$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'PROJECT1');

	if( isset($_GET['edit']) )
{
$id = $_GET['edit'];
$sql = mysqli_query($con,"SELECT * FROM salesperson WHERE SID = '$id';");
$row = mysqli_fetch_array($sql);

}

	if( isset($_POST['SNAME']) or isset($_POST['CONTACT'] ))
{
	$SNAME = $_POST['SNAME'];
	$CNO = $_POST['CONTACT'];
	$ID = $_POST['SID'];
	$sql = "UPDATE salesperson SET SNAME = '$SNAME',CONTACT = '$CNO' WHERE SID = '$ID';";
	$res = mysqli_query($con,$sql) or die("Failed!".mysqli_error($con));

header("refresh:1 ;url=salesperson.php");

}

?>

<form action="editsp.php" method="post">
<button> <a href="index.php">back</a></button>
<input type="hidden" name="SID" value="<?php echo $row[0]; ?>"><br/>
Name : <input type="text" name="SNAME" value="<?php echo $row[1];?>"><br/>
Contact : <input type="text" name="CONTACT" value="<?php echo $row[2];?>"><br/>
<input type="submit" value="Update">

</form>
