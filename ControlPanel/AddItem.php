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
if($_SESSION['checkadmin']==0){
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
 <div class = "container">
  <div class = "row">
      <form method="post" enctype="multipart/form-data" action="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-dark">Product Name</label>
        <input type="text" name = "mname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "Enter Product Name">
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Price</label>
        <input type="text" name="mprice" class="form-control" id="exampleInputPassword1" placeholder = "Enter Price">
    </div>
	<div class = "mb-3">
	<label class="form-label text-dark">Category</label>
	<select name="categ">
	<option value="BedRoom">BedRoom</option>
	<option value="LivingRoom">LivingRoom</option>
	<option value="Kitchen">Kitchen</option>
	</select>
	</div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Product Description</label>
        <textarea type="text" name="mdescrip" class="form-control" id="exampleInputPassword1" placeholder = "Enter Product Description"></textarea>
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Picture</label>
        <input type="file" name="filetoupload" class="form-control" id="exampleInputPassword1">
    </div>
     <button type="submit" class="btn btn-primary" name="add">Add</button>
      </form>
	  <?php
	  	    if(isset($_POST['add'])){
			$Uploadsdir = '../images/';
			$Uploadfile = $Uploadsdir.basename($_FILES['filetoupload']['name']);
			if(move_uploaded_file($_FILES['filetoupload']['tmp_name'],$Uploadfile)){
				$name = $_POST['mname'];
				$price = $_POST['mprice']; 
				$categ = $_POST['categ'];
				$descrip = $_POST['mdescrip'];
				$filetoupload = $_FILES['filetoupload']['name'];
				$sql = "INSERT INTO items(Name,Price,Description,Picture,Category) 
				        VALUES('$name','$price','$descrip','$filetoupload','$categ')";
			   if(mysqli_query($conn,$sql)){
					echo "Added Successfully";
				}else{
					echo "Error";
				}
			}
			
		}
			
	 ?>
  </div>
 </div>
</body>
</html>
