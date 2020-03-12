<?php
$con =  mysqli_connect('localhost','root','','agrimax');

if(isset($_POST['submit']))
{
	$id=$_GET['id'];
	$itm=$_POST['item'];
	$pr=$_POST['price'];
	$quaty=$_POST['quantity'];
	$q="insert into product values($id,'$itm',$pr,$quaty,$pr*$quaty)";
	$res=mysqli_query($con,$q);
		if($res)
		{
			 header("Location:selling.php?id=$id");
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>farmer</title>
</head>
<body bgcolor="white">
	<font face="sans-serif">
	<center>
<h1 style="color:#82AE46"><b>Farmer page</b></h1>
<form method="post">
<table border="1" bgcolor="#82AE46" cellpadding="10" width="30%" height="30%">
	<tr>
		<td><b>Item</b></td>
		<td><input type="text" name="item"></td>
	</tr>
	<tr>
		<td><b>Minimum Price</b></td>
		<td><input type="number" name="price" bgcolor="#82AE46"></td>
	</tr>
	<tr>
	<td><b>Quantity (kg)</b></td>
		<td><input type="number" name="quantity"></td>
	</tr>

</table>
<p></p>
<tr><td><b><input type="submit" name="submit" ></b></td></tr>
<!-- <button onclick="index.html"><a href="index.html">Submit</a></button>-->
</form>
</center>
</font>
</body>
</html>