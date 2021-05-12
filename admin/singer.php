<?php
include ("inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$del = $_GET['Delid'];
	$sql = "DELETE FROM singer WHERE Singer_ID={$del} limit 1";
	if (mysqli_query($conn, $sql))
	{
	}
	else
	{
		echo "Fail".mysqli_error($conn);
	}
}

include ("head.php");

?>









<div class="list">
<div id="main">
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM singer";
			$rs = mysqli_query($conn, $query);
			if (mysqli_num_rows($rs)>0)
			{
				while ($row = mysqli_fetch_assoc($rs))
				{
			?>
				<tr>
					<td style="text-align: center;"><?= $row['Singer_ID'] ?></td>
					<td style="text-align: center;"><?= $row['Singer_Name'] ?></td>
					<td style="text-align: center; padding: 10px"><a href="singer-up.php?id=<?= $row['Singer_ID'] ?>">Update</a></td>
					<td style="text-align: center;padding: 10px"><a href="?Delid=<?=$row['Singer_ID']?>">Delete</a></td>

				</tr>

			<?php		
				}
			}
			?>

		</tbody>

	</table>

</div>
</div>