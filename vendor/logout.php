<?php 
session_start();
unset($_SESSION['login']);
unset($_SESSION['message']);
unset($_SESSION['user']);
unset($_SESSION['cart']);
header("Location: ../");
?>