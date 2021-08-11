<?php
require_once("admin/inc/conn.php");
include('head.php');
?>
<!-- --------------------------------------------------------------------------------------------------- -->

<div class="w1">
<div class="w2">
<div class="w3-content">
<?php
$a=0;
include ("admin/inc/conn.php");
$abc = mysqli_query($conn, "SELECT * from song");
while ($rs = mysqli_fetch_assoc($abc))
{
	if ($a < 4)
	{
		$a++;
    ?>
    	<div class="w3-display-container mySlides">
  		<img class="mySlides2" src="img/<?=$rs['Song_Img']?>" style="width:1150px; box-shadow: 0 4px 15px 0 rgba(0,0,0,1); border-radius: 14px">
  		<div class="w3-display-bottomleft">
    	<?php echo $rs['Song_Name'] ?>
  		</div>
  		</div>
<?php
	}
}
?>
	
	  <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  		<button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	
</div>
</div>
</div>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

</script>













<div class="row">
	<div class="leftcolumn">
		<?php
		// ?page=2 => $_GET['page']=3 
		if (!empty($_GET['page']))
		{
			$page = $_GET['page']-1;
		}
		else 
		{
			$page = 0;
		}





		$product_per_page=8;
		$offset = $product_per_page * $page;
		$sql = "SELECT * FROM song LIMIT $offset, $product_per_page";
		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result)>0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
		?>
			<div class="card card-left">
			<a href="single-product.php?id=<?php echo $row['Song_ID']?>" class="product">
				<div class="product-img">
					<img src="img/<?php echo $row['Song_Img'] ?>" style="box-shadow: 0 4px 9px 0 rgba(0,0,0,0.40)">
				</div>
				<div class="title">
				<h2 class="product-title" data-title="<?= $row['Song_Name']?>"> <?php echo $row['Song_Name'] ?></h2>
				</div>
			</a>
			</div>

		<?php
			}#end
		}

		?>
		<?php include('pagination.php'); ?>

	</div>

	<?php include('rightcolumn.php'); ?>
</div>
	<?php include('footer.php'); ?>
