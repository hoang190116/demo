

<div class="list">
<div id="main">
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Mp3</th>
			<th>Price</th>
			<th>Genre ID</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM song";
			$rs = mysqli_query($conn, $query);
			if (mysqli_num_rows($rs)>0)
			{
				while ($row = mysqli_fetch_assoc($rs))
				{
			?>
				<tr>
					<td style="text-align: center;"><?= $row['Song_ID'] ?></td>
					<td style="text-align: center;"><?= $row['Song_Name'] ?></td>
					<td style="padding: 10px;"><img class="Picture-admin" src="../img/<?= $row['Song_Img']?>"></td>
					<td style="padding: 10px;"><audio style="width: 547px" controls controlsList="download" ><source src="../mp3/<?= $row['Song_Mp3']?>" type="audio/mpeg" ></audio></td>
					<td style="text-align: center;"><?= $row['Song_Price']."$" ?></td>
					<td style="text-align: center;"><?= $row['Genre_ID'] ?></td>
					<td style="text-align: center; padding: 10px"><a href="updateproduct.php?id=<?= $row['Song_ID'] ?>">Update</a></td>
					<td style="text-align: center;padding: 10px"><a href="?Delid=<?=$row['Song_ID']?>">Delete</a></td>

				</tr>

			<?php		
				}
			}
			?>

		</tbody>

	</table>

</div>
</div>