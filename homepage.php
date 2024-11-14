<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - All Users</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Homepage!</h1>
        
        <!-- All Users Table -->
        <h2>All User Details</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <p style="margin-top: 20px;">
           <a href="logout.php" class="logout-btn">Logout</a>
        </p>

    </div>
</body>
</html>
