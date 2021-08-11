<?php
include("admin/inc/conn.php");
include("head.php");


	$id = $_GET['id'];

?>


<div class="row">
	<div class="leftcolumn">
		<?php
		$sql = "SELECT * FROM song WHERE Song_ID = '$id'";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($rs))
		{
		?>
			<div class="single-product" style="padding: 25px">
				<img src="img/<?= $row['Song_Img']?>" style="height: 210px; box-shadow:0 2px 5px 0 rgba(0,0,0,0.50),0 2px 10px 0 rgba(0,0,0,0.70)">
				<h2 class="product-title" style="font-size: 25px; background-color: #262626; border-radius: 50%; box-shadow:0 2px 8px 4px rgba(0,0,0,0.50)"> 
					<?php echo $row['Song_Name'] ?> 
				</h2>
				<br>
					<p class="product-price">
					<?php echo $row['Song_Price']."$" ?>
					</p>
				<form method="POST" action="cart.php" style="color: white; padding: 25px;" class="add-cart-btn">
					<p style="border:none;border-radius: 15px;background-color: #262626; padding: 10px; font-size: 17px;position: absolute; transform: translate(230%, -50%);">Quantity: <input type="number" name="number" style="border: none;border-radius: 8px; text-align: center; outline: none; width: 90px"min="1" max="20" required placeholder="Max is 20"></p>
					<input type="hidden" name="id" value="<?=$id?>">
					<button type="submit">
						Add to cart
					</button>
				</form>
			</div>




		<?php
		}
		?>

	</div>
	<?php include('rightcolumn.php'); ?>
</div>
<?php include('footer.php'); ?>