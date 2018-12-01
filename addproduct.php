<?php include('server.php');
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Add Product</h2>
  </div>
<form method="post" action="product.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>BRAND</label>
  	  <input type="text" name="brand">
  	</div>
  	<div class="input-group">
  	  <label>TYPE</label>
  	  <input type="text" name="type">
  	</div>
  	<div class="input-group">
  	  <label>SHADE</label>
  	  <input type="text" name="shade">
  	</div>
  	<div class="input-group">
  	  <label>SIZE</label>
  	  <input type="text" name="size">
  	</div>
  	<div class="input-group">
  	  <label>PRICE</label>
  	  <input type="text" name="price">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="pupdate">Add</button>
  	</div>
  	<a class = "btn2" href="product.php"> Back </a>
  </form>
</body>
</html>