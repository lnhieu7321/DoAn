<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cứu trợ lũ lụt</title>
    <link rel="stylesheet" href="view/css/style.css">
    
    <link href="view/nguoidung/asset/css/bootstrap.min.css" rel="stylesheet">   
    
    <!-- Font Awesome CSS -->
    <link href="view/nguoidung/css/font-awesome.min.css" rel="stylesheet">
    

    <link href="view/nguoidung/css/style.css" rel="stylesheet">
   
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Colors CSS -->
  
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    
    
    <!-- Modernizer js -->
    <script src="view/nguoidung/js/modernizr.custom.js"></script>

    <style>
        .login-list{
            /* position: absolute; */
            margin: 0 300px 0 0 !important;
            background: #000;
            width: 50px;
            min-height: auto;
            display: none ;

            /* border-style: groove; */
        }

        .button-login:hover .login-list li a{
            display: block !important;
            color: #000;
        }
    </style>
</head>
<body>
   <nav>
        <!--<div class="header1"> -->
        <div class="logo">
            <img src="view/nguoidung//images/dnlogo.png" alt="Logo Image">
        </div>
        <div class="hamburger" style="text-align: center;width:auto;">
            <h5 style="color: red;font-weight:bold;font-size:16px;">SỨ MỆNH ĐẶC BIỆT<br></h5>
            <h6>ỦNG HỘ LŨ LỤT</h6>
            
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="gioithieu.php">Giới thiệu</a></li>
            <li><a href="tintuc.php">Tin tức</a></li>
            <li><a href="#">Hoạt động </a></li>
            <?php  
                if (isset($_SESSION['name'])) {
                   ?> <li class="button-login" style="position: relative;">
                    <a class="login-button" href="view/nguoidung/nguoidung.php">
                        <?php 
                            echo $_SESSION['full_hoten'];
                        ?>
                    </a>
                        <ul class="login-list">
                            <li><a href="view/login/login.php">Đăng xuất</a></li>
                        </ul>
                   </li> 
                   <?php
                }
                else{
                    ?>
                        <li class="button-login"><a class="login-button" href="view/login/login.php">Sign In</a> </li>
                    <?php
                }
            ?>

            
        </ul>
            <div class="find">
   
                <ul>
                    <li>Đà Nẵng - <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $date = getdate(); echo $date['weekday'].", "; echo date('d/m/Y - H:i'); ?></li>
                </ul>
                <input class="search" type="text" placeholder="Search here">
                <a class="tk"><i class="fas fa-search-location"></i></a>
            </div>
    </nav> 
</body>
</html>