<?php include('server.php');
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
?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Input</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Add Customer</h2>
  </div>
  
  <form method="post" action="addcustomer.php">
  <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Shop Name</label>
      <input type="text" name="SName" value="<?php echo $SName; ?>">
    </div>
    <div class="input-group">
      <label>Customer Name</label>
      <input type="text" name="CName" value="<?php echo $CName; ?>">
    </div>
    <div class="input-group">
      <label>Contact</label>
      <input type="text" name="contact" value="<?php echo $contact; ?>">
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="input-group">
      <label>Area</label>
      <input type="text" name="area" value="<?php echo $area; ?>">
    </div>
    <div class="input-group">
      <label>Coordinates</label>
      <input type="text" name="gc" value="<?php echo $gc; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="add_cus">Add</button>
    </div>
    <p>
      <a class="btn2" href="ctable.php">Back</a>
    </p>
  </form>
</body>
</html>