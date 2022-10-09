<?php

    session_start();
    include("config.php");

    if(isset($_POST['township_delete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM townships WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = " Township Deleted Successfully";
            header("location: township-index.php");
        }else{
            $_SESSION['fail'] = "Township Cann't be deleted Successfully";
            header("location: township-index.php");
        }
    }
