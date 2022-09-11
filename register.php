<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>Moosic | Register</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">
	</head>
	<body>
		<main>
			<nav>
				<img src="" alt="logo">
				<a href="">Home</a>
				<a href="">About Us</a>
				<a href="">Support</a>
				<a href="">Start Free Trial</a>
			</nav>
			<header>
				<h1><center>REGISTER</center></h1>
			</header>
			<content><!-- Holds the main page content -->
				<div class = "register">				
					<form method="POST" id="register.php"> 
						<h4><label for = 'login'>Enter your username</label>
						<input type = "text" name="username" placeholder = "Enter username" required/></h4>
							
						<h4><label for = 'login'>Enter your password</label>
						<input type = "password" name="password" placeholder = "Enter user password" required/></h4>
							
						<h4><label>Enter your email</label>
						<input type = "text" placeholder = "Enter user email"/></h4><br>
						<center><h4><input type="submit" value="Sign Up"/></h4></center><br>
					</form>
					
					<?php
							//connect.php (tells where to connect servername, username, password, dbaseName)
							require "91902_mysqli.php";
							print "<p class = 'grey'>Connected to server</p>";
						
							$UserID = isset($_POST['username']) ? $_POST['username']: "";
							$PW = isset($_POST['password']) ? $_POST['password']: "";

							//create a variable to store sql code for the 'Add Users' query
							$insertquery = "INSERT INTO Users( Username, Password ) VALUES('$UserID','$PW')";

							if (mysqli_query($conn,$insertquery))
								{
								echo "<p class = 'grey'>Record inserted:</p>";
								}
							else
								{
								echo "<p class = 'grey'>Error inserting record:</p>";
								}
						?>
					
					<div class="back"><center><a href="login.php"> ← Back </a><br></center></div>
				</div>
				<footer><!-- Holds the foot notes -->
					<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
				</footer>
			</content>
		</main>
	</body>
</html>