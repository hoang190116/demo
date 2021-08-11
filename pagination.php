<?php
require_once("admin/inc/conn.php");
?>
<?php
$product_per_page=8;
$q = mysqli_query($conn, "SELECT COUNT(Song_ID) AS total FROM song");
$result = mysqli_fetch_assoc($q);
$total_products = $result['total'];

$pages = ceil($total_products / $product_per_page);
if (!empty($_GET['page']))
{
	$curent_page=$_GET['page'];
}
else
{
	$curent_page=1;
}
?>
<div class="leftcolumn-2" style="width: 100%;">
<div class="pagiwrap" style="text-align: center;">
	<div class="pagi">
		<?php 
		for($i=0; $i<$pages; $i++)
		{
		?>
		<a href="index.php?page= <?= $i+1 ?>" 
			<?php
			if ($curent_page==($i+1))
			{
				echo "class='active'";
			} 
			else
			{
				echo "";
			}
			 ?>
		>
		<?php echo $i+1 ?>
		</a>
		<?php
		}

		?>
	</div>
	</div>
</div>