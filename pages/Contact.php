<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php require_once('../elements/Header.php'); ?>
<main class="main_page">
        <div class="contact">
          <div class="just_contact">
            <h3 class="text_size43">Просто свяжитесь</h3>
            <img src="../svg/arrow.svg" alt="" />
            <img class="contact_phone" src="../img/phone.png" alt="" />
          </div>
          <div class="customer_support">
            <h3 class="text_size43 black_color cotact_title">Служба <span class="purple_color">поддержки</span></h3>
            <form action="" class="form">
              <input placeholder="ПОЛНОЕ ИМЯ" class="contact_form_item purple_color text_size15" type="text" />
              <input placeholder="ВВЕДИТЕ АДРЕС ЭЛЕКТРОННОЙ ПОЧТЫ" class="contact_form_item purple_color text_size15" type="email" />
              <textarea placeholder="ВВЕДИТЕ ПРОБЛЕМУ ИЛИ ЗАПРОС" class="form_textarea text_size15 purple_color" name="" id="" cols="10" rows="10"></textarea>
              <button class="sign_up text_size25">Отправить сейчас</button>
            </form>
          </div>
        </div>
      </main>
      <?php require_once('../elements/Footer.php'); ?>
</body>
</html>