<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = intval($_POST['staff_id']);
    $action = htmlspecialchars($_POST['action']);
    $timestamp = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO log (staff_id, action, timestamp) VALUES (?, ?, ?)");
    
    if ($stmt->execute([$staff_id, $action, $timestamp])) {
        echo "Log data inserted successfully!";
    } else {
        echo "Failed to insert log data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Log Entry</title>
</head>
<body>
    <h1>Add New Log Entry</h1>
    <form action="add_log.php" method="POST">
        <label for="staff_id">Staff ID:</label><br>
        <input type="number" id="staff_id" name="staff_id" required><br>
        
        <label for="action">Action:</label><br>
        <textarea id="action" name="action" required></textarea><br><br>
        
        <input type="submit" value="Add Log Entry">
    </form>
</body>
</html>
