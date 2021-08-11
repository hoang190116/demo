<?php
include("admin/inc/conn.php");
include("head.php");


		$id = $_GET['id'];
		$sql = "SELECT * FROM order_user WHERE User_ID = '$id' AND Status='Unpaid'";
		$rs = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		?>
		<div class="row">
		<div class="left-pay">
			<?php
		if (!empty($rs))
		{
		?>
		<h3 style="text-align: center; padding-bottom: 20px; font-size: 25px; color: #00ff7f">Thanks for trading</h3>
		<?php
		$rs2 = $rs['Order_ID'];
		$sql = "SELECT * from order_detail where Order_ID='$rs2'";
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs)<2)
		{
			$d=0;
		}
		else
		{
			$d=1;
		}
		while ($row = mysqli_fetch_assoc($rs))
		{
			$a = $row['Song_ID'];
			$a2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from song where Song_ID='$a'"));

			?>
			<div id="total-pay">
			<div class="pay1">
				<?php echo $a2['Song_Name'] ?>
			</div>
			<div class="pay1">
				<img src="img/<?= $a2['Song_Img']?>">
			</div>
			<div class="pay2">
				<audio id="audio_1" style="width: 500px" controls controlsList="download"><source src="mp3/<?=$a2['Song_Mp3']?>" type="audio/mpeg"></audio>
			</div>
		</div>

		<?php
		}
		$sql = mysqli_query($conn, "UPDATE order_user SET Status = 'Paid' where User_ID='$id' AND Order_ID='$rs2'");
		}
		else
		{
			echo '<h3>Notthing From Here!<h3>';
			$d = 0;
		}
		?>
		</div>
	</div>
<?php 
if ($d==1)
{
include('footer.php');
}
else
{
include('footer-no-scroll.php');
}
?>