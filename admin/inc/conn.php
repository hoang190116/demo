<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "music";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn)
{
	die("Fail connect" .mysqli_connect_error());
}
?>