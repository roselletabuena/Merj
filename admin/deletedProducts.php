<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <title>Manage Products</title>
    <style>
        .image-cover {
            width: 100px;
            height: 100px;
            border-radius: 0%;
            object-fit: cover;
            object-position: center right;
        }
        .display-image{
            width: 150px;
            height: 150px;
            border-radius: 10%;
            object-fit: cover;
            object-position: center right;
        }
        .image-modal{
            width: 150px;
            height: 150px;
            border-radius: 10%;
            object-fit: cover;
            object-position: center right;
        }
        .update-modal{
            width: 250px;
            height: 250px;
            border-radius: 5%;
            object-fit: cover;
            object-position: center right;
        }
        .p-5 {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Manage Products</h3>
        <div class="row">
            <div class="col-md-12" align="right">
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="deletedProd" class="table table-striped table-bordered" style="width:100%">
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="../vendors/js/jquery.min.js"></script>
<script src="../vendors/js/bootstrap.min.js"></script>
<script src="../vendors/js/jquery.dataTables.min.js"></script>
<script src="../vendors/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/js/validator.min.js"></script>
<script src="../controllers/deletedProducts.js"></script>