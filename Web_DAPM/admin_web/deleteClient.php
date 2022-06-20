
<?php
$db = mysqli_connect('localhost', 'root', '', 'quanlylulut');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<?php

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql =  $sql = "SELECT * FROM nguoiungho Where idNguoiUngHo = $id ";
    $result = $db->query($sql);
    $status = -1;
    if ($result -> num_rows >  0) {
       
      while ($row = $result->fetch_assoc()) 
      {
        $status = $row["status"];
      }
    }
    if ($status == 1){
        $status =0;
    }
    else{
        $status = 1;
    }
    $sql = "UPDATE nguoiungho SET status = $status WHERE idNguoiUngHo = $id";
   
$result = mysqli_query($db,$sql);




// if($result==true)
// 	echo "sucess";

}

?>