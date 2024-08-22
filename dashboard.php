<?php
// Database connection
$servername = "localhost"; // Update with your server name
$username = "root"; // Update with your username
$password = ""; // Update with your password
$database = "maloloinn"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume the customer is logged in and we have their ID
$customer_id = 1; // Replace with actual logged-in user ID

// Fetch reservations for the logged-in customer
$sql = "SELECT * FROM reservations WHERE customer_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Query failed: " . $stmt->error);
}

// Display reservations
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Customer Dashboard</h1>
</header>
<nav>
    <a href="index.php">Home</a>
    <a href="reservation.php">Make a Reservation</a>
    <a href="dashboard.php">Customer Dashboard</a>
    <a href="admin.php">Admin Dashboard</a>
</nav>
<div class="container">
    <h2>Your Reservations</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['room_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['check_in_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['check_out_date']); ?></td>
                        <td><?php echo 'K' . htmlspecialchars($row['total_amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have no reservations.</p>
    <?php endif; ?>
</div>
<script src="js/main.js"></script>
</body>
</html>
<?php
// Close statement and connection
$stmt->close();
$conn->close();
?>
 