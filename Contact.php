<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "furniture store";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
	}else{
	//echo "Connected successfully";
	}


session_start();
if($_SESSION['User']==''){
	header('Location:Index.php');
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
	height:350px;
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
    <a class="navbar-brand" href="Index.php">Furniture Store</a>
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
            <li><a class="dropdown-item" href="Index.php">All Types</a></li>
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
 <div class = "container">
  <div class = "row">
      <form method="post" action="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-dark">Full Name</label>
        <input type="text" name = "fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Enter Your Name">
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder = "Enter Email">
    </div>
	  <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Write Your Message</label>
        <textarea type="text" name="message" class="form-control" id="exampleInputPassword1" placeholder = "Message"></textarea>
    </div>
	<div class="container-mt-3">
     <button type="submit" class="btn btn-primary d-grid" name="send">Send</button>
	 </div>
      </form>
	  <?php
	  if(isset($_POST['send'])){
		  $name=$_POST['fullname'];
		  $email=$_POST['email'];
		  $message=$_POST['message'];
		  $sql="UPDATE users SET Messages='$message' WHERE fullname='$name'";
		 if(mysqli_query($conn,$sql)){
			  echo "<p>Your Message Received, We will respond you soon by email</p>";
		  }else{
			  echo "error".$sql.mysqli_error($conn);
		  }
	  }
	 ?>
  </div>
 </div>
  <footer class = "footer">
  </footer>
</body>
</html>
