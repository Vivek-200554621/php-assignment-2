<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before comparing with the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];

        // Redirect to the appropriate dashboard
        if ($_SESSION['is_admin']) {
            header("Location: admindashboard.php");
        } else {
            header("Location: userdashboard.php");
        }
        exit();
    } else {
        // Failed login
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: login.php");
    exit();
}
?>
