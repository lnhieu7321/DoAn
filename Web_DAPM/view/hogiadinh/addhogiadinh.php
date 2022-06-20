<?php
// initializing variables
$tenchuho = "";
$iPB = "";
$sonhankhau  = "";
$idxa = "";
$hoancanh = "";
$sodienthoai ="";




// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['addhogiadinh'])) {
  // receive all input values from the form
  $tenchuho=mysqli_real_escape_string($db, $_POST['tenchuho']);
  $iPB=mysqli_real_escape_string($db, $_POST['iPB']);
  $sonhankhau=mysqli_real_escape_string($db, $_POST['sonhankhau']);
  $idxa=mysqli_real_escape_string($db, $_POST['idxa']);
  $hoancanh=mysqli_real_escape_string($db, $_POST['hoancanh']);
  $sodienthoai=mysqli_real_escape_string($db, $_POST['soDT']);


 

  
    $query = "INSERT INTO hogiadinh (tenChuHo,soDT,iPB,soNhanKhau,idXa,hoancanh) 
          VALUES('$tenchuho','$sodienthoai','$iPB','$sonhankhau','$idxa','$hoancanh')";

    $result = mysqli_query($db,$query);
  
    if($result)
      {
      echo "<script>alert('Successfully stored');</script>";
        
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
    
    header('location: hogiadinh.php');
  
 }
?>