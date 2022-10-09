<?php 
    session_start();
    include("config.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo $page; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="public/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="public/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./public/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./public/vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="public/images/501-5010612_logo-online-shop-png.png" />
    <style>
      .scroll{
          max-height: 470px;
          padding: 1rem;
          overflow-y: auto;
          direction: ltr;
          scrollbar-color: #3e3e3e #e4e4e4;
          scrollbar-width: thin;
      }
    </style>
</head>
<body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo text-white" href="dashboard.php">
            <img src="public/images/501-5010612_logo-online-shop-png.png" style="width: 50%;" alt="logo" /><span class="text-primary"> Online </span> Shop
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="public/images/501-5010612_logo-online-shop-png.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Online Shopping dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li> -->
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bell"></i>
                    <?php
                      $sql_order = "SELECT * FROM orders WHERE status = '0' ORDER BY id DESC";
                      $res = mysqli_query($conn, $sql_order);
                    ?>
                    <span class="count"><?php echo mysqli_num_rows($res); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                  <a class="dropdown-item py-3">
                    <p class="mb-0 font-weight-medium float-left">You have <span class="text-danger"> <?php echo mysqli_num_rows($res); ?> </span> Orders </p>
                  </a>
                  <div class="dropdown-divider"></div>
                    <?php 
                      if(mysqli_num_rows($res) > 0):
                          foreach($res as $order) :
                    ?>
                    <a class="dropdown-item preview-item">
                      <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $order['name']  ?></p>
                        <p class="font-weight-light small-text"> <?php echo $order['phone']  ?> </p>
                      </div>
                    </a>
                    <?php 
                        endforeach;                    
                      endif;                    
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-3">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
                <span class="profile-text font-weight-normal">English</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-us"></i> English </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-fr"></i> French </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ru"></i> Russian </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="public/images/150-1503945_transparent-user-png-default-user-image-png-png.png"> <span class="font-weight-normal"> Thura </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" width="100" src="public/images/150-1503945_transparent-user-png-default-user-image-png-png.png" alt="Profile image">
                  <p class="mb-1 mt-3">Thura</p>
                  <p class="font-weight-light text-muted mb-0">thuratech087@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <!-- <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a> -->
                <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="public/images/150-1503945_transparent-user-png-default-user-image-png-png.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Thura Tech</p>
                  <p class="designation">Administrator</p>
                </div>
                <!-- <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div> -->
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item <?php if($page == 'Dashboard') { echo 'active'; } ?>">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item <?php if($page == 'Users') { echo 'active'; } ?>">
              <a class="nav-link" href="user-index.php">
                <span class="menu-title">Users</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'Roles') { echo 'active'; } ?>">
              <a class="nav-link" href="role-index.php">
                <span class="menu-title">Roles</span>
                <i class="icon-lock menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'Categories') { echo 'active'; } ?>">
              <a class="nav-link" href="category-index.php">
                <span class="menu-title">Categories</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'Brands') { echo 'active'; } ?>">
              <a class="nav-link" href="brand-index.php">
                <span class="menu-title">Brands</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'Products') { echo 'active'; } ?>">
              <a class="nav-link" href="product-index.php">
                <span class="menu-title">Products</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'Townships') { echo 'active'; } ?>">
              <a class="nav-link" href="township-index.php">
                <span class="menu-title">Townships</span>
                <i class="icon-flag  menu-icon"></i>
              </a>
            </li>

            <li class="nav-item <?php if($page == 'Orders') { echo 'active'; } ?>">
              <a class="nav-link" href="order-index.php">
                <span class="menu-title">Order</span>
                <i class="icon-handbag   menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li> -->
            <li class="nav-item nav-category"><span class="nav-link">Sample Pages</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">General Pages</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Logout </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">