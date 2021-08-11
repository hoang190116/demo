<?php 

	session_start();

	if( !empty( $_SESSION['user']) ){
		$a=1;
		$Uname = $_SESSION['user'];
  }
  else{
  	$a=0;
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
	<style>
		body {background-image: url('img/back1.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; margin-bottom: 0;}
		*{box-sizing: border-box;}
		/*<------------------------------------------------------------------------------------------------->*/
		.login {float: right; transform: translate(0%,-110%);}
		.login a {padding: 14px 16px; color: white; text-decoration: none; font-size: 17px}
		.login a:hover {color: #00ff7f}
		/*<------------------------------------------------------------------------------------------------->*/
		h1 {padding-bottom: 3px}
		/*<------------------------------------------------------------------------------------------------->*/
		@keyframes hot
		{
		0% {color: #ff1a1a;}
		25% {color: #ff80bf;}
		50% {color: #e600ac;}
		75% {color: #a64dff;}
		100% {color: #ff4d4d;}
		}
		/*<------------------------------------------------------------------------------------------------->*/
		/*<------------------------------------------------------------------------------------------------->*/
		.leftcolumn {float: left; width: 80%;border-radius: 14px; box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80)}
		.leftcolumn-2 {float: left; width: 80%; padding: 15px}
		.rightcolumn {float: right; width: 19%; border-radius: 14px; box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80)}
		.card-right {padding: 20px; margin: 20px; color: white; text-align: center}
		.card-left {background-color: #262626; padding: 15px; margin: 20px; float: left; width: 20%; text-align: center; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); border-radius: 45%}
		.row:after {content: ""; display: table; clear: both;}
		.row {margin-top: 15px; }
		/*<------------------------------------------------------------------------------------------------->*/
		.product-img{ max-width: 100%; padding: 10px;}
		.product-img img{ width: auto; height: 115px; border-radius: 50%;}
		.product{height: auto; text-decoration: none;}
		.product-price{color: #00ff7f; font-weight: bold; font-size: 24px; position: absolute; transform: translate(410%,-18%); background-color: #292929; border-radius: 50%; padding: 15px; box-shadow:0 2px 8px 3px rgba(0,0,0,0.50)}
		.product-title {padding-left:5px;font-size:15px; margin: 10px; color: white; white-space: nowrap; width: auto; overflow: hidden; text-overflow: ellipsis;}
		.product-title2 {padding-left:15px;font-size:15px; margin: 10px; color: white}
		[data-title]:hover::before {  content: attr(data-title); position: absolute; padding: 10px; background: #262626; border-radius: 15px; color: white; font-size: 14px; margin-top: 20px; margin-left: -10px}
		/*<------------------------------------------------------------------------------------------------->*/
		.single-product{text-align: center;}
		/*<------------------------------------------------------------------------------------------------->*/
		.pagiwrap {display: block;}
		.pagi {display: inline-block; margin-top: 25px;}
		.pagi a {color: white;float: left;padding: 8px 16px;text-decoration: none;box-shadow: 0 4px 9px 3px rgba(0,0,0,0.50)}
		.pagi a.active {background-color: #00ff7f;color: white;border: 1px solid #00ff7f;}
		/*<------------------------------------------------------------------------------------------------->*/
    .footer{bottom: 0;}
    .footer-2 {background-color: #1a1a1a; padding: 20px; margin-top: 30px; color:white; overflow: auto; border: none; border-top-right-radius: 8px; border-top-left-radius: 8px}
		.Introduce {width: 40%; float: left;}
		.FAQ {width: 30%; float: left; padding-left: 18px}
		.Contact {width: 30%; float:left; padding-left: 18px;}
		.footer3 {font-size: 20px; font-weight: bold;}
		/*<------------------------------------------------------------------------------------------------->*/
		.search {margin-top: 22px; margin-left: 490px;}
		.search-btn {border: none; border-radius: 8px; padding: 5px 15px; background-color: #00f06f; color: white; outline: none; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50)}
		.search-btn:hover {background-color: #ff5c33}
		/*<------------------------------------------------------------------------------------------------->*/
  		.title{padding-top:3px; padding-bottom: 3px;}
  		/*<------------------------------------------------------------------------------------------------------>*/
  		@media screen and (min-width: 2500px)
  		{
 
  		}
		@media screen and (max-width: 1800px) and (min-width: 1201px){
		.product-img { padding: 1px}
		.card-left {margin: 10px; margin: 25px;}
		.product-img img {max-width: 100%;}
		}
 		@media screen and (max-width: 1200px) and (min-width: 1000px)
  		{

  		}
		@media screen and (max-width: 999px) and (min-width:701px){

		}
		@media screen and (max-width:700px) and (min-width: 501px){

		}
		@media screen and (max-width: 500px) and (min-width: 291px)
		{

		}
		@media screen and (max-width: 300px)
		{

		}
.w1 {padding-top: 15px; padding-bottom: 15px; padding-right: 40px; padding-left: 40px}
.w2 {border-radius: 14px; padding: 18px}
.mySlides {height: 400px; max-width: 800px}
.mySlides2 {height: 400px; max-width: 800px}

.w3-display-bottomleft{position:absolute;left:0;bottom:0; font-size:18px!important; padding:0.01em 26px; padding-top:16px!important;padding-bottom:16px!important; color:#00ff7f!important; background-color: rgba(0,0,0, 0.6); border-radius: 18px; transform:translate(20%,-40%)}


.w3-content {margin-left: 200px; margin-right: 217px; position:relative}

.w3-button{border:none;padding: 10px 15px; color:#00ff7f!important;background-color:#262626!important; border-radius: 50%; outline: none;}
.w3-button:hover{color:#00ff7f!important;background-color:white!important}

.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,0%);-ms-transform:translate(0%,0%)}
.w3-display-left{position:absolute;top:50%;left:0%;transform:translate(0%,0%);-ms-transform:translate(0%,0%)}


/* ------------------------------------------------------------------------------------------------------------------------ */

.navbar {
  overflow: hidden;
}

.roww2 a {

  font-size: 16px;
  text-align: center;
  padding: 16px;
  text-decoration: none;
  color: white;
  display: block;

}

.dropdown {
  float: left; font-family: Arial, Helvetica, sans-serif
}

.dropbtn i {
  font-size: 26px;  
  color: white;
  padding: 8px 15px;

  margin-top: 15px;
}

.dropbtn {background-color: inherit;
  font: inherit;border: none;
  outline: none;}

.dropdown:hover .dropbtn i:hover{
  background-color: #1a1a1a; color: #00ff7f
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #1a1a1a;
  left: 0;
  padding: 16px;
  width: 16.79%;
  margin-left: 8px;
  border-bottom-right-radius: 15px;
  border-bottom-left-radius: 15px;
}


.dropdown:hover .dropdown-content {
  display: block;
}

/* Create three equal columns that floats next to each other */

.roww2 a:hover {
  background-color: #262626; color: #00ff7f; border-radius: 15px;
}

/* Clear floats after the columns */
.roww2:after {
  content: "";
  display: table;
  clear: both;
}



audio:focus {outline: none;}


.user-bar {float: right; padding: 15px; padding-right: 55px; font-size: 21px; margin-top: -40px}
.user-bar3 {background-color: inherit;
  font: inherit;border: none;
  outline: none; color: white;}
 .user-bar2:hover .user-bar3:hover {background-color: #1a1a1a; color: #00ff7f}
 .dropd {  display: none;
  position: absolute;
  background-color: #1a1a1a;
  right: 0;
  padding: 16px;
  width: 10%;
  margin-right: 9px;
  border-bottom-right-radius: 15px;
  border-bottom-left-radius: 15px;}
  .user-bar2:hover .dropd {display: block}
  .user-bar4 a:hover {background-color: #262626; color: #00ff7f; border-radius: 15px;}
  .user-bar4:after {  content: "";
  display: table;
  clear: both;}
  .user-bar4 a {  font-size: 16px;
  text-align: center;
  padding: 16px;
  text-decoration: none;
  color: white;
  display: block;}

  .user-bar3 i {padding-left: 15px;}

  .i-cart {padding-right: 10px; float: right; margin-top: -26px; font-size: 25px; color: white}
  .i-cart:hover {color: #00ff7f}






  .profile {box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80); padding: 15px; border-radius: 18px; width: 80%; background-color: #262626; float: left; padding-left: 309px; color: white; font-size: 20px}




  .p-u-btn {border-radius: 18px; border:none; box-shadow: 0 4px 5px 2px rgba(0,0,0,0.50); padding: 10px; background-color: #00ff7f; outline: none; float: right; margin-right: 35px; margin-bottom: 5px;  color: white; font-size: 16px}
  .p-u-btn:hover {background-color: #f30}

  input.p-u-btn[type="submit"] {border-radius: 18px; border:none; box-shadow: 0 4px 5px 2px rgba(0,0,0,0.50); padding: 10px; background-color: #00ff7f; outline: none; float: right; margin-right: 35px; margin-bottom: 5px; color: white}
  input.p-u-btn[type="submit"]:hover {background-color: #ff5c33}



.user-update {box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80); padding: 15px; border-radius: 18px; width: 80%; background-color: #262626; float: left; padding-left: 309px; color: white; font-size: 20px}
.user-update input {margin-left: 15px; border-radius: 18px; font-size: 15px; padding: 7px; outline: none; border:none; border:none; box-shadow: 0 4px 5px 2px rgba(0,0,0,0.50); padding-left: 9px}


.buy-btn {border:none;border-radius: 50%; width: 70px; height: 50px; background-color: #00f070; color: white; box-shadow: 0 4px 9px 0 rgba(0,0,0,0.80); outline: none; transform:translate(40%,-40%)}
.buy-btn:hover {background-color: #ff5c33}


.add-cart-btn button {border:none;border-radius: 50%; width: 70px; height: 50px; background-color: #00f070; color: white; box-shadow: 0 4px 9px 0 rgba(0,0,0,0.80); outline: none; transform:translate(250%,-20%)}
.add-cart-btn button:hover {background-color: #ff5c33}




.row2 {margin-top: 40px; background-color: #262626; float: left; padding: 40px; color: white; margin-bottom: 40px; border-radius: 18px; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); width: 100%}
#total {width:100%; display: block; border-top: 3px solid #f30; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); margin-bottom: 20px; float: left;}
#total2 {width:100%; display: block; border-top: 3px solid #00ff7f; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); margin-bottom: 20px; float: left; margin-top: 30px}
#total2 p {color: white; font-size: 20px; float: right; padding-right: 80px}
.border {animation-name: hot; animation-duration: 4s; animation-iteration-count: infinite; animation-direction: alternate-reverse; margin-top: -25px;}
.cl1 {float: left; padding-top: 8px; padding-bottom: 8px; padding-left: 13px; padding-right: 20px;text-align: center; width: 15%}
.cl2 {float: left; padding-top: 8px; padding-bottom: 8px; padding-left: 13px; padding-right: 20px;text-align: center; width: 18%}
.cl2 img {max-width: 120px; max-height: 120px; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); margin-bottom: 6px}

.cl1 a {text-decoration: none; border: none; color: white; background-color: #f30; padding: 10px; border-radius: 18px; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.20) }
.cl1 a:hover {background-color: #ff5c33;}

.row3 {margin-top: 40px; float: left; padding: 40px; color: white; margin-bottom: 40px; border-radius: 18px; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); width: 80%}
#total-pay {width:100%; display: block; border-top: 3px solid #00ff7f; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); margin-bottom: 20px; float: left;}
.left-pay {width: 100%; float: left; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); border-radius: 18px; padding: 25px;color: white; background-color: #262626}
.pay1 {float: left; padding-top: 18px; padding-bottom: 8px; padding-left: 13px; padding-right: 20px;text-align: center; width: 20%}
.pay1 img {max-width: 120px; max-height: 120px; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); margin-bottom: 6px}
.pay2 {float: left; padding-top: 28px; padding-bottom: 8px; padding-left: 13px; padding-right: 20px;text-align: center; width: 60%}

.p-i {padding-bottom: 12px; margin-left: 28%}

</style>
</head>
<body>


<!------------------------------------------------------------------------------------->
<!-- ------------------------------------------------Bar-------------------------------------------- -->
<div class="" style="background-color: #1a1a1a; overflow: auto; border-radius: 15px; width: 100%; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50)">

<div class="navbar">

  <a href="index.php" style="text-decoration: none; color: white; font-family: cursive; margin-left: 10px; font-size: 30px; float: left; padding: 14px 16px;">Music</a>

  <div class="dropdown">
    <button class="dropbtn"> 
    	<i class="fa fa-bars"></i>
    </button>
    <div class="dropdown-content">
      <div class="roww2">
        
          <a href="index.php">Home</a>

      </div>
    </div>
  </div> 

		<div class="search">
      		<form id="search-form" method="GET" action="search.php">
          	<input  class="search-bar" type="text" name="search" placeholder="Search..." style="border: none; border-radius: 8px; padding-top: 5px; padding-bottom: 5px; padding-left: 5px ; outline: none; box-shadow: 0 4px 15px 6px rgba(0,0,0,0.50);" size="35">
          	<button class="search-btn" type="submit">Search</button>

      		</form>
  		</div>
  	<?php
  	if ($a == 0)
  	{
  	?>
	<div class="login">

		<a href="register.php">Sign Up</a>
		<a href="login.php">Sign In</a>

	</div>
	<?php
	}
	else
	{

		$sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT User_ID FROM user where User_Name='$Uname'"));

	?>

		<div class="user-bar">
			  <div class="user-bar2">
    			<button class="user-bar3">
    				<?php echo $Uname?><i class="fa fa-unsorted"></i>
    			</button>
    			<div class="dropd">
      				<div class="user-bar4">
        
         				 <a href="user-profile.php?id=<?php echo $sql['User_ID']?>">Profile</a>
         				 <a href="logout.php">Sign Out</a>

      				</div>
    			</div>
  			</div> 
		
		</div>
    <a href="cart.php" class="i-cart"><i class="fa fa-shopping-cart"></i></a>


	<?php
	}
	?>


</div>

</div>

