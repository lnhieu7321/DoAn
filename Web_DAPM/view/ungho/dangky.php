<?php
// initializing variables
session_start();
$idnguoiungho = "";
$idotcuutro = "";
$ghichu  = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
     $user = $_SESSION['name'];
      $sql2 = "SELECT * from nguoiungho where tenTaiKhoan = '$user'";
      $result2 = mysqli_query($db,$sql2);
      $row2 = mysqli_fetch_array($result2);

// Add item
if (isset($_POST['addungho'])) {
  // receive all input values from the form
  $idnguoiungho=mysqli_real_escape_string($db, $row2['idNguoiUngHo']);
  $idotcuutro=mysqli_real_escape_string($db, $_POST['idotcuutro']);
  $ghichu=mysqli_real_escape_string($db, $_POST['ghichu']);
  $hinhthuc=mysqli_real_escape_string($db, $_POST['hinhthuc']);

    $query = "INSERT INTO dangkyungho (idNguoiUngHo,idDotCuuTro, ghiChu) 
          VALUES('$idnguoiungho','$idotcuutro','$ghichu')";

    $result = mysqli_query($db,$query);
   
  
    if($result)
      {
        $conn = new mysqli("localhost","root","","quanlylulut");

        $sql1 = "SELECT * from hangcuutro";
        $result1 = $conn->query($sql1);
        $a = $result1 -> num_rows ;

        $sql3 = "SELECT * from dangkyungho
        ORDER BY idDangKyUngHo DESC
        LIMIT 1";
        $result3 = mysqli_query($db,$sql3);
        $row3 = mysqli_fetch_array($result3);
        
        $iddangkyungho = $row3['idDangKyUngHo'];


     for($i =1; $i <=$a; $i++){
        $sl = $_POST['soluong'.$i] ;
        $soluong=mysqli_real_escape_string($db,$sl);

        $idh = $_POST['idhang'.$i] ;
        $idhang=mysqli_real_escape_string($db,$idh);

        if($soluong > 0){
            $sql_ctuh = "INSERT INTO chitietdangkyungho (idDangKyUngHo,idHangCuuTro, soLuong, hinhThuc) 
            VALUES('$iddangkyungho','$idhang','$soluong','$hinhthuc')";
            $result_ctuh = mysqli_query($db,$sql_ctuh);
        }
     }
    }
    
  
 }
?>