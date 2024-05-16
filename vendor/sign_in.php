<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = md5($password);
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$hash'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = $user;
        $_SESSION['message'] = '<p class="purple_color warning">Добро пожаловать '.$_SESSION['user']['name']. '</p>' ;
        if ($_SESSION['user']['password']=="4297f44b13955235245b2497399d7a93" && $_SESSION['user']['email']=="admin@admin") {
            header('Location: ../pages/admin_panel');
    }else {
        header('Location: ../pages/Login');
    }
    }else{
    $_SESSION['message'] = '<p class="purple_color warning">не верный логин или пароль</p>' ;
    header('Location: ../pages/Login');
  }
  ?>