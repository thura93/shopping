<?php

    session_start();
    include("config.php");

    if(isset($_POST['category_delete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM categories WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = " Category Deleted Successfully";
            header("location: category-index.php");
        }else{
            $_SESSION['fail'] = "Category Cann't be deleted Successfully";
            header("location: category-index.php");
        }
    }
