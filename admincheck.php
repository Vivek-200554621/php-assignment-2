<?php
session_start();

// Check if the user is an admin; redirect to index.php if not
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: index.php");
    exit();
}
?>
