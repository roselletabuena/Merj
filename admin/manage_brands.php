<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <title>Manage Units</title>
</head>
<body>
    <div class="card">
        <h3>Manage Brands</h3>
        <div class="row">
            <div class="col-md-12" align="right">
                <button class="btn btn-primary btn-primary btn-add btn-hover" data-toggle="modal" data-target="#insert"><i class="fas fa-plus-square"></i> Add</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="brand_table" class="table table-striped table-bordered" style="width:100%">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<div id="insert" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Brand</h4>
            </div>
        <form  data-toggle="validator" id="brand_form" role="form" validate>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="brand_name" class="control-label">Brand Name</label>
                                <input type="text" id="brand_name" name="brand_name" class="form-control input-sm" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="brand_desc" class="control-label">Brand Description</label>
                                <textarea name="brand_desc" id="brand_desc" cols="30" rows="3" class="form-control" style="resize: none" required></textarea>
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

<div id="update" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body" id="update_brand">
                
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
            <div class="modal-body" id="delete_brand">
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
<script src="../controllers/manage_brands.js"></script>
