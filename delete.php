<?php
include 'config.php';

// Get the ID from the URL
$id = $_GET['id'];

// Delete the item from the database
$sql = "DELETE FROM items WHERE id = $id";
mysqli_query($conn, $sql);

// Redirect to the index page after deletion
header("Location: index.php");
exit();
?>
