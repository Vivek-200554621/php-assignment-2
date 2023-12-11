<?php
session_start();
include 'config.php';

// Fetch all items from the database
$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<?php include '/includes/header.php'; ?>

<div class="container">
    <h1>CRUD Application</h1>

    <?php
    // Display content based on user authentication status
    if (isset($_SESSION['user_id'])) {
        if ($_SESSION['is_admin']) {
            include 'admindashboard.php'; // Admin dashboard
        } else {
            include 'userdashboard.php'; // Regular user dashboard
        }
    } else {
        include 'login.php'; // If not logged in, show login form
    }
    ?>

</div>

<?php include '/includes/footer.php'; ?>

</body>
</html>
