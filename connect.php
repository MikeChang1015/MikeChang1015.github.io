<?php
	$room_id = $_POST['room_id'];
	$room_capacity = $_POST['room_capacity'];
	$room_datetime = $_POST['room_datetime'];
	$room_price = $_POST['room_price'];
	$room_promo_code = $_POST['room_promo_code'];
	
	// Database connection
	$conn = new mysqli('localhost', 'root', '', 'room');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO room (room_id, room_capacity, room_datetime, room_price, room_promo_code) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("iisds", $room_id, $room_capacity, $room_datetime, $room_price, $room_promo_code);
		
		if ($stmt->execute()) {
			echo "Room created successfully";
		} else {
			echo "Error: " . $stmt->error;
		}

		$stmt->close();
		$conn->close();
	}
?>
