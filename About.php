<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "furniture store";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
	}else{
	
	}


?>
<html>
<head>
<title>Bootstrap CDN</title>
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
          <a class="nav-link active" aria-current="page" href="Index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Furniture Types
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="BedRoom.php">BedRoom</a></li>
            <li><a class="dropdown-item" href="LivingRoom.php">LivingRoom</a></li>
			<li><a class="dropdown-item" href="Kitchen.php">Kitchen</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">All Types</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search for device" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
 <div class = "container mt-5">
  <div class = "row">
    <div class="col-md-12">
	<img src="images/P.pic.jpg" style="width:380px;height:auto;" class="img-thumbnail mx-auto d-block rounded">
	</div>  
	<div class="text-center">
	<iframe src="CV.html" style="height:200px;width:100%;"></iframe>
	</div>
  </div>
 </div>
</body>
</html>
Hello Dear, You are visiting my first project I built from scratch, 
		                                       I'm a begginer web developer who's looking an opportunity where I can add value