

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style>
	body {background-color: #F0FFF0}
	input[type=text], input[type=Password]
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
		display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin: 8px 0; padding: 12px 20px; background-color: #4CAF50; color: white; outline: none; transition: all 0.5s;
	}

	input[type=submit]:hover, input[type=reset]:hover
	{
		background-color: #45a049;
	}





</style>
<form method="POST" style="margin-right: 400px; margin-left: 450px">
	<fieldset style="margin-top: 120px; margin-right: 50px; margin-left: 10px; padding: 40px; background-color: white;  border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
		<legend style="text-shadow: 2px 2px green; font-size: 30px">Login</legend>
	User Name:<br>
	<input type="text" name="Name"><br>
	Password:<br> 
	<input type="Password" name="Pass"><br>
	<br>
	<input type="submit" value="Login">
	<input type="reset" value="Reset">
	<a href="index.php"><input type="button" value="Back"  style="float: right;"></a><br><br>
	<a href="register.php" style="padding: 5px; text-decoration: none;">Regist Now</a>
	<br>
    </fieldset>

    <?php
    
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include ('admin/inc/conn.php');
		$User_Name = $_POST['Name']; #Name va Pass tu` <form>
		$User_Password = $_POST['Pass'];
		$User = mysqli_fetch_assoc( mysqli_query($conn, "SELECT User_Name, User_Password FROM user WHERE User_Name='$User_Name' AND User_Password='$User_Password'"));
		if ($User)
		{
			$_SESSION['user'] = $User['User_Name'];
			header('location:index.php');
			die;
		}
		else 
		{
			?>
			<div style="text-align: center">
				<br>
			<?php
			echo "Wrong Password or Username";
			?>
			</div>
		<?php
		}
	}


	?>

</form>

</body>
</html>