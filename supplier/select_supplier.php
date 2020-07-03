<?php
    include '../php/connection.php';

    if(isset($_POST["id"])){
        $query_industry = "SELECT industry_name FROM industry";
        $result_industry = $dbc->query($query_industry);

        $output = '';
        $query = "SELECT * FROM supplier WHERE id = '".$_POST["id"]."'";
        $result = $dbc->query($query);

        while($row = $result->fetch()) {
            $output .= '
        <form data-toggle="validator" id="updForm" role="form" validate>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <input type="hidden" name="upd_id" id="upd_id" value="'.$_POST["id"].'">
                    <label for="upd_company_name" class="control-label">Company name</label>
                    <input type="text" id="upd_company_name" name="upd_company_name" value="'.$row["company_name"].'" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="upd_company_add" class="control-label">Company Address</label>
                    <textarea name="upd_company_add" id="upd_company_add" cols="30" rows="3" class="form-control" style="resize: none" onkeypress="return /[a-z 0-9 #]/i.test(event.key)" required>'.$row["company_add"].'</textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="upd_company_con" class="control-label">Contact number</label>
                    <input type="text" id="upd_company_con" name="upd_company_con" value="'.$row["company_contact"].'" class="form-control input-sm" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="upd_company_email" class="control-label">Company Email</label>
                    <input type="email" id="upd_company_email" name="upd_company_email" value="'.$row["company_email"].'"onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
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
                    <label for="upd_main_name" class="control-label">Contact name</label>
                    <input type="text" id="upd_main_name" name="upd_main_name" value="'.$row["contact_person"].'" class="form-control input-sm" onkeypress="return /[a-z ]/i.test(event.key)" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="upd_main_email" class="control-label">Email</label>
                    <input type="email" id="upd_main_email" name="upd_main_email" value="'.$row["contact_email"].'" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="upd_main_position" class="control-label">Company position</label>
                    <input type="text" id="upd_main_position" name="upd_main_position" value="'.$row["contact_position"].'" onkeypress="return /[a-z_@.0-9]/i.test(event.key)" class="form-control input-sm" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="upd_main_contact" class="control-label">Phone number</label>
                    <input type="text" id="upd_main_contact" name="upd_main_contact" value="'.$row["contact_number"].'" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" class="form-control input-sm" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="upd_add_info" class="control-label">Additional Information</label>
                    <textarea name="upd_add_info" id="upd_add_info" cols="30" rows="3" placeholder="optional" class="form-control" style="resize: none" required>'.$row["add_info"].'</textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <hr>
        <div align="right">
            <button type="submit" id="submit" class="btn btn-sm btn-success" ><span class="glyphicon glyphicon-edit"></span> Update</button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>';

        $output .='
        <script>
        
        function display_data(){
            var action = "fetch";
            $.ajax({
                url: "../supplier/display_supplier.php",
                method: "POST",
                data: {action:action},
                success: function(data) {
                    $("#supplier_table").html(data);
                    $("#supplier_table").DataTable();
                }
            })
            }
        $(document).ready(function(){
            $("#updForm").submit(function() {
                var upd_id = $("#upd_id").val();
                var upd_company_name = $("#upd_company_name").val();
                var upd_company_add = $("#upd_company_add").val();
                var upd_company_con = $("#upd_company_con").val();
                var upd_company_email = $("#upd_company_email").val();
                var upd_company_indus = $("#upd_company_indus").val();
                var upd_main_name = $("#upd_main_name").val();
                var upd_main_email = $("#upd_main_email").val();
                var upd_main_position = $("#upd_main_position").val();
                var upd_main_contact = $("#upd_main_contact").val();
                var upd_add_info = $("#upd_add_info").val();

                if (!isValid()) {
                    if (!isValid()) {
                        event.preventDefault();
                        $.ajax({
                            url: "../supplier/update_supplier.php",
                            method: "POST",
                            data: {
                                upd_id : upd_id,
                                upd_company_name : upd_company_name,
                                upd_company_add : upd_company_add,
                                upd_company_con : upd_company_con,
                                upd_company_email : upd_company_email,
                                upd_main_name : upd_main_name,
                                upd_main_email : upd_main_email,
                                upd_main_position :upd_main_position,
                                upd_main_contact : upd_main_contact,
                                upd_add_info : upd_add_info
                            },
                            success: function(data) {
                                $("#supplier_table").DataTable().destroy();
                                display_data();
                                $("#update").modal("hide");
                            }
                        });
                    }
                }

            })

            function isValid() {
                checkIfValid = false;
                if($("#upd_company_name").val() == "" || $("#upd_company_add").val() == "" || $("#upd_company_con").val() == "" || $("#upd_company_email").val() == "" 
                || $("#upd_main_name").val() == "" || $("#upd_main_email").val() == "" || $("#upd_main_position").val() == "" || $("#upd_main_contact").val() == "" ||  $("#upd_company_indus").val() == ""){
                    checkIfValid = true;
                } else {
                    checkIfValid = false;
                }
                return checkIfValid;
            }
            
        })
        </script>
        ';
        }
        echo $output;
    }
?>



