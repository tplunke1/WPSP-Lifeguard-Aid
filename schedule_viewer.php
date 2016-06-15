<?php
$servername = "localhost";
$username = "Admin";
$password = "";
$dbname = "WPSP_Lifeguard_DB";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

/*
$date_input = "1-7-2016";
$date = date('Y-m-d', strtotime($date_input));
*/

$sql = "SELECT COUNT(*) FROM WPSP_Lifeguards WHERE CURDATE() < start_date OR CURDATE() > end_date";
$result = $conn->query($sql);

echo $result;
?>