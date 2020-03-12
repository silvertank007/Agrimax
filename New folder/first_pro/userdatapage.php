<?php
$con=mysqli_connect("localhost","root","","contact_book");
session_start();
	if(isset($_SESSION['user_id']))
	{
		$id=$_SESSION['user_id'];
		$sql="select * from contact_list where user_id=$id";
		$r=mysqli_query($con,$sql);
		echo "you are in userdata page";	
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$sel="select * from contact_list where id=$id";
		 	$r=mysqli_fetch_assoc(mysqli_query($con,$sel));
		}
	
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$del="delete from contact_list where id=$id";
			mysqli_query($con,$del);
			header("location:userdatapage.php");
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
	<title>USER DATA PAGE</title>
</head>
<body>
<form method="POST">
	<a href="moreuserdata.php">add new data..</a>
	<table border="2" align="center">
	<tr> 
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>mobile</td>
		<td>city</td>
		<td>address</td>
	</tr>

	<?php
	while ($nr=mysqli_fetch_assoc($r)) { ?>
		<tr>
		<td><?php echo $nr['id']; ?></td>
		<td><?php echo $nr['name']; ?></td>
		<td><?php echo $nr['email']; ?></td>
		<td><?php echo $nr['mobile']; ?></td>
		<td><?php echo $nr['city']; ?></td>
		<td><?php echo $nr['address']; ?></td>
		<td><a href="userdatapage.php?id=<?php echo($nr['id']);?>">Delete</td>
			<td><a href="moreuserdata.php?id=<?php echo($nr['id']);?>">Update</td>
		</tr>
	<?php
	 }
	 ?>
	</table>
	<a href="logout.php">Log out..</a>
</form>
</body>
</html>