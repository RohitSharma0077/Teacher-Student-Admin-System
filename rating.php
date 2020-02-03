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

	$from=$_SESSION['user'];
	$to=$_POST['toteacher'];
	$facultyemail=$_POST['facultyemail'];
	$rate=$_POST['rate'];
	
	$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

	if (!$conn) {
		
		die("connection error".mysqli_connect_error());
	}

	$sql="insert into rating values(NULL, '$from', '$to','$facultyemail', $rate)";

	mysqli_query($conn,$sql);
}

header("location:student_home.php");

?>