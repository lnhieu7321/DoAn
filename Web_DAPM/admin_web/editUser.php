<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['tenNhanVien']);
$email=mysqli_real_escape_string($db, $_POST['email']);
$SDT=mysqli_real_escape_string($db, $_POST['soDT']);
$Adress=mysqli_real_escape_string($db, $_POST['diaChi']);

mysqli_query($db,"UPDATE nhanvien SET tenNhanVien='$name', email='$email', soDT='$SDT', diaChi='$Adress' WHERE idNhanVien='$id'");

header("Location:users.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM nhanvien WHERE idNhanVien=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['idNhanVien'];
$name = $row['tenNhanVien'];
$email = $row['email'];
$SDT=$row['soDT'];
$Adress = $row['diaChi'];
}
else
{
echo "No results!";
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit User</title>
</head>
<body>



<form action="" method="post" action="editUser.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font >Name<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="tenNhanVien" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Email<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="email" value="<?php echo $email ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>SDT<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="soDT" value="<?php echo $SDT;?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Adress<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="diaChi" value="<?php echo $Adress;?>" />
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
