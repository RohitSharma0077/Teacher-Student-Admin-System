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

	$sname=$_POST['sname'];
	$semail=$_POST['semail'];
	$tname=$_POST['tname'];

	$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

	if (!$conn) {
		
		die("connection error".mysqli_connect_error());
	}

	$sql="insert into assign values(NULL, '$sname', '$semail', '$tname')";
	mysqli_query($conn,$sql);
}
header("location:admin_home.php");

?>