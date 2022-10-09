<?php
    $page = 'Orders';
    include("layouts/navbar.php");
?>
    <div class="content-wrapper">
        <h3 class="mb-3"><strong>Order List</strong></h3>
        <?php if(!empty($_SESSION['success'])) : ?>      
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> <?php echo $_SESSION['success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
        <div class="row mt-3">
            <div class="col-sm-8">
                <?php 
                    $res = mysqli_query($conn, "SELECT SUM(amount) FROM orders");
                    while($row = mysqli_fetch_assoc($res)):
                ?>  
                    <strong>Grand Total Amount = $ <span class="text-danger"> <?php echo $row['SUM(amount)']; ?>  </span></strong>
                <?php endwhile; ?>
            </div>
            <div class="col-sm-4">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control col-sm-9" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0 col-sm-3" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="row mb-3 mt-3">
            <div class="col-sm-12">
                <div class="scroll">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th><strong>Product Information</strong></th>
                                <th><strong>Amount</strong></th>
                                <th><strong>Order Information</strong></th>
                                <th><strong> Delivery Status </strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <body>
                            <?php
                                $total = 0;
                                $result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");

                                $row_count = mysqli_num_rows($result);

                                if($result) :
                            ?>
                                <?php if($row_count == 0) : ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="3"><i class="fa fa-search mr-2"></i> Order Not Found.</td>
                                    </tr>
                                    <?php else : ?>
                                        <?php while($order = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td style="border-bottom: 2px solid black"><?php echo $order['id']; ?></td>
                                                <td style="border-bottom: 2px solid black">
                                                    <?php 
                                                        $order_id = $order['id'];
                                                        $products = mysqli_query($conn, "SELECT order_items.*, products.* FROM order_items LEFT JOIN products ON
                                                                                        order_items.product_id = products.id WHERE order_items.order_id = $order_id");
                                                        while($product = mysqli_fetch_assoc($products)) :
                                                        $total = $product['price'] * $product['qty'];
                                                    ?>  
                                                        <div class="row mb-3">
                                                            <div class="col-sm-2">
                                                                <img src="public/images/product/<?php echo $product['image_1']; ?>" width="150" alt="">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <h6> <a href="../product-detail.php?product=<?php echo $product['name']; ?>" target="_blank"> <?php echo $product['name'] ?> </a> </h6>
                                                                <p>$ <?php echo $product['price']; ?> - <strong class="text-danger">( <?php echo $product['qty']; ?> )</strong> Qty  =  <span class="text-danger"><?php echo $total; ?></span></p>
                                                            </div>
                                                        </div>                                                        
                                                    <?php endwhile; ?>
                                                </td>
                                                <td style="border-bottom: 2px solid black; text-align:right;">
                                                    <?php if($order['status'] == 0) : ?>
                                                        <strong class="text-danger">$ <?php echo $order['amount'] ?></strong>
                                                    <?php else : ?>
                                                        <strong class="text-danger text-muted">$ <?php echo $order['amount'] ?></strong>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="border-bottom: 2px solid black">
                                                    <?php if($order['status'] == 0) : ?>
                                                        <h6><i class="fa fa-user"></i> <?php echo $order['name']; ?></h6>
                                                        <h6><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $order['email']; ?></h6>
                                                        <h6><i class="fa fa-mobile" style="font-size: 20px;" aria-hidden="true"></i> <?php echo $order['phone']; ?></h6>
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $order['address']; ?></p>
                                                        <p><i class="fa fa-calendar"></i>
                                                            <strong class="text-danger">
                                                                <?php 
                                                                    $date = date_create($order['created_at']); 
                                                                    echo date_format($date, "d - m - Y ( h : i A ) ");                                                           
                                                                ?>
                                                            </strong>
                                                        </p>
                                                    <?php else : ?>
                                                        <h6 class="text-muted"><i class="fa fa-user"></i> <?php echo $order['name']; ?></h6>
                                                        <h6 class="text-muted"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $order['email']; ?></h6>
                                                        <h6 class="text-muted"><i class="fa fa-mobile" style="font-size: 20px;" aria-hidden="true"></i> <?php echo $order['phone']; ?></h6>
                                                        <p class="text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $order['address']; ?></p>
                                                        <p class="text-muted text-danger"><i class="fa fa-calendar"></i>
                                                            <?php 
                                                                $date = date_create($order['created_at']); 
                                                                echo date_format($date, "d - m - Y ( h : i A ) ");                                                             
                                                            ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="border-bottom: 2px solid black">
                                                    <?php if($order['status']) : ?>
                                                        * <a href="order-status.php?id=<?php echo $order['id'] ?>&status=0">Undo</a>
                                                    <?php else : ?>
                                                        * <a href="order-status.php?id=<?php echo $order['id'] ?>&status=1">Mark as delivered</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="border-bottom: 2px solid black">
                                                    <!-- Delete Model Start -->
                                                    <button type="button" class="btn btn-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#delOrder<?php echo $order['id']; ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delOrder<?php echo $order['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Order</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="text-white">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="order-delete.php" method="post">
                                                                    <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                                                    <div class="modal-body">
                                                                        <h5><strong>Are you sure this order deleted?</strong></h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger" name="product_delete"><i class="fa fa-trash"></i> Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Model End -->
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php endif; ?>                                    
                            <?php endif; ?>
                        </body>
                    </table> 
                </div>
            </div>
        </div>

    </div>
<?php include("layouts/footer.php");
            