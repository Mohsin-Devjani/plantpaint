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
<html>
<head>
 <title>Customers</title>
	<meta charset="UTF-8">

<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="main.css">
<!--===============================================================================================-->
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
  	<h3>Customers</h3>
  </div>
	
    
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">ID</th>
								<th class="column2">Shop Name</th>
								<th class="column2">Customer Name</th>
								<th class="column2">Contact</th>
								<th class="column2">Address</th>
								<th class="column2">Area</th>
								<th class="column2">Coordinates</th>
								<th class="column2">Action</th>
							</tr>
						</thead>
 <?php
$conn = mysqli_connect("localhost", "root", "", "PROJECT");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT CID,SNAME,CNAME,CNO,ADDRESS,AREA,GC FROM `CUSTOMERS`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["CID"]. "</td><td>" . $row["SNAME"] . "</td><td>". $row["CNAME"]. "</td><td>" . $row["CNO"] . "</td><td>" . $row["ADDRESS"]. "</td><td>" . $row["AREA"]. "</td><td>" . $row["GC"]. "</td><td>" . "<a href='edit.php?edit=$row[CID]'>Edit </a><a href='del.php?del=$row[CID]'>Del</a>" ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br/>
	<a class="btn2" href= "addcustomer.php">Add Customer</a>
	<br/>
<br/><a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>

</body>
</html>
