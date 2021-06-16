<?php
$server = "52.14.94.198";
$user = "admin";
$pass = "admin";
$db = "music";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn)
{
	die("Fail connect" .mysqli_connect_error());
}
?>
