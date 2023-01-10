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
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search for device" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
 <div class = "container">
  <h3>Messages</h3>
  <div class = "row">
      <table class="table table-borderless table-hover table-striped">
	  <thead>
	  <tr>
	  <th>Id</th>
	  <th>fullname</th>
	  <th>email</th>
	  <th>message</th>
	  </tr>
	  </thead>
	  <?php
	    $sql = "SELECT * FROM users";
        $ret = mysqli_query($conn,$sql);
        while($res=mysqli_fetch_assoc($ret)){
			echo '
			<tbody>
			<tr>
			<td>'.$res['Id'].'</td>
			<td>'.$res['fullname'].'</td>
			<td>'.$res['email'].'</td>
			<td>'.$res['Messages'].'</td>';
			echo '</tr>'
			        ;
		}
		?>
		</tbody>
	  </table>
	  
  </div>
 </div>
 <div class="container">
 <h3>Orders</h3>
   <div class="row">
   <table class="table table-borderless table-striped table-hover">
   <thead>
   <th>Product Id:</th>
   <th>Product name:</th>
   <th>Product Price:</th>
   </thead>
   <?php
   $sql2="SELECT * FROM orders";
   $ret=mysqli_query($conn,$sql2);
   while($res=mysqli_fetch_assoc($ret)){
	
   echo '<tbody>
   <td>'.$res['Id'].'</td>
   <td>'.$res['Name'].'</id>
   <td>'.$res['Price'].'</id>
   </tbody>';
   }
   ?>
   
   </table>
   </div>
 </div>
</body>
</html>