<?php

    $conn = mysqli_connect('localhost', 'root' , '', 'shopping');

    if(!$conn){
        die(mysqli_error($conn));
    }