<?php
	$dsn = "mysql:host=Pockets-PC;dbname=wpsp_lifeguard_db;charset=utf8mb4";
	$username = "tyler";
	$password = "password";
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
	$sql = "SELECT lifeguard_id, prefered_name FROM lifeguards";
	$stmt = $db->query($sql);
	$available_lifeguards = [];
	$total_count = $stmt->rowCount();
	$available_count = $total_count - $leave_count;
	$i = 0;
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		if(empty($unavailable_lifeguards[$row['lifeguard_id']]))
		{
			$available_lifeguards[] = $row;
			$i++;
		}
	}
	
	shuffle($available_lifeguards);
	
	echo json_encode($available_lifeguards);
?>