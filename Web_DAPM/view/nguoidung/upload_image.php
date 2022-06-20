<?php 
  session_start(); 
?>
<?php

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

   
// Add item

  // receive all input values from the form


  $name = $_POST['name'];

  $target_dir = "../../img/profile/";  // thư mục chứa file upload

  $image = "";
  $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên

  $status_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  if ($status_upload) { // nếu upload file không có lỗi 
      $image =   basename($_FILES["image"]["name"]);
  }

  


?>