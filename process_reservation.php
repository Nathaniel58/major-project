<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start a new session or resume the existing session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Include the database connection file
require 'config.php';

// Ensure the database connection is established
if (!$pdo) {
    die("Database connection failed.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize POST data
    $customer_id = intval($_POST['customer_id']);
    $room_number = intval($_POST['room_number']);
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $room_type = htmlspecialchars($_POST['room_type']);
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $status = htmlspecialchars($_POST['status']);

    try {
        // Prepare and execute statement to fetch price per night
        $stmt = $pdo->prepare("SELECT price FROM roomtypes WHERE type = ?");
        $stmt->execute([$room_type]);
        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($room) {
            $price_per_night = $room['price'];
            $days = (strtotime($check_out_date) - strtotime($check_in_date)) / (60 * 60 * 24);
            $total_amount = $price_per_night * $days;

            // Prepare and execute statement to insert reservation
            $stmt = $pdo->prepare("INSERT INTO reservations (customer_id, room_number, name, email, phone, room_type, check_in_date, check_out_date, total_amount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt->execute([$customer_id, $room_number, $name, $email, $phone, $room_type, $check_in_date, $check_out_date, $total_amount, $status])) {
                echo "Reservation successful!";
            } else {
                echo "Reservation failed! Please try again.";
            }
        } else {
            echo "Room type not found!";
        }
    } catch (PDOException $e) {
        // Catch and display any SQL or connection errors
        echo "An error occurred: " . $e->getMessage();
    }
}
?>

