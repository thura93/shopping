<?php

    session_start();
    include("config.php");

    if(isset($_POST['role_delete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM roles WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $_SESSION['success'] = " Role Deleted Successfully";
            header("location: role-index.php");
        }else{
            $_SESSION['fail'] = "Role Cann't be deleted Successfully";
            header("location: role-index.php");
        }
    }
