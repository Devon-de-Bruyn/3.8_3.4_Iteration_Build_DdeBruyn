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
		<title>Moosic | Home</title>
		<link rel="icon" type="image/png" href="images/Moosic2.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/about.css">
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
				<h1><center>About Us</center></h1>
			</header>
			<content><!-- Holds the main page content -->
				<div class="about">
					<div class="text">
						<p><span>Hello, my name is Graeme.</span><br>
							As the CEO of Moosic, I am responsible for running all facets of the business.
I have a proven executive management track record and over 20 years of experience driving sales
growth in the music industry. Prior to founding Moosic, I was Chief Marketing Officer and
Executive Vice President of Sales for Loudcloud, Inc, responsible for all global sales and marketing
activities. At Loudcloud I led the transformation into an enterprise-focused company while growing sales
50% year over year. Previously, I served as Chief Marketing Officer of NorthPoint Communications,
where she led the design and implementation of all sales and marketing strategies. I also served as
President of Blockbuster, Inc.'s e-commerce division and was recognized by Internet World as one of the
Top 25 'Click and Mortar' executives in the country in June of 2000. I spent the prior 15 years at IBM,
holding several domestic and international executive positions. I served on the board of directors of
Arbitron, Inc. and the Forum for male Entrepreneurs and Executives. I earned a BS degree at the
University of Pennsylvania, Wharton School of Business. <br><br>Moosic is a digital music, podcast, and video service that gives you access to millions of songs and other content from creators all over the world. Basic functions such as playing music are totally free, but you can also choose to upgrade to Moosic Premium. Moosic is available across a range of devices, including computers, phones, tablets, speakers, TVs, and cars, and you can easily transition from one to another with Moosic Connect.
						</p>
					</div>
					<div class="img">
						<img src="images/dude.jpg" alt="Graeme" width="100%" height="100%">
					</div>
				</div>
			</content>
		</main>
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>
