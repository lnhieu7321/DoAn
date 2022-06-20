
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

$result = mysqli_query($db,"DELETE FROM dotCuuTro WHERE idDotCuuTro=".$_GET['id']);
if($result==true)
	echo "sucess";
header("Location:table.php");
}

?>