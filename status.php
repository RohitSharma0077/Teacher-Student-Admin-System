<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');
	// echo "session not yet started";
}
?>


<?php

$studentname=$_SESSION['user'];

$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

if (!$conn) {

	die("connection error".mysqli_connect_error());
}


if (isset($_POST["accept"])) {

$accept=$_POST['accept'];

$sql="insert into status values(NULL, '$studentname', 'Accepted')";
mysqli_query($conn,$sql);
}


else if  (isset($_POST["reject"])) {

	$sql="insert into status values(NULL, '$studentname', 'Rejected')";
mysqli_query($conn,$sql);
	
}
header("location:student_home.php");


?>