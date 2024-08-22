<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = htmlspecialchars($_POST['room_number']);
    $room_type_id = intval($_POST['room_type_id']);

    $stmt = $pdo->prepare("INSERT INTO rooms (room_number, room_type_id) VALUES (?, ?)");
    
    if ($stmt->execute([$room_number, $room_type_id])) {
        echo "Room data inserted successfully!";
    } else {
        echo "Failed to insert room data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
</head>
<body>
    <h1>Add New Room</h1>
    <form action="add_room.php" method="POST">
        <label for="room_number">Room Number:</label><br>
        <input type="text" id="room_number" name="room_number" required><br>
        
        <label for="room_type_id">Room Type ID:</label><br>
        <input type="number" id="room_type_id" name="room_type_id" required><br><br>
        
        <input type="submit" value="Add Room">
    </form>
</body>
</html>
