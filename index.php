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
		<title>Moosic | Home</title>
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
				<h1><center>Home</center></h1>
			</header>
			<content><!-- Holds the main page content -->
				
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>
