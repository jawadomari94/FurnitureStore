<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "furniture store";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
	}else{
	echo "Connected successfully";
	}
$id=(int)$_GET['Id'];
$sql="SELECT * FROM items WHERE Id='$id'";
$ret=mysqli_query($conn,$sql);
while($res=mysqli_fetch_assoc($ret)){
	$name=$res['Name'];
	$price=$res['Price'];
	$descrip=$res['Description'];
	$pic=$res['Picture'];
	$categ=$res['Category'];
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
      <form method="post" enctype="multipart/form-data" action="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-dark">Product Name</label>
        <input type="text" name = "mname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $name; ?>">
      </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Price</label>
        <input type="text" name="mprice" class="form-control" id="exampleInputPassword1" value="<?php echo $price; ?>">
    </div>
	<div class = "mb-3">
	<label class="form-label text-dark">Category</label>
	<select name="categ">
	<option value="<?php echo $categ; ?>"><?php echo $categ; ?></option>
	<option value="BedRoom">BedRoom</option>
	<option value="LivingRoom">LivingRoom</option>
	<option value="Kitchen">Kitchen</option>
	</select>
	</div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Product Description</label>
        <textarea type="text" name="mdescrip" class="form-control" id="exampleInputPassword1" placeholder = "Enter Product Description"><?php echo $descrip; ?></textarea>
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Current Picture</label>
        <img src="images/<?php echo $pic; ?>" style="height:auto;width:180px;" class="mx-auto d-block">
    </div>
	<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-dark">Picture</label>
        <input type="file" name="filetoupload" class="form-control" id="exampleInputPassword1">
    </div>
     <button type="submit" class="btn btn-primary" name="edit">Update</button>
      </form>
	  <?php
	  	    if(isset($_POST['edit'])){
			    $name = $_POST['mname'];
				$price = $_POST['mprice']; 
				$categ = $_POST['categ'];
				$descrip = $_POST['mdescrip'];
				$filetoupload = $_FILES['filetoupload']['name'];
			$Uploadsdir = 'images/';
			$Uploadfile = $Uploadsdir.basename($_FILES['filetoupload']['name']);
			if(move_uploaded_file($_FILES['filetoupload']['tmp_name'],$Uploadfile)){
			
				
				if($filetoupload=='')
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$pic',Category='$categ' WHERE Id='$id'";
			else
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$filetoupload',Category='$categ' WHERE Id='$id'";
			   if(mysqli_query($conn,$sql)){
					echo "Updated Successfully";
					echo '<script>window.location.href="Edit.php?Id='.$$id.'"</script>';
				}else{
					echo "error".mysqli_error($sql);
				}
			}else{
				if($filetoupload=='')
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$pic',Category='$categ' WHERE Id='$id'";
			else
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$filetoupload',Category='$categ' WHERE Id='$id'";
			   if(mysqli_query($conn,$sql)){
					echo "Updated Successfully";
				}else{
					echo "error".mysqli_error($sql);
				}
			}
			
		}
			
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
