<?php
    include '../php/connection.php';

    $stmt = $dbc->prepare("SELECT count(*) FROM product WHERE pro_status = ?");
    $stmt->execute(['Available']);
    $count = $stmt->fetchColumn();

    $total_pro = 'SELECT SUM(p.pro_quan) AS total FROM product as p WHERE pro_removed = "1"';
    $totalPro = $dbc->query($total_pro)->fetchColumn();



    $stmt_danger = 'SELECT COUNT(pro_status) FROM product WHERE pro_status = "danger"';
    $totalDanger = $dbc->query($stmt_danger)->fetchColumn();


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
                    <p class="total">TOTAL PRODUCTS IN DANGER</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $totalDanger; ?></h1>
                    </div>
                </div>
            </div>
              <div class="col-md-3 total-danger">
                <div class="row text-center">
                    <p class="total">TOTAL PRODUCTS IN DANGER</p>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="total"><?php echo $totalDanger; ?></h1>
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
