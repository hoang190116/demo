<?php
$server = "localhost";
$user = "admin";
$pass = "admin";
$db = "music";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn)
{
	die("Fail connect" .mysqli_connect_error());
}
?>
