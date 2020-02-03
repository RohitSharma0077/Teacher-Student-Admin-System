<!DOCTYPE html>
<html>
<head>
	<title>index page</title>

	<style type="text/css">
		body{
			
			background-image: url(bg7.jpg);
		}

	</style>

</head>
<body><br>
	<div>
		<h2><center> Login</center> </H2>
			<form method="POST" action="admin_ses.php" style="padding:0px 10px; box-shadow: 5px 10px 20px grey; text-align:center; padding: 10px 10px;">

				Name:&nbsp&nbsp&nbsp&nbsp   <input type="text" name="name" required=""  placeholder="Input Name"><br><br>
				Email:&nbsp&nbsp&nbsp&nbsp <input type="email" name="email" required=""  placeholder="Input Email"><br><br>
				Password:  <input type="password" name="password" required="" placeholder="Input Password"><br><br>
			 Login As:	<select name="selected" required="">
					<option value="Admin">Admin</option>
					<option value="Teacher">Teacher</option>
					<option value="Student">Student</option>
				</select>
				<br><br>
				<input type="submit" value="Login" name="submit">


			</div>
		</body>
		</html>