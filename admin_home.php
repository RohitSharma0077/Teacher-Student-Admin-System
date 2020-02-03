<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');

}
?>

<!DOCTYPE html>
<html>
<head>



	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- fonawesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/portfolio.png" type="image/gif">


	<title>Home</title>

	<style type="text/css">

		body{
			background: linear-gradient(to right,#369693,transparent,#369693);
			/*background-image: url(bg7.jpg);*/
		}

		#dest{
			text-decoration: none;
			color: black;
			background-color: rgba(0,0,0,0.3);
			padding: 4px 3px;
			border-radius: 3px;
			color: white;
			font-style: bolder;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

		#img_css{
			width:70px;
			height: 30px;
		}

		
	</style>



</script>

</head>
<body>



	<?php	

	echo "	<center><h3><b><span style='position:absolute; margin-left:-5%;'>Admin Panel</span?</b></h3></center>";

	echo "<span style='position:; margin-left: 83%; '>";
	echo "<mark><b>Welcome: </b>" .$_SESSION["user"]."</mark>";
	echo "</span>";


	echo "<span style='position:relative; margin-left: 1%;'>";
	echo "<a href='logout.php' id='dest'>Logout</a>";
	echo "</span>";




	?>

	<hr>

	<!--===================== Php code for fetching data of "rating table" from db and show on web page ===========================-->
	<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
	if (!$conn) {
		die("connection error".mysqli_connect_error());
	}

	$sql="select teacheremail, Avg(rate) as sum from rating Group By teacheremail";
	$result=mysqli_query($conn,$sql);
	?>

	<center><div title="Ratings Shown Here" style="width: 80%; position:; margin-top:%; padding:8px 0px; margin-left:; background:linear-gradient(to bottom,orange, transparent); border-radius: 8px; box-shadow:1px 5px 2px grey;">

		<table id="myTablestudent">
			<thead>
				<tr>

					<th>Email</th>
					<th>Rated</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($result as $row) 
				{
					?>
					<tr>

						<td><?php echo $row['teacheremail']?></td>
						<td><?php echo $row['sum']?></td>
						<?php
					}
					?> 
				</tr>
			</tbody>

		</table>
	</div>
</center>

<br><br>

<!--====================== The Modal for Add teacher and insert into db ===============================-->
<div class="modal" id="myModal" style=" transform: (180deg)" >
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Close It Here >>> </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body" id="modalid">

				<form method="POST" action="insert_teacher.php">
					<h2><center>Input Data</center> </h2>
					Id:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="number" name="id" readonly="" placeholder="Auto incremented" value=<?php echo $row['Id']?>><br>
					Name: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" required="" placeholder="Input Name" ><br>
					Email:   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	<input type="email" name="email" required=""  placeholder="Input Email" ><br>
					Password:   <input type="text" name="password" required=""  placeholder="Input Password" ><br>

					<input type="submit" value="Add" name="submit">
				</form>
			</div> 
		</div>	
	</div>
</div>


<!--====================== The Modal for Add student and insert into db ===============================-->
<div class="modal" id="myModalstudent" style=" transform: (180deg)" >
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Close It Here >>> </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body" id="modalid">

				<form method="POST" action="insert_student.php">
					<h2><center>Input Data</center> </h2>
					Id:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="number" name="id" readonly="" placeholder="Auto incremented" value=<?php echo $row['Id']?>><br>
					Name: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" required="" placeholder="Input Name" ><br>
					Email:   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	<input type="email" name="email" required=""  placeholder="Input Email" ><br>
					Password:   <input type="text" name="password" required=""  placeholder="Input Password" ><br>

					<input type="submit" value="Add" name="submit">
				</form>
			</div> 
		</div>	
	</div>
</div>



<!--===================== Php code for fetching data of "teacher" from db and show on web page ===========================-->

<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
if (!$conn) {
	die("connection error".mysqli_connect_error());
}

$sql="select id, name, email, password from teacher";
$result=mysqli_query($conn,$sql);
?>

<center><div title="Add Teacher Here" style="width: 80%; margin-left:%; padding: 8px; background-color:rgba(0,0,0,0.2); border-radius: 8px; box-shadow:1px 20px 10px grey;">

	<table id="myTable">
		<thead>

			<tr><a  data-toggle="modal" data-target="#myModal">
				<b>Add Teacher</b> <i class="fa fa-plus" aria-hidden="true" style="color: coral; font-size: 20px; background-color: rgba(0,0,0,0.3); padding: 3px 5px;"></i>
			</a></tr>

			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Edit</th>	
			</tr>

		</thead>

		<tbody>
			<?php
			foreach ($result as $row) 
			{
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo $row['password']?></td>


					<td><button data-toggle="modal" data-target="#myModal1<?php echo $row['id']?>">Update</button></td>



					<!-- The Modal for get data and update-->
					<div class="modal" id="myModal1<?php echo $row['id'] ?>" style=" transform: (180deg)" >
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Close It Here >>> </h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Modal body -->
								<div class="modal-body" id="modalid">


									<form method="post" action="teacher_update.php">
										<h2><center>Input Data</center> </h2>
										Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="id" readonly=""  value=<?php echo $row['id']?>><br>
										Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" required="" value=<?php echo $row['name']?> ><br>
										Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="email" required="" value=<?php echo $row['email']?>  ><br>
										Password:<input type="password" name="password" required="" value=<?php echo $row['email']?>  ><br><br>

										<input type="submit" value="Done" name="submit">
									</form>

								</div> 
							</div>	
						</div>
					</div>
				</tr>

				<?php
			}
			?> 
		</tbody>

	</table>
</div>
</center>

<br><br>

<!--====================== Php code for fetching data of "student" from db and show on web page =======================-->

<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
if (!$conn) {
	die("connection error".mysqli_connect_error());
}

$sql="select id, name, email, password from student";
$result=mysqli_query($conn,$sql);
?>

<center>	<div title="Add Student Here" style="width: 80%;  position: ; margin-top:%; padding: 8px; margin-left:; background-color:rgba(0,0,0,0.2); border-radius: 8px; box-shadow:1px 20px 10px grey;">

	<table id="myTablestudent1">

		<thead>

			<tr>	<a  data-toggle="modal" data-target="#myModalstudent">
				<b>Add Student</b> <i class="fa fa-plus" aria-hidden="true" style="color: coral; font-size: 20px;  background-color: rgba(0,0,0,0.3); padding: 3px 5px;"></i>
			</a></tr>

			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Edit</th>
				<th>Assignment</th>	
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ($result as $row) 
			{
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo $row['password']?></td>


					<td><button data-toggle="modal" data-target="#myModal2<?php echo $row['id']?>" >Update</button></td>
					<td><button data-toggle="modal" data-target="#myModalassign<?php echo $row['id']?>" >Assign To</button></td>
				</tr>


				<!-- The Modal for get data and update-->
				<div class="modal" id="myModal2<?php echo $row['id'] ?>" style=" transform: (180deg)" >
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Close It Here >>> </h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body" id="modalid">


								<form method="post" action="student_update.php">
									<h2><center>Input Data</center> </h2>
									Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="id" readonly=""  value=<?php echo $row['id']?>><br>
									Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" required="" value=<?php echo $row['name']?> ><br>
									Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="email" required="" value=<?php echo $row['email']?>  ><br>
									Password:<input type="password" name="password" required="" value=<?php echo $row['email']?>  ><br><br>

									<input type="submit" value="Done" name="submit">
								</form>

							</div> 
						</div>	
					</div>
				</div>


				<!-- The Modal for get data and assign-->
				<div class="modal" id="myModalassign<?php echo $row['id'] ?>" style=" transform: (180deg)" >
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Close It Here >>> </h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body" id="modalid">


								<form method="post" action="assign.php">
									<h2><center>Input Data</center> </h2>

									Student Name:&nbsp<input type="text" name="sname" readonly="" required="" value=<?php echo $row['name']?> ><br>
									Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" readonly="" name="semail" required="" value=<?php echo $row['email']?>  ><br>
									Assign To:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="tname" required="" placeholder=" Input Faculty Name" ><br><br>
									<input type="submit" value="Done" name="submit">
								</form>

							</div> 
						</div>	
					</div>
				</div>


				<?php
			}
			?> 
		</tbody>

	</table>
</div>
</center>

<br><br>


<!--====================== Php code for fetching data of "assign" from db and show on web page =======================-->

<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
if (!$conn) {
	die("connection error".mysqli_connect_error());
}

$sql="select * from assign";
$result=mysqli_query($conn,$sql);
?>

<center>	<div title="Student Assigned Shown Here" style="width: 80%;  position: ; margin-top:%; padding: 8px; margin-left:; background-color:rgba(0,0,0,0.2); border-radius: 8px; box-shadow:1px 20px 10px grey;">

	<table id="myTablestudent2">

		<thead>

			<tr>	<p>
				<b> Assigned Students List </b> 
			</p></tr>

			<tr>
				<th>Id</th>
				<th>Student Name</th>
				<th>Student Email</th>
				<th>Assign To Faculty</th>
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ($result as $row) 
			{
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['studentname']?></td>
					<td><?php echo $row['studentemail']?></td>
					<td><?php echo $row['assignto']?></td>
				<?php
			}
			?> 
		</tbody>

	</table>
</div>
</center>





<script>

	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

	$(document).ready( function () {
		$('#myTablestudent').DataTable();
	} );

	$(document).ready( function () {
		$('#myTablestudent1').DataTable();
	} );

	$(document).ready( function () {
		$('#myTablestudent2').DataTable();
	} );



</script>
</body>
</html>


