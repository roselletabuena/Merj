<?php
    include '../php/connection.php';

    $stmt = $dbc->prepare("SELECT count(*) FROM product WHERE pro_status = ?");
    $stmt->execute(['Available']);
    $count = $stmt->fetchColumn();


    $stmt_user = 'SELECT count(*) FROM admin_user WHERE status = "1"';
    $count_user = $dbc->query($stmt_user)->fetchColumn();

    $stmt_client = 'SELECT count(*) FROM client_info';
    $count_client = $dbc->query($stmt_client)->fetchColumn();

    $total_pro = 'SELECT SUM(p.pro_quan) AS total FROM product as p WHERE pro_removed = "1"';
    $totalPro = $dbc->query($total_pro)->fetchColumn();

    $stmt_danger = 'SELECT COUNT(pro_status) FROM product WHERE pro_status = "danger" && pro_removed = "1"';
    $totalDanger = $dbc->query($stmt_danger)->fetchColumn();

    $stmt_zero = 'SELECT COUNT(pro_status) FROM product WHERE pro_status = "out of stock" && pro_removed = "1"';
    $totalZero = $dbc->query($stmt_zero)->fetchColumn();
   

    $qty= 0;
    $query_pending = 'SELECT DISTINCT o.customer_id, c.fullname, o.total_price, COUNT(o.order_status) as total FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.order_status="pending" GROUP BY o.customer_id, o.order_status, o.order_date';
    $stmt_pending = $dbc->query($query_pending);
    while ($row = $stmt_pending->fetch()) { 
        $qty++;
    }

    $qty_con= 0;
    $query_con = 'SELECT DISTINCT o.customer_id, c.fullname, o.total_price, COUNT(o.order_status) as total FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.order_status="confirmed" GROUP BY o.customer_id, o.order_status, o.order_date';
    $stmt_con = $dbc->query($query_con);
    while ($row = $stmt_con->fetch()) { 
        $qty_con++;
    }

    $qty_can= 0;
    $query_can = 'SELECT DISTINCT o.customer_id, c.fullname, o.total_price, COUNT(o.order_status) as total FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.order_status="cancelled" GROUP BY o.customer_id, o.order_status, o.order_date';
    $stmt_can = $dbc->query($query_can);
    while ($row = $stmt_can->fetch()) { 
        $qty_can++;
    }

    $qty_ready= 0;
    $query_ready = 'SELECT DISTINCT o.customer_id, c.fullname, o.total_price, COUNT(o.order_status) as total FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.order_status="Ready to ship" GROUP BY o.customer_id, o.order_status, o.order_date';
    $stmt_ready = $dbc->query($query_ready);
    while ($row = $stmt_ready->fetch()) { 
        $qty_ready++;
    }

    $qty_comp= 0;
    $query_comp = 'SELECT DISTINCT o.customer_id, c.fullname, o.total_price, COUNT(o.order_status) as total FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.order_status="completed" GROUP BY o.customer_id, o.order_status, o.order_date';
    $stmt_comp = $dbc->query($query_comp);
    while ($row = $stmt_comp->fetch()) { 
        $qty_comp++;
    }

    $count_brand = $dbc->query("SELECT count(*) FROM brands")->fetchColumn();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome-free-5.7.2-web/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../styles/dash.css">
    <title>Manage User</title>
</head>
    <body>
    <section>
        <div class="row">
            <div class="card-title">
                <h2>Dashboard</h2>
            </div>
        </div>
    </section>
    <section>
        <h3>Products</h3>
        <hr>
        <div class="row">
            <div class="col-md-3 card">
                <div class="row text-center">
                    <p class="total">TOTAL PRODUCTS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center"><?php echo $count; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 total-pro">
                <div class="row text-center">
                    <p class="total">TOTAL PRODUCTS QUANTITY</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $totalPro; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 total-danger">
                <div class="row text-center">
                    <p class="total">PRODUCTS IN DANGER</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $totalDanger; ?></h1>
                    </div>
                </div>
            </div>
              <div class="col-md-3 total-zero">
                <div class="row text-center">
                    <p class="total">ZERO PRODUCTS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $totalZero; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <h3>People</h3>
        <hr>
        <div class="row">
            <div class="col-md-5 card-user">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF USERS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center"><?php echo $count_user; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-5 total-cust">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF CUSTOMER</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $count_client; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <h3>Orders</h3>
        <hr>
        <div class="row">
            <div class="col-md-4 total-pending">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF PENDING ORDERS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center"><?php echo $qty; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 total-confirm">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF CONFIRMED ORDERS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $qty_con; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 total-cancel">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF CANCELLED ORDERS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $qty_can; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 total-ready">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF READY TO BE SHIP PRODUCTS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center"><?php echo $qty_ready; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-5 total-complete">
                <div class="row text-center">
                    <p class="total">TOTAL NUMBER OF COMPLETED ORDERS</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $qty_comp; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    <section>
    </body>
</html>

<script src="../vendors/js/jquery.min.js"></script>
<script src="../vendors/js/bootstrap.min.js"></script>
<script src="../vendors/js/jquery.dataTables.min.js"></script>
<script src="../vendors/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/js/validator.min.js"></script>
