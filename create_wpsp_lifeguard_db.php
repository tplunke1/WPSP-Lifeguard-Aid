<?php
$servername = "localhost";
$username = "Admin";
$password = "";

// Connect to database
$conn = new mysqli($servername, $username, $password);
if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

// Crate database
$sql = "CREATE DATABASE WPSP_Lifeguard_DB";
if($conn->query($sql) === TRUE)
{
	echo "Database successfully created";
}
else
{
	"Error creating database: " . $conn->error;
}

$conn->close();
?>