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
$tenTK = "";
$tenKH = "";
$email  = "";
$sodienthoai = "";
$gioitinh = "";
$diachi ="";
$donvi = "";
$ngaysinh = "";
$trangthai ="";
$matkhau = "12345";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }




  
// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  $tenTK=mysqli_real_escape_string($db, $_POST['tenTK']);
  $tenKH=mysqli_real_escape_string($db, $_POST['tenKH']);
  $email=mysqli_real_escape_string($db, $_POST['email']);
  $sodienthoai=mysqli_real_escape_string($db, $_POST['sodienthoai']);
  $gioitinh =mysqli_real_escape_string($db, $_POST['gioitinh']);
  $diachi =mysqli_real_escape_string($db, $_POST['diachi']);
  $donvi = mysqli_real_escape_string($db, $_POST['donvi']);
  $ngaysinh =mysqli_real_escape_string($db, $_POST['ngaysinh']);
  $trangthai =mysqli_real_escape_string($db, $_POST['trangthai']);

//   echo $ngaysinh;
  
    $query = "INSERT INTO nguoiungho (tenNguoiUngHo,email,soDT,diaChi,donVi, gioiTinh, ngaySinh,tenTaiKhoan, matKhau, trangThai) 
          VALUES('$tenKH','$email','$sodienthoai','$diachi','$donvi','$gioitinh','$ngaysinh','$tenTK','$matkhau','$trangthai')";

    $result = mysqli_query($db,$query);
  
    if($result)
      {
      echo "<script>alert('Successfully stored');</script>";
        
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
    
    header('location: Client.php');
  
 }
?>