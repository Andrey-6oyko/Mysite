<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Простий приклад авторизації
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['loggedin'] = true;
        header('Location: orders.php');
        exit;
    } else {
        echo 'Invalid username or password.';
    }
} else {
    echo 'Invalid request method.';
}

