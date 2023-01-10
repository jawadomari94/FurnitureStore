<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "mobilestore";


$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("connection failed".mysqli_connect_error);
		
	}else{
	echo "Connected successfully";
	}
	mysqli_close($conn);	

?>

