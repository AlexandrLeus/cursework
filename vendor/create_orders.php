<?php
    session_start();
    require_once 'connect.php';
    // $finalPrice = $_POST['finalPrice'];
    // $name = $_POST['name'];
    // $phone = $_POST['phone'];
    // $address = $_POST['address'];
    // $title = $_POST['title'];
    
    $data = json_decode(file_get_contents('php://input'),true);
    $finalPrice = $data['finalPrice'];
    $name = $data['name'];
    $phone = $data['phone'];
    $address = $data['address'];
    $title = $data['title'];
    $quantity = $data['quantity'];
    $id_user = $_SESSION['user']['id'];
    $date_now = date("Y-m-d H:i:s");
    $status = "Ожидает подтверждения";
    mysqli_query($connect, "INSERT INTO `orders` (`id`, `id_user`, `name`, `phone`, `date`, `status`, `product_info`, `product_name`,`final_price`,`address`)
    VALUES (NULL, '$id_user', '$name', '$phone', '$date_now', '$status', '$quantity','$title','$finalPrice','$address')");

    unset($_SESSION['cart']);
?>