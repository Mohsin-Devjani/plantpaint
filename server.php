<?php
session_start();

$username = "";
$access = "";
$Name="";
$SName="";
$CName="";
$address="";
$area="";
$gc="";
$contact="";
$errors = array();
// CONNECT O DB
	$db = mysqli_connect('localhost','root','','PROJECT1');
	//REGISTER BTN CLICKED
	if(isset($_POST['reg_user']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$access = mysqli_real_escape_string($db, $_POST['access']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		if(empty($username))
		{
			array_push($errors, "Username is required");
		}
		if(empty($access))
		{
			array_push($errors, "access is required");
		}
		if(empty($password_1))
		{
			array_push($errors, "Password is required");
		}
		if($password_1 != $password_2)
		{
			array_push($errors, "Password doesn't match");
		}

		if(count($errors) == 0)
		{
			$password = md5($password_1);
			$sql = "INSERT INTO useraccounts (username,password,access) values ('$username','$password','$access');";
			mysqli_query($db,$sql);
			header('location: user.php');
		}

}
//LOG IN 
	if(isset($_POST['login_user']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if(empty($username))
		{
			array_push($errors, "Username is required");
		}
		if(empty($password))
		{
			array_push($errors, "password is required");
		}
		if(count($errors) == 0 )
		{
			$password = md5($password);
			$query = "SELECT * FROM useraccounts WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db,$query);   
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username;
				$_SESSION['access'] = $row[3];
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			else
			{
				array_push($errors,"wrong username/password combination");
			}
		}
	}


//PRODUCT ADD btn clicked!
	if(isset($_POST['pupdate']))
	{
		$BRAND = mysqli_real_escape_string($db, $_POST['brand']);
		$TYPE = mysqli_real_escape_string($db, $_POST['type']);
		$SHADE = mysqli_real_escape_string($db, $_POST['shade']);
		$SIZE = mysqli_real_escape_string($db, $_POST['size']);
		$PRICE = mysqli_real_escape_string($db, $_POST['price']);

		if(empty($BRAND))
		{
			array_push($errors, "BRAND is required");
		}
		if(empty($TYPE))
		{
			array_push($errors, "TYPE is required");
		}
		if(empty($SHADE))
		{
			array_push($errors, "SHADE is required");
		}

		if(empty($SIZE))
		{
			array_push($errors, "SIZE is required");
		}

		if(empty($PRICE))
		{
			array_push($errors, "PRICE is required");
		}

		if(count($errors) == 0)
		{
			$sql = "INSERT INTO product (BRAND,TYPE,SHADE,SIZE,PRICE) values ('$BRAND','$TYPE','$SHADE','$SIZE','$PRICE');";
			mysqli_query($db,$sql);

			header('location: product.php');
		}
	}	

//ADD CUSTOMER
	if(isset($_POST['add_cus']))
	{
		$SName = mysqli_real_escape_string($db, $_POST['SName']);
		$CName = mysqli_real_escape_string($db, $_POST['CName']);
		$contact = mysqli_real_escape_string($db, $_POST['contact']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$area = mysqli_real_escape_string($db, $_POST['area']);
		$gc = mysqli_real_escape_string($db, $_POST['gc']);
		
		if(empty($SName))
		{
			array_push($errors, "Shop Name is required");
		}
		if(empty($CName))
		{
			array_push($errors, "Customer Name is required");
		}
		if(empty($contact))
		{
			array_push($errors, "contact is required");
		}

		if(empty($address))
		{
			array_push($errors, "address is required");
		}

		if(empty($area))
		{
			array_push($errors, "area is required");
		}

		if(empty($gc))
		{
			array_push($errors, "Coordinates are required");
		}
		if(count($errors) == 0)
		{
				$sql = "INSERT INTO CUSTOMERS (SNAME,CNAME,CNO,ADDRESS,AREA,GC) VALUES ('$SName','$CName','$contact','$address','$area','$gc')";

			mysqli_query($db,$sql);

			header('location: addcustomer.php');
		}
	}	

/*	if(isset($_POST['user']))
	{
		header('url: user.php');
	}
	if(isset($_POST['salesperson']))
	{
		header('url: salesperson.php');
	}
	if(isset($_GET['customers']))
	{
		header("url: ctable.php");
	}
	if(isset($_POST['register']))
	{
		header('url: register.php');
	}
	if(isset($_POST['salesperson']))
	{
		header("url: addsp.php");
	}
	if(isset($_POST['home']))
	{
		header('url: index.php');
	}
	*/
//UPDATE USER ACCOUNTS
	if(isset($_POST['upd_user']))
	{
		$ID = mysqli_real_escape_string($db, $_POST['ID']);
		$username = mysqli_real_escape_string($db, $_POST['NAME']);
		$access = mysqli_real_escape_string($db, $_POST['access']);
		$password= mysqli_real_escape_string($db, $_POST['password']);
		$cpassword = mysqli_real_escape_string($db, $_POST['password2']);
		$password1 = mysqli_real_escape_string($db, $_POST['password3']);

		if(empty($cpassword))
		{
			array_push($errors, "Current Password is required");
		}
		if(empty($password1))
		{
			array_push($errors, "Password is required");
		}
		$cpassword = md5($password);
		if($cpassword != $password)
		{
			array_push($errors, "Incorrect Password!");
		}

		if(count($errors) == 0)
		{
			$password = md5($password1);
			$sql = "INSERT INTO useraccounts (username,password,access) values ('$username','$password','$access');";
			mysqli_query($db,$sql);
			header('location: user.php');
		}
	}
//ADD SALESPERSON
	if(isset($_POST['reg_sp']))
	{
		$Name = mysqli_real_escape_string($db, $_POST['Name']);
		$contact = mysqli_real_escape_string($db, $_POST['contact']);

		if(empty($Name))
		{
			array_push($errors, "Name is required");
		}
		if(empty($contact))
		{
			array_push($errors, "contact is required");
		}

		if(count($errors) == 0)
		{
			$password = md5($password_1);
			$sql = "INSERT INTO salesperson (sname,contact) values ('$Name','$contact');";
			if(!mysqli_query($db,$sql))
{
 array_push($errors, "Error: ".mysqli_error($db));
}
	else
{
echo 'Inserted';
}

			header('location: salesperson.php');
		}

}

?>