<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$tieuDe=mysqli_real_escape_string($db, $_POST['tieuDe']);
$idDotCuuTro=mysqli_real_escape_string($db, $_POST['tenDotCuuTro']);
$image=mysqli_real_escape_string($db, $_POST['image']);
$noiDung=mysqli_real_escape_string($db, $_POST['noiDung']);

mysqli_query($db,"UPDATE baiviet SET tieuDe='$tieuDe', idDotCuuTro='$idDotCuuTro', image='$image', noiDung='$noiDung' WHERE idBaiViet='$id'");

header("Location:ListBlog.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM baiviet WHERE idBaiViet=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['idBaiViet'];
$tieuDe = $row['tieuDe'];
$idDotCuuTro = $row['idDotCuuTro'];
$image=$row['image'];
$noiDung = $row['noiDung'];
}
else
{
echo "No results!";
}
}
?>
<?php
    $conn = new mysqli("localhost","root","","quanlylulut");
    $sql = "SELECT * FROM dotCuuTro";
    $result1 = $conn->query($sql);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Blog</title>
</head>
<body>



<form action="" method="POST" action="editBlog.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font >Tiêu đề<em>*</em></font></b></td>

<td><label>
<input type="text" required="required" name="tieuDe" value="<?php echo $tieuDe; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font >Đợt cứu trợ<em>*</em></font></b></td>
<td><label>
	<select name="tenDotCuuTro">
	    <?php
	    while($r = mysqli_fetch_array($result1))
	    {
	        ?>
	        <option value="<?php echo $r['idDotCuuTro'] ?>"><?php echo $r['tenDotCuuTro'] ?></option>
	        <?php
	    }
	    ?>
	</select>
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Hình ảnh<em>*</em></font></b></td>
<td><label>
<input type="file" required="required" name="image" class="form-control" accept="img/*">
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Nội dung<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="noiDung" value="<?php echo $noiDung;?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
