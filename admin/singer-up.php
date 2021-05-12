<?php 
include( "inc/conn.php" );


if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$id = $_GET['id'];
	$name = $_POST['name'];
	

		if (($name != null))
		{
			$sql = "UPDATE singer SET Singer_Name='$name' WHERE Singer_ID='$id' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
			echo "Success";
			}
		
			else
			{
			echo " Error Update";
			}
		}
}
		
$id = $_GET['id'];
$sql = mysqli_query( $conn , "SELECT * FROM singer WHERE Singer_ID='$id'");
$row =  mysqli_fetch_assoc($sql);
include ("head.php");
?>
<div class="list" style="border: 1px solid black; margin-top: 10px; margin-left:50px; width: 90%; margin-bottom: 20px;">

	<!-- phai co ectype="multipart/form-data" thi moi upload dc file len server  -->
	<form class="form" method="post">
	
	<label>Name</label>
		<input type="text" name="name" value="<?= $row['Singer_Name'] ?>">

	 	<br>
	 	<br>
		<input type="submit" name="submit" value="Update">
	</form>
</div>