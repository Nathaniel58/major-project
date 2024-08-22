<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Malolo Inn Online Reservation System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>Malolo Inn - Login</h1>
</header>

<!--
<nav>
    <a href="index.php">Home</a>
    <a href="reservation.php">Make a Reservation</a>
    <a href="dashboard.php">Customer Dashboard</a>
    <a href="admin.php">Admin Dashboard</a>
</nav>
-->

<div class="container">
    <h2>Login</h2>
    <form action="process_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="role">Login as:</label>
        <select id="role" name="role" required>
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
        </select>
        
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
