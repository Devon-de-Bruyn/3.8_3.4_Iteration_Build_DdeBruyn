<?php 
	session_start();
		include("connection.php");
		include("functions.php");
		$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=0.73"><!-- Adds responsive -->
		<title>Moosic | Home</title>
		<link rel="icon" type="image/png" href="images/Moosic2.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/home.css">
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
				<h1><center>Welcome <?php echo $user_data['Username'] ?></center></h1>
			</header>
			<content><!-- Holds the main page content -->
				<center>
					<h1>to</h1> 
					<img src="images/Moosic-logo3.png" alt="logo"> 
					<h1 class="title">Moosic</h1>
					<a href="songs.php" class="enter">Enter</a>
				</center>
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>
