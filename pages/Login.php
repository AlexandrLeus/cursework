<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/index.css">
</head>

<body>
  <?php require_once('../elements/Header.php'); ?>
  <main class='main_page'>
    <div class="sign_up_to_eatly">
      <div class="sign_in_form">
        <p class="text_size35">Войти в систему</p>
        <?php
        if ($_SESSION['message']) {
          echo   $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
        <div class="sign_up_to_eatly">
          <a class="G" href="">
            <div class="social_item">
              <p class="G">G</p>
            </div>
          </a>
          <a href="">
            <div class="social_item">
              <img src="../svg/apple.svg" alt="" />
            </div>
          </a>
        </div>
        <p class="text_size18">ИЛИ</p>
        <form class="form" action="../vendor/sign_in" method="post">
          <input placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="form_item text_size15 purple_color" type="email" name="email" />
          <input placeholder="ПАРОЛЬ" class="form_item text_size15 purple_color" type="password" name="password" autoComplete='off' />
          <a class="text_size15 purple_color">Забыть пароль ?</a>
          <button type="submit" class="sign_up text_size18">Войти</button>
        </form>
        <p class="text_size18">Создать новый аккаунт? <a class="purple_color" href="SignUp">Зарегистрироваться</a></p>
      </div>
      <div class="right_picture">
        <img class="svg_sign_up" src="../svg/block.svg" alt="" />
        <img class="svg2_sign_up" src="../svg/Vector.svg" alt="" />
        <img src="../img/picture_sign_in.png" alt="" />
        <h3 class="text_size43">Находите еду с любовью </h3>
        <p class="text_size15">Eatly — это панель доставки еды, в которой представлено более 2 тысяч блюд,
          <br /> включая азиатские, китайские, итальянские и многие другие. Наша панель управления
          <br /> поможет
вам управлять заказами и деньгами.
        </p>
      </div>
    </div>
  </main>
  <?php require_once('../elements/Footer.php'); ?>
</body>

</html>