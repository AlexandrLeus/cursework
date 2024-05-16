<?php
session_start();
if ( isset($_GET['del_id']) && isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($v) {
       return $v['id'] != $_GET['del_id'];
    });
  }
  header('Location:../pages/Basket');
  ?>