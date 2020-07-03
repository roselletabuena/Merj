<?php
    include 'php/connection.php';
    $query = 'SELECT c.fullname, o.order_status, o.orderId FROM orders AS o LEFT JOIN client_info AS c ON c.id = o.customer_id WHERE o.customer_id = "'.$_COOKIE['client_id'].'"  GROUP BY o.order_status';
    $stmt = $dbc->query($query);

    if (isset($_COOKIE['client_id'])) {
       
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendors/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="vendors/new/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="styles/shop.css">
    <script src="vendors/new/js/jquery.min.js"></script>
    <link rel="stylesheet" href="vendors/package/dist/sweetalert2.min.css">
    <script src="vendors/new/js/bootstrap.min.js"></script>

    <style>
        /* @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"); */
          @import url("vendors/fontawesome-free-5.7.2-web/css/fontawesome.css");
        .track_tbl td.track_dot {
            width: 50px;
            position: relative;
            padding: 0;
            text-align: center;
        }
        .track_tbl td.track_dot:after {
            height: 25px;
            width: 25px;
            background-color: rgb(3, 1, 1);
            border-radius: 50%;
            display: inline-block;
            margin-left: -5px;
            top: 11px;
        }
        .track_tbl td.track_dot span.track_line {
            background: #000;
            width: 3px;
            min-height: 50px;
            position: absolute;
            height: 101%;
        }
        .track_tbl tbody tr:first-child td.track_dot span.track_line {
            top: 30px;
            min-height: 25px;
        }
        .track_tbl tbody tr:last-child td.track_dot span.track_line {
            top: 0;
            min-height: 25px;
            height: 10%;
        }
    </style>
    <title>Track Order</title>
</head>
<body class="animated slower fadeIn">
    
<nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="images/MERJ.png" height="35px" alt="" srcset=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aboutus" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contactus" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                    </a>
                    <div class="dropdown-menu pl-3 category" aria-labelledby="navbarDropdown">
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-sm-0">
                <?php
                    if (isset($_COOKIE['client_id'])) { ?>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <div class="dropdown dropdown-menu-right">
                            <button type="button" class="btn btn-light dropdown" data-toggle="dropdown">
                            <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
                            <span class="badge badge-danger">0</span>
                            </button>
                            <div class="dropdown-menu p-2 animated fadeIn" id="cart" style="margin-left: -225px; width: 320px;">
                            </div>
                        </div>
                        <div class="dropdown dropdown-menu-right ">
                            <button type="button" class="btn btn-light dropdown" data-toggle="dropdown"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu animated fadeIn"  style="margin-left: -160px; width: 200px;">
                            <a href="manage_account.php" class="dropdown-item"><i class="fas fa-user-edit pr-2"></i>Manage Account</a>
                            <a href="track_order.php" class="dropdown-item" id="track_order" ><i class="fas fa-spinner pr-2"></i>Track your order</a>
                                <a href="#" class="dropdown-item" id="logout"><i class="fas fa-sign-out-alt pr-2"></i>Log Out</a>
                            </div>
                        </div>
                    </div>
                <?php
                } else { ?>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label>
                            <input type="button" class="btn login btn-in sub-l" type="button"  data-toggle="modal" data-target="#login" value="Login">
                        </label>
                        <span class="line"></span>
                        <label>
                            <input type="button" class="btn login btn-in sub-b" type="button"  data-toggle="modal" data-target="#signup" value="Signup">
                        </label>
                    </div>
                <?php
                } ?> 
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="p-4">
        <h3 class="text-center  mt-5 p-2">Track your order</h3>
            <?php 
                $count = 0;
            while ($row = $stmt->fetch()){
                $output ='';
                $output .= '
                <table class="table table-borderless track_tbl">
                    <thead>
                        <tr>
                            <th></th>
                            <th>S No</th>
                            <th>Status</th>
                        </tr>
                        <h5 class="text-center">Order # '.$row['orderId'].'</h5>
                    </thead>
                <tbody>' ;
                    if ($row['order_status'] == 'pending'){
                                $output .= '
                                <tr class="active">
                                    
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order is now waiting to be confirm</td>
                                </tr>
                                ';
                            } elseif ($row['order_status'] == 'confirmed') {
                                $output .= '
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>02</td>
                                    <td>Your order is now verified</td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order is now waiting to be confirm</td>
                                </tr>
                                ';
                            } elseif ($row['order_status'] == 'processing') {
                                $output .= '
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>03</td>
                                    <td>Your order is now on process </td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>02</td>
                                    <td>Your order is now verified</td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order is now waiting to be confirm</td>
                                </tr>
                                ';
                            } elseif ($row['order_status'] == 'Ready to ship') {
                                $output .= '
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>04</td>
                                    <td>Your order is now ready to ship it may arrived to you soon </td>
                                </tr>
                                <tr">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>03</td>
                                    <td>Your order is now on process </td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>02</td>
                                    <td>Your order is now verified</td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order is now waiting to be confirm</td>
                                </tr>
                                ';
                            } elseif ($row['order_status'] == 'completed') {
                                $output .= '
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>04</td>
                                    <td>Your order is now arrived your destination, Thank you for choosing us!</td>
                                </tr>
                                <tr class="active">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>04</td>
                                    <td>Your order is now ready to ship it may arrived to you soon </td>
                                </tr>
                                <tr">
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>03</td>
                                    <td>Your order is now on process </td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>02</td>
                                    <td>Your order is now verified</td>
                                </tr>
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order is now waiting to be confirm</td>
                                </tr>
                                ';
                            } else {
                                $output .= '
                                <tr>
                                    <td class="track_dot">
                                        <span class="track_line"></span>
                                    </td>
                                    <td>01</td>
                                    <td>Your order was cancelled</td>
                                </tr>';
                            }
                            echo $output;
            } ?>
            
          
                </tbody>
            </table>
        </div>
    </div>
    <script src="controllers/homepage.js"></script>
    <script src="controllers/shop.js"></script>
    <script src="vendors/package/dist/sweetalert2.min.js"></script>
    <script src="vendors/package/dist/sweetalert2.js"></script>
    <script src="vendors/js/validator.min.js"></script>
</body>
</html>