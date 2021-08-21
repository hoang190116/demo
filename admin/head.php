<?php 
	session_start(); //khoi tao session => có thể sử dụng dc biến $_SESSION  

	if( !empty( $_SESSION['user2'] ) ){
  }
  else{

		header('Location:login.php'); //dieu huong toi trang login.php
		die;

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style>
* {
margin:0;
  padding:0;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
}

.header h1 {
  font-size: 30px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
    background-color: #333;

  text-align: center;
  text-decoration: none;
  display:inline-block;
  padding: 25px;
  margin-left: 10px;
}


/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}




/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}
.product-image{
  max-width: 100%;
  padding:10px;

}

.product-image img{
  max-width:100%;
  height:auto;
}

.single-product{
  text-align: center;
}


/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

.product{
    background-color: #3333;
    padding: 10px;
    margin: 5px;
    width: 28%;
    float: left;
    text-align: center;
    text-decoration: none;
}
.product-price{
  color:red;

}

.product-title{
  font-size:16px;
  margin:0px;

}
/* Clear floats after the columns */


/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
  width:100%;
  display: inline-block;
  float:left;
}

.footer:after{
	content : "";
	display: table;
	clear:both;
}
.list{
    padding: 10px;
    float: left;
}

.Picture-admin{
  max-width: 120px;
}

table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  text-align: center;
  padding: 15px;
}

.form input{
  width:50%;
  display: inline-block;
  float:none;
  padding:10px;
}

.form label{
  margin-top: 10px;
  width:50%;
  display: inline-block;
}

.form textarea{
  width:80%;
  display: inline-block;
  padding:15px;
  height: 100px;
}



.anhsp{
  max-width: 200px;
  height:auto;
  float:left
}
	</style>
</head>
<body>
<!-- ----------------------------------------Login---------------------------------------- -->
<div class="header">
  <h1>Admin Page</h1>
</div>

  	<!-- navigation -->
	<div class="topnav">

	  <a href="index.php">Product Management</a>
	  <a href="add.php">Add Product</a>
	  <a href="user.php">User</a>
	  <!-- <a href="singer.php">Singer</a> -->
	  <!-- <a href="singer-add.php">Add Singer</a> -->
    <a href="order.php">Order</a>
	  <a href="logout.php" style="float: right; margin-right: 10px">Sign Out</a>


	<!-- END navigation -->
  </div>
 <!-- END left column -->
<!------------------------------------------------------------------------------------->


