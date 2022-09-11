<?php 
		session_start();
        if(!isset($_SESSION['login_user'])){
                header("index.php");
				}
		else{
			$User = $_SESSION['login_user'];
        }
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>Moosic | Songs</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/songs.css">
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
				<h1><center>Songs</center></h1>
			</header>
			<content>
				
				<div class="songs">
					<p>Order By:</p>
					<button id="genre">Genre A-Z</button>
					<button id="title">Title Z-A</button>
					<p>Total Duration: 6hrs 23mins</p>
					</div>
					<headings>
						<Heading><h4>Title</h4></Heading>
						<Heading><h4>Album</h4></Heading>
						<Heading><h4>Artist</h4></Heading>
						<Heading><h4>Genre</h4></Heading>
						<Heading><h4>Size</h4></Heading>
						<Heading><h4>Duration</h4></Heading>
					</headings>
					<div class="title">
						<?php
							//Creates a variable to store the sql query
							$query = ("SELECT s.Song, al.Album, GROUP_CONCAT(DISTINCT ar.Artist ORDER BY ar.Artist DESC SEPARATOR ', ') AS Artist, GROUP_CONCAT(DISTINCT g.Genre SEPARATOR ', ') AS Genre,
							s.Duration, s.Size, SUM(s.Duration) over() AS Total_Duration
							FROM `Songs` AS s
							JOIN `Albums` AS al ON al.Album_ID = s.Album_ID
							INNER JOIN `Songs to Artists` AS sa ON s.Song_ID = sa.Song_ID
							LEFT JOIN `Artists` AS ar ON ar.Artist_ID = sa.Artist_ID
							JOIN `Songs to Genres` AS sg ON s.Song_ID = sg.Song_ID
							JOIN `Genres` AS g ON g.Genre_ID = sg.Genre_ID
							GROUP BY s.Song_ID
							ORDER BY s.Song DESC, Artist DESC");
			
							$result = mysqli_query($conn,$query);
							while($output=mysqli_fetch_array($result))
							{
						?>
						<rows>
							<row><p class = 'white'><?php echo $output['Song']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Album']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Artist']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Genre']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Size']; ?>kb</p></row>
							<row><p class = 'white'><?php echo $output['Duration']; ?>s</p></row>
						</rows>
						<?php
							}
						?>
					</div>
					<div class="genre">
						<?php
							//Creates a variable to store the sql query
							$query = ("SELECT s.Song, al.Album, GROUP_CONCAT(DISTINCT ar.Artist SEPARATOR ', ') AS Artist, GROUP_CONCAT(DISTINCT g.Genre ORDER BY g.Genre ASC SEPARATOR ', ') AS Genre,
							s.Duration, s.Size, SUM(s.Duration) over() AS Total_Duration
							FROM `Songs` s
							JOIN `Albums` al ON al.Album_ID = s.Album_ID
							INNER JOIN `Songs to Artists` sa ON s.Song_ID = sa.Song_ID
							LEFT JOIN `Artists` ar ON ar.Artist_ID = sa.Artist_ID
							JOIN `Songs to Genres` sg ON s.Song_ID = sg.Song_ID
							JOIN `Genres` g ON g.Genre_ID = sg.Genre_ID
							GROUP BY s.Song_ID
							ORDER BY Genre ASC, Artist ASC");
			
							$result = mysqli_query($conn,$query);
							while($output=mysqli_fetch_array($result))
							{
						?>
						<rows>
							<row><p class = 'white'><?php echo $output['Song']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Album']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Artist']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Genre']; ?></p></row>
							<row><p class = 'white'><?php echo $output['Size']; ?>kb</p></row>
							<row><p class = 'white'><?php echo $output['Duration']; ?>s</p></row>
						</rows>
						<?php
							}
						?>
					</div>
				</div>
				<footer><!-- Holds the foot notes -->
					<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
				</footer>
			</content>
		</main>	
	</body>
</html>