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
    <link rel="stylesheet" href="vendors/package/dist/sweetalert2.min.css">
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
                    <a href="manage_account.php" class="dropdown-item"><i class="fas fa-user-edit pr-2"></i>Manage Account</a>
                            <a href="track_order.php" class="dropdown-item" id="track_order" ><i class="fas fa-spinner pr-2"></i>Track your order</a>
                        <a href="#" class="dropdown-item" id="logout"><i class="fas fa-sign-out-alt pr-2"></i>Log Out</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>
<section id="introduction-payment">
    <div class="container p-5">
        <div class="row fill-viewport align-items-center">
            <div class="col-md-12 p-5 text-center">
            <h1 class="text-white">PAYMENT</h1>
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <div class="row">
        <div class="col-md-8 p-5">
            <!-- <select name="payment_mode" class="form-control" id="payment_mode">
                <option value="Credit">Credit</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select> -->
          
  <div class="row">
    
    <div class="col-md-3 col-lg-3 col-sm-3">
      
      <label>
        <input type="radio" value="Visa" name="mode" class="card-input-element" />

          <div class="panel panel-default card-cc card-input">
            <div class="panel-heading text-center">
                <i class="fab fa-cc-visa fa-3x"></i>
            </div>
            <div class="panel-body text-center">
              Visa
            </div>
          </div>

      </label>
      
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3">
      
      <label>
        <input type="radio" value="Credit card" name="mode" class="card-input-element" />
          <div class="panel panel-default card-cc card-input">
            <div class="panel-heading text-center">
                <i class="fa fa fa-credit-card fa-3x"></i>
            </div>
            <div class="panel-body">
              Credit Card
            </div>
          </div>
      </label>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3">
      <label>
        <input type="radio" value="Master card" name="mode" class="card-input-element" />
          <div class="panel panel-default card-cc card-input">
            <div class="panel-heading text-center">
                <i class="fab fa-cc-mastercard fa-3x"></i>
            </div>
            <div class="panel-body">
              Master Card
            </div>
          </div>
      </label>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3">
      <label>
        <input type="radio" value="COD" name="mode" class="card-input-element" />
          <div class="panel panel-default card-cc card-input">
            <div class="panel-heading text-center">
                <i class="fas fa-money-bill-alt fa-3x"></i>
            </div>
            <div class="panel-body">
              Cash on delivery
            </div>
          </div>
      </label>
    </div>
</div>
        </div>
            <div class="col-4 p-5" align="left">
                <div class="card bg-light" style="width: 300px !important;">
                    <div class="card-body">
                        <h4>Order Summary</h4>
                        <input type="hidden" id="c_id" name="c_id" value="<?php echo $row['id']?>">
                        <p style="margin-bottom: 2px !important;"><i class="fas fa-user"></i> <?php echo $row['fullname']?></p>
                        <p style="margin-bottom: 2px !important;"><i class="fas fa-at"></i> <?php echo $row['emailAdd']?></p>
                        <p style="margin-bottom: 2px !important;"><i class="fas fa-phone"></i> <?php echo $row['phoneno']?></p>
                        <p style="margin-bottom: 2px !important;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address']?></p>
                        <p style="margin-bottom: 2px !important;">Total Items: <span id="items"></span></p>
                        <p>Total: ₱ <span id="total"></span></p>
                        <button class="btn btn-danger form-control" type="submit" id="placeorder">Place Order</button>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    </body>

<script src="controllers/viewCart.js"></script>
<script src="controllers/shop.js"></script>
<script src="vendors/package/dist/sweetalert2.min.js"></script>
<script src="vendors/package/dist/sweetalert2.js"></script>
</html>

