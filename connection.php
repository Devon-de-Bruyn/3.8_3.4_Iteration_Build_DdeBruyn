<?php
//This is the Database connection file. It connects the database to the website.
$conn = new mysqli('localhost', '_DdeBruyn', 'Z2UVcVCTdvUea6dO', 'DdeBruyn_91902');
if($conn->connect_error){
	die("Error Connecting to Database: " . $conn->connect_error);
}
?>