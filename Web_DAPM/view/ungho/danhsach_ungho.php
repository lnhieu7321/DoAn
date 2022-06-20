<?php
   session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cứu trợ lũ lụt</title>
    <link rel="stylesheet" href="../css/style.css">
    
    <link href="..//nguoidung/asset/css/bootstrap.min.css" rel="stylesheet">   
    
    <!-- Font Awesome CSS -->
    <link href="../nguoidung/css/font-awesome.min.css" rel="stylesheet">
    

    <link href="../nguoidung/css/style.css" rel="stylesheet">
   
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Colors CSS -->
  
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    
    
    <!-- Modernizer js -->
    <script src="../nguoidung/js/modernizr.custom.js"></script>

</head>

<body style="width: 100%;">
    <nav>
        <!--<div class="header1"> -->
        <div class="logo">
            <img src="../nguoidung//images/dnlogo.png" alt="Logo Image">
        </div>
        <div class="hamburger" style="text-align: center;width:auto;">
            <h5 style="color: red;font-weight:bold;font-size:16px;">SỨ MỆNH ĐẶC BIỆT<br></h5>
            <h6>ỦNG HỘ LŨ LỤT</h6>
            
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Hoạt động </a></li>
            <?php  
                if (isset($_SESSION['name'])) {
                   ?> <li>
                    <a class="login-button" href="view/nguoidung/nguoidung.php">
                        <?php 
                            echo $_SESSION['full_hoten'];
                        ?>
                    </a>
                   </li> 
                   <?php
                }
                else{
                    ?>
                        <li><a class="login-button" href="view/login/login.php">Sign In</a> </li>
                    <?php
                }
            ?>

            
        </ul>
            <div class="find">
   
                <ul>
                    <li>Đà Nẵng - thứ, ngày, tháng ,năm</li>
                </ul>
                <input class="search" type="text" placeholder="Search here">
                <a class="tk"><i class="fas fa-search-location"></i></a>
            </div>
    </nav> 


    <div class="container" style="width:100%">
   
        <div class="container-all" style="margin-top: 150px;">
            <div>
                <ul>
             <?php
                    $conn = new mysqli("localhost","root","","quanlylulut");
                    $sql = "SELECT tieuDe, d.tenDotCuuTro, noiDung, image, thoiGian, idBaiViet, b.idDotCuuTro
                        FROM baiviet as b, dotcuutro as d
                        where b.idDotCuuTro = d.idDotCuuTro
                        group by b.idDotCuuTro";
                ?>
                <?php 
                    $result = $conn->query($sql);
                    $count=0;
                    if ($result -> num_rows >  0) {
                
                while ($row = $result->fetch_assoc()) 
                {
                    $count=$count+1;
                    ?>
                <li>
                <a href="dangky_ungho.php?id=<?php echo $row['idDotCuuTro'] ?>" style="text-decoration: none;">
                <div style="display: flex;padding:20px;">
                    <img src="../../img/<?php echo $row['image'] ?>" style="width:400px;height:300px;border-radius:5px;" >
                    <div style="display: block;padding:0px 20px">
                        <h3 style="color: blue;font-weight:bold;"><?php echo $row['tieuDe']?></h3>
                        <p style="color: gray;"><?php echo $row['noiDung']?></p>
                    </div>
                
                </div>
                </a>
                </li>
                <?php
                        }
                        }
                        ?>
            
            </div>
          
           
        </div>
    </div>


    <footer class="footer" style="height:auto ;">
        <div class="col1">
            <div>
                <br>
                <img id="logo-img" src="https://sos24h.vn/wwwroot/resources/upload/img/productcategory/8-2020/logo2.png" alt="logo" width="70" height="70"><br>
            </div>
        </div>
        <div class="col2">
            <ul>
                <li><a href="">Đăng kí ủng hộ</a></li>
                <li><a href="">Danh sách ủng hộ</a></li>
            </ul>
        </div>
        <div class="col3">
            <ul>
                <li><a>Đại học sư phạm kĩ thuật Đà Nẵng</a></li>
                <li><a>Địa chỉ: 48 Cao Thắng Hải Châu Đà Nẵng</a></li>
                <li><a>Email: Dinhvuong98@gmail.com</a></li>
                <li><a>SDT: 0763726790</a></li>
            </ul>
        </div>
        <div class="col4">
            <ul>
                <img src="https://sos24h.vn/wwwroot/resources/upload/img/productcategory/8-2020/logo2.png" alt="" width="120" height="120">


            </ul>
        </div>
    </footer>

</body>
<!-- <script src="view/js/slide.js"></script> -->

</html>