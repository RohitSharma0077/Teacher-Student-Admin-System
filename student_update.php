<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');
	// echo "session not yet started";
}
?>

<?php

$conn=mysqli_connect("localhost","root","Toor@123","Msystem");

if (!$conn) {
	
	die("connection error".mysqli_connect_error());
}


if(isset($_POST['submit']))
{

	extract($_POST);

	$sql="Update student set name='$name' , email='$email',  password='$password' where id=$id ";
	mysqli_query($conn,$sql);
}

header("location:admin_home.php");
?>
