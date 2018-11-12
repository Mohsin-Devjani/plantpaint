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

	if( isset($_GET['edit']) )
{
$id = $_GET['edit'];
$sql = mysqli_query($con,"SELECT * FROM CUSTOMERS WHERE CID = '$id';");
$row = mysqli_fetch_array($sql);

}

	if( isset($_POST['SNAME']) or isset($_POST['CNAME'] ) or isset($_POST['CNO'] ) or isset($_POST['ADDRESS']) or isset($_POST['AREA'] ) or isset($_POST['GC'] ))
{
	$SNAME = $_POST['SNAME'];
	$CNAME = $_POST['CNAME'];
	$CNO = $_POST['CNO'];
	$ADD = $_POST['ADDRESS'];
	$AREA = $_POST['AREA'];
	$GC = $_POST['GC'];
	$ID = $_POST['CID'];
	$sql = "UPDATE CUSTOMERS SET SNAME = '$SNAME',CNAME = '$CNAME',CNO = '$CNO',ADDRESS = '$ADD',AREA = '$AREA',GC = '$GC' WHERE CID = '$ID';";
	$res = mysqli_query($con,$sql) or die("Failed!".mysqli_error($con));

header("refresh:1 ;url=ctable.php");

}

?>
<form action="edit.php" method="POST">
<button> <a href="index.php">back</a></button>
<input type="hidden" name="CID" value="<?php echo $row[0]; ?>"><br/>
SHOP : <input type="text" name="SNAME" value="<?php echo $row[1];?>"><br/>
NAME : <input type="text" name="CNAME" value="<?php echo $row[2];?>"><br/>
CONTACT : <input type="text" name="CNO" value="<?php echo $row[3];?>"><br/>
ADDRESS : <input type="text" name="ADDRESS" value="<?php echo $row[4];?>"><br/>
AREA : <input type="text" name="AREA" value="<?php echo $row[5];?>"><br/>
GC : <input type="text" name="GC" value="<?php echo $row[6];?>"><br/>
<input type="submit" value="Update">

</form>
