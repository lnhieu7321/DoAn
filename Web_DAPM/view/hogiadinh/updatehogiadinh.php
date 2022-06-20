<?php
// initializing variables
$tenchuho = "";
$iPB = "";
$sonhankhau  = "";
$idxa = "";
$hoancanh = "";
$sodienthoai ="";
$id = "";




// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['outhogiadinh'])) {
    header('location: hogiadinh.php');
}


if (isset($_POST['updatehogiadinh'])) {
  // receive all input values from the form
  $id=mysqli_real_escape_string($db, $_POST['id']);
  $tenchuho=mysqli_real_escape_string($db, $_POST['tenchuho']);
  $iPB=mysqli_real_escape_string($db, $_POST['iPB']);
  $sonhankhau=mysqli_real_escape_string($db, $_POST['sonhankhau']);
  $idxa=mysqli_real_escape_string($db, $_POST['idxa']);
  $hoancanh=mysqli_real_escape_string($db, $_POST['hoancanh']);
  $sodienthoai=mysqli_real_escape_string($db, $_POST['soDT']);




  
    $query = "UPDATE hogiadinh SET tenChuHo= '$tenchuho',iPB='$iPB',soNhanKhau='$sonhankhau',idxa='$idxa',
    soDT='$sodienthoai',hoanCanh='$hoancanh' WHERE idHoGiaDinh = $id";
    
 
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