<?php

    session_start();
    include("config.php");

    if(isset($_POST['brand_create'])){
        $name = $_POST['name'];

        $sql = "INSERT INTO brands (name, created_at, updated_at) VALUES ('$name', now(), now() )";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = $name ." Created Successfully";
            header("location: brand-index.php");
        }else{
            $_SESSION['fail'] = $name ." Cann't be Created Successfully";
            header("location: brand-index.php");
        }
    }
