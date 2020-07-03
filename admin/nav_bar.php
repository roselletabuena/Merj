
<script src="../vendors/new/js/bootstrap.min.js"></script>

<?php
    if (!isset($_COOKIE['user_id'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Dashboard</title>
    <link href="../vendors/new/fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script src="../vendors/new/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../vendors/new/css/bootstrap.min.css">
    <script src="../controllers/nav_bar.js"></script>

</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm text-white btn-red">
            <i class="fas fa-bars"></i>
        </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                    <a><img src="../images/MERJ.png" width="130px"></a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <!-- <div class="user-pic">
                    <img class="img-responsive img-rounded" src="../images/dp-icon.png" >
                </div> -->
                <div class="user-info">
                    <span class="user-name">
                        <?php echo $_COOKIE['username'] ?>
                    </span>
                    <span class="user-role">Administrator</span>
                    <span class="user-status">
                        <a>Edit Account</a>
                    </span>
                </div>
            </div>

        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
            <li class="header-menu">
                <span>General</span>
            </li>
            <li class="sidebar">
                <a id="dashboard"><i  class="fa fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="sidebar">
                <a id="mngOrders"><i class="fas fa-box"></i><span> Manage Orders</span></a>
            </li>
            <li class="sidebar active">
                <a id="addProd"><i class="fa fa-plus-square "></i><span>Add Product</span>
                    <!-- <span class="badge badge-pill badge-danger">3</span> -->
                </a>
            </li>
            <li class="sidebar-dropdown">
                <a>
                    <i class="fa fa-shopping-cart"></i>
                    <span>Products</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a id="mngProd">Manage Products</a></li>
                        <li><a id="mngCat">Manage Categories</a></li>
                        <li><a id="mngBrands">Manage Brands</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a><i class="fa fa-chart-line"></i><span>People</span></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a id="mngSupplier">Manage Supplier</a></li>
                        <li><a id="mngUser">Manage User</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a><i class="fa fa-sticky-note"></i><span>Pages</span></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a id="mngNote">Welcome Note</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar">
                <a id="actionLogs"><i class="fa fa-wrench"></i><span>Action Logs</span></a>
            </li>
            <li class="sidebar">
                <a id="logOut"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </div>
    </nav>
    <main class="page-content">
            <iframe src="dashboard.php" id="main-content" frameborder="0" scrolling="0" width="100%" height="100%"></iframe> 
    </main> 
    </div>
    <script src="../vendors/new/js/popper.min.js"></script>
    <script src="../vendors/js/bootstrap.min.js"></script>
</body>

</html>