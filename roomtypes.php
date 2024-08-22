<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = htmlspecialchars($_POST['type']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']);

    $stmt = $pdo->prepare("INSERT INTO roomtypes (type, description, price) VALUES (?, ?, ?)");
    
    if ($stmt->execute([$type, $description, $price])) {
        echo "Room type data inserted successfully!";
    } else {
        echo "Failed to insert room type data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room Type</title>
</head>
<body>
    <h1>Add New Room Type</h1>
    <form action="add_roomtype.php" method="POST">
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="price">Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>
        
        <input type="submit" value="Add Room Type">
    </form>
</body>
</html>
