<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="../vendors/animate/animate.css">
    <link rel="stylesheet" href="../bootstrap-sweetalert-master/dist/sweetalert.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <title>Manage Orders</title>

</head>
<body>
        <div class="card">
            <h3 class="text-center">Manage Orders</h3>

            <div class="row p-5">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="order_table" class="table table-responsive table-bordered" style="width:100%">
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<div id="view" class="modal animated fadeIn centered-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body" id="additional_info">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="viewOrder" class="modal animated fadeIn centered-modal" role="dialog" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-d">
            <div class="modal-body" id="viewOrderDetails">
               
            </div>
        </div>
    </div>
</div>

<div id="update" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body" id="update_products">
             
            </div>
        </div>
    </div>
</div>

<div id="delete" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="remove_product">
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <p>Are you sure you want to delete thisUnit?</p>
                        <hr>
                        <div align="right">
                            <button type="submit" class="btn btn-sm btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                        </div>                        
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<script src="../vendors/js/jquery.min.js"></script>
<script src="../vendors/js/bootstrap.min.js"></script>
<script src="../vendors/js/jquery.dataTables.min.js"></script>
<script src="../vendors/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/js/validator.min.js"></script>
<script src="../bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
<script src="../orders/manage_orders.js"></script>