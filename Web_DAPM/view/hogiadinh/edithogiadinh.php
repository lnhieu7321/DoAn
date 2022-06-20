<!DOCTYPE html>
<html lang="en">

<?php
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

<?php
if (isset($_GET['id'])  && $_GET['id'] > 0)
{

$id = $_GET['id'];
$sql = "SELECT * FROM hogiadinh WHERE idHogiadinh=$id";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_array($result);

}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cứu trợ lũ lụt</title>
    <link rel="stylesheet" href="../css/capnhap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <link href="../nguoidung/asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="../nguoidung/css/font-awesome.min.css" rel="stylesheet">


    <!-- Animate CSS -->
    <link href="../nguoidung/css/animate.css" rel="stylesheet">

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="../nguoidung/css/owl.carousel.css">
    <link rel="stylesheet" href="../nguoidung/css/owl.theme.css">
    <link rel="stylesheet" href="../nguoidung/css/owl.transitions.css">

    <!-- Custom CSS -->
    <link href="../nguoidung/css/style.css" rel="stylesheet">
    <link href="../nguoidung/css/responsive.css" rel="stylesheet">

    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/green.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="../nguoidung/css/color/light-green.css" title="light-green">
</head>

<body>
    <nav>
        <!--<div class="header1"> -->
        <div class="logo">
            <img src="../nguoidung/images/dnlogo.png" alt="Logo Image">
        </div>
        <div class="hamburger" style="margin-left: 20px;text-align: center;">
            <h5 style="color: red; font-weight:bold;font-size:15px;">SỨ MỆNH ĐẶC BIỆT<br></h5>
            <h6>ỦNG HỘ LŨ LỤT</h6>

        </div>
        <ul class="nav-links">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Hoạt động</a></li>
            <li><button class="login-button" href="#">Sign In</button></li>
        </ul>
        <div class="find">

            <ul>
                <li></li>
            </ul>
            <input class="search" type="text" placeholder="Search here">
            <a class="tk"><i class="fas fa-search-location"></i></a>
        </div>

    </nav>

    <div class="main" style="background: rgb(219, 245, 245);padding-top:100px;">
        <div class="container" style="background: rgb(219, 245, 245);">
            <div class="container-top">
                <h3> Cập nhập nhân khẩu</h3>
            </div>
            <div class="container-input">
                <form action="updatehogiadinh.php" method="POST">
                    <input type="text" name ="id" value="<?php echo $row['idHoGiaDinh']?>" style="display:none ;">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Họ và tên chủ hộ</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="tenchuho" placeholder="Họ tên chủ hộ" value="<?php echo $row['tenChuHo'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Số điện thoại</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="soDT" placeholder="Số điện thoại" value="<?php echo $row['soDT'] ?>" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Số nhân khẩu</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="sonhankhau" placeholder="Số nhân khẩu" value="<?php echo $row['soNhanKhau'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Xã</label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="idxa">
                            <?php 
                                $conn = new mysqli("localhost","root","","quanlylulut");
                                $sql = "SELECT * FROM xa";
                                $result = $conn->query($sql);
                                        $count=0;
                                if ($result -> num_rows >  0) {
                                    
                                    while ($r = $result->fetch_assoc()) 
                                    {
                                    ?>
                                        <option value="<?php echo $r['idXa']?>" 
                                        <?php
                                        if($row['idXa'] == $r['idXa']){
                                            echo 'selected="selected"';
                                        } 
                                        ?>
                                        >
                                        <?php echo $r['tenXa'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                               
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Thuộc đợi phân bổ</label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="iPB">
                            <?php 
                                
                                $sql = "SELECT * FROM chitietphanbo";
                                $result = $conn->query($sql);
                                        $count=0;
                                if ($result -> num_rows >  0) {
                                    
                                    while ($r = $result->fetch_assoc()) 
                                    {
                                    ?>
                                        <option value="<?php echo $r['iPB'] ?>"
                                        <?php
                                        if($row['iPB'] == $r['iPB']){
                                            echo 'selected="selected"';
                                        } 
                                        ?>
                                        ><?php echo $r['iPB'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                               
                            </select>
                      
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Hoàn cảnh</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="hoancanh" placeholder="Viết gì đó..." style="height:50px"><?php echo $row['hoanCanh'] ?></textarea>
                        </div>
                    </div>
                    <div class="row" >
                    
                        <div style=" width:50%;">
                            <input type="submit" value="Thoát" name="outhogiadinh" style="float: left; background:red">
                        </div>
                        <div style="float: right; width:50%;">
                            <input type="submit" value="lưu" name="updatehogiadinh" >
                        </div>
                    </div>
                </form>

            </div>
          
        </div>
    </div>



    <div class="footer" style="height: auto;">
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
    </div>


    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/app.js"></script>
</body>


</html>