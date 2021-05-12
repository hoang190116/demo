<?php
include ("inc/conn.php");
include ("head.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$del = $_GET['Delid'];
	$sql = "DELETE FROM user WHERE User_ID={$del} limit 1";
	if (mysqli_query($conn, $sql))
	{
	}
	else
	{
		echo "Fail".mysqli_error($conn);
	}
}
?>



<div class="list">
<div id="main">
	<table>
		<thead>
			<th>User_ID</th>
			<th>User_Name</th>
			<th>User_Password</th>
			<th style="text-align: center;">Email</th>
			<th>Role</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<?php


			//------------------------------------------------------------------------------------------------------------------------//
			$query = "SELECT * FROM user";
			$rs = mysqli_query($conn, $query);
			if (mysqli_num_rows($rs)>0)
			{
				while ($row = mysqli_fetch_assoc($rs))
				{
			?>
				<tr>
					<td style="text-align: center;"><?= $row['User_ID'] ?></td>
					<td style="text-align: center;"><?= $row['User_Name'] ?></td>
					<td style="text-align: center;"><?= $row['User_Password'] ?></td>
					<td style="text-align: center; padding: 15px;"><?= $row['Email'] ?></td>
					<td style="text-align: center;"><?= $row['Role'] ?></td>
					<td style="text-align: center; padding: 10px"><a href="update-user.php?id=<?= $row['User_ID'] ?>">Update</a></td>
					<td style="text-align: center;padding: 10px"><a href="?Delid=<?=$row['User_ID']?>">Delete</a></td>
					

				</tr>

			<?php		
				}
			}
			?>


		</tbody>

	</table>

</div>
</div>

