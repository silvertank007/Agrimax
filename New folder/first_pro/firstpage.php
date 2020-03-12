<?php
	session_start();
$con=mysqli_connect("localhost","root","","contact_book");

	if(isset($_POST['register']))
	{
		header("location:insertpage.php");		
	}
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="select * from list where email='$email' and password='$password'";
		$row=mysqli_query($con,$sql);
		$num=mysqli_num_rows($row);
		$r=mysqli_fetch_assoc($row);
		if($num == 1)
		{
			$_SESSION['user_id']=$r['id'];
		header("location:userdatapage.php");		
		}else{
		header("location:firstpage.php");					
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FIRST PAGE</title>
</head>
<body>
<form method="POST">
	<table border="2">
		<tr>
			<td>email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="login" value="login"></td>
		</tr>
		<tr>
			<td align="left" colspan="2"><input type="submit" name="register" value="register"></td>
			
		</tr>
	</table>
</form>
</body>
</html>