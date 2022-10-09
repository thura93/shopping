<?php
    $page = 'Products';
    include("layouts/navbar.php");
?>
    <div class="content-wrapper">
        <h3 class="mb-3"><strong>Products</strong></h3>
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
                <!-- Create Category modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProduct">
                   <i class="fa fa-plus-circle" aria-hidden="true"></i> Create Product
                </button>

                <!-- Create Modal -->
                <div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="product-store.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="editor" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">Keywords</label>
                                        <input type="text" name="keywords" class="form-control" placeholder="Enter Product keywords..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="0">Select a Category</option>
                                            <?php
                                                $cat_sql = "SELECT * FROM categories ORDER BY id DESC";
                                                $cat_result = mysqli_query($conn, $cat_sql);

                                                while($category = mysqli_fetch_assoc($cat_result)) :
                                            ?>
                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="brands">Brand</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="0">Select a Brand</option>
                                            <?php
                                                $brand_sql = "SELECT * FROM brands ORDER BY id DESC";
                                                $brand_result = mysqli_query($conn, $brand_sql);

                                                while($brand = mysqli_fetch_assoc($brand_result)) :
                                            ?>
                                                <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="custom-file">
                                            <label for="image_1">Choose Product Image 1</label>
                                            <input type="file" name="image_1" class="form-control" onchange="img_1(event)" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <br>
                                            <img id="img1" width="100" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="custom-file">
                                            <label for="image_2">Choose Product Image 2</label>
                                            <input type="file" name="image_2" class="form-control" onchange="img_2(event)" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <br>
                                            <img id="img2" width="100" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="custom-file">
                                            <label for="image_3">Choose Product Image 3</label>
                                            <input type="file" name="image_3" class="form-control" onchange="img_3(event)" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <br>
                                            <img id="img3" width="100" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="product_create"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                <div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px; text-align:center;"><strong>#</strong></th>
                                <th style="width: 150px; text-align:left;"><strong>Product Name</strong></th>
                                <th  style="width: 300px; text-align:center;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="scroll">
                    <table class="table table-hover">
                        <body>
                            <?php
                                include("config.php");
                                $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

                                $row_count = mysqli_num_rows($result);

                                if($result) :
                            ?>
                                <?php if($row_count == 0) : ?>
                                    <tr>
                                        <td style="width: 56px; text-align:center;"></td>
                                        <td colspan="3"><i class="fa fa-search mr-2"></i> Product Not Found.</td>
                                    </tr>
                                    <?php else : ?>
                                        <?php while($product = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td style="width: 56px; text-align:center;"><?php echo $product['id']; ?></td>
                                                <td style="width: 200px; text-align:left;"><?php echo $product['name']; ?></td>
                                                <td  style="width: 300px; text-align:center;">

                                                    <!-- Show Model Start -->
                                                    <button type="button" class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#showProduct<?php echo $product['id']; ?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                    <!-- Show Modal -->
                                                    <div class="modal fade" id="showProduct<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $product['name']; ?> View Detail</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-5">
                                                                            <img src="public/images/product/<?php echo $product['image_1']; ?>" style="border-radius: 2px; width: 250px; height: 200px;" alt="<?php echo $product['name']; ?>">
                                                                        </div>
                                                                        <div class="col-sm-7 text-left">
                                                                            <h6><?php echo $product['name']; ?></h6>
                                                                            <p><?php echo $product['description']; ?></p>
                                                                            $ <span class="text-danger"><?php echo $product['price']; ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-5">
                                                                            <strong>Created Date</strong>
                                                                        </div>
                                                                        <div class="col-sm-7 text-left">
                                                                            <?php echo $product['created_at']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-5">
                                                                            <strong>Updated Date</strong>
                                                                        </div>
                                                                        <div class="col-sm-7 text-left">
                                                                            <?php echo $product['updated_at']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Show Model End -->

                                                    <!-- Edit Model Start -->
                                                    <button type="button" class="btn btn-info btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#editProduct<?php echo $product['id'] ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                                    </button>
                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editProduct<?php echo $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $product['name'] ?> Edit</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="product-update.php" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="name">Product Name</label>
                                                                            <input type="text" name="name" value="<?php echo $product['name'] ?>" class="form-control" placeholder="Enter Product Name..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success" name="product_update"><i class="fa fa-save"></i> Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Edit Model End -->

                                                    <!-- Delete Model Start -->
                                                    <button type="button" class="btn btn-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#delProduct<?php echo $product['id']; ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delProduct<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="text-white">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="product-delete.php" method="post">
                                                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                                                    <div class="modal-body">
                                                                        <h5><strong>Are you sure this product deleted?</strong></h5>
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
            