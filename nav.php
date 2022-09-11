	<!-- Moosic logo & home button -->
	<a href="songs.php" class="logo"><img src="images/Moosic-logo.png" alt="logo" height=50px></a>
	<a href="songs.php" class="home">Moosic</a>
	<div class="right">
	<!-- If the user is an admin -->
	<?php if(isset($_SESSION['User_ID'])){ if($user_data['Admin'] == 'Yes'){ ?>
	<a href="admin.php" class="adminnav">Admin</a>
	<?php } } ?>
	<!-- If there is a user -->
	<?php if(isset($_SESSION['User_ID'])){ ?>
	<a href="songs.php" class="songsnav">Songs</a>
	<?php } ?>
	<!-- About us & support button -->
	<a href="about.php" class="aboutnav">About Us</a>
	<a href="support.php" class="supportnav">Support</a>
	<!-- If there is no user -->
	<?php if(!isset($_SESSION['User_ID'])){ ?>
	<a href="login.php" class="trial">Start Free Trial</a>
	<?php } ?>
	<!-- If there is a user -->
	<?php if(isset($_SESSION['User_ID'])){ ?>
	<a href="logout.php" class="logout">Logout</a>
	</div>
	<?php } ?>