<?php
  if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  if($_SESSION['access']!= "admin")
  {
  	echo 'You are not authorized!';
  	header('location: product.php');
  }

	$con = mysqli_connect('localhost','root','');
	$db   = mysqli_select_db($con,'PROJECT1');

	if( isset($_GET['edit']) )
{
$id = $_GET['edit'];
$sql = mysqli_query($con,"SELECT * FROM product WHERE PCODE = '$id';");
$row = mysqli_fetch_array($sql);

}

	if( isset($_POST['BRAND']) or isset($_POST['type'] ) or isset($_POST['shade'] ) or isset($_POST['size']) or isset($_POST['price'] ) )
{
	$BRAND = $_POST['brand'];
	$TYPE = $_POST['type'];
	$SHADE = $_POST['shade'];
	$SIZE = $_POST['size'];
	$PRICE = $_POST['price'];
	$ID = $_POST['code'];
	$sql = "UPDATE product SET BRAND = '$BRAND',TYPE = '$TYPE',SHADE = '$SHADE',SIZE = '$SIZE',PRICE = '$PRICE' WHERE PCODE = '$ID';";
	$res = mysqli_query($con,$sql) or die("Failed!".mysqli_error($con));

header("refresh:1 ;url=product.php");

}

?>
<form action="editprdt.php" method="POST">
<button> <a href="product.php">back</a></button>
<input type="hidden" name="code" value="<?php echo $row[0]; ?>"><br/>
BRAND : <input type="text" name="brand" value="<?php echo $row[1];?>"><br/>
TYPE : <input type="text" name="type" value="<?php echo $row[2];?>"><br/>
SHADE : <input type="text" name="shade" value="<?php echo $row[3];?>"><br/>
SIZE : <input type="text" name="size" value="<?php echo $row[4];?>"><br/>
PRICE : <input type="text" name="price" value="<?php echo $row[5];?>"><br/>
<input type="submit" value="Update">

</form>
