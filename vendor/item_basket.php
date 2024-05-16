<?php
session_start();
require_once 'connect.php';
if (isset($_SESSION['cart'])) :
    foreach ($_SESSION['cart'] as $item) :
        $id = $item['id'];

        $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
        while ($row = mysqli_fetch_assoc($product)) :
            $show_img = base64_encode($row['image']);
            $title = $row['title'];
            $price = $row['price'];
?>
            <div data-id="<?php echo $id; ?>" class="goods">
                <img class="basket_img" src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="">
                <div class="about_goods">
                    <h5 id="title" class="text_size25"><?php echo $title ?></h5>
                    <p id="price" class="text_size18"><?php echo $price ?></p>
                </div>
                <div class="quantity">
                    <p id="final_price" class="intermediate_cost text_size15 black_color"><?echo $price?></p>
                    <button  class="btn_minus">-</button>
                    <p id="quantity">1</p>
                    <button  class="btn_plus">+</button>
                    <a class="del_goods" href="../vendor/delete_item_basket.php?del_id=<?php echo $row['id'] ?>"><img src="../svg/cross_basket.svg" alt=""></a>
        </div>
            </div>
<?php
 endwhile;
    endforeach;
endif;
 ?>
 <script src="../js/basket.js"></script>