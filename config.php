<?php
// Database connection settings
$host = 'localhost';        // Database host
$db = 'maloloinn';          // Database name
$user = 'root';             // Database user (default for XAMPP)
$pass = '';                 // Database password (leave empty for XAMPP)

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    // Set the PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Check if the connection is successful
    if ($pdo) {
        // Connection successful
    } else {
        // Connection failed
        die("Could not connect to the database.");
    }
} catch (PDOException $e) {
    // If connection fails, output the error and stop the script
    die("Could not connect to the database: " . $e->getMessage());
}
?>
