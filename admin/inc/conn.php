<?php
$server = "3.128.120.5";
$user = "admin";
$pass = "admin";
$db = "music";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn)
{
	die("Fail connect" .mysqli_connect_error());
}
?>
