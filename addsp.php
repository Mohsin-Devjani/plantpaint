<?php include('server.php');
if (!isset($_SESSION['username'])) 
  {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if($_SESSION['access']!= "admin")
  {
    echo 'You are not authorized!';
    header('location: salesperson.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Salesperson</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Register Salesperson</h2>
  </div>
  
  <form method="post" action="addsp.php">
  <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="Name" value="<?php echo $Name; ?>">
    </div>
    <div class="input-group">
      <label>Contact</label>
      <input type="text" name="contact" value="<?php echo $contact; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_sp">Register</button>
    </div>
    <p>
      <a class="btn2" href="salesperson.php">Back</a>
    </p>
  </form>
</body>
</html>