<?php 
include( "inc/conn.php" );


if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$Song_ID = $_GET['id'];
	$Song_Name = $_POST['Song_Name'];
	$Song_Price = $_POST['Song_Price'];
	
	$Genre = $_POST['Genre'];
	$singer = $_POST['singer'];
	
	$file = $_FILES['Song_Img']['name']; // 1 mang khac chua thong tin file da upload 

	// $file2 = $_FILES['Song_Mp3']['name'];

	$sql = mysqli_query($conn, "SELECT Song_Img, Song_Mp3 from song where Song_ID='$Song_ID'");
	while ($row = mysqli_fetch_array($sql))
	{
	$del = $row['Song_Img'];
	$del2 = $row['Song_Mp3'];
	}

		if (empty($file))
		{

			$sql = "UPDATE song SET Song_Name='$Song_Name', Song_Price = '$Song_Price', Genre_ID='$Genre' WHERE Song_ID='$Song_ID' ";
			$re = mysqli_query($conn ,$sql);
			$sql = "UPDATE song_singer SET Singer_ID='$singer' WHERE Song_ID='$Song_ID' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
			echo "Success";
			}
		
			else
			{
			echo " Error Upload File! <br> ";
			}
		}
		if (!empty($file))
		{
			if ($del != null)
			{
				unlink("../img/".$del);
			}

			$file_tmp = $_FILES['Song_Img']['tmp_name'];

			$rollname = rand().$file;

			$path="../img/";

			move_uploaded_file($file_tmp, $path.$rollname);
		

			$sql = "UPDATE song SET Song_Name='$Song_Name', Song_Price = '$Song_Price', Genre_ID='$Genre', Song_Img='$rollname' WHERE Song_ID='$Song_ID' ";
			$re = mysqli_query($conn ,$sql);
			$sql = "UPDATE song_singer SET Singer_ID='$singer' WHERE Song_ID='$Song_ID' ";
			$re = mysqli_query($conn ,$sql);
			if ($re)
			{
			echo "Success";
			}
		
			else
			{
			echo " Error Upload File! <br> ";
			}
		}
		// if (empty($file) && !empty($file2))
		// {
		// 	if ($del2 != null)
		// 	{
		// 		unlink("../mp3/".$del2);
		// 	}

		// 	$file2_tmp = $_FILES['Song_Mp3']['tmp_name'];

		// 	$rollname2 = rand().$file2;

		// 	$path2="../mp3/";

		// 	move_uploaded_file($file2_tmp, $path2.$rollname2);
		

		// 	$sql = "UPDATE song SET Song_Name='$Song_Name', Song_Price = '$Song_Price', Genre_ID='$Genre', Song_Mp3='$rollname2' WHERE Song_ID='$Song_ID' ";
		// 	$re = mysqli_query($conn ,$sql);
		// 	$sql = "UPDATE song_singer SET Singer_ID='$singer' WHERE Song_ID='$Song_ID' ";
		// 	$re = mysqli_query($conn ,$sql);
		// 	if ($re)
		// 	{
		// 	echo "Success";
		// 	}
		
		// 	else
		// 	{
		// 	echo " Error Upload File! <br> ";
		// 	}
		// }
		// if (!empty($file) && !empty($file2))
		// {
		// 	if (($del != null) && ($del2 !=null))
		// 	{
		// 		unlink("../img/".$del);
		// 		unlink("../mp3/".$del2);
		// 	}
		// 	if (($del != null) && ($del2 == null))
		// 	{
		// 		$link = "../img/".$del;
		// 		if ($link)
		// 		{
		// 		unlink($link);
		// 		}
		// 	}
		// 	if (($del == null) && ($del2 !=null))
		// 	{
		// 		$link2 = "../mp3/".$del2;
		// 		if ($link2)
		// 		{
		// 		unlink($link2);
		// 		}
		// 	}


		// 	$file_tmp = $_FILES['Song_Img']['tmp_name'];
		// 	$file2_tmp = $_FILES['Song_Mp3']['tmp_name'];

		// 	$rollname = rand().$file;
		// 	$rollname2 = rand().$file2;

		// 	$path="../img/";
		// 	$path2="../mp3/";

		// 	move_uploaded_file($file_tmp, $path.$rollname);
		// 	move_uploaded_file($file2_tmp, $path2.$rollname2);
		

		// 	$sql = "UPDATE song SET Song_Name='$Song_Name', Song_Price = '$Song_Price', Genre_ID='$Genre', Song_Img='$rollname', Song_Mp3='$rollname2' WHERE Song_ID='$Song_ID' ";
		// 	$re = mysqli_query($conn ,$sql);
		// 	$sql = "UPDATE song_singer SET Singer_ID='$singer' WHERE Song_ID='$Song_ID' ";
		// 	$re = mysqli_query($conn ,$sql);
		// 	if ($re)
		// 	{
		// 	echo "Success";
		// 	}
		
		// 	else
		// 	{
		// 	echo " Error Upload File! <br> ";
		// 	}
			
		// }
		



}


$Song_ID = $_GET['id'];
$sql = mysqli_query( $conn , "SELECT song.Genre_ID, Genre_Name, Song_Name, Song_Price, Song_Mp3, Song_Img FROM song INNER JOIN genre on song.Genre_ID=genre.Genre_ID WHERE Song_ID='$Song_ID'");
$row =  mysqli_fetch_assoc($sql);
$sql3 = mysqli_fetch_assoc(mysqli_query( $conn , "SELECT song_singer.Singer_ID, Singer_Name FROM song_singer INNER JOIN singer on singer.Singer_ID=song_singer.Singer_ID WHERE song_singer.Song_ID='$Song_ID'"));
include ("head.php");
?>
<div class="list" style="border: 1px solid black; margin-top: 10px; margin-left:50px; width: auto; margin-bottom: 20px;">
	<h2> Update Product: <?= $row['Song_Name'] ?> </h2>

	<!-- phai co ectype="multipart/form-data" thi moi upload dc file len server  -->
	<form class="form" method="post" enctype="multipart/form-data">
	
	<label>Name</label>
		<input type="text" name="Song_Name" value="<?= $row['Song_Name'] ?>">
	<label>Price</label>
		<input type="number" name="Song_Price" value="<?= $row['Song_Price'] ?>">

	<label>Genre: 
		<select name="Genre">
			<option value="<?= $row['Genre_ID']?>"><?php echo $row['Genre_Name'] ?></option>
			<?php
			include ("inc/conn.php");
			$a = $row['Genre_ID'];
			$sql2 = "SELECT * FROM genre where Genre_ID != $a";
			$rs = mysqli_query($conn, $sql2);
			while (($row2 = mysqli_fetch_assoc($rs)) != null)
			{
				?>
				<option value="<?= $row2['Genre_ID']?>"> <?php echo $row2['Genre_Name'] ?></option>
				<?php
			}
			?>
		</select>
	</label>

	<label>Producer: 
		<select name="singer">
			<option value="<?= $sql3['Singer_ID']?>"><?php echo $sql3['Singer_Name'] ?></option>
			<?php
			include ("inc/conn.php");
			$aa = $sql3['Singer_ID'];
			$sql2 = "SELECT * FROM singer where Singer_ID != '$a'";
			$rs = mysqli_query($conn, $sql2);
			while (($row2 = mysqli_fetch_assoc($rs)) != null)
			{
				?>
				<option value="<?= $row2['Singer_ID']?>"> <?php echo $row2['Singer_Name'] ?></option>
				<?php
			}
			?>
		</select>
	</label>

	<label style="margin-bottom: 5px;">Picture: <input type="text" readonly value="<?= $row['Song_Img'] ?>" style="width: 80%"></label><br>
	 	<input type="file" name="Song_Img">
	 <!-- <label type="hidden">MP3: <input type="text" readonly value="<?= $row['Song_Mp3'] ?>" style="width: 80%"></label> <br> -->
	 	<!-- <input type="file" name="Song_Mp3" > -->

		<input type="submit" name="submit" value="Update">
	</form>
</div>