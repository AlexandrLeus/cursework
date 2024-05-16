<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php require_once('../elements/Header.php'); ?>
    <main>
        <div class="title">
            <h1 class="text_size43 black_color">Корзина</h1>
        </div>
        <div class="container">
            <?php include('../vendor/item_basket.php');
            if ($price == 0) {
                echo "<h1 class=\"title text_size35\">Корзина пуста</h1>";
            } else {
            ?>
                <form action="Orders" method="post" id="OrderForm" class="form">
                    <input class="basket_form_item text_size18 purple_color" placeholder="Имя получателя" id="name" name="name" type="text" required>
                    <input class="basket_form_item text_size18 purple_color" placeholder="Номер телефона" id="phone" name="phone" type="text" required>
                    <input class="basket_form_item text_size18 purple_color" placeholder="Ваш адрес" id="address" name="address" type="text" required>
                    <div class="coupon">
                        <input placeholder="Применить купон" class="coupon_input text_size18 purple_color" type="text">
                        <button class="coupon_apply_btn text_size18">Применять</button>
                    </div>
                    <div class="final_price">
                        <p class="text_size18">Промежуточный итог</p>
                        <p id="subtotal" class="text_size18"></p>
                    </div>
                    <div class="dashed_line"></div>
                    <div class="final_price">
                        <p class="text_size18">Доставка</p>
                        <p class="text_size18">$3.59</p>
                    </div>
                    <div class="dashed_line"></div>
                    <div class="final_price">
                        <p class="text_size25">Конечная цена заказа</p>
                        <p id="total" class="text_size25"></p>
                    </div>
                    <button id="orderBtn" style="margin-bottom: 100px;" class="sign_up text_size25">Заказать</button>
                </form>
            <?php } ?>
        </div>
    </main>
    <?php require_once('../elements/Footer.php'); ?>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="../js/basket.js"></script>
  <script src="../js/fetch.js"></script>
</body>
</html>