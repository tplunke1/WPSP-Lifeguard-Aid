<?php
	$dsn = "mysql:host=Pockets-PC;dbname=wpsp_lifeguard_db;charset=utf8mb4";
	$username = "tplunke1";
	$password = "t20o16sms";
	$dbname = "wpsp_lifeguard_db";

	// Connect to database
	$db = new \PDO($dsn, $username, $password);

	// Get lifeguards on leave
	$sql = "SELECT lifeguard_id, leave_start, leave_end FROM lifeguard_leave WHERE DATE(leave_start) <= CURDATE() AND DATE(leave_end) >= CURDATE()";
	$stmt = $db->query($sql);
	$leave_count = $stmt->rowCount();
	$unavailable_lifeguards = [];
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$unavailable_lifeguards[$row['lifeguard_id']] = $row;
	}

	// Get lifeguards available
	$sql = "SELECT lifeguard_id, first_name FROM lifeguards";
	$stmt = $db->query($sql);
	$available_lifeguards = [];
	$total_count = $stmt->rowCount();
	$available_count = $total_count - $leave_count;
	$positions = range(1, $total_count);
	$i = 0;
	
	shuffle($positions);
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		if(empty($unavailable_lifeguards[$row['lifeguard_id']]))
		{
			$row['position'] = $positions[$i]; // insert generated position to data
			$available_lifeguards[$i] = $row;
		}
		$i++;
	}
	
	echo json_encode($available_lifeguards);
?>