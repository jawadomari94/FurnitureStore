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
$id=$_GET['Id'];
$sql="DELETE FROM items WHERE Id='$id'";
$ret=mysqli_query($conn,$sql);
if($ret)
	header("Location:Items.php");


?>