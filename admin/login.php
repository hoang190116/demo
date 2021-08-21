

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="loginad" style="text-align: center; border: 2px outset gray; margin-right: 450px; margin-left: 450px; padding-bottom: 240px;">
<form method="POST" style="text-align: left;">
	<fieldset style="margin-top: 200px; margin-right: 170px; margin-left: 110px;">
		<legend>Login</legend>
	User Name:<br>
	<input type="text" name="Name"><br>
	Password:<br> 
	<input type="Password" name="Pass"><br>
	<br>
	<input type="submit" value="Login">
	<input type="reset" value="Reset"><br>
    </fieldset>
    <?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include ('inc/conn.php');
		$User_Name = $_POST['Name']; #Name va Pass tu` <form>
		$User_Password = $_POST['Pass'];
		$User = mysqli_fetch_assoc( mysqli_query($conn, "SELECT User_Name, User_Password FROM user WHERE User_Name='$User_Name' AND User_Password='$User_Password' AND Role='admin'"));
		if ($User)
		{
			$_SESSION['user2'] = $User['User_Name'];
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
</div>
</body>
</html>