 <!-- =============Default value given to Admin -->
 <!-- $sql="insert into admin_self values('rs', 'r1@gmail.com', 'pass')";  -->



 <?php
 session_start();

 ?>


 <?php
 if (isset($_POST["submit"])) {

 	$name=$_POST['name'];
 	$email=$_POST['email'];
 	$password=$_POST['password'];
 	$type=$_POST['selected'];

	//=============================== take the value of user and send to session global variable ========================
 	$_SESSION['user']=$name;

 	$conn=mysqli_connect("localhost","root","Toor@123","Msystem");
 	if (!$conn) {

 		die("connection error".mysqli_connect_error());
 	}


 	if ($type=='Admin') {

 		$sql="select password from admin_self where name='$name'";
 		$request=mysqli_query($conn,$sql);
 		$result=mysqli_fetch_assoc($request);
 		$returnpass=$result['password'];

 		if ($returnpass==$password) 

 		{
 			header("location:admin_home.php");
 		}

 		else{

 			echo "<script>alert('invalid input')</script>";
 			include 'index.php';
 		}
 		
 	}


 	else if($type=='Teacher') {

 		// echo "<script>alert('teacher login')</script>";


 		$sql="select password from teacher where name='$name'";
 		$request=mysqli_query($conn,$sql);
 		$result=mysqli_fetch_assoc($request);
 		$returnpass=$result['password'];

 		if ($returnpass==$password) 

 		{
 			header("location:teacher_home.php");
 			// echo "<script>alert('teacher login')</script>";
 		}

 		else{

 			echo "<script>alert('invalid input')</script>";
 			include 'index.php';
 		}

 	}


 		else if($type=='Student') {

 		// echo "<script>alert('student login')</script>";


 		$sql="select password from student where name='$name'";
 		$request=mysqli_query($conn,$sql);
 		$result=mysqli_fetch_assoc($request);
 		$returnpass=$result['password'];

 		if ($returnpass==$password) 

 		{
 			header("location:student_home.php");
 			// echo "<script>alert('student login')</script>";
 		}

 		else{

 			echo "<script>alert('invalid input')</script>";
 			include 'index.php';
 		}

 	}



 	mysqli_close($conn);
 }

 ?>