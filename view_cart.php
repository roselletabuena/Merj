<?php
    include 'php/connection.php';
    
    $query = "SELECT * FROM client_info";
    $stmt = $dbc->query($query);

    if (isset($_COOKIE['client_id'])) {
        $id = $_COOKIE['client_id'];
        while ($row = $stmt->fetch()) {
            if (!empty($row)) {
                if($id == $row["id"]){
                    break;
                }
            }
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendors/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/checkout.css">
    <link rel="stylesheet" href="vendors/new/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="vendors/animate/animate.css">
    <script src="vendors/new/js/jquery.min.js"></script>
    <script src="vendors/new/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .borderless td, .borderless th {
            border: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="images/MERJ.png" height="35px" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="shop.php">Shop<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-sm-0">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <div class="dropdown dropdown-menu-right">
                    <button type="button" class="btn btn-light active" data-toggle="dropdown">
                    <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="dropdown dropdown-menu-right ">
                    <button type="button" class="btn btn-light dropdown" data-toggle="dropdown"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu animated fadeIn"  style="margin-left: -160px; width: 200px;">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-edit pr-2"></i>Manage Account</a>
                        <a href="#" class="dropdown-item" id="logout"><i class="fas fa-sign-out-alt pr-2"></i>Log Out</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>
<section id="introduction">
    <div class="container p-5">
        <div class="row fill-viewport align-items-center">
            <div class="col-md-12 p-5 text-center">
            <h1 class="text-white">CART</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    
<div class="row">
    <div class="col-md-8"  style="padding-top: 30px;">
        <table class="table">
        <thead>
            <tr>
                <th scope="col" width="5%"></th>
                <th scope="col" width="25%"></th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
            <tbody id="cart_content">
                
            </tbody>
        </table>
    </div>
    <div class="col-md-2">
            <div class="col p-5" align="left">
                <div class="card bg-light" style="width: 300px !important;">
                    <div class="card-body">
                        <h4>Order Summary</h4>
                        <p style="margin-bottom: 2px !important;"><?php echo $row['fullname']?></p>
                        <p style="margin-bottom: 2px !important;"><?php echo $row['emailAdd']?></p>
                        <p style="margin-bottom: 2px !important;"><?php echo $row['address']?></p>
                        <p style="margin-bottom: 2px !important;">Total Items: <span id="items"></span></p>
                        <p>Total: ₱ <span id="total"></span></p>
                        <button class="btn btn-dark" id="proceed">PROCEED TO CHECKOUT</button>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

</body>
<script src="controllers/viewCart.js"></script>
<script src="controllers/shop.js"></script>
</html>

