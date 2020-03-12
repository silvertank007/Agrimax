<?php
	
$con=mysqli_connect("localhost","root","","contact_book");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sel="select * from list where id=$id";
 	$row=mysqli_fetch_assoc(mysqli_query($con,$sel));
 	$hobby=explode(',',$row['hobby']);
}

if(isset($_POST['login']))
{
	header("location:firstpage.php");
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$hobby=$_POST['hobby'];
	$image=time().$_FILES['image']['name'];
	$hobby_str=implode(',',$hobby);
	if(isset($_GET['id']))
	{
		if(empty($_FILES['image']['name']))
		{
			$image=$row['image'];
		}
		else{
			move_uploaded_file($_FILES['image']['tmp_name'], 'uplode/'.$image);
			unlink('uplode/'.$row['image']);
		}
		$sql="update list set name='$name',email='$email',mobile='$mobile',password='$password',city='$city',gender='$gender',hobby='$hobby_str',address='$address',image='$image' where id=$id";
	}
	else
	{
		move_uploaded_file($_FILES['image']['tmp_name'],'uplode/'.$image);

		$sql="insert into list (name,email,mobile,password,city,gender,hobby,address,image) values('$name','$email','$mobile','$password','$city','$gender','$hobby_str','$address','$image')";
	}
	if(mysqli_query($con,$sql))
	{
		echo ("DATA INSERTED........");
	}                                                                                                          
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>INSERT PAGE</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
	<table border="2" align="center">
		
		<a href="userview.php">view data..</a>
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
		<td>password</td>
		<td><input type="password" name="password" value=<?php echo(@$row['password'])?>></td>
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
	<tr>
		<td>gender</td>
		<td><input type="radio" name="gender" value="male"<?php if(@$row['gender']=='male'){echo 'checked';} ?>>male
			<input type="radio" name="gender" value="female"<?php if(@$row['gender']=='female'){echo 'checked';} ?>>female
		</td>
	</tr>
	<tr>
		<td>hobby</td>
		<td><input type="checkbox" name="hobby[]" value="cricket"<?php if(@in_array('cricket',$hobby)){echo 'checked';}?>>cricket
		<input type="checkbox" name="hobby[]" value="footboll"<?php if(@in_array('footboll',$hobby)){echo 'checked';}?>>footboll
	<input type="checkbox" name="hobby[]" value="reading"<?php if(@in_array('reading',$hobby)){echo 'checked';}?>>reading
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
		<td>image</td>
		<td><input type="file" name="image">
			<img width="75" src="uplode/<?php echo @$row['image']; ?>">
		</td>
	</tr>
	<tr>
		<td><input type="submit" name="login" value="login"></td>
		<td align="center" colspan="2"><input type="submit" name="submit" value="submit"></td>
	</tr>
	</table>
	</form>
</body>
</html>