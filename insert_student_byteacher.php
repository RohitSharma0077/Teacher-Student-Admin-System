<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');
	// echo "session not yet started";
}
?>


<?php

if (isset($_POST["submit"])) {

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

	if (!$conn) {
		
		die("connection error".mysqli_connect_error());
	}

	$sql="insert into student values(NULL, '$name', '$email', '$password')";
	mysqli_query($conn,$sql);
}
header("location:teacher_home.php");

?>