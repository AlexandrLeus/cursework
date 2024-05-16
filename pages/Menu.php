<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php require_once('../elements/Header.php'); ?> 
<main class="main_page">
        <div class="title">
          <h1 class="text_size43 black_color">Наши лучшие  <span class="purple_color">рестораны</span></h1>
        </div>
        <div class="container">
          <div class="restaurants_and_dishes">
          <?php
            require_once '../vendor/connect.php';
            $searchWord = "top_dishes";
            $sql = "SELECT * FROM `restaurants` ";

            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $show_img = base64_encode($row['image']);
                    $title = $row['title'];
                    $category = $row['category'];
            ?>
            <div class="block_restaurants">
              <img width="396px" height="176px" src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="" />
              <div class="product_container">
              <?php 
                        if($category == 'healthy'){
                            echo "<p class=\"healthy\">".$category."</p>";
                        }else if ($category ="trending"){
                            echo "<p class=\"trending\">Trending</p>";
                        }else if($category = "supreme"){
                            echo "<p class=\"supreme\">Supreme</p>";
                        };
                        ?>
                <h3 class="text_size25"><?= $title ?></h3>
                <span class="text_size18">24min •</span><img class="purple_star" src="../svg/purple_Star.svg"
                  alt="" /><span class="text_size18">4.8</span>
              </div>
            </div>
          
            <?php
                }
            }
            ?>
          </div>
          <div class="view_all">
            <a href="">Просмотреть все &rarr;</a>
          </div>
          <div class="line"></div>
        </div>
        <div class="title">
          <h1 class="text_size43 black_color">Наши лучшие <span class="purple_color">блюда</span></h1>
        </div>
        <div class="container">
          <div class="restaurants_and_dishes">
          <?php
            $searchWord = "top_dishes";
            $sql = "SELECT * FROM `products` WHERE `alt` LIKE '%$searchWord%'";

            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $show_img = base64_encode($row['image']);
                    $title = $row['title'];
                    $price = explode(".", $row['price']);
                    if ($price[1]==0) {
                      $price[1]="00";
                    };
                    $category = $row['category'];

            ?>
            <div onclick="document.location='../pages/Product_info?id=<?php echo $row['id'] ?>'" class="block_dishes">
              <img width="200px" height="200px" src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="" />
              <div class="product_container">
              <?php 
                        if($category == 'healthy'){
                            echo "<p class=\"healthy\">".$category."</p>";
                        }else if ($category ="trending"){
                            echo "<p class=\"trending\">Trending</p>";
                        }else if($category = "supreme"){
                            echo "<p class=\"supreme\">Supreme</p>";
                        };
                        ?>
                <h3 class="text_size25"><?= $title ?></h3>
                <span class="text_size18">24min •</span><img class="purple_star" src="../svg/purple_Star.svg"
                  alt="" /><span class="text_size18">4.8</span>
                <div class="price_and_purchase">
                  <p class="text_size25">$<?= $price[0] ?>.<span class="text_size18"><?= $price[1]?></span></p>
                  <a class="add_to_cart text_size25" href="../vendor/guide_basket.php?id=<?php echo $row['id'] ?>">+</a>
                </div>
              </div>
            </div>
            <?php
                }
            }
            ?>
          </div>
          <div class="view_all">
            <a href="">Просмотреть все &rarr;</a>
          </div>
          <div class="line"></div>
        </div>
        <div class="title">
          <h1 class="text_size43 black_color">Часто задаваемые
 <br/> <span class="purple_color">вопросы</span></h1>
        </div>
        <div class="container">
          <details id="details">
            <summary id="btn" class="text_size25">Сколько времени займет доставка?<span id="span" class="click_minus click_plus"></span></summary>
            <p class="text_size18">Вы можете получить информацию, обратившись в нашу службу поддержки, которая работает круглосуточно и без выходных.
            </p>
          </details>
          <div class="line"></div>
          <details id="details">
            <summary id="btn" class="text_size25">Как это работает ?<span id="span" class="click_minus click_plus"></span></summary>
            <p></p>
          </details>
          <div class="line"></div>
          <details  id="details">
            <summary id="btn" class="text_size25">Как работает ваша служба доставки еды?<span id="span" class="click_minus click_plus"></span></summary>
            <p></p>
          </details>
          <div class="line"></div>
          <details  id="details">
            <summary id="btn" class="text_size25">Какие варианты оплаты вы принимаете?<span id="span" class="click_minus click_plus"></span></summary>
            <p></p>
          </details>
          <div class="line"></div>
          <details  id="details">
            <summary id="btn" class="text_size25">Предлагаете ли вы скидки или акции?<span id="span" class="click_minus click_plus"></span></summary>
            <p></p>
          </details>
          <div class="line"></div>
        </div>
      </main>
      <script src="../js/menu.js"></script>
      <?php require_once('../elements/Footer.php'); ?>
</body>
</html>