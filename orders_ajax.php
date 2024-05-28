<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    
    $name = htmlspecialchars($name); 
    $surname = htmlspecialchars($surname); 
    $email = htmlspecialchars($email); 
    $adress = htmlspecialchars($adress);
    $product = htmlspecialchars($product);
    $quantity = htmlspecialchars($quantity);

    $name = urldecode($name); 
    $surname = urldecode($surname); 
    $email = urldecode($email); 
    $adress = urldecode($adress);
    $product = urldecode($product);
    $quantity = urldecode($quantity);

    $name = trim($name); 
    $surname = trim($surname); 
    $email = trim($email); 
    $adress = trim($adress);
    $product = trim($product);
    $quantity = trim($quantity);


    // Збереження даних до бази даних або обробка замовлення
    // Приклад збереження у файл (для простоти)
    $orderData = "Ім'я: $name\nПрізвище: $surname\nmail: $email\nАдреса: $adress\nТовар: $product\nКількість: $quantity\n\n";
    file_put_contents('datastorage\user_orders.ser', $orderData, FILE_APPEND);
    
  // Збереження даних у файл
  $file = 'datastorage\user_orders.ser';
  if (file_put_contents($file, $orderData, FILE_APPEND | LOCK_EX)) {
      echo 'success';
  } else {
      echo 'error';
  }
} else {
  echo 'error';
}
