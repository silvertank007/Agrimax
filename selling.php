<?php
$con=mysqli_connect("localhost","root","","agrimax");


	$id=$_GET['id'];
  
  $q="select * from product where f_userid=$id ";
  $r=mysqli_query($con,$q);
  
   
?>


<!DOCTYPE html>
<html>
<head>
	<title>Selling</title>
</head>
<body bgcolor="white">
	<font face="sans-serif">
	<center>
<h1 style="color:#82AE46">Selling</h1>
<table border="2" bgcolor="#82AE46" cellpadding="10" width="50%" height="30%">
	<tr>
		<td><b>item</b></td>
		<td><b>Quantity (kg)</b></td>
		<td><b>Minimum price (₹)</b></td>
		<td><b>Total price</b></td>
	</tr>
	<?php while( $row=mysqli_fetch_array($r)){ ?>
	<tr>
		
		<td><i><?php echo $row[1]; ?></i></td>
		<td><i><?php echo $row[3]; ?></i></td>
		<td><i><?php echo $row[2]; ?></i></td>
		<td><i><?php echo $row[4]; ?></i></td>
	<?php } ?>
	</tr>
</table>
<p></p>
<button onclick="index.html"><a href="index.html">Home</a></button>
</center>
</font>
</body>
</html>