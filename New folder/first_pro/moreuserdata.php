<?php
session_start();
$con=mysqli_connect("localhost","root","","contact_book");



if(isset($_SESSION['user_id']))
{
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$select="select * from contact_list where id=$id";
		$row=mysqli_fetch_assoc(mysqli_query($con,$select));
	}


	$user_id=$_SESSION['user_id'];
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$city=$_POST['city'];
		$address=$_POST['address'];
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$qry="update contact_list set name='$name',email='$email',mobile='$mobile',city='$city',address='$address' where id=$id";
		}
		else
		{
			
			$qry="insert into contact_list (user_id,name,email,mobile,city,address) values('$user_id','$name','$email','$mobile','$city','$address')";
		}

		if(mysqli_query($con,$qry))
		{
			echo "DATA INSERTED";
		}	
	}
}
else
{
	header("location:firstpage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD MORE DATA</title>
</head>
<body>
<form method="POST">
	<a href="userdatapage.php">view your data </a>
	<table border="3" align="center">
		<tr>
		<td>name</td>
	<td><input type="text" name="name" value=<?php echo @$row['name']?>></td>
	</tr>
	<tr>
		<td>email</td>
		<td><input type="text" name="email" value=<?php echo(@$row['email'])?>></td>
	</tr>
		<tr>
		<td>mobile</td>
		<td><input type="text" name="mobile" value=<?php echo(@$row['mobile'])?>></td>
	</tr>
		<tr>
		<td>city</td>
		<td>
			<select  name="city">
			<option>--select city--</option>
		<option>surat</option>
	<option value="bhavnagar"<?php if(@$row['city']=='bhavnagar'){echo 'selected';} ?> >bhavnagar</option>
	<option value="vapi"<?php if(@$row['city']=='vapi'){echo 'selected';}?>>vapi</option>
	<option value="navsari"<?php if(@$row['city']=='navsari'){echo 'selected';}?>>navsari</option>
	<option value="amreli"<?php if(@$row['city']=='amreli'){echo 'selected';}?>>amreli</option></select>
	</td>
	</tr>
	<tr>
		<td>address</td>
		<td>
		<textarea name="address"><?php echo @$row['address'];?>
		</textarea>
	</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" name="submit" value="submit"></td>
	</tr>
	</table>
</form>
</body>
</html>