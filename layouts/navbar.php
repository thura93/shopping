<?php 
    session_start();
    include("online-admin/config.php");
    $prod_list = mysqli_query($conn, "SELECT * FROM products ORDER BY id LIMIT 6");

    $cart = 0;

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $qty){
            $cart += $qty;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | <?php echo $page; ?></title>
    <link rel="shortcut icon" href="public/images/501-5010612_logo-online-shop-png.png" type="image/x-icon">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mt-1" href="index.php" title="Online Shopping"><img src="public/images/501-5010612_logo-online-shop-png.png" width="50" alt=""><span class="text-info">ONLINE</span> SHOPPING</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'Home') { echo "active"; } ?>" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'About') { echo "active"; } ?>" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Porduct
                    </a>
                    <ul class="dropdown-menu product-menu">
                        <li><a class="dropdown-item bg-secondary" href="products.php">All Product</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <?php while($products = mysqli_fetch_object($prod_list)) : ?>
                            <li><a class="dropdown-item" href="product-detail.php?product=<?php echo $products->name; ?>"><?php echo $products->name; ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'Contact') { echo "active"; } ?>" href="contact.php">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav mt-1">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-cart-arrow-down"></i> 
                        <span class="badge bg-info">  
                            <?php echo $cart; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu" style="width: 350px;">
                        <li>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><small>Item Name</small></th>
                                        <th><small>Qty</small></th>
                                        <th><small>Price</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($_SESSION['cart'])) : ?>
                                        <tr>
                                            <td colspan="3">No Cart Empty</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php
                                            $total = 0;
                                            foreach($_SESSION['cart'] as $id => $qty) :
                                                $result_cart = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
                                                $cart_product = mysqli_fetch_assoc($result_cart);
                                                $total += $cart_product['price'] * $qty;
                                        ?>
                                            <tr>
                                                <td><small><?php echo $cart_product['name'] ?></small></td>
                                                <td><small><?php echo $qty; ?></small></td>
                                                <td class="text-end"><small> $ <?php echo $cart_product['price'] * $qty; ?></small></td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <tr>
                                            <td></td>
                                            <td><strong>Total</strong></td>
                                            <td class="text-end">$ <?php echo $total; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <?php if(isset($_SESSION['cart'])) : ?>
                            <li>
                                <a class="btn btn-primary btn-sm ms-2 text-white" href="view-cart.php"> <i class="fa fa-eye"></i> <small>View Cart</small></a>
                            </li>
                        <?php endif; ?>                  
                    </ul>
                </li>
                <li class="nav-item mt-1">
                    <form method="GET" action="search.php" class="d-flex" role="search">
                        <?php if(!empty($_GET['search'])) : ?>
                            <input class="form-control me-1" name="search" value="<?php echo $_GET['search']; ?>" type="search" placeholder="Search" aria-label="Search">
                        <?php else : ?>
                            <input class="form-control me-1" name="search" value="" type="search" placeholder="Search" aria-label="Search">
                        <?php endif; ?>
                        <button name="search_btn" class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="public/images/150-1503945_transparent-user-png-default-user-image-png-png.png" width="30" alt="" style="border-radius: 50%;"> Thura
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fa fa-address-card-o"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-first-order"></i> My Order</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<!-- Navbar End -->