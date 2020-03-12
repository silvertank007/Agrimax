<?php
$con=mysqli_connect("localhost","root","","inter");

if(isset($_POST['1btn']))
{
	$qid=$_POST['txtid'];
	$qpsd=$_POST['txtpsd'];

	$q="select * from login where txtid='$qid' and txtpsd ='$qpsd'";
	$r=mysqli_query($com,$q);
	if(mysqli_num_rows($r)>0)
	{
		header("Location:AA.php");
	}
	else
	{
		echo"no";
	}
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="text" placeholder="ID..." name="txtid"><br><br>
	</form>
</body>
</html>