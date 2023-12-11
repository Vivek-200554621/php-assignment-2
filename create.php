<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Insert data into the database
    $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
    mysqli_query($conn, $sql);

    // Redirect to the index page after creation
    header("Location: index.php");
    exit();
}
?>
