<?php
if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

	$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'PROJECT1');

	if( isset($_GET['edit']) )
{
$id = $_GET['edit'];
$sql = mysqli_query($con,"SELECT * FROM useraccounts WHERE ID = '$id';");
$row = mysqli_fetch_array($sql);

}
?>
<?php include('server.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
</head>
<body>

<form action="editsp.php" method="post">
<button> <a href="index.php">back</a></button>
  <?php include('errors.php'); ?>
<input type="hidden" name="ID" value="<?php echo $row[0]; ?>">
<input type="hidden" name="password" value="<?php echo $row[2]; ?>"><br/>
Name : <input type="text" name="NAME" value="<?php echo $row[1];?>"><br/>
Access : <input type="text" name="access" value="<?php echo $row[3];?>"><br/>
Password : <input type="password" name="password3"><br/>
Cuurent Password : <input type="password" name="password2"><br/>
<button type="submit" class="btn" name="upd_user">UPDATE</button>

</form>
</body>
</html>
