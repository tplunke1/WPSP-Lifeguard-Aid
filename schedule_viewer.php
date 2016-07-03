<?php
$dsn = "mysql:host=Pockets-PC;dbname=wpsp_lifeguard_db;charset=utf8mb4";
$username = "tplunke1";
$password = "t20o16sms";
$dbname = "wpsp_lifeguard_db";

// Connect to database
$db = new \PDO($dsn, $username, $password);

/*
$date_input = "1-7-2016";
$date = date('Y-m-d', strtotime($date_input));
*/

//$sql = "SELECT lifeguard_id FROM lifeguard_leave WHERE CURDATE() < start_date OR CURDATE() > end_date";
$sql = "SELECT lifeguard_id FROM lifeguards";
$stmt = $db->query($sql);
$row_count = $stmt->rowCount();
$numbers = range(1, $row_count);
shuffle($numbers);
$i = 0;

echo 'lifeguards available: ' . $row_count . '<br><br>';
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo $row['lifeguard_id'] . ': ' . $numbers[$i] . '<br>';
	$i++;
}

$sql = "SELECT lifeguard_id, leave_start, leave_end FROM lifeguard_leave WHERE DATE(leave_start) <= CURDATE() AND DATE(leave_end) >= CURDATE()";
$stmt = $db->query($sql);

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo $row['lifeguard_id'] . ' ' . $row['leave_start'] . ' ' . $row['leave_end'] . '<br>';
}
?>