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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <!-- modernizr css -->
      <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
   </head>
   <body>
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
                        <span>Item Records</span></a>
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
                              <a href="#" aria-expanded="true">
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
                        <li><span>List Supporter</span></li>
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
                           <div class="col-sm-7">
                              <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item active">Manager Supporter</li>
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
                                 <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-sm-12 col-md-6">
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6" style="text-align: right;">
                                        <a href="addClient.php" class="btn btn-primary" >Thêm khách hàng</a>
                                    </div>
                                 </div>
                                 <input type="search" class="form-control" id="search" placeholder="Search" name="seach">
                                 <div id="searchresult"></div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       </br>
                                       <table  id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                          <thead>
                                             <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                    
                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Giới tính</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Số điện thoại</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Địa chỉ</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày sinh</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tình trạng</th>

                                                <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                                                
                                               
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php 
                                                $conn = new mysqli("localhost","root","","quanlylulut");
                                                $sql = "SELECT * FROM nguoiungho ";
                                                $result = $conn->query($sql);
                                                     $count=0;
                                                if ($result -> num_rows >  0) {
                                                   
                                                  while ($row = $result->fetch_assoc()) 
                                                  {
                                                       $count=$count+1;
                                                    ?>
                                             <tr>
                                                <th><?php echo $count ?></th>
                                                <th><?php echo $row["tenNguoiUngHo"] ?></th>
                                                <th><?php if ($row["gioiTinh"] == 1){
                                                   echo "Nam"; }
                                                   else{
                                                   echo "Nữ";
                                                   } ?></th>
                                                <th><?php echo $row["email"] ?></th>
                                                <th><?php echo $row["soDT"] ?></th>
                                                <th><?php echo $row["diaChi"] ?></th>
                                                <th><?php echo $row["ngaySinh"] ?></th>
                                                <th>
                                                    <select class="btn btn-warning edit_status" id="<?php echo $row["idNguoiUngHo"] ?>" style="background: green;">
                                                        <option value="1" class="btn btn-warning"
                                                            <?php 
                                                                if($row["status"] ==1){
                                                                echo 'selected="selected"';
                                                                }  
                                                                ?>
                                                            >
                                                                Mở
                                                        </option>
                                                        <option value="0"  class="btn btn-warning"
                                                            <?php 
                                                                if($row["status"] ==0){
                                                                echo 'selected="selected"';
                                                                }
                                                                ?>
                                                            >
                                                                Khóa
                                                        </option>
                                                    </select>
                                                </th>
                                                <th>
                                                   <a href="editClient.php?id=<?php echo $row["idNguoiUngHo"] ?>" class="btn btn-warning"> Edit</a> 
                                                   
                                                </th>
                                             </tr>
                                             <?php
                                                }
                                                }
                                                
                                                ?>
                                          </tbody>
                                       </table>
                                       
                                       
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                           </div>
                        </div>
                  </section>
                  </div>
               </div>
         </div>
      </div>
   </body>
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
   </body>
   <script type="text/javascript">
      $('.edit_status').change(function(){
          var id = $(this).attr('id');
          $.ajax({
              url:"deleteClient.php",
                  method:"GET",
                  data:{id:id},
                  success:function(data){
                      alert("Đã thay đổi tài khoản thành công");
                  }
          });
      })
   </script>

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
                        $("#searchresultClient").html(data);
                        $("#searchresultClient").css("display","block");
                    }
                });
            }else{
                $("#searchresultClient").css("display","none");
            }
        });
    } );
</script>
</html>