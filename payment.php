<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = intval($_POST['reservation_id']);
    $amount = floatval($_POST['amount']);
    $payment_date = date('Y-m-d');

    $stmt = $pdo->prepare("INSERT INTO payment (reservation_id, amount, payment_date) VALUES (?, ?, ?)");
    
    if ($stmt->execute([$reservation_id, $amount, $payment_date])) {
        echo "Payment data inserted successfully!";
    } else {
        echo "Failed to insert payment data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment</title>
</head>
<body>
    <h1>Add New Payment</h1>
    <form action="add_payment.php" method="POST">
        <label for="reservation_id">Reservation ID:</label><br>
        <input type="number" id="reservation_id" name="reservation_id" required><br>
        
        <label for="amount">Amount:</label><br>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        
        <input type="submit" value="Add Payment">
    </form>
</body>
</html>
