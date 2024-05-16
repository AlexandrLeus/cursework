<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('../elements/Header.php'); ?>
    <main>
        <div class="title">
            <h1 class="text_size43 black_color">Заказы</h1>
        </div>
        <table class="orders">
            <?php if ($_SESSION['user']['password'] == "4297f44b13955235245b2497399d7a93" && $_SESSION['user']['email'] == "admin@admin") { ?>
                <thead>
                    <tr class="orders_block text_size20">
                        <th scope="col">№ заказа</th>
                        <th scope="col">Дата заказа</th>
                        <th scope="col">Название товара</th>
                        <th scope="col">Количество товара</th>
                        <th scope="col">Цена заказа</th>
                        <th scope="col">Статус заказа</th>
                        <th scope="col">Имя заказчика</th>
                        <th scope="col">Номер заказчика</th>
                        <th scope="col">Адрес заказчика</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
            <?php } else { ?>
                <thead>
                    <tr class="orders_block text_size20">
                        <th scope="col">№ заказа</th>
                        <th scope="col">Дата заказа</th>
                        <th scope="col">Название товара</th>
                        <th scope="col">Количество товара</th>
                        <th scope="col">Цена заказа</th>
                        <th scope="col">Статус заказа</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
            <?php } ?>
            <tbody>
                <?php include('../vendor/item_orders.php'); ?>
            </tbody>
        </table>

    </main>
    <?php require_once('../elements/Footer.php'); ?>
    <script src="../js/modal.js"></script>
</body>

</html>