<?php 
	session_start();
		include("connection.php");
		include("functions.php");
		$user_data = check_login($conn);
		if($user_data['Admin'] == ''){
			header("Location: songs.php");
		}
		
// Checks if someone is trying to post something
	if($_SERVER['REQUEST_METHOD'] == "POST"){	
		// Checks if they are trying to update a user
		if(isset($_POST['update'])) {
			// Sets the variables from the form
			$UserID = $_POST['UserID'];
			$NewUsername = $_POST['NewUsername'];
			$NewPassword = $_POST['NewPassword'];
			// Checks if the user ID, username, or password was empty
			if(!empty($UserID) && !empty($NewUsername) && !empty($NewPassword))
			{	// Selecting the User from the table
				$query = "SELECT * FROM Users WHERE User_ID = '$UserID'";
				$result = mysqli_query($conn, $query);
				// Checks if there was a result
				if($result && mysqli_num_rows($result) > 0)
				{	// Updates the user to have the new username and password
					$updatequery = "UPDATE Users SET Username = '$NewUsername', Password = '$NewPassword' WHERE User_ID = '$UserID'";
					mysqli_query($conn, $updatequery);
					// Tells the user that the change happened
					$umessage = "User was updated";
				}
			
				else{
					// Tells the user that the update failed
					$umessage = "User does not exist";
					$dmessage = "";
				}
		
			}else //  If the username or password were blank
			{
				$umessage = "Please enter the new username and password";
				$dmessage = "";
			}
		} 
		// Checks if they are trying to delete a user
		elseif(isset($_POST['delete'])) {
			// Sets the variables from the form
   		 	$UserID = $_POST['UserID'];
			// Checks if the user ID was empty
			if(!empty($UserID)){ 
				// Selecting the User from the table
			    $query = "SELECT * FROM Users WHERE User_ID = '$UserID'";
				$result = mysqli_query($conn, $query);
				// Checks if there was a result
				if($result && mysqli_num_rows($result) > 0)
				{	// Deletes the user
					$deletequery = "DELETE FROM Users WHERE User_ID = '$UserID'";
					mysqli_query($conn, $deletequery);
					// Tells the user that the change happened
					$dmessage = "User was deleted";
					$umessage = "";
				}
			
				else{
					// Tells the user that the deletion failed
					$dmessage = "User does not exist";
					$umessage = "";
				}
			}else //  If the username or password were blank
			{
				$umessage = "";
				$dmessage = "Please enter the user ID";
			}
			}
  		}
	
	
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>Moosic | Admin</title>
		<link rel="icon" type="image/png" href="images/Moosic2.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
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
				<h1><center>Admin</center></h1>
			</header>
			<content>
				<div class="admin">
					<div class="edit">
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
						</div>
						
						<div class="delete">
							<h2>Delete User</h2>
							<form method = "post" id = "admin.php" > 
								<label for = 'login'>Enter User ID</label><br>
								<input type="text" name = "UserID" placeholder="Enter user ID"/><br>
								<p class="message"><?php if(isset($_POST['delete'])){ echo $dmessage; } ?></p><br>
								<input type="submit" value="Delete" name="delete"/>
							</form>	
						</div>
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
			</content>
		</main>	
		<footer><!-- Holds the foot notes -->
			<p class = "footer">Copyright © 2021 Devon de Bruyn, Tawa College. All rights reserved.</p>
		</footer>
	</body>
</html>