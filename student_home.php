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


	<title>Student_Home</title>

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

		#notify{

			text-decoration: none;
			background-color: rgba(0,0,0,0.3);
			padding: 9px 6px;
			border-radius: 3px;
			color: white;
			font-style: bolder;

		}

		
	</style>



</script>

</head>
<body>



	<?php	

	echo "<span style='position:absolute; margin-left:16%;'>";
	echo "<a id='notify'  data-toggle='modal' data-target='#myModalrate'><b>Rate Faculty</b>  <i class='fa fa-star' aria-hidden='true' style='color: coral; font-size: 20px;  background-color: rgba(0,0,0,0.5); padding: 3px 5px;'></i></a>";
	echo "</span>";

	echo "	<center><h3><b><span style='position:absolute;  margin-left:-7%; '>Student Interface</span?</b></h3></center>";

	echo "<span style='position:; margin-left: 83%; '>";
	echo "<mark><b>Welcome: </b>" .$_SESSION["user"]."</mark>";
	echo "</span>";


	echo "<span style='position:relative; margin-left: 1%;'>";
	echo "<a href='logout.php' id='dest'>Logout</a>";
	echo "</span>";

	?>
	<hr>

	<!--====================== Php code for fetching data of "notify table" from db and show on web page =======================-->

	<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
	if (!$conn) {
		die("connection error".mysqli_connect_error());
	}

	$sql="select fromteacher, msg from notify";
	$result=mysqli_query($conn,$sql);
	?>

	<div style="width: 45%; position:; margin-top:%; padding: 8px; margin-left:1%; background:linear-gradient(to bottom,orange, transparent); border-radius: 8px; box-shadow:1px 5px 2px grey;">

		<table id="myTablestudent">
			<thead>
				<tr>

					<th>Faculty</th>
					<th>Recieved Messages</th>
					<th>Response</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($result as $row) 
				{
					?>
					<tr>
						<td><?php echo $row['fromteacher']?></td>
						<td><?php echo $row['msg']?></td>

						<td id="formid">
							<form action="status.php"  method="POST" >
								<input type="submit"  onclick="accepted()" value="Accept" name="accept" id="acceptid">
								<input type="submit"  onclick="rejected()" value="Reject" name="reject" id="rejectid">
							</form>
						</td>

						<?php
					}
					?> 
				</tbody>

			</table>
		</div>



		<!--===================== Php code for fetching data of "teacher" from db and show on web page ===========================-->

		<?php $conn=mysqli_connect("localhost","root","Toor@123","Msystem");
		if (!$conn) {
			die("connection error".mysqli_connect_error());
		}

		$sql="select id, name, email from teacher";
		$result=mysqli_query($conn,$sql);
		?>

		<div style="width: 50%; margin-left: 48%; margin-top: -22%; padding: 8px; background-color:rgba(0,0,0,0.2); border-radius: 8px; box-shadow:1px 20px 10px grey; position: absolute;">

			<table id="myTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Faculty Name</th>
						<th>Email</th>
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


							<?php
						}
						?> 
					</tbody>

				</table>
			</div>



			<!-- The Modal for rating-->
			<div class="modal" id="myModalrate" style=" transform: (180deg)" >
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Close It Here >>> </h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body" id="modalid">


							<form method="post" action="rating.php">
								<h2><center>Input Notification</center> </h2><br>

								From:&nbsp&nbsp&nbsp
								<input type="text" readonly="" style="border: none;" name="fromstudent"  value=<?php echo $_SESSION['user']?> ><br>

								Facult Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<input type="text" name="toteacher" required=""> <br>

								Facult Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<input type="email" name="facultyemail" required=""> <br>

								<input type="text"  readonly="" name="rate" id="rate" style="border:1px solid teal; border-radius: 8px; width:60px; height: 34px;"  value="     0">	

								<span style="border:none; position: relative; background-color: transparent; margin-left:%;" onclick="star1('1')" id="star1id">
									<i class="fa fa-star-o" aria-hidden="true" style=" font-size: 25px; padding: 20px 0px;"></i></span>

									<span style="border:none;  margin-left:; background-color: transparent;" onclick="star2('2')" id="star2id">
										<i class="fa fa-star-o" aria-hidden="true" style=" font-size: 25px;"></i></span>

										<span style="border:none;  margin-left:; background-color: transparent;" onclick="star3('3')" id="star3id">
											<i class="fa fa-star-o" aria-hidden="true" style=" font-size: 25px;"></i></span>

											<span style="border:none;  margin-left:; background-color: transparent;" onclick="star4('4')" id="star4id">
												<i class="fa fa-star-o" aria-hidden="true" style=" font-size: 25px;"></i></span>

												<span style="border:none;  margin-left:; background-color: transparent;" onclick="star5('5')" id="star5id">
													<i class="fa fa-star-o" aria-hidden="true" style=" font-size: 25px;"></i> </span>
												<span>	<img id="img" src="0.png" width="35px" height="35px"></span><br>

													<input type="submit" value="Send" name="submit">

												</form>




											</div> 
										</div>	
									</div>
								</div>






								<script>

									$(document).ready( function () {
										$('#myTable').DataTable();
									} );

									$(document).ready( function () {
										$('#myTablestudent').DataTable();
									} );

									function accepted(){

										alert(":) See You in Upcoming Session ...");


									} 

									function rejected(){

										alert("Response Recorded :(");

									} 

									function star1(value1)
									{

											document.getElementById('img').src="1.png";

										document.getElementById('star1id').style="color:red";
										document.getElementById('rate').value="     "  + value1;

										document.getElementById('star2id').style="color:black";
										document.getElementById('star3id').style="color:black";
										document.getElementById('star4id').style="color:black";
										document.getElementById('star5id').style="color:black";
									}

									function star2(value2)
									{
											document.getElementById('img').src="2.png";

										document.getElementById('star2id').style="color:red";
										document.getElementById('rate').value="     "  + value2;

										document.getElementById('star1id').style="color:red";
										document.getElementById('star3id').style="color:black";
										document.getElementById('star4id').style="color:black";
										document.getElementById('star5id').style="color:black";


									}

									function star3(value3)
									{
											document.getElementById('img').src="3.png";

										document.getElementById('star3id').style="color:green";
										document.getElementById('rate').value="     "  + value3;

										document.getElementById('star2id').style="color:green";
										document.getElementById('star1id').style="color:green";
										document.getElementById('star4id').style="color:black";
										document.getElementById('star5id').style="color:black";
									}

									function star4(value4)
									{
											document.getElementById('img').src="4.png";

										document.getElementById('star4id').style="color:green";
										document.getElementById('rate').value="     "  + value4;

										document.getElementById('star2id').style="color:green";
										document.getElementById('star3id').style="color:green";
										document.getElementById('star1id').style="color:green";
										document.getElementById('star5id').style="color:black";
									}

									function star5(value5)
									{
											document.getElementById('img').src="5.png";

										document.getElementById('star5id').style="color:green";
										document.getElementById('rate').value="     "  + value5;

										document.getElementById('star2id').style="color:green";
										document.getElementById('star3id').style="color:green";
										document.getElementById('star4id').style="color:green";
										document.getElementById('star1id').style="color:green";
									}


								</script>
							</body>
							</html>


