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
$tieuDe = "";
$idDotCuuTro    = "";
$noiDung    = "";
$tenDotCuuTro = "";
$image ="";


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
  $idDotCuuTro=mysqli_real_escape_string($db, $_POST['tenDotCuuTro']);
  $tieuDe=mysqli_real_escape_string($db, $_POST['tieuDe']);
  $noiDung=mysqli_real_escape_string($db, $_POST['noiDung']);
  $image=mysqli_real_escape_string($db, $_POST['image']);
  
    $query = "INSERT INTO baiviet (tieuDe,idDotCuuTro,noiDung,image) 
          VALUES('$tieuDe','$idDotCuuTro','$noiDung','$image')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
        
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
    
    header('location: ListBlog.php');
  
}
?>