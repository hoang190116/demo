<?php
include ("inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['Delid']))
{
	$del = $_GET['Delid'];

	$sql= mysqli_fetch_assoc(mysqli_query($conn, "SELECT Singer_ID from song_singer where Song_ID='$del'"));
	$a = $sql['Singer_ID'];
	if (!empty($sql))
	{
		$sql = mysqli_query($conn, "DELETE FROM song_singer WHERE Song_ID='$del' AND Singer_ID='$a'");
		$sql = mysqli_query($conn, "DELETE FROM song WHERE Song_ID={$del} limit 1");

		if ($sql)
		{
		}
		else
		{
			echo "Fail".mysqli_error($conn);
		}
	}
	else
	{
		$sql = "DELETE FROM song WHERE Song_ID={$del} limit 1";
		if (mysqli_query($conn, $sql))
		{
		}
		else
		{
			echo "Fail".mysqli_error($conn);
		}
	}
}

include ("head.php");
include ("list.php");

?>