<?php
    
    $page = "View Cart";
    
    include("layouts/navbar.php");
    
    if(!isset($_SESSION['cart'][$id])){
        unset($_SESSION['cart'][$id]);
        echo"<script type='text/javascript'>location.href='index.php';</script>";
    }
?>

<!-- About Start -->
<div class="container mt-3 text-white">
    <div class="row mt-3 mb-5">
        <div class="col-sm-7">
            <h3 class="text-info mt-5"><strong>View Cart</strong></h3>
            <?php if(!empty($_SESSION['success'])) : ?>      
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS!</strong> <?php echo $_SESSION['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['success']);
                endif;
            ?>

            <?php if(!empty($_SESSION['fail'])) : ?>      
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> <?php echo $_SESSION['fail']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php 
                unset($_SESSION['fail']);
                endif;
            ?>
            <div class="table-responsive">
                <table class="table table-hover text-white">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th class="text-end">Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($_SESSION['cart'])) : ?>
                            <tr>
                                <td colspan="6">Empty Product</td>
                            </tr>
                        <?php else : ?>
                            <?php 
                                $total = 0;
                                foreach($_SESSION['cart'] as $id => $qty):
                                    $view_cart_result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id ORDER BY id DESC");
                                    $row = mysqli_fetch_assoc($view_cart_result);
                                    $total += $row['price'] * $qty;
                            ?>
                            <tr>
                                <td><img src="online-admin/public/images/product/<?php echo $row['image_1']; ?>" width="80" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td class="text-end"><?php echo $row['price'] * $qty; ?></td>
                                <td>
                                    <a href="cart-product-add.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm mb-1 me-1 float-start "><i class="fa fa-plus-circle"></i></a>
                                    <a href="cart-product-remove.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm mb-1 float-start btn-sm"><i class="fa fa-minus-circle"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td></td>
                                <td></td>
                                <td class="text-end">$ <?php echo $total; ?></td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="clear-all-cart.php" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Clear Cart</a>
            </div>
        </div>
        <div class="col-sm-5 ">
            <h3 class="text-info mt-5"><strong>Order Now</strong></h3>
            <form action="order-store.php" method="POST" class="mt-3 p-3 pb-5  bg-dark rounded">
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name..." required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email..." required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square"></i></span>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number..." required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                    <select name="township_id" class="form-select" aria-label="Default select example">
                        <option selected>Select you live in township?</option>
                        <?php 
                            $township_result = mysqli_query($conn, "SELECT * FROM townships ORDER BY id DESC");
                            while($township = mysqli_fetch_object($township_result)):
                        ?>
                            <option value="<?php echo $township->id ?>"><?php echo $township->name ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" style="margin-top: -50px;"></i></span>
                    <textarea name="address" cols="30" rows="3" class="form-control" placeholder="Your contact address ..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-outline-info float-end w-100" name="order_submit"><i class="fa fa-paper-plane me-1"></i> <strong>Order</strong> </button>
            </form>
        </div>
    </div>
    
</div>
<!-- About End -->

<?php include("layouts/footer.php"); ?>