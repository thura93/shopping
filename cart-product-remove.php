<?php

    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['cart'][$id]--;
        if($_SESSION['cart'][$id] == false){
            unset($_SESSION['cart'][$id]);
            $_SESSION['success'] = "Remove Product Cart Successfully.";
            header("location: view-cart.php");
            exit();
        }else{
            $_SESSION['success'] = "Remove Product Cart Successfully.";
            header("location: view-cart.php");
            exit();
        }
    }