<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = intval($_POST['customer_id']);
    $room_id = intval($_POST['room_id']);
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    $stmt = $pdo->prepare("INSERT INTO reservations (customer_id, room_id, check_in_date, check_out_date) VALUES (?, ?, ?, ?)");
    
    if ($stmt->execute([$customer_id, $room_id, $check_in_date, $check_out_date])) {
        echo "Reservation data inserted successfully!";
    } else {
        echo "Failed to insert reservation data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
</head>
<body>
    <h1>Add New Reservation</h1>
    <form action="add_reservation.php" method="POST">
        <label for="customer_id">Customer ID:</label><br>
        <input type="number" id="customer_id" name="customer_id" required><br>
        
        <label for="room_id">Room ID:</label><br>
        <input type="number" id="room_id" name="room_id" required><br>
        
        <label for="check_in_date">Check-in Date:</label><br>
        <input type="date" id="check_in_date" name="check_in_date" required><br>
        
        <label for="check_out_date">Check-out Date:</label><br>
        <input type="date" id="check_out_date" name="check_out_date" required><br><br>
        
        <input type="submit" value="Add Reservation">
    </form>
</body>
</html>
