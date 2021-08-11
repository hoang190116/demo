<?php
include ("inc/conn.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$tensp = $_POST['tensp'];
	$giasp = $_POST['giasp'];
	$genre = $_POST['genre'];
	$singer = $_POST['singer'];

	$file = $_FILES['anhsp']['name']; // 1 mang chua thong tin file da upload  
	//chỉ update file nếu người dùng có chọn file upload.
	$file2 = $_FILES['mp3']['name'];






	if( !empty( $file && $file2) )
	{
			//tạo 1 ảnh hay mp3 dự phòng khác
			$file_tmp = $_FILES['anhsp']['tmp_name'];
			$file2_tmp = $_FILES['mp3']['tmp_name'];

			$rollname = rand().$file;
			$rollname2 = rand().$file2;

			$path = "../img/";
			$path2 = "../mp3/";
			move_uploaded_file($file_tmp, $path.$rollname);
			move_uploaded_file($file2_tmp, $path2.$rollname2);
			

			$sql = "INSERT INTO song(Song_Name, Song_Price, Song_Img, Song_Mp3, Genre_ID) VALUES ('$tensp', '$giasp', '$rollname', '$rollname2', '$genre')";
			$result = mysqli_query($conn ,$sql);

			$sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Song_ID from song where Song_Name='$tensp'"));
			$a = $sql2['Song_ID'];
			$sql = mysqli_query($conn,"INSERT INTO song_singer(Song_ID, Singer_ID) VALUES ('$a', '$singer')");

			

			if ($result)
			{
				echo "Success!";
			}
			else
			{
			echo "Fail";
			}
	}
	
}

include ("head.php");

?>
<div class="list" style="border: 1px solid black; margin-top: 20px">
<form class="form" method="POST" enctype="multipart/form-data">
	<label>Name</label>
	<input type="text" name="tensp">
	<label>Price</label>
	<input type="number" name="giasp">

	<label>Genre:
	<select name="genre">
		<?php
		include ("inc/conn.php");
		$query = "SELECT * FROM genre";
		$res = mysqli_query($conn, $query);
		while (($row = mysqli_fetch_assoc($res)) != null)
		{?>
    	<option value="<?= $row['Genre_ID']?>"> <?php echo $row['Genre_Name'] ?> </option>
    	<?php
		}
		?>
	</select>
	</label>

	<label>Singer:
	<select name="singer">
		<?php
		include ("inc/conn.php");
		$query = "SELECT * FROM singer";
		$res = mysqli_query($conn, $query);
		while (($row = mysqli_fetch_assoc($res)) != null)
		{?>
    	<option value="<?= $row['Singer_ID']?>"> <?php echo $row['Singer_Name'] ?> </option>
    	<?php
		}
		?>
	</select>
	</label>


	<label style="margin-bottom: 5px;">Picture</label>
	<br><input type="file" name="anhsp" ><br>

	<label>MP3</label>
	<br>
	<input type="file" name="mp3">
	<input type="submit" name="submit" value="Add" style="margin-top: 20px">
	
</form>
</div>
