<?php

    session_start();
    include("config.php");

    if(isset($_POST['category_update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];

        $sql = "UPDATE categories SET name = '$name', updated_at = now() WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = $name ." Updated Successfully";
            header("location: category-index.php");
        }else{
            $_SESSION['fail'] = $name ." Cann't be updated Successfully";
            header("location: category-index.php");
        }
    }
