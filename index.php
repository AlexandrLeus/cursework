<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="./img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eatly</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php require_once('./elements/Header.php'); ?>
<main class="main_page">
        <div class="container">
            <div class="enjoy_food">
                <div class="block_content">
                    <div class="min_line"></div>
                    <span class="text_size15">БОЛЕЕ 1000 ПОЛЬЗОВАТЕЛЕЙ</span>
                    <h1 class="text_size75">Наслаждайтесь едой по всему <span class="purple_color">миру</span></h1>
                    <h3 class="text_size18">EatLy поможет вам установить цели по экономии, получить предложения по возврату денег.  <br/> Получите бонус в размере <span
                            class="purple_color"> 20 долларов.</span></h3>
                    <div class="button_enjoy_food">
                        <a class="button_get_started" href="./pages/Menu">Get Started</a>
                        <a class="button_go_pro" href="./pages/Pricing">Go Pro</a>
                    </div>
                    <div class="trustpilot">
                        <img class="trustpilot_item" src="./svg/trustpilot.svg" alt=""/>
                        <img src="./svg/Star.svg" alt=""/>
                        <span class="text_size15">4900+</span>
                    </div>
                </div>
                <div class="picture_of_dish">
                    <img src="./svg/main_page_picture.svg" alt=""/>
                </div>
            </div>
        </div>
        <div class="achievements">
            <div class="container">
                <div class="achievement_block">
                    <div class="achievement_item">
                        <h1 class="text_size43">10K+</h1>
                        <p class="text_size15">Довольные клиенты <br/> во всем мире </p>
                    </div>
                    <div class="vertical_line"></div>
                    <div class="achievement_item">
                        <h1 class="text_size43">4M</h1>
                        <p class="text_size15">Продаются здоровые блюда <br/>  включая молочные коктейли</p>
                    </div>
                    <div class="vertical_line"></div>
                    <div class="achievements_item">
                        <h1 class="text_size43">99.99%</h1>
                        <p class="text_size15">Надежная поддержка Cushrefmer <br/> Мы предоставляем отличный опыт</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="premium_quality">
                <div class="picture_of_phone">
                    <img src="./svg/Mobile.svg" alt=""/>
                </div>
                <div class="block_content">
                    <h1 class="text_size51">
Премиальное <span class="purple_color">качество</span> <br/> для вашего здоровья</h1>
                    <ul class="premium_quality_content">
                        <li class="text_size18">Продукты премиум-качества изготавливаются из ингредиентов,
богатых необходимыми витаминами и минералами. </li>
                        <li class="text_size18">Эти продукты улучшают общее самочувствие, поддерживая
здоровое пищеварение и повышая иммунитет. </li>
                    </ul>
                    <a class="button_get_started" href="">Download &rarr; </a>
                </div>
            </div>
            <div class="line"></div>
        </div>
        <div class="title">
            <h1 class="text_size43 black_color">Наши лучшие <span class="purple_color">рестораны</span></h1>
        </div>
        <div class="container">
            <div class="restaurants_and_dishes">
            <?php
            require_once './vendor/connect.php';
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
                <a href="./pages/Menu">Просмотреть все &rarr;</a>
            </div>
            <div class="line"></div>
        </div>
        <div class="title">
            <h1 class="text_size43 black_color">Наши лучшие <span class="purple_color">блюда</span></h1>
        </div>
        <div class="container">
            <div class="restaurants_and_dishes">
            <?php
            require_once 'vendor/connect.php';

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
                <div onclick="document.location='./pages/Product_info?id=<?php echo $row['id'] ?>'" class="block_dishes">
                    <img width="200px" height="200px" src="data:image/jpeg;base64,<?php echo $show_img ?>" alt=""/>
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
                        <span class="text_size18">24min •</span><img class="purple_star" src="./svg/purple_Star.svg"
                            alt=""/><span class="text_size18">4.8</span>
                        <div class="price_and_purchase">
                            <p class="text_size25">$ <?= $price[0] ?>.<span class="text_size18"><?= $price[1]?></span></p>
                            <a class="add_to_cart text_size25" href="./vendor/guide_basket.php?id=<?php echo $row['id'] ?>">+</a>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            </div>
            <div class="view_all">
                <a href="./pages/Menu">Просмотреть все &rarr;</a>
            </div>
            <div class="line"></div>
        </div>
        <div class="get_50">
            <div class="bg">
                <img class="bg_absolute2" src="./svg/Group 34845.svg" alt=""/>
                <img class="bg_absolute" src="./svg/Group 34844.svg" alt=""/>
            </div>
            <div class="container">
                <div class="content_get50">
                    <div class="subscribe">
                        <h1 class="text_size70">GET 50%</h1>
                        <form class="form_subscribe" method="post" action="">
                            <input class="input_email text_size18 purple_color" placeholder="Enter Your Email Address" type="email"/>
                            <button type="submit" class="button_subscribe">subscribe</button>
                        </form>
                    </div>
                    <div class="picture_of_dishes">
                        <img src="./svg/Food Image get 50.svg" alt=""/>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?php require_once('./elements/Footer.php'); ?>
</body>
</html>