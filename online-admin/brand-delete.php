<?php

    session_start();
    include("config.php");

    if(isset($_POST['brand_delete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM brands WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = " Brand Deleted Successfully";
            header("location: brand-index.php");
        }else{
            $_SESSION['fail'] = "Brand Cann't be deleted Successfully";
            header("location: brand-index.php");
        }
    }
