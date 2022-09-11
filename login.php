<?php
session_start();
	// Connects the database to the website
	include("connection.php");
	// Enables the functions from functions.php
	include("functions.php");
	
	// Checks if someone is trying to login
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	// Sets the variables from the form
		$Username = $_POST['username'];
		$Password = $_POST['password'];
		
		// Checks if the username or password was empty
		if(!empty($Username) && !empty($Password) && !is_numeric($Username))
		{	// Finds the user from the database
			$query = "SELECT * FROM Users WHERE Username = '$Username' AND Password = '$Password' LIMIT 1";
			$result = mysqli_query($conn, $query);
			if($result)
			{	// If there is a user with the username and password
				if($result && mysqli_num_rows($result) > 0)
				{	// Puts the users information into a variable
					$user_data = mysqli_fetch_assoc($result);
					$_SESSION['User_ID'] = $user_data['User_ID'];
					// Sends the user to the home page
					header("Location: index.php");
					die;
				}
			}
			// If the fields weren't blank but the user did not login
			$error = "Your username or password is incorrect";
		}
		// If the field(s) were blank
		else
		{
			$error = "Please enter your username and password";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "utf-8" />
		<title>Moosic | Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
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
				<h1><center>LOGIN</center></h1>
			</header>
			<content><!-- Holds the main page content -->
				<div class="login">
					<h3><form method = "post" id= "login">
						<label for = 'login'> Enter your username</label><br>
						<input type = "text" name = "username" placeholder="Enter your username"/><br>
						<label for = 'login'> Enter your password</label><br>
						<input type = "password" name = "password" placeholder="Enter password"/><br>
						<center><p class="error"><?php if($_SERVER['REQUEST_METHOD'] == "POST"){ echo $error; } ?></p></center>
						<center><input type = "submit" value = " Sign In "/></center><br>
					</form></h3>
					<center><span> or </span><br>
					<button class="google"><img src="images/Google.png" alt="Google" height=35px><a>Sign in with Google</a></button>
					<div class="new"><p>New here? <a href="register.php">Create Account</a></p></div></center>
					
				</div>
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>