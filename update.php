<?php 
include( "admin/inc/conn.php" );

	$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$id2 = $_GET['id'];

	$User_Name = $_POST['upname'];
	$User_Password = $_POST['uppass'];
	
	$Email = $_POST['upmail'];


		if ($User_Password != null)
		{
			$sql = "UPDATE user SET User_Name='$User_Name', User_Password = '$User_Password', Email='$Email' WHERE User_ID='$id2' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
				header('location:user-profile.php?id='.$id);
			}
			else
			{
			echo " Error Upload";
			}
		}

		if ($User_Password == null)
		{
			$sql = "UPDATE user SET User_Name='$User_Name', Email='$Email' WHERE User_ID='$id' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
				header('location:user-profile.php?id='.$id);
			}
			else
			{
			echo " Error Upload";
			}
		}
}

?>




<?php
include("admin/inc/conn.php");
include("head.php");

		$sql = "SELECT * FROM user WHERE User_ID = '$id'";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($rs))
		{
?>
		
		<div class="row">
			<form method="POST">
			<div class="user-update">
				User Name: <input type="text" name="upname" value="<?= $row['User_Name'] ?>" size = "40" required><br><br>
				Password: <input type="Password" name="uppass" placeholder="Keep it null if you do not want to change" size="40"><br><br>
				Email: <input type="Email" name="upmail" value="<?= $row['Email'] ?>" size="40" required><br><br>
				<a href="user-profile.php?id=<?=$id?>"><button class='p-u-btn'>Back</button></a>
				<input type="submit" name="submit" value="Update" class="p-u-btn">
			</div>
			</form>
			<?php include('rightcolumn.php')?>
		</div>


	<?php
		}
	?>
<?php include('footer.php'); ?>

