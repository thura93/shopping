<?php

    if(!isset($_SESSION['auth'])){
        header("location: login.php");
        exit();
    }