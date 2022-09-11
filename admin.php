<?php 
		session_start();
        if(!isset($_SESSION['login_user'])){
                header("location:index.php");
				}
		else{
			$User = $_SESSION['login_user'];
        }
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>Moosic | Admin</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>
	<body>
		<main>
			<nav>
				<img src="" alt="logo">
				<a href="">Home</a>
				<a href="">Admin</a>
				<a href="">About Us</a>
				<a href="">Support</a>
				<a href="">Start Free Trial</a>
				?>
			</nav>
			<header>
				<h1><center>Admin</center></h1>
			</header>
			<content>
				<div class="admin">
						<div class="update">
							<h2>Update User</h2>
							<form method="post" id="admin.php"> 
								<label for = 'login'>Enter User ID</label><br>
								<input type="text" name="UserID" label="UserID" placeholder = "Enter user ID"/><br>
								<label for = 'login'>Enter New Username</label><br>
								<input type="text" name="NewUsername" label="NewUsername" placeholder = "Enter new username"/><br>
								<label for = 'login'>Enter New Password</label><br>
								<input type="text" name="NewPassword" label="NewPassword" placeholder = "Enter new password"/><br>
								<p class="message"><?php if(isset($_POST['update'])){ echo $umessage; } ?></p><br>
								<input type="submit" value="Update" name="update"/>
							</form>
							<?php
							require "91902_mysqli.php";
							print "<p class = 'grey'>Connected to server</p>";

							$ExistingUserID = isset($_POST['ExistingUserName']) ? $_POST['ExistingUserName']: "";
							$NewUserID = isset($_POST['NewUserName']) ? $_POST['NewUserName']: "";

							//create a variable to store sql code for the 'Add Users' query
							$updatequery = "UPDATE Users SET User_ID = '$NewUserID' WHERE User_ID = '$ExistingUserID'";
							if (mysqli_query($conn,$updatequery))
							{
							echo "<h3>Record updated</h3>";
							}
							else
							{
							echo "<h3>Error updatinging record:</h3> ";
							}
							?>
						</div>
						
						<div class="delete">
							<h2>Delete User</h2>
							<form method = "post" id = "admin.php" > 
								<label for = 'login'>Enter User ID</label><br>
								<input type="text" name = "UserID" placeholder="Enter user ID"/><br>
								<p class="message"><?php if(isset($_POST['delete'])){ echo $dmessage; } ?></p><br>
								<input type="submit" value="Delete" name="delete"/>
							</form>	
							<?php
								require "91902_mysqli.php";
								print "<p class = 'grey'>Connected to server</p>";
							
								$UserID = isset($_POST['username']) ? $_POST['username']: ""; 
							
								//create a variable to store sql code for the 'Add Users' query					
								$deletequery = "DELETE FROM Users WHERE User_ID = '$UserID'";

								if (mysqli_query($conn,$deletequery))
								{
								echo "<h3>Record deleted</h3>";
								}
								else
								{
								echo "<h3>Error deleting record:</h3> ";
								}
								?>
						</div>
						
					<div class="users">
						<h2>Users</h2>
						<headings>
							<heading class="id">User ID</heading>
							<heading>Username</heading>
							<heading>Password</heading>
						</headings>
						<rows>
							<row class="id">
							<?php
							//create a variable to store sql code for the 'display all users' query
							$query = ("SELECT * FROM Users");
												
							//run the query
							$result = mysqli_query($conn,$query);
					
							while ($output = mysqli_fetch_array($result))
							{
								echo "<user2>" . $output['User_ID'] . "</user2><br>";
							//closes the while loop
								}
							?>
							</row>				
							<row>
							<?php
							//run the query
							$result = mysqli_query($conn,$query);
					
							while ($output = mysqli_fetch_array($result))
							{
							echo "<user2>" . $output['Username'] . "</user2><br>";
							//closes the while loop
							}
							?>
							</row>
							<row>
							<?php
							//run the query
							$result = mysqli_query($conn,$query);
					
							while ($output = mysqli_fetch_array($result))
							{
							echo "<user2>" . $output['Password'] . "</user2><br>";
							//closes the while loop
							}
							?>
							</row>
						</rows>					
					</div>
				</div>
				<footer><!-- Holds the foot notes -->
					<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
				</footer>
			</content>
		</main>	
	</body>
</html>