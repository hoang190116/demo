<?php
include ("admin/inc/conn.php");
include ("head.php");



if ( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	$User_Name=$_SESSION['user'];
	$id = $_POST['id'];
	$number = $_POST['number'];

	$mydate=getdate(date("U"));
	$mydate= "$mydate[year]/$mydate[mon]/$mydate[mday] $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

	if (empty( $_SESSION['cart'][$id]) && !empty($_SESSION['user']))
	{


		$c = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from song where Song_ID='$id'"));
		$price = $c['Song_Price'];
		$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID from user where User_Name = '$User_Name'"));
		$a2= $a['User_ID'];
		$b = mysqli_query($conn, "SELECT Order_ID from order_user where User_ID='$a2'");


			$d = 0;
			while ($row = mysqli_fetch_assoc($b))
		 	{
		 		$b2 = $row['Order_ID'];
				$c = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM order_detail WHERE Song_ID='$id' AND Order_ID='$b2'"));

				if (!empty($c))
				{
					$a = mysqli_query($conn, "UPDATE order_detail SET Quantity='$number' WHERE Song_ID='$id' AND Order_ID='$b2'");
					$a = mysqli_query($conn, "UPDATE order_user SET Order_Date='$mydate' WHERE Order_ID='$b2'");
					$d = 1;
				}				
			}
			if ($d == 0)
			{
			$a = mysqli_query($conn, "INSERT INTO order_user(Order_Date, User_ID) values ('$mydate','$a2')");
			$a = mysqli_query($conn, "SELECT Order_ID FROM order_user where User_ID='$a2'");
			
			$d = 0;
			while (($row = mysqli_fetch_assoc($a)) && $d == 0)
			{
				$a2 = $row['Order_ID'];
				$b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM order_detail WHERE Order_ID='$a2'"));
				if (empty($b))
				{
					$a3 = mysqli_query($conn, "INSERT INTO order_detail(Order_ID, Song_ID, Quantity, Price) values ('$a2','$id','$number','$price')");
					$d = 1;
				}
			}


			}	
		
	}
}




if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$del = $_GET['Delid'];
	$sql = mysqli_query($conn, "DELETE FROM order_detail WHERE Order_ID='$del'");
	$sql = mysqli_query($conn,"DELETE FROM order_user WHERE Order_ID='$del'");
}

?>

<div class="row2">
<?php
$User_Name=$_SESSION['user'];
$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID from user where User_Name = '$User_Name'"));
$a2= $a['User_ID'];
$rs = mysqli_query($conn, "SELECT * FROM order_user inner join order_detail on order_user.Order_ID=order_detail.Order_ID where User_ID='$a2'");
$total2 = 0;
if (mysqli_num_rows($rs)>0)
{
while ($row = mysqli_fetch_assoc($rs))
{
	$a = $row['Order_ID'];
	$rs2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Song_Name, Song_Img FROM song inner join order_detail on song.Song_ID=order_detail.Song_ID where order_detail.Order_ID='$a'"));
?>

<div id="total">
	<div class="cl1">
	<p>Order ID</p> <p class="border">_________</p><?= $a ?>
	</div>
	<div class="cl2">
	<p>Song Name</p> <p class="border">___________</p><?= $rs2['Song_Name'] ?>
	</div>
	<div class="cl2">
	<p>Image</p> <p class="border">_________</p><img src="img/<?= $rs2['Song_Img']?>">
	</div>
	<div class="cl1">
	<p>Quantity</p> <p class="border">__________</p><?= $row['Quantity'] ?>
	</div>
	<div class="cl1">
	<p>Price /each</p> <p class="border">__________</p><?= $row['Price']."$" ?>
	</div>
	<div class="cl2">
	<p>Date</p> <p class="border">_______</p><?= $row['Order_Date'] ?>
	</div>
	<div class="cl2">
	<p>Total</p> <p class="border">_______</p></p> <?php $total = $row['Quantity'] * $row['Price']; echo $total."$"?>
	</div>
	<div class="cl1">
	<br><br><br><a href="?Delid=<?=$row['Order_ID']?>">Delete</a>
	</div>
</div>
			<?php
			$total2 = $total2 + ($row['Quantity'] * $row['Price']);
				}
			}
			?>
<?php
$User_Name=$_SESSION['user'];
$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID from user where User_Name = '$User_Name'"));
$a2= $a['User_ID'];
$b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID from order_user where User_ID='$a2'"));
if (!empty($b))
{
?>
<div id="total2">
	<p>Total: <?php echo $total2 ?>$</p>
	</div>
	<a href="pay-infor.php?id=<?=$a2?>"><button class="p-u-btn" style="margin-top: 35px; margin-bottom: 35px">Payment</button></a>
</div>
<?php
include('footer.php');
}
else
{
	echo "<h3>No Product</h3>";
	include('footer-no-scroll.php');
}
?>











