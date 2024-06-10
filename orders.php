<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Читання даних з файлу
$file = 'datastorage/user_orders.ser';
if (file_exists($file)) {
    $orders = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $orders = [];
}

// Налагоджувальний вивід даних для перевірки
// echo '<pre>';
// print_r($orders);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <span class="navbar-brand">Admin</span>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.html">Sign out</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container pt-3">
    <h1>Orders</h1>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Ім'я</th>
                <th>Прізвище</th>
                <th>Email</th>
                <th>Адреса</th>
                <th>Товар</th>
                <th>Кількість</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $index => $order): ?>
                <?php
                $orderDetails = explode('|', $order);
                if (count($orderDetails) !== 6) {
                    // Якщо дані некоректні, пропустити цей запис
                    continue;
                }
                ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($orderDetails[0]) ?></td>
                    <td><?= htmlspecialchars($orderDetails[1]) ?></td>
                    <td><?= htmlspecialchars($orderDetails[2]) ?></td>
                    <td><?= htmlspecialchars($orderDetails[3]) ?></td>
                    <td><?= htmlspecialchars($orderDetails[4]) ?></td>
                    <td><?= htmlspecialchars($orderDetails[5]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
