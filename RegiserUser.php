<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "furniture store";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
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
 <div class = "container">
  <div class = "row">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-dark">Full Name</label>
        <input type="text" name = "fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Enter Your Name">
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder = "Enter Email">
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder = "Username">
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Password</label>
        <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder = "password">
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Re-Password</label>
        <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder = "Re-Password">
    </div>
     <button type="submit" class="btn btn-primary" name="register">Register</button>
      </form>
	  <?php
	  
	  	    if(isset($_POST['register'])){
		     $fullname = $_POST['fullname'];
			 $email = $_POST['email'];
			 $username = $_POST['username'];
			 $password1 = $_POST['password1'];
			 $password2 = $_POST['password2'];
			 if($password1==$password2){
				 $sql = "INSERT INTO users(fullname,email,Messages,username,password)VALUES('$fullname','$email','','$username','$password1')";
				 $quer = mysqli_query($conn,$sql);
				 if($quer){
					echo "Registered Successfully"; 
				 }else{
					 echo "Failed Registered".$sql."<br>".mysqli_error($conn);
				 }
			 }
			
		}
		mysqli_close($conn);	
	 ?>
  </div>
 </div>
  <footer class = "footer">
    <div class = "col-lg-6">
      <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
     <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label text-white" for="exampleCheck1">Check me out</label>
     </div>
     <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <div class = "col-lg-6">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22632.638576890895!2d35.82816790657881!3d32.51648128717744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151c771d00e253af%3A0x4abd9893ea55e804!2sAydoun%20Park!5e0!3m2!1sen!2sjo!4v1670333201976!5m2!1sen!2sjo" class = "rounded" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </footer>
</body>
</html>
