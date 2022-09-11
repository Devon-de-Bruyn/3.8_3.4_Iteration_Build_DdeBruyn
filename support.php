<?php 
	session_start();
		include("connection.php");
		include("functions.php");
		if(isset($_SESSION['User_ID'])){$user_data = check_login($conn);}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.73"><!-- Adds responsive -->
		<title>Moosic | Home</title>
		<link rel="icon" type="image/png" href="images/Moosic2.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/support.css">
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
				<h1><center>Support</center></h1>
			</header>
			<content><!-- Holds the main page content -->
				<div class = "support">				
					<form method="POST" id="register.php"> 
						<label for = 'login'>Enter your name</label><br>
						<input type = "text" name="username" placeholder = "Enter username" required/><br>
							
						<label for = 'login'>Enter your email</label><br>
						<input type = "text" name="email" placeholder = "Enter user email" required/><br>
							
						<label>How can we help you?</label><br>
						<textarea id="body" name="body" placeholder="Write something..."></textarea><br>
						<center><h4><input type="submit" value="Send"/></h4></center><br>
					</form>
				</div>
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>