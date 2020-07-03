<?php
    include '../php/connection.php';

if(isset($_POST["brand_id"])){
    $output = '';
    $query = "SELECT * FROM brands WHERE id = '".$_POST["brand_id"]."'";
    $result = $dbc->query($query);
    while($row = $result->fetch()) {
        $output .= '
        <form  data-toggle="validator" id="updForm" role="form" validate>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="hidden" name="upd_id" id="upd_id" value="'.$_POST["brand_id"].'">
                        <label for="updBrandName" class="control-label">Unit Name</label>
                        <input type="text" id="updBrandName" name="updBrandName" class="form-control input-sm" value="'.$row["brand_name"].'" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="updBrandDesc" class="control-label">Unit Description</label>
                        <textarea name="updBrandDesc" id="updBrandDesc" cols="30" rows="3" class="form-control" style="resize: none" required>'.$row["brand_desc"].'</textarea>
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
                        url: "../products/display_brands.php",
                        method: "POST",
                        data: {action:action},
                        success: function(data) {
                            $("#brand_table").html(data);
                            $("#brand_table").DataTable();
                        }
                    })
                }                
            
                $("#updForm").on("submit", function(event){
                    event.preventDefault();
                    var upd_id = $("#upd_id").val();
                    var updBrandName = $("#updBrandName").val();
                    var updBrandDesc = $("textarea:input[name=updBrandDesc]").val();
                    
                    if (updBrandName != "" && updBrandDesc != "") {
                        $.ajax({
                            url: "../products/update_brand.php",
                            type: "POST",
                            data: {
                                upd_id : upd_id,
                                updBrandName : updBrandName,
                                updBrandDesc : updBrandDesc },
                            success: function(data) {
                                $("#update").modal("hide");
                                $("#unit_table").DataTable().destroy();
                                $("#updForm")[0].reset();
                                location.reload();
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


   
 