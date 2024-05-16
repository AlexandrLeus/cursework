<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-info</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php require_once('../elements/Header.php');
    require_once '../vendor/connect.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = $connect->query($query);
    $row = $result->fetch_assoc();
    $img = base64_encode($row['image']);
    ?>

    <main class="product_info">
        <div class="product_info_img">
            <img width="300" height="300" src="data:image/jpeg;base64,<?php echo $img ?>">
        </div>
        <div class="info">
            <p class="text_size35"><?php echo $row['title'] ?></p>
            <p class="about_product text_size18"><?php echo $row['about'] ?></p>
            <p class="text_size25"><?php echo $row['price'] ?> $</p>
            <a class="product_info_btn text_size25" href="../vendor/guide_basket.php?id=<?php echo $row['id'] ?>">Добавить в корзину</a>
        </div>
    </main>
    <?php require_once('../elements/Footer.php'); ?>
</body>

</html>