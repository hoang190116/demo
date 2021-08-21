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
		$b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID from order_user where User_ID='$a2' AND Status='Unpaid'"));

			if (!empty($b))
			{
		 		$b2 = $b['Order_ID'];
				$c = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM order_detail WHERE Song_ID='$id' AND Order_ID='$b2'"));

				if (!empty($c))
				{
					$a = mysqli_query($conn, "UPDATE order_detail SET Quantity='$number' WHERE Song_ID='$id' AND Order_ID='$b2'");
					$a = mysqli_query($conn, "UPDATE order_user SET Order_Date='$mydate' WHERE Order_ID='$b2'");
				}
				else
				{
					$a = mysqli_query($conn, "INSERT INTO order_detail(Order_ID, Song_ID, Quantity, Price) values ('$b2','$id','$number','$price')");
					$a = mysqli_query($conn, "UPDATE order_user SET Order_Date='$mydate' WHERE Order_ID='$b2'");
				}				
			}
			else
			{
			$a = mysqli_query($conn, "INSERT INTO order_user(Order_Date, User_ID, Status) values ('$mydate','$a2','Unpaid')");
			$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID FROM order_user where User_ID='$a2' AND Status='Unpaid'"));
			
			$a2 = $a['Order_ID'];
			$a = mysqli_query($conn, "INSERT INTO order_detail(Order_ID, Song_ID, Quantity, Price) values ('$a2','$id','$number','$price')");
			}


				
		
	}
}




if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$User_Name=$_SESSION['user'];
	$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID from user where User_Name = '$User_Name'"));
	$a2= $a['User_ID'];
	$rs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID from order_user where Status='Unpaid' AND User_ID='$a2'"));
	$rs2 = $rs['Order_ID']; 
	$del = $_GET['Delid'];
	$rs = mysqli_query($conn, "DELETE FROM order_detail WHERE Song_ID='$del' AND Order_ID='$rs2'");
}

?>

<div class="row2">
<?php
$User_Name=$_SESSION['user'];
$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID from user where User_Name = '$User_Name'"));
$a2= $a['User_ID'];
$rs = mysqli_query($conn, "SELECT * FROM order_user inner join order_detail on order_user.Order_ID=order_detail.Order_ID where User_ID='$a2' AND Status='Unpaid'");
$rs2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_Date FROM order_user WHERE Status='Unpaid' AND User_ID='$a2'"));
$total2 = 0;
if (mysqli_num_rows($rs)>0)
{
	?>
	<p style="float: left;font-size: 20px; animation-name: hot; animation-duration: 4s; animation-iteration-count: infinite; animation-direction: alternate-reverse; padding-right: 10px">Last Updated: </p><p style="font-size: 20px;"><?= $rs2['Order_Date'] ?></p>
	<?php
while ($row = mysqli_fetch_assoc($rs))
{
	$a = $row['Song_ID'];
	$rs2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Song_Name, Song_Img FROM song Where Song_ID='$a'"));
?>

<div id="total">
	<div class="cl2">
	<p>Product Name</p> <p class="border">___________</p><?= $rs2['Song_Name'] ?>
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
	<p>Total</p> <p class="border">_______</p></p> <?php $total = $row['Quantity'] * $row['Price']; echo $total."$"?>
	</div>
	<div class="cl1">
	<br><br><br><a href="?Delid=<?=$row['Song_ID']?>">Delete</a>
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
$a2 = $a['User_ID'];
$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Order_ID from order_user where User_ID='$a2' AND Status='Unpaid'"));
if (!empty($a))
{
$b = $a['Order_ID'];
$a = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Song_ID from order_detail where Order_ID = '$b'"));
	if (!empty($a))
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
}
else
{
	echo "<h3>No Product</h3>";
	include('footer-no-scroll.php');
}
?>











