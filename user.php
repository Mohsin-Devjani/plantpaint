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
	<title>Users</title>
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
				<th> <a class="btn1" href= "ctable.php">CUSTOMERS </div></th>			</tr>
		</thead>
	</table>
	<div class="header1">
  	<h3>Users</h3>
  </div>
	
    
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">User ID</th>
								<th class="column2">User Name</th>
								<th class="column2">Status</th>
								<th class="column2">Update</th>
							</tr>
						</thead>
						<?php
	$conn = mysqli_connect("localhost", "root", "", "PROJECT1");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id,username,access FROM `useraccounts`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>". $row["access"]. "</td><td>" . "<a href='editu.php?edit=$row[id]'>Edit </a><a href='delu.php?del=$row[id]'>Del</a>" ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br/>
	<a class="btn2" href= "register.php">Add User</a>
<br/>
<br/>
<a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
  </body>
</html>

+