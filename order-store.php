<?php
    session_start();
    include("online-admin/config.php");

    if(isset($_POST['order_submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $amount = $_POST['amount'];
        $township_id = $_POST['township_id'];
        $address = $_POST['address'];

        mysqli_query($conn, "INSERT INTO orders (name, email, phone, amount, township_id, address, status, created_at, updated_at) 
                                VALUES ('$name', '$email', '$phone', '$amount', '$township_id', '$address', 0, now(), now())");

        $order_id = mysqli_insert_id($conn);
        foreach($_SESSION['cart'] as $id => $qty){
            mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, qty) VALUES ('$order_id', '$id', '$qty')");
        }

        unset($_SESSION['cart']);
        header("location: order-success.php");
    }