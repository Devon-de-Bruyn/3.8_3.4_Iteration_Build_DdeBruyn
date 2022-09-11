<?php 
session_start();
	// Connects the database to the website
	include("connection.php");
	// Enables the functions from functions.php
	include("functions.php");
	
	// Checks if someone is trying to register
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	// Sets the variables from the form
		$Username = $_POST['username'];
		$Password = $_POST['password'];
		
		// Checks if the username or password was empty
		if(!empty($Username) && !empty($Password) && !is_numeric($Username))
		{	// Checking if username and password was taken
			$query = "SELECT * FROM Users WHERE Username = '$Username' AND Password = '$Password'";
			$result = mysqli_query($conn, $query);
			// Checks if there was a result
			if($result && mysqli_num_rows($result) > 0)
			{
				echo "Username taken";
			}
			
			else{
				// Saves the user to database
				$query = "INSERT INTO Users(Username, Password) VALUES('$Username','$Password')";
				mysqli_query($conn, $query);
				// Returns the user to the login page
				header("Location: login.php");
				die;
			}
		
		}else //  If the username or password were blank
		{
			echo "Please enter your username and password";
		}
	}
	
?>


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
				<?php	
				//Pulls the links from the nav.php page and places them in the navigation div
				require 'nav.php'; 
				?>
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
					<div class="back"><center><a href="login.php"> ← Back </a><br></center></div>
				</div>
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>