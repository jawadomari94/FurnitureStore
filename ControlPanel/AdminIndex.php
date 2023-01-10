<?php
session_start();
if($_SESSION['checkadmin']==0){
	header('Location:Index.php');
}
?>
<html>
<head>
<title>Control Panel</title>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.
css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bund
le.min.js"></script>
</head>
<style>
.navbar-expand-lg{
	background-color:#444;
}
.navbar-light .navbar-brand{
	color:#ffffff;
}
.navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link{
	color:#ffffff;
}
body{
	background-color:#f0f0f0;
}
.col-lg-4{
	background-color:#ffffff;
	margin-top:20px;
	width:360px;
	margin:10px;
}
.thumbnail{
	width:90%;
	margin:10px;
	padding:20px;
	background-color:#ffffff;
}
.footer{
	width:100%;
	height:370px;
	background-color:#444;
}
form{
	padding-left:30px;
	padding-top:10px;
}
.col-lg-6{
	float:left;
	padding-right:60px;
	margin-top:50px;
}

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Furniture Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="AdminIndex.php">Home</a>
        </li>
		  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Logout.php">Logout</a>
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>
 <div class = "container mt-3">
 <div class = "row">
        
	    <div class = "col-lg-4 col-sm-12 col-sm-12 rounded">
	    <div class = "thumbnail">
		<br>
		<b><p class = "text-center">Add New Product</p></b>
	    <img src = "../images/Background.jpg" class = "img-thumbnail rounded">
	    <hr>
	<center><a href = "AddItem.php" type = "button" class = " btn btn-danger">Add</a></center>
	    </div>
    </div>
	<div class = "col-lg-4 col-sm-12 col-sm-12 rounded">
	    <div class = "thumbnail">
		<br>
		<b><p class = "text-center">Update A Product</p></b>
	<img src = "../images/Background.jpg" class = "img-thumbnail rounded">
	<hr>
	<center><a href = "Items.php.php" type = "button" class = " btn btn-danger">Update</a></center>
	    </div>
    </div>
	<div class = "col-lg-4 col-sm-12 col-sm-12 rounded">
	    <div class = "thumbnail">
		<br>
		<b><p class = "text-center">Delete A Product</p></b>
	<img src = "../images/Background.jpg" class = "img-thumbnail rounded">
	<hr>
	<center><a href = "Items.php.php" type = "button" class = " btn btn-danger">Delete</a></center>
	    </div>
    </div>
 <div class = "col-lg-4 col-sm-12 col-sm-12 rounded">
	    <div class = "thumbnail">
		<br>
		<b><p class = "text-center">Display Messages & Orders</p></b>
	    <img src = "../images/Background.jpg" class = "img-thumbnail rounded">
	    <hr>
	<center><a href = "Messeges.php" type = "button" class = " btn btn-danger">Display</a></center>
	    </div>
     </div>  
  
</body>
</html>