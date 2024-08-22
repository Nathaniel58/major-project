<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['action']) {
        case 'add_customer':
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $password])) {
                echo "Customer data inserted successfully!";
            } else {
                echo "Failed to insert customer data!";
            }
            break;

        case 'add_rooms':
            $room_number = htmlspecialchars($_POST['room_number']);
            $room_type_id = intval($_POST['room_type_id']);
            $stmt = $pdo->prepare("INSERT INTO rooms (room_number, room_type_id) VALUES (?, ?)");
            if ($stmt->execute([$room_number, $room_type_id])) {
                echo "Room data inserted successfully!";
            } else {
                echo "Failed to insert room data!";
            }
            break;

        case 'add_roomtypes':
            $type = htmlspecialchars($_POST['type']);
            $description = htmlspecialchars($_POST['description']);
            $price = floatval($_POST['price']);
            $stmt = $pdo->prepare("INSERT INTO roomtypes (type, description, price) VALUES (?, ?, ?)");
            if ($stmt->execute([$type, $description, $price])) {
                echo "Room type data inserted successfully!";
            } else {
                echo "Failed to insert room type data!";
            }
            break;

        case 'add_payment':
            $reservation_id = intval($_POST['reservation_id']);
            $amount = floatval($_POST['amount']);
            $payment_date = date('Y-m-d');
            $stmt = $pdo->prepare("INSERT INTO payment (reservation_id, amount, payment_date) VALUES (?, ?, ?)");
            if ($stmt->execute([$reservation_id, $amount, $payment_date])) {
                echo "Payment data inserted successfully!";
            } else {
                echo "Failed to insert payment data!";
            }
            break;

        case 'add_log':
            $staff_id = intval($_POST['staff_id']);
            $action = htmlspecialchars($_POST['action']);
            $timestamp = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare("INSERT INTO log (staff_id, action, timestamp) VALUES (?, ?, ?)");
            if ($stmt->execute([$staff_id, $action, $timestamp])) {
                echo "Log data inserted successfully!";
            } else {
                echo "Failed to insert log data!";
            }
            break;

        case 'add_staff':
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = htmlspecialchars($_POST['role']);
            $stmt = $pdo->prepare("INSERT INTO staff (name, email, password, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$name, $email, $password, $role])) {
                echo "Staff data inserted successfully!";
            } else {
                echo "Failed to insert staff data!";
            }
            break;

        case 'add_reservations':
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
            break;

        default:
            echo "Invalid action!";
            break;
    }
}
?>
