<?php
session_start();

// initializing variables
$username = "";
$email    = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $full_name=mysqli_real_escape_string($db, $_POST['full_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $mobile= mysqli_real_escape_string($db, $_POST['mobile']);
  $diachi= mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($full_name)) { array_push($errors, "Fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM nguoiungho WHERE tenTaiKhoan='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO nguoiungho (tenTaiKhoan,email,matKhau,tenNguoiUngHo,soDT, diaChi) 
  			  VALUES('$username', '$email', '$password','$full_name','$mobile','$diachi' )";
  	$result = mysqli_query($db, $query);

  	$_SESSION['username'] = $username;
    $_SESSION['level'] = 1;
  	$_SESSION['full_name'] =$full_name;
  	header('location: ../../index.php');
  }
}

// LOGIN USER
if(isset($_POST['submit']))
{
  
  //mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) 
    {
     
      $query = "SELECT * FROM nguoiungho WHERE tenTaiKhoan='$username' AND matKhau ='$password'";
		
	
		$sql="SELECT tenNguoiUngHo FROM nguoiungho WHERE tenTaiKhoan='$username' AND matKhau ='$password'";
		$result=mysqli_query($db,$sql);  
		$row=mysqli_fetch_assoc($result);
	 
	 
	 
      $results = mysqli_query($db, $query);
      $res=mysqli_num_rows($results);
      if ($res) 
      {
        $_SESSION['name'] = $username;
        $_SESSION['level'] = 1;
        $_SESSION['full_hoten'] =$row["tenNguoiUngHo"];
        header('location: ../../index.php');
      }
      else 
      {
        $query = "SELECT * FROM canbo WHERE tenTaiKhoan='$username' AND matKhau ='$password'";
		
	
        $sql="SELECT tenCanbo FROM  WHERE tencanboTaiKhoan='$username' AND matKhau ='$password'";
        $result=mysqli_query($db,$sql);  
        $row=mysqli_fetch_assoc($result);
       
       
       
          $results = mysqli_query($db, $query);
          $res=mysqli_num_rows($results);
          if ($res) 
          {
            $_SESSION['name'] = $username;
            $_SESSION['level'] = 2;
            $_SESSION['full_hoten'] =$row["tenCanBo"];
            header('location: ../../index.php');
          }
          else 
          {
            array_push($errors, "Wrong username/password combination");
          }
      }
    }
  }
  
  ?>
  