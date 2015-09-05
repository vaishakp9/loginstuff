<?php 
session_start();
if(!isset($_SESSION["user_login"])){
	$username="";
}
else
{
	$username=$_SESSION["user_login"];
}
include("./inc/connect.inc.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>AppName</title>
	<link rel="stylesheet" 	type="text/css" href="./css/style.css" />
</head>
<body>
	<div class="headerMenu">
		<div id="wrapper">
			<div class="logo">
				<img src="./img/logo1.png" />
			</div>
			<div class="search_box">
				<form action="search.php" method="GET" id="search">
					<input type="text" name="query" size="60" placeholder="Search"/>
				</form>
			</div>
			<?php if ($username){echo '
			<div id="menu">
				<a href="'.$username.'" />Profile</a>
				<a href="account_settings.php" />Account Settings</a>
				<a href="logout.php" />Logout</a>
				
				
		</div>'; }
		else
		{
			echo '
			<div id="menu">
				<a href="#" />Home</a>
				<a href="#" />About</a>
				<a href="#" />Sign Up</a>
				<a href="#" />Sign In</a>
				
		</div>';
		} ?>

	</div>
</div>
<br>