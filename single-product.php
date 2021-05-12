<?php
include('admin/inc/conn.php');
include('head.php');
?>

<div class="row">
	<div class="leftcolumn">
		<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM song WHERE Song_ID = '$id'";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($rs))
		{
		?>
			<div class="single-product" style="padding: 25px">
				<img src="img/<?= $row['Song_Img']?>" style="height: 210px; box-shadow:0 2px 5px 0 rgba(0,0,0,0.50),0 2px 10px 0 rgba(0,0,0,0.70)">
				<h2 style="font-size: 25px; background-color: #262626; border-radius: 50%; box-shadow:0 2px 8px 4px rgba(0,0,0,0.50);margin: 10px; color: white; padding: 15px"> 
					<?php echo $row['Song_Name'] ?><br>
					<?php 
					$singer = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Singer_ID from song_singer where Song_ID='$id'"));
					$sid = $singer['Singer_ID'];
					$singer = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Singer_Name from singer where Singer_ID='$sid'"));

					$genid = $row['Genre_ID'];
					$genre = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Genre_Name from genre where Genre_ID='$genid'"));
					?>
					Singer: <?php echo $singer['Singer_Name']?> <br>
					Genre: <?php echo $genre['Genre_Name']?>
				</h2>
				<br>
				<form style="color: white; padding: 25px;" method="POST">
					<audio id="audio_1" style="width: 547px" controls controlsList="nodownload" ontimeupdate="myAudio(this)">
					<source src="mp3/<?php echo $row['Song_Mp3']?>" type="audio/mpeg">
					</audio>
					 <script type="text/javascript">
            		function myAudio(event)
            		{
		             if(event.currentTime >80)
		             {
		                event.currentTime=0;
		                event.pause();
		                alert ("Payment to listen to the full song!")
		              }
		            }
          			</script>
					<?php
					if ($a == 1)
					{
					?>
					<a href="buy.php?id=<?=$id?>"><button class="buy-btn" type="button">Buy Now</button></a>
					<?php
					}
					else
					{
					?>
					<a href="login.php"><button class="buy-btn" type="button">Buy Now</button></a>
					<?php
					}
					?>
				</form>
			</div>




		<?php
		}
		?>

	</div>
	<?php include('rightcolumn.php'); ?>
</div>
<?php include('footer.php'); ?>