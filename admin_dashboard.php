<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Admin dashboard content goes here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Malolo Inn</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
        <!-- Add other admin-specific navigation links here -->
    </nav>

    <div class="container">
        <h2>Admin Dashboard</h2>
        <!-- Admin-specific content goes here -->
    </div>
</body>
</html>
