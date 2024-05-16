<?php
    session_start();
    if(isset($_SESSION['user'])){
       
        if(isset($_SESSION['cart'])){
            $fail = true;
            foreach($_SESSION['cart'] as $product){
                if($product['id'] == $_GET['id']){
                    $fail = false;
                }
            }
            if($fail){
                $oldArray = $_SESSION['cart'];
                $newArray = array(
                    "id" => $_GET['id'],
                );
                array_push($oldArray, $newArray);
                $_SESSION['cart'] = $oldArray;
            }
        }
        else {
            $array = array(
                0 => array(
                    "id" => $_GET['id'],
            ));
            $_SESSION['cart'] = $array;
        }

        header('Location: ../pages/basket'); 
    }else{
        header('Location: ../pages/login');
    }
?>