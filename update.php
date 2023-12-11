<?php
include 'config.php';

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the item from the database
$sql = "SELECT * FROM items WHERE id = $id";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated data from the form
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Update data in the database
    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to the index page after updating
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Update Item</h2>

    <!-- Update Form -->
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $item['name'] ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" required><?= $item['description'] ?></textarea>
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
