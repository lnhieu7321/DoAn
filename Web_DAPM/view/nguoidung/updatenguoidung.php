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
$id ="";
$tenKH = "";
$email  = "";
$sodienthoai = "";
$gioitinh = "";
$diachi ="";
$ngaysinh = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

   
// Add item
if (isset($_POST['update_nguoidung'])) {
  // receive all input values from the form
  $id = $_POST['id'];
  $tenKH=mysqli_real_escape_string($db, $_POST['name']);
  $email=mysqli_real_escape_string($db, $_POST['email']);
  $sodienthoai=mysqli_real_escape_string($db, $_POST['phone']);
  $gioitinh =mysqli_real_escape_string($db, $_POST['checkbox']);
  $diachi =mysqli_real_escape_string($db, $_POST['diachi']);
  $ngaysinh =mysqli_real_escape_string($db, $_POST['date']);


  $target_dir = "../../img/profile/";  // thư mục chứa file upload

  $image = "";
  $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên

  $status_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  if ($status_upload) { // nếu upload file không có lỗi 
      $image =   basename($_FILES["image"]["name"]);
  }


  $mesenger = array();
 

  
    $query = "UPDATE nguoiungho SET tenNguoiUngHo= '$tenKH',email='$email',soDT='$sodienthoai',diaChi='$diachi',
    gioiTinh='$gioitinh',ngaySinh='$ngaysinh', image = '$image' WHERE idNguoiUngHo = $id";
    $result = mysqli_query($db,$query);
    if($result){
        echo "<script>alert('Successfully stored');</script>";
        $mesenger['mgs'] = "Cập nhập thành công";

    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
        $mesenger['mgs'] = "cập nhập thất bại";
    }
   
    header("location: nguoidung.php?msg=".urldecode(serialize($mesenger)));
}
?>