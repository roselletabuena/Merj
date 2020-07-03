<?php
include "../php/connection.php";

$query = "SELECT * FROM category";
$stmt = $dbc->query($query);

$query_brand = "SELECT * FROM brands";
$stmt_brand = $dbc->query($query_brand);

$query_unit = "SELECT * FROM uom";
$stmt_unit = $dbc->query($query_unit);

$query_supplier = "SELECT * FROM supplier";
$stmt_supplier = $dbc->query($query_supplier);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/panel.css">
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
        <div class="card">
            <h3>Manage Products</h3>
            <!-- <div class="row">
                <div class="col-md-12" align="right">
                    <button class="btn btn-secondary" id="add_data" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </div>
            </div> -->
            <div class="row p-5">
                <!-- <hr> -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered" style="width:100%">
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<div id="insert" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock In</h4>
            </div>
        <form  data-toggle="validator" id="product_form" role="form" enctype="multipart/form-data" validate>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="help-block">Product Details</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" align="center">
                            <div class="p-5">       
                                <img id="image_prev" src="../images/noimage.png" class="image-modal"/> 
                            </div>
                        </div>
                        <input type='file' onchange="readURL(this);" value="../images/dp-icon.png" accept="image/x-png,image/gif,image/jpeg" id="display_pic" name="display_pic" align="left"/> <br>    
                        <div class="form-group">
                            <label for="product_sku" class="control-label">Stock Keeping Unit (SKU)</label>
                            <input type="text" id="product_sku" name="product_sku" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" readonly required>
                            <div class="help-block with-errors"></div>
                            <input type="hidden" id="purchase_date" name="purchase_date" class="form-control input-sm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="supplier_name" class="control-label">Supplier</label>
                            <select name="supplier_name" class="form-control input-sm" id="supplier_name" required>
                                <option value="" style="display: none" selected disabled>Select Supplier</option>
                                <?php
                                    while($row_supplier = $stmt_supplier->fetch())
                                    {
                                    ?>
                                    <option value = "<?php echo($row_supplier["id"])?>" >
                                        <?php echo($row_supplier["company_name"]) ?>
                                    </option>
                                    <?php
                                    }               
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="product_name" class="control-label">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="product_category" class="control-label">Categories</label>
                            <select name="product_category" class="form-control input-sm" id="product_category" required>
                                <option value="" style="display: none" selected disabled>Select Category</option>
                                <?php
                                    while($row = $stmt->fetch())
                                    {
                                    ?>
                                    <option value = "<?php echo($row["id"])?>" >
                                        <?php echo($row["cat_name"]) ?>
                                    </option>
                                    <?php
                                    }               
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="product_brand" class="control-label">Brand</label>
                            <select name="product_brand" class="form-control input-sm" id="product_brand" required>
                                <option value="" style="display: none" selected disabled>Select Brand</option>
                                <?php
                                    while($row_brand = $stmt_brand->fetch())
                                    {
                                    ?>
                                    <option value = "<?php echo($row_brand["id"])?>" >
                                        <?php echo($row_brand["brand_name"]) ?>
                                    </option>
                                    <?php
                                    }               
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Quantity</label>
                            <input type="text" name="product_quantity"  id="product_quantity" class="form-control input-sm" required onkeypress="return /[0-9]/i.test(event.key) "/> 
                        </div>
                        <div class="form-group">
                            <label for="product_price" class="control-label">Product Price</label>
                            <input type="text" id="product_price" name="product_price" class="form-control input-sm" onkeypress="return /[0-9.]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="product_desc" class="control-label">Product Description</label>
                            <textarea name="product_desc" id="product_desc" cols="30" rows="2" class="form-control" style="resize: none" onkeypress="return /[a-z 0-9 #]/i.test(event.key)" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="product_note" class="control-label">Note</label>
                            <textarea name="product_note" id="product_note" cols="30" rows="3" placeholder="optional" class="form-control" style="resize: none"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div id="view" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body" id="product_details">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="stockin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock In</h4>
            </div>
            <div class="modal-body" id="stockin_form">
                <form data-toggle="validator" id="product_form" role="form" enctype="multipart/form-data" validate>
                    <div class="form-group">
                        <input type="text" id="stock_num" style="text-align: center;" name="stock_num" class="form-control input-lg" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <hr>
                    <div class="center-block" align="center">
                        <button type="submit" class="btn btn-sm btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
<script src="../controllers/manage_products.js"></script>