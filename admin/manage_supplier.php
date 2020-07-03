<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <title>Manage Supplier</title>
</head>
<body>
    <div class="card">
        <h3>Manage Supplier</h3>
        <div class="row">
            <div class="col-md-12" align="right">
                <button class="btn btn-primary btn-primary btn-add btn-hover" id="add_data" data-toggle="modal" data-target="#insert"><i class="fas fa-plus-square"></i> Add</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="supplier_table" class="table table-striped table-bordered" style="width:100%">

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
                <h4 class="modal-title">Register Supplier</h4>
            </div>
        <form  data-toggle="validator" id="regSupplier" role="form" validate>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="help-block">Please fill out this form as completely and accurately as possible</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="supplier_code" class="control-label">Supplier Code</label>
                            <input type="text" id="supplier_code" name="supplier_code" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" readonly>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="company_name" class="control-label">Company name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="company_con" class="control-label">Contact number</label>
                            <input type="text" id="company_con" name="company_con" class="form-control input-sm" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="company_email" class="control-label">Company Email</label>
                            <input type="email" id="company_email" name="company_email" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="company_add" class="control-label">Company Address</label>
                            <textarea name="company_add" id="company_add" cols="30" rows="2" class="form-control input-sm" style="resize: none" onkeypress="return /[a-z 0-9 #]/i.test(event.key)" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="help-block">Main contact information</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="main_name" class="control-label">Contact name</label>
                            <input type="text" id="main_name" name="main_name" class="form-control input-sm" onkeypress="return /[a-z ]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="main_email" class="control-label">Email</label>
                            <input type="email" id="main_email" name="main_email" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="main_position" class="control-label">Company position</label>
                            <input type="text" id="main_position" name="main_position" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="main_contact" class="control-label">Phone number</label>
                            <input type="text" id="main_contact" name="main_contact" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" class="form-control input-sm" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="add_info" class="control-label">Additional Information</label>
                            <textarea name="add_info" id="add_info" cols="30" rows="3" placeholder="optional" class="form-control" style="resize: none"></textarea>
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
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supplier Details</h4>
            </div>
            <div class="modal-body" id="view_supplier">
            
            </div>
        </div>
    </div>
</div>

<div id="update" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body" id="update_supplier">
        
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
            <div class="modal-body" id="remove">
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
<script src="../controllers/manage_supplier.js"></script>
