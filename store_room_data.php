<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize input data
    $roomName = isset($_POST["room_name"]) ? $_POST["room_name"] : "";
    $time = isset($_POST["room_datetime"]) ? $_POST["room_datetime"] : "";

    // Validate input data
    if (empty($roomName) || empty($time)) {
        echo "Error: Missing or invalid data.";
    } else {
        // Load existing room data from JSON file
        $jsonFile = 'rooms.json';
        $roomData = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

        // Add the new room data
        $newRoom = [
            "room_name" => $roomName,
            "room_datetime" => $time
            // Add more fields as needed
        ];
        $roomData[] = $newRoom;

        // Save the updated data back to the JSON file
        file_put_contents($jsonFile, json_encode($roomData));

        echo "Room data saved successfully!";
    }
} else {
    echo "Invalid request.";
}
?>
