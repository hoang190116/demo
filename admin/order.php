<?php
include ("inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$del = $_GET['Delid'];

	$sql= mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID from order_detail where Song_ID='$del'"));
	$a = $sql['Singer_ID'];
	if (!empty($sql))
	{
		$sql = mysqli_query($conn, "DELETE FROM song_singer WHERE Song_ID='$del' AND Singer_ID='$a'");
		$sql = mysqli_query($conn, "DELETE FROM song WHERE Song_ID={$del} limit 1");

		if ($sql)
		{
		}
		else
		{
			echo "Fail".mysqli_error($conn);
		}
	}
	else
	{
		$sql = "DELETE FROM song WHERE Song_ID={$del} limit 1";
		if (mysqli_query($conn, $sql))
		{
		}
		else
		{
			echo "Fail".mysqli_error($conn);
		}
	}
}

include ("head.php");

?>



<div class="list">
<div id="main">
	<table>
		<thead>
			<th>Order ID</th>
			<th>Order Date</th>
			<th>User ID</th>
			<th>Song ID</th>
			<th>Quantity</th>
			<th>Price /each</th>
			<th>Total</th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$query = "SELECT order_user.Order_ID, Order_Date, User_ID, Song_ID, Quantity, Price FROM order_user inner join order_detail on order_user.Order_ID=order_detail.Order_ID";
			$rs = mysqli_query($conn, $query);
			if (mysqli_num_rows($rs)>0)
			{
				while ($row = mysqli_fetch_assoc($rs))
				{
					$total = 0;
					$total = $row['Price'] * $row['Quantity'];
			?>
				<tr>
					<td style="text-align: center;"><?= $row['Order_ID'] ?></td>
					<td style="text-align: center;"><?= $row['Order_Date'] ?></td>
					<td style="text-align: center;"><?= $row['User_ID']?></td>
					<td style="text-align: center;"><?= $row['Song_ID'] ?></td>
					<td style="text-align: center;"><?= $row['Quantity'] ?></td>
					<td style="text-align: center;"><?= $row['Price']."$"?></td>
					<td style="text-align: center;"><?= $total."$"?></td>
					<td style="text-align: center;padding: 10px"><a href="?Delid=<?=$row['Order_ID']?>">Delete</a></td>

				</tr>

			<?php		
				}
			}
			?>

		</tbody>

	</table>

</div>
</div>