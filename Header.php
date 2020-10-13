<?php
session_start();
  include 'Welcome.php';
if(!empty($_SESSION['login_user'])==null){
 header("location:Logout.php");
}
?> 
<!DOCTYPE html>
<html>
<head><link href="Home.css" rel="stylesheet">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:300'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>


<body>

<header>

<h2> E-commerce Solution </h2>
</header>

<div class="nav">
    <a href="Home.php">Dashboard</a>
    <a href="Community.php">Community</a>
    <a href="Logout.php" style="float:right">Logout</a>
    <a href="customerinfo.php">User/Admin</a>
	<div class="search-container">
    <form action="search.php" method="POST">
      <input type="text" placeholder="Search.." name="search" style="font-family:Lato">
      <button type="submit" style="font-family:Lato">Go</button>
    </form>
  </div>


</div>

<h4 class="shimmer" style="float:right"><b><i class="fa fa-user" ></i> <?php echo  $_SESSION['login_user']?></b></h4>
</body>