<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $amount = $_POST['amount'];
    $payment_date = date('Y-m-d');

    $stmt = $pdo->prepare("INSERT INTO payments (reservation_id, amount, payment_date) VALUES (?, ?, ?)");
    if ($stmt->execute([$reservation_id, $amount, $payment_date])) {
        echo "Payment successful!";
    } else {
        echo "Payment failed!";
    }
}
?>
