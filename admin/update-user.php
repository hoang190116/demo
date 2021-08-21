<?php 
include( "inc/conn.php" );


if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$User_ID = $_GET['id'];
	$User_Name = $_POST['User_Name'];
	$User_Password = $_POST['User_Password'];
	
	$Email = $_POST['Email'];
	$Role = $_POST['Role'];

		if (($User_Name != null) && ($User_Password != null) && ($Email != null) && ($Role != null))
		{
			$sql = "UPDATE user SET User_Name='$User_Name', User_Password = '$User_Password', Email='$Email', Role='$Role' WHERE User_ID='$User_ID' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
			echo "Success";
			}
		
			else
			{
			echo " Error Upload";
			}
		}
}
		
$User_ID = $_GET['id'];
$sql = mysqli_query( $conn , "SELECT * FROM user WHERE User_ID='$User_ID'");
$row =  mysqli_fetch_assoc($sql);
include ("head.php");
?>
<div class="list" style="border: 1px solid black; margin-top: 10px; margin-left:50px; width: auto; margin-bottom: 20px;">
	<h2> Update User: <?= $row['User_Name'] ?> </h2>

	<!-- phai co ectype="multipart/form-data" thi moi upload dc file len server  -->
	<form class="form" method="post">
	
	<label>Name</label>
		<input type="text" name="User_Name" value="<?= $row['User_Name'] ?>">
	<label>Password</label>
		<input type="Password" name="User_Password" value="<?= $row['User_Password'] ?>">
	<label>Email</label>
	 	<input type="Email" name="Email" value="<?= $row['Email'] ?>">
	 <label>Role</label>
	 	<input type="text" name="Role" value="<?= $row['Role'] ?>">
	 	<br>
	 	<br>
		<input type="submit" name="submit" value="Update">
	</form>
</div>