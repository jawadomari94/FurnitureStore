<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "furniture store";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
	}

session_start();


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
    <a class="navbar-brand" href="#">Furniture Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Index.php">Home</a>
        </li>
		<?php
		if($_SESSION['User']!='')
			echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Logout.php">Logout</a>
        </li>';
		?>
		
		<?php
		if($_SESSION['User']=='')
			echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="RegiserUser.php">Register</a>
        </li>';
		?>
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
 <div class = "container">
  <div class = "row">
     <h1 class="text-center">Please Register to Check the product</h1>
  </div>
 </div>
    <footer class = "footer">
    <div class = "col-lg-6">
      <form action="" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1"  class="form-label text-white">Username</label>
        <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
    </div>
     <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label text-white" for="exampleCheck1">Check me out</label>
     </div>
     <input type="submit" name="signin" class="btn btn-primary" value="Login">
	  <?php
	    if(isset($_POST['signin'])) {
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			
			$sql="select * from users where username='$user' and password='$pass'";
			$ret=mysqli_query($conn,$sql);
			while($res = mysqli_fetch_assoc($ret)){
				$_SESSION['User']=$user;
				echo '<script>window.location.href="Index.php"</script>';
			}
			echo "<b><p class = text-center style=color:#ffffff;>Login Failed</p></b>";
		}
		
	  
	  ?>
      </form>
</body>
</html>
