<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit(); // Stop further script execution after the redirect
}

// If the user is logged in, display the reservation page content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Online Reservation System</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS file -->
</head>
<body>

<header>
    <h1>Make a Reservation</h1> <!-- Page title displayed at the top -->
</header>

<nav>
    <!-- Navigation menu -->
    <a href="index.php">Home</a>
    <a href="reservation.php">Make a Reservation</a>
    <a href="dashboard.php">Customer Dashboard</a>
    <a href="admin.php">Admin Dashboard</a>
</nav>

<div class="container">
    <h2>Reservation Form</h2> <!-- Section title -->

    <!-- Form begins here -->
    <form action="process_reservation.php" method="POST">
        
        <!-- Customer ID -->
        <label for="customer_id">Customer ID</label>
        <input type="number" name="customer_id" id="customer_id" required> 
        <!-- Input field for Customer ID (numeric) -->

        <!-- Room Number -->
        <label for="room_id">Room number</label>
        <input type="number" name="room_number" id="room_id" required>
        <!-- Input field for Room Number (numeric) -->

        <!-- Full Name -->
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" required>
        <!-- Input field for Full Name (text) -->

        <!-- Email Address -->
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        <!-- Input field for Email Address -->

        <!-- Phone Number -->
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" required>
        <!-- Input field for Phone Number (text) -->

        <!-- Room Type -->
        <label for="room_type">Room Type</label>
        <select name="room_type" id="room_type" required>
            <option value="Select room type" selected>Select room type</option>
            <option value="self-contain" data-price="250">Self-Contain - K250 per night</option>
            <option value="dublex" data-price="210">Dublex/Twin-Share - K210 per night</option>
            <option value="standard" data-price="150">Standard - K150 per night</option>
        </select>
        <!-- Dropdown for selecting the room type -->

        <!-- Check-in Date -->
        <label for="check_in_date">Check-in Date</label>
        <input type="date" name="check_in_date" id="check_in_date" required>
        <!-- Input field for selecting the Check-in Date -->

        <!-- Check-out Date -->
        <label for="check_out_date">Check-out Date</label>
        <input type="date" name="check_out_date" id="check_out_date" required>
        <!-- Input field for selecting the Check-out Date -->

        <!-- Total Amount -->
        <label for="total_amount">Total Amount (in PNG Kina)</label>
        <span id="currency_prefix">K</span>
        <input type="number" step="10" name="total_amount" id="total_amount" required>
        <!-- Input field for Total Amount with currency prefix (in PNG Kina) -->

        <!-- Status -->
        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="state your status">state your status</option>
            <option value="confirmed">Confirmed</option>
            <option value="pending">Pending</option>
            <option value="cancelled">Cancelled</option>
            <option value="checked_in">Checked-in</option>
            <option value="checked_out">Checked-out</option>
            <option value="no_show">No-show</option>
        </select>
        <!-- Dropdown for selecting the reservation status -->

        <!-- Submit Button -->
        <input type="submit" value="Submit Reservation">
        <!-- Submit button to submit the form data -->
    </form>
    <!-- Form ends here -->
</div>

<script src="js/main.js"></script> <!-- Link to external JavaScript file -->
</body>
</html>
