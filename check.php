<?php
require_once("inc/conn.php");
?>
<?php
$sql= "SELECT ID, Name, Content, Picture, Price FROM special";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
		?>
			<a href="single-product.php?id=<?php echo $row['ID']?>" class="product">
				<div class="product-img">
				<img src="img/<?php echo $row['Picture'] ?>">  
				</div>
				<div class="title">
				<h2 class="product-title"><?php echo $row['Name'] ?></h2>
				</div>
			</a>

		<?php
		}
	}
		?>	


					function truncateString($row['Name'], $maxChars = 1, $holder = "...")
			{
				$rs = $row['Name'];
				if (strlen($row['Name']) > $maxChars)
				{
					$rs = substr($row['Name'], 0, $maxChars).$holder;
				}
				return $rs;
			}
			$row['Name'] = truncateString($row['Name'], 50, "...");