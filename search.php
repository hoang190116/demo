<?php
include ('admin/inc/conn.php');
include ('head.php');

$search = "";
if (!empty($_GET['search']))
{
	$search = $_GET['search'];
}
?>



<div class="row">
	<div class="leftcolumn">
		<h3 style="color: #00ff7f; background-color: rgba(0,0,0, 0.6); padding-left: 25px; padding-bottom: 8px; padding-top: 8px; margin-top: 0; border-top-right-radius: 14px; border-top-left-radius: 14px"> Search: <?=$search?> </h3>
		<?php
		if (!empty($search))
		{

				$result = mysqli_query($conn, "SELECT * FROM singer WHERE Singer_Name LIKE '%{$search}%'");
		while ( $row=mysqli_fetch_assoc($result))
		{
		?>
		<div class="card card-left">
		<a href="#" class="product">
				
				<div class="product-img">

				<h2 class="product-title"><?php echo $row['Singer_Name'] ?> </h2> <p style="color: white">- Singer</p>
				</div>
		</a>
		</div>
		<?php
		}





			$result = mysqli_query($conn, "SELECT * FROM song WHERE Song_Name LIKE '%{$search}%'");
		while ( $row=mysqli_fetch_assoc($result))
		{
		?>
		<div class="card card-left">
		<a href="single-product.php?id=<?php echo $row['Song_ID'] ?>" class="product">
				
				<div class="product-img">
				<img src="img/<?php echo $row['Song_Img'] ?>">

				<h2 class="product-title"> <?php echo $row['Song_Name'] ?> </h2>  
				</div>
		</a>
		</div>


		<?php
		}
		}
		?>


	</div>
	<?php include ('rightcolumn.php') ?>

</div>
<?php include ('footer.php') ?>