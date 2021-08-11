<?php
define( 'DB_NAME', 'database' );

define( 'DB_USER', 'user' );

define( 'DB_PASSWORD', 'pass' );

define( 'DB_HOST', 'localhost' );
$conn = mysqli_connect(DB_NAME, DB_USER, DB_PASSWORD, DB_HOST);

if (!$conn)
{
	die("Fail connect" .mysqli_connect_error());
}
?>