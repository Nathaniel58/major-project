<?php
session_start();

// Check if the user is logged in and is a customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    header('Location: login.php');
    exit();
}

// Customer dashboard content goes here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard | Malolo Inn</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?> (Customer)</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
        <!-- Add other customer-specific navigation links here -->
    </nav>

    <div class="container">
        <h2>Customer Dashboard</h2>
        <!-- Customer-specific content goes here -->
    </div>
</body>
</html>
