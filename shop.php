<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendors/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/shop.css">
    <link rel="stylesheet" href="vendors/new/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="vendors/animate/animate.css">
    <link rel="stylesheet" href="vendors/aos-master/dist/aos.css">
    <link rel="stylesheet" href="vendors/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="vendors/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="vendors/package/dist/sweetalert2.min.css">
    <script src="vendors/new/js/jquery.min.js"></script>
    <script src="vendors/new/js/bootstrap.min.js"></script>
    <title>Shop</title>
    <style>

    </style>
</head>
<body class="animated slower fadeIn">
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
                <a class="nav-link" href="#">Shop<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
                </a>
                <div class="dropdown-menu  pl-3 category" aria-labelledby="navbarDropdown">

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
                    <div class="dropdown dropdown-menu-right">
                        <button type="button" class="btn btn-light dropdown" data-toggle="dropdown">
                            <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
                            <span class="badge badge-danger">0</span>
                            </button>
                            <div class="dropdown-menu p-2 animated fadeIn" id="cart" style="margin-left: -225px; width: 320px;">
                        </div>
                    </div>
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

<div id="login" class="modal hide" role="dialog">
    <div class="modal-dialog modal-dialog-centered">   
        <div class="modal-content modal-style">
            <div class="modal-body" class="p-5">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-uppercase pl-3">Login</h5>
                    </div>
                    <div class="col-md-6">
                        <a href="#" style="float: right"  data-toggle="modal" data-dismiss="modal" data-target="#signup" class="mr-4 signup sub-b">Sign up</a>
                    </div>
                </div>
                <br>
                <form id="loginform" class="need-validation loginform" novalidate>
                    <div class="form-group pl-3 pr-3">
                        <input type="text" id="loginname" name="loginname" class="form-control text-style" placeholder="Email / Phone / Username" required>
                        <div class="invalid-feedback">
                            Please provide a Username / Phone / Email
                        </div>
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <input type="password" id="loginpass" name="loginpass" class="form-control text-style" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Please provide a Password
                        </div>
                        <div align="right" class="mt-3"><a href="#" class="mr-4 signup">forgot password?</a></div>
                    </div>
                    <div class="pl-3 pr-3">
                        <input type="submit" class="form-control btn btn-danger mt-1 mb-3 login-btn" value="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="signup" class="modal hide" role="dialog">
        <div class="modal-dialog modal-dialog-centered">   
            <div class="modal-content modal-style">
                <div class="modal-body" class="p-5">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-uppercase pl-3">sign up</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" style="float: right"  data-toggle="modal"  data-dismiss="modal" data-target="#login" class="mr-4 signup">login</a>
                        </div>
                    </div>
                    <br>
                    <form class="needs-validation" id="signupForm" novalidate>
                        <div class="form-group pl-3 pr-3">
                            <input type="text" id="phone" name="phone" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" class="form-control text-style" placeholder="Phone number" required>
                            <div class="invalid-feedback">
                                Please provide a phone number
                            </div>
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <input type="text" id="fullname" name="fullname" onkeypress="return /[a-z ]/i.test(event.key)"  class="form-control text-style" placeholder="Full name" required>
                            <div class="invalid-feedback">
                                Please provide a full name
                            </div>
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <input type="text" id="username" name="username"  onkeypress="return /[a-z_.1-9]/i.test(event.key)" class="form-control text-style" placeholder="Username" required>
                            <div class="invalid-feedback">
                                Please provide a username
                            </div>
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <input type="email" id="emailAdd" name="emailAdd" class="form-control text-style" placeholder="Email Address" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address
                            </div>
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <input type="password" data-minlength="6" id="password" name="password" class="form-control text-style" placeholder="Password" required>
                            <!-- <input type="password" id="cpassword" name="password" class="form-control mt-3 text-style" placeholder="Confirm Password" required> -->
                        </div>
                        <div class="pl-3 pr-3">
                            <input type="submit" id="sub-b" class="form-control btn mt-3 login-btn" value="signup">
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<header id="introduction">
    <div class="container p-5">
        <div class="row fill-viewport align-items-center">
            <div class="col-md-12 p-5 text-center">
            <h1 class="text-white-70">COLLECTION</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
            </div>
        </div>
    </div>
</header>

<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="content-shop">
            </div>
        </div>
    </div>
</div>

<footer class="page-footer font-small indigo">
    <div  data-aos="flip-up"  class="container">
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!">About us</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!">Products</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!">Awards</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!">Help</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!">Contact</a>
          </h6>
        </div>
      </div>
      <hr class="rgba-white-light" style="margin: 0 15%;">
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
        <div class="col-md-8 col-12 mt-5 ">
          <p style="line-height: 1.7rem">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
            aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
        </div>
      </div>
      <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
      <div class="row pb-3">
        <div class="col-md-12">
          <div class="mb-5 flex-center text-center">
            <a class="fb-ic">
              <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
            </a>
            <a class="tw-ic">
              <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
            </a>
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
            </a>
            <a class="li-ic">
              <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
            </a>
            <a class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
            </a>
            <a class="pin-ic">
              <i class="fab fa-pinterest fa-lg white-text"> </i>
            </a>
          </div>
        </div>
      </div>
    </div>
</footer>


<script src="controllers/shop.js"></script>
<script src="vendors/aos-master/dist/aos.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="vendors/slick-1.8.1/slick/slick.js"></script>
<script src="controllers/homepage.js"></script>
<script src="vendors/package/dist/sweetalert2.min.js"></script>
<script src="vendors/package/dist/sweetalert2.js"></script>
<script src="vendors/js/validator.min.js"></script>
</body>
</html>

<div class="modal animated bounceIn" id="myModal" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
                <div>
                    <h5 style="margin-top: 7px !important;" id="name"></h5>
                    <p>is already added on cart</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal animated fadeIn" id="remove">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <p>Do you really want to delete <span id="name">Product name</span>?</p>
                <div>
                    <button class="btn btn-danger btn-sm" id="confirm" value="1">Confirm</button>
                    <button class="btn btn-secondary btn-sm" data-dismiss="modal" >Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
