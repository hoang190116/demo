<?php
include ("inc/conn.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name = $_POST['name'];


	if (!empty($name))
	{	

			$sql = "INSERT INTO singer(Singer_Name) VALUES ('$name')";

			$result = mysqli_query($conn ,$sql);

			if ($result)
			{
				echo "Success!";
			}
			else
			{
			echo "Fail";
			}
	}
	
}

include ("head.php");

?>
<div class="list" style="border: 1px solid black; margin-top: 20px">
<form class="form" method="POST" enctype="multipart/form-data">
	<label>Name</label>
	<input type="text" name="name">

	<input type="submit" name="submit" value="Add" style="margin-top: 20px">
	
</form>
</div>