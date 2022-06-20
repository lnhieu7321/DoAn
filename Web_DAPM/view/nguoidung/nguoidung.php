<?php 
session_start(); 
     $db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
     if (mysqli_connect_errno())
         {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }

     $user = $_SESSION['name'];
     $level = $_SESSION['level'];
     if($level ==1){
        $sql = "SELECT * FROM nguoiungho WHERE tenTaiKhoan = '$user'";
     }else{
        $sql = "SELECT * FROM canbo WHERE tenTaiKhoan = '$user'";
     }
    
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fame - One Page Multipurpose Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
   
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">


    <!-- Animate CSS -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="css/color/green.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="css/color/light-green.css" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>


    <!-- Modernizer js -->
    <script src="js/modernizr.custom.js"></script>

</head>

<body class="index">

    <!-- Navigation -->
    <nav>
        <!--<div class="header1"> -->
        <div class="logo">
            <img src="images/dnlogo.png" alt="Logo Image">
        </div>
        <div class="hamburger" style="text-align: center;width:auto;">
            <h5  style="color: red;font-size:18px;font-weight:bold;">SỨ MỆNH ĐẶC BIỆT<br></h5>
            <h6>ỦNG HỘ LŨ LỤT</h6>

        </div>
        <ul class="nav-links">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Hoạt động</a></li>
            <?php  
                if (isset($_SESSION['username'])) {
                   ?> <li>
                    <a class="login-button" href="view/nguoidung/nguoidung.php" style="padding: 5px 15px;border-radius:2px;" >
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
    <form action="updatenguoidung.php" method="post" role="form" enctype="multipart/form-data">
    <div class="contai">
        <div class="than">
            <div class="ava" >
                <img 
                <?php 
                if($row['image'] == ''){
                    echo ' src="images/dnlogo.png"';
                }
                else{
                    echo 'src="../../img/profile/'.$row['image'].'"';
                }
                
                ?>
                alt="avata" id="image" style="height: 180px;
                                                                        border-radius: 50%;
                                                                        object-fit: cover;
                                                                        width: 180px;">
                <input type='file' class='input-file' id="input_file" name="image" accept="image/jpg,image/jpeg,image/png" onchange="chooseFile(this)" >
                <button type="button" class='input-btn' id='input_btn' accept="image/jpg,image/jpeg,image/png">Choose</button>
            </div>
            <div class="inf">
                <ul>
                    <li>Họ và tên </li>
                    <li>Ngày sinh </li>
                    <li>Giới tính </li>
                    <li>Số điện thoại </li>
                    <li>Email </li>
                    <li>Địa chỉ </li>
                </ul>
            </div>
           
            <div class="nhap">
                <ul>
                    <input class="dien" type="text" name="id" value="<?php if($level ==1){
                        echo $row['idNguoiUngHo'];
                    }else{
                        echo $row['idCanBo'];
                    }?>" style="display: none;">

                    <li><input class="dien" type="text" name="name" value="<?php if($level ==1){
                        echo $row['tenNguoiUngHo'];
                    }else{
                        echo $row['tenCanBo'];
                    }
                    ?>"><br></li>
                    <li><input class="dien" type="date" name="date" value="<?php  echo $row['ngaySinh']?>"><br></li>
                    <li class="set">
                        <input class="gt" type="radio" name="checkbox" value="1" <?php if($row['gioiTinh'] == 1){
                            echo 'checked="checked"';
                        } ?>  />Nam
                        <input class="gt" type="radio" name="checkbox" value="0"  <?php if($row['gioiTinh'] == 0){
                            echo 'checked="checked"';
                        } ?>  />Nữ</li>
                    <li><input class="dien" type="text" name="phone" value="<?php  echo $row['soDT']?>"><br></li>
                    <li><input class="dien" type="email" name="email" value="<?php  echo $row['email']?>"><br></li>
                    <li><input class="dien" type="text" name="diachi" value="<?php  echo $row['diaChi']?>"><br></li>
                </ul>
            </div>
            <div class="luu">
                <input class="nut" type="submit" value="Lưu thay đổi" name="update_nguoidung">
            </div>   
        </div>
        
    </div>
    </form>

    <div class="footer">
        <div class="footer-left">
            <div class="col-md-4 col-xs-12">
                <span class="copyright"> Cứu trợ nhịp cầu nối liền những trái tim</span>
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-link">
                <div class="sau">
                    <ul>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                        <li>Hotline:
                        </li>
                        <li><a href="#"> 0363907251</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>


    <!-- jQuery Version 2.1.1 -->
    <script src="js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/count-to.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/styleswitcher.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="js/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

</body>
<?php
    if(!empty($_GET['msg'])){
            $a ='';
            $msg = unserialize(urldecode($_GET['msg']));
            foreach($msg as $key => $value){
                $a.= $value;
            }
           ?>
           <script >
                alert("<?php echo $a ?>");
           </script>
           <?php       
        }
    ?>

<script type="text/javascript">
    function chooseFile(fileInput){
        if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image').attr('src', e.target.result);

            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

</script>

</html>