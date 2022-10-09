<?php
    $page = 'Categories';
    include("layouts/navbar.php");
?>
    <div class="content-wrapper">
        <h3 class="mb-3"><strong>Categories</strong></h3>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategory">
                   <i class="fa fa-plus-circle" aria-hidden="true"></i> Create Category
                </button>

                <!-- Create Modal -->
                <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="category-store.php" method="post">
                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name..." required>
                                </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="category_create"><i class="fa fa-save"></i> Save</button>
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
                                <th style="width: 150px; text-align:left;"><strong>Category Name</strong></th>
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
                                $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");

                                $row_count = mysqli_num_rows($result);

                                if($result) :
                            ?>
                                <?php if($row_count == 0) : ?>
                                    <tr>
                                        <td style="width: 56px; text-align:center;"></td>
                                        <td colspan="3"><i class="fa fa-search mr-2"></i> Category Not Found.</td>
                                    </tr>
                                    <?php else : ?>
                                        <?php while($category = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td style="width: 56px; text-align:center;"><?php echo $category['id']; ?></td>
                                                <td style="width: 300px; text-align:left;"><?php echo $category['name']; ?></td>
                                                <td  style="width: 300px; text-align:center;">

                                                    <!-- Show Model Start -->
                                                    <button type="button" class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#showCategory<?php echo $category['id']; ?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View Detail Category
                                                    </button>
                                                    <!-- Show Modal -->
                                                    <div class="modal fade" id="showCategory<?php echo $category['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $category['name']; ?> View Detail</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-4">
                                                                            <strong>Category Name</strong>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <?php echo $category['name']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-4">
                                                                            <strong>Created Date</strong>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <?php echo $category['created_at']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-sm-4">
                                                                            <strong>Updated Date</strong>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <?php echo $category['updated_at']; ?>
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
                                                    <button type="button" class="btn btn-info btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#editCategory<?php echo $category['id'] ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i> Edit Category
                                                    </button>
                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editCategory<?php echo $category['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $category['name'] ?> Edit</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="category-update.php" method="post">
                                                                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="name">Category Name</label>
                                                                            <input type="text" name="name" value="<?php echo $category['name'] ?>" class="form-control" placeholder="Enter Category Name..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success" name="category_update"><i class="fa fa-save"></i> Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Edit Model End -->

                                                    <!-- Delete Model Start -->
                                                    <button type="button" class="btn btn-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#delCategory<?php echo $category['id']; ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete Category
                                                    </button>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delCategory<?php echo $category['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="text-white">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="category-delete.php" method="post">
                                                                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                                                    <div class="modal-body">
                                                                        <h5><strong>Are you sure this category deleted?</strong></h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger" name="category_delete"><i class="fa fa-trash"></i> Delete</button>
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
            