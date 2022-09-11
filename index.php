<?php
	ob_start();
	session_start();
		$error = NULL;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//connect.php(tells where to connect servername, dbaseName, username, password)
			require "91902_mysqli.php";
			//username and password sent from form
			$myusername = mysqli_real_escape_string($conn,$_POST['username']);
			$mypassword = mysqli_real_escape_string($conn,$_POST['password']);

			$query = "SELECT User_ID FROM Users WHERE Username = '$myusername' and Password = '$mypassword'";

			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$count = mysqli_num_rows($result);

			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['login_user'] = $myusername;
				header("location: songs.php");
			} else {
				$error = "ERROR! Your Login Name or Password is invalid";
				}
			}

	ob_end_flush();

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
				<img src="" alt="logo">
				<a href="">Home</a>
				<a href="">About Us</a>
				<a href="">Support</a>
				<a href="">Start Free Trial</a>
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
					<hr> or <hr>
					<button class="google"><img src="images/Google.png" alt="Google" height=35px><a>Sign in with Google</a></button>
					<div class="new"><p>New here? <a href="register.php">Create Account</a></p></div></center>
					
				</div>
				<footer><!-- Holds the foot notes -->
					<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
				</footer>
			</content>
		</main>
	</body>
</html>