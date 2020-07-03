<?php
    include '../php/connection.php';

    if(isset($_POST["id"])){
        $output = '';
        $query = "SELECT * FROM supplier WHERE id = '".$_POST["id"]."'";
        $result = $dbc->query($query);

        while($row = $result->fetch()) {
            $output .= '
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="supplier_code" class="control-label">Supplier Code</label>
                    <input type="text" id="supplier_code" name="supplier_code" value="'.$row["supplier_code"].'" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" readonly>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="company_name" class="control-label">Company name</label>
                    <input type="text" id="company_name" name="company_name" value="'.$row["company_name"].'" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" readonly>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="company_con" class="control-label">Contact number</label>
                    <input type="text" id="company_con" name="company_con" value="'.$row["company_contact"].'" class="form-control input-sm" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" readonly>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="company_email" class="control-label">Company Email</label>
                    <input type="email" id="company_email" name="company_email" value="'.$row["company_email"].'"onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" readonly>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="company_add" class="control-label">Company Address</label>
                    <textarea name="company_add" id="company_add" cols="30" rows="2" class="form-control input-sm" style="resize: none" onkeypress="return /[a-z 0-9 #]/i.test(event.key)" readonly>'.$row["company_add"].'</textarea>
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
                    <input type="text" id="main_name" name="main_name" value="'.$row["contact_person"].'" class="form-control input-sm" onkeypress="return /[a-z ]/i.test(event.key)" readonly>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="main_email" class="control-label">Email</label>
                    <input type="email" id="main_email" name="main_email" value="'.$row["contact_email"].'" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" readonly>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="main_position" class="control-label">Company position</label>
                    <input type="text" id="main_position" name="main_position" value="'.$row["contact_position"].'" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" readonly>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="main_contact" class="control-label">Phone number</label>
                    <input type="text" id="main_contact" name="main_contact" value="'.$row["contact_number"].'" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" class="form-control input-sm" readonly>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="add_info" class="control-label">Additional Information</label>
                    <textarea name="add_info" id="add_info" cols="30" rows="3" placeholder="optional" class="form-control" style="resize: none" readonly>'.$row["add_info"].'</textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <hr>
        <div align="right">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        </div>
            ';
        }
        echo $output;
    }
?>


