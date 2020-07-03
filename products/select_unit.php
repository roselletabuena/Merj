<?php
    include '../php/connection.php';

    if(isset($_POST["unit_id"])){
        $output = '';
        $query = "SELECT * FROM uom WHERE id = '".$_POST["unit_id"]."'";
        $result = $dbc->query($query);
        while($row = $result->fetch()) {
            $output .= '
            <form  data-toggle="validator" id="updForm" role="form" validate>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                         <input type="hidden" name="upd_id" id="upd_id" value="'.$_POST["unit_id"].'">
                            <label for="upd_unitName" class="control-label">Unit Name</label>
                            <input type="text" id="upd_unitName" name="upd_unitName" class="form-control input-sm" value="'.$row["unit_name"].'" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="upd_unitDesc" class="control-label">Unit Description</label>
                            <textarea name="upd_unitDesc" id="unitDesc" cols="30" rows="3" class="form-control" style="resize: none" required>'.$row["unit_desc"].'</textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div align="right">
                    <button type="submit" class="btn btn-sm btn-primary btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            ';
            $output .= '
            <script>
                $(document).ready(function(){
                    function display_data(){
                        var action = "fetch";
                
                        $.ajax({
                            url: "products/display_unit.php",
                            method: "POST",
                            data: {action:action},
                            success: function(data) {
                                $("#unit_table").html(data);
                                $("#unit_table").DataTable();
                            }
                        })
                    }
                
                    $("#updForm").on("submit", function(event){
                        event.preventDefault();
                        var upd_id = $("#upd_id").val();
                        var upd_unitName = $("#upd_unitName").val();
                        var upd_unitDesc = $("textarea:input[name=upd_unitDesc]").val();
                        
                        if (upd_unitName != "" && upd_unitDesc != "") {
                            $.ajax({
                                url: "products/update_unit.php",
                                type: "POST",
                                data: {
                                    upd_id : upd_id,
                                    upd_unitName : upd_unitName,
                                    upd_unitDesc : upd_unitDesc },
                                success: function(data) {
                                    $("#update").modal("hide");
                                    $("#unit_table").DataTable().destroy();
                                    display_data();
                                    $("#updForm")[0].reset();
                                }
                            })
                        }
                    });
                    
                });
            </script>';
        }
        echo $output;
    }

?>


   
 