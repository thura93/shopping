<?php 
    $page = 'Dashboard';
    include("layouts/navbar.php");
?>
    <div class="content-wrapper">
        <h5><strong>Dashboard</strong></h5>
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
    </div>
<?php include("layouts/footer.php");
            