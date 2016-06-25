<?php
$servername = "Pockets-PC";
$username = "tplunke1";
$password = "t20o16sms";
$dbname = "wpsp_lifeguard_db";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
else
{
	echo "Connected. <br>";
}

/*
$date_input = "1-7-2016";
$date = date('Y-m-d', strtotime($date_input));
*/

$sql = "SELECT * FROM lifeguard_leave WHERE CURDATE() < start_date OR CURDATE() > end_date";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
	echo $row["lifeguard_id"];
}
?>