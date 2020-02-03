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


	<title>Teacher_Home</title>

	<style type="text/css">

		body{
			background: linear-gradient(to right,#369693,transparent,#369693);
			/*background-image: url(bg7.jpg);*/
		}

		#dest{
			text-decoration: none;
			background-color: rgba(0,0,0,0.3);
			padding: 4px 3px;
			border-radius: 3px;
			color: white;
			font-style: bolder;
		}

		#notify{

			text-decoration: none;
			background-color: rgba(0,0,0,0.3);
			padding: 9px 6px;
			border-radius: 3px;
			color: white;
			font-style: bolder;

		}

		#notify:hover{

			color: coral;

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

	echo "<span style='position:absolute; margin-left:9%;'>";
	echo "<a id='notify'  data-toggle='modal' data-target='#myModalnotify'><b>Notify Students</b>  <i class='fa fa-bell' aria-hidden='true' style='color: coral; font-size: 20px;  background-color: rgba(0,0,0,0.5); padding: 3px 5px;'></i></a>";
	echo "</span>";


	echo "	<center><h3><b><span style='position:absolute; margin-left:-7%;'>Faculty Interface</span?</b></h3></center>";

	echo "<span style='position:; margin-left: 83%; '>";
	echo "<mark><b>Welcome: </b>" .$_SESSION["user"]."</mark>";
	echo "</span>";


	echo "<span style='position:relative; margin-left: 1%;'>";
	echo "<a href='logout.php' id='dest'>Logout</a>";
	echo "</span>";




	?>

	<hr>

	
	<ul>

		<li style="list-style: none;  margin-left: 44%;">
			<a  data-toggle="modal" data-target="#myModalstudent">
				<b>Add Student</b> <i class="fa fa-plus" aria-hidden="true" style="color: coral; font-size: 20px;  background-color: rgba(0,0,0,0.3); padding: 3px 5px;"></i>
			</a></li>

		</ui>	

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

						<form method="POST" action="insert_student_byteacher.php">
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


		<!--====================== Php code for fetching data of "student" from db and show on web page =======================-->

		<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
		if (!$conn) {
			die("connection error".mysqli_connect_error());
		}

		$sql="select id, name, email, password from student";
		$result=mysqli_query($conn,$sql);
		?>

		<center>		<div style="width: 60%; padding: 8px; background-color:rgba(0,0,0,0.2); border-radius: 8px; box-shadow:1px 20px 10px grey;">

			<table id="myTablestudent">
				<thead>
					<tr>
						<th>Id</th>
						<th>Student Name</th>
						<th>Email</th>
						<th>Password</th>

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

							<?php
						}
						?> 
					</tbody>

				</table>
			</div>
		</center>



		<!--===================== Php code for fetching data of "teacher" from db and show on web page ===========================-->


		<!-- The Modal for get data and update-->
		<div class="modal" id="myModalnotify" style=" transform: (180deg)" >
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Close It Here >>> </h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" id="modalid">


						<form method="post" action="notify.php">
							<h2><center>Input Notification</center> </h2><br>

							From:&nbsp&nbsp&nbsp
							<input type="text" readonly="" style="border: none;" name="from"  value=<?php echo $_SESSION['user']?> ><br><br>

							Write Here: <textarea rows="4" cols="50" name="msg">
							Your Message to Students...
							</textarea>

							<input type="submit" value="Send" name="submit" onclick="sent()">

						</form>

					</div> 
				</div>	
			</div>
		</div>

		<script>

			$(document).ready( function () {
				$('#myTablestudent').DataTable();
			} );


			function sent(){
				alert("Message Sent !");
			}

		</script>
	</body>
	</html>


