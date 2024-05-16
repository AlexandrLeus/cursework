<?php session_start();?>
<header class="header">
        <div class="container">
          <nav class="nav">
            <div class="logo">
              <a href="/"> <img src="../svg/Logo.svg" alt='' /></a>
            </div>
            <div class="navlink">
              <a class="item_navlink" href="../pages/Menu">Меню</a>
              <a class="item_navlink" href="../pages/Pricing">Цены</a>
              <a class="item_navlink" href="../pages/Contact">Контакты</a>
            </div>
            <div class="authorization">
            <?php
          if(!isset($_SESSION['user'])){
            echo " <a class=\"login\" href=\"../pages/Login\">Войти</a>
            <a class=\"sign_up\" href=\"../pages/SignUp\">Зарегистрироваться</a>";
          }else{
            if($_SESSION['user']['password'] == "4297f44b13955235245b2497399d7a93"&& $_SESSION['user']['email']=="admin@admin"){
                echo "
                <a class=\"login\" href=\"../vendor/Logout\">Выйти</a>
              <a href=\"../pages/orders\" class=\"login\">Заказы</a>
              <a class=\"sign_up\" href=\"../pages/admin_panel\">Admin Pandel</a>";
              }else {
                echo "<a class=\"login\" href=\"../vendor/Logout\">Выйти</a>
                <a href=\"../pages/orders\" class=\"login\">Заказы</a>
            <a class=\"sign_up\" href=\"../pages/Basket\">Корзина</a>";
              }
            }
        ?>
             
            </div>
          </nav>
          <div class="line"></div>
        </div>
      </header>