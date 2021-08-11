<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style>
		body {background-image: url('img/back1.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; margin-bottom: 0;}
		*{box-sizing: border-box;}
		/*<------------------------------------------------------------------------------------------------->*/
		.logo {float: left;}
		ul-login {list-style-type: none;}
		li-login {float: right;}
		li-login a {padding: 10px; display: block; text-decoration: none; color: white; border: 1px solid white; border-radius: 4px; margin: 10px;box-shadow: 0 4px 9px 0 rgba(0,0,0,0.50)}	
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
		.bar a {float: left; padding:15px; display: block; text-decoration: none; color: white;}
		.bar a.active {background-color: #00ff7f; border-radius: 15px; border: 0px solid #f30;}
		.bar a:hover:not(.active) {background-color: #00ff7f; border-radius: 15px; border: 0px solid #f33;}
		/*<------------------------------------------------------------------------------------------------->*/
		.leftcolumn {float: left; width: 79%;border-radius: 14px; box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80); margin-top: 65px;}
		.leftcolumn-2 {float: left; width: 80%; padding: 15px}
		.rightcolumn {float: right; width: 19%; border-radius: 14px; box-shadow: 0 4px 15px 5px rgba(0,0,0,0.80)}
		.card-right {padding: 20px; margin: 20px; color: white; text-align: center;}
		.card-left {background-color: #262626; padding: 15px; margin: 20px; float: left; width: 20%; text-align: center; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50); border-radius: 45%}
		.row:after {content: ""; display: table; clear: both;}
		.row {margin-top: 15px; }
		/*<------------------------------------------------------------------------------------------------->*/
		.product-img{ max-width: 100%; padding: 10px;}
		.product-img img{ width: auto; height: 115px; border-radius: 50%;}
		.product{height: auto; overflow: hidden; text-decoration: none;}
		.product-price{color:white; font-weight: bold;}
		.product-title{font-size:15px; margin: 10px; color: white;}
		/*<------------------------------------------------------------------------------------------------->*/
		.single-product{text-align: center;}
		/*<------------------------------------------------------------------------------------------------->*/
		.pagiwrap {display: block;}
		.pagi {display: inline-block; margin-top: 25px;}
		.pagi a {color: white;float: left;padding: 8px 16px;text-decoration: none;box-shadow: 0 4px 9px 3px rgba(0,0,0,0.50)}
		.pagi a.active {background-color: #00ff7f;color: white;border: 1px solid #00ff7f;}
		/*<------------------------------------------------------------------------------------------------->*/
		.footer:after {display: table; clear: both;}
		.footer-2 {background-color: #1a1a1a; padding: 20px; margin-top: 30px; color:white; overflow: auto; border: 3px solid #1a1a1a; border-radius: 8px;}
		.Introduce {width: 40%; float: left;}
		.FAQ {width: 30%; float: left; padding-left: 18px}
		.Contact {width: 30%; float:left; padding-left: 18px;}
		.footer3 {font-size: 20px; font-weight: bold;}
		/*<------------------------------------------------------------------------------------------------->*/
		.search {float:right; margin-top: 12px; margin-right: 15px; padding-bottom:10px; padding-left: 5px;}		
		/*<------------------------------------------------------------------------------------------------->*/
		 #total{width:100%; background: #f30; display: block; float:none; text-align: center; border-bottom: 3px solid #f30; border-radius: 8px;}
  		.clearfix{overflow: auto;}
  		.title{padding-top:3px; padding-bottom: 3px;}
  		/*<------------------------------------------------------------------------------------------------------>*/
  		@media screen and (min-width: 2500px)
  		{
  			body {font-size: 40px;}
  			.footer3 {font-size: 40px}
  			.product-title {font-size: 40px}
  			.product-img img{max-width: 100%; max-height: 200px;}
  			.card-left {padding: 45px; margin: 45px}
  			.pagi {margin-bottom: 25px;}
  			.bar a {padding: 40px}
  			.search {margin-top: 35px;}
  			.search-bar {padding: 5px; font-size: 30px;}
  			.search-bottom {padding: 5px; font-size: 30px;}
  			.login {padding-top: 60px}
  		}
		@media screen and (max-width: 1800px) and (min-width: 1201px){
		.product-img { padding: 1px}
		.card-left {margin: 10px; margin: 25px;}
		.product-img img {max-width: 100%;}
		}
 		@media screen and (max-width: 1200px) and (min-width: 1000px)
  		{
  			body {font-size: 20px;}
  			.product-title {font-size: 20px}
  			.footer3 {font-size: 20px}
  		}
		@media screen and (max-width: 999px) and (min-width:701px){
		.rightcolumn {width: 24%;}
		.leftcolumn {width:75%}
		.card-left {width: 37.5%; margin: 30px; padding:15px;}
		.product-img {padding: 1px;}
		.product-img img {width: 45%; max-height: 90px;}
		.product-title {margin: 3px;}
		}
		@media screen and (max-width:700px) and (min-width: 501px){
		.rightcolumn {width: 24%;}
		.leftcolumn {width:75%}
		.card-left {width: 37.5%; margin: 28px; padding:15px;}
		.product-img {padding: 1px;}
		.product-img img {width: 55%; max-height: 75px;}
		.product-title {margin: 1px;}
		}
		@media screen and (max-width: 500px) and (min-width: 291px)
		{
		.rightcolumn {width: 100%; margin-top: 50px;}
		.leftcolumn {width: 100%; padding: 10px; margin: 0;}
		.card-left {width: 45.5%; margin: 6px; padding: 15px;}
		.product-img img {max-height: 90px;}
		.product-title {font-size: 9px;}
		.search, .logo {float: none;}
		ul-login {float: right;}
		.FAQ, .Introduce, .Contact {float: none; width: 100%; padding: 15px;}
		.search {padding-top: 50px}
		.product-title {font-size: 14px}
		}
		@media screen and (max-width: 300px)
		{
		.rightcolumn {width: 100%; margin-top: 50px;}
		.leftcolumn {width: 100%; padding: 10px; margin: 0;}
		.card-left {width: 45.5%; margin: 5px; padding: 15px;}
		.product-img img {max-height: 52px; max-width: 80%;}
		.product-title {font-size: 10px;}
		.product-price {font-size: 12px;}
		.search, .logo {float: none;}
		ul-login {float: right;}
		.FAQ, .Introduce, .Contact {float: none; width: 100%; padding: 15px;}
		.search {padding-top: 50px}	
		.product-title {font-size: 10px;}
		}
.w1 {}
.w2 {border-radius: 14px; padding: 18px}
.mySlides {height: 400px; max-width: 800px}
.mySlides2 {height: 450px; max-width: 1038px}

.w3-display-bottomleft{position:absolute;left:0;bottom:0; font-size:18px!important; padding:0.01em 26px; padding-top:16px!important;padding-bottom:16px!important; color:#00ff7f!important; background-color: rgba(0,0,0, 0.6); border-radius: 18px; transform:translate(20%,50%)}


.w3-content {position:relative}

.w3-button{border:none;padding: 10px 15px; color:#00ff7f!important;background-color:#262626!important; border-radius: 50%; outline: none;}
.w3-button:hover{color:#00ff7f!important;background-color:white!important}

.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,0%);-ms-transform:translate(0%,0%)}
.w3-display-left{position:absolute;top:50%;left:0%;transform:translate(0%,0%);-ms-transform:translate(0%,0%)}

	</style>
</head>
<body>	
<!-- ----------------------------------------Login---------------------------------------- -->
<div class="logo-login">
	<div class="logo">
	<h1 style="font-family: cursive; margin-left: 50px;">
		<a href="index.php" style="text-decoration: none; color: white;">Music</a>
	</h1>
	</div>
	<div class="login">
		<ul-login>
			<li-login><a href="register.php">Sign Up</a></li-login>
			<li-login><a href="login.php">Sign In</a></li-login>
		</ul-login>
	</div>
</div>
<!-- ------------------------------------------------Bar-------------------------------------------- -->
<div class="bar" style="background-color: #1a1a1a; overflow: auto; border-radius: 15px; width: 100%; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50)">
		<a href="index.php" class="active">Home</a>
		<a href="#">News</a></li-bar>
		<a href="#">Library</a>
		<div class="search">
      		<form id="search-form" method="GET" action="search.php">
          	<input  class="search-bar" type="text" name="search" placeholder="		     Input" style="border: 1px solid #1a1a1a; border-radius: 8px; padding: 3px 15px; outline: none">
          	<button class="search-bottom" type="submit" style="border: none; border-radius: 8px; padding: 3px 15px; background-color: #00f06f; color: white; outline: none; box-shadow: 0 4px 9px 4px rgba(0,0,0,0.50)
          	">Search</button>

      		</form>
  		</div>
</div>
<!------------------------------------------------------------------------------------->


