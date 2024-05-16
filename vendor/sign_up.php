<?php
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

if ($password < 6) {
    $_SESSION['message'] = '<p class="purple_color warning">Минимальная длина пароля — 6 символов</p>';
    header('Location: ../pages/SignUp');
} else {
    $hash = md5($password);
    mysqli_query($connect, "INSERT INTO `users` ( `email`, `password`, `name`) 
       VALUES ( '$email', '$hash', '$name')");
    $_SESSION['message'] = '<p class="purple_color warning">Регистрация прошла успешно</p>';
    header('Location: ../pages/SignUp');
}
