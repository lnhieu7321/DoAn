<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php


// initializing variables
$name = "";
$email    = "";
$SDT = "";
$Adress = "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
  $name=mysqli_real_escape_string($db, $_POST['tenNhanVien']);
  $email=mysqli_real_escape_string($db, $_POST['email']);
  $SDT=mysqli_real_escape_string($db, $_POST['soDT']);
  $Adress=mysqli_real_escape_string($db, $_POST['diaChi']);
  
    $query = "INSERT INTO nhanvien (tenNhanVien,email,soDT,diaChi) 
          VALUES('$name','$email','$SDT','$Adress')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
        
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
    
    header('location: users.php');
  
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div>
<a href="users.php">Home</a>
</div>
<form method="POST" class="form-inline" action="add_user.php">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="tenNhanVien"> 
  </div>
  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
    <div class="form-group">
    <label for="name">SDT</label>
    <input type="text" class="form-control" name="soDT">
  </div>
    <div class="form-group">
    <label for="name">Adress</label>
    <input type="text" class="form-control" name="diaChi">
  </div>

  <button type="submit" class="btn btn-default" name="add">Add user</button>
</form> 
</body>
</html>