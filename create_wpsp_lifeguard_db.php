<?php
$servername = "Pockets-PC";
$username = "tplunke1";
$password = "t20o16sms";

// Connect to database
$conn = new mysqli($servername, $username, $password);
if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

// Crate database
$sql = "CREATE DATABASE wpsp_lifeguard_db";
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