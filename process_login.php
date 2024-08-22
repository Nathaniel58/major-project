
<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    if ($role == 'admin') {
        // Check in the staff table
        $stmt = $pdo->prepare("SELECT * FROM staff WHERE username = ? AND password = ?");
    } else {
        // Check in the customers table
        $stmt = $pdo->prepare("SELECT * FROM customers WHERE username = ? AND password = ?");
    }

    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: customer_dashboard.php');
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid request.";
}
?>
