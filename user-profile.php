<?php
include("admin/inc/conn.php");
include("head.php");


		$id = $_GET['id'];
		$sql = "SELECT * FROM user WHERE User_ID = '$id'";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($rs))
		{
?>
		
	<div class="row">
		<div class="profile">
			User Name: <?php echo $row['User_Name'] ?> <br><br>
			Email: <?php echo $row['Email'] ?> <br><br>
			
			<a href="update.php?id=<?=$id?>"><button class="p-u-btn">Update my information</button></a>
		</div>
		<?php include('rightcolumn.php')?>
	</div>




	<?php
		}
	?>
<?php include('footer.php'); ?>