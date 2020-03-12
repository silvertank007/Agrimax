<?php
session_start();
$con=mysqli_connect("localhost","root","","contact_book");
	
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql_id="select * from list where id=$id";

	$res_id=mysqli_query($con,$sql_id);

	$a=mysqli_fetch_assoc($res_id);

	unlink('uplode/'.$a['image']);

	$del="delete from list where id=$id";
	mysqli_query($con,$del);
	header("location:userview.php");
}


$raw="select * from list";
$res=mysqli_query($con,$raw);
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
</head>
<body>
	<form>
		<a href="insertpage.php">add new</a>
		<table border="2">
		<tr>
			<td>id</td>
			<td>name</td>
			<td>email</td>
			<td>password</td>
			<td>city</td>
			<td>contact</td>
			<td>address</td>
			<td>hobby</td>
			<td>image</td>
		</tr>

<?php
	while ($ro=mysqli_fetch_assoc($res)) { ?>
		<tr>
		<td><?php echo $ro['id']; ?></td>
		<td><?php echo $ro['name']; ?></td>
		<td><?php echo $ro['email']; ?></td>
		<td><?php echo $ro['password']; ?></td>
		<td><?php echo $ro['city']; ?></td>
		<td><?php echo $ro['mobile']; ?></td>
		<td><?php echo $ro['address']; ?></td>
		<td><?php echo $ro['hobby']; ?></td>
		<td><img src="uplode/<?php echo($ro['image']); ?>" width="100"> </td>
		<td><a href="userview.php?id=<?php echo($ro['id']);?>">Delete</td>
			<td><a href="insertpage.php?id=<?php echo($ro['id']);?>">Update</td>
		</tr>
	<?php
	 }
	 ?>

	 
		</table>
		<a href="firstpage.php">Log out...</a>
	</form>
</body>
</html>