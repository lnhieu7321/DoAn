<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['tenDotCuuTro']);


mysqli_query($db,"UPDATE dotcuutro SET tenDotCuuTro='$name' WHERE idDotCuuTro='$id'");

header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM dotcuutro WHERE idDotCuuTro=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['idDotCuuTro'];
$name = $row['tenDotCuuTro'];
// $price = $row['price'];
// $quant=$row['quantity'];
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
<title>Edit Item</title>
</head>
<body>



<form action="" method="post" action="edit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font >Item Succor<em>*</em></font></b></td>
<td><label>
<input type="text" required="required" name="tenDotCuuTro" value="<?php echo $name; ?>" />
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
