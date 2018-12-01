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
	<title>Sales Person</title>
	<meta charset="UTF-8">

<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="main.css">
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
				<th> <a class="btn1" href= "../survey/index.php">SURVEYS </div></th>
			</tr>
		</thead>
	</table>
	<div class="header1">
  	<h3>Salesperson</h3>
  </div>
	
    
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">Salesperson ID</th>
								<th class="column2">Name</th>
								<th class="column2">Contact</th>
								<th class="column2">Update</th>
							</tr>
						</thead>
						<?php
	$conn = mysqli_connect("localhost", "root", "", "PROJECT");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT sid,sname,contact FROM `salesperson`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["sid"]. "</td><td>" . $row["sname"] . "</td><td>". $row["contact"]. "</td><td>" . "<a href='editsp.php?edit=$row[sid]'>Edit </a><a href='delsp.php?del=$row[sid]'>Del</a>" ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br/>
	<div>
		<a class="btn2" href= "addsp.php">Add Salesperson </a>
		<br/>
<br/><a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
	</div>
  </body>
</html>
