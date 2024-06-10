<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    
    // Захист від XSS атак
    $name = htmlspecialchars($name); 
    $surname = htmlspecialchars($surname); 
    $email = htmlspecialchars($email); 
    $adress = htmlspecialchars($adress);
    $product = htmlspecialchars($product);
    $quantity = htmlspecialchars($quantity);

    // Декодування URL
    $name = urldecode($name); 
    $surname = urldecode($surname); 
    $email = urldecode($email); 
    $adress = urldecode($adress);
    $product = urldecode($product);
    $quantity = urldecode($quantity);

    // Видалення пробілів
    $name = trim($name); 
    $surname = trim($surname); 
    $email = trim($email); 
    $adress = trim($adress);
    $product = trim($product);
    $quantity = trim($quantity);

    // Збереження даних до файлу з коректним роздільником
    $orderData = "$name|$surname|$email|$adress|$product|$quantity\n";
    $file = 'datastorage/user_orders.ser';
    if (file_put_contents($file, $orderData, FILE_APPEND | LOCK_EX)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
