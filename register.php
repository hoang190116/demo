<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style>
	body {background-color: #F0FFF0}
	input[type=text], input[type=Password], input[type=email]
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
	input[type=submit], input[type=reset], input[type=button]
	{
		display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin: 8px 0; padding: 12px 20px; background-color: #4CAF50; color: white; outline: none; 
	}

	input[type=submit]:hover, input[type=reset]:hover
	{
		background-color: #45a049;
	}
	
	

	</style>



<div class="loginad" style="text-align: center; margin-right: 400px; margin-left: 400px; padding-bottom: 240px;">
<form method="POST" style="text-align: left;">
	<fieldset style="margin-top: 120px; margin-right: 20px; margin-left: 5px; background-color: white;  border: 1px solid #ccc; border-radius: 10px; padding: 40px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
		<legend style="text-shadow: 2px 2px green; font-size: 30px">Register</legend>
	User Name:<br>
	<input type="text" name="Name" style="padding-right: 100px"><br>
	Password:<br> 
	<input type="Password" name="Pass" style="padding-right: 100px"><br>
	Email:<br>
	<input type="Email" name="Email" style="padding-right: 100px"><br>
	<br>
	<input type="submit" value="Regist">
	<input type="reset" value="Reset">
	<a href="index.php"><input type="button" value="Back"  style="float: right;"></a>
	<br>
    </fieldset>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$User_Name=$_POST['Name'];
	$User_Password=$_POST['Pass'];
	$Email = $_POST['Email'];

	if (($User_Name != null) && ($User_Password != null) && ($Email != null))
	{
	include('admin/inc/conn.php');
	$sql = mysqli_query($conn, "INSERT INTO user(User_Name, User_Password, Email, Role) values ('$User_Name', '$User_Password', '$Email', 'user')");

	if (!$sql)
	{
		die("Fail".mysql_query_error());
	}
	else
	{
		header('location:login.php');
		die;
	}
	}
}


?>



</form>
</div>
</body>
</html>