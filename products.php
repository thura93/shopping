<?php 
    $page = "All Products";
    include("layouts/navbar.php");
?>
<div class="container">

    <div class="row mb-5 mt-5">
        <!-- Product List Start -->
        <div class="col-sm-8 col-md-8 mb-5">
            <h3 class="mb-3"><strong>All Product</strong></h3>
            <?php if(!empty($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS!</strong> <?php echo $_SESSION['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['success']);
                endif;
            ?>
            
            <?php if(!empty($_SESSION['fail'])) : ?>      
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fail!</strong> <?php echo $_SESSION['fail']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['fail']);
                endif;
            ?>
            <div class="row">
                <?php if(isset($_GET['category'])) : ?>
                    <?php 
                        $name = mysqli_real_escape_string($conn, $_GET['category']);
                        $categories = "SELECT id, name FROM categories WHERE name = '$name' LIMIT 1";
                        $categories_run = mysqli_query($conn, $categories);

                        if(mysqli_num_rows($categories_run) > 0) : 
                    ?>
                        
                        <?php
                            $categoryItem = mysqli_fetch_array($categories_run);
                            $category_id = $categoryItem['id'];
                            $products = mysqli_query($conn, "SELECT * FROM products WHERE category_id = $category_id ORDER BY id DESC");
                            if(mysqli_num_rows($products)) : 
                        ?>
                            <?php
                                foreach($products as $product) :
                            ?>
                                <div class="col-sm-4 mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <a href="product-detail.php?product=<?= $product['name']; ?>" title="View Detail"><img src="online-admin/public/images/product/<?= $product['image_1']; ?>" class="rounded" width="100%" alt=""></a>
                                            <h6 class="text-info mt-2"><a href="product-detail.php?detailproduct=<?= $product['name']; ?>" title="View Detail" class="product-header"><?= $product['name']; ?></a></h6>
                                            <strong>$</strong><span class="text-light"> <?= $product['price']; ?></span>
                                            <a href="add-to-cart.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-info float-end"><i class="fa fa-cart-plus"></i> <strong>Add Cart</strong></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h3 class="text-danger mt-4"><strong>No Product Available.</strong></h3>
                        <?php endif; ?>
                    <?php else : ?>
                        <h3 class="text-danger mt-4"><strong>No such Category Not Found.</strong></h3>                    
                    <?php endif; ?>
                <?php elseif(isset($_GET['brand'])) : ?>
                    <?php 
                        $name = mysqli_real_escape_string($conn, $_GET['brand']);
                        $brandes = "SELECT id, name FROM brands WHERE name = '$name' LIMIT 1";
                        $brandes_run = mysqli_query($conn, $brandes);

                        if(mysqli_num_rows($brandes_run) > 0) : 
                    ?>
                        
                        <?php
                            $brandItem = mysqli_fetch_array($brandes_run);
                            $brand_id = $brandItem['id'];
                            $products = mysqli_query($conn, "SELECT * FROM products WHERE brand_id = $brand_id ORDER BY id DESC");
                            if(mysqli_num_rows($products)) : 
                        ?>
                            <?php
                                foreach($products as $product) :
                            ?>
                                <div class="col-sm-4 mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <a href="product-detail.php?product=<?= $product['name']; ?>" title="View Detail"><img src="online-admin/public/images/product/<?= $product['image_1']; ?>" class="rounded" width="100%" alt=""></a>
                                            <h6 class="text-info mt-2"><a href="product-detail.php?detailproduct=<?= $product['name']; ?>" title="View Detail" class="product-header"><?= $product['name']; ?></a></h6>
                                            <strong>$</strong><span class="text-light"> <?= $product['price']; ?></span>
                                            <a href="products.php?add_to_cart=<?= $product['id'] ?>" class="btn btn-sm btn-info float-end"><i class="fa fa-cart-plus"></i> <strong>Add Cart</strong></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h3 class="text-danger mt-4"><strong>No Product Available.</strong></h3>
                        <?php endif; ?>
                    <?php else : ?>
                        <h3 class="text-danger mt-4"><strong>No such Brand Not Found.</strong></h3>                    
                    <?php endif; ?>    

                    
                <?php else : ?>
                    <?php
                        $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 27");
                        foreach($products as $product) :
                    ?>
                        <div class="col-sm-4 mb-3">
                            <div class="card bg-dark">
                                <div class="card-body">
                                    <a href="product-detail.php?product=<?= $product['name']; ?>" title="View Detail"><img src="online-admin/public/images/product/<?= $product['image_1']; ?>" class="rounded" width="100%" alt=""></a>
                                    <h6 class="text-info mt-2"><a href="product-detail.php?detailproduct=<?= $product['name']; ?>" title="View Detail" class="product-header"><?= $product['name']; ?></a></h6>
                                    <strong>$</strong><span class="text-light"> <?= $product['price']; ?></span>
                                    <a href="add-to-cart.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-info float-end"><i class="fa fa-cart-plus"></i> <strong>Add Cart</strong></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>        
                <?php endif; ?>
            </div>
            
        </div>
        <!-- Product List End -->

        <!-- Category Menu List Start -->
        <div class="col-sm-4 col-md-4">
            <h3><strong>Categories </strong></h3>
            <div class="categories-scroll mb-3">
                <ul class="list-group p-2">
                    <?php
                        $cats = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");  
                        while($category = mysqli_fetch_object($cats)) :
                    ?>
                    <li class="list-group-item d-flex  bg-dark  justify-content-between align-items-center">
                        <a href="index.php?category=<?php echo $category->id; ?>" class="categories active"><small><?php echo $category->name; ?></a></small>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <h3><strong>Brands </strong></h3>
            <div class="mb-3 brands-scroll">
                <ul class="list-group p-2">
                    <?php
                        $brands = mysqli_query($conn, "SELECT * FROM brands ORDER BY id DESC"); 
                        while($brand = mysqli_fetch_object($brands)) :
                    ?>
                    <li class="list-group-item d-flex  bg-dark  justify-content-between align-items-center">
                        <a href="index.php?brand=<?php echo $brand->id; ?>" class="categories active"><small><?php echo $brand->name; ?></a></small></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <!-- Category Menu List End -->
    </div>

    <div class="row mb-3 mt-3">
        <div class="col-sm-12 col-md-12">
            <h3 class="text-center"><strong>Popular Product</strong></h3>
            
            <div class="row mt-3 mb-3">
                <?php
                    $sql_product = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
                    $product_result = mysqli_query($conn, $sql_product);
                    while($products = mysqli_fetch_object($product_result)) : 
                ?>
                <div class="col-sm-3 col-md-3 mb-3">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <a href="product-detail.php?product=<?php echo $products->id; ?>" title="View Detail"><img src="online-admin/public/images/product/<?php echo $products->image_1; ?>" class="rounded" width="100%" alt=""></a>
                            <h6 class="text-info mt-2"><a href="#" title="View Detail" class="product-header"><small><?php echo $products->name; ?></small></a></h6>
                            <strong>$</strong><small class="text-light"> <?php echo $products->price; ?></small>
                            <a href="add-to-cart.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-info float-end"><i class="fa fa-cart-plus"></i> <strong>Add Cart</strong></a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</div>

<?php include("layouts/footer.php"); ?>

