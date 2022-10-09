<?php

    session_start();
    include("config.php");

    if(isset($_POST['product_create'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $keywords = $_POST['keywords'];
        $status = "true";
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];

        $image_1 = $_FILES['image_1']['name'];
        $image_2 = $_FILES['image_2']['name'];
        $image_3 = $_FILES['image_3']['name'];

        $tmp_image_1 = $_FILES['image_1']['tmp_name'];
        $tmp_image_2 = $_FILES['image_2']['tmp_name'];
        $tmp_image_3 = $_FILES['image_3']['tmp_name'];

        if($name == '' or $description == '' or $price == '' or $keywords == '' or $status == '' or $category_id == '' or $brand_id == '' or $image_1 == '' or $image_2 == '' or $image_3 == ''){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($tmp_image_1, "public/images/product/$image_1");
            move_uploaded_file($tmp_image_2, "public/images/product/$image_2");
            move_uploaded_file($tmp_image_3, "public/images/product/$image_3");

            // Insert query
            $product_sql = "INSERT INTO products (name, description, price, keywords, status, category_id, brand_id, image_1, image_2, image_3, created_at, updated_at) 
                    VALUES ('$name', '$description', '$price', '$keywords', '$status', '$category_id', '$brand_id', '$image_1', '$image_2', '$image_3', now(), now()) ";
            $result_product = mysqli_query($conn, $product_sql);

            if($result_product == true){
                $_SESSION['success'] = $name ." Created Successfully";
                header("location: product-index.php");
            }else{
                $_SESSION['fail'] = $name ." Cann't be Created Successfully";
                header("location: product-index.php");
            }
        }

        // $sql = "INSERT INTO brands (name, created_at, updated_at) VALUES ('$name', now(), now() )";
        // $result = mysqli_query($conn, $sql);

        
    }
