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
    $conn = new mysqli("localhost","root","","quanlylulut");
    $sql = "SELECT * FROM baiviet";
    $query = mysqli_query($conn, $sql);

    $result = array();
    while($row = mysqli_fetch_assoc($query)){
        $result[] = $row;
    }
    $count1 = count($result);
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DAPM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/SanJ.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i>
                                <span>dashboard</span></a>
                                
                            </li>
                            
                            <li >
                                <a href="users.php" aria-expanded="true"><i class="ti-user"></i>
                                <span>Manage Users</span></a>
                            </li>
                            <li >
                                <a href="client.php" aria-expanded="true"><i class="ti-user"></i>
                                <span>Manage Supporter</span></a>
                             </li>
                            <li >
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                <span>Item Succors</span></a>
                               
                            </li>
                            <li >
                                <a href="#" aria-expanded="true"><i class="fa fa-rss"></i>
                                    <span>Blog</span>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="blogs_view.php" aria-expanded="true">
                                            <span>Add Blog</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ListBlog.php" aria-expanded="true">
                                            <span>List Blog</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->


        
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
<!--                         <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div> -->
                    </div>
                    
                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">
                        
                    </div>
                </div>
            </div>
            
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>List Blog</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                
                               <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div>
<body>
<form method="POST" class="form-center">
    <div class="content-wrapper" style="min-height: 353px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">List Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>

        <div class="col-12">

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <input type="search" class="form-control" id="search" placeholder="Search" name="seach">
                        <div id="searchresult"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                </br>
                                <table  id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                    
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tiêu đề</th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Đợt cứu trợ</th>

                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Nội dung</th>

                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hình ảnh</th>


                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đăng</th>

                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($_GET['pages'])){
                                                $pages = $_GET['pages'];
                                            }else{
                                                $pages = 1;
                                            }
                                            $row = 3;
                                            $from = ($pages - 1) * $row;


                                            $conn = new mysqli("localhost","root","","quanlylulut");
                                            $sql = "SELECT tieuDe, d.tenDotCuuTro, noiDung, image, thoiGian, idBaiViet
                                                FROM baiviet as b, dotcuutro as d
                                                where b.idDotCuuTro = d.idDotCuuTro
                                                LIMIT $from,$row";



                                            $result = $conn->query($sql);
                                                $count=0;
                                            if ($result -> num_rows >  0) {
                                              
                                             while ($row = $result->fetch_assoc()) 
                                             {
                                                  $count=$count+1;
                                               ?>
                                               <tr>
                                                <th><?php echo $count ?></th>
                                                  <th><?php echo $row["tieuDe"] ?></th>
                                                  <th><?php echo $row["tenDotCuuTro"] ?></th>
                                                  <th><?php echo $row["noiDung"]  ?></th>
                                                  <th><?php echo "<img src='img/".$row['image']."' />"  ?></th>
                                                  <th><?php echo $row["thoiGian"] ?></th>

                                                  
                                                   <th> <a href="up"Edit</a><a href="editBlog.php?id=<?php echo $row["idBaiViet"] ?>">Edit</a> <a href="up"Edit</a><a href="deleteBlog.php?id=<?php echo $row["idBaiViet"] ?>">Delete</a></th>
                                                
                                                  
                                                </tr>
                                        <?php
                                             
                                             }
                                           }
                                            $sum_count = $count1;
                                            $pages = ceil($sum_count / 3);
                                        ?>
                                    </tbody>

                                </table>
                                <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <?php 
                                        for ($i=1; $i <= $pages; $i++) { 
                                            ?>
                                            <li class="page-item"><a class="page-link" href="ListBlog.php?pages=<?php echo $i ?>"><?php echo $i ?></a></li>
                                            <?php
                                        }
                                    ?>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                  </ul>
                                </nav>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
    </div>

    <!-- page container area end -->
    <!-- offset area start -->
   
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
        $('#search').keyup(function(){
            var input = $(this).val();
            // alert(input);
            if(input != ""){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");
                    }
                });
            }else{
                $("#searchresult").css("display","none");
            }
        });
    } );
        </script>
</form>
</body>


</html>