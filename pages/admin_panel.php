<?php
include('../elements/header.php');
session_start();
include_once '../vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="image/x-icon" rel="shortcut icon" href="../img/Logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_panel.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>admin_panel</title>
</head>

<body>
    <div class="container">
        <?php
        if ($_SESSION['user']['password'] == "4297f44b13955235245b2497399d7a93" && $_SESSION['user']['email'] == "admin@admin") {
        ?>
            <div class="title">
                <h1 class="text_size43 black_color">Welcome</h1>
            </div>
            <div class="admin_block" id="product">
                <form action="#product" method="post" enctype="multipart/form-data" class="admin_panel">

                    <h1 class="text_size35 black_color">Add product</h1>
                    <?php
                    if (isset($_POST['upload'])) {
                        if (!empty($_FILES['file']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                        $about = $_POST['about'];
                        $price = $_POST['price'];
                        $alt = $_POST['alt'];
                        $category = $_POST['category'];
                        $description = $_POST['description'];
                        if ($alt == '') {
                            echo '<h3 style="color:red;" class="text_size18">You have not selected a value</h3>';
                        } else {
                            $add_product = mysqli_query($connect, "INSERT INTO `products`(`image`,`title`,`price`,`alt`,`category`,`about`)VALUES('$img','$about','$price','$alt','$category','$description')");
                            if (!$add_product) {
                                echo '<h3 style="color:red;" class="text_size18">Data entered incorrectly</h3>';
                            } else {
                                echo '<h3 style="color:green;" class="text_size18">Product added successfully</h3>';
                            }
                        }
                    }
                    ?>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Choose File</h1>
                        <input name="file" type="file">
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">About the product</h1>
                        <input class="" autocomplete="off" name="about" type="text">
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">The price of the product</h1>
                        <p class="text_size15" style="color:red;">OBLIGATORY FIELD</p>
                        <input class="" autocomplete="off" name="price" type="text"> $
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Description</h1>
                        <p class="text_size15" style="color:red;">Maximum length 180 characters</p>
                        <textarea class="description text_size15 black_color" maxlength="180px" autocomplete="off" name="description" type="text"></textarea>
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Food category</h1>
                        <select name="category" id="">
                            <option value="">Сhoose</option>
                            <option value="healthy">healthy</option>
                            <option value="supreme">supreme</option>
                            <option value="trending">trending</option>
                        </select>
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Product category</h1>
                        <p class="text_size15" style="color:red;">OBLIGATORY FIELD</p>
                        <select name="alt" id="">
                            <option value="">Сhoose</option>
                            <option value="top_dishes">top_dishes</option>
                        </select>
                    </div>
                    <button class="button_add text_size18" name="upload" type="submit">Add</button>
                </form>

                <form action="#product" enctype="multipart/form-data" method="post" class="admin_panel">

                    <h1 class="text_size35 black_color">Editing</h1>
                    <?php
                    if (isset($_POST['edit'])) {
                        $cat = $_POST['alt'];

                        $image = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
                        $imgData = file_get_contents($image);
                        $imgData = mysqli_real_escape_string($connect, $imgData);


                        if ($cat == '') {
                            echo '<h3 style="color:red;" class="text_size18">You have not selected a value</h3>';
                        } else {
                            //Если это запрос на обновление, то обновляем
                            if (isset($_GET['red_id'])) {
                                if (!empty($imgData)) {
                                    $sql = mysqli_query($connect, "UPDATE products SET  image='$imgData', title = '{$_POST['Title']}',price = '{$_POST['Price']}',alt = '$cat',category='{$_POST['EditCategory']}',about='{$_POST['Description']}' WHERE id={$_GET['red_id']}");
                                } else {
                                    $sql = mysqli_query($connect, "UPDATE products SET  title = '{$_POST['Title']}',price = '{$_POST['Price']}',category='{$_POST['EditCategory']}',alt = '$cat',about='{$_POST['Description']}' WHERE id={$_GET['red_id']}");
                                }
                            } else {
                                //Иначе вставляем данные, подставляя их в запрос
                                $sql = mysqli_query($connect, "INSERT INTO products (image,title, price,alt,category,about) VALUES ('$imgData','{$_POST['Title']}', '{$_POST['Price']}', '{$_POST['Alt']}','{$_POST['EditCategory']}','{$_POST['Description']}')");
                            }

                            //Если вставка прошла успешно
                            if ($sql) {
                                echo '<h3 style="color:green;" class="text_size18">Successfully changed!</h3>';
                            } else {
                                echo '<h3  class="text_size18">An error has occurred: ' . mysqli_error($connect) . '</h3>';
                            }
                        }
                    }

                    if (isset($_GET['red_id'])) {
                        $sql = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`={$_GET['red_id']}");
                        $product = mysqli_fetch_array($sql);
                        $show_img = base64_encode($product['image']);
                    }
                    ?>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Image</h1>
                        <input name="image" type="file" value="">
                    </div>

                    <div class="margin_bottom">
                        <h1 class="text_size25">Name</h1>
                        <input class="input" type="text" name="Title" value="<?= isset($_GET['red_id']) ? $product['title'] : ''; ?>">
                    </div>

                    <div class="margin_bottom">
                        <h1 class="text_size25">Price</h1>
                        <p class="text_size15" style="color:red;">OBLIGATORY FIELD</p>
                        <input class="input" type="text" name="Price" value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> $
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Description</h1>
                        <p class="text_size15" style="color:red;">Maximum length 180 characters</p>
                        <textarea class="description" maxlength="180px" name="Description" autocomplete="off" name="description" type="text"><?= isset($_GET['red_id']) ? $product['about'] : ''; ?></textarea>
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Food category</h1>
                        <select name="EditCategory" id="">
                            <option value="<?= isset($_GET['red_id']) ? $product['category'] : ''; ?>">Сhoose</option>
                            <option value="<?= isset($_GET['red_id']) ? $product['EditCategory'] = 'healthy' : ''; ?>">healthy</option>
                            <option value="<?= isset($_GET['red_id']) ? $product['EditCategory'] = 'supreme' : ''; ?>">supreme</option>
                            <option value="<?= isset($_GET['red_id']) ? $product['EditCategory'] = 'trending' : ''; ?>">trending</option>
                        </select>
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Product category</h1>
                        <p class="text_size15" style="color:red;">OBLIGATORY FIELD</p>
                        <select name="alt" id="">
                            <option value="">Сhoose</option>
                            <option value="<?= isset($_GET['red_id']) ? $product['alt'] = 'top_dishes' : ''; ?>">top_dishes</option>
                        </select>
                    </div>

                    <button type="submit" name="edit" value="Подтвердить" class="button_add text_size18">Confirm</button>

                </form>
            </div>


            <?php
            if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
                //удаляем строку из таблицы
                $sql = mysqli_query($connect, "DELETE FROM `products` WHERE `id` = {$_GET['del_id']}");
                if ($sql) {
                    echo '<h3  class="alert text_size18">Product removed</h3>';
                } else {
                    echo '<h3  class="alert text_size18">An error has occurred: ' . mysqli_error($connect) . '</h3>';
                }
            }
            ?>


            <table class="admin_table" cellSpacing="0">
                <tbody>
                    <tr>
                        <td class="text_size25">Image</td>
                        <td class="text_size25">Name</td>
                        <td class="text_size25">Price</td>
                        <td class="text_size25">Food Category</td>
                        <td class="text_size25">Category</td>
                        <td class="text_size25">Remove</td>
                        <td class="text_size25">Editing</td>
                    </tr>

                    <?php

                    $sql = mysqli_query($connect, 'SELECT * FROM `products`');
                    while ($result = mysqli_fetch_array($sql)) {
                        $show_img = base64_encode($result['image']);
                        echo "<tr>
                    <td><img width=\"180px\" height=\"200px\" src=\"data:image/jpeg;base64,$show_img\"></td>
                    <td class=\"text_size18\">{$result['title']}</td>
                    <td class=\"text_size18\">{$result['price']} $</td>
                    <td class=\"text_size18\">{$result['category']}</td>
                    <td class=\"text_size18\">{$result['alt']}</td>
                    <td><a class=\"button_go_pro\" href='?del_id={$result['id']}'>Delete</a></td>
                    <td><a class=\"button_go_pro\" href='?red_id={$result['id']}'>Change</a></td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="admin_block margin_top" id="restaurant">
                <form action="#restaurant" method="post" enctype="multipart/form-data" class="admin_panel">

                    <h1 class="text_size35 black_color">Add a restaurant</h1>
                    <?php
                    if (isset($_POST['upload_restaurant'])) {
                        if (!empty($_FILES['file']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                        $about = $_POST['about'];
                        $category = $_POST['category'];
                        if ($about == '' || $category == '') {
                            echo '<h3 style="color:red;" class="text_size18">You have not selected a value</h3>';
                        } else {
                            $add_product = mysqli_query($connect, "INSERT INTO `restaurants`(`image`,`title`,`category`)VALUES('$img','$about','$category')");
                            if (!$add_product) {
                                echo '<h3 style="color:red;" class="text_size18">Data entered incorrectly</h3>';
                            } else {
                                echo '<h3 style="color:green;" class="text_size18">Product added successfully</h3>';
                            }
                        }
                    }
                    ?>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Choose File</h1>
                        <input name="file" type="file">
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Restaurant name</h1>
                        <input class="" autocomplete="off" name="about" type="text">
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Restaurant category</h1>
                        <select name="category" id="">
                            <option value="">Сhoose</option>
                            <option value="healthy">healthy</option>
                            <option value="supreme">supreme</option>
                            <option value="trending">trending</option>
                        </select>
                    </div>
                    <button class="button_add text_size18" name="upload_restaurant" type="submit">Add</button>
                </form>

                <form action="#restaurant" enctype="multipart/form-data" method="post" class="admin_panel">

                    <h1 class="text_size35 black_color">Editing</h1>
                    <?php
                    if (isset($_POST['restaurant_edit'])) {
                        $image = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
                        $imgData = file_get_contents($image);
                        $imgData = mysqli_real_escape_string($connect, $imgData);

                        if ($_POST['Title'] === '' || $_POST['EditCategory'] === '') {
                            echo '<h3 style="color:red;" class="text_size18">You have not selected a value</h3>';
                        } else {

                            //Если это запрос на обновление, то обновляем
                            if (isset($_GET['rest_red_id'])) {
                                if (!empty($imgData)) {
                                    $sql = mysqli_query($connect, "UPDATE restaurants SET  image='$imgData', title = '{$_POST['Title']}',category='{$_POST['EditCategory']}' WHERE id={$_GET['rest_red_id']}");
                                } else {
                                    $sql = mysqli_query($connect, "UPDATE restaurants SET  title = '{$_POST['Title']}',category='{$_POST['EditCategory']}' WHERE id={$_GET['rest_red_id']}");
                                }
                            } else {
                                //Иначе вставляем данные, подставляя их в запрос
                                $sql = mysqli_query($connect, "INSERT INTO restaurants (image,title,category) VALUES ('$imgData','{$_POST['Title']}','{$_POST['EditCategory']}')");
                            }

                            //Если вставка прошла успешно
                            if ($sql) {
                                echo '<h3 style="color:green;" class="text_size18">Successfully changed!</h3>';
                            } else {
                                echo '<h3  class="text_size18">An error has occurred: ' . mysqli_error($connect) . '</h3>';
                            }
                        }
                    }

                    if (isset($_GET['rest_red_id'])) {
                        $sql = mysqli_query($connect, "SELECT * FROM `restaurants` WHERE `id`={$_GET['rest_red_id']}");
                        $product = mysqli_fetch_array($sql);
                        $show_img = base64_encode($product['image']);
                    }
                    ?>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Image</h1>
                        <input name="image" type="file" value="">
                    </div>

                    <div class="margin_bottom">
                        <h1 class="text_size25">Name</h1>
                        <input class="input" type="text" name="Title" value="<?= isset($_GET['rest_red_id']) ? $product['title'] : ''; ?>">
                    </div>
                    <div class="margin_bottom">
                        <h1 class="text_size25">Restaurant category</h1>
                        <select name="EditCategory" id="">
                            <option value="<?= isset($_GET['rest_red_id']) ? $product['category'] : ''; ?>">Сhoose</option>
                            <option value="<?= isset($_GET['rest_red_id']) ? $product['EditCategory'] = 'healthy' : ''; ?>">healthy</option>
                            <option value="<?= isset($_GET['rest_red_id']) ? $product['EditCategory'] = 'supreme' : ''; ?>">supreme</option>
                            <option value="<?= isset($_GET['rest_red_id']) ? $product['EditCategory'] = 'trending' : ''; ?>">trending</option>
                        </select>
                    </div>

                    <button type="restaurant_edit" name="restaurant_edit" value="Подтвердить" class="button_add text_size18">Confirm</button>

                </form>
            </div>

            <?php
            if (isset($_GET['rest_del_id'])) { //проверяем, есть ли переменная
                //удаляем строку из таблицы
                $sql = mysqli_query($connect, "DELETE FROM `restaurants` WHERE `id` = {$_GET['rest_del_id']}");
                if ($sql) {
                    echo '<h3  class="alert text_size18">Product removed</h3>';
                } else {
                    echo '<h3  class="alert text_size18">An error has occurred: ' . mysqli_error($connect) . '</h3>';
                }
            }
            ?>
            <table class="admin_table" cellSpacing="0">
                <tbody>
                    <tr class="restaurant_table">
                        <td class="text_size25">Image</td>
                        <td class="text_size25">Name</td>
                        <td class="text_size25">Restaurant Category</td>
                        <td class="text_size25">Remove</td>
                        <td class="text_size25">Editing</td>
                    </tr>

                    <?php

                    $sql = mysqli_query($connect, 'SELECT * FROM `restaurants`');
                    while ($result = mysqli_fetch_array($sql)) {
                        $show_img = base64_encode($result['image']);
                        echo "<tr class=\"restaurant_table\">
                    <td><img width=\"280px\" height=\"160px\" src=\"data:image/jpeg;base64,$show_img\"></td>
                    <td class=\"text_size18\">{$result['title']}</td>
                    <td class=\"text_size18\">{$result['category']}</td>
                    <td><a class=\"button_go_pro\" href='?rest_del_id={$result['id']}#restaurant'>Delete</a></td>
                    <td><a class=\"button_go_pro\" href='?rest_red_id={$result['id']}#restaurant'>Change</a></td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="exit">
                <button class="text_size18 button_add" onclick="document.location='../'">Logout</button>
            </div>
    </div>
<?php } else {
            echo "You came here by accident";
        }
        include('../elements/footer.php');
?>
<script src="js/header.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>

</html>