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

    $id=(int)$_GET['Id'];
    $sql="select * from items where Id='$id'";
    $ret=mysqli_query($conn,$sql);
while($res=mysqli_fetch_assoc($ret)){
	$id=$res['Id'];
	$name=$res['Name'];
	$price=$res['Price'];
	$categ=$res['Category'];
	$cus=$_SESSION['User'];
$sql2="INSERT INTO orders (Id,Name,Price,Customer)VALUES('$id','$name','$price','$cus')";
$ret2=mysqli_query($conn,$sql2);
}
header('Location:Index.php');	

?>