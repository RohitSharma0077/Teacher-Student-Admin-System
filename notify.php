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

	$from=$_POST['from'];
	$msg=$_POST['msg'];

	$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

	if (!$conn) {
		
		die("connection error".mysqli_connect_error());
	}

	$sql="insert into notify values(NULL, '$from', '$msg')";
	mysqli_query($conn,$sql);
}

header("location:teacher_home.php");

?>