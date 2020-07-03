<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="../vendors/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <title>Manage User</title>
</head>
<body>
    <div class="card">
        <h3>Manage User</h3>
        <div class="row">
            <div class="col-md-12" align="right">
                <button class="btn btn-primary btn-primary btn-add btn-hover" id="add_data" data-toggle="modal" data-target="#insert"><i class="fas fa-plus-square"></i> Add</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="user_table" class="table table-striped table-bordered" style="width:100%">

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
                <h4 class="modal-title">Register User</h4>
            </div>
        <form  data-toggle="validator" id="regAdmin" role="form" validate>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="full_name" class="control-label">Full name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="user_con" class="control-label">Contact number</label>
                            <input type="text" id="user_con" name="user_con" class="form-control input-sm" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" data-minlength="6" class="form-control input-sm" id="password" name="password" placeholder="Password" required>
                                <div class="help-block">Minimum of 6 characters</div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-sm" id="con_pass" name="con_pass" data-match="#password" data-match-error="Mismatch password" placeholder="Confirm" required>
                                <div class="help-block with-errors"></div>
                            </div>
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
<script src="../controllers/manage_admin.js"></script>
