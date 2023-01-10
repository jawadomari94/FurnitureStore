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
        <img src="../images/<?php echo $pic; ?>" style="height:auto;width:180px;" class="mx-auto d-block">
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
			$Uploadsdir = '../images/';
			$Uploadfile = $Uploadsdir.basename($_FILES['filetoupload']['name']);
			if(move_uploaded_file($_FILES['filetoupload']['tmp_name'],$Uploadfile)){
			
				
				if($filetoupload=='')
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$pic',Category='$categ' WHERE Id='$id'";
			else
				$sql = "UPDATE items SET Name='$name',Price='$price',Description='$descrip',Picture='$filetoupload',Category='$categ' WHERE Id='$id'";
			   if(mysqli_query($conn,$sql)){
					echo "Updated Successfully";
					echo '<script>window.location.href="Edit.php?Id='.$id.'"</script>';
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
</body>
</html>
