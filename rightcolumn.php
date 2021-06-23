	<div class="rightcolumn">
		<h2 style="font-size: 30px; font-family: cursive; font-weight: bold; text-align: center; animation-name: hot; animation-duration: 4s; animation-iteration-count: infinite; animation-direction: alternate-reverse">Hot</h2>
		<?php
		$a2=0;
		include ("admin/inc/conn.php");
		$sql= "SELECT * FROM song";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) 
		{
		if($a2 < 4)
		{
			$a2++;
		?>
		<div class="card card-right">
			<a href="single-product.php?id=<?php echo $row['Song_ID']?>" class="product">
				<div class="product-img">
				<img src="img/<?php echo $row['Song_Img'] ?>" style="box-shadow: 0 4px 9px 0 rgba(0,0,0,0.80)">  
				</div>
				<div class="title">
				<h2 class="product-title2"><?php echo $row['Song_Name'] ?></h2>
				</div>
			</a>
		</div>
		<?php
			}
		}
		?>	
	</div>