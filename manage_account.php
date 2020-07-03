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
    <link rel="stylesheet" href="styles/manage_account.css">
    <link rel="stylesheet" href="vendors/new/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="vendors/package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="vendors/animate/animate.css">
    <script src="vendors/new/js/jquery.min.js"></script>
    <script src="vendors/new/js/bootstrap.min.js"></script>
    <title>Manage Account</title>
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
                        <div class="dropdown-menu animated fadeIn "  style="margin-left: -160px; width: 200px;">
                            <a href="manage_account.php" class="dropdown-item"><i class="fas fa-user-edit pr-2"></i>Manage Account</a>
                            <a href="track_order.php" class="dropdown-item" id="track_order" ><i class="fas fa-spinner pr-2"></i>Track your order</a>>
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
<section id="tabs" class="project-tab mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Details</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My Orders</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane animated fadeIn slower fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row pt-3">
                                <div class="col-md-4">
                                    <div class="card p-4 shadow  mb-2">
                                        <p><strong>Full name</strong></p>
                                        <form id="updNameForm">
                                            <input type="text" class="form-control displayName"onkeypress="return /[a-z ]/i.test(event.key)" value="<?php echo $row['fullname'] ?>" readonly>
                                            <div align="right">
                                                <button type="button"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-link">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                 <div class="col-md-8">
                                    <div class="card p-4 shadow mb-2">
                                        <p><strong>Address</strong></p>
                                        <input type="text" class="form-control"  id="address" value="<?php echo $row['address']?>" readonly>
                                        <div align="right">
                                            <button type="button" class="btn btn-link"  data-toggle="modal" data-target="#editAddress">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card p-4 shadow mb-2">
                                        <p><strong>Security</strong></p>
                                        <input type="text" class="form-control" value="Change password" readonly>
                                        <div align="right">
                                            <button type="button" class="btn btn-link"  data-toggle="modal" data-target="#changePass">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-4 shadow mb-2">
                                        <p><strong>Email</strong></p>
                                        <input type="text" class="form-control displayEmail" value="<?php echo $row['emailAdd']?>" readonly>
                                        <div align="right">
                                            <button type="button" class="btn btn-link"  data-toggle="modal" data-target="#editEmail">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-4 shadow mb-2">
                                        <p><strong>Username</strong></p>
                                        <input type="text" class="form-control displayUsername" value="<?php echo $row['username']?>" readonly>
                                        <div align="right">
                                            <button type="button" class="btn btn-link"  data-toggle="modal" data-target="#editUsername">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeIn slower fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php
                            $query_o = 'SELECT c.fullname, o.order_date, p.pro_name, o.order_status, o.payment_mode  FROM orders AS o LEFT JOIN product AS p ON p.id = o.product_id LEFT JOIN client_info AS c ON c.id = o.customer_id WHERE c.id = "'.$row['id'].'" && o.order_status = "completed" || c.id = "'.$row['id'].'"   && o.order_status = "cancelled"';
                            $stmt_o = $dbc->query($query_o);
                                if ($stmt_o->rowCount()) {
                                    echo  '<table class="table mt-5" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Order date</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment mode</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        while ($row_o = $stmt_o->fetch()) {
                                            echo '
                                            <tr>
                                                <th scope="row">'.$row_o['order_date'].'</th>
                                                <td>'.$row_o['pro_name'].'</td>
                                                <td>'.$row_o['order_status'].'</td>
                                                <td>'.$row_o['payment_mode'].'</td>
                                            </tr>';
                                        }
                                }
                                else {
                                    echo '<p align="center" class="align-middle p-5 mt-5" style="font-size: 30px;">You have no orders yet</p>';
                                }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="controllers/viewCart.js"></script>
<script src="controllers/shop.js"></script>
<script src="controllers/editAccount.js"></script>
<script src="vendors/package/dist/sweetalert2.min.js"></script>
<script src="vendors/package/dist/sweetalert2.js"></script>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <form id="updNameForm">
                <input type="text" class="form-control mt-2 updName"  id="updName" name="updName" onkeypress="return /[a-z ]/i.test(event.key)" value="<?php echo $row['fullname'] ?>">
                <div align="right">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="<?php echo $row['id'] ?>" class="btn btn-primary submit_name">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <form id="editAddressForm">
                <textarea name="updAddress" class="form-control" id="updAddress" cols="30" rows="3" style="resize: none;"><?php echo $row['address'] ?></textarea>
                <div align="right">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="<?php echo $row['id'] ?>" class="btn btn-primary submit_name">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
        <form id="updPassForm">
                <input type="password" class="form-control mt-2 oldPass"  id="oldPass" name="oldPass" placeholder="Old password">
                <input type="password" class="form-control mt-2 newPass"  id="newPass" name="newPass" placeholder="New password">
                <input type="password" class="form-control mt-2 conPass"  id="conPass" name="conPass" placeholder="Confirm password">
                <div align="right">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="<?php echo $row['id'] ?>" class="btn btn-primary submit_name">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div> 
</div>

<div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="emailAddForm">
                    <input type="email" class="form-control mt-2 emailAdd"  id="emailAdd" name="emailAdd" value="<?php echo $row['emailAdd'] ?>" require>
                    <div align="right">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="<?php echo $row['id'] ?>" class="btn btn-primary submit_name">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editUsername" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="usernameForm">
                    <input type="text" class="form-control mt-2"  id="username" name="username" onkeypress="return /[a-z1-z_.]/i.test(event.key)" value="<?php echo $row['username'] ?>">
                    <div align="right">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="<?php echo $row['id'] ?>" class="btn btn-primary submit_name">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>