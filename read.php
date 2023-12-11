<?php
include 'config.php';

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the item from the database
$sql = "SELECT * FROM items WHERE id = $id";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Item Details</h2>

    <?php if ($item) : ?>
        <p><strong>Name:</strong> <?= $item['name'] ?></p>
        <p><strong>Description:</strong> <?= $item['description'] ?></p>
        <a href="index.php">Back to Home</a>
    <?php else : ?>
        <p>Item not found.</p>
    <?php endif; ?>
</div>

</body>
</html>
