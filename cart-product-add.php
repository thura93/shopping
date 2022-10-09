<?php

    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['cart'][$id]++;

        $_SESSION['success'] = "Add Product Cart Successfully.";

        header("location: view-cart.php");
    }