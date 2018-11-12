<?php include('server.php');
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
<html lang="en">
<head>
	<title>Products</title>
	<meta charset="UTF-8">

<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="br">
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
			</tr>
		</thead>
	</table>
	
	<div class="header1">
  	<h3>Products</h3>
  </div>
	
    
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">PRODUCT CODE</th>
								<th class="column2">BRAND</th>
								<th class="column2">TYPE</th>
								<th class="column2">SHADE</th>
								<th class="column2">SIZE</th>
								<th class="column2">PRICE</th>
								<th class="column2">UPDATE</th>
							</tr>
						</thead>
						<?php
	$conn = mysqli_connect("localhost", "root", "", "PROJECT1");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM `product`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["PCODE"]. "</td><td>" . $row["BRAND"] . "</td><td>". $row["TYPE"]. "</td><td>" . $row["SHADE"] . "</td><td>" . $row["SIZE"]. "</td><td>" . $row["PRICE"]. "</td><td>" . "<a href='editprdt.php?edit=$row[PCODE]'>Edit </a><a href='delprdt.php?del=$row[PCODE]'>Del</a>" ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
	</br>
  <a class="btn2" href= "addproduct.php">Add Product</a>
 <br/>
<br/><a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
</body>
</html>


