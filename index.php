<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home </title>
	<link rel = "stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="header">
		<h1>PAINT PLANT</h1>
	</div>
	<table>
		<thead>
			<tr class="table100-head">
				<th> <a class="btn1" href= "index.php">HOME </div></th>
				<th> <a class="btn1" href= "user.php">USERS </div></th>
				<th> <a class="btn1" href= "product.php">PRODUCTS </div></th>
				<th> <a class="btn1" href= "salesperson.php">SALESPERSON </div></th>
				<th> <a class="btn1" href= "ctable.php">CUSTOMERS </div></th>
				<th> <a class="btn1" href= "../survey/index.php">SURVEYS </div></th>	
			</tr>
		</thead>
	</table>
	<div class="header1">
		<h2>Home Page</h2>
	</div>

	<div class="content">
	    <?php if(isset($_SESSION['success'])): ?>
	    	<div class="error success">
	    		<h3>
	    			<?php
	    			echo $_SESSION['success'];
	    			unset($_SESSION['success']);
	    			?>
	    		</h3>
	    	</div>
	    <?php endif ?>

	    <?php if(isset($_SESSION["username"])): ?>
	    	<p>Welcome <strong> <?php echo $_SESSION['username'];?> </strong></p>
	    <br/>
<br/>
   <?php endif ?>
<a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
	 
	</div>
	

</body>
</html>  